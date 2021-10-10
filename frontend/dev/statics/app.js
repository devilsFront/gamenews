/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./assets/scripts/app.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/scripts/app.js":
/*!*******************************!*\
  !*** ./assets/scripts/app.js ***!
  \*******************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _import_index_banners__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./import/index-banners */ "./assets/scripts/import/index-banners.js");
/* harmony import */ var _import_header__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./import/header */ "./assets/scripts/import/header.js");
/* harmony import */ var _import_comment__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./import/comment */ "./assets/scripts/import/comment.js");
/* harmony import */ var _import_validation_form__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./import/validation-form */ "./assets/scripts/import/validation-form.js");
/* harmony import */ var _import_send_form__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./import/send-form */ "./assets/scripts/import/send-form.js");





Object(_import_index_banners__WEBPACK_IMPORTED_MODULE_0__["indexBannersExport"])();
Object(_import_header__WEBPACK_IMPORTED_MODULE_1__["headerExport"])();
Object(_import_comment__WEBPACK_IMPORTED_MODULE_2__["exportPost"])();
Object(_import_validation_form__WEBPACK_IMPORTED_MODULE_3__["exportValidationForm"])();
Object(_import_send_form__WEBPACK_IMPORTED_MODULE_4__["exportSendForm"])();

/***/ }),

/***/ "./assets/scripts/import/comment.js":
/*!******************************************!*\
  !*** ./assets/scripts/import/comment.js ***!
  \******************************************/
/*! exports provided: exportPost */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "exportPost", function() { return exportPost; });
var post = document.querySelector('[data-element="post"]');
function exportPost() {
  if (post) setTimeout(postInit, 0);
}

function postInit() {
  var postCommentLink = post.querySelector('[data-element="post__comment-link"]');
  var postCommentTextarea = post.querySelector('[data-element="post__comment-textarea-main"]');
  var postCommentAnswerAll = post.querySelectorAll('[data-element="post__comment-answer"]');
  postCommentLink.addEventListener("click", textareaFocused);

  for (var i = 0; i < postCommentAnswerAll.length; i++) {
    postCommentAnswerAll[i].addEventListener("click", showForm);
  }

  function textareaFocused() {
    postCommentTextarea.focus();
  }

  function showForm() {
    var oldAnswerHide = post.getElementsByClassName("post__comment-answer_hide")[0];
    if (oldAnswerHide) oldAnswerHide.classList.remove("post__comment-answer_hide");
    var oldActiveForm = post.getElementsByClassName("post__comment-form_active")[0];
    if (oldActiveForm) oldActiveForm.classList.remove("post__comment-form_active");
    this.classList.add("post__comment-answer_hide");
    this.nextElementSibling.classList.add("post__comment-form_active");
  }
}

/***/ }),

/***/ "./assets/scripts/import/header.js":
/*!*****************************************!*\
  !*** ./assets/scripts/import/header.js ***!
  \*****************************************/
/*! exports provided: headerExport */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "headerExport", function() { return headerExport; });
var header = document.querySelector('[data-element="header"]');
function headerExport() {
  if (header) setTimeout(headerInit, 0);
}

function headerInit() {
  var headerNav = header.querySelector('[data-element="header__nav"]');
  var headerButtonBurger = header.querySelector('[data-element="header__button_burger"]');
  var headerLayer = header.querySelector('[data-element="header__layer"]');
  headerButtonBurger.addEventListener('click', toggleMenu);
  headerLayer.addEventListener('click', closeMenu);
  var headerSearchButton = header.querySelector('[data-element="header__button_search"]');
  var headerSearchForm = header.querySelector('[data-element="header__search-form"]');
  var headerLayerSearch = header.querySelector('[data-element="header__layer-search"]');
  var headerSearchBtnClose = header.querySelector('[data-element="header__search-btn_close"]');
  headerSearchButton.addEventListener("click", openSearch);
  headerLayerSearch.addEventListener("click", closeSearch);
  headerSearchBtnClose.addEventListener("click", closeSearch);

  function openSearch() {
    headerSearchForm.classList.add("header__search-form_active");
    headerLayerSearch.classList.add("header__layer-search_active");
  }

  function closeSearch() {
    headerSearchForm.classList.remove("header__search-form_active");
    headerLayerSearch.classList.remove("header__layer-search_active");
  }

  function closeMenu() {
    headerButtonBurger.classList.remove("header__button_burger-active");
    headerNav.classList.remove("header__nav_active");
    headerLayer.classList.remove("header__layer_active");
  }

  function toggleMenu() {
    if (headerButtonBurger.classList.contains("header__button_burger-active")) {
      closeMenu();
    } else {
      headerButtonBurger.classList.add("header__button_burger-active");
      headerNav.classList.add("header__nav_active");
      headerLayer.classList.add("header__layer_active");
    }
  }
}

/***/ }),

/***/ "./assets/scripts/import/index-banners.js":
/*!************************************************!*\
  !*** ./assets/scripts/import/index-banners.js ***!
  \************************************************/
/*! exports provided: indexBannersExport */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "indexBannersExport", function() { return indexBannersExport; });
var indexBanners = document.querySelector('[data-element="index-banners"]');
function indexBannersExport() {
  if (indexBanners) setTimeout(indexBannersInit, 0);
}

function indexBannersInit() {
  var areaArray = indexBanners.querySelectorAll('[data-element="index-banners__area"]');
  var navButtonsArray = indexBanners.querySelectorAll('[data-element="index-banners__nav-button"]');
  var buttonPrev = indexBanners.querySelector('[data-element="index-banners__button_prev"]');
  var buttonNext = indexBanners.querySelector('[data-element="index-banners__button_next"]');

  for (var i = 0; i < navButtonsArray.length; i++) {
    navButtonsArray[i].addEventListener("click", checkoutSlide);
  }

  var activeSlideGlobal = 0;
  buttonPrev.addEventListener("click", prevSlideCheck);
  buttonNext.addEventListener("click", nextSlideCheck);

  function prevSlideCheck() {
    activeSlideGlobal -= 1;
    if (activeSlideGlobal < 0) activeSlideGlobal = areaArray.length - 1;
    toggleSlide(activeSlideGlobal);
    toggleNavItem(activeSlideGlobal);
  }

  function toggleNavItem(activeSlideGlobal) {
    var oldActiveNavItem = indexBanners.getElementsByClassName("index-banners__nav-item_active")[0];
    oldActiveNavItem.classList.remove("index-banners__nav-item_active");
    navButtonsArray[activeSlideGlobal].classList.add("index-banners__nav-item_active");
  }

  function nextSlideCheck() {
    activeSlideGlobal += 1;
    if (activeSlideGlobal === areaArray.length) activeSlideGlobal = 0;
    toggleSlide(activeSlideGlobal);
    toggleNavItem(activeSlideGlobal);
  }

  function checkoutSlide() {
    var oldActiveNavItem = indexBanners.getElementsByClassName("index-banners__nav-item_active")[0];
    oldActiveNavItem.classList.remove("index-banners__nav-item_active");
    this.classList.add("index-banners__nav-item_active");
    var indexSlide = this.getAttribute("data-index");
    activeSlideGlobal = Number(indexSlide);
    toggleSlide(indexSlide);
  }

  function toggleSlide(indexSlide) {
    var oldActiveSlide = indexBanners.getElementsByClassName("index-banners__area_active")[0];
    oldActiveSlide.classList.remove("index-banners__area_active");
    areaArray[indexSlide].classList.add("index-banners__area_active");
  }
}

/***/ }),

/***/ "./assets/scripts/import/send-form.js":
/*!********************************************!*\
  !*** ./assets/scripts/import/send-form.js ***!
  \********************************************/
/*! exports provided: exportSendForm */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "exportSendForm", function() { return exportSendForm; });
var formArray = document.querySelectorAll('[data-role="validation__form"]');
function exportSendForm() {
  if (formArray) setTimeout(sendFormInit, 0);
}

function sendFormInit() {
  for (var i = 0; i < formArray.length; i++) {
    formArray[i].addEventListener('submit', sendForm);
  }
}

function sendForm(event) {
  event.preventDefault();
  var xhr = new XMLHttpRequest();
  var url = this.getAttribute("action");
  xhr.open("POST", url, true);
  xhr.send(new FormData(this));
  var data_redirect = this.getAttribute("data-redirect");
  var data_form_type = this.getAttribute("data-form-type");

  xhr.onreadystatechange = function () {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      if (data_redirect) {
        if (xhr.response === "success") {
          window.location.href = data_redirect;
        } else if (xhr.response === "Почта уже используется" || "Логин уже используется" || "Пользователь с такой почтой уже зарегистрирован") {
          var formError = this.querySelector('[data-element="form-error"]');
        }
      } else if (data_form_type === "comment") {
        var parseResponse = JSON.parse(xhr.response);
        updateCommentsCount(parseResponse.count); // updateComments(parseResponse.comment)
      }
    } else {
      alert("При отправке что-то пошло не так");
    }
  };
}

function updateComments(comment) {}

function updateCommentsCount(count) {
  var postInfoCommentCount = document.querySelector('[data-element="post__info-comment-count"]');
  var postCommentCount = document.querySelector('[data-element="post__comment-count"]');
  postInfoCommentCount.innerHTML = count;
  postCommentCount.innerHTML = count;
}

/***/ }),

/***/ "./assets/scripts/import/validation-form.js":
/*!**************************************************!*\
  !*** ./assets/scripts/import/validation-form.js ***!
  \**************************************************/
/*! exports provided: exportValidationForm */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "exportValidationForm", function() { return exportValidationForm; });
var validationForm = document.querySelector('[data-role="validation__form"]');
function exportValidationForm() {
  if (validationForm) setTimeout(validationFormInit, 0);
}

function validationFormInit() {
  var inputs = validationForm.querySelectorAll('[data-role="form-input"]');
  var button = validationForm.querySelector('[data-role="form-button"]');
  var password2 = validationForm.querySelector('[data-element="password2"]');
  var password = validationForm.querySelector('[data-element="password"]');
  validationForm.addEventListener("input", checkForm);

  function checkForm() {
    for (var i = 0; i < inputs.length; i++) {
      inputs[i].parentElement.classList.remove("form-label_wrong");
      inputs[i].parentElement.classList.remove("form-label_alright");
      inputs[i].parentElement.classList.add("form-label");
    }

    for (var _i = 0; _i < inputs.length; _i++) {
      if (!inputs[_i].validity.valid) {
        button.disabled = true;

        inputs[_i].parentElement.classList.remove("form-label");

        inputs[_i].parentElement.classList.add("form-label_wrong");

        return;
      } else {
        inputs[_i].parentElement.classList.remove("form-label");

        inputs[_i].parentElement.classList.add("form-label_alright");
      }
    }

    if (password2) {
      if (password.value !== password2.value) {
        password2.parentElement.classList.remove("form-label_alright");
        password2.parentElement.classList.add("form-label_wrong");
        button.disabled = true;
        return;
      } else {
        password2.parentElement.classList.add("form-label_alright");
      }
    }

    button.disabled = false;
  }
}

/***/ })

/******/ });
//# sourceMappingURL=app.js.map