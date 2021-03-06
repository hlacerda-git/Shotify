<?php 
    //TODO: find better way to reference files
    require_once("includes/Controllers/registerController.php"); 
    require_once("includes/Controllers/loginController.php"); 
    require_once("includes/classes/Account.php"); 
    require_once("includes/classes/Constants.php"); 
    require_once("includes/config.php");

    $account = new Account($con);
    // $account->register($username, $firstName, $lastName, $password ,$password2, $email, $email2);

    function getInputValue($name){
        if(isset($_POST[$name])){
            echo ($_POST[$name]);
        }
    }
?>

<html> 
<head>
<title>Shotfy</title>
</head>
<body>
    <div id="inputContainer"> 
        <form id="loginForm" action="register.php" method="POST">
            <h2>Login to your account</h2>
            <p>
                <label for="loginUser">Username</label>
                <input id="loginUser" name ="loginUser" type="text" placeholder="Username" required></input>
            </p>
            <p>
                <label for="passwordUser">Password</label>
                <input id="passwordUser" name ="passwordUser" type="password" placeholder="Your password" required></input>
            </p>
            <p>
                <button type="submit" name ="loginButton">LOG IN</button> 
            </p>
        </form>

        <form id="registerForm" action="register.php" method="POST">
            <h2>Register your account</h2>
            <p>
                <?php echo $account->getError(Constants::$firstNameLength); ?>
                <label for="firstName">First Name</label>
                <input id="firstName" name ="firstName" type ="text" placeholder="e. g. John" value="<?php getInputValue('firstName');?>" required></input>
            </p>

            <p>
                <?php echo $account->getError(Constants::$lastNameLength); ?>
                <label for="lastName">Last Name</label>
                <input id="lastName" name ="lastName" type ="text" placeholder="e. g. Smith" value="<?php getInputValue('lastName');?>" required></input>
            </p>

            <p>
                <?php echo $account->getError(Constants::$usernameLength); ?>
                <label for="registerUser">Username</label>
                <input id="registerUser" name ="registerUser" type ="text" placeholder="e. g. John Smith" value="<?php getInputValue('registerUser');?>" required></input>
            </p>
            <p>
                <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
                <?php echo $account->getError(Constants::$passwordsLength); ?>
                <?php echo $account->getError(Constants::$passwordsNotAlfanum); ?>
                <label for="password">Password</label>
                <input id="password" name ="password" type="password" placeholder="Enter your password" required></input>
            </p>

            <p>
                <label for="password2">Confirm Password</label>
                <input id="password2" name ="password2" type="password" placeholder="Confirm your password" required></input>
            </p>

            <p>
                <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
                <?php echo $account->getError(Constants::$emailInvalid); ?>
                <label for="email">Email</label>
                <input id="email" name ="email" type ="email" placeholder="e. g. johnsmith@gmail.com" value="<?php getInputValue('email');?>" required></input>
            </p>

            <p>
                <label for="email2">Confirm Email</label>
                <input id="email2" name ="email2" type="email" placeholder="e. g. johnsmith@gmail.com" value="<?php getInputValue('email2');?>"" required></input>
            </p>

            <p>
                <button type="submit" name ="registerButton">SIGN IN</button> 
            </p>
        </form>
            
    </div></body>
</html>  