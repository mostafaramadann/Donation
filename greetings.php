<!DOCTYPE html>

<?php
if(session_status()==PHP_SESSION_NONE)
session_start();
else
$userTypeName = $_SESSION["UsertypeStr"];
?>


<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.alert {
  padding: 20px;
  background-color: green;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
</head>
<body>

<br><br><br><br>

<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  Welcome <strong><?php echo $userTypeName ?></strong>
</div>

</body>
</html>

