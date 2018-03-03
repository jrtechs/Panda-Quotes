<?php
//11-24-16
include('includes/header.php');

//first row


include 'quotes/panda.php';


include('quotes/public.php');

include('quotes/private.php');


//4-row
echo '<div class="w3-row w3-padding-32">';
echo '<div class="w3-half w3-container"><div style=\'position: relative; width: 100%; height: 0px; padding-bottom: 60%;\'">';
echo '<iframe src="https://www.youtube.com/embed/bxydoU2R7F4" frameborder="0" allowfullscreen style=\'position: absolute; left: 0px; top: 0px; width: 100%; height: 100%\'"></iframe>';
echo '</div></div>';

echo '<div class="w3-half w3-container"><div id="repo1">';
echo '<script src="RepoJS/repo.js"></script>
<script>
$(\'#repo1\').repo({ user: \'jrtechs\', name: \'Panda-Quotes\' });
</script>';
echo '</div></div>';


echo '</div>';

include('includes/footer.php');
