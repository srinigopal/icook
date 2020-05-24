export default {

    computed: {

        //basic check to ensure that we have the minimum available information to allow a save on the working model
        preventModelSubmit: function(excludeDefaultTests) {

            var thisComponent = this;

            //do not prevent posting by default
            var prevent = false;

            if (! excludeDefaultTests) {

                var defaultTests = [
                    {
                        fails: function() { return thisComponent.flag.model.state.data == 'UNMODIFIED'; } //don't allow submitting when we haven't done anything yet
                    },
                    {
                        fails: function() { return thisComponent.flag.model.state.submit == 'ATTEMPTING'; } //don't allow submitting when we're in the middle of a submission - prevents multiple clicks
                    }
                ];

                _.each(defaultTests, function(test) {
                    if (test.fails()) {
                        return prevent = true;
                    }
                });

            }

            //have we failed any default tests (assuming we're running them?)
            if (! prevent) {

                //run each validation test and if one fails, break out by setting prevent to true in order to prevent posting the model
                _.each(thisComponent.modelSubmissionTests, function(test) {
                    if (test.fails()) {
                        return prevent = true;
                    }
                });

            }

            //return the final result of the tests
            return prevent;

        }

    },
 
    methods: {

        bootstrapComponent: function(type, rootComponentObject, childComponentName) {

            if (! type || ! rootComponentObject || ! childComponentName) {

                console.warn('[component::bootstrapComponent] Missing argument - cannot bootstrap component');

                return;

            }

            var componentToBootstrap = null;

            switch(type) {

                case 'select':

                    componentToBootstrap = rootComponentObject.componentRegistry.selects.find( object => object.name == childComponentName);
                    
                    if (! componentToBootstrap) {
                        return;
                    }

                    if (componentToBootstrap.bootstrap && typeof componentToBootstrap.bootstrap == 'function') {
                        return componentToBootstrap.bootstrap();
                    }

                    return this.bootstrapSelect(componentToBootstrap, rootComponentObject);

                case 'date':

                    componentToBootstrap = rootComponentObject.componentRegistry.dates.find( object => object.name == childComponentName);
                    
                    if (! componentToBootstrap) {
                        return;
                    }

                    if (componentToBootstrap.bootstrap && typeof componentToBootstrap.bootstrap == 'function') {
                        return componentToBootstrap.bootstrap();
                    }
                    
                    return this.bootstrapDatepicker(componentToBootstrap, rootComponentObject);
                    
                default:

                    console.warn('[component::bootstrapComponent] Missing type. Use "select" or "date" as first argument.');

                    return;

            }

        },

        bootstrapSelect: function(componentToBootstrap, rootComponentObject) {

            if (componentToBootstrap.dataSource) {

                vueEventBus.$emit('select2-select-single', componentToBootstrap.name, (_.get(rootComponentObject.baseModel, componentToBootstrap.dataSource)));

            } else if (componentToBootstrap.default) {

                vueEventBus.$emit('select2-select-single', componentToBootstrap.name, componentToBootstrap.default);
                
            }

            return componentToBootstrap.ready = true;

        },

        bootstrapDatepicker: function(componentToBootstrap, rootComponentObject) {

            if (componentToBootstrap.dataSource) {

                vueEventBus.$emit('datepicker-update-date', componentToBootstrap.name, (_.get(rootComponentObject.baseModel, componentToBootstrap.dataSource)));

            } else if (componentToBootstrap.default) {

                vueEventBus.$emit('datepicker-update-date', componentToBootstrap.name, componentToBootstrap.default);
                
            }

            return componentToBootstrap.ready = true;

        },

        setupRegistryEventListeners: function() {

            var thisComponent = this;

            //date picker component

            //check if we have any date picker components in the registry?
            if (thisComponent.componentRegistry.dates) {

                //if we do, set up the ready event listener for the date picker component
                vueEventBus.$on('datepicker-ready', function(id) {
                    thisComponent.bootstrapComponent('date', thisComponent, id);
                });

                //iterate through the component registry and set each listener dynamically - don't set listener if we've already defined one
                _.each(thisComponent.componentRegistry.dates, function(date) {

                    var thisEvent = 'selected-' + date.component;

                    vueEventBus.$on(thisEvent, function(id, value) {
                        thisComponent.updateModelFromChildComponent('date', thisComponent, id, value);
                    });

                });

            }

            //select component
            if (thisComponent.componentRegistry.selects) {

                vueEventBus.$on('select2-ready', function(id) {
                    thisComponent.bootstrapComponent('select', thisComponent, id);
                });

                _.each(thisComponent.componentRegistry.selects, function(select) {

                    var thisEvent = 'selected-' + select.component;

                    vueEventBus.$on(thisEvent, function(id, value) {
                        thisComponent.updateModelFromChildComponent('select', thisComponent, id, value);
                    });

                });

            }

            console.log(vueEventBus._events);

        },

        /**
         * Summary.
         * Called by parent component to update its model base on a child component update.
         * 
         * Description. (use period)
         * Updates the model of a parent component to the new value of a child 'date' or 'select' component,
         * usually in resonse to a vueEventBus emission from the child component.
         * 
         * @param {string}   type                       Type of component to be updated: 'select' or 'date'.
         * @param {Object}   rootComponentObject        The parent component that contains the child component to be updated.
         * @param {string}   childComponentName         Unique id of child component to be updated: 'client-dob', 'client-title'.
         * @param {string}   optionToSelect             The ID of the option to select.
         *
         * @return {void}
         */
        updateModelFromChildComponent: function(type, rootComponentObject, childComponentName, optionToSelect) {

            var componentToUpdate = null;

            switch(type) {

                case 'select': // This is a select 2 component
                    
                    componentToUpdate = rootComponentObject.componentRegistry.selects.find( object => object.name == childComponentName);

                    break;

                case 'date': // This is a datepicker component

                    componentToUpdate = rootComponentObject.componentRegistry.dates.find( object => object.name == childComponentName)

                    break;

                default:

                    console.warn('[component::updateModelFromChildComponent] Missing type. Use "select" or "date" as first argument.');

                    return;

            }
        
            // If the component couldn't be found, return
            if (! componentToUpdate) {
                
                console.warn('[component::bootstrapComponent] Component not found - cannot update');

                return;

            }
            
            if (componentToUpdate.updater && typeof componentToUpdate.updater == 'function') { // If there is a custom update function, run it

                componentToUpdate.updater(childComponentName, optionToSelect);

                return;
            
            } else {

                _.set(rootComponentObject.model, componentToUpdate.dataSource, optionToSelect); // Otherwise, update the model with new value

                return;

            }

        }

    }

}