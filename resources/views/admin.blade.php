<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title><%= htmlWebpackPlugin.options.title %></title>
	<% for (var i in htmlWebpackPlugin.options.cdn && htmlWebpackPlugin.options.cdn.css) { %>
	<link rel="stylesheet" href="<%= htmlWebpackPlugin.options.cdn.css[i] %>" />
	<% } %>
</head>
<body>
<div id="app">
	<app></app>
</div>
<% for (var i in htmlWebpackPlugin.options.cdn && htmlWebpackPlugin.options.cdn.js) { %>
<script type="text/javascript" src="<%= htmlWebpackPlugin.options.cdn.js[i] %>"></script>
<% } %>
<script>
	const APP_URL='{{$APP_URL}}';
</script>
</body>
</html>
