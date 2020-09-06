<?php
if(count($_POST)>0) {
	require_once("db.php");
	$sql = "INSERT INTO users (userName, password, firstName, lastName,dob) VALUES ('" . $_POST["userName"] .
	 "','" . $_POST["password"] . "','" . $_POST["firstName"] . 
	 "','" . $_POST["lastName"] . " ','" . $_POST["dob"] . "')";
	mysqli_query($conn,$sql);
	$current_id = mysqli_insert_id($conn);
	if(!empty($current_id)) {
		$message = "New User Added Successfully";
	}
}
?>
<html>
<head>
<title>Add New User</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body class="content">

<form name="frmUser" onsubmit=" return validation()"  method="post" action="#" >
<div style="width:500px;">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
<div align="right" style="padding-bottom:5px;"><a href="index.php" class="link"><img alt='List' title='List' src='images/list.png' width='15px' height='15px'/> List User</a></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr class="tableheader">
<td colspan="2">Add New User</td>
</tr>
<tr>
<td><label>Username:</label></td>
<td><input type="text" name="userName" id="userName" class="txtField" maxlength="15" onkeypress="validation()" required>
<p id="uservalid"></p></td>
</tr>
<tr>
<td><label>Password:</label></td>
<td><input type="password" name="password" class="txtField" maxlength="15" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}"
 title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 to 15 and
 characters like: @#$(?=.*\d){}" required></td>
</tr>
<td><label>First Name:</label></td>
<td><input type="text" name="firstName" id="firstName" class="txtField" maxlength="15" pattern="[A-Za-z]" title="Only characters"
 onkeypress="allLetter()">
<li class="rq">*Enter alphabets only.</li>
<p id="firstnamevalid"><p></td>
</tr>
<td><label>Last Name:</label></td>
<td><input type="text" name="lastName" class="txtField" maxlength="15" pattern="[A-Za-z]" title="Only characters">
<li class="rq">*Enter alphabets only.</li></td>
</tr>
<td><label class="date">Date of Birth:
    <input type="date" class="txtField" name="dob" min="1950-04-01" max="2020-04-30" required>
  </label><td></tr>
<tr>
<td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
</tr>
</table>
</div>
</form>

</body>
<script>
function validation(){
	var username=document.frmUser.userName.value; 
	  
  if(username.length<8||username.length>15){
	txt="Username length must between 8 to 15";
	document.getElementById("uservalid").innerHTML = txt; 
  return false;  
  }

}
function allLetter()
      {
       // alert("hello");
		  var firstname=document.frmUser.firstName.value; 
      var letters = /^[A-Za-z]+$/;
      if(firstname.match(letters))
      {
        txt="First name must NOT be characters:";
	document.getElementById("firstnamevalid").innerHTML = txt;
      return true;
      }
      else
      {
		txt="First name must be characters:";
	document.getElementById("firstnamevalid").innerHTML = txt;
      return false;
      }
      }
</script>

</html>