<?php
  session_start();
  require_once 'components/svg-stars.php';
  require_once 'components/calendar.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/checkout.css">
    <style>
        .marginTop{margin-top:30px;}
    </style>
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
    <div class="main-content box-shadow-card">
        <!-- <div class="alt-guests">
        </div> -->
        <h3 class="booking-headline">Booking details</h3>
        <div class="main-guest-card">
            <h4 class="guest-headline">Primary Guest Information</h4>
            <div class="form-wrapper">
                <form id="frmPrimaryGuest" action="paymentTest.php" method="POST">
                    <div class="first-name input-wrapper ">
                        <input class="is-required-input " type="text" name="firstName" placeholder="first name" >
                    </div>
                    <div class="last-name input-wrapper">
                        <input class="is-required-input" type="text" name="lastName" placeholder="last name" >
                    </div>
                    <div class="form-email input-wrapper">
                        <input class="is-required-input" type="text" name="userEmail" placeholder="email address" >
                    </div>
                    <div class="form-confirm-email input-wrapper">
                        <input class="is-required-input" type="text" name="confirmEmail" placeholder="confirm email" >
                    </div>
                    <div class="form-phone  input-wrapper">
                        <input class="is-required-input" type="text" name="userPhone" placeholder="phone number" >
                    </div>
                    <div class="form-nationality input-wrapper">
                        <select class="field-nationality" name="nationality">
                            <option value="">Nationality</option>
                            <option value="afghan">Afghan</option>
                            <option value="albanian">Albanian</option>
                            <option value="algerian">Algerian</option>
                            <option value="american">American</option>
                            <option value="andorran">Andorran</option>
                            <option value="angolan">Angolan</option>
                            <option value="antiguans">Antiguans</option>
                            <option value="argentinean">Argentinean</option>
                            <option value="armenian">Armenian</option>
                            <option value="australian">Australian</option>
                            <option value="austrian">Austrian</option>
                            <option value="azerbaijani">Azerbaijani</option>
                            <option value="bahamian">Bahamian</option>
                            <option value="bahraini">Bahraini</option>
                            <option value="bangladeshi">Bangladeshi</option>
                            <option value="barbadian">Barbadian</option>
                            <option value="barbudans">Barbudans</option>
                            <option value="batswana">Batswana</option>
                            <option value="belarusian">Belarusian</option>
                            <option value="belgian">Belgian</option>
                            <option value="belizean">Belizean</option>
                            <option value="beninese">Beninese</option>
                            <option value="bhutanese">Bhutanese</option>
                            <option value="bolivian">Bolivian</option>
                            <option value="bosnian">Bosnian</option>
                            <option value="brazilian">Brazilian</option>
                            <option value="british">British</option>
                            <option value="bruneian">Bruneian</option>
                            <option value="bulgarian">Bulgarian</option>
                            <option value="burkinabe">Burkinabe</option>
                            <option value="burmese">Burmese</option>
                            <option value="burundian">Burundian</option>
                            <option value="cambodian">Cambodian</option>
                            <option value="cameroonian">Cameroonian</option>
                            <option value="canadian">Canadian</option>
                            <option value="cape verdean">Cape Verdean</option>
                            <option value="central african">Central African</option>
                            <option value="chadian">Chadian</option>
                            <option value="chilean">Chilean</option>
                            <option value="chinese">Chinese</option>
                            <option value="colombian">Colombian</option>
                            <option value="comoran">Comoran</option>
                            <option value="congolese">Congolese</option>
                            <option value="costa rican">Costa Rican</option>
                            <option value="croatian">Croatian</option>
                            <option value="cuban">Cuban</option>
                            <option value="cypriot">Cypriot</option>
                            <option value="czech">Czech</option>
                            <option value="danish">Danish</option>
                            <option value="djibouti">Djibouti</option>
                            <option value="dominican">Dominican</option>
                            <option value="dutch">Dutch</option>
                            <option value="east timorese">East Timorese</option>
                            <option value="ecuadorean">Ecuadorean</option>
                            <option value="egyptian">Egyptian</option>
                            <option value="emirian">Emirian</option>
                            <option value="equatorial guinean">Equatorial Guinean</option>
                            <option value="eritrean">Eritrean</option>
                            <option value="estonian">Estonian</option>
                            <option value="ethiopian">Ethiopian</option>
                            <option value="fijian">Fijian</option>
                            <option value="filipino">Filipino</option>
                            <option value="finnish">Finnish</option>
                            <option value="french">French</option>
                            <option value="gabonese">Gabonese</option>
                            <option value="gambian">Gambian</option>
                            <option value="georgian">Georgian</option>
                            <option value="german">German</option>
                            <option value="ghanaian">Ghanaian</option>
                            <option value="greek">Greek</option>
                            <option value="grenadian">Grenadian</option>
                            <option value="guatemalan">Guatemalan</option>
                            <option value="guinea-bissauan">Guinea-Bissauan</option>
                            <option value="guinean">Guinean</option>
                            <option value="guyanese">Guyanese</option>
                            <option value="haitian">Haitian</option>
                            <option value="herzegovinian">Herzegovinian</option>
                            <option value="honduran">Honduran</option>
                            <option value="hungarian">Hungarian</option>
                            <option value="icelander">Icelander</option>
                            <option value="indian">Indian</option>
                            <option value="indonesian">Indonesian</option>
                            <option value="iranian">Iranian</option>
                            <option value="iraqi">Iraqi</option>
                            <option value="irish">Irish</option>
                            <option value="israeli">Israeli</option>
                            <option value="italian">Italian</option>
                            <option value="ivorian">Ivorian</option>
                            <option value="jamaican">Jamaican</option>
                            <option value="japanese">Japanese</option>
                            <option value="jordanian">Jordanian</option>
                            <option value="kazakhstani">Kazakhstani</option>
                            <option value="kenyan">Kenyan</option>
                            <option value="kittian and nevisian">Kittian and Nevisian</option>
                            <option value="kuwaiti">Kuwaiti</option>
                            <option value="kyrgyz">Kyrgyz</option>
                            <option value="laotian">Laotian</option>
                            <option value="latvian">Latvian</option>
                            <option value="lebanese">Lebanese</option>
                            <option value="liberian">Liberian</option>
                            <option value="libyan">Libyan</option>
                            <option value="liechtensteiner">Liechtensteiner</option>
                            <option value="lithuanian">Lithuanian</option>
                            <option value="luxembourger">Luxembourger</option>
                            <option value="macedonian">Macedonian</option>
                            <option value="malagasy">Malagasy</option>
                            <option value="malawian">Malawian</option>
                            <option value="malaysian">Malaysian</option>
                            <option value="maldivan">Maldivan</option>
                            <option value="malian">Malian</option>
                            <option value="maltese">Maltese</option>
                            <option value="marshallese">Marshallese</option>
                            <option value="mauritanian">Mauritanian</option>
                            <option value="mauritian">Mauritian</option>
                            <option value="mexican">Mexican</option>
                            <option value="micronesian">Micronesian</option>
                            <option value="moldovan">Moldovan</option>
                            <option value="monacan">Monacan</option>
                            <option value="mongolian">Mongolian</option>
                            <option value="moroccan">Moroccan</option>
                            <option value="mosotho">Mosotho</option>
                            <option value="motswana">Motswana</option>
                            <option value="mozambican">Mozambican</option>
                            <option value="namibian">Namibian</option>
                            <option value="nauruan">Nauruan</option>
                            <option value="nepalese">Nepalese</option>
                            <option value="new zealander">New Zealander</option>
                            <option value="ni-vanuatu">Ni-Vanuatu</option>
                            <option value="nicaraguan">Nicaraguan</option>
                            <option value="nigerien">Nigerien</option>
                            <option value="north korean">North Korean</option>
                            <option value="northern irish">Northern Irish</option>
                            <option value="norwegian">Norwegian</option>
                            <option value="omani">Omani</option>
                            <option value="pakistani">Pakistani</option>
                            <option value="palauan">Palauan</option>
                            <option value="panamanian">Panamanian</option>
                            <option value="papua new guinean">Papua New Guinean</option>
                            <option value="paraguayan">Paraguayan</option>
                            <option value="peruvian">Peruvian</option>
                            <option value="polish">Polish</option>
                            <option value="portuguese">Portuguese</option>
                            <option value="qatari">Qatari</option>
                            <option value="romanian">Romanian</option>
                            <option value="russian">Russian</option>
                            <option value="rwandan">Rwandan</option>
                            <option value="saint lucian">Saint Lucian</option>
                            <option value="salvadoran">Salvadoran</option>
                            <option value="samoan">Samoan</option>
                            <option value="san marinese">San Marinese</option>
                            <option value="sao tomean">Sao Tomean</option>
                            <option value="saudi">Saudi</option>
                            <option value="scottish">Scottish</option>
                            <option value="senegalese">Senegalese</option>
                            <option value="serbian">Serbian</option>
                            <option value="seychellois">Seychellois</option>
                            <option value="sierra leonean">Sierra Leonean</option>
                            <option value="singaporean">Singaporean</option>
                            <option value="slovakian">Slovakian</option>
                            <option value="slovenian">Slovenian</option>
                            <option value="solomon islander">Solomon Islander</option>
                            <option value="somali">Somali</option>
                            <option value="south african">South African</option>
                            <option value="south korean">South Korean</option>
                            <option value="spanish">Spanish</option>
                            <option value="sri lankan">Sri Lankan</option>
                            <option value="sudanese">Sudanese</option>
                            <option value="surinamer">Surinamer</option>
                            <option value="swazi">Swazi</option>
                            <option value="swedish">Swedish</option>
                            <option value="swiss">Swiss</option>
                            <option value="syrian">Syrian</option>
                            <option value="taiwanese">Taiwanese</option>
                            <option value="tajik">Tajik</option>
                            <option value="tanzanian">Tanzanian</option>
                            <option value="thai">Thai</option>
                            <option value="togolese">Togolese</option>
                            <option value="tongan">Tongan</option>
                            <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
                            <option value="tunisian">Tunisian</option>
                            <option value="turkish">Turkish</option>
                            <option value="tuvaluan">Tuvaluan</option>
                            <option value="ugandan">Ugandan</option>
                            <option value="ukrainian">Ukrainian</option>
                            <option value="uruguayan">Uruguayan</option>
                            <option value="uzbekistani">Uzbekistani</option>
                            <option value="venezuelan">Venezuelan</option>
                            <option value="vietnamese">Vietnamese</option>
                            <option value="welsh">Welsh</option>
                            <option value="yemenite">Yemenite</option>
                            <option value="zambian">Zambian</option>
                            <option value="zimbabwean">Zimbabwean</option>
                        </select><!-- end nationality input -->
                        <div class="down-arrow">
                            <svg class="dropdown-arrow" viewBox="0 0 12 7"><path d="M1 1l5 5 5-5"></path></svg>
                        </div>
                    </div>
                    <div class="submit-wrapper">
                        <label for="checkTerms">
                            <input type="checkbox" id="checkTerms" name="terms" required>
                            <span class="terms-span"> </span>
                            <span for="terms">I have read and agree to the 
                                <a id="terms-conditions" href="#">Terms & Conditions & Cancellation Policy</a>
                            </span>
                        </label>    
                        <button type="submit">CONTINUE TO PAYMENT</button>
                    </div>
                </form>
            </div> 
        </div> <!-- end main-guest-card -->
    </div>
    <div class="side-bar"><!-- side bar -->
        <?php
            ini_set('display_errors', 1);
            $sId = $_GET['id'];
            $sCheckIn = $_GET['checkIn'];
            $sCheckOut = $_GET['checkOut'];
            $sRooms = $_GET['rooms'];
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
                                <div><span class='faded-text '>".$value." x ".$jHotel->rooms->$key->name."</span> <span class='float-right faded-text '> $ ".$value * $jHotel->rooms->$key->price * 0.75."</span></div>
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
                <span class="float-right title bold total-price"><?php echo "$ $iTotalPrice"; ?></span>
            </div>
        </div>
    </div> <!-- end sidebar -->
    <?php
        $_SESSION["id"] = $sId;
        $_SESSION["checkIn"] = $sCheckIn;
        $_SESSION["checkOut"] =  $sCheckOut;
        $_SESSION["rooms"] = $sRooms;
        $jRooms = json_decode($sRooms);
        $sData = file_get_contents('data.txt');
        $jData = json_decode($sData);
        $jHotel = $jData->hotels->$sId;
    ?>
</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/confirm.js"></script>
    <script src="js/main.js"></script>
</html>