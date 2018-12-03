<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .starsContainer{
            position:relative;
        }
        .starsShape{
            position:absolute;
            left:0;
            top:0;
        }
        .starsBackground{
            position:absolute;
            height: 12px;
            width: 60px;
            background-color:#bdbdbd;
            z-index:-1;
            left:0;
            top:0;
        }
        .starsFill{
            position:absolute;
            height: 12px;
            background-color:#005fb2;
            z-index:-1;
            left:0;
            top:0;
        }
        .marginTop{
            margin-top:20px;
        }
    </style>
</head>
<body>
    <div id="boxInfo">
        <?php
            ini_set('display_errors', 1);
            // svg image for stars rating
            require_once 'components/svg-stars.php';

            // hotel div template
            $sHotelDiv = "<div>#name#</div>
                            <div>#address#</div>
                            <div><span>#rating#</span>
                            <span class='starsContainer'>
                                $svgStars
                                <div class='starsBackground'></div>
                                <div class='starsFill' style='width:calc(60px*(#rating#/5)'></div>
                            </span>
                            </div>
                            <div>#description#</div>
                            <div>
                            #airportPickup#
                            #wifi#
                            #airConditioning#
                            #roomService#
                            #meetingRooms#
                            #freeParking#
                            </div>";

            // get hotel data from the id
            $sId = $_GET['id'];
            $sData = file_get_contents('data.txt');
            $jData = json_decode($sData);
            $jHotel = $jData->hotels->$sId;
            // redirect if !id 
            if (!$jHotel){
                header('Location:hotelsTest.php');
            }
            // check if hotel has a value true/false in amenities, only saves span if true
            $airportPickup = $jHotel->amenities->airportPickup ? '<span>✔️Airport Pickup </span>' : '';
            $wifi = $jHotel->amenities->wifi ? '<span>✔️Free WiFi </span>' : '';
            $airConditioning = $jHotel->amenities->airConditioning ? '<span>✔️Air Conditioning </span>' : '';
            $roomService = $jHotel->amenities->roomService ? '<span>✔️Room Service </span>' : '';
            $meetingRooms = $jHotel->amenities->meetingRooms ? '<span>✔️Meeting Rooms </span>' : '';
            $freeParking = $jHotel->amenities->freeParking ? '<span>✔️Free Parking </span>' : '';
            // create a temp div from template
            $sTempHotelDiv = $sHotelDiv;
            // array containing the placeholders
            $find = array('#name#','#address#','#rating#','#description#','#airportPickup#','#wifi#','#airConditioning#','#roomService#','#meetingRooms#','#freeParking#');
            // array containing the values - must be same order as placeholder array
            $replace = array($jHotel->name,$jHotel->address,$jHotel->rating,$jHotel->description,$airportPickup,$wifi,$airConditioning,$roomService,$meetingRooms,$freeParking);
            // replace placeholders with values
            echo str_replace($find,$replace,$sTempHotelDiv);
        ?>
        <div>
            <input value="<?php echo $_GET['checkIn']; ?>" placeholder='dd/mm/yyy'>
            <input value="<?php echo $_GET['checkOut']; ?>" placeholder='dd/mm/yyy'><br>
            <!-- <input id="nrGuests" placeholder="guests" type="number" min="1" max="10000" value="<?php //echo $_GET['guests']; ?>"><br> -->
            <?php
                $sRoomDiv = "<div class='marginTop' data-id='#id#'>
                    <div>#name#</div>
                    <div>$<span class='boxPrice'>#price#</span> pr. night</div>
                    <div>beds: <span class='boxBeds'>#beds#<span></div>
                    <div>availability: #availability#</div>
                    <input class='nrRooms' type='number' placaholder='0' min='0' max='#availability#' value='#rooms#'>
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
            <div class="marginTop">
                <div>total</div>
                <div>rooms:<span id="boxTotalRooms"></span></div>
                <div>beds:<span id="boxTotalBeds"></span></div>
                <div>price:<span id="boxTotalPrice"></span></div>
            </div>
        </div>
    </div>

    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script>
        // displays the total according to selection
        function setTotalInfo(){
            let iRooms = 0
            let iBeds = 0
            let iPrice = 0
            $('.nrRooms').map(function(){
                iRooms = iRooms + Number($(this).val())
                iBeds = iBeds + Number($(this).val()) * Number($(this).siblings().children('.boxBeds').text())
                iPrice = iPrice + Number($(this).val()) * Number($(this).siblings().children('.boxPrice').text())
            })
            $('#boxTotalRooms').text(iRooms)
            $('#boxTotalBeds').text(iBeds)
            $('#boxTotalPrice').text('$'+iPrice)
        }

        // triggers setTotalInfo when page loads
        $(document).ready(setTotalInfo())
        // triggers setTotalInfo when selection changes
        $(document).on('change','.nrRooms',function(){setTotalInfo()})
    </script>
</body>
</html>