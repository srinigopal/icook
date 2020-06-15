<template>
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
                                class="col-md-6 mb-3" 
                                id="input-group-1"
                                label="Base Price"
                                label-for="input-1"
                                    
                            >
                                <b-form-input
                                
                                id="input-1"
                                v-model="model.base_price"
								:class="{ 'is-invalid': formIsInvalid('model.base_price') }" 
                                type="number"
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
                                type="number"
                                required
                                placeholder="Discount Price"
                                ></b-form-input>
								
                        </b-form-group>		
								
							<b-form-group
                                class="col-md-6 mb-3" 
                                id="input-group-1"
                                label="Unit"
                                label-for="input-1"
                                    
                            >
                                <b-form-input
                                
                                id="input-1"
                                v-model="model.unit"
                                type="number"
                                required
                                placeholder="Unit"
                                ></b-form-input>
								
                        </b-form-group>						
						<b-form-group
                                class="col-md-6 mb-3" 
                                id="input-group-1"
                                label="Package Item Count"
                                label-for="input-1"
                                    
                            >
                                <b-form-input
                                
                                id="input-1"
                                v-model="model.package_items_count"
                                type="number"
                                required
                                placeholder="Package Item Count"
                                ></b-form-input>
								
                        </b-form-group>		
						
						<b-form-group
                                class="col-md-6 mb-3" 
                                id="input-group-1"
                                label="Weight"
                                label-for="input-1"
                                    
                            >
                                <b-form-input
                                
                                id="input-1"
                                v-model="model.weight"
                                type="number"
                                required
                                placeholder="Weight"
                                ></b-form-input>
								
                        </b-form-group>		
								
								
							<b-form-group
                                class="col-md-6 mb-3" 
                                id="input-group-1"
                                label="Featured"
                                label-for="input-1"
                                    
                            >
                                <b-form-checkbox
								  id="featured"
								  v-model="model.featured"
								  name="featured"
								  value="1"
								  unchecked-value="0"
								>
								 Featured
								</b-form-checkbox>
								
                        </b-form-group>			
						
						
						<b-form-group
                                class="col-md-6 mb-3" 
                                id="input-group-1"
                                label="Deliverable food"
                                label-for="input-1"
                                    
                            >
                                <b-form-checkbox
								  id="deliverable"
								   v-model="model.deliverable"
								  name="deliverable"
								  value="1"
								  unchecked-value="0"
								>
								 Deliverable food
								</b-form-checkbox>
								
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
											 
							     <vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions" @vdropzone-complete="afterComplete"></vue-dropzone>
<br/>
                            <div class="input-group">
          <span class="input-group-btn" v-on:click="getImgaes">
            <a id="lfm"  class="btn btn-primary text-white">
              <i class="fa fa-picture-o"></i> From Gallery
            </a>
          </span>
          <input id="thumbnail" class="form-control" type="text" name="filepath">
        </div>
                     <div id="holder" style="margin-top:15px;max-height:100px;"></div>    				 
											 
							 </b-col>				 
							
							<b-col md="12">
                                <b-button v-if="id" class="mt-3" type="button" variant="primary" v-on:click="updateFood" >Update</b-button>
                                <b-button v-else class="mt-3" type="button" variant="primary" v-on:click="addFood">Submit</b-button>
                            </b-col>					 
							
	
                        
                        </b-row>
                    </b-form>
                </b-card>
            </b-col>


          

     <div id="alerts"></div>

         
            
        </b-row>
    </div>
</template>
<script>
  import Form from '@/_common/mixins/form.js';
  import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'

export default {
     metaInfo: {
    // if no subcomponents specify a metaInfo.title, this title will be used
    title: "Category Add"
  },components: {
    vueDropzone: vue2Dropzone
  },
    data(){
        return{	
		dropzoneOptions: {
          url: 'http://127.0.0.1:8000/laravel-filemanager/upload',
          thumbnailWidth: 150,
         // maxFilesize: 0.5,
		  paramName:'upload',
          headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
      },
		 flag: {
                    modelState: 'UNMODIFIED'
                },
                observers: {},
				
		baseModel: {
                    name:null,
                    description: null,
                    base_price: null,
                    discount_price: null,
                    unit: null,
                    package_items_count: null,
                    weight: null,
                    featured: 0,
                    deliverable: 0,
                },
				model:null,
		         
       
        }
    },	
	
	 mounted: function() {

            var thisComponent = this;

            thisComponent._setupListeners();

        },

	 methods: {
	 afterComplete(file) {
      console.log(file.upload.filename);
      console.log(file.xhr.response);
	  
	var response=file.xhr.response;
	  const obj = JSON.parse(response);
	  
	  if(obj.error){
	  
	   $('#alerts').append(
          $('<div>').addClass('alert alert-warning')
            .append($('<i>').addClass('fas fa-exclamation-circle'))
            .append(' ' + obj.error.message)
        );
	  console.log();
	  }else{
	  console.log(obj.url);
	  }

	  
    },
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
			getModel: function() {
               
                var thisComponent = this;

                thisComponent.formGetModel('food/'+thisComponent.id)
                    .then(function(response) {                    
                     
                      

                    })
                    .catch(function(error) {
                        console.log(error);
                    }); 
            },
				updateFood: function () {

					var thisComponent = this;

					thisComponent.formPatchModel('food')
						.then(function(response) {

						  thisComponent.model=response.data.data;

								thisComponent.makeVariantToast('success','Food Menu Updated Successfully')
						})
						.catch( function(error) {
							 thisComponent.makeVariantToast('danger','Something wrong in updaing food menu')
						});
					
				},
				getImgaes: function () {

				var route_prefix = "/filemanager";
				$('#lfm').filemanager('image', {prefix: route_prefix});


					
					
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

						  thisComponent.makeVariantToast('success','Food Menu Added Successfully')

						})
						.catch( function(error) {
							thisComponent.makeVariantToast('danger','Something wrong in updaing food menu')
						});

				} ,// Blank all form fields
            _initComponent: function() {

                var thisComponent = this;

                //clone initial base model to working model
                thisComponent.model = _.cloneDeep(thisComponent.baseModel);

                //reset working model state to unmodified
                thisComponent.flag.modelState =  'UNMODIFIED';
				if(thisComponent.id){
				
				
						thisComponent.getModel();
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
		 mixins: [
            Form
        ],
		props: [
			'id'
		]


		

}
</script>
