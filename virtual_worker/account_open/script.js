Date.prototype.isValid = function () {
    return this.getTime() === this.getTime();
};

$(document).ready(function(){
    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var vehicle_type;
    let type;


    $('#account_type_block input[type=radio]').change(function(){
        let value = $(this).val().trim();
        if(value === 'Kids Advantage'){
            type = 'Kids Advantage';
            $('#guardian_name').removeClass('d-none');
            $('#relation').removeClass('d-none');
            $('#income_proof_block').addClass('d-none');
        }else{
            type = value;
            $('#guardian_name').addClass('d-none');
            $('#relation').addClass('d-none');
            $('#income_proof_block').removeClass('d-none');
        }
    })

    $('#next_main').click(function(){
        let type = $('input[name=account_type]:checked', '#account_form').val();
        let sub_type = $('input[name=account_sub_type]:checked', '#account_form').val();
        if(type && sub_type){
            $('#type_err').text('');
            $('#sub_type_err').text('');
            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

    //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

    //show the next fieldset
            next_fs.show();
    //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function(now) {
    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                        });
                    next_fs.css({'opacity': opacity});
                },
                duration: 600
            });
        }else{
            if(!type){
                $('#type_err').text('Select the Account type');
            }
            if(!sub_type){
                $('#sub_type_err').text('Select the Account type');
            }
        }
    })
//personal_info script
    $('#fname').change(function(){
        if($(this).val().trim() === ''){
            $('#fname_err').text('Enter First Name');
        }else{
            $('#fname_err').text('');
        }
    });
    $('#lname').change(function(){
        if($(this).val().trim() === ''){
            $('#lname_err').text('Enter Last Name');
        }else{
            $('#lname_err').text('');
        }
    });
    $('#guardian_name').change(function(){
        if(!$(this).hasClass('d-none')){
            if($(this).val().trim() === ''){
                $('#guardian_err').text('Enter the guardian name');
            }else{
                $('#guardian_err').text('');
            }
        }
    })
    $('#relation').change(function(){
        if(!$(this).hasClass('d-none')){
            if($(this).val().trim() === ''){
                $('#relation_err').text('Enter the relation between applicant and the guardian');
            }else{
                $('#relation_err').text('');
            }
        }
    });
    $('#dob').change(function(){
        if($(this).val().trim() === ''){
            $('#dob_err').text('Enter your Date of Birth');
        }else{
            var d = new Date($(this).val());
            if(!d.isValid()){
                $('#dob_err').text('Select a valid date');
            }else{
                var current_year = new Date().getFullYear();
                let age = parseInt(current_year) - parseInt(d.getFullYear());
                if(type === 'Kids Advantage'){
                    if(age  >= 18){
                        $('#dob_err').text('Not eligible for Kids Advantage');
                    }else{
                        $('#dob_err').text('');
                    }
                }else{
                    if(age  >= 18){
                        $('#dob_err').text('');
                    }else{
                        $('#dob_err').text('Not eligible for minors');
                    }
                }
            }
        }
    });
    $('#nationality').change(function(){
        if($(this).val().trim() === ''){
            $('#nationality_err').text('Enter Nationality');
        }else{
            $('#nationality_err').text('');
        }
    })
    $('#pan').change(function(){
        if(!$(this).hasClass('d-none')){
            if($(this).val().trim() === ''){
                $('#pan_err').text('Enter PAN Number');
            }else{
                var value = $(this).val().trim();
                var pattern = /^[A-Z]{5}[0-9]{4}[A-Z]{1}$/;
                var result = value.match(pattern);
                if(value != result){
                    $('#pan_err').text('Enter valid PAN Number');
                }else{
                    $('#pan_err').text('');
                }
            }
        }
    });
    $('#aadhar_no').change(function(){
        let value = $(this).val().trim();
        if(value === ''){
            $('#aadhar_err').text('Enter Aadhar number');
        }else{
            const pattern = /^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$/;
            let result = value.match(pattern)
            if(value != result){
                $('#aadhar_err').text('Enter valid aadhar number');
            }else{
                $('#aadhar_err').text('');
            }
        }
    })

//communication_info script
    $('#curr_address').change(function(){
        if($(this).val().trim() === ''){
            $('#address_err').text('Enter Address');
        }else{
            $('#address_err').text('');
        }
    });
    $('#curr_pincode').change(function(){
        if($(this).val().trim() === ''){
            $('#curr_pincode_err').text('Enter Pincode');
        }else{
            $.ajax({
                url:'get_address.php',
                method: 'POST',
                data: 'pincode=' + $(this).val().trim(),
                success: function(data){
                    if(data === 'nill'){
                        $('#curr_pincode_err').html('Enter valid pincode');
                    }else{
                        $('#curr_pincode_err').html('');
                        let address_specs = $.parseJSON(data);
                        $('#curr_city').val(address_specs.city);
                        $('#curr_state').val(address_specs.state);
                        $('#curr_country').val(address_specs.country);
                    }
                }
            });
        }
    });
    $('#curr_city').change(function(){
        if($(this).val().trim() === ''){
            $('#curr_city_err').text('Enter City');
        }else{
            $('#curr_city_err').text('');
        }
    });
    $('#curr_state').change(function(){
        if($(this).val().trim() === ''){
            $('#curr_state_err').text('Enter State');
        }else{
            $('#curr_state_err').text('');
        }
    });
    $('#curr_country').change(function(){
        if($(this).val().trim() === ''){
            $('#curr_country_err').text('Enter State');
        }else{
            $('#curr_country_err').text('');
        }
    });

    $('#perm_address').change(function(){
        if($('.permanent').hasClass('active')){
            if($(this).val().trim() === ''){
                $('#perm_address_err').text('Enter Address');
            }else{
                $('#perm_address_err').text('');
            }
        }
    });
    $('#perm_pincode').change(function(){
        if($('.permanent').hasClass('active')){
            if($(this).val().trim() === ''){
                $('#perm_pincode_err').text('Enter Pincode');
            }else{
                $.ajax({
                    url:'get_address.php',
                    method: 'POST',
                    data: 'pincode=' + $(this).val().trim(),
                    success: function(data){
                        if(data === 'nill'){
                            $('#perm_pincode_err').html('Enter valid pincode');
                        }else{
                            $('#perm_pincode_err').html('');
                            let address_specs = $.parseJSON(data);
                            $('#perm_city').val(address_specs.city);
                            $('#perm_state').val(address_specs.state);
                            $('#perm_country').val(address_specs.country);
                        }
                    }
                });
            }
        }
    });
    $('#perm_city').change(function(){
        if($(this).val().trim() === ''){
            $('#perm_city_err').text('Enter City');
        }else{
            $('#perm_city_err').text('');
        }
    });
    $('#perm_state').change(function(){
        if($(this).val().trim() === ''){
            $('#perm_state_err').text('Enter State');
        }else{
            $('#perm_state_err').text('');
        }
    });
    $('#perm_country').change(function(){
        if($(this).val().trim() === ''){
            $('#perm_country_err').text('Enter State');
        }else{
            $('#perm_country_err').text('');
        }
    });
    $('#stay_period').change(function(){
        if($(this).val().trim() === ''){
            $('#stay_period_err').text('Enter the year');
        }else{
            var value = $(this).val().trim();
            var pattern = /^[12][0-9]{3}$/;
            var result = $(this).val().match(pattern);
            var cur = new Date().getFullYear();
            if(result != value || value > cur){
                $('#stay_period_err').text('Enter a valid year');
            }else{
                $('#stay_period_err').text('');
            }
        }
    });
    $("#mobile").change(function(){
        if($(this).val().trim() === ''){
            $('#mobile_err').text('Enter your Mobile number');
        }else{
            var value = $(this).val().trim();
            var pattern = /^[7-9][0-9]{9}$/;
            var result = value.match(pattern);
            if(result != value){
                $('#mobile_err').text('Enter valid Mobile number');
            }else{
                $('#mobile_err').text('');
            }
        }
    });
    $("#alt_mobile").change(function(){
        var value = $(this).val().trim();
        var pattern = /^[7-9][0-9]{9}$/;
        var result = value.match(pattern);
        if(result != value){
            $('#alt_mobile_err').text('Enter valid Mobile number');
        }else{
            $('#alt_mobile_err').text('');
        }
    });
    $('#email').keyup(function(){
        var value = $(this).val().trim();
        let pattern = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        let result = value.match(pattern);
        if(value != ''){
            if(result != value){
                $('#email_err').html('Enter valid email');
                $('#instant_alert input[type=radio]').attr('disabled', true);
            }else{
                $('#email_err').html('');
                $('#instant_alert input[type=radio]').attr('disabled', false);
            }
        }else{
            $('#email_err').html('');
            $('#alert_yes').prop('checked', true);
            $('#instant_alert input[type=radio]').attr('disabled', true);
        }
    });

    //occupation_info script
    $('#company_name').change(function(){
        if(!$(this).hasClass('d-none')){
            if($(this).val().trim() === ''){
                $('#company_name_err').text('Enter Company Name');
            }else{
                $('#company_name_err').text('');
            }
        }
    });
    $('#company_address').change(function(){
        if(!$(this).hasClass('d-none')){
            if($(this).val().trim() === ''){
                $('#company_address_err').text('Enter Company Address');
            }else{
                $('#company_address_err').text('');
            }
        }
    });

    $('#gross_income').change(function(){
        if(!$(this).hasClass('d-none')){
            if($(this).val().trim() === ''){
                $('#gross_income_err').text('Enter monthly income');
            }else{
                var value = $(this).val().trim();
                var pattern = /^\d+$/;
                var result = value.match(pattern);
                if(value != result){
                    $('#gross_income_err').text('Enter valid income');
                }else{
                    $('#gross_income_err').text('');
                }
            }
        }
    });

    //bank_relationship script
    $('#customer_no').change(function(){
        if(!$(this).hasClass('d-none')){
            if($(this).val().trim() === ''){
                $('#customer_no_err').text('Enter your Customer ID');
            }else{
                $('#customer_no_err').text('');
            }
        }
    });

    $("#pan_exists input[type=radio]").change(function(){
        if($(this).val() === "T"){
            $("#pan").removeClass("d-none");
        }else{
            $("#pan").addClass("d-none");
        }
    });
    $('#permanent_address_block input[type=radio]').change(function(){
        if($(this).val() === 'F'){
            $('.permanent').addClass('active');
            $('.permanent').removeClass('not-active');
        }else{
            $('.permanent').addClass('not-active');
            $('.permanent').removeClass('active');
        }
    })
    $('#occupation_type input[type=radio]').change(function(){
        let value =  $(this).val();
        if(value === 'Salaried'){
            $('#salaried').removeClass('d-none');
        }else{
            $('#salaried').addClass('d-none');
        }
        if(value === 'Salaried' || value === 'Self Employed' || value === 'Other'){
            $('#income_proof_block').removeClass('d-none');
            $('#company_name').removeClass('d-none');
            $('#company_address').removeClass('d-none');
        }else{
            $('#income_proof_block').addClass('d-none');
            $('#company_name').addClass('d-none');
            $('#company_address').addClass('d-none');
        }
        if(value === 'Student' || value === 'Housewife'){
            $('#gross_income').addClass('d-none');
        }else{
            $('#gross_income').removeClass('d-none');
        }
        if(value === 'Other'){
            $('#occupation_other_type').removeClass('d-none');
        }else{
            $('#occupation_other_type').addClass('d-none');
        }
    })
    $('#salaried input[type=radio]').change(function(){
        if($(this).val() === 'Other'){
            $('#salaried_other_type').removeClass('d-none');
        }else{
            $('#salaried_other_type').addClass('d-none');
        }
    })
    $('#customer_div input[type=radio]').change(function(){
        if($(this).val() === "Existing"){
            $("#existing_no").removeClass("d-none");
            $("#customer_no").removeClass("d-none");
        }else{
            $("#existing_no").addClass("d-none");
            $("#customer_no").addClass("d-none");
        }
    });

    $(".next").click(function(){

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

//Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
        next_fs.show();
//hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now) {
// for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                    });
                next_fs.css({'opacity': opacity});
            },
            duration: 600
        });
    });

    $(".previous").click(function(){

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

//Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
        previous_fs.show();

//hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now) {
// for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                'display': 'none',
                'position': 'relative'
                });
                previous_fs.css({'opacity': opacity});
            },
            duration: 600
        });
    });

    $('.radio-group .radio').click(function(){
        $(this).parent().find('.radio').removeClass('selected');
        $(this).addClass('selected');
    });

});
