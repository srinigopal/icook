<template>
    <div>  <modal-new-attributevalue></modal-new-attributevalue>
        <div class="modal" id="modal-new-attribute" tabindex="-1" role="dialog">
            <div class="modal-dialog animated fastest" role="document">
                <div class="modal-content">

                    <div class="modal-header px-2 py-1 bg-primary align-items-center">
                        <div class="text-white font-weight-light">New Add On</div>
                        <button type="button" class="btn btn-link ml-auto text-white p-2" data-dismiss="modal" aria-label="Close">
                            <i class="fal fa-times"></i>
                        </button>
                    </div>

                    <div class="modal-body d-flex flex-column align-items-center">

                        <div class="container">

                            <div class="row">
                                <div class="col-12 mb-2 border-bottom">
                                    <div class="text-muted">Add On</div>
                                </div>
                            </div>

                      
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
                                label="Code"
                                label-for="input-1"
                                    
                            >
                                <b-form-input
                                :class="{ 'is-invalid': formIsInvalid('model.code') }" 
                                id="input-1"
                                v-model="model.code"
                                type="text"
                                required
                                placeholder="Code"
                                ></b-form-input>
								<div class="invalid-feedback" v-if="formIsInvalid('model.code')" v-html="form.errorList['model.code']"></div>
                        </b-form-group>
						
						
						
						
						 <b-form-group
                                class="col-md-6 mb-3" 
                                id="input-group-1"
                                label="Options"
                                label-for="input-1"
                                    
                            >
                                   <b-form-select v-model="model.frontend_type" :options="options"></b-form-select>

								<div class="invalid-feedback" v-if="formIsInvalid('model.frontend_type')" v-html="form.errorList['model.frontend_type']"></div>
                        </b-form-group>
						
                        
						 <b-form-group
                                class="col-md-6 mb-3" 
                                id="input-group-1"
                                label="Required"
                                label-for="input-1"
                                    
                            >
                                   <b-form-select v-model="model.is_required" :options="requiredOptions"></b-form-select>

								<div class="invalid-feedback" v-if="formIsInvalid('model.is_required')" v-html="form.errorList['model.is_required']"></div>
                        </b-form-group>

						  
							
							
							<b-col md="12" v-if="id">	 
							<button type="button" class="btn btn-link d-flex align-items-center" v-on:click="showModalNewAttributeValue(model.id,'')">
									<small><i class="fal fa-plus mr-1"></i></small>
									<span>Add a attribute</span>
								</button>
							
							
							
		  <vue-good-table
				:columns="columns"
				:line-numbers="false"
				:search-options="{
				  enabled: true,
				  placeholder: 'Search this table'
				}"
				:pagination-options="{
				  enabled: false,
				  mode: 'records'
				}"
				styleClass="tableOne vgt-table"
				:rows="rows"
		>
      

        <template slot="table-row" slot-scope="props">
		
			
						
          <span v-if="props.column.field == 'button'">
		  
            <a href="#" v-on:click="showModalEditAttributeValue(model.id,props.row.id)"  >
              <i class="i-Eraser-2 text-25 text-success mr-2"></i>
              {{ props.row.button }}</a
            >
            <a href="">
              <i class="i-Close-Window text-25 text-danger"></i>
              {{ props.row.button }}</a
            >
          </span>
		   
			
         
        </template>
      </vue-good-table>
							 </b-col>		
							
							
							
	
                         
                           
                            
                        </b-row>
                    </b-form>

                          
                        </div>

                    </div>

                    <div class="modal-footer">
					           <b-button v-if="id" class="mt-3" type="button" variant="primary" v-on:click="updateAttribute" >Update</b-button>
                                <b-button  v-else class="mt-3" type="button" variant="primary" v-on:click="addAttribute">Submit</b-button>
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
import newAttributeValueModal from '@/_private/components/attributeValue.vue';

 
    export default {

       components: {
			
			'modal-new-attributevalue': newAttributeValueModal
			
		},

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
				requiredOptions: [
					
					  { value: 1, text: 'Yes' },
					  { value: 0, text: 'No' },					  
					],
				 options: [
					
					  { value: 'checkbox', text: 'Multiple Selection' },
					  { value: 'radio', text: 'Single Selection' },					  
					],
                   	id:null,
                model: null,
                baseModel: {
                    id: null,
                    code: null,
                    name: null,
                    is_required: null,
                    food_id: null,
                    frontend_type: null,
                   
                   
                },
				columns: [
				{
				  label: "Value",
				  field: "value"
				},
				{
				  label: "Price",
				  field: "price"
				},
				
				{
				  label: "Button",
				  field: "button",
				  html: true,
				  tdClass: "text-right",
				  thClass: "text-right"
				}
			  ],
			  rows: [  ]
            }
        },

        methods: {

            _setupHandlers: function () {
                // TODO: Handle navigating away without saving changes
            },
			
			showModalNewAttributeValue(attribute_id,id) {

						var thisComponent = this;

						vueEventBus.$emit('prepare-modal-new-attributevalue', attribute_id,id);

			}, showModalEditAttributeValue(attribute_id,id) {

						var thisComponent = this;

						vueEventBus.$emit('prepare-modal-new-attributevalue', attribute_id,id);

			}, 
            _setupListeners: function () {


                var thisComponent = this;

					vueEventBus.$on('prepared-modal-new-attributevalue', function() {
						
						
							showModal('modal-new-attributevalue', 'right');
						});
                vueEventBus.$on('prepare-modal-new-attribute', function(food_id,id) {

                    thisComponent.model = _.cloneDeep(thisComponent.baseModel);
                    
                  
                    thisComponent.id = id;
                    thisComponent.model.food_id = food_id;
					if(id)
						thisComponent.getModel(id);
                    vueEventBus.$emit('prepared-modal-new-attribute');

                });
				
				 vueEventBus.$on('added-new-attributevalue', function (packageModel) {
					thisComponent.modelAddPackage(packageModel);	
                });
				
				 				thisComponent._initComponent()

            },
			
				modelAddPackage: function(packageModel) {
				
				

				var thisComponent = this;

				try {

					thisComponent.rows.push(packageModel);

					thisComponent.$forceUpdate();
					
				} catch(e) {

                    return notice.failure('Unable to update list of packages');

				}
				
				//hideModal('modal-new-package');

            },

            addAttribute: function () {
					
					var thisComponent = this;

					thisComponent.formPostModel('attribute')
						.then(function(response) {
						
						console.log('------------------------------------');
						console.log(response.data);
						console.log('------------------------------------');

							// Insert the ID of the newly created person to model
							thisComponent.model = response.data

						    thisComponent.makeVariantToast('success','attribute Updated Successfully')
							
						})
						.catch( function(error) {
							thisComponent.makeVariantToast('danger','Something wrong in updaing attribute')
						});

			} ,// Blank all form fields
			updateAttribute: function () {

					var thisComponent = this;

					thisComponent.formPatchModel('attribute')
						.then(function(response) {

						  thisComponent.model=response.data.data;

								thisComponent.makeVariantToast('success','Attribute Added Successfully')
						})
						.catch( function(error) {
							 thisComponent.makeVariantToast('danger','Something wrong in updaing Attribute')
						});
					
			},
				
			getModel: function(clientId) {
               
                var thisComponent = this;

                thisComponent.formGetModel('attribute/'+clientId)
                    .then(function(response) {                    
                     
                       thisComponent.rows = response.data.data.attributevalues;

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

        
 

    }

</script>
