<template>

    <form class="container">

        <!-- progress -->
        <div class="w-md-75 mt-5 mb-3 mx-auto">

            <div class="row">

                <div class="col-12 d-flex">
                    <h5 class="text-center" :class="[ form.step == 1 ? 'text-primary' : 'text-muted' ]" :style="{ 'width' : formProgress + '%' }">
                        <span class="form-progress-step-name no-jump" :class="stepHasError(1)">Organisation</span>
                    </h5>
                    <h5 class="text-center" :class="[ form.step == 2 ? 'text-primary' : 'text-muted' ]" :style="{ 'width' : formProgress + '%' }">
                        <span class="form-progress-step-name no-jump" :class="stepHasError(2)">About You</span>
                    </h5>
                    <h5 class="text-center" :class="[ form.step == 3 ? 'text-primary' : 'text-muted' ]" :style="{ 'width' : formProgress + '%' }">
                        <span class="form-progress-step-name no-jump" :class="stepHasError(3)">Password</span>
                    </h5>
                    <h5 class="text-center" :class="[ form.step == 4 ? 'text-primary' : 'text-muted' ]" :style="{ 'width' : formProgress + '%' }">
                        <span class="form-progress-step-name no-jump" :class="stepHasError(4)">Finish</span>
                    </h5>
                    <h5 class="text-center" :class="[ form.step == 5 ? 'text-primary' : 'text-muted' ]" :style="{ 'width' : formProgress + '%' }">
                        <span class="form-progress-step-name no-jump" :class="stepHasError(5)">Log In</span>
                    </h5>
                </div>

                <div class="col-12">
                    <div class="progress mx-auto mb-5">
                        <div class="progress-bar" role="progressbar" :style="{ 'width' : formProgress + '%' }" :aria-valuenow="formProgress" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

            </div>

        </div>

        <div v-show="form.step == 1">

            <div class="mb-5 text-center">
                <h4 class="font-weight-light">We'll just need a few details to get started.</h4>
                <p>Once you're up and running, you'll have access to client management and other tools.</p>
            </div>

            <div class="row">

                <div class="col-md-8 offset-md-2">
            
                    <div class="form-group" :class="{ 'has-danger': formIsInvalid('model.organisation.name') }">
                        <label class="required" for="organisation-name">Organisation Name</label>
                        <input autofocus class="form-control" :class="{ 'is-invalid': formIsInvalid('model.organisation.name') }" id="organisation-name" required type="text" v-model="model.organisation.name" v-on:keypress.enter="formGotoNextStep">
                        <div class="invalid-feedback" v-if="formIsInvalid('model.organisation.name')" v-html="form.errorList['model.organisation.name']"></div>
                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-4 offset-md-2">

                    <div class="form-group" :class="{ 'has-danger': formIsInvalid('model.organisation.contacts.phone') }">
                        <label class="required" for="organisation-contacts-phone">Phone</label>
                        <input class="form-control" :class="{ 'is-invalid': formIsInvalid('model.organisation.contacts.phone') }" id="organisation-contacts-phone" required type="text" v-model="model.organisation.contacts.phone" v-on:keypress.enter="formGotoNextStep">
                        <div class="invalid-feedback" v-if="formIsInvalid('model.organisation.contacts.phone')" v-html="form.errorList['model.organisation.contacts.phone']"></div>
                    </div>

                </div>

            </div>

            

            <div class="form-group text-right mt-5">
                <button type="button" class="btn btn-primary min-width-100" v-on:click="formGotoNextStep">Next</button>
            </div>

        </div>

        <div v-show="form.step == 2">

            <div class="mb-5 text-center">
                <h4 class="font-weight-light">Tell us a bit about yourself.</h4>
                <p>You'll be the first administrator for your organisation. You can always change your role later, and add other administrators to help out.</p>
            </div>

            <div class="row">
            
                <div class="col-md-6 offset-md-2">

                    <div class="form-group" :class="{ 'has-danger': formIsInvalid('model.firstName') }">
                        <label class="required" for="firstName">First Name</label>
                        <input class="form-control" id="firstName" required type="text" v-model="model.firstName" v-on:keypress.enter="formGotoNextStep">
                        <div class="invalid-feedback" v-if="formIsInvalid('model.firstName')" v-html="form.errorList['model.firstName']"></div>
                    </div>
                
                </div>

            </div>

            <div class="row">

                <div class="col-md-6 offset-md-2">

                    <div class="form-group" :class="{ 'has-danger': formIsInvalid('model.lastName') }">
                        <label class="required" for="lastName">Last Name</label>
                        <input class="form-control" id="lastName" required type="text" v-model="model.lastName" v-on:keypress.enter="formGotoNextStep">
                        <div class="invalid-feedback" v-if="formIsInvalid('model.lastName')" v-html="form.errorList['model.lastName']"></div>                
                    </div>
                </div>

            </div>

            <div class="row">
            
                <div class="col-md-8 offset-md-2">

                    <div class="form-group" :class="{ 'has-danger': formIsInvalid('model.email') }">
                        <label class="required" for="email">Email Address</label>
                        <input class="form-control" id="email" required type="email" v-model="model.email" v-on:keypress.enter="formGotoNextStep">
                        <div class="invalid-feedback" v-if="formIsInvalid('model.email')" v-html="form.errorList['model.email']"></div>                
                    </div>

                </div>

            </div>

            <div class="form-group text-right mt-5">
                <button type="button" class="btn btn-outline-primary mr-2 min-width-100" v-on:click="formGotoPreviousStep">Previous</button>
                <button type="button" class="btn btn-primary min-width-100" v-on:click="formGotoNextStep">Next</button>
            </div>

        </div>

        <div v-show="form.step == 3">

            <div class="mb-5 text-center">
                <h4 class="font-weight-light">Here's where you set your password.</h4>
                <p>We need a password with at least 6 characters in it, although we'd suggest a longer and more complex password.</p>
            </div>

            <div class="row">
            
                <div class="col-md-6 offset-md-2">

                    <div class="form-group" :class="{ 'has-danger': formIsInvalid('model.password') }">
                        <label class="required" for="password">Password</label>
                        <input class="form-control" :class="{ 'is-invalid': formIsInvalid('model.password') }" id="admin-password" required type="password" v-model="model.password" v-on:keypress.enter="formGotoNextStep">
                        <div class="invalid-feedback" v-if="formIsInvalid('model.password')" v-html="form.errorList['model.password']"></div>
                    </div>

                    <div class="form-group" :class="{ 'has-danger': formIsInvalid('model.confirmPassword') }">
                        <label class="required" for="confirm-password">Confirm New Password</label>
                        <input class="form-control" :class="{ 'is-invalid': formIsInvalid('model.confirmPassword') }" id="admin-confirm-password" required type="password" v-model="model.confirmPassword" v-on:keypress.enter="formGotoNextStep">
                        <div class="invalid-feedback" v-if="formIsInvalid('model.confirmPassword')" v-html="form.errorList['model.confirmPassword']"></div>
                    </div>

                </div>

            </div>

            <div class="form-group text-right mt-5">
                <button type="button" class="btn btn-outline-primary mr-2 min-width-100" v-on:click="formGotoPreviousStep">Previous</button>
                <button type="button" class="btn btn-primary min-width-100" v-on:click="formGotoNextStep">Next</button>
            </div>

        </div>

        <div v-show="form.step == 4">

            <div class="mb-5 text-center">
                <h2 class="font-weight-light">That's it!</h2>
                <h4 class="font-weight-light">That's all we need for now to get you started.</h4>
            </div>

            <div class="form-group text-center">
                <button type="button" class="btn btn-outline-primary mr-2 min-width-100" v-on:click="formGotoPreviousStep">Previous</button>
                <button type="button" class="btn btn-primary min-width-100" :disabled="flag.postingModel" id="btn-signup-submit" v-on:click="doSignup">
                    <i class="far fa-spinner fa-spin text-white" v-if="flag.postingModel"></i>
                    <span v-if="! flag.postingModel">Finish</span>
                </button>
            </div>

        </div>

        <div v-show="form.step == 5">

            <div class="mb-5 text-center">
                <h2 class="font-weight-light pb-3">Summary</h2>
                <p>Your sign up is complete and you can now log in to begin setting up your organisation.</p><p class="text-center">Once you've logged in, you will be able to visit your organisation's administration console to start managing your organisation, apps, clients and other users.</p>
            </div>
            
            <div class="form-group text-center">
                <a href="/login" class="btn btn-primary">Login</a>
            </div>

        </div>

    </form>

</template>

<script>

    //mixins
    import Form from '@/_common/mixins/form.js'

    //components
    import countrySelect from '@/_common/components/form/select/country';
    import timezoneSelect from '@/_common/components/form/select/timezone';

    export default {

        components: {
            'select-country': countrySelect,
            'select-timezone': timezoneSelect
        },

        data: function() { 
            return {
                flag: {
                    postingModel: false
                },
                form: {
                    step: 1,
                    steps: [
                        { 
                            name: 'organisation', 
                            autoFocus: function() {
                                $('#organisation-name').focus();
                            }
                        },
                        { 
                            name: 'admin', 
                            autoFocus: function() {
                                $('#admin-first-name').focus();
                            }
                        },
                        { 
                            name: 'password', 
                            autoFocus: function() {
                                $('#password').focus();
                            }
                        },
                        { 
                            name: 'submit', 
                            autoFocus: function() {
                                $('#btn-signup-submit').focus();
                            }
                        },
                        { 
                            name: 'summary'
                        }
                    ]
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
                            default: 'Australia'
                        }
                    }
                }
            }
        },

        methods: {

            _setupListeners: function() {

                var self = this;

                vueEventBus.$on('selected-country', function(id, country) {
                    self.updateSelectedCountry(id, country);
                });

                vueEventBus.$on('selected-timezone', function(id, timezone) {
                    self.updateSelectedTimezone(id, timezone);
                });

            },

            doSignup: function() {

                var self = this;

                this.flag.postingModel = true;

                this.form.hasErrors = false;

                this.form.errorList = {};

                axios.post('/api/auth/signup', this.model)
                    .then(function(response) {
                        self.form.step+=1;
                    })
                    .catch(function(response) {

                         if (response.response.status !== 200) {

                            if (response.response.data.status == 'formError') {

                                 self.formHandleError(response.response.data.errors);

                            } else {

                                self.formHandleOtherError(response.response.data.errors);

                            }

                        }

                    })
                    .finally(function() {
                        self.flag.postingModel = false;
                    });

            },

            stepIsValid: function(step) {

                var stepName = this.form.steps[step - 1].name;

                switch (stepName) {

                    case 'organisation':

                        var attributes = {
                            name: this.model.organisation.name,
                            phone: this.model.organisation.contacts.phone
                            
                        }

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
                        }

                        return this.formDoValidation(attributes, constraints);

                        break;

                    case 'admin':

                        var attributes = {
                            firstName: this.getProp(this.$data, 'model.firstName'.split('.')),
                            lastName: this.getProp(this.$data, 'model.lastName'.split('.')),
                            email: this.getProp(this.$data, 'model.email'.split('.'))
                        }

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
                        }

                        return this.formDoValidation(attributes, constraints);

                        break;

                    case 'password':

                        var attributes = {
                            password: this.getProp(this.$data, 'model.password'.split('.')),
                            confirmPassword: this.getProp(this.$data, 'model.confirmPassword'.split('.'))
                        }

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
                                    comparator: function(v1, v2) {
                                        return v1 === v2;
                                    }
                                }
                            }
                        }

                        return this.formDoValidation(attributes, constraints);

                        break;

                }

            },

            stepHasError: function(step) {

                if (! this.form.hasErrors) {
                    return null;
                }

                var self = this;

                var steps = {
                    1: [ 'model.organisation.name', 'model.organisation.contacts.phone' ],
                    2: [ 'model.firstName', 'model.lastName', 'model.email' ],
                    3: [ 'model.password', 'model.confirmPassword' ]
                }

                var stepHasError = false;

                _.forEach (steps[step], function(field) {

                    if (self.form.errorList[field]) {
                        stepHasError = true;
                    }

                });

                if (stepHasError) {
                    return 'text-danger';
                }

            },

         

        
        },

        mixins: [
            Form
        ],

        mounted: function() {
            
            this._setupListeners();

        },

    }

</script>

<style type="text/css"></style>