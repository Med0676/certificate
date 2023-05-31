<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
if (isset($_POST['add'])) {
    $font = realpath('ArialTh.ttf');
    $image = imagecreatefromjpeg('certa.jpg');
    $color = imagecolorallocate($image, 51, 51, 102);

    // Name
    $name = $_POST['name'];
    $nameFontSize = 45;
    $nameFontAngle = 0;
    $nameBoundingBox = imagettfbbox($nameFontSize, $nameFontAngle, $font, $name);
    $nameWidth = $nameBoundingBox[2] - $nameBoundingBox[0];
    $nameX = (imagesx($image) - $nameWidth) / 2; // Center horizontally
    $nameY = 700; // Adjust the vertical position as needed
    imagettftext($image, $nameFontSize, $nameFontAngle, $nameX, $nameY, $color, $font, $name);

    // Professor's Name
    $teacher = $_POST['teacher'];
    $teacherFontSize = 30;
    $teacherFontAngle = 0;
    $teacherBoundingBox = imagettfbbox($teacherFontSize, $teacherFontAngle, $font, $teacher);
    $teacherWidth = $teacherBoundingBox[2] - $teacherBoundingBox[0];
    $teacherX = (imagesx($image) - $teacherWidth) / 2; // Center horizontally
    $teacherY = 1190; // Adjust the vertical position as needed
    imagettftext($image, $teacherFontSize, $teacherFontAngle, $teacherX, $teacherY, $color, $font, $teacher);

    // Serial Number
    $serial = $_POST['numb'];
    $serialFontSize = 20;
    $serialFontAngle = 0;
    $serialX = 1420; // Adjust the horizontal position as needed
    $serialY = 1300; // Adjust the vertical position as needed
    imagettftext($image, $serialFontSize, $serialFontAngle, $serialX, $serialY, $color, $font, $serial);

    $filename = "student/" . $name . ".jpg";
    imagejpeg($image, $filename);
    imagedestroy($image);

    // Display the success message
    echo '<center><h1>Successfully added certificate</h1></center>';

    // Provide a download link for the generated certificate
    echo '<center><a href="' . $filename . '" download class="download-btn">Download Certificate</a></center>';
}
?>
