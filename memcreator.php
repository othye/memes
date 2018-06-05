<?php
    
    header ('Content-type: image/jpeg');

    
    $image = imagecreatefromjpeg($_POST['image']);
    //var_dump($_POST['image']); die();
    $sizeH = 40 ;//$_POST['sizeH'];
    $sizeB = 45 ;//$_POST['sizeB'];
    $size = 45;
    $angle = 0;
    $x = 80; //positionne le 1er caractère du texte de droite à gauche
    $y = 80;// positionne le 1er caractère du texte en partant du haut
    $xx = 500;
    $yy = 650;
    $colorH = $_POST['colorH'];
    list($r, $g, $b) = sscanf($colorH, "#%02x%02x%02x"); 
    $colorH = imagecolorallocate($image, $r, $g, $b);/*Couleur de la police*/

    $colorB = $_POST['colorB'];
    list($r, $g, $b) = sscanf($colorB, "#%02x%02x%02x"); 
    $colorB = imagecolorallocate($image, $r, $g, $b);/*Couleur de la police*/

    $text1 = $_POST['texteHaut'];
    $text2 = $_POST['texteBas'];
    //var_dump($_POST['colorH']); die();

    $font = 'assets/fonts/Lato-BlackItalic';

    putenv('GDFONTPATH=' . realpath('.'));

    $toptext = imagettftext($image, $sizeH, $angle, $x, $y, $colorH,$font, $text1);
    $bottomtext = imagettftext($image, $sizeB, $angle, $xx, $yy, $colorB,$font, $text2);
    
    imagejpeg($image);

?>
