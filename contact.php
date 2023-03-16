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
  $valid = false;
  
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
      $lastname = test_input($_POST["lastname"]);
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
  
    if (empty($aanhrefErr)  && empty($firstnameErr) && empty ($lastnameErr) && empty ($telefoonErr) &&
        empty($emailErr) && empty($commentErr) && empty($communicationChannelErr)){
      $valid = true;
    }
  }
  
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>

  
<?php if (!$valid) { ?>

    <br>
    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">   
      <label for="aanhref">Aanhref:</label>
      <select name="aanhref" id="aanhref">
        <option name="" <?php if (isset($aanhref) && $aanhref=="other") echo "selected";?>></option>
        <option value="Dhr" name="Dhr" <?php if (isset($aanhref) && $aanhref=="Dhr") echo "selected";?>>Dhr</option>
        <option value="Mvr" name="Mvr" <?php if (isset($aanhref) && $aanhref=="Mvr") echo "selected";?>>Mvr</option>
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
        <input type="text" id="lastname" name="lastname" value="<?php echo $lastname; ?>" />
      </div>
      <span class="error">* <?php echo $lastnameErr;?></span>
      <div>
        <label for="telefoon">Telefoonnumer:</label>
        <input type="text" id="telefoon" name="telefoon" value="<?php echo $telefoon; ?>" />
      </div>
      <span class="error">* <?php echo $telefoonErr;?></span>
      <div>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo $email; ?>" />
      </div>
      <span class="error">* <?php echo $emailErr;?></span>
      <div>
        <p>Hoe kunnen wij u bereiken?</p>
        <input type="radio" name="communicationChannel"  <?php if (isset($communicationChannel) && $communicationChannel=="email") echo "checked";?> value="email">
        <label for="email">Email</label><br/>
        <input type="radio" name="communicationChannel" <?php if (isset($communicationChannel) && $communicationChannel=="telefoon") echo "checked";?> value="telefoon">
        <label for="telefoon">Telefoon</label><br />
      </div>
     <br><br>
      <div>
        <textarea rows="4" cols="50" name="comment" placeholder="Waarom wilt u contact opnemen?"><?php echo $comment; ?></textarea>
      </div>
      <span class="error">* <?php echo $commentErr;?></span>
      <br />
      <input type="submit" value="Send" name="send"/>

      <br />
    </form><?php } else { ?>
    <?php
    echo $aanhref;
    echo "<br>";
    echo $firstname; 
    echo "<br>";
    echo $lastname;
    echo "<br>";
    echo $telefoon;
    echo "<br>";
    echo $email; 
    echo "<br>";
    echo $communicationChannel;
    echo "<br>";
    echo $comment;
    echo "<br>";
    ?>
    <?php } ?>
  </body>
</html>
