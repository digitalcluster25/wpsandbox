<?php
defined('ABSPATH') || exit;

class Warsaw_Atom_Badge extends \Elementor\Widget_Base {
    public function get_name()       { return 'warsaw-badge'; }
    public function get_title()      { return 'Badge'; }
    public function get_icon()       { return 'eicon-price-table'; }
    public function get_categories() { return ['warsaw-atoms']; }

    protected function register_controls() {
        $this->start_controls_section('content', ['label' => 'Badge', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);

        $this->add_control('text', [
            'label'   => 'Текст',
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => '📍 Варшава · Аренда квартир',
        ]);
        $this->add_control('style', [
            'label'   => 'Стиль',
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'primary'   => 'Primary (синий)',
                'secondary' => 'Secondary (серый)',
                'outline'   => 'Outline',
            ],
            'default' => 'primary',
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
        $this->add_control('bg_color', [
            'label'   => 'Цвет фона',
            'type'    => \Elementor\Controls_Manager::COLOR,
            'default' => '#2563eb',
            'selectors' => ['{{WRAPPER}} .warsaw-badge' => 'background-color: {{VALUE}}'],
        ]);
        $this->add_control('text_color', [
            'label'   => 'Цвет текста',
            'type'    => \Elementor\Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => ['{{WRAPPER}} .warsaw-badge' => 'color: {{VALUE}}'],
        ]);
        $this->add_responsive_control('spacing', [
            'label'   => 'Отступ снизу',
            'type'    => \Elementor\Controls_Manager::SLIDER,
            'range'   => ['px' => ['min'=>0,'max'=>80]],
            'default' => ['size'=>20,'unit'=>'px'],
            'selectors' => ['{{WRAPPER}}' => 'margin-bottom: {{SIZE}}px'],
        ]);
        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        $align_style = 'text-align:' . esc_attr($s['align']) . ';';
        $class = 'badge badge-' . esc_attr($s['style']);
        ?>
        <div style="<?php echo $align_style; ?>">
            <span class="<?php echo $class; ?>"><?php echo esc_html($s['text']); ?></span>
        </div>
        <?php
    }
}
