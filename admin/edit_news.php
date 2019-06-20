<?php include 'file/header.php'; ?>
<?php include 'file/sitebar.php'; ?>
    
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Edit News</h1>
          <p> Edit information in Website</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Edit News</a></li>
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

              $query="UPDATE tbl_news
                          SET 
                      title = '$title', 
                      content = '$content'
                         where
                        id='$id'
                          ";
              $update_news=$db->update($query);

                   if ($update_news) {
                     $m="News information Update successfully. Thanks for beign with us!";
                   }else{
                     $n="News not update";
                   }
          }
    }

?>


      <div class="row">
       <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Edit News</h3>
            <div class="tile-body">
              <form method="post" enctype="multipart/form-data">

              <p class="text-center" style="color: green; letter-spacing: 2px;"><?php echo $m; ?></p>
              <p class="text-center" style="color: red; letter-spacing: 2px;"><?php echo $n; ?></p>
<?php 
      $query="SELECT * FROM tbl_news where id='$id' ";
        $edit_news=$db->select($query);
          if ($edit_news) {
              $result=$edit_news->fetch_assoc()

?>
                <div class="form-group">
                  <label class="control-label">News Title:</label>
                  <input class="form-control" name="title" type="text" value="<?php echo $result['title']; ?>">
                </div>
                <div class="form-group">
                  <label class="control-label">News Content:</label>
                  <textarea name="content" placeholder="Enter content here.." class="form-control" cols="30" rows="6"><?php echo $result['content']; ?></textarea>
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