// Public JS
document.addEventListener('DOMContentLoaded', function() {
    const themeToggle = document.getElementById('themeToggle');
    const themeIcon = document.getElementById('themeIcon');
    const html = document.documentElement;

    // Update icon based on current theme
    const updateIcon = (theme) => {
        if (theme === 'dark') {
            themeIcon.classList.replace('bi-sun-fill', 'bi-moon-stars-fill');
        } else {
            themeIcon.classList.replace('bi-moon-stars-fill', 'bi-sun-fill');
        }
    };

    // Set initial icon
    updateIcon(html.getAttribute('data-bs-theme'));

    themeToggle.addEventListener('click', () => {
        const currentTheme = html.getAttribute('data-bs-theme');
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        
        html.setAttribute('data-bs-theme', newTheme);
        localStorage.setItem('theme', newTheme);
        updateIcon(newTheme);
    });

    console.log('UBC Website Loaded');
});
