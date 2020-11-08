/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faArrowDown } from '@fortawesome/free-solid-svg-icons';

import VueSlideToggle from 'vue-slide-toggle';


require('./bootstrap');

library.add(faArrowDown);

window.Vue = require('vue');
window.axios = require('axios');
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.use(VueSlideToggle);
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('font-awesome-icon', FontAwesomeIcon);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('expert-component',require('./components/ExpertComponent.vue').default);
Vue.component('experts-component',require('./components/ExpertsComponent.vue').default);
Vue.component('booking-component',require('./components/BookingComponent.vue').default);
Vue.component('app',require('./components/AppComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// needsimport VueRouter from 'vue-router';
// import Show from './components/ShowExpertComponent'
// Vue.use(VueRouter);
//
// const router = new VueRouter({ mode: 'history', routes: routes });
//
// const app = new Vue({
//     el: '#app',
//     router
// });



const booking = new Vue({
    el: '#booking-app',
});


