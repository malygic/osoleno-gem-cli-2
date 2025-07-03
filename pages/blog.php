
<section class="hero-small" style="background-image: url('assets/images/blog/blog-featured-dining-lifestyle.jpg');">
    <div class="hero__overlay"></div>
    <div class="hero__content">
        <h1 class="hero__title"><?php echo __('blog_hero_title'); ?></h1>
    </div>
</section>

<section class="blog-page">
    <div class="container">
        <!-- Featured Post -->
        <div class="featured-post">
            <!-- Nejnovější článek bude načten dynamicky -->
        </div>

        <!-- Blog Grid -->
        <div class="blog-grid">
            <!-- Další články budou načteny dynamicky -->
        </div>

        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="widget">
                <h3 class="widget__title"><?php echo __('blog_widget_categories_title'); ?></h3>
                <ul class="widget__list">
                    <li><a href="#">Recepty</a></li>
                    <li><a href="#">Ze zákulisí</a></li>
                    <li><a href="#">Akce</a></li>
                </ul>
            </div>
            <div class="widget">
                <h3 class="widget__title"><?php echo __('blog_widget_chef_word_title'); ?></h3>
                <p><?php echo __('blog_widget_chef_word_text'); ?></p>
            </div>
            <div class="widget">
                <h3 class="widget__title"><?php echo __('blog_widget_newsletter_title'); ?></h3>
                <form class="newsletter-form">
                    <input type="email" placeholder="<?php echo __('blog_widget_newsletter_placeholder'); ?>">
                    <button type="submit" class="button button--primary"><?php echo __('blog_widget_newsletter_button'); ?></button>
                </form>
            </div>
        </aside>
    </div>
</section>
