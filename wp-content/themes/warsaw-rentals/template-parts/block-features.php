<section class="features-block section" id="features">
  <div class="container">
    <div class="section-header">
      <p class="section-eyebrow">Почему мы</p>
      <h2 class="section-title">Аренда без стресса</h2>
      <p class="section-desc">Мы берём на себя всё — от поиска до заключения договора. Ты просто въезжаешь.</p>
    </div>
    <div class="grid-4">
      <?php $features = [
        ['📍', 'Центр Варшавы',   'Все квартиры в радиусе 3 км от Рыночной площади. Метро в шаговой доступности.'],
        ['💳', 'Честная цена',    'Никаких агентских сборов и скрытых платежей. Цена на сайте — финальная.'],
        ['⚡', 'Быстрый въезд',  'Подписание договора и получение ключей за 24 часа после одобрения.'],
        ['🔧', 'Поддержка 24/7', 'Служба технической поддержки работает круглосуточно без выходных.'],
      ];
      foreach ($features as $f): ?>
        <div class="card feature-card">
          <div class="card-content">
            <div class="feature-icon"><?php echo $f[0]; ?></div>
            <h3><?php echo esc_html($f[1]); ?></h3>
            <p><?php echo esc_html($f[2]); ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
