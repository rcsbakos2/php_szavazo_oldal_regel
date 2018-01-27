<?php
@ob_start();
 session_start();
?>


<?php header('Content-type: text/html; charset=utf-8'); 
										
										

?>

<!doctype html>
<html lang="hu">
  <head>
	
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
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<script>
	$(document).ready(function(){
			$(".button_login").click(function(){
				$(".button_reg").toggle(500);
				$(".div-login").toggle(500);
				$(".div-login-fejlec").toggle(500);
				 var x = document.getElementsByClassName("div-regisztracio");
						 		x[0].style.display = "none";
								
								 var y = document.getElementsByClassName("div-regisztracio-fejlec");
								 y[0].style.display = "none";
			});
			$(".button_reg").click(function(){
				$(".button_login").toggle(500);
				$(".div-regisztracio").toggle(500);
				$(".div-regisztracio-fejlec").toggle(500);
				var x = document.getElementsByClassName("div-login-fejlec");
								x[0].style.display = "none";
								
								var y = document.getElementsByClassName("div-login");
								y[0].style.display = "none";
				
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
	function log_marad(){
		
								var x = document.getElementsByClassName("div-login-fejlec");
								x[0].style.display = "block";
								
								var y = document.getElementsByClassName("div-login");
								y[0].style.display = "block";
		
	}
	function reg_marad(){
	var x = document.getElementsByClassName("div-regisztracio");
	x[0].style.display = "block";
								
	var y = document.getElementsByClassName("div-regisztracio-fejlec");
	y[0].style.display = "block";
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
			$sikereskitoltes = FALSE;
			echo "<style>.div_change{
			
				display:none;
			
					}.bejelentkezve{display:block;}.div-regisztracio{display:none;}.div-regisztracio-fejlec{display:none;}</style>";
		}
		else{
			
			echo "Nincs bejelentkezve felhasználó.";
			
		}
	?>
		<!--////////////////////////////////////////////////////////////////-->
		<div class="div_change">
		
			<button class="button_login" href="#" >
				<span class="skew-fix">Belépés</span>
			</button>
				
			<button class="button_reg" href="#">
			  <span class="skew-fix">Regisztráció </span>
			</button>
		
		</div>
		<!--/////////////////////////////////////////////////////////////////////////////-->
		
		<!-- Ide jön be a regisztrációs div --> 
		<?php $hibas_jelszo = False;
				$hibas_nev = False;
				$hibas_email = False;
				$hibas = FALSE;
				$sikereskitoltes = FALSE;
				?>
	

		<?php
				
				
			if(isset($_POST['reg_fnev'])){
								
				$fel_nev = $_POST['reg_tnev'];
				$f_jel = $_POST['reg_pw'];
				$f_tiltva = 0;
				$f_felnev = $_POST['reg_fnev'];
				$f_admin = 0;
				$f_bejelentkezve = 0;
				$f_emailcim = $_POST['reg_email'];
				$f_szul_date = $_POST['reg_szn'];
				$f_reg_date = date("Y-m-d");
				$f_neme = $_POST['taskOption'];
				$f_jel = $_POST['reg_pw'];
				$jelszok = $_POST['reg_pwk'];
				
				
					
					if(preg_match_all("/.{5,}/",$f_jel))
					{
						
											$fel_fnev = $_POST['reg_fnev'];	
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "mydb";
					$servername = "localhost";
					$conn = new mysqli($servername, $username, $password, $dbname);
									
					if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
					} 		
							$sql = "SELECT * FROM felhasznalo Where  f_felnev ='".$fel_fnev."'";
									
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								
								while($row = $result->fetch_assoc()) {	
								 
								 $hibas_nev = True;
								 $hibas = TRUE;
								}
							}
							else
							{
								$sql = "SELECT * FROM felhasznalo Where  f_emailcim ='".$f_emailcim."'";
									
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
									
									while($row = $result->fetch_assoc()) {	
									 
									 $hibas_email = True;
									 $hibas = TRUE;
									}
								}
								else
								{
								
										if($f_jel == $jelszok)
										{
											
											$hibas_jelszo = False;
										}
										else{
											$hibas_jelszo = True;
											$hibas = TRUE;
											
										}
										if($hibas_jelszo == 0 and $hibas_email == 0 and $hibas_nev == 0)
										{
										$conn = new mysqli($servername, $username, $password, $dbname);
														
										if ($conn->connect_error) {
												die("Connection failed: " . $conn->connect_error);
										}  
												
													$f_szul_date = $_POST['reg_szn'];
													$f_reg_date = date('Y-m-d');
													
													$sql = "INSERT INTO felhasznalo( f_nev, f_jel, f_neme, f_tiltva, f_felnev, f_admin, f_bejelentkezve, f_emailcim, f_szul_date, f_reg_date) 
													VALUES ('".$fel_nev."','".$f_jel."','".$f_neme."',0,'".$f_felnev."',0,0,'".$f_emailcim."','".$f_szul_date."','".$f_reg_date."')";
												
													
														
														
													if ($conn->query($sql) === TRUE ) {
														
														$sikereskitoltes = TRUE;
														
													} else {
														
														$hibas = TRUE;
														
													}
												
												
												
											$conn->close();	
											

											
											
											
										}
								}
							}
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
					}
					else{$hibas = TRUE;}
					
					
					
			
									
					

			}
			   ?>
	
	
	<!--////////////////////////////////////////Reg-->
	
	<div class="div-regisztracio-fejlec" >
	<br><h2>Bizalommal kezeljük az adatait!</h2>
	</div>
	<div class="div-regisztracio" >
		<br>
		<form  action="" method="POST" class="form-login" >
			
			
			   
				<img title='Teljes név' class='login_img_zar'src='kepek/fh_tn.png' alt=''/> <input type="text" class="input-felh"  <?php if(empty($_POST['reg_tnev'])) echo "placeholder=' Teljes Név'"; else echo "value='".$_POST['reg_tnev']."'";?>  name="reg_tnev"  required/> <br>
			   
				<img title='Felhasználónév' class='login_img_zar'src='kepek/fh_fel.png' alt=''/> <input type="text" class="input-felh"  <?php if(empty($_POST['reg_fnev'])) echo "placeholder=' Felhasználónév'"; else echo "value='".$_POST['reg_fnev']."'";?>  name="reg_fnev" required/>  <?php if($hibas_nev)echo "<div class='proba'>*<span class='tooltiptext'>Foglalt felhasználónév!</span></div>" ;?><br>
				
				<img title='Jelszó' class='login_img_zar'src='kepek/kk.png' alt=''/><input type="password" class="input-pw" placeholder=" Jelszó"  name="reg_pw"  required/><?php if($hibas_jelszo) echo "<div class='proba'>!<span class='tooltiptext'>A jelszavak nem egyeznek!</span></div>" ;?><br> 
				
				<img title='Jelszó mégegyszer' class='login_img_zar'src='kepek/nm.png' alt=''/><input type="password" class="input-pw" placeholder=" Jelszó"  name="reg_pwk" required/><div class="proba">*<span class="tooltiptext">Minimum 5 karakter!</span></div> <br>
				
				<img title='E-mail cím' class='login_img_zar'src='kepek/icon.png' alt=''/><input type="email" class="input-pw" <?php if(empty($_POST['reg_nev'])) echo "placeholder=' em@ail.ed'"; else echo "value='".$_POST['reg_email']."'";?> name="reg_email"  required/><?php if($hibas_email)echo "<div class='proba'>*<span class='tooltiptext'>Már regisztrált email!</span></div>" ;?><br>
					
				<img title='Születési dátum' class='login_img_zar'src='kepek/31.png' alt=''/><input type="date" class="input-pw" name="reg_szn" <?php if(!empty($_POST['reg_szn'])) echo "value='".$_POST['reg_szn']."'";?>   required/><br>
				
				<img title='Neme' class='login_img_zar'src='kepek/nem.png' alt='' /><select name="taskOption"  class="input-pw" required><option  value="">Kérem válasszon!</option><option value="1">Férfi</option><option value="2">Nő</option></select><br><br>
				
				<input type="checkbox" class="input_span" name="nm_aszf" value="aszf" required>Efogadja a regisztrációs...<a href="aszf_letoltes.php">Aszf</a>
				
				<input type="submit" class="login-submit" name="kk"value="Regisztráció" />
				
				<p></p>
				 <?php if($hibas){echo "<hr></hr>"; echo "<div class='span_reg_fail'>Kérem töltse ki <span class='green'>helyesen</span> az ürlapot!</div><br>";
						echo "<script>reg_marad();echo </script>";
						
				 }
						if($sikereskitoltes) {echo "<hr></hr>";echo "<div class='span_reg_fail'><span class='green'>Sikeres</span> regisztráció!</div><br>";echo "<script>reg_marad();echo </script>";
						$sikereskitoltes = FALSE;}
				?>
			
		</form>
		
		</div>
		<!--/////////////////////////////////////////////////////reg vége-->
		<div class="div-login-fejlec">
		<p></p><h2>Login panel</h2>
		</div>
		<div class="div-login">
		<br>
		<form  action="" method="POST" class="form-login" >
			
			  
				<img title="Felhasználónév" class='login_img_nevtabla'src='kepek/nmk.png' alt='Login_iksz'/> <input type="text" class="input-felh" placeholder=" felhasználónév" value="" name="inputom_felh"  required/><br>
				
				<img title="Jelszó" class='login_img_zar'src='kepek/kk.png' alt='Login_iksz'/><input type="password" class="input-pw" placeholder="  jelszó" value="" name="inputom_pw"  required/><br>
				<input type="submit" class="login-submit" value="Bejelentkezés" onclick="setTimeout(myTimer, 3000);"/>
		</form>		
				<div class="div_login_elf">
								 <p class="mini_p"><button class="pw_ff" onclick=email_mutat()>Elfelejtette a jelszavát?</button>
								
								 <form  action="" method="POST" class="form-mini-n-email" >
				
				
										  
										 <label class="mini_label">
										
										 <input type="email" class="mini_input_n_email" placeholder=" ön@email.cime" value="" name="mini_input_n_email"  required/><input type="submit" class="mini_submit" value="küldöm" />
										 </label></p>
										
																	 </form>							 
				</div>
				
				
				
			
		
		<?php
				function sqlkapcsolat(){
					
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "mydb";
					$servername = "localhost";
					$conn = new mysqli($servername, $username, $password, $dbname);
									
					if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
					} 

				}
				if(isset($_POST['inputom_felh'])){
					$nev = $_POST['inputom_felh'];
					$f_jel = $_POST['inputom_pw'];
					
					
					
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "mydb";
					$servername = "localhost";
					$conn = new mysqli($servername, $username, $password, $dbname);
									
					if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
					} 
							$sql = "SELECT f_nev,f_azon FROM felhasznalo Where f_felnev = '".$nev."' and f_jel ='".$f_jel."'";
									
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								
								while($row = $result->fetch_assoc()) {	
								
								
								echo "<p class='green'>Sikeres bejelentkezés!<img class='login_sikeres_kep'src='kepek/pipa.png' alt='Login_pipa'/></p>";
								echo "<script> window.location.assign('change.php'); </script>";
								$fhid = $row["f_azon"];
								$_SESSION["userid"] = $fhid;
								echo "idm:". $fhid;
								
								
								echo "session id ".$_SESSION["userid"];
								}
							}
							else {
								
								echo "<div class='div_mini'>";
								echo "<p class='p_elfelejt'>A felhasználó és a jelszó nem egyezik!<img class='login_kep_iksz'src='kepek/iksz.png' alt='Login_iksz'/> ";
								echo "<script> log_marad();</script>";
								
																	
								echo "</div>";
								//echo "<hr></hr>";
								
								
							}
						$conn->close();
				}
				if(isset($_POST['mini_input_n_email'])){
									
									
							$email = $_POST['mini_input_n_email'];
							
							
							
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "mydb";
					$servername = "localhost";
					$conn = new mysqli($servername, $username, $password, $dbname);
									
					if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
					} 
									
							$sql = "SELECT f_emailcim FROM felhasznalo Where  f_emailcim ='".$email."'";
									
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								
								while($row = $result->fetch_assoc()) {	
								
								
								echo "<div class='div_mini_email_sikeres'>";
								
								echo "<p class='p_kiemelve'>Az email <span class='green'>sikeresen</span> elküldve a/az $email címre!<img class='login_sikeres_kep'src='kepek/pipa.png' alt='Login_pipa'/></p>";
								echo "<script>log_marad();</script>";
								echo "</div>";
								}
							}
							else {
								
								echo "<div class='div_mini_mini_sikertelen'>";
								echo "<form  action='' method='POST'  >";
								echo "<script>log_marad();</script>";
							//echo "<hr></hr>";
										echo "<p class='p_elfelejt'>A megadott email nem szerepel az adatbázisunkban!<img class='login_img_email_sikertelen'src='kepek/iksz.png' alt='Login_iksz'/></p> ";

										
																	echo "<br>";
								echo "</div>";
								
								////

								
								
								
							}
							$conn->close();		
				}

		?>
	</div>
	<navbar>
  <div class="bejelentkezve">
  <br>
  

 
    <a class="a_kij" href="profil.php">Profil</a> <p></p>
  <a class="a_kij_x" href="form1sql.php">Szavazz!</a>
  
  <form onsubmit="tovabb()" method="POST" class="form-menu" >
  <input class="btn_kij" type="submit" value="Kijelentkezés" name="kijelentkezes" ><br>
  
  
  </form>
  
  <p> </p>
  <?php 
				if(isset($_POST['kijelentkezes'])){
					
					echo "<script> window.location.assign('change.php'); </script>";
					$_SESSION["userid"] = null;
				}
  
  
  ?>
  
  
  </div>
  </navbar>
 
  </body>
 <footer class="kikapcs">
  <a href="aszf_letoltes.php">Aszf (fab)</a
	
 
 
 </footer>
</html>