/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import BootstrapVue from "bootstrap-vue";
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('top-nav-component', require('./components/TopNav.vue').default);
Vue.component('management-top-component', require('./components/ManagementTopNav.vue').default);
Vue.component('left-sidebar-component', require('./components/LeftSidebar.vue').default);
Vue.component('management-component', require('./components/ManagementLeftSidebar.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
//import material-icon scss
import "font-awesome/css/font-awesome.min.css"; 
import "&/styles/sass/themes/lite-purple.scss";



Vue.use(BootstrapVue)

window.app = new Vue({
    el: '#app',
});
