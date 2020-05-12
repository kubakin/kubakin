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
              <button @click="howToSearch = 'По названию'" class="dropdown-item">По названию</button>
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
    this.tek = this.$store.state.films
    
  //console.log(this.$store.state.count)

  }
  , data() {
    return {
     
       tek: [] //текущий список
      , tester: ''
      , howToSearch: "По названию"
    }
  }
  , methods: {
    testreg: function() {
    
    this.$store.state.films= []
    
      for (var i in this.$store.state.films) {
        if (this.howToSearch == 'По жанру') {
          if (this.$store.state.films[i].genre.toLowerCase().match(this.tester.toLowerCase()))
            this.tek.push(this.$store.state.films[i])
        }
        if (this.howToSearch == 'По названию') {
          if (this.$store.state.films[i].name.toLowerCase().match(this.tester.toLowerCase()))
            this.tek.push(this.$store.state.films[i])
        }
        if (this.howToSearch == 'По актеру') {
          if (this.$store.state.films[i].actors.toLowerCase().match(this.tester.toLowerCase()))
            this.tek.push(this.$store.state.films[i])
        }

        if (this.howToSearch == 'По режисеру') {
          if (this.$store.state.films[i].director.toLowerCase().match(this.tester.toLowerCase()))
            this.tek.push(this.$store.state.films[i])
        }


      }


    }
  },
 


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