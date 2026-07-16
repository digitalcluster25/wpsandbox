<?php
$id = wc_get_product_id_by_sku('1006355');
$product = wc_get_product($id);

$description = <<<'HTML'
<p>Анапа - банная печь предназначенная для использования в небольшой семейной бане с объемом парной не более 16 м3. Закрытая каменка и встроенный парогенератор гарантирует большое количество легкого пара, а огонь, пылающий за панорамным стеклом подарит атмосферу тепла и уюта в вашей бане. Кожух из природного камня, создаст приятную атмосферу в парной, излучая мягкое тепло.</p>
HTML;

$short = <<<'HTML'
<ul class="hws-product-highlights">
  <li><strong>Объем парной:</strong> до 16 м3</li>
  <li><strong>Дымоход:</strong> 120 мм</li>
  <li><strong>Каменка:</strong> внутренняя закрытая</li>
  <li><strong>Артикул:</strong> 1006355</li>
</ul>
HTML;

$product->set_description($description);
$product->set_short_description($short);
$product->save();

echo "updated description for product {$id}\n";
