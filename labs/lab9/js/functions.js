function getCity() {

    //alert($("#zip").val());
    $.ajax({

        type: "GET",
        url: "http://itcdland.csumb.edu/~milara/ajax/cityInfoByZip.php",
        dataType: "json",
        data: { "zip": $("#zip").val() },
        success: function(data, status) {

            if (data == false ) {
                $("#zipExists").html("<b>That Zipcode does not exist!</b>"); 
                $("#city").html("");
                $("#lat").html("");
                $("#long").html("");
            } else {
                $("#zipExists").html("<b></b>"); 
                $("#city").html(data.city);
                $("#lat").html(data.latitude);
                $("#long").html(data.longitude);
            }


        },
        complete: function(data, status) { //optional, used for debugging purposes
            //alert(status);
        }

    }); //ajax

} //getCity()

function getCounties() {
    // alert($("#state").val());
    $.ajax({

        type: "GET",
        url: "http://itcdland.csumb.edu/~milara/ajax/countyList.php",
        dataType: "json",
        data: { "state": $("#state").val() },
        success: function(data, status) {
            $('#county').html("<option> Select one </option>");
            for (i = 0; i < data.length; i++) {
                $("#county").append("<option>" + data[i].county + "</option>")
            } //alert(data[0].county);

        },
        complete: function(data, status) { //optional, used for debugging purposes
            //alert(status);
        }

    }); //ajax
}

function checkUsername() {
    //alert($("#username").val());
    $.ajax({

        type: "GET",
        url: "checkUsernameAPI.php",
        dataType: "json",
        data: { "username":$("#username").val() },
        success: function(data, status) {
            //alert(data);
            
            if (data == false ) {
                $("#usernameAvailability").css('color', 'green');
                $("#usernameAvailability").html("Username is available");
                $("#submit").prop('disabled', false);
            } else {
                $("#usernameAvailability").css('color', 'red');   
                $("#usernameAvailability").html("Username is <b>NOT</b> available"); 
                $("#submit").prop('disabled', true);
            }
             

        },
        complete: function(data, status) { //optional, used for debugging purposes
            //alert(status);
        }

    }); //ajax
}

function checkPasswordMatch() {
    var pass1 = $("#pass1").val();
    var pass2 = $("#pass2").val();
    
    if(pass1 != pass2) {
        $("#passwordCheck").html("Passwords did not match, please retype");
        $("#passwordCheck").css("color", "red");
        $("#pass1").focus();
    } else {
        alert("User Registered");
    }
    
}

$(document).ready(function() {

    $("#zip").change(function() { getCity() });
    $("#state").change(function() { getCounties() });
    $("#username").change(function() { checkUsername() });
    $("#submit").click(function() { checkPasswordMatch() });
    
}); //document.ready