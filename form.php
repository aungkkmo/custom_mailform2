<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Form</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
    .error{
      background: #d33;
      color:white;
      padding: 0.2em;
    }
  </style>
</head>
<body>  
    <h1>Member Form</h1>

    <?php if($missingFields): ?>
    <p class="error">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>

  <?php else: ?>
    <p>
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>

  <?php endif; ?>

  <form action="" method="post">
      <div style="width: 30em;">
        <label for="firstName" <?php validateField("firstName",$missingFields) ?>>First Name</label>
        <input type="text" id="firstName" name="firstName" value="<?php setValue("firstName") ?>">  

        <label for="lastName" <?php validateField("lastName",$missingFields) ?>>Last Name</label>
        <input type="text" id="lastName" name="lastName" value="<?php setValue("lastName") ?>">

        <label for="password1" <?php if($missingFields) echo 'class="error"' ?>>Password</label>
        <input type="password" name="password1" id="password1" value="">

        <label for="password2" <?php if($missingFields) echo 'class="error"' ?>>Confirm Password</label>
        <input type="password" name="password2" id="password2" value="">

        <label <?php validateField("gender",$missingFields) ?>>Your Gender</label>
        
        <label for="genderMale">Male</label>
        <input type="radio" name="gender" id="genderMale" value="M" <?php setChecked("gender","M") ?>>

        <label for="genderFemale">Female</label>
        <input type="radio" name="gender" id="genderFemale" value="F" <?php setChecked("gender","F") ?>> 
        
        <label for="favoriteWidget">Widget</label>
        <select name="favoriteWidget" id="favoriteWidget" size="1">
          <option value="superWidget" <?php setSelected("favoriteWidget","superWidget") ?>>The Super Widget</option>
          <option value="megaWidget" <?php setSelected("favoriteWidget","megaWidget") ?>>The Mega Widget</option>
          <option value="wonderWidget" <?php setSelected("favoriteWidget","wonderWidget") ?>>The Wonder Widget</option>
        </select>

        <label for="newsletter">Do you newsletter?</label>
        <input type="checkbox" id="newsletter" name="newsletter" value="yes" <?php setChecked("newsletter","yes") ?>> 

        <label for="comments">Comments</label>
        <textarea name="comments" id="comments" cols="50" rows="40" ><?php setValue("comments") ?></textarea>

        <label for="file">File</label>
        <input type="file" name="file" <?php setUpload() ?>>
        <span><?php if(!empty($fileType)) echo $fileType; ?></span>

        <div style="clear:both;">
          <input type="submit" name="submit" id="submit" value="Send">
        </div>

      </div>
  </form>
  


</body>
</html>