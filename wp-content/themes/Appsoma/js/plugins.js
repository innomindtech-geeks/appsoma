// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// Place any jQuery/helper plugins in here.
/*
 * jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/
 *
 * Uses the built in easing capabilities added In jQuery 1.1
 * to offer multiple easing options
 *
 * TERMS OF USE - jQuery Easing
 * 
 * Open source under the BSD License. 
 * 
 * Copyright © 2008 George McGinley Smith
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list 
 * of conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * 
 * Neither the name of the author nor the names of contributors may be used to endorse 
 * or promote products derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED 
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE. 
 *
*/

// t: current time, b: begInnIng value, c: change In value, d: duration
jQuery.easing['jswing'] = jQuery.easing['swing'];

jQuery.extend( jQuery.easing,
{
	def: 'easeOutQuad',
	swing: function (x, t, b, c, d) {
		//alert(jQuery.easing.default);
		return jQuery.easing[jQuery.easing.def](x, t, b, c, d);
	},
	easeInQuad: function (x, t, b, c, d) {
		return c*(t/=d)*t + b;
	},
	easeOutQuad: function (x, t, b, c, d) {
		return -c *(t/=d)*(t-2) + b;
	},
	easeInOutQuad: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t + b;
		return -c/2 * ((--t)*(t-2) - 1) + b;
	},
	easeInCubic: function (x, t, b, c, d) {
		return c*(t/=d)*t*t + b;
	},
	easeOutCubic: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t + 1) + b;
	},
	easeInOutCubic: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t + b;
		return c/2*((t-=2)*t*t + 2) + b;
	},
	easeInQuart: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t + b;
	},
	easeOutQuart: function (x, t, b, c, d) {
		return -c * ((t=t/d-1)*t*t*t - 1) + b;
	},
	easeInOutQuart: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t + b;
		return -c/2 * ((t-=2)*t*t*t - 2) + b;
	},
	easeInQuint: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t*t + b;
	},
	easeOutQuint: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t*t*t + 1) + b;
	},
	easeInOutQuint: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t*t + b;
		return c/2*((t-=2)*t*t*t*t + 2) + b;
	},
	easeInSine: function (x, t, b, c, d) {
		return -c * Math.cos(t/d * (Math.PI/2)) + c + b;
	},
	easeOutSine: function (x, t, b, c, d) {
		return c * Math.sin(t/d * (Math.PI/2)) + b;
	},
	easeInOutSine: function (x, t, b, c, d) {
		return -c/2 * (Math.cos(Math.PI*t/d) - 1) + b;
	},
	easeInExpo: function (x, t, b, c, d) {
		return (t==0) ? b : c * Math.pow(2, 10 * (t/d - 1)) + b;
	},
	easeOutExpo: function (x, t, b, c, d) {
		return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
	},
	easeInOutExpo: function (x, t, b, c, d) {
		if (t==0) return b;
		if (t==d) return b+c;
		if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
		return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
	},
	easeInCirc: function (x, t, b, c, d) {
		return -c * (Math.sqrt(1 - (t/=d)*t) - 1) + b;
	},
	easeOutCirc: function (x, t, b, c, d) {
		return c * Math.sqrt(1 - (t=t/d-1)*t) + b;
	},
	easeInOutCirc: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return -c/2 * (Math.sqrt(1 - t*t) - 1) + b;
		return c/2 * (Math.sqrt(1 - (t-=2)*t) + 1) + b;
	},
	easeInElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return -(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
	},
	easeOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;
	},
	easeInOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d/2)==2) return b+c;  if (!p) p=d*(.3*1.5);
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		if (t < 1) return -.5*(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
		return a*Math.pow(2,-10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )*.5 + c + b;
	},
	easeInBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*(t/=d)*t*((s+1)*t - s) + b;
	},
	easeOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
	},
	easeInOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158; 
		if ((t/=d/2) < 1) return c/2*(t*t*(((s*=(1.525))+1)*t - s)) + b;
		return c/2*((t-=2)*t*(((s*=(1.525))+1)*t + s) + 2) + b;
	},
	easeInBounce: function (x, t, b, c, d) {
		return c - jQuery.easing.easeOutBounce (x, d-t, 0, c, d) + b;
	},
	easeOutBounce: function (x, t, b, c, d) {
		if ((t/=d) < (1/2.75)) {
			return c*(7.5625*t*t) + b;
		} else if (t < (2/2.75)) {
			return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
		} else if (t < (2.5/2.75)) {
			return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
		} else {
			return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
		}
	},
	easeInOutBounce: function (x, t, b, c, d) {
		if (t < d/2) return jQuery.easing.easeInBounce (x, t*2, 0, c, d) * .5 + b;
		return jQuery.easing.easeOutBounce (x, t*2-d, 0, c, d) * .5 + c*.5 + b;
	}
});


/*! jQuery UI - v1.10.3 - 2013-12-20
* http://jqueryui.com
* Includes: jquery.ui.widget.js
* Copyright 2013 jQuery Foundation and other contributors; Licensed MIT */

(function(e,t){var i=0,s=Array.prototype.slice,a=e.cleanData;e.cleanData=function(t){for(var i,s=0;null!=(i=t[s]);s++)try{e(i).triggerHandler("remove")}catch(n){}a(t)},e.widget=function(i,s,a){var n,r,o,h,l={},u=i.split(".")[0];i=i.split(".")[1],n=u+"-"+i,a||(a=s,s=e.Widget),e.expr[":"][n.toLowerCase()]=function(t){return!!e.data(t,n)},e[u]=e[u]||{},r=e[u][i],o=e[u][i]=function(e,i){return this._createWidget?(arguments.length&&this._createWidget(e,i),t):new o(e,i)},e.extend(o,r,{version:a.version,_proto:e.extend({},a),_childConstructors:[]}),h=new s,h.options=e.widget.extend({},h.options),e.each(a,function(i,a){return e.isFunction(a)?(l[i]=function(){var e=function(){return s.prototype[i].apply(this,arguments)},t=function(e){return s.prototype[i].apply(this,e)};return function(){var i,s=this._super,n=this._superApply;return this._super=e,this._superApply=t,i=a.apply(this,arguments),this._super=s,this._superApply=n,i}}(),t):(l[i]=a,t)}),o.prototype=e.widget.extend(h,{widgetEventPrefix:r?h.widgetEventPrefix:i},l,{constructor:o,namespace:u,widgetName:i,widgetFullName:n}),r?(e.each(r._childConstructors,function(t,i){var s=i.prototype;e.widget(s.namespace+"."+s.widgetName,o,i._proto)}),delete r._childConstructors):s._childConstructors.push(o),e.widget.bridge(i,o)},e.widget.extend=function(i){for(var a,n,r=s.call(arguments,1),o=0,h=r.length;h>o;o++)for(a in r[o])n=r[o][a],r[o].hasOwnProperty(a)&&n!==t&&(i[a]=e.isPlainObject(n)?e.isPlainObject(i[a])?e.widget.extend({},i[a],n):e.widget.extend({},n):n);return i},e.widget.bridge=function(i,a){var n=a.prototype.widgetFullName||i;e.fn[i]=function(r){var o="string"==typeof r,h=s.call(arguments,1),l=this;return r=!o&&h.length?e.widget.extend.apply(null,[r].concat(h)):r,o?this.each(function(){var s,a=e.data(this,n);return a?e.isFunction(a[r])&&"_"!==r.charAt(0)?(s=a[r].apply(a,h),s!==a&&s!==t?(l=s&&s.jquery?l.pushStack(s.get()):s,!1):t):e.error("no such method '"+r+"' for "+i+" widget instance"):e.error("cannot call methods on "+i+" prior to initialization; "+"attempted to call method '"+r+"'")}):this.each(function(){var t=e.data(this,n);t?t.option(r||{})._init():e.data(this,n,new a(r,this))}),l}},e.Widget=function(){},e.Widget._childConstructors=[],e.Widget.prototype={widgetName:"widget",widgetEventPrefix:"",defaultElement:"<div>",options:{disabled:!1,create:null},_createWidget:function(t,s){s=e(s||this.defaultElement||this)[0],this.element=e(s),this.uuid=i++,this.eventNamespace="."+this.widgetName+this.uuid,this.options=e.widget.extend({},this.options,this._getCreateOptions(),t),this.bindings=e(),this.hoverable=e(),this.focusable=e(),s!==this&&(e.data(s,this.widgetFullName,this),this._on(!0,this.element,{remove:function(e){e.target===s&&this.destroy()}}),this.document=e(s.style?s.ownerDocument:s.document||s),this.window=e(this.document[0].defaultView||this.document[0].parentWindow)),this._create(),this._trigger("create",null,this._getCreateEventData()),this._init()},_getCreateOptions:e.noop,_getCreateEventData:e.noop,_create:e.noop,_init:e.noop,destroy:function(){this._destroy(),this.element.unbind(this.eventNamespace).removeData(this.widgetName).removeData(this.widgetFullName).removeData(e.camelCase(this.widgetFullName)),this.widget().unbind(this.eventNamespace).removeAttr("aria-disabled").removeClass(this.widgetFullName+"-disabled "+"ui-state-disabled"),this.bindings.unbind(this.eventNamespace),this.hoverable.removeClass("ui-state-hover"),this.focusable.removeClass("ui-state-focus")},_destroy:e.noop,widget:function(){return this.element},option:function(i,s){var a,n,r,o=i;if(0===arguments.length)return e.widget.extend({},this.options);if("string"==typeof i)if(o={},a=i.split("."),i=a.shift(),a.length){for(n=o[i]=e.widget.extend({},this.options[i]),r=0;a.length-1>r;r++)n[a[r]]=n[a[r]]||{},n=n[a[r]];if(i=a.pop(),s===t)return n[i]===t?null:n[i];n[i]=s}else{if(s===t)return this.options[i]===t?null:this.options[i];o[i]=s}return this._setOptions(o),this},_setOptions:function(e){var t;for(t in e)this._setOption(t,e[t]);return this},_setOption:function(e,t){return this.options[e]=t,"disabled"===e&&(this.widget().toggleClass(this.widgetFullName+"-disabled ui-state-disabled",!!t).attr("aria-disabled",t),this.hoverable.removeClass("ui-state-hover"),this.focusable.removeClass("ui-state-focus")),this},enable:function(){return this._setOption("disabled",!1)},disable:function(){return this._setOption("disabled",!0)},_on:function(i,s,a){var n,r=this;"boolean"!=typeof i&&(a=s,s=i,i=!1),a?(s=n=e(s),this.bindings=this.bindings.add(s)):(a=s,s=this.element,n=this.widget()),e.each(a,function(a,o){function h(){return i||r.options.disabled!==!0&&!e(this).hasClass("ui-state-disabled")?("string"==typeof o?r[o]:o).apply(r,arguments):t}"string"!=typeof o&&(h.guid=o.guid=o.guid||h.guid||e.guid++);var l=a.match(/^(\w+)\s*(.*)$/),u=l[1]+r.eventNamespace,c=l[2];c?n.delegate(c,u,h):s.bind(u,h)})},_off:function(e,t){t=(t||"").split(" ").join(this.eventNamespace+" ")+this.eventNamespace,e.unbind(t).undelegate(t)},_delay:function(e,t){function i(){return("string"==typeof e?s[e]:e).apply(s,arguments)}var s=this;return setTimeout(i,t||0)},_hoverable:function(t){this.hoverable=this.hoverable.add(t),this._on(t,{mouseenter:function(t){e(t.currentTarget).addClass("ui-state-hover")},mouseleave:function(t){e(t.currentTarget).removeClass("ui-state-hover")}})},_focusable:function(t){this.focusable=this.focusable.add(t),this._on(t,{focusin:function(t){e(t.currentTarget).addClass("ui-state-focus")},focusout:function(t){e(t.currentTarget).removeClass("ui-state-focus")}})},_trigger:function(t,i,s){var a,n,r=this.options[t];if(s=s||{},i=e.Event(i),i.type=(t===this.widgetEventPrefix?t:this.widgetEventPrefix+t).toLowerCase(),i.target=this.element[0],n=i.originalEvent)for(a in n)a in i||(i[a]=n[a]);return this.element.trigger(i,s),!(e.isFunction(r)&&r.apply(this.element[0],[i].concat(s))===!1||i.isDefaultPrevented())}},e.each({show:"fadeIn",hide:"fadeOut"},function(t,i){e.Widget.prototype["_"+t]=function(s,a,n){"string"==typeof a&&(a={effect:a});var r,o=a?a===!0||"number"==typeof a?i:a.effect||i:t;a=a||{},"number"==typeof a&&(a={duration:a}),r=!e.isEmptyObject(a),a.complete=n,a.delay&&s.delay(a.delay),r&&e.effects&&e.effects.effect[o]?s[t](a):o!==t&&s[o]?s[o](a.duration,a.easing,n):s.queue(function(i){e(this)[t](),n&&n.call(s[0]),i()})}})})(jQuery);


/*! jquery.kinetic - v1.8.3 - 2013-12-08 http://the-taylors.org/jquery.kinetic 
 * Copyright (c) 2013 Dave Taylor; Licensed MIT */
(function(t){"use strict";var e={cursor:"move",decelerate:!0,triggerHardware:!1,y:!0,x:!0,slowdown:.9,maxvelocity:40,throttleFPS:60,movingClass:{up:"kinetic-moving-up",down:"kinetic-moving-down",left:"kinetic-moving-left",right:"kinetic-moving-right"},deceleratingClass:{up:"kinetic-decelerating-up",down:"kinetic-decelerating-down",left:"kinetic-decelerating-left",right:"kinetic-decelerating-right"}},n="kinetic-settings",i="kinetic-active";window.requestAnimationFrame||(window.requestAnimationFrame=function(){return window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.oRequestAnimationFrame||window.msRequestAnimationFrame||function(t){window.setTimeout(t,1e3/60)}}()),t.support=t.support||{},t.extend(t.support,{touch:"ontouchend"in document});var o=function(){return!1},c=function(t,e){return 0===Math.floor(Math.abs(t))?0:t*e},l=function(t,e){var n=t;return t>0?t>e&&(n=e):0-e>t&&(n=0-e),n},s=function(t,e){this.removeClass(t.movingClass.up).removeClass(t.movingClass.down).removeClass(t.movingClass.left).removeClass(t.movingClass.right).removeClass(t.deceleratingClass.up).removeClass(t.deceleratingClass.down).removeClass(t.deceleratingClass.left).removeClass(t.deceleratingClass.right),t.velocity>0&&this.addClass(e.right),0>t.velocity&&this.addClass(e.left),t.velocityY>0&&this.addClass(e.down),0>t.velocityY&&this.addClass(e.up)},a=function(t,e){e.velocity=0,e.velocityY=0,e.decelerate=!0,"function"==typeof e.stopped&&e.stopped.call(t,e)},r=function(t,e){var n=t[0];e.x&&n.scrollWidth>0?(n.scrollLeft=e.scrollLeft=n.scrollLeft+e.velocity,Math.abs(e.velocity)>0&&(e.velocity=e.decelerate?c(e.velocity,e.slowdown):e.velocity)):e.velocity=0,e.y&&n.scrollHeight>0?(n.scrollTop=e.scrollTop=n.scrollTop+e.velocityY,Math.abs(e.velocityY)>0&&(e.velocityY=e.decelerate?c(e.velocityY,e.slowdown):e.velocityY)):e.velocityY=0,s.call(t,e,e.deceleratingClass),"function"==typeof e.moved&&e.moved.call(t,e),Math.abs(e.velocity)>0||Math.abs(e.velocityY)>0?window.requestAnimationFrame(function(){r(t,e)}):a(t,e)},u=function(e){var i=t.kinetic.callMethods[e],o=Array.prototype.slice.call(arguments);i&&this.each(function(){var e=o.slice(1),c=t(this).data(n);e.unshift(c),i.apply(this,e)})},v=function(e,n){e[0],t.support.touch?e.bind("touchstart",n.events.touchStart).bind("touchend",n.events.inputEnd).bind("touchmove",n.events.touchMove):e.mousedown(n.events.inputDown).mouseup(n.events.inputEnd).mousemove(n.events.inputMove),e.click(n.events.inputClick).scroll(n.events.scroll).bind("selectstart",o).bind("dragstart",n.events.dragStart)},d=function(e,n){e[0],t.support.touch?e.unbind("touchstart",n.events.touchStart).unbind("touchend",n.events.inputEnd).unbind("touchmove",n.events.touchMove):e.unbind("mousedown",n.events.inputDown).unbind("mouseup",n.events.inputEnd).unbind("mousemove",n.events.inputMove).unbind("scroll",n.events.scroll),e.unbind("click",n.events.inputClick).unbind("selectstart",o),e.unbind("dragstart",n.events.dragStart)},f=function(o){this.addClass(i).each(function(){var i=this,c=t(this);if(!c.data(n)){var a,u,d,f,p=t.extend({},e,o),h=!1,m=!1,g=!1,w=1e3/p.throttleFPS;p.velocity=0,p.velocityY=0;var y=function(){a=!1,u=!1,g=!1};t(document).mouseup(y).click(y);var C=function(){p.velocity=l(h-a,p.maxvelocity),p.velocityY=l(m-u,p.maxvelocity)},b=function(e,n){return t.isFunction(p.filterTarget)?p.filterTarget.call(i,e,n)!==!1:n.which&&n.which>1?!1:!0},k=function(t,e){g=!0,p.velocity=h=0,p.velocityY=m=0,a=t,u=e},Y=function(){a&&h&&p.decelerate===!1&&(p.decelerate=!0,C(),a=h=g=!1,r(c,p))},D=function(e,n){(!d||new Date>new Date(d.getTime()+w))&&(d=new Date,g&&(a||u)&&(f&&(t(f).blur(),f=null,c.focus()),p.decelerate=!1,p.velocity=p.velocityY=0,c[0].scrollLeft=p.scrollLeft=p.x?c[0].scrollLeft-(e-a):c[0].scrollLeft,c[0].scrollTop=p.scrollTop=p.y?c[0].scrollTop-(n-u):c[0].scrollTop,h=a,m=u,a=e,u=n,C(),s.call(c,p,p.movingClass),"function"==typeof p.moved&&p.moved.call(c,p)))};p.events={touchStart:function(t){var e;b(t.target,t)&&(e=t.originalEvent.touches[0],k(e.clientX,e.clientY),t.stopPropagation())},touchMove:function(t){var e;g&&(e=t.originalEvent.touches[0],D(e.clientX,e.clientY),t.preventDefault&&t.preventDefault())},inputDown:function(t){b(t.target,t)&&(k(t.clientX,t.clientY),f=t.target,"IMG"===t.target.nodeName&&t.preventDefault(),t.stopPropagation())},inputEnd:function(t){Y(),f=null,t.preventDefault&&t.preventDefault()},inputMove:function(t){g&&(D(t.clientX,t.clientY),t.preventDefault&&t.preventDefault())},scroll:function(t){"function"==typeof p.moved&&p.moved.call(c,p),t.preventDefault&&t.preventDefault()},inputClick:function(t){return Math.abs(p.velocity)>0?(t.preventDefault(),!1):void 0},dragStart:function(){return f?!1:void 0}},v(c,p),c.data(n,p).css("cursor",p.cursor),p.triggerHardware&&c.css({"-webkit-transform":"translate3d(0,0,0)","-webkit-perspective":"1000","-webkit-backface-visibility":"hidden"})}})};t.kinetic={settingsKey:n,callMethods:{start:function(e,n){var i=t(this);e=t.extend(e,n),e&&(e.decelerate=!1,r(i,e))},end:function(e){t(this),e&&(e.decelerate=!0)},stop:function(e){var n=t(this);a(n,e)},detach:function(e){var n=t(this);d(n,e),n.removeClass(i).css("cursor","")},attach:function(e){var n=t(this);v(n,e),n.addClass(i).css("cursor","move")}}},t.fn.kinetic=function(t){return"string"==typeof t?u.apply(this,arguments):f.call(this,t),this}})(window.jQuery||window.Zepto);


;(function($,window,document,undefined){$.widget("thomaskahn.smoothTouchScroll",{options:{scrollableAreaClass:"scrollableArea",scrollWrapperClass:"scrollWrapper",continuousScrolling:false,startAtElementId:"",},_create:function(){var self=this,o=this.options,el=this.element;el.data("scrollWrapper",el.find("."+o.scrollWrapperClass));el.data("scrollableArea",el.find("."+o.scrollableAreaClass));if(el.data("scrollableArea").length===0&&el.data("scrollWrapper").length===0){el.wrapInner("<div class='"+o.scrollableAreaClass+"'>").wrapInner("<div class='"+o.scrollWrapperClass+"'>");el.data("scrollWrapper",el.find("."+o.scrollWrapperClass));el.data("scrollableArea",el.find("."+o.scrollableAreaClass))}else if(el.data("scrollWrapper").length===0){el.wrapInner("<div class='"+o.scrollWrapperClass+"'>");el.data("scrollWrapper",el.find("."+o.scrollWrapperClass))}else if(el.data("scrollableArea").length===0){el.data("scrollWrapper").wrapInner("<div class='"+o.scrollableAreaClass+"'>");el.data("scrollableArea",el.find("."+o.scrollableAreaClass))}el.data("scrollXPos",0);el.data("scrollableAreaWidth",0);el.data("startingPosition",0);el.data("rightScrollingInterval",null);el.data("leftScrollingInterval",null);el.data("previousScrollLeft",0);el.data("getNextElementWidth",true);el.data("swapAt",null);el.data("startAtElementHasNotPassed",true);el.data("swappedElement",null);el.data("originalElements",el.data("scrollableArea").children());el.data("visible",true);el.data("enabled",true);el.data("scrollableAreaHeight",el.data("scrollableArea").height());if(el.data("enabled")){el.data("scrollWrapper").kinetic({cursor:'move',decelerate:true,triggerHardware:false,y:false,x:true,axisTolerance:7,slowdown:0.9,maxvelocity:80,throttleFPS:60,moved:function(settings){if(o.continuousScrolling){if(el.data("scrollWrapper").scrollLeft()<=0){self._checkContinuousSwapLeft()}else{self._checkContinuousSwapRight()}}self._trigger("touchMoved")},stopped:function(settings){self._trigger("touchStopped")}})}$(window).bind("resize",function(){self._trigger("windowResized")})},_init:function(){var self=this,el=this.element;self.recalculateScrollableArea();self._trigger("initializationComplete")},recalculateScrollableArea:function(){var tempScrollableAreaWidth=0,foundStartAtElement=false,o=this.options,el=this.element;el.data("scrollableArea").children().each(function(){if((o.startAtElementId.length>0)&&(($(this).attr("id"))===o.startAtElementId)){el.data("startingPosition",tempScrollableAreaWidth);foundStartAtElement=true}tempScrollableAreaWidth=tempScrollableAreaWidth+$(this).outerWidth(true)});if(!(foundStartAtElement)){el.data("startAtElementId","")}el.data("scrollableAreaWidth",tempScrollableAreaWidth);el.data("scrollableArea").width(el.data("scrollableAreaWidth"));el.data("scrollWrapper").scrollLeft(el.data("startingPosition"));el.data("scrollXPos",el.data("startingPosition"))},_checkContinuousSwapRight:function(){var el=this.element,o=this.options;if(el.data("getNextElementWidth")){if((o.startAtElementId.length>0)&&(el.data("startAtElementHasNotPassed"))){el.data("swapAt",$("#"+o.startAtElementId).outerWidth(true));el.data("startAtElementHasNotPassed",false)}else{el.data("swapAt",el.data("scrollableArea").children(":first").outerWidth(true))}el.data("getNextElementWidth",false)}if(el.data("swapAt")<=el.data("scrollWrapper").scrollLeft()){el.data("swappedElement",el.data("scrollableArea").children(":first").detach());el.data("scrollableArea").append(el.data("swappedElement"));var wrapperLeft=el.data("scrollWrapper").scrollLeft();el.data("scrollWrapper").scrollLeft(wrapperLeft-el.data("swappedElement").outerWidth(true));el.data("getNextElementWidth",true)}},_checkContinuousSwapLeft:function(){var el=this.element,o=this.options;if(el.data("getNextElementWidth")){if((o.startAtElementId.length>0)&&(el.data("startAtElementHasNotPassed"))){el.data("swapAt",$("#"+o.startAtElementId).outerWidth(true));el.data("startAtElementHasNotPassed",false)}else{el.data("swapAt",el.data("scrollableArea").children(":first").outerWidth(true))}el.data("getNextElementWidth",false)}if(el.data("scrollWrapper").scrollLeft()===0){el.data("swappedElement",el.data("scrollableArea").children(":last").detach());el.data("scrollableArea").prepend(el.data("swappedElement"));el.data("scrollWrapper").scrollLeft(el.data("scrollWrapper").scrollLeft()+el.data("swappedElement").outerWidth(true));el.data("getNextElementWidth",true)}},restoreOriginalElements:function(){var self=this,el=this.element;el.data("scrollableArea").html(el.data("originalElements"));self.recalculateScrollableArea();self.jumpToElement("first")},show:function(){var el=this.element;el.data("visible",true);el.show()},hide:function(){var el=this.element;el.data("visible",false);el.hide()},enable:function(){var el=this.element;el.data("scrollWrapper").kinetic('attach');el.data("enabled",true)},disable:function(){var self=this,el=this.element;el.data("scrollWrapper").kinetic('detach');el.data("enabled",false)},destroy:function(){var self=this,el=this.element;el.data("scrollableArea").remove();el.data("scrollWrapper").remove();el.html(el.data("originalElements"));$.Widget.prototype.destroy.call(this)}})})(jQuery,window,document);



/*
jQuery Waypoints - v1.1.4
Copyright (c) 2011-2012 Caleb Troughton
Dual licensed under the MIT license and GPL license.
https://github.com/imakewebthings/jquery-waypoints/blob/master/MIT-license.txt
https://github.com/imakewebthings/jquery-waypoints/blob/master/GPL-license.txt
*/
(function($,k,m,i,d){var e=$(i),g="waypoint.reached",b=function(o,n){o.element.trigger(g,n);if(o.options.triggerOnce){o.element[k]("destroy")}},h=function(p,o){var n=o.waypoints.length-1;while(n>=0&&o.waypoints[n].element[0]!==p[0]){n-=1}return n},f=[],l=function(n){$.extend(this,{element:$(n),oldScroll:0,waypoints:[],didScroll:false,didResize:false,doScroll:$.proxy(function(){var q=this.element.scrollTop(),p=q>this.oldScroll,s=this,r=$.grep(this.waypoints,function(u,t){return p?(u.offset>s.oldScroll&&u.offset<=q):(u.offset<=s.oldScroll&&u.offset>q)}),o=r.length;if(!this.oldScroll||!q){$[m]("refresh")}this.oldScroll=q;if(!o){return}if(!p){r.reverse()}$.each(r,function(u,t){if(t.options.continuous||u===o-1){b(t,[p?"down":"up"])}})},this)});$(n).scroll($.proxy(function(){if(!this.didScroll){this.didScroll=true;i.setTimeout($.proxy(function(){this.doScroll();this.didScroll=false},this),$[m].settings.scrollThrottle)}},this)).resize($.proxy(function(){if(!this.didResize){this.didResize=true;i.setTimeout($.proxy(function(){$[m]("refresh");this.didResize=false},this),$[m].settings.resizeThrottle)}},this));e.load($.proxy(function(){this.doScroll()},this))},j=function(n){var o=null;$.each(f,function(p,q){if(q.element[0]===n){o=q;return false}});return o},c={init:function(o,n){this.each(function(){var u=$.fn[k].defaults.context,q,t=$(this);if(n&&n.context){u=n.context}if(!$.isWindow(u)){u=t.closest(u)[0]}q=j(u);if(!q){q=new l(u);f.push(q)}var p=h(t,q),s=p<0?$.fn[k].defaults:q.waypoints[p].options,r=$.extend({},s,n);r.offset=r.offset==="bottom-in-view"?function(){var v=$.isWindow(u)?$[m]("viewportHeight"):$(u).height();return v-$(this).outerHeight()}:r.offset;if(p<0){q.waypoints.push({element:t,offset:null,options:r})}else{q.waypoints[p].options=r}if(o){t.bind(g,o)}if(n&&n.handler){t.bind(g,n.handler)}});$[m]("refresh");return this},remove:function(){return this.each(function(o,p){var n=$(p);$.each(f,function(r,s){var q=h(n,s);if(q>=0){s.waypoints.splice(q,1)}})})},destroy:function(){return this.unbind(g)[k]("remove")}},a={refresh:function(){$.each(f,function(r,s){var q=$.isWindow(s.element[0]),n=q?0:s.element.offset().top,p=q?$[m]("viewportHeight"):s.element.height(),o=q?0:s.element.scrollTop();$.each(s.waypoints,function(u,x){if(!x){return}var t=x.options.offset,w=x.offset;if(typeof x.options.offset==="function"){t=x.options.offset.apply(x.element)}else{if(typeof x.options.offset==="string"){var v=parseFloat(x.options.offset);t=x.options.offset.indexOf("%")?Math.ceil(p*(v/100)):v}}x.offset=x.element.offset().top-n+o-t;if(x.options.onlyOnScroll){return}if(w!==null&&s.oldScroll>w&&s.oldScroll<=x.offset){b(x,["up"])}else{if(w!==null&&s.oldScroll<w&&s.oldScroll>=x.offset){b(x,["down"])}else{if(!w&&o>x.offset){b(x,["down"])}}}});s.waypoints.sort(function(u,t){return u.offset-t.offset})})},viewportHeight:function(){return(i.innerHeight?i.innerHeight:e.height())},aggregate:function(){var n=$();$.each(f,function(o,p){$.each(p.waypoints,function(q,r){n=n.add(r.element)})});return n}};$.fn[k]=function(n){if(c[n]){return c[n].apply(this,Array.prototype.slice.call(arguments,1))}else{if(typeof n==="function"||!n){return c.init.apply(this,arguments)}else{if(typeof n==="object"){return c.init.apply(this,[null,n])}else{$.error("Method "+n+" does not exist on jQuery "+k)}}}};$.fn[k].defaults={continuous:true,offset:0,triggerOnce:false,context:i};$[m]=function(n){if(a[n]){return a[n].apply(this)}else{return a.aggregate()}};$[m].settings={resizeThrottle:200,scrollThrottle:100};e.load(function(){$[m]("refresh")})})(jQuery,"waypoint","waypoints",this);


/*******  Slick Nav - Responsive Menu   ********/
/*!
	SlickNav Responsive Mobile Menu
	(c) 2013 Josh Cope
	licensed under GPL and MIT
*/
(function(e,t,n){function o(t,n){this.element=t;this.settings=e.extend({},r,n);this._defaults=r;this._name=i;this.init()}var r={label:"MENU",duplicate:true,duration:200,easingOpen:"swing",easingClose:"swing",closedSymbol:"&#9658;",openedSymbol:"&#9660;",prependTo:"body",parentTag:"a",closeOnClick:false,allowParentLinks:false,init:function(){},open:function(){},close:function(){}},i="slicknav",s="slicknav";o.prototype.init=function(){var n=this;var r=e(this.element);var i=this.settings;if(i.duplicate){n.mobileNav=r.clone();n.mobileNav.removeAttr("id");n.mobileNav.find("*").each(function(t,n){e(n).removeAttr("id")})}else n.mobileNav=r;var o=s+"_icon";if(i.label==""){o+=" "+s+"_no-text"}if(i.parentTag=="a"){i.parentTag='a href="#"'}n.mobileNav.attr("class",s+"_nav");var u=e('<div class="'+s+'_menu"></div>');n.btn=e("<"+i.parentTag+' aria-haspopup="true" tabindex="0" class="'+s+"_btn "+s+'_collapsed"><span class="'+s+'_menutxt">'+i.label+'</span><span class="'+o+'"><span class="'+s+'_icon-bar"></span><span class="'+s+'_icon-bar"></span><span class="'+s+'_icon-bar"></span></span></a>');e(u).append(n.btn);e(i.prependTo).prepend(u);u.append(n.mobileNav);var a=n.mobileNav.find("li");e(a).each(function(){var t=e(this);data={};data.children=t.children("ul").attr("role","menu");t.data("menu",data);if(data.children.length>0){var r=t.contents();var o=[];e(r).each(function(){if(!e(this).is("ul")){o.push(this)}else{return false}});var u=e(o).wrapAll("<"+i.parentTag+' role="menuitem" aria-haspopup="true" tabindex="-1" class="'+s+'_item"/>').parent();t.addClass(s+"_collapsed");t.addClass(s+"_parent");e(o).last().after('<span class="'+s+'_arrow">'+i.closedSymbol+"</span>")}else if(t.children().length==0){t.addClass(s+"_txtnode")}t.children("a").attr("role","menuitem").click(function(){if(i.closeOnClick)e(n.btn).click()})});e(a).each(function(){var t=e(this).data("menu");n._visibilityToggle(t.children,false,null,true)});n._visibilityToggle(n.mobileNav,false,"init",true);n.mobileNav.attr("role","menu");e(t).mousedown(function(){n._outlines(false)});e(t).keyup(function(){n._outlines(true)});e(n.btn).click(function(e){e.preventDefault();n._menuToggle()});n.mobileNav.on("click","."+s+"_item",function(t){t.preventDefault();n._itemClick(e(this))});e(n.btn).keydown(function(e){var t=e||event;if(t.keyCode==13){e.preventDefault();n._menuToggle()}});n.mobileNav.on("keydown","."+s+"_item",function(t){var r=t||event;if(r.keyCode==13){t.preventDefault();n._itemClick(e(t.target))}});if(i.allowParentLinks){e("."+s+"_item a").click(function(e){e.stopImmediatePropagation()})}};o.prototype._menuToggle=function(e){var t=this;var n=t.btn;var r=t.mobileNav;if(n.hasClass(s+"_collapsed")){n.removeClass(s+"_collapsed");n.addClass(s+"_open")}else{n.removeClass(s+"_open");n.addClass(s+"_collapsed")}n.addClass(s+"_animating");t._visibilityToggle(r,true,n)};o.prototype._itemClick=function(e){var t=this;var n=t.settings;var r=e.data("menu");if(!r){r={};r.arrow=e.children("."+s+"_arrow");r.ul=e.next("ul");r.parent=e.parent();e.data("menu",r)}if(r.parent.hasClass(s+"_collapsed")){r.arrow.html(n.openedSymbol);r.parent.removeClass(s+"_collapsed");r.parent.addClass(s+"_open");r.parent.addClass(s+"_animating");t._visibilityToggle(r.ul,true,e)}else{r.arrow.html(n.closedSymbol);r.parent.addClass(s+"_collapsed");r.parent.removeClass(s+"_open");r.parent.addClass(s+"_animating");t._visibilityToggle(r.ul,true,e)}};o.prototype._visibilityToggle=function(t,n,r,i){var o=this;var u=o.settings;var a=o._getActionItems(t);var f=0;if(n)f=u.duration;if(t.hasClass(s+"_hidden")){t.removeClass(s+"_hidden");t.slideDown(f,u.easingOpen,function(){e(r).removeClass(s+"_animating");e(r).parent().removeClass(s+"_animating");if(!i){u.open(r)}});t.attr("aria-hidden","false");a.attr("tabindex","0");o._setVisAttr(t,false)}else{t.addClass(s+"_hidden");t.slideUp(f,this.settings.easingClose,function(){t.attr("aria-hidden","true");a.attr("tabindex","-1");o._setVisAttr(t,true);t.hide();e(r).removeClass(s+"_animating");e(r).parent().removeClass(s+"_animating");if(!i)u.close(r);else if(r=="init")u.init()})}};o.prototype._setVisAttr=function(t,n){var r=this;var i=t.children("li").children("ul").not("."+s+"_hidden");if(!n){i.each(function(){var t=e(this);t.attr("aria-hidden","false");var i=r._getActionItems(t);i.attr("tabindex","0");r._setVisAttr(t,n)})}else{i.each(function(){var t=e(this);t.attr("aria-hidden","true");var i=r._getActionItems(t);i.attr("tabindex","-1");r._setVisAttr(t,n)})}};o.prototype._getActionItems=function(e){var t=e.data("menu");if(!t){t={};var n=e.children("li");var r=n.children("a");t.links=r.add(n.children("."+s+"_item"));e.data("menu",t)}return t.links};o.prototype._outlines=function(t){if(!t){e("."+s+"_item, ."+s+"_btn").css("outline","none")}else{e("."+s+"_item, ."+s+"_btn").css("outline","")}};o.prototype.toggle=function(){$this._menuToggle()};o.prototype.open=function(){$this=this;if($this.btn.hasClass(s+"_collapsed")){$this._menuToggle()}};o.prototype.close=function(){$this=this;if($this.btn.hasClass(s+"_open")){$this._menuToggle()}};e.fn[i]=function(t){var n=arguments;if(t===undefined||typeof t==="object"){return this.each(function(){if(!e.data(this,"plugin_"+i)){e.data(this,"plugin_"+i,new o(this,t))}})}else if(typeof t==="string"&&t[0]!=="_"&&t!=="init"){var r;this.each(function(){var s=e.data(this,"plugin_"+i);if(s instanceof o&&typeof s[t]==="function"){r=s[t].apply(s,Array.prototype.slice.call(n,1))}});return r!==undefined?r:this}}})(jQuery,document,window);

