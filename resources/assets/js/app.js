
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window.Vue.prototype.authorize = function (handler) {
    let user = window.App.user;

    return user ? handler(user) : false;
};

window.events = new Vue();

window.flash = function (message) {
    window.events.$emit('flash', message);
}

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('flash-component', require('./components/FlashComponent.vue'));
Vue.component('thread-view', require('./pages/ThreadComponent.vue'));

const app = new Vue({
    el: '#app'
});

