document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.accordion-header').forEach(button => {
        button.addEventListener('click', () => {
            const active = button.classList.contains('active');

            // Закрыть все
            document.querySelectorAll('.accordion-header').forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.accordion-body').forEach(body => body.style.display = 'none');

            if (!active) {
                button.classList.add('active');
                button.nextElementSibling.style.display = 'block';
            }
        });
    });
});
