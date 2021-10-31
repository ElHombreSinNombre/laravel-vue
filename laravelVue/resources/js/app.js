/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');

//import VueSweetalert2 from 'vue-sweetalert2';

//Vue.use(VueSweetalert2);

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('cars-form-component', require('./components/cars/FormComponent.vue').default);
Vue.component('cars-table-component', require('./components/cars/TableComponent.vue').default);

Vue.component('people-form-component', require('./components/people/FormComponent.vue').default);
Vue.component('people-table-component', require('./components/people/TableComponent.vue').default);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    methods: {
        goBack: function () {}
    },
});