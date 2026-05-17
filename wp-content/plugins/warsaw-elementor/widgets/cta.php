<?php
defined('ABSPATH') || exit;

class Warsaw_Widget_CTA extends \Elementor\Widget_Base {

    public function get_name()       { return 'warsaw-cta'; }
    public function get_title()      { return 'Warsaw CTA'; }
    public function get_icon()       { return 'eicon-call-to-action'; }
    public function get_categories() { return ['warsaw-rentals']; }

    protected function register_controls() {

        $this->start_controls_section('section_content', [
            'label' => '🟣 CTA контент',
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);
        $this->add_control('title', [
            'label'   => 'Заголовок',
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Готов к переезду в Варшаву?',
        ]);
        $this->add_control('desc', [
            'label'   => 'Описание',
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'rows'    => 3,
            'default' => 'Оставь заявку и мы подберём квартиру под твой бюджет и район в течение 24 часов.',
        ]);
        $this->add_control('btn1_text', [
            'label'   => 'Кнопка 1 — текст',
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Оставить заявку',
        ]);
        $this->add_control('btn1_url', [
            'label'   => 'Кнопка 1 — ссылка',
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'mailto:info@warsawrent.pl',
        ]);
        $this->add_control('btn2_text', [
            'label'   => 'Кнопка 2 — текст',
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Позвонить нам',
        ]);
        $this->add_control('btn2_url', [
            'label'   => 'Кнопка 2 — ссылка',
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'tel:+48222345678',
        ]);
        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="cta-block section" id="contact">
          <div class="container">
            <div class="section-header">
              <h2 class="section-title"><?php echo esc_html($s['title']); ?></h2>
              <p class="section-desc"><?php echo esc_html($s['desc']); ?></p>
            </div>
            <div class="cta-actions">
              <a href="<?php echo esc_url($s['btn1_url']); ?>" class="btn btn-white btn-lg"><?php echo esc_html($s['btn1_text']); ?></a>
              <a href="<?php echo esc_url($s['btn2_url']); ?>" class="btn btn-ghost-white btn-lg"><?php echo esc_html($s['btn2_text']); ?></a>
            </div>
          </div>
        </section>
        <?php
    }
}
