function validate() {
    $('.error').html('');
    
    var fName = $.trim(document.getElementById('fname').value);
    var fNameError = validateName(fName, 'fnameError', 'First Name');
    
    var lName = $.trim(document.getElementById('lname').value);
    var lNameError = validateName(lName, 'lnameError', 'Last Name');
    
    var email = $.trim(document.getElementById('email').value);
    var emailError = validateEmail(email);
    
    var phoneNum = $.trim(document.getElementById('phone').value);
    var phoneError = validatePhone(phoneNum);
    
    if(!fNameError || !lNameError || !emailError || !phoneError) {
        return false;
    }
    
    return true;
}

function validateName(value, errorFieldId, fieldName) {
    if(isEmpty(value)) {
        $('#' + errorFieldId).html('Please input ' + fieldName);
        return false;
    }
    
    if(!isValidString(value)) {
        $('#' + errorFieldId).html(fieldName +' can contain only alphabets, spaces and single quotes');
        return false;
    }
    
    if(hasMoreThanOneWhiteSpace(value)) {
        $('#' + errorFieldId).html(fieldName +' should not contain more than one space.');
        return false;
    }
    
    return true;
}

function isEmpty(value) {
    return (!value || /^\s*$/.test(value));
}

function isValidString(value) {
    var regex = /^[A-Za-z\s\']+$/;
    return regex.test(value);
}

function hasMoreThanOneWhiteSpace(value) {
    var regex = /\s{2,}/;
    return regex.test(value);
}

function validateEmail(email) {
    if(isEmpty(email)) {
        $('#emailError').html('Please input email address');
        return false;
    }
    
    var regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!regex.test(email)) {
        $('#emailError').html('Please input a valid email address');
        return false;
    }
    
    return true;
}

function validatePhone(phoneNum) {
    if(isEmpty(phoneNum)) {
        $('#phoneError').html('Please input Phone Number');
        return false;
    }
    
    var regex = /^[1-9]\d{2}[0-9]\d{2}\d{4}$/;
    var phoneStatus = phoneNum.replace(/\D/g, "");
    if(!regex.test(phoneStatus)) {
        $('#phoneError').html('Please input a valid Phone Number');
        return false;
    }
    
    return true;
}