$(document).ready(function(){var c=$(".sidebar-scrollbar");c.length!=0&&c.slimScroll({opacity:0,height:"100%",color:"#808080",size:"5px",touchScrollStep:50}).mouseover(function(){$(this).next(".slimScrollBar").css("opacity",.5)}),$(window).width()<768&&($(".sidebar-toggle").on("click",function(){$("body").css("overflow","hidden"),$("body").prepend('<div class="mobile-sticky-body-overlay"></div>')}),$(document).on("click",".mobile-sticky-body-overlay",function(i){$(this).remove(),$("#body").removeClass("sidebar-mobile-in").addClass("sidebar-mobile-out"),$("body").css("overflow","auto")}));var M=$(".sidebar");M.length!=0&&($(".sidebar .nav > .has-sub > a").click(function(){$(this).parent().siblings().removeClass("expand"),$(this).parent().toggleClass("expand")}),$(".sidebar .nav > .has-sub .has-sub > a").click(function(){$(this).parent().toggleClass("expand")})),$(window).width()<768&&$(document).on("click",".sidebar-toggle",function(i){i.preventDefault();var s="sidebar-mobile-in",o="sidebar-mobile-out",r="#body";$(r).hasClass(s)?$(r).removeClass(s).addClass(o):$(r).addClass(s).removeClass(o)});var e=$("#body");$(window).width()>=768&&(typeof window.isMinified>"u"&&(window.isMinified=!1),typeof window.isCollapsed>"u"&&(window.isCollapsed=!1),$("#sidebar-toggler").on("click",function(){(e.hasClass("sidebar-fixed-offcanvas")||e.hasClass("sidebar-static-offcanvas"))&&($(this).addClass("sidebar-offcanvas-toggle").removeClass("sidebar-toggle"),window.isCollapsed===!1?(e.addClass("sidebar-collapse"),window.isCollapsed=!0,window.isMinified=!1):(e.removeClass("sidebar-collapse"),e.addClass("sidebar-collapse-out"),setTimeout(function(){e.removeClass("sidebar-collapse-out")},300),window.isCollapsed=!1)),(e.hasClass("sidebar-fixed")||e.hasClass("sidebar-static"))&&($(this).addClass("sidebar-toggle").removeClass("sidebar-offcanvas-toggle"),window.isMinified===!1?(e.removeClass("sidebar-collapse sidebar-minified-out").addClass("sidebar-minified"),window.isMinified=!0,window.isCollapsed=!1):(e.removeClass("sidebar-minified"),e.addClass("sidebar-minified-out"),window.isMinified=!1))})),$(window).width()>=768&&$(window).width()<992&&(e.hasClass("sidebar-fixed")||e.hasClass("sidebar-static"))&&(e.removeClass("sidebar-collapse sidebar-minified-out").addClass("sidebar-minified"),window.isMinified=!0);function f(){var i=document.querySelectorAll(".todo-single-item .mdi");i.forEach(function(s){s.addEventListener("click",function(o){o.stopPropagation(),o.target.parentElement.classList.toggle("finished")})})}if(document.querySelector("#todo")){var b=document.querySelector("#todo-list"),S=document.querySelector("#todo-input"),u=S.querySelector("form"),n=u.querySelector("input");u.addEventListener("submit",function(i){i.preventDefault(),!(n.value.length<=0)&&(b.innerHTML='<div class="todo-single-item d-flex flex-row justify-content-between alert alert-dismissible fade show" role="alert"><i class="mdi"></i><span>'+n.value+'</span><div class="task-content"><span data-dismiss="alert" aria-label="Close"><svg class="remove-task" id="Capa_1" enable-background="new 0 0 515.556 515.556" height="16" viewBox="0 0 515.556 515.556" width="16" xmlns="http://www.w3.org/2000/svg"><path d="m64.444 451.111c0 35.526 28.902 64.444 64.444 64.444h257.778c35.542 0 64.444-28.918 64.444-64.444v-322.222h-386.666z"/><path d="m322.222 32.222v-32.222h-128.889v32.222h-161.111v64.444h451.111v-64.444z"/></svg></span></div></div>'+b.innerHTML,n.value="",f())}),f()}var t="right-sidebar-in",d="right-sidebar-out";if($(".nav-right-sidebar .nav-link").on("click",function(){e.hasClass(t)?$(this).hasClass("show")&&e.addClass(d).removeClass(t):e.addClass(t).removeClass(d)}),$(".card-right-sidebar .close").on("click",function(){e.removeClass(t).addClass(d)}),$(window).width()<=1024){var v="right-sidebar-toggoler-in",l="right-sidebar-toggoler-out";e.addClass(l),$(".btn-right-sidebar-toggler").on("click",function(){e.hasClass(l)?e.addClass(v).removeClass(l):e.addClass(l).removeClass(v)})}var h=$(".notify-toggler"),a=$(".dropdown-notify");h.length!==0&&(h.on("click",function(){a.is(":visible")?a.fadeOut(5):a.fadeIn(5)}),$(document).mouseup(function(i){!a.is(i.target)&&a.has(i.target).length===0&&a.fadeOut(5)}));var p=$('[data-toggle="tooltip"]');p.length!=0&&p.tooltip({container:"body",template:'<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'});var w=$('[data-toggle="popover"]');w.length!=0&&w.popover();function g(i){document.getElementById("toaster")&&(toastr.options={closeButton:!0,debug:!1,newestOnTop:!1,progressBar:!0,positionClass:i,preventDuplicates:!1,onclick:null,showDuration:"300",hideDuration:"1000",timeOut:"5000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut"},toastr.success("Welcome to sleek","Howdy!"))}document.dir!="rtl"?g("toast-top-right"):g("toast-top-left"),NProgress.done();var m=$(".js-example-basic-multiple");m.length!==0&&m.select2({});var C=$("#basic-data-table");C.length!==0&&C.DataTable({dom:'<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">'});var y=$("#responsive-data-table");y.length!==0&&y.DataTable({aLengthMenu:[[20,30,50,75,-1],[20,30,50,75,"All"]],pageLength:20,dom:'<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">'});var k=$("#hoverable-data-table");k.length!==0&&k.DataTable({aLengthMenu:[[20,30,50,75,-1],[20,30,50,75,"All"]],pageLength:20,dom:'<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">'});var T="#f5f6fa",x=$(".circle");x.length!==0&&x.circleProgress({lineCap:"round",startAngle:4.8,emptyFill:[T]})});
