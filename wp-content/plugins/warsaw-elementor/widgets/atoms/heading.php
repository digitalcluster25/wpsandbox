<?php
defined('ABSPATH') || exit;

class Warsaw_Atom_Heading extends \Elementor\Widget_Base {
    public function get_name()       { return 'warsaw-heading'; }
    public function get_title()      { return 'Heading'; }
    public function get_icon()       { return 'eicon-heading'; }
    public function get_categories() { return ['warsaw-atoms']; }

    protected function register_controls() {
        $this->start_controls_section('content', ['label' => 'Заголовок', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);

        $this->add_control('title', [
            'label'   => 'Текст',
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Найди идеальную квартиру в Варшаве',
            'rows'    => 2,
        ]);
        $this->add_control('accent', [
            'label'       => 'Акцентное слово',
            'description' => 'Это слово выделится другим цветом',
            'type'        => \Elementor\Controls_Manager::TEXT,
            'default'     => 'в Варшаве',
        ]);
        $this->add_control('tag', [
            'label'   => 'HTML тег',
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => ['h1'=>'H1','h2'=>'H2','h3'=>'H3','h4'=>'H4','p'=>'P'],
            'default' => 'h1',
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
            'label'     => 'Цвет текста',
            'type'      => \Elementor\Controls_Manager::COLOR,
            'default'   => '#ffffff',
            'selectors' => ['{{WRAPPER}} .warsaw-heading' => 'color: {{VALUE}}'],
        ]);
        $this->add_control('accent_color', [
            'label'     => 'Цвет акцента',
            'type'      => \Elementor\Controls_Manager::COLOR,
            'default'   => '#60a5fa',
            'selectors' => ['{{WRAPPER}} .warsaw-heading span' => 'color: {{VALUE}}'],
        ]);
        $this->add_responsive_control('font_size', [
            'label'   => 'Размер шрифта',
            'type'    => \Elementor\Controls_Manager::SLIDER,
            'range'   => ['px' => ['min'=>16,'max'=>100]],
            'default' => ['size'=>60,'unit'=>'px'],
            'selectors' => ['{{WRAPPER}} .warsaw-heading' => 'font-size: {{SIZE}}px'],
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
        $s     = $this->get_settings_for_display();
        $tag   = in_array($s['tag'], ['h1','h2','h3','h4','p']) ? $s['tag'] : 'h1';
        $align = esc_attr($s['align']);
        $title = esc_html($s['title']);
        $accent = esc_html($s['accent']);

        if ($accent && strpos($title, $accent) !== false) {
            $title = str_replace($accent, '<span>' . $accent . '</span>', $title);
        }
        printf(
            '<%1$s class="warsaw-heading" style="text-align:%2$s">%3$s</%1$s>',
            $tag, $align, wp_kses($title, ['span'=>[]])
        );
    }
}
