<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: admin_dashboard.php');
    exit();
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Simple static credentials; adjust as needed
    if ($username === 'admin' && $password === 'secret') {
        $_SESSION['loggedin'] = true;
        header('Location: admin_dashboard.php');
        exit();
    } else {
        $error = 'Username atau password salah.';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-container">
    <h2>Login Admin</h2>
    <?php if ($error) echo '<p style="color:red">'.htmlspecialchars($error).'</p>'; ?>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Login</button>
    </form>
</div>
</body>
</html>
