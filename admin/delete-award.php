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

		$query="DELETE FROM tbl_award where id='$id'";
		$delete_award=$db->delete($query);
		  if ($delete_award) {
		  	$n="your information delete successfully!";
		  }

		  header('location:award-list.php')

?>