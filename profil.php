<?php
session_start();



					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "mydb";
					$servername = "localhost";
					$conn = new mysqli($servername, $username, $password, $dbname);
									
					if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
					} 
							 
							$sql = "SELECT f_azon ,f_nev,f_jel,f_neme,f_tiltva,f_felnev,f_admin,f_bejelentkezve,f_emailcim,f_szul_date,f_reg_date FROM felhasznalo Where f_azon = '".$_SESSION["userid"]."'";
									
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								
								while($row = $result->fetch_assoc()) {	
								
								$pw = $row["f_jel"];
								$bec = $row["f_felnev"];
								$nev = $row["f_nev"];
								$em = $row["f_emailcim"];
								$szdatum = $row["f_szul_date"];
								$rdatum = $row["f_reg_date"];
								$neme = $row["f_neme"];

								}
							}
							
						$conn->close();



 
// recaptcha meghívása
//require_once "recaptchalib.php";
 

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
			$("#btn_jelsz").click(function(){
				timer_jelszo();
				
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
			  
			  <p></p>
			  <?php 
							if(isset($_POST['kijelentkezes'])){
								
								echo "<script> window.location.assign('change.php'); </script>";
								$_SESSION["userid"] = null;
							}
			  
			  
			  ?>
			  
			  
			  </div>
			 
			  
			 
	</navbar>
		<script>
		var kattintva = false;
		var v_s = 6;
		function timer_jelszo() {
			if(kattintva == false){
			timer_v_s();
			mutat_pw();
			setTimeout(mutat_pw, 5000);
			kattintva = true;
			}
			

		}
		function mutat_pw(){
			
			document.getElementById("span_pw").style.visibility = "visible";
			document.getElementById("span_sz_vissza").style.visibility = "visible";

		}
		function timer_v_s() {
			v_s--;
			document.getElementById('span_sz_vissza').innerHTML =v_s;
			if(v_s>=1)
			{
			var t = setTimeout(timer_v_s, 1000);
			}
			if(v_s==0)
			{
			document.getElementById("span_pw").style.visibility = "hidden";
			document.getElementById("span_sz_vissza").style.visibility = "hidden";
			v_s=6;
			kattintva = false;
			}
		}
		</script>
		<table class="tg" style=" width: 35%">
		<colgroup>
		<col style="width: 40%">
		<col style="width: 20%">
		</colgroup>
		  <tr>
			<th class="kozepre" colspan="2">Adataid</th>
			
		  </tr>
		   <tr>
			<td>Felhasználó azon.</td>
			<td><?php echo $_SESSION["userid"];?></td>
		  </tr>
		  <tr>
			<td>Teljes neved</td>
			<td><?php echo $nev;?></td>
		  </tr>
		  <tr>
			<td class="tg">Felhasználónév</td>
			<td ><?php echo $bec;?></td>
		  </tr>
		  <tr>
			<td class="tg">Nemed</td>
			<td ><?php if($neme == 1)echo "Férfi"; else echo "Nő";?></td>
		  </tr>
		   <tr>
			<td class="tg">Szül. dátuma</td>
			<td><?php echo $szdatum;?></td>
		  </tr>
		  <tr>
			<td class="tg">Reg. dátuma</td>
			<td><?php echo $rdatum;?></td>
		  </tr>
		  <tr>
			<td class="tg">Jelszavad</td>
			<td ><button id="btn_jelsz" >&#x1F441;</button><span id="span_pw"><?php echo $pw;?></span><span id="span_sz_vissza"></span></td>
		  </tr>
		  <tr>
			<td class="tg">Email</td>
			<td ><?php echo $em;?></td>
		  </tr>
		</table>
  </body>
 <footer class="kikapcs">
  <a href="aszf_letoltes.php">Aszf (fab)</a
	
 
 
 </footer>
</html>