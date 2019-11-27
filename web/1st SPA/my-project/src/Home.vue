<template>
  <div id="app1">
    
    <div class="row">
      <div class="col-lg-12">
        <div class="input-group">
          <div class="input-group-btn">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
             aria-expanded="false">
              {{howToSearch}}
            </button>
            <div class="dropdown-menu">
              <button @click="howToSearch = 'По названию'" class="dropdown-item">По жанру</button>
              <button @click="howToSearch = 'По жанру'" class="dropdown-item">По жанру</button>
              <button @click="howToSearch = 'По актеру'" class="dropdown-item">По актеру</button>
              <button @click="howToSearch = 'По режисеру'" class="dropdown-item">По режисеру</button>
            </div>
          </div>
          <input v-on:input='testreg' type="text" v-model='tester' class="form-control" aria-label="Text input with dropdown button">
        </div>
      </div>
    </div>
    
    <ul id="list">
      <app-film v-for='i in tek' :actors='i.actors' :director='i.director' :genre='i.genre' :key='i.id' :id='i.id'
       :image='i.img' :name='i.name'> </app-film>
    </ul>
   <footer class="page-footer font-small blue">


  <div class="footer-copyright bg-light text-center py-3">Сделано для тестового задания by Погудин Даниил
  </div>
 
</footer>
    <router-view></router-view>
  </div>
</template>
<script>
export default {
  created(){
    this.tek = this.films
  }
  , data() {
    return {
      films: [{
          id: 1
          , name: 'Дитя человеческое'
          , genre: '(фантастика, триллер, драма)'
          , actors: 'Клайв Оуэн, Клэр-Хоуп Эшити'
          , favorite: false
          , img: '1.jpg'
          , director: 'Альфонсо Куарон'
        }
        , {
          id: 2
          , name: 'Лабиринт фавна'
          , genre: 'фэнтези, драма, военный'
          , actors: 'Ивана Бакеро, Серхи Лопес'
          , favorite: false
          , img: '2.jpg'
          , director: ' Гильермо дель Торо'
        }
        , {
          id: 3
          , name: 'Луна 2112'
          , genre: ' фантастика, драма, детектив'
          , actors: 'Сэм Рокуэлл, Кевин Спейси'
          , favorite: false
          , img: '3.jpg'
          , director: 'Дункан Джонс'
        }
        , {
          id: 4
          , name: 'Пианист'
          , genre: ' драма, военный, биография, музыка'
          , actors: 'Эдриан Броуди, Эмилия Фокс'
          , favorite: false
          , img: '4.jpg'
          , director: ' Роман Полански'
        }
        , {
          id: 5
          , name: 'Планета Ка-Пэкс'
          , genre: '(фантастика, драма)'
          , actors: 'Кевин Спейси, Джефф Бриджес'
          , favorite: false
          , img: '5.jpg'
          , director: 'Иэн Софтли'
        }
        , {
          id: 6
          , name: '«V» значит Вендетта'
          , genre: '(фантастика, боевик, триллер)'
          , actors: 'Натали Портман, Хьюго Уивинг'
          , favorite: false
          , img: '6.jpg'
          , director: 'Джеймс МакТиг'
        },
        {
          id: 7
          , name: 'Призрак'
          , genre: '(триллер, драма, детектив)'
          , actors: 'Юэн Макгрегор, Пирс Броснан'
          , favorite: false
          , img: '7.jpg'
          , director: 'Роман Полански'
        },
        {
          id: 8
          , name: 'Преданный садовник'
          , genre: '(триллер, драма, мелодрама...)'
          , actors: 'Рэйф Файнс, Рэйчел Вайс'
          , favorite: false
          , img: '8.jpg'
          , director: 'Фернанду Мейреллиш'
        },
        {
          id: 9
          , name: 'Стальной гигант'
          , genre: '(мультфильм, фантастика, боевик)'
          , actors: 'Эли Мариентал, Вин Дизель'
          , favorite: false
          , img: '9.jpg'
          , director: 'Брэд Бёрд'
        }
      ]
      , tek: [] //текущий список
      , tester: ''
      , howToSearch: "По названию"
    }
  }
  , methods: {
    testreg: function() {
      this.tek = []
      for (var i in this.films) {
        if (this.howToSearch == 'По жанру') {
          if (this.films[i].genre.toLowerCase().match(this.tester.toLowerCase()))
            this.tek.push(this.films[i])
        }
        if (this.howToSearch == 'По названию') {
          if (this.films[i].name.toLowerCase().match(this.tester.toLowerCase()))
            this.tek.push(this.films[i])
        }
        if (this.howToSearch == 'По актеру') {
          if (this.films[i].actors.toLowerCase().match(this.tester.toLowerCase()))
            this.tek.push(this.films[i])
        }

        if (this.howToSearch == 'По режисеру') {
          if (this.films[i].director.toLowerCase().match(this.tester.toLowerCase()))
            this.tek.push(this.films[i])
        }


      }


    }
  }


}

</script>
<style>

#list{
  box-shadow: 0 0 10px rgba(0,0,0,0.5);
  margin-bottom: 10%;
  margin-left: 10%;
  margin-right: 10%;
  background: #DCDCDC;
  display: grid;
  justify-items: center;
  grid-template-columns: 1fr 1fr;
  text-align: center;
  justify-content: center;
  border-radius: 30px;
  padding: 5%;
}
@media screen and (max-width: 1000px) {
  #list{
    grid-template-columns: 1fr;
    
  }
   }
</style>