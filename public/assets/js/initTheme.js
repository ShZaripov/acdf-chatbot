(() => {
    var e = document.body;
    'dark' === localStorage.getItem('theme') ? e.classList.add('dark') : e.classList.add('light');
})();
