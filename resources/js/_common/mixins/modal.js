export default {

    methods: {

        _initModal: function() {
alert("ddddddddddddddddddddddddddd");
            var thisComponent = this;
            
            var thisModal = $(this.$el);

            //reset flags
            thisComponent.flag.modelState = 'UNMODIFIED';
            thisComponent.flag.postingModel = false;

            //reset any form error lists
            if (thisComponent.form) {

                thisComponent.form = {
                    hasErrors: false,
                    errorList: {}
                }

            }

            //TODO - Go to the first tab in this modal if there is one

            //setup show / hide handlers
            thisModal.on('show.bs.modal', function(e) {

                thisComponent.watchForUnsavedDismissal();

                if (thisComponent.options.initialFocusRef) {
                    thisComponent.modalSetInitialFocus();
                }

            });

        },

        watchForUnsavedDismissal: function() {

            var thisComponent = this;

            var thisModal = $(this.$el);

            //handle this modal closing - watch for modified model and throw warning
            thisModal.on('hide.bs.modal', function(e) {

                e.preventDefault();

                if (thisComponent.flag.modelState == 'MODIFIED') {

                    return Swal.fire({
                        title: '<div class="d-flex flex-column"><i class="fal fa-file-exclamation display-5 mb-2"></i><div>You have unsaved changes</div></div>',
                        text: 'Would you like to continue without saving these changes?',
                        showCancelButton: true,
                        confirmButtonText: 'OK',
                        cancelButtonText: 'Cancel'
                    }).then(function(result) {

                        if (result.value) {

                            thisModal.off('hide.bs.modal');

                            hideModal(thisComponent.$el.id);

                        }

                    });

                } else {

                    thisModal.off('hide.bs.modal');

                    hideModal(thisComponent.$el.id);

                }

            });

        },

        modalSetInitialFocus: function() {
            
            var thisComponent = this;

            Vue.nextTick(function() {
                thisComponent.$refs[thisComponent.options.initialFocusRef].focus();
            });

        }

    }

}