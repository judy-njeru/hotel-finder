<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .marginTop{margin-top:30px;}
    </style>
</head>
<body>
    <div>
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
        ?>

        <div>
            <div><?php echo $jHotel->name; ?></div>
            <div><?php echo $jHotel->address; ?></div>
        </div>

        <div class='marginTop'>
            <?php foreach ($jRooms as $key => $value) {
                if($value > 0){
                    echo "<div>
                        <div><span>".$jHotel->rooms->$key->name."</span> <span>x ".$value."</span></div>
                    </div>";
                }
            } ?>
            <div class='marginTop'>
                <div><span>check in:</span> <?php echo $sCheckIn; ?></div>
                <div><span>check out:</span> <?php echo $sCheckOut; ?></div>
            </div>
        </div>

        <div class='marginTop'>
        <div>included in booking</div>
        <?php    
            foreach ($jHotel->amenities as $key => $value) {
                echo "<div>$value->text</div>";
            }
        ?>
        </div>

        <div class='marginTop'>
            <div>your price summary</div>
            <?php
                $iTotalPrice = 0;
                $iTax = 0;
                foreach ($jRooms as $key => $value) {
                    $iTotalPrice += $value * $jHotel->rooms->$key->price;
                    $iTax = $iTotalPrice * 0.25;
                    if($value > 0){
                        echo "<div>
                            <div><span>".$value." x ".$jHotel->rooms->$key->name."</span> <span> $".$value * $jHotel->rooms->$key->price * 0.75."</span></div>
                        </div>";
                    } 
                }
            ?>
            <div><span>25% VAT</span> <span><?php echo $iTax; ?></span></div>
            <div><span>Total</span> <span><?php echo $iTotalPrice; ?></span></div>
        </div>
    </div>
</body>
</html>