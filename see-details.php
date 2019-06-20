<?php include 'inc/header.php'; ?>

  <div id="seemore-section">
    
    <div class="container">
      
    <div class="row">

<?php 

      $id=$_GET['see-details'];

      $query4="SELECT * FROM tbl_notification where id='$id' ";
      $notification=$db->select($query4);
        if ($notification) {
           while ($result=$notification->fetch_assoc()) {


?>
    

    <div class="col-md-4" style="text-align: center;margin-top: 150px;">
      <img style="width: 95%;height: 210px;" src="admin/<?php echo $result['image']; ?>" alt=""/>
    </div>
    <div oncontextmenu="return false" class="col-md-8" style="margin-top: 20px;">
      <h4 class="text-center h2 text-capitalize">
        <asp:datagrid id="dgGrid1"><?php echo $result['title']; ?></asp:datagrid>
          
        </h4>

      <p class="text-justify mt-4 lead">
      <asp:datagrid id="dgGrid1"><?php echo $result['content']; ?></asp:datagrid>
       </p>
    </div>
      
      

    
<?php } } ?>

    </div>

    </div>


  </div>



<?php include 'inc/footer.php'; ?>
