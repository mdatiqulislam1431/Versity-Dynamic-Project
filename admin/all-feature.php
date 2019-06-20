 

<?php include 'file/header.php'; ?>
<?php include 'file/sitebar.php'; ?>
    
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> All Feature List</h1>
          <p>All feature list in website from database</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">All feature List</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">All Feature List</h3>
            <table class="table table-hover table-bordered">
              <thead>
                <tr class="text-center">
                  <th>ID</th>
                  <th>Title</th>
                  <th>Sub_title</th>
                  <th>Content</th>
                  <th>Sub_content</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

<?php 
    $query="SELECT * FROM   tbl_feature";
     $feature_list=$db->select($query);
       if ($feature_list) {

        $i=0;
          while ($result=$feature_list->fetch_assoc()) {

            $i++;

?>
                <tr>
                  <td class="text-center"><?php echo $i; ?></td>
                  <td class="text-center" width="20%"><?php echo $fm->textShorten($result['title'],40) ; ?></td>
                  <td class="text-center" width="20%"><?php echo $fm->textShorten($result['sub_title'],40) ; ?></td>
                  <td class="text-center" width="30%"><?php echo $fm->textShorten($result['content'],80) ; ?></td>
                  <td class="text-center" width="30%"><?php echo $fm->textShorten($result['sub_content'],80) ; ?></td>
                  <td class="text-center">
                    <div class="btn-group">
                      <a onclick="return confirm('are you sure delete this file');" class="btn btn-danger" href="delete-feature.php?del_id=<?php echo $result['id']; ?>"><i class="fa fa-lg fa-trash"></i>
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

        