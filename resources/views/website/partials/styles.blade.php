@verbatim
<style>
:root{
  --bg:#FAFAF5;--bg2:#F3EEE4;--bg3:#EAE3D6;--white:#FFFFFF;
  --g:#2D7D52;--gd:#236640;--gl:#D6EDDE;--gb:#8FC9A5;
  --c:#C8551C;--cd:#A8420E;--cl:#FAE2D4;--cb:#EBA07C;
  --b:#3A5CA8;--bd:#2D4A8C;--bl:#D8E2F5;--bb:#8FAADE;
  --a:#B87A10;--al:#FDF0D5;--ab:#E8C06A;
  --ink:#18211A;--ink2:#2A3A2D;--mid:#4D6050;--sub:#7A8A7D;--mist:#A8B5AA;
  --bdr:#DDD8CC;--bdr2:#C8C2B4;
  --f1:'Playfair Display',Georgia,serif;--f2:'DM Sans',system-ui,sans-serif;
  --r4:4px;--r8:8px;--r12:12px;--r16:16px;--r20:20px;--r24:24px;--rp:999px;
  --s1:0 1px 4px rgba(0,0,0,.06),0 1px 2px rgba(0,0,0,.04);
  --s2:0 4px 14px rgba(0,0,0,.08),0 2px 4px rgba(0,0,0,.05);
  --s3:0 10px 28px rgba(0,0,0,.10),0 4px 8px rgba(0,0,0,.05);
  --s4:0 20px 50px rgba(0,0,0,.12),0 8px 16px rgba(0,0,0,.06);
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
body{font-family:var(--f2);background:var(--bg);color:var(--ink);line-height:1.65;-webkit-font-smoothing:antialiased;overflow-x:hidden}
a{color:inherit;text-decoration:none}img{display:block;max-width:100%}
button{font-family:var(--f2);cursor:pointer;border:none;background:none}ul,ol{list-style:none}

/* ── TYPOGRAPHY ── */
.h1{font-family:var(--f1);font-size:clamp(2.1rem,5vw,3.8rem);font-weight:700;line-height:1.08;letter-spacing:-.022em;color:var(--ink)}
.h2{font-family:var(--f1);font-size:clamp(1.65rem,3.5vw,2.7rem);font-weight:700;line-height:1.13;letter-spacing:-.018em;color:var(--ink)}
.h3{font-family:var(--f1);font-size:clamp(1.05rem,2vw,1.35rem);font-weight:600;line-height:1.24;color:var(--ink)}
.body-lg{font-size:1.03rem;color:var(--mid);line-height:1.78}
.body{font-size:.9rem;color:var(--mid);line-height:1.72}

/* ── LAYOUT ── */
.wrap{max-width:1180px;margin:0 auto;padding:0 22px}
.sec{padding:88px 0}.sec-sm{padding:64px 0}

/* ── EYEBROW ── */
.eyebrow{display:inline-flex;align-items:center;gap:8px;font-size:.68rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--g);margin-bottom:14px}
.eyebrow::before{content:'';width:20px;height:2px;background:var(--g);border-radius:2px;flex-shrink:0}
.eyebrow.c{color:var(--c)}.eyebrow.c::before{background:var(--c)}
.eyebrow.b{color:var(--b)}.eyebrow.b::before{background:var(--b)}
.eyebrow.center{justify-content:center}

/* ── TAGS ── */
.tag{display:inline-flex;align-items:center;padding:3px 11px;border-radius:var(--rp);font-size:.66rem;font-weight:700;letter-spacing:.05em;text-transform:uppercase;border:1.5px solid}
.tag-g{background:var(--gl);color:var(--g);border-color:var(--gb)}
.tag-c{background:var(--cl);color:var(--c);border-color:var(--cb)}
.tag-b{background:var(--bl);color:var(--b);border-color:var(--bb)}
.tag-a{background:var(--al);color:var(--a);border-color:var(--ab)}
.tag-n{background:var(--bg2);color:var(--sub);border-color:var(--bdr)}

/* ── BUTTONS ── */
.btn{display:inline-flex;align-items:center;justify-content:center;gap:7px;padding:11px 22px;border-radius:var(--rp);font-family:var(--f2);font-weight:700;font-size:.875rem;line-height:1;border:2px solid transparent;cursor:pointer;transition:all .2s cubic-bezier(.34,1.44,.64,1);white-space:nowrap;text-decoration:none}
.btn:active{transform:scale(.97)!important}
.btn-g{background:var(--g);color:#fff;border-color:var(--g);box-shadow:0 3px 12px rgba(45,125,82,.32)}
.btn-g:hover{background:var(--gd);box-shadow:0 6px 22px rgba(45,125,82,.42);transform:translateY(-2px)}
.btn-c{background:var(--c);color:#fff;border-color:var(--c);box-shadow:0 3px 12px rgba(200,85,28,.3)}
.btn-c:hover{background:var(--cd);box-shadow:0 6px 22px rgba(200,85,28,.4);transform:translateY(-2px)}
.btn-b{background:var(--b);color:#fff;border-color:var(--b);box-shadow:0 3px 12px rgba(58,92,168,.3)}
.btn-b:hover{background:var(--bd);box-shadow:0 6px 22px rgba(58,92,168,.4);transform:translateY(-2px)}
.btn-out{background:transparent;color:var(--ink);border-color:var(--bdr2)}
.btn-out:hover{border-color:var(--g);color:var(--g);background:var(--gl)}
.btn-sm{padding:8px 18px;font-size:.82rem}.btn-lg{padding:14px 28px;font-size:.94rem}

/* ── PROGRESS ── */
#prog{position:fixed;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--g),var(--a),var(--c));transform:scaleX(0);transform-origin:left;z-index:9999;pointer-events:none;transition:transform .08s linear}

/* ── HEADER ── */
#hdr{position:fixed;top:0;left:0;right:0;z-index:400;background:rgba(250,250,245,.94);backdrop-filter:blur(18px);border-bottom:1px solid transparent;transition:all .25s;padding:13px 0}
#hdr.stuck{border-color:var(--bdr);box-shadow:var(--s2);padding:9px 0}
.hdr-row{display:flex;align-items:center;gap:10px}
.logo{display:flex;align-items:center;gap:10px;font-family:var(--f1);font-size:1.22rem;font-weight:700;color:var(--ink);flex-shrink:0}
.logo-mark{width:38px;height:38px;border-radius:10px;background:linear-gradient(135deg,var(--g),var(--a));display:flex;align-items:center;justify-content:center;font-size:1rem;box-shadow:0 2px 10px rgba(45,125,82,.3);flex-shrink:0}
.logo em{color:var(--g);font-style:italic}
.nav{display:flex;align-items:center;gap:1px;margin-left:auto}
.nav-a{padding:8px 13px;border-radius:var(--r8);font-size:.875rem;font-weight:600;color:var(--mid);cursor:pointer;transition:all .15s;display:flex;align-items:center;gap:4px;position:relative;border:none;background:none}
.nav-a:hover,.nav-a.on{color:var(--ink);background:var(--bg2)}
.nav-a.on::after{content:'';position:absolute;bottom:3px;left:50%;transform:translateX(-50%);width:15px;height:2px;border-radius:2px;background:var(--g)}
.caret{font-size:.55rem;opacity:.4;transition:transform .2s}
.dd-w{position:relative}
.dd-w:hover .dd,.dd-w:focus-within .dd{opacity:1;visibility:visible;transform:translateX(-50%) translateY(0);pointer-events:all}
.dd-w:hover .caret{transform:rotate(180deg)}
.dd{position:absolute;top:calc(100% + 10px);left:50%;transform:translateX(-50%) translateY(-8px);min-width:268px;background:#fff;border:1.5px solid var(--bdr);border-radius:var(--r16);padding:7px;box-shadow:var(--s4);opacity:0;visibility:hidden;pointer-events:none;transition:all .2s ease}
.dd-item{display:flex;align-items:center;gap:12px;padding:11px 12px;border-radius:var(--r12);color:var(--mid);transition:background .14s}
.dd-item:hover{background:var(--bg2);color:var(--ink)}
.dd-ico{width:38px;height:38px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1.05rem;flex-shrink:0}
.dg{background:var(--gl)}.dc{background:var(--cl)}.db{background:var(--bl)}
.dd-nm{font-size:.87rem;font-weight:700;color:var(--ink)}.dd-sm{font-size:.71rem;color:var(--mist);margin-top:1px}
.hdr-cta{margin-left:14px;flex-shrink:0}
.hbg{display:none;flex-direction:column;gap:5px;width:38px;height:38px;align-items:center;justify-content:center;cursor:pointer;margin-left:auto;border-radius:var(--r8);background:transparent;border:none;padding:8px}
.hbg span{display:block;width:22px;height:2px;background:var(--ink);border-radius:2px;transition:all .25s}
.hbg.open span:nth-child(1){transform:rotate(45deg) translate(5px,5px)}
.hbg.open span:nth-child(2){opacity:0;transform:scaleX(0)}
.hbg.open span:nth-child(3){transform:rotate(-45deg) translate(5px,-5px)}
.hbg:hover{background:var(--bg2)}
#mob{display:none;position:fixed;inset:0;z-index:390;background:#fff;flex-direction:column;align-items:center;justify-content:center;gap:8px;padding:20px}
#mob.open{display:flex}
.mob-x{position:absolute;top:20px;right:20px;width:44px;height:44px;border-radius:50%;background:var(--bg2);display:flex;align-items:center;justify-content:center;color:var(--mid);font-size:1.1rem;cursor:pointer;border:none;transition:background .2s}
.mob-x:hover{background:var(--bg3)}
.mob-a{font-family:var(--f1);font-size:1.6rem;font-weight:600;color:var(--mid);padding:12px 40px;border-radius:var(--r12);transition:all .18s;text-align:center;min-width:200px;display:block}
.mob-a:hover{color:var(--ink);background:var(--bg2)}

/* ── HERO ── */
#hero{padding:128px 0 88px;background:var(--bg);overflow:hidden;position:relative}
.hero-orb{position:absolute;border-radius:50%;pointer-events:none}
.o1{width:560px;height:560px;top:-150px;right:-100px;background:radial-gradient(circle,rgba(45,125,82,.07),transparent 68%)}
.o2{width:400px;height:400px;bottom:-100px;left:-80px;background:radial-gradient(circle,rgba(200,85,28,.06),transparent 68%)}
.o3{width:260px;height:260px;top:60px;left:40%;background:radial-gradient(circle,rgba(184,122,16,.05),transparent 68%)}

/* Continue with rest of styles... */
.rv{opacity:0;transform:translateY(24px);transition:opacity .55s ease,transform .55s ease}
.rv.in{opacity:1;transform:none}

/* ── RESPONSIVE ── */
@media(max-width:1040px){.tools-grid{grid-template-columns:1fr 1fr}}
@media(max-width:768px){.nav,.hdr-cta{display:none}.hbg{display:flex}}
@media(max-width:560px){.tools-grid{grid-template-columns:1fr}}
</style>
@endverbatim
