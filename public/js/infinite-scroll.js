    // أضف هذا الملف الجديد وشغله في app.blade.php
    let page = 1;
    window.addEventListener('scroll', () => {
        if (window.innerHeight + window.scrollY >= document.body.offsetHeight) {
            page++;
            fetch(`/news?page=${page}`).then(response => response.text()).then(html => {
                document.querySelector('#articles-container').insertAdjacentHTML('beforeend', html);
            });
        }
    });