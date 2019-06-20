 

<?php include 'file/header.php'; ?>
<?php include 'file/sitebar.php'; ?>
    
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> All Contact List</h1>
          <p>All Contact list in website from database</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">All Contact List</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">All Contact List</h3>
            <table class="table table-hover table-bordered">
              <thead>
                <tr class="text-center">
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Message</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

<?php 
    $query="SELECT * FROM  tbl_contact";
     $news_list=$db->select($query);
       if ($news_list) {

        $i=0;
          while ($result=$news_list->fetch_assoc()) {

            $i++;

?>
                <tr>
                  <td class="text-center"><?php echo $i; ?></td>
                  <td class="text-center" width="20%"><?php echo $fm->textShorten($result['name'],40) ; ?></td>
                  <td class="text-center" width="20%"><?php echo $fm->textShorten($result['email'],40) ; ?></td>
                  <td class="text-center" width="50%"><?php echo $fm->textShorten($result['message'],149) ; ?></td>
                  <td class="text-center">
                    <div class="btn-group">
                      <a class="btn btn-primary" href="#"><i class="fa fa-lg fa-edit"></i>
                      </a>
                      <a onclick="return confirm('are you sure delete this file');" class="btn btn-danger" href="#"><i class="fa fa-lg fa-trash"></i>
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

        