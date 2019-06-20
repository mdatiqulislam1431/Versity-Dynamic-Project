<?php include 'inc/header.php'; ?>
<!-- Blog Content Part ==================================================
================================================== -->
<div class="blankSeparator"></div>
<?php 
    $per_page = 5;
    if (isset($_GET['page'])) {
       $page = $_GET['page'];
    }else{
      $page = 1;
    }

     $start_form = ($page-1) * $per_page;


 ?>



<div class="container blog">

 
  <div class="two_third">
 <?php 
   $query= "SELECT * FROM tbl_blog ORDER BY id DESC limit $start_form, $per_page";
   $blog = $db->select($query);
    if ($blog) {
       $i = 0;
       while ($result = $blog->fetch_assoc()) {
        $i++;
?>
    <section class="post">
      <h2><?php echo $result['title']; ?></h2>
      <p class="meta"> <span class="left">Date: <strong><?php echo $result['post_date']; ?></strong></span> <span class="left">posted by <strong><?php echo $result['author']; ?></strong></span><span class="left tags">Category:  <?php echo $result['category']; ?></span> </p>

      <a href="admin/<?php echo $result['image']; ?>" class="prettyPhoto[gal]"><img src="admin/<?php echo $result['image']; ?>" alt=""/></a>

      <p><?php echo $fm->textShorten($result['detail'],300); ?></p>

      <a href="singleblog.php?blog_id=<?php echo $result['id']; ?> " class="buttonhome">&rarr; more</a> </section>
<?php } } ?>

<?php 
  $query = "select * from tbl_blog";
  $result =$db->select($query);
  $total_row=mysqli_num_rows($result);
  $total_pages=ceil($total_row / $per_page);

?>

<ul class="pagination">
<?php
    for($i=1; $i <= $total_pages; $i++){
      echo "<li class='first-page'>
               <a href='blog.php?page=".$i."'>".$i."</a>
      </li>";
  }  ?>
</ul>
  </div>

 

  <!-- ten columns ends here --> 
  
  <!-- Blog Sidebar ==================================================
================================================== -->
  <div class="one_third lastcolumn sidebar">
    <section class="first">
      <h3>Blog Category</h3>
      <div class="boxtwosep"></div>
      <ul class="blogList">
<?php 
    $sql =" SELECT * FROM tbl_cat ";
    $cat = $db->select($sql);
    if($cat){
    while($result = $cat->fetch_assoc()){
 
?>
        <li><a class="about" href="blog-search.php?blog_search=<?php echo $result['cat_name']; ?>" title=""><?php echo $result['cat_name']; ?></a></li>
<?php } } ?>
      </ul>
    </section>




  </div>


  <!-- six columns ends here --> 
</div>
  


<!-- container ends here --> 
<?php include 'inc/footer.php'; ?>