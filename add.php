<?php
    session_start();
    
    if(isset($_POST['addNewContact']) && $_POST['addNewContact'] == 'Add') {
        $data['fname'] = isset($_POST['fname']) ? trim($_POST['fname']) : '';
        $data['lname'] = isset($_POST['lname']) ? trim($_POST['lname']) : '';
        $data['email'] = isset($_POST['email']) ? trim($_POST['email']) : '';
        $data['phone'] = isset($_POST['phone']) ? trim($_POST['phone']) : '';
        
        require 'model/validate.php';
        $validator = new validator();
        $validatorResult = $validator->validate($data);
        
        if($validatorResult === true) {
            require 'model/contacts.php';
            $contacts = new contacts();
            $result = $contacts->addContact($data);
            
            if($result) {
                $_SESSION['msg'] = 'Contact Added successfully';
                header('Location: list.php');
            } else {
                die('Failed to add new contact');
            }
        }
    }
    
    // Include body
    require 'views/addview.php';
?>