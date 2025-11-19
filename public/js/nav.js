const menuToggle = document.getElementById('menuToggle');
const mobileNav = document.getElementById('mobileNav');

menuToggle.addEventListener('click', () => {
    // 1. Toggle the 'hidden' class (Tailwind's way of showing/hiding)
    mobileNav.classList.toggle('hidden');

    // 2. Find the SVG path inside the button
    const iconPath = menuToggle.querySelector('svg path');

    // 3. Check if menu is now OPEN (hidden class is removed)
    const isOpen = !mobileNav.classList.contains('hidden');

    if (isOpen) {
        // Switch to "X" icon
        iconPath.setAttribute('d', 'M6 18L18 6M6 6l12 12');
    } else {
        // Switch back to "Hamburger" icon
        iconPath.setAttribute('d', 'M4 6h16M4 12h16M4 18h16');
    }
});
