<?php include 'file/header.php'; ?>
<?php include 'file/sitebar.php'; ?>
    
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Update Toggle</h1>
          <p> Update Toggle in Website</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Update Toggle</a></li>
        </ul>
      </div>

<?php 
      $id=$_GET['edit_id'];
      $n="";
      $m="";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       $title=mysqli_real_escape_string($db->link, $_POST['title']);
       $content=mysqli_real_escape_string($db->link, $_POST['content']);



        if ($title == "") {
            $n="please fill title field";
        }elseif ($content == "") {
            $n="please fill content field";
        }else{

              $query="UPDATE  tbl_query_toggle
                          SET 
                      title = '$title', 
                      content = '$content'
                         where
                        id='$id'
                          ";
              $update_toggle=$db->update($query);

                   if ($update_toggle) {
                     $m="Toggle information Update successfully. Thanks for beign with us!";
                   }else{
                     $n="Toggle not update";
                   }
          }
    }

?>


      <div class="row">
       <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Update Toggle</h3>
            <div class="tile-body">
              <form method="post" enctype="multipart/form-data">

              <p class="text-center" style="color: green; letter-spacing: 2px;"><?php echo $m; ?></p>
              <p class="text-center" style="color: red; letter-spacing: 2px;"><?php echo $n; ?></p>
<?php 
      $query="SELECT * FROM  tbl_query_toggle where id='$id' ";
        $edit_news=$db->select($query);
          if ($edit_news) {
              $result=$edit_news->fetch_assoc()

?>
                <div class="form-group">
                  <label class="control-label">Toggle Title:</label>
                  <input class="form-control" name="title" type="text" value="<?php echo $result['title']; ?>">
                </div>
                <div class="form-group">
                  <label class="control-label">Toggle Content:</label>
                  <textarea name="content" class="form-control" cols="30" rows="6"><?php echo $result['content']; ?></textarea>
                </div>
<?php } ?>           
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
         </form>
          </div>
        </div>



      </div>
    </main>
   <?php include 'file/footer.php'; ?>