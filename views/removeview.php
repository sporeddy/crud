<?php 
    // Include header file
    require 'views/header.php';
?>

<h2> Delete contact</h2>
<div> This action cannot be undone. Are you sure to delete record <?php echo $_GET['id']; ?>? </div>

<form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" >
    <input type="submit" name="confirm" class="btn btn-success" value="Yes" >
    <a href="/crud" class="btn btn-default">No</a>
</form>

<?php 
    // Include footer file
    require 'views/footer.php';
?>