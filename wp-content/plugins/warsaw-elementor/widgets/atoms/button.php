<?php
defined('ABSPATH') || exit;

class Warsaw_Atom_Button extends \Elementor\Widget_Base {
    public function get_name()       { return 'warsaw-button'; }
    public function get_title()      { return 'Button'; }
    public function get_icon()       { return 'eicon-button'; }
    public function get_categories() { return ['warsaw-atoms']; }

    protected function register_controls() {
        $this->start_controls_section('content', ['label' => 'Кнопка', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);
        $this->add_control('text', [
            'label'   => 'Текст',
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Смотреть квартиры',
        ]);
        $this->add_control('url', [
            'label'   => 'Ссылка',
            'type'    => \Elementor\Controls_Manager::URL,
            'default' => ['url' => '#apartments'],
        ]);
        $this->add_control('variant', [
            'label'   => 'Вариант',
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'primary'    => 'Primary (синий)',
                'white'      => 'White (белый)',
                'outline'    => 'Outline (обводка)',
                'ghost-white'=> 'Ghost White (прозрачный белый)',
                'secondary'  => 'Secondary (серый)',
            ],
            'default' => 'primary',
        ]);
        $this->add_control('size', [
            'label'   => 'Размер',
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => ['sm'=>'Маленький','md'=>'Средний','lg'=>'Большой'],
            'default' => 'lg',
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
        $this->add_control('full_width', [
            'label'        => 'На всю ширину',
            'type'         => \Elementor\Controls_Manager::SWITCHER,
            'label_on'     => 'Да',
            'label_off'    => 'Нет',
            'return_value' => 'yes',
            'default'      => '',
        ]);
        $this->end_controls_section();

        $this->start_controls_section('style_section', ['label' => 'Кастом цвет', 'tab' => \Elementor\Controls_Manager::TAB_STYLE]);
        $this->add_control('custom_bg', [
            'label'     => 'Фон (перебить вариант)',
            'type'      => \Elementor\Controls_Manager::COLOR,
            'selectors' => ['{{WRAPPER}} .warsaw-btn' => 'background-color: {{VALUE}} !important'],
        ]);
        $this->add_control('custom_color', [
            'label'     => 'Текст (перебить вариант)',
            'type'      => \Elementor\Controls_Manager::COLOR,
            'selectors' => ['{{WRAPPER}} .warsaw-btn' => 'color: {{VALUE}} !important'],
        ]);
        $this->add_control('border_radius', [
            'label'     => 'Скругление',
            'type'      => \Elementor\Controls_Manager::SLIDER,
            'range'     => ['px' => ['min'=>0,'max'=>50]],
            'default'   => ['size'=>8,'unit'=>'px'],
            'selectors' => ['{{WRAPPER}} .warsaw-btn' => 'border-radius: {{SIZE}}px'],
        ]);
        $this->end_controls_section();
    }

    protected function render() {
        $s       = $this->get_settings_for_display();
        $url     = !empty($s['url']['url']) ? esc_url($s['url']['url']) : '#';
        $target  = !empty($s['url']['is_external']) ? ' target="_blank"' : '';
        $align   = esc_attr($s['align']);
        $full    = $s['full_width'] === 'yes' ? 'width:100%;' : '';
        $classes = 'btn btn-' . esc_attr($s['variant']) . ' btn-' . esc_attr($s['size']) . ' warsaw-btn';
        ?>
        <div style="text-align:<?php echo $align; ?>">
            <a href="<?php echo $url; ?>"<?php echo $target; ?> class="<?php echo $classes; ?>" style="<?php echo $full; ?>">
                <?php echo esc_html($s['text']); ?>
            </a>
        </div>
        <?php
    }
}
