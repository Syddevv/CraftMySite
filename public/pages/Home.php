<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CraftMySite - Landing Page</title>
    <link rel="stylesheet" href="../assets/css/styles.css" />
</head>

<body>
    <!-- HEADER SECTION -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="../pages/Home.html" class="flex items-center gap-2 group">
                <div class="w-10 h-10 flex items-center justify-center bg-linear-to-br from-brand-primary to-brand-secondary text-white font-bold rounded-lg text-xl shadow-md group-hover:scale-105 transition-transform">
                    C
                </div>
                <span class="text-xl font-bold bg-clip-text text-transparent bg-linear-to-r from-brand-primary to-brand-secondary">
                    CraftMySite
                </span>
            </a>

            <ul class="hidden md:flex items-center gap-8 text-gray-600 font-medium">
                <li><a href="../pages/Home.php" class="hover:text-brand-primary text-brand-primary transition">Home</a></li>
                <li><a href="../pages/About.php" class="hover:text-brand-primary transition">About</a></li>
                <li><a href="../pages/Services.php" class="hover:text-brand-primary transition">Services</a></li>
                <li><a href="../pages/Faq.php" class="hover:text-brand-primary transition">FAQ</a></li>
                <li><a href="../pages/Contact.php" class="hover:text-brand-primary transition">Contact</a></li>
            </ul>

            <div class="hidden md:flex items-center gap-4">
                <a href="/login" class="text-gray-600 hover:text-brand-primary font-semibold transition">Login</a>
                <a href="/register" class="px-5 py-2.5 rounded-lg bg-linear-to-r from-brand-primary to-brand-secondary text-white font-semibold shadow-md hover:shadow-lg hover:opacity-90 transition-all transform hover:-translate-y-0.5">
                    Get Started
                </a>
            </div>

            <button id="menuToggle" class="md:hidden p-2 text-gray-600 hover:text-brand-primary focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <nav id="mobileNav" class="hidden absolute top-full left-0 w-full bg-white border-t border-gray-100 shadow-lg md:hidden">
          <ul class="flex flex-col p-4 gap-4 font-medium">
          <li><a href="../pages/Home.php" class="block text-brand-primary">Home</a></li>
          <li><a href="../pages/About.php" class="block text-gray-600">About</a></li>
          <li><a href="../pages/Services.php" class="block text-gray-600">Services</a></li>
          <li><a href="../pages/Services.php" class="block text-gray-600">FAQ</a></li>
          <li><a href="../pages/Contact.php" class="block text-gray-600">Contact</a></li>
          <div class="flex flex-col gap-3 mt-2 pt-4 border-t border-gray-100">
            <a href="/login" class="text-center text-gray-600 py-2">Login</a>
            <a href="/register" class="text-center py-3 bg-brand-primary text-white rounded-lg">Get Started</a>
          </div>
          </ul>
        </nav>
    </header>

    <!-- HERO SECTION -->
    <section class="relative overflow-hidden bg-white pt-20 pb-24 lg:pt-32 lg:pb-40">
        <div class="absolute inset-0 bg-linear-to-br from-brand-primary to-brand-secondary opacity-5 -z-10"></div>

        <div class="container mx-auto px-6 grid lg:grid-cols-2 gap-12 items-center">
            <div class="text-center lg:text-left">
                <h1 class="text-4xl lg:text-6xl font-bold leading-tight mb-6">
                    Craft Your <br />
                    <span class="bg-clip-text text-transparent bg-linear-to-r from-brand-primary to-brand-secondary">
                        Perfect Website
                    </span>
                </h1>
                <p class="text-lg text-gray-500 mb-8 max-w-lg mx-auto lg:mx-0">
                    Professional website creation services that help your business stand out online. Modern designs, lightning-fast performance.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="/register" class="px-8 py-4 rounded-xl bg-linear-to-r from-brand-primary to-brand-secondary text-white font-bold shadow-lg hover:shadow-xl hover:opacity-90 transition-all flex items-center justify-center gap-2">
                        Start Today <span>→</span>
                    </a>
                    <a href="/services" class="px-8 py-4 rounded-xl border-2 border-brand-primary text-brand-primary font-bold hover:bg-gray-50 transition-colors">
                        View Services
                    </a>
                </div>
            </div>

            <div class="relative">
                <div class="absolute inset-0 bg-linear-to-r from-brand-primary to-brand-secondary opacity-20 blur-3xl rounded-full transform rotate-6"></div>
                <img src="../assets/images/hero-illustration.jpg" alt="Modern website design" class="relative rounded-2xl shadow-2xl w-full border-4 border-white/50" />
            </div>
        </div>
    </section>

    <!-- FEATURES SECTION -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16 max-w-2xl mx-auto">
                <h2 class="text-3xl font-bold text-brand-dark mb-4">Why Choose CraftMySite?</h2>
                <p class="text-gray-500">We combine creativity with technical expertise to deliver websites that perform exceptionally.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="group p-8 rounded-3xl bg-linear-to-br from-brand-primary to-brand-secondary text-white text-center shadow-xl hover:-translate-y-2 transition-transform duration-300">
                    <div class="w-16 h-16 mx-auto mb-6 bg-white/20 rounded-xl flex items-center justify-center text-3xl backdrop-blur-sm group-hover:scale-110 transition-transform">
                        ⚡
                    </div>
                    <h3 class="text-xl font-bold mb-3">Lightning Fast</h3>
                    <p class="text-blue-50 opacity-90">Optimized websites that load in milliseconds for better user experience.</p>
                </div>

                <div class="group p-8 rounded-3xl bg-linear-to-br from-brand-primary to-brand-secondary text-white text-center shadow-xl hover:-translate-y-2 transition-transform duration-300">
                    <div class="w-16 h-16 mx-auto mb-6 bg-white/20 rounded-xl flex items-center justify-center text-3xl backdrop-blur-sm group-hover:scale-110 transition-transform">
                        📱
                    </div>
                    <h3 class="text-xl font-bold mb-3">Mobile First</h3>
                    <p class="text-blue-50 opacity-90">Responsive designs that look perfect on all devices, from smartphones to desktops.</p>
                 </div> 

                 <div class="group p-8 rounded-3xl bg-linear-to-br from-brand-primary to-brand-secondary text-white text-center shadow-xl hover:-translate-y-2 transition-transform duration-300">
                    <div class="w-16 h-16 mx-auto mb-6 bg-white/20 rounded-xl flex items-center justify-center text-3xl backdrop-blur-sm group-hover:scale-110 transition-transform">
                    🛡️
                    </div>
                    <h3 class="text-xl font-bold mb-3">Secure & Reliable</h3>
                    <p class="text-blue-50 opacity-90">Built with modern security practices and reliable hosting for 99.9% uptime.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- TESTIMONIALS SECTION -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-brand-dark mb-4">What Our Clients Say</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="p-8 bg-gray-50 rounded-3xl hover:bg-white hover:shadow-lg transition-all border border-transparent hover:border-gray-100">
                    <div class="flex text-yellow-400 text-lg mb-4">★★★★★</div>
                    <p class="text-gray-600 italic mb-6">"CraftMySite delivered exactly what we needed. Professional, fast, and exceeded expectations."</p>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
                        <div>
                            <h4 class="font-bold text-sm">Sarah Johnson</h4>
                            <p class="text-xs text-gray-500">TechStart Inc.</p>
                        </div>
                    </div>
                </div>
                <div class="p-8 bg-gray-50 rounded-3xl hover:bg-white hover:shadow-lg transition-all border border-transparent hover:border-gray-100">
                    <div class="flex text-yellow-400 text-lg mb-4">★★★★★</div>
                    <p class="text-gray-600 italic mb-6">"The team created a beautiful website that brought in 40% more customers in the first month."</p>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
                        <div>
                            <h4 class="font-bold text-sm">Mike Chen</h4>
                            <p class="text-xs text-gray-500">Local Bistro</p>
                        </div>
                    </div>
                </div>
                <div class="p-8 bg-gray-50 rounded-3xl hover:bg-white hover:shadow-lg transition-all border border-transparent hover:border-gray-100">
                    <div class="flex text-yellow-400 text-lg mb-4">★★★★★</div>
                    <p class="text-gray-600 italic mb-6">"Outstanding work and great communication throughout the project. Highly recommended!"</p>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
                        <div>
                            <h4 class="font-bold text-sm">Emily Davis</h4>
                            <p class="text-xs text-gray-500">Creative Agency</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA SECTION -->
    <section class="py-20 bg-linear-to-br from-brand-primary to-brand-secondary text-white">

        <div class="container mx-auto px-6 text-center">

            <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Transform Your Online Presence?</h2>
            <p class="text-blue-50 text-lg mb-10 max-w-2xl mx-auto">
                Join hundreds of satisfied clients who've elevated their business with our professional website creation services.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/register" class="px-8 py-4 rounded-xl bg-white text-brand-primary font-bold hover:bg-gray-100 transition-colors shadow-lg">
                    Get Started Today
                </a>
                <a href="/contact" class="px-8 py-4 rounded-xl border-2 border-white text-white font-bold hover:bg-white hover:text-brand-primary transition-colors">
                    Talk to Our Team
                </a>
            </div>

        </div>
    </section>

    <!-- FOOTER SECTION -->
    <footer class="bg-gray-900 text-gray-300 py-12">
        <div class="container mx-auto px-6 grid md:grid-cols-4 gap-8">
            <div class="col-span-1 md:col-span-2">
                <div class="flex items-center gap-2 mb-4 text-white">
                    <div class="w-8 h-8 flex items-center justify-center bg-linear-to-r from-brand-primary to-brand-secondary rounded font-bold">C</div>
                    <span class="font-bold text-xl">CraftMySite</span>
                </div>
                <p class="text-gray-400 max-w-sm">Professional website creation services that help businesses establish a strong online presence.</p>
            </div>
            <div>
                <h3 class="text-white font-bold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="Home.php" class="text-brand-primary transition">Home</a></li>
                    <li><a href="About.php" class="hover:text-brand-primary  transition">About</a></li>
                    <li><a href="Services.php" class="hover:text-brand-primary transition">Services</a></li>
                    <li><a href="FAQ.php" class="hover:text-brand-primary transition">FAQ</a></li>
                    <li><a href="Contact.php" class="hover:text-brand-primary transition">Contact</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-white font-bold mb-4">Contact</h3>
                <ul class="space-y-2">
                    <li>hello@craftmysite.com</li>
                    <li>+1 (555) 123-4567</li>
                </ul>
            </div>
        </div>
        <div class="container mx-auto px-6 mt-12 pt-8 border-t border-gray-800 text-center text-sm text-gray-500">
            &copy; 2025 CraftMySite. All rights reserved.
        </div>
    </footer>

    <script src="../js/nav.js"></script>
</body>
</html> 