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
                                id="input-1"
                                v-model="model.name"
                                type="text"
                                required
                                placeholder="Name"
                                ></b-form-input>
								<div class="invalid-feedback" v-if="formIsInvalid('model.name')" v-html="form.errorList['model.name']"></div>
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
                                <b-button v-if="id" class="mt-3" type="button" variant="primary" v-on:click="updateCategory" >Update</b-button>
                                <b-button v-else class="mt-3" type="button" variant="primary" v-on:click="addCategory">Submit</b-button>
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
		 baseModel: {
                    name:null,
                    description: null
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
			getModel: function() {
               
                var thisComponent = this;

                thisComponent.formGetModel('category/'+thisComponent.id)
                    .then(function(response) {                    
                     
                      

                    })
                    .catch(function(error) {
                        console.log(error);
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

			},// Blank all form fields
				updateCategory: function () {

					var thisComponent = this;

					thisComponent.formPatchModel('category')
						.then(function(response) {

						  thisComponent.model=response.data.data;

								 thisComponent.makeVariantToast('success','Category Updated Successfully')
						})
						.catch( function(error) {
							 thisComponent.makeVariantToast('danger','Something wrong in updaing categeory')
						});
					
				},
			addCategory: function () {
					
					var thisComponent = this;

					thisComponent.formPostModel('category')
						.then(function(response) {
						
						console.log('------------------------------------');
						console.log(response.data);
						console.log('------------------------------------');

							// Insert the ID of the newly created person to model
							thisComponent.model = response.data

						    thisComponent.makeVariantToast('success','Category Added Successfully')

						})
						.catch( function(error) {
							 thisComponent.makeVariantToast('danger','Something wrong in adding categeory')
						});

				} ,// Blank all form fields
            _initComponent: function() {

                var thisComponent = this;

                //clone initial base model to working model
                thisComponent.model = _.cloneDeep(thisComponent.baseModel);

                //reset working model state to unmodified
                thisComponent.flag.modelState =  'UNMODIFIED';
				 //thisComponent._setupObservers();
				 if(thisComponent.id){
						thisComponent.getModel();
					}
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
        ],
		props: [
			'id'
		]

		

}
</script>
