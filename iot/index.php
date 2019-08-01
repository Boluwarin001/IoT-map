<?php 

$d=file_get_contents('mapmaker/all.txt');

$al=explode(',', $d);

// echo max($al);

$n=0;

for ($i=0; $i < 100; $i++) { 
	for ($j=0; $j < 70; $j++) { 
		// echo '<div class="a">'.$al[$n].'</div>';
		$n++;
	}
	// echo '<br>';
}


 ?>
 <!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Webpage">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/map.css">

    <link rel="stylesheet" href="css/font-awesome.min.css">

	<title> </title>




	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	  <script type="text/javascript" src="mapmaker/jquery-1.12.4.min.js"></script>
	  <link href="https://fonts.googleapis.com/css?family=DM+Sans&display=swap" rel="stylesheet">

	  <!-- <script src="js/jquery.min.js"></script> -->

</head>
<body>

<!-- start nav -->
<div class="nav2">
<div class="nav-pad">
	<div class="logo-nav showSmall"></div>
	<div  onclick="toggleNav()" class="toggle">&#9776;</div>
	<div class="clear"></div>
</div>
</div>


<div class="nav" id="nav">
<div class="nav-pad">
	<!-- <div class="logo-nav hideSmall"></div> -->
	<a><div class="nav-item"><i class="fa fa-instagram"></i></div></a>
	<div class="nav-item"></div>
	<a><div class="nav-item"><i class="fa fa-twitter"></i></div></a>
	<!-- <div class="nav-item hideSmall">|</div> -->
	<div class="nav-item blog">BLOG</div>

	<div class="clear"></div>
</div>
</div>

<!-- end nav -->

<div class="nav-height"></div>


<div class="section1">


	<div class="section1-left">
		<div class="s1-l-pad">
		<div class="map-box" id="map">
			
		</div>
		</div>
	</div>

	<div class="section1-right">
		<div class="pad2">
		<div class="title-height"></div>
		<div class="title">Africa</div>
		<div class="title3">A visual representation of just how connected Africa is</div>
		</div>

		<div class="clear"></div>
		<br>
		<br>


		<div class="table-info" style="text-decoration: underline;"><em>Number of Connected  IoT devices in Africa</em></div>
		<br>
		<div class="big-no">
			<div >211,555,756,899</div>
			<div class="under-big"></div>
		</div>
		<div class="table">

			<div class="row">
				<div class="td">Lagos</div>
				<div class="td2">500,000</div>
				<div class="clear"></div>
			</div>

			<div class="row">
				<div class="td">Nairobi</div>
				<div class="td2">500,000</div>
				<div class="clear"></div>
			</div>

			<div class="row">
				<div class="td">Johanesburg</div>
				<div class="td2">500,000</div>
				<div class="clear"></div>
			</div>

			<div class="row">
				<div class="td">Cairo</div>
				<div class="td2">500,000</div>
				<div class="clear"></div>
			</div>

		</div>

		<div class="clear"></div>

		<div class="table-info" style="font-size: 12px !important"><em>Source: <a href="https://shodan.io" style="text-decoration: none">shodan.io <i class="fa fa-external-link" style="font-size: 10px !important;"></i></a></em></div>

	</div>

	<div class="clear"></div>
</div>


<br>

<script type="text/javascript" src="js/chroma.min.js"></script>

	<script type="text/javascript">

		nav = document.getElementById('nav');
		navSize='big';


		function toggleNav(){

			if(navSize=='big'){
				nav.style.marginTop='10vh';
				navSize='small';
			}else if(navSize=='small'){
				nav.style.marginTop='-150vh';
				navSize='big';
			}
		}


 	$(document).ready(function() {

 	f = chroma.scale(['#418bca', '#418bca', '#418bca', '#418bca', '#fff', '#fff', '#fff', '#fff', '#fff', 'red','red','red','red','red','red','red','red', 'red']).domain([0, 100000]).mode('lab');

 	console.log(f(10000000).hex());
 	var data = <?php echo json_encode($al); ?>;
 	var code = "";
 	var map = document.getElementById('map');

	code+= '<div class="map-overlay"></div>';
	for (var i = 0; i < data.length; i++){
	    var d = data[i];
	    var color = f(d).hex();
	    if(d==0){
	    var div = '<a></a>';
	    }else{
	    var div = '<a title="'+d+'" style="color:'+color+'">&#183;</a>';
		}
	    code += div;
	}
	map.innerHTML = code;

	setInterval(function(){
		var rand = Math.floor(Math.random()*7000);
		$('#map a').eq(rand).addClass('b');
		setTimeout(
			  function() 
			  {
				$('#map a').eq(rand).delay(1000).removeClass('b');
			  }, 500);
	  }, 100);


 	})

		</script>


</body>
</html>