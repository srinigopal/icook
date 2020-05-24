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

                vueEventBus.$on('select2-selected-single', function(id, state) {
                    if (id == self.id) {
                        vueEventBus.$emit('selected-state', id, state);
                    }
                });

            },

            getModel: function() {

                var self = this;

                self.flag.modelGetState = 'ATTEMPTING';

                return axios.get('/api/v1/state')
                    .then(function(response) {

                        var options = [];

                        _.each(response.data.payload, function(state) {
                            options.push({
                                id: state.id,
                                text: state.name.upperCaseWords()
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

            var self = this;

            this._setupListeners();

            this.getModel()
                .then(function() {
                    if (self.default) {
                        vueEventBus.$emit('select2-select-single', self.id, self.default);
                    }
                });

        },

        props: [
            'default', 'id'
        ]

    }

</script>

<style></style>