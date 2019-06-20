 

<?php include 'file/header.php'; ?>
<?php include 'file/sitebar.php'; ?>
    
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> All Portfolio</h1>
          <p>All Portfolio List form website</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">All Portfolio</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">All Portfolio</h3>
            <table class="table table-hover table-bordered">
              <thead>
                <tr class="text-center">
                  <th>ID</th>
                  <th>Title</th>
                  <th>Content</th>
                  <th>Detail</th>
                  <th>Link</th>
                  <th>Images</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

<?php 
    $query="SELECT * FROM  tbl_portfolio";
     $portfolio_list=$db->select($query);
       if ($portfolio_list) {

        $i=0;
          while ($result=$portfolio_list->fetch_assoc()) {

            $i++;

?>
                <tr>
                  <td class="text-center"><?php echo $i; ?></td>
                  <td class="text-center" width="20%"><?php echo $fm->textShorten($result['title'],40) ; ?></td>
                  <td class="text-center" width="25%"><?php echo $fm->textShorten($result['content'],40) ; ?></td>
                  <td class="text-center" width="25%"><?php echo $fm->textShorten($result['detail'],40) ; ?></td>
                  <td class="text-center" width="10%"><?php echo $result['link']; ?></td>
                  <td class="text-center" width="25%"><img style="width: 65%; height: 50px;" src="<?php echo $result['image']; ?>" alt=""></td>
                  <td class="text-center" width="20%">
                    <div class="btn-group">
                      <a class="btn btn-primary" target="_blank" href="edit-portfolio.php?edit_id=<?php echo $result['id']; ?>"><i class="fa fa-lg fa-edit"></i>
                      </a>
                      <a onclick="return confirm('are you sure delete this file');" class="btn btn-danger" href="delete-porfolio.php?del_id=<?php echo $result['id']; ?>"><i class="fa fa-lg fa-trash"></i>
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

        