jQuery(function($){$('select[name="settings[style]"]').bind("change",function(){$("#form").trigger("submit")});$("button.action.add").bind("click",function(){$.post(widgetkitajax+"&task=item_slideshow",{id:$('input[name="id"]').val()},function(data){$(data).appendTo("#items");$("#order").trigger("update")})});if($('input[name="id"]').val()==0){$("button.action.add").trigger("click")}$("#items").delegate(".box","delete",function(e,button){$(this).fadeOut(300,function(){$(this).remove();$("#order").trigger("update")})});$("#items").delegate("input.title","update",function(){var item=$(this).closest(".item");var value=$(this).val()?$(this).val():"untitled";item.find("h3.title").html(value);$('#order li[rel="'+item.attr("id")+'"]').html(value)});$("#order").sortable({axis:"y",start:function(event,ui){$("#"+ui.item.attr("rel")).addClass("sortactive")},stop:function(event,ui){setTimeout(function(){$("#"+ui.item.attr("rel")).removeClass("sortactive")},800)},update:function(event,ui){var item=$("#"+ui.item.attr("rel"));var next=ui.item.next();var prev=ui.item.prev();item.find(".html-editor").trigger("editor-action-start");if(next.length){item.insertBefore($("#"+next.attr("rel")))}else{item.insertAfter($("#"+prev.attr("rel")))}item.find(".html-editor").trigger("editor-action-stop")}}).bind("update",function(){var $this=$(this);$("li",this).each(function(){if(!$("#"+$(this).attr("rel")).length)$(this).remove()});$("#items > .item").each(function(){var id=$(this).attr("id");if(!$this.find("[rel='"+id+"']").length){$this.append('<li rel="'+id+'"></li>')}$("input.title",this).trigger("update")})}).trigger("update")});
(function($,win){var loaded_scripts={},$win=$(window);win.$widgetkit={version:"1.4.9",lazyloaders:{},load:function(script){if(!loaded_scripts[script]){var url=script+"?wkv="+this.version;loaded_scripts[script]=$.ajax({dataType:"script",cache:true,url:url})}return loaded_scripts[script]},lazyload:function(context){context=context||document;$("[data-widgetkit]",context).each(function(){var ele=$(this),type=ele.data("widgetkit"),options=ele.data("options")||{};if(!ele.data("wk-loaded")&&$widgetkit.lazyloaders[type]){$widgetkit.lazyloaders[type](ele,options);ele.data("wk-loaded",true)}})}};$(function(){$widgetkit.lazyload()});$win.on("load",function(){$win.resize()});var div=document.createElement("div"),divStyle=div.style,transition=false,prefixes="-webkit- -moz- -o- -ms- -khtml-".split(" "),domPrefixes="Webkit Moz O ms Khtml".split(" "),prefix="";for(var i=0;i<domPrefixes.length;i++){if(divStyle[domPrefixes[i]+"Transition"]===""){transition=domPrefixes[i]+"Transition";prefix=prefixes[i];break}}$widgetkit.prefix=prefix;$widgetkit.support={transition:transition,css3d:transition&&("WebKitCSSMatrix"in window&&"m11"in new WebKitCSSMatrix&&!navigator.userAgent.match(/Chrome/i)),canvas:function(){var check,elem=document.createElement("canvas");check=!!(elem.getContext&&elem.getContext("2d"));elem=null;return check}()};$widgetkit.css3=function(cssprops){cssprops=cssprops||{};if(cssprops["transition"]){cssprops[prefix+"transition"]=cssprops["transition"]}if(cssprops["transform"]){cssprops[prefix+"transform"]=cssprops["transform"]}if(cssprops["transform-origin"]){cssprops[prefix+"transform-origin"]=cssprops["transform-origin"]}return cssprops};$.browser=$.browser||function(ua){ua=ua.toLowerCase();var browser={},match=/(chrome)[ \/]([\w.]+)/.exec(ua)||/(webkit)[ \/]([\w.]+)/.exec(ua)||/(opera)(?:.*version)?[ \/]([\w.]+)/.exec(ua)||/(msie) ([\w.]+)/.exec(ua)||ua.indexOf("compatible")<0&&/(mozilla)(?:.*? rv:([\w.]+))?/.exec(ua)||[];if(match){browser[match[1]]=true;browser["version"]=match[2]||"0"}return browser}(navigator.userAgent);div=null})(jQuery,window);(function($){var ie=function(){try{return parseInt(navigator.appVersion.match(/MSIE (\d\.\d)/)[1],10)}catch(e){}return false}();if(ie&&ie<9){$(document).ready(function(){$("body").addClass("wk-ie wk-ie"+ie)});$.each(["abbr","article","aside","audio","canvas","details","figcaption","figure","footer","header","hgroup","mark","meter","nav","output","progress","section","summary","time","video"],function(){document.createElement(this)})}})(jQuery);(function($,win){win.$widgetkit.trans={__data:{},addDic:function(dic){$.extend(this.__data,dic)},add:function(key,data){this.__data[key]=data},get:function(key){if(!this.__data[key]){return key}var args=arguments.length==1?[]:Array.prototype.slice.call(arguments,1),ret=String(this.__data[key]);return this.printf(ret,args)},printf:function(S,L){if(!L)return S;var nS="",tS=S.split("%s");if(tS.length==1)return S;for(var i=0;i<L.length;i++){if(tS[i].lastIndexOf("%")==tS[i].length-1&&i!=L.length-1)tS[i]+="s"+tS.splice(i+1,1)[0];nS+=tS[i]+L[i]}return nS+tS[tS.length-1]}}})(jQuery,window);(function(jQuery){jQuery.easing["jswing"]=jQuery.easing["swing"];jQuery.extend(jQuery.easing,{def:"easeOutQuad",swing:function(x,t,b,c,d){return jQuery.easing[jQuery.easing.def](x,t,b,c,d)},easeInQuad:function(x,t,b,c,d){return c*(t/=d)*t+b},easeOutQuad:function(x,t,b,c,d){return-c*(t/=d)*(t-2)+b},easeInOutQuad:function(x,t,b,c,d){if((t/=d/2)<1)return c/2*t*t+b;return-c/2*(--t*(t-2)-1)+b},easeInCubic:function(x,t,b,c,d){return c*(t/=d)*t*t+b},easeOutCubic:function(x,t,b,c,d){return c*((t=t/d-1)*t*t+1)+b},easeInOutCubic:function(x,t,b,c,d){if((t/=d/2)<1)return c/2*t*t*t+b;return c/2*((t-=2)*t*t+2)+b},easeInQuart:function(x,t,b,c,d){return c*(t/=d)*t*t*t+b},easeOutQuart:function(x,t,b,c,d){return-c*((t=t/d-1)*t*t*t-1)+b},easeInOutQuart:function(x,t,b,c,d){if((t/=d/2)<1)return c/2*t*t*t*t+b;return-c/2*((t-=2)*t*t*t-2)+b},easeInQuint:function(x,t,b,c,d){return c*(t/=d)*t*t*t*t+b},easeOutQuint:function(x,t,b,c,d){return c*((t=t/d-1)*t*t*t*t+1)+b},easeInOutQuint:function(x,t,b,c,d){if((t/=d/2)<1)return c/2*t*t*t*t*t+b;return c/2*((t-=2)*t*t*t*t+2)+b},easeInSine:function(x,t,b,c,d){return-c*Math.cos(t/d*(Math.PI/2))+c+b},easeOutSine:function(x,t,b,c,d){return c*Math.sin(t/d*(Math.PI/2))+b},easeInOutSine:function(x,t,b,c,d){return-c/2*(Math.cos(Math.PI*t/d)-1)+b},easeInExpo:function(x,t,b,c,d){return t==0?b:c*Math.pow(2,10*(t/d-1))+b},easeOutExpo:function(x,t,b,c,d){return t==d?b+c:c*(-Math.pow(2,-10*t/d)+1)+b},easeInOutExpo:function(x,t,b,c,d){if(t==0)return b;if(t==d)return b+c;if((t/=d/2)<1)return c/2*Math.pow(2,10*(t-1))+b;return c/2*(-Math.pow(2,-10*--t)+2)+b},easeInCirc:function(x,t,b,c,d){return-c*(Math.sqrt(1-(t/=d)*t)-1)+b},easeOutCirc:function(x,t,b,c,d){return c*Math.sqrt(1-(t=t/d-1)*t)+b},easeInOutCirc:function(x,t,b,c,d){if((t/=d/2)<1)return-c/2*(Math.sqrt(1-t*t)-1)+b;return c/2*(Math.sqrt(1-(t-=2)*t)+1)+b},easeInElastic:function(x,t,b,c,d){var s=1.70158;var p=0;var a=c;if(t==0)return b;if((t/=d)==1)return b+c;if(!p)p=d*.3;if(a<Math.abs(c)){a=c;var s=p/4}else var s=p/(2*Math.PI)*Math.asin(c/a);return-(a*Math.pow(2,10*(t-=1))*Math.sin((t*d-s)*(2*Math.PI)/p))+b},easeOutElastic:function(x,t,b,c,d){var s=1.70158;var p=0;var a=c;if(t==0)return b;if((t/=d)==1)return b+c;if(!p)p=d*.3;if(a<Math.abs(c)){a=c;var s=p/4}else var s=p/(2*Math.PI)*Math.asin(c/a);return a*Math.pow(2,-10*t)*Math.sin((t*d-s)*(2*Math.PI)/p)+c+b},easeInOutElastic:function(x,t,b,c,d){var s=1.70158;var p=0;var a=c;if(t==0)return b;if((t/=d/2)==2)return b+c;if(!p)p=d*(.3*1.5);if(a<Math.abs(c)){a=c;var s=p/4}else var s=p/(2*Math.PI)*Math.asin(c/a);if(t<1)return-.5*(a*Math.pow(2,10*(t-=1))*Math.sin((t*d-s)*(2*Math.PI)/p))+b;return a*Math.pow(2,-10*(t-=1))*Math.sin((t*d-s)*(2*Math.PI)/p)*.5+c+b},easeInBack:function(x,t,b,c,d,s){if(s==undefined)s=1.70158;return c*(t/=d)*t*((s+1)*t-s)+b},easeOutBack:function(x,t,b,c,d,s){if(s==undefined)s=1.70158;return c*((t=t/d-1)*t*((s+1)*t+s)+1)+b},easeInOutBack:function(x,t,b,c,d,s){if(s==undefined)s=1.70158;if((t/=d/2)<1)return c/2*(t*t*(((s*=1.525)+1)*t-s))+b;return c/2*((t-=2)*t*(((s*=1.525)+1)*t+s)+2)+b},easeInBounce:function(x,t,b,c,d){return c-jQuery.easing.easeOutBounce(x,d-t,0,c,d)+b},easeOutBounce:function(x,t,b,c,d){if((t/=d)<1/2.75){return c*(7.5625*t*t)+b}else if(t<2/2.75){return c*(7.5625*(t-=1.5/2.75)*t+.75)+b}else if(t<2.5/2.75){return c*(7.5625*(t-=2.25/2.75)*t+.9375)+b}else{return c*(7.5625*(t-=2.625/2.75)*t+.984375)+b}},easeInOutBounce:function(x,t,b,c,d){if(t<d/2)return jQuery.easing.easeInBounce(x,t*2,0,c,d)*.5+b;return jQuery.easing.easeOutBounce(x,t*2-d,0,c,d)*.5+c*.5+b}})})(jQuery);(function(factory){if(typeof define==="function"&&define.amd){define(["jquery"],factory)}else if(typeof exports==="object"){module.exports=factory}else{factory(jQuery)}})(function($){var toFix=["wheel","mousewheel","DOMMouseScroll","MozMousePixelScroll"],toBind="onwheel"in document||document.documentMode>=9?["wheel"]:["mousewheel","DomMouseScroll","MozMousePixelScroll"],slice=Array.prototype.slice,nullLowestDeltaTimeout,lowestDelta;if($.event.fixHooks){for(var i=toFix.length;i;){$.event.fixHooks[toFix[--i]]=$.event.mouseHooks}}var special=$.event.special.mousewheel={version:"3.1.11",setup:function(){if(this.addEventListener){for(var i=toBind.length;i;){this.addEventListener(toBind[--i],handler,false)}}else{this.onmousewheel=handler}$.data(this,"mousewheel-line-height",special.getLineHeight(this));$.data(this,"mousewheel-page-height",special.getPageHeight(this))},teardown:function(){if(this.removeEventListener){for(var i=toBind.length;i;){this.removeEventListener(toBind[--i],handler,false)}}else{this.onmousewheel=null}$.removeData(this,"mousewheel-line-height");$.removeData(this,"mousewheel-page-height")},getLineHeight:function(elem){var $parent=$(elem)["offsetParent"in $.fn?"offsetParent":"parent"]();if(!$parent.length){$parent=$("body")}return parseInt($parent.css("fontSize"),10)},getPageHeight:function(elem){return $(elem).height()},settings:{adjustOldDeltas:true,normalizeOffset:true}};$.fn.extend({mousewheel:function(fn){return fn?this.bind("mousewheel",fn):this.trigger("mousewheel")},unmousewheel:function(fn){return this.unbind("mousewheel",fn)}});function handler(event){var orgEvent=event||window.event,args=slice.call(arguments,1),delta=0,deltaX=0,deltaY=0,absDelta=0,offsetX=0,offsetY=0;event=$.event.fix(orgEvent);event.type="mousewheel";if("detail"in orgEvent){deltaY=orgEvent.detail*-1}if("wheelDelta"in orgEvent){deltaY=orgEvent.wheelDelta}if("wheelDeltaY"in orgEvent){deltaY=orgEvent.wheelDeltaY}if("wheelDeltaX"in orgEvent){deltaX=orgEvent.wheelDeltaX*-1}if("axis"in orgEvent&&orgEvent.axis===orgEvent.HORIZONTAL_AXIS){deltaX=deltaY*-1;deltaY=0}delta=deltaY===0?deltaX:deltaY;if("deltaY"in orgEvent){deltaY=orgEvent.deltaY*-1;delta=deltaY}if("deltaX"in orgEvent){deltaX=orgEvent.deltaX;if(deltaY===0){delta=deltaX*-1}}if(deltaY===0&&deltaX===0){return}if(orgEvent.deltaMode===1){var lineHeight=$.data(this,"mousewheel-line-height");delta*=lineHeight;deltaY*=lineHeight;deltaX*=lineHeight}else if(orgEvent.deltaMode===2){var pageHeight=$.data(this,"mousewheel-page-height");delta*=pageHeight;deltaY*=pageHeight;deltaX*=pageHeight}absDelta=Math.max(Math.abs(deltaY),Math.abs(deltaX));if(!lowestDelta||absDelta<lowestDelta){lowestDelta=absDelta;if(shouldAdjustOldDeltas(orgEvent,absDelta)){lowestDelta/=40}}if(shouldAdjustOldDeltas(orgEvent,absDelta)){delta/=40;deltaX/=40;deltaY/=40}delta=Math[delta>=1?"floor":"ceil"](delta/lowestDelta);deltaX=Math[deltaX>=1?"floor":"ceil"](deltaX/lowestDelta);deltaY=Math[deltaY>=1?"floor":"ceil"](deltaY/lowestDelta);if(special.settings.normalizeOffset&&this.getBoundingClientRect){var boundingRect=this.getBoundingClientRect();offsetX=event.clientX-boundingRect.left;offsetY=event.clientY-boundingRect.top}event.deltaX=deltaX;event.deltaY=deltaY;event.deltaFactor=lowestDelta;event.offsetX=offsetX;event.offsetY=offsetY;event.deltaMode=0;args.unshift(event,delta,deltaX,deltaY);if(nullLowestDeltaTimeout){clearTimeout(nullLowestDeltaTimeout)}nullLowestDeltaTimeout=setTimeout(nullLowestDelta,200);return($.event.dispatch||$.event.handle).apply(this,args)}function nullLowestDelta(){lowestDelta=null}function shouldAdjustOldDeltas(orgEvent,absDelta){return special.settings.adjustOldDeltas&&orgEvent.type==="mousewheel"&&absDelta%120===0}});(function($){function supportAjaxUploadWithProgress(){return supportFileAPI()&&supportAjaxUploadProgressEvents()&&supportFormData();function supportFileAPI(){var fi=document.createElement("INPUT");fi.type="file";return"files"in fi}function supportAjaxUploadProgressEvents(){var xhr=new XMLHttpRequest;return!!(xhr&&"upload"in xhr&&"onprogress"in xhr.upload)}function supportFormData(){return!!window.FormData}}$.support.ajaxupload=supportAjaxUploadWithProgress();if($.support.ajaxupload){$.event.props.push("dataTransfer")}$.fn.uploadOnDrag=function(options){if(!$.support.ajaxupload){return this}return this.each(function(){var ele=$(this),settings=$.extend({action:"",single:false,method:"POST",params:{},loadstart:function(){},load:function(){},loadend:function(){},progress:function(){},complete:function(){},allcomplete:function(){},readystatechange:function(){}},options);ele.on("drop",function(e){e.stopPropagation();e.preventDefault();var files=e.dataTransfer.files;if(settings.single){var count=e.dataTransfer.files.length,uploaded=0,complete=settings.complete;settings.complete=function(response,xhr){uploaded=uploaded+1;complete(response,xhr);if(uploaded<count){upload([files[uploaded]],settings)}else{settings.allcomplete()}};upload([files[0]],settings)}else{upload(files,settings)}function upload(files,settings){var formData=new FormData,xhr=new XMLHttpRequest;for(var i=0,f;f=files[i];i++){formData.append("files[]",f)}for(var p in settings.params){formData.append(p,settings.params[p])}xhr.upload.addEventListener("progress",function(e){var percent=e.loaded/e.total*100;settings.progress(percent,e)},false);xhr.addEventListener("loadstart",function(e){settings.loadstart(e)},false);xhr.addEventListener("load",function(e){settings.load(e)},false);xhr.addEventListener("loadend",function(e){settings.loadend(e)},false);xhr.addEventListener("error",function(e){settings.error(e)},false);xhr.addEventListener("abort",function(e){settings.abort(e)},false);xhr.open(settings.method,settings.action,true);xhr.onreadystatechange=function(){settings.readystatechange(xhr);if(xhr.readyState==4){var response=xhr.responseText;if(settings.type=="json"){try{response=$.parseJSON(response)}catch(e){response=false}}settings.complete(response,xhr)}};xhr.send(formData)}}).on("dragover",function(e){e.stopPropagation();e.preventDefault()})})};$.fn.ajaxform=function(options){if(!$.support.ajaxupload){return this}return this.each(function(){var form=$(this),settings=$.extend({action:form.attr("action"),method:form.attr("method"),loadstart:function(){},load:function(){},loadend:function(){},progress:function(){},complete:function(){},readystatechange:function(){}},options);form.on("submit",function(e){e.preventDefault();var formData=new FormData(this),xhr=new XMLHttpRequest;formData.append("formdata","1");xhr.upload.addEventListener("progress",function(e){var percent=e.loaded/e.total*100;settings.progress(percent,e)},false);xhr.addEventListener("loadstart",function(e){settings.loadstart(e)},false);xhr.addEventListener("load",function(e){settings.load(e)},false);xhr.addEventListener("loadend",function(e){settings.loadend(e)},false);xhr.addEventListener("error",function(e){settings.error(e)},false);xhr.addEventListener("abort",function(e){settings.abort(e)},false);xhr.open(settings.method,settings.action,true);xhr.onreadystatechange=function(){settings.readystatechange(xhr);if(xhr.readyState==4){var response=xhr.responseText;if(settings.type=="json"){try{response=$.parseJSON(response)}catch(e){response=false}}settings.complete(response,xhr)}};xhr.send(formData)})})};if(!$.event.special.debouncedresize){var $event=$.event,$special,resizeTimeout;$special=$event.special.debouncedresize={setup:function(){$(this).on("resize",$special.handler)},teardown:function(){$(this).off("resize",$special.handler)},handler:function(event,execAsap){var context=this,args=arguments,dispatch=function(){event.type="debouncedresize";$event.dispatch.apply(context,args)};if(resizeTimeout){clearTimeout(resizeTimeout)}execAsap?dispatch():resizeTimeout=setTimeout(dispatch,$special.threshold)},threshold:150}}})(jQuery);
(function(nav,win,doc){if(win.matchMedia&&!nav.userAgent.match(/(iPhone|iPod|iPad)/i)){return}var bool,docElem=doc.documentElement,refNode=docElem.firstElementChild||docElem.firstChild,fakeBody=doc.createElement("body"),div=doc.createElement("div");div.id="mq-test-1";div.style.cssText="position:absolute;top:-100em";fakeBody.style.background="none";fakeBody.appendChild(div);function check(q){div.innerHTML='&shy;<style media="'+q+'"> #mq-test-1 { width: 42px; }</style>';docElem.insertBefore(fakeBody,refNode);bool=div.offsetWidth==42;docElem.removeChild(fakeBody);return bool}function update(query){var matches=check(query.media);if(query._listeners&&query.matches!=matches){query.matches=matches;for(var i=0,len=query._listeners.length;i<len;i++){query._listeners[i](query)}}}function debounce(func,wait,immediate){var timeout;return function(){var context=this,args=arguments;var later=function(){timeout=null;if(!immediate)func.apply(context,args)};var callNow=immediate&&!timeout;clearTimeout(timeout);timeout=setTimeout(later,wait);if(callNow)func.apply(context,args)}}win.matchMedia=function(q){var query,ls=[];query={matches:check(q),media:q,_listeners:ls,addListener:function(listener){if(typeof listener==="function")ls.push(listener)},removeListener:function(listener){for(var i=0,len=ls.length;i<len;i++)if(ls[i]===listener)delete ls[i]}};if(win.addEventListener){win.addEventListener("resize",debounce(function(){update(query)},150),false)}if(doc.addEventListener){doc.addEventListener("orientationchange",function(){update(query)},false)}return query}})(navigator,window,document);(function($,win,doc){if($["onMediaQuery"])return;var queries={},supported=win.matchMedia&&win.matchMedia("only all").matches;$(doc).ready(function(){for(var q in queries){var query=$(queries[q]).trigger("init");if(queries[q].matches){$(queries[q]).trigger("valid")}}});$(win).bind("load",function(){for(var q in queries){if(queries[q].matches){$(queries[q]).trigger("valid")}}});$.onMediaQuery=function(q,events){var query=q&&queries[q];if(!query){query=queries[q]=win.matchMedia(q);query.supported=supported;query.addListener(function(){$(query).trigger(query.matches?"valid":"invalid")})}$(query).bind(events);return query}})(jQuery,window,document);
jQuery(function($){$("#tabs").tabs().prev().append('<li class="version">'+$("#tabs").data("wkversion")+"</li>");$("#widgetkit").delegate(".box .deletable","click",function(e){$(this).parent().trigger("delete",[$(this)])});$("input:text").placeholder()});jQuery("body").bind("afterPreWpautop",function(e,o){o.data=o.unfiltered.replace(/caption\]\[caption/g,"caption] [caption").replace(/<object[\s\S]+?<\/object>/g,function(a){return a.replace(/[\r\n]+/g," ")})}).bind("afterWpautop",function(e,o){o.data=o.unfiltered});(function($){var storage={get:function(key){return window["sessionStorage"]?sessionStorage.getItem(key):null},set:function(key,data){if(window["sessionStorage"])sessionStorage.setItem(key,data)}};$.fn["tabs"]=function(){return this.each(function(){var content=$(this).addClass("content").wrap('<div class="tabs-box" />').before('<ul class="nav" />');var navigation=$(this).prev("ul.nav");content.children("li").each(function(){navigation.append("<li><a>"+$(this).hide().attr("data-name")+"</a></li>")});navigation.children("li").bind("click",function(e){e.preventDefault();var index=$("li",navigation).removeClass("active").index($(this).addClass("active").get(0));var tabs=content.children("li").hide();$(tabs[index]).show();storage.set("widgetkit-tab",index)});var current=parseInt(storage.get("widgetkit-tab"));$(!isNaN(current)?navigation.children("li").get(current):navigation.children("li:first")).trigger("click")})}})(jQuery);(function($){var Plugin=function(){};$.extend(Plugin.prototype,{name:"finder",initialize:function(element,options){var $this=this;this.options=$.extend({url:"",path:"",open:"open",loading:"loading"},options);element.data("path",this.options.path).bind("retrieve:finder",retrieve).trigger("retrieve:finder");function retrieve(e){e.preventDefault();var item=$(this).closest("li",element);if(!item.length){item=element}if(item.hasClass($this.options.open)){item.removeClass($this.options.open).children("ul").slideUp()}else{item.addClass($this.options.loading);$.post($this.options.url,{path:item.data("path")},function(data){item.removeClass($this.options.loading).addClass($this.options.open);if(!data.length)return;item.children().remove("ul");item.append("<ul>").children("ul").hide();$.each(data,function(i,val){item.children("ul").append($('<li><a href="#">'+val.name+"</a></li>").addClass(val.type).data("path",val.path))});item.find("ul a").bind("click",retrieve);item.children("ul").slideDown()},"json")}}}});$.fn[Plugin.prototype.name]=function(){var args=arguments;var method=args[0]?args[0]:null;return this.each(function(){var element=$(this);if(Plugin.prototype[method]&&element.data(Plugin.prototype.name)&&method!="initialize"){element.data(Plugin.prototype.name)[method].apply(element.data(Plugin.prototype.name),Array.prototype.slice.call(args,1))}else if(!method||$.isPlainObject(method)){var plugin=new Plugin;if(Plugin.prototype["initialize"]){plugin.initialize.apply(plugin,$.merge([element],args))}element.data(Plugin.prototype.name,plugin)}else{$.error("Method "+method+" does not exist on jQuery."+Plugin.name)}})}})(jQuery);(function($){var isInputSupported="placeholder"in document.createElement("input"),isTextareaSupported="placeholder"in document.createElement("textarea");if(isInputSupported&&isTextareaSupported){$.fn.placeholder=function(){return this}}else{$.fn.placeholder=function(){return this.filter((isInputSupported?"textarea":":input")+"[placeholder]").bind("focus.placeholder",clearPlaceholder).bind("blur.placeholder",setPlaceholder).trigger("blur.placeholder").end()}}function args(elem){var newAttrs={},rinlinejQuery=/^jQuery\d+$/;$.each(elem.attributes,function(i,attr){if(attr.specified&&!rinlinejQuery.test(attr.name)){newAttrs[attr.name]=attr.value}});return newAttrs}function clearPlaceholder(){var $input=$(this);if($input.val()===$input.attr("placeholder")&&$input.hasClass("placeholder")){if($input.data("placeholder-password")){$input.hide().next().show().focus()}else{$input.val("").removeClass("placeholder")}}}function setPlaceholder(elem){var $replacement,$input=$(this);if($input.val()===""||$input.val()===$input.attr("placeholder")){if($input.is(":password")){if(!$input.data("placeholder-textinput")){try{$replacement=$input.clone().attr({type:"text"})}catch(e){$replacement=$("<input>").attr($.extend(args($input[0]),{type:"text"}))}$replacement.removeAttr("name").data("placeholder-password",true).bind("focus.placeholder",clearPlaceholder);$input.data("placeholder-textinput",$replacement).before($replacement)}$input=$input.hide().prev().show()}$input.addClass("placeholder").val($input.attr("placeholder"))}else{$input.removeClass("placeholder")}}$(function(){$("form").bind("submit.placeholder",function(){var $inputs=$(".placeholder",this).each(clearPlaceholder);setTimeout(function(){$inputs.each(setPlaceholder)},10)})});$(window).bind("unload.placeholder",function(){$(".placeholder").val("")})})(jQuery);(function($){var $win=$(window),$doc=$(document),visible=false,persist=false,modal=null,overlay=null;$.modalwin=function(content,settings){var settings=settings||{};if(visible){$.modalwin.close()}if(typeof content==="object"){content=$(content);if(content.parent().length){this.persist=content;this.persist.data("modal-persist-parent",content.parent())}}else if(typeof content==="string"||typeof content==="number"){content=$("<div></div>").html(content)}else{content=$("<div></div>").html("Modalwin Error: Unsupported data type: "+typeof content)}modal=$('<div class="modalwin"><div class="inner"></div><div class="btnclose"></div>');modal.find(".inner:first").append(content);modal.css({position:"fixed","z-index":101}).find(".btnclose").click($.modalwin.close);overlay=$('<div class="modal-overlay"></div>').css({position:"absolute",left:0,top:0,width:$doc.width(),height:$doc.height(),"z-index":100}).bind("click",$.modalwin.close);$("body").append(overlay).append(modal.hide());modal.show().css({left:$win.width()/2-modal.width()/2,top:$win.height()/2-modal.height()/2}).fadeIn();visible=true};$.modalwin.close=function(){if(!visible)return;if(persist){persist.appendTo(this.persist.data("modal-persist-parent"));persist=false}modal.remove();overlay.remove();modal=null;overlay=null;visible=false};$win.bind("resize",function(){if(visible){modal.css({left:$win.width()/2-modal.width()/2,top:$win.height()/2-modal.height()/2});overlay.css({width:$doc.width(),height:$doc.height()})}})})(jQuery);
var widgetkitajax="http://localhost/africanbasscartel/wp-admin/admin-ajax.php?action=widgetkit&ajax=1";