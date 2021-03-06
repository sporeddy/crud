<?php 
    // Include header file
    require 'views/header.php';
?>

<h2> Edit contact</h2>

<div>
    <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return validate()">
        
        <div class="form-group">
            <label for="fname" class="col-sm-1 control-label">First Name <span class="required">*</span></label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" value="<?php echo htmlspecialchars($data['fname']); ?>">
            </div>
            <div id="fnameError" class="error">
                <?php echo (isset($validatorResult) && isset($validatorResult['fname'])) ? $validatorResult['fname'] : '';?>
            </div>
        </div>
        
        <div class="form-group">
            <label for="lname" class="col-sm-1 control-label">Last Name <span class="required">*</span></label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" value="<?php echo htmlspecialchars($data['lname']); ?>">
            </div>
            <div id="lnameError" class="error">
                <?php echo (isset($validatorResult) && isset($validatorResult['lname'])) ? $validatorResult['lname'] : '';?>
            </div>
        </div>
        
        <div class="form-group">
            <label for="email" class="col-sm-1 control-label">Email <span class="required">*</span></label>
            <div class="col-sm-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="Input your Email Here" value="<?php echo htmlspecialchars($data['email']); ?>">
            </div>
            <div id="emailError" class="error">
                <?php echo (isset($validatorResult) && isset($validatorResult['email'])) ? $validatorResult['email'] : '';?>
            </div>
        </div>
        
        <div class="form-group">
            <label for="phone" class="col-sm-1 control-label">Phone <span class="required">*</span></label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" value="<?php echo htmlspecialchars($data['phone']); ?>">
            </div>
            <div id="phoneError" class="error">
                <?php echo (isset($validatorResult) && isset($validatorResult['phone'])) ? $validatorResult['phone'] : '';?>
            </div>
        </div>
        
        <input type="hidden" value="<?php echo $data['id']; ?>" name="id" />
        <input type="submit" class="btn btn-success" value="Update" name="updateContact" />
        <a href="/crud" class="btn btn-default">Cancel</a>
    </form>
</div>

<?php 
    // Include footer file
    require 'views/footer.php';
?>