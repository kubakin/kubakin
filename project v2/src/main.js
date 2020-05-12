import About from './about.vue'
import App from './App.vue'
import Film from './components/film.vue'
import VueRouter from 'vue-router'
import router from './routes'
import Navbar from './components/navbar.vue'
import Tek from './tek.vue'
import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(VueRouter)
Vue.use(Vuex)
Vue.component('app-film', Film)
Vue.component('app-nav', Navbar)
Vue.component('app-tek', Tek)

Vue.config.productionTip = false
const store = new Vuex.Store({
	state: {
	  count: 0,
	  films: [{
		id: 0
		, name: 'Дитя человеческое'
		, genre: 'фантастика, триллер, драма'
		, actors: 'Клайв Оуэн, Клэр-Хоуп Эшити'
		, favorite: false
		, img: '1.jpg'
		, director: 'Альфонсо Куарон'
	  }
	  , {
		id: 1
		, name: 'Лабиринт фавна'
		, genre: 'фэнтези, драма, военный'
		, actors: 'Ивана Бакеро, Серхи Лопес'
		, favorite: false
		, img: '2.jpg'
		, director: ' Гильермо дель Торо'
	  }
	  , {
		id: 2
		, name: 'Луна 2112'
		, genre: 'фантастика, драма, детектив'
		, actors: 'Сэм Рокуэлл, Кевин Спейси'
		, favorite: false
		, img: '3.jpg'
		, director: 'Дункан Джонс'
	  }
	  , {
		id: 3
		, name: 'Пианист'
		, genre: 'драма, военный, биография, музыка'
		, actors: 'Эдриан Броуди, Эмилия Фокс'
		, favorite: false
		, img: '4.jpg'
		, director: ' Роман Полански'
	  }
	  , {
		id: 4
		, name: 'Планета Ка-Пэкс'
		, genre: 'фантастика, драма'
		, actors: 'Кевин Спейси, Джефф Бриджес'
		, favorite: false
		, img: '5.jpg'
		, director: 'Иэн Софтли'
	  }
	  , {
		id: 5
		, name: '«V» значит Вендетта'
		, genre: 'фантастика, боевик, триллер'
		, actors: 'Натали Портман, Хьюго Уивинг'
		, favorite: false
		, img: '6.jpg'
		, director: 'Джеймс МакТиг'
	  },
	  {
		id: 6
		, name: 'Призрак'
		, genre: 'триллер, драма, детектив'
		, actors: 'Юэн Макгрегор, Пирс Броснан'
		, favorite: false
		, img: '7.jpg'
		, director: 'Роман Полански'
	  },
	  {
		id: 7
		, name: 'Преданный садовник'
		, genre: 'триллер, драма, мелодрама'
		, actors: 'Рэйф Файнс, Рэйчел Вайс'
		, favorite: false
		, img: '8.jpg'
		, director: 'Фернанду Мейреллиш'
	  },
	  {
		id: 8
		, name: 'Стальной гигант'
		, genre: 'мультфильм, фантастика, боевик'
		, actors: 'Эли Мариентал, Вин Дизель'
		, favorite: false
		, img: '9.jpg'
		, director: 'Брэд Бёрд'
	  }
	]
	},
	getters: {
		favoriteFilms: state => {
		  return state.films.filter(film => film.favorite);
		}
	},

	mutations: {
	  increment (state) {
		state.count++
	  },
	  doFavorite(state, id) {
		state.films[id].favorite = !state.films[id].favorite
	  },
	  
	}
  })
new Vue({
	render: h => h(App)
	, router: router,
	store: store,
	components: { Test }
}).$mount('#app')
const Test = {
  template: `<div>{{ count }}</div>`,
  computed: {
    count() {
      return 'hi';
    }
  }
};