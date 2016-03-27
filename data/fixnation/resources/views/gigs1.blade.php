<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
        <link rel="stylesheet" href="js/jquery-2.1.4.min.js">
    </head>
    <body>
      <?
      $usersArray = array();

      if(isset($users)){
          foreach($users as $user){
              $usersArray[] = array($user->gigId, $user->firstname.' '.$user->lastname,$user->datetime);
          }
      }


      ?>


    </body>

</html>
