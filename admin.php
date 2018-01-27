<?php
session_start();

if(array_key_exists('test',$_POST)){
   testfun();
}

					
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
			$(".listázz_felhasznalok").click(function(){
				$(".felhasznalok").toggle(0);
				$(".szavazat").hide(0);
				$(".szavazatok").hide(0);
				$(".admin").hide(0);
				
			});
			$(".listázz_szavazatok").click(function(){
				$(".szavazatok").toggle(0);
				$(".felhasznalok").hide(0);
				$(".szavazat").hide(0);
				$(".admin").hide(0);
			});
			$(".listázz_szavazat").click(function(){
				$(".szavazat").toggle(0);
				$(".felhasznalok").hide(0);
				$(".szavazatok").hide(0);
				$(".admin").hide(0);
			});
			$(".listázz_admin").click(function(){
				$(".admin").toggle(0);
				$(".felhasznalok").hide(0);
				$(".szavazatok").hide(0);
				$(".szavazat").hide(0);
			});
			
		   
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
	<div class="lista">
	<table class="table_listak" style=" width: 65%">
		<colgroup>
		<col style="width: 20%">
		<col style="width: 20%">
		<col style="width: 20%">
		<col style="width: 20%">
		</colgroup>
						<tr>
						<th class="kozepre" colspan="4">Adatok</th>
						
						</tr>
						<tr>
						<td ><button class="listázz_felhasznalok">Felhasználók</button></td>
						<td ><button class="listázz_szavazatok">Szavazatok</button></td>
						<td ><button class="listázz_szavazat">Szavazati témák</button></td>
						<td ><button class="listázz_admin">Admin</button></td>
						</tr>
						<tr>
						<td colspan="4" style="border:1.5px solid silver;border-top:1px solid silver;">
							
							
					<!-- listázás szavazatok-->		
					<table  class="szavazat" style=" width: 100%">
					<colgroup>
					<col style="width: 20%">
					<col style="width: 80%">
					</colgroup>
					<tr>
					<td >id</td>
					<td >megnevezés</td>
					
					</tr>
					<?php 	
				
					$servername = "localhost,root,,mydb";
					$username = "root";
					$password = "";
					$dbname = "mydb";
					$servername = "localhost";
					$conn = new mysqli($servername, $username, $password, $dbname);			
					if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
					} 
					
							$sql = "SELECT a,b from valami";
									
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								
								while($row = $result->fetch_assoc()) {	
								
								
								$pa = mb_convert_encoding($row["a"],  'UTF-8');
								$pw = mb_convert_encoding($row["b"],  'UTF-8');
								echo "<tr>
							<td class='tg'>".$pa."</td>
							<td>".$pw."</td>
						  </tr>";
								}
							}	
						$conn->close();
						?>
					</table>
					
					<table  class="felhasznalok" style=" width: 100%">
					
					<tr>
				
					
					<td >f_azon</td>
					<td >f_nev</td>
					<td >f_jel</td>
					<td >f_neme</td>
					<td >f_tiltva</td>
					<td >f_felnev</td>
					<td >f_admin</td>
					<td >f_bejelentkezve</td>
					<td >f_emailcim</td>
					<td >f_szul_date</td>
					<td >f_reg_date</td>
					</tr>
					<?php 	
				
					$servername = "localhost,root,,mydb";
					$username = "root";
					$password = "";
					$dbname = "mydb";
					$servername = "localhost";
					$conn = new mysqli($servername, $username, $password, $dbname);			
					if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
					} 
					
							$sql = "SELECT f_azon, f_nev, f_jel, f_neme, f_tiltva, f_felnev, f_admin, f_bejelentkezve, f_emailcim, f_szul_date, f_reg_date FROM felhasznalo";
									
							$result = $conn->query($sql);
							
							if ($result->num_rows > 0) {
								
								while($row = $result->fetch_assoc()) {	
								
								
								$f_azon = mb_convert_encoding($row["f_azon"],  'UTF-8');
								$f_nev = mb_convert_encoding($row["f_nev"],  'UTF-8');
								$f_jel = mb_convert_encoding($row["f_jel"],  'UTF-8');
								$f_neme = mb_convert_encoding($row["f_neme"],  'UTF-8');
								$f_tiltva = mb_convert_encoding($row["f_tiltva"],  'UTF-8');
								$f_felnev = mb_convert_encoding($row["f_felnev"],  'UTF-8');
								$f_admin = mb_convert_encoding($row["f_admin"],  'UTF-8');
								$f_bejelentkezve = mb_convert_encoding($row["f_bejelentkezve"],  'UTF-8');
								$f_emailcim = mb_convert_encoding($row["f_emailcim"],  'UTF-8');
								$f_szul_date = mb_convert_encoding($row["f_szul_date"],  'UTF-8');
								$f_reg_date = mb_convert_encoding($row["f_reg_date"],  'UTF-8');
								
								echo "<tr>
							<td>".$f_azon."</td>
							<td>".$f_nev."</td>
							<td>".$f_jel."</td>
							<td>".$f_neme."</td>
							<td>".$f_tiltva."</td>
							<td>".$f_felnev."</td>
							<td>".$f_admin."</td>
							<td>".$f_bejelentkezve."</td>
							<td>".$f_emailcim."</td>
							<td>".$f_szul_date."</td>
							<td>".$f_reg_date."</td>
													
						  </tr>";
								}
							}	
						$conn->close();
						?>
						
						<!-- listázás felhasznalo  -->
						</table>
						
					<table  class="szavazatok" style=" width: 100%">
					
					<tr>
				
					
					<td>f_azon</td>
					<td>szav_id</td>
					<td>a</td>
					<td>b</td>
					<td>c</td>
					<td>d</td>
					
					</tr>
					<?php 	
				
					$servername = "localhost,root,,mydb";
					$username = "root";
					$password = "";
					$dbname = "mydb";
					$servername = "localhost";
					$conn = new mysqli($servername, $username, $password, $dbname);			
					if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
					} 
					
							$sql = "SELECT f_azon, szav_id, a, b, c, d FROM szavazatok";
									
							$result = $conn->query($sql);
							
							if ($result->num_rows > 0) {
								
								while($row = $result->fetch_assoc()) {	
								
								
								$f_azon = mb_convert_encoding($row["f_azon"],  'UTF-8');
								$szav_id = mb_convert_encoding($row["szav_id"],  'UTF-8');
								$a = mb_convert_encoding($row["a"],  'UTF-8');
								$b = mb_convert_encoding($row["b"],  'UTF-8');
								$c = mb_convert_encoding($row["c"],  'UTF-8');
								$d = mb_convert_encoding($row["d"],  'UTF-8');
								
								
								echo "<tr>
								<td>".$f_azon."</td>
								<td>".$szav_id."</td>
								<td>".$a."</td>
								<td>".$b."</td>
								<td>".$c."</td>
								<td>".$d."</td>
								
														
							  </tr>";
								}
							}	
						$conn->close();
						?>
						
						<!-- listázás felhasznalo  -->
						</table>	
						<table  class="admin" style=" width: 60%">
					
					<tr>
				
					
					<td >
					<div>
					<form method="Post" class="form_a_fh">
					<?php		$servername = "localhost,root,,mydb";
					$username = "root";
					$password = "";
					$dbname = "mydb";
					$servername = "localhost";
					$conn = new mysqli($servername, $username, $password, $dbname);			
					if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
					} 
					
							$sql = "select column_name from information_schema.columns where table_name ='felhasznalo'";
									
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								
								while($row = $result->fetch_assoc()) {	
								
								
								
								echo "<input type='text'  name='".$row['column_name']."' required><label>".$row['column_name']."</label><br><br>";
								}
							}	
						$conn->close();
						?>
						
						<input type="submit" class="admin_felvitel" value="Felvitel" name="felvitel">
						</form>
						<?php

						if(isset($_POST['felvitel']))
						{
							
							
							print_r($_POST);
							echo ($_POST[2]);
							
						}




						?>
						</div>
										
						
						
					</td>
					
					
					
					</tr>
						</table>
						
						
						
						
						
						
						
						</td>
						</tr>
	
	</table>
	</div>
	
	<div class="lista_a">
	<table class="tg" style=" width: 20%">
		<colgroup>
		<col style="width: 20%">
		<col style="width: 80%">
		</colgroup>
						<tr>
						<th class="kozepre" colspan="2">Témák</th>
						
						</tr>
						<tr>
						<td style="border-bottom:2px solid black;border-right:2px solid black;">id</td>
						<td >megnevezés</td>
						</tr>
	<?php /*	
				
					$servername = "localhost,root,,mydb";
					$username = "root";
					$password = "";
					$dbname = "mydb";
					$servername = "localhost";
					$conn = new mysqli($servername, $username, $password, $dbname);			
					if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
					} 
							$sql = "SELECT a,b from valami";
									
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								
								while($row = $result->fetch_assoc()) {	
								
								$pw = $row["b"];
								$pa = $row['a'];
								echo "<tr>
							<td class='tg'>".$pa."</td>
							<td>".$pw."</td>
						  </tr>";
								}
							}	
						$conn->close();
						*/?>
						</table>
	</div>
		
		
		
		
		
		
		
		
  </body>
 <footer class="kikapcs">
  <a href="aszf_letoltes.php">Aszf (fab)</a>
	
 
 
 </footer>
</html>