<!doctype html><html><head>
    <meta name="csrf-token" content="{{ csrf_token() }}"><meta charset=utf8><meta name=viewport content="width=device-width,initial-scale=1,viewport-fit=cover"><style>:root{color-scheme:light;box-sizing:border-box;padding-top:env(safe-area-inset-top,0px);padding-bottom:env(safe-area-inset-bottom,0px)}html{scroll-padding-top:env(safe-area-inset-top,0px)}body{margin:0;padding:0;font:14px -apple-system,BlinkMacSystemFont,sans-serif;background:#fff;color:#000}img{max-width:100%}[hidden]:not([hidden=until-found i]){display:none!important}</style></head><body>
<title>{{ $weddingCard->couple_name }} - Thiệp Cưới Online</title>
<meta name="claude:viewport-fit-sides" content="cover">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;1,500;1,600&family=Be+Vietnam+Pro:wght@300;400;500;600&family=Noto+Serif+SC:wght@900&display=swap">
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcode-generator/1.4.4/qrcode.min.js"></script>
<style>
/* Layout: cover screen (scattered 囍 + big 囍 + names + "Mở thiệp") slides up to reveal one long scrolling card:
   sunburst hero → couple → parents/announcement → ceremony → album + lightbox → party/countdown/calendar/RSVP
   → venue → dress code → timeline → guestbook → gift box with QR. */
:root{
  --bg:#eef5ee; --paper:#fbfdf8; --ink:#16342a; --muted:#587064; --jade:#1f6b53; --deep:#0d3b2e;
  --gold:#a88335; --line:rgba(31,107,83,.22); --soft:#dcebe0; --field:#ffffff; --shadow:rgba(13,59,46,.14);
  --cover-a:#0f4636; --cover-b:#082a20; --cover-ink:#f6f1e0; --cover-gold:#e2c27a;
  --f-display:"Cormorant Garamond","Noto Serif",Georgia,serif;
  --f-body:"Be Vietnam Pro",system-ui,-apple-system,"Segoe UI",sans-serif;
  --f-han:"Noto Serif SC","Songti SC","SimSun",serif;
}
@media (prefers-color-scheme:dark){:root:not([data-theme="light"]){
  --bg:#0a1d17; --paper:#10281f; --ink:#e8f2ea; --muted:#9db8a9; --jade:#63c29e; --deep:#e8f2ea;
  --gold:#dcbb6e; --line:rgba(99,194,158,.26); --soft:#17382c; --field:#0c1f18; --shadow:rgba(0,0,0,.45); color-scheme:dark}}
:root[data-theme="dark"]{
  --bg:#0a1d17; --paper:#10281f; --ink:#e8f2ea; --muted:#9db8a9; --jade:#63c29e; --deep:#e8f2ea;
  --gold:#dcbb6e; --line:rgba(99,194,158,.26); --soft:#17382c; --field:#0c1f18; --shadow:rgba(0,0,0,.45); color-scheme:dark}

*{box-sizing:border-box}
html{scroll-behavior:smooth}
body{
  background:var(--bg); color:var(--ink); font:400 15px/1.65 var(--f-body);
  padding-left:max(16px,env(safe-area-inset-left,0px)); padding-right:max(16px,env(safe-area-inset-right,0px));
  padding-block:0; -webkit-font-smoothing:antialiased; overflow-x:hidden;
}
body.locked{overflow:hidden;height:100%}
h1,h2,h3,p{margin:0}
h2,h3{text-wrap:balance}
button{font:inherit;color:inherit;cursor:pointer}
:focus-visible{outline:2px solid var(--gold);outline-offset:3px}
.han{font-family:var(--f-han);font-weight:900}
.wrap{max-width:560px;margin:0 auto;min-width:0}

/* ---------- COVER ---------- */
.cover{
  position:fixed; inset:0; z-index:50; display:grid; place-items:center; text-align:center; overflow:hidden;
  background:radial-gradient(120% 90% at 50% 20%,var(--cover-a),var(--cover-b)); color:var(--cover-ink);
  padding:calc(24px + env(safe-area-inset-top,0px)) max(24px,env(safe-area-inset-right,0px)) calc(24px + env(safe-area-inset-bottom,0px)) max(24px,env(safe-area-inset-left,0px));
  transition:transform 1.1s cubic-bezier(.77,0,.18,1), opacity .4s ease .8s;
}
.cover.gone{transform:translateY(-102%);opacity:0;pointer-events:none}
.scatter{position:absolute;inset:0;pointer-events:none}
.scatter span{
  position:absolute; left:var(--x); top:var(--y); font-size:var(--s); color:var(--cover-gold); opacity:var(--o);
  transform:rotate(var(--r)); animation:drift var(--d) ease-in-out infinite alternate;
}
@keyframes drift{from{transform:translateY(0) rotate(var(--r))}to{transform:translateY(-16px) rotate(calc(var(--r) + 8deg))}}
.cover-inner{position:relative;display:flex;flex-direction:column;align-items:center;gap:14px;max-width:420px;min-width:0}
.cover-seal{
  width:min(52vw,210px); aspect-ratio:1; display:grid; place-items:center; border-radius:50%;
  border:1px solid rgba(226,194,122,.55); box-shadow:0 0 0 8px rgba(226,194,122,.08), inset 0 0 40px rgba(226,194,122,.12);
  font-size:min(30vw,124px); line-height:1; color:var(--cover-gold); animation:breathe 4.5s ease-in-out infinite;
}
@keyframes breathe{50%{transform:scale(1.04);box-shadow:0 0 0 14px rgba(226,194,122,.05), inset 0 0 50px rgba(226,194,122,.2)}}
.cover .kicker{font-size:11px;letter-spacing:.34em;text-transform:uppercase;color:var(--cover-gold)}
.cover h1{font:italic 600 clamp(40px,12vw,58px)/1.02 var(--f-display);text-wrap:balance}
.cover h1 .amp{display:block;font-size:.5em;margin:2px 0;color:var(--cover-gold)}
.fleuron{font-size:22px;color:var(--cover-gold);line-height:1}
.cover .date{letter-spacing:.2em;font-size:13px;text-transform:uppercase}
.cover .invite{font:italic 500 22px var(--f-display);margin-top:6px;opacity:.9}
.btn-open{
  margin-top:10px; padding:13px 38px; border-radius:999px; border:1px solid var(--cover-gold); background:transparent;
  color:var(--cover-gold); letter-spacing:.24em; text-transform:uppercase; font-size:12px; font-weight:500;
  position:relative; transition:background .3s,color .3s,transform .3s;
}
.btn-open::after{content:"";position:absolute;inset:-7px;border-radius:inherit;border:1px solid var(--cover-gold);opacity:0;animation:ping 2.4s ease-out infinite}
@keyframes ping{0%{opacity:.7;transform:scale(.96)}100%{opacity:0;transform:scale(1.18)}}
.btn-open:hover{background:var(--cover-gold);color:var(--cover-b)}

/* ---------- FLOATING LAYER / MUSIC ---------- */
.petals{position:fixed;inset:0;pointer-events:none;z-index:5;overflow:hidden}
.petals i{
  position:absolute; top:-8%; left:var(--x); font-style:normal; font-size:var(--s); color:var(--jade); opacity:.0;
  animation:fall var(--d) linear var(--w) infinite;
}
@keyframes fall{0%{opacity:0;transform:translate(0,0) rotate(0)}10%{opacity:.4}90%{opacity:.3}100%{opacity:0;transform:translate(40px,115vh) rotate(260deg)}}
.music{
  position:fixed; z-index:20; right:calc(14px + env(safe-area-inset-right,0px)); top:calc(14px + env(safe-area-inset-top,0px));
  width:42px;height:42px;border-radius:50%;border:1px solid var(--line);background:var(--paper);color:var(--jade);
  display:grid;place-items:center;box-shadow:0 6px 18px var(--shadow);
}
.music svg{width:20px;height:20px}
.music.on svg{animation:spin 5s linear infinite}
@keyframes spin{to{transform:rotate(360deg)}}
.music[hidden]{display:none}

/* ---------- SHARED SECTION PARTS ---------- */
section{position:relative;padding-block:72px}
.eyebrow{font-size:11px;letter-spacing:.34em;text-transform:uppercase;color:var(--gold);font-weight:500;text-align:center}
.title{font:600 clamp(30px,8vw,40px)/1.1 var(--f-display);text-align:center;color:var(--deep);margin-top:8px}
.rule{display:flex;align-items:center;justify-content:center;gap:12px;margin:18px auto 0;color:var(--gold);font-size:18px}
.rule::before,.rule::after{content:"";height:1px;width:56px;background:linear-gradient(90deg,transparent,var(--gold))}
.rule::after{transform:scaleX(-1)}
.reveal{opacity:.2;transform:translateY(22px);transition:opacity .9s ease,transform .9s cubic-bezier(.2,.7,.2,1)}
.reveal.in{opacity:1;transform:none}
.panel{background:var(--paper);border:1px solid var(--line);border-radius:4px;box-shadow:0 18px 40px -22px var(--shadow)}

/* ---------- HERO ---------- */
.hero{padding-top:calc(96px + env(safe-area-inset-top,0px));overflow:hidden;text-align:center}
.sunburst{
  position:absolute; left:50%; top:46%; width:150vmax; height:150vmax; translate:-50% -50%; z-index:0; pointer-events:none;
  background:repeating-conic-gradient(from 0deg,var(--soft) 0 4deg,transparent 4deg 9deg);
  -webkit-mask-image:radial-gradient(closest-side,#000 8%,transparent 40%); mask-image:radial-gradient(closest-side,#000 8%,transparent 40%);
  animation:rotate 160s linear infinite; opacity:.9;
}
@keyframes rotate{to{transform:rotate(360deg)}}
.hero .wrap{position:relative;z-index:1}
.couple{display:grid;grid-template-columns:1fr auto 1fr;align-items:center;gap:6px;margin-top:34px}
.person small{display:block;font-size:11px;letter-spacing:.3em;text-transform:uppercase;color:var(--muted)}
.person b{display:block;font:italic 600 clamp(28px,8vw,38px)/1.05 var(--f-display);color:var(--deep);margin-top:4px;text-wrap:balance}
.big-hy{font-size:clamp(64px,19vw,96px);line-height:1;color:var(--jade);text-shadow:0 8px 30px var(--shadow);animation:breathe2 5s ease-in-out infinite}
@keyframes breathe2{50%{transform:scale(1.06)}}
.arch{
  margin:44px auto 0; width:min(78%,330px); aspect-ratio:3/4; border-radius:999px 999px 6px 6px; overflow:hidden; position:relative;
  box-shadow:0 0 0 6px var(--paper),0 0 0 7px var(--gold),0 30px 50px -24px var(--shadow);
}
.arch img{width:100%;height:100%;object-fit:cover;display:block;transform:scale(1.08);transition:transform 6s ease-out}
.arch.in img{transform:scale(1)}
.tagline{margin-top:30px;font:italic 500 22px var(--f-display);letter-spacing:.14em;color:var(--jade)}
.scroll-cue{display:block;margin:30px auto 0;width:1px;height:46px;background:linear-gradient(var(--gold),transparent);animation:cue 2s ease-in-out infinite}
@keyframes cue{50%{transform:scaleY(.5);transform-origin:top}}

/* ---------- FAMILIES / CEREMONY ---------- */
.families{display:grid;grid-template-columns:1fr 1fr;gap:20px;text-align:center;margin-top:36px}
.fam small{display:block;font-size:11px;letter-spacing:.26em;text-transform:uppercase;color:var(--muted)}
.fam b{display:block;font:600 21px/1.25 var(--f-display);margin:6px 0 4px;color:var(--deep)}
.fam p{font-size:13px;color:var(--muted)}
.announce{margin-top:48px;text-align:center}
.announce .lead{font-size:12px;letter-spacing:.24em;text-transform:uppercase;line-height:2;color:var(--muted)}
.names{margin-top:22px;display:grid;gap:2px}
.names h3{font:italic 600 clamp(34px,10vw,46px)/1.05 var(--f-display);color:var(--deep)}
.names small{font-size:11px;letter-spacing:.3em;text-transform:uppercase;color:var(--muted)}
.names .amp{font:italic 500 28px var(--f-display);color:var(--gold)}
.where{margin-top:36px;font-size:12px;letter-spacing:.24em;text-transform:uppercase;color:var(--muted);line-height:2}
.where strong{display:block;font:600 24px var(--f-display);letter-spacing:.14em;color:var(--jade)}
.datebox{display:grid;grid-template-columns:1fr auto 1fr;align-items:center;gap:16px;margin:26px auto 0;max-width:360px}
.datebox .dow,.datebox .mon{font-size:12px;letter-spacing:.22em;text-transform:uppercase;padding-block:8px;border-block:1px solid var(--gold);color:var(--deep);font-weight:500}
.datebox .day{font:600 72px/1 var(--f-display);color:var(--jade)}
.year{margin-top:10px;font:500 22px var(--f-display);letter-spacing:.3em;color:var(--deep)}
.lunar{margin-top:6px;font-size:13px;color:var(--muted);font-style:italic}

/* ---------- ALBUM ---------- */
.album{background:linear-gradient(var(--bg),var(--soft) 30%,var(--soft) 70%,var(--bg))}
.carousel{position:relative;margin-top:30px;height:clamp(340px,102vw,450px);perspective:1100px;overflow:hidden;touch-action:pan-y;user-select:none;-webkit-user-select:none}
.slide{
  position:absolute;left:50%;top:50%;width:min(58%,260px);aspect-ratio:3/4;margin:0;padding:0;border:0;border-radius:18px;overflow:hidden;background:var(--paper);cursor:pointer;
  box-shadow:0 26px 40px -22px var(--shadow);
  transform:translate(-50%,-50%) translateX(calc(var(--d,0)*68%)) rotateY(calc(var(--d,0)*-16deg)) scale(calc(1 - var(--a,0)*.14));
  filter:brightness(calc(1 - var(--a,0)*.1));
  transition:transform .9s cubic-bezier(.45,.05,.2,1),opacity .9s ease,filter .9s ease;
  will-change:transform,opacity;
}
.slide img{width:100%;height:100%;object-fit:cover;display:block;pointer-events:none}
.dots{display:flex;justify-content:center;align-items:center;gap:8px;margin-top:14px}
.dot{width:8px;height:8px;padding:0;border:0;border-radius:99px;background:var(--line);transition:width .5s ease,background .5s ease}
.dot.on{width:28px;background:var(--jade)}
.lightbox{position:fixed;inset:0;z-index:80;background:rgba(5,16,12,.94);display:none;flex-direction:column;align-items:center;justify-content:center;gap:14px;
  padding:calc(56px + env(safe-area-inset-top,0px)) max(16px,env(safe-area-inset-right,0px)) calc(18px + env(safe-area-inset-bottom,0px)) max(16px,env(safe-area-inset-left,0px))}
.lightbox.open{display:flex;animation:fadein .3s ease}
@keyframes fadein{from{opacity:0}}
.lb-top{position:absolute;top:calc(12px + env(safe-area-inset-top,0px));left:max(16px,env(safe-area-inset-left,0px));right:max(16px,env(safe-area-inset-right,0px));display:flex;justify-content:space-between;align-items:center;color:#f2efe2;font-size:13px;letter-spacing:.2em}
.lb-btn{background:rgba(255,255,255,.1);border:0;color:#f6f1e0;width:42px;height:42px;border-radius:50%;font-size:22px;line-height:1}
.lb-stage{display:flex;align-items:center;gap:10px;width:100%;max-width:760px;min-height:0;flex:1}
.lb-stage img{flex:1;min-width:0;max-height:100%;width:100%;object-fit:contain;border-radius:3px}
.lb-thumbs{display:flex;gap:8px;max-width:100%;overflow-x:auto;padding:2px}
.lb-thumbs button{flex:0 0 auto;width:54px;height:54px;padding:0;border:2px solid transparent;border-radius:3px;overflow:hidden;opacity:.55;background:none}
.lb-thumbs button.on{border-color:#e2c27a;opacity:1}
.lb-thumbs img{width:100%;height:100%;object-fit:cover;display:block}

/* ---------- PARTY ---------- */
.party-time{text-align:center;margin-top:30px}
.party-time p{font-size:12px;letter-spacing:.24em;text-transform:uppercase;color:var(--muted)}
.party-time .hour{font:600 64px/1.1 var(--f-display);color:var(--jade);margin:6px 0 18px}
.cd{display:grid;grid-template-columns:repeat(4,1fr);gap:10px;margin-top:30px}
.cd div{padding:16px 4px;text-align:center}
.cd b{display:block;font:600 36px/1 var(--f-display);color:var(--jade);font-variant-numeric:tabular-nums}
.cd span{display:block;margin-top:6px;font-size:10px;letter-spacing:.2em;text-transform:uppercase;color:var(--muted)}
.cal{margin-top:30px;padding:22px 18px}
.cal h3{text-align:center;font:600 22px var(--f-display);letter-spacing:.08em;color:var(--deep);margin-bottom:14px}
.cal-grid{display:grid;grid-template-columns:repeat(7,1fr);gap:4px;text-align:center;font-size:13px;font-variant-numeric:tabular-nums}
.cal-grid .h{font-size:10px;letter-spacing:.14em;color:var(--muted);padding-bottom:6px;text-transform:uppercase}
.cal-grid .d{aspect-ratio:1;display:grid;place-items:center;border-radius:50%;position:relative}
.cal-grid .d.sun{color:#b2483e}
.cal-grid .d.hit{background:var(--jade);color:#fff;font-weight:600;box-shadow:0 0 0 4px var(--soft)}
.cal-grid .d.hit::after{content:"囍";font-family:var(--f-han);position:absolute;top:-9px;right:-7px;font-size:12px;color:var(--gold)}
.row-btns{display:flex;flex-wrap:wrap;gap:12px;justify-content:center;margin-top:24px}
.btn{
  display:inline-flex;align-items:center;justify-content:center;gap:8px;padding:12px 26px;border-radius:999px;font-size:12px;letter-spacing:.16em;text-transform:uppercase;font-weight:500;
  text-decoration:none;border:1px solid var(--jade);background:transparent;color:var(--jade);transition:background .25s,color .25s;
}
.btn:hover{background:var(--jade);color:var(--paper)}
.btn.solid{background:var(--jade);color:var(--paper)}
.btn.solid:hover{background:var(--deep);border-color:var(--deep);color:var(--paper)}
.btn[hidden]{display:none}

.rsvp{margin-top:34px;padding:26px 22px;display:grid;gap:14px}
.rsvp h3{font:600 24px var(--f-display);text-align:center;color:var(--deep)}
label{display:grid;gap:6px;font-size:12px;letter-spacing:.14em;text-transform:uppercase;color:var(--muted)}
input[type=text],input[type=number],textarea,select{
  width:100%;font:400 15px var(--f-body);letter-spacing:0;text-transform:none;color:var(--ink);background:var(--field);
  border:1px solid var(--line);border-radius:3px;padding:11px 12px;
}
textarea{resize:vertical;min-height:84px}
.choice{display:grid;grid-template-columns:1fr 1fr;gap:10px}
.choice input{position:absolute;opacity:0;pointer-events:none}
.choice span{display:block;text-align:center;padding:11px 8px;border:1px solid var(--line);border-radius:3px;cursor:pointer;font-size:13px;letter-spacing:.04em;text-transform:none;color:var(--ink);background:var(--field)}
.choice input:checked+span{background:var(--jade);border-color:var(--jade);color:#fff}
.choice input:focus-visible+span{outline:2px solid var(--gold);outline-offset:2px}
.thanks{text-align:center;font:italic 500 22px/1.4 var(--f-display);color:var(--jade);padding:10px 0}

.venue{text-align:center}
.venue .place{font:600 30px/1.15 var(--f-display);color:var(--deep);margin-top:14px}
.venue .addr{margin-top:8px;color:var(--muted);font-size:14px}
.mapcard{margin-top:26px;aspect-ratio:16/10;border-radius:4px;overflow:hidden;position:relative;border:1px solid var(--line);
  background:
   linear-gradient(115deg,transparent 46%,rgba(255,255,255,.75) 46% 49%,transparent 49%),
   linear-gradient(28deg,transparent 58%,rgba(255,255,255,.65) 58% 60.5%,transparent 60.5%),
   linear-gradient(90deg,transparent 22%,rgba(255,255,255,.5) 22% 23.5%,transparent 23.5%),
   linear-gradient(0deg,var(--soft),#cfe3d3)}
.mapcard::before{content:"";position:absolute;left:8%;top:12%;width:34%;height:30%;border-radius:40% 60% 50% 50%;background:rgba(99,170,140,.35)}
.pin{position:absolute;left:50%;top:50%;translate:-50% -100%;display:grid;justify-items:center;color:#c0453a;animation:bob 1.8s ease-in-out infinite}
.pin svg{width:44px;height:44px;filter:drop-shadow(0 6px 6px rgba(0,0,0,.25))}
.pin em{font-style:normal;background:var(--paper);color:var(--deep);font-size:11px;padding:3px 9px;border-radius:99px;margin-top:2px;box-shadow:0 4px 10px var(--shadow);white-space:nowrap}
@keyframes bob{50%{transform:translateY(-6px)}}

.dress{display:flex;justify-content:center;gap:16px;margin-top:26px}
.dress i{display:block;width:52px;height:52px;border-radius:50%;background:var(--c);border:3px solid var(--paper);box-shadow:0 0 0 1px var(--line),0 10px 20px -10px var(--shadow)}
.dress-note{text-align:center;margin-top:16px;color:var(--muted);font-size:14px}

.timeline{list-style:none;margin:36px 0 0;padding:0 0 0 0;position:relative}
.timeline::before{content:"";position:absolute;left:84px;top:8px;bottom:8px;width:1px;background:var(--line)}
.timeline li{display:grid;grid-template-columns:70px 1fr;gap:28px;align-items:center;padding-block:14px;position:relative}
.timeline time{font:600 22px var(--f-display);color:var(--jade);text-align:right;font-variant-numeric:tabular-nums}
.timeline li::after{content:"囍";font-family:var(--f-han);font-size:11px;position:absolute;left:84px;top:50%;translate:-50% -50%;background:var(--bg);color:var(--gold);padding:3px 0;line-height:1}
.timeline span{font-size:15px}

/* ---------- GUESTBOOK ---------- */
.gb-form{margin-top:30px;padding:22px 20px;display:grid;gap:12px}
.gb-list{margin-top:26px;display:grid;gap:12px;max-height:520px;overflow-y:auto;padding-right:2px}
.gb-item{padding:14px 16px;border-left:3px solid var(--jade);background:var(--paper);border-radius:0 3px 3px 0;box-shadow:0 10px 24px -20px var(--shadow)}
.gb-item header{display:flex;justify-content:space-between;gap:10px;flex-wrap:wrap;font-size:12px;color:var(--muted)}
.gb-item header b{color:var(--deep);font-weight:600;font-size:14px}
.gb-item p{margin-top:6px;font-size:14px;overflow-wrap:anywhere}

/* ---------- GIFT BOX ---------- */
.gift{text-align:center}
.giftbox{
  margin:30px auto 0;background:none;border:0;padding:6px;display:grid;justify-items:center;gap:12px;color:var(--jade);
}
.giftbox svg{width:150px;height:auto;overflow:visible}
.giftbox .lid{transform-origin:30px 62px;transition:transform .6s cubic-bezier(.3,1.5,.5,1)}
.giftbox:hover .lid{transform:translateY(-9px) rotate(-6deg)}
.giftbox small{font-size:12px;letter-spacing:.24em;text-transform:uppercase;color:var(--muted)}
.sparks{display:flex;gap:10px;justify-content:center;color:var(--gold);font-size:14px}
.sparks b{animation:tw 2s ease-in-out infinite}.sparks b:nth-child(2){animation-delay:.3s}.sparks b:nth-child(3){animation-delay:.6s}.sparks b:nth-child(4){animation-delay:.9s}
@keyframes tw{50%{opacity:.25;transform:scale(.7)}}
.modal{position:fixed;inset:0;z-index:85;background:rgba(5,16,12,.78);display:none;place-items:center;
  padding:calc(16px + env(safe-area-inset-top,0px)) max(16px,env(safe-area-inset-right,0px)) calc(16px + env(safe-area-inset-bottom,0px)) max(16px,env(safe-area-inset-left,0px))}
.modal.open{display:grid;animation:fadein .25s ease}
.sheet{width:min(100%,420px);max-height:100%;overflow-y:auto;background:var(--paper);border-radius:6px;padding:24px 20px;text-align:center;position:relative}
.sheet h3{font:600 26px var(--f-display);color:var(--deep)}
.tabs{display:grid;grid-template-columns:1fr 1fr;gap:8px;margin:16px 0}
.tabs button{padding:10px 8px;border:1px solid var(--line);background:var(--field);border-radius:3px;font-size:13px}
.tabs button[aria-selected=true]{background:var(--jade);border-color:var(--jade);color:#fff}
.qr{width:200px;height:200px;margin:0 auto;background:#fff;padding:8px;border-radius:4px;display:grid;place-items:center}
.qr svg{width:100%;height:100%;display:block}
.acct{margin-top:14px;font-size:14px;color:var(--muted)}
.acct b{display:block;font:600 22px var(--f-display);letter-spacing:.08em;color:var(--ink);font-variant-numeric:tabular-nums}
.x{position:absolute;right:10px;top:10px;width:36px;height:36px;border:0;background:var(--soft);border-radius:50%;font-size:18px;color:var(--ink)}

footer{padding-block:54px calc(54px + env(safe-area-inset-bottom,0px));text-align:center;color:var(--muted)}
footer .han{font-size:40px;color:var(--jade);display:block;margin-bottom:8px}
footer p{font:italic 500 20px/1.4 var(--f-display);color:var(--deep);max-width:30ch;margin-inline:auto}
footer small{display:block;margin-top:20px;font-size:11px;letter-spacing:.2em;text-transform:uppercase}

@media (max-width:420px){
  .families{grid-template-columns:1fr}
  .timeline::before{left:70px}.timeline li::after{left:70px}.timeline li{grid-template-columns:56px 1fr;gap:24px}
}
@media (prefers-reduced-motion:reduce){
  *,*::before,*::after{animation:none!important;transition:none!important}
  .reveal{opacity:1;transform:none}
  html{scroll-behavior:auto}
}
</style>

<!-- ===================== COVER ===================== -->
<div class="cover" id="cover">
  <div class="scatter" id="scatter" aria-hidden="true"></div>
  <div class="cover-inner">
    <div class="cover-seal han" aria-hidden="true">囍</div>
    <p class="kicker">Thiệp mời cưới</p>
    <h1>{{ $weddingCard->groom_name }}<span class="amp">&amp;</span>{{ $weddingCard->bride_name }}</h1>
    <div class="fleuron" aria-hidden="true">❦</div>
    <p class="date">{{ $weddingCard->wedding_date ? $weddingCard->wedding_date->locale('vi')->isoFormat('D [tháng] M, Y') : '20 tháng 12, 2026' }}</p>
    <p class="invite">Thân mời</p>
    <button class="btn-open" id="openBtn" type="button">Mở thiệp</button>
  </div>
</div>

<button class="music" id="music" type="button" aria-label="Bật nhạc nền" hidden>
  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="2.4"/><path d="M12 3v3M21 12h-3M12 21v-3M3 12h3"/></svg>
</button>
<div class="petals" id="petals" aria-hidden="true"></div>

<main id="main" hidden>
  <!-- ===================== HERO ===================== -->
  <section class="hero">
    <div class="sunburst" aria-hidden="true"></div>
    <div class="wrap">
      <p class="eyebrow reveal">Welcome to our wedding</p>
      <div class="couple reveal">
        <div class="person"><small>Chú rể</small><b>{{ $weddingCard->groom_name }}</b></div>
        <div class="big-hy han" aria-hidden="true">囍</div>
        <div class="person"><small>Cô dâu</small><b>{{ $weddingCard->bride_name }}</b></div>
      </div>
      <div class="arch reveal"><img id="heroPhoto" alt="Ảnh cưới của {{ $weddingCard->groom_name }} và {{ $weddingCard->bride_name }}"></div>
      <p class="tagline reveal">Love never fails</p>
      <span class="scroll-cue" aria-hidden="true"></span>
    </div>
  </section>

  <!-- ===================== WEDDING INFO ===================== -->
  <section>
    <div class="wrap">
      <p class="eyebrow reveal">Thông tin lễ cưới</p>
      <div class="rule reveal" aria-hidden="true">❦</div>
      <div class="families reveal">
        <div class="fam"><small>Nhà trai</small><b>{{ $weddingCard->groom_father_name ?: ($weddingCard->groom_father ?: 'Ông Lê Văn Đức') }}<br>{{ $weddingCard->groom_mother_name ?: ($weddingCard->groom_mother ?: 'Bà Phạm Thị Lan') }}</b><p>{{ $weddingCard->address_groom ?: ($weddingCard->groom_address ?: '21 Trần Phú, Hải Châu, Đà Nẵng') }}</p></div>
        <div class="fam"><small>Nhà gái</small><b>{{ $weddingCard->bride_father_name ?: ($weddingCard->bride_father ?: 'Ông Đỗ Quang Huy') }}<br>{{ $weddingCard->bride_mother_name ?: ($weddingCard->bride_mother ?: 'Bà Vũ Thị Mai') }}</b><p>{{ $weddingCard->address_bride ?: ($weddingCard->bride_address ?: '88 Lê Duẩn, Hải Châu, Đà Nẵng') }}</p></div>
      </div>
      <div class="announce reveal">
        <p class="lead">Trân trọng báo tin<br>lễ thành hôn của con chúng tôi</p>
        <div class="names">
          <h3>{{ $weddingCard->groom_name }}</h3><small>Con trai</small>
          <span class="amp" aria-hidden="true">&amp;</span>
          <h3>{{ $weddingCard->bride_name }}</h3><small>Con gái</small>
        </div>
        <p class="where">Lễ thành hôn được cử hành tại<strong>{{ $weddingCard->name_place_wedding ?: 'Tư gia' }}</strong>vào lúc {{ $weddingCard->wedding_time ?: '09:00' }}</p>
        @php
          $wDate28 = $weddingCard->wedding_date ? \Carbon\Carbon::parse($weddingCard->wedding_date) : \Carbon\Carbon::now();
        @endphp
        <div class="datebox"><div class="dow">{{ $wDate28->isoFormat('dddd') }}</div><div class="day">{{ $wDate28->format('d') }}</div><div class="mon">Tháng {{ $wDate28->format('m') }}</div></div>
        <p class="year">{{ $wDate28->format('Y') }}</p>
        <p class="lunar">(Tức {{ $weddingCard->wedding_date_al ?: 'Ngày tốt hoàng đạo' }})</p>
      </div>
    </div>
  </section>

  <!-- ===================== ALBUM ===================== -->
  <section class="album">
    <div class="wrap">
      <p class="eyebrow reveal">Khoảnh khắc</p>
      <h2 class="title reveal">Album ảnh</h2>
      <div class="rule reveal" aria-hidden="true">❦</div>
      <div class="carousel reveal" id="carousel" aria-roledescription="carousel" aria-label="Album ảnh cưới"></div>
      <div class="dots reveal" id="dots"></div>
    </div>
  </section>

  <!-- ===================== PARTY ===================== -->
  <section>
    <div class="wrap">
      <p class="eyebrow reveal">Thông tin tiệc cưới</p>
      <h2 class="title reveal">Tiệc cưới sẽ diễn ra vào lúc</h2>

      <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:24px;margin-top:36px">
        <!-- NHÀ TRAI -->
        <div class="panel reveal" style="padding:28px 20px;text-align:center;border-top:3px solid var(--jade)">
          <p class="eyebrow" style="color:var(--jade);margin-bottom:6px">TIỆC CƯỚI NHÀ TRAI</p>
          <h3 style="font:600 24px var(--f-display);color:var(--deep);margin-bottom:12px">Hôn Trường Nhà Trai</h3>
          
          <div class="party-time" style="margin-top:10px">
            <div class="hour" style="margin:4px 0 10px">{{ $weddingCard->time_groom ?: ($weddingCard->wedding_time ?: '18:00') }}</div>
            <p style="font-size:15px;color:var(--deep);font-weight:600;letter-spacing:0;text-transform:none">
              {{ $weddingCard->groom_eating_date ? \Carbon\Carbon::parse($weddingCard->groom_eating_date)->locale('vi')->isoFormat('dddd, [ngày] DD/MM/YYYY') : ($weddingCard->wedding_date ? $weddingCard->wedding_date->locale('vi')->isoFormat('dddd, [ngày] DD/MM/YYYY') : 'Chủ nhật, ngày 20/12/2026') }}
            </p>
            <p class="lunar" style="margin-top:4px">(Tức ngày {{ $weddingCard->time_groom_al ?: ($weddingCard->wedding_date_lunar ?: '11 tháng 11 năm Bính Ngọ') }})</p>
          </div>

          <div style="margin-top:18px;font-size:14px;color:var(--muted)">
            <strong style="color:var(--deep);display:block;margin-bottom:4px">Địa chỉ:</strong>
            {{ $weddingCard->address_groom ?: ($weddingCard->wedding_address ?: 'Tư gia Nhà Trai') }}
          </div>

          <div class="row-btns" style="margin-top:20px;gap:8px">
            <a class="btn solid" target="_blank" rel="noopener" href="{{ $weddingCard->groom_map ?: ($weddingCard->google_map_url ?: ('https://www.google.com/maps/search/?api=1&query=' . urlencode($weddingCard->address_groom ?: ($weddingCard->wedding_address ?: 'Tư gia Nhà Trai')))) }}">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a7 7 0 0 0-7 7c0 5.2 7 13 7 13s7-7.8 7-13a7 7 0 0 0-7-7Zm0 9.5A2.5 2.5 0 1 1 12 6.5a2.5 2.5 0 0 1 0 5Z"/></svg>
              Chỉ đường
            </a>
            @if(!empty($weddingCard->groom_phone))
              <a class="btn" href="tel:{{ $weddingCard->groom_phone }}">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79a15.05 15.05 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.02-.24c1.12.37 2.33.57 3.57.57a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.57 3.57a1 1 0 0 1-.25 1.02l-2.2 2.2Z"/></svg>
                Gọi Chú Rể: {{ $weddingCard->groom_phone }}
              </a>
            @endif
          </div>
        </div>

        <!-- NHÀ GÁI -->
        <div class="panel reveal" style="padding:28px 20px;text-align:center;border-top:3px solid var(--jade)">
          <p class="eyebrow" style="color:var(--jade);margin-bottom:6px">TIỆC CƯỚI NHÀ GÁI</p>
          <h3 style="font:600 24px var(--f-display);color:var(--deep);margin-bottom:12px">Hôn Trường Nhà Gái</h3>
          
          <div class="party-time" style="margin-top:10px">
            <div class="hour" style="margin:4px 0 10px">{{ $weddingCard->time_bride ?: ($weddingCard->wedding_time ?: '11:00') }}</div>
            <p style="font-size:15px;color:var(--deep);font-weight:600;letter-spacing:0;text-transform:none">
              {{ $weddingCard->bride_eating_date ? \Carbon\Carbon::parse($weddingCard->bride_eating_date)->locale('vi')->isoFormat('dddd, [ngày] DD/MM/YYYY') : ($weddingCard->wedding_date ? $weddingCard->wedding_date->locale('vi')->isoFormat('dddd, [ngày] DD/MM/YYYY') : 'Chủ nhật, ngày 20/12/2026') }}
            </p>
            <p class="lunar" style="margin-top:4px">(Tức ngày {{ $weddingCard->time_bride_al ?: ($weddingCard->wedding_date_lunar ?: '11 tháng 11 năm Bính Ngọ') }})</p>
          </div>

          <div style="margin-top:18px;font-size:14px;color:var(--muted)">
            <strong style="color:var(--deep);display:block;margin-bottom:4px">Địa chỉ:</strong>
            {{ $weddingCard->address_bride ?: ($weddingCard->wedding_address ?: 'Tư gia Nhà Gái') }}
          </div>

          <div class="row-btns" style="margin-top:20px;gap:8px">
            <a class="btn solid" target="_blank" rel="noopener" href="{{ $weddingCard->bride_map ?: ($weddingCard->google_map_url ?: ('https://www.google.com/maps/search/?api=1&query=' . urlencode($weddingCard->address_bride ?: ($weddingCard->wedding_address ?: 'Tư gia Nhà Gái')))) }}">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a7 7 0 0 0-7 7c0 5.2 7 13 7 13s7-7.8 7-13a7 7 0 0 0-7-7Zm0 9.5A2.5 2.5 0 1 1 12 6.5a2.5 2.5 0 0 1 0 5Z"/></svg>
              Chỉ đường
            </a>
            @if(!empty($weddingCard->bride_phone))
              <a class="btn" href="tel:{{ $weddingCard->bride_phone }}">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79a15.05 15.05 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.02-.24c1.12.37 2.33.57 3.57.57a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.57 3.57a1 1 0 0 1-.25 1.02l-2.2 2.2Z"/></svg>
                Gọi Cô Dâu: {{ $weddingCard->bride_phone }}
              </a>
            @endif
          </div>
        </div>
      </div>

      @if($weddingCard->wedding_location && $weddingCard->wedding_location !== $weddingCard->address_groom && $weddingCard->wedding_location !== $weddingCard->address_bride)
      <div class="panel reveal" style="margin-top:24px;padding:24px;text-align:center">
        <p class="eyebrow" style="color:var(--gold)">TRUNG TÂM TIỆC CƯỚI CHUNG</p>
        <p style="font:600 22px var(--f-display);color:var(--deep);margin-top:6px">{{ $weddingCard->wedding_location }}</p>
        @if($weddingCard->wedding_address)
          <p style="color:var(--muted);font-size:14px;margin-top:4px">{{ $weddingCard->wedding_address }}</p>
        @endif
        @if($weddingCard->google_map_url)
          <div class="row-btns" style="margin-top:14px">
            <a class="btn solid" target="_blank" rel="noopener" href="{{ $weddingCard->google_map_url }}">Chỉ đường trung tâm</a>
          </div>
        @endif
      </div>
      @endif

      <h3 class="title reveal" style="margin-top:56px;font-size:28px">Cùng đếm ngược</h3>
      <div class="cd reveal" id="cd" aria-live="off">
        <div class="panel"><b id="cd-d">--</b><span>Ngày</span></div>
        <div class="panel"><b id="cd-h">--</b><span>Giờ</span></div>
        <div class="panel"><b id="cd-m">--</b><span>Phút</span></div>
        <div class="panel"><b id="cd-s">--</b><span>Giây</span></div>
      </div>

      @php
        $cal = $weddingCard->calendar_matrix;
      @endphp
      <div class="cal panel reveal">
        <h3>{{ $cal['month_title'] }}</h3>
        <div class="cal-grid" id="calGrid"></div>
      </div>

      <div class="row-btns reveal">
        <a class="btn" id="gcal" target="_blank" rel="noopener">Thêm vào lịch</a>
        <button class="btn solid" id="rsvpToggle" type="button">Xác nhận tham dự</button>
      </div>

      <form class="rsvp panel" id="rsvp" hidden>
        <h3>Xác nhận tham dự</h3>
        <label for="r-name">Họ và tên<input type="text" id="r-name" required maxlength="60" placeholder="Nguyễn Văn A"></label>
        <div class="choice" role="radiogroup" aria-label="Bạn có tham dự không">
          <label><input type="radio" name="att" value="yes" checked><span>Mình sẽ đến</span></label>
          <label><input type="radio" name="att" value="no"><span>Rất tiếc, mình bận</span></label>
        </div>
        <label for="r-n">Số người đi cùng<input type="number" id="r-n" min="1" max="10" value="1"></label>
        <button class="btn solid" type="submit">Gửi xác nhận</button>
      </form>
      <p class="thanks" id="rsvpOk" hidden></p>
    </div>
  </section>

  <!-- ===================== DRESS CODE ===================== -->
  <section style="padding-top:0">
    <div class="wrap">
      <p class="eyebrow reveal">Dress code</p>
      <h2 class="title reveal">Trang phục dự tiệc</h2>
      <div class="dress reveal" aria-label="Gợi ý màu trang phục">
        @if (!empty($weddingCard->dresscode_colors_list) && count($weddingCard->dresscode_colors_list) > 0)
          @foreach ($weddingCard->dresscode_colors_list as $color)
            <i style="--c:{{ $color['hex'] }}" title="{{ $color['name'] ?? '' }}"></i>
          @endforeach
        @else
          <i style="--c:#1f6b53" title="Xanh ngọc"></i><i style="--c:#f3eddb" title="Kem"></i><i style="--c:#c9a24e" title="Vàng đồng"></i><i style="--c:#ffffff" title="Trắng"></i>
        @endif
      </div>
      <p class="dress-note reveal">{{ $weddingCard->dresscode_note ?: 'Gam xanh lá, kem hoặc trắng sẽ hợp với không gian buổi tiệc.' }}</p>
    </div>
  </section>

  <!-- ===================== SCHEDULE ===================== -->
  <section style="padding-top:0">
    <div class="wrap">
      <p class="eyebrow reveal">Chương trình</p>
      <h2 class="title reveal">Lịch trình ngày cưới</h2>
      <ol class="timeline reveal">
        @if (!empty($weddingCard->timeline_list) && count($weddingCard->timeline_list) > 0)
          @foreach ($weddingCard->timeline_list as $item)
            <li><time>{{ $item['time'] ?? '' }}</time><span>{{ $item['title'] ?? ($item['description'] ?? '') }}</span></li>
          @endforeach
        @else
          <li><time>17:30</time><span>Đón khách</span></li>
          <li><time>18:30</time><span>Khai tiệc</span></li>
          <li><time>18:45</time><span>Rót rượu, cắt bánh</span></li>
          <li><time>19:00</time><span>Phục vụ món chính</span></li>
          <li><time>21:00</time><span>Kết thúc tiệc</span></li>
        @endif
      </ol>
    </div>
  </section>

  <!-- ===================== GUESTBOOK ===================== -->
  <section class="album">
    <div class="wrap">
      <p class="eyebrow reveal">Gửi lời chúc</p>
      <h2 class="title reveal">Sổ lưu bút</h2>
      <div class="rule reveal" aria-hidden="true">❦</div>
      <form class="gb-form panel reveal" id="gbForm">
        <label for="gb-name">Tên của bạn<input type="text" id="gb-name" maxlength="40" required placeholder="Gia đình cô Lan"></label>
        <label for="gb-msg">Lời chúc<textarea id="gb-msg" maxlength="280" required placeholder="Chúc hai bạn trăm năm hạnh phúc..."></textarea></label>
        <button class="btn solid" type="submit">Gửi lời chúc</button>
      </form>
      <div class="gb-list" id="gbList"></div>
    </div>
  </section>

  <!-- ===================== GIFT BOX ===================== -->
  <section class="gift">
    <div class="wrap">
      <p class="eyebrow reveal">Mừng cưới</p>
      <h2 class="title reveal">Hộp quà mừng</h2>
      <div class="sparks reveal" aria-hidden="true"><b>✦</b><b>✦</b><b>✦</b><b>✦</b></div>
      <button class="giftbox reveal" id="giftBtn" type="button" aria-label="Mở hộp quà mừng">
        <svg viewBox="0 0 60 64" fill="none">
          <rect x="6" y="28" width="48" height="32" rx="2" fill="currentColor" opacity=".92"/>
          <rect x="27" y="28" width="6" height="32" fill="var(--gold)"/>
          <g class="lid"><rect x="2" y="16" width="56" height="14" rx="2" fill="currentColor"/><rect x="27" y="16" width="6" height="14" fill="var(--gold)"/>
          <path d="M30 16c-8-12-18-6-12 0 4 3 12 0 12 0Zm0 0c8-12 18-6 12 0-4 3-12 0-12 0Z" stroke="var(--gold)" stroke-width="2.4" fill="none" stroke-linejoin="round"/></g>
          <text x="30" y="50" text-anchor="middle" font-family="Noto Serif SC,serif" font-weight="900" font-size="15" fill="var(--paper)">囍</text>
        </svg>
        <small>Nhấn để mở</small>
      </button>
    </div>
  </section>

  <footer>
    <div class="wrap reveal">
      <span class="han" aria-hidden="true">囍</span>
      <p>{{ $weddingCard->message_thanks ?: 'Sự hiện diện của quý khách là niềm vinh hạnh của gia đình chúng tôi!' }}</p>
      <small>{{ $weddingCard->groom_name }} &amp; {{ $weddingCard->bride_name }} · {{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format('d.m.Y') : '20.12.2026' }}</small>
    </div>
  </footer>
</main>

<!-- lightbox -->
<div class="lightbox" id="lb" role="dialog" aria-modal="true" aria-label="Xem ảnh">
  <div class="lb-top"><span id="lbCount">1 / 6</span><button class="lb-btn" id="lbClose" type="button" aria-label="Đóng">✕</button></div>
  <div class="lb-stage"><button class="lb-btn" id="lbPrev" type="button" aria-label="Ảnh trước">‹</button><img id="lbImg" alt=""><button class="lb-btn" id="lbNext" type="button" aria-label="Ảnh sau">›</button></div>
  <div class="lb-thumbs" id="lbThumbs"></div>
</div>

<!-- gift modal -->
<div class="modal" id="giftModal" role="dialog" aria-modal="true" aria-label="Mừng cưới">
  <div class="sheet">
    <button class="x" id="giftClose" type="button" aria-label="Đóng">✕</button>
    <h3>Hộp quà mừng</h3>
    <div class="tabs" role="tablist">
      <button role="tab" id="tab0" aria-selected="true" type="button">Chú rể</button>
      <button role="tab" id="tab1" aria-selected="false" type="button">Cô dâu</button>
    </div>
    <div class="qr" id="qrBox"></div>
    <div class="acct"><span id="bank"></span><b id="acctNo"></b><span id="acctName"></span></div>
    <div class="row-btns"><button class="btn" id="copyAcct" type="button">Sao chép số tài khoản</button></div>
    <p class="acct" style="font-size:12px">{{ $weddingCard->message_gift ?: 'Quét mã QR hoặc chuyển khoản mừng cưới' }}</p>
  </div>
</div>

<script>
(function(){
  var $=function(s,r){return (r||document).querySelector(s)};
  var reduce=window.matchMedia&&matchMedia('(prefers-color-scheme: x)')&&matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ---- scattered 囍 on cover ---- */
  var sc=$('#scatter'),pts=[[6,8,28,.35,-14,7],[82,6,38,.28,12,9],[18,24,20,.25,8,6],[70,26,24,.3,-8,8],[4,46,34,.22,16,10],[90,50,26,.3,-18,7],[14,68,30,.3,10,9],[78,72,36,.26,-12,11],[44,88,22,.3,6,8],[60,92,28,.22,-10,7],[30,6,18,.25,0,6],[92,86,20,.3,14,9]];
  pts.forEach(function(p){var s=document.createElement('span');s.className='han';s.textContent='囍';
    s.style.cssText='--x:'+p[0]+'%;--y:'+p[1]+'%;--s:'+p[2]+'px;--o:'+p[3]+';--r:'+p[4]+'deg;--d:'+p[5]+'s';sc.appendChild(s)});
  document.body.classList.add('locked');

  /* ---- placeholder photos (swap for real photos by replacing these data URIs with image URLs) ---- */
  var palettes=[['#1f6b53','#0d3b2e','#e2c27a'],['#7fb69a','#2f7d62','#f6f1e0'],['#c9a24e','#6b5420','#fbf3dc'],['#2f7d62','#0a2a20','#bfe0cd'],['#a9d1b8','#3f8f73','#fffaf0'],['#0f4636','#1f6b53','#e2c27a']];
  function photo(i){
    var c=palettes[i%palettes.length],id='g'+i;
    var svg='<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 800"><defs><linearGradient id="'+id+'" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="'+c[0]+'"/><stop offset="1" stop-color="'+c[1]+'"/></linearGradient></defs>'
     +'<rect width="600" height="800" fill="url(#'+id+')"/>'
     +'<g fill="none" stroke="'+c[2]+'" stroke-opacity=".35" stroke-width="2">'+[0,1,2,3,4,5,6].map(function(k){return '<circle cx="300" cy="'+(330+k*4)+'" r="'+(60+k*38)+'"/>'}).join('')+'</g>'
     +'<ellipse cx="220" cy="660" rx="120" ry="26" fill="'+c[1]+'" opacity=".5"/><path d="M40 800C80 640 160 560 210 470c30 80 10 200-20 330Z" fill="'+c[2]+'" opacity=".16"/><path d="M560 800C520 650 450 570 400 480c-34 82-4 196 20 320Z" fill="'+c[2]+'" opacity=".2"/>'
     +'<circle cx="300" cy="300" r="70" fill="'+c[2]+'" opacity=".22"/>'
     +'<text x="300" y="338" text-anchor="middle" font-family="Noto Serif SC,serif" font-weight="900" font-size="120" fill="'+c[2]+'">囍</text>'
     +'<text x="300" y="740" text-anchor="middle" font-family="Georgia,serif" font-style="italic" font-size="30" fill="'+c[2]+'" opacity=".85">Ảnh cưới '+(i+1)+'</text></svg>';
    return 'data:image/svg+xml;charset=utf-8,'+encodeURIComponent(svg);
  }
  @php
    $albumData = !empty($weddingCard->album) ? (is_string($weddingCard->album) ? json_decode($weddingCard->album, true) : $weddingCard->album) : [];
    $albumPhotosJson = json_encode(!empty($albumData) && is_array($albumData) ? array_values(array_map(function($img) {
        return str_starts_with($img, 'http') ? $img : asset('storage/' . $img);
    }, $albumData)) : []);
  @endphp
  var defaultPhotos=[0,1,2,3,4,5].map(photo);
  var dbPhotos = {!! $albumPhotosJson ?: '[]' !!};
  var photos = (Array.isArray(dbPhotos) && dbPhotos.length > 0) ? dbPhotos : defaultPhotos;
  @php
    $heroCover28 = !empty($weddingCard->cover_image)
        ? (str_starts_with($weddingCard->cover_image, 'http') ? $weddingCard->cover_image : asset('storage/' . $weddingCard->cover_image))
        : (!empty($weddingCard->banner_preview)
            ? (str_starts_with($weddingCard->banner_preview, 'http') ? $weddingCard->banner_preview : asset('storage/' . $weddingCard->banner_preview))
            : '');
  @endphp
  $('#heroPhoto').src= '{{ $heroCover28 }}' || photos[0];

  /* ---- album + lightbox ---- */
  var thumbs=$('#lbThumbs'),cur=0;
  photos.forEach(function(src,i){
    var t=document.createElement('button');t.type='button';t.setAttribute('aria-label','Ảnh '+(i+1));t.innerHTML='<img alt="">';t.firstChild.src=src;t.addEventListener('click',function(){show(i)});thumbs.appendChild(t);
  });
  var lb=$('#lb');
  function show(i){cur=(i+photos.length)%photos.length;$('#lbImg').src=photos[cur];$('#lbImg').alt='Ảnh cưới '+(cur+1);$('#lbCount').textContent=(cur+1)+' / '+photos.length;
    Array.prototype.forEach.call(thumbs.children,function(t,k){t.className=k===cur?'on':''});}
  function openLb(i){lb.classList.add('open');show(i);$('#lbClose').focus()}
  function closeLb(){lb.classList.remove('open')}
  $('#lbClose').onclick=closeLb;$('#lbPrev').onclick=function(){show(cur-1)};$('#lbNext').onclick=function(){show(cur+1)};
  lb.addEventListener('click',function(e){if(e.target===lb)closeLb()});
  var tx=0;lb.addEventListener('touchstart',function(e){tx=e.changedTouches[0].clientX},{passive:true});
  lb.addEventListener('touchend',function(e){var dx=e.changedTouches[0].clientX-tx;if(Math.abs(dx)>50)show(cur+(dx<0?1:-1))},{passive:true});
  document.addEventListener('keydown',function(e){
    if(lb.classList.contains('open')){if(e.key==='Escape')closeLb();if(e.key==='ArrowLeft')show(cur-1);if(e.key==='ArrowRight')show(cur+1)}
    if(e.key==='Escape')closeGift();
  });

  /* ---- album slideshow (coverflow, auto-advances every 2s) ---- */
  var car=$('#carousel'),dotsEl=$('#dots'),slides=[],ci=0,hold=false,auto=null,INTERVAL=2000;
  photos.forEach(function(src,i){
    var s=document.createElement('button');s.type='button';s.className='slide';s.setAttribute('aria-label','Ảnh '+(i+1));
    s.innerHTML='<img alt="Ảnh cưới '+(i+1)+'" draggable="false">';s.firstChild.src=src;
    s.addEventListener('click',function(){if(i===ci)openLb(i);else go(i,true)});
    car.appendChild(s);slides.push(s);
    var d=document.createElement('button');d.type='button';d.className='dot';d.setAttribute('aria-label','Chuyển tới ảnh '+(i+1));
    d.addEventListener('click',function(){go(i,true)});dotsEl.appendChild(d);
  });
  function layout(){
    var n=slides.length;
    slides.forEach(function(s,i){
      var d=i-ci;if(d>n/2)d-=n;if(d<-n/2)d+=n;var a=Math.abs(d);
      s.style.setProperty('--d',d);s.style.setProperty('--a',Math.min(a,3));
      s.style.zIndex=10-a;s.style.opacity=a===0?1:a===1?.9:a===2?.35:0;
      s.style.pointerEvents=a>1?'none':'auto';s.tabIndex=a===0?0:-1;
    });
    Array.prototype.forEach.call(dotsEl.children,function(d,i){d.className='dot'+(i===ci?' on':'')});
  }
  function go(i,manual){var n=slides.length;ci=(i+n)%n;layout();if(manual)restart()}
  function restart(){clearInterval(auto);if(reduce)return;auto=setInterval(function(){
    if(hold||document.hidden||lb.classList.contains('open'))return;go(ci+1)},INTERVAL)}
  layout();restart();
  car.addEventListener('mouseenter',function(){hold=true});car.addEventListener('mouseleave',function(){hold=false});
  var sx=0;
  car.addEventListener('touchstart',function(e){sx=e.changedTouches[0].clientX;hold=true},{passive:true});
  car.addEventListener('touchend',function(e){var dx=e.changedTouches[0].clientX-sx;hold=false;if(Math.abs(dx)>40)go(ci+(dx<0?1:-1),true)},{passive:true});
  car.addEventListener('keydown',function(e){if(e.key==='ArrowLeft')go(ci-1,true);if(e.key==='ArrowRight')go(ci+1,true)});

  /* ---- petals ---- */
  var pl=$('#petals');
  if(!reduce){for(var k=0;k<12;k++){var i=document.createElement('i');i.textContent=k%3===0?'囍':(k%2?'❀':'✿');if(k%3===0)i.className='han';
    i.style.cssText='--x:'+(Math.random()*96).toFixed(1)+'%;--s:'+(12+Math.random()*14).toFixed(0)+'px;--d:'+(14+Math.random()*12).toFixed(1)+'s;--w:-'+(Math.random()*20).toFixed(1)+'s';pl.appendChild(i)}}

  /* ---- scroll reveal ---- */
  var io=('IntersectionObserver' in window)?new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){e.target.classList.add('in');io.unobserve(e.target)}})},{threshold:.12,rootMargin:'0px 0px -6% 0px'}):null;
  function watch(){document.querySelectorAll('.reveal').forEach(function(el){if(io)io.observe(el);else el.classList.add('in')})}

  /* ---- music (soft pentatonic loop via WebAudio, started by the open button) ---- */
  var ctx=null,timer=null,playing=false,step=0,mbtn=$('#music');
  var seq=[392,440,523.25,587.33,659.25,587.33,523.25,440,392,329.63,392,440,523.25,440,392,329.63];
  function note(f,t,d,v){var o=ctx.createOscillator(),g=ctx.createGain();o.type='sine';o.frequency.value=f;g.gain.setValueAtTime(0,t);g.gain.linearRampToValueAtTime(v,t+.04);g.gain.exponentialRampToValueAtTime(.0008,t+d);o.connect(g).connect(ctx.destination);o.start(t);o.stop(t+d+.05)}
  function tick(){var t=ctx.currentTime+.05,f=seq[step%seq.length];note(f,t,1.6,.07);note(f/2,t,2.2,.045);if(step%4===0)note(f*1.5,t+.02,1.2,.025);step++}
  function setMusic(on){
    try{
      if(on){ctx=ctx||new (window.AudioContext||window.webkitAudioContext)();if(ctx.resume)ctx.resume();clearInterval(timer);tick();timer=setInterval(tick,640);playing=true}
      else{clearInterval(timer);playing=false}
    }catch(e){playing=false}
    mbtn.classList.toggle('on',playing);mbtn.setAttribute('aria-label',playing?'Tắt nhạc nền':'Bật nhạc nền');
  }
  mbtn.onclick=function(){setMusic(!playing)};

  /* ---- open the invitation ---- */
  $('#openBtn').addEventListener('click',function(){
    $('#main').hidden=false;mbtn.hidden=false;
    $('#cover').classList.add('gone');document.body.classList.remove('locked');window.scrollTo(0,0);
    setTimeout(function(){$('#cover').style.display='none'},1700);
    watch();setMusic(true);
  });

  /* ---- countdown ---- */
  var weddingDateStr = '{{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format("Y-m-d") : "2026-12-20" }}';
  var weddingTimeStr = '{{ !empty($weddingCard->wedding_time) && preg_match("/^\d{1,2}:\d{2}$/", trim($weddingCard->wedding_time)) ? trim($weddingCard->wedding_time) . ":00" : "18:00:00" }}';
  var target=new Date(weddingDateStr + 'T' + weddingTimeStr + '+07:00').getTime();
  function pad(n){return n<10?'0'+n:''+n}
  function cd(){
    var d=Math.max(0,target-Date.now()),s=Math.floor(d/1000);
    $('#cd-d').textContent=Math.floor(s/86400);$('#cd-h').textContent=pad(Math.floor(s%86400/3600));
    $('#cd-m').textContent=pad(Math.floor(s%3600/60));$('#cd-s').textContent=pad(s%60);
  }
  cd();setInterval(cd,1000);

  /* ---- calendar (Monday first) ---- */
  var g=$('#calGrid');
  var calYear = {{ $cal['year'] }};
  var calMonth = {{ $cal['month'] }} - 1;
  var calActiveDay = {{ $cal['active_day'] }};
  var first=new Date(calYear, calMonth, 1),off=(first.getDay()+6)%7,dim={{ $cal['total_days'] }};
  ['T2','T3','T4','T5','T6','T7','CN'].forEach(function(h){var e=document.createElement('div');e.className='h';e.textContent=h;g.appendChild(e)});
  for(var b=0;b<off;b++)g.appendChild(document.createElement('div'));
  for(var d=1;d<=dim;d++){var e=document.createElement('div');e.className='d';var dow=(off+d-1)%7;if(dow===6)e.className+=' sun';if(d===calActiveDay)e.className+=' hit';e.textContent=d;g.appendChild(e)}

  /* ---- add to calendar ---- */
  var title='Đám cưới ' + {!! json_encode($weddingCard->couple_name) !!};
  var loc={!! json_encode(($weddingCard->wedding_location ?: '') . ', ' . ($weddingCard->wedding_address ?: '')) !!};
  var calDate = '{{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format("Ymd") : "20261220" }}';
  var calTime = '{{ !empty($weddingCard->wedding_time) && preg_match("/^\d{1,2}:\d{2}$/", trim($weddingCard->wedding_time)) ? str_replace(":", "", trim($weddingCard->wedding_time)) . "00" : "110000" }}';
  $('#gcal').href='https://www.google.com/calendar/render?action=TEMPLATE&text='+encodeURIComponent(title)+'&dates='+calDate+'T'+calTime+'/'+calDate+'T'+calTime+'&ctz=Asia/Ho_Chi_Minh&details='+encodeURIComponent('Tiệc cưới của ' + {!! json_encode($weddingCard->couple_name) !!})+'&location='+encodeURIComponent(loc);

  /* ---- RSVP ---- */
  var KEY_R='songhy-rsvp',KEY_G='songhy-guestbook';
  function lsGet(k){try{return JSON.parse(localStorage.getItem(k)||'null')}catch(e){return null}}
  function lsSet(k,v){try{localStorage.setItem(k,JSON.stringify(v))}catch(e){}}
  function rsvpDone(r){
    $('#rsvp').hidden=true;$('#rsvpToggle').hidden=true;var t=$('#rsvpOk');t.hidden=false;
    t.textContent=r.att==='yes'?'Cảm ơn '+r.name+'! Hẹn gặp bạn tại buổi tiệc.':'Cảm ơn '+r.name+' đã báo lại. Chúc bạn nhiều niềm vui!';
  }
  var prev=lsGet(KEY_R);if(prev&&prev.name)rsvpDone(prev);
  $('#rsvpToggle').onclick=function(){var f=$('#rsvp');f.hidden=!f.hidden;if(!f.hidden)$('#r-name').focus()};
  $('#rsvp').addEventListener('submit',function(e){e.preventDefault();
    var name=$('#r-name').value.trim();if(!name)return;
    var r={name:name,att:($('input[name=att]:checked')||{}).value||'yes',n:+$('#r-n').value||1};lsSet(KEY_R,r);rsvpDone(r)});

  /* ---- guestbook ---- */
  var sample=[
    {n:'Gia đình cô Lan',m:'Chúc hai cháu trăm năm hạnh phúc, sớm sinh quý tử!',t:'Hôm nay'},
    {n:'Quỳnh Như',m:'Mong tổ ấm nhỏ này sẽ sớm rộn rã tiếng cười và hạnh phúc viên mãn.',t:'Hôm qua'},
    {n:'Anh Tuấn',m:'Chúc hai bạn xây dựng một mái ấm tràn đầy tiếng cười và niềm vui.',t:'3 ngày trước'}
  ];
  function esc(s){var d=document.createElement('div');d.textContent=s;return d.innerHTML}
  function renderGb(){
    var mine=lsGet(KEY_G)||[],all=mine.concat(sample);
    $('#gbList').innerHTML=all.map(function(x){return '<article class="gb-item"><header><b>'+esc(x.n)+'</b><span>'+esc(x.t)+'</span></header><p>'+esc(x.m)+'</p></article>'}).join('');
  }
  renderGb();
  $('#gbForm').addEventListener('submit',function(e){e.preventDefault();
    var n=$('#gb-name').value.trim(),m=$('#gb-msg').value.trim();if(!n||!m)return;
    var mine=lsGet(KEY_G)||[];var now=new Date();
    mine.unshift({n:n,m:m,t:pad(now.getHours())+':'+pad(now.getMinutes())+' '+now.getDate()+'/'+(now.getMonth()+1)});lsSet(KEY_G,mine.slice(0,30));
    $('#gb-msg').value='';renderGb();$('#gbList').scrollTop=0});

  /* ---- gift box ---- */
  var accts=[
    {bank:'{{ $weddingCard->groom_bank_name ?: 'Vietcombank' }}',no:'{{ $weddingCard->groom_bank_account ?: ($weddingCard->groom_bank_number ?: '0123456789') }}',name:'{{ $weddingCard->groom_bank_owner ?: $weddingCard->groom_name }}',qr:'{{ $weddingCard->groom_qr_url }}',tab:'tab0'},
    {bank:'{{ $weddingCard->bride_bank_name ?: 'BIDV' }}',no:'{{ $weddingCard->bride_bank_account ?: ($weddingCard->bride_bank_number ?: '9876543210') }}',name:'{{ $weddingCard->bride_bank_owner ?: $weddingCard->bride_name }}',qr:'{{ $weddingCard->bride_qr_url }}',tab:'tab1'}
  ],cg=0,gm=$('#giftModal');
  function showAcct(i){cg=i;var a=accts[i];
    $('#tab0').setAttribute('aria-selected',i===0);$('#tab1').setAttribute('aria-selected',i===1);
    $('#bank').textContent=a.bank;$('#acctNo').textContent=a.no;$('#acctName').textContent=a.name;
    var box=$('#qrBox');
    if(a.qr){
      box.innerHTML='<img src="'+a.qr+'" alt="QR" style="width:100%;height:100%;object-fit:contain;border-radius:4px;">';
    }else{
      try{var q=qrcode(0,'M');q.addData('Mung cuoi | '+a.bank+' | '+a.no+' | '+a.name);q.make();box.innerHTML=q.createSvgTag({cellSize:4,margin:0,scalable:true})}
      catch(e){box.textContent='QR'}
    }
  }
  function openGift(){gm.classList.add('open');showAcct(0);$('#giftClose').focus()}
  function closeGift(){gm.classList.remove('open')}
  $('#giftBtn').onclick=openGift;$('#giftClose').onclick=closeGift;
  gm.addEventListener('click',function(e){if(e.target===gm)closeGift()});
  $('#tab0').onclick=function(){showAcct(0)};$('#tab1').onclick=function(){showAcct(1)};
  $('#copyAcct').onclick=function(){var btn=this,txt=accts[cg].no;
    function ok(){btn.textContent='Đã sao chép';setTimeout(function(){btn.textContent='Sao chép số tài khoản'},1800)}
    try{navigator.clipboard.writeText(txt).then(ok,function(){sel()})}catch(e){sel()}
    function sel(){var r=document.createRange();r.selectNodeContents($('#acctNo'));var s=getSelection();s.removeAllRanges();s.addRange(r);btn.textContent='Hãy nhấn Ctrl+C'}};
})();
</script>

    <!-- Universal Laravel AJAX Wishes & RSVP Integration -->
    <script>
    (function() {
        const cardId = {{ $weddingCard->id }};
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';
        const wishStoreUrl = "{{ route('wishes.store', $weddingCard->id) }}";
        const wishIndexUrl = "{{ route('wishes.index', $weddingCard->id) }}";

        window.submitLaravelWish = function(senderName, message, attendanceStatus = 'unsure', guestCount = 1) {
            return fetch(wishStoreUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    sender_name: senderName,
                    message: message || 'Chúc mừng hai bạn trăm năm hạnh phúc!',
                    attendance_status: attendanceStatus,
                    guest_count: guestCount
                })
            }).then(r => r.json());
        };

        // Listen for form submissions
        document.addEventListener('submit', function(e) {
            const form = e.target;
            const isWish = form.id === 'wishForm' || form.id === 'wish-form' || form.classList.contains('guestbook-form');
            const isRsvp = form.id === 'rsvp-form' || form.id === 'rsvp' || form.classList.contains('rsvp');

            if (isWish || isRsvp) {
                const nameInput = form.querySelector('#guestNameInput, #wish-name, #wish-author, #r-name, #rsvp-name, input[name="name"], input[name="sender_name"]');
                const msgInput = form.querySelector('#guestWishInput, #wish-message, #r-msg, #rsvp-msg, textarea[name="message"]');
                const attInput = form.querySelector('input[name="att"]:checked, input[name="attendance"]:checked, select[name="attendance"]');
                const countInput = form.querySelector('input[name="guest_count"], select[name="guest_count"]');

                const name = nameInput ? nameInput.value.trim() : '';
                const message = msgInput ? msgInput.value.trim() : '';
                const attendance = attInput ? attInput.value : (isRsvp ? 'attending' : 'unsure');
                const count = countInput ? parseInt(countInput.value) || 1 : 1;

                if (name) {
                    window.submitLaravelWish(name, message, attendance, count).then(res => {
                        console.log('Wish stored in Laravel DB:', res);
                    }).catch(err => console.error('Error saving wish to Laravel:', err));
                }
            }
        }, true);
    })();
    </script>
</body></html>