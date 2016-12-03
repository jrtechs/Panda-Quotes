<?php

    if($loggedIn)
    {
        $errors = array();
        
        if(isset($_POST['new_quote']))
        {
            $i_name = mysqli_real_escape_string($dbc, trim($_POST['add_quote_name']));
            $i_quote = mysqli_real_escape_string($dbc, trim($_POST['add_quote_quote']));
            
            $q = "select * from people where name ='$i_name'";
            
            $r = mysqli_query($dbc, $q);
            
            if(@mysqli_num_rows($r) == 1)
            {
                while($row = mysqli_fetch_array($r))
                {
                    $person_id = $row['person_id'];
                
                }
                
                if($_POST['add_quote_visibility'])
                {
                    $q_create = "insert into quote (user_id, creation_date, person_id, quote, visibility) values ('" . $_SESSION['user_id'] . "', now(), '$person_id', '$i_quote', true)";
                }
                else
                {
                    $q_create = "insert into quote (user_id, creation_date, person_id, quote, visibility) values ('" . $_SESSION['user_id'] . "', now(), '$person_id', '$i_quote', false)";
                }
                
                
                //echo $q_create;
                
                mysqli_query($dbc, $q_create);
                
                header("Location: quotes.php");
            }
        }
                
        echo '<h1 class="w3-text-teal"><center>New Quote</center></h1>';
        
        echo '<form action="quotes.php" method ="post" class="w3-container w3-card-4">';
        
        $q = "select name from people order by name asc";
        $r = mysqli_query($dbc, $q);
        echo '<select class="w3-select" name ="add_quote_name">';
        
        while($row = mysqli_fetch_array($r))
        {
            echo '<option value="' . $row['name'] . '">';
            
            echo $row['name'] . '</option>';
        }
        
        echo '</select>';

        echo '<div class="w3-group">
            <input class="w3-input" type="text" name="add_quote_quote" required>
            <label class="w3-label w3-validate">Quote</label>
        </div>

        <input class="w3-check" type="checkbox" name="add_quote_visibility" checked>
        <label class="w3-validate">Public<label>


        <p><input type="submit" name="Submit" value="Create Quote" class="w3-padding-16 w3-hover-dark-grey w3-btn-block w3-center-align" /></p>
        <input type="hidden" name="new_quote" value="TRUE" />
            
        
        </form>';
        
        foreach($errors as $msg)
        {
            echo " - $msg<br />";
        }
    }
    
?>