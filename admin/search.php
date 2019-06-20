 

<?php include 'file/header.php'; ?>
<?php include 'file/sitebar.php'; ?>
   
  <?php 
       $search= $_GET['search'];
       
      if (!isset($_GET['search']) || $_GET['search'] == NULL) {
          header('location:404.php');
      }else{
          $search= $_GET['search'];
      }

  ?>

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> All Blog</h1>
          <p> All Blog List form website</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#"> All Blog</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title"> All Blog</h3>
            <table class="table table-hover table-bordered">
              <thead>
                <tr class="text-center">
                  <th>ID</th>
                  <th>Title</th>
                  <th>Author</th>
                  <th>Date</th>
                  <th>Category</th>
                  <th>Detail</th>
                  <th>Images</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

<?php 
    $query="SELECT * FROM  tbl_blog WHERE title LIKE '%$search%' OR category LIKE '%$search%' OR author LIKE '%$search%' ";
     $blog_search=$db->select($query);
       if ($blog_search) {

        $i=0;
          while ($result=$blog_search->fetch_assoc()) {

            $i++;

?>
                <tr>
                  <td class="text-center"><?php echo $i; ?></td>
                  <td class="text-center" width="15%"><?php echo $fm->textShorten($result['title'],40) ; ?></td>
                  <td class="text-center" width="10%"><?php echo $fm->textShorten($result['author'],40) ; ?></td>
                  <td class="text-center" width="10%"><?php echo $fm->textShorten($result['post_date'],40) ; ?></td>
                  <td class="text-center" width="10%"><?php echo $result['category']; ?></td>
                  <td class="text-center" width="30%"><?php echo $fm->textShorten($result['detail'],80) ; ?></td>
                  <td class="text-center" width="20%"><img style="width: 66%; height: 50px;" src="<?php echo $result['image']; ?>" alt=""></td>
                  <td class="text-center" width="20%">
                    <div class="btn-group">
                      <a class="btn btn-primary" target="_blank" href="edit-blog.php?edit_id=<?php echo $result['id']; ?>"><i class="fa fa-lg fa-edit"></i>
                      </a>
                      <a onclick="return confirm('are you sure delete this file');" class="btn btn-danger" href="delete-blog.php?del_id=<?php echo $result['id']; ?>"><i class="fa fa-lg fa-trash"></i>
                      </a>
                    </div>
                  </td>
                </tr>
<?php } } ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </main>
   <?php include 'file/footer.php'; ?>

        