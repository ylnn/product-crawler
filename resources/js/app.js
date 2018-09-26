require('./bootstrap');

window.Vue = require('vue');


Vue.component('products-component', require('./components/ProductsComponent.vue'));

const app = new Vue({
    el: '#app',
});
