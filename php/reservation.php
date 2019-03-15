
<?php
      
      $errors = array();

      // Check if time has been entered
      if (!isset($_POST['time'])) {
            $errors['time'] = 'Please select time of reservation';
      }

      // Check if email has been entered and is valid
      if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please enter a valid email address';
      }

      if (!isset($_POST['name'])) {
            $errors['name'] = 'Please enter you name';
      }

      if (!isset($_POST['phone'])) {
            $errors['phone'] = 'Please enter you phone';
      }

      $errorOutput = '';

      if(!empty($errors)){

            $errorOutput .= '<div class="alert alert-danger alert-dismissible" role="alert">';
            $errorOutput .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

            $errorOutput  .= '<ul>';

            foreach ($errors as $key => $value) {
                  $errorOutput .= '<li>'.$value.'</li>';
            }

            $errorOutput .= '</ul>';
            $errorOutput .= '</div>';

            echo $errorOutput;
            die();
      }



      $time = $_POST['time'];
      $people = $_POST['people'];
      $email = $_POST['email'];
      $name = $_POST['name'];
      $phone = $_POST['phone'];
      $from = $email;
      $to = 'jucema89@gmail.com';  // please change this email id
      $subject = 'reservacion de videoconferencia';
      
      $body = "From: E-Mail: $email\n Nombre: $name\n Celular: $phone\n Dia y Hora: $time";


      $headers = "From: ".$from;

      //send the email
      $result = '';
      if (mail ($to, $subject, $body, $headers)) {
            $result .= '<div class="alert alert-success alert-dismissible" role="alert">';
            $result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            $result .= 'Thank You! We will reserve a table <i class="fa fa-smile"> in that date';
            $result .= '</div>';

            echo $result;
            die();
      }

      $result = '';
      $result .= '<div class="alert alert-danger alert-dismissible" role="alert">';
      $result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
      $result .= 'Something bad happend during sending this message. Please try again later';
      $result .= '</div>';

      echo $result;
