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

		$query="DELETE FROM tbl_about where id='$id'";
		$delete_content=$db->delete($query);
		  if ($delete_content) {
		  	$n="your information delete successfully!";
		  }

		  header('location:about-content-list.php')

?>