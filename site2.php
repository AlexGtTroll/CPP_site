<?php
header('Content-type: image/png');
//картинка

$image = imageCreateTrueColor(400, 400);

//цвета
$black = imageColorAllocate($image, 0, 0, 0);
$whitebg = imageColorAllocate($image, 255,255,255);
$red = imagecolorallocate($image,255,0,0);
$white = imagecolorallocate($image,255,255,255);

//трубы
imageFilledRectangle($image, 0, 0, 399, 399, $whitebg);
imageRectangle($image, 50, 350, 350, 225, $black);
imagerectangle($image,75,30,125,225,$black); // первая труба
imagerectangle($image,175,30,225,225,$black); // вторая труба
imagerectangle($image,275,30,325,225,$black); // третья труба

//блоки с краской
//первая труба
imagerectangle($image,75,50,125,30,$black);
imagerectangle($image,75,67,125,50,$black);
imagerectangle($image,75,83,125,67,$black);
imagerectangle($image,75,100,125,83,$black);

//вторая труба
imagerectangle($image,175,50,225,30,$black);
imagerectangle($image,175,67,225,50,$black);
imagerectangle($image,175,83,225,67,$black);
imagerectangle($image,175,100,225,83,$black);

//третья труба
imagerectangle($image,275,50,325,30,$black);
imagerectangle($image,275,67,325,50,$black);
imagerectangle($image,275,83,325,67,$black);
imagerectangle($image,275,100,325,83,$black);
//конец блоков с краской

if (isset($_POST['v']))
{
    imagefillrectangle($image,0,0,399,399,$white);
//imagefill($image,100,35,$red);
echo 'красный фиксирован!';
}
if (isset($_POST['b']))
{
    imagefill($image,100,60, $white);
    echo 'белый зафиксирован!';
}

//чистка
imagepng($image);
imageDestroy($image);
?>