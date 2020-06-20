<template>
<div id="modals">
       <modal-new-marriage></modal-new-marriage>
	   </div>
    <div class="main-content">
	
        <b-row>
            <b-col md="12 mb-30">
                <b-card title="">
                   
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
                                <b-button v-if="id" class="mt-3" type="button" variant="primary" v-on:click="updateCuisine" >Update</b-button>
                                <b-button v-else class="mt-3" type="button" variant="primary" v-on:click="addCuisine">Submit</b-button>
                            </b-col>					 
							
	
                         <button type="button" class="btn btn-link d-flex align-items-center" v-on:click="showModalNewMarriage">
									<small><i class="fal fa-plus mr-1"></i></small>
									<span>Add a marriage</span>
								</button>
                           
                            
                        </b-row>
                    </b-form>
                </b-card>
            </b-col>


          

     

         
            
        </b-row>
    </div>
</template>
<style>
.modal.right {
    padding-right: 0!important;
}
.modal.right .modal-dialog {
   
    margin: 0;
    border-radius: 0;
    margin-left: auto;
}
</style>
<script>
  import Form from '@/_common/mixins/form.js';
  import Modal from '@/_common/mixins/modal.js';
  import newMarriageModal from '@/_private/components/new';
export default {
components: {
			
			'modal-new-marriage': newMarriageModal
			
		},

     metaInfo: {
    // if no subcomponents specify a metaInfo.title, this title will be used
    title: "Category Add"
  },
    data(){
        return{	
		
		title:'Cuisine Add',
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
	 showModalNewMarriage: function() {

						var thisComponent = this;

						vueEventBus.$emit('prepare-modal-new-marriage', 1);

					}, 
	   _setupListeners: function() {

                var thisComponent = this;
                
                    thisComponent._initComponent()
                 vueEventBus.$on('prepared-modal-new-marriage', function() {
							showModal('modal-new-marriage', 'right');
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
			getModel: function() {
               
                var thisComponent = this;

                thisComponent.formGetModel('cuisine/'+thisComponent.id)
                    .then(function(response) {                    
                     
                      

                    })
                    .catch(function(error) {
                        console.log(error);
                    }); 
            },
			addCuisine: function () {
					
					var thisComponent = this;

					thisComponent.formPostModel('cuisine')
						.then(function(response) {
						
						console.log('------------------------------------');
						console.log(response.data);
						console.log('------------------------------------');

							// Insert the ID of the newly created person to model
							thisComponent.model = response.data

						    thisComponent.makeVariantToast('success','Cuisine Updated Successfully')
						})
						.catch( function(error) {
							thisComponent.makeVariantToast('danger','Something wrong in updaing Cuisine')
						});

				} ,// Blank all form fields
				updateCuisine: function () {

					var thisComponent = this;

					thisComponent.formPatchModel('cuisine')
						.then(function(response) {

						  thisComponent.model=response.data.data;

								thisComponent.makeVariantToast('success','Cuisine Added Successfully')
						})
						.catch( function(error) {
							 thisComponent.makeVariantToast('danger','Something wrong in updaing Cuisine')
						});
					
				},
				_initComponent: function() {
					var thisComponent = this;
					//clone initial base model to working model
					thisComponent.model = _.cloneDeep(thisComponent.baseModel);

					//reset working model state to unmodified
					thisComponent.flag.modelState =  'UNMODIFIED';
					// thisComponent._setupObservers();
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
            Form, Modal
        ],
		props: [
			'id'
		]

		

}
</script>
