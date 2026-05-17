<footer class="site-footer">
  <div class="container">
    <div class="footer-grid">
      <div class="footer-brand">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">Warsaw<span style="color:#60a5fa">Rent</span></a>
        <p>Проверенные квартиры в аренду в Варшаве. Без посредников, без скрытых платежей. Работаем с 2019 года.</p>
      </div>
      <div class="footer-col">
        <h4>Навигация</h4>
        <ul>
          <li><a href="<?php echo home_url('/'); ?>">Главная</a></li>
          <li><a href="<?php echo home_url('/variant-1-acf/'); ?>">Вариант 1 — ACF</a></li>
          <li><a href="<?php echo home_url('/variant-2-elementor/'); ?>">Вариант 2 — Elementor</a></li>
          <li><a href="<?php echo home_url('/variant-3-gutenberg/'); ?>">Вариант 3 — Gutenberg</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Районы</h4>
        <ul>
          <li><a href="#">Śródmieście</a></li>
          <li><a href="#">Mokotów</a></li>
          <li><a href="#">Żoliborz</a></li>
          <li><a href="#">Praga Północ</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Контакты</h4>
        <ul>
          <li><a href="tel:+48222345678">+48 22 234 56 78</a></li>
          <li><a href="mailto:info@warsawrent.pl">info@warsawrent.pl</a></li>
          <li><a href="#">WhatsApp / Telegram</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p>© <?php echo date('Y'); ?> WarsawRent. Все права защищены.</p>
      <p>Сделано на WordPress · <?php echo get_bloginfo('name'); ?></p>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
