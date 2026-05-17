<?php
defined('ABSPATH') || exit;

class Warsaw_Widget_Hero extends \Elementor\Widget_Base {
    public function get_name()       { return 'warsaw-hero'; }
    public function get_title()      { return 'Warsaw Hero'; }
    public function get_icon()       { return 'eicon-banner'; }
    public function get_categories() { return ['warsaw-rentals']; }
    public function get_script_depends() { return []; }

    protected function register_controls() {
        $this->start_controls_section('section_text', [
            'label' => '🔵 Текст',
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);
        $this->add_control('badge',       ['label'=>'Бейдж',        'type'=>\Elementor\Controls_Manager::TEXT,     'default'=>'📍 Варшава · Аренда квартир']);
        $this->add_control('title',       ['label'=>'Заголовок',    'type'=>\Elementor\Controls_Manager::TEXT,     'default'=>'Найди идеальную квартиру в Варшаве']);
        $this->add_control('title_accent',['label'=>'Акцент (синий)','type'=>\Elementor\Controls_Manager::TEXT,   'default'=>'в Варшаве']);
        $this->add_control('subtitle',    ['label'=>'Подзаголовок', 'type'=>\Elementor\Controls_Manager::TEXTAREA,'default'=>'Проверенные квартиры в центре Варшавы. Без скрытых платежей, без агентских сборов. Въезд с первого дня.','rows'=>3]);
        $this->add_control('cta_text',    ['label'=>'Кнопка 1',     'type'=>\Elementor\Controls_Manager::TEXT,    'default'=>'Смотреть квартиры']);
        $this->add_control('cta_url',     ['label'=>'Ссылка 1',     'type'=>\Elementor\Controls_Manager::TEXT,    'default'=>'#apartments']);
        $this->add_control('cta2_text',   ['label'=>'Кнопка 2',     'type'=>\Elementor\Controls_Manager::TEXT,    'default'=>'Узнать цены']);
        $this->add_control('cta2_url',    ['label'=>'Ссылка 2',     'type'=>\Elementor\Controls_Manager::TEXT,    'default'=>'#contact']);
        $this->end_controls_section();

        $this->start_controls_section('section_stats', [
            'label' => '📊 Статистика',
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);
        foreach ([1,2,3] as $n) {
            $d = [1=>['200+','квартир'],2=>['5 лет','на рынке'],3=>['98%','довольных жильцов']];
            $this->add_control('stat'.$n.'_n', ['label'=>'Цифра '.$n,   'type'=>\Elementor\Controls_Manager::TEXT,'default'=>$d[$n][0]]);
            $this->add_control('stat'.$n.'_l', ['label'=>'Подпись '.$n, 'type'=>\Elementor\Controls_Manager::TEXT,'default'=>$d[$n][1]]);
            if ($n<3) $this->add_control('div'.$n, ['type'=>\Elementor\Controls_Manager::DIVIDER]);
        }
        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        $title = esc_html($s['title']);
        $accent = esc_html($s['title_accent']);
        if ($accent && strpos($title, $accent) !== false) {
            $title = str_replace($accent, '<span>' . $accent . '</span>', $title);
        }
        ?>
        <section class="hero-block">
          <div class="container">
            <div class="hero-content">
              <div class="hero-badge"><span class="badge badge-primary"><?php echo esc_html($s['badge']); ?></span></div>
              <h1 class="hero-title"><?php echo wp_kses($title, ['span'=>[]]); ?></h1>
              <p class="hero-subtitle"><?php echo esc_html($s['subtitle']); ?></p>
              <div class="hero-actions">
                <a href="<?php echo esc_url($s['cta_url']); ?>" class="btn btn-white btn-lg"><?php echo esc_html($s['cta_text']); ?></a>
                <a href="<?php echo esc_url($s['cta2_url']); ?>" class="btn btn-ghost-white btn-lg"><?php echo esc_html($s['cta2_text']); ?></a>
              </div>
              <div class="hero-stats">
                <?php foreach ([1,2,3] as $n): ?>
                  <div>
                    <div class="stat-number"><?php echo esc_html($s['stat'.$n.'_n']); ?></div>
                    <div class="stat-label"><?php echo esc_html($s['stat'.$n.'_l']); ?></div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </section>
        <?php
    }

    // Live preview в редакторе — тот же PHP через AJAX
    protected function content_template() {}
}
