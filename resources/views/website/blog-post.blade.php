@extends('website.layouts.app')

@section('title', $blog->meta_title ?? $blog->title)
@section('description', $blog->meta_description ?? strip_tags($blog->tldr_summary ?? ''))

@section('content')

<!-- Include Styles -->
@include('website.partials.styles')
<style>
:root{--bg:#FAFAF5;--bg2:#F3EEE4;--bg3:#EAE3D6;--white:#FFFFFF;--g:#2D7D52;--gd:#236640;--gl:#D6EDDE;--gb:#8FC9A5;--c:#C8551C;--cd:#A8420E;--cl:#FAE2D4;--cb:#EBA07C;--b:#3A5CA8;--bd:#2D4A8C;--bl:#D8E2F5;--bb:#8FAADE;--a:#B87A10;--al:#FDF0D5;--ab:#E8C06A;--ink:#18211A;--ink2:#2A3A2D;--mid:#4D6050;--sub:#7A8A7D;--mist:#A8B5AA;--bdr:#DDD8CC;--bdr2:#C8C2B4;--f1:'Playfair Display',Georgia,serif;--f2:'DM Sans',system-ui,sans-serif;--r8:8px;--r12:12px;--r16:16px;--r20:20px;--r24:24px;--rp:999px;--s1:0 1px 4px rgba(0,0,0,.06),0 1px 2px rgba(0,0,0,.04);--s2:0 4px 14px rgba(0,0,0,.08),0 2px 4px rgba(0,0,0,.05);--s3:0 10px 28px rgba(0,0,0,.10),0 4px 8px rgba(0,0,0,.05);--s4:0 20px 50px rgba(0,0,0,.12),0 8px 16px rgba(0,0,0,.06)}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}html{scroll-behavior:smooth}
body{font-family:var(--f2);background:var(--bg);color:var(--ink);line-height:1.65;-webkit-font-smoothing:antialiased;overflow-x:hidden;padding-top:66px}
a{color:inherit;text-decoration:none}button{font-family:var(--f2);cursor:pointer;border:none;background:none}ul,ol{list-style:none}
.wrap{max-width:1180px;margin:0 auto;padding:0 22px}
.btn{display:inline-flex;align-items:center;justify-content:center;gap:7px;padding:11px 22px;border-radius:var(--rp);font-family:var(--f2);font-weight:700;font-size:.875rem;line-height:1;border:2px solid transparent;cursor:pointer;transition:all .2s;white-space:nowrap;text-decoration:none}
.btn:active{transform:scale(.97)!important}
.btn-g{background:var(--g);color:#fff;border-color:var(--g);box-shadow:0 3px 12px rgba(45,125,82,.32)}.btn-g:hover{background:var(--gd);box-shadow:0 6px 22px rgba(45,125,82,.42);transform:translateY(-2px)}
.btn-c{background:var(--c);color:#fff;border-color:var(--c)}.btn-c:hover{background:var(--cd);transform:translateY(-2px)}
.btn-b{background:var(--b);color:#fff;border-color:var(--b)}.btn-b:hover{background:var(--bd);transform:translateY(-2px)}
.btn-out{background:transparent;color:var(--ink);border-color:var(--bdr2)}.btn-out:hover{border-color:var(--g);color:var(--g)}
.btn-sm{padding:8px 17px;font-size:.81rem}.btn-lg{padding:14px 28px;font-size:.93rem}
.badge{display:inline-flex;align-items:center;padding:3px 10px;border-radius:var(--rp);font-size:.67rem;font-weight:700;letter-spacing:.05em;text-transform:uppercase;border:1.5px solid}
.badge-g{background:var(--gl);color:var(--g);border-color:var(--gb)}.badge-c{background:var(--cl);color:var(--c);border-color:var(--cb)}.badge-b{background:var(--bl);color:var(--b);border-color:var(--bb)}.badge-a{background:var(--al);color:var(--a);border-color:var(--ab)}
.eyebrow{display:inline-flex;align-items:center;gap:8px;font-size:.68rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--g);margin-bottom:12px}
.eyebrow::before{content:'';width:20px;height:2px;background:var(--g);border-radius:2px;flex-shrink:0}

/* HEADER */
#prog{position:fixed;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--g),var(--a),var(--c));transform:scaleX(0);transform-origin:left;z-index:9999;pointer-events:none;transition:transform .08s linear}
#hdr{position:fixed;top:0;left:0;right:0;z-index:400;background:rgba(250,250,245,.94);backdrop-filter:blur(18px);border-bottom:1px solid transparent;transition:all .25s;padding:12px 0}
#hdr.stuck{border-color:var(--bdr);box-shadow:var(--s2);padding:8px 0}
.hdr-row{display:flex;align-items:center;gap:10px}
.logo{display:flex;align-items:center;gap:10px;font-family:var(--f1);font-size:1.2rem;font-weight:700;color:var(--ink);flex-shrink:0}
.logo-mark{width:36px;height:36px;border-radius:10px;background:linear-gradient(135deg,var(--g),var(--a));display:flex;align-items:center;justify-content:center;font-size:.95rem;flex-shrink:0}
.logo em{color:var(--g);font-style:italic}
.nav{display:flex;align-items:center;gap:1px;margin-left:auto}
.nav-a{padding:7px 12px;border-radius:var(--r8);font-size:.865rem;font-weight:600;color:var(--mid);cursor:pointer;transition:all .15s;display:flex;align-items:center;gap:4px;position:relative;border:none;background:none}
.nav-a:hover,.nav-a.on{color:var(--ink);background:var(--bg2)}
.nav-a.on::after{content:'';position:absolute;bottom:3px;left:50%;transform:translateX(-50%);width:14px;height:2px;border-radius:2px;background:var(--g)}
.caret{font-size:.55rem;opacity:.4;transition:transform .2s}
.dd-w{position:relative}.dd-w:hover .dd,.dd-w:focus-within .dd{opacity:1;visibility:visible;transform:translateX(-50%) translateY(0);pointer-events:all}.dd-w:hover .caret{transform:rotate(180deg)}
.dd{position:absolute;top:calc(100%+10px);left:50%;transform:translateX(-50%) translateY(-8px);min-width:260px;background:#fff;border:1.5px solid var(--bdr);border-radius:var(--r16);padding:7px;box-shadow:var(--s4);opacity:0;visibility:hidden;pointer-events:none;transition:all .2s}
.dd-item{display:flex;align-items:center;gap:11px;padding:10px 12px;border-radius:var(--r12);color:var(--mid);transition:background .14s}
.dd-item:hover{background:var(--bg2);color:var(--ink)}
.dd-ico{width:36px;height:36px;border-radius:9px;display:flex;align-items:center;justify-content:center;font-size:1rem;flex-shrink:0}
.dg{background:var(--gl)}.dc{background:var(--cl)}.db{background:var(--bl)}
.dd-nm{font-size:.86rem;font-weight:700;color:var(--ink)}.dd-sm{font-size:.71rem;color:var(--mist);margin-top:1px}
.hdr-cta{margin-left:12px;flex-shrink:0}
.hbg{display:none;flex-direction:column;gap:5px;width:36px;height:36px;align-items:center;justify-content:center;margin-left:auto}
.hbg span{display:block;width:22px;height:2px;background:var(--ink);border-radius:2px;transition:all .25s}
.hbg.open span:nth-child(1){transform:rotate(45deg) translate(5px,5px)}.hbg.open span:nth-child(2){opacity:0}.hbg.open span:nth-child(3){transform:rotate(-45deg) translate(5px,-5px)}
#mob{display:none;position:fixed;inset:0;z-index:390;background:#fff;flex-direction:column;align-items:center;justify-content:center;gap:6px}
#mob.open{display:flex}
.mob-x{position:absolute;top:16px;right:18px;width:36px;height:36px;border-radius:50%;background:var(--bg2);display:flex;align-items:center;justify-content:center;color:var(--mid);font-size:.9rem;cursor:pointer}
.mob-a{font-family:var(--f1);font-size:1.75rem;font-weight:600;color:var(--mid);padding:7px 28px;border-radius:var(--r12);transition:color .18s;text-align:center}.mob-a:hover{color:var(--ink)}

/* POST HERO */
.post-hero{background:linear-gradient(135deg,var(--gl) 0%,var(--bg2) 55%,var(--al) 100%);padding:52px 0 0;border-bottom:1px solid var(--bdr);position:relative;overflow:hidden}
.ph-blob{position:absolute;width:260px;height:260px;border-radius:50%;top:-70px;right:-50px;background:radial-gradient(circle,rgba(45,125,82,.1),transparent 70%);pointer-events:none}
.ph-inner{position:relative;z-index:1}
.bc{display:flex;align-items:center;gap:7px;font-size:.74rem;font-weight:600;color:var(--mist);margin-bottom:14px;flex-wrap:wrap}
.bc a{color:var(--g);transition:color .15s}.bc a:hover{color:var(--gd)}
.post-title{font-family:var(--f1);font-size:clamp(1.9rem,4vw,3rem);font-weight:700;line-height:1.1;letter-spacing:-.022em;color:var(--ink);margin-bottom:16px}
.meta-row{display:flex;align-items:center;gap:14px;flex-wrap:wrap;margin-bottom:26px;padding-bottom:20px;border-bottom:1.5px solid var(--bdr2)}
.mi{font-size:.8rem;color:var(--mist);font-weight:600;display:flex;align-items:center;gap:5px}
.mi strong{color:var(--sub)}
.accent-bar{height:5px;background:linear-gradient(90deg,var(--g),var(--a),var(--c));margin:0 -22px}

/* POST LAYOUT */
.post-layout{display:grid;grid-template-columns:1fr 288px;gap:44px;padding:52px 0 80px;align-items:start}
.article{min-width:0}

/* ARTICLE ELEMENTS */
.tldr{background:var(--gl);border:2px solid var(--gb);border-radius:var(--r20);padding:22px 24px;margin-bottom:28px;position:relative}
.tldr-badge{position:absolute;top:-12px;left:18px;background:var(--g);color:#fff;font-size:.63rem;font-weight:800;letter-spacing:.09em;text-transform:uppercase;padding:4px 12px;border-radius:var(--rp)}
.tldr p{color:var(--gd);font-weight:600;font-size:.92rem;line-height:1.72;margin-top:6px}
.tldr a{color:var(--g);font-weight:700;border-bottom:1.5px solid var(--gb)}

.toc-box{background:#fff;border:1.5px solid var(--bdr);border-radius:var(--r20);padding:22px;margin-bottom:28px;box-shadow:var(--s1)}
.toc-title{font-size:.74rem;font-weight:800;text-transform:uppercase;letter-spacing:.08em;color:var(--sub);margin-bottom:13px}
.toc-list{display:flex;flex-direction:column;gap:2px;counter-reset:toc}
.toc-a{display:flex;align-items:center;gap:9px;padding:7px 9px;border-radius:var(--r8);font-size:.83rem;font-weight:600;color:var(--mid);transition:all .14s;border-left:2.5px solid transparent;counter-increment:toc}
.toc-a::before{content:counter(toc);width:20px;height:20px;border-radius:50%;background:var(--gl);color:var(--g);display:flex;align-items:center;justify-content:center;font-size:.66rem;font-weight:900;flex-shrink:0}
.toc-a:hover{background:var(--bg2);color:var(--g);border-left-color:var(--g)}

.kfacts{background:var(--al);border:1.5px solid var(--ab);border-radius:var(--r20);padding:20px 22px;margin-bottom:28px}
.kf-title{font-size:.72rem;font-weight:800;text-transform:uppercase;letter-spacing:.08em;color:var(--a);margin-bottom:12px}
.kf-item{display:flex;align-items:flex-start;gap:9px;font-size:.87rem;color:var(--mid);line-height:1.6;margin-bottom:8px}
.kf-item:last-child{margin-bottom:0}
.kf-dot{width:7px;height:7px;border-radius:50%;background:var(--a);flex-shrink:0;margin-top:6px}

.art{font-size:.96rem;line-height:1.82;color:var(--mid)}
.art h2{font-family:var(--f1);font-size:clamp(1.25rem,2.4vw,1.7rem);font-weight:700;color:var(--ink);margin:44px 0 16px;padding-bottom:10px;border-bottom:2px solid var(--bg2)}
.art h3{font-family:var(--f1);font-size:clamp(.98rem,1.7vw,1.18rem);font-weight:600;color:var(--ink2);margin:28px 0 12px}
.art p{margin-bottom:17px}
.art p:last-child{margin-bottom:0}
.art strong{color:var(--ink);font-weight:700}
.art ul,.art ol{margin:0 0 18px}
.art li{padding:6px 0 6px 26px;position:relative;font-size:.9rem;border-bottom:1px solid var(--bg2)}
.art li:last-child{border-bottom:none}
.art ul li::before{content:'✓';position:absolute;left:0;color:var(--g);font-weight:900;font-size:.8rem}
.art ol{counter-reset:artol}
.art ol li{counter-increment:artol}
.art ol li::before{content:counter(artol);position:absolute;left:0;width:18px;height:18px;border-radius:50%;background:var(--gl);color:var(--g);display:flex;align-items:center;justify-content:center;font-size:.66rem;font-weight:900;top:8px}

.tool-box{background:#fff;border:2px solid var(--gb);border-radius:var(--r20);padding:20px 22px;margin:26px 0;display:flex;gap:16px;align-items:flex-start;box-shadow:var(--s1)}
.tool-box.c{border-color:var(--cb)}.tool-box.b{border-color:var(--bb)}
.tb-ico{width:46px;height:46px;border-radius:var(--r12);display:flex;align-items:center;justify-content:center;font-size:1.35rem;flex-shrink:0}
.tg{background:var(--gl)}.tc{background:var(--cl)}.tb{background:var(--bl)}
.tb-body h4{font-size:.92rem;font-weight:800;color:var(--ink);margin-bottom:5px}
.tb-body p{font-size:.82rem;color:var(--mist);margin-bottom:11px;line-height:1.6}

.cmp-tbl{width:100%;border-collapse:collapse;margin:20px 0;border-radius:var(--r16);overflow:hidden;border:1.5px solid var(--bdr);box-shadow:var(--s1)}
.cmp-tbl th{background:var(--ink2);color:#F5F2E8;font-size:.76rem;font-weight:700;letter-spacing:.05em;text-transform:uppercase;padding:11px 16px;text-align:left}
.cmp-tbl td{padding:10px 16px;font-size:.86rem;color:var(--mid);border-bottom:1px solid var(--bg2)}
.cmp-tbl tr:last-child td{border-bottom:none}.cmp-tbl tr:nth-child(even) td{background:var(--bg2)}
.td-p{font-weight:700;color:var(--ink)}.td-yes{color:var(--g);font-weight:800}.td-no{color:var(--c);font-weight:800}

.steps{border:1.5px solid var(--bdr);border-radius:var(--r20);overflow:hidden;margin:20px 0;background:#fff;box-shadow:var(--s1)}
.step{display:flex;gap:15px;padding:17px 20px;border-bottom:1px solid var(--bg2);align-items:flex-start}
.step:last-child{border-bottom:none}
.step-n{width:32px;height:32px;border-radius:50%;background:var(--g);color:#fff;display:flex;align-items:center;justify-content:center;font-family:var(--f1);font-weight:700;font-size:.92rem;font-style:italic;flex-shrink:0}
.step h4{font-size:.9rem;font-weight:700;color:var(--ink);margin-bottom:4px}
.step p{font-size:.83rem;color:var(--mist);margin:0;line-height:1.6}
.step a{color:var(--g);font-weight:700;border-bottom:1px solid var(--gb)}

.callout{border-radius:var(--r16);padding:15px 18px;margin:22px 0;display:flex;gap:10px;align-items:flex-start;font-size:.86rem}
.callout-tip{background:var(--gl);border:1.5px solid var(--gb)}.callout-warn{background:var(--al);border:1.5px solid var(--ab)}
.callout-ic{font-size:1.05rem;flex-shrink:0;margin-top:2px}
.callout p{margin:0;line-height:1.7}.callout a{font-weight:700;border-bottom:1px solid}
.callout-tip a{color:var(--g);border-color:var(--gb)}.callout-warn a{color:var(--a);border-color:var(--ab)}
.il{color:var(--g);font-weight:700;border-bottom:1.5px solid var(--gb)}.il:hover{color:var(--gd)}
.il-c{color:var(--c);border-color:var(--cb)}.il-b{color:var(--b);border-color:var(--bb)}

/* FAQ IN POST */
.post-faq{margin:44px 0 0}
.pfi{background:#fff;border:1.5px solid var(--bdr);border-radius:var(--r16);margin-bottom:9px;overflow:hidden;transition:border-color .2s}
.pfi.open{border-color:var(--gb)}
.pfq{display:flex;align-items:center;justify-content:space-between;gap:12px;padding:14px 18px;cursor:pointer;font-weight:700;font-size:.875rem;color:var(--ink);transition:background .14s;border:none;background:none;width:100%;text-align:left}
.pfq:hover{background:var(--bg2)}
.pft{width:22px;height:22px;border-radius:50%;border:1.5px solid var(--bdr);display:flex;align-items:center;justify-content:center;font-size:.75rem;color:var(--mid);flex-shrink:0;transition:all .22s}
.pfi.open .pft{background:var(--g);border-color:var(--g);color:#fff;transform:rotate(45deg)}
.pfa{max-height:0;overflow:hidden;font-size:.84rem;color:var(--mid);line-height:1.72;padding:0 18px;border-top:1px solid transparent;transition:max-height .32s ease,padding .32s ease,border-color .32s}
.pfi.open .pfa{max-height:220px;padding:12px 18px 15px;border-color:var(--bg2)}
.pfa a{color:var(--g);font-weight:700;border-bottom:1px solid var(--gb)}

.conclusion{background:var(--ink2);border-radius:var(--r20);padding:34px;margin:44px 0 32px}
.conclusion h2{font-family:var(--f1);font-size:1.4rem;font-weight:700;color:#F5F2E8;margin-bottom:11px}
.conclusion p{font-size:.9rem;color:rgba(245,242,232,.5);line-height:1.72;margin-bottom:22px}
.c-btns{display:flex;gap:10px;flex-wrap:wrap}

.related{margin-top:52px;padding-top:36px;border-top:2px solid var(--bg2)}
.related h3{font-family:var(--f1);font-size:1.15rem;font-weight:700;color:var(--ink);margin-bottom:20px}
.rel-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:13px}
.rp{background:#fff;border:1.5px solid var(--bdr);border-radius:var(--r16);padding:16px;transition:all .2s;box-shadow:var(--s1);display:block;color:inherit}
.rp:hover{border-color:var(--bdr2);box-shadow:var(--s2);transform:translateY(-2px)}
.rp-ico{font-size:1.4rem;margin-bottom:9px}
.rp-cat{font-size:.67rem;font-weight:800;text-transform:uppercase;letter-spacing:.06em;margin-bottom:5px}
.rp-cat-g{color:var(--g)}.rp-cat-c{color:var(--c)}.rp-cat-b{color:var(--b)}
.rp h4{font-family:var(--f1);font-size:.88rem;font-weight:600;color:var(--ink);line-height:1.38;margin-bottom:5px}
.rp-rt{font-size:.73rem;color:var(--mist);font-weight:600}

/* SIDEBAR */
.post-sb{position:sticky;top:86px;display:flex;flex-direction:column;gap:18px}
.sw{background:#fff;border:1.5px solid var(--bdr);border-radius:var(--r20);padding:20px;box-shadow:var(--s1)}
.sw-t{font-size:.71rem;font-weight:800;text-transform:uppercase;letter-spacing:.09em;color:var(--mist);margin-bottom:13px}
.stoc-a{display:flex;align-items:center;gap:8px;padding:6px 8px;border-radius:var(--r8);font-size:.8rem;font-weight:600;color:var(--mid);transition:all .14s;border-left:2.5px solid transparent}
.stoc-a:hover{background:var(--bg2);color:var(--g);border-left-color:var(--g)}
.stoc-a.active{color:var(--g);border-left-color:var(--g);background:var(--gl);font-weight:700}
.stoc-dot{width:5px;height:5px;border-radius:50%;background:var(--bdr2);flex-shrink:0}
.sp-promo{border:1.5px solid var(--bdr);border-radius:var(--r16);padding:13px;margin-bottom:9px;transition:border-color .18s}
.sp-promo:last-child{margin-bottom:0}
.sp-promo:hover{border-color:var(--gb)}.sp-promo.c:hover{border-color:var(--cb)}.sp-promo.b:hover{border-color:var(--bb)}
.sp-top{display:flex;align-items:center;gap:8px;margin-bottom:6px}
.sp-ic{font-size:1.1rem}.sp-nm{font-weight:700;font-size:.83rem;color:var(--ink)}
.sp-ds{font-size:.75rem;color:var(--mist);line-height:1.55;margin-bottom:8px}
.sp-lk{font-size:.76rem;font-weight:700;display:inline-flex;align-items:center;gap:3px;transition:gap .14s}
.sp-lk.g{color:var(--g)}.sp-lk.c{color:var(--c)}.sp-lk.b{color:var(--b)}.sp-lk:hover{gap:6px}
.qls{display:flex;flex-direction:column;gap:7px}
.ql{font-size:.79rem;font-weight:600;display:flex;align-items:center;gap:5px;color:var(--mid);transition:color .14s}
.ql.g:hover{color:var(--g)}.ql.c:hover{color:var(--c)}.ql.b:hover{color:var(--b)}

/* FOOTER */
#footer{background:#0F1A12;padding:60px 0 26px}
.footer-grid{display:grid;grid-template-columns:1.5fr 1fr 1fr 1fr 1fr;gap:36px;margin-bottom:44px}
.ftr-logo{font-family:var(--f1);font-size:1.15rem;font-weight:700;color:#F5F2E8;display:flex;align-items:center;gap:8px;margin-bottom:10px}
.ftr-logo .logo-mark{width:26px;height:26px;border-radius:7px;font-size:.78rem}
.ftr-logo em{color:#6ECB8F}.ftr-brand p{font-size:.8rem;color:rgba(245,242,232,.28);line-height:1.7;margin-bottom:16px;max-width:212px}
.socials{display:flex;gap:7px}.soc{width:30px;height:30px;border-radius:var(--r8);background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.08);display:flex;align-items:center;justify-content:center;font-size:.78rem;color:rgba(255,255,255,.36);transition:all .18s}.soc:hover{background:var(--g);border-color:var(--g);color:#fff}
.ftr-col h5{font-size:.69rem;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:rgba(255,255,255,.2);margin-bottom:12px}
.flinks{display:flex;flex-direction:column;gap:7px}.fl{font-size:.81rem;color:rgba(245,242,232,.35);transition:color .15s}.fl:hover{color:rgba(245,242,232,.82)}.fl-g{color:#6ECB8F}.fl-c{color:#F08A65}.fl-b{color:#8AABDE}
.footer-btm{display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:10px;padding-top:22px;border-top:1px solid rgba(255,255,255,.06)}
.footer-btm p{font-size:.76rem;color:rgba(255,255,255,.2)}.ftr-legal{display:flex;gap:16px}.ftr-legal a{font-size:.74rem;color:rgba(255,255,255,.2);transition:color .14s}.ftr-legal a:hover{color:rgba(255,255,255,.65)}

@media(max-width:960px){.post-layout{grid-template-columns:1fr}.post-sb{position:static}.rel-grid{grid-template-columns:1fr 1fr}.nav{display:none}.hdr-cta{display:none}.hbg{display:flex}.footer-grid{grid-template-columns:1fr 1fr 1fr}}
@media(max-width:600px){.rel-grid{grid-template-columns:1fr}.c-btns{flex-direction:column}.tool-box{flex-direction:column}.footer-grid{grid-template-columns:1fr 1fr}}
@media(max-width:400px){.footer-grid{grid-template-columns:1fr}}
</style>
<div class="post-hero">
  <div class="ph-blob" aria-hidden="true"></div>
  <div class="wrap ph-inner">
    
    <!-- Breadcrumb Navigation -->
    <nav class="bc" aria-label="Breadcrumb">
      <a href="{{ route('home') }}">🏠 Home</a>
      <span>›</span>
      <a href="{{ route('blog') }}">Blog</a>
      @if($blog->category)
        <span>›</span>
        <a href="{{ route('blog') }}?category={{ $blog->category->id }}">{{ $blog->category->name }}</a>
      @endif
      <span>›</span>
      <span>{{ $blog->title }}</span>
    </nav>
    
    <!-- Badges -->
    <div style="display:flex;gap:8px;flex-wrap:wrap;margin-bottom:14px">
      @if($blog->badges && isset($blog->badges['primary']))
        <span class="badge badge-{{ $blog->category_color }}">{{ $blog->badges['primary'] }}</span>
      @elseif($blog->category)
        <span class="badge badge-{{ $blog->category_color }}">{{ $blog->category->emoji ?? '📄' }} {{ $blog->category->name }}</span>
      @endif
      
      @if($blog->is_beginner_friendly)
        @if($blog->badges && isset($blog->badges['secondary']))
          <span class="badge badge-a">{{ $blog->badges['secondary'] }}</span>
        @else
          <span class="badge badge-a">Beginner Friendly</span>
        @endif
      @endif
    </div>
    
    <!-- Title -->
    <h1 class="post-title">{!! nl2br(e($blog->title)) !!}</h1>
    
    <!-- Meta Information -->
    <div class="meta-row">
      <div class="mi">{{ $blog->author_emoji ?? '✍️' }} <strong>{{ $blog->author_name }}</strong></div>
      <div class="mi">📅 <strong><time datetime="{{ $blog->published_date->format('Y-m-d') }}">{{ $blog->published_date->format('F d, Y') }}</time></strong></div>
      <div class="mi">⏱️ <strong>{{ $blog->read_time }} min read</strong></div>
      @if($blog->updated_date)
        <div class="mi">🔄 Updated: <strong>{{ $blog->updated_date->format('F d, Y') }}</strong></div>
      @endif
    </div>
    
    <div class="accent-bar"></div>
  </div>
</div>

<div class="wrap">
  <div class="post-layout">
    <main class="article" itemscope itemtype="https://schema.org/Article">
      <meta itemprop="headline" content="{{ $blog->title }}">
      <meta itemprop="datePublished" content="{{ $blog->published_date->format('Y-m-d') }}">

      <!-- TL;DR -->
      @if($blog->tldr_summary)
      <div class="tldr" id="s0">
        <div class="tldr-badge">TL;DR — Quick Answer</div>
        <p>{!! $blog->tldr_summary !!}</p>
      </div>
      @endif

      <!-- Table of Contents -->
      @if($blog->table_of_contents && count($blog->table_of_contents) > 0)
      <nav class="toc-box" aria-label="Table of Contents" id="s-toc">
        <div class="toc-title">📋 What's In This Article</div>
        <div class="toc-list">
          @foreach($blog->table_of_contents as $item)
            <a href="#{{ $item['id'] ?? '' }}" class="toc-a">{{ $item['title'] ?? '' }}</a>
          @endforeach
        </div>
      </nav>
      @endif

      <!-- Key Facts -->
      @if($blog->key_facts && count($blog->key_facts) > 0)
      <div class="kfacts" id="s3">
        <div class="kf-title">⚡ Key Facts</div>
        @foreach($blog->key_facts as $fact)
          <div class="kf-item">
            <div class="kf-dot"></div>
            {!! $fact !!}
          </div>
        @endforeach
      </div>
      @endif

      <!-- Main Article Content -->
      <div class="art">
        {!! $blog->content !!}
      </div>

      <!-- Tool Boxes -->
      @if($blog->tool_boxes && count($blog->tool_boxes) > 0)
        @foreach($blog->tool_boxes as $tool)
          <div class="tool-box {{ $tool['color'] ?? '' }}">
            <div class="tb-ico t{{ $tool['color'] ?? 'g' }}">{{ $tool['emoji'] ?? '🔧' }}</div>
            <div class="tb-body">
              <h4>{{ $tool['title'] ?? '' }}</h4>
              <p>{{ $tool['description'] ?? '' }}</p>
              @if(isset($tool['button_text']) && isset($tool['button_url']))
                <a href="{{ $tool['button_url'] }}" class="btn btn-{{ $tool['color'] ?? 'g' }} btn-sm" target="_blank" rel="noopener">{{ $tool['button_text'] }}</a>
              @endif
            </div>
          </div>
        @endforeach
      @endif

      <!-- Comparison Table -->
      @if($blog->comparison_table && isset($blog->comparison_table['headers']))
        <table class="cmp-tbl" aria-label="Comparison table">
          <thead>
            <tr>
              @foreach($blog->comparison_table['headers'] as $header)
                <th>{{ $header }}</th>
              @endforeach
            </tr>
          </thead>
          <tbody>
            @if(isset($blog->comparison_table['rows']))
              @foreach($blog->comparison_table['rows'] as $row)
                <tr>
                  @foreach($row as $cell)
                    <td>{!! $cell !!}</td>
                  @endforeach
                </tr>
              @endforeach
            @endif
          </tbody>
        </table>
      @endif

      <!-- Step-by-Step Guide -->
      @if($blog->steps && count($blog->steps) > 0)
        <div class="steps">
          @foreach($blog->steps as $step)
            <div class="step">
              <div class="step-n">{{ $step['number'] ?? $loop->iteration }}</div>
              <div>
                <h4>{{ $step['title'] ?? '' }}</h4>
                <p>{!! $step['description'] ?? '' !!}</p>
              </div>
            </div>
          @endforeach
        </div>
      @endif

      <!-- Callout Boxes -->
      @if($blog->callouts && count($blog->callouts) > 0)
        @foreach($blog->callouts as $callout)
          <div class="callout callout-{{ $callout['type'] ?? 'tip' }}">
            <div class="callout-ic">{{ $callout['icon'] ?? '💡' }}</div>
            <p>{!! $callout['content'] ?? '' !!}</p>
          </div>
        @endforeach
      @endif

      <!-- FAQ Section -->
      @if($blog->faqs && count($blog->faqs) > 0)
      <div class="post-faq">
        @foreach($blog->faqs as $faq)
          <div class="pfi">
            <button class="pfq" onclick="this.parentElement.classList.toggle('open')">
              {{ $faq['question'] ?? '' }}
              <div class="pft">+</div>
            </button>
            <div class="pfa">{!! $faq['answer'] ?? '' !!}</div>
          </div>
        @endforeach
      </div>
      @endif

      <!-- Conclusion -->
      @if($blog->conclusion_data)
        <div class="conclusion">
          <h2>{{ $blog->conclusion_data['title'] ?? 'Conclusion' }}</h2>
          <p>{{ $blog->conclusion_data['content'] ?? '' }}</p>
          @if(isset($blog->conclusion_data['buttons']) && count($blog->conclusion_data['buttons']) > 0)
            <div class="c-btns">
              @foreach($blog->conclusion_data['buttons'] as $button)
                <a href="{{ $button['url'] ?? '#' }}" class="btn btn-{{ $button['color'] ?? 'g' }}" target="_blank" rel="noopener">
                  {{ $button['text'] ?? 'Learn More' }}
                </a>
              @endforeach
            </div>
          @endif
        </div>
      @endif

      <!-- Related Posts -->
      @if($relatedPosts && $relatedPosts->count() > 0)
      <div class="related">
        <h3>Related Articles</h3>
        <div class="rel-grid">
          @foreach($relatedPosts as $related)
            <a href="{{ route('blog.post', $related->slug) }}" class="rp">
              <div class="rp-ico">{{ $related->featured_image_emoji ?? '📄' }}</div>
              <div class="rp-cat rp-cat-{{ $related->category_color }}">
                {{ $related->category->name ?? 'Article' }}
              </div>
              <h4>{{ $related->title }}</h4>
              <div class="rp-rt">{{ $related->read_time }} min read</div>
            </a>
          @endforeach
        </div>
      </div>
      @endif

    </main>

    <!-- Sidebar -->
    <aside class="post-sb">
      
      <!-- Sticky TOC -->
      @if($blog->table_of_contents && count($blog->table_of_contents) > 0)
      <div class="sw">
        <div class="sw-t">📋 Table of Contents</div>
        @foreach($blog->table_of_contents as $item)
          <a href="#{{ $item['id'] ?? '' }}" class="stoc-a">
            <div class="stoc-dot"></div>
            {{ $item['title'] ?? '' }}
          </a>
        @endforeach
      </div>
      @endif

      <!-- Sidebar Promos -->
      @if($blog->sidebar_promos && count($blog->sidebar_promos) > 0)
      <div class="sw">
        <div class="sw-t">🚀 Featured Tools</div>
        @foreach($blog->sidebar_promos as $promo)
          <a href="{{ $promo['link_url'] ?? '#' }}" class="sp-promo {{ $promo['color'] ?? '' }}" target="_blank" rel="noopener">
            <div class="sp-top">
              <div class="sp-ic">{{ $promo['emoji'] ?? '🔧' }}</div>
              <div class="sp-nm">{{ $promo['name'] ?? '' }}</div>
            </div>
            <div class="sp-ds">{{ $promo['description'] ?? '' }}</div>
            <div class="sp-lk {{ $promo['color'] ?? 'g' }}">{{ $promo['link_text'] ?? 'Learn More' }} →</div>
          </a>
        @endforeach
      </div>
      @endif

      <!-- Quick Links -->
      @if($blog->quick_links && count($blog->quick_links) > 0)
      <div class="sw">
        <div class="sw-t">⚡ Quick Links</div>
        <div class="qls">
          @foreach($blog->quick_links as $link)
            <a href="{{ $link['url'] ?? '#' }}" class="ql {{ $link['color'] ?? 'g' }}">
              → {{ $link['text'] ?? '' }}
            </a>
          @endforeach
        </div>
      </div>
      @endif

    </aside>

  </div>
</div>

<!-- Include Scripts -->
@include('website.partials.scripts')

@endsection
