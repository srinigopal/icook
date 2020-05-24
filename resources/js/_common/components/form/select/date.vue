<template>

    <div class="input-group date">
        <input type="text" class="form-control" v-on:blur="checkForValidDate">
        <div class="input-group-addon">
            <button type="button" class="btn btn-link pl-3"><i class="far fa-calendar-alt"></i></button>
        </div>
    </div>

</template>

<script>

    //styles
    import '~/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css';

    //modules
    import Inputmask from 'inputmask/dist/inputmask/inputmask.date.extensions';

    export default {

        methods: {

            _setupListeners: function() {

                var self = this;

                // listen for date selected event from date picker
                $(this.$el).datepicker()
                    .on('changeDate', function(e) {

                        if (e.date) {
                            vueEventBus.$emit('selected-date', self.id, e.date);
                        }

                    });

                vueEventBus.$on('reset-select-date', function(instance) {
                    if (self.id == instance) {
                        $(self.$el).datepicker('clearDates');
                    }
                });

                vueEventBus.$on('datepicker-update-date', function(requestingComponentId, targetDate){
                    
                    // are we targeting this date component?
                    if (requestingComponentId == self.id) {

                        var formattedDate = moment(targetDate).format('DD-MM-YYYY');
                        
                        $(self.$el).datepicker('update', formattedDate);
                    }


                });

            },

            checkForValidDate: function(e) {

                var self = this;

                var value = $(e.target).val();

                if (value == '') {
                    return true;
                }

                var proposedDate = moment(value, 'DD-MM-YYYY', true);

                if (! proposedDate.isValid()) {

                    Toastify({
                        text: 'Invalid date',
                        duration: 3000,
                        close: false,
                        gravity: 'bottom',
                        position: 'right',
                        backgroundColor: '#e51c23',
                        stopOnFocus: true
                    }).showToast();

                    // reset date picker
                    vueEventBus.$emit('reset-select-date', self.id);

                    // reset any instance
                    vueEventBus.$emit('selected-date', self.id, null);

                }

            }

        },

        mounted: function() {

            var self = this;

            //setup input mask
            Inputmask('datetime', {
                inputFormat: 'dd-mm-yyyy',
                oncomplete: function(e) {

                    var proposedDate = moment($(e.target).val(), 'DD-MM-YYYY');

                    if (proposedDate.isValid()) {
                        vueEventBus.$emit('selected-date', self.id, proposedDate);
                    }

                },
                showMaskOnHover: false
            }).mask($(this.$el).find('input'));

            //setup date picker
            $(this.$el).datepicker({
                autoclose: true,
                format: 'dd-mm-yyyy',
                orientation: 'top left',
                showOnFocus: false,
                todayBtn: 'linked',
                todayHighlight: true
            });

            this._setupListeners();

            vueEventBus.$emit('datepicker-ready', self.id);
            
        },

        props: [
            'id'
        ]

    }

</script>

<style>
    
    .datepicker {
        margin-top: 70px;
        border-color: #ccc;
        padding: 0 1rem;
    }

    .datepicker td, .datepicker th {
        border-radius: 0;
    }

    .datepicker-days * {
        padding: 0.25rem;
    }

    .datepicker table tr td.today {
        background: #4c6b8a;
        color: #fff;
    }

    .datepicker table tr td.today:hover:hover {
        background: #3e5871;
        color: #fff;
    }

</style>