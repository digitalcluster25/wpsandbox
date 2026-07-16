<?php
require('/var/www/html/wp-load.php');

$page_id = 232309;

// ============================================
// БЛОК 1: Announcement Bar через Ohio Subheader
// ============================================
update_post_meta($page_id, 'page_subheader_visibility', 'yes');
update_post_meta($page_id, 'page_subheader_style', 'dark');
update_post_meta($page_id, 'page_subheader_background_type', 'color');

echo "Subheader enabled\n";

// ============================================
// БЛОК 2: Hero Section — правим Elementor data
// ============================================
$data_raw = get_post_meta($page_id, '_elementor_data', true);
$data = json_decode($data_raw, true);

if (!$data) {
    echo "ERROR: no elementor data\n";
    exit;
}

// Recursive find & replace by element ID
function update_element(&$elements, $id, $callback) {
    foreach ($elements as &$el) {
        if (isset($el['id']) && strpos($el['id'], $id) === 0) {
            $callback($el);
            return true;
        }
        if (!empty($el['elements'])) {
            if (update_element($el['elements'], $id, $callback)) return true;
        }
    }
    return false;
}

// 2.1 H1: "Sweet home collection." → "Баня или хаммам —<br> под ключ."
update_element($data, '71dded8', function(&$el) {
    $el['settings']['title'] = 'Баня или хаммам —<br class="vc_hidden-xs vc_hidden-sm"> под ключ.';
    echo "H1 updated\n";
});

// 2.2 Subtext
update_element($data, 'f51b05a', function(&$el) {
    $el['settings']['editor'] = '<p>Дровяные, электрические и паротермальные печи EasySteam, Sangens, ВВД. Поставка от производителя — монтаж командой HWS.</p>';
    echo "Description updated\n";
});

// 2.3 Button: "Go shopping" → "Подобрать печь бесплатно →"
update_element($data, '559d538', function(&$el) {
    $el['settings']['title'] = 'Подобрать печь бесплатно →';
    if (isset($el['settings']['link'])) {
        $el['settings']['link']['url'] = '#calculator';
    }
    echo "CTA button updated\n";
});

// 2.4 Trust icons
update_element($data, '922b4ae', function(&$el) {
    $el['settings']['title'] = 'Лёгкий пар с первой топки';
    if (isset($el['settings']['subtitle_text'])) {
        $el['settings']['subtitle_text'] = 'EasySteam, Sangens, ВВД';
    }
    echo "Trust 1 updated\n";
});

update_element($data, '8decb48', function(&$el) {
    $el['settings']['title'] = 'Монтаж нашей командой';
    if (isset($el['settings']['subtitle_text'])) {
        $el['settings']['subtitle_text'] = 'Работаем в UZ и AZ';
    }
    echo "Trust 2 updated\n";
});

update_element($data, 'af0e1b0', function(&$el) {
    $el['settings']['title'] = 'Гарантия производителя';
    if (isset($el['settings']['subtitle_text'])) {
        $el['settings']['subtitle_text'] = 'До 5 лет — Sangens';
    }
    echo "Trust 3 updated\n";
});

// Save
$json = wp_json_encode($data);
update_post_meta($page_id, '_elementor_data', wp_slash($json));

// Clear Elementor cache
if (class_exists('\Elementor\Plugin')) {
    \Elementor\Plugin::instance()->files_manager->clear_cache();
    echo "Elementor cache cleared\n";
}

echo "URL: " . get_permalink($page_id) . "\n";
echo "Done!\n";
