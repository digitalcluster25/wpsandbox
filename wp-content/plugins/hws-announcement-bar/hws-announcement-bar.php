<?php
/**
 * Plugin Name: HWS Announcement Bar
 * Description: Rotating announcement bar for HWS Store
 * Version: 1.0
 */

if (!defined('ABSPATH')) exit;

add_action('wp_head', function() {
?>
<style>
.hws-announcement-bar {
    background: #1C2E1C;
    color: #F5F0E8;
    font-size: 12px;
    font-weight: 400;
    letter-spacing: 0.03em;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    z-index: 9999;
    overflow: hidden;
}
.hws-announcement-bar .hws-msg {
    position: absolute;
    opacity: 0;
    transition: opacity 0.6s ease;
    white-space: nowrap;
}
.hws-announcement-bar .hws-msg.active {
    opacity: 1;
}
.hws-announcement-bar a {
    color: #C4783A;
    text-decoration: none;
}
.hws-announcement-bar a:hover {
    text-decoration: underline;
}
@media (max-width: 768px) {
    .hws-announcement-bar .hws-msg.hws-desktop-only {
        display: none !important;
        opacity: 0 !important;
    }
    .hws-announcement-bar .hws-msg.hws-mobile-show {
        opacity: 1 !important;
        display: block !important;
    }
}
</style>
<?php
});

add_action('wp_body_open', function() {
?>
<div class="hws-announcement-bar">
    <span class="hws-msg active hws-desktop-only" data-index="0">Игорь Костин консультирует лично · 17 лет банного строительства</span>
    <span class="hws-msg hws-desktop-only" data-index="1">Монтаж нашей командой в Ташкенте и Баку · Юрлицо в UZ и AZ</span>
    <span class="hws-msg hws-mobile-show" data-index="2">Бесплатный расчёт мощности <a href="#calculator">→ Рассчитать</a></span>
</div>
<script>
(function(){
    if(window.innerWidth < 769) return;
    var msgs = document.querySelectorAll('.hws-announcement-bar .hws-msg.hws-desktop-only');
    var all = document.querySelectorAll('.hws-announcement-bar .hws-msg');
    var current = 0;
    setInterval(function(){
        all.forEach(function(m){m.classList.remove('active')});
        current = (current + 1) % 3;
        var next = document.querySelector('.hws-msg[data-index="'+current+'"]');
        if(next) next.classList.add('active');
    }, 4000);
})();
</script>
<?php
});
