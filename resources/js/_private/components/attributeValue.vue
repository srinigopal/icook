<template>
    <div>
	
        <div class="modal" id="modal-new-attributevalue" tabindex="-1" role="dialog">
            <div class="modal-dialog animated fastest" role="document">
                <div class="modal-content">

                    <div class="modal-header px-2 py-1 bg-primary align-items-center">
                        <div class="text-white font-weight-light">New Attributes</div>
                        <button type="button" class="btn btn-link ml-auto text-white p-2" data-dismiss="modal" aria-label="Close">
                            <i class="fal fa-times"></i>
                        </button>
                    </div>

                    <div class="modal-body d-flex flex-column align-items-center">

                        <div class="container">

                            <div class="row">
                                <div class="col-12 mb-2 border-bottom">
                                    <div class="text-muted">Attributes</div>
                                </div>
                            </div>

                      
                    <b-form>
                        <b-row>

                        <b-form-group
                                class="col-md-6 mb-3" 
                                id="input-group-1"
                                label="Value"
                                label-for="input-1"
                                    
                            >
                                <b-form-input
                                :class="{ 'is-invalid': formIsInvalid('model.value') }" 
                                id="input-1"
                                v-model="model.value"
                                type="text"
                                required
                                placeholder="Value"
                                ></b-form-input>
								<div class="invalid-feedback" v-if="formIsInvalid('model.value')" v-html="form.errorList['model.value']"></div>
                        </b-form-group>
                        
                
								
							 <b-form-group
                                class="col-md-6 mb-3" 
                                id="input-group-1"
                                label="Price"
                                label-for="input-1"
                                    
                            >
                                <b-form-input
                                :class="{ 'is-invalid': formIsInvalid('model.price') }" 
                                id="input-1"
                                v-model="model.price"
                                type="text"
                                required
                                placeholder="Price"
                                ></b-form-input>
								<div class="invalid-feedback" v-if="formIsInvalid('model.price')" v-html="form.errorList['model.price']"></div>
                        </b-form-group>
						
						
						
						
						
                        
						

						   				 
							
	
                         
                           
                            
                        </b-row>
                    </b-form>

                          
                        </div>

                    </div>

                    <div class="modal-footer">
					
								<b-button v-if="id" class="mt-3" type="button" variant="primary" v-on:click="updateAttributeValue" >Update</b-button>
                                <b-button v-else class="mt-3" type="button" variant="primary" v-on:click="addAttributeValue">Submit</b-button>
                        <button type="button" class="btn btn-secondary min-width-100" data-dismiss="modal">Cancel</button>
                        
                    </div>

                </div>
            </div>
        </div>

    </div>

</template>
<style>
.modal-content{
min-height: 100vh;
}
</style>
<script>

    import Form from '@/_common/mixins/form';
	  import Modal from '@/_common/mixins/modal.js';
	
 
    export default {

      

        created: function () {

            var thisComponent = this;

            thisComponent.model = _.cloneDeep(thisComponent.baseModel);

            // thisComponent._setupHandlers();

            thisComponent._setupListeners();

        },

        data: function () {

            var thisComponent = this;

            return {
                flag: {
                    postingModel: null
                },
                model: null,
                id: null,
                baseModel: {
                    attribute_id: null,
                    value: null,
                    price: null
                   
                }
            }
        },

        methods: {

            _setupHandlers: function () {
                // TODO: Handle navigating away without saving changes
            },
	
            _setupListeners: function () {


                var thisComponent = this;
				thisComponent._initComponent()
             
                 vueEventBus.$on('prepare-modal-new-attributevalue', function(attribute_id,id) {

                    thisComponent.model = _.cloneDeep(thisComponent.baseModel);
                    
                    thisComponent.id = id;
                    thisComponent.model.attribute_id = attribute_id;
					 if(thisComponent.id)
						thisComponent.getModel(id);
                    vueEventBus.$emit('prepared-modal-new-attributevalue');

                });
				
				
				vueEventBus.$on('prepare-modal-edit-attributevalue', function(clientId) {

                    thisComponent.model = _.cloneDeep(thisComponent.baseModel);
                    
                   alert(clientId);
                    thisComponent.id = clientId;
                    thisComponent.model.attribute_id = clientId;
						//thisComponent.getModel(clientId);
                    vueEventBus.$emit('prepared-modal-new-attributevalue');

                });
            },

            addAttributeValue: function () {
					
					var thisComponent = this;

					thisComponent.formPostModel('attributevalue')
						.then(function(response) {
						
						console.log('------------------------------------');
						console.log(response.data);
						console.log('------------------------------------');

							// Insert the ID of the newly created person to model
							thisComponent.model = response.data.data
							
										vueEventBus.$emit('added-new-attributevalue', thisComponent.model);
										
										
						    thisComponent.makeVariantToast('success','Attribute Updated Successfully')
						})
						.catch( function(error) {
							thisComponent.makeVariantToast('danger','Something wrong in updaing Attribute')
						});

				} ,// Blank all form fields
				updateAttributeValue: function () {

					var thisComponent = this;

					thisComponent.formPatchModel('attributevalue')
						.then(function(response) {

						  thisComponent.model=response.data.data;

								thisComponent.makeVariantToast('success','Attribute Added Successfully')
						})
						.catch( function(error) {
							 thisComponent.makeVariantToast('danger','Something wrong in updaing Attribute')
						});
					
				},
		   getModel: function() {
               
                var thisComponent = this;

                thisComponent.formGetModel('attributevalue/'+thisComponent.id)
                    .then(function(response) {                    
                     
                       thisComponent.rows = response.data.data;

                    })
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
				if(thisComponent.id){
				
				
						//thisComponent.getModel();
					}
            },makeVariantToast(variant = null,msg) {
				 var thisComponent = this;
				  thisComponent.$bvToast.toast(msg, {
					title: variant,
					variant: variant,
					solid: true
				  });
			},
				

        },

        computed: {

            

           
            
        },

        mixins: [
            Form
        ],

        props: [
		
        ]
 

    }

</script>
