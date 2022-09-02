import './bootstrap';

import Alpine from 'alpinejs';

require('./bootstrap');
window.Vue = require('vue').default;

/** ↓追記 **/
import Vue from 'vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)	// BootstrapVueのIconを使用する場合
/** ↑ここまで **/

Vue.component('user-component', require('./components/User.vue').default);

window.Alpine = Alpine;

Alpine.start();

const app = new Vue({
    el: '#app',
});

