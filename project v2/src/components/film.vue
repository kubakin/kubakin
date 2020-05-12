<template>
	<div id="app2">
		<router-link tag="li" :to="{name: 'film',params:{id:id},query: {name:name, genre: genre, actors: actors, director: director, image: image, id: id}}">
			<a><img :src="image" alt=""> Подробнее</a>
		</router-link>
		<p>{{name}}</p>
		</div>
</template>
<script>
export default {
	props: ['tek', 'id', 'image', 'name', 'genre', 'actors', 'director', 'image']
}

</script>
<style>
#app2 {

	width: 30%;
	
	text-align: center;
	margin-bottom: 10%;
	margin-left: 25%;
	margin-right: 25%;
	height: 40%;
	list-style-type: none;
	border-radius: 10px;
	
	background: white;
	
}
#app2 img  {
	border: 1px solid;
	box-shadow: 0 0 10px #00000080;
  width: 100%;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
  max-height: 400px;
}
@media screen and (max-width: 1000px) {
  #app2{
	width: 60%;
	max-width: 360px;
	max-height: 540px
    
  }
}
</style>
