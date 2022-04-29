/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue'; // if this is not work add this =>  window.Vue = require('vue');

import axios from 'axios';
import VueAxios from 'vue-axios';
import Auth from './Auth.js';

Vue.prototype.auth = Auth;
Vue.use(VueAxios, axios);

import App from './app.vue';
import router from './routes';

const app = new Vue({
    el: '#app',
    router,
    render: h => h(App),
});
