<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="//js.pusher.com/3.0/pusher.min.js"></script>
	
	<script>
		var pusher = new Pusher("{{env('PUSHER_APP_KEY')}}" , { cluster: 'eu' });
		var channel = pusher.subscribe('test-channel');
		channel.bind('test-event', function(data) {
		  alert(data.text);
		});
	
	</script>

</head>
<body>
<h1>Welcome</h1>
</body>
</html>