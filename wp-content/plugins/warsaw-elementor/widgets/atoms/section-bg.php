<?php
defined('ABSPATH') || exit;

class Warsaw_Atom_Section_BG extends \Elementor\Widget_Base {
    public function get_name()       { return 'warsaw-section-bg'; }
    public function get_title()      { return 'Section Background'; }
    public function get_icon()       { return 'eicon-section'; }
    public function get_categories() { return ['warsaw-atoms']; }

    protected function register_controls() {
        $this->start_controls_section('content', ['label' => 'Фон секции', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);

        $this->add_control('bg_type', [
            'label'   => 'Тип фона',
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'dark-gradient' => 'Тёмный градиент (Hero)',
                'blue'          => 'Синий (CTA)',
                'white'         => 'Белый (Features)',
                'light'         => 'Светло-серый (Apartments)',
                'custom'        => 'Кастомный цвет',
            ],
            'default' => 'dark-gradient',
        ]);
        $this->add_control('custom_bg_color', [
            'label'     => 'Цвет (только для Кастомного)',
            'type'      => \Elementor\Controls_Manager::COLOR,
            'condition' => ['bg_type' => 'custom'],
        ]);
        $this->add_control('show_pattern', [
            'label'        => 'Точечный паттерн',
            'type'         => \Elementor\Controls_Manager::SWITCHER,
            'label_on'     => 'Да',
            'label_off'    => 'Нет',
            'return_value' => 'yes',
            'default'      => 'yes',
            'condition'    => ['bg_type' => 'dark-gradient'],
        ]);
        $this->end_controls_section();

        $this->start_controls_section('layout', ['label' => 'Отступы', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);
        $this->add_responsive_control('padding_top', [
            'label'     => 'Padding сверху',
            'type'      => \Elementor\Controls_Manager::SLIDER,
            'range'     => ['px' => ['min'=>0,'max'=>200]],
            'default'   => ['size'=>96,'unit'=>'px'],
            'selectors' => ['{{WRAPPER}} .warsaw-section-inner' => 'padding-top: {{SIZE}}px'],
        ]);
        $this->add_responsive_control('padding_bottom', [
            'label'     => 'Padding снизу',
            'type'      => \Elementor\Controls_Manager::SLIDER,
            'range'     => ['px' => ['min'=>0,'max'=>200]],
            'default'   => ['size'=>80,'unit'=>'px'],
            'selectors' => ['{{WRAPPER}} .warsaw-section-inner' => 'padding-bottom: {{SIZE}}px'],
        ]);
        $this->add_control('max_width', [
            'label'     => 'Макс. ширина контента',
            'type'      => \Elementor\Controls_Manager::SLIDER,
            'range'     => ['px' => ['min'=>600,'max'=>1800]],
            'default'   => ['size'=>1200,'unit'=>'px'],
            'selectors' => ['{{WRAPPER}} .warsaw-section-container' => 'max-width: {{SIZE}}px'],
        ]);
        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();

        $backgrounds = [
            'dark-gradient' => 'background:linear-gradient(135deg,#0f172a 0%,#1e3a5f 50%,#1d4ed8 100%);',
            'blue'          => 'background:#1d4ed8;',
            'white'         => 'background:#ffffff;',
            'light'         => 'background:#f1f5f9;',
            'custom'        => 'background:' . esc_attr($s['custom_bg_color']) . ';',
        ];
        $bg = $backgrounds[$s['bg_type']] ?? $backgrounds['dark-gradient'];
        $pattern = ($s['bg_type'] === 'dark-gradient' && $s['show_pattern'] === 'yes')
            ? 'position:relative;overflow:hidden;'
            : '';
        ?>
        <div class="warsaw-section-bg" style="<?php echo $bg . $pattern; ?>">
            <?php if ($s['bg_type'] === 'dark-gradient' && $s['show_pattern'] === 'yes'): ?>
            <div style="position:absolute;inset:0;background-image:url(\"data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E\");pointer-events:none;"></div>
            <?php endif; ?>
            <div class="warsaw-section-inner" style="position:relative;padding-inline:24px;">
                <div class="warsaw-section-container" style="margin-inline:auto;">
                    <?php echo '<p style="color:rgba(255,255,255,0.3);text-align:center;padding:20px;font-size:13px;font-family:sans-serif;">[ Перетащи виджеты Warsaw сюда ]</p>'; ?>
                </div>
            </div>
        </div>
        <?php
    }
}
