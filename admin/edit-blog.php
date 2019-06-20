 <?php include 'file/header.php'; ?>
 <?php include 'file/sitebar.php'; ?>
    
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Update Blog </h1>
          <p>Update Blog of website</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Update Blog</a></li>
        </ul>
      </div>

<?php 
    $id =$_GET['edit_id'];
    $n = '';
    $m = '';
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
       $title=mysqli_real_escape_string($db->link, $_POST['title']);
       $author=mysqli_real_escape_string($db->link, $_POST['author']);
       $date=mysqli_real_escape_string($db->link, $_POST['post_date']);
       $category=mysqli_real_escape_string($db->link, $_POST['category']);
       $detail=mysqli_real_escape_string($db->link, $_POST['detail']);
       

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
        }elseif ($author == "") {
            $n="please fill author field";
        }elseif ($category == "") {
            $n="please fill category field";
        }elseif ($date == "") {
            $n="please fill date field";
        }elseif ($detail == "") {
            $n="please fill detail field";
        }else{
            if(!empty($file_name)){

          
            if ($file_size >1048567) {
                 echo "<span class='error'>Image Size should be less then 1MB!
                 </span>";
                } elseif (in_array($file_ext, $permited) === false) {
                 echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                } else{
                move_uploaded_file($file_temp, $uploaded_image);


                $query = "UPDATE tbl_blog
                    SET
                    
                    title   = '$title',
                    author   = '$author',
                    post_date   = '$date',
                    category   = '$category',
                    detail   = '$detail',
                    image   = '$uploaded_image'
                   
                WHERE 
                id='$id'

                ";

                $updated_rows = $db->update($query);
                if ($updated_rows) {
                    $m="Blog Upload successfully. Thanks for beign with us!";
                }else {
                   $n="Blog Content not uploaded";
                }

            }

        }else{
            $query = "UPDATE tbl_blog 
                    SET

                    detail  = '$detail'

                WHERE 
                id='$id'

                ";

                $updated_rows = $db->update($query);
                if ($updated_rows) {
                   $m="Blog Upload successfully. Thanks for beign with us!";
                }else {
                   $n="Blog not uploaded";
                }
        }

    }

    }
 ?>

            <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Update Blog</h3>
            <div class="tile-body">
              <form method="post" enctype="multipart/form-data">
              <p class="text-center" style="color: green; letter-spacing: 2px;"><?php echo $m; ?></p>
              <p class="text-center" style="color: red; letter-spacing: 2px;"><?php echo $n; ?></p>

              
<?php 
  $sql = "SELECT * FROM tbl_blog where id='$id' ";
  $up_Blog = $db->select($sql);
  if ($up_Blog) {
    while ($result = $up_Blog->fetch_assoc()) {
?>
                <div class="form-group">
                  <label class="control-label">Blog Title:</label>
                  <input class="form-control" name="title" type="text" value="<?php echo $result['title']; ?>">
                </div>
                <div class="form-group">
                  <label class="control-label">Blog Category:</label>
                  <select name="category" class="form-control">

                       <option value="<?php echo $result['category']; ?>"><?php echo $result['category']; ?></option>

                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label">Blog Author:</label>
                  <input class="form-control" name="author" type="text" value="<?php echo $result['author']; ?>">
                </div>
                <div class="form-group">
                  <label class="control-label">Blog Date:</label>
                  <input class="form-control" name="post_date" type="text" value="<?php echo $result['post_date']; ?>">
                </div>
                <div class="form-group">
                  <label class="control-label">Blog Detail:</label>
                  <textarea class="form-control" name="detail" cols="30" rows="5"><?php echo $result['detail']; ?></textarea>
                </div>
                <div class="form-group">
                  <img style="width: 10%;height: 61px;" src="<?php echo $result['image']; ?>" alt=""><br>
                  <label class="control-label">Blog Image:</label>
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