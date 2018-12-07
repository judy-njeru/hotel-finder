<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/hotel.css">
    <link rel="stylesheet" href="/css/main.css">
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
               <img clas="map-img" src="/images/map.png" alt="">
           </div>
            
        </div>
        <div class="box-item hotel-rooms">
            <div class="title">Rooms</div>
            
            <!-- <input id="nrGuests" placeholder="guests" type="number" min="1" max="10000" value="<?php //echo $_GET['guests']; ?>"><br> -->
            <?php
                // room div template with placeholders
                $sRoomDiv = "<div class='marginTop' data-id='#id#'>
                                <div class='room-items'>
                                    <div>#name#</div>
                                    <input class='nrRooms' type='number' placaholder='0' min='0' max='#availability#' value='#rooms#'>
                                </div>
                                <div class='room-items'>
                                    <div class='extra-room-info'><span class='boxPrice'>#price#</span>DKK per night</div>
                                    <div class='extra-room-info'>max rooms: #availability#</div>
                                </div>
                </div>";
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
            <div class="marginTop">
                <div>total</div>
                <div>nights:<span id="boxTotalNights"></span></div>
                <div>rooms:<span id="boxTotalRooms"></span></div>
                <div>beds:<span id="boxTotalBeds"></span></div>
                <div>amount:<span id="boxTotalPrice"></span>DKK</div>
            </div>
            <button id="btnBookNow">Book now?</button>
        </div>
    </div>

    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script>
        let jRooms = {}
        // displays the total according to selection
        function setTotalInfo(){
            const iNights = getNumberOfNights()
            let iRooms = 0
            let iBeds = 0
            let iPrice = 0
            $('.nrRooms').map(function(){
                const sId = $(this).parent().attr('data-id')
                jRooms[sId] = Number($(this).val())
                iRooms = iRooms + Number($(this).val())
                iBeds = iBeds + Number($(this).val()) * Number($(this).siblings().children('.boxBeds').text())
                iPrice = iPrice + Number($(this).val()) * Number($(this).siblings().children('.boxPrice').text())
            })
            $('#boxTotalNights').text(iNights)
            $('#boxTotalRooms').text(iRooms)
            $('#boxTotalBeds').text(iBeds)
            $('#boxTotalPrice').text(iPrice*iNights)
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