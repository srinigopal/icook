<template>

    <div class="input-group date">
        <input  class="ui-timepicker-input" type="text">
        <div class="input-group-addon">
            <button type="button" class="btn btn-link pl-3"><i class="far fa-bell"></i></button>
        </div>
    </div>

</template>

<script>

    //styles
    import '~/timepicker/jquery.timepicker.css';
    
    export default {

        methods: {

            _setupListeners: function() {

                var self = this;
			//$(this.$el).timepicker('option', { useSelect: true });
			 
				$(this.$el).timepicker()
                    .on('change.timepicker', function(e) {					
							var value = $(e.target).val();							
							vueEventBus.$emit('selected-time', self.id, '2:30am');

                    });
               
                vueEventBus.$on('timepicker-update-time', function(requestingComponentId, targetTime){                    
                    // are we targeting this time component?
                    if (requestingComponentId == self.id) {
                        $(self.$el).timepicker('update', targetTime);
                    }


                });
				
				 $(this.$el).on('selectTime', function(e) {
				 
				 var value = $(e.target).val();
				 
				});
							

            },

            checkForValidTime: function(e) {

                var self = this;

                var value = $(e.target).val();

                if (value == '') {
                    return true;
                }
				// reset time picker
                vueEventBus.$emit('reset-select-time', self.id);
                // reset any instance
                vueEventBus.$emit('selected-time', self.id, null);

             },
			
        },

        mounted: function() {

			var self = this;         
            
             //setup date picker
            $(this.$el).timepicker({dropdown: true});			
			this._setupListeners();
        },

        props: [
            'id'
        ]

    }

</script>

