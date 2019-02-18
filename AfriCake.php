<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Cake P | Orders</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

    <!-- Font awesome -->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">   
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">    
    <!-- Date Picker -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datepicker.css">    
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="assets/css/jquery.fancybox.css" type="text/css" media="screen" /> 
    <!-- Theme color -->
    <link id="switcher" href="assets/css/theme-color/default-theme.css" rel="stylesheet">     

    <!-- Main style sheet -->
    <link href="style.css" rel="stylesheet">  
    
<!--      bootstrap  -->
<!--
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
-->

   
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>        
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Prata' rel='stylesheet' type='text/css'>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>  
  <!-- Pre Loader -->
  <div id="aa-preloader-area">
    <div class="mu-preloader">
      <img src="assets/img/preloader.gif" alt=" loader img">
    </div>
  </div>
  <!--START SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>
      <span>Top</span>
    </a>
  <!-- END SCROLL TOP BUTTON -->

  <!-- Start header section -->
  <header id="mu-header">  
    <nav class="navbar navbar-default mu-main-navbar" role="navigation">  
      <div class="container">
        <div class="navbar-header">
          <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- LOGO -->                                                        
          <a class="navbar-brand" href="index.html"><img src="assets/img/Clogo.png" alt="Logo img"></a> 
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right mu-main-nav">
            <li><a href="#mu-slider">HOME</a></li>
            <li><a href="#mu-about-us">ABOUT US</a></li>                       
            <li><a href="#mu-restaurant-menu">MENU</a></li> 
            <li><a href="#mu-contact">CONTACT</a></li> 
            
          </ul>                            
        </div><!--/.nav-collapse -->       
      </div>          
    </nav> 
  </header><br><br><br>
  <!-- End header section -->
 

<!--php-form-->

<?php require_once 'process.php' ?>
    <span class="top"></span>
    <?php
    if (isset($_SESSION['message'])):  ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">

            <?php
          echo $_SESSION ['message'];
          unset($_SESSION['message']);
        ?>
        </div>
        <?php endif ?>


        <?php
//    connect to the DB
   $mysqli = new mysqli('localhost', 'root', 'localhost8080', 'cake_system') or die(mysqli_error(mysqli));
    
    //run query
    $result = $mysqli->query("SELECT * FROM customers") or die($mysqli->error);

    ?>    <br><br>
          <div class="text-center" id="top-text">
           <img src="assets/img/img2.jpeg" alt="" class="text-center">
           <h3 class="text-center">African Cake | Place Your Order!</h3>
           <h3 class="text-center" style="color:red">Price Ksh 1785</h3>
           <h4 class="text-center" style="color:red">Payments made after delivery</h4>
           </div>
           <hr>
           <h3 style="color: brown" class="text-center"><b>Your Orders</b></h3>
            <div class="row justify-content-center">
                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th> Full Name</th>
                                <th> Phone Number</th>
                                <th> Address</th>
                                <th> Price</th>
                                <th> Cake type</th>
                                <th colspan="2">Action</th>

                            </tr>
                        </thead>
                        <?php
                    while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td>
                                    <?php echo $row['id']; ?>
                                 </td>
                                <td>
                                    <?php echo $row['name']; ?> 
                                </td>
                                 <td>
                                    <?php echo $row['phone']; ?> 
                                </td>
                                <td>
                                    <?php echo $row['address']; ?> 
                                </td>
                                 <td>
                                    <?php echo $row['price']; ?> 
                                </td>
                                 <td>
                                    <?php echo $row['type']; ?> 
                                </td>
                                
                                <td>
                                    <a href="Kcake.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Cancel Order</a>
                                </td>


                            </tr>
                            <?php endwhile; ?>


                    </table>

                </div>


                <?php
    
    
    function pre_r($array) {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }
    
    
    ?>
                  <div class="container">
                    <div class="row justify-content-center">
                        <form action="process.php" method="POST">
                           <input type="hidden" name="id" value="<?php echo $id ?>">
                            <div class="form-group">
                                <label for="name">Full Name </label>
                                <input type="text" name="name" class="form-control" value="<?php echo $name ?>" placeholder="Enter Full Name" required>
                            </div>

                            <div class="form-group">
                                <label for="location">Phone Number</label>
                                <input type="text" name="phone" class="form-control" value="<?php echo $phone ?>" placeholder="Phone Number" required>
                            </div>
                              
                               <div class="form-group">
                                <label for="location">Address</label>
                                <input type="text" name="address" class="form-control" value="<?php echo $address ?>" placeholder="Your Address" required>
                            </div>
                               
                            <div class="form-group">
                                <label for="location">Price</label>
                                <input type="text" name="price" class="form-control" value="Ksh 1785" placeholder="Price" required disabled>
                            </div>
                            
                            <div class="form-group">
                                <label for="location">Cake Type</label>
                                <input type="text" name="type" class="form-control" value="African Cake" placeholder="Cake Type" required disabled>
                            </div>
                            
                           
                           
                            

                            <div class="form-group">
                               <?php if ($update == true ): ?>
                               <button type="submit" class="btn btn-info" name="update">Update</button>
                              <?php else:  ?>
                                <button type="submit" class="btn btn-primary" name="save">Place Order</button>
                                <?php endif;  ?>
                            </div>
                        </form>
                    </div>
                    </div>
            </div>


<!--end php file-->



    <!-- Start Contact section -->
  <section id="mu-contact">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-contact-area">
            <div class="mu-title">
              <span class="mu-subtitle">Get In Touch</span>
              <h2>Contact Us</h2>
              <i class="fa fa-spoon"></i>              
              <span class="mu-title-bar"></span>
            </div>
            <div class="mu-contact-content">
              <div class="row">
                <div class="col-md-6">
                  <div class="mu-contact-left">
                    <form class="mu-contact-form">
                      <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Email">
                      </div>                      
                      <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" id="subject" placeholder="Subject">
                      </div>
                      <div class="form-group">
                        <label for="message">Message</label>                        
                        <textarea class="form-control" id="message" cols="30" rows="10" placeholder="Type Your Message"></textarea>
                      </div>                      
                      <button type="submit" class="mu-send-btn">Send Message</button>
                    </form>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mu-contact-right">
                    <div class="mu-contact-widget">
                      <h3>Office Address</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia temporibus corporis ea non consequatur porro corrupti hic voluptatibus assumenda, doloribus.</p>
                      <address>
                        <p><i class="fa fa-phone"></i> (850) 457 6688</p>
                        <p><i class="fa fa-envelope-o"></i>contact@cloud.io</p>
                        <p><i class="fa fa-map-marker"></i>368 St. Kisumu City, Florida, Kenya</p>
                      </address>
                    </div>
                    <div class="mu-contact-widget">
                      <h3>Open Hours</h3>                      
                      <address>
                        <p><span>Monday - Friday</span> 9.00 am to 12 pm</p>
                        <p><span>Saturday</span> 9.00 am to 10 pm</p>
                        <p><span>Sunday</span> 10.00 am to 12 pm</p>
                      </address>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Contact section -->


  <!-- Start Footer -->
  <footer id="mu-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <div class="mu-footer-area">
           <div class="mu-footer-social">
            <a href="#"><span class="fa fa-facebook"></span></a>
            <a href="#"><span class="fa fa-twitter"></span></a>
            <a href="#"><span class="fa fa-google-plus"></span></a>
            <a href="#"><span class="fa fa-linkedin"></span></a>
            <a href="#"><span class="fa fa-youtube"></span></a>
          </div>
          <div class="mu-footer-copyright">
            <p>Designed by <a rel="nofollow" href="http://www.markups.io/">Cloud Media</a></p>
          </div>         
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- End Footer -->
  
  <!-- jQuery library -->
  <script src="assets/js/jquery.min.js"></script>  
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="assets/js/bootstrap.js"></script>   
  <!-- Slick slider -->
  <script type="text/javascript" src="assets/js/slick.js"></script>
  <!-- Counter -->
  <script type="text/javascript" src="assets/js/waypoints.js"></script>
  <script type="text/javascript" src="assets/js/jquery.counterup.js"></script>
  <!-- Date Picker -->
  <script type="text/javascript" src="assets/js/bootstrap-datepicker.js"></script> 
  <!-- Mixit slider -->
  <script type="text/javascript" src="assets/js/jquery.mixitup.js"></script>
  <!-- Add fancyBox -->        
  <script type="text/javascript" src="assets/js/jquery.fancybox.pack.js"></script>

  <!-- Custom js -->
  <script src="assets/js/custom.js"></script> 

  </body>
</html>