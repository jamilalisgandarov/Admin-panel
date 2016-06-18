<?php 
session_start();

	if(!isset($_SESSION['user'])){
		header("Location:index.php");
	}else{
include "class/db.php";
$myDB = new Database("localhost","root","","news_db");
$id=$_GET["id"];
$myDB->delete($id);
header("Location:allnews.php");
}
?>