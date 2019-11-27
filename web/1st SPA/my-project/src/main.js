import About from './about.vue'
import App from './App.vue'
import Film from './components/film.vue'
import VueRouter from 'vue-router'
import router from './routes'
import Navbar from './components/navbar.vue'
import Tek from './tek.vue'

Vue.use(VueRouter)
Vue.component('app-film', Film)
Vue.component('app-nav', Navbar)
Vue.component('app-tek', Tek)

Vue.config.productionTip = false

new Vue({
	render: h => h(App)
	, router: router
}).$mount('#app')
