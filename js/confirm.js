$("#frmPrimaryGuest").submit(function(e) {

  //inputs is true by default
  var validInput = true;

  //.each loops through the input marked "is-required-input" and checks if there is no value
  $('.is-required-input').each(function() {

    //if no value is found, valid input turns false. class "is-not-validated" is added for each input
    if ($(this).val().trim() == '') {

      validInput = false;
      console.log(this)

      $(this).addClass("is-not-validated");
    }
    else {
      //if not, the class is removed
      $(this).removeClass("is-not-validated");
    }
  }); //end of .each
  if (validInput == false){
    //event is prevented if any of the inputs are false
    e.preventDefault(); 
  }
  else{
    //if everything passes, we go to the next page
    location.href = "./paymentTest.php"
  }

}) //end of form

  