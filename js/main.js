$(document).on("click", ".signUpUser", function(){
    $(".modal").css("display", "block");
    $(".navbarContainer").css("display", "none");
})

$(document).on("click", ".loginUser", function(){
    $(".loginModal").css("display", "block");
    $(".navbarContainer").css("display", "none");
})

$(document).on("click", ".close", function(){
    location.href = './landing-page.php';
})