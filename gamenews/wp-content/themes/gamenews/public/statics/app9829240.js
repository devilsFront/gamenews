!function(e){var t={};function a(n){if(t[n])return t[n].exports;var r=t[n]={i:n,l:!1,exports:{}};return e[n].call(r.exports,r,r.exports,a),r.l=!0,r.exports}a.m=e,a.c=t,a.d=function(e,t,n){a.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},a.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},a.t=function(e,t){if(1&t&&(e=a(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(a.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)a.d(n,r,function(t){return e[t]}.bind(null,r));return n},a.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return a.d(t,"a",t),t},a.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},a.p="",a(a.s=0)}([function(e,t,a){"use strict";a.r(t);var n=document.querySelector('[data-element="index-banners"]');function r(){for(var e=n.querySelectorAll('[data-element="index-banners__area"]'),t=n.querySelectorAll('[data-element="index-banners__nav-button"]'),a=n.querySelector('[data-element="index-banners__button_prev"]'),r=n.querySelector('[data-element="index-banners__button_next"]'),s=0;s<t.length;s++)t[s].addEventListener("click",c);var i=0;function l(e){n.getElementsByClassName("index-banners__nav-item_active")[0].classList.remove("index-banners__nav-item_active"),t[e].classList.add("index-banners__nav-item_active")}function c(){n.getElementsByClassName("index-banners__nav-item_active")[0].classList.remove("index-banners__nav-item_active"),this.classList.add("index-banners__nav-item_active");var t=this.getAttribute("data-index");i=t,function(t){n.getElementsByClassName("index-banners__area_active")[0].classList.remove("index-banners__area_active"),e[t].classList.add("index-banners__area_active")}(t)}a.addEventListener("click",(function(){(i-=1)<0&&(i=e.length-1);n.getElementsByClassName("index-banners__nav-item_active")[0].classList.remove("index-banners__nav-item_active"),e[i].classList.add("index-banners__nav-item_active"),l(i)})),r.addEventListener("click",(function(){(i+=1)===e.length&&(i=0);n.getElementsByClassName("index-banners__nav-item_active")[0].classList.remove("index-banners__nav-item_active"),e[i].classList.add("index-banners__nav-item_active"),l(i)}))}var s=document.querySelector('[data-element="header"]');function i(){var e=s.querySelector('[data-element="header__nav"]'),t=s.querySelector('[data-element="header__button_burger"]'),a=s.querySelector('[data-element="header__layer"]');t.addEventListener("click",(function(){t.classList.contains("header__button_burger-active")?o():(t.classList.add("header__button_burger-active"),e.classList.add("header__nav_active"),a.classList.add("header__layer_active"))})),a.addEventListener("click",o);var n=s.querySelector('[data-element="header__button_search"]'),r=s.querySelector('[data-element="header__search-form"]'),i=s.querySelector('[data-element="header__layer-search"]'),l=s.querySelector('[data-element="header__search-btn_close"]');function c(){r.classList.remove("header__search-form_active"),i.classList.remove("header__layer-search_active")}function o(){t.classList.remove("header__button_burger-active"),e.classList.remove("header__nav_active"),a.classList.remove("header__layer_active")}n.addEventListener("click",(function(){r.classList.add("header__search-form_active"),i.classList.add("header__layer-search_active")})),i.addEventListener("click",c),l.addEventListener("click",c)}var l=document.querySelector('[data-element="post"]');function c(){var e=l.querySelector('[data-element="post__comment-link"]'),t=l.querySelector('[data-element="post__comment-textarea-main"]'),a=l.querySelectorAll('[data-element="post__comment-answer"]');e.addEventListener("click",(function(){t.focus()}));for(var n=0;n<a.length;n++)a[n].addEventListener("click",r);function r(){var e=l.getElementsByClassName("post__comment-answer_hide")[0];e&&e.classList.remove("post__comment-answer_hide");var t=l.getElementsByClassName("post__comment-form_active")[0];t&&t.classList.remove("post__comment-form_active"),this.classList.add("post__comment-answer_hide"),this.nextElementSibling.classList.add("post__comment-form_active")}}var o=document.querySelector('[data-role="validation__form"]');function d(){var e=o.querySelectorAll('[data-role="form-input"]'),t=o.querySelector('[data-role="form-button"]'),a=o.querySelector('[data-element="password2"]'),n=o.querySelector('[data-element="password"]');o.addEventListener("input",(function(){for(var r=0;r<e.length;r++)e[r].parentElement.classList.remove("form-label_wrong"),e[r].parentElement.classList.remove("form-label_alright"),e[r].parentElement.classList.add("form-label");for(var s=0;s<e.length;s++){if(!e[s].validity.valid)return t.disabled=!0,e[s].parentElement.classList.remove("form-label"),void e[s].parentElement.classList.add("form-label_wrong");e[s].parentElement.classList.remove("form-label"),e[s].parentElement.classList.add("form-label_alright")}if(a){if(n.value!==a.value)return a.parentElement.classList.remove("form-label_alright"),a.parentElement.classList.add("form-label_wrong"),void(t.disabled=!0);a.parentElement.classList.add("form-label_alright")}t.disabled=!1}))}n&&setTimeout(r,0),s&&setTimeout(i,0),l&&setTimeout(c,0),o&&setTimeout(d,0)}]);