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

		$query="DELETE FROM tbl_gallery_beauty where id='$id'";
		$delete_beauty=$db->delete($query);
		  if ($delete_beauty) {
		  	$n="your information delete successfully!";
		  }

		  header('location:beauty-list.php')

?>