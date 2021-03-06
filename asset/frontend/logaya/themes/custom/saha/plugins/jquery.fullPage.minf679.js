/*!
 * fullPage 2.7.4
 * https://github.com/alvarotrigo/fullPage.js
 * @license MIT licensed
 *
 * Copyright (C) 2015 alvarotrigo.com - A project by Alvaro Trigo
 */
(function(n,t){"function"==typeof define&&define.amd?define(["jquery"],function(i){return t(i,n,n.document,n.Math)}):"undefined"!=typeof exports?module.exports=t(require("jquery"),n,n.document,n.Math):t(jQuery,n,n.document,n.Math)})("undefined"!=typeof window?window:this,function(n,t,i,r,u){var f=n(t),e=n(i);n.fn.fullpage=function(o){function kr(){o.css3&&(o.css3=lu());o.anchors.length||(o.anchors=n("[data-anchor]").map(function(){return n(this).data("anchor").toString()}).get());dr();s.setAllowScrolling(!0);a=f.height();s.setAutoScrolling(o.autoScrolling,"internal");var i=n(".fp-section.active").find(".fp-slide.active");i.length&&(0!==n(".fp-section.active").index(".fp-section")||0===n(".fp-section.active").index(".fp-section")&&0!==i.index())&&ui(i);tr();cr();f.on("load",function(){var n=t.location.hash.replace("#","").split("/"),i=n[0],n=n[1];i&&(o.animateAnchor?ti(i,n):s.silentMoveTo(i,n))})}function dr(){h.css({height:"100%",position:"relative"});h.addClass("fullpage-wrapper");n("html").addClass("fp-enabled");h.removeClass("fp-destroyed");nu();n(".fp-section").each(function(t){var i=n(this),r=i.find(".fp-slide"),u=r.length;t||0!==n(".fp-section.active").length||i.addClass("active");i.css("height",a+"px");o.paddingTop&&i.css("padding-top",o.paddingTop);o.paddingBottom&&i.css("padding-bottom",o.paddingBottom);"undefined"!=typeof o.sectionsColor[t]&&i.css("background-color",o.sectionsColor[t]);"undefined"!=typeof o.anchors[t]&&i.attr("data-anchor",o.anchors[t]);"undefined"!=typeof o.anchors[t]&&i.hasClass("active")&&gt(o.anchors[t],t);o.menu&&o.css3&&n(o.menu).closest(".fullpage-wrapper").length&&n(o.menu).appendTo(l);0<u?gr(i,r,u):o.verticalCentered&&ur(i)});o.fixedElements&&o.css3&&n(o.fixedElements).appendTo(l);o.navigation&&iu();o.scrollOverflow?("complete"===i.readyState&&li(),f.on("load",li)):ai()}function gr(t,i,r){var u=100*r,f=100/r;i.wrapAll('<div class="fp-slidesContainer" />');i.parent().wrap('<div class="fp-slides" />');t.find(".fp-slidesContainer").css("width",u+"%");1<r&&(o.controlArrows&&tu(t),o.slidesNavigation&&cu(t,r));i.each(function(){n(this).css("width",f+"%");o.verticalCentered&&ur(n(this))});t=t.find(".fp-slide.active");t.length&&(0!==n(".fp-section.active").index(".fp-section")||0===n(".fp-section.active").index(".fp-section")&&0!==t.index())?ui(t):i.eq(0).addClass("active")}function nu(){n(o.sectionSelector).each(function(){n(this).addClass("fp-section")});n(o.slideSelector).each(function(){n(this).addClass("fp-slide")})}function tu(n){n.find(".fp-slides").after('<div class="fp-controlArrow fp-prev"><\/div><div class="fp-controlArrow fp-next"><\/div>');"#fff"!=o.controlArrowColor&&(n.find(".fp-controlArrow.fp-next").css("border-color","transparent transparent transparent "+o.controlArrowColor),n.find(".fp-controlArrow.fp-prev").css("border-color","transparent "+o.controlArrowColor+" transparent transparent"));o.loopHorizontal||n.find(".fp-controlArrow.fp-prev").hide()}function iu(){var u,i,t,r;for(l.append('<div id="fp-nav"><ul><\/ul><\/div>'),u=n("#fp-nav"),u.addClass(function(){return o.showActiveTooltip?"fp-show-active "+o.navigationPosition:o.navigationPosition}),i=0;i<n(".fp-section").length;i++)t="",o.anchors.length&&(t=o.anchors[i]),t='<li><a href="#'+t+'"><span><\/span><\/a>',r=o.navigationTooltips[i],"undefined"!=typeof r&&""!==r&&(t+='<div class="fp-tooltip '+o.navigationPosition+'">'+r+"<\/div>"),t+="<\/li>",u.find("ul").append(t);n("#fp-nav").css("margin-top","-"+n("#fp-nav").height()/2+"px");n("#fp-nav").find("li").eq(n(".fp-section.active").index(".fp-section")).find("a").addClass("active")}function li(){n(".fp-section").each(function(){var t=n(this).find(".fp-slide");t.length?t.each(function(){st(n(this))}):st(n(this))});ai()}function ai(){var t=n(".fp-section.active"),i=t.find("SLIDES_WRAPPER"),r=t.find(".fp-scrollable");i.length&&(r=i.find(".fp-slide.active"));r.mouseover();ot(t);di(t);n.isFunction(o.afterLoad)&&o.afterLoad.call(t,t.data("anchor"),t.index(".fp-section")+1);n.isFunction(o.afterRender)&&o.afterRender.call(h)}function vi(){var t,s,a,y;if(!o.autoScrolling||o.scrollBar){for(var h=f.scrollTop(),c=0,l=r.abs(h-i.querySelectorAll(".fp-section")[0].offsetTop),e=i.querySelectorAll(".fp-section"),u=0;u<e.length;++u)s=r.abs(h-e[u].offsetTop),s<l&&(c=u,l=s);t=n(e).eq(c);t.hasClass("active")||t.hasClass("fp-auto-height")||(yt=!0,h=n(".fp-section.active"),c=h.index(".fp-section")+1,l=ni(t),e=t.data("anchor"),u=t.index(".fp-section")+1,s=t.find(".fp-slide.active"),s.length&&(a=s.data("anchor"),y=s.index()),w&&(t.addClass("active").siblings().removeClass("active"),n.isFunction(o.onLeave)&&o.onLeave.call(h,c,u,l),n.isFunction(o.afterLoad)&&o.afterLoad.call(t,e,u),ot(t),gt(e,u-1),o.anchors.length&&(g=e,ii(y,a,e,u))),clearTimeout(hi),hi=setTimeout(function(){yt=!1},100));o.fitToSection&&(clearTimeout(ci),ci=setTimeout(function(){w&&o.fitToSection&&(n(".fp-section.active").is(t)&&requestAnimFrame(function(){v=!0}),d(t),requestAnimFrame(function(){v=!1}))},o.fitToSectionDelay))}}function yi(n){return n.find(".fp-slides").length?n.find(".fp-slide.active").find(".fp-scrollable"):n.find(".fp-scrollable")}function et(n,t){if(c.m[n]){var i,r;if("down"==n?(i="bottom",r=s.moveSectionDown):(i="top",r=s.moveSectionUp),0<t.length)if(i="top"===i?!t.scrollTop():"bottom"===i?t.scrollTop()+1+t.innerHeight()>=t[0].scrollHeight:void 0,i)r();else return!0;else r()}}function ru(t){var i=t.originalEvent,u;!pi(t.target)&&kt(i)&&(o.autoScrolling&&t.preventDefault(),t=n(".fp-section.active"),u=yi(t),w&&!p&&(i=ar(i),ut=i.y,wt=i.x,t.find(".fp-slides").length&&r.abs(pt-wt)>r.abs(rt-ut)?r.abs(pt-wt)>f.width()/100*o.touchSensitivity&&(pt>wt?c.m.right&&s.moveSlideRight():c.m.left&&s.moveSlideLeft()):o.autoScrolling&&r.abs(rt-ut)>f.height()/100*o.touchSensitivity&&(rt>ut?et("down",u):ut>rt&&et("up",u))))}function pi(t,i){i=i||0;var r=n(t).parent();return i<o.normalScrollElementTouchThreshold&&r.is(o.normalScrollElements)?!0:i==o.normalScrollElementTouchThreshold?!1:pi(r,++i)}function kt(n){return"undefined"==typeof n.pointerType||"mouse"!=n.pointerType}function uu(n){n=n.originalEvent;o.fitToSection&&y.stop();kt(n)&&(n=ar(n),rt=n.y,pt=n.x)}function wi(n,t){for(var u=0,f=n.slice(r.max(n.length-t,1)),i=0;i<f.length;i++)u+=f[i];return r.ceil(u/t)}function k(i){var f=(new Date).getTime();if(o.autoScrolling&&!vt){i=i||t.event;var u=i.wheelDelta||-i.deltaY||-i.detail,s=r.max(-1,r.min(1,u)),e="undefined"!=typeof i.wheelDeltaX||"undefined"!=typeof i.deltaX,e=r.abs(i.wheelDeltaX)<r.abs(i.wheelDelta)||r.abs(i.deltaX)<r.abs(i.deltaY)||!e;return 149<nt.length&&nt.shift(),nt.push(r.abs(u)),o.scrollBar&&(i.preventDefault?i.preventDefault():i.returnValue=!1),i=n(".fp-section.active"),i=yi(i),u=f-br,br=f,200<u&&(nt=[]),w&&(f=wi(nt,10),u=wi(nt,70),f>=u&&e&&(0>s?et("down",i):et("up",i))),!1}o.fitToSection&&y.stop()}function bi(t){var r=n(".fp-section.active").find(".fp-slides"),i=r.find(".fp-slide").length;if(!(!r.length||p||2>i)){var i=r.find(".fp-slide.active"),u=null,u="prev"===t?i.prev(".fp-slide"):i.next(".fp-slide");if(!u.length){if(!o.loopHorizontal)return;u="prev"===t?i.siblings(":last"):i.siblings(":first")}p=!0;tt(r,u)}}function ki(){n(".fp-slide.active").each(function(){ui(n(this),"internal")})}function d(t,i,r){requestAnimFrame(function(){var u=t.position(),e,s,h;if("undefined"!=typeof u&&(e=t.hasClass("fp-auto-height")?u.top-a+t.height():u.top,u={element:t,callback:i,isMovementUp:r,dest:u,dtop:e,yMovement:ni(t),anchorLink:t.data("anchor"),sectionIndex:t.index(".fp-section"),activeSlide:t.find(".fp-slide.active"),activeSection:n(".fp-section.active"),leavingSection:n(".fp-section.active").index(".fp-section")+1,localIsResizing:v},!(u.activeSection.is(t)&&!v||o.scrollBar&&f.scrollTop()===u.dtop&&!t.hasClass("fp-auto-height")))){if(u.activeSlide.length&&(s=u.activeSlide.data("anchor"),h=u.activeSlide.index()),o.autoScrolling&&o.continuousVertical&&"undefined"!=typeof u.isMovementUp&&(!u.isMovementUp&&"up"==u.yMovement||u.isMovementUp&&"down"==u.yMovement)&&(u.isMovementUp?n(".fp-section.active").before(u.activeSection.nextAll(".fp-section")):n(".fp-section.active").after(u.activeSection.prevAll(".fp-section").get().reverse()),it(n(".fp-section.active").position().top),ki(),u.wrapAroundElements=u.activeSection,u.dest=u.element.position(),u.dtop=u.dest.top,u.yMovement=ni(u.element)),n.isFunction(o.onLeave)&&!u.localIsResizing){if(!1===o.onLeave.call(u.activeSection,u.leavingSection,u.sectionIndex+1,u.yMovement))return;ou(u.activeSection)}t.addClass("active").siblings().removeClass("active");ot(t);w=!1;ii(h,s,u.anchorLink,u.sectionIndex);fu(u);g=u.anchorLink;gt(u.anchorLink,u.sectionIndex)}})}function fu(t){if(o.css3&&o.autoScrolling&&!o.scrollBar)er("translate3d(0px, -"+t.dtop+"px, 0px)",!0),o.scrollingSpeed?oi=setTimeout(function(){dt(t)},o.scrollingSpeed):dt(t);else{var i=eu(t);n(i.element).animate(i.options,o.scrollingSpeed,o.easing).promise().done(function(){dt(t)})}}function eu(n){var t={};return o.autoScrolling&&!o.scrollBar?(t.options={top:-n.dtop},t.element=".fullpage-wrapper"):(t.options={scrollTop:n.dtop},t.element="html, body"),t}function dt(t){t.wrapAroundElements&&t.wrapAroundElements.length&&(t.isMovementUp?n(".fp-section:first").before(t.wrapAroundElements):n(".fp-section:last").after(t.wrapAroundElements),it(n(".fp-section.active").position().top),ki());t.element.find(".fp-scrollable").mouseover();n.isFunction(o.afterLoad)&&!t.localIsResizing&&o.afterLoad.call(t.element,t.anchorLink,t.sectionIndex+1);di(t.element);w=!0;n.isFunction(t.callback)&&t.callback.call(this)}function ot(t){var i=t.find(".fp-slide.active");i.length&&(t=n(i));t.find("img[data-src], source[data-src], audio[data-src]").each(function(){n(this).attr("src",n(this).data("src"));n(this).removeAttr("data-src");n(this).is("source")&&n(this).closest("video").get(0).load()})}function di(t){t.find("video, audio").each(function(){var t=n(this).get(0);t.hasAttribute("autoplay")&&"function"==typeof t.play&&t.play()})}function ou(t){t.find("video, audio").each(function(){var t=n(this).get(0);t.hasAttribute("data-ignore")||"function"!=typeof t.pause||t.pause()})}function gi(){if(!yt&&!o.lockAnchors){var n=t.location.hash.replace("#","").split("/"),i=n[0],n=n[1],r="undefined"==typeof g,u="undefined"==typeof g&&"undefined"==typeof n&&!p;i.length&&(i&&i!==g&&!r||u||!p&&fi!=n)&&ti(i,n)}}function su(n){w&&(n.pageY<ft?s.moveSectionUp():n.pageY>ft&&s.moveSectionDown());ft=n.pageY}function tt(t,i){var e=i.position(),u=i.index(),f=t.closest(".fp-section"),h=f.index(".fp-section"),c=f.data("anchor"),b=f.find(".fp-slidesNav"),k=ri(i),l=v,a,s,y,w;if(o.onSlideLeave&&(a=f.find(".fp-slide.active"),s=a.index(),y=s==u?"none":s>u?"left":"right",!l&&"none"!==y&&n.isFunction(o.onSlideLeave)&&!1===o.onSlideLeave.call(a,c,h+1,s,y,u))){p=!1;return}i.addClass("active").siblings().removeClass("active");l||ot(i);!o.loopHorizontal&&o.controlArrows&&(f.find(".fp-controlArrow.fp-prev").toggle(0!==u),f.find(".fp-controlArrow.fp-next").toggle(!i.is(":last-child")));f.hasClass("active")&&ii(u,k,c,h);w=function(){l||n.isFunction(o.afterSlideLoad)&&o.afterSlideLoad.call(i,c,h+1,k,u);p=!1};o.css3?(e="translate3d(-"+r.round(e.left)+"px, 0px, 0px)",ir(t.find(".fp-slidesContainer"),0<o.scrollingSpeed).css(vr(e)),si=setTimeout(function(){w()},o.scrollingSpeed,o.easing)):t.animate({scrollLeft:r.round(e.left)},o.scrollingSpeed,o.easing,function(){w()});b.find(".active").removeClass("active");b.find("li").eq(u).find("a").addClass("active")}function nr(){if(tr(),lt){var t=n(i.activeElement);t.is("textarea")||t.is("input")||t.is("select")||(t=f.height(),r.abs(t-bt)>r.max(bt,t)/5&&(s.reBuild(!0),bt=t))}else clearTimeout(ei),ei=setTimeout(function(){s.reBuild(!0)},350)}function tr(){var n=o.responsive||o.responsiveWidth,t=o.responsiveHeight,i=n&&f.width()<n,r=t&&f.height()<t;n&&t?s.setResponsive(i||r):n?s.setResponsive(i):t&&s.setResponsive(r)}function ir(n){var t="all "+o.scrollingSpeed+"ms "+o.easingcss3;return n.removeClass("fp-notransition"),n.css({"-webkit-transition":t,transition:t})}function hu(n,t){if(825>n||900>t){var i=r.min(100*n/825,t/9).toFixed(2);l.css("font-size",i+"%")}else l.css("font-size","100%")}function gt(t,i){o.menu&&(n(o.menu).find(".active").removeClass("active"),n(o.menu).find('[data-menuanchor="'+t+'"]').addClass("active"));o.navigation&&(n("#fp-nav").find(".active").removeClass("active"),t?n("#fp-nav").find('a[href="#'+t+'"]').addClass("active"):n("#fp-nav").find("li").eq(i).find("a").addClass("active"))}function ni(t){var i=n(".fp-section.active").index(".fp-section");return t=t.index(".fp-section"),i==t?"none":i>t?"up":"down"}function st(n){n.css("overflow","hidden");var t=n.closest(".fp-section"),i=n.find(".fp-scrollable"),r;i.length?r=i.get(0).scrollHeight:(r=n.get(0).scrollHeight,o.verticalCentered&&(r=n.find(".fp-tableCell").get(0).scrollHeight));t=a-parseInt(t.css("padding-bottom"))-parseInt(t.css("padding-top"));r>t?i.length?i.css("height",t+"px").parent().css("height",t+"px"):(o.verticalCentered?n.find(".fp-tableCell").wrapInner('<div class="fp-scrollable" />'):n.wrapInner('<div class="fp-scrollable" />'),n.find(".fp-scrollable").slimScroll({allowPageScroll:!0,height:t+"px",size:"10px",alwaysVisible:!0})):rr(n);n.css("overflow","")}function rr(n){n.find(".fp-scrollable").children().first().unwrap().unwrap();n.find(".slimScrollBar").remove();n.find(".slimScrollRail").remove()}function ur(n){n.addClass("fp-table").wrapInner('<div class="fp-tableCell" style="height:'+fr(n)+'px;" />')}function fr(n){var t=a;return(o.paddingTop||o.paddingBottom)&&(t=n,t.hasClass("fp-section")||(t=n.closest(".fp-section")),n=parseInt(t.css("padding-top"))+parseInt(t.css("padding-bottom")),t=a-n),t}function er(n,t){t?ir(h):h.addClass("fp-notransition");h.css(vr(n));setTimeout(function(){h.removeClass("fp-notransition")},10)}function or(t){var i=n('.fp-section[data-anchor="'+t+'"]');return i.length||(i=n(".fp-section").eq(t-1)),i}function ti(n,t){var i=or(n);"undefined"==typeof t&&(t=0);n===g||i.hasClass("active")?sr(i,t):d(i,function(){sr(i,t)})}function sr(n,t){var u,i,r;"undefined"!=typeof t&&(u=n.find(".fp-slides"),i=n.find(".fp-slides"),r=i.find('.fp-slide[data-anchor="'+t+'"]'),r.length||(r=i.find(".fp-slide").eq(t)),i=r,i.length&&tt(u,i))}function cu(n,t){var i,r;for(n.append('<div class="fp-slidesNav"><ul><\/ul><\/div>'),i=n.find(".fp-slidesNav"),i.addClass(o.slidesNavPosition),r=0;r<t;r++)i.find("ul").append('<li><a href="#"><span><\/span><\/a><\/li>');i.css("margin-left","-"+i.width()/2+"px");i.find("li").first().find("a").addClass("active")}function ii(n,t,i,r){r="";o.anchors.length&&!o.lockAnchors&&(n?("undefined"!=typeof i&&(r=i),"undefined"==typeof t&&(t=n),fi=t,hr(r+"/"+t)):("undefined"!=typeof n&&(fi=t),hr(i)));cr()}function hr(n){if(o.recordHistory)location.hash=n;else if(lt||at)history.replaceState(u,u,"#"+n);else{var i=t.location.href.split("#")[0];t.location.replace(i+"#"+n)}}function ri(n){var t=n.data("anchor");return n=n.index(),"undefined"==typeof t&&(t=n),t}function cr(){var t=n(".fp-section.active"),i=t.find(".fp-slide.active"),r=ri(t),u=ri(i);t.index(".fp-section");t=String(r);i.length&&(t=t+"-"+u);t=t.replace("/","-").replace("#","");l[0].className=l[0].className.replace(RegExp("\\b\\s?fp-viewing-[^\\s]+\\b","g"),"");l.addClass("fp-viewing-"+t)}function lu(){var n=i.createElement("p"),r,e={webkitTransform:"-webkit-transform",OTransform:"-o-transform",msTransform:"-ms-transform",MozTransform:"-moz-transform",transform:"transform"},f;i.body.insertBefore(n,null);for(f in e)n.style[f]!==u&&(n.style[f]="translate3d(1px,1px,1px)",r=t.getComputedStyle(n).getPropertyValue(e[f]));return i.body.removeChild(n),r!==u&&0<r.length&&"none"!==r}function au(){if(lt||at){var t=lr();n(".fullpage-wrapper").off("touchstart "+t.down).on("touchstart "+t.down,uu);n(".fullpage-wrapper").off("touchmove "+t.move).on("touchmove "+t.move,ru)}}function vu(){if(lt||at){var t=lr();n(".fullpage-wrapper").off("touchstart "+t.down);n(".fullpage-wrapper").off("touchmove "+t.move)}}function lr(){return t.PointerEvent?{down:"pointerdown",move:"pointermove"}:{down:"MSPointerDown",move:"MSPointerMove"}}function ar(n){var t=[];return t.y="undefined"!=typeof n.pageY&&(n.pageY||n.pageX)?n.pageY:n.touches[0].pageY,t.x="undefined"!=typeof n.pageX&&(n.pageY||n.pageX)?n.pageX:n.touches[0].pageX,at&&kt(n)&&o.scrollBar&&(t.y=n.touches[0].pageY,t.x=n.touches[0].pageX),t}function ui(n,t){s.setScrollingSpeed(0,"internal");"undefined"!=typeof t&&(v=!0);tt(n.closest(".fp-slides"),n);"undefined"!=typeof t&&(v=!1);s.setScrollingSpeed(b.scrollingSpeed,"internal")}function it(n){o.scrollBar?h.scrollTop(n):o.css3?er("translate3d(0px, -"+n+"px, 0px)",!1):h.css("top",-n)}function vr(n){return{"-webkit-transform":n,"-moz-transform":n,"-ms-transform":n,transform:n}}function yr(n,t,i){switch(t){case"up":c[i].up=n;break;case"down":c[i].down=n;break;case"left":c[i].left=n;break;case"right":c[i].right=n;break;case"all":"m"==i?s.setAllowScrolling(n):s.setKeyboardScrolling(n)}}function yu(){it(0);n("#fp-nav, .fp-slidesNav, .fp-controlArrow").remove();n(".fp-section").css({height:"","background-color":"",padding:""});n(".fp-slide").css({width:""});h.css({height:"",position:"","-ms-touch-action":"","touch-action":""});y.css({overflow:"",height:""});n("html").removeClass("fp-enabled");n.each(l.get(0).className.split(/\s+/),function(n,t){0===t.indexOf("fp-viewing")&&l.removeClass(t)});n(".fp-section, .fp-slide").each(function(){rr(n(this));n(this).removeClass("fp-table active")});h.addClass("fp-notransition");h.find(".fp-tableCell, .fp-slidesContainer, .fp-slides").each(function(){n(this).replaceWith(this.childNodes)});y.scrollTop(0)}function ht(n,t,i){o[n]=t;"internal"!==i&&(b[n]=t)}function ct(n,t){console&&console[n]&&console[n]("fullPage: "+t)}var y=n("html, body"),l=n("body"),s=n.fn.fullpage,b,ei,oi,si,hi,ci,wr,yt,ft,bt;o=n.extend({menu:!1,anchors:[],lockAnchors:!1,navigation:!1,navigationPosition:"right",navigationTooltips:[],showActiveTooltip:!1,slidesNavigation:!1,slidesNavPosition:"bottom",scrollBar:!1,css3:!0,scrollingSpeed:700,autoScrolling:!0,fitToSection:!0,fitToSectionDelay:1e3,easing:"easeInOutCubic",easingcss3:"ease",loopBottom:!1,loopTop:!1,loopHorizontal:!0,continuousVertical:!1,normalScrollElements:null,scrollOverflow:!1,touchSensitivity:5,normalScrollElementTouchThreshold:5,keyboardScrolling:!0,animateAnchor:!0,recordHistory:!0,controlArrows:!0,controlArrowColor:"#fff",verticalCentered:!0,resize:!1,sectionsColor:[],paddingTop:0,paddingBottom:0,fixedElements:null,responsive:0,responsiveWidth:0,responsiveHeight:0,sectionSelector:".section",slideSelector:".slide",afterLoad:null,onLeave:null,afterRender:null,afterResize:null,afterReBuild:null,afterSlideLoad:null,onSlideLeave:null},o),function(){o.continuousVertical&&(o.loopTop||o.loopBottom)&&(o.continuousVertical=!1,ct("warn","Option `loopTop/loopBottom` is mutually exclusive with `continuousVertical`; `continuousVertical` disabled"));o.scrollBar&&o.scrollOverflow&&ct("warn","Option `scrollBar` is mutually exclusive with `scrollOverflow`. Sections with scrollOverflow might not work well in Firefox");o.continuousVertical&&o.scrollBar&&(o.continuousVertical=!1,ct("warn","Option `scrollBar` is mutually exclusive with `continuousVertical`; `continuousVertical` disabled"));n.each(o.anchors,function(t,i){(n("#"+i).length||n('[name="'+i+'"]').length)&&ct("error","data-anchor tags can not have the same value as any `id` element on the site (or `name` element for IE).")})}();n.extend(n.easing,{easeInOutCubic:function(n,t,i,r,u){return 1>(t/=u/2)?r/2*t*t*t+i:r/2*((t-=2)*t*t+2)+i}});n.extend(n.easing,{easeInQuart:function(n,t,i,r,u){return r*(t/=u)*t*t*t+i}});s.setAutoScrolling=function(t,i){ht("autoScrolling",t,i);var r=n(".fp-section.active");o.autoScrolling&&!o.scrollBar?(y.css({overflow:"hidden",height:"100%"}),s.setRecordHistory(b.recordHistory,"internal"),h.css({"-ms-touch-action":"none","touch-action":"none"}),r.length&&it(r.position().top)):(y.css({overflow:"visible",height:"initial"}),s.setRecordHistory(!1,"internal"),h.css({"-ms-touch-action":"","touch-action":""}),it(0),r.length&&y.scrollTop(r.position().top))};s.setRecordHistory=function(n,t){ht("recordHistory",n,t)};s.setScrollingSpeed=function(n,t){ht("scrollingSpeed",n,t)};s.setFitToSection=function(n,t){ht("fitToSection",n,t)};s.setLockAnchors=function(n){o.lockAnchors=n};s.setMouseWheelScrolling=function(n){var r,f;n?(n="",t.addEventListener?r="addEventListener":(r="attachEvent",n="on"),f="onwheel"in i.createElement("div")?"wheel":i.onmousewheel!==u?"mousewheel":"DOMMouseScroll","DOMMouseScroll"==f?i[r](n+"MozMousePixelScroll",k,!1):i[r](n+f,k,!1)):i.addEventListener?(i.removeEventListener("mousewheel",k,!1),i.removeEventListener("wheel",k,!1),i.removeEventListener("MozMousePixelScroll",k,!1)):i.detachEvent("onmousewheel",k)};s.setAllowScrolling=function(t,i){"undefined"!=typeof i?(i=i.replace(/ /g,"").split(","),n.each(i,function(n,i){yr(t,i,"m")})):t?(s.setMouseWheelScrolling(!0),au()):(s.setMouseWheelScrolling(!1),vu())};s.setKeyboardScrolling=function(t,i){"undefined"!=typeof i?(i=i.replace(/ /g,"").split(","),n.each(i,function(n,i){yr(t,i,"k")})):o.keyboardScrolling=t};s.moveSectionUp=function(){var t=n(".fp-section.active").prev(".fp-section");!t.length&&(o.loopTop||o.continuousVertical)&&(t=n(".fp-section").last());t.length&&d(t,null,!0)};s.moveSectionDown=function(){var t=n(".fp-section.active").next(".fp-section");!t.length&&(o.loopBottom||o.continuousVertical)&&(t=n(".fp-section").first());t.length&&d(t,null,!1)};s.silentMoveTo=function(n,t){requestAnimFrame(function(){s.setScrollingSpeed(0,"internal")});s.moveTo(n,t);requestAnimFrame(function(){s.setScrollingSpeed(b.scrollingSpeed,"internal")})};s.moveTo=function(n,t){var i=or(n);"undefined"!=typeof t?ti(n,t):0<i.length&&d(i)};s.moveSlideRight=function(){bi("next")};s.moveSlideLeft=function(){bi("prev")};s.reBuild=function(t){if(!h.hasClass("fp-destroyed")){requestAnimFrame(function(){v=!0});var i=f.width();a=f.height();o.resize&&hu(a,i);n(".fp-section").each(function(){var i=n(this).find(".fp-slides"),t=n(this).find(".fp-slide");o.verticalCentered&&n(this).find(".fp-tableCell").css("height",fr(n(this))+"px");n(this).css("height",a+"px");o.scrollOverflow&&(t.length?t.each(function(){st(n(this))}):st(n(this)));1<t.length&&tt(i,i.find(".fp-slide.active"))});(i=n(".fp-section.active").index(".fp-section"))&&s.silentMoveTo(i+1);requestAnimFrame(function(){v=!1});n.isFunction(o.afterResize)&&t&&o.afterResize.call(h);n.isFunction(o.afterReBuild)&&!t&&o.afterReBuild.call(h)}};s.setResponsive=function(t){var i=h.hasClass("fp-responsive");t?i||(s.setAutoScrolling(!1,"internal"),s.setFitToSection(!1,"internal"),n("#fp-nav").hide(),h.addClass("fp-responsive")):i&&(s.setAutoScrolling(b.autoScrolling,"internal"),s.setFitToSection(b.autoScrolling,"internal"),n("#fp-nav").show(),h.removeClass("fp-responsive"))};var p=!1,lt=navigator.userAgent.match(/(iPhone|iPod|iPad|Android|playbook|silk|BlackBerry|BB10|Windows Phone|Tizen|Bada|webOS|IEMobile|Opera Mini)/),at="ontouchstart"in t||0<navigator.msMaxTouchPoints||navigator.maxTouchPoints,h=n(this),a=f.height(),v=!1,pr=!0,g,fi,w=!0,nt=[],vt,c={m:{up:!0,down:!0,left:!0,right:!0}};c.k=n.extend(!0,{},c.m);b=n.extend(!0,{},o);n(this).length&&kr();yt=!1;f.on("scroll",vi);var rt=0,pt=0,ut=0,wt=0,br=(new Date).getTime();t.requestAnimFrame=function(){return t.requestAnimationFrame||t.webkitRequestAnimationFrame||t.mozRequestAnimationFrame||t.oRequestAnimationFrame||t.msRequestAnimationFrame||function(n){n()}}();f.on("hashchange",gi);e.keydown(function(t){clearTimeout(wr);var i=n(":focus");i.is("textarea")||i.is("input")||i.is("select")||!o.keyboardScrolling||!o.autoScrolling||(-1<n.inArray(t.which,[40,38,32,33,34])&&t.preventDefault(),vt=t.ctrlKey,wr=setTimeout(function(){var i=t.shiftKey;switch(t.which){case 38:case 33:c.k.up&&s.moveSectionUp();break;case 32:if(i&&c.k.up){s.moveSectionUp();break}case 40:case 34:c.k.down&&s.moveSectionDown();break;case 36:c.k.up&&s.moveTo(1);break;case 35:c.k.down&&s.moveTo(n(".fp-section").length);break;case 37:c.k.left&&s.moveSlideLeft();break;case 39:c.k.right&&s.moveSlideRight()}},150))});e.keyup(function(n){pr&&(vt=n.ctrlKey)});n(t).blur(function(){vt=pr=!1});h.mousedown(function(n){2==n.which&&(ft=n.pageY,h.on("mousemove",su))});h.mouseup(function(n){2==n.which&&h.off("mousemove")});ft=0;e.on("click touchstart","#fp-nav a",function(t){t.preventDefault();t=n(this).parent().index();d(n(".fp-section").eq(t))});e.on("click touchstart",".fp-slidesNav a",function(t){t.preventDefault();t=n(this).closest(".fp-section").find(".fp-slides");var i=t.find(".fp-slide").eq(n(this).closest("li").index());tt(t,i)});o.normalScrollElements&&(e.on("mouseenter",o.normalScrollElements,function(){s.setMouseWheelScrolling(!1)}),e.on("mouseleave",o.normalScrollElements,function(){s.setMouseWheelScrolling(!0)}));n(".fp-section").on("click touchstart",".fp-controlArrow",function(){n(this).hasClass("fp-prev")?c.m.left&&s.moveSlideLeft():c.m.right&&s.moveSlideRight()});f.resize(nr);bt=a;s.destroy=function(t){s.setAutoScrolling(!1,"internal");s.setAllowScrolling(!1);s.setKeyboardScrolling(!1);h.addClass("fp-destroyed");clearTimeout(si);clearTimeout(oi);clearTimeout(ei);clearTimeout(hi);clearTimeout(ci);f.off("scroll",vi).off("hashchange",gi).off("resize",nr);e.off("click","#fp-nav a").off("mouseenter","#fp-nav li").off("mouseleave","#fp-nav li").off("click",".fp-slidesNav a").off("mouseover",o.normalScrollElements).off("mouseout",o.normalScrollElements);n(".fp-section").off("click",".fp-controlArrow");clearTimeout(si);clearTimeout(oi);t&&yu()}}});
/*
* Pixor - Copyright (c) 2015 Federico Schiocchet - Pixor (www.pixor.it)
*/

(function ($) {

    var _anchorLink = 1;
    var sections_count = 0;
    var slides_count = 0;
    var vs = ".background-page video";
    var current_index = 0;

    function updateHorizontalMenu(i) {
        $("#fullpage-horizontal-menu li").removeClass("active").removeClass("current-active");
        $("#fullpage-horizontal-menu li:eq(" + i + ")").addClass("active").addClass("current-active");
        $(".fullpage-arrow .arrow").css("opacity", "0").css("visibility", "hidden");
        if (i > 0) $(".fullpage-arrow .left").css("visibility", "visible").showAnima("fade-right");
        if (i < slides_count - 1) $(".fullpage-arrow .right").css("visibility", "visible").showAnima("fade-left");
    }
    function afterLoad(anchorLink, index) {
        current_index = index;
        if (!isEmpty(anchorLink)) _anchorLink = anchorLink;
        var el = $('#fullpage-main .section').eq(index - 1);

        $(".fullpage-varrow .arrow").css("opacity", "0").css("visibility", "hidden");
        if (index < sections_count) $(".fullpage-varrow .arrow.down").css("visibility", "visible").showAnima("fade-top");
        if (index > 1) $(".fullpage-varrow .arrow.up").css("visibility", "visible").showAnima("fade-bottom");

        startFullpageAnima(index, 0);
        slides_count = $(el).find(".slide").length;
    }
    function startFullpageAnima(index, slideIndex) {
        var selector = "#fullpage-main .section:eq(" + (index - 1) + ")";
        if ($(selector + " .slide").length) {
            selector = selector + " .slide:eq(" + (slideIndex) + ") *[data-fullpage-anima]";
        } else selector = selector + " *[data-fullpage-anima]";
        $(selector).each(function () {
            $(this).attr("data-anima", $(this).attr("data-fullpage-anima"));
            initAnima(this);
        });
    }
    function updateVideos(index, slideIndex) {
        var selector = "#fullpage-main .section:eq(" + (index - 1) + ")";
        if ($(selector + " .slide").length) {
            selector = selector + " .slide:eq(" + (slideIndex) + ") .background-page video";
        } else selector = selector + " .background-page video";
        $("#fullpage-main .section .background-page video").each(function () {
            $(this).get(0).pause();
        });
        if ($(selector).length) $(selector).get(0).play();
    }
    $(document).ready(function () {
        sections_count = $("#fullpage-main .section").length;
        var winw = $(window).width();
        var tm = $("header").outerHeight();
        $(".fixed-top .full-width-menu").css("margin-top", + tm + "px");
        tm += $(".full-width-menu").outerHeight();

        var anchorsArr = new Array();
        var menu_ = "#fullpage-menu";
        if ($("#fullpage-horizontal-menu").length) menu_ = "#fullpage-horizontal-menu";
        $(menu_ + " li").each(function (i) {
            $(this).attr("data-menuanchor", "section-" + i);
            $(this).find('a').attr("href", "#section-" + i);
            anchorsArr[i] = 'section-' + i;
        });
        if (winw < 768) {
            $(menu_).find("li").click(function () {
                if (menu_ == "#fullpage-horizontal-menu") $("#fullpage-main > .section .slide").eq($(this).index()).scrollTo();
                else $("#fullpage-main > .section").eq($(this).index()).scrollTo();
            });
        }
        var optionsString = $("#fullpage-main").attr("data-options");
        var optionsArr;
        var options = {
            anchors: anchorsArr,
            menu: menu_,
            controlArrows: false,
            verticalCentered:false,
            autoScrolling: (winw < 768) ? false : true,
            fitToSection: (winw < 768) ? false : true,
            afterSlideLoad: function (anchorLink, index, slideAnchor, slideIndex) {
                updateHorizontalMenu(slideIndex);
                startFullpageAnima(index, slideIndex);
                if (typeof renderLoadedImgs !== 'undefined' && $.isFunction(renderLoadedImgs)) $('#fullpage-main .section .slide').eq(slideIndex - 1).renderLoadedImgs();
            },
            afterLoad: function (anchorLink, index) {
                afterLoad(anchorLink, index);
                if (typeof renderLoadedImgs !== 'undefined' && $.isFunction(renderLoadedImgs)) $('#fullpage-main .section').eq(index - 1).renderLoadedImgs();
            },
            afterRender: function () {
                if ($(".fullpage-menu").length) {
                    $(".fullpage-menu").css("margin-top", "-" + (($(".fullpage-menu")[0].scrollHeight - $("header").outerHeight()) / 2) + "px");
                }
                if ($(".fullpage-horizontal-menu").length) {
                    $(".fullpage-horizontal-menu").css("margin-left", "-" + ($(".fullpage-horizontal-menu").width() / 2) + "px");
                }

                if ($(".fullpage-varrow .down").length) $(".fullpage-varrow .down").css("margin-left", "-" + ($(".fullpage-varrow .down")[0].scrollWidth / 2) + "px");
                if ($(".fullpage-varrow .up").length) $(".fullpage-varrow .up").css("margin-left", "-" + ($(".fullpage-varrow .up")[0].scrollWidth / 2) + "px").css("margin-top", $("header").outerHeight() - $("header.scroll-hide").outerHeight() + 20 + "px");

                if ($(".fullpage-arrow").length) {
                    if ($(".fullpage-arrow .left").length) $(".fullpage-arrow .arrow.left").css("margin-top", "-" + ($(".fullpage-arrow .arrow.left")[0].scrollHeight / 2 - (tm / 2)) + "px");
                    if ($(".fullpage-arrow .right").length) $(".fullpage-arrow .arrow.right").css("margin-top", "-" + ($(".fullpage-arrow .arrow.right")[0].scrollHeight / 2 - (tm / 2)) + "px");
                }
                $("#fullpage-horizontal-menu li").click(function () {
                    $.fn.fullpage.moveTo(_anchorLink, $(this).index());
                });
                $("*[data-fullpage-anima]").each(function () {
                    var tr = $(this).attr("data-trigger");
                    if (isEmpty(tr) || tr == "scroll" || tr == "load") {
                        var an = $(this).find(".anima,*[data-anima]");
                        if (isEmpty(an)) an = this;
                        $(an).each(function () {
                            if (!$(this).hasClass("anima") && an != this) return false;
                            $(this).css("opacity", 0);
                        });
                    }
                });
                $("body").css("overflow", "hidden");
                if ($.isFunction($.fn.tooltip)) {
                    $("#fullpage-menu").on("mouseout", function () { $("#fullpage-menu .tooltip").tooltip('hide') });
                }

                updateCSS(1);
                setMiddleBox(".box-middle", tm); 

                if ($(".section:eq(0) .background-page video").length) $(".section:eq(0) .background-page video").get(0).play();
                setBgVideo();
                setTimeout(function () { setBgVideo(); }, 2000);
                updateHorizontalMenu(0);
            },
            onLeave: function (index, nextIndex, direction) {
                updateVideos(nextIndex, 0);
                updateCSS(nextIndex);
                var fh = 0, hh = 0;
                if ($("header").length) {
                    hh = $("header").css("height");
                    $("header").css("height", "");
                    fh = (nextIndex == 1) ? parseInt(hh.replace("px", "")) : $("header").outerHeight();
                }
                setMiddleBox(".box-middle", fh);
                if ($(".fullpage-menu").length) {
                    $(".fullpage-menu").css("margin-top", "-" + (($(".fullpage-menu")[0].scrollHeight - fh) / 2) + "px");
                }
                $("header").css("height", hh);
            },
            onSlideLeave: function (anchorLink, index, slideIndex, direction, nextSlideIndex) {
                updateVideos(index, nextSlideIndex);
            }
        }
        if (!isEmpty(optionsString)) {
            optionsArr = optionsString.split(",");
            options = getOptionsString(optionsString, options);
        }
        $('#fullpage-main').fullpage(options);

        $(".fullpage-arrow .arrow.left").click(function () {
            $(".fullpage-arrow .arrow").css("opacity", "0");
            $.fn.fullpage.moveSlideLeft();
        });
        $(".fullpage-arrow .arrow.right").click(function () {
            $(".fullpage-arrow .left,.fullpage-arrow .right").css("opacity", "0");
            $.fn.fullpage.moveSlideRight();
        });
        $(".fullpage-varrow .arrow.up, .scroll-content .scbox.up").click(function () {
            $(".fullpage-varrow .arrow").css("opacity", "0");
            $.fn.fullpage.moveSectionUp();
        });
        $(".fullpage-varrow .arrow.down, .scroll-content .scbox.down").click(function () {
            $(".fullpage-varrow .arrow").css("opacity", "0");
            $.fn.fullpage.moveSectionDown();
        });
        $(".fullpage-horizontal-menu li").click(function () {
            $(".fullpage-arrow .arrow").css("opacity", "0");
        });
        $(".fullpage-menu li").click(function () {
            $(".fullpage-varrow .arrow").css("opacity", "0");
        });
        if (($(window).width() < 768)) {
            $("*[data-fullpage-anima]").each(function () {
                $(this).attr("data-anima", $(this).attr("data-fullpage-anima"));
            });
            $(".background-page > video").each(function () {
                $(this).closest(".background-page").css("position", "absolutle");
            });
            $("*[data-anima-out] .anima").css("opacity", 0);
            var interval = 0;
            $(window).scroll(function () {
                if (interval > 5) {
                    interval = 0;
                    $(".section").each(function (index) {
                        if (isScrollView(this)) {
                            var vid = $(this).find(".background-page video");
                            $("#fullpage-main .section .background-page video").each(function () {
                                $(this).get(0).pause();
                            });
                            if ($(vid).length) $(vid).get(0).play();
                        }
                        if ($(window).scrollTop() < 150) if ($(".section:eq(0) .background-page video").length) $(".section:eq(0) .background-page video").get(0).play();
                    });
                }
                interval += 1;
            });
        }
    });
    function setBgVideo() {
        $(".background-page video").each(function () {
            var section = $(this).closest(".section");
            var sW = $(section).width();
            var sH = $(section).height();
            var vidH = $(this).height();
            var vidW = $(this).width();
            var proportion = sH / vidH;
            var newWidth = vidW * proportion;
            if (newWidth / vidW > 1) {
                $(this).css("width", Math.ceil(newWidth) + "px");
                $(this).css("margin-left", "-" + Math.floor(((newWidth - sW) / 2)) + "px");
            }
        });
    }
    function setMiddleBox(t,tm) {
        $(t).each(function () {
            var p = $(this).closest(".section");
            var a = parseInt($(p).outerHeight());
            var b = parseInt($(this).outerHeight());
            if (b < a) $(this).css("margin-top", (a - b) / 2 + tm / 2  + "px");
        });
    }
    var CSSupdated = 0;
    function updateCSS(index) {
        if (index == 1) {
            $(".scroll-hide").css("display", "").animate({ opacity: 1 }, 100);
            $(".scroll-show").animate({ opacity: 0 }, 0, function () { $(".scroll-show").removeClass("showed"); });
            $(".scroll-change").removeClass("scroll-css");
            $(".menu-transparent.scroll-change").addClass("bg-transparent");
            CSSupdated = 0;
        } else {
            if (!CSSupdated) {
                $(".scroll-hide").animate({ opacity: 0 }, 100, function () { $(".scroll-hide").css("display", "none"); });
                $(".scroll-show").addClass("showed").animate({ opacity: 1 }, 0);
                $(".scroll-change").addClass("scroll-css");
                $(".menu-transparent.scroll-change").removeClass("bg-transparent");
                CSSupdated = 1;
            }
        }
    }
}(jQuery));