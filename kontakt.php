<?php include 'includes/header.php'; ?>

<!-- 1. ÚVODNÍ SEKCE STRÁNKY -->
<header class="page-header" style="background-image: url('assets/images/contact-hero-restaurant-exterior.jpg');">
    <div class="hero-section__overlay"></div>
    <div class="container">
        <div class="page-header__content">
            <h1 class="page-title">Kontaktujte nás</h1>
            <p class="page-header__subtitle">Máte dotaz nebo si přejete rezervovat stůl? Jsme tu pro vás. Těšíme se na vaši návštěvu.</p>
        </div>
    </div>
</header>

<div class="main-content">
    <div class="container">
        <div class="contact-layout">
            <!-- LEVÝ SLOUPEC: INFORMACE A MAPA -->
            <div class="contact-info-panel">
                <section class="widget">
                    <h2 class="widget__title">Naše adresa</h2>
                    <ul class="contact-details">
                        <li>
                            <!-- lucide: map-pin -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                            <span>Vzorová 123, 110 00 Praha 1</span>
                        </li>
                        <li>
                            <!-- lucide: phone -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            <a href="tel:+420123456789">+420 123 456 789</a>
                        </li>
                        <li>
                            <!-- lucide: mail -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                            <a href="mailto:rezervace@osoleno.cz">rezervace@osoleno.cz</a>
                        </li>
                    </ul>
                </section>
                <section class="widget">
                    <h2 class="widget__title">Otevírací doba</h2>
                    <ul class="opening-hours">
                        <li><span>Pondělí - Pátek:</span> <span>11:30 - 23:00</span></li>
                        <li><span>Sobota:</span> <span>12:00 - 23:00</span></li>
                        <li><span>Neděle:</span> <span>12:00 - 22:00</span></li>
                    </ul>
                </section>
                <div class="map-placeholder">
                    <!-- Zde bude interaktivní mapa -->
                    <span>Mapa se načítá...</span>
                </div>
            </div>

            <!-- PRAVÝ SLOUPEC: REZERVAČNÍ FORMULÁŘ -->
            <div class="reservation-panel">
                <div class="widget">
                    <h2 class="widget__title">Rezervovat stůl</h2>
                    <p class="widget__subtitle">Vyplňte formulář a my se vám co nejdříve ozveme s potvrzením vaší rezervace.</p>
                    <form class="reservation-form-contact" action="process_reservation.php" method="POST">
                        <div class="form-group">
                            <label for="name-res">Jméno a příjmení</label>
                            <input type="text" id="name-res" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email-res">E-mail</label>
                            <input type="email" id="email-res" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone-res">Telefon</label>
                            <input type="tel" id="phone-res" name="phone" required>
                        </div>
                        <div class="form-group-grid">
                            <div class="form-group">
                                <label for="date-res">Datum</label>
                                <input type="date" id="date-res" name="date" required>
                            </div>
                            <div class="form-group">
                                <label for="time-res">Čas</label>
                                <input type="time" id="time-res" name="time" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="people-res">Počet osob</label>
                            <input type="number" id="people-res" name="people" min="1" max="10" value="2" required>
                        </div>
                        <div class="form-group">
                            <label for="note-res">Poznámka (volitelné)</label>
                            <textarea id="note-res" name="note" rows="3"></textarea>
                        </div>
                        <button type="submit" class="button button--primary button--full-width">Odeslat rezervaci</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- ČASTO KLADENÉ OTÁZKY (FAQ) -->
        <section class="section-padding">
            <h2 class="section-title text-center">Často kladené otázky</h2>
            <div class="faq-container">
                <details class="faq-item">
                    <summary class="faq-item__question">
                        <span>Je nutná rezervace předem?</span>
                        <!-- lucide: chevron-down -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                    </summary>
                    <div class="faq-item__answer">
                        <p>Rezervaci silně doporučujeme, zejména na večerní hodiny a víkendy, abychom vám mohli zaručit místo. Pro menší skupiny během oběda obvykle místo najdeme i bez rezervace.</p>
                    </div>
                </details>
                <details class="faq-item">
                    <summary class="faq-item__question">
                        <span>Kde mohu zaparkovat?</span>
                         <!-- lucide: chevron-down -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                    </summary>
                    <div class="faq-item__answer">
                        <p>Naše restaurace se nachází v centru Prahy. V okolních ulicích jsou placené parkovací zóny. Nejbližší hlídané parkoviště je v OC Palladium, přibližně 10 minut chůze od nás.</p>
                    </div>
                </details>
                <details class="faq-item">
                    <summary class="faq-item__question">
                        <span>Máte bezbariérový přístup?</span>
                         <!-- lucide: chevron-down -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                    </summary>
                    <div class="faq-item__answer">
                        <p>Ano, celá restaurace včetně toalet je plně bezbariérová. Pro jistotu nám prosím dejte vědět při rezervaci, abychom vám mohli připravit co nejpohodlnější stůl.</p>
                    </div>
                </details>
            </div>
        </section>
    </div>
</div>

<?php include 'includes/footer.php'; ?>