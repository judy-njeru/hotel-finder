<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" /> -->
    <!-- <script src="main.js"></script> -->
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
            $sId = $_GET['id'];
            $sData = file_get_contents('data.txt');
            $jData = json_decode($sData);
            $jHotel = $jData->hotels->$sId;
            if (!$jHotel){
                header('Location:hotelsTest.php');
            }
            echo "<div>$jHotel->name</div>
            <div>$jHotel->address</div>
            <div><span>$jHotel->rating</span>
            <span class='starsContainer'>
                <svg class='starsShape' width='60px' height='12px' viewBox='0 0 60 12' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                <g id='Page-1' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
                    <path d='M0,0 L60,0 L60,12 L0,12 L0,0 Z M6,9 L9.52671151,10.854102 L8.85316955,6.92705098 L11.7063391,4.14589803 L7.76335576,3.57294902 L6,0 L4.23664424,3.57294902 L0.293660902,4.14589803 L3.14683045,6.92705098 L2.47328849,10.854102 L6,9 Z M18,9 L21.5267115,10.854102 L20.8531695,6.92705098 L23.7063391,4.14589803 L19.7633558,3.57294902 L18,0 L16.2366442,3.57294902 L12.2936609,4.14589803 L15.1468305,6.92705098 L14.4732885,10.854102 L18,9 Z M30,9 L33.5267115,10.854102 L32.8531695,6.92705098 L35.7063391,4.14589803 L31.7633558,3.57294902 L30,0 L28.2366442,3.57294902 L24.2936609,4.14589803 L27.1468305,6.92705098 L26.4732885,10.854102 L30,9 Z M42,9 L45.5267115,10.854102 L44.8531695,6.92705098 L47.7063391,4.14589803 L43.7633558,3.57294902 L42,0 L40.2366442,3.57294902 L36.2936609,4.14589803 L39.1468305,6.92705098 L38.4732885,10.854102 L42,9 Z M54,9 L57.5267115,10.854102 L56.8531695,6.92705098 L59.7063391,4.14589803 L55.7633558,3.57294902 L54,0 L52.2366442,3.57294902 L48.2936609,4.14589803 L51.1468305,6.92705098 L50.4732885,10.854102 L54,9 Z' id='Combined-Shape' fill='#fff' fill-rule='nonzero'></path>
                </g>
                </svg>
                <div class='starsBackground'></div>
                <div class='starsFill' style='width:calc(60px*($jHotel->rating/5)'></div>
            </span>
            </div>
            <div>$jHotel->description</div>
            <div>";
            echo $jHotel->amenities->airportPickup ? '<span>✔️Airport Pickup </span>' : '';
            echo $jHotel->amenities->wifi ? '<span>✔️Free WiFi </span>' : '';
            echo $jHotel->amenities->airConditioning ? '<span>✔️Air Conditioning </span>' : '';
            echo $jHotel->amenities->roomService ? '<span>✔️Room Service </span>' : '';
            echo $jHotel->amenities->meetingRooms ? '<span>✔️Meeting Rooms </span>' : '';
            echo $jHotel->amenities->freeParking ? '<span>✔️Free Parking </span>' : '';
            echo "</div>";
        ?>
        <div>
            <?php
                foreach ($jHotel->rooms as $key => $jRoom) {
                    echo "<div class='marginTop' data-id='$key'>
                        <div>$jRoom->name</div>
                        <div>$$jRoom->price pr. night</div>
                        <div>beds: $jRoom->beds</div>
                        <div>availability: $jRoom->availability</div>
                        <input class='nrRooms' type='number' placaholder='0' min='0' max='$jRoom->availability'>
                    </div>";
                }
            ?>
            <div class="marginTop">
                <span>total</span>
                
            </div>
        </div>
    </div>

    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script>
        $(document).on('change','.nrRooms',function(){
            // const iRooms = $(this).parent().attr('data-id').val()
            // $.get('data.txt', function(data) {
                
            // }
        })



    </script>
</body>
</html>