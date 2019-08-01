

<?php 

$d=file_get_contents('all.txt');

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
 	<title></title>
 </head>
 <style type="text/css">
a{
	float: left;
	width: 5px;
	height: 5px;
	border-radius: 10px;
}

.b{
	background: #418bca;
}
body{
	background: #000;
}

#map{
	width: 350px;
	height: 500px;
	margin-left: 100px;
	transform: scaleX(1.1);
}
	
</style>
 <body>

 	<div id="map">

 	</div>
 
<script type="text/javascript" src="jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="chroma.min.js"></script>

 <script type="text/javascript">
 	$(document).ready(function() {

 	f = chroma.scale(['grey', 'white', 'red']).domain([0, 100000]).mode('lab');

 	console.log(f(10000000).hex());
 	var data = <?php echo json_encode($al); ?>;
 	var code = "";
 	var map = document.getElementById('map');

	for (var i = 0; i < data.length; i++){
	    var d = data[i];
	    var color = f(d).hex();
	    if(d==0){
	    var div = '<a></a>';
	    }else{
	    var div = '<a title="'+d+'" style="color:'+color+'">&middot;</a>';
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