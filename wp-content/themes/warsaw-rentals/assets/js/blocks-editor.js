(function() {
  var registerBlockType = wp.blocks.registerBlockType;
  var el                = wp.element.createElement;
  var Fragment          = wp.element.Fragment;
  var useBlockProps     = wp.blockEditor.useBlockProps;
  var InspectorControls = wp.blockEditor.InspectorControls;
  var PanelBody         = wp.components.PanelBody;
  var TextControl       = wp.components.TextControl;
  var TextareaControl   = wp.components.TextareaControl;
  var Button            = wp.components.Button;

  /* ============================================================
     HERO BLOCK
     ============================================================ */
  registerBlockType('warsaw-rentals/hero', {
    edit: function(props) {
      var a = props.attributes;
      var s = props.setAttributes;
      var blockProps = useBlockProps({ style: { border:'2px dashed #2563eb', borderRadius:'6px' } });

      return el(Fragment, null,
        el(InspectorControls, null,
          el(PanelBody, { title: '🔵 Текст Hero', initialOpen: true },
            el(TextControl,     { label: 'Бейдж',        value: a.badge,    onChange: function(v){ s({badge:v}); } }),
            el(TextControl,     { label: 'Заголовок',    value: a.title,    onChange: function(v){ s({title:v}); } }),
            el(TextareaControl, { label: 'Подзаголовок', value: a.subtitle, onChange: function(v){ s({subtitle:v}); }, rows: 3 }),
            el(TextControl,     { label: 'Кнопка 1',     value: a.ctaText,  onChange: function(v){ s({ctaText:v}); } }),
            el(TextControl,     { label: 'Кнопка 2',     value: a.cta2Text, onChange: function(v){ s({cta2Text:v}); } })
          ),
          el(PanelBody, { title: '📊 Статистика', initialOpen: true },
            el(TextControl, { label: 'Цифра 1',   value: a.stat1N, onChange: function(v){ s({stat1N:v}); } }),
            el(TextControl, { label: 'Подпись 1', value: a.stat1L, onChange: function(v){ s({stat1L:v}); } }),
            el(TextControl, { label: 'Цифра 2',   value: a.stat2N, onChange: function(v){ s({stat2N:v}); } }),
            el(TextControl, { label: 'Подпись 2', value: a.stat2L, onChange: function(v){ s({stat2L:v}); } }),
            el(TextControl, { label: 'Цифра 3',   value: a.stat3N, onChange: function(v){ s({stat3N:v}); } }),
            el(TextControl, { label: 'Подпись 3', value: a.stat3L, onChange: function(v){ s({stat3L:v}); } })
          )
        ),
        el('div', blockProps,
          el('div', { style:{ background:'linear-gradient(135deg,#0f172a,#1d4ed8)', color:'#fff', padding:'40px 32px', borderRadius:'6px' } },
            el('span', { style:{ background:'#2563eb', padding:'4px 14px', borderRadius:'20px', fontSize:'12px', fontWeight:'600' } }, '📍 '+a.badge),
            el('h1', { style:{ fontFamily:'Syne,sans-serif', fontSize:'2.25rem', fontWeight:'800', margin:'14px 0 10px', lineHeight:'1.1' } }, a.title),
            el('p', { style:{ color:'#94a3b8', marginBottom:'18px' } }, a.subtitle),
            el('div', { style:{ display:'flex', gap:'10px', marginBottom:'24px' } },
              el('span', { style:{ background:'#fff', color:'#1d4ed8', padding:'8px 18px', borderRadius:'6px', fontWeight:'700', fontSize:'14px' } }, a.ctaText),
              el('span', { style:{ border:'1px solid rgba(255,255,255,.4)', color:'#fff', padding:'8px 18px', borderRadius:'6px', fontSize:'14px' } }, a.cta2Text)
            ),
            el('div', { style:{ display:'flex', gap:'2rem', paddingTop:'18px', borderTop:'1px solid rgba(255,255,255,.1)' } },
              el('div', null, el('div', { style:{ fontSize:'1.5rem', fontWeight:'800', fontFamily:'Syne,sans-serif' } }, a.stat1N), el('div', { style:{ fontSize:'12px', color:'#64748b' } }, a.stat1L)),
              el('div', null, el('div', { style:{ fontSize:'1.5rem', fontWeight:'800', fontFamily:'Syne,sans-serif' } }, a.stat2N), el('div', { style:{ fontSize:'12px', color:'#64748b' } }, a.stat2L)),
              el('div', null, el('div', { style:{ fontSize:'1.5rem', fontWeight:'800', fontFamily:'Syne,sans-serif' } }, a.stat3N), el('div', { style:{ fontSize:'12px', color:'#64748b' } }, a.stat3L))
            )
          )
        )
      );
    },
    save: function() { return null; }
  });

  /* ============================================================
     FEATURES BLOCK
     ============================================================ */
  registerBlockType('warsaw-rentals/features', {
    edit: function(props) {
      var a = props.attributes;
      var s = props.setAttributes;
      var items = a.items ? JSON.parse(JSON.stringify(a.items)) : [];
      var blockProps = useBlockProps({ style:{ border:'2px dashed #16a34a', borderRadius:'6px' } });

      function updateItem(i, key, val) {
        var next = JSON.parse(JSON.stringify(items));
        next[i][key] = val;
        s({ items: next });
      }
      function addItem() {
        s({ items: items.concat([{ icon:'✨', title:'Новый пункт', desc:'Описание' }]) });
      }
      function removeItem(i) {
        s({ items: items.filter(function(_,idx){ return idx!==i; }) });
      }

      return el(Fragment, null,
        el(InspectorControls, null,
          el(PanelBody, { title: '🟢 Заголовок секции', initialOpen: true },
            el(TextControl,     { label: 'Надпись над заголовком', value: a.eyebrow, onChange: function(v){ s({eyebrow:v}); } }),
            el(TextControl,     { label: 'Заголовок',              value: a.title,   onChange: function(v){ s({title:v}); } }),
            el(TextareaControl, { label: 'Описание',               value: a.desc,    onChange: function(v){ s({desc:v}); }, rows: 2 })
          ),
          el(PanelBody, { title: '📋 Карточки (' + items.length + ')', initialOpen: true },
            items.map(function(item, i) {
              return el('div', { key: i, style:{ borderBottom:'1px solid #e2e8f0', paddingBottom:'12px', marginBottom:'12px' } },
                el('div', { style:{ display:'flex', justifyContent:'space-between', alignItems:'center', marginBottom:'6px' } },
                  el('strong', { style:{ fontSize:'12px', color:'#64748b' } }, 'Карточка ' + (i+1)),
                  el(Button, { isDestructive: true, variant: 'link', style:{ fontSize:'11px' }, onClick: function(){ removeItem(i); } }, '✕ удалить')
                ),
                el(TextControl, { label: 'Иконка (эмодзи)', value: item.icon,  onChange: function(v){ updateItem(i,'icon',v); } }),
                el(TextControl, { label: 'Заголовок',       value: item.title, onChange: function(v){ updateItem(i,'title',v); } }),
                el(TextareaControl, { label: 'Описание',    value: item.desc,  onChange: function(v){ updateItem(i,'desc',v); }, rows: 2 })
              );
            }),
            el(Button, { variant:'secondary', onClick: addItem, style:{ width:'100%', justifyContent:'center', marginTop:'4px' } }, '+ Добавить карточку')
          )
        ),
        el('div', blockProps,
          el('div', { style:{ background:'#f8fafc', padding:'32px', borderRadius:'6px' } },
            el('p', { style:{ fontSize:'11px', fontWeight:'700', letterSpacing:'.1em', textTransform:'uppercase', color:'#2563eb', margin:'0 0 6px' } }, a.eyebrow),
            el('h2', { style:{ fontFamily:'Syne,sans-serif', fontSize:'1.75rem', fontWeight:'800', margin:'0 0 8px' } }, a.title),
            el('p', { style:{ color:'#64748b', margin:'0 0 20px' } }, a.desc),
            el('div', { style:{ display:'grid', gridTemplateColumns:'repeat(4,1fr)', gap:'12px' } },
              items.map(function(item, i) {
                return el('div', { key:i, style:{ background:'#fff', border:'1px solid #e2e8f0', borderRadius:'8px', padding:'16px' } },
                  el('div', { style:{ fontSize:'22px', marginBottom:'8px' } }, item.icon),
                  el('strong', { style:{ display:'block', fontSize:'13px', marginBottom:'4px' } }, item.title),
                  el('p', { style:{ fontSize:'12px', color:'#64748b', margin:0 } }, item.desc)
                );
              })
            )
          )
        )
      );
    },
    save: function() { return null; }
  });

  /* ============================================================
     APARTMENTS BLOCK
     ============================================================ */
  registerBlockType('warsaw-rentals/apartments', {
    edit: function(props) {
      var a = props.attributes;
      var s = props.setAttributes;
      var apts = a.apartments ? JSON.parse(JSON.stringify(a.apartments)) : [];
      var blockProps = useBlockProps({ style:{ border:'2px dashed #d97706', borderRadius:'6px' } });

      function updateApt(i, key, val) {
        var next = JSON.parse(JSON.stringify(apts));
        next[i][key] = val;
        s({ apartments: next });
      }
      function addApt() {
        s({ apartments: apts.concat([{ emoji:'🏠', title:'Новая квартира', location:'ул. Название, №', price:'0 zł/мес', rooms:'1', area:'30 m²', floor:'1 эт.' }]) });
      }
      function removeApt(i) {
        s({ apartments: apts.filter(function(_,idx){ return idx!==i; }) });
      }

      return el(Fragment, null,
        el(InspectorControls, null,
          el(PanelBody, { title: '🟠 Заголовок секции', initialOpen: true },
            el(TextControl,     { label: 'Надпись над заголовком', value: a.eyebrow, onChange: function(v){ s({eyebrow:v}); } }),
            el(TextControl,     { label: 'Заголовок',              value: a.title,   onChange: function(v){ s({title:v}); } }),
            el(TextareaControl, { label: 'Описание',               value: a.desc,    onChange: function(v){ s({desc:v}); }, rows: 2 })
          ),
          el(PanelBody, { title: '🏠 Квартиры (' + apts.length + ')', initialOpen: true },
            apts.map(function(apt, i) {
              return el('div', { key:i, style:{ borderBottom:'1px solid #e2e8f0', paddingBottom:'12px', marginBottom:'12px' } },
                el('div', { style:{ display:'flex', justifyContent:'space-between', alignItems:'center', marginBottom:'6px' } },
                  el('strong', { style:{ fontSize:'12px', color:'#64748b' } }, 'Квартира ' + (i+1)),
                  el(Button, { isDestructive:true, variant:'link', style:{ fontSize:'11px' }, onClick: function(){ removeApt(i); } }, '✕ удалить')
                ),
                el(TextControl, { label: 'Эмодзи',    value: apt.emoji,    onChange: function(v){ updateApt(i,'emoji',v); } }),
                el(TextControl, { label: 'Название',  value: apt.title,    onChange: function(v){ updateApt(i,'title',v); } }),
                el(TextControl, { label: 'Адрес',     value: apt.location, onChange: function(v){ updateApt(i,'location',v); } }),
                el(TextControl, { label: 'Цена',      value: apt.price,    onChange: function(v){ updateApt(i,'price',v); } }),
                el(TextControl, { label: 'Комнат',    value: apt.rooms,    onChange: function(v){ updateApt(i,'rooms',v); } }),
                el(TextControl, { label: 'Площадь',   value: apt.area,     onChange: function(v){ updateApt(i,'area',v); } }),
                el(TextControl, { label: 'Этаж',      value: apt.floor,    onChange: function(v){ updateApt(i,'floor',v); } })
              );
            }),
            el(Button, { variant:'secondary', onClick: addApt, style:{ width:'100%', justifyContent:'center', marginTop:'4px' } }, '+ Добавить квартиру')
          )
        ),
        el('div', blockProps,
          el('div', { style:{ background:'#f1f5f9', padding:'32px', borderRadius:'6px' } },
            el('p', { style:{ fontSize:'11px', fontWeight:'700', letterSpacing:'.1em', textTransform:'uppercase', color:'#2563eb', margin:'0 0 6px' } }, a.eyebrow),
            el('h2', { style:{ fontFamily:'Syne,sans-serif', fontSize:'1.75rem', fontWeight:'800', margin:'0 0 20px' } }, a.title),
            el('div', { style:{ display:'grid', gridTemplateColumns:'repeat(3,1fr)', gap:'14px' } },
              apts.map(function(apt, i) {
                return el('div', { key:i, style:{ background:'#fff', border:'1px solid #e2e8f0', borderRadius:'8px', overflow:'hidden' } },
                  el('div', { style:{ height:'100px', background:'linear-gradient(135deg,#1e3a8a,#2563eb)', display:'flex', alignItems:'center', justifyContent:'center', fontSize:'36px', position:'relative' } },
                    apt.emoji,
                    el('span', { style:{ position:'absolute', top:'6px', right:'6px', background:'#fff', padding:'2px 8px', borderRadius:'4px', fontSize:'11px', fontWeight:'700' } }, apt.price)
                  ),
                  el('div', { style:{ padding:'12px' } },
                    el('strong', { style:{ display:'block', fontSize:'13px', marginBottom:'3px' } }, apt.title),
                    el('p', { style:{ fontSize:'11px', color:'#64748b', margin:'0 0 6px' } }, '📍 '+apt.location),
                    el('div', { style:{ display:'flex', gap:'8px', fontSize:'11px', color:'#94a3b8' } },
                      el('span', null, '🛏 '+apt.rooms),
                      el('span', null, '📐 '+apt.area),
                      el('span', null, '🏢 '+apt.floor)
                    )
                  )
                );
              })
            )
          )
        )
      );
    },
    save: function() { return null; }
  });

  /* ============================================================
     CTA BLOCK
     ============================================================ */
  registerBlockType('warsaw-rentals/cta', {
    edit: function(props) {
      var a = props.attributes;
      var s = props.setAttributes;
      var blockProps = useBlockProps({ style:{ border:'2px dashed #7c3aed', borderRadius:'6px' } });

      return el(Fragment, null,
        el(InspectorControls, null,
          el(PanelBody, { title: '🟣 CTA контент', initialOpen: true },
            el(TextControl,     { label: 'Заголовок', value: a.title,    onChange: function(v){ s({title:v}); } }),
            el(TextareaControl, { label: 'Описание',  value: a.desc,     onChange: function(v){ s({desc:v}); }, rows: 3 }),
            el(TextControl,     { label: 'Кнопка 1',  value: a.btnText,  onChange: function(v){ s({btnText:v}); } }),
            el(TextControl,     { label: 'Кнопка 2',  value: a.btn2Text, onChange: function(v){ s({btn2Text:v}); } })
          )
        ),
        el('div', blockProps,
          el('div', { style:{ background:'linear-gradient(135deg,#1d4ed8,#7c3aed)', color:'#fff', padding:'48px 32px', borderRadius:'6px', textAlign:'center' } },
            el('h2', { style:{ fontFamily:'Syne,sans-serif', fontSize:'2rem', fontWeight:'800', margin:'0 0 12px' } }, a.title),
            el('p', { style:{ color:'rgba(255,255,255,.75)', marginBottom:'24px' } }, a.desc),
            el('div', { style:{ display:'flex', justifyContent:'center', gap:'12px' } },
              el('span', { style:{ background:'#fff', color:'#1d4ed8', padding:'10px 24px', borderRadius:'7px', fontWeight:'700' } }, a.btnText),
              el('span', { style:{ border:'1px solid rgba(255,255,255,.4)', color:'#fff', padding:'10px 24px', borderRadius:'7px' } }, a.btn2Text)
            )
          )
        )
      );
    },
    save: function() { return null; }
  });

})();
