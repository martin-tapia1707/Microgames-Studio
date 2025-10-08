<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="shortcut icon">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../IMG/LogoEmpresa.png" />
    <link rel= "stylesheet" href="../CSS/header.css"/>
    <link rel= "stylesheet" href="../CSS/sidebar.css"/>

<?php require_once "header.php"; ?>
<?php require_once "sidebar.php"; ?>

<?php
$section = isset($_GET['section']) ? $_GET['section'] : 'home';

$allowed = ['home', 'about', 'help', 'user', 'selectedgame', 'login', 'register'];
if (!in_array($section, $allowed)) {
    $section = 'home';
}

if ($section !== 'login' && $section !== 'register') {
    require_once "header.php";
    require_once "sidebar.php";
}

require_once $section . '.php';
?>

<?php if ($section === 'home'): ?>
    <link rel="stylesheet" href="../CSS/home.css">
<?php elseif ($section === 'about'): ?>
    <link rel="stylesheet" href="../CSS/about.css">
<?php elseif ($section === 'user'): ?>
    <link rel="stylesheet" href="../CSS/user.css">
<?php elseif ($section === 'login'): ?>
    <link rel="stylesheet" href="../CSS/login.css">
<?php elseif ($section === 'register'): ?>
    <link rel="stylesheet" href="../CSS/register.css">
<?php elseif ($section === 'selectedgame'): ?>
    <link rel="stylesheet" href="../CSS/game1.css">
<?php endif; ?>

</body>
</html>
