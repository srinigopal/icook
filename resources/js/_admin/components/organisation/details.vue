<template>
  <div class="main-content">
    
    <b-card>
      <vue-good-table
        :columns="columns"
        :line-numbers="false"
        :search-options="{
          enabled: true,
          placeholder: 'Search this table'
        }"
        :pagination-options="{
          enabled: true,
          mode: 'records'
        }"
        styleClass="tableOne vgt-table"
        :rows="rows"
      >
        <div slot="table-actions" class="mb-3">
          <b-button variant="primary" class="btn-rounded d-none d-sm-block" v-b-modal.modal-1
            ><i class="i-Add-User text-white mr-2"> </i>Add Restaurants
          </b-button>

          <b-modal id="modal-1" title="BootstrapVue">
            <b-form>
              <b-form-group
                id="input-group-1"
                label="Email address:"
                label-for="input-1"
                description="We'll never share your email with anyone else."
              >
                <b-form-input
                  id="input-1"
                  type="email"
                  required
                  placeholder="Enter email"
                ></b-form-input>
              </b-form-group>

              <b-form-group
                id="input-group-2"
                label="Your Name:"
                label-for="input-2"
              >
                <b-form-input
                  id="input-2"
                  required
                  placeholder="Enter name"
                ></b-form-input>
              </b-form-group>

              <b-form-group
                id="input-group-3"
                label="Food:"
                label-for="input-3"
              >
                <b-form-select
                  id="input-3"
                  :options="foods"
                  required
                ></b-form-select>
              </b-form-group>

              <b-form-group id="input-group-4">
                <b-form-checkbox-group id="checkboxes-4">
                  <b-form-checkbox value="me">Check me out</b-form-checkbox>
                  <b-form-checkbox value="that">Check that out</b-form-checkbox>
                </b-form-checkbox-group>
              </b-form-group>
            </b-form>
          </b-modal>
        </div>

        <template slot="table-row" slot-scope="props">
          <span v-if="props.column.field == 'button'">
            <a href="/admin/organisation/edit/01a6a404-92ab-4c7c-abdd-3e11bd2b85c8">
              <i class="i-Eraser-2 text-25 text-success mr-2"></i>
              {{ props.row.button }}</a
            >
            <a href="">
              <i class="i-Close-Window text-25 text-danger"></i>
              {{ props.row.button }}</a
            >
          </span>
          <span v-else-if="props.column.field == 'name'">
            <a href="">
              <div class="ul-widget-app__profile-pic">
                <img
                  class="profile-picture avatar-sm mb-2 rounded-circle img-fluid"
                  :src="props.row.avatar"
                  alt=""
                />
                {{ props.row.name }}
              </div>
            </a>
          </span>
        </template>
      </vue-good-table>
    </b-card>
  </div>
</template>

<script>

//mixins
    import Form from '@/_common/mixins/form.js';
export default {
  metaInfo: {
    // if no subcomponents specify a metaInfo.title, this title will be used
    title: "Task Manager"
  },
  data() {
    return {
      foods: ["apple", "orrange"],
      columns: [
        {
          label: "Name",
          field: "name"
        },
        {
          label: "Description",
          field: "description"
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
    };
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
			 getModel: function () {

                var thisComponent = this;

                //get config
                axios.get('/api/organisation')
                    .then(function(response) {

                 thisComponent.rows = response.data.data;


                    })
                    .catch(function(response) {
                        vueStore.commit('configGetState', 'FAILED'); //TODO - redirect to some error page
                    })

            },
            _initComponent: function() {

                var thisComponent = this;

                
                thisComponent.getModel();
            },

			
        },
  mounted: function() {
            this._initComponent();
        },
		mixins: [
            Form
        ]

		
};
</script>
<style >
</style>
