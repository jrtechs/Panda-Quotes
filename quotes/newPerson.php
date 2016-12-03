<?php

    if($loggedIn)
    {
        $errors = array();
        
        
        if(isset($_POST['newPerson']))
        {
            $i_first = mysqli_real_escape_string($dbc, trim($_POST['person_first']));
            $i_last = mysqli_real_escape_string($dbc, trim($_POST['person_last']));
            
            $q = "insert into people (name, creation_date) values ('" . $i_first . " " . $i_last . "' , now())";
            
            $r = mysqli_query($dbc, $q);
            
            header("Location: quotes.php");
        }
        
        echo '<h1 class="w3-text-teal"><center>New Person</center></h1>';
        
        echo '<form action="quotes.php" method ="post" class="w3-container w3-card-4">

            <div class="w3-group">
                <input class="w3-input" type="text" name="person_first" required>
                <label class="w3-label w3-validate">First Name</label>
            </div>
            <div class="w3-group">
                <input class="w3-input" type="text" name="person_last" required>
                <label class="w3-label w3-validate">Last Name</label>
            </div>
            <p><input type="submit" name="Submit" value="Add Person" class="w3-padding-16 w3-hover-dark-grey w3-btn-block w3-center-align" /></p>
            <input type="hidden" name="newPerson" value="TRUE" />
            
        
        </form>';
        
        foreach($errors as $msg)
        {
            echo " - $msg<br />";
        }
    }

?>