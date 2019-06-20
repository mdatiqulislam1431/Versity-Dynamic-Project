<?php include 'file/header.php'; ?>
<?php include 'file/sitebar.php'; ?>
    
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Add Portfolio</h1>
          <p>A New Add Portfolio of Website</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Add Portfolio</a></li>
        </ul>
      </div>

<?php 

      $n="";
      $m="";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       $title=mysqli_real_escape_string($db->link, $_POST['title']);
       $content=mysqli_real_escape_string($db->link, $_POST['content']);
       $link=mysqli_real_escape_string($db->link, $_POST['link']);
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
        }elseif ($content == "") {
            $n="please fill content field";
        }elseif ($link == "") {
            $n="please fill link field";
        }elseif ($detail == "") {
            $n="please fill detail field";
        }elseif ($file_size >1048567) {
                 echo "<span class='error'>Image Size should be less then 1MB!
                 </span>";
         }elseif (in_array($file_ext, $permited) === false) {
                 echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
          }else{

                   move_uploaded_file($file_temp, $uploaded_image);
              $query="INSERT INTO tbl_portfolio(title, content, detail, link, image) values('$title', '$content', '$detail', '$link', '$uploaded_image')";
              $add_portfolio=$db->insert($query);

                   if ($add_portfolio) {
                     $m="Portfolio Upload successfully. Thanks for beign with us!";
                   }else{
                     $n="Portfolio not uploaded";
                   }
          }
    }

?>


      <div class="row">
       <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Add Portfolio</h3>
            <div class="tile-body">
              <form method="post" enctype="multipart/form-data">

              <p class="text-center" style="color: green; letter-spacing: 2px;"><?php echo $m; ?></p>
              <p class="text-center" style="color: red; letter-spacing: 2px;"><?php echo $n; ?></p>

                <div class="form-group">
                  <label class="control-label">Title:</label>
                  <input class="form-control" name="title" type="text" placeholder="Enter title here..">
                </div>
                <div class="form-group">
                  <label class="control-label">content:</label>
                  <textarea name="content" class="form-control" cols="30" rows="5" placeholder="Enter content here.."></textarea>
                </div>
                <div class="form-group">
                  <label class="control-label">Link:</label>
                  <input class="form-control" name="link" type="text" placeholder="Enter link here..">
                </div>
                <div class="form-group">
                  <label class="control-label">detail:</label>
                  <textarea class="form-control" name="detail" cols="30" rows="5" placeholder="Enter detail here.."></textarea>
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