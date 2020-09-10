import './bootstrap';

import Vue from 'vue';
import VModal from 'vue-js-modal';

Vue.use(VModal);

//Vue.component('theme-switcher', require('./components/ThemeSwitcher.vue').default);
Vue.component('new-mensal-debt', require('./components/NewMensalDebt.vue').default);
//Vue.component('dropdown', require('./components/Dropdown.vue').default);

new Vue({
    el: '#app'
});