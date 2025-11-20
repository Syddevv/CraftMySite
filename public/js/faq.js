// Accordion Logic ---
function toggleAccordion(button) {
    const content = button.nextElementSibling;
    const arrow = button.querySelector('.arrow-icon');

    // Toggle current
    if (content.style.maxHeight && content.style.maxHeight !== '0px') {
        // Close
        content.style.maxHeight = '0px';
        content.classList.remove('open');
        content.style.paddingBottom = '0px';
        arrow.classList.remove('rotate');
    } else {
        // Open
        content.classList.add('open');
        content.style.maxHeight = content.scrollHeight + 'px';
        content.style.paddingBottom = '1.5rem'; // Re-add padding
        arrow.classList.add('rotate');
    }
}
