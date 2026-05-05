@extends('website.layouts.app')

@section('title', \App\Models\Setting::where('key', 'tools_page_title')->value('value') ?? 'Tools — Free Online Tools for Everyone | ToolVerse Hub')
@section('description', 'Discover free online tools for images, PDFs, text, colors, and more. No signup required.')

@section('content')

<!-- Include Styles -->
@include('website.partials.styles')
<style>
:root{--bg:#FAFAF5;--bg2:#F3EEE4;--bg3:#EAE3D6;--white:#FFFFFF;--g:#2D7D52;--gd:#236640;--gl:#D6EDDE;--gb:#8FC9A5;--c:#C8551C;--cd:#A8420E;--cl:#FAE2D4;--cb:#EBA07C;--b:#3A5CA8;--bd:#2D4A8C;--bl:#D8E2F5;--bb:#8FAADE;--a:#B87A10;--al:#FDF0D5;--ab:#E8C06A;--ink:#18211A;--ink2:#2A3A2D;--mid:#4D6050;--sub:#7A8A7D;--mist:#A8B5AA;--bdr:#DDD8CC;--bdr2:#C8C2B4;--f1:'Playfair Display',Georgia,serif;--f2:'DM Sans',system-ui,sans-serif;--r8:8px;--r12:12px;--r16:16px;--r20:20px;--r24:24px;--rp:999px;--s1:0 1px 4px rgba(0,0,0,.06),0 1px 2px rgba(0,0,0,.04);--s2:0 4px 14px rgba(0,0,0,.08),0 2px 4px rgba(0,0,0,.05);--s3:0 10px 28px rgba(0,0,0,.10),0 4px 8px rgba(0,0,0,.05);--s4:0 20px 50px rgba(0,0,0,.12),0 8px 16px rgba(0,0,0,.06)}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0;max-width:100%}html{scroll-behavior:smooth;overflow-x:hidden;width:100%}
body{font-family:var(--f2);background:var(--bg);color:var(--ink);line-height:1.65;-webkit-font-smoothing:antialiased;overflow-x:hidden;padding-top:66px}
a{color:inherit;text-decoration:none}button{font-family:var(--f2);cursor:pointer;border:none;background:none}ul{list-style:none}
.wrap{max-width:1000px;margin:0 auto;padding:0 22px;width:100%;box-sizing:border-box;overflow:hidden}
.h1{font-family:var(--f1);font-size:clamp(2rem,4vw,3rem);font-weight:700;line-height:1.1;letter-spacing:-.02em;color:var(--ink)}
.h2{font-family:var(--f1);font-size:clamp(1.5rem,3vw,2.2rem);font-weight:700;line-height:1.14;color:var(--ink)}
.h3{font-family:var(--f1);font-size:clamp(1rem,1.8vw,1.2rem);font-weight:600;line-height:1.25;color:var(--ink)}
.body{font-size:.9rem;color:var(--mid);line-height:1.72}
.eyebrow{display:inline-flex;align-items:center;gap:8px;font-size:.68rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--g);margin-bottom:12px}
.eyebrow::before{content:'';width:20px;height:2px;background:var(--g);border-radius:2px;flex-shrink:0}
.btn{display:inline-flex;align-items:center;justify-content:center;gap:7px;padding:11px 22px;border-radius:var(--rp);font-family:var(--f2);font-weight:700;font-size:.875rem;line-height:1;border:2px solid transparent;cursor:pointer;transition:all .2s;white-space:nowrap;text-decoration:none}
.btn-g{background:var(--g);color:#fff;border-color:var(--g)}.btn-g:hover{background:var(--gd);transform:translateY(-1px)}
.btn-out{background:transparent;color:var(--ink);border-color:var(--bdr2)}.btn-out:hover{border-color:var(--g);color:var(--g);background:var(--gl)}
.btn-sm{padding:8px 17px;font-size:.81rem}
.tag{display:inline-flex;align-items:center;padding:3px 11px;border-radius:var(--rp);font-size:.66rem;font-weight:700;letter-spacing:.05em;text-transform:uppercase;border:1.5px solid}
.tag-g{background:var(--gl);color:var(--g);border-color:var(--gb)}.tag-c{background:var(--cl);color:var(--c);border-color:var(--cb)}.tag-b{background:var(--bl);color:var(--b);border-color:var(--bb)}.tag-a{background:var(--al);color:var(--a);border-color:var(--ab)}.tag-n{background:var(--bg2);color:var(--sub);border-color:var(--bdr)}
.rv{opacity:1;transform:none;transition:none}.rv.in{opacity:1;transform:none}
.rv.d1{transition-delay:0s}.rv.d2{transition-delay:0s}

/* HEADER */
#hdr{position:fixed;top:0;left:0;right:0;z-index:400;background:rgba(250,250,245,.94);backdrop-filter:blur(18px);border-bottom:1px solid transparent;transition:all .25s;padding:12px 0;width:100%;overflow:hidden}
#hdr.stuck{border-color:var(--bdr);box-shadow:var(--s2);padding:8px 0}
.hdr-row{display:flex;align-items:center;gap:10px;width:100%;position:relative;overflow:hidden;max-width:100%}
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
.hbg{display:none;flex-direction:column;gap:5px;width:38px;height:38px;align-items:center;justify-content:center;cursor:pointer;margin-left:auto;border-radius:var(--r8);background:transparent;border:none;padding:8px;transition:background .2s;position:relative;z-index:100}
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

/* PROGRESS */
#prog{position:fixed;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--g),var(--a),var(--c));transform:scaleX(0);transform-origin:left;z-index:9999;pointer-events:none;transition:transform .08s linear}

/* BLOG HERO */
.blog-hero{background:linear-gradient(135deg,var(--gl) 0%,var(--bg2) 55%,var(--cl) 100%);padding:56px 0 48px;border-bottom:1px solid var(--bdr);position:relative;overflow:hidden}
.bh-blob1{position:absolute;width:280px;height:280px;border-radius:50%;top:-70px;right:-50px;background:radial-gradient(circle,rgba(45,125,82,.1),transparent 70%);pointer-events:none;z-index:0}
.bh-blob2{position:absolute;width:220px;height:220px;border-radius:50%;bottom:-55px;left:-40px;background:radial-gradient(circle,rgba(200,85,28,.08),transparent 70%);pointer-events:none;z-index:0}
.bh-inner{position:relative;z-index:101}
.bc{display:flex;align-items:center;gap:7px;font-size:.74rem;font-weight:600;color:var(--mist);margin-bottom:14px}
.bc a{color:var(--g);transition:color .15s}.bc a:hover{color:var(--gd)}
.blog-hero p{font-size:1rem;color:var(--mid);max-width:500px;margin-bottom:26px;line-height:1.72}
.search-bar{display:flex;max-width:460px;background:#fff;border:2px solid var(--bdr2);border-radius:var(--rp);overflow:hidden;box-shadow:var(--s2);transition:border-color .2s}
.search-bar:focus-within{border-color:var(--g)}
.search-bar input{flex:1;border:none;outline:none;padding:11px 18px;font-family:var(--f2);font-size:.875rem;color:var(--ink);background:transparent}
.search-bar input::placeholder{color:var(--mist)}
.search-btn{background:var(--g);color:#fff;border:none;padding:0 22px;font-family:var(--f2);font-weight:700;font-size:.84rem;cursor:pointer;display:flex;align-items:center;gap:6px;transition:background .18s;flex-shrink:0;border-radius:0}
.search-btn:hover{background:var(--gd)}
.search-dropdown{position:absolute;top:100%;left:0;right:0;margin-top:8px;background:#fff;border:2px solid var(--g);border-radius:var(--r16);box-shadow:0 20px 50px rgba(0,0,0,.15),0 8px 16px rgba(0,0,0,.1);max-height:400px;overflow-y:auto;z-index:10001}
.search-result-item{padding:12px 16px;border-bottom:1px solid var(--bg2);cursor:pointer;transition:background .15s;text-decoration:none;display:block;color:inherit}
.search-result-item:last-child{border-bottom:none}
.search-result-item:hover{background:var(--bg2)}
.search-result-title{font-size:.9rem;font-weight:700;color:var(--ink);margin-bottom:4px;display:flex;align-items:center;gap:6px}
.search-result-category{font-size:.7rem;font-weight:700;text-transform:uppercase;color:var(--g);letter-spacing:.05em;margin-bottom:4px}
.search-result-excerpt{font-size:.78rem;color:var(--mid);line-height:1.5}
.search-no-results{padding:20px;text-align:center;color:var(--mist);font-size:.85rem}
.search-loading{padding:20px;text-align:center;color:var(--g);font-size:.85rem}

/* FILTER BAR */
.filter-bar{background:#fff;border-bottom:1px solid var(--bdr);padding:13px 0;position:sticky;top:66px;z-index:99;box-shadow:var(--s1);overflow:hidden}
.filter-inner{display:flex;align-items:center;gap:8px;flex-wrap:wrap;width:100%;overflow-x:auto;overflow-y:hidden;-webkit-overflow-scrolling:touch}
.ftab{display:inline-flex;align-items:center;gap:5px;padding:7px 16px;border-radius:var(--rp);border:1.5px solid var(--bdr);background:#fff;font-size:.8rem;font-weight:700;color:var(--mid);cursor:pointer;transition:all .18s;white-space:nowrap;text-decoration:none}
.ftab:hover{border-color:var(--bdr2);color:var(--ink)}
.ftab.on-all{background:var(--ink2);border-color:var(--ink2);color:#fff}
.ftab.on-g{background:var(--g);border-color:var(--g);color:#fff}
.ftab.on-c{background:var(--c);border-color:var(--c);color:#fff}
.ftab.on-b{background:var(--b);border-color:var(--b);color:#fff}
.ftab.on-a{background:var(--a);border-color:var(--a);color:#fff}
.fcnt{font-size:.64rem;font-weight:900;width:17px;height:17px;border-radius:50%;background:rgba(0,0,0,.1);display:inline-flex;align-items:center;justify-content:center}

/* MAIN LAYOUT */
.blog-layout{display:grid;grid-template-columns:1fr 276px;gap:40px;padding:48px 0 80px;align-items:start;width:100%;max-width:100%;overflow:hidden}

/* FEATURED */
.feat-label{display:inline-flex;align-items:center;gap:5px;font-size:.67rem;font-weight:800;letter-spacing:.09em;text-transform:uppercase;color:var(--a);background:var(--al);border:1.5px solid var(--ab);padding:3px 10px;border-radius:var(--rp);margin-bottom:14px}
.feat-card{display:grid;grid-template-columns:1fr 1fr;background:#fff;border:1.5px solid var(--bdr);border-radius:var(--r24);overflow:hidden;box-shadow:var(--s1);margin-bottom:28px;transition:all .25s;text-decoration:none;color:inherit}
.feat-card:hover{box-shadow:var(--s4);transform:translateY(-4px)}
.fc-img{min-height:240px;display:flex;align-items:center;justify-content:center;font-size:5rem}
.ft1{background:linear-gradient(135deg,var(--gl),var(--al))}.ft2{background:linear-gradient(135deg,var(--cl),var(--al))}.ft3{background:linear-gradient(135deg,var(--bl),var(--cl))}
.fc-body{padding:30px;display:flex;flex-direction:column;justify-content:center}
.post-meta{display:flex;align-items:center;gap:8px;font-size:.71rem;color:var(--mist);font-weight:600;margin-bottom:9px}
.pcat{font-size:.67rem;font-weight:800;text-transform:uppercase;letter-spacing:.06em}
.pcg{color:var(--g)}.pcc{color:var(--c)}.pcb{color:var(--b)}.pca{color:var(--a)}
.feat-card p{font-size:.84rem;color:var(--mid);line-height:1.65;margin-bottom:16px}
.post-foot{display:flex;align-items:center;justify-content:space-between;padding-top:12px;border-top:1px solid var(--bg2)}
.post-rt{font-size:.71rem;color:var(--mist);font-weight:600}
.post-rm{font-size:.79rem;font-weight:700;display:flex;align-items:center;gap:4px;transition:gap .14s}
.prmg{color:var(--g)}.prmc{color:var(--c)}.prmb{color:var(--b)}
.post-rm:hover{gap:7px}

/* SECTION DIVIDER */
.sdiv{display:flex;align-items:center;gap:12px;font-size:.72rem;font-weight:700;letter-spacing:.09em;text-transform:uppercase;color:var(--mist);margin:6px 0 22px}
.sdiv::before,.sdiv::after{content:'';flex:1;height:1px;background:var(--bdr)}

/* GRID & LIST POSTS */
.post-grid{display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:28px;width:100%;max-width:100%}
.pc{background:#fff;border:1.5px solid var(--bdr);border-radius:var(--r20);overflow:hidden;box-shadow:var(--s1);display:flex;flex-direction:column;transition:all .22s;text-decoration:none;color:inherit;width:100%;max-width:100%}
.pc:hover{box-shadow:var(--s3);transform:translateY(-4px);border-color:var(--bdr2)}
.pc-img{height:140px;display:flex;align-items:center;justify-content:center;font-size:2.6rem}
.pt1{background:linear-gradient(135deg,var(--gl),var(--al))}.pt2{background:linear-gradient(135deg,var(--cl),var(--al))}.pt3{background:linear-gradient(135deg,var(--bl),var(--cl))}.pt4{background:linear-gradient(135deg,var(--al),var(--gl))}
.pc-body{padding:17px;flex:1;display:flex;flex-direction:column}
.pc h3{font-size:.95rem;color:var(--ink);line-height:1.38;margin-bottom:7px}
.pc p{font-size:.79rem;color:var(--mid);line-height:1.62;flex:1;margin-bottom:12px}
.pc-foot{display:flex;align-items:center;justify-content:space-between;padding-top:10px;border-top:1px solid var(--bg2);margin-top:auto}
.post-list{display:flex;flex-direction:column;gap:12px;margin-bottom:30px;width:100%;max-width:100%}
.ph{background:#fff;border:1.5px solid var(--bdr);border-radius:var(--r20);overflow:hidden;display:flex;box-shadow:var(--s1);transition:all .2s;text-decoration:none;color:inherit;width:100%;max-width:100%}
.ph:hover{box-shadow:var(--s2);transform:translateY(-2px);border-color:var(--bdr2)}
.ph-img{width:106px;min-height:106px;flex-shrink:0;display:flex;align-items:center;justify-content:center;font-size:1.9rem}
.pi1{background:var(--gl)}.pi2{background:var(--cl)}.pi3{background:var(--bl)}.pi4{background:var(--al)}
.ph-body{padding:14px 17px;flex:1;display:flex;flex-direction:column;justify-content:center;min-width:0}
.ph h3{font-size:.9rem;color:var(--ink);line-height:1.38;margin-bottom:4px}
.ph p{font-size:.76rem;color:var(--mist);line-height:1.5;overflow:hidden;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical}
.no-results{text-align:center;padding:52px 20px;display:none}
.no-results.show{display:block}
.no-results h3{font-family:var(--f1);font-size:1.4rem;color:var(--mid);margin-bottom:8px}
.no-results p{font-size:.9rem;color:var(--mist)}
.pagi{display:flex;gap:7px;justify-content:center;margin-top:10px}
.pg{width:36px;height:36px;border-radius:var(--r8);display:flex;align-items:center;justify-content:center;border:1.5px solid var(--bdr);background:#fff;font-size:.84rem;font-weight:700;color:var(--mid);cursor:pointer;transition:all .18s}
.pg:hover{border-color:var(--g);color:var(--g)}.pg.on{background:var(--g);border-color:var(--g);color:#fff}

/* SIDEBAR */
.sidebar{display:flex;flex-direction:column;gap:18px;position:sticky;top:132px}
.sw{background:#fff;border:1.5px solid var(--bdr);border-radius:var(--r20);padding:20px;box-shadow:var(--s1)}
.sw-t{font-size:.71rem;font-weight:800;text-transform:uppercase;letter-spacing:.09em;color:var(--mist);margin-bottom:13px}
.sp{border:1.5px solid var(--bdr);border-radius:var(--r16);padding:13px;margin-bottom:9px;transition:border-color .18s}
.sp:last-child{margin-bottom:0}
.sp:hover{border-color:var(--gb)}.sp.sc:hover{border-color:var(--cb)}.sp.sb:hover{border-color:var(--bb)}
.sp-top{display:flex;align-items:center;gap:9px;margin-bottom:6px}
.sp-ic{font-size:1.1rem}.sp-nm{font-weight:700;font-size:.83rem;color:var(--ink)}.sp-ct{font-size:.69rem;color:var(--mist);font-weight:600}
.sp-ds{font-size:.76rem;color:var(--mist);line-height:1.55;margin-bottom:8px}
.sp-lk{font-size:.76rem;font-weight:700;display:inline-flex;align-items:center;gap:3px;transition:gap .14s}
.sp-lk.g{color:var(--g)}.sp-lk.c{color:var(--c)}.sp-lk.b{color:var(--b)}
.sp-lk:hover{gap:6px}
.cat-links{display:flex;flex-direction:column;gap:3px}
.cl{display:flex;align-items:center;justify-content:space-between;padding:7px 9px;border-radius:var(--r8);font-size:.82rem;font-weight:600;color:var(--mid);transition:all .15s;border:1px solid transparent}
.cl:hover{background:var(--bg2);color:var(--g);border-color:var(--gb)}
.cl.active{background:var(--gl);color:var(--g);border-color:var(--gb);font-weight:700}
.cl-cnt{font-size:.66rem;font-weight:800;background:var(--bg2);color:var(--mist);padding:2px 7px;border-radius:var(--rp)}
.cl.active .cl-cnt{background:var(--g);color:#fff}
.tags-cloud{display:flex;flex-wrap:wrap;gap:6px}
.tag-btn{padding:5px 11px;border-radius:var(--rp);font-size:.72rem;font-weight:700;border:1.5px solid var(--bdr);background:var(--bg2);color:var(--mid);cursor:pointer;transition:all .18s;user-select:none;text-decoration:none;display:inline-block}
.tag-btn:hover{border-color:var(--g);color:var(--g);background:var(--gl)}
.tag-btn.active{border-color:var(--g);color:#fff;background:var(--g);font-weight:800}
.nl-box{background:linear-gradient(135deg,var(--ink2),#1A3020);border-radius:var(--r20);padding:22px;color:#F5F2E8}
.nl-box h4{font-family:var(--f1);font-size:1rem;font-weight:700;color:#F5F2E8;margin-bottom:7px}
.nl-box p{font-size:.8rem;color:rgba(245,242,232,.42);line-height:1.65;margin-bottom:14px}
.nl-form{display:flex;flex-direction:column;gap:7px}
.nl-form input{padding:9px 13px;border-radius:var(--r12);border:1px solid rgba(255,255,255,.12);background:rgba(255,255,255,.08);color:#F5F2E8;font-family:var(--f2);font-size:.82rem;outline:none;transition:border-color .2s}
.nl-form input::placeholder{color:rgba(255,255,255,.3)}.nl-form input:focus{border-color:rgba(143,201,165,.45)}
.nl-form .sub-btn{background:var(--g);color:#fff;border:none;padding:9px 14px;border-radius:var(--r12);font-family:var(--f2);font-weight:700;font-size:.82rem;cursor:pointer;transition:background .18s}
.nl-form .sub-btn:hover{background:var(--gd)}

/* FOOTER */
#footer{background:#0F1A12;padding:60px 0 26px}
.footer-grid{display:grid;grid-template-columns:1.5fr 1fr 1fr 1fr 1fr;gap:36px;margin-bottom:44px}
.ftr-logo{font-family:var(--f1);font-size:1.15rem;font-weight:700;color:#F5F2E8;display:flex;align-items:center;gap:8px;margin-bottom:10px}
.ftr-logo .logo-mark{width:26px;height:26px;border-radius:7px;font-size:.78rem}
.ftr-logo em{color:#6ECB8F}
.ftr-brand p{font-size:.8rem;color:rgba(245,242,232,.28);line-height:1.7;margin-bottom:16px;max-width:212px}
.socials{display:flex;gap:7px}
.soc{width:30px;height:30px;border-radius:var(--r8);background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.08);display:flex;align-items:center;justify-content:center;font-size:.78rem;color:rgba(255,255,255,.36);transition:all .18s}
.soc:hover{background:var(--g);border-color:var(--g);color:#fff}
.ftr-col h5{font-size:.69rem;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:rgba(255,255,255,.2);margin-bottom:12px}
.flinks{display:flex;flex-direction:column;gap:7px}
.fl{font-size:.81rem;color:rgba(245,242,232,.35);transition:color .15s}.fl:hover{color:rgba(245,242,232,.82)}
.fl-g{color:#6ECB8F}.fl-c{color:#F08A65}.fl-b{color:#8AABDE}
.footer-btm{display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:10px;padding-top:22px;border-top:1px solid rgba(255,255,255,.06)}
.footer-btm p{font-size:.76rem;color:rgba(255,255,255,.2)}
.ftr-legal{display:flex;gap:16px}
.ftr-legal a{font-size:.74rem;color:rgba(255,255,255,.2);transition:color .14s}.ftr-legal a:hover{color:rgba(255,255,255,.65)}

@media(max-width:960px){.blog-layout{grid-template-columns:1fr;width:100%;max-width:100%;overflow:hidden}.sidebar{position:static;display:grid;grid-template-columns:1fr 1fr;gap:16px;width:100%;max-width:100%}.feat-card{grid-template-columns:1fr;width:100%;max-width:100%}.fc-img{min-height:180px}.footer-grid{grid-template-columns:1fr 1fr 1fr}}
@media(max-width:768px){.nav{display:none !important}.hdr-cta{display:none !important}.hbg{display:flex !important;margin-left:auto !important;order:999 !important}.wrap{padding:0 16px !important}.blog-layout{width:100% !important;max-width:100% !important;overflow:hidden !important}.post-grid{grid-template-columns:1fr !important;width:100% !important;max-width:100% !important}.sidebar{grid-template-columns:1fr !important;width:100% !important;max-width:100% !important}}
@media(max-width:640px){.post-grid{grid-template-columns:1fr}.sidebar{grid-template-columns:1fr}.ph-img{width:88px;min-height:88px}.footer-grid{grid-template-columns:1fr 1fr}.wrap{padding:0 12px !important}}
@media(max-width:400px){.footer-grid{grid-template-columns:1fr}.wrap{padding:0 10px !important}}

/* PREVENT HORIZONTAL SCROLL */
html, body {
  overflow-x: hidden !important;
  width: 100% !important;
  max-width: 100vw !important;
}
* {
  max-width: 100% !important;
  box-sizing: border-box !important;
}
.wrap, .blog-layout, .post-grid, .post-list, .sidebar {
  width: 100% !important;
  max-width: 100% !important;
  overflow: hidden !important;
}
</style>

<div class="blog-hero">
  <div class="bh-blob1"></div><div class="bh-blob2"></div>
  <div class="wrap bh-inner">
    <nav class="bc" aria-label="Breadcrumb"><a href="/">🏠 Home</a><span>›</span><span>Tools</span></nav>
    <div class="eyebrow">Tool Directory</div>
    <h1 class="h1" style="margin-bottom:12px">Free Online <em style="color:var(--g)">Tools</em></h1>
    <p>Expert walkthroughs for image conversion, PDF editing, and free HTML5 games — written for real users, ranked by Google.</p>
    <div style="position:relative;max-width:460px">
      <div class="search-bar" role="search">
        <input type="text" id="srch" placeholder="Search tools… e.g. 'Image Converter'" aria-label="Search tools" autocomplete="off">
        <button class="search-btn" id="srch-btn" type="button">🔍 Search</button>
      </div>
      <div id="search-results" class="search-dropdown" style="display:none"></div>
    </div>
  </div>
</div>

<div class="filter-bar">
  <div class="wrap"><div class="filter-inner" role="group" aria-label="Filter by category">
    @php
      $totalTools = \App\Models\Tool::where('is_active', true)->count();
    @endphp
    <a href="{{ route('tools') }}" class="ftab {{ !$selectedCategory ? 'on-all' : '' }}" data-cat="all">
      🔧 All <span class="fcnt">{{ $totalTools }}</span>
    </a>
    @foreach($categories as $category)
      @if($category->tools_count > 0)
        <a href="{{ route('tools', ['category' => $category->slug]) }}" 
           class="ftab {{ $selectedCategory == $category->slug ? 'on-g' : '' }}" 
           data-cat="{{ $category->slug }}">
          {{ $category->icon ?? '📁' }} {{ $category->name }} 
          <span class="fcnt">{{ $category->tools_count }}</span>
        </a>
      @endif
    @endforeach
  </div></div>
</div>

<div class="wrap">
  <div class="blog-layout">
    <main>
      @if($showFreeOnly ?? false)
      <div style="background:var(--gl);border:2px solid var(--gb);border-radius:var(--r16);padding:12px 18px;margin-bottom:24px;display:flex;align-items:center;justify-content:space-between;gap:12px;">
        <div style="display:flex;align-items:center;gap:10px;">
          <span style="font-size:1.2rem;">💚</span>
          <div>
            <div style="font-size:.85rem;font-weight:700;color:var(--g);margin-bottom:2px;">Free Tools Only</div>
            <div style="font-size:.75rem;color:var(--mid);">Showing only free tools</div>
          </div>
        </div>
        <a href="{{ route('tools') }}" style="font-size:.78rem;font-weight:700;color:var(--g);text-decoration:none;white-space:nowrap;">Clear Filter ✕</a>
      </div>
      @endif
      @if($moreTools->currentPage() == 1)
        @if($featuredTool)
        <div class="feat-label">⭐ Featured Tool</div>
        <a href="{{ $featuredTool->url ?? '#' }}" class="feat-card rv" target="_blank">
          <div class="fc-img ft1">{{ $featuredTool->icon ?? '🔧' }}</div>
          <div class="fc-body">
            <div class="post-meta">
              <span class="pcat pcg">{{ $featuredTool->category->name ?? 'General' }}</span>
              <span>·</span>
              <span>{{ $featuredTool->tool_count ?? 'New' }}</span>
            </div>
            <h2 class="h3" style="margin-bottom:10px">{{ $featuredTool->name }}</h2>
            <p>{{ $featuredTool->description }}</p>
            <div class="post-foot">
              <span class="post-rt">🔧 {{ $featuredTool->tool_count ?? 'Free' }}</span>
              <span class="post-rm prmg">Try Tool →</span>
            </div>
          </div>
        </a>
        @endif

        <div class="sdiv">Latest Tools</div>
        <div class="post-grid" id="post-grid">
          @foreach($latestTools as $index => $tool)
          <a href="{{ $tool->url ?? '#' }}" class="pc rv {{ $index % 2 == 1 ? 'd1' : '' }}" target="_blank">
            <div class="pc-img pt{{ ($index % 4) + 1 }}">{{ $tool->icon ?? '🔧' }}</div>
            <div class="pc-body">
              <div class="post-meta" style="margin-bottom:6px">
                <span class="pcat pcg">{{ $tool->category->name ?? 'General' }}</span>
                <span>· {{ $tool->tool_count ?? 'New' }}</span>
              </div>
              <h3>{{ $tool->name }}</h3>
              <p>{{ Str::limit($tool->description, 100) }}</p>
              <div class="pc-foot">
                <span class="post-rt">🔧 {{ $tool->tool_count ?? 'Free' }}</span>
                <span class="post-rm prmg">Try →</span>
              </div>
            </div>
          </a>
          @endforeach
        </div>
      @endif

      @if($moreTools->currentPage() == 1 && $featuredTool == null && $latestTools->isEmpty() && $moreTools->isEmpty())
      {{-- Complete empty state when no tools at all --}}
      <div style="text-align:center;padding:80px 20px;">
        <div style="font-size:4rem;margin-bottom:20px;">🔧</div>
        <h2 style="font-size:1.5rem;color:var(--ink);margin-bottom:12px;">No Tools Found</h2>
        <p style="color:var(--mid);margin-bottom:24px;">
          @if(isset($selectedCategory) && $selectedCategory)
            No tools available in this category yet.
          @elseif(isset($selectedTag) && $selectedTag)
            No tools found with this tag.
          @else
            No tools available at the moment.
          @endif
        </p>
        <a href="{{ route('tools') }}" class="btn btn-g">
          View All Tools
        </a>
      </div>
      @else
      
      @if($moreTools->isNotEmpty())
      <div class="sdiv">{{ $moreTools->currentPage() == 1 ? 'More Tools' : 'All Tools' }}</div>
      @endif
      
      <div class="post-list" id="post-list">
        @forelse($moreTools as $index => $tool)
        <a href="{{ $tool->url ?? '#' }}" class="ph rv {{ $index % 2 == 1 ? 'd1' : '' }}" target="_blank">
          <div class="ph-img pi{{ ($index % 4) + 1 }}">{{ $tool->icon ?? '🔧' }}</div>
          <div class="ph-body">
            <div class="post-meta" style="margin-bottom:5px">
              <span class="pcat pcg">{{ $tool->category->name ?? 'General' }}</span>
              <span>· {{ $tool->tool_count ?? 'Free' }}</span>
            </div>
            <h3>{{ $tool->name }}</h3>
            <p>{{ Str::limit($tool->description, 120) }}</p>
          </div>
        </a>
        @empty
        {{-- Empty state only when Latest Tools is also empty and on page 1 --}}
        @if($latestTools->isEmpty() && $moreTools->currentPage() == 1)
        <div style="text-align:center;padding:60px 20px;">
          <div style="font-size:3rem;margin-bottom:16px;">🔍</div>
          <h3 style="font-size:1.25rem;color:var(--ink);margin-bottom:10px;">No Tools Found</h3>
          <p style="color:var(--mid);margin-bottom:20px;">
            @if(isset($selectedCategory) && isset($selectedTag) && $selectedCategory && $selectedTag)
              No tools found for this category and tag combination.
            @elseif(isset($selectedCategory) && $selectedCategory)
              No tools available in this category.
            @elseif(isset($selectedTag) && $selectedTag)
              No tools found with this tag.
            @else
              No tools available at the moment.
            @endif
          </p>
          <a href="{{ route('tools') }}" class="btn btn-g btn-sm">
            Reset Filters
          </a>
        </div>
        @endif
        @endforelse
      </div>

      @if($moreTools->hasPages())
      <div class="pagi" role="navigation" aria-label="Pagination">
        @if($moreTools->onFirstPage())
          <button class="pg" aria-label="Previous" disabled style="opacity:0.5;cursor:not-allowed">←</button>
        @else
          <a href="{{ $moreTools->previousPageUrl() }}" class="pg" aria-label="Previous">←</a>
        @endif
        
        @foreach($moreTools->getUrlRange(1, $moreTools->lastPage()) as $page => $url)
          @if($page == $moreTools->currentPage())
            <button class="pg on" aria-current="page">{{ $page }}</button>
          @else
            <a href="{{ $url }}" class="pg">{{ $page }}</a>
          @endif
        @endforeach
        
        @if($moreTools->hasMorePages())
          <a href="{{ $moreTools->nextPageUrl() }}" class="pg" aria-label="Next">→</a>
        @else
          <button class="pg" aria-label="Next" disabled style="opacity:0.5;cursor:not-allowed">→</button>
        @endif
      </div>
      @endif
      @endif
    </main>

    <aside class="sidebar">
      <div class="sw">
        <div class="sw-t">⚡ Free Tools</div>
        @forelse($freeTools as $tool)
        <div class="sp @if($tool->color == 'c') sc @elseif($tool->color == 'b') sb @elseif($tool->color == 'p') sp @elseif($tool->color == 'r') sr @elseif($tool->color == 'o') so @elseif($tool->color == 'a') sa @endif">
          <div class="sp-top">
            <span class="sp-ic">{{ $tool->icon ?? '🔧' }}</span>
            <div>
              <div class="sp-nm">{{ $tool->name }}</div>
              @if($tool->tool_count)
              <div class="sp-ct">{{ $tool->tool_count }} tools</div>
              @endif
            </div>
          </div>
          @if($tool->description)
          <div class="sp-ds">{{ $tool->description }}</div>
          @endif
          @if($tool->url)
          <a href="{{ $tool->url }}" class="sp-lk {{ $tool->color }}" target="_blank" rel="noopener">Try Now →</a>
          @endif
        </div>
        @empty
        <div class="sp">
          <div class="sp-ds" style="text-align: center; color: #999;">No free tools available</div>
        </div>
        @endforelse
      </div>
      <div class="sw">
        <div class="sw-t">📂 Categories</div>
        <div class="cat-links">
          @forelse($sidebarCategories as $category)
            @if($category->tools_count > 0)
              <a href="{{ route('tools', ['category' => $category->slug]) }}" 
                 class="cl {{ $selectedCategory == $category->slug ? 'active' : '' }}" 
                 data-category="{{ $category->slug }}">
                {{ $category->icon ?? '📁' }} {{ $category->name }}
                <span class="cl-cnt">{{ $category->tools_count }}</span>
              </a>
            @endif
          @empty
            <p style="font-size:.8rem;color:var(--mist);padding:8px 0;">No featured categories available yet.</p>
          @endforelse
        </div>
      </div>
      <div class="sw">
        <div class="sw-t">🏷️ Popular Tags</div>
        <div class="tags-cloud">
          @forelse($popularTags as $tag)
            <a href="{{ route('tools', ['tag' => $tag->slug]) }}" 
               class="tag-btn {{ isset($selectedTag) && $selectedTag == $tag->slug ? 'active' : '' }}" 
               data-tag="{{ $tag->slug }}">{{ $tag->name }}</a>
          @empty
            <p style="font-size:.8rem;color:var(--mist);padding:8px 0;">No tags available yet.</p>
          @endforelse
        </div>
      </div>
    </aside>
  </div>
</div>

@section('extra_scripts')
<script>
// Tools Search with AJAX
(function() {
    const searchInput = document.getElementById('srch');
    const searchBtn = document.getElementById('srch-btn');
    const searchResults = document.getElementById('search-results');
    let searchTimeout;

    if (!searchInput || !searchBtn || !searchResults) {
        console.error('Search elements not found:', {searchInput, searchBtn, searchResults});
        return;
    }

    console.log('Search initialized successfully');

    // Search on input (debounced)
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        const query = this.value.trim();
        console.log('Input changed:', query);

        if (query.length < 3) {
            searchResults.style.display = 'none';
            return;
        }

        searchTimeout = setTimeout(() => {
            performSearch(query);
        }, 300);
    });

    // Search on button click
    searchBtn.addEventListener('click', function(e) {
        e.preventDefault();
        console.log('Search button clicked');
        const query = searchInput.value.trim();
        console.log('Query:', query);
        if (query.length >= 3) {
            performSearch(query);
        } else if (query.length === 0) {
            searchResults.innerHTML = '<div class="search-no-results"><i class="fas fa-exclamation-circle"></i> Please enter a search term</div>';
            searchResults.style.display = 'block';
        } else {
            searchResults.innerHTML = '<div class="search-no-results"><i class="fas fa-exclamation-circle"></i> Please enter at least 3 characters</div>';
            searchResults.style.display = 'block';
        }
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
        if (!searchInput.contains(e.target) && !searchResults.contains(e.target) && !searchBtn.contains(e.target)) {
            searchResults.style.display = 'none';
        }
    });

    // Perform AJAX search
    function performSearch(query) {
        console.log('performSearch called with:', query);
        
        // Show loading
        searchResults.innerHTML = '<div class="search-loading"><i class="fas fa-spinner fa-spin"></i> Searching...</div>';
        searchResults.style.display = 'block';
        console.log('Dropdown display set to block');

        const searchUrl = '{{ route("tools.search") }}?q=' + encodeURIComponent(query);
        console.log('Fetching:', searchUrl);

        fetch(searchUrl)
            .then(response => {
                console.log('Response status:', response.status);
                return response.json();
            })
            .then(data => {
                console.log('Data received:', data);
                console.log('Data length:', data.length);
                
                if (data.length === 0) {
                    searchResults.innerHTML = '<div class="search-no-results">No tools found. Try different keywords.</div>';
                } else {
                    let html = '';
                    data.forEach(tool => {
                        html += '<a href="' + tool.url + '" class="search-result-item" target="_blank">';
                        html += '<div class="search-result-category">' + tool.category_icon + ' ' + (tool.category || 'Uncategorized') + '</div>';
                        html += '<div class="search-result-title">' + highlightText(tool.title, query) + '</div>';
                        html += '<div class="search-result-excerpt">' + tool.excerpt + '</div>';
                        html += '</a>';
                    });
                    searchResults.innerHTML = html;
                    console.log('HTML set:', html.substring(0, 100) + '...');
                }
                searchResults.style.display = 'block';
                console.log('Final display:', searchResults.style.display);
                console.log('Dropdown element:', searchResults);
            })
            .catch(error => {
                console.error('Search error:', error);
                searchResults.innerHTML = '<div class="search-no-results">An error occurred. Please try again.</div>';
                searchResults.style.display = 'block';
            });
    }

    // Highlight matching text
    function highlightText(text, query) {
        const regex = new RegExp('(' + query + ')', 'gi');
        return text.replace(regex, '<strong style="color:var(--g)">$1</strong>');
    }
})();
</script>
@endsection

@section('schema')
@include('website.partials.tools-schema')
@endsection

@endsection
