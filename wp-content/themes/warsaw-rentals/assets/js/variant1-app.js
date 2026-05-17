// ============================================================
// VARIANT 1 — React App (no JSX, vanilla React.createElement)
// Fetches content from WP REST API + ACF fields
// ============================================================

(function() {
  'use strict';

  var React    = window.React;
  var ReactDOM = window.ReactDOM;
  var e        = React.createElement;

  // ---- Reusable components ----
  function Badge(props) {
    return e('span', { className: 'badge badge-primary' }, props.children);
  }

  function HeroBlock(props) {
    var h = props.data;
    return e('section', { className: 'hero-block' },
      e('div', { className: 'container' },
        e('div', { className: 'hero-content' },
          e('div', { className: 'hero-badge' }, e(Badge, null, '📍 ' + h.badge)),
          e('h1', { className: 'hero-title',
            dangerouslySetInnerHTML: { __html: h.title }
          }),
          e('p', { className: 'hero-subtitle' }, h.subtitle),
          e('div', { className: 'hero-actions' },
            e('a', { href: '#apartments', className: 'btn btn-white btn-lg' }, h.cta_text),
            e('a', { href: '#contact',    className: 'btn btn-ghost-white btn-lg' }, h.cta2_text)
          ),
          e('div', { className: 'hero-stats' },
            e('div', null, e('div', { className: 'stat-number' }, h.stat1_n), e('div', { className: 'stat-label' }, h.stat1_l)),
            e('div', null, e('div', { className: 'stat-number' }, h.stat2_n), e('div', { className: 'stat-label' }, h.stat2_l)),
            e('div', null, e('div', { className: 'stat-number' }, h.stat3_n), e('div', { className: 'stat-label' }, h.stat3_l))
          )
        )
      )
    );
  }

  function FeaturesBlock(props) {
    var f = props.data;
    return e('section', { className: 'features-block section', id: 'features' },
      e('div', { className: 'container' },
        e('div', { className: 'section-header' },
          e('p', { className: 'section-eyebrow' }, f.eyebrow),
          e('h2', { className: 'section-title' }, f.title),
          e('p', { className: 'section-desc' }, 'Мы берём на себя всё — от поиска до заключения договора.')
        ),
        e('div', { className: 'grid-4' },
          f.items.map(function(item, i) {
            return e('div', { className: 'card feature-card', key: i },
              e('div', { className: 'card-content' },
                e('div', { className: 'feature-icon' }, item.icon),
                e('h3', null, item.title),
                e('p', null, item.desc)
              )
            );
          })
        )
      )
    );
  }

  function ApartmentsBlock(props) {
    return e('section', { className: 'apartments-block section', id: 'apartments' },
      e('div', { className: 'container' },
        e('div', { className: 'section-header' },
          e('p', { className: 'section-eyebrow' }, 'Наши предложения'),
          e('h2', { className: 'section-title' }, 'Популярные квартиры'),
          e('p', { className: 'section-desc' }, 'Выбери из более чем 200 проверенных квартир.')
        ),
        e('div', { className: 'grid-3' },
          props.apartments.map(function(apt, i) {
            return e('div', { className: 'card apartment-card', key: i },
              e('div', { className: 'apt-image' },
                e('div', { className: 'apt-img-placeholder' }, apt.emoji || '🏠'),
                e('span', { className: 'apt-price' }, apt.price)
              ),
              e('div', { className: 'card-content' },
                e('h3', { className: 'apt-title' }, apt.title),
                e('p', { className: 'apt-location' }, '📍 ' + apt.location),
                e('div', { className: 'apt-meta' },
                  e('span', null, '🛏 ' + apt.rooms + ' комн.'),
                  e('span', null, '📐 ' + apt.area),
                  e('span', null, '🏢 ' + apt.floor)
                )
              ),
              e('div', { className: 'card-footer' },
                e('a', { href: '#contact', className: 'btn btn-primary', style: { width: '100%', justifyContent: 'center' } }, 'Узнать подробнее')
              )
            );
          })
        )
      )
    );
  }

  function CtaBlock(props) {
    var c = props.data;
    return e('section', { className: 'cta-block section', id: 'contact' },
      e('div', { className: 'container' },
        e('div', { className: 'section-header' },
          e('h2', { className: 'section-title' }, c.title),
          e('p', { className: 'section-desc' }, c.desc)
        ),
        e('div', { className: 'cta-actions' },
          e('a', { href: 'mailto:info@warsawrent.pl', className: 'btn btn-white btn-lg' }, c.btn_text),
          e('a', { href: 'tel:+48222345678',          className: 'btn btn-ghost-white btn-lg' }, c.btn2_text)
        )
      )
    );
  }

  // ---- ACF Source indicator ----
  function AcfBanner() {
    return e('div', {
      style: {
        padding: '0.5rem 1rem',
        background: '#f0fdf4',
        borderBottom: '1px solid #bbf7d0',
        fontSize: '0.8rem',
        color: '#166534',
        textAlign: 'center'
      }
    }, '✅ Контент загружен из WordPress REST API (wp-json/warsaw/v1/landing). Поля редактируются через ACF в админке.');
  }

  // ---- Main App ----
  function LandingApp() {
    var stateHook = React.useState({ loading: true, data: null, error: null });
    var state     = stateHook[0];
    var setState  = stateHook[1];

    React.useEffect(function() {
      var config = window.WarsawData || {};
      var url    = config.apiBase + '/landing/' + (config.pageId || '');

      fetch(url, {
        headers: {
          'X-WP-Nonce': config.nonce || '',
        }
      })
      .then(function(r) {
        if (!r.ok) throw new Error('HTTP ' + r.status);
        return r.json();
      })
      .then(function(data) { setState({ loading: false, data: data, error: null }); })
      .catch(function(err) { setState({ loading: false, data: null, error: err.message }); });
    }, []);

    if (state.loading) {
      return e('div', { className: 'react-loading' },
        e('span', null, '⏳ Загрузка контента из WP API...')
      );
    }

    if (state.error) {
      return e('div', { style: { padding: '2rem', textAlign: 'center', color: '#ef4444' } },
        '❌ Ошибка загрузки: ' + state.error
      );
    }

    var d = state.data;
    return e(React.Fragment, null,
      e(AcfBanner),
      e(HeroBlock,      { data: d.hero }),
      e(FeaturesBlock,  { data: d.features }),
      e(ApartmentsBlock,{ apartments: d.apartments }),
      e(CtaBlock,       { data: d.cta })
    );
  }

  // ---- Mount ----
  document.addEventListener('DOMContentLoaded', function() {
    var root = document.getElementById('react-landing-root');
    if (!root) return;
    ReactDOM.createRoot(root).render(e(LandingApp));
  });

})();
