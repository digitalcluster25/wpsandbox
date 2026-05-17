<?php
defined('ABSPATH') || exit;

class Warsaw_Atom_Subheading extends \Elementor\Widget_Base {
    public function get_name()       { return 'warsaw-subheading'; }
    public function get_title()      { return 'Subheading'; }
    public function get_icon()       { return 'eicon-text'; }
    public function get_categories() { return ['warsaw-atoms']; }

    protected function register_controls() {
        $this->start_controls_section('content', ['label' => 'Текст', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);
        $this->add_control('text', [
            'label'   => 'Текст',
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Проверенные квартиры в центре Варшавы. Без скрытых платежей, без агентских сборов. Въезд с первого дня.',
            'rows'    => 3,
        ]);
        $this->add_control('max_width', [
            'label'   => 'Макс. ширина (px)',
            'type'    => \Elementor\Controls_Manager::SLIDER,
            'range'   => ['px' => ['min'=>200,'max'=>900]],
            'default' => ['size'=>480,'unit'=>'px'],
            'selectors' => ['{{WRAPPER}} .warsaw-subheading' => 'max-width: {{SIZE}}px'],
        ]);
        $this->add_control('align', [
            'label'   => 'Выравнивание',
            'type'    => \Elementor\Controls_Manager::CHOOSE,
            'options' => [
                'left'   => ['title'=>'Слева',  'icon'=>'eicon-text-align-left'],
                'center' => ['title'=>'Центр',  'icon'=>'eicon-text-align-center'],
                'right'  => ['title'=>'Справа', 'icon'=>'eicon-text-align-right'],
            ],
            'default' => 'left',
        ]);
        $this->end_controls_section();

        $this->start_controls_section('style_section', ['label' => 'Стиль', 'tab' => \Elementor\Controls_Manager::TAB_STYLE]);
        $this->add_control('text_color', [
            'label'     => 'Цвет',
            'type'      => \Elementor\Controls_Manager::COLOR,
            'default'   => '#94a3b8',
            'selectors' => ['{{WRAPPER}} .warsaw-subheading' => 'color: {{VALUE}}'],
        ]);
        $this->add_responsive_control('font_size', [
            'label'     => 'Размер шрифта',
            'type'      => \Elementor\Controls_Manager::SLIDER,
            'range'     => ['px' => ['min'=>12,'max'=>36]],
            'default'   => ['size'=>18,'unit'=>'px'],
            'selectors' => ['{{WRAPPER}} .warsaw-subheading' => 'font-size: {{SIZE}}px'],
        ]);
        $this->add_responsive_control('spacing', [
            'label'     => 'Отступ снизу',
            'type'      => \Elementor\Controls_Manager::SLIDER,
            'range'     => ['px' => ['min'=>0,'max'=>80]],
            'default'   => ['size'=>28,'unit'=>'px'],
            'selectors' => ['{{WRAPPER}}' => 'margin-bottom: {{SIZE}}px'],
        ]);
        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        $align = esc_attr($s['align']);
        ?>
        <p class="warsaw-subheading" style="text-align:<?php echo $align; ?>;line-height:1.7;font-family:var(--font-sans);">
            <?php echo esc_html($s['text']); ?>
        </p>
        <?php
    }
}
