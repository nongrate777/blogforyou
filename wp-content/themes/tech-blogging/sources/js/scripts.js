document.addEventListener('DOMContentLoaded', function() {
    const showFeaturesButtons = document.querySelectorAll('.show-features-btn');
    showFeaturesButtons.forEach((button) => {
        button.addEventListener('click', (event) => {
            const featuresContainer = event.target.previousElementSibling;
            if (featuresContainer.style.display === 'none' || featuresContainer.style.display === '') {
                featuresContainer.style.display = 'block';
                event.target.textContent = 'Show Less';
            } else {
                featuresContainer.style.display = 'none';
                event.target.textContent = 'Show More';
            }
        });
    });
});
