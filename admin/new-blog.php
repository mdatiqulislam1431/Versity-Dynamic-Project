<?php include 'file/header.php'; ?>
<?php include 'file/sitebar.php'; ?>
    
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Add New Blog</h1>
          <p>Add New Blog of Website</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Add New Blog</a></li>
        </ul>
      </div>

<?php 

      $n="";
      $m="";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       $title=mysqli_real_escape_string($db->link, $_POST['title']);
       $author=mysqli_real_escape_string($db->link, $_POST['author']);
       $date=mysqli_real_escape_string($db->link, $_POST['post_date']);
       $category=mysqli_real_escape_string($db->link, $_POST['category']);
       $detail=mysqli_real_escape_string($db->link, $_POST['detail']);

            $permited  = array('jpg', 'jpeg', 'png', 'JPG','PNG');
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
        }elseif ($file_size >1048567) {
                 echo "<span class='error'>Image Size should be less then 1MB!
                 </span>";
         }elseif (in_array($file_ext, $permited) === false) {
                 echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
          }else{

                   move_uploaded_file($file_temp, $uploaded_image);
              $query="INSERT INTO  tbl_blog(title, author, post_date, category, detail, image) values('$title', '$author', '$date', '$category', '$detail', '$uploaded_image')";
              $add_blog_cat=$db->insert($query);

                   if ($add_blog_cat) {
                     $m="New Blog Upload successfully. Thanks for beign with us!";
                   }else{
                     $n="Blog not uploaded";
                   }
          }
    }

?>


      <div class="row">
       <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Add Blog</h3>
            <div class="tile-body">
              <form method="post" enctype="multipart/form-data">

              <p class="text-center" style="color: green; letter-spacing: 2px;"><?php echo $m; ?></p>
              <p class="text-center" style="color: red; letter-spacing: 2px;"><?php echo $n; ?></p>

                <div class="form-group">
                  <label class="control-label">Title:</label>
                  <input class="form-control" name="title" type="text" placeholder="Enter title here..">
                </div>
                <div class="form-group">
                  <label class="control-label">Author:</label>
                  <input class="form-control" name="author" type="text" placeholder="Enter author here..">
                </div>
                <div class="form-group">
                  <label class="control-label">Category:</label>
                  <select name="category" class="form-control">
                     <option value="">Select Category</option>
  <?php 
      $query="SELECT * FROM tbl_cat";
        $b_cat=$db->select($query);
          if ($b_cat) {
            while ($result=$b_cat->fetch_assoc()) {
  ?>
                     <option value="<?php echo $result['cat_name']; ?>"><?php echo $result['cat_name']; ?></option>
 <?php } } ?>
                  </select>

                  

                </div>
                <div class="form-group">
                  <label class="control-label">Date:</label>
                  <input class="form-control" name="post_date" type="text" placeholder="Enter post date here..">
                </div>
                <div class="form-group">
                  <label class="control-label">Detail:</label>
                  <textarea name="detail" class="form-control" cols="30" placeholder="Enter detail here.." rows="5"></textarea>
                </div>
                <div class="form-group">
                  <label class="control-label">Image:</label>
                  <input type="file" class="form-control" name="image">
                </div>
              
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Upload</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
         </form>
          </div>
        </div>



      </div>
    </main>
   <?php include 'file/footer.php'; ?>