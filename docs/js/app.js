/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./docs/assets/js/feedback.js":
/*!************************************!*\
  !*** ./docs/assets/js/feedback.js ***!
  \************************************/
/***/ (() => {

$(document).ready(function () {
  $('.slick').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 2,
    slidesToScroll: 1,
    responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    }, {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }, {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }]
  });
});

/***/ }),

/***/ "./docs/assets/js/header.js":
/*!**********************************!*\
  !*** ./docs/assets/js/header.js ***!
  \**********************************/
/***/ (() => {

$(document).ready(function () {
  $('#menuBar').click(function () {
    $('#menuBar').toggleClass('fa-xmark');
    $('#nav').toggleClass('show');
  }); //click to login/register

  $('#login-register').click(function () {
    $('#login').addClass('active');
    $('#closeFormLogin').css('display', 'block');
    $('#btnLogin').addClass('link-login');
    $('#closeRegisterForm').css('display', 'none');
    $('#btnRegister').removeClass('link-register');
  });
  $('#btnRegister').click(function () {
    $('#closeFormLogin').css('display', 'none');
    $('#closeRegisterForm').css('display', 'block');
    $('#btnLogin').removeClass('link-login');
    $('#btnRegister').addClass('link-register');
  });
  $('#btnLogin').click(function () {
    $('#closeFormLogin').css('display', 'block');
    $('#closeRegisterForm').css('display', 'none');
    $('#btnLogin').addClass('link-login');
    $('#btnRegister').removeClass('link-register');
  });
});

/***/ }),

/***/ "./docs/assets/js/message.js":
/*!***********************************!*\
  !*** ./docs/assets/js/message.js ***!
  \***********************************/
/***/ (() => {

$(document).ready(function () {
  $('#logoMess').click(function () {
    $('#body').toggleClass('show');
  });
  $('#closeMess').click(function () {
    $('#body').removeClass('show');
  });
});

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!*******************************!*\
  !*** ./docs/assets/js/app.js ***!
  \*******************************/
__webpack_require__(/*! ./header */ "./docs/assets/js/header.js");

__webpack_require__(/*! ./feedback */ "./docs/assets/js/feedback.js");

__webpack_require__(/*! ./message */ "./docs/assets/js/message.js");
})();

/******/ })()
;