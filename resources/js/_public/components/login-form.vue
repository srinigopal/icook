<template>
    
    <form class="px-md-5 text-center text-sm-left pt-3" v-on:submit.prevent>
     
        <div v-if="! flag.foundUser">

            <div class="text-center my-4">
                <h3 class="font-weight-light">Log In</h3>
                <small class="text-muted">We'll never share your details with anyone else.</small>
            </div>

            <div class="form-group" :class="{ 'has-danger': formIsInvalid('model.email') }">
                <label class="control-label required" for="email">Email</label>
                <input class="form-control" :class="{ 'is-invalid': formIsInvalid('model.email') }" :disabled="flag.performingUserLookup" id="email" type="email" ref="email" v-model="model.email" v-on:keypress.enter="lookupUser">
                <div class="invalid-feedback" v-if="formIsInvalid('model.email')" v-html="form.errorList['model.email']"></div>
            </div>

            <a href="#" class="form-text">Forgot email?</a>

            <div class="form-group mt-3 text-right">
                <button type="button" class="btn btn-primary min-width-100" :disabled="flag.performingUserLookup" v-on:click="lookupUser">
                    <i class="far fa-spinner fa-spin text-white" v-if="flag.performingUserLookup"></i>
                    <span v-if="! flag.performingUserLookup">Next</span>
                </button>
            </div>

        </div>

        <!-- user has a valid account, but it's locked -->
        <div v-if="flag.foundUser && user.account_locked">

            <div class="text-center my-4">
                <h3 class="font-weight-light">
                    <i class="far fa-lock mb-2 text-warning"></i>
                    <div class="my-2">Account Locked</div>
                </h3>
                <p class="text-center">Your account is currently locked. If this is unexpected, or you're not sure why your account is locked, please contact your organisation's administrator.</p>
            </div>
        
            <div class="form-group mt-3 text-center">
                <button type="button" class="btn btn-primary min-width-100" v-on:click="removeUser">
                    Back
                </button>
            </div>

        </div>

        <!-- user is valid and has an unlocked account -->
        <div v-if="flag.foundUser && ! user.account_locked">

            <div class="text-center my-4 pb-3">
                <h3 class="text-center font-weight-light pb-2">Welcome</h3>
                <div class="input-group mx-auto">
                    <ul class="list-group flex-grow-1">
                        <li class="list-group-item text-center font-weight-bold p-1" v-html="model.email"></li>
                    </ul>
                    <div class="input-group-append">
                        <button class="btn btn-sm btn-secondary input-group-append" type="button" v-on:click="removeUser"><i class="far fa-times"></i></button>
                    </div>
                </div>
            </div>

            <div class="form-group mt-3" :class="{ 'has-danger': formIsInvalid('model.password') }">
                <label class="control-label required" for="password">Password</label>
                <input class="form-control" :class="{ 'is-invalid': formIsInvalid('model.password') }" id="password" ref="password" required type="password" v-model="model.password" v-on:keyup="setCapsLockState" v-on:keypress.enter="performLogin">
                <div v-if="flag.capsLockOn" class="pt-2"><i class="fal fa-exclamation-circle text-muted pr-1"></i><span class="text-muted">Caps lock is on</span></div>
                <div class="invalid-feedback" v-if="formIsInvalid('model.password')" v-html="form.errorList['model.password']"></div>
            </div>

            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="remember" v-model="model.remember">
                    <label class="custom-control-label checkbox" for="remember">Remember Me</label>
                </div>
              </div>

            <div class="form-group mt-3 text-right">
                <button type="button" class="btn btn-primary min-width-100" :disabled="flag.attemptingLogin" v-on:click="performLogin">
                    <i class="far fa-spinner fa-spin text-white" v-if="flag.attemptingLogin"></i>
                    <span v-if="! flag.attemptingLogin">Next</span>
                </button>
            </div>

        </div>

        <div class="text-center">
            <div>Don't have a login?</div>
            <a href="/signup" class="form-text"><small>Sign up your organisation now.</small></a>
        </div>

    </form>

</template>

<script>

    //mixins
    import Form from '@/_common/mixins/form.js'

    export default {

        mounted: function() {

            this.$refs.email.focus();

        },

        data: function() { 
            return {
				loggedIn:localStorage.getItem('loggedIn')==true,
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
            }
        },

        methods: {

            lookupUser: function() {

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
                })
                .then(function(response) {

                    self.flag.foundUser = true;

                    self.user = response.data.payload;

                    if (! self.user.account_locked) {
                            
                        Vue.nextTick(function() {
                            self.$refs.password.focus();
                        });

                    }

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

                    self.flag.performingUserLookup = false;

                });

            },

            performLogin: function() {

                var self = this;

                self.flag.attemptingLogin = true;

                self.form.hasErrors = false;

                self.form.errorList = {};

                axios({
                    method: 'post',
                    url: '/api/auth/login',
                    data: self.model
                })
                .then(function(response) {

                    if (response.status == 200) {
							localStorage.setItem('loggedIn','true');
							self.loggedIn=true;		
                        window.location.href = '/dashboard';

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

                })
                .catch(function(response) {

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

            removeUser: function() {

                var self = this;

                //set flags
                self.flag.foundUser = false;
                self.flag.attemptingLogin = false;

                //clear models
                self.user = null;

                self.model.password = null;

                Vue.nextTick(function() {
                    self.$refs.email.focus();
                });

            },

            setCapsLockState: function(e) {
                this.flag.capsLockOn = e.getModifierState('CapsLock');
            }

        },

        mixins: [
            Form
        ]

    }

</script>

<style>

    main {
        margin-top: 0;
        height: calc(100vh);
        min-height: calc(100vh);
    }

</style>