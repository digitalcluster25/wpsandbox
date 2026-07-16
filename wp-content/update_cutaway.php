<?php
require('/var/www/html/wp-load.php');

// Import cutaway image
$image_path = '/var/www/html/wp-content/uploads/2026/05/category-interactive_scheme.png';
$filetype = wp_check_filetype(basename($image_path));
$attachment = [
    'post_mime_type' => $filetype['type'],
    'post_title'     => 'Анапа печь в разрезе',
    'post_content'   => '',
    'post_status'    => 'inherit'
];
$attach_id = wp_insert_attachment($attachment, $image_path);
require_once(ABSPATH . 'wp-admin/includes/image.php');
$attach_data = wp_generate_attachment_metadata($attach_id, $image_path);
wp_update_attachment_metadata($attach_id, $attach_data);
$img_url = wp_get_attachment_url($attach_id);
echo "Image ID: $attach_id URL: $img_url\n";

// Find product
$product_id = wc_get_product_id_by_sku('1000026');
echo "Product ID: $product_id\n";

// Update cutaway field with image
$cutaway = '<img src="' . $img_url . '" alt="Печь Анапа в разрезе" style="max-width:100%;height:auto;margin-bottom:20px;" />

<h3>Элементы конструкции печи Анапа</h3>
<ol>
<li>Труба выхода пара</li>
<li>Парогенератор</li>
<li>Дожиг дымовых газов</li>
<li>Защитные экраны</li>
<li>Гнуто сварная конструкция печи</li>
<li>Зольный ящик</li>
<li>Устройство и схема подачи воздуха в зону горения</li>
<li>Каминное стекло 420х400 мм</li>
<li>Закрытая каменка</li>
<li>Центральный дымоходный лабиринт</li>
<li>Терморегулирующая задвижка</li>
<li>Выход дымовых газов</li>
<li>Устройство дозирования (подача воды)</li>
</ol>';

update_field('cutaway', $cutaway, $product_id);
echo "Done!\n";
