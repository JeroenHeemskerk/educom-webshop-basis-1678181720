<!DOCTYPE html>
<html>
  <head>
    <title>Chocolate</title>
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
    <style>
      .error {color: #FF0000;}
    </style>
  </head>
  <body>
  <?php 
  $aanhrefErr = $firstnameErr = $lastnameErr = $telefoonErr = 
  $emailErr = $commentErr = $communicationChannelErr ="";
  $aanhref = $firstname = $lastname = $telefoon = 
  $email = $communicationChannel = $comment = "";
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["aanhref"])) {
      $aanhrefErr = "aanhref is required";
    } else {
      $aanhref = test_input($_POST["aanhref"]);
    }
    if (empty($_POST["firstname"])) {
      $firstnameErr = "firstname is required";
    } else {
      $firstname = test_input($_POST["firstname"]);
    }
    if (empty($_POST["lastname"])) {
      $lastnameErr = "lastname is required";
    } else {
      $lastnameErr = test_input($_POST["lastname"]);
    }
    if (empty($_POST["telefoon"])) {
      $telefoonErr = "telefoon is required";
    } else {
      $telefoon = test_input($_POST["telefoon"]);
    }
  
    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
    }
  
    if (empty($_POST["comment"])) {
      $commentErr = "comment is required";
    } else {
      $comment = test_input($_POST["comment"]);
    }
  
    if (empty($_POST["communicationChannel"])) {
      $communicationChannelErr = "communicationChannel is required";
    } else {
      $communicationChannel = test_input($_POST["communicationChannel"]);
    }
  

  }
  
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


  ?>

  
    Your aanhref <?php echo $aanhref; ?><br>
    Your firstname <?php echo $firstname; ?><br>
    Your lastname <?php echo $lastname; ?> <br>
    Your telefoon <?php echo $telefoon; ?> <br>
    Your email address is: <?php echo $email; ?><br>
    Your communicationChannel is: <?php echo $communicationChannel; ?><br>
    Your comment is: <?php echo $comment;?><br>
    <br>
    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">   
      <label for="aanhref">Aanhref:</label>
      <select name="aanhref" id="aanhref">
        <option value=""></option>
        <option value="Dhr">Dhr</option>
        <option value="Mvr">Mvr</option>
      </select>
      
      </br>
      <span class="error">* <?php echo $aanhrefErr;?></span>
      <div>
        <label for="firstname">First name:</label>
        <input type="text" id="firstname" name="firstname" value="<?php echo $firstname; ?>" />
      </div>
      <span class="error">* <?php echo $firstnameErr;?></span>
      <div>
        <label for="lastname">Last name:</label>
        <input type="text" id="lastname" name="lastname" />
      </div>
      <span class="error">* <?php echo $lastnameErr;?></span>
      <div>
        <label for="telefoon">Telefoonnumer:</label>
        <input type="text" id="telefoon" name="telefoon" />
      </div>
      <span class="error">* <?php echo $telefoonErr;?></span>
      <div>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" />
      </div>
      <span class="error">* <?php echo $emailErr;?></span>
      <div>
        <p>Hoe kunnen wij u bereiken?</p>
        <input type="radio" id="email" name="communicationChannel" value="Email" /> 
        <label for="email">Email</label><br/>
        <input type="radio" id="telefoon" name="communicationChannel" value="telefoon" /> 
        <label for="telefoon">Telefoon</label><br />
      </div>
      <span class="error">* <?php echo $communicationChannelErr;?></span>
     
      <div>
        <textarea rows="4" cols="50" name="comment" placeholder="Waarom wilt u contact opnemen?"></textarea>
      </div>
      <span class="error">* <?php echo $commentErr;?></span>
      <br />
      <input type="submit" value="Send" />

      <br />
    </form>
  </body>
</html>
