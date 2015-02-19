<?php
if (!empty($_POST['input'])) {

    $input = $_POST['input'];
    $action = $_POST['action'];

    function checkPalindrome($input) {
        if (strrev($input) === $input) {
            return $input . ' is a palindrome!';
        }

        return $input . ' is not a palindrome!';
    }

    function splitString($input) {
        return implode(' ', str_split($input));
    }

    function shuffleString($input) {
        $chars = str_split($input);
        shuffle($chars);
        return implode('', $chars);
    }

    if (isset($action)) {

        if ($action == 'hash') {
            $result = $action('md5', $input);
        } else {
            $result = $action($input);
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Problem 4. Find Primes in Range</title>
        <link href="styles/styles.css" rel="stylesheet">
    </head>
    <body>
        <form action="06.StringModifier.php" method="post">
            <input type="text" name="input">
            <input id="r1" type="radio" name="action" value="checkPalindrome"><label for="r1" >Check Palindrome </label>
            <input id="r2" type="radio" name="action" value="strrev"><label for="r2">Revers String</label>
            <input id="r3" type="radio" name="action" value="splitString"> <label for="r3">Split</label>
            <input id="r4" type="radio" name="action" value="hash"> <label for="r4">Hash String</label>
            <input id="r5" type="radio" name="action" value="shuffleString"><label for="r5">Shuffle String</label>
            <input type="submit" name="submit" value="Submit">
        </form>
<?php if (!empty($_POST['input'])): ?>
            <div>
    <?php echo $result ?>
            </div>
        <?php endif ?>
    </body>
</html>