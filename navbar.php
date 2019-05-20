<?php 
if(isset($_POST['regis'])){
	$email = $_POST['email'];
	$name = $_POST['fullname'];
	$pwd = $_POST['pwd'];
	
	$qryIns = "INSERT INTO `users` (email,name,password) VALUES (?,?,?)";
			
	$stmtInsOrd = $conn->prepare($qryIns);
	$stmtInsOrd->bind_param("sss",$email,$name,$pwd);
	$stmtInsOrd->execute();
	echo "<script> alert('Registered!, Please use your email to log in');window.location.href=window.location.href</script>";
}

if(isset($_POST['login'])){
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$get = getAllDatafrom($conn,"users","email",$email);
	
	if($get['email'] == $email && $get['password'] == $pass)
	{
		session_start();
		$name = $get['name'];
		$_SESSION['email'] = $email;
		echo "<script> alert('Welcome $name');window.location.href='user/'</script>";		
	}else{
		echo "<script> alert('Email does not match');window.location.href=window.location.href</script>";
	}
	
}
?>
<div class="topnav" id="myTopnav" style="position: sticky; z-index: 1; top: 0"> 
	<a class="title" href="#home" class="nav-active"><i class="fas fa-home"></i> Home</a>
	<a class="title" href="#product"><i class="fas fa-level-up-alt"></i> Best Selling</a> 
	<a class="title" href="#" onClick="openModal('signup')"><i class="fas fa-user-plus"></i> Sign Up</a> 
	<a class="title" href="#news" onClick="openModal('signin')"><i class="fas fa-sign-in-alt"></i> Sign In</a> 
	<a href="javascript:void(0);" class="icon" onclick="myFunction()"> <i class="fa fa-bars"></i> </a> 
</div>
<div id="signup" class="modal">
  <div class="modal-content">
    <div class="modal-header"> <span class="close signup">&times;</span>
      <h2>Sign Up</h2>
    </div>
    <div class="modal-body">
      <form name="register" method="post">
		<table width="100%">
			<tr>
			<td>Email: </td>
				<td><input class="form-input" name="email" type="email" onBlur="checkEmail(this)"/>
				<a id="noticeemail" style="display: none; color: red"><em>This email has been registered!</em></a>
				</td>
			</tr>	
			<tr>
				<td>Full Name:	</td>
				<td><input class="form-input" name="fullname" id="fullname" type="text" disabled/></td>
			</tr>		  					
			<tr>
			<td>Password: </td>
				<td><input class="form-input" id="pwd" name="pwd" type="password" disabled/></td>
			</tr>			
			<tr>
			<td>Confirm Password: </td>
				<td><input class="form-input" id="pwd2" type="password" onInput="checkpwd()" disabled/>
				<a id="notice" style="display: none;"></a>
				</td>
			</tr>  		
		</table>
    </div>
    <div class="modal-footer" align="left">
      <button class="btn-danger" id="btn" name="regis" disabled>Submit</button>
    </div>
  </form>
  </div>
</div>
	
<div id="signin" class="modal">
  <div class="modal-content modal-content-md">
    <div class="modal-header"> <span class="close signin">&times;</span>
      <h2>Sign In</h2>
    </div>
	 <form method="post" name="loginform">
    <div class="modal-body">
      		<table width="100%">
			<tr>
				<td>Email:	</td>
				<td><input class="form-input" name="email" type="email" required onBlur="checkEmaillog(this)"/>
					<a id="noticelogin" style="display: none; color: red"><em>This email doesn't registered in our database, please sign up</em></a>
				</td>
			</tr>		
			<tr>
			<td>Password: </td>
				<td><input class="form-input" type="password" name="pass" id="passLog" required disabled/></td>
			</tr>			 		
		</table>
    </div>
    <div class="modal-footer" align="left">
      <button class="btn-primary" name="login">Submit</button>
    </div>
	  </form>
  </div>
</div>
<script>
	function checkEmaillog( eml ) {
			$.post( "jquery_post.php", //Required URL of the page on server
				{ // Data Sending With Request To Server
					email: eml.value
				},
				function ( response ) { // Required Callback Function
					if(response == "N")
					{
						document.loginform.passLog.disabled = false;
						document.getElementById('noticelogin').style.display = 'none';						

					}else{
						document.loginform.passLog.disabled = true;
						document.getElementById('noticelogin').style.display = 'block';
					}
				} );
		}
	
		function checkEmail( eml ) {
			$.post( "jquery_post.php", //Required URL of the page on server
				{ // Data Sending With Request To Server
					email: eml.value
				},
				function ( response ) { // Required Callback Function
					if(response == "Y")
					{
						document.register.fullname.disabled = false;
						document.register.pwd.disabled = false;
						document.register.pwd2.disabled = false;
						document.getElementById('noticeemail').style.display = 'none';
						document.getElementById('btn').disabled = false;

					}else{
						document.register.fullname.disabled = true;
						document.register.pwd.disabled = true;
						document.register.pwd2.disabled = true;
						document.getElementById('noticeemail').style.display = 'block';
						document.getElementById('btn').disabled = true;
					}
				} );
		}
		function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

</script>