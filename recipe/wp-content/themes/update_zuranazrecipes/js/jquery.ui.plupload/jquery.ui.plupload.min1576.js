;(function(e,t,n,r,i){function o(e){return n.translate(e)||e}function u(e){e.id=e.attr("id"),e.html('<div class="plupload_wrapper"><div class="ui-widget-content plupload_container"><div class="ui-state-default ui-widget-header plupload_header"><div class="plupload_header_content"><div class="plupload_logo"> </div><div class="plupload_header_title">'+o("Select files")+"</div>"+'<div class="plupload_header_text">'+o("Add files to the upload queue and click the start button.")+"</div>"+'<div class="plupload_view_switch">'+'<input type="radio" id="'+e.id+'_view_list" name="view_mode_'+e.id+'" checked="checked" /><label class="plupload_button" for="'+e.id+'_view_list" data-view="list">'+o("List")+"</label>"+'<input type="radio" id="'+e.id+'_view_thumbs" name="view_mode_'+e.id+'" /><label class="plupload_button"  for="'+e.id+'_view_thumbs" data-view="thumbs">'+o("Thumbnails")+"</label>"+"</div>"+"</div>"+"</div>"+'<table class="plupload_filelist plupload_filelist_header ui-widget-header">'+"<tr>"+'<td class="plupload_cell plupload_file_name">'+o("Filename")+"</td>"+'<td class="plupload_cell plupload_file_status">'+o("Status")+"</td>"+'<td class="plupload_cell plupload_file_size">'+o("Size")+"</td>"+'<td class="plupload_cell plupload_file_action">&nbsp;</td>'+"</tr>"+"</table>"+'<div class="plupload_content">'+'<div class="plupload_droptext">'+o("Drag files here.")+"</div>"+'<ul class="plupload_filelist_content"> </ul>'+'<div class="plupload_clearer">&nbsp;</div>'+"</div>"+'<table class="plupload_filelist plupload_filelist_footer ui-widget-header">'+"<tr>"+'<td class="plupload_cell plupload_file_name">'+'<div class="plupload_buttons"><!-- Visible -->'+'<a class="plupload_button plupload_add">'+o("Add Files")+"</a>&nbsp;"+'<a class="plupload_button plupload_start">'+o("Start Upload")+"</a>&nbsp;"+'<a class="plupload_button plupload_stop plupload_hidden">'+o("Stop Upload")+"</a>&nbsp;"+"</div>"+'<div class="plupload_started plupload_hidden"><!-- Hidden -->'+'<div class="plupload_progress plupload_right">'+'<div class="plupload_progress_container"></div>'+"</div>"+'<div class="plupload_cell plupload_upload_status"></div>'+'<div class="plupload_clearer">&nbsp;</div>'+"</div>"+"</td>"+'<td class="plupload_file_status"><span class="plupload_total_status">0%</span></td>'+'<td class="plupload_file_size"><span class="plupload_total_file_size">0 kb</span></td>'+'<td class="plupload_file_action"></td>'+"</tr>"+"</table>"+"</div>"+'<input class="plupload_count" value="0" type="hidden">'+"</div>")}var s={};i.widget("ui.plupload",{widgetEventPrefix:"",contents_bak:"",options:{browse_button_hover:"ui-state-hover",browse_button_active:"ui-state-active",filters:{},buttons:{browse:!0,start:!0,stop:!0},views:{list:!0,thumbs:!1,active:"list",remember:!0},thumb_width:100,thumb_height:60,multiple_queues:!0,dragdrop:!0,autostart:!1,sortable:!1,rename:!1},FILE_COUNT_ERROR:-9001,_create:function(){var e=this.element.attr("id");e||(e=n.guid(),this.element.attr("id",e)),this.id=e,this.contents_bak=this.element.html(),u(this.element),this.container=i(".plupload_container",this.element).attr("id",e+"_container"),this.content=i(".plupload_content",this.element),i.fn.resizable&&this.container.resizable({handles:"s",minHeight:300}),this.filelist=i(".plupload_filelist_content",this.container).attr({id:e+"_filelist",unselectable:"on"}),this.browse_button=i(".plupload_add",this.container).attr("id",e+"_browse"),this.start_button=i(".plupload_start",this.container).attr("id",e+"_start"),this.stop_button=i(".plupload_stop",this.container).attr("id",e+"_stop"),this.thumbs_switcher=i("#"+e+"_view_thumbs"),this.list_switcher=i("#"+e+"_view_list"),i.ui.button&&(this.browse_button.button({icons:{primary:"ui-icon-circle-plus"},disabled:!0}),this.start_button.button({icons:{primary:"ui-icon-circle-arrow-e"},disabled:!0}),this.stop_button.button({icons:{primary:"ui-icon-circle-close"}}),this.list_switcher.button({text:!1,icons:{secondary:"ui-icon-grip-dotted-horizontal"}}),this.thumbs_switcher.button({text:!1,icons:{secondary:"ui-icon-image"}})),this.progressbar=i(".plupload_progress_container",this.container),i.ui.progressbar&&this.progressbar.progressbar(),this.counter=i(".plupload_count",this.element).attr({id:e+"_count",name:e+"_count"}),this._initUploader()},_initUploader:function(){var e=this,t=this.id,u,a={container:t+"_buttons",browse_button:t+"_browse"};i(".plupload_buttons",this.element).attr("id",t+"_buttons"),e.options.dragdrop&&(this.filelist.parent().attr("id",this.id+"_dropbox"),a.drop_element=this.id+"_dropbox"),this.filelist.on("click",function(t){i(t.target).hasClass("plupload_action_icon")&&(e.removeFile(i(t.target).closest(".plupload_file").attr("id")),t.preventDefault())}),u=this.uploader=s[t]=new n.Uploader(i.extend(this.options,a)),e.options.views.thumbs&&(u.settings.required_features.display_media=!0),e.options.max_file_count&&n.extend(u.getOption("filters"),{max_file_count:e.options.max_file_count}),n.addFileFilter("max_file_count",function(t,n,r){t<=this.files.length-(this.total.uploaded+this.total.failed)?(e.browse_button.button("disable"),this.disableBrowse(),this.trigger("Error",{code:e.FILE_COUNT_ERROR,message:o("File count error."),file:n}),r(!1)):r(!0)}),u.bind("Error",function(t,i){var s,u="";s="<strong>"+i.message+"</strong>";switch(i.code){case n.FILE_EXTENSION_ERROR:u=r.sprintf(o("File: %s"),i.file.name);break;case n.FILE_SIZE_ERROR:u=r.sprintf(o("File: %s, size: %d, max file size: %d"),i.file.name,n.formatSize(i.file.size),n.formatSize(n.parseSize(t.getOption("filters").max_file_size)));break;case n.FILE_DUPLICATE_ERROR:u=r.sprintf(o("%s already present in the queue."),i.file.name);break;case e.FILE_COUNT_ERROR:u=r.sprintf(o("Upload element accepts only %d file(s) at a time. Extra files were stripped."),t.getOption("filters").max_file_count||0);break;case n.IMAGE_FORMAT_ERROR:u=o("Image format either wrong or not supported.");break;case n.IMAGE_MEMORY_ERROR:u=o("Runtime ran out of available memory.");break;case n.HTTP_ERROR:u=o("Upload URL might be wrong or doesn't exist.")}s+=" <br /><i>"+u+"</i>",e._trigger("error",null,{up:t,error:i}),i.code===n.INIT_ERROR?setTimeout(function(){e.destroy()},1):e.notify("error",s)}),u.bind("PostInit",function(t){e.options.buttons.browse?e.browse_button.button("enable"):(e.browse_button.button("disable").hide(),t.disableBrowse(!0)),e.options.buttons.start||e.start_button.button("disable").hide(),e.options.buttons.stop||e.stop_button.button("disable").hide(),!e.options.unique_names&&e.options.rename&&e._enableRenaming(),e.options.dragdrop&&t.features.dragdrop&&e.filelist.parent().addClass("plupload_dropbox"),e._enableViewSwitcher(),e.start_button.click(function(t){i(this).button("option","disabled")||e.start(),t.preventDefault()}),e.stop_button.click(function(t){e.stop(),t.preventDefault()}),e._trigger("ready",null,{up:t})}),u.init(),u.bind("FileFiltered",function(t,n){e._addFiles(n)}),u.bind("FilesAdded",function(t,n){e._trigger("selected",null,{up:t,files:n}),e.options.sortable&&i.ui.sortable&&e._enableSortingList(),e._trigger("updatelist",null,{filelist:e.filelist}),e.options.autostart&&setTimeout(function(){e.start()},10)}),u.bind("FilesRemoved",function(t,n){i.ui.sortable&&e.options.sortable&&i("tbody",e.filelist).sortable("destroy"),i.each(n,function(e,t){i("#"+t.id).toggle("highlight",function(){i(this).remove()})}),t.files.length&&e.options.sortable&&i.ui.sortable&&e._enableSortingList(),e._trigger("updatelist",null,{filelist:e.filelist}),e._trigger("removed",null,{up:t,files:n})}),u.bind("QueueChanged StateChanged",function(){e._handleState()}),u.bind("UploadFile",function(t,n){e._handleFileStatus(n)}),u.bind("FileUploaded",function(t,n){e._handleFileStatus(n),e._trigger("uploaded",null,{up:t,file:n})}),u.bind("UploadProgress",function(t,n){e._handleFileStatus(n),e._updateTotalProgress(),e._trigger("progress",null,{up:t,file:n})}),u.bind("UploadComplete",function(t,n){e._addFormFields(),e._trigger("complete",null,{up:t,files:n})})},_setOption:function(e,t){var n=this;e=="buttons"&&typeof t=="object"&&(t=i.extend(n.options.buttons,t),t.browse?(n.browse_button.button("enable").show(),n.uploader.disableBrowse(!1)):(n.browse_button.button("disable").hide(),n.uploader.disableBrowse(!0)),t.start?n.start_button.button("enable").show():n.start_button.button("disable").hide(),t.stop?n.start_button.button("enable").show():n.stop_button.button("disable").hide()),n.uploader.settings[e]=t},start:function(){this.uploader.start(),this._trigger("start",null,{up:this.uploader})},stop:function(){this.uploader.stop(),this._trigger("stop",null,{up:this.uploader})},enable:function(){this.browse_button.button("enable"),this.uploader.disableBrowse(!1)},disable:function(){this.browse_button.button("disable"),this.uploader.disableBrowse(!0)},getFile:function(e){var t;return typeof e=="number"?t=this.uploader.files[e]:t=this.uploader.getFile(e),t},getFiles:function(){return this.uploader.files},removeFile:function(e){n.typeOf(e)==="string"&&(e=this.getFile(e)),this.uploader.removeFile(e)},clearQueue:function(){this.uploader.splice()},getUploader:function(){return this.uploader},refresh:function(){this.uploader.refresh()},notify:function(e,t){var n=i('<div class="plupload_message"><span class="plupload_message_close ui-icon ui-icon-circle-close" title="'+o("Close")+'"></span>'+'<p><span class="ui-icon"></span>'+t+"</p>"+"</div>");n.addClass("ui-state-"+(e==="error"?"error":"highlight")).find("p .ui-icon").addClass("ui-icon-"+(e==="error"?"alert":"info")).end().find(".plupload_message_close").click(function(){n.remove()}).end(),i(".plupload_header",this.container).append(n)},destroy:function(){this.uploader.destroy(),i(".plupload_button",this.element).unbind(),i.ui.button&&i(".plupload_add, .plupload_start, .plupload_stop",this.container).button("destroy"),i.ui.progressbar&&this.progressbar.progressbar("destroy"),i.ui.sortable&&this.options.sortable&&i("tbody",this.filelist).sortable("destroy"),this.element.empty().html(this.contents_bak),this.contents_bak="",i.Widget.prototype.destroy.apply(this)},_handleState:function(){var e=this.uploader,t=e.files.length-(e.total.uploaded+e.total.failed),s=e.getOption("filters").max_file_count||0;n.STARTED===e.state?(i([]).add(this.stop_button).add(".plupload_started").removeClass("plupload_hidden"),this.start_button.button("disable"),this.options.multiple_queues||(this.browse_button.button("disable"),e.disableBrowse()),i(".plupload_upload_status",this.element).html(r.sprintf(o("Uploaded %d/%d files"),e.total.uploaded,e.files.length)),i(".plupload_header_content",this.element).addClass("plupload_header_content_bw")):n.STOPPED===e.state&&(i([]).add(this.stop_button).add(".plupload_started").addClass("plupload_hidden"),t?this.start_button.button("enable"):this.start_button.button("disable"),this.options.multiple_queues&&i(".plupload_header_content",this.element).removeClass("plupload_header_content_bw"),this.options.multiple_queues&&s&&s>t&&(this.browse_button.button("enable"),e.disableBrowse(!1)),this._updateTotalProgress()),e.total.queued===0?i(".ui-button-text",this.browse_button).html(o("Add Files")):i(".ui-button-text",this.browse_button).html(r.sprintf(o("%d files queued"),e.total.queued)),e.refresh()},_handleFileStatus:function(e){var t=i("#"+e.id),r,s;if(!t.length)return;switch(e.status){case n.DONE:r="plupload_done",s="plupload_action_icon ui-icon ui-icon-circle-check";break;case n.FAILED:r="ui-state-error plupload_failed",s="plupload_action_icon ui-icon ui-icon-alert";break;case n.QUEUED:r="plupload_delete",s="plupload_action_icon ui-icon ui-icon-circle-minus";break;case n.UPLOADING:r="ui-state-highlight plupload_uploading",s="plupload_action_icon ui-icon ui-icon-circle-arrow-w";var o=i(".plupload_scroll",this.container),u=o.scrollTop(),a=o.height(),f=t.position().top+t.height();a<f&&o.scrollTop(u+f-a),t.find(".plupload_file_percent").html(e.percent+"%").end().find(".plupload_file_progress").css("width",e.percent+"%").end().find(".plupload_file_size").html(n.formatSize(e.size))}r+=" ui-state-default plupload_file",t.attr("class",r).find(".plupload_action_icon").attr("class",s)},_updateTotalProgress:function(){var e=this.uploader;this.filelist[0].scrollTop=this.filelist[0].scrollHeight,this.progressbar.progressbar("value",e.total.percent),this.element.find(".plupload_total_status").html(e.total.percent+"%").end().find(".plupload_total_file_size").html(n.formatSize(e.total.size)).end().find(".plupload_upload_status").html(r.sprintf(o("Uploaded %d/%d files"),e.total.uploaded,e.files.length))},_displayThumbs:function(){function f(e,t,n){var r;e.on(t,function(){clearTimeout(r),r=setTimeout(function(){clearTimeout(r),n()},300)})}function l(){if(!t||!n){var r=i(".plupload_file:eq(0)",e.filelist);t=r.outerWidth(!0),n=r.outerHeight(!0)}var u=e.content.width(),a=e.content.height();s=Math.floor(u/t),o=s*(Math.ceil(a/n)+1)}function c(){var t=Math.floor(e.content.scrollTop()/n)*s;u=i(".plupload_file",e.filelist).slice(t,t+o).filter(".plupload_file_loading").get()}function h(){function t(){if(e.view_mode!=="thumbs")return;l(),c(),d()}i.fn.resizable&&f(e.container,"resize",t),f(e.window,"resize",t),f(e.content,"scroll",t),e.element.on("viewchanged selected",t),t()}function p(t,n){var s=new r.Image;s.onload=function(){var n=i("#"+t.id+" .plupload_file_thumb",e.filelist).html("");this.embed(n[0],{width:e.options.thumb_width,height:e.options.thumb_height,crop:!0,swf_url:r.resolveUrl(e.options.flash_swf_url),xap_url:r.resolveUrl(e.options.silverlight_xap_url)})},s.bind("embedded error",function(){i("#"+t.id,e.filelist).removeClass("plupload_file_loading"),this.destroy(),setTimeout(n,1)}),s.load(t.getSource())}function d(){if(e.view_mode!=="thumbs"||a)return;c();if(!u.length)return;a=!0,p(e.getFile(i(u.shift()).attr("id")),function(){a=!1,d()})}var e=this,t,n,s,o=0,u=[],a=!1;if(!this.options.views.thumbs)return;this.element.on("selected",function v(){e.element.off("selected",v),h()})},_addFiles:function(e){var t=this,s,o="";s='<li class="plupload_file ui-state-default plupload_file_loading plupload_delete" id="%id%" style="width:%thumb_width%px;"><div class="plupload_file_thumb" style="width:%thumb_width%px;height:%thumb_height%px;"><div class="plupload_file_dummy ui-widget-content" style="line-height:%thumb_height%px;"><span class="ui-state-disabled">%ext% </span></div></div><div class="plupload_file_status"><div class="plupload_file_progress ui-widget-header" style="width: 0%"> </div><span class="plupload_file_percent">%percent% </span></div><div class="plupload_file_name" title="%name%"><span class="plupload_file_name_wrapper">%name% </span></div><div class="plupload_file_action"><div class="plupload_action_icon ui-icon ui-icon-circle-minus"> </div></div><div class="plupload_file_size">%size% </div><div class="plupload_file_fields"> </div></li>',n.typeOf(e)!=="array"&&(e=[e]),i.each(e,function(e,i){var u=r.Mime.getFileExtension(i.name)||"none";o+=s.replace(/%(\w+)%/g,function(e,r){switch(r){case"thumb_width":case"thumb_height":return t.options[r];case"size":return n.formatSize(i.size);case"ext":return u;default:return i[r]||""}})}),t.filelist.append(o)},_addFormFields:function(){var e=this;i(".plupload_file_fields",this.filelist).html(""),n.each(this.uploader.files,function(t,r){var s="",o=e.id+"_"+r;t.target_name&&(s+='<input type="hidden" name="'+o+'_tmpname" value="'+n.xmlEncode(t.target_name)+'" />'),s+='<input type="hidden" name="'+o+'_name" value="'+n.xmlEncode(t.name)+'" />',s+='<input type="hidden" name="'+o+'_status" value="'+(t.status===n.DONE?"done":"failed")+'" />',i("#"+t.id).find(".plupload_file_fields").html(s)}),this.counter.val(this.uploader.files.length)},_viewChanged:function(e){this.options.views.remember&&i.cookie&&i.cookie("plupload_ui_view",e,{expires:7,path:"/"}),r.Env.browser==="IE"&&r.Env.version<7&&this.content.attr("style",'height:expression(document.getElementById("'+this.id+"_container"+'").clientHeight - '+(e==="list"?132:102)+")"),this.container.removeClass("plupload_view_list plupload_view_thumbs").addClass("plupload_view_"+e),this.view_mode=e,this._trigger("viewchanged",null,{view:e})},_enableViewSwitcher:function(){var e=this,t,r=i(".plupload_view_switch",this.container),s,o;n.each(["list","thumbs"],function(t){e.options.views[t]||r.find('[for="'+e.id+"_view_"+t+'"], #'+e.id+"_view_"+t).remove()}),s=r.find(".plupload_button"),s.length===1?(r.hide(),t=s.eq(0).data("view"),this._viewChanged(t)):i.ui.button&&s.length>1?(this.options.views.remember&&i.cookie&&(t=i.cookie("plupload_ui_view")),~n.inArray(t,["list","thumbs"])||(t=this.options.views.active),r.show().buttonset().find(".ui-button").click(function(n){t=i(this).data("view"),e._viewChanged(t),n.preventDefault()}),o=r.find('[for="'+e.id+"_view_"+t+'"]'),o.length&&o.trigger("click")):(r.show(),this._viewChanged(this.options.views.active)),this.options.views.thumbs&&this._displayThumbs()},_enableRenaming:function(){var e=this;this.filelist.dblclick(function(t){var n=i(t.target),r,s,o,u,a="";if(!n.hasClass("plupload_file_name_wrapper"))return;s=e.uploader.getFile(n.closest(".plupload_file")[0].id),u=s.name,o=/^(.+)(\.[^.]+)$/.exec(u),o&&(u=o[1],a=o[2]),r=i('<input class="plupload_file_rename" type="text" />').width(n.width()).insertAfter(n.hide()),r.val(u).blur(function(){n.show().parent().scrollLeft(0).end().next().remove()}).keydown(function(e){var t=i(this);i.inArray(e.keyCode,[13,27])!==-1&&(e.preventDefault(),e.keyCode===13&&(s.name=t.val()+a,n.html(s.name)),t.blur())})[0].focus()})},_enableSortingList:function(){var e=this;if(i(".plupload_file",this.filelist).length<2)return;i("tbody",this.filelist).sortable("destroy"),this.filelist.sortable({items:".plupload_delete",cancel:"object, .plupload_clearer",stop:function(){var t=[];i.each(i(this).sortable("toArray"),function(n,r){t[t.length]=e.uploader.getFile(r)}),t.unshift(t.length),t.unshift(0),Array.prototype.splice.apply(e.uploader.files,t)}})}})})(window,document,plupload,mOxie,jQuery);