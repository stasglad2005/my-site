document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('input, textarea, select').forEach(function (field) {
        field.addEventListener('focus', function () {
            const errorDiv = document.getElementById(this.id + '-error');
            if (errorDiv) {
                errorDiv.style.display = 'none';
            }
            this.style.border = '';
            this.classList.remove('error');
        });
    });

    const resetBtn = document.querySelector('.reset-btn');
    if (resetBtn) {
        resetBtn.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector('form').reset();
            document.querySelectorAll('.error-message').forEach(function (el) {
                el.style.display = 'none';
            });
            document.querySelectorAll('input, textarea, select').forEach(function (el) {
                el.style.border = '';
                el.classList.remove('error');
            });
            const form = document.querySelector('form');
            if (form) {
                form.reset();
            }
        });
    }
});