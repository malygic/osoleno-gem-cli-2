
<section class="hero" style="background-image: url('assets/images/homepage/home-hero-duck-dish.jpg');">
    <div class="hero__overlay"></div>
    <div class="hero__content">
        <h1 class="hero__title"><?php echo __('home_hero_title'); ?></h1>
        <a href="?page=contact" class="button button--primary"><?php echo __('home_hero_button'); ?></a>
    </div>
</section>

<section class="intro">
    <div class="container container--grid">
        <div class="intro__text">
            <h2 class="section__title"><?php echo __('home_intro_title'); ?></h2>
            <p><?php echo __('home_intro_text'); ?></p>
        </div>
        <div class="intro__image">
            <img src="assets/images/homepage/home-intro-interior-ambience.jpg" alt="Interiér restaurace Osoleno">
        </div>
    </div>
</section>

<section class="menu-preview">
    <div class="container">
        <h2 class="section__title text-center"><?php echo __('home_menu_preview_title'); ?></h2>
        <div class="menu-preview__grid">
            <div class="card">
                <img class="card__image" src="assets/images/menu/menu-item-parfait-royale.jpg" alt="Parfait Royale">
                <div class="card__content">
                    <h3 class="card__title">Parfait Royale</h3>
                    <a href="?page=menu" class="button button--secondary"><?php echo __('home_menu_full_button'); ?></a>
                </div>
            </div>
            <div class="card">
                <img class="card__image" src="assets/images/menu/menu-item-duck-fillet-main.jpg" alt="Kachní filé">
                <div class="card__content">
                    <h3 class="card__title">Kachní filé</h3>
                    <a href="?page=menu" class="button button--secondary"><?php echo __('home_menu_full_button'); ?></a>
                </div>
            </div>
            <div class="card">
                <img class="card__image" src="assets/images/menu/menu-item-burger-foie-gras.jpg" alt="Burger s Foie Gras">
                <div class="card__content">
                    <h3 class="card__title">Burger s Foie Gras</h3>
                    <a href="?page=menu" class="button button--secondary"><?php echo __('home_menu_full_button'); ?></a>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a href="?page=menu" class="button button--primary"><?php echo __('home_menu_full_button'); ?></a>
        </div>
    </div>
</section>

<section class="experience" style="background-image: url('assets/images/homepage/osoleno-cta-rezervace-stul.jpg');">
    <div class="experience__overlay"></div>
    <div class="container">
        <h2 class="section__title text-center"><?php echo __('home_experience_title'); ?></h2>
        <div class="experience__grid">
            <div class="experience__item">
                
                <h3><?php echo __('home_experience_seasonal_title'); ?></h3>
                <p><?php echo __('home_experience_seasonal_text'); ?></p>
            </div>
            <div class="experience__item">
                
                <h3><?php echo __('home_experience_chef_title'); ?></h3>
                <p><?php echo __('home_experience_chef_text'); ?></p>
            </div>
            <div class="experience__item">
                
                <h3><?php echo __('home_experience_atmosphere_title'); ?></h3>
                <p><?php echo __('home_experience_atmosphere_text'); ?></p>
            </div>
        </div>
    </div>
</section>

<section class="cta-block">
    <div class="container">
        <h2 class="section__title"><?php echo __('home_cta_title'); ?></h2>
        <p><?php echo __('home_cta_text'); ?></p>
        <a href="?page=contact" class="button button--primary"><?php echo __('home_hero_button'); ?></a>
    </div>
</section>
