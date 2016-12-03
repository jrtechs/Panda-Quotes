<?php


    echo '<div class="w3-row w3-padding-32">';
    echo '<h1 class="w3-text-teal w3-center">Quotes</h1>';
    
    $q_people = "select * from people order by name asc";
    
    $r_people = mysqli_query($dbc, $q_people);
    $i = 1;
    $row_count = $r_people->num_rows;
    //echo $row_count;
    
    //$people_array = mysqli_fetch_array($r_people);
    
    echo '<div class="w3-half w3-container">';
    
    while($row = mysqli_fetch_array($r_people))
    {
        
        if($i <= $row_count/2)
        {
            //printPerson($row['person_id']);
            //echo $row['name'];
            $q_quotes = "select * from quote where person_id='" . $row['person_id'] . "' and visibility=true";
            //echo $q_quotes;
            $r = mysqli_query($dbc, $q_quotes);

            if($r->num_rows == 0)
            {

                //echo 'nada';
            }
            else
            {
                echo '<div class="w3-pannel w3-leftbar w3-light-grey">';

                echo '<p class="w3-xlarge w3-serif">';
                while($row_quote = mysqli_fetch_array($r))
                {
                    echo '<i>"' . $row_quote['quote'] . '"</i><br>';
                }
                echo '</p>';

                $q_name = "select name from people where person_id='" . $row['person_id'] . "' limit 1";
                //echo $q_name;

                $r_name = mysqli_query($dbc, $q_name);

                while($row_name = mysqli_fetch_array($r_name))
                {
                    echo '<p>' . $row_name['name'] . '</p>';
                }

                echo '</div>';
            }
            
        }
        $i++;
  
    }
    
    
    echo '</div>';
    
    echo '<div class="w3-half w3-container">';
    
    $i = 1;
    $r_people = mysqli_query($dbc, $q_people);
    while($row = mysqli_fetch_array($r_people))
    {
        if($i <= $row_count && $i > $row_count/2)
        {
            //printPerson($row['person_id']);
            //echo $row['name'];
            $q_quotes = "select * from quote where person_id='" . $row['person_id'] . "' and visibility=true";
            //echo $q_quotes;
            $r = mysqli_query($dbc, $q_quotes);

            if($r->num_rows == 0)
            {

                //echo 'nada';
            }
            else
            {
                echo '<div class="w3-pannel w3-leftbar w3-light-grey">';

                echo '<p class="w3-xlarge w3-serif">';
                while($row_quote = mysqli_fetch_array($r))
                {
                    echo '<i>"' . $row_quote['quote'] . '"</i><br>';
                }
                echo '</p>';

                $q_name = "select name from people where person_id='" . $row['person_id'] . "' limit 1";
                //echo $q_name;

                $r_name = mysqli_query($dbc, $q_name);

                while($row_name = mysqli_fetch_array($r_name))
                {
                    echo '<p>' . $row_name['name'] . '</p>';
                }

                echo '</div>';
            }
        }
        
        
        $i ++;
    }

    
    echo '</div>';

    
    echo '</div>';
    
?>
