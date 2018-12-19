<?php
  session_start();
  ini_set('display_errors', 1);

  if ( isset($_POST['userCardNumber']) ) {
    $userCardNumber = $_POST['userCardNumber'];
    }

  $firstName = $_SESSION["firstName"];
  $lastName = $_SESSION["lastName"];
  $userEmail = $_SESSION["userEmail"];
  $userPhone = $_SESSION["userPhone"];
  $userNationality = $_SESSION["nationality"];

  $sId = $_SESSION["id"];
  $sCheckIn= $_SESSION["checkIn"];
  $sCheckOut = $_SESSION["checkOut"];
  $sRooms = $_SESSION["rooms"];

  $jRooms = json_decode($sRooms);
  $sData = file_get_contents('data.txt');
  $jData = json_decode($sData);
  $jHotel = $jData->hotels->$sId;
  $jRating = $jData->hotels->$sId->rating;


  // echo $sId;
  // echo $sCheckIn;
  // echo $sCheckOut;
  // echo $sRooms;

  ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Checkout :: Overview</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/thank-you.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/thank-you.js"></script>
  </head>
  <body>
  <div class="navbarContainer">
        <div id="navbar"> 
            <a class="nav-left">
                <svg class="logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" x="0px" y="0px">
                    <path d="m48.913 21.375c-15.747 0-23.936 12.271-23.797 24.542.193 17.861 17.855 24.542 23.797 49.08 5.955-24.542 23.83-31.611 23.83-49.08 0-12.271-9.249-24.542-23.822-24.542m.025 6.135l13.907 13.907-27.814 0 13.907-13.907m-9.841 15.649l19.658 0 0 19.682-19.658 0 0-19.682m3.349 3.349l0 5.522 5.497 0 0-5.522-5.497 0m7.465 0l0 5.522 5.522 0 0-5.522-5.522 0m-7.465 7.465l0 5.522 5.497 0 0-5.522-5.497 0m7.465 0l0 5.522 5.522 0 0-5.522-5.522 0"/>
                    <path d="m78.51 24.511c-.486 1.492-.996 3.063-1.508 4.639-1.61-.003-3.353.004-4.884.004 1.322.961 2.681 1.95 3.948 2.869-.495 1.53-1.035 3.189-1.508 4.642 1.265-.923 2.611-1.893 3.952-2.866 1.417 1.028 2.655 1.927 3.948 2.866-.491-1.502-.996-3.062-1.508-4.642 1.303-.944 2.713-1.97 3.952-2.869-1.634 0-3.396 0-4.881 0"/>
                    <path d="m19.379 24.511c-.486 1.492-.996 3.063-1.508 4.639-1.61-.003-3.353.004-4.884.004 1.322.961 2.681 1.95 3.948 2.869-.495 1.53-1.035 3.189-1.508 4.642 1.265-.923 2.611-1.893 3.952-2.866 1.417 1.028 2.655 1.927 3.948 2.866-.491-1.502-.996-3.062-1.508-4.642 1.303-.944 2.713-1.97 3.952-2.869-1.634 0-3.396 0-4.881 0"/>
                    <path d="m30.16 9.547c-.521 1.603-1.069 3.289-1.619 4.982-1.729-.003-3.601.004-5.245.004 1.42 1.032 2.879 2.094 4.24 3.081-.532 1.643-1.112 3.425-1.619 4.986 1.359-.992 2.804-2.033 4.244-3.078 1.522 1.104 2.852 2.07 4.24 3.078-.527-1.613-1.069-3.289-1.619-4.986 1.4-1.014 2.914-2.116 4.244-3.081-1.754 0-3.648 0-5.242 0"/>
                    <path d="m67.73 9.547c-.521 1.603-1.069 3.289-1.619 4.982-1.729-.003-3.601.004-5.245.004 1.42 1.032 2.879 2.094 4.24 3.081-.532 1.643-1.112 3.425-1.619 4.986 1.359-.992 2.804-2.033 4.244-3.078 1.522 1.104 2.852 2.07 4.24 3.078-.527-1.613-1.069-3.289-1.619-4.986 1.4-1.014 2.914-2.116 4.244-3.081-1.754 0-3.648 0-5.242 0"/>
                    <path d="m48.947 2.863c-.589 1.811-1.208 3.717-1.83 5.629-1.953-.004-4.069.004-5.927.005 1.605 1.166 3.253 2.366 4.791 3.482-.601 1.856-1.257 3.869-1.83 5.633 1.535-1.121 3.168-2.297 4.795-3.478 1.719 1.248 3.222 2.339 4.791 3.478-.596-1.823-1.208-3.716-1.83-5.633 1.582-1.145 3.292-2.391 4.795-3.482-1.982 0-4.121 0-5.922 0"/>
                </svg>
            </a> 
            
            <div class="nav-right">
                <div class="loginUser" id="loginUser">LOGIN</div>
                <div class="signUpUser" id="userSignUp">SIGNUP</div>
                
            </div> 
        </div>
    </div>
  <div class="content-wrapper">
    
  </div>
    <div class="headline-message">
      <h3 class="big-headline">Thank you</h3>
      <h4 class="second-headline">Your booking has now been confirmed</h4>
    </div>
    <div class="total-price">
    <div class="title bold"></div>
          <?php
              $iTotalPrice = 0;
              $iTax = 0;
              foreach ($jRooms as $key => $value) {
                  $iTotalPrice += $value * $jHotel->rooms->$key->price;
                  $iTax = $iTotalPrice * 0.25;
              }
          ?>
    
      <div class="booking-total">
          <span class="title bold total-price right-15px">Booking Total: </span> 
          <span class="float-right title total-price"> <?php echo " DKK $iTotalPrice"; ?></span>
          <div class="disclaimer-text faded-text"><p>The total price shown is the ammount  you will pay for the property</p></div>
      </div>
    </div>
    <div class="content-card">
      <div class="primary-guest top-margin left-margin">
        <h5 class="s13pxMargin card-headline">Your information</h5>
        <div class="guest-name s13pxMargin">
          <p class="bold">Name</p> 
          <?php
            echo $firstName;
            echo $lastName;
          ?>  
        </div>
        <div class="guest-email s13pxMargin">
           <p class="bold">Email</p> 
          <?php
            echo $userEmail; 
            ?>
        </div>
        <div class="guest-phone s13pxMargin">
          <p class="bold"> Phone number</p>
          <?php
            echo $userPhone;
          ?>
        </div>
        <div class="guest-nationality s13pxMargin">
          <p class="bold">Nationality</p>  
          <?php
            echo $userNationality;
          ?>
        </div>
      </div>
      <div class="booking-details top-margin">
        <div class="type-of-room">
        <p class='bold s13pxMargin card-headline'>Reservation</p>
          <?php 
            foreach ($jRooms as $key => $value) {
              if($value > 0){
                echo "<div class='bold'>
                  
                  <div class='type-of-room s13pxMargin'><span>".$jHotel->rooms->$key->name."</span> <span>x ".$value."</span></div>
                </div>";
              }
            } 
          ?>
        </div>
        <div class="check-in-date s13pxMargin" >
          <p class="bold">Check-in</p>
          <?php echo $sCheckIn?>
        </div>
        <div class="check-out-date s13pxMargin">
          <p class="bold">Check-out</p>
          <?php echo $sCheckOut?>
        </div>
        <div class="notice-text faded-text">Please note that additional supplements (e.g extra bed) are not added to this total</div>
      </div>
      <div class="card-number-info top-margin left-margin ">
        <h5 class="bold card-headline s13pxMargin">Payment method</h5>
        <div>
          <?php
            echo "<div>Card number:  $userCardNumber </div>"
          ?>
        </div>
      </div>
      <button><a href="hotelsTest.php">BACK TO FRONT PAGE</a></button>
    </div>


  <svg class=" upper-shape" width="948px" height="526px" viewBox="0 0 948 526" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" opacity="0.0695684524">
          <path d="M71.3861136,121.109031 C655.795371,-40.369677 948,-40.369677 948,121.109031 C948,363.327093 214.158341,688.619946 71.3861136,432.389268 C-23.7953712,261.568817 -23.7953712,157.808738 71.3861136,121.109031 Z" id="Rectangle" fill="#558CE5" transform="translate(474.000000, 263.000000) scale(-1, 1) translate(-474.000000, -263.000000) "></path>
      </g>
  </svg>

  <svg class="lower-shape" width="948px" height="526px" viewBox="0 0 948 526" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" opacity="0.0695684524">
          <path d="M71.3861136,121.109031 C655.795371,-40.369677 948,-40.369677 948,121.109031 C948,363.327093 214.158341,688.619946 71.3861136,432.389268 C-23.7953712,261.568817 -23.7953712,157.808738 71.3861136,121.109031 Z" id="Rectangle" fill="#558CE5" transform="translate(474.000000, 263.000000) scale(-1, 1) translate(-474.000000, -263.000000) "></path>
      </g>
  </svg>

</body>

</html>