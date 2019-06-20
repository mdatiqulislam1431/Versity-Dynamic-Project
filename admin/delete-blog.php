<?php 

  include '../library/config.php';
  include '../library/database.php'; 
  include '../library/helper.php'; 
  include '../library/session.php'; 

  $db = new Database();
  $fm = new Format();

?>

<?php 
		$id=$_GET['del_id'];
		$n="";

		$query="DELETE FROM tbl_blog where id='$id'";
		$delete_blog=$db->delete($query);
		  if ($delete_blog) {
		  	$n="your information delete successfully!";
		  }

		  header('location:blog-list.php')

?>