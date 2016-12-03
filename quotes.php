<?php


    include('includes/header.php');
    
    if($loggedIn)
    {
        echo '<div class="w3-row w3-padding-32">';
        echo '<div class="w3-twothird w3-container">';
        
        //add quote
        
        include('quotes/newQuote.php');
        
        echo '</div><div class="w3-third w3-container">';
        //profile
        include('user/profile.php');
        echo '</div></div>';
        
        echo '<div class="w3-row w3-padding-32">';
        echo '<div class="w3-twothird w3-container">';
        
        //people
        include('quotes/people.php');
        
        
        echo '</div><div class="w3-third w3-container">';
        //add person
        include('quotes/newPerson.php');
        echo '</div></div>';
        
        echo '<div class="w3-row w3-padding-32">';
        echo '<div class="w3-twothird w3-container">';
        
        //people
        include('quotes/allQuotes.php');
        
        
        echo '</div><div class="w3-third w3-container">';

        echo '</div></div>';
    }
    else 
    {
        include('includes/profile.php');
    }
    
    include('includes/footer.php');

?>