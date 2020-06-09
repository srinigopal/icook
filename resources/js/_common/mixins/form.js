export default {

    computed: {

        formProgress: function() {
            return (this.form.step / this.form.steps.length) * 100;
        }

    },

    data: function() {
        return {
            form: {
                hasErrors: false,
                errorList: {}
            }
        };
    },

    methods: {

        formDoValidation: function(attributes, constraints) {

            var self = this;

            this.form.hasErrors = false;

            this.form.errorList = {};

            var validation = validate(attributes, constraints, {
                fullMessages: false
            });

            if (_.isObject(validation)) {
                _.forEach(validation, function(errors) {
                    _.forEach(errors, function(error) {
                        self.$set(
                            self.form.errorList,
                            'model.' + error.model,
                            error.message
                        );

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

        formGotoNextStep: function() {

            // this.form.step+=1;
            // return true;
            if (this.stepIsValid(this.form.step)) {
				
                var step = this.form.steps[this.form.step];

                this.form.step += 1;

                if (typeof step.autoFocus == 'function') {
                    Vue.nextTick(function() {
                        step.autoFocus();
                    });
                } else {
                    console.warn('autoFocus for form step must be a function.');
                }
            }

        },

        formGotoPreviousStep: function() {

            this.form.step--;

            var step = this.form.steps[this.form.step - 1];

            if (typeof step.autoFocus == 'function') {
                Vue.nextTick(function() {
                    step.autoFocus();
                });
            } else {
                console.warn('autoFocus for form step must be a function.');
            }

        },

        formGotoStep: function(step) {

            //basic sanity checking
            //no going below 0
            if (step < 0) {
                return false;
            }

            //no going above the max steps
            if (step > this.form.steps.length) {
                return false;
            }

            // if we're trying to skip to future steps, we need to validate the current one first
            if (step > this.form.step) {
                if (!this.stepIsValid(this.form.step)) {
                    return false;
                }
            }

            this.form.step = step;

            var newStep = this.form.steps[step - 1]; //need to minus 1, since the array starts at 0

            if (typeof newStep.autoFocus == 'function') {
                Vue.nextTick(function() {
                    newStep.autoFocus();
                });
            } else {
                console.warn('autoFocus for form step must be a function.');
            }

        },

        formHandleError: function(errors) {

            var self = this;

            _.forEach(errors, function(error, key) {
                self.$set(self.form.errorList, 'model.' + key, _.first(error));
            });

            this.form.hasErrors = true;

            notice.error('Invalid form data - please check your entries');

        },

        formHandleOtherError: function(error) {

            notice.error(error ? error : 'An unknown error has occurred.');

        },

        formIsInvalid: function(field) {

            if (! this.form.hasErrors) {
                return false;
            }

            if (this.form.errorList[field]) {
                return true;
            }

        },

        formPostModel: function(url, redirect) {

            var thisComponent = this;

            thisComponent.flag.postingModel = true;

            thisComponent.form.hasErrors = false;

            thisComponent.form.errorList = {};

            return new Promise(function(resolve, reject) {

                return axios({
                    method: 'post',
                    url: '/api/' + url,
                    data: thisComponent.model
                }).then(function(response) { 

                     //   if (response.data.redirect) {
                          //  window.location.replace(response.data.redirect);
                       // }

                        resolve(response);

                }).catch(function(error) {

                        if (error.response.status !== 200) {

                            if (error.response.data.status == 'formError') {

                                thisComponent.formHandleError(
                                    error.response.data.errors
                                );

                            } else {

                                thisComponent.formHandleOtherError(
                                    error.response.data.errors
                                );

                            }

                        }

                        thisComponent.flag.postingModel = false;

                        reject(error);

                    });
            });
        },

        formPatchModel: function(url, redirect) {

            var thisComponent = this;

            thisComponent.flag.postingModel = true;

            thisComponent.form.hasErrors = false;

            thisComponent.form.errorList = {};

            return new Promise(function(resolve, reject) {
                axios
                    .patch('/api/' + url, thisComponent.model)
                    .then(function(response) {
                        if (response.data.redirect) {
                            window.location.replace(response.data.redirect);
                        }

                        // Reset the posting flag and modelState
                        thisComponent.flag.postingModel = false;
                        thisComponent.flag.modelState = 'UNMODIFIED';

                        resolve(response);
                    })
                    .catch(function(error) {
						
                        if (error.response.status !== 200) {
                            if (error.response.data.status == 'formError') {
								
								
                                thisComponent.formHandleError(
                                    error.response.data.errors
                                );
                            } else {
                                thisComponent.formHandleOtherError(
                                    error.response.data.errors
                                );
                            }
                        }

                        thisComponent.flag.postingModel = false;
                        reject(error);
                    });
            });
        },

        formGetModel: function(url) {

            var thisComponent = this;

            thisComponent.flag.modelGetState = 'ATTEMPTING';

            return new Promise(function(resolve, reject) {

                axios({
                    method: 'get',
                    url: '/api/' + url
                }).then(function(response) {

                    //set base model to keep an unmodified state
                    thisComponent.baseModel = response.data.data;

                    //setup working model from base model
                    thisComponent.model = _.cloneDeep(thisComponent.baseModel);

                    thisComponent.flag.modelGetState = 'SUCCESS';

                    resolve(response);

                }).catch(function(error) {

                    if (error.response.status !== 200) {
                        if (error.response.data.status == 'formError') {
                            thisComponent.formHandleError(
                                error.response.data.errors
                            );
                        } else {
                            thisComponent.formHandleOtherError(
                                error.response.data.errors
                            );
                        }
                    }

                    thisComponent.flag.modelGetState = 'FAILED';

                    reject(error);

                }).finally(function() {
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
        firstUpdate: function(componentId) {

            var thisComponent = this;

            // If this component hasn't been recorded
            if (! thisComponent.initComponents[componentId]) {

                thisComponent.initComponents[componentId] = true;
                
                // This is the first update
                return true;

            } else {
                
                // This is not the first update
                return false;

            }

        }

    }

}