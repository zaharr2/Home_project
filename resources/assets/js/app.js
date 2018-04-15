/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
// window.VueRouter = require('vue-router');
window.axios = require('axios');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// Vue.component('users', require('./views/user/Users.vue'));
// Vue.component('create-new-user', require('./views/user/CreateNew.vue'));
// Vue.component('edit-user', require('./views/user/Edit.vue'));
Vue.component('navbar', require('./views/common/NavBar.vue'));

import App from './views/App.vue';
import Hello from './views/Hello.vue';
import Home from './views/Home.vue';
import UsersIndex from './views/user/UsersIndex.vue';
import UsersAdd from './views/user/CreateNew.vue';

import VueRouter from 'vue-router';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/hello',
            name: 'hello',
            component: Hello,
        },
        {
            path: '/users',
            name: 'users.index',
            component: UsersIndex,
        },
        {
            path: '/user/add',
            name: 'users.add',
            component: UsersAdd,
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: {App},
    router,
});
