 

<?php include 'file/header.php'; ?>
<?php include 'file/sitebar.php'; ?>
    
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Gallery woman List</h1>
          <p>Gallery woman form website</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Gallery woman List</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Gallery woman List</h3>
            <table class="table table-hover table-bordered">
              <thead>
                <tr class="text-center">
                  <th>ID</th>
                  <th>Beauty Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

<?php 
    $query="SELECT * FROM  tbl_gallery_woman";
     $gallery_woman=$db->select($query);
       if ($gallery_woman) {

        $i=0;
          while ($result=$gallery_woman->fetch_assoc()) {

            $i++;

?>
                <tr>
                  <td class="text-center"><?php echo $i; ?></td>
                  <td class="text-center" width="50%"><img style="width: 32%; height: 50px;" src="<?php echo $result['image']; ?>" alt=""></td>
                  <td class="text-center">
                    <div class="btn-group"> 
                      <a onclick="return confirm('are you sure delete this ficture');" class="btn btn-danger" href="delete-woman.php?del_id=<?php echo $result['id']; ?>"><i class="fa fa-lg fa-trash"></i>
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

        