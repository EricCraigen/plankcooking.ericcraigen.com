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

// function onShippingTypeChange() {
//     let parcel = 3.00;
//     let priority = 8.00;
//     // alert("working");
//     if ($(this).val() == 1) {
        
//         $('#shippingCost').text("$3.00");
//     // } else if ($('#subtotal').val() == "2") {
//     //     $('#shippingCost').html("${{ number_format($subtotal + 8.0, 2) }}");
//     }
// }

$('#shippingType').change(function() {
    // alert($(this).val());
    // alert($('#shippingHandlingCostParcel').val());
    let orderTotal = parseFloat($('#orderTotalInput').val());
    // alert(orderTotal);
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
});

$('#sameAsAddressCheckbox').change(function() {
    // alert($('#billingFirstName').val());
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

function clearErrorMsgs() {
    // alert($('#cart__input__error').hasClass("d-none"));
    $(this).addClass("d-none");
}
