# HWS Store & Service — Claude Code Context

## Проект
WordPress + WooCommerce магазин банного оборудования. Фронтенд главной страницы — `/front/`.

## Дизайн-система
**Источник истины:** `front/assets/ohio-tokens.json`

Перед любой работой с UI читай этот файл. Все цвета, шрифты, отступы, кнопки — только из него. Ничего не угадывать.

```
front/assets/ohio-tokens.json
```

Ключевые токены:

| Токен | Значение |
|-------|---------|
| `color.accent` | `#8B7D5C` — основной цвет кнопок filled |
| `color.hero_bg` | `#0D0D0B` — тёмный фон Hero и CTA |
| `color.surface` | `#F4F1E9` — светлый фон секций |
| `color.card_bg` | `#EEEADEF0` — фон WooCommerce карточек |
| `color.trust_sep` | `#6F6F6FC7` — разделители trust-bar |
| `font.serif` | `'Castoro', Georgia, serif` — H1–H3 |
| `font.sans` | `'DM Sans', system-ui, sans-serif` — UI, кнопки, body |
| `typography.h1_size` | `clamp(44px, 4.5vw, 72px)` |
| `typography.h1_ls` | `-0.045em` |
| `spacing.container` | `1344px` |
| `spacing.header_h` | `12vh` |
| `button.height_lg` | `3.25rem` |
| `button.radius` | `0.5rem` |
| `button.font_weight` | `600` |
| `motion.easing` | `cubic-bezier(0.645, 0.045, 0.355, 1)` |
| `motion.duration` | `0.35s` |

## Структура репозитория

```
front/
  index.html          # Главная страница — первый экран (Hero)
  assets/
    ohio-tokens.json  # Дизайн-токены Ohio 3.7 + HWS overrides
```

## Сервер

| Параметр | Значение |
|----------|---------|
| SSH | `ssh -i ~/.ssh/claude_vps root@69.62.121.157` |
| WP контейнер | `wpsandbox-wordpress-1` |
| Dev URL | `https://wpsandbox.spaces.community/front/` |
| WP-CLI | `docker exec wpsandbox-wordpress-1 wp --allow-root` |

## Деплой фронтенда

```bash
# Скопировать файл на сервер и в контейнер
scp front/index.html root@69.62.121.157:/tmp/hws_index.html
ssh root@69.62.121.157 "docker cp /tmp/hws_index.html wpsandbox-wordpress-1:/var/www/html/front/index.html"
```

## Правила разработки

1. Токены из `ohio-tokens.json` — единственный источник значений для CSS
2. Шрифты H1–H3: `font.serif` (Castoro). UI/кнопки/body: `font.sans` (DM Sans)
3. Контейнер: `max-width: 1344px`, горизонтальные отступы через `clamp()`
4. Кнопки: `height: 3.25rem`, `border-radius: 0.5rem`, `font-weight: 600`
5. Анимации: `transition: 0.35s cubic-bezier(0.645, 0.045, 0.355, 1)`
6. Trust-bar: иконки без обводок, текст в одну строку
7. Не трогать `/shop/`, `/cart/`, `/checkout/` — WooCommerce логика

## WooCommerce API (для динамических секций)

```
Base URL: https://wpsandbox.spaces.community/wp-json/wc/v3/
Products: GET /products?per_page=6&featured=true
```

## Ссылки

- Design ref full page: WP media ID 248794
- Design ref Hero: WP media ID 248795
- Hero background: WP media ID 248793
- Outline doc 42 (контент и структура): https://outline.spaces.community/doc/42-homepage-content-structure-KyA1NxvU30
- A2A Task: https://outline.spaces.community/doc/a2a-20260601-001-homepage-implementation-hws-cX6TR4jTKn
