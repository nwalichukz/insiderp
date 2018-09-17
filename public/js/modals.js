import Vue from 'vue';
import VModal from 'vue-js-modal';

Vue.use(VModal);

Vue.component('login-modal', {
    template: `
        <a href="#">Login Here</a>
    `,
    data: {},
    methods: {}
});

new Vue({
    el: '#app'
});

