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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/gull/assets/styles/sass/themes/hubbell.scss":
/*!***************************************************************!*\
  !*** ./resources/gull/assets/styles/sass/themes/hubbell.scss ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/js/scripts.js":
/*!*********************************!*\
  !*** ./resources/js/scripts.js ***!
  \*********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _scripts_getViewport_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./scripts/getViewport.js */ "./resources/js/scripts/getViewport.js");
/* harmony import */ var _scripts_handleMenuFit_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./scripts/handleMenuFit.js */ "./resources/js/scripts/handleMenuFit.js");
/* harmony import */ var _scripts_handleCategory_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./scripts/handleCategory.js */ "./resources/js/scripts/handleCategory.js");
/* harmony import */ var _scripts_handleImages_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./scripts/handleImages.js */ "./resources/js/scripts/handleImages.js");
/* harmony import */ var _scripts_handleResources_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./scripts/handleResources.js */ "./resources/js/scripts/handleResources.js");
/* harmony import */ var _scripts_handleRichEditor_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./scripts/handleRichEditor.js */ "./resources/js/scripts/handleRichEditor.js");
/* harmony import */ var _scripts_initDatepickerComponents_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./scripts/initDatepickerComponents.js */ "./resources/js/scripts/initDatepickerComponents.js");
/* harmony import */ var _scripts_initFastSelectComponents_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./scripts/initFastSelectComponents.js */ "./resources/js/scripts/initFastSelectComponents.js");
/* harmony import */ var _scripts_initMapInputComponents_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./scripts/initMapInputComponents.js */ "./resources/js/scripts/initMapInputComponents.js");
/* harmony import */ var _scripts_initTimepickerComponents_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./scripts/initTimepickerComponents.js */ "./resources/js/scripts/initTimepickerComponents.js");
/* harmony import */ var _scripts_initDropZoneComponents_js__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./scripts/initDropZoneComponents.js */ "./resources/js/scripts/initDropZoneComponents.js");











Dropzone.autoDiscover = false;
$(function () {
  /////////////////////////////
  /////////////////////////////
  var viewport = {
    x: 0,
    y: 0
  }; /////////////////////////////
  /////////////////////////////

  function init() {
    $(window).resize(resize);
    Object(_scripts_handleMenuFit_js__WEBPACK_IMPORTED_MODULE_1__["handleMenuFit"])();
    Object(_scripts_initDatepickerComponents_js__WEBPACK_IMPORTED_MODULE_6__["initDatepickerComponents"])();
    Object(_scripts_initFastSelectComponents_js__WEBPACK_IMPORTED_MODULE_7__["initFastSelectComponents"])();
    Object(_scripts_initMapInputComponents_js__WEBPACK_IMPORTED_MODULE_8__["initMapInputComponents"])();
    Object(_scripts_initTimepickerComponents_js__WEBPACK_IMPORTED_MODULE_9__["initTimepickerComponents"])();
    Object(_scripts_initDropZoneComponents_js__WEBPACK_IMPORTED_MODULE_10__["initDropZoneComponents"])();
    Object(_scripts_handleCategory_js__WEBPACK_IMPORTED_MODULE_2__["handleCategory"])();
    Object(_scripts_handleImages_js__WEBPACK_IMPORTED_MODULE_3__["handleImages"])();
    Object(_scripts_handleResources_js__WEBPACK_IMPORTED_MODULE_4__["handleResources"])();
    Object(_scripts_handleRichEditor_js__WEBPACK_IMPORTED_MODULE_5__["handleRichEditor"])();
  }

  function resize() {
    viewport = Object(_scripts_getViewport_js__WEBPACK_IMPORTED_MODULE_0__["getViewport"])();
    Object(_scripts_handleMenuFit_js__WEBPACK_IMPORTED_MODULE_1__["handleMenuFit"])();
  } /////////////////////////////
  /////////////////////////////


  init(); /////////////////////////////
  /////////////////////////////
});

/***/ }),

/***/ "./resources/js/scripts/getViewport.js":
/*!*********************************************!*\
  !*** ./resources/js/scripts/getViewport.js ***!
  \*********************************************/
/*! exports provided: getViewport */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getViewport", function() { return getViewport; });
function getViewport() {
  var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
  var h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
  return {
    w: w,
    h: h
  };
}

/***/ }),

/***/ "./resources/js/scripts/handleCategory.js":
/*!************************************************!*\
  !*** ./resources/js/scripts/handleCategory.js ***!
  \************************************************/
/*! exports provided: handleCategory */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "handleCategory", function() { return handleCategory; });
function handleCategory() {
  var levelsTotal = $('#field_category_level_id_ > option').length;
  console.log(levelsTotal);
  return null;
}

/***/ }),

/***/ "./resources/js/scripts/handleImages.js":
/*!**********************************************!*\
  !*** ./resources/js/scripts/handleImages.js ***!
  \**********************************************/
/*! exports provided: handleImages */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "handleImages", function() { return handleImages; });
function handleImages() {
  var fileContainer = $('.file-container');
  fileContainer.mouseenter(function () {
    $(this).find('.card-img-overlay').fadeIn();
  });
  fileContainer.mouseleave(function () {
    $(this).find('.card-img-overlay').fadeOut();
  });

  if ($('#sort_files').length) {
    var currentFiles = jQuery.parseJSON($('#sort_files').val());
  }

  $("#sortable").sortable({
    revert: true,
    update: function update() {
      var getImages = $('#sortable').find('.file-container');
      var dragOrder = [];
      var newOrderFiles = [];
      $.each(getImages, function (key, value) {
        dragOrder.push({
          id: $(value).data('id'),
          order: key + 1
        });
      });
      dragOrder = dragOrder.filter(function (element) {
        return element !== undefined;
      });
      $.each(currentFiles, function (key, value) {
        $.each(dragOrder, function (key, e) {
          if (value['id'] == e['id']) {
            value['order'] = e['order'];
          }
        });
        newOrderFiles.push(value);
      });
      $('#sort_files').val(JSON.stringify(newOrderFiles));
    }
  });
  fileContainer.draggable({
    connectToSortable: "#sortable",
    revert: "invalid"
  });
  return null;
}

/***/ }),

/***/ "./resources/js/scripts/handleMenuFit.js":
/*!***********************************************!*\
  !*** ./resources/js/scripts/handleMenuFit.js ***!
  \***********************************************/
/*! exports provided: handleMenuFit */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "handleMenuFit", function() { return handleMenuFit; });
/* harmony import */ var _isViewport_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./isViewport.js */ "./resources/js/scripts/isViewport.js");

function handleMenuFit() {
  var menu = $("#app-menu");
  var dinamicLiWrapper = menu.find("#app-menu-fit-li");
  var shouldResize = false;

  var getLimitWidth = function getLimitWidth() {
    var menuPaddingRight = parseInt(menu.css("padding-right"), 10);
    var negativeOffset = 120;
    return menu.outerWidth() - menuPaddingRight - negativeOffset;
  };

  var getChildsWidth = function getChildsWidth(liOptions) {
    var optionsWidth = 0;
    liOptions = liOptions || getMenuOptions();
    liOptions.each(function () {
      var li = $(this);
      optionsWidth += li.outerWidth();
    });
    return optionsWidth;
  };

  var getMenuOptions = function getMenuOptions(popLength) {
    var options = menu.find("> li").not(dinamicLiWrapper);

    if (popLength) {
      for (var i = 0; i < popLength; i++) {
        options.splice(options.length - 1, 1);
      }
    }

    return options;
  };

  var shouldResize = function shouldResize() {
    resetMenu();
    var widthResult = getLimitWidth() - getChildsWidth();
    return widthResult < 0;
  };

  var resetMenu = function resetMenu() {
    dinamicLiWrapper.find("ul").html("");
    dinamicLiWrapper.hide();
    menu.find("> li").not(dinamicLiWrapper).show();
  };

  var fitMenu = function fitMenu(popMenuLength) {
    popMenuLength = popMenuLength || 1;
    var options = getMenuOptions(popMenuLength);
    var optionsWidth = 0;
    options.each(function () {
      var li = $(this);
      optionsWidth += li.outerWidth();
    });
    var widthResult = getLimitWidth() - optionsWidth;
    var shouldPopOption = widthResult < 0;

    if (shouldPopOption) {
      fitMenu(popMenuLength + 1);
    } else {
      var floatOptions = [];
      var optionsLength = menu.find("> li").not(dinamicLiWrapper).length;

      for (var i = 0; i < popMenuLength; i++) {
        var index = optionsLength - i - 1;
        var item = menu.find("> li").not(dinamicLiWrapper).eq(index);
        var clonedOption = item.clone();
        item.hide();
        floatOptions.push(clonedOption);
      }

      floatOptions = floatOptions.reverse();

      for (var i = 0; i < floatOptions.length; i++) {
        dinamicLiWrapper.find("ul").html("");
        dinamicLiWrapper.find("ul").append(floatOptions);
      }

      dinamicLiWrapper.show();
    }
  };

  if (!Object(_isViewport_js__WEBPACK_IMPORTED_MODULE_0__["isViewport"])("medium") && shouldResize()) {//fitMenu();
  } else {
    resetMenu();
  }
}

/***/ }),

/***/ "./resources/js/scripts/handleResources.js":
/*!*************************************************!*\
  !*** ./resources/js/scripts/handleResources.js ***!
  \*************************************************/
/*! exports provided: handleResources */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "handleResources", function() { return handleResources; });
function handleResources() {
  var counter_option = 0;
  $('.add_resource').on('click', function () {
    $('#resources_container').css('display', 'block');
    $('#resources_container').append('<div class="section_container">' + '<div class="input-container">' + '<label>Titulo de sección</label><br>' + '<input type="text" name="section_resource[' + counter_option + '][title][]" />' + '</div>' + '<div class="input-container">' + '<label>Archivo de sección</label><br>' + '<input type="file" name="section_resource[' + counter_option + '][resource][]" />' + '</div>' + '</div>');
    counter_option++;
  });
  return null;
}

/***/ }),

/***/ "./resources/js/scripts/handleRichEditor.js":
/*!**************************************************!*\
  !*** ./resources/js/scripts/handleRichEditor.js ***!
  \**************************************************/
/*! exports provided: handleRichEditor */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "handleRichEditor", function() { return handleRichEditor; });
function handleRichEditor() {
  return null;
}

/***/ }),

/***/ "./resources/js/scripts/initDatepickerComponents.js":
/*!**********************************************************!*\
  !*** ./resources/js/scripts/initDatepickerComponents.js ***!
  \**********************************************************/
/*! exports provided: initDatepickerComponents */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "initDatepickerComponents", function() { return initDatepickerComponents; });
function _defineProperty(obj, key, value) {
  if (key in obj) {
    Object.defineProperty(obj, key, {
      value: value,
      enumerable: true,
      configurable: true,
      writable: true
    });
  } else {
    obj[key] = value;
  }

  return obj;
}

function initDatepickerComponents() {
  $('.app-input-datepicker').each(function () {
    var _$$pickadate;

    var dateFormat = $(this).data('format');
    var maxDaysLimitFromNow = $(this).data('max-days-limit-from-now');
    var maxSelectionDate = new Date();
    maxSelectionDate.setDate(maxSelectionDate.getDate() + parseInt(maxDaysLimitFromNow));
    $(this).pickadate((_$$pickadate = {
      selectYears: true
    }, _defineProperty(_$$pickadate, "selectYears", 70), _defineProperty(_$$pickadate, "selectMonths", true), _defineProperty(_$$pickadate, "format", dateFormat), _defineProperty(_$$pickadate, "formatSubmit", dateFormat), _defineProperty(_$$pickadate, "max", maxSelectionDate), _$$pickadate));
  });
}

/***/ }),

/***/ "./resources/js/scripts/initDropZoneComponents.js":
/*!********************************************************!*\
  !*** ./resources/js/scripts/initDropZoneComponents.js ***!
  \********************************************************/
/*! exports provided: initDropZoneComponents */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "initDropZoneComponents", function() { return initDropZoneComponents; });
function initDropZoneComponents(className) {}

/***/ }),

/***/ "./resources/js/scripts/initFastSelectComponents.js":
/*!**********************************************************!*\
  !*** ./resources/js/scripts/initFastSelectComponents.js ***!
  \**********************************************************/
/*! exports provided: initFastSelectComponents */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "initFastSelectComponents", function() { return initFastSelectComponents; });
function initFastSelectComponents(className) {
  $(".app-fast-select").each(function () {
    var elem = $(this);
    var placeholder = elem.data('placeholder');
    elem.fastselect({
      placeholder: placeholder
    });
  });
}

/***/ }),

/***/ "./resources/js/scripts/initMapInputComponents.js":
/*!********************************************************!*\
  !*** ./resources/js/scripts/initMapInputComponents.js ***!
  \********************************************************/
/*! exports provided: initMapInputComponents */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "initMapInputComponents", function() { return initMapInputComponents; });
function initMapInputComponents() {
  var maps = $('.app-map-wrapper');

  function placeMarker(event, marker, map) {
    if (marker) {
      marker.setPosition(event.latLng);
    } else {
      marker = new google.maps.Marker({
        position: event.latLng,
        map: map,
        draggable: true
      });
    }

    marker.setMap(map);
    map.panTo(event.latLng);
  }

  function fillInputs(event, latitudeInput, longitudeInput) {
    latitudeInput.val(event.latLng.lat());
    longitudeInput.val(event.latLng.lng());
  }

  if (maps.length) {
    maps.each(function () {
      var container = $(this);
      var mapWrapper = container.find('.app-google-map');
      var mapResetBtn = container.find('.app-google-clear-map');
      var marker;
      var mapId = mapWrapper.data('map-id');
      var mapElem = document.getElementById(mapId);
      var latitudeInput = container.find('.latitude-wrapper input');
      var longitudeInput = container.find('.longitude-wrapper input');
      var dataLat = mapWrapper.data('lat');
      var dataLng = mapWrapper.data('lng');
      var position = {
        lat: dataLat || 20.666155,
        lng: dataLng || -105.251954
      };
      var map = new google.maps.Map(mapElem, {
        center: position,
        zoom: 12,
        disableDefaultUI: true,
        fullscreenControl: false
      });

      if (dataLat && dataLng) {
        marker = new google.maps.Marker({
          position: position,
          map: map,
          draggable: true
        });
      }

      if (mapResetBtn.length) {
        mapResetBtn.on('click', function () {
          marker.setMap(null);
          latitudeInput.val('');
          longitudeInput.val('');
        });
      }

      google.maps.event.addListener(map, 'click', function (e) {
        placeMarker(e, marker, map);
        fillInputs(e, latitudeInput, longitudeInput);
      });
      google.maps.event.addListener(marker, 'dragend', function (e) {
        placeMarker(e, marker, map);
        fillInputs(e, latitudeInput, longitudeInput);
      });
    });
  }
}

/***/ }),

/***/ "./resources/js/scripts/initTimepickerComponents.js":
/*!**********************************************************!*\
  !*** ./resources/js/scripts/initTimepickerComponents.js ***!
  \**********************************************************/
/*! exports provided: initTimepickerComponents */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "initTimepickerComponents", function() { return initTimepickerComponents; });
function initTimepickerComponents() {
  $('.app-input-timepicker').each(function () {
    var input = $(this);
    var timeFormat = input.data('time-format');
    var timeInterval = input.data('time-interval');
    input.timepicker({
      timeFormat: timeFormat,
      interval: timeInterval,
      minTime: '00:00',
      maxTime: '23:59',
      startTime: '00:00',
      dynamic: false,
      dropdown: true,
      scrollbar: true
    });
  });
}

/***/ }),

/***/ "./resources/js/scripts/isViewport.js":
/*!********************************************!*\
  !*** ./resources/js/scripts/isViewport.js ***!
  \********************************************/
/*! exports provided: isViewport */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "isViewport", function() { return isViewport; });
/* harmony import */ var _getViewport_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./getViewport.js */ "./resources/js/scripts/getViewport.js");

function isViewport(size) {
  var viewport = Object(_getViewport_js__WEBPACK_IMPORTED_MODULE_0__["getViewport"])();

  if (size == "medium") {
    return viewport.w <= 767;
  }

  return null;
}

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************************************************************************!*\
  !*** multi ./resources/js/scripts.js ./resources/sass/app.scss ./resources/gull/assets/styles/sass/themes/hubbell.scss ***!
  \*************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\wamp64\www\laravel\hubbell\resources\js\scripts.js */"./resources/js/scripts.js");
__webpack_require__(/*! C:\wamp64\www\laravel\hubbell\resources\sass\app.scss */"./resources/sass/app.scss");
module.exports = __webpack_require__(/*! C:\wamp64\www\laravel\hubbell\resources\gull\assets\styles\sass\themes\hubbell.scss */"./resources/gull/assets/styles/sass/themes/hubbell.scss");


/***/ })

/******/ });