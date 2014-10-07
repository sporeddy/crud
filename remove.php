<?php
    session_start();
    
    if(!isset($_GET['id'])) {
        header('Location: list.php');
    }
    
    if(isset($_POST['id']) && isset($_POST['confirm'])) {
        $id = $_POST['id'];
        
        require 'model/contacts.php';
        $contacts = new contacts();
        $result = $contacts->deleteContactUsingId($id);
        
        if($result) {
            $_SESSION['msg'] = 'Contact removed';
            header('Location: list.php');
        } else {
            die('Failed to delete contact');
        }
    }
    
    require 'views/removeview.php';
?>