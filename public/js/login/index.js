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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/_public/components/login-form.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/_public/components/login-form.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _common_mixins_form_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @/_common/mixins/form.js */ "./resources/js/_common/mixins/form.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//mixins

/* harmony default export */ __webpack_exports__["default"] = ({
  mounted: function mounted() {
    this.$refs.email.focus();
  },
  data: function data() {
    return {
      loggedIn: localStorage.getItem('loggedIn') == true,
      flag: {
        capsLockOn: false,
        performingUserLookup: false,
        foundUser: false,
        attemptingLogin: false
      },
      model: {
        email: null,
        password: null,
        remember: false
      }
    };
  },
  methods: {
    lookupUser: function lookupUser() {
      var self = this;
      self.flag.performingUserLookup = true;
      self.form.hasErrors = false;
      self.form.errorList = {};
      axios({
        method: 'post',
        url: '/api/auth/login-lookup',
        data: {
          email: self.model.email
        }
      }).then(function (response) {
        self.flag.foundUser = true;
        self.user = response.data.payload;

        if (!self.user.account_locked) {
          Vue.nextTick(function () {
            self.$refs.password.focus();
          });
        }
      })["catch"](function (response) {
        if (response.response.status !== 200) {
          if (response.response.data.status == 'formError') {
            self.formHandleError(response.response.data.errors);
          } else {
            self.formHandleOtherError(response.response.data.errors);
          }
        }
      })["finally"](function () {
        self.flag.performingUserLookup = false;
      });
    },
    performLogin: function performLogin() {
      var self = this;
      self.flag.attemptingLogin = true;
      self.form.hasErrors = false;
      self.form.errorList = {};
      axios({
        method: 'post',
        url: '/api/auth/login',
        data: self.model
      }).then(function (response) {
        if (response.data.status == 'success') {
          localStorage.setItem('loggedIn', 'true');
          self.loggedIn = true;
          var main_role = response.data.payload.main_role;
          if (main_role == 'superadmin') window.location.href = '/dashboard';else window.location.href = '/management';
        } else {
          self.flag.attemptingLogin = false;
          Toastify({
            text: 'Unable to login at this time.',
            duration: 3000,
            close: false,
            gravity: 'bottom',
            position: 'right',
            backgroundColor: '#e51c23',
            stopOnFocus: true
          }).showToast();
        }
      })["catch"](function (response) {
        self.flag.attemptingLogin = false;

        if (response.response.status !== 200) {
          if (response.response.data.status == 'formError') {
            self.formHandleError(response.response.data.errors);
          } else {
            self.formHandleOtherError(response.response.data.errors);
          }
        }
      });
    },
    removeUser: function removeUser() {
      var self = this; //set flags

      self.flag.foundUser = false;
      self.flag.attemptingLogin = false; //clear models

      self.user = null;
      self.model.password = null;
      Vue.nextTick(function () {
        self.$refs.email.focus();
      });
    },
    setCapsLockState: function setCapsLockState(e) {
      this.flag.capsLockOn = e.getModifierState('CapsLock');
    }
  },
  mixins: [_common_mixins_form_js__WEBPACK_IMPORTED_MODULE_0__["default"]]
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/_public/components/login-form.vue?vue&type=style&index=0&lang=css&":
/*!************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--7-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--7-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/_public/components/login-form.vue?vue&type=style&index=0&lang=css& ***!
  \************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\nmain {\n    margin-top: 0;\n    height: calc(100vh);\n    min-height: calc(100vh);\n}\n\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/css-loader/lib/css-base.js":
/*!*************************************************!*\
  !*** ./node_modules/css-loader/lib/css-base.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*
	MIT License http://www.opensource.org/licenses/mit-license.php
	Author Tobias Koppers @sokra
*/
// css base code, injected by the css-loader
module.exports = function(useSourceMap) {
	var list = [];

	// return the list of modules as css string
	list.toString = function toString() {
		return this.map(function (item) {
			var content = cssWithMappingToString(item, useSourceMap);
			if(item[2]) {
				return "@media " + item[2] + "{" + content + "}";
			} else {
				return content;
			}
		}).join("");
	};

	// import a list of modules into the list
	list.i = function(modules, mediaQuery) {
		if(typeof modules === "string")
			modules = [[null, modules, ""]];
		var alreadyImportedModules = {};
		for(var i = 0; i < this.length; i++) {
			var id = this[i][0];
			if(typeof id === "number")
				alreadyImportedModules[id] = true;
		}
		for(i = 0; i < modules.length; i++) {
			var item = modules[i];
			// skip already imported module
			// this implementation is not 100% perfect for weird media query combinations
			//  when a module is imported multiple times with different media queries.
			//  I hope this will never occur (Hey this way we have smaller bundles)
			if(typeof item[0] !== "number" || !alreadyImportedModules[item[0]]) {
				if(mediaQuery && !item[2]) {
					item[2] = mediaQuery;
				} else if(mediaQuery) {
					item[2] = "(" + item[2] + ") and (" + mediaQuery + ")";
				}
				list.push(item);
			}
		}
	};
	return list;
};

function cssWithMappingToString(item, useSourceMap) {
	var content = item[1] || '';
	var cssMapping = item[3];
	if (!cssMapping) {
		return content;
	}

	if (useSourceMap && typeof btoa === 'function') {
		var sourceMapping = toComment(cssMapping);
		var sourceURLs = cssMapping.sources.map(function (source) {
			return '/*# sourceURL=' + cssMapping.sourceRoot + source + ' */'
		});

		return [content].concat(sourceURLs).concat([sourceMapping]).join('\n');
	}

	return [content].join('\n');
}

// Adapted from convert-source-map (MIT)
function toComment(sourceMap) {
	// eslint-disable-next-line no-undef
	var base64 = btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap))));
	var data = 'sourceMappingURL=data:application/json;charset=utf-8;base64,' + base64;

	return '/*# ' + data + ' */';
}


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/_public/components/login-form.vue?vue&type=style&index=0&lang=css&":
/*!****************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--7-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--7-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/_public/components/login-form.vue?vue&type=style&index=0&lang=css& ***!
  \****************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../node_modules/css-loader??ref--7-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--7-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./login-form.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/_public/components/login-form.vue?vue&type=style&index=0&lang=css&");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../../../node_modules/style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./node_modules/style-loader/lib/addStyles.js":
/*!****************************************************!*\
  !*** ./node_modules/style-loader/lib/addStyles.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/*
	MIT License http://www.opensource.org/licenses/mit-license.php
	Author Tobias Koppers @sokra
*/

var stylesInDom = {};

var	memoize = function (fn) {
	var memo;

	return function () {
		if (typeof memo === "undefined") memo = fn.apply(this, arguments);
		return memo;
	};
};

var isOldIE = memoize(function () {
	// Test for IE <= 9 as proposed by Browserhacks
	// @see http://browserhacks.com/#hack-e71d8692f65334173fee715c222cb805
	// Tests for existence of standard globals is to allow style-loader
	// to operate correctly into non-standard environments
	// @see https://github.com/webpack-contrib/style-loader/issues/177
	return window && document && document.all && !window.atob;
});

var getTarget = function (target, parent) {
  if (parent){
    return parent.querySelector(target);
  }
  return document.querySelector(target);
};

var getElement = (function (fn) {
	var memo = {};

	return function(target, parent) {
                // If passing function in options, then use it for resolve "head" element.
                // Useful for Shadow Root style i.e
                // {
                //   insertInto: function () { return document.querySelector("#foo").shadowRoot }
                // }
                if (typeof target === 'function') {
                        return target();
                }
                if (typeof memo[target] === "undefined") {
			var styleTarget = getTarget.call(this, target, parent);
			// Special case to return head of iframe instead of iframe itself
			if (window.HTMLIFrameElement && styleTarget instanceof window.HTMLIFrameElement) {
				try {
					// This will throw an exception if access to iframe is blocked
					// due to cross-origin restrictions
					styleTarget = styleTarget.contentDocument.head;
				} catch(e) {
					styleTarget = null;
				}
			}
			memo[target] = styleTarget;
		}
		return memo[target]
	};
})();

var singleton = null;
var	singletonCounter = 0;
var	stylesInsertedAtTop = [];

var	fixUrls = __webpack_require__(/*! ./urls */ "./node_modules/style-loader/lib/urls.js");

module.exports = function(list, options) {
	if (typeof DEBUG !== "undefined" && DEBUG) {
		if (typeof document !== "object") throw new Error("The style-loader cannot be used in a non-browser environment");
	}

	options = options || {};

	options.attrs = typeof options.attrs === "object" ? options.attrs : {};

	// Force single-tag solution on IE6-9, which has a hard limit on the # of <style>
	// tags it will allow on a page
	if (!options.singleton && typeof options.singleton !== "boolean") options.singleton = isOldIE();

	// By default, add <style> tags to the <head> element
        if (!options.insertInto) options.insertInto = "head";

	// By default, add <style> tags to the bottom of the target
	if (!options.insertAt) options.insertAt = "bottom";

	var styles = listToStyles(list, options);

	addStylesToDom(styles, options);

	return function update (newList) {
		var mayRemove = [];

		for (var i = 0; i < styles.length; i++) {
			var item = styles[i];
			var domStyle = stylesInDom[item.id];

			domStyle.refs--;
			mayRemove.push(domStyle);
		}

		if(newList) {
			var newStyles = listToStyles(newList, options);
			addStylesToDom(newStyles, options);
		}

		for (var i = 0; i < mayRemove.length; i++) {
			var domStyle = mayRemove[i];

			if(domStyle.refs === 0) {
				for (var j = 0; j < domStyle.parts.length; j++) domStyle.parts[j]();

				delete stylesInDom[domStyle.id];
			}
		}
	};
};

function addStylesToDom (styles, options) {
	for (var i = 0; i < styles.length; i++) {
		var item = styles[i];
		var domStyle = stylesInDom[item.id];

		if(domStyle) {
			domStyle.refs++;

			for(var j = 0; j < domStyle.parts.length; j++) {
				domStyle.parts[j](item.parts[j]);
			}

			for(; j < item.parts.length; j++) {
				domStyle.parts.push(addStyle(item.parts[j], options));
			}
		} else {
			var parts = [];

			for(var j = 0; j < item.parts.length; j++) {
				parts.push(addStyle(item.parts[j], options));
			}

			stylesInDom[item.id] = {id: item.id, refs: 1, parts: parts};
		}
	}
}

function listToStyles (list, options) {
	var styles = [];
	var newStyles = {};

	for (var i = 0; i < list.length; i++) {
		var item = list[i];
		var id = options.base ? item[0] + options.base : item[0];
		var css = item[1];
		var media = item[2];
		var sourceMap = item[3];
		var part = {css: css, media: media, sourceMap: sourceMap};

		if(!newStyles[id]) styles.push(newStyles[id] = {id: id, parts: [part]});
		else newStyles[id].parts.push(part);
	}

	return styles;
}

function insertStyleElement (options, style) {
	var target = getElement(options.insertInto)

	if (!target) {
		throw new Error("Couldn't find a style target. This probably means that the value for the 'insertInto' parameter is invalid.");
	}

	var lastStyleElementInsertedAtTop = stylesInsertedAtTop[stylesInsertedAtTop.length - 1];

	if (options.insertAt === "top") {
		if (!lastStyleElementInsertedAtTop) {
			target.insertBefore(style, target.firstChild);
		} else if (lastStyleElementInsertedAtTop.nextSibling) {
			target.insertBefore(style, lastStyleElementInsertedAtTop.nextSibling);
		} else {
			target.appendChild(style);
		}
		stylesInsertedAtTop.push(style);
	} else if (options.insertAt === "bottom") {
		target.appendChild(style);
	} else if (typeof options.insertAt === "object" && options.insertAt.before) {
		var nextSibling = getElement(options.insertAt.before, target);
		target.insertBefore(style, nextSibling);
	} else {
		throw new Error("[Style Loader]\n\n Invalid value for parameter 'insertAt' ('options.insertAt') found.\n Must be 'top', 'bottom', or Object.\n (https://github.com/webpack-contrib/style-loader#insertat)\n");
	}
}

function removeStyleElement (style) {
	if (style.parentNode === null) return false;
	style.parentNode.removeChild(style);

	var idx = stylesInsertedAtTop.indexOf(style);
	if(idx >= 0) {
		stylesInsertedAtTop.splice(idx, 1);
	}
}

function createStyleElement (options) {
	var style = document.createElement("style");

	if(options.attrs.type === undefined) {
		options.attrs.type = "text/css";
	}

	if(options.attrs.nonce === undefined) {
		var nonce = getNonce();
		if (nonce) {
			options.attrs.nonce = nonce;
		}
	}

	addAttrs(style, options.attrs);
	insertStyleElement(options, style);

	return style;
}

function createLinkElement (options) {
	var link = document.createElement("link");

	if(options.attrs.type === undefined) {
		options.attrs.type = "text/css";
	}
	options.attrs.rel = "stylesheet";

	addAttrs(link, options.attrs);
	insertStyleElement(options, link);

	return link;
}

function addAttrs (el, attrs) {
	Object.keys(attrs).forEach(function (key) {
		el.setAttribute(key, attrs[key]);
	});
}

function getNonce() {
	if (false) {}

	return __webpack_require__.nc;
}

function addStyle (obj, options) {
	var style, update, remove, result;

	// If a transform function was defined, run it on the css
	if (options.transform && obj.css) {
	    result = typeof options.transform === 'function'
		 ? options.transform(obj.css) 
		 : options.transform.default(obj.css);

	    if (result) {
	    	// If transform returns a value, use that instead of the original css.
	    	// This allows running runtime transformations on the css.
	    	obj.css = result;
	    } else {
	    	// If the transform function returns a falsy value, don't add this css.
	    	// This allows conditional loading of css
	    	return function() {
	    		// noop
	    	};
	    }
	}

	if (options.singleton) {
		var styleIndex = singletonCounter++;

		style = singleton || (singleton = createStyleElement(options));

		update = applyToSingletonTag.bind(null, style, styleIndex, false);
		remove = applyToSingletonTag.bind(null, style, styleIndex, true);

	} else if (
		obj.sourceMap &&
		typeof URL === "function" &&
		typeof URL.createObjectURL === "function" &&
		typeof URL.revokeObjectURL === "function" &&
		typeof Blob === "function" &&
		typeof btoa === "function"
	) {
		style = createLinkElement(options);
		update = updateLink.bind(null, style, options);
		remove = function () {
			removeStyleElement(style);

			if(style.href) URL.revokeObjectURL(style.href);
		};
	} else {
		style = createStyleElement(options);
		update = applyToTag.bind(null, style);
		remove = function () {
			removeStyleElement(style);
		};
	}

	update(obj);

	return function updateStyle (newObj) {
		if (newObj) {
			if (
				newObj.css === obj.css &&
				newObj.media === obj.media &&
				newObj.sourceMap === obj.sourceMap
			) {
				return;
			}

			update(obj = newObj);
		} else {
			remove();
		}
	};
}

var replaceText = (function () {
	var textStore = [];

	return function (index, replacement) {
		textStore[index] = replacement;

		return textStore.filter(Boolean).join('\n');
	};
})();

function applyToSingletonTag (style, index, remove, obj) {
	var css = remove ? "" : obj.css;

	if (style.styleSheet) {
		style.styleSheet.cssText = replaceText(index, css);
	} else {
		var cssNode = document.createTextNode(css);
		var childNodes = style.childNodes;

		if (childNodes[index]) style.removeChild(childNodes[index]);

		if (childNodes.length) {
			style.insertBefore(cssNode, childNodes[index]);
		} else {
			style.appendChild(cssNode);
		}
	}
}

function applyToTag (style, obj) {
	var css = obj.css;
	var media = obj.media;

	if(media) {
		style.setAttribute("media", media)
	}

	if(style.styleSheet) {
		style.styleSheet.cssText = css;
	} else {
		while(style.firstChild) {
			style.removeChild(style.firstChild);
		}

		style.appendChild(document.createTextNode(css));
	}
}

function updateLink (link, options, obj) {
	var css = obj.css;
	var sourceMap = obj.sourceMap;

	/*
		If convertToAbsoluteUrls isn't defined, but sourcemaps are enabled
		and there is no publicPath defined then lets turn convertToAbsoluteUrls
		on by default.  Otherwise default to the convertToAbsoluteUrls option
		directly
	*/
	var autoFixUrls = options.convertToAbsoluteUrls === undefined && sourceMap;

	if (options.convertToAbsoluteUrls || autoFixUrls) {
		css = fixUrls(css);
	}

	if (sourceMap) {
		// http://stackoverflow.com/a/26603875
		css += "\n/*# sourceMappingURL=data:application/json;base64," + btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap)))) + " */";
	}

	var blob = new Blob([css], { type: "text/css" });

	var oldSrc = link.href;

	link.href = URL.createObjectURL(blob);

	if(oldSrc) URL.revokeObjectURL(oldSrc);
}


/***/ }),

/***/ "./node_modules/style-loader/lib/urls.js":
/*!***********************************************!*\
  !*** ./node_modules/style-loader/lib/urls.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {


/**
 * When source maps are enabled, `style-loader` uses a link element with a data-uri to
 * embed the css on the page. This breaks all relative urls because now they are relative to a
 * bundle instead of the current page.
 *
 * One solution is to only use full urls, but that may be impossible.
 *
 * Instead, this function "fixes" the relative urls to be absolute according to the current page location.
 *
 * A rudimentary test suite is located at `test/fixUrls.js` and can be run via the `npm test` command.
 *
 */

module.exports = function (css) {
  // get current location
  var location = typeof window !== "undefined" && window.location;

  if (!location) {
    throw new Error("fixUrls requires window.location");
  }

	// blank or null?
	if (!css || typeof css !== "string") {
	  return css;
  }

  var baseUrl = location.protocol + "//" + location.host;
  var currentDir = baseUrl + location.pathname.replace(/\/[^\/]*$/, "/");

	// convert each url(...)
	/*
	This regular expression is just a way to recursively match brackets within
	a string.

	 /url\s*\(  = Match on the word "url" with any whitespace after it and then a parens
	   (  = Start a capturing group
	     (?:  = Start a non-capturing group
	         [^)(]  = Match anything that isn't a parentheses
	         |  = OR
	         \(  = Match a start parentheses
	             (?:  = Start another non-capturing groups
	                 [^)(]+  = Match anything that isn't a parentheses
	                 |  = OR
	                 \(  = Match a start parentheses
	                     [^)(]*  = Match anything that isn't a parentheses
	                 \)  = Match a end parentheses
	             )  = End Group
              *\) = Match anything and then a close parens
          )  = Close non-capturing group
          *  = Match anything
       )  = Close capturing group
	 \)  = Match a close parens

	 /gi  = Get all matches, not the first.  Be case insensitive.
	 */
	var fixedCss = css.replace(/url\s*\(((?:[^)(]|\((?:[^)(]+|\([^)(]*\))*\))*)\)/gi, function(fullMatch, origUrl) {
		// strip quotes (if they exist)
		var unquotedOrigUrl = origUrl
			.trim()
			.replace(/^"(.*)"$/, function(o, $1){ return $1; })
			.replace(/^'(.*)'$/, function(o, $1){ return $1; });

		// already a full url? no change
		if (/^(#|data:|http:\/\/|https:\/\/|file:\/\/\/|\s*$)/i.test(unquotedOrigUrl)) {
		  return fullMatch;
		}

		// convert the url to a full url
		var newUrl;

		if (unquotedOrigUrl.indexOf("//") === 0) {
		  	//TODO: should we add protocol?
			newUrl = unquotedOrigUrl;
		} else if (unquotedOrigUrl.indexOf("/") === 0) {
			// path should be relative to the base url
			newUrl = baseUrl + unquotedOrigUrl; // already starts with '/'
		} else {
			// path should be relative to current directory
			newUrl = currentDir + unquotedOrigUrl.replace(/^\.\//, ""); // Strip leading './'
		}

		// send back the fixed url(...)
		return "url(" + JSON.stringify(newUrl) + ")";
	});

	// send back the fixed css
	return fixedCss;
};


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/_public/components/login-form.vue?vue&type=template&id=e2b33928&":
/*!*********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/_public/components/login-form.vue?vue&type=template&id=e2b33928& ***!
  \*********************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "form",
    {
      staticClass: "px-md-5 text-center text-sm-left pt-3",
      on: {
        submit: function($event) {
          $event.preventDefault()
        }
      }
    },
    [
      !_vm.flag.foundUser
        ? _c("div", [
            _vm._m(0),
            _vm._v(" "),
            _c(
              "div",
              {
                staticClass: "form-group",
                class: { "has-danger": _vm.formIsInvalid("model.email") }
              },
              [
                _c(
                  "label",
                  {
                    staticClass: "control-label required",
                    attrs: { for: "email" }
                  },
                  [_vm._v("Email")]
                ),
                _vm._v(" "),
                _c("input", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.model.email,
                      expression: "model.email"
                    }
                  ],
                  ref: "email",
                  staticClass: "form-control",
                  class: { "is-invalid": _vm.formIsInvalid("model.email") },
                  attrs: {
                    disabled: _vm.flag.performingUserLookup,
                    id: "email",
                    type: "email"
                  },
                  domProps: { value: _vm.model.email },
                  on: {
                    keypress: function($event) {
                      if (
                        !$event.type.indexOf("key") &&
                        _vm._k($event.keyCode, "enter", 13, $event.key, "Enter")
                      ) {
                        return null
                      }
                      return _vm.lookupUser($event)
                    },
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.$set(_vm.model, "email", $event.target.value)
                    }
                  }
                }),
                _vm._v(" "),
                _vm.formIsInvalid("model.email")
                  ? _c("div", {
                      staticClass: "invalid-feedback",
                      domProps: {
                        innerHTML: _vm._s(_vm.form.errorList["model.email"])
                      }
                    })
                  : _vm._e()
              ]
            ),
            _vm._v(" "),
            _c("a", { staticClass: "form-text", attrs: { href: "#" } }, [
              _vm._v("Forgot email?")
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group mt-3 text-right" }, [
              _c(
                "button",
                {
                  staticClass: "btn btn-primary min-width-100",
                  attrs: {
                    type: "button",
                    disabled: _vm.flag.performingUserLookup
                  },
                  on: { click: _vm.lookupUser }
                },
                [
                  _vm.flag.performingUserLookup
                    ? _c("i", {
                        staticClass: "far fa-spinner fa-spin text-white"
                      })
                    : _vm._e(),
                  _vm._v(" "),
                  !_vm.flag.performingUserLookup
                    ? _c("span", [_vm._v("Next")])
                    : _vm._e()
                ]
              )
            ])
          ])
        : _vm._e(),
      _vm._v(" "),
      _vm.flag.foundUser && _vm.user.account_locked
        ? _c("div", [
            _vm._m(1),
            _vm._v(" "),
            _c("div", { staticClass: "form-group mt-3 text-center" }, [
              _c(
                "button",
                {
                  staticClass: "btn btn-primary min-width-100",
                  attrs: { type: "button" },
                  on: { click: _vm.removeUser }
                },
                [_vm._v("\n                Back\n            ")]
              )
            ])
          ])
        : _vm._e(),
      _vm._v(" "),
      _vm.flag.foundUser && !_vm.user.account_locked
        ? _c("div", [
            _c("div", { staticClass: "text-center my-4 pb-3" }, [
              _c("h3", { staticClass: "text-center font-weight-light pb-2" }, [
                _vm._v("Welcome")
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "input-group mx-auto" }, [
                _c("ul", { staticClass: "list-group flex-grow-1" }, [
                  _c("li", {
                    staticClass:
                      "list-group-item text-center font-weight-bold p-1",
                    domProps: { innerHTML: _vm._s(_vm.model.email) }
                  })
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "input-group-append" }, [
                  _c(
                    "button",
                    {
                      staticClass:
                        "btn btn-sm btn-secondary input-group-append",
                      attrs: { type: "button" },
                      on: { click: _vm.removeUser }
                    },
                    [_c("i", { staticClass: "far fa-times" })]
                  )
                ])
              ])
            ]),
            _vm._v(" "),
            _c(
              "div",
              {
                staticClass: "form-group mt-3",
                class: { "has-danger": _vm.formIsInvalid("model.password") }
              },
              [
                _c(
                  "label",
                  {
                    staticClass: "control-label required",
                    attrs: { for: "password" }
                  },
                  [_vm._v("Password")]
                ),
                _vm._v(" "),
                _c("input", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.model.password,
                      expression: "model.password"
                    }
                  ],
                  ref: "password",
                  staticClass: "form-control",
                  class: { "is-invalid": _vm.formIsInvalid("model.password") },
                  attrs: { id: "password", required: "", type: "password" },
                  domProps: { value: _vm.model.password },
                  on: {
                    keyup: _vm.setCapsLockState,
                    keypress: function($event) {
                      if (
                        !$event.type.indexOf("key") &&
                        _vm._k($event.keyCode, "enter", 13, $event.key, "Enter")
                      ) {
                        return null
                      }
                      return _vm.performLogin($event)
                    },
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.$set(_vm.model, "password", $event.target.value)
                    }
                  }
                }),
                _vm._v(" "),
                _vm.flag.capsLockOn
                  ? _c("div", { staticClass: "pt-2" }, [
                      _c("i", {
                        staticClass: "fal fa-exclamation-circle text-muted pr-1"
                      }),
                      _c("span", { staticClass: "text-muted" }, [
                        _vm._v("Caps lock is on")
                      ])
                    ])
                  : _vm._e(),
                _vm._v(" "),
                _vm.formIsInvalid("model.password")
                  ? _c("div", {
                      staticClass: "invalid-feedback",
                      domProps: {
                        innerHTML: _vm._s(_vm.form.errorList["model.password"])
                      }
                    })
                  : _vm._e()
              ]
            ),
            _vm._v(" "),
            _c("div", { staticClass: "form-group" }, [
              _c("div", { staticClass: "custom-control custom-checkbox" }, [
                _c("input", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.model.remember,
                      expression: "model.remember"
                    }
                  ],
                  staticClass: "custom-control-input",
                  attrs: { type: "checkbox", id: "remember" },
                  domProps: {
                    checked: Array.isArray(_vm.model.remember)
                      ? _vm._i(_vm.model.remember, null) > -1
                      : _vm.model.remember
                  },
                  on: {
                    change: function($event) {
                      var $$a = _vm.model.remember,
                        $$el = $event.target,
                        $$c = $$el.checked ? true : false
                      if (Array.isArray($$a)) {
                        var $$v = null,
                          $$i = _vm._i($$a, $$v)
                        if ($$el.checked) {
                          $$i < 0 &&
                            _vm.$set(_vm.model, "remember", $$a.concat([$$v]))
                        } else {
                          $$i > -1 &&
                            _vm.$set(
                              _vm.model,
                              "remember",
                              $$a.slice(0, $$i).concat($$a.slice($$i + 1))
                            )
                        }
                      } else {
                        _vm.$set(_vm.model, "remember", $$c)
                      }
                    }
                  }
                }),
                _vm._v(" "),
                _c(
                  "label",
                  {
                    staticClass: "custom-control-label checkbox",
                    attrs: { for: "remember" }
                  },
                  [_vm._v("Remember Me")]
                )
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group mt-3 text-right" }, [
              _c(
                "button",
                {
                  staticClass: "btn btn-primary min-width-100",
                  attrs: { type: "button", disabled: _vm.flag.attemptingLogin },
                  on: { click: _vm.performLogin }
                },
                [
                  _vm.flag.attemptingLogin
                    ? _c("i", {
                        staticClass: "far fa-spinner fa-spin text-white"
                      })
                    : _vm._e(),
                  _vm._v(" "),
                  !_vm.flag.attemptingLogin
                    ? _c("span", [_vm._v("Next")])
                    : _vm._e()
                ]
              )
            ])
          ])
        : _vm._e(),
      _vm._v(" "),
      _vm._m(2)
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "text-center my-4" }, [
      _c("h3", { staticClass: "font-weight-light" }, [_vm._v("Log In")]),
      _vm._v(" "),
      _c("small", { staticClass: "text-muted" }, [
        _vm._v("We'll never share your details with anyone else.")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "text-center my-4" }, [
      _c("h3", { staticClass: "font-weight-light" }, [
        _c("i", { staticClass: "far fa-lock mb-2 text-warning" }),
        _vm._v(" "),
        _c("div", { staticClass: "my-2" }, [_vm._v("Account Locked")])
      ]),
      _vm._v(" "),
      _c("p", { staticClass: "text-center" }, [
        _vm._v(
          "Your account is currently locked. If this is unexpected, or you're not sure why your account is locked, please contact your organisation's administrator."
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "text-center" }, [
      _c("div", [_vm._v("Don't have a login?")]),
      _vm._v(" "),
      _c("a", { staticClass: "form-text", attrs: { href: "/signup" } }, [
        _c("small", [_vm._v("Sign up your organisation now.")])
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return normalizeComponent; });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent (
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier, /* server only */
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () {
        injectStyles.call(
          this,
          (options.functional ? this.parent : this).$root.$options.shadowRoot
        )
      }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functional component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ "./resources/js/_common/mixins/form.js":
/*!*********************************************!*\
  !*** ./resources/js/_common/mixins/form.js ***!
  \*********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ({
  computed: {
    formProgress: function formProgress() {
      return this.form.step / this.form.steps.length * 100;
    }
  },
  data: function data() {
    return {
      form: {
        hasErrors: false,
        errorList: {}
      }
    };
  },
  methods: {
    formDoValidation: function formDoValidation(attributes, constraints) {
      var self = this;
      this.form.hasErrors = false;
      this.form.errorList = {};
      var validation = validate(attributes, constraints, {
        fullMessages: false
      });

      if (_.isObject(validation)) {
        _.forEach(validation, function (errors) {
          _.forEach(errors, function (error) {
            self.$set(self.form.errorList, 'model.' + error.model, error.message);
            self.form.hasErrors = true;
          });
        });
      }

      if (this.form.hasErrors) {
        return false;
      } else {
        return true;
      }
    },
    formGotoNextStep: function formGotoNextStep() {
      // this.form.step+=1;
      // return true;
      if (this.stepIsValid(this.form.step)) {
        var step = this.form.steps[this.form.step];
        this.form.step += 1;

        if (typeof step.autoFocus == 'function') {
          Vue.nextTick(function () {
            step.autoFocus();
          });
        } else {
          console.warn('autoFocus for form step must be a function.');
        }
      }
    },
    formGotoPreviousStep: function formGotoPreviousStep() {
      this.form.step--;
      var step = this.form.steps[this.form.step - 1];

      if (typeof step.autoFocus == 'function') {
        Vue.nextTick(function () {
          step.autoFocus();
        });
      } else {
        console.warn('autoFocus for form step must be a function.');
      }
    },
    formGotoStep: function formGotoStep(step) {
      //basic sanity checking
      //no going below 0
      if (step < 0) {
        return false;
      } //no going above the max steps


      if (step > this.form.steps.length) {
        return false;
      } // if we're trying to skip to future steps, we need to validate the current one first


      if (step > this.form.step) {
        if (!this.stepIsValid(this.form.step)) {
          return false;
        }
      }

      this.form.step = step;
      var newStep = this.form.steps[step - 1]; //need to minus 1, since the array starts at 0

      if (typeof newStep.autoFocus == 'function') {
        Vue.nextTick(function () {
          newStep.autoFocus();
        });
      } else {
        console.warn('autoFocus for form step must be a function.');
      }
    },
    formHandleError: function formHandleError(errors) {
      var self = this;

      _.forEach(errors, function (error, key) {
        self.$set(self.form.errorList, 'model.' + key, _.first(error));
      });

      this.form.hasErrors = true;
      notice.error('Invalid form data - please check your entries');
    },
    formHandleOtherError: function formHandleOtherError(error) {
      notice.error(error ? error : 'An unknown error has occurred.');
    },
    formIsInvalid: function formIsInvalid(field) {
      if (!this.form.hasErrors) {
        return false;
      }

      if (this.form.errorList[field]) {
        return true;
      }
    },
    formPostModel: function formPostModel(url, redirect) {
      var thisComponent = this;
      thisComponent.flag.postingModel = true;
      thisComponent.form.hasErrors = false;
      thisComponent.form.errorList = {};
      return new Promise(function (resolve, reject) {
        return axios({
          method: 'post',
          url: '/api/' + url,
          data: thisComponent.model
        }).then(function (response) {
          //   if (response.data.redirect) {
          //  window.location.replace(response.data.redirect);
          // }
          resolve(response);
        })["catch"](function (error) {
          if (error.response.status !== 200) {
            if (error.response.data.status == 'formError') {
              thisComponent.formHandleError(error.response.data.errors);
            } else {
              thisComponent.formHandleOtherError(error.response.data.errors);
            }
          }

          thisComponent.flag.postingModel = false;
          reject(error);
        });
      });
    },
    formPatchModel: function formPatchModel(url, redirect) {
      var thisComponent = this;
      thisComponent.flag.postingModel = true;
      thisComponent.form.hasErrors = false;
      thisComponent.form.errorList = {};
      return new Promise(function (resolve, reject) {
        axios.patch('/api/' + url, thisComponent.model).then(function (response) {
          if (response.data.redirect) {
            window.location.replace(response.data.redirect);
          } // Reset the posting flag and modelState


          thisComponent.flag.postingModel = false;
          thisComponent.flag.modelState = 'UNMODIFIED';
          resolve(response);
        })["catch"](function (error) {
          if (error.response.status !== 200) {
            if (error.response.data.status == 'formError') {
              thisComponent.formHandleError(error.response.data.errors);
            } else {
              thisComponent.formHandleOtherError(error.response.data.errors);
            }
          }

          thisComponent.flag.postingModel = false;
          reject(error);
        });
      });
    },
    formGetModel: function formGetModel(url) {
      var thisComponent = this;
      thisComponent.flag.modelGetState = 'ATTEMPTING';
      return new Promise(function (resolve, reject) {
        axios({
          method: 'get',
          url: '/api/' + url
        }).then(function (response) {
          //set base model to keep an unmodified state
          thisComponent.baseModel = response.data.data; //setup working model from base model

          thisComponent.model = _.cloneDeep(thisComponent.baseModel);
          thisComponent.flag.modelGetState = 'SUCCESS';
          resolve(response);
        })["catch"](function (error) {
          if (error.response.status !== 200) {
            if (error.response.data.status == 'formError') {
              thisComponent.formHandleError(error.response.data.errors);
            } else {
              thisComponent.formHandleOtherError(error.response.data.errors);
            }
          }

          thisComponent.flag.modelGetState = 'FAILED';
          reject(error);
        })["finally"](function () {
          thisComponent.flag.modelState = 'UNMODIFIED'; //explicitly set to UNMODIFIED on first load
        });
      });
    },

    /*
        Checks if this is the first update to model from a component.
          Some components (like select2 and date), will update the model when they are loaded.
        This will set the model state to MODIFIED, even though the data was not actually changed.
        We cannot simply delay _setupObservers(), as we would need to maintain a list of all components on the page.
        To counter this, we keep a list of all components that have made an update.
        If this is the first, it it part of the page load and should be ignored. Otherwise, update the model.
          @param {string} componentId.    The component to check
          @return {bool} True on first run, false every time after.
      */
    firstUpdate: function firstUpdate(componentId) {
      var thisComponent = this; // If this component hasn't been recorded

      if (!thisComponent.initComponents[componentId]) {
        thisComponent.initComponents[componentId] = true; // This is the first update

        return true;
      } else {
        // This is not the first update
        return false;
      }
    }
  }
});

/***/ }),

/***/ "./resources/js/_public/components/login-form.vue":
/*!********************************************************!*\
  !*** ./resources/js/_public/components/login-form.vue ***!
  \********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _login_form_vue_vue_type_template_id_e2b33928___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./login-form.vue?vue&type=template&id=e2b33928& */ "./resources/js/_public/components/login-form.vue?vue&type=template&id=e2b33928&");
/* harmony import */ var _login_form_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./login-form.vue?vue&type=script&lang=js& */ "./resources/js/_public/components/login-form.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _login_form_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./login-form.vue?vue&type=style&index=0&lang=css& */ "./resources/js/_public/components/login-form.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _login_form_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _login_form_vue_vue_type_template_id_e2b33928___WEBPACK_IMPORTED_MODULE_0__["render"],
  _login_form_vue_vue_type_template_id_e2b33928___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/_public/components/login-form.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/_public/components/login-form.vue?vue&type=script&lang=js&":
/*!*********************************************************************************!*\
  !*** ./resources/js/_public/components/login-form.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_login_form_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./login-form.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/_public/components/login-form.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_login_form_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/_public/components/login-form.vue?vue&type=style&index=0&lang=css&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/_public/components/login-form.vue?vue&type=style&index=0&lang=css& ***!
  \*****************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_login_form_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader!../../../../node_modules/css-loader??ref--7-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--7-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./login-form.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/_public/components/login-form.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_login_form_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_login_form_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_login_form_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_login_form_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_login_form_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/js/_public/components/login-form.vue?vue&type=template&id=e2b33928&":
/*!***************************************************************************************!*\
  !*** ./resources/js/_public/components/login-form.vue?vue&type=template&id=e2b33928& ***!
  \***************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_login_form_vue_vue_type_template_id_e2b33928___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./login-form.vue?vue&type=template&id=e2b33928& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/_public/components/login-form.vue?vue&type=template&id=e2b33928&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_login_form_vue_vue_type_template_id_e2b33928___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_login_form_vue_vue_type_template_id_e2b33928___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/_public/scripts/login/index.js":
/*!*****************************************************!*\
  !*** ./resources/js/_public/scripts/login/index.js ***!
  \*****************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _public_components_login_form__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @/_public/components/login-form */ "./resources/js/_public/components/login-form.vue");

new Vue({
  components: {
    'login-form': _public_components_login_form__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  el: '#root-login-form'
});

/***/ }),

/***/ 3:
/*!***********************************************************!*\
  !*** multi ./resources/js/_public/scripts/login/index.js ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\xampp\htdocs\icook\icook\resources\js\_public\scripts\login\index.js */"./resources/js/_public/scripts/login/index.js");


/***/ })

/******/ });