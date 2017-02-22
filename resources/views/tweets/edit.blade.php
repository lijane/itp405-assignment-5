<html>
<head> 
	<title>Edit Tweet:{{ $tweet->id }}</title>
	<link rel="stylesheet" 
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class="container">

	<h1>Update Tweet ID: {{$tweet->id}}</h1>
	<form action="/tweets/{{ $tweet->id }}" method="post">
	      	{{ csrf_field() }}
	      	<div class="form-group">
	        <!-- <input type="text" name="tweettext" id="tweettext" value="{{ old('') }}"> -->
	        ​<textarea name="tweettext" id="tweettext" rows="10" cols="70"
	        >{{ $tweet->tweet }}</textarea>
	   		</div>
	   		<button type="submit" class="btn btn-primary">Save Tweet</button>
	</form>
 	</div>
</body>
</html>