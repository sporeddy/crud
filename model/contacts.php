<?php

require 'db.php';

class contacts {
    public function getContacts($query) {
        $con = db::getConnection();
        if(!$con) {
            echo 'Failed to connect to database';
            return false;
        }
        
        $result = mysqli_query($con, $query);
        
        $response = array();
        if($result) {
            while($row = mysqli_fetch_array($result)) {
                $record['id'] = $row['id'];
                $record['fname'] = $row['fname'];
                $record['lname'] = $row['lname'];
                $record['email'] = $row['email'];
                $record['phone'] = $row['phone'];
                
                array_push($response, $record);
            }
        
            return $response;
        }
        
        return false;
    }
    
    public function getAllContacts() {
        return self::getContacts('SELECT * FROM `contacts`');
    }
    
    public function getAllContactsSortedByFname() {
        return self::getContacts('SELECT * FROM `contacts` Order By `fname`');
    }
    
    public function getAllContactsSortedByEmail() {
        return self::getContacts('SELECT * FROM `contacts` Order By `email`');
    }
    
    public function getAllContactsSortedById() {
        return self::getContacts('SELECT * FROM `contacts` Order By `id`');
    }
    
    public function getContactUsingId($id) {
        if(!isset($id)) return false;
        
        $con = db::getConnection();
        if(!$con) {
            echo 'Failed to connect to database';
            return false;
        }
        
        $stmt = $con->prepare("SELECT * FROM `contacts` WHERE `id` = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        
        $record = array();
        $stmt->bind_result($record['id'], $record['fname'], $record['lname'], $record['email'], $record['phone']);
        
        if(mysqli_stmt_affected_rows($stmt)) {
            while($stmt->fetch()) {
                
            }
            return $record;
        }
        
        print_r(mysqli_error($con));
        return false;
    }
    
    public function addContact($data) {
        if(empty($data) && !is_array($data)) return false;
        
        $con = db::getConnection();
        if(!$con) {
            echo 'Failed to connect to database';
            return false;
        }
        
        $stmt = $con->prepare("INSERT INTO `contacts` (`fname`, `lname`, `email`, `phone`) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssss', $data['fname'], $data['lname'], $data['email'], $data['phone']);
        
        $stmt->execute();
        $affectedRows = mysqli_stmt_affected_rows($stmt);
        mysqli_stmt_close($stmt);
        
        if($affectedRows) {
            return true;
        }
        
        print_r(mysqli_error($con));
        return false;
    }
    
    public function updateContact($data) {
        if(empty($data) && !is_array($data)) return false;
        
        $con = db::getConnection();
        if(!$con) {
            echo 'Failed to connect to database';
            return false;
        }
        
        $stmt = $con->prepare("UPDATE `contacts` SET `fname`=?, `lname`=?, `email`=?, `phone`=? WHERE `id`=?");
        $stmt->bind_param('ssssi', $data['fname'], $data['lname'], $data['email'], $data['phone'], $data['id']);
        
        $status = $stmt->execute();
        if($status) {
            return true;
        }
        
        print_r(mysqli_error($con));
        return false;
    }
    
    public function deleteContactUsingId($id) {
        if(!isset($id)) return false;
        
        $con = db::getConnection();
        if(!$con) {
            echo 'Failed to connect to database';
            return false;
        }
        
        $query = "DELETE FROM `contacts` WHERE `id` = ".$id;
        $result = mysqli_query($con, $query);
        if($result) {
            return true;
        }
        
        print_r(mysqli_error($con));
        return false;
    }
}