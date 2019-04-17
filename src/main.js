// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import './assets/style/base.css'
import './assets/style/iconfont/iconfont.css'
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
import axios from 'axios'
import moment from 'moment'

Vue.use(ElementUI)
Vue.config.productionTip = false

axios.defaults.withCredentials = true
Vue.prototype.$http = axios

// 格式化日期
Vue.filter('dataFilter', res => {
  return moment(res).format('YYYY-MM-DD')
})

Vue.filter('delHtmlTag', res => {
  return res.replace(/<[^>]+>/g, ' ')
})

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
})
