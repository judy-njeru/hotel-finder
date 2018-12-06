<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/hotels.css">
    <link rel="stylesheet" href="/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
<body>
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

    <div class="container">
        <div id="boxFilters">
            <div class="search_field destination">
            <i class="material-icons">search</i>
            <input type="text" name="search_field" placeholder="London">
            </div>
            <div class="divider"></div>
            <div class="search_field">
                <label for="txtCheckInDate">check in</label>
                <input name="checkInDate" type="date" id="txtCheckInDate" placeholder="dd/mm/yyyy" type="text">
            </div>
            
            <div class="search_field">
                <label for="txtCheckOutDate">check out</label>
                <input name="checkOutDate" type="date" id="txtCheckOutDate" placeholder="dd/mm/yyyy" type="text">
            </div>
            
            <div class="search_field">
                <label for="txtCheckOutDate">Guests</label>
                <input name="guests" id="nrGuests" placeholder="guests" type="number" min="1" max="10000" value="1"><br>
            </div>
            <div class="search_field">
                <label for="txtCheckOutDate">Rooms</label>
                <input name="guests" id="nrRooms" placeholder="rooms" type="number" min="1" max="10000" value="1"><br>
            </div>
            <button class="search_btn">Search</button>

            <div class="divider"></div>
            <div class="header">Rate</div>

            <div class="range-items">
                <div class="range-slider">
                    <div class="slider-items">
                        <span class="value">100 DKK</span>
                        <input class="range" type="range" value="100" min="0" max="500">
                    </div>
                    
                    <div class="from-to-items">
                        <span class="value">100 DKK</span>
                        <span class="value">10 000 DKK</span>
                    </div>
                    
                </div>
            </div>
            
            

            <div class="divider"></div>
            <div class="header">Ranking</div>

            <div class="range-items">
                <div class="range-slider">
                    <div class="slider-items">
                        <span class="value">100 DKK</span>
                        <input class="range" type="range" value="100" min="0" max="500">
                    </div>
                    
                    <div class="from-to-items">
                        <span class="value"><i class="material-icons">star_rate</i></span>
                        <span class="value">
                            <i class="material-icons">star_rate</i>
                            <i class="material-icons">star_rate</i>
                            <i class="material-icons">star_rate</i>
                            <i class="material-icons">star_rate</i>
                            <i class="material-icons">star_rate</i>
                        </span>
                    </div>

                </div>
            </div>
            <div class="divider"></div>

            <div class="header">Facilities</div>
            <div class="checkbox_items">
                <input name="wifi" id="chkWifi" type="checkbox">
                <label for="chkWifi">Free Wi-Fi</label>
            </div>
            <div class="checkbox_items">
                <input name="airConditioning" id="chkAirConditioning" type="checkbox">
                <label for="chkAirConditioning">Air Conditioning</label>
            </div>
            <div class="checkbox_items">
                <input name="meetingRooms" id="chkMeetingRooms" type="checkbox">
                <label for="chkMeetingRooms">Meeting Rooms</label>
            </div>
            
            
            <div class="checkbox_items">
                <input name="freeParking" id="chkFreeParking" type="checkbox">
                <label for="chkFreeParking">Free Parking</label>
            </div>
            
            <div class="divider"></div>
            <div class="header">Amenities</div>
            <div class="checkbox_items">
                <input name="airportPickup" id="chkAirportPickup" type="checkbox">
                <label for="chkAirportPickup">Airport Pickup</label>
            </div>
            
            <div class="checkbox_items">
                <input name="restaurant" id="chkRestaurant" type="checkbox">
                <label for="chkRestaurant">Restaurant</label>
            </div>
            
            <div class="checkbox_items">
                <input name="roomService" id="chkRoomService" type="checkbox">
                <label for="chkRoomService">Room Service</label>
            </div>
        </div>

        <div id="boxHotels"></div>
    </div>

    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script>
        const sDefaultCheckIn = '28/12/2018'
        const sDefaultCheckOut = '03/01/2019'
        const iDefaultGuests = 1

        // returns the hotel div with set values - works like a template
        function hotelDiv(id,name,rating,address,availability,price,img){
            return `<div class="boxHotel" data-id=${id}>
                        <div class="boxImg" style="background-image:url(${img})"></div>
                        <div class="hotel-details">
                            <div class="hotel-name">${name}</div>
                            <div class="star-items">
                                <span>${rating}</span>
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
                
                            <div class="description-items">
                                <i class="material-icons">location_on</i>
                                <span>${address}</span>
                            </div>
                            <div class="description-items">
                                <i class="material-icons">hotel</i>
                                <span>${availability} rooms</span>
                            </div>
                            <div class="price-items">
                                <div class="amount">${price} DKK</div>
                                <div class="per-night"> per night</div>
                            </div>
                            
                        <div>
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
                    const sImg = jHotel.images[0]
                    for (const room in jHotel.rooms) {
                        iAvailability += jHotel.rooms[room].availability
                    }
                    $('#boxHotels').append(hotelDiv(key,jHotel.name,jHotel.rating,jHotel.address,iAvailability,iPrice,sImg))
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
                    const sImg = jHotel.images[0]
                    if(aChecked.length > 0){
                        for (const checkbox of aChecked) {
                            if(jHotel.amenities[checkbox.name].available != true){
                                jChecked[key] = false
                            }
                        }
                    }
                    let iAvailabilityBeds = 0
                    let iAvailabilityRooms = 0
                    const iPrice = getPrice(jHotel)
                    for (const room in jHotel.rooms) {
                        iAvailabilityBeds += jHotel.rooms[room].availability * jHotel.rooms[room].beds
                        iAvailabilityRooms += jHotel.rooms[room].availability
                    }
                    if(iAvailabilityBeds < $('#nrGuests').val()){
                        jChecked[key] = false
                    }
                    if(jChecked[key] == true){
                        $('#boxHotels').append(hotelDiv(key,jHotel.name,jHotel.rating,jHotel.address,iAvailabilityRooms,iPrice,sImg))
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