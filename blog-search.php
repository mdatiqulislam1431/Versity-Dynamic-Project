<?php include 'inc/header.php'; ?>

<div class="blankSeparator"></div>
<div class="container singleblog"> 
  <!-- Blog Post ==================================================
================================================== -->
  <div class="two_third">
<?php 

    $search = $_GET['blog_search'];
   $sql=" SELECT * FROM tbl_blog WHERE category like '%".$search."%'";
    $blog_search = $db->select($sql);
    if ($blog_search) {
      while ($result = $blog_search->fetch_assoc()) {
?>
 
 

    <section class="postone">
      <h2><?php echo $result['title']; ?></h2>
      <p class="meta"> <span class="left">Date: <strong><?php echo $result['post_date']; ?></strong></span> <span class="left">posted by <strong><?php echo $result['author']; ?></strong></span><span class="left tags">category: <?php echo $result['category']; ?></span>  </p>
      <a href="admin/<?php echo $result['image']; ?>" class="prettyPhoto[gal]"><img src="admin/<?php echo $result['image']; ?>" alt=""/></a>
      <p><?php echo $result['detail']; ?></p>
      
    </section>

<?php } } ?>


    <!-- Blog Comments ==================================================
================================================== -->
    <section class="comments">
      <div class="blankSeparator"></div>
      <div class="sepContainer2"></div>
      <h2>Comments</h2>
      <div class="sepContainer2"></div>
      <div class="blankSeparator"></div>
      <div class="boxtwosep"></div>
      <div id="comments">
        <ul id="articleCommentList">
          <li>
            <div class="commentMeta">
              <p>April 23nd</p>
              <img class="user" src="images/blog/1.png" alt="Default user icon" /> </div>
            <!-- end commentMeta -->
            <div class="commentBody">
              <h3><a href="#">John Smith</a></h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur consequat lectus risus. Donec scelerisqu turpis non ligula convallis viverra pharetra metus volutpat. Mauris eu mattis metus. Nullam et faucibus dui. In hac habitasse platea dictumst. Praesent ut massa arcu, eget fermentum leo. </p>
              <a href="#" class="buttonhome fl">more <span>+</span></a> </div>
            <!-- end commentBody --> 
          </li>
          <li>
            <div class="commentMeta">
              <p>April 23nd</p>
              <img class="user" src="images/blog/2.png" alt="Default user icon" /> <span class="adminIcon">ADMIN</span> </div>
            <!-- end commentMeta -->
            <div class="commentBody adminReply">
              <h3><a href="#">Admin</a></h3>
              <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor    quam,feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
              <a href="#" class="buttonhome fl">more <span>+</span></a> </div>
            <!-- end commentBody -->
            <ul>
            </ul>
          </li>
        </ul>
      </div>
      <!-- end Comments --> 
    </section>
    <!-- Blog Contact ==================================================
================================================== -->
    <div id="contactForm">
      <h2>Leave a comment</h2>
      <form action="process.php" method="post" id="contact_form">
        <div class="name">
          <label for="name">Your Name:</label>
          <p> Please enter your full name</p>
          <input id=name name=email type=text placeholder="e.g. Mr. John Smith" required />
        </div>
        <div class="email">
          <label for="email">Your Email:</label>
          <p> Please enter your email address</p>
          <input id=email name=email type=email placeholder="example@domain.com" required />
        </div>
        <div class="message">
          <label for="message">Your Message:</label>
          <p> Please enter your question</p>
          <textarea id=message name=message rows=6 cols=10 required></textarea>
        </div>
        <div id="loader">
          <input type="submit" value="Submit" />
        </div>
      </form>
    </div>
    <!-- end contactForm --> 
  </div>
  <!-- two_third ends here --> 
  <!-- Blog Sidebar ==================================================
================================================== -->
  <div class="one_third lastcolumn sidebar">
    <section class="first">
      <h3>Blog Category</h3>
      <div class="boxtwosep"></div>
      <ul class="blogList">
<?php 
    $sql =" SELECT * FROM tbl_cat ";
    $cat = $db->select($sql);
    if($cat){
    while($result = $cat->fetch_assoc()){
 
?>
        <li><a class="about" href="blog-search.php?blog_search=<?php echo $result['cat_name']; ?>" title=""><?php echo $result['cat_name']; ?></a></li>
<?php } } ?>
      </ul>
    </section>

  </div>
  <!-- one_third ends here --> 
</div>
<!-- container ends here -->

<div class="blankSeparator2"></div>
<?php include 'inc/footer.php'; ?>

