<?php
  session_start();
  require_once 'components/svg-stars.php';
  require_once 'components/calendar.php';

  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
  $userEmail = $_POST["userEmail"];
  $userPhone = $_POST["userPhone"];
  $userNationality = $_POST["nationality"];

  $_SESSION["firstName"] = $firstName;
  $_SESSION["lastName"] = $lastName;
  $_SESSION["userEmail"] = $userEmail;
  $_SESSION["userPhone"] = $userPhone;
  $_SESSION["nationality"] = $userNationality;


//   echo $firstName;
//   echo $lastName;
//   echo $userEmail;
//   echo $userPhone;
//   echo $userNationality;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Payment</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="css/checkout.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="css/payment.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/main.js"></script>
  <script src="js/confirm.js"></script>
  <script src="js/jquery.payform.min.js"></script>
  <script src="js/payment.js"></script>
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
  <div class="main-content">
      <div class="payment-card">
            <h4 class="payment-headline bold headline">Payment information</h4>
          <div class="form-wrapper">
              <form name="paymentForm" action="thank-you.php" method="post">
                  <div class="input-wrapper form-group owner">
                      <input type="text" name="userCardHolder" id="owner" class="form-control" placeholder="card holder" value="Arnar Godnes">
                  </div>
                  <div class="card-number input-wrapper">
                      <input id="cardNumber" class="is-required-input" type="text" name="userCardNumber" placeholder="Card Number" value="4111 1111 1111 1111">
                  </div>
                  <div class="exp-date-wrapper input-wrapper">
                      <div class="month-wrapper half-width">
												<select class="exp-date-month" id="expiration-date">
													<option value="01">January</option>
													<option value="02">February </option>
													<option value="03">March</option>
													<option value="04">April</option>
													<option value="05">May</option>
													<option value="06">June</option>
													<option value="07">July</option>
													<option value="08">August</option>
													<option value="09">September</option>
													<option value="10">October</option>
													<option value="11">November</option>
													<option value="12">December</option>
												</select>
												<div class="down-arrow">
													<svg class="dropdown-arrow" viewBox="0 0 12 7"><path d="M1 1l5 5 5-5"></path></svg>
												</div>
											 </div>
											 <div class="year-wrapper half-width">
													<select class=" exp-date-year">
															<option value="19"> 2019</option>
															<option value="20"> 2020</option>
															<option value="21"> 2021</option>
															<option value="22"> 2022</option>
															<option value="23"> 2023</option>
															<option value="24"> 2024</option>
													</select>
													<div class="down-arrow">
															<svg class="dropdown-arrow" viewBox="0 0 12 7"><path d="M1 1l5 5 5-5"></path></svg>
													</div>
                        </div>
                      
									</div>
									<div class="credit-card-types" id="credit_cards">
                        <img src="images/visa.jpg" id="visa" alt="Visa credit card">
                        <img src="images/mastercard.jpg" id="mastercard" alt="mastercard credit card">
                        <img src="images/amex.jpg" id="amex" alt="American Express credit card">
									</div>
									<div class="sec-number input-wrapper">
                      <input class="is-required-input" type="text" name="CVV/CVC" placeholder="CVV/CVC" id="cvv" >
									</div>
									<button id="confirm-purchase" type="submit">CONFIRM PAYMENT</button>
              </form>

          </div>
      </div>
  </div>
  <div class="side-bar"><!-- side bar -->
        <?php
            ini_set('display_errors', 1);
            $sId = $_SESSION["id"];
            $sCheckIn = $_SESSION["checkIn"];
            $sCheckOut = $_SESSION["checkOut"];
            $sRooms = $_SESSION["rooms"];


            $jRooms = json_decode($sRooms);
            $sData = file_get_contents('data.txt');
            $jData = json_decode($sData);
            $jHotel = $jData->hotels->$sId;
            $jRating = $jData->hotels->$sId->rating;
        ?>

        <div class="hotel-info-wrapper">
            <div class="hotel-name"><h3><?php echo $jHotel->name; ?></h3></div>
            <div class="hotel-address">
                <svg class="location-pin" width="14px" height="18px" viewBox="0 0 10 14" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="order-details-DESKTOP" transform="translate(-722.000000, -166.000000)" fill="#000000" fill-rule="nonzero">
                            <g id="location-and-rating" transform="translate(722.000000, 165.000000)">
                                <g id="Group-5">
                                    <g id="baseline-location_on-24px" transform="translate(0.000000, 1.000000)">
                                        <path d="M5,0 C2.23571429,0 0,2.191 0,4.9 C0,8.575 5,14 5,14 C5,14 10,8.575 10,4.9 C10,2.191 7.76428571,0 5,0 Z M5,6.65 C4.01428571,6.65 3.21428571,5.866 3.21428571,4.9 C3.21428571,3.934 4.01428571,3.15 5,3.15 C5.98571429,3.15 6.78571429,3.934 6.78571429,4.9 C6.78571429,5.866 5.98571429,6.65 5,6.65 Z" id="Shape"></path>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
                <span class="twenty-px faded-text"><?php echo $jHotel->address; ?></span>
            </div>
            <div class="hotel-rating"><?php 
                $sRatingDiv = "<div>
                                <span class='starsContainer'>
                                    $svgStars
                                    <div class='starsBackground'></div>
                                    <div class='starsFill' style='width:calc(60px*(#rating#/5)'></div>
                                </span>
                              </div>";
                $find = array('#rating#');
                $replace = array($jHotel->rating);

                echo str_replace($find,$replace,$sRatingDiv);
                ?>
            </div>
            <div class="cancel-text">
                <p class="faded-text">Cancellation and prepayment policies vary according to room type. Please check the room conditions when selecting your room.</p>
            </div>
        </div>
        <div class="hotel-info-card box-shadow-bar card-center element-in-card-center">
            <div class="room-image eight-margin-bottom" style="background-image:url(<?php echo $jHotel->images[2] ?>)">
                
            </div>
            <?php 
                foreach ($jRooms as $key => $value) {
                    if($value > 0){
                        echo "<div class='bold'>
                            <div class='type-of-room'><span>".$jHotel->rooms->$key->name."</span> <span>x ".$value."</span></div>
                        </div>";
                    }
                } 
            ?>
            <div class="cancel-button">
                <button><a href="#">Change</a></button>
            </div>
            <div class='check-dates'>
                <?php
                    echo "<div> 
                            <div class='small-margin-bottom'>
                                <div class='icon baseline'>$calendarIcon</div> <span class='semi-bold'>Check in:</span>
                                <span class='check-margin semi-bold'> $sCheckIn</span>
                            </div>
                            <div class='small-margin-bottom'>
                                <div class='icon baseline'>$calendarIcon</div> 
                                <span class='semi-bold'> Check out: </span>
                                <span class='check-margin semi-bold'> $sCheckOut</span>
                            </div>
                        </div>"
                ?>
                
            </div>
        </div>
        <div class='marginTop'>
            
        </div>

        <div class='box-shadow-bar card-center element-in-card-center'>
        <div class="title bold">Included in booking</div>
        <?php    
            foreach ($jHotel->amenities as $key => $value) {
                echo "<div><p>$value->text</p></div>";
            }
        ?>
        </div>

        <div class='box-shadow-bar card-center element-in-card-center semi-bold'>
            <div class="title bold">Your price summary</div>
                <?php
                    $iTotalPrice = 0;
                    $iTax = 0;
                    foreach ($jRooms as $key => $value) {
                        $iTotalPrice += $value * $jHotel->rooms->$key->price;
                        $iTax = $iTotalPrice * 0.25;
                        if($value > 0){
                            echo "<div class='small-margin-bottom'>
                                <div><span class='faded-text '>".$value." x ".$jHotel->rooms->$key->name."</span> <span class='float-right faded-text '> DKK ".$value * $jHotel->rooms->$key->price * 0.75."</span></div>
                            </div>";
                        } 
                    }
                ?>
            <div class="">
                <span class="faded-text">25% VAT</span> 
                <span class="float-right faded-text "><?php echo "$  $iTax"; ?></span>
            </div>
            <div class="marginTop">
                <span class="title bold total-price">Total:</span> 
                <span class="float-right title bold total-price"><?php echo "DKK $iTotalPrice"; ?></span>
            </div>
        </div>
    </div> <!-- end sidebar -->

</body>
</html>