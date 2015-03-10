

<!-- login form box -->
<div id="loginDiv">
    <form method="post" action="index.php?nav=0,home" name="loginform">
		<label for="logUserName">User Name:</label>
        <input class="logItem" type="text" name="user_name" value="user_name" id="logUserName" onclick="this.value = '';" onfocus="this.value = '';"  /><br />
		<label for="logUserName">Password:</label>
        <input class="logItem" type="password" name="user_password" value="*******" id="logPassword" onclick="this.value = '';" onfocus="this.value = '';" /><br />
        <input type="submit"  name="login" value="Log in" id="logSubmitLogin" class="button"/>
    </form>
</div>
    <div id="NewUser">
		<p id="newUserP">Not user? <a class="textLink" id="SignUp" href="index.php?register">Sign Up</a> Today!</li></ul>
	</div>

