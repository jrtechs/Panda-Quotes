<?php

require_once 'includes/carbon.php';
use Carbon\Carbon;

if($loggedIn)
{
    if(isset($_POST['del_quote_id']))
    {
        $del_id = mysqli_real_escape_string($dbc,
            trim($_POST['del_quote_id']));

        $q = "delete from quote where quote_id='$del_id' limit 1";

        $r = mysqli_query($dbc, $q);

        header("Location: quotes.php");
    }

    echo '<h1 class="w3-text-teal w3-center">Quotes</h1>';

    $q = "select * from quote";

    $r = mysqli_query($dbc, $q);

    echo '<div class="w3-responsive w3-card-4">
    <table class="w3-table w3-striped w3-bordered">
    <thead>
    <tr class="w3-theme w3-center">
    <td>Quote</td>
    <td>Person</td>
    <td>Created By</td>
    <td>Date</td>
    <td>Delete</td>
    </tr>
    </thead>
    <tbody>';

    while($row = mysqli_fetch_array($r))
    {
        echo '<tr>';

        //quote
        echo "<td>" . $row['quote'] . "</td>";

        //person
        $q2 = "select name from people where person_id='"
            . $row['person_id'] . "'";
        $r2 = mysqli_query($dbc, $q2);
        while($row2 = mysqli_fetch_array($r2))
        {
            echo "<td>" . $row2['name'] . "</td>";
        }

        //created by
        $q2 = "select user_name from users where user_id='"
            . $row['user_id'] . "'";
        $r2 = mysqli_query($dbc, $q2);
        while($row2 = mysqli_fetch_array($r2))
        {
            echo "<td>" . $row2['user_name'] . "</td>";
        }
        //date
        $c = Carbon::createFromTimestampUTC(strtotime(
            $row['creation_date'] . ' UTC'));
        echo '<td>' . $c->format('l jS \of F Y') . '</td>';

        //del
        echo '<td>';
        echo '<form action = "quotes.php" method = "post">
        <input type = "submit" name="Delete" value="Delete" 
        class="w3-padding-16 w3-hover-dark-grey w3-btn-block w3-center-align"/>
        <input type="hidden" name="delPerson" value="TRUE">
        <input type="hidden" name="del_quote_id" value=' . $row['quote_id'] . '>
         </form>';
        echo '</td>';

        echo '</tr>';
    }
    echo '</tbody></table></div>';
}