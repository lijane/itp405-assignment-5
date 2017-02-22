<html>
<head> 
	<title>View Tweet:{{ $tweet->id }}</title>
	<link rel="stylesheet" 
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class="container">

	<h1>Tweet ID: {{$tweet->id}}</h1>
	<p>
		{{$tweet->tweet}}
	</p>

	<form method="get" action="/tweets/{{ $tweet->id }}/edit">
	    <button type="submit" class="btn btn-primary">Update Tweet</button>
	</form>

	<form method="get" action="/">
	    <button type="submit" class="btn btn-primary">Return to All Tweets</button>
	</form>

	</div>
</body>
</html>