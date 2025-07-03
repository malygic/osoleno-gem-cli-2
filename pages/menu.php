
<?php require_once __DIR__ . '/../includes/database.php'; ?>
<section class="hero-small" style="background-image: url('assets/images/menu/menu-item-duck-breast-sous-vide.jpg');">
    <div class="hero__overlay"></div>
    <div class="hero__content">
        <h1 class="hero__title"><?php echo __('menu_hero_title'); ?></h1>
    </div>
</section>

<section class="menu-page">
    <div class="container">
        <div class="menu-page__intro">
            <h2 class="section__title"><?php echo __('menu_intro_title'); ?></h2>
            <p><?php echo __('menu_intro_text'); ?></p>
        </div>

        <?php
        $sql_categories = "SELECT * FROM menu_categories ORDER BY id";
        $result_categories = $conn->query($sql_categories);

        if ($result_categories->num_rows > 0) {
            while($category = $result_categories->fetch_assoc()) {
                echo '<div id="' . strtolower(str_replace(' ', '-', $category["name"])) . '" class="menu-section">';
                echo '<h3 class="menu-section__title">' . $category["name"] . '</h3>';
                echo '<div class="menu-section__grid">';

                $sql_items = "SELECT * FROM menu_items WHERE category_id = " . $category['id'];
                $result_items = $conn->query($sql_items);

                if ($result_items->num_rows > 0) {
                    while($item = $result_items->fetch_assoc()) {
                        echo '<div class="card">';
                        echo '<img class="card__image" src="' . $item['image'] . '" alt="' . $item['name'] . '">';
                        echo '<div class="card__content">';
                        echo '<h4 class="card__title">' . $item['name'] . '</h4>';
                        echo '<p>' . $item['description'] . '</p>';
                        echo '<p class="card__price">' . $item['price'] . '</p>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "<p>" . __('menu_no_items') . "</p>";
                }

                echo '</div>';
                echo '</div>';
            }
        }
        ?>

        <div class="menu-page__allergens">
            <p><?php echo __('menu_allergens_text'); ?></p>
        </div>
    </div>
</section>
