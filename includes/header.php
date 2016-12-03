<?php
    //11-24-16
    
    $loggedIn = false;
    $admin = false;
    
    session_start();
    ob_start();
    
    require_once("../quotes_connect.php");
    
    if((md5($_SERVER['HTTP_USERAGENT'] . 'salt')) == ($_SESSION['agent']) && $_SESSION['use'] == true)
    {
        $loggedIn = true;
        
        
        //checks to see if user is an admin
        
        $q = "select admin from users where user_name='" . $_SESSION['username'] . "'";
        $r = mysqli_query($dbc, $q);
        
        if(@mysqli_num_rows($r) == 1)
        {
            
            while($row = mysqli_fetch_array($r))
            {
                $checka = $row['admin'];
            }
            if($checka)
            {
                $admin = true;
            }
        }
    }
    
    
    if($admin)
    {
        echo '<!DOCTYPE html>
        <html>
        <title>Panda Quotes</title>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" >    </script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="includes/w3.css">
        <link rel="stylesheet" href="http://www.w3schools.com/lib/w3-theme-black.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
        <body>


        <!-- Header -->
        <header class="w3-container w3-theme w3-padding" id="myHeader">
          <div class="w3-center">

          <h1 class="w3-xxxlarge w3-animate-bottom">Panda Quotes</h1>
                <ul class="w3-navbar w3-theme">
          <li><a class="w3-dark-grey w3-padding-16" href="index.php">Home</a></li>
          <li><a class="w3-padding-16" href="quotes.php">Add Quote</a></li>
          <li><a class="w3-padding-16" href="admin.php">Admin</a></li>
        </ul>
          </div>
        </header>';
    }
    elseif($loggedIn)
    {
        echo '<!DOCTYPE html>
        <html>
        <title>Panda Quotes</title>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" >    </script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="includes/w3.css">
        <link rel="stylesheet" href="http://www.w3schools.com/lib/w3-theme-black.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
        <body>


        <!-- Header -->
        <header class="w3-container w3-theme w3-padding" id="myHeader">
          <div class="w3-center">

          <h1 class="w3-xxxlarge w3-animate-bottom">Panda Quotes</h1>
                <ul class="w3-navbar w3-theme">
          <li><a class="w3-dark-grey w3-padding-16" href="index.php">Home</a></li>
          <li><a class="w3-padding-16" href="quotes.php">Add Quote</a></li>
        </ul>
          </div>
        </header>';
    }
    else
    {
        echo '<!DOCTYPE html>
        <html>
        <title>Panda Quotes</title>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" >    </script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="includes/w3.css">
        <link rel="stylesheet" href="http://www.w3schools.com/lib/w3-theme-black.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
        <body>


        <!-- Header -->
        <header class="w3-container w3-theme w3-padding" id="myHeader">
          <div class="w3-center">

          <h1 class="w3-xxxlarge w3-animate-bottom">Panda Quotes</h1>
                <ul class="w3-navbar w3-theme">
          <li><a class="w3-dark-grey w3-padding-16" href="index.php">Home</a></li>
        </ul>
          </div>
        </header>';
    }

?>

