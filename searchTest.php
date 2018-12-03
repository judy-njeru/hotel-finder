<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" /> -->
    <!-- <script src="main.js"></script> -->
</head>
<body>
    <div class="searchContainer">
        <input id="txtSearch" placeholder="search">
        <div id="searchDropdown" class="searchDropdown"></div>
    </div>

    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script>
        $(document).on('keyup','#txtSearch',function(){
            $('#searchDropdown').html('')
            const sSearch = $('#txtSearch').val()
            let bMatch = false
            if(sSearch){
                $.get('data.txt', function(data) {
                    for (const key in data.cities) {
                        if(data.cities[key].city.toLowerCase().startsWith(sSearch.toLowerCase())) {
                            bMatch = true
                            $('#searchDropdown').append(`
                                <a href="hotelsTest.php">
                                    <div>
                                        <span>${data.cities[key].city},</span>
                                        <span>${data.cities[key].location}</span>
                                    </div>
                                </a>
                            `)
                        }
                    }
                    if(!bMatch){
                        $('#searchDropdown').append(`
                            <div>No Results :-(</div>
                        `)
                    }
                }, 'json');
            }
        })
    
    </script>

</body>
</html>