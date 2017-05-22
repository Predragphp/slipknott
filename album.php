<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="style.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="http://vignette3.wikia.nocookie.net/slipknot/images/6/64/Favicon.ico/revision/latest?cb=20160316220949" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Slipknott</title>
</head>
<body>	
	<div id="heder">
		
			<div class="wreper clear">
			
					

						<div id="logo">	
							<a href="index.html"><img src="LOGO.png" alt="SLIPKNOT-LOGO" ></a>
							
						</div><!-- END LOGO -->
			
			
					<div id="nav" >
								
								<ul>
									
										<li><a href="vid.html"> LIVE VIDEOS </a></li>
											
										<li><a href="album.php"> ALBUMS</a></li>
											
										<li><a href="members.html"> BAND MEMBERS</a></li>

										<li><a href="galerija.html"> GALERIJA </a></li>

									
									
									
									
								</ul>
								
						</div><!-- END NAV -->
				
			</div><!-- END WREPER -->	
		
	</div><!-- END HEDER -->
		
	<div id="main">
	
		<div class="wreper clear">
<?php
$db=mysqli_connect("localhost","root","","id985425_slipknot");

if(!isset($db))
{
	echo "baza je nedostupna";
	exit();
}
$albumi=Array();
$sql="SELECT DISTINCT album FROM songs";
$result=mysqli_query($db, $sql);
 while ($red=mysqli_fetch_array($result))
{
    if(strlen($red['album'])>0) $albumi[]=$red['album'];
}
 
for($j=0;$j<count($albumi);$j++)
{          
$sql="select * from songs where album='".$albumi[$j]."'";

$result=mysqli_query($db, $sql);

mysqli_num_rows($result);
echo "<h2 style='font-size:36px;'>".$albumi[$j]."</h2> <input type='button' onclick='prikaziDiv($j)' value='Collapse' style='color:black;'>";
echo "<div id='album$j' style='display:none;'>";


					 while ($red=mysqli_fetch_array($result))
					 {
                       
                        echo "<p style='font-size:28px;'>".$red['songs']."</p>
					<audio controls>".$red['path']."</audio>";
							
					 }
echo "</div>";
			                       
 }
?>
		</div><!-- END WREPER -->
			<div  style='margin-bottom:30px;'>&nbsp<br></div>
	</div><!--- END MAIN-->
	
	

</body>
</html>
<script>
function prikaziDiv(a)
{
var a=document.getElementById("album"+a);
if(a.style.display=="none")a.style.display="";
else a.style.display="none";
}
</script>