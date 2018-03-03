<?php

include('includes/header.php');

if($loggedIn)
{
    echo '<div class="w3-row w3-padding-32">';
    echo '<div class="w3-twothird w3-container">';

    include('quotes/newQuote.php');

    echo '</div><div class="w3-third w3-container">';

    include('user/profile.php');
    echo '</div></div>';

    echo '<div class="w3-row w3-padding-32">';
    echo '<div class="w3-twothird w3-container">';

    include('quotes/people.php');


    echo '</div><div class="w3-third w3-container">';

    include('quotes/newPerson.php');
    echo '</div></div>';

    echo '<div class="w3-row w3-padding-32">';
    echo '<div class="w3-twothird w3-container">';

    include('quotes/allQuotes.php');


    echo '</div><div class="w3-third w3-container"></div></div>';
}
else
{
    include('includes/profile.php');
}

include('includes/footer.php');
