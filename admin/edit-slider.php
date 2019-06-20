 <?php include 'file/header.php'; ?>
 <?php include 'file/sitebar.php'; ?>
    
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Update Slider </h1>
          <p>Update Slider of website</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Update Slider</a></li>
        </ul>
      </div>

<?php 
    $id =$_GET['edit_id'];
    $n = '';
    $m = '';
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
       $title = mysqli_real_escape_string($db->link, $_POST['title']);
       

            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

            if($title == ""){
                $n="please fill title field";
            }else{
            if(!empty($file_name)){

          
            if ($file_size >1048567) {
                 echo "<span class='error'>Image Size should be less then 1MB!
                 </span>";
                } elseif (in_array($file_ext, $permited) === false) {
                 echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                } else{
                move_uploaded_file($file_temp, $uploaded_image);


                $query = "UPDATE tbl_slide
                    SET
                    
                    title   = '$title',
                    image   = '$uploaded_image'
                   
                WHERE 
                id='$id'

                ";

                $updated_rows = $db->update($query);
                if ($updated_rows) {
                    $m="Slide Upload successfully. Thanks for beign with us!";
                }else {
                   $n="Slide not uploaded";
                }

            }

        }else{
            $query = "UPDATE tbl_slide 
                    SET

                    title  = '$title'

                WHERE 
                id='$id'

                ";

                $updated_rows = $db->update($query);
                if ($updated_rows) {
                   $m="Slide Upload successfully. Thanks for beign with us!";
                }else {
                   $n="Slide not uploaded";
                }
        }

    }

    }
 ?>

            <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Edit Slider</h3>
            <div class="tile-body">
              <form method="post" enctype="multipart/form-data">
              <p class="text-center" style="color: green; letter-spacing: 2px;"><?php echo $m; ?></p>
              <p class="text-center" style="color: red; letter-spacing: 2px;"><?php echo $n; ?></p>

              
<?php 
  $sql = "SELECT * FROM tbl_slide where id='$id' ";
  $up_slide = $db->select($sql);
  if ($up_slide) {
    while ($result = $up_slide->fetch_assoc()) {
?>
                <div class="form-group">
                  <label class="control-label">Edit Title</label>
                  <input type="text" class="form-control" name="title" value="<?php echo $result['title']; ?>">
                </div>
                <div class="form-group">
                  <div style="float:right;">
                    <img style="width: 110px;height: 70px; border: 1px solid #a09797; padding: 3px;" src="<?php echo $result['image']; ?>" alt="">
                  </div><br><br>
                  <label class="control-label">Image</label>   
                  <input type="file" class="form-control" name="image">
                </div>
<?php } } ?>
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