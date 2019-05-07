// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import fastClick from 'fastclick' /* 在package.json里下载的包 */
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import './assets/styles/border.css'
import './assets/styles/reset.css'     /* css的内容在这里引入 */
import './assets/styles/iconfont.css'  /* 全局的css在main.js里引入 */



Vue.config.productionTip = false
Vue.use(ElementUI);
fastClick.attach(document.body)

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
})
