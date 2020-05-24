//component helpers
window.component = {

    getContext: function(component) {

        return {
            single: component.options.context.single ? component.options.context.single : 'CONTEXT_SINGLE',
            multiple: component.options.context.multiple ? component.options.context.multiple : 'CONTEXT_MULTIPLE'
        }

    }
    
}

//app helpers
window.parseURLParams = function(urlParams) {

    var thisURLParams = new URLSearchParams(window.location.search);

    _.each(urlParams, function(obj, parameter) {
        if (thisURLParams.has(parameter)) {

            obj.value = thisURLParams.get(parameter);

            if (typeof obj.handler == 'function') {
                obj.handler();
            }

        }
    });

}

//dialog helpers
window.dialog = {

    close: function() {
        Swal.close();
    },

    error: function(error) {

        var thisDialog = {
            title: '<div class="d-flex flex-column"><i class="fal fa-times display-5 mb-2 text-danger"></i>An error occurred</div>',
            text: error,
            showCancelButton: false,
            confirmButtonText: 'OK'
        }

        if (! error) {
            thisDialog.text = 'Try again and if the problem continues, please contact us'
        }

        return Swal.fire(thisDialog);

    },

    confirm: {

        delete: function(thisComponent, thisContext) {

            var thisDialog = {
                title: '<div class="d-flex flex-column"><i class="fal fa-exclamation-circle display-5 mb-2 text-danger"></i></div>',
                text: null,
                showCancelButton: true,
                confirmButtonText: 'OK',
                cancelButtonText: 'Cancel'
            }

            switch (thisContext) {

                case 'single':
                    thisDialog.text = 'Are you sure you want to delete this ' + component.getContext(thisComponent).single + '?'
                    break;

                case 'multiple':
                    thisDialog.text = 'Are you sure you want to delete these ' + component.getContext(thisComponent).multiple + '?'
                    break;

                default:
                    thisDialog.text = 'Are you sure you want to delete this?'
                    break;

            }

            return Swal.fire(thisDialog);

        }

    }

}

//toastify helpers
window.notice = {

    error: function(message) {

        var thisNotice = {
            text: message ? message : 'An unknown error occurred',
            duration: 3000,
            close: false,
            gravity: 'bottom',
            position: 'left',
            backgroundColor: '#e51c23',
            stopOnFocus: true
        }

        return Toastify(thisNotice).showToast();

    }

}

// jQuery related helpers
    window.showModal = function(id, type) { //full, right or center

        var modalDOM = $('#' + id);

        var modalType = 'right';

        if (modalDOM.length) {
            
            switch (type) {

                case 'center':

                    var modalType = 'center';
                    var modalAnimationIn = 'modal-dialog-centered';
                    var modalAnimationOut = '';

                    break;

                case 'right':
                    
                    var modalType = 'right';
                    var modalAnimationIn = 'slideInRight';
                    var modalAnimationOut = 'slideOutRight';

                    break;

                case 'full':
                    
                    var modalType = 'full';
                    var modalAnimationIn = 'slideInDown';
                    var modalAnimationOut = 'slideOutUp';
                    
                    break;

                default:

                    var modalType = 'right';
                    var modalAnimationIn = 'slideInRight';
                    var modalAnimationOut = 'slideOutRight';

                    console.warn('[utils::showModal] Modal type not specified, or incorrect (should be full or right)');

            }

        } else {

            console.warn('[utils::showModal] DOM element #' + id + ' not found.');

        }

        modalDOM.attr('class', 'modal ' + modalType);

        modalDOM.children('.modal .modal-dialog').addClass(modalAnimationIn);

        modalDOM.appendTo('body').modal('show'); // have to append to fix z-index issues (https://stackoverflow.com/a/15780841)
    
    }

    window.hideModal = function(id) {

        var modalDOM = $('#' + id);

        if (modalDOM.length) {

            modalDOM.off('hide.bs.modal');

            modalDOM.modal('hide');
         
        } else {

            console.warn('[utils::hideModal] DOM element #' + id + ' not found.');

        }

    }

// additional string type methods

    String.prototype.getInitials = function(glue) {

        if (typeof glue == 'undefined') {
            var glue = true;
        }

        var initials = this.replace(/[^a-zA-Z- ]/g, '').match(/\b\w/g);
        
        if (glue) {
            return initials.join('');
        }

        return initials;

    };

    String.prototype.capitalize = function() {
        
        return this.toLowerCase().replace( /\b\w/g, function(m) {
            return m.toUpperCase();
        });
        
    };

    //https://joshtronic.com/2016/03/06/how-to-capitalize-the-first-character-of-each-word-in-a-string-in-javascript/
    String.prototype.upperCaseWords = function() {

        return this.replace(/\w\S*/g, function(word) {
            return word.charAt(0).toUpperCase() + word.substr(1);
        });

    }