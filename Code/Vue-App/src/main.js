import Vue from 'vue'
import App from './App.vue'
import HighchartsVue from 'highcharts-vue'
import axios from 'axios'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(HighchartsVue);
Vue.prototype.$http = axios;

new Vue({
  el: '#app',
  render: h => h(App)
});
