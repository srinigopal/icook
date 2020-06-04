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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/_common/components/form/select/country.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/_common/components/form/select/country.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _common_components_form_select2__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @/_common/components/form/select2 */ "./resources/js/_common/components/form/select2.vue");
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
// components

/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    'select2': _common_components_form_select2__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  data: function data() {
    return {
      flag: {
        modelGetState: 'NO_ATTEMPT'
      },
      options: []
    };
  },
  methods: {
    _setupListeners: function _setupListeners() {
      var self = this;
      vueEventBus.$on('select2-selected-single', function (id, country) {
        if (id == self.id) {
          vueEventBus.$emit('selected-country', id, country);
        }
      });
    },
    getModel: function getModel() {
      var self = this;
      self.flag.modelGetState = 'ATTEMPTING';
      return axios.get('/api/v1/country').then(function (response) {
        var options = [];

        _.each(response.data.payload, function (country) {
          options.push({
            id: country.id,
            text: country.name.upperCaseWords()
          });
        });

        self.options = options;
        self.flag.modelGetState = 'SUCCESS';
      })["catch"](function (error) {
        self.flag.modelGetState = 'FAILED';
      });
    }
  },
  mounted: function mounted() {
    var self = this;

    this._setupListeners();

    this.getModel().then(function () {
      if (self["default"]) {
        vueEventBus.$emit('select2-select-single', self.id, self["default"]);
      }
    });
  },
  props: ['default', 'id']
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/_common/components/form/select/timezone.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/_common/components/form/select/timezone.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _common_components_form_select2__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @/_common/components/form/select2 */ "./resources/js/_common/components/form/select2.vue");
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
// components

/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    'select2': _common_components_form_select2__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  data: function data() {
    return {
      flag: {
        modelGetState: 'NO_ATTEMPT'
      },
      options: []
    };
  },
  methods: {
    _setupListeners: function _setupListeners() {
      var self = this;
      vueEventBus.$on('selected-country', function (id, country) {
        if (self.subscribeTo == id) {
          self.getModel(country);
        }
      });
      vueEventBus.$on('select2-selected-single', function (id, timezone) {
        if (id == self.id) {
          vueEventBus.$emit('selected-timezone', id, timezone);
        }
      });
    },
    getModel: function getModel(country) {
      var self = this;
      self.flag.modelGetState = 'ATTEMPTING';
      return axios.get('/api/v1/timezone', {
        params: {
          country: country
        }
      }).then(function (response) {
        var options = [];

        _.each(response.data.payload, function (timezone) {
          options.push({
            id: timezone.id,
            text: timezone.name
          });
        });

        self.options = options;
        self.flag.modelGetState = 'SUCCESS';
      })["catch"](function (error) {
        self.flag.modelGetState = 'FAILED';
      });
    }
  },
  mounted: function mounted() {
    this._setupListeners();
  },
  props: ['id', 'subscribeTo']
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/_public/components/sign-up-form.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/_public/components/sign-up-form.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _common_mixins_form_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @/_common/mixins/form.js */ "./resources/js/_common/mixins/form.js");
/* harmony import */ var _common_components_form_select_country__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @/_common/components/form/select/country */ "./resources/js/_common/components/form/select/country.vue");
/* harmony import */ var _common_components_form_select_timezone__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @/_common/components/form/select/timezone */ "./resources/js/_common/components/form/select/timezone.vue");
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
 //components



/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    'select-country': _common_components_form_select_country__WEBPACK_IMPORTED_MODULE_1__["default"],
    'select-timezone': _common_components_form_select_timezone__WEBPACK_IMPORTED_MODULE_2__["default"]
  },
  data: function data() {
    return {
      flag: {
        postingModel: false
      },
      form: {
        step: 1,
        steps: [{
          name: 'organisation',
          autoFocus: function autoFocus() {
            $('#organisation-name').focus();
          }
        }, {
          name: 'admin',
          autoFocus: function autoFocus() {
            $('#admin-first-name').focus();
          }
        }, {
          name: 'password',
          autoFocus: function autoFocus() {
            $('#password').focus();
          }
        }, {
          name: 'submit',
          autoFocus: function autoFocus() {
            $('#btn-signup-submit').focus();
          }
        }, {
          name: 'summary'
        }]
      },
      model: {
        firstName: null,
        lastName: null,
        email: null,
        password: null,
        confirmPassword: null,
        organisation: {
          name: null,
          country: null,
          timezone: null,
          contacts: {
            phone: null
          }
        }
      },
      options: {
        organisation: {
          country: {
            "default": 'Australia'
          }
        }
      }
    };
  },
  methods: {
    _setupListeners: function _setupListeners() {
      var self = this;
      vueEventBus.$on('selected-country', function (id, country) {
        self.updateSelectedCountry(id, country);
      });
      vueEventBus.$on('selected-timezone', function (id, timezone) {
        self.updateSelectedTimezone(id, timezone);
      });
    },
    doSignup: function doSignup() {
      var self = this;
      this.flag.postingModel = true;
      this.form.hasErrors = false;
      this.form.errorList = {};
      axios.post('/api/auth/signup', this.model).then(function (response) {
        self.form.step += 1;
      })["catch"](function (response) {
        if (response.response.status !== 200) {
          if (response.response.data.status == 'formError') {
            self.formHandleError(response.response.data.errors);
          } else {
            self.formHandleOtherError(response.response.data.errors);
          }
        }
      })["finally"](function () {
        self.flag.postingModel = false;
      });
    },
    stepIsValid: function stepIsValid(step) {
      var stepName = this.form.steps[step - 1].name;

      switch (stepName) {
        case 'organisation':
          var attributes = {
            name: this.model.organisation.name,
            phone: this.model.organisation.contacts.phone
          };
          var constraints = {
            name: {
              presence: {
                allowEmpty: false,
                message: {
                  model: 'organisation.name',
                  message: 'We need a name for your organisation'
                }
              }
            },
            phone: {
              numericality: {
                message: {
                  model: 'organisation.contacts.phone',
                  message: 'We need a valid contact number for your organisation'
                }
              },
              presence: {
                allowEmpty: false,
                message: {
                  model: 'organisation.contacts.phone',
                  message: 'We need at least one contact number for your organisation'
                }
              }
            }
          };
          return this.formDoValidation(attributes, constraints);
          break;

        case 'admin':
          var attributes = {
            firstName: this.getProp(this.$data, 'model.firstName'.split('.')),
            lastName: this.getProp(this.$data, 'model.lastName'.split('.')),
            email: this.getProp(this.$data, 'model.email'.split('.'))
          };
          var constraints = {
            firstName: {
              presence: {
                allowEmpty: false,
                message: {
                  model: 'firstName',
                  message: 'We need your first name'
                }
              }
            },
            lastName: {
              presence: {
                allowEmpty: false,
                message: {
                  model: 'lastName',
                  message: 'We need your last name'
                }
              }
            },
            email: {
              presence: {
                allowEmpty: false,
                message: {
                  model: 'email',
                  message: 'We need a valid email address'
                }
              },
              email: {
                message: {
                  model: 'email',
                  message: 'We need a valid email address'
                }
              }
            }
          };
          return this.formDoValidation(attributes, constraints);
          break;

        case 'password':
          var attributes = {
            password: this.getProp(this.$data, 'model.password'.split('.')),
            confirmPassword: this.getProp(this.$data, 'model.confirmPassword'.split('.'))
          };
          var constraints = {
            password: {
              presence: {
                allowEmpty: false,
                message: {
                  model: 'password',
                  message: 'We need a valid password of at least 6 characters'
                }
              },
              length: {
                minimum: 6,
                message: {
                  model: 'password',
                  message: 'We need a valid password of at least 6 characters'
                }
              }
            },
            confirmPassword: {
              presence: {
                allowEmpty: false,
                message: {
                  model: 'confirmPassword',
                  message: 'We need a valid matching password of at least 6 characters'
                }
              },
              length: {
                minimum: 6,
                message: {
                  model: 'confirmPassword',
                  message: 'We need a valid matching password of at least 6 characters'
                }
              },
              equality: {
                attribute: 'password',
                message: {
                  model: 'confirmPassword',
                  message: 'Your passwords do not match'
                },
                comparator: function comparator(v1, v2) {
                  return v1 === v2;
                }
              }
            }
          };
          return this.formDoValidation(attributes, constraints);
          break;
      }
    },
    stepHasError: function stepHasError(step) {
      if (!this.form.hasErrors) {
        return null;
      }

      var self = this;
      var steps = {
        1: ['model.organisation.name', 'model.organisation.contacts.phone'],
        2: ['model.firstName', 'model.lastName', 'model.email'],
        3: ['model.password', 'model.confirmPassword']
      };
      var stepHasError = false;

      _.forEach(steps[step], function (field) {
        if (self.form.errorList[field]) {
          stepHasError = true;
        }
      });

      if (stepHasError) {
        return 'text-danger';
      }
    }
  },
  mixins: [_common_mixins_form_js__WEBPACK_IMPORTED_MODULE_0__["default"]],
  mounted: function mounted() {
    this._setupListeners();
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/_common/components/form/select/country.vue?vue&type=template&id=5a928750&":
/*!******************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/_common/components/form/select/country.vue?vue&type=template&id=5a928750& ***!
  \******************************************************************************************************************************************************************************************************************************/
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
  return _c("div", { staticClass: "d-flex flex-row align-items-center" }, [
    _vm.flag.modelGetState == "SUCCESS"
      ? _c(
          "div",
          { staticClass: "w-100" },
          [
            _c("select2", {
              staticClass: "w-100",
              attrs: { options: _vm.options, parent: this }
            })
          ],
          1
        )
      : _vm._e(),
    _vm._v(" "),
    _c(
      "div",
      {
        directives: [
          {
            name: "show",
            rawName: "v-show",
            value: _vm.flag.modelGetState == "ATTEMPTING",
            expression: "flag.modelGetState == 'ATTEMPTING'"
          }
        ]
      },
      [_c("i", { staticClass: "far fa-spinner fa-spin m-2" })]
    )
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/_common/components/form/select/timezone.vue?vue&type=template&id=71928e27&":
/*!*******************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/_common/components/form/select/timezone.vue?vue&type=template&id=71928e27& ***!
  \*******************************************************************************************************************************************************************************************************************************/
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
  return _c("div", { staticClass: "d-flex flex-row align-items-center" }, [
    _vm.flag.modelGetState == "SUCCESS"
      ? _c(
          "div",
          { staticClass: "w-100" },
          [
            _c("select2", {
              staticClass: "w-100",
              attrs: { options: _vm.options, parent: this }
            })
          ],
          1
        )
      : _vm._e(),
    _vm._v(" "),
    _c(
      "div",
      {
        directives: [
          {
            name: "show",
            rawName: "v-show",
            value: _vm.flag.modelGetState == "ATTEMPTING",
            expression: "flag.modelGetState == 'ATTEMPTING'"
          }
        ]
      },
      [_c("i", { staticClass: "far fa-spinner fa-spin m-2" })]
    )
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/_public/components/sign-up-form.vue?vue&type=template&id=731d1d6a&":
/*!***********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/_public/components/sign-up-form.vue?vue&type=template&id=731d1d6a& ***!
  \***********************************************************************************************************************************************************************************************************************/
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
  return _c("form", { staticClass: "container" }, [
    _c("div", { staticClass: "w-md-75 mt-5 mb-3 mx-auto" }, [
      _c("div", { staticClass: "row" }, [
        _c("div", { staticClass: "col-12 d-flex" }, [
          _c(
            "h5",
            {
              staticClass: "text-center",
              class: [_vm.form.step == 1 ? "text-primary" : "text-muted"],
              style: { width: _vm.formProgress + "%" }
            },
            [
              _c(
                "span",
                {
                  staticClass: "form-progress-step-name no-jump",
                  class: _vm.stepHasError(1)
                },
                [_vm._v("Organisation")]
              )
            ]
          ),
          _vm._v(" "),
          _c(
            "h5",
            {
              staticClass: "text-center",
              class: [_vm.form.step == 2 ? "text-primary" : "text-muted"],
              style: { width: _vm.formProgress + "%" }
            },
            [
              _c(
                "span",
                {
                  staticClass: "form-progress-step-name no-jump",
                  class: _vm.stepHasError(2)
                },
                [_vm._v("About You")]
              )
            ]
          ),
          _vm._v(" "),
          _c(
            "h5",
            {
              staticClass: "text-center",
              class: [_vm.form.step == 3 ? "text-primary" : "text-muted"],
              style: { width: _vm.formProgress + "%" }
            },
            [
              _c(
                "span",
                {
                  staticClass: "form-progress-step-name no-jump",
                  class: _vm.stepHasError(3)
                },
                [_vm._v("Password")]
              )
            ]
          ),
          _vm._v(" "),
          _c(
            "h5",
            {
              staticClass: "text-center",
              class: [_vm.form.step == 4 ? "text-primary" : "text-muted"],
              style: { width: _vm.formProgress + "%" }
            },
            [
              _c(
                "span",
                {
                  staticClass: "form-progress-step-name no-jump",
                  class: _vm.stepHasError(4)
                },
                [_vm._v("Finish")]
              )
            ]
          ),
          _vm._v(" "),
          _c(
            "h5",
            {
              staticClass: "text-center",
              class: [_vm.form.step == 5 ? "text-primary" : "text-muted"],
              style: { width: _vm.formProgress + "%" }
            },
            [
              _c(
                "span",
                {
                  staticClass: "form-progress-step-name no-jump",
                  class: _vm.stepHasError(5)
                },
                [_vm._v("Log In")]
              )
            ]
          )
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-12" }, [
          _c("div", { staticClass: "progress mx-auto mb-5" }, [
            _c("div", {
              staticClass: "progress-bar",
              style: { width: _vm.formProgress + "%" },
              attrs: {
                role: "progressbar",
                "aria-valuenow": _vm.formProgress,
                "aria-valuemin": "0",
                "aria-valuemax": "100"
              }
            })
          ])
        ])
      ])
    ]),
    _vm._v(" "),
    _c(
      "div",
      {
        directives: [
          {
            name: "show",
            rawName: "v-show",
            value: _vm.form.step == 1,
            expression: "form.step == 1"
          }
        ]
      },
      [
        _vm._m(0),
        _vm._v(" "),
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-md-8 offset-md-2" }, [
            _c(
              "div",
              {
                staticClass: "form-group",
                class: {
                  "has-danger": _vm.formIsInvalid("model.organisation.name")
                }
              },
              [
                _c(
                  "label",
                  {
                    staticClass: "required",
                    attrs: { for: "organisation-name" }
                  },
                  [_vm._v("Organisation Name")]
                ),
                _vm._v(" "),
                _c("input", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.model.organisation.name,
                      expression: "model.organisation.name"
                    }
                  ],
                  staticClass: "form-control",
                  class: {
                    "is-invalid": _vm.formIsInvalid("model.organisation.name")
                  },
                  attrs: {
                    autofocus: "",
                    id: "organisation-name",
                    required: "",
                    type: "text"
                  },
                  domProps: { value: _vm.model.organisation.name },
                  on: {
                    keypress: function($event) {
                      if (
                        !$event.type.indexOf("key") &&
                        _vm._k($event.keyCode, "enter", 13, $event.key, "Enter")
                      ) {
                        return null
                      }
                      return _vm.formGotoNextStep($event)
                    },
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.$set(
                        _vm.model.organisation,
                        "name",
                        $event.target.value
                      )
                    }
                  }
                }),
                _vm._v(" "),
                _vm.formIsInvalid("model.organisation.name")
                  ? _c("div", {
                      staticClass: "invalid-feedback",
                      domProps: {
                        innerHTML: _vm._s(
                          _vm.form.errorList["model.organisation.name"]
                        )
                      }
                    })
                  : _vm._e()
              ]
            )
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-md-4 offset-md-2" }, [
            _c(
              "div",
              {
                staticClass: "form-group",
                class: {
                  "has-danger": _vm.formIsInvalid(
                    "model.organisation.contacts.phone"
                  )
                }
              },
              [
                _c(
                  "label",
                  {
                    staticClass: "required",
                    attrs: { for: "organisation-contacts-phone" }
                  },
                  [_vm._v("Phone")]
                ),
                _vm._v(" "),
                _c("input", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.model.organisation.contacts.phone,
                      expression: "model.organisation.contacts.phone"
                    }
                  ],
                  staticClass: "form-control",
                  class: {
                    "is-invalid": _vm.formIsInvalid(
                      "model.organisation.contacts.phone"
                    )
                  },
                  attrs: {
                    id: "organisation-contacts-phone",
                    required: "",
                    type: "text"
                  },
                  domProps: { value: _vm.model.organisation.contacts.phone },
                  on: {
                    keypress: function($event) {
                      if (
                        !$event.type.indexOf("key") &&
                        _vm._k($event.keyCode, "enter", 13, $event.key, "Enter")
                      ) {
                        return null
                      }
                      return _vm.formGotoNextStep($event)
                    },
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.$set(
                        _vm.model.organisation.contacts,
                        "phone",
                        $event.target.value
                      )
                    }
                  }
                }),
                _vm._v(" "),
                _vm.formIsInvalid("model.organisation.contacts.phone")
                  ? _c("div", {
                      staticClass: "invalid-feedback",
                      domProps: {
                        innerHTML: _vm._s(
                          _vm.form.errorList[
                            "model.organisation.contacts.phone"
                          ]
                        )
                      }
                    })
                  : _vm._e()
              ]
            )
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "form-group text-right mt-5" }, [
          _c(
            "button",
            {
              staticClass: "btn btn-primary min-width-100",
              attrs: { type: "button" },
              on: { click: _vm.formGotoNextStep }
            },
            [_vm._v("Next")]
          )
        ])
      ]
    ),
    _vm._v(" "),
    _c(
      "div",
      {
        directives: [
          {
            name: "show",
            rawName: "v-show",
            value: _vm.form.step == 2,
            expression: "form.step == 2"
          }
        ]
      },
      [
        _vm._m(1),
        _vm._v(" "),
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-md-6 offset-md-2" }, [
            _c(
              "div",
              {
                staticClass: "form-group",
                class: { "has-danger": _vm.formIsInvalid("model.firstName") }
              },
              [
                _c(
                  "label",
                  { staticClass: "required", attrs: { for: "firstName" } },
                  [_vm._v("First Name")]
                ),
                _vm._v(" "),
                _c("input", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.model.firstName,
                      expression: "model.firstName"
                    }
                  ],
                  staticClass: "form-control",
                  attrs: { id: "firstName", required: "", type: "text" },
                  domProps: { value: _vm.model.firstName },
                  on: {
                    keypress: function($event) {
                      if (
                        !$event.type.indexOf("key") &&
                        _vm._k($event.keyCode, "enter", 13, $event.key, "Enter")
                      ) {
                        return null
                      }
                      return _vm.formGotoNextStep($event)
                    },
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.$set(_vm.model, "firstName", $event.target.value)
                    }
                  }
                }),
                _vm._v(" "),
                _vm.formIsInvalid("model.firstName")
                  ? _c("div", {
                      staticClass: "invalid-feedback",
                      domProps: {
                        innerHTML: _vm._s(_vm.form.errorList["model.firstName"])
                      }
                    })
                  : _vm._e()
              ]
            )
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-md-6 offset-md-2" }, [
            _c(
              "div",
              {
                staticClass: "form-group",
                class: { "has-danger": _vm.formIsInvalid("model.lastName") }
              },
              [
                _c(
                  "label",
                  { staticClass: "required", attrs: { for: "lastName" } },
                  [_vm._v("Last Name")]
                ),
                _vm._v(" "),
                _c("input", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.model.lastName,
                      expression: "model.lastName"
                    }
                  ],
                  staticClass: "form-control",
                  attrs: { id: "lastName", required: "", type: "text" },
                  domProps: { value: _vm.model.lastName },
                  on: {
                    keypress: function($event) {
                      if (
                        !$event.type.indexOf("key") &&
                        _vm._k($event.keyCode, "enter", 13, $event.key, "Enter")
                      ) {
                        return null
                      }
                      return _vm.formGotoNextStep($event)
                    },
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.$set(_vm.model, "lastName", $event.target.value)
                    }
                  }
                }),
                _vm._v(" "),
                _vm.formIsInvalid("model.lastName")
                  ? _c("div", {
                      staticClass: "invalid-feedback",
                      domProps: {
                        innerHTML: _vm._s(_vm.form.errorList["model.lastName"])
                      }
                    })
                  : _vm._e()
              ]
            )
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-md-8 offset-md-2" }, [
            _c(
              "div",
              {
                staticClass: "form-group",
                class: { "has-danger": _vm.formIsInvalid("model.email") }
              },
              [
                _c(
                  "label",
                  { staticClass: "required", attrs: { for: "email" } },
                  [_vm._v("Email Address")]
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
                  staticClass: "form-control",
                  attrs: { id: "email", required: "", type: "email" },
                  domProps: { value: _vm.model.email },
                  on: {
                    keypress: function($event) {
                      if (
                        !$event.type.indexOf("key") &&
                        _vm._k($event.keyCode, "enter", 13, $event.key, "Enter")
                      ) {
                        return null
                      }
                      return _vm.formGotoNextStep($event)
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
            )
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "form-group text-right mt-5" }, [
          _c(
            "button",
            {
              staticClass: "btn btn-outline-primary mr-2 min-width-100",
              attrs: { type: "button" },
              on: { click: _vm.formGotoPreviousStep }
            },
            [_vm._v("Previous")]
          ),
          _vm._v(" "),
          _c(
            "button",
            {
              staticClass: "btn btn-primary min-width-100",
              attrs: { type: "button" },
              on: { click: _vm.formGotoNextStep }
            },
            [_vm._v("Next")]
          )
        ])
      ]
    ),
    _vm._v(" "),
    _c(
      "div",
      {
        directives: [
          {
            name: "show",
            rawName: "v-show",
            value: _vm.form.step == 3,
            expression: "form.step == 3"
          }
        ]
      },
      [
        _vm._m(2),
        _vm._v(" "),
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-md-6 offset-md-2" }, [
            _c(
              "div",
              {
                staticClass: "form-group",
                class: { "has-danger": _vm.formIsInvalid("model.password") }
              },
              [
                _c(
                  "label",
                  { staticClass: "required", attrs: { for: "password" } },
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
                  staticClass: "form-control",
                  class: { "is-invalid": _vm.formIsInvalid("model.password") },
                  attrs: {
                    id: "admin-password",
                    required: "",
                    type: "password"
                  },
                  domProps: { value: _vm.model.password },
                  on: {
                    keypress: function($event) {
                      if (
                        !$event.type.indexOf("key") &&
                        _vm._k($event.keyCode, "enter", 13, $event.key, "Enter")
                      ) {
                        return null
                      }
                      return _vm.formGotoNextStep($event)
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
            _c(
              "div",
              {
                staticClass: "form-group",
                class: {
                  "has-danger": _vm.formIsInvalid("model.confirmPassword")
                }
              },
              [
                _c(
                  "label",
                  {
                    staticClass: "required",
                    attrs: { for: "confirm-password" }
                  },
                  [_vm._v("Confirm New Password")]
                ),
                _vm._v(" "),
                _c("input", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.model.confirmPassword,
                      expression: "model.confirmPassword"
                    }
                  ],
                  staticClass: "form-control",
                  class: {
                    "is-invalid": _vm.formIsInvalid("model.confirmPassword")
                  },
                  attrs: {
                    id: "admin-confirm-password",
                    required: "",
                    type: "password"
                  },
                  domProps: { value: _vm.model.confirmPassword },
                  on: {
                    keypress: function($event) {
                      if (
                        !$event.type.indexOf("key") &&
                        _vm._k($event.keyCode, "enter", 13, $event.key, "Enter")
                      ) {
                        return null
                      }
                      return _vm.formGotoNextStep($event)
                    },
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.$set(
                        _vm.model,
                        "confirmPassword",
                        $event.target.value
                      )
                    }
                  }
                }),
                _vm._v(" "),
                _vm.formIsInvalid("model.confirmPassword")
                  ? _c("div", {
                      staticClass: "invalid-feedback",
                      domProps: {
                        innerHTML: _vm._s(
                          _vm.form.errorList["model.confirmPassword"]
                        )
                      }
                    })
                  : _vm._e()
              ]
            )
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "form-group text-right mt-5" }, [
          _c(
            "button",
            {
              staticClass: "btn btn-outline-primary mr-2 min-width-100",
              attrs: { type: "button" },
              on: { click: _vm.formGotoPreviousStep }
            },
            [_vm._v("Previous")]
          ),
          _vm._v(" "),
          _c(
            "button",
            {
              staticClass: "btn btn-primary min-width-100",
              attrs: { type: "button" },
              on: { click: _vm.formGotoNextStep }
            },
            [_vm._v("Next")]
          )
        ])
      ]
    ),
    _vm._v(" "),
    _c(
      "div",
      {
        directives: [
          {
            name: "show",
            rawName: "v-show",
            value: _vm.form.step == 4,
            expression: "form.step == 4"
          }
        ]
      },
      [
        _vm._m(3),
        _vm._v(" "),
        _c("div", { staticClass: "form-group text-center" }, [
          _c(
            "button",
            {
              staticClass: "btn btn-outline-primary mr-2 min-width-100",
              attrs: { type: "button" },
              on: { click: _vm.formGotoPreviousStep }
            },
            [_vm._v("Previous")]
          ),
          _vm._v(" "),
          _c(
            "button",
            {
              staticClass: "btn btn-primary min-width-100",
              attrs: {
                type: "button",
                disabled: _vm.flag.postingModel,
                id: "btn-signup-submit"
              },
              on: { click: _vm.doSignup }
            },
            [
              _vm.flag.postingModel
                ? _c("i", { staticClass: "far fa-spinner fa-spin text-white" })
                : _vm._e(),
              _vm._v(" "),
              !_vm.flag.postingModel ? _c("span", [_vm._v("Finish")]) : _vm._e()
            ]
          )
        ])
      ]
    ),
    _vm._v(" "),
    _c(
      "div",
      {
        directives: [
          {
            name: "show",
            rawName: "v-show",
            value: _vm.form.step == 5,
            expression: "form.step == 5"
          }
        ]
      },
      [_vm._m(4), _vm._v(" "), _vm._m(5)]
    )
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "mb-5 text-center" }, [
      _c("h4", { staticClass: "font-weight-light" }, [
        _vm._v("We'll just need a few details to get started.")
      ]),
      _vm._v(" "),
      _c("p", [
        _vm._v(
          "Once you're up and running, you'll have access to client management and other tools."
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "mb-5 text-center" }, [
      _c("h4", { staticClass: "font-weight-light" }, [
        _vm._v("Tell us a bit about yourself.")
      ]),
      _vm._v(" "),
      _c("p", [
        _vm._v(
          "You'll be the first administrator for your organisation. You can always change your role later, and add other administrators to help out."
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "mb-5 text-center" }, [
      _c("h4", { staticClass: "font-weight-light" }, [
        _vm._v("Here's where you set your password.")
      ]),
      _vm._v(" "),
      _c("p", [
        _vm._v(
          "We need a password with at least 6 characters in it, although we'd suggest a longer and more complex password."
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "mb-5 text-center" }, [
      _c("h2", { staticClass: "font-weight-light" }, [_vm._v("That's it!")]),
      _vm._v(" "),
      _c("h4", { staticClass: "font-weight-light" }, [
        _vm._v("That's all we need for now to get you started.")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "mb-5 text-center" }, [
      _c("h2", { staticClass: "font-weight-light pb-3" }, [_vm._v("Summary")]),
      _vm._v(" "),
      _c("p", [
        _vm._v(
          "Your sign up is complete and you can now log in to begin setting up your organisation."
        )
      ]),
      _c("p", { staticClass: "text-center" }, [
        _vm._v(
          "Once you've logged in, you will be able to visit your organisation's administration console to start managing your organisation, apps, clients and other users."
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "form-group text-center" }, [
      _c("a", { staticClass: "btn btn-primary", attrs: { href: "/login" } }, [
        _vm._v("Login")
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

/***/ "./resources/js/_common/components/form/select/country.vue":
/*!*****************************************************************!*\
  !*** ./resources/js/_common/components/form/select/country.vue ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _country_vue_vue_type_template_id_5a928750___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./country.vue?vue&type=template&id=5a928750& */ "./resources/js/_common/components/form/select/country.vue?vue&type=template&id=5a928750&");
/* harmony import */ var _country_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./country.vue?vue&type=script&lang=js& */ "./resources/js/_common/components/form/select/country.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _country_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _country_vue_vue_type_template_id_5a928750___WEBPACK_IMPORTED_MODULE_0__["render"],
  _country_vue_vue_type_template_id_5a928750___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/_common/components/form/select/country.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/_common/components/form/select/country.vue?vue&type=script&lang=js&":
/*!******************************************************************************************!*\
  !*** ./resources/js/_common/components/form/select/country.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_country_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./country.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/_common/components/form/select/country.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_country_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/_common/components/form/select/country.vue?vue&type=template&id=5a928750&":
/*!************************************************************************************************!*\
  !*** ./resources/js/_common/components/form/select/country.vue?vue&type=template&id=5a928750& ***!
  \************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_country_vue_vue_type_template_id_5a928750___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./country.vue?vue&type=template&id=5a928750& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/_common/components/form/select/country.vue?vue&type=template&id=5a928750&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_country_vue_vue_type_template_id_5a928750___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_country_vue_vue_type_template_id_5a928750___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/_common/components/form/select/timezone.vue":
/*!******************************************************************!*\
  !*** ./resources/js/_common/components/form/select/timezone.vue ***!
  \******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _timezone_vue_vue_type_template_id_71928e27___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./timezone.vue?vue&type=template&id=71928e27& */ "./resources/js/_common/components/form/select/timezone.vue?vue&type=template&id=71928e27&");
/* harmony import */ var _timezone_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./timezone.vue?vue&type=script&lang=js& */ "./resources/js/_common/components/form/select/timezone.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _timezone_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _timezone_vue_vue_type_template_id_71928e27___WEBPACK_IMPORTED_MODULE_0__["render"],
  _timezone_vue_vue_type_template_id_71928e27___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/_common/components/form/select/timezone.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/_common/components/form/select/timezone.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************!*\
  !*** ./resources/js/_common/components/form/select/timezone.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_timezone_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./timezone.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/_common/components/form/select/timezone.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_timezone_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/_common/components/form/select/timezone.vue?vue&type=template&id=71928e27&":
/*!*************************************************************************************************!*\
  !*** ./resources/js/_common/components/form/select/timezone.vue?vue&type=template&id=71928e27& ***!
  \*************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_timezone_vue_vue_type_template_id_71928e27___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./timezone.vue?vue&type=template&id=71928e27& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/_common/components/form/select/timezone.vue?vue&type=template&id=71928e27&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_timezone_vue_vue_type_template_id_71928e27___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_timezone_vue_vue_type_template_id_71928e27___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/_common/components/form/select2.vue":
/*!**********************************************************!*\
  !*** ./resources/js/_common/components/form/select2.vue ***!
  \**********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");
var render, staticRenderFns
var script = {}


/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_0__["default"])(
  script,
  render,
  staticRenderFns,
  false,
  null,
  null,
  null
  
)

component.options.__file = "resources/js/_common/components/form/select2.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

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
        axios.patch('/api/v1/' + url, thisComponent.model).then(function (response) {
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
          thisComponent.baseModel = response.data; //setup working model from base model

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

/***/ "./resources/js/_public/components/sign-up-form.vue":
/*!**********************************************************!*\
  !*** ./resources/js/_public/components/sign-up-form.vue ***!
  \**********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _sign_up_form_vue_vue_type_template_id_731d1d6a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./sign-up-form.vue?vue&type=template&id=731d1d6a& */ "./resources/js/_public/components/sign-up-form.vue?vue&type=template&id=731d1d6a&");
/* harmony import */ var _sign_up_form_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./sign-up-form.vue?vue&type=script&lang=js& */ "./resources/js/_public/components/sign-up-form.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _sign_up_form_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _sign_up_form_vue_vue_type_template_id_731d1d6a___WEBPACK_IMPORTED_MODULE_0__["render"],
  _sign_up_form_vue_vue_type_template_id_731d1d6a___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/_public/components/sign-up-form.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/_public/components/sign-up-form.vue?vue&type=script&lang=js&":
/*!***********************************************************************************!*\
  !*** ./resources/js/_public/components/sign-up-form.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_sign_up_form_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./sign-up-form.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/_public/components/sign-up-form.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_sign_up_form_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/_public/components/sign-up-form.vue?vue&type=template&id=731d1d6a&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/_public/components/sign-up-form.vue?vue&type=template&id=731d1d6a& ***!
  \*****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_sign_up_form_vue_vue_type_template_id_731d1d6a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./sign-up-form.vue?vue&type=template&id=731d1d6a& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/_public/components/sign-up-form.vue?vue&type=template&id=731d1d6a&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_sign_up_form_vue_vue_type_template_id_731d1d6a___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_sign_up_form_vue_vue_type_template_id_731d1d6a___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/_public/scripts/signup/index.js":
/*!******************************************************!*\
  !*** ./resources/js/_public/scripts/signup/index.js ***!
  \******************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _public_components_sign_up_form__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @/_public/components/sign-up-form */ "./resources/js/_public/components/sign-up-form.vue");

new Vue({
  components: {
    'sign-up-form': _public_components_sign_up_form__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  el: '#root-signup'
});

/***/ }),

/***/ 2:
/*!************************************************************!*\
  !*** multi ./resources/js/_public/scripts/signup/index.js ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\icook\resources\js\_public\scripts\signup\index.js */"./resources/js/_public/scripts/signup/index.js");


/***/ })

/******/ });