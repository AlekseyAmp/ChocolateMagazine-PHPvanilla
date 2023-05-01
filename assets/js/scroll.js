const scrollLink = document.getElementById('scroll-link');

scrollLink.addEventListener('click', function(e) {
    e.preventDefault();
    const content = document.querySelector('.order-content');
    content.scrollIntoView({behavior: 'smooth'});
});
