<?php
session_start();
require 'model/contacts.php';

$method = isset($_GET['method']) ? $_GET['method'] : 'id';

$contacts = new contacts();
$records = array();

switch ($method) {
    case 'fname':
        $records = $contacts->getAllContactsSortedByFname();
        break;
    case 'email':
        $records = $contacts->getAllContactsSortedByEmail();
        break;
    case 'id':
    default:
        $records = $contacts->getAllContactsSortedById();
        break;
}

require 'views/listview.php';

?>