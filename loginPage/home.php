<?php
    include("database.php");

    $error = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($username)) {
            $error = "Please enter an email";
        } else if (empty($password)) {
            $error = "Enter your password";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO user (Email, Password) VALUES('$username', '$hash')";

            try {
                mysqli_query($conn, $sql);
            } catch (mysqli_sql_exception $e) {
                $error = "Error occured in inserting the data: ";
            }
        }
    }

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navigation.css">
    <title>Sign Up</title>
</head>
<body>
    <nav class="navBar">
        <div class="navDiv">
            <div class="logo"><a href="#" style="text-decoration: none">E-BOOK</a></div>
            <ul>
                <li><a href="#" style="text-decoration: none">Home</a></li>
                <li><a href="#" style="text-decoration: none">About Us</a></li>
                <li><a href="#" style="text-decoration: none">Services</a></li>
                <li><a href="#" style="text-decoration: none">Contact Us</a></li>
            </ul>
        </div>
    </nav>

    <div class="loginBox">
        <div class="header">
            <header>Sign Up</header>
        </div>
        <div class="inputFld">
            <form id="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <input type="text" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
            </form> 

            <?php if (!empty($error)): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>

        </div>
        <div class="forgotPass">
            <section>
                <input type="checkbox" id="check">
                <label for="check">Remember Me</label>
            </section>
            <section>
                <a href="#" style="text-decoration: none">Forgot Password?</a>
            </section>
        </div>
        <div class="inputBtn">
            <button class="submitBtn" id="submit" onclick="submitForm()">
                <label for="submit">Sign In</label>
            </button>
        </div>
        <script>
            function submitForm() {
                document.getElementById("loginForm").submit();
            }
        </script>
    </div>
</body>
</html>
