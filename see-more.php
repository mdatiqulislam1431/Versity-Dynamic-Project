<?php include 'inc/header.php'; ?>

  <div id="seemore-section">
    
    <div class="container">
      
    <div class="row">

<?php 

       $id=$_GET['see_more'];

      $query2="SELECT * FROM tbl_news where id='$id' ";
      $news=$db->select($query2);
        if ($news) {
           while ($result=$news->fetch_assoc()) {
?>
       <div id="copy_disable" class="col-md-12">     
        <h4 class="text-center mt-3"><?php echo $result['title']; ?></h4>
<!--  copy protect righ click -->

     <p oncontextmenu="return false" class="text-justify lead">
      <asp:datagrid id="dgGrid1"><?php echo $result['content']; ?></asp:datagrid>
    </p>
    
<!--  //copy protect righ click -->
      <table>
        <tr>              
                  <td class="text-center">
                    <div class="btn-group">
                      <a style="font-size: 30px;" class="btn btn-outline-primary" href="#"><i class="fas fa-share-alt-square"></i>
                      </a>
                    </div>
                  </td>
                </tr>
      </table>    
               
        

       </div>
<?php } } ?>

    </div>

    </div>


  </div>



<?php include 'inc/footer.php'; ?>
