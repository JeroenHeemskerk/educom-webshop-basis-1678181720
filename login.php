<?php
  function showLoginContent(){
    $data = validateLogin();
    if (!$data["valid"]) { 
      showLoginForm($data);
  }else{
    showLoginValid($data);
  
  }
}

function validateLogin(){
    $email =  $emailErr = ""; $password = $passwordErr = ""; $valid = false; $loginErr=""; $name="";
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } else {
        $email = test_input($_POST["email"]);
      }
      if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
      } else {
        $password = test_input($_POST["password"]);
      }
      if ( empty($emailErr) && empty ($passwordErr)) {
        try {
            include("user_service.php");
            $user= authenicateUser($email,$password);

            if(empty($user)) {
                $emailErr = "Uncorrect email or uncorrect password";
            }
            else{
                $name=$user["name"];
                $valid=true;
            }
        } catch (Exception $exception) {
            $loginErr = "Unable to Login, please try again later";
            logToServer("unable to Login: " . $exception->getMessage());
        }
    }
      return [
      "emailErr"=>$emailErr, "passwordErr"=>$passwordErr,
      "email"=>$email, "password"=>$password,
      "name"=>$name,
      "valid"=>$valid,"loginErr" => $loginErr];
}
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    function showLoginHeader(){
        echo 'This is login page';
    }

    

    function showLoginForm($data)
{
    echo
    '<div class="content">
        <h2>Login:</h2>
        <span class="error">'.$data["loginErr"].'</span>
        <form class="login-form" method="post" action="index.php">
            <label for="email">Email:</label>
            <input class="form-field" type="text" id="email" name="email" value="' . $data["email"] . '" />
            <span class="error">* ' . $data["emailErr"] . '</span>
            <br />
            <label for="password">Password:</label>
            <input class="form-field" type="text" id="password" name="password" value="' . $data["password"] . '" />
            <span class="error">* ' . $data["passwordErr"] . '</span>
            <br />
            <input type="hidden" name="page" value="login">
            <input type="submit" name="login" value="Login" id="login">
        </form>
    </div>';
}
    function showLoginValid($data)
     {
    echo "You are logged in ".$data["name"];
    doLoginUser($data["name"]);
    include_once("home.php");
    showHomeContent();
}

    function showLogoutValid(){
        doLogOutUser();

    }

?>

