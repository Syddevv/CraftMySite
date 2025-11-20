// --- Form Submission Logic ---
const form = document.getElementById('contactForm');
const toast = document.getElementById('toast');

form.addEventListener('submit', (e) => {
    e.preventDefault(); // Prevent actual server submission for demo

    // Show Toast
    toast.className = 'show';

    // Hide Toast after 3 seconds
    setTimeout(function () {
        toast.className = toast.className.replace('show', '');
    }, 3000);

    // Reset Form
    form.reset();
});
