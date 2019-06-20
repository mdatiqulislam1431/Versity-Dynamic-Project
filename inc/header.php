<?php 

  include 'library/config.php';
  include 'library/database.php'; 
  include 'library/helper.php'; 
  include 'library/session.php'; 

  $db = new Database();
  $fm = new Format();

?>

<!DOCTYPE html>
<html lang="en">
<!--<![endif]-->
<head>
<!-- Basic Page Needs-->
<meta charset="utf-8">
<title>Proximet Responsive Site Template</title>
<meta name="description" content="Place to put your description text">
<meta name="author" content="">
<!-- Mobile Specific Metas-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
<!-- CSS-->
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/skeleton.css">
<link rel="stylesheet" href="css/screen.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" />
<!-- Favicons-->
<link rel="shortcut icon" href="images/favicon.png">
<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
<!-- Google Fonts-->
<link href='http://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<body>


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

<!-- Home - Content Part-->
<div id="header">
  <div class="container header"> 
    <!-- Header | Logo, Menu
    ================================================== -->
    <header>
      <div class="logo"><a href="index.php"><img src="images/logo.png" alt="" /></a></div>
      <div class="mainmenu">
        <div id="mainmenu">
          <ul class="sf-menu">
            <li><a href="index.php"><span class="home"><img src="images/home.png" alt="" /></span>Home</a></li>
            <li><a href="about.php"><span class="home"><img src="images/about.png" alt="" /></span>About</a></li>
            <li><a href="portfolio.php"><span class="home"><img src="images/portfolio.png" alt="" /></span>Portfolio</a>
              <ul>
                <li><a href="gallery.php">Portfolio Gallery</a></li>
              </ul>
            </li>
            <li><a href="blog.php"><span class="home"><img src="images/blog.png" alt="" /></span>Blog</a>
            </li>
            <li><a href="features.php"><span class="home"><img src="images/features.png" alt="" /></span>features</a></li>
            <li><a href="contact.php"><span class="home"><img src="images/contact.png" alt="" /></span>Contact</a></li>
          </ul>
        </div>
        
        <!-- Responsive Menu -->
        
        <form id="responsive-menu" action="#" method="post">
          <select>
            <option value="">Navigation</option>
            <option value="index.php">Home</option>
            <option value="about.php">About</option>
            <option value="portfolio.php">Portfolio</option>
            <option value="gallery.php">Portfolio Gallery</option>
            <option value="blog.php">Blog</option>
            <option value="singleblog.php">Single Post</option>
            <option value="features.php">Features</option>
            <option value="contact.php">Contact</option>
          </select>
        </form>
      </div>
    </header>
  </div>
</div>