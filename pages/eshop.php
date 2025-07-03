
<?php
session_start();
require_once __DIR__ . '/../includes/database.php';
require_once __DIR__ . '/../includes/lang.php';

// Přidání produktu do košíku
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = 1; // Pro jednoduchost vždy 1 kus

    $stmt = $conn->prepare("SELECT name, price FROM products WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    if ($product) {
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$product_id] = [
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $quantity
            ];
        }
    }
    $stmt->close();
}

// Zpracování objednávky
if (isset($_POST['place_order'])) {
    if (!isset($_SESSION['user_id'])) {
        // Uživatel není přihlášen, přesměrovat na přihlášení
        header("Location: ?page=login");
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $total_price = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total_price += $item['price'] * $item['quantity'];
    }

    $conn->begin_transaction();

    try {
        // Vytvoření objednávky
        $stmt = $conn->prepare("INSERT INTO orders (user_id, total_price) VALUES (?, ?)");
        $stmt->bind_param("id", $user_id, $total_price);
        $stmt->execute();
        $order_id = $conn->insert_id;
        $stmt->close();

        // Vložení položek objednávky
        $stmt_item = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
        foreach ($_SESSION['cart'] as $product_id => $item) {
            $stmt_item->bind_param("iiid", $order_id, $product_id, $item['quantity'], $item['price']);
            $stmt_item->execute();
        }
        $stmt_item->close();

        $conn->commit();
        unset($_SESSION['cart']); // Vyprázdnění košíku
        echo "<p style=\"color: green;\">" . __('eshop_order_success') . "</p>";
        // Zde by se odeslal email zákazníkovi a restauraci

    } catch (mysqli_sql_exception $exception) {
        $conn->rollback();
        echo "<p style=\"color: red;\">" . __('eshop_order_error') . " " . $exception->getMessage() . "</p>";
    }
}
?>
<section class="hero-small" style="background-image: url('assets/images/eshop/eshop-product-riettes-jar.jpg');">

    <div class="hero__overlay"></div>
    <div class="hero__content">
        <h1 class="hero__title"><?php echo __('eshop_hero_title'); ?></h1>
    </div>
</section>

<section class="eshop-page">
    <div class="container">
        <div class="eshop-page__intro">
            <h2 class="section__title"><?php echo __('eshop_intro_title'); ?></h2>
            <p><?php echo __('eshop_intro_text'); ?></p>
        </div>

        <div class="eshop-page__how-it-works">
            <div class="step">
                <div class="step__number">1</div>
                <h3 class="step__title"><?php echo __('eshop_step1_title'); ?></h3>
                <p><?php echo __('eshop_step1_text'); ?></p>
            </div>
            <div class="step">
                <div class="step__number">2</div>
                <h3 class="step__title"><?php echo __('eshop_step2_title'); ?></h3>
                <p><?php echo __('eshop_step2_text'); ?></p>
            </div>
            <div class="step">
                <div class="step__number">3</div>
                <h3 class="step__title"><?php echo __('eshop_step3_title'); ?></h3>
                <p><?php echo __('eshop_step3_text'); ?></p>
            </div>
        </div>

        <div id="product-list" class="product-grid">
            <?php
            $sql_products = "SELECT * FROM products";
            $result_products = $conn->query($sql_products);

            if ($result_products->num_rows > 0) {
                while($product = $result_products->fetch_assoc()) {
                    echo '<div class="card">';
                    echo '<img class="card__image" src="' . $product['image'] . '" alt="' . $product['name'] . '">';
                    echo '<div class="card__content">';
                    echo '<h4 class="card__title">' . $product['name'] . '</h4>';
                    echo '<p>' . $product['description'] . '</p>';
                    echo '<p class="card__price">' . $product['price'] . ' Kč</p>';
                    echo '<form method="POST">';
                    echo '<input type="hidden" name="product_id" value="' . $product['id'] . '">';
                    echo '<button type="submit" name="add_to_cart" class="button button--primary">' . __('eshop_add_to_cart_button') . '</button>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>" . __('eshop_no_products') . "</p>";
            }
            ?>
        </div>

        <div id="cart" class="cart">
            <h3 class="cart__title"><?php echo __('eshop_cart_title'); ?></h3>
            <div class="cart__items">
                <?php
                $total_price = 0;
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $product_id => $item) {
                        echo '<div class="cart-item">';
                        echo '<p>' . $item['name'] . ' x ' . $item['quantity'] . ' - ' . ($item['price'] * $item['quantity']) . ' Kč</p>';
                        echo '</div>';
                        $total_price += ($item['price'] * $item['quantity']);
                    }
                } else {
                    echo "<p>" . __('eshop_cart_empty') . "</p>";
                }
                ?>
            </div>
            <div class="cart__total">
                <p><?php echo __('eshop_cart_total'); ?> <span id="cart-total-price"><?php echo $total_price; ?> Kč</span></p>
            </div>
        </div>

        <div id="order-form" class="order-form">
            <h3 class="order-form__title"><?php echo __('eshop_order_form_title'); ?></h3>
            <?php if (isset($_SESSION['user_id'])): ?>
                <form method="POST">
                    <div class="form-group">
                        <label for="name"><?php echo __('contact_form_name'); ?></label>
                        <input type="text" id="name" name="name" value="<?php echo $_SESSION['user_name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email"><?php echo __('contact_form_email'); ?></label>
                        <input type="email" id="email" name="email" value="<?php echo $_SESSION['user_email'] ?? ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="phone"><?php echo __('contact_form_phone'); ?></label>
                        <input type="tel" id="phone" name="phone" value="<?php echo $_SESSION['user_phone'] ?? ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="address"><?php echo __('account_user_address'); ?></label>
                        <textarea id="address" name="address" rows="4" required><?php echo $_SESSION['user_address'] ?? ''; ?></textarea>
                    </div>
                    <button type="submit" class="button button--primary" name="place_order"><?php echo __('eshop_place_order_button'); ?></button>
                </form>
            <?php else: ?>
                <p><?php echo __('eshop_order_login_prompt'); ?></p>
            <?php endif; ?>
        </div>

        <div id="user-account-link" class="user-account-link">
            <?php if (isset($_SESSION['user_id'])): ?>
                <p><?php printf(__('eshop_account_link_logged_in'), $_SESSION['user_name']); ?></p>
            <?php else: ?>
                <p><?php echo __('eshop_account_link_logged_out'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>
