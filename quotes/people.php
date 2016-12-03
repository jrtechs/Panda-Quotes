<?php
    
    if($loggedIn)
    {
        if(isset($_POST['delPerson']))
        {
            $delete_id = mysqli_real_escape_string($dbc, trim($_POST['del_person_id']));
            
            $q = "delete from people where person_id='$delete_id' limit 1";
            
            mysqli_query($dbc, $q);
            
            
            $q = "delete from quote where person_id='$delete_id'";
            
            mysqli_query($dbc, $q);
        }
        
        echo '<h1 class="w3-text-teal w3-center">People</h1>';
        
        $q = "select * from people";
        
        $r = mysqli_query($dbc, $q);
        
        echo '<div class="w3-responsive w3-card-4">
        <table class="w3-table w3-striped w3-bordered">
        <thead>
        <tr class="w3-theme w3-center">
        <td>Name</td>
        <td>Delete</td>
        </tr>
        </thead>
        <tbody>
        ';
        
        while($row = mysqli_fetch_array($r))
        {
            echo '<tr>';
            
            //display name
            echo "<td>" . $row['name'] . "</td>";
            
            //del
            echo '<td>';
            echo '<form action = "quotes.php" method = "post">
            <input type = "submit" name="Delete" value="Delete" class="w3-padding-16 w3-hover-dark-grey w3-btn-block w3-center-align"/>
            <input type="hidden" name="delPerson" value="TRUE">
            <input type="hidden" name="del_person_id" value=' . $row['person_id'] . '>
             </form>';
            echo '</td>';
            
            echo '</tr>';
        }
        
        echo '</tbody>
            </table>
        </div>';
    }

?>