 <?php include 'file/header.php'; ?>
 <?php include 'file/sitebar.php'; ?>
    
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Update About content </h1>
          <p>Update About content of website</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Update About content</a></li>
        </ul>
      </div>

<?php 
    $id =$_GET['edit_id'];
    $n = '';
    $m = '';
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
       $title=mysqli_real_escape_string($db->link, $_POST['title']);
       $content=mysqli_real_escape_string($db->link, $_POST['content']);
       $quote=mysqli_real_escape_string($db->link, $_POST['quote']);
       $category=mysqli_real_escape_string($db->link, $_POST['category']);
       

            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

            if ($title == "") {
            $n="please fill title field";
        }elseif ($content == "") {
            $n="please fill content field";
        }elseif ($quote == "") {
            $n="please fill quote field";
        }elseif ($category == "") {
            $n="please fill category field";
        }else{
            if(!empty($file_name)){

          
            if ($file_size >1048567) {
                 echo "<span class='error'>Image Size should be less then 1MB!
                 </span>";
                } elseif (in_array($file_ext, $permited) === false) {
                 echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                } else{
                move_uploaded_file($file_temp, $uploaded_image);


                $query = "UPDATE tbl_about
                    SET
                    
                    title   = '$title',
                    content   = '$content',
                    quotes   = '$quote',
                    column_no   = '$category',
                    image   = '$uploaded_image'
                   
                WHERE 
                id='$id'

                ";

                $updated_rows = $db->update($query);
                if ($updated_rows) {
                    $m="About Content Upload successfully. Thanks for beign with us!";
                }else {
                   $n="About Content not uploaded";
                }

            }

        }else{
            $query = "UPDATE tbl_about 
                    SET

                    content  = '$content'

                WHERE 
                id='$id'

                ";

                $updated_rows = $db->update($query);
                if ($updated_rows) {
                   $m="About Content Upload successfully. Thanks for beign with us!";
                }else {
                   $n="About Content not uploaded";
                }
        }

    }

    }
 ?>

            <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Update About content</h3>
            <div class="tile-body">
              <form method="post" enctype="multipart/form-data">
              <p class="text-center" style="color: green; letter-spacing: 2px;"><?php echo $m; ?></p>
              <p class="text-center" style="color: red; letter-spacing: 2px;"><?php echo $n; ?></p>

              
<?php 
  $sql = "SELECT * FROM tbl_about where id='$id' ";
  $up_slide = $db->select($sql);
  if ($up_slide) {
    while ($result = $up_slide->fetch_assoc()) {
?>
                <div class="form-group">
                  <label class="control-label">About Title:</label>
                  <input class="form-control" name="title" type="text" value="<?php echo $result['title']; ?>">
                </div>
                <div class="form-group">
                  <label class="control-label">About Category:</label>
                  <select name="category" class="form-control">

                       <option value="<?php echo $result['column_no']; ?>"><?php echo $result['column_no']; ?></option>

                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label">About Quotes:</label>
                  <input class="form-control" name="quote" type="text" value="<?php echo $result['quotes']; ?>">
                </div>
                <div class="form-group">
                  <label class="control-label">About Content:</label>
                  <textarea class="form-control" name="content" cols="30" rows="5"><?php echo $result['content']; ?></textarea>
                </div>
                <div class="form-group">
                  <img style="width: 10%;height: 61px;" src="<?php echo $result['image']; ?>" alt=""><br>
                  <label class="control-label">About Image:</label>
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