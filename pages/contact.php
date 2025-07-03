
<?php require_once __DIR__ . '/../includes/database.php';
require_once __DIR__ . '/../includes/lang.php';
?>
<section class="hero-small" style="background-image: url('assets/images/kontakt/contact-hero-restaurant-exterior.jpg');">
    <div class="hero__overlay"></div>
    <div class="hero__content">
        <h1 class="hero__title"><?php echo __('contact_hero_title'); ?></h1>
    </div>
</section>

<section class="contact-page">
    <div class="container container--grid">
        <div class="contact-info">
            <h2 class="section__title"><?php echo __('contact_info_title'); ?></h2>
            <div class="contact-info__item">
                
                <h3><?php echo __('contact_info_address'); ?></h3>
                <p>Vodičkova 12, 110 00 Praha 1</p>
            </div>
            <div class="contact-info__item">
                
                <h3><?php echo __('contact_info_phone'); ?></h3>
                <p><a href="tel:+420123456789">+420 123 456 789</a></p>
            </div>
            <div class="contact-info__item">
                
                <h3><?php echo __('contact_info_email'); ?></h3>
                <p><a href="mailto:info@osoleno.cz">info@osoleno.cz</a></p>
            </div>
            <div class="contact-info__item">
                <h3><?php echo __('contact_info_opening_hours'); ?></h3>
                <p><?php echo __('contact_info_opening_hours_text'); ?></p>
            </div>
            <div class="map">
                <!-- Interaktivní mapa bude vložena zde -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2560.389379848927!2d14.42244481571801!3d50.0827719794262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470b94e5b1e7d4c3%3A0x3b2b8bbfd3626f6!2sVodi%C4%8Dkova%2012%2C%20110%2000%20Nov%C3%A9%20M%C4%9Bsto%2C%20Czechia!5e0!3m2!1sen!2sus!4v1678886400000!5m2!1sen!2sus" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <div class="reservation-form">
            <h2 class="section__title"><?php echo __('contact_reservation_form_title'); ?></h2>
            <form method="POST">
                <div class="form-group">
                    <label for="res-name"><?php echo __('contact_form_name'); ?></label>
                    <input type="text" id="res-name" name="res_name" required>
                </div>
                <div class="form-group">
                    <label for="res-email"><?php echo __('contact_form_email'); ?></label>
                    <input type="email" id="res-email" name="res_email" required>
                </div>
                <div class="form-group">
                    <label for="res-phone"><?php echo __('contact_form_phone'); ?></label>
                    <input type="tel" id="res-phone" name="res_phone" required>
                </div>
                <div class="form-group form-group--half">
                    <label for="res-date"><?php echo __('contact_form_date'); ?></label>
                    <input type="date" id="res-date" name="res_date" required>
                </div>
                <div class="form-group form-group--half">
                    <label for="res-time"><?php echo __('contact_form_time'); ?></label>
                    <input type="time" id="res-time" name="res_time" required>
                </div>
                <div class="form-group">
                    <label for="res-guests"><?php echo __('contact_form_guests'); ?></label>
                    <input type="number" id="res-guests" name="res_guests" min="1" required>
                </div>
                <button type="submit" class="button button--primary" name="submit_reservation"><?php echo __('contact_form_submit_reservation'); ?></button>
            </form>
            <?php
            if (isset($_POST['submit_reservation'])) {
                $name = $_POST['res_name'];
                $email = $_POST['res_email'];
                $phone = $_POST['res_phone'];
                $date = $_POST['res_date'];
                $time = $_POST['res_time'];
                $guests = $_POST['res_guests'];

                $stmt = $conn->prepare("INSERT INTO reservations (name, email, phone, reservation_date, reservation_time, guests) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssssi", $name, $email, $phone, $date, $time, $guests);

                if ($stmt->execute()) {
                    echo "<p style=\"color: green;\">" . __('contact_reservation_success') . "</p>";
                    // Zde by se odeslal email zákazníkovi a restauraci
                } else {
                    echo "<p style=\"color: red;\">" . __('contact_reservation_error') . " " . $stmt->error . "</p>";
                }

                $stmt->close();
            }
            ?>
        </div>
    </div>
</section>

<section class="faq">
    <div class="container">
        <h2 class="section__title text-center"><?php echo __('contact_faq_title'); ?></h2>
        <div class="faq__item">
            <h3 class="faq__question"><?php echo __('contact_faq_parking_question'); ?></h3>
            <p class="faq__answer"><?php echo __('contact_faq_parking_answer'); ?></p>
        </div>
        <div class="faq__item">
            <h3 class="faq__question"><?php echo __('contact_faq_barrier_free_question'); ?></h3>
            <p class="faq__answer"><?php echo __('contact_faq_barrier_free_answer'); ?></p>
        </div>
        <div class="faq__item">
            <h3 class="faq__question"><?php echo __('contact_faq_payment_question'); ?></h3>
            <p class="faq__answer"><?php echo __('contact_faq_payment_answer'); ?></p>
        </div>
    </div>
</section>
