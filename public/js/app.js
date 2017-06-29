new Vue({
	
	el: '#root',

	data: {
		recipes: []
	},
	created() {
		axios.get('/spiderjson/40').then(response => console.log(this.recipes = response.data));
	}
});