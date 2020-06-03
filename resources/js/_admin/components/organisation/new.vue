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
                                
                                id="input-1"
                                v-model="form.fName"
                                type="text"
                                required
                                placeholder="Name"
                                ></b-form-input>
                        </b-form-group>
                        
                      <b-form-group
                                class="col-md-6 mb-3" 
                                id="input-group-1"
                                label="Phone Number:"
                                label-for="input-1"
                               
                                
                            >
                                <b-form-input
                                
                                id="input-1"
                                v-model="form.phone"
                                type="text"
                                required
                                placeholder="put your phone number"
                                ></b-form-input>
                            </b-form-group>
                        <b-form-group
                                class="col-md-6 mb-3" 
                                id="input-group-1"
                                label="Mobile:"
                                label-for="input-1"
                               
                                
                            >
                                <b-form-input
                                
                                id="input-1"
                                v-model="form.mobile"
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
                            
                                id="input-1"
                                v-model="form.address"
                                type="text"
                                required
                                placeholder="Enter Address"
                                ></b-form-input>
                            </b-form-group>
							
							
							
							 <b-form-group
                                id="input-group-1"
                                label="Latitude"
                                label-for="input-1"
                                class="col-md-6" 
                            >
                                <b-form-input
                            
                                id="input-1"
                                v-model="form.latitude"
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
                                v-model="form.longitude"
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
							placeholder="Small textarea"
							>
							</b-form-textarea>
						 </b-form-group>							 
							

                         
                            <b-col md="12">
                                <b-button class="mt-3" type="submit" variant="primary">Submit</b-button>
                            </b-col>
                            
                        </b-row>
                    </b-form>
                </b-card>
            </b-col>


          

     

         
            
        </b-row>
    </div>
</template>
<script>

export default {
     metaInfo: {
    // if no subcomponents specify a metaInfo.title, this title will be used
    title: "Basic Forms"
  },
    data(){
        return{
            date:new Date(),
            form:{
                name:'',
                email:'',
                fName:'',
                lName:'',
                phone:''
            },
            selected: 'first',
        options: [
          { text: 'First radio', value: 'first' },
          { text: 'Second radio', value: 'second' },
          { text: 'Third radio', value: 'third' }
        ]
        };
    }
}
</script>
