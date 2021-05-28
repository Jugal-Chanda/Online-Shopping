<?php
include_once "session.php";

if(checkSessionIsSet('error'))
{
    
    $errors = getSessionData('error');
    foreach ($errors as $value) {
    ?>
    <script>toastr.error('<?php echo $value; ?>')</script>
<?php
    }
}
addToSession('error',array());
?>
<?php
if(checkSessionIsSet('success'))
{   
    $successes = getSessionData('success');
    foreach ($successes as $value) {
    ?>
    <script>toastr.success('<?php echo $value; ?>')</script>
<?php
    }
}
addToSession('success',array());
?>
