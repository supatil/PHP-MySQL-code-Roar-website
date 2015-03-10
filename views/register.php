
<!-- register form -->
<div id="registerForm">
	
	<form method="post" action="index.php" name="registerform">   
		<div id="regFirstName">
		    <label id="firstNameLabel" for="login_input_first_name">First Name:</label>    
		    <input id="login_input_first_name" class="login_input" type="text" name="first_name" required />   
		</div>
		<div id="regLastName">
		    <label id="lastNameLabel" for="login_input_last_name">Last Name:</label>    
		    <input id="login_input_last_name" class="login_input" type="text" name="last_name" required />   
		</div>
		<div id="regUserName">
		    <label id="userNameLabel"for="login_input_username">Username:</label>
			<div id="userNameInstDiv"><p id="userNameInst">(only letters and numbers, 4 to 32 characters)<p></div>
		    <input id="login_input_username" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,32}" name="user_name" required />
		</div>

		<div id="regEmail">
		    <label id="emailLabel" for="login_input_email">Email Address:</label>    
		    <input id="login_input_email" class="login_input" type="email" name="user_email" required />  
		</div>
		<div id="regPassword">
		    <label id="passwordLabel"for="login_input_password_new">Password:</label>
			<div id="pwInstDiv"><p id="pwInst">(min. 6 characters)</p></div>
		    <input id="login_input_password_new" class="login_input" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />  
		</div>
		<div id="regRePassword">
		    <label id="rePasswordLabel"for="login_input_password_repeat">Repeat password:</label>
		    <input id="login_input_password_repeat" class="login_input" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />        
 
		</div>
	    <input type="submit"  name="register" value="Register" class="button"/>
    
	</form>
</div>
