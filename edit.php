<?php
    session_start();
    
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        
        require 'model/contacts.php';
        $contacts = new contacts();
        $data = $contacts->getContactUsingId($id);
        
        if(!$data) {
            die('Failed to read contact details');
        }
        
    } else if(isset($_POST['updateContact']) && ($_POST['updateContact'] == 'Update')) {
        $data['id'] = $_POST['id'];
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
            $result = $contacts->updateContact($data);
            
            if($result) {
                $_SESSION['msg'] = 'Contact updated successfully';
                header('Location: list.php');
            } else {
                die('Failed to update contact');
            }
        }
    } else {
        $_SESSION['msg'] = 'Illegal access of edit page';
        header('Location: list.php');
    }
    
    
    // Include body
    require 'views/editview.php';
?>