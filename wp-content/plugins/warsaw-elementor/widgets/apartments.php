<?php
defined('ABSPATH') || exit;

class Warsaw_Widget_Apartments extends \Elementor\Widget_Base {

    public function get_name()       { return 'warsaw-apartments'; }
    public function get_title()      { return 'Warsaw Apartments'; }
    public function get_icon()       { return 'eicon-home'; }
    public function get_categories() { return ['warsaw-rentals']; }

    protected function register_controls() {

        $this->start_controls_section('section_header', [
            'label' => '🟠 Заголовок секции',
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);
        $this->add_control('eyebrow', [
            'label'   => 'Надпись над заголовком',
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Наши предложения',
        ]);
        $this->add_control('title', [
            'label'   => 'Заголовок',
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Популярные квартиры',
        ]);
        $this->add_control('desc', [
            'label'   => 'Описание',
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'rows'    => 2,
            'default' => 'Выбери из более чем 200 проверенных квартир во всех районах Варшавы.',
        ]);
        $this->end_controls_section();

        $apts = [
            1 => ['🏙️', 'Студия на Śródmieście', 'ул. Marszałkowska 12', '3 200 zł/мес', '1', '32 m²', '4 эт.'],
            2 => ['🌳', '2-комн. на Mokotów',    'ул. Puławska 48',      '4 500 zł/мес', '2', '55 m²', '2 эт.'],
            3 => ['🏛️', '3-комн. на Żoliborz',  'ул. Mickiewicza 7',    '6 200 zł/мес', '3', '78 m²', '3 эт.'],
        ];
        foreach ($apts as $n => $d) {
            $this->start_controls_section('section_apt_'.$n, [
                'label' => '🏠 Квартира '.$n,
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]);
            $this->add_control('apt'.$n.'_emoji',    ['label'=>'Эмодзи',   'type'=>\Elementor\Controls_Manager::TEXT, 'default'=>$d[0]]);
            $this->add_control('apt'.$n.'_title',    ['label'=>'Название', 'type'=>\Elementor\Controls_Manager::TEXT, 'default'=>$d[1]]);
            $this->add_control('apt'.$n.'_location', ['label'=>'Адрес',    'type'=>\Elementor\Controls_Manager::TEXT, 'default'=>$d[2]]);
            $this->add_control('apt'.$n.'_price',    ['label'=>'Цена',     'type'=>\Elementor\Controls_Manager::TEXT, 'default'=>$d[3]]);
            $this->add_control('apt'.$n.'_rooms',    ['label'=>'Комнат',   'type'=>\Elementor\Controls_Manager::TEXT, 'default'=>$d[4]]);
            $this->add_control('apt'.$n.'_area',     ['label'=>'Площадь',  'type'=>\Elementor\Controls_Manager::TEXT, 'default'=>$d[5]]);
            $this->add_control('apt'.$n.'_floor',    ['label'=>'Этаж',     'type'=>\Elementor\Controls_Manager::TEXT, 'default'=>$d[6]]);
            $this->add_control('apt'.$n.'_btn',      ['label'=>'Кнопка',   'type'=>\Elementor\Controls_Manager::TEXT, 'default'=>'Узнать подробнее']);
            $this->end_controls_section();
        }
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="apartments-block section" id="apartments">
          <div class="container">
            <div class="section-header">
              <p class="section-eyebrow"><?php echo esc_html($s['eyebrow']); ?></p>
              <h2 class="section-title"><?php echo esc_html($s['title']); ?></h2>
              <p class="section-desc"><?php echo esc_html($s['desc']); ?></p>
            </div>
            <div class="grid-3">
              <?php for ($n = 1; $n <= 3; $n++): ?>
                <div class="card apartment-card">
                  <div class="apt-image">
                    <div class="apt-img-placeholder"><?php echo esc_html($s['apt'.$n.'_emoji']); ?></div>
                    <span class="apt-price"><?php echo esc_html($s['apt'.$n.'_price']); ?></span>
                  </div>
                  <div class="card-content">
                    <h3 class="apt-title"><?php echo esc_html($s['apt'.$n.'_title']); ?></h3>
                    <p class="apt-location">📍 <?php echo esc_html($s['apt'.$n.'_location']); ?></p>
                    <div class="apt-meta">
                      <span>🛏 <?php echo esc_html($s['apt'.$n.'_rooms']); ?> комн.</span>
                      <span>📐 <?php echo esc_html($s['apt'.$n.'_area']); ?></span>
                      <span>🏢 <?php echo esc_html($s['apt'.$n.'_floor']); ?></span>
                    </div>
                  </div>
                  <div class="card-footer">
                    <a href="#contact" class="btn btn-primary" style="width:100%;justify-content:center">
                      <?php echo esc_html($s['apt'.$n.'_btn']); ?>
                    </a>
                  </div>
                </div>
              <?php endfor; ?>
            </div>
          </div>
        </section>
        <?php
    }
}
