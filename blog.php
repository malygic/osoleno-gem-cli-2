<?php include 'includes/header.php'; ?>

<!-- 1. ÚVODNÍ SEKCE STRÁNKY -->
<header class="page-header" style="background-image: url('assets/images/blog-featured-dining-lifestyle.jpg');">
    <div class="hero-section__overlay"></div>
    <div class="container">
        <div class="page-header__content">
            <h1 class="page-title">Příběhy z naší kuchyně</h1>
            <p class="page-header__subtitle">Nahlédněte pod pokličku, objevte nové recepty a sledujte novinky z restaurace Osoleno.</p>
        </div>
    </div>
</header>

<div class="main-content">
    <div class="container">
        <!-- 2. NEJNOVĚJŠÍ ČLÁNEK (FEATURED POST) -->
        <section class="featured-post">
            <img src="assets/images/menu-item-roasted-half-duck.jpg" alt="Pečená půlka kachny se zelím" class="featured-post__image">
            <div class="featured-post__content">
                <span class="article-card__category">Recepty</span>
                <h2 class="featured-post__title">Jak na dokonalou sváteční kachnu: Tipy od našeho šéfkuchaře</h2>
                <p class="featured-post__excerpt">Sváteční pečená kachna je korunou každé slavnostní tabule. Náš šéfkuchař se s vámi podělí o své nejlepší triky, jak dosáhnout dokonale křupavé kůžičky a neuvěřitelně šťavnatého masa. Připravte se na ovace u stolu!</p>
                <a href="#" class="button button--secondary">Přečíst celý článek</a>
            </div>
        </section>

        <div class="blog-layout">
            <!-- 3. VÝPIS ČLÁNKŮ -->
            <main class="main-article-feed">
                <h2 class="section-title text-left">Další články</h2>
                <div class="article-grid">
                    <article class="article-card">
                        <img src="assets/images/ambience-lifestyle-cheers.jpg" alt="Párování vína s jídlem" class="article-card__image">
                        <div class="article-card__content">
                            <span class="article-card__category">Ze zákulisí</span>
                            <h3 class="article-card__title">Umění párování: Jak vybrat víno ke kachním specialitám</h3>
                            <p class="article-card__meta">18. října 2023</p>
                            <a href="#" class="article-card__link">Číst více</a>
                        </div>
                    </article>
                    <article class="article-card">
                        <img src="assets/images/about-team-portrait.jpg" alt="Tým restaurace" class="article-card__image">
                        <div class="article-card__content">
                            <span class="article-card__category">Novinky</span>
                            <h3 class="article-card__title">Představujeme nové sezónní menu plné podzimních chutí</h3>
                            <p class="article-card__meta">5. října 2023</p>
                            <a href="#" class="article-card__link">Číst více</a>
                        </div>
                    </article>
                    <article class="article-card">
                         <img src="assets/images/menu-item-barbazhuani-duck.jpg" alt="Ručně dělané těstoviny" class="article-card__image">
                        <div class="article-card__content">
                            <span class="article-card__category">Recepty</span>
                            <h3 class="article-card__title">Tajemství Barbažuánů: Malé knedlíčky, velká chuť</h3>
                            <p class="article-card__meta">22. září 2023</p>
                            <a href="#" class="article-card__link">Číst více</a>
                        </div>
                    </article>
                </div>
            </main>

            <!-- 4. BOČNÍ PANEL (SIDEBAR) -->
            <aside class="blog-sidebar">
                <div class="widget">
                    <h4 class="widget__title">Vyhledávání</h4>
                    <form class="search-form">
                        <input type="search" placeholder="Hledat články..." class="search-form__input">
                        <button type="submit" class="search-form__button" aria-label="Hledat">
                            <!-- lucide: search -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                        </button>
                    </form>
                </div>
                <div class="widget">
                    <h4 class="widget__title">Kategorie</h4>
                    <ul class="widget__list">
                        <li><a href="#">Recepty (2)</a></li>
                        <li><a href="#">Ze zákulisí (1)</a></li>
                        <li><a href="#">Novinky (1)</a></li>
                        <li><a href="#">Akce (0)</a></li>
                    </ul>
                </div>
                <div class="widget widget--newsletter">
                    <h4 class="widget__title">Odběr novinek</h4>
                    <p>Nenechte si ujít žádnou novinku ani speciální nabídku.</p>
                    <form class="newsletter-form">
                        <input type="email" placeholder="vas@email.cz" required class="newsletter-form__input">
                        <button type="submit" class="button button--primary button--full-width">Přihlásit se</button>
                    </form>
                </div>
            </aside>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>