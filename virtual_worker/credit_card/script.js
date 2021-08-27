Date.prototype.isValid = function () {
    return this.getTime() === this.getTime();
};

$(document).ready(function(){
    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var vehicle_type;
    var canvasDiv = document.getElementById('canvasDiv');
    
    var canvas = document.createElement('canvas');
    canvas.setAttribute('id', 'canvas');
    canvasDiv.appendChild(canvas);
    
    $("#canvas").attr('height', $("#canvasDiv").outerHeight());
    $("#canvas").attr('width', $("#canvasDiv").width());
    if (typeof G_vmlCanvasManager != 'undefined') {
        canvas = G_vmlCanvasManager.initElement(canvas);
    }
    
    context = canvas.getContext("2d");
    $('#canvas').mousedown(function(e) {
        var offset = $(this).offset()
        var mouseX = e.pageX - this.offsetLeft;
        var mouseY = e.pageY - this.offsetTop;

        paint = true;
        addClick(e.pageX - offset.left, e.pageY - offset.top);
        redraw();
    });

    $('#canvas').mousemove(function(e) {
        if (paint) {
            var offset = $(this).offset()
            //addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
            addClick(e.pageX - offset.left, e.pageY - offset.top, true);
            console.log(e.pageX, offset.left, e.pageY, offset.top);
            redraw();
        }
    });

    $('#canvas').mouseup(function(e) {
        paint = false;
    });

    $('#canvas').mouseleave(function(e) {
        paint = false;
    });

    var clickX = new Array();
    var clickY = new Array();
    var clickDrag = new Array();
    var paint;

    function addClick(x, y, dragging) {
        clickX.push(x);
        clickY.push(y);
        clickDrag.push(dragging);
    }

    $("#reset-btn").click(function() {
        context.clearRect(0, 0, window.innerWidth, window.innerWidth);
        clickX = [];
        clickY = [];
        clickDrag = [];
    });

    $(document).on('click', '#btn-save', function() {
        var mycanvas = document.getElementById('canvas');
        var img = mycanvas.toDataURL("image/png");
        anchor = $("#signature");
        anchor.val(img);
    });

    var drawing = false;
    var mousePos = {
        x: 0,
        y: 0
    };
    var lastPos = mousePos;

    canvas.addEventListener("touchstart", function(e) {
        mousePos = getTouchPos(canvas, e);
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousedown", {
            clientX: touch.clientX,
            clientY: touch.clientY
        });
        canvas.dispatchEvent(mouseEvent);
    }, false);


    canvas.addEventListener("touchend", function(e) {
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas.dispatchEvent(mouseEvent);
    }, false);


    canvas.addEventListener("touchmove", function(e) {

        var touch = e.touches[0];
        var offset = $('#canvas').offset();
        var mouseEvent = new MouseEvent("mousemove", {
            clientX: touch.clientX,
            clientY: touch.clientY
        });
        canvas.dispatchEvent(mouseEvent);
    }, false);



    // Get the position of a touch relative to the canvas
    function getTouchPos(canvasDiv, touchEvent) {
        var rect = canvasDiv.getBoundingClientRect();
        return {
            x: touchEvent.touches[0].clientX - rect.left,
            y: touchEvent.touches[0].clientY - rect.top
        };
    }


    var elem = document.getElementById("canvas");

    var defaultPrevent = function(e) {
        e.preventDefault();
    }
    elem.addEventListener("touchstart", defaultPrevent);
    elem.addEventListener("touchmove", defaultPrevent);


    function redraw() {
        //
        lastPos = mousePos;
        for (var i = 0; i < clickX.length; i++) {
            context.beginPath();
            if (clickDrag[i] && i) {
                context.moveTo(clickX[i - 1], clickY[i - 1]);
            } else {
                context.moveTo(clickX[i] - 1, clickY[i]);
            }
            context.lineTo(clickX[i], clickY[i]);
            context.closePath();
            context.stroke();
        }
    }
    let flag1, flag2;

    $('#age').keyup(function(){
        if($(this).val().trim() === ''){
            $('#age_err').text('Enter age');
            $('#next').prop('disabled', true);
        }else{
            var value = $(this).val().trim();
            var pattern = /^\d+$/;
            var result = value.match(pattern);
            if(value != result){
                $('#age_err').text('Enter valid number');
                flag1 = false;
            }else{
                if(parseInt(value) >= 18){
                    $('#age_err').text('');
                    flag1 = true;
                    if(flag1 && flag2){
                        $('#age_err').text('');
                        $('#income_err').text('');
                        $('#next').prop('disabled', false);
                    }else{
                        if(!flag1){
                            $('#age_err').text('Minimum age of 18 years is valid');
                        }
                        if(!flag2){
                            $('#income_err').text('Minimum income of Rs. 20,000 is eligible for Credit Card');
                        }
                    }
                }else{
                    $('#age_err').text('Minimum age of 18 years is valid');
                    flag1 = false;
                }
            }
        }
    });

    $('#income').keyup(function(){
        if($(this).val().trim() === ''){
            $('#income_err').text('Enter income');
            $('#next').prop('disabled', true);
        }else{
            var value = $(this).val().trim();
            var pattern = /^\d+$/;
            var result = value.match(pattern);
            if(value != result){
                $('#income_err').text('Enter valid number');
                flag2 = false;
            }else{
                if(parseInt(value) >= 20000){
                    $('#income_err').text('');
                    flag2 = true;
                    if(flag1 && flag2){
                        $('#age_err').text('');
                        $('#income_err').text('');
                        $('#next').prop('disabled', false);
                    }else{
                        if(!flag1){
                            $('#age_err').text('Minimum age of 18 years is valid');
                        }
                        if(!flag2){
                            $('#income_err').text('Minimum income of Rs. 20,000 is eligible for Credit Card');
                        }
                    }
                }else{
                    $('#income_err').text('Minimum income should be 20000');
                    flag2 = false;
                }
            }
        }
    });
    $('#next').click(function(){
        if(flag1 && flag2){
            $('#age_err').text('');
            $('#income_err').text('');
            $('#next').prop('disabled', false);
        }else{
            if(!flag1){
                $('#age_err').text('Minimum age of 18 years is valid');
            }
            if(!flag2){
                $('#income_err').text('Minimum income of Rs. 20,000 is eligible for Credit Card');
            }
            $('#next').prop('disabled', true);
        }
    });

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
    $('#card_name').change(function(){
        if($(this).val().trim() === ''){
            $('#card_name_err').text('Enter Name preffered on the card');
        }else{
            $('#card_name_err').text('');
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
                if(parseInt(current_year) - parseInt(d.getFullYear()) < 18){
                    $('#dob_err').text('Minimum age must be 18');
                }else{
                    $('#dob_err').text('');
                }
            }
        }
    });
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
                    $('#identification_label').text('PAN Document Proof');
                }
            }
        }
    });
    $('#passport').change(function(){
        if(!$(this).hasClass('d-none')){
            if($(this).val().trim() === ''){
                $('#passport_err').text('Enter Passport Number');
            }else{
                $('#passport_err').text('');
                $('#identification_label').text('Passport Document Proof');
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
    $("#dependants").change(function(){
        if($(this).val().trim() === ''){
            $('#dependants_err').text('Enter the number of dependants');
        }else{
            var value = $(this).val().trim();
            var pattern = /^\d+$/;
            var result = value.match(pattern);
            if(result != value){
                $('#dependants_err').text('Enter valid number');
            }else{
                $('#dependants_err').text('');
            }
        }
    });
    $('#curr_address').change(function(){
        if($(this).val().trim() === ''){
            $('#address_err').text('Enter Address');
        }else{
            $('#address_err').text('');
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
    $('#pincode').change(function(){
        if($(this).val().trim() === ''){
            $('#pincode_err').text('Enter Pincode');
        }else{
            $.ajax({
                url:'get_address.php',
                method: 'POST',
                data: 'pincode=' + $(this).val().trim(),
                success: function(data){
                    if(data === 'nill'){
                        $('#pincode_err').html('Enter valid pincode');
                    }else{
                        $('#pincode_err').html('');
                        let address_specs = $.parseJSON(data);
                        $('#city').val(address_specs.city);
                        $('#state').val(address_specs.state);
                    }
                }
            });
        }
    });
    $('#city').change(function(){
        if($(this).val().trim() === ''){
            $('#city_err').text('Enter City');
        }else{
            $('#city_err').text('');
        }
    });
    $('#state').change(function(){
        if($(this).val().trim() === ''){
            $('#state_err').text('Enter State');
        }else{
            $('#state_err').text('');
        }
    });
    $('#month').change(function(){
        if($(this).val().trim() === ''){
            $('#month_err').text('Enter the year');
        }else{
            var value = $(this).val().trim();
            var pattern = /^[12][0-9]{3}$/;
            var result = $(this).val().match(pattern);
            var cur = new Date().getFullYear();
            if(result != value || value > cur){
                $('#month_err').text('Enter a valid year');
            }else{
                $('#month_err').text('');
            }
        }
    });
    $('#vehicle_make').change(function(){
        if(vehicle_type === "others"){
            if($('#vehicle_make').val().trim() === ''){
                $('#vehicle_make_err').text('Enter Vehicle type');
            }else{
                $('#vehicle_make_err').text('');
            }
        }
    });
    $("#vehicle_year").change(function(){
        if(vehicle_type !== "none"){
            if($(this).val().trim() === ''){
                $('#vehicle_year_err').text('Enter year of Purchase of the vehicle');
            }else{
                var value = $(this).val().trim();
                var pattern = /^[12][0-9]{3}$/;
                var result = $(this).val().match(pattern);
                var cur = new Date().getFullYear();
                if(result != value || value > cur){
                    $('#vehicle_year_err').text('Enter a valid year');
                }else{
                    $('#vehicle_year_err').text('');
                }
            }
        }
    });
    $('#company_name').change(function(){
        if($(this).val().trim() === ''){
            $('#company_name_err').text('Enter Company Name');
        }else{
            $('#company_name_err').text('');
        }
    });
    $('#designation').change(function(){
        if($(this).val().trim() === ''){
            $('#designation_err').text('Enter Designation');
        }else{
            $('#designation_err').text('');
        }
    });
    $('#company_address').change(function(){
        if($(this).val().trim() === ''){
            $('#company_address_err').text('Enter Company Address');
        }else{
            $('#company_address_err').text('');
        }
    });
    $('#company_pincode').change(function(){
        if($(this).val().trim() === ''){
            $('#company_pincode_err').text('Enter Company Pincode');
        }else{
            $.ajax({
                url:'get_address.php',
                method: 'POST',
                data: 'pincode=' + $(this).val().trim(),
                success: function(data){
                    if(data === 'nill'){
                        $('#company_pincode_err').html('Enter valid pincode');
                    }else{
                        $('#company_pincode_err').html('');
                        let address_specs = $.parseJSON(data);
                        $('#company_city').val(address_specs.city);
                        $('#company_state').val(address_specs.state);
                    }
                }
            });
        }
    });
    $('#company_city').change(function(){
        if($(this).val().trim() === ''){
            $('#company_city_err').text('Enter City');
        }else{
            $('#company_city_err').text('');
        }
    });
    $('#company_state').change(function(){
        if($(this).val().trim() === ''){
            $('#company_state_err').text('Enter State');
        }else{
            $('#company_state_err').text('');
        }
    });
    $('#gross_income').change(function(){
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
    });
    $('#gross_expense').change(function(){
        if($(this).val().trim() === ''){
            $('#gross_expense_err').text('Enter monthly expenses');
        }else{
            var value = $(this).val().trim();
            var pattern = /^\d+$/;
            var result = value.match(pattern);
            if(value != result){
                $('#gross_expense_err').text('Enter valid number');
            }else{
                $('#gross_expense_err').text('');
            }
        }
    });
    $('#existing_no').change(function(){
        if(!$(this).hasClass('d-none')){
            if($(this).val().trim() === ''){
                $('#existing_no_err').text('Enter your Account number or Loan number')
            }else{
                $('#existing_no_err').text('');
            }
        }
    });
    $('#customer_no').change(function(){
        if(!$(this).hasClass('d-none')){
            if($(this).val().trim() === ''){
                $('#customer_no_err').text('Enter your Customer ID number');
            }else{
                $('#customer_no_err').text('');
            }
        }
    });
    $("#nationality input[type=radio]").change(function(){
        if($(this).val() === "Indian"){
            $("#pan").removeClass("d-none");
            $("#passport").addClass("d-none");
        }else if($(this).val() === "Foreign"){
            $("#pan").addClass("d-none");
            $("#passport").removeClass("d-none");
        }
    });

    $('#vehicle input[type=radio]').change(function(){
        vehicle_type = $(this).val();
        if($(this).val() === "others"){
            $("#vehicle_make").removeClass("d-none");
        }else{
            $("#vehicle_make").addClass("d-none");
        }
        if($(this).val() !== "none"){
            $("#vehicle_yr_lbl").removeClass("d-none");
            $("#vehicle_year").removeClass("d-none");
        }else{
            $("#vehicle_yr_lbl").addClass("d-none");
            $("#vehicle_year").addClass("d-none");
        }
    });

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

    // $(".submit").click(function(){
    //     return false;
    // })
});
