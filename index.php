<?php include 'inc/header.php'; ?>
<!-- Home Content Part - Slider-->
<div class="flexslider">
  <ul class="slides">
<?php 
      $query="SELECT * FROM tbl_slide";
      $slide=$db->select($query);
        if ($slide) {
           while ($result=$slide->fetch_assoc()) {
?>
    <li> <a href="#"><img style="width: 100%; height: 400px;" src="admin/<?php echo $result['image'];?>" alt="" /></a>
      <p class="flex-caption"><?php echo $result['title'];  ?></p>
    </li>
<?php } } ?>
  </ul>
</div>


<!-- Home Content Part - Box One-->
<div class="blankSeparator"></div>
<div class="container">
  <div class="info">
    <div class="row">
<?php 
      $query2="SELECT * FROM tbl_news order by id desc limit 3";
      $news=$db->select($query2);
        if ($news) {
           while ($result=$news->fetch_assoc()) {
?>
      <div class="col-md-4">
   
        <h4><?php echo $result['title']; ?></h4>
        <p class="text-justify"><?php echo $fm->textShorten($result['content'],350) ; ?></p>
        <a href="see-more.php?see_more=<?php echo $result['id']; ?>">&rarr; See more</a> 

      </div>
<?php } } ?>
    </div>

  </div>
</div>
<!-- extra -->

<!-- container ends here --> 
<!-- Home Content Part - Box Two ==================================================
================================================== -->
<div class="container clients">
  <div class="sepContainer"></div>
  <h2>Our Clients</h2>
<?php 
      $query3="SELECT * FROM tbl_client order by id desc limit 6";
      $client=$db->select($query3);
        if ($client) {
           while ($result=$client->fetch_assoc()) {
?>
  <div class="one_sixth lastcolumn">
    <img style="width: 92%;height: 130px;" class="ml-5" src="admin/<?php echo $result['image']; ?>" alt=""/> 
  </div>
<?php } } ?>
  <!-- end one_sixth lastCol --> 
</div>
<!-- end container --> 
<!-- Home Content Part - Box Three ==================================================
================================================== -->
<div class="container boxthree">
  <div class="sepContainer1"><!-- --></div>
  <div class="blankSeparator"></div>
  <div class="row">
<?php 
      
      $query4="SELECT * FROM tbl_notification order by id desc limit 3";
      $notification=$db->select($query4);
        if ($notification) {
           while ($result=$notification->fetch_assoc()) {
?>
    <div class="col-md-4">

    <section class="boxthreeleft">

      
      
      <img style="width: 100%;height: 210px;" src="admin/<?php echo $result['image']; ?>" alt=""/>
      
      <a class="btn btn-primary btn-sm" style="color: white; margin-top: 5px;" href="admin/<?php echo $result['image']; ?>" download>Download</a>



      <h4><?php echo $result['title']; ?></h4>
      <p><?php echo $fm->textShorten($result['content'],150) ; ?></p>
      <a class ="simple" href="see-details.php?see-details=<?php echo $result['id']; ?>">+ Learn more</a> </section>

    </div>
<?php } } ?>
  </div>


</div>
<!-- container ends here -->
<div class="blankSeparator1"></div>
<?php include 'inc/footer.php'; ?>

