var width = 0;
var resize = 0;

function getInitWidth() { 
    return  $(window).on('load', function() {
    width = $(window).innerWidth();
    });
}
width = getInitWidth().innerWidth();
console.log("init: " + width.toString());
if (width < 768) {
    $('#toggle__wrapper').addClass('container-fluid');
    $('#toggle__wrapper').removeClass('container');
} else {
    $('#toggle__wrapper').removeClass('container-fluid');
    $('#toggle__wrapper').addClass('container');
}
if (width < 572) {
    $('#cart__toggle__continueShopping__sm').addClass('showContinueShopping');
    $('#cart__toggle__continueShopping__sm').removeClass('hideContinueShopping');
    $('#cart__toggle__continueShopping__md__up').addClass('hideContinueShopping');
    $('#cart__toggle__continueShopping__md__up').removeClass('showContinueShopping');
} else {
    $('#cart__toggle__continueShopping__sm').addClass('hideContinueShopping');
    $('#cart__toggle__continueShopping__sm').removeClass('showContinueShopping');
    $('#cart__toggle__continueShopping__md__up').addClass('showContinueShopping');
    $('#cart__toggle__continueShopping__md__up').removeClass('hideContinueShopping');
}

function getWidth() {
    $(window).resize(function() { 
        width = $(window).innerWidth();
        if (width < 768) {
            $('#toggleDisplay').show(400).addClass('d-flex');
            $('#toggle__wrapper').removeClass('container');
            $('#toggle__wrapper').addClass('container-fluid');
        } else {
            $('#toggleDisplay').hide(400).removeClass('d-flex');
            $('#toggle__wrapper').removeClass('container-fluid');
            $('#toggle__wrapper').addClass('container');
        }
        if (width < 572) {
            $('#cart__toggle__continueShopping__sm').addClass('showContinueShopping');
            $('#cart__toggle__continueShopping__sm').removeClass('hideContinueShopping');
            $('#cart__toggle__continueShopping__md__up').addClass('hideContinueShopping');
            $('#cart__toggle__continueShopping__md__up').removeClass('showContinueShopping');
        } else {
            $('#cart__toggle__continueShopping__sm').addClass('hideContinueShopping');
            $('#cart__toggle__continueShopping__sm').removeClass('showContinueShopping');
            $('#cart__toggle__continueShopping__md__up').addClass('showContinueShopping');
            $('#cart__toggle__continueShopping__md__up').removeClass('hideContinueShopping');
        }

    return width;
    });
}

resize = getWidth();
console.log(resize);

$(window).scroll(function() {
    if (width > 767) {   
        if ($(window).scrollTop() <= 178){
            $('#toggleDisplay').hide(400).removeClass('d-flex');
        } else {
            $('#toggleDisplay').show(400).addClass('d-flex');
        }
    } else {
        $('#toggleDisplay').show(400).addClass('d-flex');
    }
});

$('#sameAsAddressCheckbox').change(function() {
    if ($(this).is(":checked")) {
        let firstName = $('#billingFirstName').val();
        let lastName = $('#billingLastName').val();
        let address1 = $('#billingAddress1').val();
        let address2 = $('#billingAddress2').val();
        let city = $('#billingCity').val();
        let state = $('#billingState').val();
        let postalCode = $('#billingPostalCode').val();
        let phone = $('#billingPhone').val();
        let email = $('#billingEmail').val();
        
        $('#shippingFirstName').val(firstName);
        $('#shippingLastName').val(lastName);
        $('#shippingAddress1').val(address1);
        $('#shippingAddress2').val(address2);
        $('#shippingCity').val(city);
        $('#shippingState').val(state);
        $('#shippingPostalCode').val(postalCode);
        $('#shippingPhone').val(phone);
        $('#shippingEmail').val(email);
    } else {
        $('#shippingFirstName').val("");
        $('#shippingLastName').val("");
        $('#shippingAddress1').val("");
        $('#shippingAddress2').val("");
        $('#shippingCity').val("");
        $('#shippingState').val("");
        $('#shippingPostalCode').val("");
        $('#shippingPhone').val("");
        $('#shippingEmail').val("");
    }
});

$('#shippingType').change(function() {
    let orderTotal = parseFloat($('#orderTotalInput').val());
    if ($(this).val() == "") {
        $('#shippingCost').text("$0.00");
        $('#orderTotalDisplay').html("$" + orderTotal.toFixed(2));
    } else if ($(this).val() == 1) {
        $('#shippingCost').text("$" + $('#shippingHandlingCostParcel').val());
        let parcel = parseFloat($('#shippingHandlingCostParcel').val());
        orderTotal += parcel;
        $('#orderTotalDisplay').html("$" + orderTotal.toFixed(2));
    } else if ($(this).val() == 2) {
        $('#shippingCost').text("$" + $('#shippingHandlingCostPriority').val());
        let priority = parseFloat($('#shippingHandlingCostPriority').val());
        orderTotal += priority;
        $('#orderTotalDisplay').html("$" + orderTotal.toFixed(2));
    }
    $('#cart__input__error1').fadeOut(600);
});

$('#billingFirstName').change(function() {
    $('#cart__input__error1').fadeOut(600);
});

$('#billingLastName').change(function() {
    $('#cart__input__error2').fadeOut(600);
});

$('#billingAddress1').change(function() {
    $('#cart__input__error3').fadeOut(600);
});

$('#billingCity').change(function() {
    $('#cart__input__error4').fadeOut(600);
});

$('#billingState').change(function() {
    $('#cart__input__error5').fadeOut(600);
});

$('#billingPostalCode').change(function() {
    $('#cart__input__error6').fadeOut(600);
});

$('#billingPhone').change(function() {
    $('#cart__input__error7').fadeOut(600);
});

$('#billingEmail').change(function() {
    $('#cart__input__error8').fadeOut(600);
});

$('#shippingFirstName').change(function() {
    $('#cart__input__error9').fadeOut(600);
});

$('#shippingLastName').change(function() {
    $('#cart__input__error10').fadeOut(600);
});

$('#shippingAddress1').change(function() {
    $('#cart__input__error11').fadeOut(600);
});

$('#shippingCity').change(function() {
    $('#cart__input__error12').fadeOut(600);
});

$('#shippingState').change(function() {
    $('#cart__input__error13').fadeOut(600);
});

$('#shippingPostalCode').change(function() {
    $('#cart__input__error14').fadeOut(600);
});

$('#shippingPhone').change(function() {
    $('#cart__input__error15').fadeOut(600);
});

$('#shippingEmail').change(function() {
    $('#cart__input__error16').fadeOut(600);
});

$('#cardTypeSelect').change(function() {
    $('#cart__input__error2').fadeOut(600);
});

$('#creditCardNumber').change(function() {
    $('#cart__input__error3').fadeOut(600);
});

$('#cardExpMonth').change(function() {
    $('#cart__input__error4').fadeOut(600);
});

$('#cardExpYear').change(function() {
    $('#cart__input__error5').fadeOut(600);
});

$('#cart__input__error1').click(function() {
    $(this).addClass("d-none");
});

$('#cart__input__error2').click(function() {
    $(this).addClass("d-none");
});

$('#cart__input__error3').click(function() {
    $(this).addClass("d-none");
});

$('#cart__input__error4').click(function() {
    $(this).addClass("d-none");
});

$('#cart__input__error5').click(function() {
    $(this).addClass("d-none");
});

$('#cart__input__error6').click(function() {
    $(this).addClass("d-none");
});

$('#cart__input__error7').click(function() {
    $(this).addClass("d-none");
});

$('#cart__input__error8').click(function() {
    $(this).addClass("d-none");
});

$('#cart__input__error9').click(function() {
    $(this).addClass("d-none");
});

$('#cart__input__error10').click(function() {
    $(this).addClass("d-none");
});

$('#cart__input__error11').click(function() {
    $(this).addClass("d-none");
});

$('#cart__input__error12').click(function() {
    $(this).addClass("d-none");
});

$('#cart__input__error13').click(function() {
    $(this).addClass("d-none");
});

$('#cart__input__error14').click(function() {
    $(this).addClass("d-none");
});

$('#cart__input__error15').click(function() {
    $(this).addClass("d-none");
});

$('#cart__input__error16').click(function() {
    $(this).addClass("d-none");
});

$('#billingFirstName').blur(function() {
    $('#cart__input__error1').fadeOut(600);
    $('#billingFirstName').removeClass("border__red");
});

$('#billingLastName').blur(function() {
    $('#cart__input__error2').fadeOut(600);
    $('#billingLastName').removeClass("border__red");
});

$('#billingAddress1').blur(function() {
    $('#cart__input__error3').fadeOut(600);
    $('#billingAddress1').removeClass("border__red");
});

$('#billingCity').blur(function() {
    $('#cart__input__error4').fadeOut(600);
    $('#billingCity').removeClass("border__red");
});

$('#billingState').blur(function() {
    $('#cart__input__error5').fadeOut(600);
    $('#billingState').removeClass("border__red");
});

$('#billingPostalCode').blur(function() {
    $('#cart__input__error6').fadeOut(600);
    $('#billingPostalCode').removeClass("border__red");
});

$('#billingPhone').blur(function() {
    $('#cart__input__error7').fadeOut(600);
    $('#billingPhone').removeClass("border__red");
});

$('#billingEmail').blur(function() {
    $('#cart__input__error8').fadeOut(600);
    $('#billingEmail').removeClass("border__red");
});

$('#shippingFirstName').blur(function() {
    $('#cart__input__error9').fadeOut(600);
    $('#shippingFirstName').removeClass("border__red");
});

$('#shippingLastName').blur(function() {
    $('#cart__input__error10').fadeOut(600);
    $('#shippingLastName').removeClass("border__red");
});

$('#shippingAddress1').blur(function() {
    $('#cart__input__error11').fadeOut(600);
    $('#shippingAddress1').removeClass("border__red");
});

$('#shippingCity').blur(function() {
    $('#cart__input__error12').fadeOut(600);
    $('#shippingCity').removeClass("border__red");
});

$('#shippingState').blur(function() {
    $('#cart__input__error13').fadeOut(600);
    $('#shippingState').removeClass("border__red");
});

$('#shippingPostalCode').blur(function() {
    $('#cart__input__error14').fadeOut(600);
    $('#shippingPostalCode').removeClass("border__red");
});

$('#shippingPhone').blur(function() {
    $('#cart__input__error15').fadeOut(600);
    $('#shippingPhone').removeClass("border__red");
});

$('#shippingEmail').blur(function() {
    $('#cart__input__error16').fadeOut(600);
    $('#shippingEmail').removeClass("border__red");
});

$('#shippingType').blur(function() {
    $('#cart__input__error1').fadeOut(600);
    $('#shippingType').removeClass("border__red");
});

$('#cardTypeSelect').blur(function() {
    $('#cart__input__error2').fadeOut(600);
    $('#cardTypeSelect').removeClass("border__red");
});

$('#creditCardNumber').blur(function() {
    $('#cart__input__error3').fadeOut(600);
    $('#creditCardNumber').removeClass("border__red");
});

$('#cardExpMonth').blur(function() {
    $('#cart__input__error4').fadeOut(600);
    $('#cardExpMonth').removeClass("border__red");
});


$('#cardExpYear').blur(function() {
    $('#cart__input__error5').fadeOut(600);
    $('#cardExpMonth').removeClass("border__red");
});

function clearErrorMsgs() {
    $(this).addClass("d-none");
}
