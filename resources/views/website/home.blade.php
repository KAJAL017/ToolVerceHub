@extends('website.layouts.app')

@section('title', \App\Models\Setting::where('key', 'home_page_title')->value('value') ?? 'ToolVerse Hub — Free Image Converter, PDF Tools & Online Games')

@section('content')
<style>
  /* Global Responsive Styles */
  @media (max-width: 768px) {
    .btn {
      font-size: 0.9rem !important;
      padding: 12px 20px !important;
    }
    .btn-lg {
      font-size: 1rem !important;
      padding: 14px 24px !important;
    }
    .h1 {
      font-size: 2.2rem !important;
      line-height: 1.2 !important;
    }
    .h2 {
      font-size: 1.8rem !important;
      line-height: 1.3 !important;
    }
    .h3 {
      font-size: 1.3rem !important;
      line-height: 1.4 !important;
    }
    .wrap {
      padding: 0 20px !important;
    }
    section {
      padding: 60px 0 !important;
    }
    .eyebrow {
      font-size: 0.7rem !important;
    }
    .body-lg {
      font-size: 1rem !important;
    }
  }
  @media (max-width: 480px) {
    .btn {
      font-size: 0.85rem !important;
      padding: 10px 18px !important;
    }
    .btn-lg {
      font-size: 0.95rem !important;
      padding: 12px 20px !important;
    }
    .h1 {
      font-size: 1.9rem !important;
    }
    .h2 {
      font-size: 1.6rem !important;
    }
    .wrap {
      padding: 0 16px !important;
    }
    section {
      padding: 48px 0 !important;
    }
  }
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
.hbg{display:none;flex-direction:column;gap:5px;width:38px;height:38px;align-items:center;justify-content:center;cursor:pointer;margin-left:auto;border-radius:var(--r8)}
.hbg span{display:block;width:22px;height:2px;background:var(--ink);border-radius:2px;transition:all .25s}
.hbg.open span:nth-child(1){transform:rotate(45deg) translate(5px,5px)}
.hbg.open span:nth-child(2){opacity:0;transform:scaleX(0)}
.hbg.open span:nth-child(3){transform:rotate(-45deg) translate(5px,-5px)}
#mob{display:none;position:fixed;inset:0;z-index:390;background:#fff;flex-direction:column;align-items:center;justify-content:center;gap:6px}
#mob.open{display:flex}
.mob-x{position:absolute;top:16px;right:18px;width:38px;height:38px;border-radius:50%;background:var(--bg2);display:flex;align-items:center;justify-content:center;color:var(--mid);font-size:.95rem;cursor:pointer}
.mob-x:hover{background:var(--bg3)}
.mob-a{font-family:var(--f1);font-size:1.8rem;font-weight:600;color:var(--mid);padding:7px 30px;border-radius:var(--r12);transition:color .18s;text-align:center}
.mob-a:hover{color:var(--ink)}

/* ── HERO ── */
#hero{padding:128px 0 88px;background:var(--bg);overflow:hidden;position:relative}
.hero-orb{position:absolute;border-radius:50%;pointer-events:none}
.o1{width:560px;height:560px;top:-150px;right:-100px;background:radial-gradient(circle,rgba(45,125,82,.07),transparent 68%)}
.o2{width:400px;height:400px;bottom:-100px;left:-80px;background:radial-gradient(circle,rgba(200,85,28,.06),transparent 68%)}
.o3{width:260px;height:260px;top:60px;left:40%;background:radial-gradient(circle,rgba(184,122,16,.05),transparent 68%)}
.hero-dots{position:absolute;right:55px;top:65px;width:220px;height:220px;background-image:radial-gradient(rgba(45,125,82,.18) 1.5px,transparent 1.5px);background-size:23px 23px;pointer-events:none}
.hero-grid{display:grid;grid-template-columns:1fr 400px;gap:72px;align-items:center;position:relative;z-index:1}
.hero-pill{display:inline-flex;align-items:center;gap:8px;background:var(--gl);border:1.5px solid var(--gb);border-radius:var(--rp);padding:5px 15px 5px 7px;font-size:.72rem;font-weight:700;color:var(--g);letter-spacing:.07em;text-transform:uppercase;margin-bottom:22px}
.hero-pill-dot{width:22px;height:22px;border-radius:50%;background:var(--g);color:#fff;display:flex;align-items:center;justify-content:center;font-size:.68rem;flex-shrink:0}
.hero-h1{margin-bottom:20px}
.hero-h1 .accent-g{color:var(--g)}.hero-h1 .accent-c{color:var(--c)}
.hero-desc{font-size:1.05rem;line-height:1.78;color:var(--mid);max-width:490px;margin-bottom:34px}
.hero-ctas{display:flex;flex-wrap:wrap;gap:10px;margin-bottom:38px}
.trust-row{display:flex;flex-wrap:wrap;gap:20px}
.trust-item{display:flex;align-items:center;gap:7px;font-size:.82rem;font-weight:600;color:var(--mid)}
.trust-dot{width:8px;height:8px;border-radius:50%;flex-shrink:0}
.pcards{display:flex;flex-direction:column;gap:12px}
.pcard{display:flex;align-items:center;gap:14px;background:#fff;border:1.5px solid var(--bdr);border-radius:var(--r20);padding:16px 18px;box-shadow:var(--s1);transition:all .22s;text-decoration:none;color:inherit}
.pcard:hover{transform:translateX(7px);box-shadow:var(--s3);border-color:var(--bdr2)}
.pcard-ico{width:48px;height:48px;border-radius:var(--r12);display:flex;align-items:center;justify-content:center;font-size:1.35rem;flex-shrink:0}
.pig{background:var(--gl)}.pic{background:var(--cl)}.pib{background:var(--bl)}
.pcard-nm{font-weight:700;font-size:.95rem;color:var(--ink)}.pcard-meta{font-size:.73rem;font-weight:600;color:var(--mist)}
.pcard-chips{display:flex;gap:5px;margin-left:auto;flex-shrink:0}
.chip{font-size:.62rem;font-weight:700;padding:3px 8px;border-radius:var(--rp);text-transform:uppercase;letter-spacing:.04em}
.chip-g{background:var(--gl);color:var(--g)}.chip-c{background:var(--cl);color:var(--c)}.chip-b{background:var(--bl);color:var(--b)}.chip-a{background:var(--al);color:var(--a)}

/* ── STATS ── */
.stats-strip{background:#1C2820;padding:38px 0}
.stats-grid{display:grid;grid-template-columns:repeat(4,1fr)}
.stat{text-align:center;padding:6px 16px;border-right:1px solid rgba(255,255,255,.07)}
.stat:last-child{border-right:none}
.stat-n{font-family:var(--f1);font-style:italic;font-weight:700;font-size:2.6rem;line-height:1;margin-bottom:5px}
.sng{color:#6ECB8F}.snc{color:#F08A65}.snb{color:#8AABDE}.sna{color:#E8C06A}
.stat-l{font-size:.74rem;font-weight:600;color:rgba(255,255,255,.32);letter-spacing:.04em}

/* ── TOOLS ── */
#tools{background:var(--bg);padding:96px 0}
.sec-hd{margin-bottom:54px}
.sec-hd .body-lg{max-width:490px;margin-top:9px}
.tools-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:24px}
.tool-card{background:#fff;border:1.5px solid var(--bdr);border-radius:var(--r24);overflow:hidden;box-shadow:var(--s1);display:flex;flex-direction:column;transition:transform .26s,box-shadow .26s}
.tool-card:hover{transform:translateY(-8px);box-shadow:var(--s4)}
.tool-bar{height:5px}
.tbar-g{background:linear-gradient(90deg,var(--g),#6ECB8F)}.tbar-c{background:linear-gradient(90deg,var(--c),#F08A65)}.tbar-b{background:linear-gradient(90deg,var(--b),#8AABDE)}
.tool-body{padding:28px;flex:1;display:flex;flex-direction:column}
.tool-ico{width:54px;height:54px;border-radius:var(--r12);display:flex;align-items:center;justify-content:center;font-size:1.5rem;margin-bottom:18px}
.tig{background:var(--gl)}.tic{background:var(--cl)}.tib{background:var(--bl)}
.tool-nm{margin-bottom:5px}
.tool-tl{font-size:.7rem;font-weight:800;text-transform:uppercase;letter-spacing:.08em;margin-bottom:13px}
.ttg{color:var(--g)}.ttc{color:var(--c)}.ttb{color:var(--b)}
.tool-desc{font-size:.875rem;color:var(--mid);line-height:1.72;margin-bottom:18px}
.tool-tags{display:flex;flex-wrap:wrap;gap:6px;margin-bottom:20px}
.tool-feats{flex:1}
.feat{display:flex;align-items:flex-start;gap:9px;padding:7px 0;border-bottom:1px solid var(--bg2);font-size:.84rem;color:var(--mid)}
.feat:last-child{border-bottom:none}
.fchk{width:19px;height:19px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:.58rem;font-weight:900;flex-shrink:0;margin-top:1px}
.fchk-g{background:var(--gl);color:var(--g)}.fchk-c{background:var(--cl);color:var(--c)}.fchk-b{background:var(--bl);color:var(--b)}
.tool-foot{padding:18px 28px;background:var(--bg2);border-top:1.5px solid var(--bg3);display:flex;align-items:center;justify-content:space-between}
.tool-cnt-n{font-family:var(--f1);font-style:italic;font-weight:700;font-size:1.5rem;line-height:1}
.tcng{color:var(--g)}.tcnc{color:var(--c)}.tcnb{color:var(--b)}
.tool-cnt-l{font-size:.68rem;font-weight:700;color:var(--mist);margin-top:2px;text-transform:uppercase;letter-spacing:.04em}

/* ── CATEGORIES ── */
#cats{background:var(--bg2);padding:88px 0}
.cats-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:22px;margin-top:50px}
.cat-card{background:#fff;border:1.5px solid var(--bdr);border-radius:var(--r20);padding:26px 22px;box-shadow:var(--s1)}
.cat-hd{display:flex;align-items:center;gap:11px;padding-bottom:14px;border-bottom:1.5px solid var(--bg2);margin-bottom:12px}
.cat-hd-ico{width:40px;height:40px;border-radius:var(--r8);display:flex;align-items:center;justify-content:center;font-size:1.05rem;flex-shrink:0}
.cig{background:var(--gl)}.cic{background:var(--cl)}.cib{background:var(--bl)}
.cat-hd-nm{font-size:.94rem;font-weight:800;color:var(--ink)}.cat-hd-via{font-size:.69rem;color:var(--mist);font-weight:600;margin-top:1px}
.cat-row{display:flex;align-items:center;justify-content:space-between;padding:8px 9px;border-radius:var(--r8);font-size:.84rem;font-weight:600;color:var(--mid);transition:all .14s}
.cat-row:hover{background:var(--bg2);color:var(--g)}
.cat-row:hover .arr{opacity:1;transform:translateX(4px)}
.arr{font-size:.74rem;opacity:.2;transition:all .14s}
.cat-sub{font-size:.7rem;color:var(--mist);padding:2px 9px 7px;line-height:1.5}
.cat-sep{height:1px;background:var(--bg2);margin:2px 0}

/* ── USE CASES ── */
#use{background:var(--bg);padding:88px 0}
.tabs{display:flex;gap:8px;flex-wrap:wrap;margin:24px 0 38px}
.tab{padding:8px 19px;border-radius:var(--rp);border:1.5px solid var(--bdr);background:#fff;font-size:.82rem;font-weight:700;color:var(--mid);cursor:pointer;transition:all .18s}
.tab:hover{border-color:var(--g);color:var(--g)}.tab.on{background:var(--g);border-color:var(--g);color:#fff;box-shadow:0 3px 12px rgba(45,125,82,.3)}
.uc-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px}
.uc{background:#fff;border:1.5px solid var(--bdr);border-radius:var(--r20);padding:22px;box-shadow:var(--s1);transition:all .2s}
.uc:hover{border-color:var(--gb);box-shadow:var(--s2);transform:translateY(-4px)}
.uc-top{display:flex;align-items:center;gap:11px;margin-bottom:10px}
.uc-ico{width:40px;height:40px;background:var(--bg2);border-radius:var(--r8);display:flex;align-items:center;justify-content:center;font-size:1.1rem;flex-shrink:0}
.uc h4{font-size:.92rem;font-weight:800;color:var(--ink)}
.uc p{font-size:.82rem;color:var(--mid);line-height:1.65;margin-bottom:13px}
.uc-lnk{font-size:.8rem;font-weight:700;color:var(--g);display:inline-flex;align-items:center;gap:4px;transition:gap .14s}
.uc-lnk:hover{gap:7px}

/* ── BLOG ── */
#blog{background:var(--bg2);padding:88px 0}
.blog-hd{display:flex;align-items:flex-end;justify-content:space-between;flex-wrap:wrap;gap:14px;margin-bottom:42px}
.blog-grid{display:grid;grid-template-columns:1.5fr 1fr;gap:20px}
.feat-post{display:flex;flex-direction:column;background:#fff;border:1.5px solid var(--bdr);border-radius:var(--r24);overflow:hidden;box-shadow:var(--s1);transition:all .26s;text-decoration:none;color:inherit}
.feat-post:hover{transform:translateY(-5px);box-shadow:var(--s4)}
.feat-thumb{height:200px;display:flex;align-items:center;justify-content:center;font-size:4.8rem}
.ft1{background:linear-gradient(135deg,var(--gl),var(--al))}.ft2{background:linear-gradient(135deg,var(--cl),var(--al))}.ft3{background:linear-gradient(135deg,var(--bl),var(--cl))}
.feat-body{padding:24px;flex:1;display:flex;flex-direction:column}
.post-meta{display:flex;align-items:center;gap:8px;font-size:.71rem;color:var(--mist);font-weight:600;margin-bottom:9px}
.pcat{font-size:.67rem;font-weight:800;text-transform:uppercase;letter-spacing:.06em}
.pcg{color:var(--g)}.pcc{color:var(--c)}.pcb{color:var(--b)}
.post-excerpt{font-size:.84rem;color:var(--mid);line-height:1.65;flex:1;margin-bottom:15px}
.post-foot{display:flex;align-items:center;justify-content:space-between;padding-top:12px;border-top:1px solid var(--bg2);margin-top:auto}
.post-rt{font-size:.71rem;color:var(--mist);font-weight:600}
.post-rm{font-size:.8rem;font-weight:700;display:flex;align-items:center;gap:4px;transition:gap .14s}
.prmg{color:var(--g)}.prmc{color:var(--c)}.prmb{color:var(--b)}
.post-rm:hover{gap:7px}
.side-posts{display:flex;flex-direction:column;gap:13px}
.side-post{display:flex;background:#fff;border:1.5px solid var(--bdr);border-radius:var(--r20);overflow:hidden;box-shadow:var(--s1);transition:all .2s;text-decoration:none;color:inherit}
.side-post:hover{transform:translateY(-2px);box-shadow:var(--s2)}
.side-thumb{width:68px;height:68px;flex-shrink:0;display:flex;align-items:center;justify-content:center;font-size:1.5rem}
.st1{background:var(--gl)}.st2{background:var(--cl)}.st3{background:var(--bl)}
.side-body{padding:13px 16px;flex:1;min-width:0}
.side-body h4{font-size:.88rem;font-weight:700;color:var(--ink);line-height:1.35;margin-bottom:3px}
.side-body p{font-size:.76rem;color:var(--mist);line-height:1.5;overflow:hidden;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical}
.blog-tpl{margin-top:42px;background:#fff;border:1.5px solid var(--bdr);border-left:4px solid var(--g);border-radius:var(--r20);padding:28px;box-shadow:var(--s1)}
.blog-tpl h4{color:var(--g);font-weight:800;font-size:.96rem;margin-bottom:6px}
.blog-tpl>.body{margin-bottom:22px}
.tpl-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:10px}
.tpl-step{background:var(--bg);border:1px solid var(--bdr);border-radius:var(--r12);padding:14px}
.tpl-n{font-family:var(--f1);font-style:italic;font-weight:700;font-size:1.55rem;color:var(--g);opacity:.22;line-height:1;margin-bottom:5px}
.tpl-t{font-weight:800;font-size:.79rem;color:var(--ink);margin-bottom:2px}
.tpl-d{font-size:.71rem;color:var(--mist);line-height:1.5}

/* ── FAQ ── */
#faq{background:var(--bg);padding:88px 0}
.faq-hd{text-align:center;max-width:470px;margin:0 auto 46px}
.faq-grid{display:grid;grid-template-columns:1fr 1fr;gap:10px;max-width:900px;margin:0 auto}
.faq-item{background:#fff;border:1.5px solid var(--bdr);border-radius:var(--r16);overflow:hidden;transition:border-color .2s}
.faq-item.open{border-color:var(--gb)}
.faq-q{display:flex;align-items:center;justify-content:space-between;gap:12px;padding:16px 19px;cursor:pointer;font-weight:700;font-size:.875rem;color:var(--ink);transition:background .14s;border:none;background:none;width:100%;text-align:left}
.faq-q:hover{background:var(--bg2)}
.faq-ico{width:24px;height:24px;border-radius:50%;border:1.5px solid var(--bdr);display:flex;align-items:center;justify-content:center;font-size:.78rem;color:var(--mid);flex-shrink:0;transition:all .22s}
.faq-item.open .faq-ico{background:var(--g);border-color:var(--g);color:#fff;transform:rotate(45deg)}
.faq-ans{max-height:0;overflow:hidden;font-size:.85rem;color:var(--mid);line-height:1.72;padding:0 19px;border-top:1px solid transparent;transition:max-height .32s ease,padding .32s ease,border-color .32s}
.faq-item.open .faq-ans{max-height:200px;padding:12px 19px 17px;border-color:var(--bg2)}

/* ── CTA ── */
#cta{background:var(--bg2);padding:88px 0}
.cta-box{background:#1C2820;border-radius:var(--r24);padding:72px 52px;text-align:center;position:relative;overflow:hidden}
.cta-orb1{position:absolute;width:340px;height:340px;border-radius:50%;top:-90px;right:-90px;background:radial-gradient(circle,rgba(45,125,82,.15),transparent 70%);pointer-events:none}
.cta-orb2{position:absolute;width:270px;height:270px;border-radius:50%;bottom:-65px;left:-65px;background:radial-gradient(circle,rgba(200,85,28,.11),transparent 70%);pointer-events:none}
.cta-box .eyebrow{color:#6ECB8F;justify-content:center;position:relative;z-index:1}
.cta-box .eyebrow::before{background:#6ECB8F}
.cta-box .h2{color:#F5F2E8;margin-bottom:12px;position:relative;z-index:1}
.cta-box .body-lg{color:rgba(245,242,232,.45);margin-bottom:34px;position:relative;z-index:1}
.cta-btns{display:flex;gap:12px;justify-content:center;flex-wrap:wrap;position:relative;z-index:1}

/* ── FOOTER ── */
#footer{background:#0F1A12;padding:66px 0 28px}
.footer-grid{display:grid;grid-template-columns:1.7fr 1fr 1fr 1fr 1fr;gap:40px;margin-bottom:52px}
.ftr-logo{font-family:var(--f1);font-size:1.2rem;font-weight:700;color:#F5F2E8;display:flex;align-items:center;gap:9px;margin-bottom:11px}
.ftr-logo .logo-mark{width:28px;height:28px;border-radius:8px;font-size:.82rem}
.ftr-logo em{color:#6ECB8F}
.ftr-brand p{font-size:.81rem;color:rgba(245,242,232,.28);line-height:1.72;margin-bottom:18px;max-width:218px}
.socials{display:flex;gap:8px}
.soc{width:32px;height:32px;border-radius:var(--r8);background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.08);display:flex;align-items:center;justify-content:center;font-size:.78rem;color:rgba(255,255,255,.36);transition:all .18s}
.soc:hover{background:var(--g);border-color:var(--g);color:#fff}
.ftr-col h5{font-size:.69rem;font-weight:800;letter-spacing:.11em;text-transform:uppercase;color:rgba(255,255,255,.2);margin-bottom:14px}
.flinks{display:flex;flex-direction:column;gap:8px}
.fl{font-size:.82rem;color:rgba(245,242,232,.35);transition:color .15s}
.fl:hover{color:rgba(245,242,232,.82)}
.fl-g{color:#6ECB8F}.fl-c{color:#F08A65}.fl-b{color:#8AABDE}
.footer-btm{display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;padding-top:24px;border-top:1px solid rgba(255,255,255,.06)}
.footer-btm p{font-size:.77rem;color:rgba(255,255,255,.2)}
.ftr-legal{display:flex;gap:18px}
.ftr-legal a{font-size:.74rem;color:rgba(255,255,255,.2);transition:color .14s}
.ftr-legal a:hover{color:rgba(255,255,255,.65)}

/* ── REVEAL ── */
.rv{opacity:0;transform:translateY(24px);transition:opacity .55s ease,transform .55s ease}
.rv.in{opacity:1;transform:none}
.rv.d1{transition-delay:.08s}.rv.d2{transition-delay:.16s}.rv.d3{transition-delay:.24s}

/* ── RESPONSIVE ── */
@media(max-width:1040px){.tools-grid{grid-template-columns:1fr 1fr}.hero-grid{grid-template-columns:1fr;gap:44px}.pcards{display:grid;grid-template-columns:repeat(3,1fr)}.footer-grid{grid-template-columns:1fr 1fr 1fr;gap:26px}}
@media(max-width:860px){.nav,.hdr-cta{display:none}.hbg{display:flex}.cats-grid,.uc-grid{grid-template-columns:1fr 1fr}.faq-grid{grid-template-columns:1fr}.blog-grid{grid-template-columns:1fr}.tpl-grid{grid-template-columns:1fr 1fr}.stats-grid{grid-template-columns:1fr 1fr}.stat:nth-child(2){border-right:none}.cta-box{padding:44px 26px}.footer-grid{grid-template-columns:1fr 1fr;gap:22px}}
@media(max-width:560px){.tools-grid,.cats-grid,.uc-grid{grid-template-columns:1fr}.pcards{grid-template-columns:1fr}.hero-ctas,.cta-btns{gap:9px}.side-posts{flex-direction:row;flex-wrap:wrap}.side-post{flex:1 1 260px}}
@media(max-width:400px){.footer-grid{grid-template-columns:1fr}}
</style>
</style>
@verbatim
<!-- HERO -->
<section id="hero">
  <div class="hero-orb o1"></div>
  <div class="hero-orb o2"></div>
  <div class="hero-orb o3"></div>
  <div class="wrap">
    <div style="display:grid;grid-template-columns:1fr;gap:40px;align-items:center;position:relative;z-index:1">
      <!-- Mobile: Stack vertically, Desktop: Side by side -->
      <style>
        @media (min-width: 768px) {
          .hero-grid {
            grid-template-columns: 1fr 400px !important;
            gap: 72px !important;
          }
          .hero-tools {
            display: flex !important;
          }
        }
        @media (max-width: 767px) {
          .hero-grid {
            grid-template-columns: 1fr !important;
            gap: 32px !important;
            text-align: center;
          }
          .hero-tools {
            display: flex !important;
            height: 252px !important;
            margin: 0 auto !important;
            max-width: 100% !important;
          }
          .hero-tool-card {
            padding: 14px 16px !important;
          }
          .hero-tool-card > div:first-child {
            width: 42px !important;
            height: 42px !important;
            font-size: 1.2rem !important;
          }
          .hero-tool-card > div:nth-child(2) > div:first-child {
            font-size: 0.88rem !important;
          }
          .hero-tool-card > div:nth-child(2) > div:last-child {
            font-size: 0.7rem !important;
          }
          .hero-tool-card > div:last-child span {
            font-size: 0.58rem !important;
            padding: 2px 6px !important;
          }
          .hero-content h1 {
            font-size: 1.8rem !important;
            line-height: 1.3 !important;
            margin-bottom: 16px !important;
            word-wrap: break-word !important;
          }
          .hero-content p {
            max-width: 100% !important;
            font-size: 0.95rem !important;
            line-height: 1.6 !important;
            margin-bottom: 24px !important;
          }
          .hero-features {
            justify-content: center !important;
            flex-direction: row !important;
            gap: 8px !important;
            flex-wrap: wrap !important;
          }
          .hero-features > div {
            font-size: 0.75rem !important;
            white-space: nowrap !important;
          }
          .hero-content > div:first-child {
            margin-bottom: 16px !important;
          }
          #hero {
            padding: 100px 0 60px !important;
          }
          .wrap {
            padding: 0 20px !important;
          }
        }
        @media (max-width: 480px) {
          .hero-tools {
            height: 216px !important;
          }
          .hero-tool-card {
            padding: 12px 14px !important;
          }
          .hero-tool-card > div:first-child {
            width: 38px !important;
            height: 38px !important;
            font-size: 1.1rem !important;
          }
          .hero-tool-card > div:nth-child(2) > div:first-child {
            font-size: 0.82rem !important;
          }
          .hero-tool-card > div:nth-child(2) > div:last-child {
            font-size: 0.66rem !important;
          }
          .hero-content h1 {
            font-size: 1.6rem !important;
            line-height: 1.25 !important;
          }
          .hero-content p {
            font-size: 0.9rem !important;
          }
          #hero {
            padding: 90px 0 50px !important;
          }
          .wrap {
            padding: 0 16px !important;
          }
        }
      </style>
      <div class="hero-grid" style="display:grid;grid-template-columns:1fr 400px;gap:72px;align-items:center">
        <div class="hero-content">
          <div style="display:inline-flex;align-items:center;gap:8px;background:var(--gl);border:1.5px solid var(--gb);border-radius:999px;padding:5px 15px 5px 7px;font-size:.72rem;font-weight:700;color:var(--g);margin-bottom:22px">
            <span style="width:22px;height:22px;border-radius:50%;background:var(--g);color:#fff;display:flex;align-items:center;justify-content:center;font-size:.68rem">🌿</span>
@endverbatim
            {{ $heroSettings['badge_text'] }}
@verbatim
          </div>
          <h1 class="h1" style="margin-bottom:20px">
@endverbatim
            {{ $heroSettings['title_line1'] }} <span style="color:var(--g)">{{ $heroSettings['title_highlight1'] }}</span><br>
            {{ $heroSettings['title_line2'] }} <span style="color:var(--c)">{{ $heroSettings['title_highlight2'] }}</span>
@verbatim
          </h1>
          <p style="font-size:1.05rem;line-height:1.78;color:var(--mid);max-width:490px;margin-bottom:34px">
@endverbatim
            {{ $heroSettings['description'] }}
@verbatim
          </p>
          
          <style>
            @keyframes slideFromLeft {
              from {
                opacity: 0;
                transform: translateX(-60px);
              }
              to {
                opacity: 1;
                transform: translateX(0);
              }
            }
            
            @keyframes slideFromTop {
              from {
                opacity: 0;
                transform: translateY(-60px);
              }
              to {
                opacity: 1;
                transform: translateY(0);
              }
            }
            
            @keyframes slideFromRight {
              from {
                opacity: 0;
                transform: translateX(60px);
              }
              to {
                opacity: 1;
                transform: translateX(0);
              }
            }
            
            .hero-btn-1 {
              animation: slideFromLeft 0.8s ease-out forwards;
              opacity: 0;
            }
            
            .hero-btn-2 {
              animation: slideFromTop 0.8s ease-out 0.2s forwards;
              opacity: 0;
            }
            
            .hero-btn-3 {
              animation: slideFromRight 0.8s ease-out 0.4s forwards;
              opacity: 0;
            }
          </style>
          
          <div style="display:flex;flex-wrap:wrap;gap:10px;margin-bottom:38px;justify-content:flex-start">
@endverbatim
            @foreach($heroButtons as $index => $button)
            <a href="{{ $button->url }}" class="btn btn-{{ $button->color == 'green' ? 'g' : ($button->color == 'orange' ? 'c' : 'b') }} btn-lg hero-btn-{{ $index + 1 }}" target="_blank" rel="noopener">{{ $button->icon }} {{ $button->text }}</a>
            @endforeach
@verbatim
          </div>
          <div class="hero-features" style="display:flex;flex-wrap:wrap;gap:20px">
            <div style="display:flex;align-items:center;gap:7px;font-size:.82rem;font-weight:600;color:var(--mid)">
              <span style="width:8px;height:8px;border-radius:50%;background:var(--g)"></span>
@endverbatim
              {{ $heroSettings['feature1_text'] }}
@verbatim
            </div>
            <div style="display:flex;align-items:center;gap:7px;font-size:.82rem;font-weight:600;color:var(--mid)">
              <span style="width:8px;height:8px;border-radius:50%;background:var(--c)"></span>
@endverbatim
              {{ $heroSettings['feature2_text'] }}
@verbatim
            </div>
            <div style="display:flex;align-items:center;gap:7px;font-size:.82rem;font-weight:600;color:var(--mid)">
              <span style="width:8px;height:8px;border-radius:50%;background:var(--b)"></span>
@endverbatim
              {{ $heroSettings['feature3_text'] }}
@verbatim
            </div>
          </div>
        </div>
        
        <style>
          @keyframes verticalScroll {
            0% {
              transform: translateY(0);
            }
            100% {
              transform: translateY(-50%);
            }
          }
          
          .hero-tools {
            height: 252px;
            overflow: hidden;
            position: relative;
          }
          
          .hero-tools-slider {
            display: flex;
            flex-direction: column;
            gap: 12px;
            animation: verticalScroll 20s linear infinite;
          }
          
          .hero-tools:hover .hero-tools-slider {
            animation-play-state: paused;
          }
          
          .hero-tool-card {
            flex-shrink: 0;
          }
        </style>
        
        <div class="hero-tools">
          <div class="hero-tools-slider">
@endverbatim
        @foreach($heroTools as $tool)
        @php
          $colors = ['g' => ['gl', 'g'], 'c' => ['cl', 'c'], 'b' => ['bl', 'b'], 'a' => ['al', 'a']];
          $color = $colors[$tool->color] ?? $colors['g'];
        @endphp
        <a href="{{ $tool->url ?? '#' }}" class="hero-tool-card" style="display:flex;align-items:center;gap:14px;background:#fff;border:1.5px solid var(--bdr);border-radius:20px;padding:16px 18px;box-shadow:var(--s1);transition:all .22s;text-decoration:none;color:inherit" target="_blank">
          <div style="width:48px;height:48px;border-radius:12px;background:var(--{{ $color[0] }});display:flex;align-items:center;justify-content:center;font-size:1.35rem">{{ $tool->icon ?? '🔧' }}</div>
          <div style="flex:1">
            <div style="font-weight:700;font-size:.95rem;color:var(--ink)">{{ $tool->name }}</div>
            <div style="font-size:.73rem;font-weight:600;color:var(--mist)">{{ $tool->tool_count ?? $tool->description }}</div>
          </div>
          <div style="display:flex;gap:5px">
            <span style="font-size:.62rem;font-weight:700;padding:3px 8px;border-radius:999px;background:var(--{{ $color[0] }});color:var(--{{ $color[1] }})">{{ $tool->is_free ? 'FREE' : 'PREMIUM' }}</span>
          </div>
        </a>
        @endforeach
        
        {{-- Duplicate cards for seamless infinite loop --}}
        @foreach($heroTools as $tool)
        @php
          $colors = ['g' => ['gl', 'g'], 'c' => ['cl', 'c'], 'b' => ['bl', 'b'], 'a' => ['al', 'a']];
          $color = $colors[$tool->color] ?? $colors['g'];
        @endphp
        <a href="{{ $tool->url ?? '#' }}" class="hero-tool-card" style="display:flex;align-items:center;gap:14px;background:#fff;border:1.5px solid var(--bdr);border-radius:20px;padding:16px 18px;box-shadow:var(--s1);transition:all .22s;text-decoration:none;color:inherit" target="_blank">
          <div style="width:48px;height:48px;border-radius:12px;background:var(--{{ $color[0] }});display:flex;align-items:center;justify-content:center;font-size:1.35rem">{{ $tool->icon ?? '🔧' }}</div>
          <div style="flex:1">
            <div style="font-weight:700;font-size:.95rem;color:var(--ink)">{{ $tool->name }}</div>
            <div style="font-size:.73rem;font-weight:600;color:var(--mist)">{{ $tool->tool_count ?? $tool->description }}</div>
          </div>
          <div style="display:flex;gap:5px">
            <span style="font-size:.62rem;font-weight:700;padding:3px 8px;border-radius:999px;background:var(--{{ $color[0] }});color:var(--{{ $color[1] }})">{{ $tool->is_free ? 'FREE' : 'PREMIUM' }}</span>
          </div>
        </a>
        @endforeach
@verbatim
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- STATS -->
<section id="stats-section" style="background:#1C2820;padding:38px 0">
  <div class="wrap">
    <style>
      .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
      }
      @media (max-width: 768px) {
        .stats-grid {
          grid-template-columns: repeat(2, 1fr) !important;
          gap: 20px 0;
        }
        .stats-grid > div {
          border-right: none !important;
          border-bottom: 1px solid rgba(255,255,255,.07);
          padding: 20px 16px !important;
        }
        .stats-grid > div:nth-child(2n) {
          border-right: 1px solid rgba(255,255,255,.07);
        }
        .stats-grid > div:nth-last-child(-n+2) {
          border-bottom: none;
        }
      }
      @media (max-width: 480px) {
        .stats-grid {
          grid-template-columns: 1fr !important;
        }
        .stats-grid > div {
          border-right: none !important;
          border-bottom: 1px solid rgba(255,255,255,.07);
        }
        .stats-grid > div:last-child {
          border-bottom: none;
        }
      }
    </style>
    <div class="stats-grid">
@endverbatim
      @foreach($homeStats as $index => $stat)
      <div style="text-align:center;padding:6px 16px;{{ $index < 3 ? 'border-right:1px solid rgba(255,255,255,.07)' : '' }}">
        <div class="counter-number" data-target="{{ $stat['number'] }}" style="font-family:var(--f1);font-style:italic;font-weight:700;font-size:2.6rem;line-height:1;margin-bottom:5px;color:{{ $stat['color'] }}">{{ $stat['number'] }}</div>
        <div style="font-size:.74rem;font-weight:600;color:rgba(255,255,255,.32)">{{ $stat['label'] }}</div>
      </div>
      @endforeach
@verbatim
    </div>
  </div>
</section>

<script>
// Counter Animation - SEO-friendly (starts with actual value, animates from 0)
(function() {
  let animated = false;
  
  function animateCounter(element) {
    const target = element.getAttribute('data-target');
    const hasPlus = target.includes('+');
    const hasPercent = target.includes('%');
    const numericTarget = parseInt(target.replace(/[^0-9]/g, ''));
    const duration = 2000; // 2 seconds
    const increment = numericTarget / (duration / 16); // 60fps
    let current = 0;
    
    const timer = setInterval(() => {
      current += increment;
      if (current >= numericTarget) {
        current = numericTarget;
        clearInterval(timer);
      }
      
      let displayValue = Math.floor(current);
      if (hasPlus) displayValue += '+';
      if (hasPercent) displayValue += '%';
      
      element.textContent = displayValue;
    }, 16);
  }
  
  function checkScroll() {
    if (animated) return;
    
    const statsSection = document.getElementById('stats-section');
    if (!statsSection) return;
    
    const rect = statsSection.getBoundingClientRect();
    const isVisible = rect.top < window.innerHeight && rect.bottom >= 0;
    
    if (isVisible) {
      animated = true;
      const counters = document.querySelectorAll('.counter-number');
      counters.forEach(counter => animateCounter(counter));
    }
  }
  
  // Check on scroll
  window.addEventListener('scroll', checkScroll);
  // Check on load
  window.addEventListener('load', checkScroll);
  // Check immediately
  setTimeout(checkScroll, 100);
})();
</script>

<!-- TOOLS SECTION -->
<section id="tools" style="background:var(--bg);padding:96px 0 48px">
  <div class="wrap">
    <div style="margin-bottom:54px;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:20px">
      <div>
        <div class="eyebrow">Our Products</div>
        <h2 class="h2">Three Powerful Platforms,<br>One Unified Hub</h2>
        <p class="body-lg" style="max-width:490px;margin:9px 0 0">
          Access 130+ professional tools and 500+ games — all free, all browser-based, no downloads required.
        </p>
      </div>
      <div style="display:flex;gap:12px">
        <button class="swiper-button-prev-custom" style="width:44px;height:44px;border-radius:50%;background:#fff;border:1.5px solid var(--bdr);display:flex;align-items:center;justify-content:center;cursor:pointer;transition:all .2s;box-shadow:var(--s1)">
          <i class="fas fa-arrow-left" style="color:var(--g)"></i>
        </button>
        <button class="swiper-button-next-custom" style="width:44px;height:44px;border-radius:50%;background:#fff;border:1.5px solid var(--bdr);display:flex;align-items:center;justify-content:center;cursor:pointer;transition:all .2s;box-shadow:var(--s1)">
          <i class="fas fa-arrow-right" style="color:var(--g)"></i>
        </button>
      </div>
    </div>
    
    <style>
      .products-swiper {
        overflow: hidden !important;
        width: 100%;
      }
      .products-swiper .swiper-wrapper {
        display: flex !important;
      }
      .products-swiper .swiper-slide {
        height: auto;
        flex-shrink: 0;
      }
      .swiper-button-prev-custom,
      .swiper-button-next-custom {
        pointer-events: auto !important;
        opacity: 1 !important;
      }
      .swiper-button-prev-custom:hover,
      .swiper-button-next-custom:hover {
        background: var(--g);
        border-color: var(--g);
        transform: scale(1.05);
      }
      .swiper-button-prev-custom:hover i,
      .swiper-button-next-custom:hover i {
        color: #fff;
      }
      .swiper-button-prev-custom:active,
      .swiper-button-next-custom:active {
        transform: scale(0.95);
      }
      @media (max-width: 768px) {
        .swiper-button-prev-custom,
        .swiper-button-next-custom {
          display: none;
        }
      }
    </style>
    
    <div class="swiper products-swiper">
      <div class="swiper-wrapper">
@endverbatim
        @foreach($featuredTools as $index => $tool)
        @php
          $colors = ['g' => ['g', '#6ECB8F', 'gl'], 'c' => ['c', '#F08A65', 'cl'], 'b' => ['b', '#8AABDE', 'bl'], 'a' => ['a', '#E8C06A', 'al']];
          $color = $colors[$tool->color] ?? $colors['g'];
        @endphp
@verbatim
        <div class="swiper-slide">
@endverbatim
          <div style="background:#fff;border:1.5px solid var(--bdr);border-radius:24px;overflow:hidden;box-shadow:var(--s1);height:100%">
            <div style="height:5px;background:linear-gradient(90deg,var(--{{ $color[0] }}),{{ $color[1] }})"></div>
            <div style="padding:28px">
              <div style="width:54px;height:54px;border-radius:12px;background:var(--{{ $color[2] }});display:flex;align-items:center;justify-content:center;font-size:1.5rem;margin-bottom:18px">{{ $tool->icon ?? '🔧' }}</div>
              <h3 class="h3" style="margin-bottom:5px">{{ $tool->name }}</h3>
              <div style="font-size:.7rem;font-weight:800;text-transform:uppercase;letter-spacing:.08em;color:var(--{{ $color[0] }});margin-bottom:13px">{{ $tool->category->name ?? 'TOOLS' }}</div>
              <p style="font-size:.875rem;color:var(--mid);line-height:1.72;margin-bottom:18px">
                {{ $tool->description ?? 'Professional tools for your daily tasks.' }}
              </p>
              @if($tool->toolTags && $tool->toolTags->count() > 0)
              <div style="display:flex;flex-wrap:wrap;gap:6px;margin-bottom:20px">
                @foreach($tool->toolTags->take(4) as $tag)
                <span class="tag tag-{{ $color[0] }}">{{ strtoupper($tag->name) }}</span>
                @endforeach
              </div>
              @endif
            </div>
            <div style="padding:18px 28px;background:var(--bg2);border-top:1.5px solid var(--bg3);display:flex;align-items:center;justify-content:space-between">
              <div>
                <div style="font-family:var(--f1);font-style:italic;font-weight:700;font-size:1.5rem;line-height:1;color:var(--{{ $color[0] }})">{{ $tool->tool_count ?? 'NEW' }}</div>
                <div style="font-size:.68rem;font-weight:700;color:var(--mist);margin-top:2px">{{ $tool->is_free ? 'FREE' : 'TOOLS' }}</div>
              </div>
              <a href="{{ $tool->url ?? '#' }}" class="btn btn-{{ $color[0] }} btn-sm" target="_blank">Visit Site →</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  if (typeof Swiper === 'undefined') {
    console.error('Swiper library not loaded!');
    return;
  }
  
  // Products Swiper
  const totalSlides = document.querySelectorAll('.products-swiper .swiper-slide').length;
  const shouldLoop = totalSlides > 3;
  
  const productsSwiper = new Swiper('.products-swiper', {
    slidesPerView: 1,
    slidesPerGroup: 1,
    spaceBetween: 24,
    loop: shouldLoop,
    loopedSlides: shouldLoop ? totalSlides : 0,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: '.swiper-button-next-custom',
      prevEl: '.swiper-button-prev-custom',
    },
    breakpoints: {
      640: {
        slidesPerView: 2,
        slidesPerGroup: 1,
        spaceBetween: 20,
      },
      1024: {
        slidesPerView: 3,
        slidesPerGroup: 1,
        spaceBetween: 24,
      },
    },
  });
  
  console.log('Products Swiper initialized:', productsSwiper);
  
  // Categories Swiper
  const totalCatSlides = document.querySelectorAll('.categories-swiper .swiper-slide').length;
  const shouldCatLoop = totalCatSlides > 3;
  
  console.log('Categories slides:', totalCatSlides, 'Loop:', shouldCatLoop);
  
  const categoriesSwiper = new Swiper('.categories-swiper', {
    slidesPerView: 1,
    slidesPerGroup: 1,
    spaceBetween: 24,
    loop: shouldCatLoop,
    loopedSlides: shouldCatLoop ? totalCatSlides : 0,
    autoplay: {
      delay: 6000,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: '.swiper-button-next-cats',
      prevEl: '.swiper-button-prev-cats',
    },
    breakpoints: {
      640: {
        slidesPerView: 2,
        slidesPerGroup: 1,
        spaceBetween: 20,
      },
      1024: {
        slidesPerView: 3,
        slidesPerGroup: 1,
        spaceBetween: 24,
      },
    },
  });
  
  console.log('Categories Swiper initialized:', categoriesSwiper);
  
  // Manual click handlers as backup
  const nextCatBtn = document.querySelector('.swiper-button-next-cats');
  const prevCatBtn = document.querySelector('.swiper-button-prev-cats');
  
  if (nextCatBtn) {
    nextCatBtn.addEventListener('click', function(e) {
      e.preventDefault();
      console.log('Next button clicked');
      categoriesSwiper.slideNext();
    });
  }
  
  if (prevCatBtn) {
    prevCatBtn.addEventListener('click', function(e) {
      e.preventDefault();
      console.log('Prev button clicked');
      categoriesSwiper.slidePrev();
    });
  }
});
</script>




<section id="cats">
  <div class="wrap">
    <div style="margin-bottom:54px;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:20px">
      <div class="sec-hd rv in">
        <div class="eyebrow">Browse by Category</div>
        <h2 class="h2">Find Any Tool Instantly</h2>
        <p class="body-lg">Every category links directly to the tool — organised by format, use-case, and genre.</p>
      </div>
      <div style="display:flex;gap:12px">
        <button class="swiper-button-prev-cats" style="width:44px;height:44px;border-radius:50%;background:#fff;border:1.5px solid var(--bdr);display:flex;align-items:center;justify-content:center;cursor:pointer;transition:all .2s;box-shadow:var(--s1)">
          <i class="fas fa-arrow-left" style="color:var(--g)"></i>
        </button>
        <button class="swiper-button-next-cats" style="width:44px;height:44px;border-radius:50%;background:#fff;border:1.5px solid var(--bdr);display:flex;align-items:center;justify-content:center;cursor:pointer;transition:all .2s;box-shadow:var(--s1)">
          <i class="fas fa-arrow-right" style="color:var(--g)"></i>
        </button>
      </div>
    </div>
    
    <style>
      .categories-swiper {
        overflow: hidden !important;
        width: 100%;
      }
      .categories-swiper .swiper-wrapper {
        display: flex !important;
      }
      .categories-swiper .swiper-slide {
        height: auto;
        flex-shrink: 0;
      }
      .swiper-button-prev-cats,
      .swiper-button-next-cats {
        pointer-events: auto !important;
        opacity: 1 !important;
      }
      .swiper-button-prev-cats:hover,
      .swiper-button-next-cats:hover {
        background: var(--g);
        border-color: var(--g);
        transform: scale(1.05);
      }
      .swiper-button-prev-cats:hover i,
      .swiper-button-next-cats:hover i {
        color: #fff;
      }
      .swiper-button-prev-cats:active,
      .swiper-button-next-cats:active {
        transform: scale(0.95);
      }
      @media (max-width: 768px) {
        .swiper-button-prev-cats,
        .swiper-button-next-cats {
          display: none;
        }
      }
    </style>
    
    <div class="swiper categories-swiper">
      <div class="swiper-wrapper">
      @foreach($homeCategories as $index => $category)
      @php
        $colorClasses = ['g' => 'cig', 'c' => 'cic', 'b' => 'cib', 'a' => 'cia'];
        $colorClass = $colorClasses[$category->color] ?? 'cig';
        $delayClass = 'd' . ($index + 1);
      @endphp
        <div class="swiper-slide">
          <div class="cat-card rv {{ $delayClass }} in">
            <div class="cat-hd">
              <div class="cat-hd-ico {{ $colorClass }}">{{ $category->icon ?? '🔧' }}</div>
              <div>
                <div class="cat-hd-nm">{{ $category->name }}</div>
                <div class="cat-hd-via">{{ $category->description ? \Illuminate\Support\Str::limit($category->description, 30) : 'Professional Tools' }}</div>
              </div>
            </div>
            @foreach($category->tools as $toolIndex => $tool)
            <a href="{{ $tool->url ?? '#' }}" class="cat-row" target="_blank" rel="noopener">
              {{ $tool->icon ?? '🔧' }} {{ $tool->name }}<span class="arr">→</span>
            </a>
            @if($tool->description && $toolIndex < 3)
            <div class="cat-sub">{{ \Illuminate\Support\Str::limit($tool->description, 50) }}</div>
            @endif
            @if(!$loop->last && $toolIndex < 3)
            <div class="cat-sep"></div>
            @endif
            @endforeach
          </div>
        </div>
      @endforeach
      </div>
    </div>
  </div>
</section>

<section id="use">
  <div class="wrap">
    <div class="sec-hd rv in">
      <div class="eyebrow">Who It's Built For</div>
      <h2 class="h2">A Tool for Every Need</h2>
    </div>
    
    @if($useCaseCategories->count() > 0)
    <!-- Dynamic Tabs from Categories -->
    <div class="tabs" role="tablist" aria-label="Filter use cases">
      @foreach($useCaseCategories as $index => $category)
      <button class="tab {{ $index === 0 ? 'on' : '' }}" 
              role="tab" 
              aria-selected="{{ $index === 0 ? 'true' : 'false' }}"
              data-category="{{ $category->id }}">
        {{ $category->icon }} {{ $category->name }}
      </button>
      @endforeach
    </div>
    
    <!-- Dynamic Tools Grid -->
    @foreach($useCaseCategories as $catIndex => $category)
    <div class="uc-grid" 
         id="category-{{ $category->id }}" 
         style="display: {{ $catIndex === 0 ? 'grid' : 'none' }}">
      @foreach($category->tools->take(6) as $toolIndex => $tool)
      @php
        $delayClass = 'd' . (($toolIndex % 3) + 1);
      @endphp
      <div class="uc rv {{ $delayClass }} in">
        <div class="uc-top">
          <div class="uc-ico">{{ $tool->icon ?? '�' }}</div>
          <h4>{{ $tool->name }}</h4>
        </div>
        <p>{{ $tool->description ?? 'Professional tool for your needs' }}</p>
        <a href="{{ $tool->url ?? '#' }}" class="uc-lnk" target="_blank" rel="noopener">
          Try {{ $tool->name }} →
        </a>
      </div>
      @endforeach
    </div>
    @endforeach
    
    @else
    <!-- Fallback if no categories -->
    <div class="tabs" role="tablist" aria-label="Filter use cases">
      <button class="tab on" role="tab" aria-selected="true">�👨‍🎓 Students</button>
      <button class="tab" role="tab" aria-selected="false">💼 Professionals</button>
      <button class="tab" role="tab" aria-selected="false">🛒 E-Commerce</button>
      <button class="tab" role="tab" aria-selected="false">🎨 Designers</button>
      <button class="tab" role="tab" aria-selected="false">🎮 Gamers</button>
    </div>
    <div class="uc-grid">
      <div class="uc rv d1 in"><div class="uc-top"><div class="uc-ico">📄</div><h4>Convert PDF to Word</h4></div><p>Edit research papers and assignments instantly — convert any PDF into a fully editable Word document in seconds, no software needed.</p><a href="https://demo.smartpdfs.in/pdf-to-word-converter" class="uc-lnk" target="_blank" rel="noopener">Try PDF to Word →</a></div>
      <div class="uc rv d2 in"><div class="uc-top"><div class="uc-ico">🖼️</div><h4>Compress Images Online</h4></div><p>Reduce image file sizes for blogs and social media without losing visible quality. PNG to JPG conversion in one click, no software.</p><a href="https://imgconvertpro.site/category/image-tools" class="uc-lnk" target="_blank" rel="noopener">Try Image Tools →</a></div>
      <div class="uc rv d3 in"><div class="uc-top"><div class="uc-ico">🎮</div><h4>Play Browser Games Free</h4></div><p>No downloads, no logins — jump into action, puzzle, or racing games instantly in any browser on any device.</p><a href="https://zapgames.fun/" class="uc-lnk" target="_blank" rel="noopener">Play Free Now →</a></div>
      <div class="uc rv d1 in"><div class="uc-top"><div class="uc-ico">🛒</div><h4>Print Shipping Labels</h4></div><p>Crop and format Amazon, Flipkart &amp; Meesho PDF shipping labels for thermal printers — free for Indian e-commerce sellers.</p><a href="https://imgconvertpro.site/category/ecommerce-tools" class="uc-lnk" target="_blank" rel="noopener">E-Commerce Tools →</a></div>
      <div class="uc rv d2 in"><div class="uc-top"><div class="uc-ico">🎨</div><h4>Generate CSS Designs</h4></div><p>Create animations, gradients, and glassmorphism effects with live preview and instant production-ready CSS code output.</p><a href="https://imgconvertpro.site/category/design-tools" class="uc-lnk" target="_blank" rel="noopener">Design Tools →</a></div>
      <div class="uc rv d3 in"><div class="uc-top"><div class="uc-ico">🔒</div><h4>Secure &amp; Merge PDFs</h4></div><p>Password-protect sensitive documents, merge contracts, or split large PDFs — 100% free, no account needed ever.</p><a href="https://demo.smartpdfs.in/merge-pdf" class="uc-lnk" target="_blank" rel="noopener">Merge PDF →</a></div>
    </div>
    @endif
  </div>
</section>

<script>
// Tab switching functionality for "Who It's Built For" section
document.addEventListener('DOMContentLoaded', function() {
  const tabs = document.querySelectorAll('#use .tab');
  const grids = document.querySelectorAll('#use .uc-grid');
  
  tabs.forEach(tab => {
    tab.addEventListener('click', function() {
      const categoryId = this.getAttribute('data-category');
      
      // Remove active class from all tabs
      tabs.forEach(t => {
        t.classList.remove('on');
        t.setAttribute('aria-selected', 'false');
      });
      
      // Add active class to clicked tab
      this.classList.add('on');
      this.setAttribute('aria-selected', 'true');
      
      // Hide all grids
      grids.forEach(grid => {
        grid.style.display = 'none';
      });
      
      // Show selected grid
      const selectedGrid = document.getElementById('category-' + categoryId);
      if (selectedGrid) {
        selectedGrid.style.display = 'grid';
      }
    });
  });
});
</script>

<section id="blog">
  <div class="wrap">
    <div class="blog-hd rv in">
      <div><div class="eyebrow">Latest Posts</div><h2 class="h2">Tips, Guides &amp; Tutorials</h2><p class="body-lg">SEO-optimised guides that drive traffic and convert readers into tool users.</p></div>
      <a href="{{ route('blog') }}" class="btn btn-out">View All Posts →</a>
    </div>
    
    @if($featuredBlogs->count() > 0)
    <div class="blog-grid rv in">
      @php
        $mainBlog = $featuredBlogs->first();
        $sideBlogs = $featuredBlogs->slice(1, 3);
        
        // Color classes for categories
        $colorMap = ['g' => 'pcg', 'c' => 'pcc', 'b' => 'pcb', 'a' => 'pca'];
        $thumbMap = ['g' => 'ft1', 'c' => 'ft2', 'b' => 'ft3', 'a' => 'ft1'];
        $sideThumbMap = ['g' => 'st1', 'c' => 'st2', 'b' => 'st3', 'a' => 'st1'];
      @endphp
      
      <!-- Featured Blog Post -->
      <a href="{{ route('blog.post', $mainBlog->slug) }}" class="feat-post">
        @if($mainBlog->featured_image)
          <img src="{{ asset('storage/' . $mainBlog->featured_image) }}" alt="{{ $mainBlog->title }}" class="feat-thumb" style="width:100%;height:200px;object-fit:cover">
        @else
          <div class="feat-thumb {{ $thumbMap[$mainBlog->category->color ?? 'g'] ?? 'ft1' }}">
            {{ $mainBlog->featured_icon ?? $mainBlog->category->icon_emoji ?? '📝' }}
          </div>
        @endif
        <div class="feat-body">
          <div class="post-meta">
            <span class="pcat {{ $colorMap[$mainBlog->category->color ?? 'g'] ?? 'pcg' }}">
              {{ $mainBlog->category->name ?? 'Blog' }}
            </span>
            <span>·</span>
            <time datetime="{{ $mainBlog->published_date->format('Y-m-d') }}">
              {{ $mainBlog->published_date->format('F d, Y') }}
            </time>
          </div>
          <h3 class="h3" style="margin-bottom:9px">{{ $mainBlog->title }}</h3>
          <p class="post-excerpt">
            {{ strip_tags($mainBlog->tldr_summary ?? \Illuminate\Support\Str::limit($mainBlog->meta_description ?? '', 150)) }}
          </p>
          <div class="post-foot">
            <span class="post-rt">📖 {{ $mainBlog->read_time ?? '5' }} min read</span>
            <span class="post-rm prm{{ $mainBlog->category->color ?? 'g' }}">Read Full Guide →</span>
          </div>
        </div>
      </a>
      
      <!-- Side Blog Posts -->
      <div class="side-posts rv d1 in">
        @foreach($sideBlogs as $blog)
        <a href="{{ route('blog.post', $blog->slug) }}" class="side-post">
          @if($blog->featured_image)
            <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}" class="side-thumb" style="width:68px;height:68px;object-fit:cover;flex-shrink:0">
          @else
            <div class="side-thumb {{ $sideThumbMap[$blog->category->color ?? 'g'] ?? 'st1' }}">
              {{ $blog->featured_icon ?? $blog->category->icon_emoji ?? '📝' }}
            </div>
          @endif
          <div class="side-body">
            <div class="post-meta" style="margin-bottom:4px">
              <span class="pcat {{ $colorMap[$blog->category->color ?? 'g'] ?? 'pcg' }}">
                {{ $blog->category->name ?? 'Blog' }}
              </span>
              <span>· {{ $blog->published_date->format('M d') }}</span>
            </div>
            <h4>{{ $blog->title }}</h4>
            <p>{{ strip_tags(\Illuminate\Support\Str::limit($blog->tldr_summary ?? $blog->meta_description ?? '', 60)) }}</p>
          </div>
        </a>
        @endforeach
      </div>
    </div>
   
    @endif
    
  
  </div>
</section>

<!-- CTA -->
<section style="background:var(--bg2);padding:88px 0">
  <div class="wrap">
    <style>
      .cta-box {
        background: #1C2820;
        border-radius: 24px;
        padding: 72px 52px;
        text-align: center;
        position: relative;
        overflow: hidden;
      }
      @media (max-width: 768px) {
        .cta-box {
          padding: 48px 32px !important;
          border-radius: 16px !important;
        }
      }
      @media (max-width: 480px) {
        .cta-box {
          padding: 36px 24px !important;
        }
      }
    </style>
    <div class="cta-box">
      <div class="eyebrow" style="color:#6ECB8F;justify-content:center">Get Started Today</div>
      <h2 class="h2" style="color:#F5F2E8;margin-bottom:12px">Ready to Boost Your Productivity?</h2>
      <p class="body-lg" style="color:rgba(245,242,232,.45);margin-bottom:34px">
        Join thousands of users who trust ToolVerse Hub for their daily tasks.
      </p>
      <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap">
        <a href="{{ route('tools') }}" class="btn btn-g btn-lg">🚀 Start Free Now</a>
        <a href="{{ route('blog') }}" class="btn btn-out btn-lg" style="color:#F5F2E8;border-color:rgba(255,255,255,.2)">📚 Read Our Blog</a>
      </div>
    </div>
  </div>
</section>
@endsection

@section('schema')
@include('website.partials.home-schema')
@endsection
