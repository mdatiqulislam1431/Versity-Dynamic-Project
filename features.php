
<?php include 'inc/header.php'; ?>
<!-- Features Content Part ==================================================
================================================== -->
<div class="blankSeparator"></div>
<div class="container resume">

<?php 
    $query="SELECT * FROM tbl_feature order by id desc limit 1";
     $feature=$db->select($query);
       if ($feature) {
         while ($result=$feature->fetch_assoc()) {

?>
  <h2><?php echo $result['title']; ?></h2>
  <p><?php echo $result['content']; ?></p>
  <div class="one_third">
    <h3><?php echo $result['sub_title']; ?></h3>
  </div>
  <div class="two_third lastcolumn">
    <p><?php echo $result['sub_content']; ?></p>
    <p><?php echo $result['sub_content']; ?></p>
  </div>

<?php } } ?>


<?php 
    $query="SELECT * FROM tbl_language";
     $language=$db->select($query);
       if ($language) {
         while ($result=$language->fetch_assoc()) {

?>
  <div class="one_third">
    <h3><?php echo $result['title']; ?></h3>
  </div>
  <div class="two_third lastcolumn">
    <div class="one_half">
      <h4><?php echo $result['sub_title']; ?></h4>
      <ul>
        <li><?php echo $result['content']; ?></li>
      </ul>
    </div>
    <div class="one_half lastcolumn">
      <h4><?php echo $result['sub_title']; ?></h4>
      <ul>
        <li><?php echo $result['content']; ?></li>
      </ul>
    </div>
  </div>

<?php } } ?>
  <div class="one_third">
    <h3>Awards</h3>
  </div>
  <div class="two_third lastcolumn">
    <div class="row">
<?php 
    $query="SELECT * FROM tbl_award";
     $award=$db->select($query);
       if ($award) {
         while ($result=$award->fetch_assoc()) {

?>
      <div class="col-md-3">
      <p><img style="width: 100%; height: 100px;" src="admin/<?php echo $result['image']; ?>" alt=""/></p>
      <p><?php echo $result['title']; ?></p>
    </div>
<?php } } ?>    
    </div>
    
  </div>
</div>
<div class="blankSeparator1"></div>
<?php include 'inc/footer.php'; ?>