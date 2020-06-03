// import Vue
    window.Vue = require('vue');

    if (process.env.MIX_ENV === 'production') {

        Vue.config.devtools = false;
        Vue.config.debug = false;
        Vue.config.silent = true;

    } else {

        Vue.config.productionTip = false;

    }

// main global mixin - mostly helpers
    Vue.mixin({

        computed: {

            // config

                attemptingConfig: function() {

                    //will only do actual config attempt when user is logged in, so let's return false for non-authed areas
                    if (authIsLoggedIn) {
                        return vueStore.state.configGetState != 'SUCCESS';
                    } else {
                        return false;
                    }

                },

            // route

                currentRoute: function() {
                    if (vueStore.state.route) {
                        return vueStore.state.route;
                    }
                },

            // user

                isAdmin: function() {
                    if (vueStore.state.user) {
                        var hasAdminRole = vueStore.state.user.roles.find(function(element) {
                            return element == 'admin';
                        });

                        return typeof(hasAdminRole) != 'undefined';
                    }
                },

                isLoggedIn: function() {
                    if (vueStore.state.user) {
                        return vueStore.state.auth.isLoggedIn;
                    }
                },

                userEmail: function() {
                    if (vueStore.state.user) {
                        return vueStore.state.user.email;
                    }
                },

                userInitials: function() {
                    if (vueStore.state.user) {
                        return (vueStore.state.user.name.first + ' ' + vueStore.state.user.name.last).getInitials();
                    }
                },

                userName: function() {
                    if (vueStore.state.user) {
                        return vueStore.state.user.name.first + ' ' + vueStore.state.user.name.last;
                    }
                },

            
        },

        methods: {

            // vue

                // https://jasonwatmore.com/post/2018/09/10/vuejs-set-get-delete-reactive-nested-object-properties
                deleteProp: function(obj, props) {

                    const prop = props.shift();

                    if (! obj[prop]) {
                        return;
                    }

                    if (! props.length) {

                        Vue.delete(obj, prop);

                        return;

                    }
                    
                    this.deleteProp(obj[prop], props);

                },

                // https://jasonwatmore.com/post/2018/09/10/vuejs-set-get-delete-reactive-nested-object-properties
                getProp: function(obj, props) {

                    const prop = props.shift();

                    if (! obj[prop] || ! props.length) {
                        return obj[prop]
                    }

                    return this.getProp(obj[prop], props);

                },

                // https://jasonwatmore.com/post/2018/09/10/vuejs-set-get-delete-reactive-nested-object-properties
                setProp: function(obj, props, value) {

                    const prop = props.shift();

                    if (! obj[prop]) {
                        Vue.set(obj, prop, {})
                    }

                    if (! props.length) {

                        if (value && typeof value === 'object' && ! Array.isArray(value)) {
                      
                            obj[prop] = { ...obj[prop], ...value }

                        } else {

                            obj[prop] = value;

                        }

                        return;

                    }

                    this.setProp(obj[prop], props, value);

                }

        }

    });

// add Vuex store
    import Vuex from 'vuex';
	
    Vue.use(Vuex);
	//window.localStorage.clear();


    window.vueStore = new Vuex.Store({
        state: {
            auth: {
                isLoggedIn: false
            },
            configGetState: 'NO_ATTEMPT',
            route: null,
            user: null,
			
        },
        mutations: {
            authIsLoggedIn: function(state, payload) {
                state.auth.isLoggedIn = payload;
            },
            configGetState: function(state, payload) {
                state.configGetState = payload;
            },
            route: function(state, payload) {
                state.route = payload;
            },
            user: function(state, payload) {
                state.user = payload;
            }
        },
        actions: {
            getConfig(context) {

                //update config get state
                vueStore.commit('configGetState', 'ATTEMPTING');

                //get config
                axios.get('/api/config')
                    .then(function(response) {

                        vueStore.commit('configGetState', 'SUCCESS'); //update config get state

                        vueStore.commit('user', response.data.user ? response.data.user : null); //mutate user state

                    })
                    .catch(function(response) {
                        vueStore.commit('configGetState', 'FAILED'); //TODO - redirect to some error page
                    });

            }
        }
    });

    //window.authIsLoggedIn - set depending on whether we have an api_token META key
    if (authIsLoggedIn) {

        vueStore.commit('authIsLoggedIn', true);

        //set initial config for vueStore
        vueStore.dispatch('getConfig');
        
    } else {

        vueStore.commit('authIsLoggedIn', false);

    }

    //route - can't find a better way to do this right now...
    let currentRoute = document.head.querySelector('meta[name="cur-rte"]');

    if (currentRoute) {
        vueStore.commit('route', (typeof(currentRoute) != 'undefined') ? currentRoute.content : null);
    }


require('./_admin/scripts/bootstrap');
require('./components/bootstrap');
Vue.component('example-component', require('./components/ExampleComponent.vue').default);


Vue.component('top-nav-component', require('./components/TopNav.vue').default);
Vue.component('left-sidebar-component', require('./components/LeftSidebar.vue').default);

Vue.component('management-top-nav-component', require('./components/ManagementTopNav.vue').default);
Vue.component('management-left-sidebar-component', require('./components/ManagementLeftSidebar.vue').default);

Vue.component('breadcrumb-component', require('./components/Breadcrumb.vue').default);
import BootstrapVue from "bootstrap-vue";
import VueGoodTablePlugin from 'vue-good-table';

// import the styles
import 'vue-good-table/dist/vue-good-table.css'

Vue.use(VueGoodTablePlugin);


Vue.use(BootstrapVue)
const app = new Vue({
    el: '#app',
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 //setup global event bus 
    window.vueEventBus = new Vue();
//import material-icon scss
import "font-awesome/css/font-awesome.min.css"; 
import "&/styles/sass/themes/lite-purple.scss";