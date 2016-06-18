<?php 
class Database
{
	public $db_name;
	public $db_user;
	public $db_pass;
	public $db_host;
	public $mysqli;
	public $myArray=[];
	public $searchedArray=[];
	function __construct($host,$user,$pass,$name)
	{
		$this->db_name=$name;
		$this->db_user=$user;
		$this->db_pass=$pass;
		$this->db_host=$host;
		$this->mysqli=mysqli_connect($host,$user,$pass,$name);
		if ($this->mysqli->connect_errno) {
			echo "error";
		}
	}
	function insert($title,$short_desc,$full_desc,$category,$img,$published){
		$insert="INSERT INTO news(title,short_desc,full_desc,category,img,published) VALUES('$title','$short_desc','$full_desc','$category','$img','$published')";
		$this->mysqli->query($insert);
	}
	function show(){
		$news="SELECT * FROM news";
		$result=$this->mysqli->query($news);
		if ($result->num_rows>0) {
			while ($fetched=$result->fetch_assoc()) {
				array_push($this->myArray,$fetched);
				
			}
			return $this->myArray;
		}
	}
	function edit($id){
		$xeber="SELECT * FROM news WHERE id=$id ";
		$result=$this->mysqli->query($xeber);

		if ($result->num_rows>0) {
			while ($fetched=$result->fetch_assoc()) {
				array_push($this->myArray,$fetched);
				
			}
			return $this->myArray;
		}
	}
	function update($id,$title,$short_desc,$full_desc,$category,$image,$published){
		$update="UPDATE news SET title = '$title', short_desc = '$short_desc', full_desc='$full_desc',category='$category', img='$image',published=$published WHERE id=$id";
		$updateQ=$this->mysqli->query($update);

	}
	function delete($id){
		$news="DELETE FROM news WHERE id='$id'";
		$result=$this->mysqli->query($news);
	}
	function addMain(){
		$news="SELECT * FROM news WHERE published=true";
		$result=$this->mysqli->query($news);
		if ($result->num_rows>0) {
			while ($fetched=$result->fetch_assoc()) {
				array_push($this->myArray,$fetched);	
			}
			return $this->myArray;
		}


	}
	function search($input){
		$news="SELECT * FROM news WHERE title LIKE '$input%'";
		$result=$this->mysqli->query($news);
		if ($result->num_rows>0) {
			while ($fetched=$result->fetch_assoc()) {
				array_push($this->searchedArray,$fetched);	
			}
			return $this->searchedArray;
		}
	}

}
 ?>

