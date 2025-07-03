<?php 
include 'includes/header.php'; 
require_once 'includes/db_config.php';
?>

<!-- ÚVODNÍ SEKCE STRÁNKY -->
<header class="page-header" style="background-image: url('assets/images/eshop-product-riettes-jar.jpg');">
    <div class="hero-section__overlay"></div>
    <div class="container">
        <div class="page-header__content">
            <h1 class="page-title">Osoleno až k vám domů</h1>
            <p class="page-header__subtitle">Vychutnejte si naše speciality v pohodlí vašeho domova. Kvalita, kterou znáte, nově i s sebou.</p>
        </div>
    </div>
</header>

<div class="main-content">
    <div class="container">
        <!-- SEKCE "JAK TO FUNGUJE" -->
        <section class="section-padding--light-bg how-it-works">
            <div class="how-it-works__step">
                <div class="how-it-works__icon">
                    <!-- lucide: shopping-basket -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 11-1 9"/><path d="m19.5 11-1 9"/><path d="M2.5 11h19"/><path d="M3.5 11 5 3"/><path d="M20.5 11 19 3"/><path d="M12 3v8"/></svg>
                </div>
                <h3 class="how-it-works__title">1. Vyberte si</h3>
                <p>Prohlédněte si naši nabídku a vložte oblíbené produkty do košíku.</p>
            </div>
            <div class="how-it-works__step">
                <div class="how-it-works__icon">
                    <!-- lucide: file-text -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><line x1="10" x2="8" y1="9" y2="9"/></svg>
                </div>
                <h3 class="how-it-works__title">2. Vyplňte údaje</h3>
                <p>Vyplňte objednávkový formulář, abychom věděli, kam vaši objednávku doručit.</p>
            </div>
            <div class="how-it-works__step">
                <div class="how-it-works__icon">
                    <!-- lucide: truck -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"/><path d="M15 18H9"/><path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14"/><circle cx="17" cy="18" r="2"/><circle cx="7" cy="18" r="2"/></svg>
                </div>
                <h3 class="how-it-works__title">3. Zaplaťte při převzetí</h3>
                <p>Platba probíhá v hotovosti nebo QR kódem až při doručení vaší objednávky.</p>
            </div>
        </section>

        <div class="eshop-layout">
            <!-- NABÍDKA PRODUKTŮ -->
            <div class="product-listing">
                <h2 class="section-title">Naše nabídka</h2>
                <div class="product-grid">
                    <?php
                    $result = $conn->query("SELECT * FROM products WHERE is_active = 1");
                    while ($product = $result->fetch_assoc()):
                    ?>
                    <div class="product-card">
                        <form action="cart_handler.php" method="POST">
                            <input type="hidden" name="action" value="add">
                            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                            <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-card__image">
                            <div class="product-card__content">
                                <h3 class="product-card__title"><?php echo htmlspecialchars($product['name']); ?></h3>
                                <p class="product-card__description"><?php echo htmlspecialchars($product['description']); ?></p>
                            </div>
                            <div class="product-card__footer">
                                <span class="product-card__price"><?php echo htmlspecialchars($product['price']); ?> Kč</span>
                                <button type="submit" class="button button--primary">Do košíku</button>
                            </div>
                        </form>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>

            <!-- KOŠÍK A OBJEDNÁVKOVÝ FORMULÁŘ -->
            <aside class="order-sidebar">
                <h2 class="section-title">Košík a objednávka</h2>
                <div class="cart-summary">
                    <?php
                    if (!empty($_SESSION['cart'])):
                        $total_price = 0;
                        $product_ids = array_keys($_SESSION['cart']);
                        $placeholders = implode(',', array_fill(0, count($product_ids), '?'));
                        $stmt = $conn->prepare("SELECT id, name, price FROM products WHERE id IN ($placeholders)");
                        $types = str_repeat('i', count($product_ids));
                        $stmt->bind_param($types, ...$product_ids);
                        $stmt->execute();
                        $result_products = $stmt->get_result();
                        $products_in_cart = [];
                        while ($row = $result_products->fetch_assoc()) {
                            $products_in_cart[$row['id']] = $row;
                        }

                        foreach ($products_in_cart as $product):
                            $quantity = $_SESSION['cart'][$product['id']];
                            $subtotal = $product['price'] * $quantity;
                            $total_price += $subtotal;
                    ?>
                    <div class="cart-item">
                        <div class="cart-item__details">
                            <span class="cart-item__name"><?php echo htmlspecialchars($product['name']); ?> (x<?php echo $quantity; ?>)</span>
                            <span class="cart-item__price"><?php echo $subtotal; ?> Kč</span>
                        </div>
                        <a href="cart_handler.php?action=remove&product_id=<?php echo $product['id']; ?>" class="cart-item__remove" aria-label="Odebrat položku">×</a>
                    </div>
                    <?php endforeach; ?>
                    <div class="cart-total">
                        <strong>Celkem:</strong>
                        <strong><?php echo $total_price; ?> Kč</strong>
                    </div>
                    <?php else: ?>
                    <p class="cart-summary__empty">Váš košík je prázdný.</p>
                    <?php endif; ?>
                </div>

                <?php if (isset($_SESSION['user_id'])): ?>
                    <?php if (!empty($_SESSION['cart'])): ?>
                    <form action="cart_handler.php" method="POST" class="order-form">
                        <input type="hidden" name="action" value="place_order">
                        <div class="form-group"><label for="name-order">Jméno a příjmení</label><input type="text" id="name-order" name="name-order" required></div>
                        <div class="form-group"><label for="email-order">E-mail</label><input type="email" id="email-order" name="email-order" required></div>
                        <div class="form-group"><label for="phone-order">Telefon</label><input type="tel" id="phone-order" name="phone-order" required></div>
                        <div class="form-group"><label for="address-order">Doručovací adresa</label><textarea id="address-order" name="address-order" rows="3" required></textarea></div>
                        <button type="submit" class="button button--primary button--full-width">Odeslat objednávku</button>
                    </form>
                    <?php endif; ?>
                <?php else: ?>
                <div class="account-cta">
                    <p>Pro dokončení objednávky se prosím <a href="/ucet.php">přihlaste nebo zaregistrujte</a>.</p>
                </div>
                <?php endif; ?>
            </aside>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>