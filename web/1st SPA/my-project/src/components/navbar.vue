<template>

	
	<router-link class='nav-list' tag="li" :to="'/' + url">
			<a class='nav-link'>{{page}}</a>
		</router-link>

</template>
<script>
export default {
	
	props: ['tek', 'page', 'url']
}

</script>
