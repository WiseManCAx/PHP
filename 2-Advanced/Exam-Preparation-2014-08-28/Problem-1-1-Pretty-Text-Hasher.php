<!DOCTYPE html>
<html>
    <head>
        <title>
            Pretty Text Hasher
        </title>
    </head>
    <body>
        <form method="get" action="">
            <label for="text">Enter your text here: </label>
            <input type="text" name="text" id="text" required/> <br>
            <label for="hash">Hash Value: </label>
            <input type="number" name="hashValue" min="0" max="10" required id="hash"/> <br>
            <label for="fontSize">Font Size: </label>
            <input type="number" name="fontSize" min="1" max="100" required id="fontSize"/> <br>
            <label for="fontStyle">Font Style: </label>
            <select name="fontStyle" id="fontStyle">
                <option>normal</option>
                <option>bold</option>
                <option>italic</option>
            </select><br>
            <input type="submit" value="Submit"/>
        </form>
    </body>
</html>

<?php
if (isset($_GET['text'])) {
    $textString = $_GET['text'];
    $textArray = str_split($textString);
    $hash = $_GET['hashValue'];
    $fontSize = $_GET['fontSize'];
    $fontStyle = $_GET['fontStyle'];

    if ($hash !== 0) {
        foreach ($textArray as $index => $character) {
            $asciiCharCode = ord($character);
            if ($index % 2 == 0) {
                $asciiCharCode += $hash;
                $newChar = chr($asciiCharCode);
                $newArray[] = $newChar;
            } else {
                $asciiCharCode -= $hash;
                $newChar = chr($asciiCharCode);
                $newArray[] = $newChar;
            }
        }
        $newString = implode("", $newArray);
        if ($fontStyle == 'bold') {
            echo "<p style=\"font-size:$fontSize;font-weight:bold;\">$newString</p>";
        } else {
            echo "<p style=\"font-size:$fontSize;font-style:$fontStyle;\">$newString</p>";
        }
    } else {
        if ($fontStyle == 'bold') {
            echo "<p style=\"font-size:$fontSize;font-weight:bold;\">$textString</p>";
        } else {
            echo "<p style=\"font-size:$fontSize;font-style:$fontStyle;\">$textString</p>";
        }
    }
}