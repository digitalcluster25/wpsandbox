<?php
defined('ABSPATH') || exit;

class Warsaw_Atom_Stats extends \Elementor\Widget_Base {
    public function get_name()       { return 'warsaw-stats'; }
    public function get_title()      { return 'Stats'; }
    public function get_icon()       { return 'eicon-counter'; }
    public function get_categories() { return ['warsaw-atoms']; }

    protected function register_controls() {
        $this->start_controls_section('content', ['label' => 'Статистика', 'tab' => \Elementor\Controls_Manager::TAB_CONTENT]);

        $this->add_control('show_divider', [
            'label'        => 'Линия сверху',
            'type'         => \Elementor\Controls_Manager::SWITCHER,
            'label_on'     => 'Да',
            'label_off'    => 'Нет',
            'return_value' => 'yes',
            'default'      => 'yes',
        ]);

        // 3 стата
        $defaults = [1=>['200+','квартир'],2=>['5 лет','на рынке'],3=>['98%','довольных жильцов']];
        foreach ([1,2,3] as $n) {
            $this->add_control('sep'.$n, ['type'=>\Elementor\Controls_Manager::DIVIDER]);
            $this->add_control('stat'.$n.'_number', [
                'label'   => 'Цифра '.$n,
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => $defaults[$n][0],
            ]);
            $this->add_control('stat'.$n.'_label', [
                'label'   => 'Подпись '.$n,
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => $defaults[$n][1],
            ]);
        }
        $this->end_controls_section();

        $this->start_controls_section('style_section', ['label' => 'Стиль', 'tab' => \Elementor\Controls_Manager::TAB_STYLE]);
        $this->add_control('number_color', [
            'label'     => 'Цвет цифр',
            'type'      => \Elementor\Controls_Manager::COLOR,
            'default'   => '#ffffff',
            'selectors' => ['{{WRAPPER}} .stat-number' => 'color: {{VALUE}}'],
        ]);
        $this->add_control('label_color', [
            'label'     => 'Цвет подписей',
            'type'      => \Elementor\Controls_Manager::COLOR,
            'default'   => '#64748b',
            'selectors' => ['{{WRAPPER}} .stat-label' => 'color: {{VALUE}}'],
        ]);
        $this->add_control('divider_color', [
            'label'     => 'Цвет линии',
            'type'      => \Elementor\Controls_Manager::COLOR,
            'default'   => 'rgba(255,255,255,0.1)',
            'selectors' => ['{{WRAPPER}} .warsaw-stats' => 'border-top-color: {{VALUE}}'],
        ]);
        $this->add_responsive_control('gap', [
            'label'     => 'Расстояние между',
            'type'      => \Elementor\Controls_Manager::SLIDER,
            'range'     => ['px' => ['min'=>8,'max'=>100]],
            'default'   => ['size'=>48,'unit'=>'px'],
            'selectors' => ['{{WRAPPER}} .warsaw-stats' => 'gap: {{SIZE}}px'],
        ]);
        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        $border = $s['show_divider'] === 'yes'
            ? 'border-top:1px solid rgba(255,255,255,0.1);padding-top:28px;margin-top:0;'
            : '';
        ?>
        <div class="warsaw-stats" style="display:flex;<?php echo $border; ?>">
            <?php foreach ([1,2,3] as $n): ?>
                <div>
                    <div class="stat-number"><?php echo esc_html($s['stat'.$n.'_number']); ?></div>
                    <div class="stat-label"><?php echo esc_html($s['stat'.$n.'_label']); ?></div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
    }
}
