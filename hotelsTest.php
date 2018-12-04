<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        *{
            color:black;
            text-decoration:none;
        }
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
            background-color:#FFC107;
            z-index:-1;
            left:0;
            top:0;
        }
        .boxHotel{
            margin-top:20px;
        }
    </style>
</head>
<body>
    <div>
        <div id="boxFilters">
            <label for="txtCheckInDate">check in</label>
            <input name="checkInDate" id="txtCheckInDate" placeholder="dd/mm/yyyy" type="text">
            <label for="txtCheckOutDate">check out</label>
            <input name="checkOutDate" id="txtCheckOutDate" placeholder="dd/mm/yyyy" type="text"><br>
            <input name="guests" id="nrGuests" placeholder="guests" type="number" min="1" max="10000" value="1"><br>
            <input name="airportPickup" id="chkAirportPickup" type="checkbox"><label for="chkAirportPickup">Airport Pickup</label>
            <input name="wifi" id="chkWifi" type="checkbox"><label for="chkWifi">Free Wi-Fi</label>
            <input name="restaurant" id="chkRestaurant" type="checkbox"><label for="chkRestaurant">Restaurant</label>
            <input name="airConditioning" id="chkAirConditioning" type="checkbox"><label for="chkAirConditioning">Air Conditioning</label>
            <input name="roomService" id="chkRoomService" type="checkbox"><label for="chkRoomService">Room Service</label>
            <input name="meetingRooms" id="chkMeetingRooms" type="checkbox"><label for="chkMeetingRooms">Meeting Rooms</label>
            <input name="freeParking" id="chkFreeParking" type="checkbox"><label for="chkFreeParking">Free Parking</label>
        </div>
        <div id="boxHotels"></div>
    </div>

    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script>
        const sDefaultCheckIn = '20/12/2018'
        const sDefaultCheckOut = '03/01/2019'
        const iDefaultGuests = 1

        // returns the hotel div with set values - works like a template
        function hotelDiv(id,name,rating,address,availability,price){
            return `<div class="boxHotel" data-id=${id}>
                        <div><span>${name}</span></div>
                        <div><span>${rating}</span>
                        <span class="starsContainer">
                            <svg class="starsShape" width="60px" height="12px" viewBox="0 0 60 12" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <path d="M0,0 L60,0 L60,12 L0,12 L0,0 Z M6,9 L9.52671151,10.854102 L8.85316955,6.92705098 L11.7063391,4.14589803 L7.76335576,3.57294902 L6,0 L4.23664424,3.57294902 L0.293660902,4.14589803 L3.14683045,6.92705098 L2.47328849,10.854102 L6,9 Z M18,9 L21.5267115,10.854102 L20.8531695,6.92705098 L23.7063391,4.14589803 L19.7633558,3.57294902 L18,0 L16.2366442,3.57294902 L12.2936609,4.14589803 L15.1468305,6.92705098 L14.4732885,10.854102 L18,9 Z M30,9 L33.5267115,10.854102 L32.8531695,6.92705098 L35.7063391,4.14589803 L31.7633558,3.57294902 L30,0 L28.2366442,3.57294902 L24.2936609,4.14589803 L27.1468305,6.92705098 L26.4732885,10.854102 L30,9 Z M42,9 L45.5267115,10.854102 L44.8531695,6.92705098 L47.7063391,4.14589803 L43.7633558,3.57294902 L42,0 L40.2366442,3.57294902 L36.2936609,4.14589803 L39.1468305,6.92705098 L38.4732885,10.854102 L42,9 Z M54,9 L57.5267115,10.854102 L56.8531695,6.92705098 L59.7063391,4.14589803 L55.7633558,3.57294902 L54,0 L52.2366442,3.57294902 L48.2936609,4.14589803 L51.1468305,6.92705098 L50.4732885,10.854102 L54,9 Z" id="Combined-Shape" fill="#fff" fill-rule="nonzero"></path>
                            </g>
                            </svg>
                            <div class="starsBackground"></div>
                            <div class="starsFill" style="width:calc(60px*(${rating}/5)"></div>
                        </span>
                        </div>
                        <div>${address}</div>
                        <div>Availability: ${availability} rooms</div>
                        <div> Price from: <span class='boxPrice'>${price}</span></div>
                        </div>`}

        // get the url for the single hotel page
        $(document).on('click','.boxHotel',function(){
            const sId = $(this).attr('data-id')
            const sCheckIn = $('#txtCheckInDate').val() ? $('#txtCheckInDate').val() : sDefaultCheckIn
            const sCheckOut = $('#txtCheckOutDate').val() ? $('#txtCheckOutDate').val() : sDefaultCheckOut
            const iGuests = $('#nrGuests').val() ? $('#nrGuests').val() :iDefaultGuests
            window.location.href = `hotelTest.php?id=${sId}&checkIn=${sCheckIn}&checkOut=${sCheckOut}&guests=${iGuests}`
        })

        // display hotels when page is ready
        $(document).ready(function(){
            $('#txtCheckInDate').val(sDefaultCheckIn)
            $('#txtCheckOutDate').val(sDefaultCheckOut)
            $.get('data.txt', function(data) {
                for (const key in data.hotels) {
                    const jHotel = data.hotels[key]
                    let iAvailability = 0
                    iPrice = getPrice(jHotel)
                    for (const room in jHotel.rooms) {
                        iAvailability += jHotel.rooms[room].availability
                    }
                    $('#boxHotels').append(hotelDiv(key,jHotel.name,jHotel.rating,jHotel.address,iAvailability,iPrice))
                }
            },'json')
        })

        // update results when filters change
        $(document).on('change','#boxFilters',function(e){
            $('#boxHotels').html('')
            const aChecked = $('#boxFilters input:checkbox:checked')
            let jChecked = {}
            let bNoResults = true
            $.get('data.txt', function(data) {
                for (const key in data.hotels) {
                    jChecked[key] = true
                    const jHotel = data.hotels[key]
                    if(aChecked.length > 0){
                        for (const checkbox of aChecked) {
                            if(jHotel.amenities[checkbox.name] != true){
                                jChecked[key] = false
                            }
                        }
                    }
                    let iAvailabilityBeds = 0
                    let iAvailabilityRooms = 0
                    let iPrice = getPrice(jHotel)
                    for (const room in jHotel.rooms) {
                        iAvailabilityBeds += jHotel.rooms[room].availability * jHotel.rooms[room].beds
                        iAvailabilityRooms += jHotel.rooms[room].availability
                    }
                    if(iAvailabilityBeds < $('#nrGuests').val()){
                        jChecked[key] = false
                    }
                    if(jChecked[key] == true){
                        $('#boxHotels').append(hotelDiv(key,jHotel.name,jHotel.rating,jHotel.address,iAvailabilityRooms,iPrice))
                        bNoResults = false
                    }
                }
                if(bNoResults)$('#boxHotels').append('<div>no results :-(</div>')
            },'json')
        })

        // get the price for the set number of guests
        // same logic as in single hotel page
        function getPrice(data){
            const iGuests = $('#nrGuests').val()
            let iGuestsTest = iGuests
            let iPrice = 0
            for (const key in data.rooms) {
                const jRoom = data.rooms[key]
                let iAvailability = jRoom.availability
                var iNrOfRoomTypeNeeded = Math.ceil(iGuestsTest/jRoom.beds)
                if(iNrOfRoomTypeNeeded <= iAvailability && iGuestsTest > 0 && iNrOfRoomTypeNeeded > 0){
                    iPrice = iPrice + iNrOfRoomTypeNeeded * jRoom.price
                    iGuestsTest = 0
                }else if(iNrOfRoomTypeNeeded > iAvailability && iGuestsTest > 0 && iNrOfRoomTypeNeeded > 0){
                    iPrice = iPrice + iAvailability * jRoom.price
                    iGuestsTest = iGuestsTest - (iAvailability*jRoom.beds)
                }
            }
            return iPrice
        }
    </script>
</body>
</html>