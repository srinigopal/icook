<template>
    <div class="main-content">
       
        <b-row>
            <b-col md="12 mb-30">
                <b-card title="Create Restaurant">
                    
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
                                id="name"
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
                                label="Phone Number:"
                                label-for="input-1"
                               
                                
                            >
                                <b-form-input
                                :class="{ 'is-invalid': formIsInvalid('model.phone') }" 
                                id="input-1"
                                v-model="model.phone"
                                type="text"
                                required
                                placeholder="put your phone number"
                                ></b-form-input>
								<div class="invalid-feedback" v-if="formIsInvalid('model.phone')" v-html="form.errorList['model.phone']"></div>
                            </b-form-group>
                        <b-form-group
                                class="col-md-6 mb-3" 
                                id="input-group-1"
                                label="Mobile:"
                                label-for="input-1"
                               
                                
                            >
                                <b-form-input
                                
                                id="input-1"
                                v-model="model.mobile"
                                type="text"
                                required
                                placeholder="put your mobile"
                                ></b-form-input>
                            </b-form-group>

                            <b-form-group
                                id="input-group-1"
                                label="Address"
                                label-for="input-1"
                                class="col-md-6" 
                            >
                                <b-form-input
                            :class="{ 'is-invalid': formIsInvalid('model.address') }" 
                                id="input-1"
                                v-model="model.address"
                                type="text"
                                required
                                placeholder="Enter Address"
                                ></b-form-input>
								<div class="invalid-feedback" v-if="formIsInvalid('model.address')" v-html="form.errorList['model.address']"></div>
                            </b-form-group>
							
							
							
							 <b-form-group
                                id="input-group-1"
                                label="Latitude"
                                label-for="input-1"
                                class="col-md-6" 
                            >
                                <b-form-input
                            
                                id="input-1"
                                v-model="model.latitude"
                                type="text"
                                required
                                placeholder="Enter Latitude"
                                ></b-form-input>
                            </b-form-group>
							
							
							 <b-form-group
                                id="input-group-1"
                                label="Longitude"
                                label-for="input-1"
                                class="col-md-6" 
                            >
                                <b-form-input
                            
                                id="input-1"
                                v-model="model.longitude"
                                type="text"
                                required
                                placeholder="Enter Longitude"
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
							size="sm"
							 v-model="model.description"
							placeholder="Small textarea"
							>
							</b-form-textarea>
						 </b-form-group>	


<b-form-group
                                id="input-group-1"
                                label="Information"
                                label-for="input-1"
                                class="col-md-6" 
								 
                            >
								
							<b-form-textarea
							id="textarea-small"
							size="sm"
							v-model="model.information"
							placeholder="Small textarea"
							>
							</b-form-textarea>
						 </b-form-group>							 
							

                         
                         
                            <b-col md="12">
                                <b-button v-if="id" class="mt-3" type="button" variant="primary" v-on:click="updateOrganisation" >Update</b-button>
                                <b-button v-else class="mt-3" type="button" variant="primary" v-on:click="addOrganisation">Submit</b-button>
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
    title: "Organisation Add"
  },
    data(){
        return{	
		
		 flag: {
                    modelState: 'UNMODIFIED'
                },
                observers: {},
		 baseModel: {
                    name:null,
                    phone: null,
                    mobile: null,
                    address: null,
                    latitude: null,
                    longitude: null,
                    description: null,
                    information: null,
                    open_status: null,
                    status: null,
                },
			model: null            
       
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
			 updateOrganisation: function () {

                var thisComponent = this;

                thisComponent.formPatchModel('organisation/')
                    .then(function(response) {

                      thisComponent.model=response.data.data;

							 thisComponent.makeVariantToast('success','Organisation Updated Successfully')
                    })
                    .catch( function(error) {
                         thisComponent.makeVariantToast('danger','Something wrong in updaing Organisation')
                    });
                
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
			addOrganisation: function () {
					
					var thisComponent = this;

					thisComponent.formPostModel('organisation')
						.then(function(response) {
						
						console.log('------------------------------------');
						console.log(response.data);
						console.log('------------------------------------');

							// Insert the ID of the newly created person to model
						//	thisComponent.model = response.data;

						       thisComponent.makeVariantToast('success','Organisation Added Successfully')
						})
						
						.catch( function(error) {
						
							 thisComponent.makeVariantToast('danger','Something wrong in updaing organisation')
						});

				} ,// Blank all form fields
				
				getModel: function() {

				var thisComponent = this;

				thisComponent.flag.modelGetState = 'ATTEMPTING';

				var thisComponent = this;

				return thisComponent.formGetModel('organisation/' + thisComponent.id)
					.catch(function(error) {
						console.log(error);
					});

			},
            _initComponent: function() {

                var thisComponent = this;
 
                //clone initial base model to working model
                thisComponent.model = _.cloneDeep(thisComponent.baseModel);

                //reset working model state to unmodified
                thisComponent.flag.modelState =  'UNMODIFIED';
				// thisComponent._setupObservers();
				if(thisComponent.id)
				thisComponent.getModel();
            },
			makeVariantToast(variant = null,msg) {
				 var thisComponent = this;
				  thisComponent.$bvToast.toast(msg, {
					title: variant,
					variant: variant,
					solid: true
				  });
				},
			
        },
		 mixins: [
            Form
        ]
		,props: [
			'id'
		]

		

}
</script>
