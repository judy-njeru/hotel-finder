<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/hotel.css">
    <link rel="stylesheet" href="./css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
<body>
    <?php
        ini_set('display_errors', 1);
        // svg image for stars rating
        require_once 'components/svg-stars.php';

        // get hotel data from the id
        $sId = $_GET['id'];
        $sData = file_get_contents('data.txt');
        $jData = json_decode($sData);
        $jHotel = $jData->hotels->$sId;
        $sAmenities = '';
        // redirect if !id 
        if (!$jHotel){
            header('Location:hotelsTest.php');
        }
    ?>
    <div class="navbarContainer">
    <div id="navbar"> 
        <a class="nav-left">
            <svg class="logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" x="0px" y="0px">
                <path class="pin" d="m48.913 21.375c-15.747 0-23.936 12.271-23.797 24.542.193 17.861 17.855 24.542 23.797 49.08 5.955-24.542 23.83-31.611 23.83-49.08 0-12.271-9.249-24.542-23.822-24.542m.025 6.135l13.907 13.907-27.814 0 13.907-13.907m-9.841 15.649l19.658 0 0 19.682-19.658 0 0-19.682m3.349 3.349l0 5.522 5.497 0 0-5.522-5.497 0m7.465 0l0 5.522 5.522 0 0-5.522-5.522 0m-7.465 7.465l0 5.522 5.497 0 0-5.522-5.497 0m7.465 0l0 5.522 5.522 0 0-5.522-5.522 0"/>
                <path class="star" d="m78.51 24.511c-.486 1.492-.996 3.063-1.508 4.639-1.61-.003-3.353.004-4.884.004 1.322.961 2.681 1.95 3.948 2.869-.495 1.53-1.035 3.189-1.508 4.642 1.265-.923 2.611-1.893 3.952-2.866 1.417 1.028 2.655 1.927 3.948 2.866-.491-1.502-.996-3.062-1.508-4.642 1.303-.944 2.713-1.97 3.952-2.869-1.634 0-3.396 0-4.881 0"/>
                <path class="star" d="m19.379 24.511c-.486 1.492-.996 3.063-1.508 4.639-1.61-.003-3.353.004-4.884.004 1.322.961 2.681 1.95 3.948 2.869-.495 1.53-1.035 3.189-1.508 4.642 1.265-.923 2.611-1.893 3.952-2.866 1.417 1.028 2.655 1.927 3.948 2.866-.491-1.502-.996-3.062-1.508-4.642 1.303-.944 2.713-1.97 3.952-2.869-1.634 0-3.396 0-4.881 0"/>
                <path class="star" d="m30.16 9.547c-.521 1.603-1.069 3.289-1.619 4.982-1.729-.003-3.601.004-5.245.004 1.42 1.032 2.879 2.094 4.24 3.081-.532 1.643-1.112 3.425-1.619 4.986 1.359-.992 2.804-2.033 4.244-3.078 1.522 1.104 2.852 2.07 4.24 3.078-.527-1.613-1.069-3.289-1.619-4.986 1.4-1.014 2.914-2.116 4.244-3.081-1.754 0-3.648 0-5.242 0"/>
                <path class="star" d="m67.73 9.547c-.521 1.603-1.069 3.289-1.619 4.982-1.729-.003-3.601.004-5.245.004 1.42 1.032 2.879 2.094 4.24 3.081-.532 1.643-1.112 3.425-1.619 4.986 1.359-.992 2.804-2.033 4.244-3.078 1.522 1.104 2.852 2.07 4.24 3.078-.527-1.613-1.069-3.289-1.619-4.986 1.4-1.014 2.914-2.116 4.244-3.081-1.754 0-3.648 0-5.242 0"/>
                <path class="star" d="m48.947 2.863c-.589 1.811-1.208 3.717-1.83 5.629-1.953-.004-4.069.004-5.927.005 1.605 1.166 3.253 2.366 4.791 3.482-.601 1.856-1.257 3.869-1.83 5.633 1.535-1.121 3.168-2.297 4.795-3.478 1.719 1.248 3.222 2.339 4.791 3.478-.596-1.823-1.208-3.716-1.83-5.633 1.582-1.145 3.292-2.391 4.795-3.482-1.982 0-4.121 0-5.922 0"/>
            </svg>
        </a> 
        
        <div class="nav-right">
            <div class="loginUser" id="loginUser">LOGIN</div>
            <div class="signUpUser" id="userSignUp">SIGNUP</div>    
        </div> 
    </div>
</div>
    
    <a class="back-btn" href="./hotelTest.php"><i class="material-icons">arrow_back_ios</i></a>
    <div class="shadow"></div>
    <div class="banner">
        <div class="boxImg" style="background-image:url(<?php echo $jHotel->images[0] ?>)"></div>
        <div class="boxImg" style="background-image:url(<?php echo $jHotel->images[1] ?>)"></div>
        <div class="boxImg" style="background-image:url(<?php echo $jHotel->images[2] ?>)"></div>
        <div class="boxImg" style="background-image:url(<?php echo $jHotel->images[3] ?>)"></div>
        <div class="boxImg" style="background-image:url(<?php echo $jHotel->images[4] ?>)"></div>
    </div>
    <div id="boxInfo">
        <div class="box-item hotel-description-items">
            <div class="headline-items">
                <div class="hotel-name"><?php echo $jHotel->name ?></div>
                <span class='starsContainer'>
                    <?php echo $svgStars ?>
                    <div class='starsBackground'></div>
                    <div class='starsFill' style='width:calc(60px*(<?php echo $jHotel->rating ?>/5)'></div>
                </span>
            </div>
            
            <div class="address"><i class="material-icons">location_on</i> <?php echo $jHotel->address ?></div>

            <div class="amenity-items">
                <?php foreach ($jHotel->amenities as $key => $value) {
                    if($value->available == true){
                        echo "<span>️️️️️️✔️$value->text</span>";
                    }
                } ?>
            </div>
            <div class="divider"></div>
            <div class="about-items">
                <div class="title">About</div>
                <div class="text"><?php echo $jHotel->description ?></div>
            </div>
           <div class="location-items">
               <div class="title">Location</div>
               <img clas="map-img" src="./images/map.png" alt="">
           </div>
            
        </div>
        <div class="box-item hotel-rooms">
            <div class="title">Rooms</div>
            
            <!-- <input id="nrGuests" placeholder="guests" type="number" min="1" max="10000" value="<?php //echo $_GET['guests']; ?>"><br> -->
            <?php
                // room div template with placeholders
                $sRoomDiv = "<div class='marginTop boxRoom' data-id='#id#'>
                                <div class='room-items'>
                                    <div>#name#</div>
                                    <input class='nrRooms' type='number' placaholder='0' min='0' max='#availability#' value='#rooms#'>
                                </div>
                                <div class='room-items'>
                                    <div class='extra-room-info'><span class='boxPrice'>#price#</span>DKK per night</div>
                                    <div class='extra-room-info'>max rooms: #availability#</div>
                                </div>
                </div>";
                //<div>beds: <span class='boxBeds'>#beds#<span></div>
                // number of guests from the GET
                $iGuests = $_GET['guests'];
                // needed to assign guests to rooms
                $iGuestsNeedRoom = $iGuests;
                // object that has room type(key) and how many(value)
                $jRooms = (object)[];
                
                // displays the rooms and options
                // triggers on load
                foreach ($jHotel->rooms as $key => $jRoom) {
                    // number of available rooms of this type
                    $iAvailability = $jRoom->availability;
                    if($iAvailability > 0){ // check if any rooms are available
                        // number of rooms of this type needed for set number of guests that need room
                        $nrOfThisRoomTypeNeeded = ceil($iGuestsNeedRoom/$jRoom->beds);
                        if($nrOfThisRoomTypeNeeded <= $iAvailability && $iGuestsNeedRoom > 0 && $nrOfThisRoomTypeNeeded > 0){ // check if enough rooms of this type for the number of guests that need room
                            // sets number of rooms of this type are needed
                            $jRooms->$key = $nrOfThisRoomTypeNeeded;
                            $iGuestsNeedRoom = 0;
                        }elseif($nrOfThisRoomTypeNeeded > $iAvailability && $iGuestsNeedRoom > 0 && $nrOfThisRoomTypeNeeded > 0){ // check if any rooms of this type
                            // sets number of rooms of this type are available
                            $jRooms->$key = $iAvailability;
                            // reduce number of guests need room
                            $iGuestsNeedRoom = $iGuestsNeedRoom - ($iAvailability*$jRoom->beds);
                        }else{ // should only happen if no guests need room
                            $jRooms->$key = 0;
                        }
                    }
                    else{ // should only happen if no room this type is available
                        $jRooms->$key = 0;
                    }
                    // create a temp div from template
                    $sTempRoomDiv = $sRoomDiv;
                    // array containing the placeholders
                    $find = array('#id#','#name#','#price#','#beds#','#availability#','#rooms#');
                    // array containing the values - must be same order as placeholder array
                    $replace = array($key,$jRoom->name,$jRoom->price,$jRoom->beds,$jRoom->availability,$jRooms->$key);
                    // replace placeholders with values
                    echo str_replace($find,$replace,$sTempRoomDiv);
                }
            ?>
            <div class="divider"></div>
           
            <div class="date-items">
                <div class="header">Dates</div>
                <input class="txtDate" id="txtCheckInDate" value="FROM <?php echo $_GET['checkIn']; ?>" placeholder='dd/mm/yyy'>
                <input class="txtDate" id="txtCheckOutDate" value="TO <?php echo $_GET['checkOut']; ?>" placeholder='dd/mm/yyy'>
            </div>
            <div class="divider"></div>
            <div class="total-room-items">
                <div class="room-item">
                    <div>Rooms</div>
                    <div id="boxTotalRooms"></div>
                </div>
                <div class="room-item">
                    <div>Beds</div>
                    <div id="boxTotalBeds"></div>
                </div>
            </div>
            <div class="divider"></div>
            <div class="marginTop sum-up">
                <div class="total-price-items">
                    <div class="title">Price</div>
                    <div class="amount-items">
                        <div class="price"><span id="boxTotalPrice"></span>DKK</div>
                        <div class="total-nights">/ <span id="boxTotalNights"></span>nights</div>
                    </div>
                </div>
                
            </div>
            <button id="btnBookNow">Book now?</button>
        </div>
    </div>

    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script>
        let jRooms = {}

        function setTotalInfo(){
            $.getJSON('data.txt',function(data){
                console.log("success")
            }).done(function(data){
                const urlParams = new URLSearchParams(window.location.search);
                const hotelId = urlParams.get('id')
                const jHotel = data.hotels[hotelId]

                const iNights = getNumberOfNights()
                let iRooms = 0
                let iBeds = 0
                let iPrice = 0
                
                $('.nrRooms').map(function(){
                    const roomId = $(this).parents('.boxRoom').attr('data-id')
                    jRooms[roomId] = Number($(this).val())
                    iRooms = iRooms + Number($(this).val())
                    iBeds = iBeds + Number($(this).val()) * jHotel.rooms[roomId].beds
                    iPrice = iPrice + Number($(this).val()) * jHotel.rooms[roomId].price
                })
                $('#boxTotalNights').text(iNights)
                $('#boxTotalRooms').text(iRooms)
                $('#boxTotalBeds').text(iBeds)
                $('#boxTotalPrice').text(iPrice*iNights)
            })
        }

        // triggers setTotalInfo when page loads
        $(document).ready(setTotalInfo())
        // triggers setTotalInfo when selection changes
        $(document).on('change','.nrRooms',function(){setTotalInfo()})
        $(document).on('change','.txtDate',function(){setTotalInfo()})

        $(document).on('click','#btnBookNow',function(){
            const sId = <?php echo json_encode($_GET['id']) ?>;
            const sCheckIn = $('#txtCheckInDate').val()
            const sCheckOut = $('#txtCheckOutDate').val()
            const sRooms = JSON.stringify(jRooms);
            window.location.href = `confirmTest.php?id=${sId}&checkIn=${sCheckIn}&checkOut=${sCheckOut}&rooms=${sRooms}`
        })

        function getNumberOfNights(){
            var momentCheckIn = moment($('#txtCheckInDate').val(), 'DD/MM/YYYY')
            var momentCheckOut = moment($('#txtCheckOutDate').val(), 'DD/MM/YYYY')
            return momentCheckOut.diff(momentCheckIn,'days')
        }
    </script>
</body>
</html>