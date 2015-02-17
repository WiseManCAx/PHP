<?php
$pageTitle = "Вход";
include './Templates' . DIRECTORY_SEPARATOR . 'header.php';
if ($_SESSION['isLogged']) {
    header('Location: logged.php');
    exit;
}
$errorFlag = $_SESSION['errorFlag'];
if ($errorFlag === "true") {
    // echo $_SESSION['errorFlag'];
    echo '<div>Грешно въведени данни!</div>';
    include './Templates' . DIRECTORY_SEPARATOR . 'errors.php';
    $_SESSION['errorFlag'] = "false";
    // echo $_SESSION['errorFlag'];
}
?>
<form class="form" method="post" action="login.php">
    <?php
    if ($error_array['name']) {
        echo '<div class="center">
            <span class="black-red">
            <i>' . $error_array['name'] . '</i>
                </span></div>';
    }
    ?>
    <div>Име: <input type="text" name="name"></div>
    <?php
    if ($error_array['name']) {
        echo '<div class="center">
            <span class="black-red">
            <i>' . $error_array['pass'] . '</i>
                </span></div>';
    }
    ?>
    <div>Парола: <input type="password" name="pass"></div>
    <input type="hidden" name="form_submit" value="20131002">
    <div><a href="register.php">Регистрирай се</a> |
        <input type="submit" value="Вход"></div>
    <input type="hidden" name="form_submit" value="20131002">
</form>
<?php
include './Templates' . DIRECTORY_SEPARATOR . 'footer.php';