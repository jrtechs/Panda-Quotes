<?php

function wordWrapAnnotation(&$image, &$draw, $text, $maxWidth)
{
    $words = explode(" ", $text);
    $lines = array();
    $i = 0;
    $lineHeight = 0;
    while($i < count($words) )
    {
        $currentLine = $words[$i];
        if($i+1 >= count($words))
        {
            $lines[] = $currentLine;
            break;
        }
        //Check to see if we can add another word to this line
        $metrics = $image->queryFontMetrics($draw, $currentLine . ' '
            . $words[$i+1]);
        while($metrics['textWidth'] <= $maxWidth)
        {
            //If so, do it and keep doing it!
            $currentLine .= ' ' . $words[++$i];
            if($i+1 >= count($words))
                break;
            $metrics = $image->queryFontMetrics($draw, $currentLine . ' '
                . $words[$i+1]);
        }
        //We can't add the next word to this line, so loop to the next line
        $lines[] = $currentLine;
        $i++;
        //Finally, update line height
        if($metrics['textHeight'] > $lineHeight)
            $lineHeight = $metrics['textHeight'];
    }
    return array($lines, $lineHeight);
}

function displayImage($quote, $person, $imageLoc)
{
    $draw = new ImagickDraw();

    $image = new Imagick();
    $image->readImage($imageLoc);


    /* Green text */
    $draw->setFillColor("rgb(0,255,0)");

    /* Font properties */
    $draw->setFont('Bookman-DemiItalic');

    $fontsize = 0.05 * $image->getimagewidth();

    $draw->setFontSize( "$fontsize" );

    $xpos = $image->getimagewidth()/4;
    $ypos = $image->getimageheight()/4;


    $msg = '"' . $quote . '"' . " - $person";

    list($lines, $lineHeight) = wordWrapAnnotation($image,
        $draw, $msg, $image->getimagewidth() /2);
    for($i = 0; $i < count($lines); $i++)
        $image->annotateImage($draw, $xpos, $ypos + $i*$lineHeight,
            0, $lines[$i]);


    /* Give image a format */
    $image->setImageFormat('png');

    echo '<img src="data:image/jpg;base64,'.base64_encode(
        $image->getImageBlob()).'" alt="" width="100%"/>';
}
function printHalf($query)
{
    $r = mysqli_query ($dbc, $query);

    while($row = mysqli_fetch_array($r))
    {
        $q2 = "select name from people where person_id='" .
            $row['person_id'] . "' limit 1";

        $r2 = mysqli_query($dbc, $q2);

        while($row2 = mysqli_fetch_array($r2))
        {
            $images = glob('../img/*');
            displayImage($row['quote'], $row2['name'],
                $images[rand(0, count($images) - 1)]);
        }
    }
    echo '</div>';
}


echo '<div class="w3-row-padding w3-center w3-margin-top">';

echo '<div class="w3-half">';
echo '<h1 class="w3-text-teal w3-center">Random Quote</h1>';
$q ="select * from quote where visibility=true order by rand() limit 1";
$r = mysqli_query ($dbc, $q);

while($row = mysqli_fetch_array($r))
{
    $q2 = "select name from people where person_id='" . $row['person_id']
        . "' limit 1";

    $r2 = mysqli_query($dbc, $q2);

    while($row2 = mysqli_fetch_array($r2))
    {
        $images = glob('../img/*');
        displayImage($row['quote'], $row2['name'],
            $images[rand(0, count($images) - 1)]);
    }
}
echo '</div>';
echo '<div class="w3-half">';
echo '<h1 class="w3-text-teal w3-center">Most Recent</h1>';
$q ="select * from quote where visibility=true order by creation_date 
desc limit 1";
$r = mysqli_query ($dbc, $q);

while($row = mysqli_fetch_array($r))
{
    $q2 = "select name from people where person_id='" . $row['person_id']
        . "' limit 1";

    $r2 = mysqli_query($dbc, $q2);

    while($row2 = mysqli_fetch_array($r2))
    {
        $images = glob('../img/*');
        displayImage($row['quote'], $row2['name'],
            $images[rand(0, count($images) - 1)]);
    }
}

echo '</div>';

echo '</div>';

echo '<div class="w3-row-padding w3-center w3-margin-top">';

echo '<div class="w3-half row-center">';

if(isset($_POST['panda']))
{
    displayImage($_POST['panda_quote'], $_POST['panda_name'],
        $images[rand(0, count($images) - 1)]);
}
echo '<h1 class="w3-text-teal w3-center">Create a panda quote!</h1>';



 echo '<form action="index.php" method ="post" class="w3-container w3-card-4">

<div class="w3-group">
    <input class="w3-input" type="text" name="panda_quote" required>
    <label class="w3-label w3-validate">Quote</label>
</div>
<div class="w3-group">
    <input class="w3-input" type="text" name="panda_name" required>
    <label class="w3-label w3-validate">Person\'s Name</label>
</div>
<p><input type="submit" name="Submit" value="Create Panda Quote" 
class="w3-padding-16 w3-hover-dark-grey w3-btn-block w3-center-align" /></p>
<input type="hidden" name="panda" value="TRUE" />


</form>';


echo '</div>';

echo '<div class="w3-half w3-container">';
//profile
include('user/profile.php');
echo '</div>';

echo '</div>';



?>
