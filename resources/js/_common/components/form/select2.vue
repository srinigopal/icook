<template>

    <select>
        <slot></slot>
    </select>

</template>

<script>

    //styles
    import '~/select2/dist/css/select2.min.css';
    import '~/@ttskch/select2-bootstrap4-theme/dist/select2-bootstrap4.min.css';

    // components
    import $ from 'jquery';
    import 'select2';

    export default {

        methods: {

            _setupListeners: function() {

                var thisComponent = this;

                vueEventBus.$on('select2-reset', function(instance) {

                    if (instance == thisComponent.parent.id) {

                        //init config object
                        var config = {
                            data: thisComponent.options,
                            width: '100%'
                        }

                        //do we want an explicit placeholder?
                        if (thisComponent.placeholder) {
                            config.placeholder = thisComponent.placeholder;
                        } else {
                            config.placeholder = 'Select';
                        }

                        //setup select2 instance
                        $(thisComponent.$el).select2(config)
                            .val(this.value)
                            .trigger('change')
                            .on('change', function(e) {

                                if (thisComponent.$attrs.multiple == 'multiple') {

                                    var values = [];

                                    $(e.currentTarget).find('option:selected')
                                        .each(function(index, selected){ 
                                            values[index] = selected.value;
                                        });

                                    vueEventBus.$emit('select2-selected-multiple', thisComponent.instance, values);

                                } else {

                                    vueEventBus.$emit('select2-selected-single', thisComponent.parent.id, this.value);

                                }

                            });

                        //handle typing into element
                        //https://github.com/select2/select2/issues/3279#issuecomment-442524147
                        $('.select2-selection').keydown(function(e) {

                            if (e.which < 32) {
                                return;
                            }
                            
                            var target = $(e.target).closest('.select2-container');

                            if (! target.length) {
                                return;
                            }
                            
                            target = target.prev();

                            target.select2('open');
                            
                            var search = target.data('select2').dropdown.$search || target.data('select2').selection.$search;
                            
                            search.focus();

                        });

                        vueEventBus.$emit('select2-ready', thisComponent.parent.id);
                        

                    }

                });

                vueEventBus.$on('select2-focus', function(instance) {

                    if (instance == thisComponent.parent.id) {
                        Vue.nextTick(function() {
                            $(thisComponent.$el).select2('focus');
                        });
                    }

                });

                // sets a select2 component using the id of an option
                vueEventBus.$on('select2-select-single', function(requestingComponentId, targetOption) {
				
				

                    // are we targeting the parent of this instance of the select2 component?
                    if (requestingComponentId == thisComponent.parent.id) {

                        // does this select2 component have any options
                        if (thisComponent.options) {

                            // iterate through this select2 instance's options until we match one
                            _.each(thisComponent.options, function(option) {
				
                                // have we found a match - either by id, or text
                                if (targetOption == option.id || targetOption == option.text) {
                                    
                                    // if we find a match, trigger a select2 select change
                                    $(thisComponent.$el).select2()
                                        .val(option.id)
                                        .trigger('change');

                                }

                            });

                        }
                    
                    }

                });
 
                vueEventBus.$on('select2-select-multiple', function(instance, targetOptions) {

                });

            }

        },

        mounted: function() {

            var thisComponent = this;

            this._setupListeners();

            vueEventBus.$emit('select2-reset', thisComponent.parent.id);

            

        },

        props: [ 'parent', 'options', 'value', 'placeholder' ],

        watch: {

            options: function(options) {

                $(this.$el).empty()
                    .select2({
                        data: options
                    });

            }

        }

    }

</script>

<style>

   /*  @import '~/select2/dist/css/select2.min.css';
    @import '~/@ttskch/select2-bootstrap4-theme/dist/select2-bootstrap4.min.css'; */

</style>