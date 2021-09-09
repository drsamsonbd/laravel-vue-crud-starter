/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// Import user class
import User from './Helpers/User';
window.User = User

window.Vue = require('vue');
import moment from 'moment';

import { Form, HasError, AlertError } from 'vform';
window.Form = Form;

import Gate from "./Gate";
Vue.prototype.$gate = new Gate(window.user);

import Swal from 'sweetalert2';



const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })
window.Swal = Swal;
window.Toast = Toast;

import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '3px'
  });

  require('chart.js');

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)


 // Import Notification Class
 import Notification from './Helpers/Notification';
 window.Notification = Notification


/**
 * Routes imports and assigning
 */
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import {routes} from './routes';

const router = new VueRouter({
    mode: 'history',
    routes
});
// Routes End

import Vue from 'vue'
import { BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue'

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'


// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
// Vue.use(IconsPlugin)
window.Vue = require('vue').default;

// import header
Vue.component('container', require('./components/nav/TheContainer').default);
Vue.component('vue-navbar', require('./components/nav/TheSideBar').default);
Vue.component('vue-footer', require('./components/nav/TheFooter').default);

const app = new Vue({
    el: '#app',
    router
});
