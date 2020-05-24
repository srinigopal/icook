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

    // components
    import select2 from '@/_common/components/form/select2';

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

                var self = this;

                vueEventBus.$on('selected-country', function(id, country) {
                    if (self.subscribeTo == id) {
                        self.getModel(country);         
                    }
                });

                vueEventBus.$on('select2-selected-single', function(id, timezone) {
                    if (id == self.id) {
                        vueEventBus.$emit('selected-timezone', id, timezone);
                    }
                });

            },

            getModel: function(country) {

                var self = this;

                self.flag.modelGetState = 'ATTEMPTING';

                return axios.get('/api/v1/timezone', {
                    params: {
                        country: country
                    }
                }).then(function(response) {

                    var options = [];

                    _.each(response.data.payload, function(timezone) {
                        options.push({
                            id: timezone.id,
                            text: timezone.name
                        });
                    });

                    self.options = options;

                    self.flag.modelGetState = 'SUCCESS';

                })
                .catch(function(error) {
                    self.flag.modelGetState = 'FAILED';
                });

            }

        },

        mounted: function() {

            this._setupListeners();

        },

        props: [
            'id', 'subscribeTo'
        ]

    }

</script>

<style></style>