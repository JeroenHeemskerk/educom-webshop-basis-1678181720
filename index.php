<?php 
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
    showHeader();
    showMenu();
    showContent($page);
    showFooter();
    echo "</body>";
}

function showHtmlEND(){
    echo "</html>";
}
function showHeader(){
    echo '   <i>
    <header>
      <h1>Chocolate</h1>
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
    </li>
  </ul>';
}

function showContent($page){
    switch($page){
        case "home":
            include("home.php");
            showHomeContent();
            break;
        case "about":
            include("about.php");
            showAboutContent();
            break;
        case "contact":
            include("contact.php");
            showContactContent();
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

?>