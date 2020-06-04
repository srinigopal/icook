<template>
    <div class="main-content">
       
        <b-row>
            <b-col md="12 mb-30">
                <b-card title="Create Food Menu">
                    
                    <b-form>
                        <b-row>

                        <b-form-group
                                class="col-md-6 mb-3" 
                                id="input-group-1"
                                label="Name"
                                label-for="input-1"
                                    
                            >
                                <b-form-input
                                :class="{ 'is-invalid': formIsInvalid('model.name') }" 
                                id="input-1"
                                v-model="model.name"
                                type="text"
                                required
                                placeholder="Name"
                                ></b-form-input>
								
								<div class="invalid-feedback" v-if="formIsInvalid('model.name')" v-html="form.errorList['model.name']"></div>
                        </b-form-group>
                        
						<b-form-group
                                class="col-md-6 mb-3" 
                                id="input-group-1"
                                label="Base Price"
                                label-for="input-1"
                                    
                            >
                                <b-form-input
                                
                                id="input-1"
                                v-model="model.base_price"
								:class="{ 'is-invalid': formIsInvalid('model.base_price') }" 
                                type="text"
                                required
                                placeholder="Base Price"
                                >
								
								</b-form-input><div class="invalid-feedback" v-if="formIsInvalid('model.base_price')" v-html="form.errorList['model.base_price']"></div>
                        </b-form-group>
								
								
						<b-form-group
                                class="col-md-6 mb-3" 
                                id="input-group-1"
                                label="Discount Price"
                                label-for="input-1"
                                    
                            >
                                <b-form-input
                                
                                id="input-1"
                                v-model="model.discount_price"
                                type="text"
                                required
                                placeholder="Discount Price"
                                ></b-form-input>
								
                        </b-form-group>		
								
								
								
							<b-form-group
                                id="input-group-1"
                                label="Description"
                                label-for="input-1"
                                class="col-md-6" 
                            >
								
							<b-form-textarea
							id="textarea-small"
							
							v-model="model.description"
							size="sm"
							placeholder="Small textarea"
							>
							</b-form-textarea>
						 </b-form-group>	


											 
							

                         
                            <b-col md="12">
                                <b-button class="mt-3" type="button" variant="primary" v-on:click="addFood" >Submit</b-button>
                            </b-col>
                            
                        </b-row>
                    </b-form>
                </b-card>
            </b-col>


          

     

         
            
        </b-row>
    </div>
</template>
<script>
  import Form from '@/_common/mixins/form.js';
export default {
     metaInfo: {
    // if no subcomponents specify a metaInfo.title, this title will be used
    title: "Category Add"
  },
    data(){
        return{	
		
		 flag: {
                    modelState: 'UNMODIFIED'
                },
                observers: {},
		model: {
                    name:null,
                    description: null,
                    base_price: null
                },
		         
       
        }
    },	
	
	 mounted: function() {

            var thisComponent = this;

            thisComponent._setupListeners();

        },

	 methods: {
	   _setupListeners: function() {

                var thisComponent = this;
                
                    thisComponent._initComponent()
                 

            },
			 _setupObservers: function() {

							var thisComponent = this;

							//remove any existing watchers if present
							if (typeof(thisComponent.observers.unwatchModel) === 'function') {
								thisComponent.observers.unwatchModel();
							}

							//instantiate unwatcher for model observer
							thisComponent.observers.unwatchModel = thisComponent.$watch('model', {
								handler: function(newValue, oldValue) {
									thisComponent.flag.modelState = 'MODIFIED';
								},
								deep: true
							});

			},
			addFood: function () {
					
					var thisComponent = this;

					thisComponent.formPostModel('food')
						.then(function(response) {
						
						console.log('------------------------------------');
						console.log(response.data);
						console.log('------------------------------------');

							// Insert the ID of the newly created person to model
							thisComponent.model = response.data

						   thisComponent.$swal({
									position: "top-end",
									type: "success",
									title: "Your work has been saved",
									showConfirmButton: false,
									timer: 1500
								});

						})
						.catch( function(error) {
							console.log(error);
						});

				} ,// Blank all form fields
            _initComponent: function() {

                var thisComponent = this;

                //clone initial base model to working model
              //  thisComponent.model = _.cloneDeep(thisComponent.baseModel);

                //reset working model state to unmodified
                thisComponent.flag.modelState =  'UNMODIFIED';
				/// thisComponent._setupObservers();
            },

			
        },
		 mixins: [
            Form
        ]

		

}
</script>
