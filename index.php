<?php 

    if(isset($_POST['submit'])){
      processForm();
    }elseif (isset($_POST['confirm'])) {
      sendEmail();
    }else{
      displayForm(array());
    }

    function validateField($fieldName,$missingFields){
      if(in_array($fieldName, $missingFields)){
        echo ' class="error"';
      }
    }

    function setValue($fieldName){
      if(isset($_POST['fieldName'])){
        echo $_POST[$fieldName];
      }
    }

    function setChecked($fieldName,$fieldValue){
      if(isset($_POST['fieldName']) && $_POST[$fieldName]==$fieldValue){
        echo ' checked="checked"';
      }
    }

    function setSelected($fieldName,$fieldValue){
      if(isset($_POST['fieldName']) && $_POST['fieldName']==$fieldValue){
        echo ' selected ="selected"';
      }
    }

    function setUpload(){
      if(isset($_FILES["file"]) and $_FILES["file"]["error"]==UPLOAD_ERR_OK){
        $fileType=$_FILES["file"]['type'];
        $location="uploads/" . basename($_FILES["file"]["name"]);
          if(!move_uploaded_file($_FILES["file"]["tmp_name"], $location )){
            echo "<p>Sorry Problem Uploading file</p>".$_FILES["file"]["error"];
            echo ' class="error"';
          }
          $_POST['file']=$location;
      }
    }

    function processForm(){
      $requireFields=array("firstName","lastName","password1","password2","gender");
      $missingFields=array();

      foreach($requireFields as $requireField){

        if(!isset($_POST[$requireField]) or !$_POST[$requireField]){
          $missingFields[]=$requireField;
        }

      }

      if($missingFields){
        displayForm($missingFields);
      }else{
        $data=$_POST;
        displayConfirm($data);
      }
    }

    function displayForm($missingFields){
      include('form.php');
    }

    function displayConfirm($data){
     foreach($data as $vm){
        echo $vm."\n";
     }
      // include('confirm.php');
    }

    function displayThanks(){
      // var_dump($data);
      include('thanks.php');
    }

    function sendEmail(){

      require 'mail/PHPMailerAutoload.php';

      $mail = new PHPMailer;
    }
