<template>
<div id="favorite">
  <ul id="list">
      <app-film v-for='i in this.$store.getters.favoriteFilms' :actors='i.actors' :director='i.director' :genre='i.genre' :key='i.id' :id='i.id'
       :image='i.img' :name='i.name'> </app-film>
    </ul>
</div>
</template>
<style scooped>
#about {
  border: 1px solid;
display: block;
margin: auto;
padding: 5%;
  width: 70%;
  border-radius: 5%;
  margin-top:15px;
}
</style>

