<?php

// todo: "och dina uppgifter är sparade"
	//
	error_reporting(-1);
	session_start();
	if (isset($_POST['logOutButton'])) {
		destroySession();
	}
	
	
	if(isset($_SESSION['loggedIn'])) {
		$message = null;
		loggedInUser();
	}
	
	else if (isset($_REQUEST['attempt'])) {
			
					$username = $_POST['username'];
					$password = $_POST['password'];
					
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;

		if ($username == "Admin" && $password == "Password") {
				
			$message = "Du lyckades logga in!";	
			loggedInUser($message);
			}
		else if (empty($username)) {
			$message = "fyll i användarnamn";
			loggedOutUser($message);
		}
		else if (empty($password)) {
			$message = "fyll i lösenord";
			loggedOutUser($message);
		}
		else {
			$message = "Användarnamn och/eller lösenord är felaktigt";
			loggedOutUser($message);
		}
	}
else {
	loggedOutUser();
}
			
			function loggedInUser($message = null) {
				$_SESSION['loggedIn'] = 'potato';
				// echo "är inne i loggedInUser";
		if ($message != null){
			echo $message;
			$message = null;
		}
		

			$loggedInHTML = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
        <html xmlns="http://www.w3.org/1999/xhtml"> 
          <head> 
             <title>Laboration. Inloggad</title> 
             <meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
             
          </head> 
          <body>
            <h1>Laborationskod xx222aa</h1>
				<h2>Admin är inloggad</h2>
				 	<form action="callesjävlaindex.php" method="post">

					<input type="submit" name="logOutButton" id="logOutButton"  value="Logga ut" />
				
			</form>
          </body>
        </html>';
		
			echo $loggedInHTML;
				/* echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
        <html xmlns="http://www.w3.org/1999/xhtml"> 
          <head> 
             <title>Laboration. Inloggad</title> 
             <meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
             
          </head> 
          <body>
            <h1>Laborationskod xx222aa</h1>
				<h2>Admin är inloggad</h2>
				 	 <a href="?logout"">Logga ut</a>
				 <p<p>Onsdag, den 11 September år 2013. Klockan är [10:24:57]. <p>
          </body>
        </html>' */
       
       			getTodayDate();
				}
		
				/* if(isset($_GET['loggedOutUser']))
				loggedOutUser(); */
					

			function loggedOutUser($message = null) {
						
			$usernameValue = null;
			
			if(isset($_POST['username'])) {
				 $usernameValue = $_POST['username'];
			}
					
				/* if (isset($_GET["logout"])); {
					// $_SESSION['views'] = 0;
					session_destroy();
				}
				 * */
			
				
				if ($message != null) {
					echo $message;
				}
				// echo "Är inne i loggedOutUser";
				echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'> 
        <html xmlns='http://www.w3.org/1999/xhtml'> 
          <head> 
             <title>Laboration. Inte inloggad</title> 
             <meta http-equiv='content-type' content='text/html; charset=utf-8' /> 
             
          </head> 
          <body>
            <h1>Laborationskod cj222hn</h1><h2>Ej Inloggad</h2>
				  
			<form action='callesjävlaindex.php?attempt' method='post'>
				<fieldset>
					
					<legend>Login - Skriv in användarnamn och lösenord</legend>
					<label for='UserNameI' >Användarnamn :</label>
					<input type='text' size='20' name='username' id='username' value ='$usernameValue' />
					<label for='PasswordID' >Lösenord  :</label>
					<input type='password' size='20' name='password' id='PasswordID'/>
					<label for='AutologinID' >Håll mig inloggad  :</label>
					<input type='checkbox' name='LoginView::Checked' id='AutologinID' />
					<input type='submit' name=''  value='Logga in' action?='?php loggedInUser();' />
				</fieldset>
			</form>
				 
          </body>
        </html>";
				getTodayDate();
			}
			
			function getTodayDate() {
					$day    = date("l");
					$daynum = date("j");
					$month  = date("F");
					$year   = date("Y");
					$hours	= date("H");
					$minutes= date("i");
					$seconds= date("s");
					
					switch($day)
					{
						case "Monday":    $day = "Måndag";  break;
						case "Tuesday":   $day = "Tisdag"; break;
						case "Wednesday": $day = "Onsdag";  break;
						case "Thursday":  $day = "Torsdag"; break;
						case "Friday":    $day = "Fredag";  break;
						case "Saturday":  $day = "Lördag";  break;
						case "Sunday":    $day = "Söndag";  break;
						//default:          $day = "Unknown"; break;
					}
					
					switch($month)
					{
						case "January":   $month = "Januari";    break;
						case "February":  $month = "Februari";   break;
						case "March":     $month = "Mars";     break;
						case "April":     $month = "April";     break;
						case "May":       $month = "Maj";       break;
						case "June":      $month = "Juni";      break;
						case "July":      $month = "Juli";      break;
						case "August":    $month = "Augusti";    break;
						case "September": $month = "September"; break;
						case "October":   $month = "Oktober";   break;
						case "November":  $month = "November";  break;
						case "December":  $month = "December";  break;
						//default:          $month = "Unknown";   break;
					}
					
					echo $day . " den " . $daynum . ". " . $month . " år " . $year . " [" . $hours . " : " . $minutes . " : " . $seconds . "]";
				}
		
		function destroySession() {
			session_destroy();
			$message = "du lyckades logga ut";
			loggedOutUser($message);
			exit;
		}





















