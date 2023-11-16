<?php
$link = mysqli_connect("localhost", "root", "", "contact_form_db");

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $email = $phone = $comments = '';

if (isset($_POST['name'])) {
    $name = mysqli_real_escape_string($link, $_POST['name']);
}

if (isset($_POST['email'])) {
    $email = mysqli_real_escape_string($link, $_POST['email']);
}

if (isset($_POST['phone'])) {
    $phone = mysqli_real_escape_string($link, $_POST['phone']);
}

if (isset($_POST['comments'])) {
    $comments = mysqli_real_escape_string($link, $_POST['comments']);
}


$sql = "INSERT INTO contact (name, email, phone, comments) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($link, $sql);


mysqli_stmt_bind_param($stmt, 'ssss', $name, $email, $phone, $comments);

if (mysqli_stmt_execute($stmt)) {
    echo "Thank you! Your message has been successfully submitted.";
} else {
    echo "Oops! Something went wrong. Please try again later.";
}

mysqli_stmt_close($stmt);
mysqli_close($link);
?>
