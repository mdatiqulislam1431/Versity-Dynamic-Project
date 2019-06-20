<?php include 'file/header.php'; ?>
<?php include 'file/sitebar.php'; ?>
    
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Add category</h1>
          <p>New add category in varsity</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Add category</a></li>
        </ul>
      </div>

<?php 

      $n="";
      $m="";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      
       $cat_name=mysqli_real_escape_string($db->link, $_POST['category']);



        if ($cat_name == "") {
            $n="please fill cat_name field";
        }else{

              $query="INSERT INTO tbl_cat(cat_name) values('$cat_name')";
              $news=$db->insert($query);

                   if ($news) {
                     $m="Add category Upload successfully. Thanks for beign with us!";
                   }else{
                     $n="Category not uploaded";
                   }
          }
    }

?>


      <div class="row">
       <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Add category</h3>
            <div class="tile-body">
              <form method="post" enctype="multipart/form-data">

              <p class="text-center" style="color: green; letter-spacing: 2px;"><?php echo $m; ?></p>
              <p class="text-center" style="color: red; letter-spacing: 2px;"><?php echo $n; ?></p>

                <div class="form-group">
                  <label class="control-label">Add category:</label>
                  <input class="form-control" name="category" type="text" placeholder="Enter Category here..">
                </div>
              
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add category</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
         </form>
          </div>
        </div>



      </div>
    </main>
   <?php include 'file/footer.php'; ?>