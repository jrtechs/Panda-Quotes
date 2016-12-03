<?php
    //11-24-16
    
echo '<!-- Footer -->
<footer class="w3-container w3-theme-dark w3-padding-16 w3-center">
  <div style="position:relative;bottom:55px;" class="w3-tooltip w3-right">
    <span class="w3-text w3-theme-light w3-padding">Go To Top</span>&nbsp;   
    <a class="w3-text-white" href="#myHeader"><span class="w3-xlarge">
    <i class="fa fa-chevron-circle-up"></i></span></a>
  </div>
  <p>Panda Quotes</p>
</footer>';


    echo '</body></html>';


    try 
    {
        mysqli_close($dbc);
    } 
    catch (Exception $ex) 
    {

    }

?>