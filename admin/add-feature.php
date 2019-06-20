<?php include 'file/header.php'; ?>
<?php include 'file/sitebar.php'; ?>
    
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Add Feature</h1>
          <p>New add Feature in Website</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Add Feature</a></li>
        </ul>
      </div>

<?php 

      $n="";
      $m="";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       $title=mysqli_real_escape_string($db->link, $_POST['title']);
       $sub_title=mysqli_real_escape_string($db->link, $_POST['sub_title']);
       $content=mysqli_real_escape_string($db->link, $_POST['content']);
       $sub_content=mysqli_real_escape_string($db->link, $_POST['sub_content']);



        if ($title == "") {
            $n="please fill title field";
        }elseif ($sub_title == "") {
            $n="please fill sub_title field";
        }elseif ($content == "") {
            $n="please fill content field";
        }elseif ($sub_content == "") {
            $n="please fill sub_content field";
        }else{

              $query="INSERT INTO tbl_feature(title, sub_title, content, sub_content) values('$title', '$sub_title', '$content', '$sub_content')";
              $feature=$db->insert($query);

                   if ($feature) {
                     $m="feature information Upload successfully.";
                   }else{
                     $n="feature not uploaded";
                   }
          }
    }

?>


      <div class="row">
       <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Add Feature</h3>
            <div class="tile-body">
              <form method="post" enctype="multipart/form-data">

              <p class="text-center" style="color: green; letter-spacing: 2px;"><?php echo $m; ?></p>
              <p class="text-center" style="color: red; letter-spacing: 2px;"><?php echo $n; ?></p>

                <div class="form-group">
                  <label class="control-label">Title:</label>
                  <input class="form-control" name="title" type="text" placeholder="Enter title here..">
                </div>
                <div class="form-group">
                  <label class="control-label">Sub-Title:</label>
                  <input class="form-control" name="sub_title" type="text" placeholder="Enter sub title here..">
                </div>
                <div class="form-group">
                  <label class="control-label">Content:</label>
                  <textarea name="content" placeholder="Enter content here.." class="form-control" cols="30" rows="6"></textarea>
                </div>
                <div class="form-group">
                  <label class="control-label">Sub-Content:</label>
                  <textarea name="sub_content" placeholder="Enter sub content here.." class="form-control" cols="30" rows="6"></textarea>
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