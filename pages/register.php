
<?php
require_once __DIR__ . '/../includes/database.php';
require_once __DIR__ . '/../includes/lang.php';

$message = '';

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $stmt = $conn->prepare("INSERT INTO users (name, email, password, phone, address) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $password, $phone, $address);

    if ($stmt->execute()) {
        $message = "<p style=\"color: green;\">" . __('register_success') . "</p>";
    } else {
        $message = "<p style=\"color: red;\">" . __('register_error') . " " . $stmt->error . "</p>";
    }

    $stmt->close();
}
?>

<section class="auth-page">
    <div class="container">
        <h2 class="section__title text-center"><?php echo __('register_title'); ?></h2>
        <?php echo $message; ?>
        <form method="POST">
            <div class="form-group">
                <label for="name"><?php echo __('contact_form_name'); ?></label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email"><?php echo __('contact_form_email'); ?></label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password"><?php echo __('login_password'); ?></label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="phone"><?php echo __('contact_form_phone'); ?></label>
                <input type="tel" id="phone" name="phone">
            </div>
            <div class="form-group">
                <label for="address"><?php echo __('account_user_address'); ?></label>
                <textarea id="address" name="address"></textarea>
            </div>
            <button type="submit" class="button button--primary" name="register"><?php echo __('register_title'); ?></button>
        </form>
        <p class="text-center"><?php echo __('register_login_prompt'); ?></p>
    </div>
</section>
