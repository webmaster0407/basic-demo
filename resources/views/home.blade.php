<!doctype html>
<html>
	<head>
		<title>Home</title>
		<meta name="csrf_token" content="{{ csrf_token() }}">
		<link href="{{ asset('assets/css/css/pages/home/home.css')}}" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="fullContainer">
			<div id="middleContainer">
				<div id="container">
					<img id="image">
					<div class="mask"></div>
				</div>
				<div class="btnArea">
					<button id="playBtn" class="btn playBtn">Start</button>
				</div>	
				<div class="audioArea">
					<audio id="audio" autoplay="true"></audio>
				</div>					
			</div>
		</div>
	</body>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>	
	<script src="{{ asset('assets/js/js/pages/home/freezeframe.min.js')}}"></script>
	<script src="{{ asset('assets/js/js/pages/home/home.js')}}"></script>
</html>