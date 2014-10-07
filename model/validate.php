<?php
class validator {
    function validate($data) {
        $errors = array();
        
        $fnameValidationResult = self::validateName($data['fname'], 'First Name');
        if($fnameValidationResult !== true) {
            $errors['fname'] = $fnameValidationResult;
        }
        
        $lnameValidationResult = self::validateName($data['lname'], 'Last Name');
        if($lnameValidationResult !== true) {
            $errors['lname'] = $lnameValidationResult;
        }
        
        $emailValidationResult = self::validateEmail($data['email']);
        if($emailValidationResult !== true) {
            $errors['email'] = $emailValidationResult;
        }
        
        $phoneValidationResult = self::validatePhone($data['phone']);
        if($phoneValidationResult !== true) {
            $errors['phone'] = $phoneValidationResult;
        }
        
        if(empty($errors)) {
            return true;
        } else {
            return $errors;
        }
    }
    
    function validateName($value, $fieldName) {
        if(empty($value)) {
            return 'Please input ' . $fieldName;
        }
        
        if(!preg_match("/^[a-zA-Z\s\']+$/", $value)) {
            return $fieldName . ' can contain only alphabets, spaces and single quotes';
        }
        
        if(preg_match("/\s\s+/", $value)) {
            return $fieldName . ' should not contain more than one space.';
        }
        
        return true;
    }
    
    function validateEmail($email) {
        if(empty($email)) {
            return 'Please input email address';
        }
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return 'Please input a valid email address';
        }
        
        return true;
    }
    
    function validatePhone($phone) {
        if(empty($phone)) {
            return 'Please input Phone Number';
        }
        
        $phoneNum = preg_replace("/[^\d]/", "", $phone);
        if(strlen($phoneNum) != 10) {
            return 'Please input a valid Phone Number';
        }
        
        return true;
    }
}