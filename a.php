


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
					
							$sql = "select column_name from information_schema.columns where table_name ='felhasznalo'";
									
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								
								while($row = $result->fetch_assoc()) {	
								
								
								echo "".$row["column_name"];

								}
							}	
						$conn->close();
						?>
					