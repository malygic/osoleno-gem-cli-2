
<?php
require_once __DIR__ . '/../includes/database.php';
require_once __DIR__ . '/../includes/lang.php';

$message = '';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, name, password, email, phone, address FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $name, $hashed_password, $user_email, $user_phone, $user_address);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($password, $hashed_password)) {
        session_start();
        $_SESSION['user_id'] = $id;
        $_SESSION['user_name'] = $name;
        $_SESSION['user_email'] = $user_email;
        $_SESSION['user_phone'] = $user_phone;
        $_SESSION['user_address'] = $user_address;
        header("Location: ?page=eshop"); // Přesměrování na e-shop po přihlášení
        exit();
    } else {
        $message = "<p style=\"color: red;\">" . __('login_error') . "</p>";
    }

    $stmt->close();
}
?>

<section class="auth-page">
    <div class="container">
        <h2 class="section__title text-center"><?php echo __('login_title'); ?></h2>
        <?php echo $message; ?>
        <form method="POST">
            <div class="form-group">
                <label for="email"><?php echo __('contact_form_email'); ?></label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password"><?php echo __('login_password'); ?></label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="button button--primary" name="login">Přihlásit se</button>
        </form>
        <p class="text-center"><?php echo __('login_register_prompt'); ?></p>
    </div>
</section>
