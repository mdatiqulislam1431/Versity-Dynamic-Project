<?php include 'inc/header.php'; ?>

<!-- About Content Part - Box One ==================================================
================================================== -->
<div class="blankSeparator"></div>
<div class="container">
<?php 
      $query="SELECT * FROM tbl_about where column_no='1' order by id desc limit 2";
      $slide=$db->select($query);
        if ($slide) {
           while ($result=$slide->fetch_assoc()) {
?>
  <div class="one_third">
    <section class="aboutoneleft">
      <h4><?php echo $result['title']; ?></h4>
      <p class="text-justify"><?php echo $result['content']; ?></p>
      <p class="quote text-justify"><span style="font-weight: 700; font-size: 22px;">"</span><?php echo $result['quotes']; ?><span style="font-weight: 700; font-size: 22px;">"</span></p>
    </section>
  </div>
<?php } } ?>

  <!-- end one-third column ends here -->
<?php 
      $query="SELECT * FROM tbl_about where column_no='lastcolumn' order by id desc limit 1";
      $slide=$db->select($query);
        if ($slide) {
           while ($result=$slide->fetch_assoc()) {
?>

  <div class="one_third lastcolumn">
    <section class="aboutoneright">
      <h4><?php echo $result['title']; ?></h4>
      <img style="width: 100%;" src="admin/<?php echo $result['image']; ?>" alt=""/> </section>
  </div>

<?php } } ?>
  <!-- end one-third column ends here --> 
</div>
<!-- econtainer ends here --> 
<!-- About Content Part - Box Two ==================================================
================================================== -->
<div class="container">
  <div class="sepContainer1"></div>
  <!-- Toggle -->
<h2>Toggle</h2>
<?php 
      $query="SELECT * FROM tbl_query_toggle order by id desc limit 4";
      $slide=$db->select($query);
        if ($slide) {
           while ($result=$slide->fetch_assoc()) {
?>
  <div class="toggle-trigger"><?php echo $result['title']; ?></div>
  <div class="toggle-container">
    <p><?php echo $result['content']; ?></p>
  </div>
<?php } } ?>
  <!-- ENDS Toggle --> 
</div>
<div class="blankSeparator1"></div>

<?php include 'inc/footer.php'; ?>