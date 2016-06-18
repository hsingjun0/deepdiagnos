//$('document').ready(function(){


    /* form submit */
    // https://www.sanwebe.com/2016/01/ajax-registration-script-using-jquery-with-php-and-mysql OR
    // http://www.codingcage.com/2015/11/ajax-registration-script-using-jquery-php.html
    function submitForm()
    {
        var data = $("#register-form").serialize();

        $.ajax({

            type : 'POST',
            url  : 'user/register.php',
            data : data,

           beforeSend: function()
           {
                $("#email-error").fadeOut();
                $("#reg_submit").html('<span class="req"></span> &nbsp; sending ...');
           },

            success: function(data)
            {
                if(data==1){


                    //$("#email-error").fadeIn(1000, function(){

                        $("#email-error").replaceWith("<div class='field-wrap' id='email-error'><label>Email already taken!<span class='req'>*</span></label><input id='reg_email' name='user_email' type='email' required autocomplete='off'/></div>");
                        //$("#error").html('<div class="field-wrap"> <span class="req"></span> &nbsp; Sorry email already taken !</div>');
                     //   $("#email-error").html('<div class="field-wrap"><span class="req"></span></div><div class="field-wrap"><span class="req"></span>Sorry email already taken !</div>');
                        //$("#reg_submit").html('<span class="req"></span> &nbsp; Create Account');

                    //});

                }
                else if(data=="registered")
                {

                    //$("#reg_submit").html('Signing Up');
                    //setTimeout('$(".form-signin").fadeOut(500, function(){ $(".signin-form").load("successreg.php"); }); ',5000); // <== work here

                }
                else{

                    $("#email-error").fadeIn(1000, function(){

                        $("#email-error").html('<div class="field-wrap"><span class="req"></span> &nbsp; '+data+' !</div>');

                        $("#reg_submit").html('<span class="req"></span> &nbsp; Create Account');

                    });

                }
            }
        });
        return false;
    }
    /* form submit */

//});
