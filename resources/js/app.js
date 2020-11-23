/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faArrowDown } from '@fortawesome/free-solid-svg-icons';

import VueSlideToggle from 'vue-slide-toggle';
import App from './components/AppComponent';

import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';
import VueAxios from 'vue-axios';
import Dashboard from './components/Dashboard.vue';
import Home from './components/HomeComponent';
import Register from './components/Register.vue';
import Login from './components/Login.vue';
import auth from './auth'
import VueAuth from '@websanova/vue-auth'
import Experts from './components/ExpertsComponent';



library.add(faArrowDown);
window.Vue = require('vue');
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('font-awesome-icon', FontAwesomeIcon);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('expert-component',require('./components/ExpertComponent.vue').default);
Vue.component('experts-component',require('./components/ExpertsComponent.vue').default);
Vue.component('booking-component',require('./components/BookingComponent.vue').default);
// Vue.component('app',require('./components/AppComponent.vue').default);




Vue.use(VueSlideToggle);


axios.defaults.baseURL = 'http://localhost:8000/api';
const router = new VueRouter({
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,

        },{
            path: '/register',
            name: 'register',
            component: Register,
            meta: {
                auth: false
            }
        }, {
            path: '/login',
            name: 'login',
            component: Login,
            meta: {
                auth: false
            },
        },{
            path: '/dashboard',
            name: 'dashboard',
            component: Dashboard,
            meta: {
                auth: true
            },
        }, {
            path: '/experts',
            name: 'experts',
            component: Experts,
            meta: {
                auth: true
            },
        }

    ]
});
Vue.router = router;
Vue.use(VueRouter);

Vue.use(VueAxios, axios);
App.router = Vue.router;
Vue.use(VueAuth, auth);

const app = new Vue({
    el: '#app',
    router:router,
    render: app => app(App)
});


