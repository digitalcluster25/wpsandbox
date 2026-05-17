<?php
defined('ABSPATH') || exit;

class Warsaw_Widget_Features extends \Elementor\Widget_Base {

    public function get_name()       { return 'warsaw-features'; }
    public function get_title()      { return 'Warsaw Features'; }
    public function get_icon()       { return 'eicon-icon-box'; }
    public function get_categories() { return ['warsaw-rentals']; }

    protected function register_controls() {

        $this->start_controls_section('section_header', [
            'label' => '🟢 Заголовок секции',
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);
        $this->add_control('eyebrow', [
            'label'   => 'Надпись над заголовком',
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Почему мы',
        ]);
        $this->add_control('title', [
            'label'   => 'Заголовок',
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Аренда без стресса',
        ]);
        $this->add_control('desc', [
            'label'   => 'Описание',
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'rows'    => 2,
            'default' => 'Мы берём на себя всё — от поиска до заключения договора. Ты просто въезжаешь.',
        ]);
        $this->end_controls_section();

        // Карточки 1-4
        $defaults = [
            1 => ['📍', 'Центр Варшавы',  'Все квартиры в радиусе 3 км от Рыночной площади. Метро в шаговой доступности.'],
            2 => ['💳', 'Честная цена',   'Никаких агентских сборов и скрытых платежей. Цена на сайте — финальная.'],
            3 => ['⚡', 'Быстрый въезд', 'Подписание договора и получение ключей за 24 часа после одобрения заявки.'],
            4 => ['🔧', 'Поддержка 24/7','Служба технической поддержки работает круглосуточно без выходных.'],
        ];
        foreach ($defaults as $n => $d) {
            $this->start_controls_section('section_card_'.$n, [
                'label' => '📋 Карточка '.$n,
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]);
            $this->add_control('card'.$n.'_icon', [
                'label'   => 'Иконка (эмодзи)',
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => $d[0],
            ]);
            $this->add_control('card'.$n.'_title', [
                'label'   => 'Заголовок',
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => $d[1],
            ]);
            $this->add_control('card'.$n.'_desc', [
                'label'   => 'Описание',
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 3,
                'default' => $d[2],
            ]);
            $this->end_controls_section();
        }
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="features-block section" id="features">
          <div class="container">
            <div class="section-header">
              <p class="section-eyebrow"><?php echo esc_html($s['eyebrow']); ?></p>
              <h2 class="section-title"><?php echo esc_html($s['title']); ?></h2>
              <p class="section-desc"><?php echo esc_html($s['desc']); ?></p>
            </div>
            <div class="grid-4">
              <?php for ($n = 1; $n <= 4; $n++): ?>
                <div class="card feature-card">
                  <div class="card-content">
                    <div class="feature-icon"><?php echo esc_html($s['card'.$n.'_icon']); ?></div>
                    <h3><?php echo esc_html($s['card'.$n.'_title']); ?></h3>
                    <p><?php echo esc_html($s['card'.$n.'_desc']); ?></p>
                  </div>
                </div>
              <?php endfor; ?>
            </div>
          </div>
        </section>
        <?php
    }
}
