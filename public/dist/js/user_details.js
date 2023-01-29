$(document).ready(function(){
    $('button.next01').on('click', function(){
        if(!$('input[name="first_name"]').val()){
            const error = '<label id="FormControlInput1-error" class="error" for="FormControlInput1">Please enter first name</label>';
            if(!$('#FormControlInput1-error').length){
                $('input[name="first_name"]').after(error);
            }
            return false;
        }
        if(!$('input[name="last_name"]').val()){
            const error = '<label id="FormControlInput2-error" class="error" for="FormControlInput2">Please enter last name</label>';
            if(!$('#FormControlInput2-error').length){
                $('input[name="last_name"]').after(error);
            }
            return false;
        }
        if(!$('select[name="lstDobDay"]').val() || !$('select[name="lstDobMonth"]').val() || !$('select[name="lstDobYear"]').val()){
            $('#dob_final_err').text('Please select day, month and year');
            return false;
        }
        $('#slide01').hide();
        $('#slide02').show();
    });
    $("#user_details_form").validate({
      // Specify validation rules
      rules: {
        first_name: "required",
        last_name: "required",
        lstDobDay: "required",
        lstDobMonth: "required",
        lstDobYear: "required",
        email: {
          required: true,
          email: true,
          remote: {
            url: $('#uniqueEmailPhoneURL').val(),
            type: "post",
            data: {
              _token: $('#csrf_token').val(),
              'fieldName': 'email',
            }
          }
        },      
        phone: {
          required: true,
          digits: true,
          minlength: 10,
          maxlength: 10,
          remote: {
            url: $('#uniqueEmailPhoneURL').val(),
            type: "post",
            data: {
              _token: $('#csrf_token').val(),
              'fieldName': 'phone',
            }
          }
        },
      },
      messages: {    
       phone: {
        required: "Please enter phone number",
        digits: "Please enter valid phone number",
        minlength: "Phone number field accept only 10 digits",
        maxlength: "Phone number field accept only 10 digits",
       },     
       email: {
        required: "Please enter email address",
        email: "Please enter a valid email address.",
        remote: "Email already exists."
       },
       phone: {
        remote: "Phone number already exists."
       },
      },
    
    });
  });
  function showAddress(){
    if($('.address-div-dynamic').length > 1){
      $('#remove-address-button').show();
    }else{
      $('#remove-address-button').hide();
    }
      $('#address-option').hide();
      $('#user-address-div').show();
  }
  function hideAddress(){
      $('#address-option').show();
      $('#user-address-div').hide();
  }
  function addAddress(){
    const addCount = Number($('.address-div-dynamic').length) + Number(1);  
    $('#address-div-main .address-div-dynamic')
      .last()
      .clone()
      .appendTo($('#address-div-main'))
      .find('label').text('Previous Address '+addCount);
      
      $('#address-div-main .address-div-dynamic')
      .last()
      .find("input:text").val("");
      if($('.address-div-dynamic').length > 1){
        $('#remove-address-button').show();
      }else{
        $('#remove-address-button').hide();
      }
  }
  function removeAddress(){
    $('#address-div-main .address-div-dynamic').last().remove();
    if($('.address-div-dynamic').length > 1){
      $('#remove-address-button').show();
    }else{
      $('#remove-address-button').hide();
    }
  }

  function checkAddress(){
    var line1Filled = $('input[name^=line1]').filter(function() { return $(this).val(); });
    var line2Filled = $('input[name^=line2]').filter(function() { return $(this).val(); });
    var line3Filled = $('input[name^=line3]').filter(function() { return $(this).val(); });
    
    var line1 = $('input[name^=line1]').map(function(idx, elem) {
      return $(elem).val();
    }).get();
    var line2 = $('input[name^=line2]').map(function(idx, elem) {
      return $(elem).val();
    }).get();
    var line3 = $('input[name^=line3]').map(function(idx, elem) {
      return $(elem).val();
    }).get();

    const uniqueLine1 = Array.from(new Set(line1));
    const uniqueLine2 = Array.from(new Set(line2));
    const uniqueLine3 = Array.from(new Set(line3));

    if(line1Filled.length !== line1.length || line3Filled.length !== line2.length || line3Filled.length !== line3.length){
      $('#duplicate-address-error').show();
      $(window).scrollTop(0);
    }else if(uniqueLine1.length !== line1.length && uniqueLine2.length !== line2.length && uniqueLine3.length !== line3.length){
        $('#duplicate-address-error').show();
      $(window).scrollTop(0);
    }else{
      $('#duplicate-address-error').hide();
      $("#user-address-form").submit();
    }
  }