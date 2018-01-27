<?php
session_start();

if(array_key_exists('test',$_POST)){
   testfun();
}
$szamlalo = null;
?>

<!doctype html>
<html lang="en">
  <head>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
			$(".button_login").click(function(){
				$(".button_reg").toggle(500);
				$(".div-login").toggle(500);
				$(".div-login-fejlec").toggle(500);
			});
			$(".button_reg").click(function(){
				$(".button_login").toggle(500);
				$(".div-regisztracio").toggle(500);
				$(".div-regisztracio-fejlec").toggle(500);
				
			});
			//$(".meter").animate({ value: '20' }, 1000);
		   
		});
		function email_mutat(){
			$(".form-mini-n-email").toggle(500);
		}
		
	var v_idozito = setInterval(f_idozito, 3000);	
	function tovabb(){
		window.open("https://www.w3schools.com","_parent");
	}
	function myTimer() {
		
		 var x = document.getElementsByClassName("div_change");
		 x[0].style.display = "none";
	}
	</script>

  </head>
	<script src='https://www.google.com/recaptcha/api.js'></script> 
	<header id="header_figyeloheader_figyelo" >
	<h1 class="h1_login">BKS Richárd</h1>
	<p></p>
	</header>
	
	<body class="body_login"  >
			 <?php 
		
		
		if(!empty($_SESSION["userid"])){
			//echo "Bejelentkezve id:".$_SESSION["userid"];
			echo "<style>.div_change{
			
				display:none;
			
					}.bejelentkezve{display:block;}</style>";
					
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "mydb";
					$servername = "localhost";
					$conn = new mysqli($servername, $username, $password, $dbname);
					
									
					if ($conn->connect_error) 
					{
							die("Connection failed: " . $conn->connect_error);
					} 
									
							$sql = "SELECT count(f_azon) from szavazatok where f_azon = '".$_SESSION["userid"]."' and szav_id = 1 ";
									
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								
								while($row = $result->fetch_assoc()) 
								{	
									$szavmennyiseg =  $row['count(f_azon)'];
								}
							}
							
					
					
					
					
					
					
					
		}
		else{
			
			echo "Nincs bejelentkezve felhasználó.";
			echo "<script> window.location.assign('change.php'); </script>";
		}
	?>
		
		
		
	<navbar>
			  <div class="bejelentkezve">
			  <br>
			  

			 
			<a class="a_kij" href="profil.php">Profil</a> <p></p>
			  <a class="a_kij_x" href="form1sql.php">Szavazz!</a>

			  
			  <form onsubmit="tovabb()" method="POST" class="form-menu" >
			  <input class="btn_kij" type="submit" value="Kijelentkezés" name="kijelentkezes" ><br>
			  
			  
			  </form>
			  			  <?php 
			  $admin = 1;
			  if($admin = 1)
			  {
				 echo" <br><a class='gomb_admin' href='admin.php'>Admin!</a>";
				  
				  
			  }
			  
			  
			  ?>
			  <p></p>
			  <?php 
							if(isset($_POST['kijelentkezes'])){
								
								echo "<script> window.location.assign('change.php'); </script>";
								$_SESSION["userid"] = null;
							}
			  
			  
			  ?>
			  
			  
			  </div>
			 
			  
			 
	</navbar>

		<?php 
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "mydb";
					$servername = "localhost";
					$conn = new mysqli($servername, $username, $password, $dbname);
					
									
					if ($conn->connect_error) 
					{
							die("Connection failed: " . $conn->connect_error);
					} 
									
							$sql = "SELECT SUM(a) from szavazatok";
									
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								
								while($row = $result->fetch_assoc()) 
								{	
									
									$egy =  $row['SUM(a)'];
									
								
									
									
									$edb	=  $row['SUM(a)'];
									
									
									
								}
							}
							$sql = "SELECT SUM(b) from szavazatok";
									
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								
								while($row = $result->fetch_assoc()) 
								{	
									$ketto =  $row['SUM(b)'];
									$mdb	=  $row["SUM(b)"];
								}
							}
							$sql = "SELECT SUM(c) from szavazatok";
									
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								
								while($row = $result->fetch_assoc()) 
								{	
									$harom =  $row["SUM(c)"];
									$hdb =  $row["SUM(c)"];
								}
							}
							$sql = "SELECT SUM(d) from szavazatok";
									
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								
								while($row = $result->fetch_assoc()) 
								{	
									$ndb =  $row["SUM(d)"];
									$negy =  $row["SUM(d)"];
								}
							}
							
														
							
							/*$id = $_SESSION["userid"];
							if ($conn->connect_error) 
							{
							die("Connection failed: " . $conn->connect_error);
							} 
							
							$sql = "SELECT loged FROM loginpanel Where  sz =".$id."";
									
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								
								while($row = $result->fetch_assoc()) 
								{	
								
									$szamlalo =  $row["loged"];
									
								}
							}*/
							$conn->close();		
	
	
		$egy = rtrim($egy);
		 $ketto = rtrim($ketto);
		 $harom = rtrim($harom);
		 $negy = rtrim($negy);
		
	
	
		
	
		if($egy > 0 || $ketto > 0 || $harom > 0 || $negy > 0)
		{
	
			

			$oszto = (($egy + $ketto) + ($harom + $negy)) ;
					
			 $egy = ($egy * 100) / $oszto;
			 $ketto = ($ketto * 100) / $oszto;
			 $harom = ($harom * 100) / $oszto;
			 $negy = ($negy * 100) / $oszto;
				$egy = rtrim($egy);
			 $ketto = rtrim($ketto);
			 $harom = rtrim($harom);
			 $negy = rtrim($negy);
		
		}
		/*while(false)
		{
           testfun();
		   
		}*/
		function jelol($melyiket)
							{	$id = $_SESSION["userid"];
								$servername = "localhost";
								$username = "root";
								$password = "";
								$dbname = "mydb";
								$servername = "localhost";
								$conn = new mysqli($servername, $username, $password, $dbname);
												
								if ($conn->connect_error) 
								{
										die("Connection failed: " . $conn->connect_error);
								} 									
										
										$sql ="Insert INTO szavazatok (f_azon,szav_id,".$melyiket.") values('".$id."',1,'1')";								
										$result = $conn->query($sql);
										
										/*$sql ="Update  loginpanel set loged = 1 where sz = ".$id."";								
										$result = $conn->query($sql);*/
										
							$conn->close();
							
							
							/////////////átírás
							
									
					
								
								
		}
		 function testfun()
		{		
		/////újra berakjuk az olvasást
				if(!empty($_GET["name"]))
				{
					
				
					$x = $_GET["name"];
							
							
							if($x == "a")
							{
								$melyiket="a";
							}
							else if($x == "b")
							{
								$melyiket="b";
							}
							else if($x == "c")
							{
								$melyiket="c";
							}
							else if($x == "d")
							{
								
								$melyiket = "d";
								
							}
							jelol($melyiket);	
					
					
				}
				else
				{
					
					
				}
				
				if(!empty($_GET["name"]))
				{
					echo "<script> window.location.assign('form1sql.php'); </script>";
				}
		}
				?>
				
				<script>
				function check() {
					
					
					
					 
					
					
					if(document.getElementById("a").checked) 
					{
										 var javascriptVariable = "a";
											window.location.href = "form1sql.php?name=" + javascriptVariable;
										
					
					}
					else if(document.getElementById("b").checked) 
					{
										 var javascriptVariable = "b";
										window.location.href = "form1sql.php?name=" + javascriptVariable;
					
					}
					else if(document.getElementById("c").checked) 
					{
										 var javascriptVariable = "c";
										window.location.href = "form1sql.php?name=" + javascriptVariable;
					
					}
					else if(document.getElementById("d").checked) 
					{
										 var javascriptVariable = "d";
											window.location.href = "form1sql.php?name=" + javascriptVariable;
					}
					
				}
				
				</script>
				<?php 
				if($szavmennyiseg>0)
				{
					echo "<style>#e_eredmenyek{display:none;}#eredmenyek{margin-top:-2%;}</style>";
					
				}?>
				<section>
				
				
			<div id="e_eredmenyek">
				<h4 class="kozepre">Kérem értékelje az alábbi weboldalt 0-10-es skálán!</h4>
				<br>
				<div  id="donate">
					
					<form action="" method="POST" >
					
					<label><input  id="a" type="radio" name="toggle"><span>0-3</span></label>
					<label><input  id="b" type="radio" name="toggle"><span>4-6</span></label><br>
					<label><input  id="c" type="radio" name="toggle"><span>5-7</span></label>
					<label><input   id="d" type="radio" name="toggle"><span>8-10</span></label>
					
					</form>
				 
				</div>
				
				<button class="btn_szavazas" onclick="check()">Választás</button>
				
				</div>
				
			</section>
<div id="kiiras">
							<?php 
							
					if($szavmennyiseg > 0){
								if(isset($_POST['torles']))
								{
										
								$servername = "localhost";
								$username = "root";
								$password = "";
								$dbname = "mydb";
								$servername = "localhost";
								$conn = new mysqli($servername, $username, $password, $dbname);
												
								if ($conn->connect_error) 
								{
										die("Connection failed: " . $conn->connect_error);
								} 									
								
										$sql ="Delete from szavazatok where f_azon =  '".$_SESSION["userid"]."' and szav_id = 1";								
										$result = $conn->query($sql);
										
										
							$conn->close();
									
										
								echo "<script> window.location.assign('form1sql.php'); </script>";
								}
							
					}
					
							
							?>
					<div id="eredmenyek">
										<h4 class="kozepre">Eredmények</h4>
										<br>
										
										<table class="x"style="width:100%">
											
										  <tr>
											<td>0-3</td>
											
											<td> <progress value="<?php echo $egy ?>" max="100"></progress></td>
											<td ><?php echo $edb." darab szavazat eddig."?></td>
										  </tr>
										  <tr>
											<td>4-6</td>
											
											<td><progress value="<?php echo $ketto ?>" max="100"></progress></td>
											<td ><?php echo $mdb." darab szavazat eddig."?></td>
											
										  </tr>
										  <tr>
											<td>5-7</td>
											<td> <progress value="<?php echo $harom ?>" max="100"></progress></td>
											<td ><?php echo $hdb." darab szavazat eddig."?></td>											
										  </tr>
										  
											<td>8-10</td>											
											<td> <progress class="meter" value="<?php echo $negy ?>" max="100"></progress></td>
											<td ><?php echo $ndb." darab szavazat eddig."?></td>
										 
										</table>
										<?php 
											if($szavmennyiseg > 0)
											{
												
												
												echo "<form method='post'>";
												echo "<input class='btn_valasztastorlese' type='submit' value='Választás törlése' name='torles'/>";
												echo "</from>";
												echo "<br>";
												
												
												
											}
										
										
										
										
										?>
										
										<center><?php
										
										if($szavmennyiseg == 0){
											
											if(!empty($_GET))
											{
												echo "<form method='post' style='margin-bottom:2%; text-indent: 1em;'>";
												echo "<input id='szinezes' type='submit' name='test' id='test' value='Választás leadása' onclick='check()'/><br/>";
												echo "</form>";
												
												
												
											}
											else{
												
												echo "<form method='post' style='margin-bottom:2%; text-indent: 1em;'>";
												echo "<input id='szinezes' type='submit' name='test' id='test' value='Választás leadása' disabled onclick='check()'/><br/>";
												echo "</form>";
												
												
											}
											
											
											
										}
											?>
										
										</center>
					</div>
					

</div>
		
		
		
		
		
		
		
  </body>
 <footer class="kikapcs">
  <a href="aszf_letoltes.php">Aszf (fab)</a>
	
 
 
 </footer>
</html>