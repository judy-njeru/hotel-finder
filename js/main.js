// SIGNUP USER
/*.... sign up new user nav link .... */
$(document).on("click", ".signUpUser", function(){
    $(".modal").css("display", "block");
    $(".navbarContainer").css("display", "none");
})

var gjUsers = {
    data: {
        users: []
    },
    methods: {
        signUpUser: function(sUserName, sUserEmail, sUserPassword) {
            var jUser = {}
            jUser.name = sUserName;
            jUser.email = sUserEmail;
            jUser.password = sUserPassword;

            jData.data.users.push(jUser);
         
            let sData = JSON.stringify(jData);
            localStorage.users = sData;    
        }
    }
}

//check if local Storage contains the users Data
if (!localStorage.users) {
    let sUsers = JSON.stringify(gjUsers);
    localStorage.users = sUsers;
    console.log("local storage doesn't contain users")
} 

//Get the data from local storage
let sUsers = localStorage.users;
let jData = JSON.parse(sUsers);


$(document).on('click', '.btnSignUpUser', function(){
    var sUserName = $('#txtUserName').val();
    var sUserEmail = $('#txtUserEmail').val();
    var sUserPassword = $('#txtUserPassword').val();
    
    gjUsers.methods.signUpUser(sUserName, sUserEmail, sUserPassword); 

    jData.data.users.forEach(user => {
        var sSessionUser = JSON.stringify(user)
        sessionStorage.setItem('key', sSessionUser);
    
        var sActiveUser = sessionStorage.getItem('key');
        var jActiveUser = JSON.parse(sActiveUser)
        
        var userMessage = "Hi " + jActiveUser.name;
        $(".signUpUser").text("SIGNOUT");
        $("#userSignUp").removeClass("signUpUser").addClass("logoutUser");
        $("#loginUser").removeClass("loginUser").addClass("user");
        $("#loginUser").text(userMessage);
    
    });
    
    $(".modal").css("display", "none");
    $(".navbarContainer").css("display", "block");
})

/*....Check if a user session exists ....*/

if( !sessionStorage.getItem('key') ){
    $(".signUpUser").text("SIGNUP");
    $("#userSignUp").removeClass("logoutUser").addClass("signUpUser");
} else {
    var sActiveUser = sessionStorage.getItem('key');
    var jActiveUser = JSON.parse(sActiveUser)
    
    var userMessage = "Hi " + jActiveUser.name;
    $(".signUpUser").text("SIGNOUT");
    $("#userSignUp").removeClass("signUpUser").addClass("logoutUser");
    $("#loginUser").removeClass("loginUser").addClass("user");
    $("#loginUser").text(userMessage);
}


//LOGIN USER
/*.... login user nav link .... */
$(document).on("click", ".loginUser", function(){
    $(".loginModal").css("display", "block");
    $(".navbarContainer").css("display", "none");
})

$(document).on("click", ".btnLoginUser", function(){
    var sUserEmail = $('#txtEmail').val();
    var sUserPassword = $('#txtPassword').val();
    var users = jData.data.users;
    for (var i = 0; i <users.length; i++) {
        var user = users[i];
        var sExistingUserEmail = user.email;
        var sExistingUserPassword = user.password;
        // console.log(user.name)
        if (sExistingUserEmail === sUserEmail && sExistingUserPassword === sUserPassword){
            var sSessionUser = JSON.stringify(user)
            sessionStorage.setItem('key', sSessionUser);
        
            var sActiveUser = sessionStorage.getItem('key');
            var jActiveUser = JSON.parse(sActiveUser)
            
            var userMessage = "Hi " + jActiveUser.name;
            $(".signUpUser").text("SIGNOUT");
            $("#userSignUp").removeClass("signUpUser").addClass("logoutUser");
            $("#loginUser").removeClass("loginUser").addClass("user");
            $("#loginUser").text(userMessage);
            $(".navbarContainer").css("display", "block");
            $(".loginModal").css("display", "none");
            return;
        } else {
            $("#error").text("Invalid login credentials")
        }
    }
})

//LOGOUT USER
$(document).on("click", ".logoutUser", function(){

    if( sessionStorage.getItem('key') ){
        sessionStorage.removeItem('key')
        sessionStorage.clear();
        $(".logoutUser").text("SIGNUP");
    $("#userSignUp").removeClass("logoutUser").addClass("signUpUser");
    $(".modal").css("display", "none");
    location.reload();
        return;
    } 
})

//SEARCH LOCATION

$(document).on('keyup','#txtSearch',function(){
    $(".searchDropdown").css("display", "block");
   
    $('#searchDropdown').html('')
    const sSearch = $('#txtSearch').val()

    if( sSearch == "") {
        $(".searchDropdown").css("display", "none" , "important");
    } 
    
    let bMatch = false
    if(sSearch){
        $.get('./data.txt', function(data) {
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
                    <div id="noSearchResults">No Results :-(</div>
                `)
            }
        }, 'json');
    }
})







$(document).on("click", ".close", function(){
    location.href = './home.php';
})


