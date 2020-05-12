import VueRouter from 'vue-router'
import Home from './Home.vue'
import Tek from './tek.vue'
import about from './about.vue'
import favorite from './favorite.vue'
export default new VueRouter({
	routes: [ {
			path: '/'
			, component: Home
		, }
		, {
			path: '/id:id'
			, component: Tek,
			name: 'film'

		},
		{
			path: '/about',
			component: about,
			name: 'aboutme'
		},
		{
			path: '/favorite',
			component: favorite,
			name: 'favorite'
		}
	]
	, mode: 'history'
})
