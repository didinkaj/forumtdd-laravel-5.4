
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Flash from './components/Flash.vue'
import Thread from './components/pages/Thread.vue'
import Paginator from './components/pages/Paginator.vue'
import UserNotifications from './components/UserNotifications.vue'

Vue.component('flash', Flash);
Vue.component('thread-view', Thread);
Vue.component('paginator', Paginator);
Vue.component('user-notifications', UserNotifications);

const app = new Vue({
    el: '#app'
});
