<section class="apartments-block section" id="apartments">
  <div class="container">
    <div class="section-header">
      <p class="section-eyebrow">Наши предложения</p>
      <h2 class="section-title">Популярные квартиры</h2>
      <p class="section-desc">Выбери из более чем 200 проверенных квартир во всех районах Варшавы.</p>
    </div>
    <div class="grid-3">
      <?php $apts = [
        ['🏙️', 'Студия на Śródmieście', 'ул. Marszałkowska 12', '3 200 zł/мес', '1', '32 m²', '4 эт.', 'Центр города, рядом метро'],
        ['🌳', '2-комн. на Mokotów',    'ул. Puławska 48',      '4 500 zł/мес', '2', '55 m²', '2 эт.', 'Тихий район, парк рядом'],
        ['🏛️', '3-комн. на Żoliborz',  'ул. Mickiewicza 7',    '6 200 zł/мес', '3', '78 m²', '3 эт.', 'Исторический центр'],
      ];
      foreach ($apts as $apt): ?>
        <div class="card apartment-card">
          <div class="apt-image">
            <div class="apt-img-placeholder"><?php echo $apt[0]; ?></div>
            <span class="apt-price"><?php echo esc_html($apt[3]); ?></span>
          </div>
          <div class="card-content">
            <h3 class="apt-title"><?php echo esc_html($apt[1]); ?></h3>
            <p class="apt-location">📍 <?php echo esc_html($apt[2]); ?></p>
            <div class="apt-meta">
              <span>🛏 <?php echo $apt[4]; ?> комн.</span>
              <span>📐 <?php echo esc_html($apt[5]); ?></span>
              <span>🏢 <?php echo esc_html($apt[6]); ?></span>
            </div>
            <p style="font-size:.85rem;color:hsl(var(--muted-foreground))"><?php echo esc_html($apt[7]); ?></p>
          </div>
          <div class="card-footer">
            <a href="#contact" class="btn btn-primary" style="width:100%;justify-content:center">Узнать подробнее</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
