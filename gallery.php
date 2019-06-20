
<?php include 'inc/header.php'; ?>
<!-- Portfolio Gallery Content Part-->
<div class="blankSeparator"></div>
<div class="container portfolio4columns">
  <ul class="tabs">
    <li><a class="active" href="#beauty">Beauty<span class="plus1">+</span></a></li>
    <li><a href="#woman">Woman<span class="plus1">+</span></a></li>
    <li><a href="#people">People<span class="plus1">+</span></a></li>
  </ul>
  <ul class="tabs-content clearfix">
    <li class="active clearfix" id="beauty">
        <div class="row">
<?php 
    $query="SELECT * FROM  tbl_gallery_Beauty order by id desc limit 20";
     $gallery_Beauty=$db->select($query);
       if ($gallery_Beauty) {
         while ($result=$gallery_Beauty->fetch_assoc()) {

?>
           <div class="col-md-3">
             <section class="boxfour"> <a style="width: 100%;height: 140px;" href="admin/<?php echo $result['image']; ?>" class="prettyPhoto[gal]"> <img style="width: 100%;height: 140px;" src="admin/<?php echo $result['image']; ?>" alt=""/></a> </section>
           </div>

<?php } } ?>       
        </div>

      <!-- one_fourth ends here -->
      <div class="clear"></div>
    </li>
    <li id="woman" class="clearfix">


        <div class="row">
<?php 
    $query="SELECT * FROM   tbl_gallery_woman order by id desc limit 20";
     $gallery_woman=$db->select($query);
       if ($gallery_woman) {
         while ($result=$gallery_woman->fetch_assoc()) {

?>
           <div class="col-md-3">
             <section class="boxfour"> <a style="width: 100%;height: 140px;" href="admin/<?php echo $result['image']; ?>" class="prettyPhoto[gal]"> <img style="width: 100%;height: 140px;" src="admin/<?php echo $result['image']; ?>" alt=""/></a> </section>
           </div>

<?php } } ?>       
        </div>



      <!-- four columns ends here -->
      <div class="clear"></div>
    </li>
    <li id="people" class="clearfix">


        <div class="row">
<?php 
    $query="SELECT * FROM  tbl_gallery_Beauty order by id desc limit 20";
     $gallery_Beauty=$db->select($query);
       if ($gallery_Beauty) {
         while ($result=$gallery_Beauty->fetch_assoc()) {

?>
           <div class="col-md-3">
             <section class="boxfour"> <a style="width: 100%;height: 140px;" href="admin/<?php echo $result['image']; ?>" class="prettyPhoto[gal]"> <img style="width: 100%;height: 140px;" src="admin/<?php echo $result['image']; ?>" alt=""/></a> </section>
           </div>

<?php } } ?>       
        </div>



      <!-- four columns ends here -->
      <div class="clear"></div>
    </li>
  </ul>
</div>
<div class="blankSeparator1"></div>
<?php include 'inc/footer.php'; ?>