
<?php
session_start();
require_once __DIR__ . '/../includes/database.php';
require_once __DIR__ . '/../includes/lang.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ?page=login");
    exit();
}

$user_id = $_SESSION['user_id'];

// Získání informací o uživateli
$stmt_user = $conn->prepare("SELECT name, email, phone, address FROM users WHERE id = ?");
$stmt_user->bind_param("i", $user_id);
$stmt_user->execute();
$result_user = $stmt_user->get_result();
$user_info = $result_user->fetch_assoc();
$stmt_user->close();

// Získání historie objednávek
$sql_orders = "SELECT id, total_price, created_at FROM orders WHERE user_id = ? ORDER BY created_at DESC";
$stmt_orders = $conn->prepare($sql_orders);
$stmt_orders->bind_param("i", $user_id);
$stmt_orders->execute();
$result_orders = $stmt_orders->get_result();

?>

<section class="account-page">
    <div class="container">
        <h2 class="section__title text-center"><?php echo __('account_title'); ?></h2>

        <div class="user-info">
            <h3><?php echo __('account_user_data_title'); ?></h3>
            <p><strong><?php echo __('account_user_name'); ?></strong> <?php echo htmlspecialchars($user_info['name']); ?></p>
            <p><strong><?php echo __('account_user_email'); ?></strong> <?php echo htmlspecialchars($user_info['email']); ?></p>
            <p><strong><?php echo __('account_user_phone'); ?></strong> <?php echo htmlspecialchars($user_info['phone']); ?></p>
            <p><strong><?php echo __('account_user_address'); ?></strong> <?php echo htmlspecialchars($user_info['address']); ?></p>
        </div>

        <div class="order-history">
            <h3><?php echo __('account_order_history_title'); ?></h3>
            <?php if ($result_orders->num_rows > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th><?php echo __('account_order_id'); ?></th>
                            <th><?php echo __('account_order_total_price'); ?></th>
                            <th><?php echo __('account_order_date'); ?></th>
                            <th><?php echo __('account_order_details'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($order = $result_orders->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $order['id']; ?></td>
                                <td><?php echo $order['total_price']; ?> Kč</td>
                                <td><?php echo $order['created_at']; ?></td>
                                <td><a href="?page=order_detail&id=<?php echo $order['id']; ?>">Zobrazit</a></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p><?php echo __('account_no_orders'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
$stmt_orders->close();
?>
