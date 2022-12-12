<html>
<body>
Welcome  
<?php echo $_POST["name"]; ?>
<br>
Your email address is: <?php echo $_POST["email"]; ?>
<br>
The server side script is on: 
<?php
$name =gethostname();
print_r($name);
?>


</body>
</html> 
