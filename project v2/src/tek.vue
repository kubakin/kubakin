<template>
	<div id="tek" class='bg-light'>
		<img :src='$route.query.image'>
		<div>
		<h1> Название: {{$route.query.name}}</h1>
		<h1>Жанр: {{$route.query.genre}}</h1>
		<h1>Актеры: {{$route.query.actors}}</h1>
		<h1>Режисер: {{$route.query.director}}</h1>	

		<button @click='favorite()'>{{caption}}</button>
		</div>	
	</div>
</template>
<script>
export default {
	
	methods: {
		favorite() {
			this.$store.commit('doFavorite',this.$route.query.id);

		},
		
	},
	computed: {
		caption: function() {
		if (this.$store.state.films[this.$route.query.id].favorite == false) {
			return 'Добавить в любимые';
		}
		if (this.$store.state.films[this.$route.query.id].favorite == true) {
			return 'Удалить из любимых';
		}
		}
	}
}
</script>
<style>
#tek {
	box-shadow: 0 0 10px #00000080;
display: flex;
margin: auto;
border: 1px solid;
width: 80%;
padding: 3%;
text-align: justify;
}
#tek div{
	display: grid;

}
#tek img {
	box-shadow: 0 0 10px #00000080;

}
@media screen and (max-width: 800px) {
  #tek{
	display: grid;
	
  }
  #tek img {

	width: 100%;
}
}

</style>