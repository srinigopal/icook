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
         <a href="/management/organisation/add"> <b-button variant="primary" class="btn-rounded d-none d-sm-block" v-b-modal.modal-1
            ><i class="i-Add-User text-white mr-2"> </i>Add Restaurants
          </b-button>
</a>

        </div>

        <template slot="table-row" slot-scope="props">
          <span v-if="props.column.field == 'button'">
            <a :href="'/management/organisation/edit/' + props.row.id"  >
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
