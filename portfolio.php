

<?php include 'inc/header.php'; ?>
<!-- Portfolio Project Content Part-->
 <?php 
    $per_page = 2;
    if (isset($_GET['page'])) {
       $page = $_GET['page'];
    }else{
      $page = 1;
    }

     $start_form = ($page-1) * $per_page;


 ?>


<?php 
   $query= "SELECT * FROM tbl_portfolio ORDER BY id DESC limit $start_form, $per_page";
   $portfolio = $db->select($query);
    if ($portfolio) {
       $i = 0;
       while ($result = $portfolio->fetch_assoc()) {
        $i++;
?>

<div class="blankSeparator"></div>
<div class="container portfolio">
  <div class="two_third">
    <div class="flexslider">
      <ul class="slides">
        <li><img style="width: 100%; height: 100%;" src="admin/<?php echo $result['image']; ?>" alt="" /></li>
      </ul>
    </div>
  </div>
  <div class="one_third lastcolumn">
    <h5 style="font-size: 20px;" ><?php echo $result['title']; ?></h5>
    <p><?php echo $result['content']; ?></p>
    <h4><?php echo $result['detail']; ?></h4>
    <p class="portfolio"><a href="#">view details</a> | <a href="<?php echo $result['link']; ?>"><?php echo $result['link']; ?></a></p>
  </div>

<?php } } ?>
</div>
<!-- Portfolio Pagination-->

<?php 
  $query = "select * from tbl_portfolio";
  $result =$db->select($query);
  $total_row=mysqli_num_rows($result);
  $total_pages=ceil($total_row / $per_page);

?>

<div class="container">
  <div class="blankSeparator"><!-- --></div>
  <div id="pagination" class="fl"> 
    <!-- Pagination -->
    <ul class="pagination">

<?php
for($i=1; $i <= $total_pages; $i++){
      echo "<li class='first-page'>
      <a href='portfolio.php?page=".$i."'>".$i."</a></li>";
}  ?>

    </ul>
  </div>


  <!-- end pagination --> 
</div>
<!-- end centerContainer -->

<div class="blankSeparator1"></div>
<?php include 'inc/footer.php'; ?>