
<?php
$page_title="Contact Us-Yash Constructions";
$page_description="For over 21 years, Yash Constructions has been at the forefront of civil engineering, sustainable housing and repair contracts. Delivering a high level of professional excellence while maintaining high ethics, commitment and par excellence customer service.";
$page_keywords='Buildings, bungalow,flat, office, Yash Constructions, civil, repair,civil contracts, customer service, quality,legal requirements';

include('header.php');

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// define variables and set to empty values
$nameErr = $emailErr = $subjectErr = $messageErr = "";
$name = $email = $subject = $message = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["subject"])) {
    $subjectErr = "Subject is required";
  } else {
    $subject = test_input($_POST["subject"]);
  }

  if (empty($_POST["message"])) {
    $messageErr = "Message is required";
  } else {
    $message = test_input($_POST["message"]);
  }
}

if(isset($_POST["submit"])){
  $server = "localhost";
  $userName = "yashconstruction";
  $password = "yash@constructions06";

  $con = mysqli_connect($server, $userName, $password);

  if(!$con){
    die("connection of the database failed due to " . mysqli_connect_error());
  }

  $name = $_POST["name"];
  $email = $_POST["email"];
  $subject = $_POST["subject"];
  $message= $_POST["message"];

  $sql = "INSERT INTO `yashconstructions`.`leads` (`name`, `email`, `subject`, `message`, `time`) VALUES ('$name', '$email', '$subject', '$message', current_timestamp())";

  if($con->query($sql) == true){
    $inserted = true;
    
    header('Location: contact.php');
    // unset($_POST);
    exit;
  }
  else {
    echo "ERROR: $sql <br> $con->error";
  }
  
  $con->close();

}

?>
    <style>
      .marker {
        background-image: url('images/mapbox-icon.png');
        background-size: cover;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        cursor: pointer;
      }
      .mapboxgl-popup {
        max-width: 200px;
      }

      .mapboxgl-popup-content {
        text-align: center;
        font-family: 'Open Sans', sans-serif;
      }
   
    </style>
    <!-- END nav -->
    
    <section class="home-slider owl-carousel serviceheight" style="height:450px!important;">
      <div class="slider-item" style="height:450px!important; background-image:url(images/c3.jpg);background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;

    position: relative;
    z-index: 0;" >
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Contact</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Contact</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

		<section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
            <h2 class="h4">Contact Information</h2>
          </div>
          <div class="w-100"></div>
         
          <div class="col-md-4">
            <p><span>Address:</span> SB-43 second floor, Highland Corporate center, Highstreet Mall, Kapurbawdi junction, Thane (w) 400607</p>
          </div>
          <div class="col-md-4">
            <p><span>Email:</span> <a class="textclr" href="mailto:info@yashconstructions.co.in">info@yashconstructions.co.in</a></p>
          </div>
          <div class="col-md-4">
            <p><span>Phone:</span> <a class="textclr" href="tel://+91 93247 57884">+91 93247 57884</a></p>
          </div>
        </div>
        <div class="row block-9">
          <div class="col-md-6 order-md-last pr-md-5">
            <div>
              <p>Have Any Queries...? Please let us know</p>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name" name="name" id="name" value="<?php echo "$name"?>">
                <span class="error"><?php echo $nameErr;?></span>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Email" name="email" id="email" value="<?php echo "$email"?>">
                <span class="error"><?php echo $emailErr;?></span>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject" name="subject" id="subject" value="<?php echo "$subject"?>">
                <span class="error"><?php echo $subjectErr;?></span>
              </div>
              <div class="form-group">
                <textarea id="" cols="30" rows="7" class="form-control" placeholder="Message" name="message" id="message" value="<?php echo "$message"?>"></textarea>
                <span class="error"><?php echo $messageErr;?></span>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5" name="submit" id="submit" onclick="return mess()">
              </div>
            </form>
          
          </div>

          <div class="col-md-6">
               <!--<img style="width:40vw" src="images/questions.svg" alt="any questions">-->
          <!-- <div id='map'></div> -->
          <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3767.4928737514347!2d72.97737706485353!3d19.21733988700703!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sSB-43%20second%20floor%2C%20Highland%20Corporate%20center%2C%20Highstreet%20Mall%2C%20Kapurbawdi%20junction%2C%20Thane%20(w)%20400607!5e0!3m2!1sen!2sin!4v1666963998417!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
    </section>

    


    <?php
      include('footer.php');  
    ?>

    
    <script>
    mapboxgl.accessToken = 'pk.eyJ1IjoieWFzaGNvbnN0cnVjdGlvbnMiLCJhIjoiY2tqZmx3MmM1MXBwYzMxc2N3MTBpZGk0eCJ9.evTdNdvks0KlaVqwPV6hRg';
    var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v11', // stylesheet location
    center: [72.97960084178999, 19.21731881589021], // starting position [lng, lat]
    zoom: 16 // starting zoom
    });

    var geojson = {
      type: 'FeatureCollection',
      features: [{
        type: 'Feature',
        geometry: {
          type: 'Point',
          coordinates: [72.97960084178999, 19.21731881589021]
        },
        properties: {
          title: 'Mapbox',
          description: 'AP Shah Institute of Technology'
        }
      }]
    };

    geojson.features.forEach(function(marker) {

    // create a HTML element for each feature
    var el = document.createElement('div');
    el.className = 'marker';

    // make a marker for each feature and add to the map
    new mapboxgl.Marker(el)
      .setLngLat(marker.geometry.coordinates)
      .addTo(map);
    });


    </script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-06Z9GEG3JM"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-06Z9GEG3JM');
</script>

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.html"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="js/main.js"></script>
  <script>
    function mess(){
      alert("Thank you for your response... We will reach you soon... :)");
    }
  </script>

  </body>

</html>