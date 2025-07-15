import './bootstrap';

// Mobile menu drawer toggle
document.addEventListener('DOMContentLoaded', () => {
  const menuBtn = document.getElementById('menuToggleBtn');
  const drawer = document.getElementById('mobileMenu');
  const closeBtn = document.getElementById('closeDrawerBtn');
  const toggleDrawer = () => {
    drawer.classList.toggle('hidden');
    document.body.classList.toggle('overflow-hidden');
  };
  if(menuBtn && drawer){
    menuBtn.addEventListener('click', toggleDrawer);
  }
  if(closeBtn){
    closeBtn.addEventListener('click', toggleDrawer);
  }
  if(drawer){
    drawer.addEventListener('click', (e)=>{
      if(e.target === drawer){
        toggleDrawer();
      }
    });
  }

  // Infinite scroll for LatestNews component
  const sentinel = document.getElementById('infinite-scroll-sentinel');
  if(sentinel){
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if(entry.isIntersecting){
          window.livewire.emit('loadMore');
        }
      });
    });
    observer.observe(sentinel);
  }
});
