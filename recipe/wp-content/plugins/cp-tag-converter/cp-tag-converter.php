<?php
/**
 * CP Tag Converter - CookingPress tags converter plugin
 *
 *
 * @package   CpTagConverter
 * @author    purethemes
 * @license   ThemeForest
 * @copyright 2014 Purethemes.net
 *
 * @wordpress-plugin
 * Plugin Name:       CP Tag Converter - CookingPress tags converter plugin
 * Plugin URI:        @TODO
 * Description:       Plugin for converting tags to ingredients
 * Version:           1.0
 * Author:            purethemes.net
 * Author URI:        http://purethemes.net
 * Text Domain:       foodiepresscp
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
  */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

/**
 * FoodiePress.
 *
 * @package   FoodiePress
 * @author    purethemes
 * @license   ThemeForest
 * @copyright 2014 Purethemes.net
 */


class FoodiePressTransferTags {
    /**
     * Instance of this class.
     *
     * @since    1.0.0
     *
     * @var      object
     */
    /*    protected static $instance = null;*/
    /**
     * Slug of the plugin screen.
     *
     * @since    1.0.0
     *
     * @var      string
     */
    protected $plugin_screen_hook_suffix = null;

    public function __construct() {
        add_action( 'admin_menu', array( $this, 'add_plugin_admin_menu' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueues' ) );
        add_action( 'wp_ajax_converttags', array( $this, 'converttags_callback' ) );
        add_action( 'wp_ajax_nopriv_converttags', array( $this, 'converttags_callback' ) );
    }

    public static function get_instance() {

        /*
         * @TODO :
         *
         * - Uncomment following lines if the admin class should only be available for super admins
         */
        if( ! is_super_admin() ) {
            return;
        }

        // If the single instance hasn't been set, set it now.
        if ( null == self::$instance ) {
            self::$instance = new self;
        }

        return self::$instance;
    }


    /**
     * Register the administration menu for this plugin into the WordPress Dashboard menu.
     *
     * @since    1.0.0
     */
    public function add_plugin_admin_menu() {

        /*
         * Add a settings page for this plugin to the Settings menu.
         *
         * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
         *
         *        Administration Menus: http://codex.wordpress.org/Administration_Menus
         *
         * @TODO:
         *
         * - Change 'Page Title' to the title of your plugin admin page
         * - Change 'Menu Text' to the text for menu item for the plugin settings page
         * - Change 'manage_options' to the capability you see fit
         *   For reference: http://codex.wordpress.org/Roles_and_Capabilities
         */


        $this->plugin_screen_hook_suffix = add_options_page(
            __( 'Tags Converter', 'tags-converter' ),
            __( 'Tags Converter', 'tags-converter' ),
            'manage_options',
            'tags-converter',
            array( $this, 'display_plugin_admin_page' )
            );

    }

    function admin_enqueues( $hook_suffix ) {
        if ( $hook_suffix != $this->plugin_screen_hook_suffix )
            return;
        wp_enqueue_script( 'jquery-ui-progressbar');
        wp_enqueue_style( 'jquery-ui', plugins_url( 'assets/jquery-ui.min.min.css', __FILE__ ), array() );
        wp_enqueue_style( 'jquery-ui-structure', plugins_url( 'assets/jquery-ui.structure.min.css', __FILE__ ), array() );
        wp_enqueue_style( 'jquery-ui-theme', plugins_url( 'assets/jquery-ui.theme.min.css', __FILE__ ), array() );
    }

    // Process a single image ID (this is an AJAX handler)
    public function converttags_callback() {

        $id = (int) $_REQUEST['id'];
        $cleartags = $_REQUEST['cleartags'];
        ob_clean();
        // this is required to return a proper result
        $ingredients = array();
        $posttags = get_the_tags($id);
        if ($posttags) {
          foreach($posttags as $tag) {
            $ingredients[] = $tag->name;
        }
        //print_r($ingredients);
        $term_ingredients_set = wp_set_object_terms($id, $ingredients, 'ingredients');
        if($cleartags) {
           wp_set_post_terms($id, '', 'post_tag'); //clear tags
        }

        if ( is_wp_error( $term_ingredients_set ) ) {
          die( json_encode( array( 'error' => 'error', 'title' => get_the_title($id))));

        } else {
          die( json_encode( array( 'success' => 'success', 'title' => get_the_title($id))));
        }

       
       }
    }


    /**
         * Render the settings page for this plugin.
         *
         * @since    1.0.0
         */
    public function display_plugin_admin_page() {
        global $wpdb; ?>
        <div class="wrap">
            <h2>Tags converter</h2>
            <?php
            if (!empty($_POST['convert-tags'])) {
                check_admin_referer( 'convert-tags' );
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => '-1',
                    );
                $postsids = array();
                $post_query = new WP_Query($args);
                if($post_query->have_posts() ) {
                    while($post_query->have_posts() ) {
                        $post_query->the_post();
                        $post_id = get_the_ID();
                        $postsids[] = $post_id;
                    }
                    $count = count($postsids);
                    $postsids = implode( ',', $postsids );
                    
                }

                ?>


                <script type="text/javascript">
    // <![CDATA[
    jQuery(document).ready(function($){
        var i;
        var pp_posts = [<?php echo $postsids; ?>];
        var pp_posts_total = pp_posts.length;
        var pp_count = 1;
        var pp_percent = 0;
        var pp_successes = 0;
        var pp_errors = 0;
        var pp_failedlist = '';
        var pp_resulttext = 'Operation has been finished';
        var pp_timestart = new Date().getTime();
        var pp_timeend = 0;
        var pp_totaltime = 0;
        var pp_continue = true;
       <?php if (!empty($_POST['cleartags'])) { ?>
          var cleartags = true;
       <?php }  else { ?>
          var cleartags = false;
       <?php } ?>
        

      
        $( "#progressbar" ).progressbar();
        
        // Regenerate a specified image via AJAX
        function ConvertTags( postid ) {

            $.ajax({
                type: 'POST',
                url: ajaxurl,
                data: {
                    action: "converttags",
                    id: postid,
                    cleartags: cleartags
                },
                success: function( response ) {
                   /* if ( response !== Object( response ) || ( typeof response.success === "undefined" && typeof response.error === "undefined" ) ) {
                        response = new Object;
                        response.success = false;
                        response.error = "<?php printf( esc_js( __( 'The request was abnormally terminated (ID %s).', 'foodiepresscp' ) ), '" + postid + "' ); ?>";
                    }*/
                    var data = JSON.parse(response);
                    if ( data.success ) {
                        ConvertTagsUpdateStatus( postid, true, response );
                    }
                    else {
                        ConvertTagsUpdateStatus( postid, false, response );
                    }

                    if ( pp_posts.length && pp_continue ) {
                        ConvertTags( pp_posts.shift() );
                    } else {
                        ConvertTagsFinishUp();
                    }
                },
                error: function( response ) {
                 
                    ConvertTagsUpdateStatus( postid, false, response );
                   
                    if ( pp_posts.length && pp_continue ) {
                        ConvertTags( pp_posts.shift() );
                    } else {
                        ConvertTagsFinishUp();
                    }
                }
            });
        }

        function ConvertTagsUpdateStatus( id, success, response ) {
            var data = JSON.parse(response);
            $("#progressbar").progressbar( "value", ( pp_count / pp_posts_total ) * 100 );
            pp_count = pp_count + 1;
            var data = JSON.parse(response);
            if ( success ) {
                    pp_successes = pp_successes + 1;
                    $("#regenthumbs-debug-successcount").html(pp_successes);
                    $("#regenthumbs-debuglist").append("<li>" + data.title + " converted</li>");
            }
            else {
                pp_errors = pp_errors + 1;
                pp_failedlist = pp_failedlist + ',' + id;
                $("#regenthumbs-debug-failurecount").html(pp_errors);
                $("#regenthumbs-debuglist").append("<li>Post with ID:" + id + " was not converted (no tags)</li>");
            }
        }
        function ConvertTagsFinishUp() {
                    pp_timeend = new Date().getTime();
                    pp_totaltime = Math.round( ( pp_timeend - pp_timestart ) / 1000 );
                    $('#regenthumbs-stop').hide();
                    $("#message").html("<p><strong>" + pp_resulttext + "</strong></p>");
                    $("#message").show();
                }

          ConvertTags( pp_posts.shift() );
        });
    </script>
    <div id="progressbar"></div>
<?php } //eof if ?>

<p>This is Tool for users of CookingPress version 2.0.5 or older, where tags were used to hold ingredients informations for recipe. From version 1.0.6 of FoodiePress,
    we are changing it to new Taxonomy named <strong>"Ingredients"</strong>, and we've created that simple tool to convert old posts. 
    This will copy all current tags to 'ingredients', and if you wish, it will also remove tags from current posts leaving it blank.
</p>
<p><strong>Important</strong> Be sure to make backup before you press the 'Convert' button. We have done our best to make it bug free, but it's better to be safe than sorry. <a href="http://wordpress.org/plugins/backupwordpress/">Here's a good little plugin for this</a></p>
<form method="post" action="">
    <?php wp_nonce_field('convert-tags') ?>
    <p><input type="checkbox" name="cleartags" id="cleartags"><label for="cleartags">Clear tags (This action cannot be undone)</label></p>
    <p><input type="submit" class="button hide-if-no-js" name="convert-tags" id="convert-tags" value="<?php _e( 'Convert All Tags', 'foodiepresscp' ) ?>" /></p>
</form>
<?php  if (!empty($_POST['convert-tags'])) { ?>
<h3 class="title"><?php _e( 'Debugging Information', 'foodiepresscp' ) ?></h3>

<p>
    <?php printf( __( 'Total Posts: %s', 'regenerate-thumbnails' ), $count ); ?><br />
    <?php printf( __( 'Posts Converted: %s', 'regenerate-thumbnails' ), '<span id="regenthumbs-debug-successcount">0</span>' ); ?><br />
    <?php printf( __( 'Posts skipped (no tags or error) : %s', 'regenerate-thumbnails' ), '<span id="regenthumbs-debug-failurecount">0</span>' ); ?>
</p>

<ol id="regenthumbs-debuglist">
    <li style="display:none"></li>
</ol>
<?php } ?>
</div>
<?php }
}

new FoodiePressTransferTags();




class IteratorPresenter implements IteratorAggregate
{
  private $values;

  public function __construct($values)
  {
    if (!is_array($values) && !$values instanceof Traversable) {
      throw new InvalidArgumentException('IteratorPresenter requires an array or Traversable object');
    }

    $this->values = $values;
  }

  public function getIterator()
  {
    $values = array();
    foreach ($this->values as $key => $val) {
      $values[$key] = array(
        'key'   => $key,
        'value' => $val,
        'first' => false,
        'last'  => false,
        );
    }

    $keys = array_keys($values);

    if (!empty($keys)) {
      $values[reset($keys)]['first'] = true;
      $values[end($keys)]['last']    = true;
    }

    return new ArrayIterator($values);
  }
}




