<template>

    <div class="d-flex flex-row align-items-center">

        <div class="w-100" v-if="flag.modelGetState == 'SUCCESS'">
            <select2 class="w-100" :options="options" :parent="this"></select2>
        </div>
        
        <div v-show="flag.modelGetState == 'ATTEMPTING'">
            <i class="far fa-spinner fa-spin m-2"></i>
        </div>

    </div>

</template>

<script>

    import select2 from '@/_common/components/form/select2';
  import 'select2';

    export default {

        components: {
            'select2': select2
        },

        data: function() {

            return {
                flag: {
                    modelGetState: 'NO_ATTEMPT'
                },
                options: []
            }

        },

        methods: {

            _setupListeners: function() {

                var thisComponent = this;

                			
				
				vueEventBus.$on('select2-selected-single', function(id, optionId) {
                  
                    if (id == thisComponent.id) {
  
                        // Find the option that we are updating
                        let index = thisComponent.options.findIndex(i => i.id == optionId);
                    
                        // Get the text value of the option
                        let text = thisComponent.options[index] ? thisComponent.options[index].text : null;
 
                        vueEventBus.$emit('selected-venue-selection', id, optionId, text);

                    }
                });

                // A new manage type has been added
              /*  vueEventBus.$on('updated-model-venue-selection', function() {

                    thisComponent.getModel();

                });
*/

            },

            getModel: function() {

                var thisComponent = this;

                thisComponent.flag.modelGetState= 'ATTEMPTING';

                return axios.get('/api/users')
                    .then(function(response) {

                        var options2 = [];

                        _.each(response.data.data, function(burialType) {
                            options2.push({
                                id: burialType.id,
                                text: burialType.first_name.upperCaseWords(),
                            });
                        });
                        thisComponent.options = options2;

                        thisComponent.flag.modelGetState= 'SUCCESS';

                    })
                    .catch(function(error) {
                        thisComponent.flag.modelGetState= 'FAILED';
                    });

            },

            

        },

        mounted: function() {

            var thisComponent = this;

            this._setupListeners();

            this.getModel()
                .then(function() {
                    if (thisComponent.default) {
					
					
                        vueEventBus.$emit('select2-select-single', thisComponent.id, thisComponent.default);
                    }
                });

        },

        props: [
            'default',
            'id'
        ]

    }

</script>

<style>

</style>