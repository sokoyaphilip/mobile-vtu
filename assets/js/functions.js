
(function($) {
    $.fn.inputFilter = function(inputFilter) {
        return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
            if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            }
        });
    };
}(jQuery));


$(document).ready(function() {
    // Login
    $('.log-in').on('click', function () {
        let login_username = $('#login-username').val();
        let login_password = $('#login-password').val();

        if( login_username == '' ){
            _btn.prop('disabled', false);
            sweet_alert('Error', 'Username field can not be empty', 'error');
            return false;
        }

        if( login_password == '' ){
            _btn.prop('disabled', false);
            sweet_alert('Error', 'Email field can not be empty', 'error');
            return false;
        }

        $.ajax({
            url: base_url + 'ajax/login/',
            method: 'POST',
            data: {'login_username': login_username, 'password': login_password},
            success: function (response) {
                if (response.status === 'success') {
                    setTimeout(function(){  window.location.href = window.location.href; }, 2000);
                    sweet_alert('Success!', 'You are now logged in', 'success');
                } else {
                    sweet_alert('Error!', response.message, response.status);
                }
            },
            error: function (response) {
                console.log(response);
            }
        });
    });


    // Sign up

    $('.sign-up').on('click', function () {
        let _btn = $(this);
        let signup_email = $('#signup-email').val();
        let signup_phone = $('#signup-phone').val();
        let password = $('#signup-password').val();
        let confirm_password = $('#confirm-password').val();
        if( signup_email === '' ){
            _btn.prop('disabled', false);
            sweet_alert('Error', 'Email field can not be empty', 'error');
            return false;
        }
        if( signup_phone === '' ){
            _btn.prop('disabled', false);
            sweet_alert('Error', 'Phone number field can not be empty', 'error');
            return false;
        }
        if( password === '' ){
            _btn.prop('disabled', false);
            sweet_alert('Error', 'Password field can not be empty', 'error');
            return false;
        }

        $.ajax({
            url: base_url + 'ajax/signup/',
            method: 'POST',
            data: {'signup_email': signup_email, 'signup_phone': signup_phone, 'password': password, 'confirm_password' : confirm_password},
            success: function (response) {
                if (response.status === 'success') {
                    setTimeout(function(){  window.location.href = window.location.href; }, 2000);
                    sweet_alert('Success!', "Registration successfull. Buy Airtime - Data - Subscribe your TV Decoder...", 'success');
                } else {
                    sweet_alert('Error!', response.message, response.status);
                }
            },
            error: function (response) {
                console.log(response);
            }
        });
    });


    ///////////////////////////////////////////
    ///////////////////////////////////////////
    /////////////GENERAL///////////////////////
    ///////////////////////////////////////////
    ///////////////////////////////////////////
    ///////////////////////////////////////////

    // Only number

    $(".number").inputFilter(function (value) {
        return /^-?\d*$/.test(value);
    });


    // number and comma [.,]
    ///^-?\d*[.,]?\d{0,2}$/.test(value)


    ///^[0-9]+\.?[0-9]*$/;
    // $(".numberAndComma").inputFilter(function (value) {
        // return /^-?\d*$/..test(value);
    // });

    // Thousand separator
    $('.amount').on('keyup', function () {

        let n = $(this).val();
        let resp = addCommas(n);
        $(this).val( resp );
    });



    $('.pay-now').on('click', function (e) {
        e.preventDefault();
        let _this = $(this);
        _this.prop('disabled', true);

        let payment_method = $('#payment_method').val();
        let amount = $('#pay_amount').val();
        let product_id = $('#product_id').val();

        if( amount < 500 ){
            sweet_alert('error', 'You can only pay N500 and above', 'error');
            _this.prop('disabled', false);
            return false;
        }

        if( payment_method === '' ){
            sweet_alert('Error!', 'Please select a payment method.', 'error' );
            _this.removeAttr('disabled');
        }
        // Generate Transaction ID , message coming as Transaction ID
        $.ajax({
            url : base_url + 'ajax/fund_wallet/',
            method : "POST",
            data : {'payment_method' : payment_method, 'amount' : amount, 'product_id' : product_id },
            success: function (response) {
                if( response.status === 'success' ){
                    console.log(payment_method);
                    if( payment_method === '1' ){ // Payment via Bank Transfer
                        sweet_alert('Info',
                            `Please pay to any of our account details, and use the transaction ID as reference ${response.message}. <b>Ogechi Charles-Mbaeto</b><br />GTB: 0216290799 or Fidelity: 6070020271 or Keystone: 6021461466.`,
                            'info', false);
                        $('.swal-button--confirm').on('click', function () {
                            window.location = window.location.href;
                        });
                    }else{ // 3
                        let data = {'amount' : amount * 100, 'ref' : response.message};
                        payWithPaystack( data );
                    }
                }else{
                    sweet_alert('Error!', response.message, response.status );
                    _this.removeAttr('disabled');
                }
            },
            error : function (response) {
                console.log(response.responseText);
            }
        });

    });
    
    // Data Purchase
    $('.data-purchase').on('click', function (e) {

        e.preventDefault();
        $(this).prop('disabled');
        let _btn = $(this);

        let product_id = $('#product_id').val();
        let plan_id = $('#network_plan').val();
        let recipents = $('#data-recipents').val();
        let network = $('#network').val();
        let network_name = $('#network').find(':selected').data('network-name');

        if( recipents === '') {
            _btn.prop('disabled', false);
            sweet_alert('Error', 'Number field can not be empty', 'error');
            return false;
        }
        if( network === '') {
            _btn.prop('disabled', false);
            sweet_alert('Error', 'Please select a network', 'error');
            return false;
        }

        if( plan_id === ''){
            _btn.prop('disabled', false);
            sweet_alert('Error', 'Please select a plan', 'error');
            return false;
        }

        $.ajax({
            url : base_url + 'ajax/data_purchase/',
            method: "POST",
            data: {'product_id' : product_id, 'plan_id' : plan_id, 'recipents' : recipents, 'network' : network, 'network_name' : network_name },
            success : function(response){
                if( response.status === 'success' ){
                    sweet_alert('Success', response.message, 'success', false);

                }else{
                    sweet_alert('Error', response.message, 'error', false);
                    $(this).prop('disabled');
                }
            }
        });

    });

    // Get the commition for airtime transfer
    $('#pin_amount').on('change', function () {
        let pin_amount = $(this).val();
        let network = $('#airtime_pin_network').val();
        let amount = 0;
        if( network !== '' ){
            switch (network) {
                case 'mtn':
                    amount = (85/100) * pin_amount;
                    $('.to_receive').text(`You will be receiving N${amount}`);
                    $('#amount_earned').val(amount);
                    break;
                case 'glo':
                    amount = (70/100) * pin_amount;
                    $('.to_receive').text(`You will be receiving N${amount}`);
                    $('#amount_earned').val(amount);
                    break;
                case '9mobile':
                    amount = (80/100) * pin_amount;
                    $('.to_receive').text(`You will be receiving N${amount}`);
                    $('#amount_earned').val(amount);
                    break;
                default:
                    amount = (70/100) * pin_amount;
                    $('.to_receive').text(`You will be receiving N${amount}`);
                    $('#amount_earned').val(amount);
                    break;
            }
        }
    });


    // Airtime Purchase
    $('.airtime-purchase').on('click', function(e){
        e.preventDefault();
        $(this).prop('disabled', true);
        $(this).text("Processing...");

        let product_id = $('#product_id').val();
        let amount = $('#amount').val();
        let network = $('#airtime_network').val();
        let recipents = $('#recipents').val();
        let network_name = $('#airtime_network').find(':selected').data('network-name');
        let discount = $('#airtime_network').find(':selected').data('discount');

        if( amount === '' || amount < 100 ){
            sweet_alert('Error', 'Sorry amount can not be less than N100', 'error');
            _btn.prop('disabled', false);
            $(this).text("Buy Now");
            return false;
        }

        if( recipents === '' ){
            sweet_alert('Error', 'Please fill in the phone number', 'error');
            _btn.prop('disabled', false);
            $(this).text("Buy Now");
            return false;
        }
        if( network === '' ){
            sweet_alert('Error', 'You need to select a network', 'error');
            _btn.prop('disabled', false);
            $(this).text("Buy Now");
            return false;
        }

        $.ajax({
            url : base_url + 'ajax/buy_airtime/',
            method: "POST",
            data: {'product_id' : product_id, 'amount' : amount, 'discount' : discount, 'network' : network, 'recipents' : recipents, 'network_name' : network_name},
            success : function(response){
                if( response.status === 'success' ){
                    sweet_alert('Success', response.message, 'success', false);
                    $('.swal-button--confirm').on('click', function () {
                        window.location = window.location.href;
                    })
                }else{
                    sweet_alert('Error', response.message, 'error', false);
                    $(this).text("Buy Now");
                    _btn.prop('disabled', false);
                }
            },
            error : function(response){
                sweet_alert('Error', 'There was an error with the transaction, please contact us if debited', 'error');
                console.log( response );
            }
        });
    });

    $('.quick-airtime').on('click', function(e){

        e.preventDefault();
        let _btn = $(this);
        $(this).prop('disabled', true);
        let product_id = $('#product_id').val();
        let amount = $('#amount').val();
        let network = $('#airtime_network').val();
        let recipents = $('#recipents').val();
        let payment = $('#payment_method').val();
        let network_name = $('#airtime_network').find(':selected').data('network-name');
        let discount = $('#airtime_network').find(':selected').data('discount');

        if( amount === '' || amount < 100 ){
            sweet_alert('Error', 'Sorry amount can not be less than N100', 'error');
            _btn.prop('disabled', false);
            return false;
        }
        if( recipents === '' ){
            sweet_alert('Error', 'Please fill in the right number', 'error');
            _btn.prop('disabled', false);
            return false;
        }
        if( network === '' ){
            sweet_alert('Error', 'You need to select a network', 'error');
            _btn.prop('disabled', false);
            return false;
        }
        // payment method

        $.ajax({
            url : base_url + 'ajax/quick_airtime/',
            method: "POST",
            data: {'product_id' : product_id, 'discount' : discount, 'amount' : amount, 'network' : network, 'payment' : payment, 'recipents' : recipents, 'network_name' : network_name},
            success : function(response){
                if( response.status === 'success' ){
                    if( payment === '1' ){
                        sweet_alert('Info',
                            `Please pay to any of our account details, and use the transaction ID as reference ${response.message}. <b>Ogechi Charles-Mbaeto</b><br />GTB: 0216290799 or Fidelity: 6070020271 or Keystone: 6021461466`,
                            'info', false);

                        $('.swal-button--confirm').on('click', function () {
                            setTimeout( sweet_alert('info','Transaction successful, thanks for using Gecharl, please check your balance.', 'info'),3000);
                        });
                    }else if( payment === 2 ){
                        sweet_alert('success','Transaction successful. Check your dashboard for transaction details..', 'info')
                    }else{
                        // paystack
                    }

                }else{
                    sweet_alert('Error', response.message, 'error', false);
                }
            },
            error : function(response){
                sweet_alert('Error', 'There was an error with the transaction, please contact us if debited', 'error');
                console.log( response );
            }
        });
    });

    // TV cable purchase

    $('.tv-cable').on('click', function (e) {
        e.preventDefault();
        $(this).prop('disabled', true);

        let _btn = $(this);
        _btn.text('Processing...');
        let product_id = $('#product_id').val();
        let network = $('#network').val();
        let plan_id = $('#network_plan').val();
        let smart_card_number = $('#smart_card_number').val();
        let registered_name = $('#registered_name').val();
        let registered_number = $('#registered_number').val();
        let network_name = $('#network').find(':selected').data('network-name');

        if( smart_card_number === '') {
            _btn.prop('disabled', false);
            sweet_alert('Error', 'Smart card number can not be empty', 'error');
            _btn.text('Subscribe');
            return false;
        }

        if( registered_name === '') {
            _btn.prop('disabled', false);
            sweet_alert('Error', 'Registered name can not be empty', 'error');
            _btn.text('Subscribe');
            return false;
        }

        if( registered_number === '') {
            _btn.prop('disabled', false);
            sweet_alert('Error', 'Registered number can not be empty', 'error');
            _btn.text('Subscribe');
            return false;
        }
        //7028877148
        $.ajax({
            url : base_url + 'ajax/tv_cable/',
            method: "POST",
            data: {'product_id' : product_id,
                    'plan_id' : plan_id, 'smart_card_number' : smart_card_number,
                    'registered_name' : registered_name,
                    'registered_number' : registered_number,
                    'network' : network, 'network_name' : network_name },
            success : function(response){
                if( response.status === 'success' ){
                    sweet_alert('Success', response.message, 'success', false);
                }else{
                    console.log(response.message);
                    sweet_alert('Error', response.message, 'error', false);
                    _btn.text('Subscribe');
                    $(this).prop('disabled', false);
                }
                $('.swal-button--confirm').on('click', function () {
                    window.location = window.location.href;
                });
            }
        });

    });


    // TV cable purchase

    $('.electricity-bill').on('click', function (e) {
        e.preventDefault();
        $(this).prop('disabled', true);

        let _btn = $(this);
        _btn.text("Processing...");
        let product_id = $('#product_id').val();
        let plan_id = $('#plan').val();
        let amount = $('#amount').val();
        let phone_number = $('#phone_number').val();
        let meter_number = $('#meter_number').val();
        let network_name = $('#plan').find(':selected').data('network-name');
        let network = $('#plan').find(':selected').data('service-id');
        let discount = $('#plan').find(':selected').data('service-discount');

        if( amount === '') {
            _btn.prop('disabled', false);
            sweet_alert('Error', 'Amount can not be empty', 'error');
            _btn.text("Pay Now");
            return false;
        }

        if( amount < 500 || amount > 200000) {
            _btn.prop('disabled', false);
            sweet_alert('Error', 'Amount can not be less than N500, or more than N200,000', 'error');
            _btn.text("Pay Now");
            return false;
        }

        if( phone_number === '') {
            _btn.prop('disabled', false);
            sweet_alert('Error', 'Phone number can not be empty', 'error');
            _btn.text("Pay Now");
            return false;
        }

        if( meter_number === '') {
            _btn.prop('disabled', false);
            sweet_alert('Error', 'Meter number can not be empty', 'error');
            _btn.text("Pay Now");
            return false;
        }
        //7028877148
        $.ajax({
            url : base_url + 'ajax/electricity_bill/',
            method: "POST",
            data: {'product_id' : product_id,
                'plan_id' : plan_id, 'amount' : amount, 'discount' : discount,
                'meter_number' : meter_number,
                'phone_number' : phone_number,
                'network' : network, 'network_name' : network_name },
            success : function(response){
                if( response.status === 'success' ){
                    sweet_alert('Success', response.message, 'success', false);
                }else{
                    sweet_alert('Error', response.message, 'error', false);
                    _btn.text("Pay Now");
                    $(this).prop('disabled', false);
                }
                $('.swal-button--confirm').on('click', function () {
                    window.location = window.location.href;
                });
            },
            error : function (response) {
                console.log(response.message);
                sweet_alert('Error', "Sorry there was an error with that action. Please contact us if error persist.");
            }
        });

    });

    $('.transfer-now').on('click', function (e) {
        e.preventDefault();
        let _this = $(this);
        _this.prop('disabled', true);
        let amount = $('#transfer_amount').val();
        let receiver = $('#receiver').val();
        let product_id = $('#transfer_product_id').val();

        if( payment_method == '' ){
            sweet_alert('Error!', 'Please select a payment method.', 'error' );
            _this.removeAttr('disabled');
        }
        if( receiver == '' || gercharl_user_number( receiver ) ){
            sweet_alert('Error!', 'Please enter the receiver number and must be Gecharl.com user.', 'error' );
            _this.removeAttr('disabled');
        }
        // Generate Transaction ID , message coming as Transaction ID
        $.ajax({
            url : base_url + 'ajax/fund_wallet/',
            method : "POST",
            data : {'payment_method' : payment_method, 'amount' : amount, 'product_id' : product_id },
            success: function (response) {
                if( response.status === 'success' ){
                    console.log(payment_method);
                    if( payment_method == '1' ){ // Payment via Bank Transfer
                        sweet_alert('Info',
                            `Please pay to any of our account details, and use the transaction ID as reference ${response.message}. <b>Ogechi Charles-Mbaeto</b><br />GTB: 0216290799 or Fidelity: 6070020271 or Keystone: 6021461466`,
                            'info', false);
                    }else{ // 3
                        // @TODO: Payment via Pay stack

                    }
                }else{
                    sweet_alert('Error!', response.message, response.status );
                    _this.removeAttr('disabled');
                }
            },
            error : function (response) {
                console.log(response.responseText);
            }
        });

    });

    function gercharl_user_number( number ){
        // validate & check if his number exist...
    }

    $('#airtime_network').on('change', function () {
        let discount = $(this).find(':selected').data('discount');
        $('.you-pay').text('You get '+ discount +'% discount');
    });

    $('#network').on('change', function(e){
        e.preventDefault();
        let service_id = $(this).val();
        $('#smart-card-info').html('');
        $('#smart_card_number').val('');
        let discount = $(this).data('discount');
        if( discount === undefined) discount = $(this).find(':selected').data('discount');

        $('.you-pay').html('You get '+ discount +' % discount');

        $('#network_plan')
            .find('option')
            .remove()
            .end()
            .append('<option value="" selected>--Select Plan --</option>');

        $.ajax({
            url : base_url + 'ajax/fetch_plans/',
            method: "POST",
            data: {'service_id' : service_id },
            success : function(response){

                if( response.status === 'success' ){

                    let count = response.message.length;
                    for( let i = 0; i < count; i++ ){
                        $('#network_plan').append(`<option value="${response.message[i].id}">${response.message[i].name} - ${format_currency(response.message[i].amount)}</option>`);
                    }
                }else{
                    console.log(response.message);
                }
            }
        })
    });

    ///////////////////////////////////////////////
    //////////// ADMIN ////////////////////////////
    ///////////////////////////////////////////////

    // delete service
    $('.delete-service').on('click', function(){
        let id = $(this).data('id');
        let _this = $(this);
        swal({
            title :'Are you sure?',
            text : 'Every associated plans will also be deleted with this plan!',
            icon: 'warning',
            buttons : true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {

                $.ajax({
                    url : base_url + 'ajax/delete_service/',
                    method: 'POST',
                    data : {'service_id' : id },
                    success : function(response){
                        if( response.status === 'success' ){
                            sweet_alert('Success', 'Service and associated deleted successfully.', 'success')
                            $(_this).parents("tr").remove();
                        }else{

                            sweet_alert('Error!', response.message, response.status );
                        }

                    },
                    error : function (response) {
                        console.log(response);
                    }
                });
            }else{
                swal("Oops! We're still good :) ");
            }
        });
    });


    // delete plan
    $('.delete-plan').on('click', function(){
        let id = $(this).data('id');
        let _this = $(this);
        swal({
            title :'Are you sure?',
            text : 'You are about deleting this plan.',
            icon: 'warning',
            buttons : true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {

                $.ajax({
                    url : base_url + 'ajax/delete_plan/',
                    method: 'POST',
                    data : {'plan_id' : id },
                    success : function(response){
                        if( response.status === 'success' ){
                            sweet_alert('Success', 'Plan deleted successfully.', 'success')
                            $(_this).parents("tr").remove();
                        }else{

                            sweet_alert('Error!', response.message, response.status );
                        }

                    },
                    error : function (response) {
                        console.log(response);
                    }
                });
            }else{
                swal("Oops! We're still good :) ");
            }
        });
    });


    // See All plans Modal open-plan-update
    $('.open-plan-modal').on('click', function(){
        let sid = $(this).data('id');
        $('#plan-body').empty();
        $('.plan-name').text($(this).data('name'));
        $.ajax({
            url : base_url + 'ajax/fetch_plans/',
            method: 'POST',
            data : {'service_id' : sid },
            success : function(response){

                if( response.status === 'success' ){
                    let count = response.message.length;
                    for( let i = 0; i < count; i++ ){
                        $(`<tr><td>${i +1}</td><td class="text-center">${response.message[i].name}</td><td class="text-center">${response.message[i].amount}</td></tr>`).appendTo('#plan-body');
                    }
                }else{
                    sweet_alert('Error!', 'There was an error fetching this service plan' );
                }
            },
            error : function (response) {
                console.log(response);
            }
        });
    });

    $('.open-plan-update').on('click', function(){
        let id = $(this).data('id');
        $('#plan-body').empty();
        $('#plan_name').val($(this).data('name'));
        $('#plan_value').val($(this).data('amount'));
        $('#edit_plan_id').val(id);

    });
    
    $('.update-plan').on('click', function () {
        let plan_name = $('#plan_name').val();
        let plan_amount = $('#plan_value').val();
        let id = $('#edit_plan_id').val();

        $.ajax({
            url : base_url + 'ajax/update_plan/',
            method: 'POST',
            data : {'id' : id, 'plan_name' : plan_name, 'plan_amount' : plan_amount },
            success : function(response){
                if( response.status === 'success' ){
                    sweet_alert('Success', 'Plan updated successfully.', 'success');
                }else{
                    sweet_alert('Error!', 'There was an error updating the plan', 'error' );
                }
                $('.swal-button--confirm').on('click', function () {
                    window.location = window.location.href;
                });
            },
            error : function (response) {
                console.log(response);
            }
        });

    });

    // validate the smart card number
    $('#smart_card_number').on('blur', function(){
        let number = $(this).val();
        let network_name = $('#network').find(':selected').data('network-name');
        if( $('#network').val() !== '' && number !== '' ){
            $.ajax({
                url : base_url + 'ajax/verify_iuc_number/',
                method: "POST",
                data: { 'iuc' : number ,'network' : network_name},
                success: function( response ){
                    if( response['message'] === 'invalid_smartcardno' ){
                        $('.tv-cable').prop('disabled', true);
                        $('#smart-card-info').text('Invalid Smart card number.')
                    }else{
                        $('#smart-card-info').text(`Customer Name: ${response['message']}`);
                        $('#registered_name').val(response['message']);
                        $('.tv-cable').prop('disabled', false);
                    }
                }
            });
        }
    });

    // Pin transfer
    // $('#pin_amount').on('change', function () {
    //     let _val = $(this).val();
    //     let options = $('#how_to_receive > option').length;
    //     if( _val >= 1000 ){
    //         for ( i = 0 ; i < options; i++ ){
    //             $('#how_to_receive').children(i+1).prop('disabled', false);
    //         }
    //     }else{
    //         // disable
    //         for ( i = 0 ; i < options; i++ ){
    //             console.log(i);
    //             $('#how_to_receive').children(i+1).prop('disabled', true);
    //         }
    //     }
    // });


});


function format_currency(str) {
    return '₦' + str.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")
}

// Sweet Notification

function sweet_alert(title, message, type ='error', close = true) {
    const template = (`<strong'>${message}</strong>`);
    // alert( close);
    // return false;
    swal({
        icon : type,
        title : title,
        closeOnClickOutside: close,
        closeOnEsc: close,
        content :{
            element : 'p',
            attributes : {
                innerHTML : `${template}`
            }
        }
    });
}



function addCommas(nStr) {
    nStr += '';
    var x = nStr.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}


function payWithPaystack( data ){
    var handler = PaystackPop.setup({
        key: pk_key,
        email: user.email,
        amount: data.amount,
        currency: "NGN",
        ref: ''+data.ref,
        metadata: {
            custom_fields: [
                {
                    display_name: "",
                    variable_name: "user",
                    value: user.user
                }
            ]
        },
        callback: function(response){
            // alert('success. transaction ref is ' + response.reference);
            verifyPaystack( response.reference, data.ref );
        },
        onClose: function(){
            sweet_alert('Info', "You closed the window, and for this reason we couldn'nt validate your payment", 'info');
        }
    });
    handler.openIframe();
}

function verifyPaystack( pref, ref){
    $.ajax({
        url : base_url + 'ajax/verifyPaystack/',
        method : "POST",
        data : {'reference' : pref, 'ref' : ref },
        success: function (response) {
            if( response.status === 'success' ){
                sweet_alert('Success!', response.message, response.status );
                console.log(response.message);
            }else{
                sweet_alert('Error!', response.message, response.status );
                console.log(response.message);
            }
        },
        error : function (response) {
            console.log(response.responseText);
        }
    });
}




