<?php 
    // Include header file
    require 'views/header.php';
?>

<?php if(!empty($_SESSION['msg'])) { ?>
    <div class="alert alert-success"><?php echo $_SESSION['msg']; $_SESSION['msg']='';?></div>
<?php }?>

<?php
    if(!empty($records)) {
?>
        <div>
            <h2>Attic Team Contact List</h2>
        </div>
        
        <div class="contactsList">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                        for($i=0; $i<count($records); $i++) {
                    ?>
                            <tr id="<?php echo $records[$i]['id'];?>">
                                <td> <?php echo htmlspecialchars($records[$i]['id']);?> </td>
                                <td> <?php echo htmlspecialchars($records[$i]['fname']); ?> </td>
                                <td> <?php echo htmlspecialchars($records[$i]['lname']); ?> </td>
                                <td> <?php echo htmlspecialchars($records[$i]['email']); ?> </td>
                                <td> <?php echo htmlspecialchars($records[$i]['phone']); ?> </td>
                                <td>
                                    <a id="edit" class="glyphicon glyphicon-edit" href='edit.php?id=<?php echo $records[$i]['id']; ?>'></a>
                                    <a id="remove" class="glyphicon glyphicon-remove" href='remove.php?id=<?php echo $records[$i]['id']; ?>'></a>
                                </td>
                            </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
<?php
    } else {
        echo "Contact list is empty. Please create contact by clicking on Add New Contact button.";
    }
?>

    <div class="clearfix"> </div>
    <a class="btn btn-primary" href="add.php"> Add New Contact </a>
    
    <br><br>
    
    <?php
        if(!empty($records) && count($records) > 1) {
    ?>
        <a class="btn btn-info" href="list.php?method=id"> Sort By Id</a>
        <a class="btn btn-info" href="list.php?method=fname"> Sort By First Name </a>
        <a class="btn btn-info" href="list.php?method=email"> Sort By Email </a>
    <?php
        }
        
        // Include footer file
        require 'views/footer.php';
    ?>