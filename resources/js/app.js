require('./bootstrap');

require('alpinejs');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('tabla-component', require('./components/TablaComponent.vue').default);

const app = new Vue({
    el: '#app',
});
