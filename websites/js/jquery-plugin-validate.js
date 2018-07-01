/**
 * simple form validation to replace wforms functions
 */
function isDate(s) {
    var testDate = new Date(s);
    return !isNaN(testDate);
}
function isEmail(s) {
    var regexpEmail = /\w{1,}[@][\w\-]{1,}([.]([\w\-]{1,})){1,3}$/;
    return regexpEmail.test(s);
}
function isInteger(s) {
    var regexp = /^[+]?\d+$/;
    return regexp.test(s);
}
function isFloat(s) {
    return !isNaN(parseFloat(s));
}

function formValidation() {
    var valid = true;
    var noe = 0;
    $(".required").each(function() {
        if($.trim($(this).val()) == "") {
            noe = noe + 1;
            $(this).addClass("errFld");
            valid = false;
        } else {
            $(this).removeClass("errFld");
        }
    });
    $(".required-cb").each(function() {
        if(!$(this).is(":checked")) {
            noe = noe + 1;
            $(this).addClass("errFld");
            valid = false;
        } else {
            $(this).removeClass("errFld");
        }
    });
    $(".validate-date").each(function() {
        if($.trim($(this).val()) != "") {
            if(!isDate($(this).val())) {
                noe = noe + 1;
                $(this).addClass("errFld");
                valid = false;
            } else {
                $(this).removeClass("errFld");
            }
        }
    });
    $(".validate-email").each(function() {
        if($.trim($(this).val()) != "") {
            if(!isEmail($(this).val())) {
                noe = noe + 1;
                $(this).addClass("errFld");
                valid = false;
            } else {
                $(this).removeClass("errFld");
            }
        }
    });
    $(".validate-integer").each(function() {
        if($.trim($(this).val()) != "") {
            if(!isInteger($(this).val().replace(/,/g, ""))) {
                noe = noe + 1;
                $(this).addClass("errFld");
                valid = false;
            } else {
                $(this).removeClass("errFld");
            }
        }
    });
    $(".validate-float").each(function() {
        if($.trim($(this).val()) != "") {
            if(!isFloat($(this).val().replace(/,/g, ""))) {
                noe = noe + 1;
                $(this).addClass("errFld");
                valid = false;
            } else {
                $(this).removeClass("errFld");
            }
        }
    });
    if(!valid) {
        //alert(noe + " error(s) detected.\nPlease check the information you provided.")
    }
    return valid;
}