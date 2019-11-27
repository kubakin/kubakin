<template>
	<div id="tek" class='bg-light'>
		<img :src='$route.query.image'>
		<div>
		<h1> Название: {{$route.query.name}}</h1>
		<h1>Жанр: {{$route.query.genre}}</h1>
		<h1>Актеры: {{$route.query.actors}}</h1>
		<h1>Режисер: {{$route.query.director}}</h1>	
		</div>	
	</div>
</template>
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