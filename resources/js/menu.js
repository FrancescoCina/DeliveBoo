require('./bootstrap');


window.Vue = require('vue');



import Menu from "./components/Restaurant/Menu.vue";

const app = new Vue({
    el: "#root",
    render: h=> h(Menu)
});