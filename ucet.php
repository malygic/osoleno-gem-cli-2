<?php include 'includes/header.php'; ?>

<div class="main-content">
    <div class="container">
        <?php if (isset($_SESSION['user_id'])): // Uživatel je přihlášen ?>
            
            <div class="account-dashboard">
                <h1 class="page-title">Vítejte, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h1>
                <p class="section-subtitle">Zde naleznete přehled svých údajů a historii objednávek.</p>
                <div class="account-layout">
                    <div class="widget">
                        <h3 class="widget__title">Vaše údaje</h3>
                        <p><strong>Jméno:</strong> <?php echo htmlspecialchars($_SESSION['user_name']); ?></p>
                        <!-- Zde by se načetly další údaje z DB -->
                        <p><strong>Email:</strong> ...</p>
                        <p><strong>Telefon:</strong> ...</p>
                        <a href="#" class="button button--primary" style="margin-top: var(--spacing-m);">Upravit údaje</a>
                    </div>
                    <div class="widget">
                        <h3 class="widget__title">Historie objednávek</h3>
                        <p>Zatím jste neprovedli žádnou objednávku.</p>
                    </div>
                </div>
                <a href="logout.php" class="button button--secondary" style="margin-top: var(--spacing-l);">Odhlásit se</a>
            </div>

        <?php else: // Uživatel není přihlášen - zobrazí se formuláře ?>
            
            <div class="auth-layout">
                <!-- LEVÁ STRANA: PŘIHLÁŠENÍ -->
                <div class="auth-panel">
                    <h2 class="section-title">Přihlášení</h2>
                    <p>Pokud již máte účet, přihlaste se prosím.</p>
                    <form action="auth_handler.php" method="POST" class="auth-form">
                        <input type="hidden" name="action" value="login">
                        <div class="form-group">
                            <label for="login-email">E-mail</label>
                            <input type="email" id="login-email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="login-password">Heslo</label>
                            <input type="password" id="login-password" name="password" required>
                        </div>
                        <button type="submit" class="button button--primary button--full-width">Přihlásit se</button>
                    </form>
                </div>
                
                <!-- PRAVÁ STRANA: REGISTRACE -->
                <div class="auth-panel">
                    <h2 class="section-title">Nová registrace</h2>
                    <p>Nemáte účet? Zaregistrujte se a objednávejte pohodlně.</p>
                    <form action="auth_handler.php" method="POST" class="auth-form">
                        <input type="hidden" name="action" value="register">
                        <div class="form-group">
                            <label for="reg-name">Jméno a příjmení</label>
                            <input type="text" id="reg-name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="reg-email">E-mail</label>
                            <input type="email" id="reg-email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="reg-password">Heslo</label>
                            <input type="password" id="reg-password" name="password" required>
                        </div>
                        <button type="submit" class="button button--secondary button--full-width">Zaregistrovat se</button>
                    </form>
                </div>
            </div>

        <?php endif; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>