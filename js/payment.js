$(function() {

    var owner = $('#owner');
    var cardNumber = $('#cardNumber');
    var cardNumberField = $('#card-number-field');
    var CVV = $("#cvv");
    var confirmButton = $('#confirm-purchase');
    var mastercard = $("#mastercard");
    var visa = $("#visa");
    var amex = $("#amex");

    cardNumber.payform('formatCardNumber');
    CVV.payform('formatCardCVC');

    cardNumber.keyup(function() {

        amex.removeClass('transparent');
        visa.removeClass('transparent');
        mastercard.removeClass('transparent');

        if ($.payform.validateCardNumber(cardNumber.val()) == false) {
            cardNumberField.addClass('is-not-validated');
        } else {
            cardNumberField.removeClass('is-not-validated');
            cardNumberField.addClass('has-success');
        }

        if ($.payform.parseCardType(cardNumber.val()) == 'visa') {
            mastercard.addClass('transparent');
            amex.addClass('transparent');
        } else if ($.payform.parseCardType(cardNumber.val()) == 'amex') {
            mastercard.addClass('transparent');
            visa.addClass('transparent');
        } else if ($.payform.parseCardType(cardNumber.val()) == 'mastercard') {
            amex.addClass('transparent');
            visa.addClass('transparent');
        }
    });

    confirmButton.click(function(e) {

        e.preventDefault();

        var isCardValid = $.payform.validateCardNumber(cardNumber.val());
        var isCvvValid = $.payform.validateCardCVC(CVV.val());

        if(owner.val().length < 5){
            owner.addClass("is-not-validated");
        } else if (!isCardValid) {
            owner.removeClass("is-not-validated");
            cardNumber.addClass("is-not-validated");
        } else if (!isCvvValid) {
            cardNumber.removeClass("is-not-validated");
            CVV.addClass("is-not-validated");
        } else {  
            // Everything is correct. Add your form submission code here
            document.paymentForm.submit();

        }
    });
});
