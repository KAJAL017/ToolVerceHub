@verbatim
<script>
// Progress bar
window.addEventListener('scroll',()=>{
  const h=document.documentElement,b=document.body,st='scrollTop',sh='scrollHeight';
  const p=(h[st]||b[st])/((h[sh]||b[sh])-h.clientHeight)*100;
  document.getElementById('prog').style.transform=`scaleX(${p/100})`;
});

// Sticky header
const hdr=document.getElementById('hdr');
window.addEventListener('scroll',()=>{
  hdr.classList.toggle('stuck',window.scrollY>20);
});

// Mobile menu
const hbg=document.getElementById('hbg'),mob=document.getElementById('mob'),mobX=document.getElementById('mob-x');
hbg?.addEventListener('click',()=>{
  hbg.classList.toggle('open');
  mob.classList.toggle('open');
});
mobX?.addEventListener('click',()=>{
  hbg.classList.remove('open');
  mob.classList.remove('open');
});

// FAQ toggle
document.querySelectorAll('.faq-q').forEach(q=>{
  q.addEventListener('click',()=>{
    q.parentElement.classList.toggle('open');
  });
});

// Reveal on scroll
const rvs=document.querySelectorAll('.rv');
const obs=new IntersectionObserver(es=>{
  es.forEach(e=>{if(e.isIntersecting)e.target.classList.add('in')});
},{threshold:.1});
rvs.forEach(r=>obs.observe(r));

// Tab switching
document.querySelectorAll('.tab').forEach(t=>{
  t.addEventListener('click',()=>{
    document.querySelectorAll('.tab').forEach(x=>x.classList.remove('on'));
    t.classList.add('on');
  });
});
</script>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
@endverbatim
