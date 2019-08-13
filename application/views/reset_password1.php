

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
 <meta name="description" content="Soft Themez - Software Landing Page Template">
 <meta name="keywords" content="Software, Bootstrap4, modern, flat style, responsive, business, mobile, blog, bootstrap 4, html5, css3, jquery, js, gallery, slider, touch, creative, clean">
 <meta name="author" content="Askbootstrap">
 <title>Reset Password</title>
 <!-- Favicon Icon -->
 <link rel="icon" type="image/png" href="<?php echo base_url() ?>public/billboard.png">
 <!-- Bootstrap core CSS -->
 <link href="<?php echo base_url() ?>public/home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <!-- Font Awesome -->
 <link href="vendor/font/css/fontawesome-all.css" rel="stylesheet">
 <!-- Owl Stylesheets -->
 <link rel="stylesheet" href="<?php echo base_url() ?>public/home/vendor/owlcarousel/assets/owl.carousel.min.css">
 <link rel="stylesheet" href="<?php echo base_url() ?>public/home/vendor/owlcarousel/assets/owl.theme.default.min.css">
 <!-- Animate CSS  -->
 <link href="<?php echo base_url() ?>public/home/vendor/animate/animate.css" rel="stylesheet">
 <!-- Custom styles for this template -->
 <link href="<?php echo base_url() ?>public/home/css/osahan.css" rel="stylesheet">
 <!-- Custom styles for this template -->
 <link href="<?php echo base_url() ?>public/home/css/multi-page.css" rel="stylesheet">


 <link href="<?php echo base_url() ?>public/home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

 <link href="<?php echo base_url() ?>public/assets/tampilan_forgot/css/style.css" rel="stylesheet" type="text/css" media="all" />
 <!-- //Custom Theme files -->
 <!-- font-awesome icons -->
 <link href="<?php echo base_url() ?>public/assets/tampilan_forgot/css/font-awesome.css" rel="stylesheet"> 


 <link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

 <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

</head>
<body id="page-top">


  <header class="bg-primary text-white">
   <nav class="navbar navbar-expand-lg" id="mainNav">
    <div class="container">
     <a class="navbar-brand" href="<?php echo base_url() ?>"><img class="img-fluid" src="<?php echo base_url() ?>public/home/img/logo1.png" alt=""></a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
    </div>
  </div>
</nav>
</header>



<?php 
$reset_key = $this->uri->segment(3);
?>
<?php echo validation_errors(); ?>
<div class="main-agile">
  <p>
    <div class="content">
      <div class="top-grids-center">
        <div class="top-grids-center">

          <form class="form-horizontal" action="<?php echo base_url().'user/reset_password_validation'; ?>" method="post" enctype="multipart/form-data">

          <div class="signin-form recover-password">
            <h3>Reset Password</h3>
            <form class="form-horizontal" action="<?php echo base_url().'user/email_reset_password_validation'; ?>" method="post" enctype="multipart/form-data">
              <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo set_value('email') ?>" name="email" aria-describedby="emailHelp" placeholder="Email" required>

              <input type="password" class="form-control" id="exampleInputEmail1" name="password" aria-describedby="emailHelp" placeholder="Password">

              <input type="password" class="form-control" id="exampleInputEmail1" name="retype_password" aria-describedby="emailHelp" placeholder="Retype Password">

              <input type="text" value="<?php echo $reset_key; ?>" name="reset_key" hidden>

              <input type="submit" class="send" value="Submit Reset">
              <div class="signin-agileits-bottom"> 
                <p><a href="#" onclick="goBack()"><i class="fa fa-arrow-left" aria-hidden="true"></i> Cancel and go back to Sistem Informasi Billboard</a></p>    

              </div>
            </form>
          </div>
        </div>
        <div class="clear"> </div>
      </div>
    </div>
  </div>  








    


 <!-- Bootstrap core JavaScript -->
 <script src="<?php echo base_url() ?>public/home/vendor/jquery/jquery.min.js"></script>
 <script src="<?php echo base_url() ?>public/home/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- Plugin JavaScript -->
 <script src="<?php echo base_url() ?>public/home/vendor/jquery-easing/jquery.easing.min.js"></script>
 <!-- Scrolling Nav JavaScript -->
 <script src="<?php echo base_url() ?>public/home/vendor/scrolling-nav/scrolling-nav.js"></script>
 <!-- Contact Form JavaScript -->
 <script src="<?php echo base_url() ?>public/home/vendor/contact/jqBootstrapValidation.js"></script>
 <script src="<?php echo base_url() ?>public/home/vendor/contact/contact_me.js"></script>
 <!-- Owl Carousel javascript -->
 <script src="<?php echo base_url() ?>public/home/vendor/owlcarousel/owl.carousel.js"></script>
 <!-- WOW JavaScript -->
 <script src="<?php echo base_url() ?>public/home/vendor/animate/wow.min.js"></script>
 <!-- Custom JavaScript -->
 <script src="<?php echo base_url() ?>public/home/vendor/custom/custom.js"></script>

 <script>
  function goBack() {
    window.history.back();
  }
</script>
</body>
</html>