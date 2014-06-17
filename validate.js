/* SIGNUP VALIDATION FOR TrailMaps WEBSITE */


var lowerC, upperC, num, specialChar, length, strength = 0;
var pwordValid = false;

// Validate user input in signup form on index.html
function signupValidate() {

    document.getElementById("emailError").innerHTML="";
    document.getElementById("emailError").style.visibility="hidden";

    var valid = false;
    var email = document.forms['signup']['email'].value;
    var password = document.forms['signup']['pword'].value;
    var cPassword = document.forms['signup']['cPword'].value;

    // validate email address
    var pattern = /^[a-z0-9_+]+(\.[-a-z0-9_+])*@[-a-z0-9_]+\.[-a-z0-9_]+$/i;
    if (!pattern.test(email)) {     // invalid
        document.getElementById("signupEmail").style.borderColor="#F00";
        document.getElementById("signupEmail").style.backgroundColor="#F00";
        document.getElementById("signupEmail").value="";
        document.getElementById("signupEmail").placeholder="Not a valid email";
    }
    else    // valid
        valid = true;

    // validate password for a minimum strength
    if (!pwordValid) {      // invalid
        document.getElementById("signupPword").style.borderColor="#F00";
        document.getElementById("signupPword").style.backgroundColor="#F00";
        document.getElementById("signupCpword").style.backgroundColor="#F00";
        document.getElementById("signupCpword").style.borderColor="#F00";
        document.getElementById("signupPword").value="";
        document.getElementById("signupCpword").value="";
        document.getElementById("signupPword").placeholder="Password too weak";
        document.getElementById("signupCpword").placeholder="Password too weak";
        valid = false;
    } else {        // valid
        document.getElementById("signupPword").style.borderColor="#0F0";
        document.getElementById("signupPword").style.backgroundColor="#0F0";
        valid == false ? valid=false : valid=true;
    // validate retyped password for match with password
        if (password != cPassword/* || !pwordValid*/) {     // invalid
            document.getElementById("signupCpword").value="";
            document.getElementById("signupCpword").placeholder="Doesn't match";
            document.getElementById("signupCpword").style.backgroundColor="#F00";
            document.getElementById("signupCpword").style.borderColor="#F00";
            valid = false;
        } else {        // valid
            document.getElementById("signupCpword").style.backgroundColor="#0F0";
            document.getElementById("signupCpword").style.borderColor="#0F0";
            valid == false ? valid=false : valid=true;
        }
    }

    

    return valid;
}





// Validates user input in signup form on index.html
function loginValidate() {

    // NEED TO USE AJAX TO VALIDATE EMAIL AND PASSWORD IN THE DATABASE

    
}





// jQuery for real-time validation
$(function() {

    // Real-time validation of password
    $("#signupPword").keyup(function() {
        var pwordText = $(this).val();
        // test password strength
        if (/[a-z]/.test(pwordText))
            lowerC = 1;
        else
            lowerC = 0;
        if (/[A-Z]/.test(pwordText))
            upperC = 1;
        else
            upperC = 0;
        if (/[0-9]/.test(pwordText))
            num = 1;
        else
            num = 0;
        if (/[-!@#$%^&*_+\.:;?`~]/.test(pwordText))
            specialChar = 1;
        else
            specialChar = 0;

        length = pwordText.length;
        strength = lowerC + upperC + num + specialChar;

        if (length >= 8 && strength >= 3)
            pwordValid = true;
        else
            pwordValid = false;

    // Change password field background color and border color based on real-time validity of password
        if (pwordValid) {
            $("#signupPword").css("backgroundColor", "#0F0");
            $("#signupPword").css("borderColor", "#0F0");
        }
        else {
            $("#signupPword").css("backgroundColor", "#FFF");
            $("#signupPword").css("borderColor", "initial");
        }
    // If password is changed, take out green coloring for retyped password
        if ($("#signupCpword").val() == $("#signupPword").val() && pwordValid)
            $("#signupCpword").css({"backgroundColor":"#0F0", "borderColor":"rgba(#0F0)"});
        else
            $("#signupCpword").css({"backgroundColor":"#FFF", "borderColor":"initial"});
    });

    // Real-time validation of retyped password, change color to green if validated in real-time
    $("#signupCpword").keyup(function() {
        if ($(this).val() == $("#signupPword").val() && pwordValid)
            $("#signupCpword").css({"backgroundColor":"#0F0", "borderColor":"rgba(#0F0)"});
        else
            $("#signupCpword").css({"backgroundColor":"#FFF", "borderColor":"initial"});
    });

    // if ($("#signupEmail").val().length == 0) {
        $("#signupEmail").keyup(function() {
            $("#signupEmail").css({"backgroundColor":"#FFF", "borderColor":"initial"});
        });
    // }

});


