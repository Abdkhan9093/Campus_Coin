function changeFont(value) {
    var current = parseFloat(localStorage.getItem('budgetFontSize') || '1');
    current = Math.max(0.9, Math.min(1.2, current + (value * 0.05)));
    document.documentElement.style.fontSize = (current * 16) + 'px';
    localStorage.setItem('budgetFontSize', current);
}

function toggleDark() {
    document.body.classList.toggle('dark-mode');
    localStorage.setItem('budgetDarkMode', document.body.classList.contains('dark-mode') ? '1' : '0');
}

document.addEventListener('DOMContentLoaded', function () {
    var size = parseFloat(localStorage.getItem('budgetFontSize') || '1');
    document.documentElement.style.fontSize = (size * 16) + 'px';
    if (localStorage.getItem('budgetDarkMode') === '1') {
        document.body.classList.add('dark-mode');
    }
});
