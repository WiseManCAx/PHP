<?phpsession_start();if (!isset($_SESSION['id'])) {    header("Location: ../index.php");}//to erase sessionunset($_SESSION['id']);header("Location: index.php");