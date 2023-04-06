<?php 
session_start();
include("sessionManager.php");
$page = getRequestedPage();
showResponsePage ($page);

function getRequestedPage () {
    if ($_SERVER['REQUEST_METHOD']=="POST") {
        $page = getPostVAR ("page", "home");
     }else {
        $page = getURLVAR ("page", "home");
     }
     return $page;
    
} 
function getPostVAR ($key, $default=""){
 $value = filter_input(INPUT_POST, $key);
    
 if (isset ($value)){
    return ($value);
}
    return $default;
}
function getURLVAR ($key, $default=""){
    $value = filter_input(INPUT_GET, $key);
    
    if (isset ($value)){
       return ($value);
   }
       return $default;
   }

function showResponsePage($page){
    showHtmlStart();
    showHtmlHeader();
    showHtmlBody($page);
    showHtmlEND();

}

function showHtmlStart(){
    echo '<!doctype Html>  </html>';
}

function showHtmlHeader(){
    echo "<head>";
    showTitle();
    showLinks();
    echo "</head>";
}

function showTitle(){
    echo " <title>Chocolate</title>";
}
function showLinks(){
    echo '<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />';
}

function showHtmlBody($page){
    echo "<body>";
    showHeader($page);
    showMenu();
    showContent($page);
    showFooter();
    echo "</body>";
}

function showHtmlEND(){
    echo "</html>";
}
function showHeader($page){
    echo '   <i>
    <header>
      <h1>';
    switch($page) {
        case 'home':
            include 'home.php';
            showHomeHeader();
            break;
        case 'about':
            include 'about.php';
            showAboutContent();
            break;
        case 'contact':
            include 'contact.php';
            showContactHeader();
            break;
        case 'register':
            include 'register.php';
            showRegisterHeader();
            break;
        case 'login':
            include 'login.php';
            showLoginHeader();
            break;
    }
      
    echo '</h1>
  </header>
  </i>';
}

function showMenu(){
    echo '<ul class="menu">
    <li>
      <a href="./index.php?page=home"> Home </a>

    </li>
    <li id="contact">
      <a href="./index.php?page=contact"> Contact </a>
    </li>
    <li>
      <a href="./index.php?page=about"> About </a>
    </li>';

    if(isUserLoggedIn()){
        echo '
        <li>
            <a href="./index.php?page=logout">Logout '.getLoggedinUserName().' </a>
        </li>
        ';
    }else{
        echo '
        <li>
          <a href="./index.php?page=register">Register </a>
        </li>
        <li>
        <a href="./index.php?page=login">Login </a>
      </li>
        ';

    }

  echo'</ul>';
}



function showContent($page){
    switch($page){
        case "home":
            include_once("home.php");
            showHomeContent();
            break;
        case "about":
            include_once("about.php");
            showAboutContent();
            break;
        case "contact":
            include_once("contact.php");
            showContactContent();
            break;
        case "register":
            include_once("register.php");
            showRegisterContent();
            break;
        case "login":
            include_once("login.php");
            showLoginContent();
            break;

        case "logout":
            include_once("login.php");
            showLogoutValid();
            include_once("home.php");
            showHomeContent();
            break;
        default: 
            showError();
            break;
    }


}

function showError(){
    echo "This page is not available";
}


function showFooter(){
    echo "<footer>";
    echo "Copy Right 2023 Hana"; 
    echo "</footer>";
}

function logToServer($message) {
    echo "LOGGING TO THE SERVER: " . $message;
}

function test_input($data) { 
    $data = trim($data); 
    $data = stripslashes($data); 
    $data = htmlspecialchars($data); 
    return $data; 
  } 

?>