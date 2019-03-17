import Vue from 'vue'
import App from './App.vue'

export const API_URL = 'http://localhost/wordpress-api/wp-json/carcraft/v1/';

Vue.config.productionTip = false

new Vue({
  render: h => h(App),
}).$mount('#app')
