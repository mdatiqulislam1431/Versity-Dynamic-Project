 

<?php include 'file/header.php'; ?>
<?php include 'file/sitebar.php'; ?>
    
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> All notification List</h1>
          <p>All notification List form website</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">All notification List</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">All notification List</h3>
            <table class="table table-hover table-bordered">
              <thead>
                <tr class="text-center">
                  <th>ID</th>
                  <th>Slider Title</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

<?php 
    $query="SELECT * FROM  tbl_notification";
     $notification_list=$db->select($query);
       if ($notification_list) {

        $i=0;
          while ($result=$notification_list->fetch_assoc()) {

            $i++;

?>
                <tr>
                  <td class="text-center"><?php echo $i; ?></td>
                  <td class="text-center" width="20%"><?php echo $fm->textShorten($result['title'],40) ; ?></td>
                  <td class="text-center" width="30%"><?php echo $fm->textShorten($result['content'],80) ; ?></td>
                  <td class="text-center" width="30%"><img style="width: 32%; height: 50px;" src="<?php echo $result['image']; ?>" alt=""></td>
                  <td class="text-center" width="20%">
                    <div class="btn-group">
                      <a class="btn btn-primary" target="_blank" href="edit-notification.php?edit_id=<?php echo $result['id']; ?>"><i class="fa fa-lg fa-edit"></i>
                      </a>
                      <a onclick="return confirm('are you sure delete this file');" class="btn btn-danger" href="delete-notification.php?del_id=<?php echo $result['id']; ?>"><i class="fa fa-lg fa-trash"></i>
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

        