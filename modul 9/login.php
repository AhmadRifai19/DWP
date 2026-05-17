<?php
function bersihkan_input(string $data): string {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$nameErr = $passErr = "";
$name = $pass = "";
$errorMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (empty($_POST["u"])) {
            $nameErr = "masukkan username";
            throw new Exception("Username tidak boleh kosong.");
        } else {
            $name = bersihkan_input($_POST["u"]);
        }

        if (empty($_POST["p"])) {
            $passErr = "masukkan password";
            throw new Exception("Password tidak boleh kosong.");
        } else {
            $pass = bersihkan_input($_POST["p"]);
        }

        echo "<p style='color:green; font-weight:bold;'>Login berhasil! Selamat datang, " . htmlspecialchars($name) . "</p>";

    } catch (Exception $e) {
        $errorMsg = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        .error { color: red; font-size: 12px; }
        .alert { color: white; background-color: #f44336; padding: 10px; margin-bottom: 15px; width: 300px; border-radius: 4px; }
    </style>
</head>
<body>
    <h2>Login</h2>
    
    <?php 
    if (!empty($errorMsg)) { 
        echo "<div class='alert'><b>Error:</b> " . $errorMsg . "</div>";
    } 
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Username: <input type="text" name="u" value="<?php echo htmlspecialchars($name); ?>">
        <span class="error">* <?php echo $nameErr; ?></span>
        <br><br>
        
        Password: <input type="password" name="p">
        <span class="error">* <?php echo $passErr; ?></span>
        <br><br>
        
        <input type="submit" value="Login">
    </form>
</body>
</html>
