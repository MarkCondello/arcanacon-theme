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
/******/ 	return __webpack_require__(__webpack_require__.s = "./src/index.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/affiliates/index.js":
/*!*********************************!*\
  !*** ./src/affiliates/index.js ***!
  \*********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);

var registerBlockType = wp.blocks.registerBlockType;
var InspectorControls = wp.editor.InspectorControls;
var __ = wp.i18n.__; // Import __() from wp.i18n

var withSelect = wp.data.withSelect;
var SelectControl = wp.components.SelectControl;
registerBlockType('arcanacon/affiliates', {
  title: 'Event Affiliates',
  icon: 'groups',
  category: 'layout',
  attributes: {
    affiliateImage: {
      type: 'string',
      source: 'attribute',
      selector: '.affiliate img',
      attribute: 'src'
    },
    affiliateExcerpt: {
      type: 'string',
      default: 'No Excerpt'
    },
    affiliateTitle: {
      type: 'string',
      default: 'No Title'
    }
  },
  edit: withSelect(function (select, props) {
    var query = {
      per_page: -1,
      status: 'publish'
    };
    return {
      affiliatePosts: wp.data.select('core').getEntityRecords('postType', 'affiliate', query)
    };
  })(function (props) {
    var _props$attributes = props.attributes,
        affiliateTitle = _props$attributes.affiliateTitle,
        affiliateImage = _props$attributes.affiliateImage,
        affiliateExcerpt = _props$attributes.affiliateExcerpt,
        setAttributes = props.setAttributes,
        affiliatePosts = props.affiliatePosts;

    var onSelectChange = function onSelectChange(value) {
      var matchedPost = affiliatePosts.filter(function (post) {
        return post.id === parseInt(value);
      });
      setAttributes({
        affiliateTitle: matchedPost[0].title.rendered
      });
      setAttributes({
        affiliateImage: matchedPost[0].featured_image
      });
      setAttributes({
        affiliateExcerpt: matchedPost[0].excerpt.rendered.replace(/(<([^>]+)>)/gi, "")
      });
    };

    var options = [];

    if (affiliatePosts) {
      options.push({
        value: null,
        label: "Select an affiliate"
      });
      affiliatePosts.forEach(function (post) {
        options.push({
          value: post.id,
          label: post.title.rendered
        });
      });
    } else {
      options.push({
        value: null,
        label: "There are not affiliate options"
      });
    }

    console.log({
      affiliateExcerpt: affiliateExcerpt
    });
    return [Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(InspectorControls, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(SelectControl, {
      label: "Select an option",
      options: options,
      onChange: onSelectChange,
      value: affiliateTitle
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      class: "affiliate"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("h3", null, affiliateTitle), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("img", {
      src: affiliateImage
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, affiliateExcerpt))];
  }),
  save: function save(props) {
    var _props$attributes2 = props.attributes,
        affiliateTitle = _props$attributes2.affiliateTitle,
        affiliateImage = _props$attributes2.affiliateImage,
        affiliateExcerpt = _props$attributes2.affiliateExcerpt;
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      class: "affiliate"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("h3", null, affiliateTitle), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("img", {
      src: affiliateImage
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, affiliateExcerpt));
  }
});

/***/ }),

/***/ "./src/cta/index.js":
/*!**************************!*\
  !*** ./src/cta/index.js ***!
  \**************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);

var registerBlockType = wp.blocks.registerBlockType;
var _wp$editor = wp.editor,
    RichText = _wp$editor.RichText,
    InspectorControls = _wp$editor.InspectorControls,
    ColorPalette = _wp$editor.ColorPalette;
var PanelBody = wp.components.PanelBody;
registerBlockType('arcanacon/custom-cta', {
  //built-in attrs
  title: 'CTA',
  description: 'Block for CTA',
  icon: 'format-image',
  category: 'layout',
  //custom attrs
  attributes: {
    title: {
      type: 'string',
      source: 'html',
      selector: 'h2'
    },
    titleColour: {
      type: 'string',
      default: 'black'
    },
    body: {
      type: 'string',
      source: 'html',
      selector: 'p'
    }
  },
  //custom funcs
  //built in funcs
  edit: function edit(props) {
    var _props$attributes = props.attributes,
        title = _props$attributes.title,
        titleColour = _props$attributes.titleColour,
        body = _props$attributes.body,
        setAttributes = props.setAttributes;

    var onChangeTitle = function onChangeTitle(value) {
      setAttributes({
        title: value
      });
    };

    var onChangeBody = function onChangeBody(value) {
      setAttributes({
        body: value
      });
    };

    var onColourChange = function onColourChange(value) {
      setAttributes({
        titleColour: value
      });
    };

    return [Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(InspectorControls, {
      style: {
        marginBottom: '40px'
      }
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(PanelBody, {
      title: 'Font colour'
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("strong", null, "Select a Title Colour")), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(ColorPalette, {
      value: titleColour,
      onChange: onColourChange
    }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      class: "cta-container"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(RichText, {
      key: "editable",
      tagName: "h2",
      placeholder: "Your CTA title",
      value: title,
      onChange: onChangeTitle,
      style: {
        color: titleColour
      }
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(RichText, {
      key: "editable",
      tagName: "p",
      placeholder: "Your CTA body content",
      value: body,
      onChange: onChangeBody
    }))];
  },
  save: function save(props) {
    var _props$attributes2 = props.attributes,
        title = _props$attributes2.title,
        body = _props$attributes2.body,
        titleColour = _props$attributes2.titleColour;
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      class: "cta-container"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("h2", {
      style: {
        color: titleColour
      }
    }, title), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(RichText.Content, {
      tagName: "p",
      value: body
    }));
  }
}); //this block is registered through theme-suppoer.php

/***/ }),

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _cta_index__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./cta/index */ "./src/cta/index.js");
/* harmony import */ var _affiliates_index__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./affiliates/index */ "./src/affiliates/index.js");
/**
 * Gutenberg Blocks
 *
 * All blocks related JavaScript files should be imported here.
 * You can create a new block folder in this dir and include code
 * for that block here as well.
 *
 * All blocks should be included here since this is the file that
 * Webpack is compiling as the input file.
 */



/***/ }),

/***/ "@wordpress/element":
/*!******************************************!*\
  !*** external {"this":["wp","element"]} ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["element"]; }());

/***/ })

/******/ });
//# sourceMappingURL=index.js.map