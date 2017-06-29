<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div id="root">
		
		<ul>
			<li v-for="recipe in recipes">@{{ recipe.name }}</li>
		</ul>	
	
	</div>

	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.0/vue.js"></script>
	<script src="/js/app.js"></script>
</body>
</html>