<?php 
	include 'class/db.php';
	$myDb=new Database("localhost","root","","news_db");
	$user=$_POST['email'];
	$pass=$_POST['password'];
	$check_mail="SELECT * FROM users WHERE user='$user'";
	$result=$myDb->mysqli->query($check_mail);
	if ($result->num_rows>0) {
			$fetched=$result->fetch_assoc();

			if ($user==$fetched['user']) {
				if ($pass==$fetched['pass']) {
						session_start();
						$_SESSION['user']=$user;
						$_SESSION['pass']=$pass;
						header("Location:allnews.php");
				}
				else{
					echo "Parol sehvdir";
				}
			}
			else{
				echo "Login sehvdir";
			}
		}

?>