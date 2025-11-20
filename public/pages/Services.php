<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Services - CraftMySite</title>
    <link rel="stylesheet" href="../assets/css/styles.css" />
  </head>
  <body class="bg-gray-50 text-gray-800 font-sans antialiased">
    
    <!-- HEADER -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
      <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <a href="../pages/Home.php" class="flex items-center gap-2 group">
          <!-- Added bg-brand-primary fallback and switched to bg-gradient-to-br -->
          <div class="w-10 h-10 flex items-center justify-center bg-brand-primary bg-gradient-to-br from-brand-primary to-brand-secondary text-white font-bold rounded-lg text-xl shadow-md group-hover:scale-105 transition-transform">
            C
          </div>
          <!-- Switched to bg-gradient-to-r -->
          <span class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-brand-primary to-brand-secondary">
            CraftMySite
          </span>
        </a>

        <ul class="hidden md:flex items-center gap-8 text-gray-600 font-medium">
          <li><a href="../pages/Home.php" class="hover:text-brand-primary transition">Home</a></li>
          <li><a href="../pages/About.php" class="hover:text-brand-primary transition">About</a></li>
          <li><a href="../pages/Services.php" class="text-brand-primary font-semibold transition">Services</a></li>
          <li><a href="../pages/Faq.php" class="hover:text-brand-primary transition">FAQ</a></li>
          <li><a href="../pages/Contact.php" class="hover:text-brand-primary transition">Contact</a></li>
        </ul>

        <div class="hidden md:flex items-center gap-4">
          <a href="/login" class="text-gray-600 hover:text-brand-primary font-semibold transition">Login</a>
          <!-- Added bg-brand-primary fallback and switched to bg-gradient-to-r -->
          <a href="/register" class="px-5 py-2.5 rounded-lg bg-brand-primary bg-gradient-to-r from-brand-primary to-brand-secondary text-white font-semibold shadow-md hover:shadow-lg hover:opacity-90 transition-all transform hover:-translate-y-0.5">
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
          <li><a href="../pages/Home.php" class="block text-gray-600">Home</a></li>
          <li><a href="../pages/About.php" class="block text-gray-600">About</a></li>
          <li><a href="../pages/Services.php" class="block text-brand-primary font-semibold">Services</a></li>
          <li><a href="../pages/Faq.php" class="block text-gray-600">FAQ</a></li>
          <li><a href="../pages/Contact.php" class="block text-gray-600">Contact</a></li>
          <div class="flex flex-col gap-3 mt-2 pt-4 border-t border-gray-100">
            <a href="/login" class="text-center text-gray-600 py-2">Login</a>
            <a href="/register" class="text-center py-3 bg-brand-primary text-white rounded-lg">Get Started</a>
          </div>
        </ul>
      </nav>
    </header>

    <main class="min-h-screen py-20">
      
      <!-- HERO SECTION -->
      <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
        <div class="text-center">
          <h1 class="text-4xl md:text-5xl font-bold text-brand-dark mb-6">
            Our <span class="bg-clip-text text-transparent bg-gradient-to-r from-brand-primary to-brand-secondary">Services</span>
          </h1>
          <p class="text-xl text-gray-500 max-w-3xl mx-auto">
            Comprehensive website creation services designed to elevate your online presence and drive business growth.
          </p>
        </div>
      </section>

      <!-- SERVICES GRID -->
      <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          
          <!-- Card 1: Custom Website Design -->
          <div class="bg-white rounded-3xl p-8 shadow-md border border-gray-100 hover:shadow-xl transition-all duration-300 group">
            <div class="text-center pb-4">
              <!-- Fixed: Added bg-brand-primary fallback and changed to bg-gradient-to-br -->
              <div class="flex items-center justify-center w-16 h-16 bg-brand-primary bg-gradient-to-br from-brand-primary to-brand-secondary rounded-2xl mb-4 mx-auto group-hover:scale-110 transition-transform duration-300 text-white">
                <!-- Icon: Palette -->
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <circle cx="13.5" cy="6.5" r=".5" fill="currentColor"/><circle cx="17.5" cy="10.5" r=".5" fill="currentColor"/><circle cx="8.5" cy="7.5" r=".5" fill="currentColor"/><circle cx="6.5" cy="12.5" r=".5" fill="currentColor"/>
                  <path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z"/>
                </svg>
              </div>
              <h3 class="text-xl font-bold text-brand-dark">Custom Website Design</h3>
            </div>
            <div class="space-y-4">
              <p class="text-gray-500">
                Bespoke website designs tailored to your brand identity and business goals. We create unique, visually stunning websites that reflect your company's personality.
              </p>
              <ul class="space-y-2">
                <li class="flex items-center text-sm text-gray-500"><div class="w-2 h-2 bg-brand-primary rounded-full mr-3 flex-shrink-0"></div>Brand-aligned design</li>
                <li class="flex items-center text-sm text-gray-500"><div class="w-2 h-2 bg-brand-primary rounded-full mr-3 flex-shrink-0"></div>Custom graphics</li>
                <li class="flex items-center text-sm text-gray-500"><div class="w-2 h-2 bg-brand-primary rounded-full mr-3 flex-shrink-0"></div>UI/UX optimization</li>
                <li class="flex items-center text-sm text-gray-500"><div class="w-2 h-2 bg-brand-primary rounded-full mr-3 flex-shrink-0"></div>Visual storytelling</li>
              </ul>
            </div>
          </div>

          <!-- Card 2: Responsive Layouts -->
          <div class="bg-white rounded-3xl p-8 shadow-md border border-gray-100 hover:shadow-xl transition-all duration-300 group">
            <div class="text-center pb-4">
              <div class="flex items-center justify-center w-16 h-16 bg-brand-primary bg-gradient-to-br from-brand-primary to-brand-secondary rounded-2xl mb-4 mx-auto group-hover:scale-110 transition-transform duration-300 text-white">
                <!-- Icon: Smartphone -->
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="14" height="20" x="5" y="2" rx="2" ry="2"/><path d="M12 18h.01"/></svg>
              </div>
              <h3 class="text-xl font-bold text-brand-dark">Responsive Layouts</h3>
            </div>
            <div class="space-y-4">
              <p class="text-gray-500">
                Mobile-first responsive designs that look perfect on all devices. Your website will provide an optimal viewing experience across desktops, tablets, and smartphones.
              </p>
              <ul class="space-y-2">
                <li class="flex items-center text-sm text-gray-500"><div class="w-2 h-2 bg-brand-primary rounded-full mr-3 flex-shrink-0"></div>Mobile optimization</li>
                <li class="flex items-center text-sm text-gray-500"><div class="w-2 h-2 bg-brand-primary rounded-full mr-3 flex-shrink-0"></div>Cross-device compatibility</li>
                <li class="flex items-center text-sm text-gray-500"><div class="w-2 h-2 bg-brand-primary rounded-full mr-3 flex-shrink-0"></div>Touch-friendly interfaces</li>
                <li class="flex items-center text-sm text-gray-500"><div class="w-2 h-2 bg-brand-primary rounded-full mr-3 flex-shrink-0"></div>Fast loading times</li>
              </ul>
            </div>
          </div>

          <!-- Card 3: E-commerce Solutions -->
          <div class="bg-white rounded-3xl p-8 shadow-md border border-gray-100 hover:shadow-xl transition-all duration-300 group">
            <div class="text-center pb-4">
              <div class="flex items-center justify-center w-16 h-16 bg-brand-primary bg-gradient-to-br from-brand-primary to-brand-secondary rounded-2xl mb-4 mx-auto group-hover:scale-110 transition-transform duration-300 text-white">
                <!-- Icon: ShoppingCart -->
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
              </div>
              <h3 class="text-xl font-bold text-brand-dark">E-commerce Solutions</h3>
            </div>
            <div class="space-y-4">
              <p class="text-gray-500">
                Complete online store setup with secure payment processing, inventory management, and customer-friendly shopping experiences that drive conversions.
              </p>
              <ul class="space-y-2">
                <li class="flex items-center text-sm text-gray-500"><div class="w-2 h-2 bg-brand-primary rounded-full mr-3 flex-shrink-0"></div>Payment integration</li>
                <li class="flex items-center text-sm text-gray-500"><div class="w-2 h-2 bg-brand-primary rounded-full mr-3 flex-shrink-0"></div>Inventory management</li>
                <li class="flex items-center text-sm text-gray-500"><div class="w-2 h-2 bg-brand-primary rounded-full mr-3 flex-shrink-0"></div>Order tracking</li>
                <li class="flex items-center text-sm text-gray-500"><div class="w-2 h-2 bg-brand-primary rounded-full mr-3 flex-shrink-0"></div>Customer accounts</li>
              </ul>
            </div>
          </div>

          <!-- Card 4: SEO Optimization -->
          <div class="bg-white rounded-3xl p-8 shadow-md border border-gray-100 hover:shadow-xl transition-all duration-300 group">
            <div class="text-center pb-4">
              <div class="flex items-center justify-center w-16 h-16 bg-brand-primary bg-gradient-to-br from-brand-primary to-brand-secondary rounded-2xl mb-4 mx-auto group-hover:scale-110 transition-transform duration-300 text-white">
                <!-- Icon: Search -->
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
              </div>
              <h3 class="text-xl font-bold text-brand-dark">SEO Optimization</h3>
            </div>
            <div class="space-y-4">
              <p class="text-gray-500">
                Built-in search engine optimization to help your website rank higher in Google searches and attract more organic traffic to your business.
              </p>
              <ul class="space-y-2">
                <li class="flex items-center text-sm text-gray-500"><div class="w-2 h-2 bg-brand-primary rounded-full mr-3 flex-shrink-0"></div>Keyword optimization</li>
                <li class="flex items-center text-sm text-gray-500"><div class="w-2 h-2 bg-brand-primary rounded-full mr-3 flex-shrink-0"></div>Meta tag setup</li>
                <li class="flex items-center text-sm text-gray-500"><div class="w-2 h-2 bg-brand-primary rounded-full mr-3 flex-shrink-0"></div>Site speed optimization</li>
                <li class="flex items-center text-sm text-gray-500"><div class="w-2 h-2 bg-brand-primary rounded-full mr-3 flex-shrink-0"></div>Google Analytics</li>
              </ul>
            </div>
          </div>

          <!-- Card 5: Technical Development -->
          <div class="bg-white rounded-3xl p-8 shadow-md border border-gray-100 hover:shadow-xl transition-all duration-300 group">
            <div class="text-center pb-4">
              <div class="flex items-center justify-center w-16 h-16 bg-brand-primary bg-gradient-to-br from-brand-primary to-brand-secondary rounded-2xl mb-4 mx-auto group-hover:scale-110 transition-transform duration-300 text-white">
                <!-- Icon: Code -->
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
              </div>
              <h3 class="text-xl font-bold text-brand-dark">Technical Development</h3>
            </div>
            <div class="space-y-4">
              <p class="text-gray-500">
                Clean, efficient code built with modern web technologies. We ensure your website is fast, secure, and scalable for future growth.
              </p>
              <ul class="space-y-2">
                <li class="flex items-center text-sm text-gray-500"><div class="w-2 h-2 bg-brand-primary rounded-full mr-3 flex-shrink-0"></div>Modern tech stack</li>
                <li class="flex items-center text-sm text-gray-500"><div class="w-2 h-2 bg-brand-primary rounded-full mr-3 flex-shrink-0"></div>Security best practices</li>
                <li class="flex items-center text-sm text-gray-500"><div class="w-2 h-2 bg-brand-primary rounded-full mr-3 flex-shrink-0"></div>Performance optimization</li>
                <li class="flex items-center text-sm text-gray-500"><div class="w-2 h-2 bg-brand-primary rounded-full mr-3 flex-shrink-0"></div>Scalable architecture</li>
              </ul>
            </div>
          </div>

          <!-- Card 6: Ongoing Support -->
          <div class="bg-white rounded-3xl p-8 shadow-md border border-gray-100 hover:shadow-xl transition-all duration-300 group">
            <div class="text-center pb-4">
              <div class="flex items-center justify-center w-16 h-16 bg-brand-primary bg-gradient-to-br from-brand-primary to-brand-secondary rounded-2xl mb-4 mx-auto group-hover:scale-110 transition-transform duration-300 text-white">
                <!-- Icon: Headphones -->
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 18v-6a9 9 0 0 1 18 0v6"/><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"/></svg>
              </div>
              <h3 class="text-xl font-bold text-brand-dark">Ongoing Support</h3>
            </div>
            <div class="space-y-4">
              <p class="text-gray-500">
                Comprehensive maintenance and support services to keep your website running smoothly, updated, and secure at all times.
              </p>
              <ul class="space-y-2">
                <li class="flex items-center text-sm text-gray-500"><div class="w-2 h-2 bg-brand-primary rounded-full mr-3 flex-shrink-0"></div>24/7 monitoring</li>
                <li class="flex items-center text-sm text-gray-500"><div class="w-2 h-2 bg-brand-primary rounded-full mr-3 flex-shrink-0"></div>Regular updates</li>
                <li class="flex items-center text-sm text-gray-500"><div class="w-2 h-2 bg-brand-primary rounded-full mr-3 flex-shrink-0"></div>Security patches</li>
                <li class="flex items-center text-sm text-gray-500"><div class="w-2 h-2 bg-brand-primary rounded-full mr-3 flex-shrink-0"></div>Technical support</li>
              </ul>
            </div>
          </div>

        </div>
      </section>

      <!-- PROCESS SECTION -->
      <section class="bg-gray-100/50 py-20 rounded-3xl mx-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-brand-dark mb-4">
              Our Process
            </h2>
            <p class="text-xl text-gray-500 max-w-3xl mx-auto">
              A streamlined approach that ensures your project is delivered on time, on budget, and exceeds expectations.
            </p>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            
            <div class="text-center">
              <!-- Fixed: Added bg-brand-primary fallback and changed to bg-gradient-to-r -->
              <div class="inline-flex items-center justify-center w-16 h-16 bg-brand-primary bg-gradient-to-r from-brand-primary to-brand-secondary rounded-full text-white font-bold text-xl mb-4 shadow-lg">
                01
              </div>
              <h3 class="text-xl font-semibold text-brand-dark mb-2">Discovery</h3>
              <p class="text-gray-500">
                We learn about your business, goals, and target audience.
              </p>
            </div>

            <div class="text-center">
              <div class="inline-flex items-center justify-center w-16 h-16 bg-brand-primary bg-gradient-to-r from-brand-primary to-brand-secondary rounded-full text-white font-bold text-xl mb-4 shadow-lg">
                02
              </div>
              <h3 class="text-xl font-semibold text-brand-dark mb-2">Design</h3>
              <p class="text-gray-500">
                Create wireframes and designs that align with your vision.
              </p>
            </div>

            <div class="text-center">
              <div class="inline-flex items-center justify-center w-16 h-16 bg-brand-primary bg-gradient-to-r from-brand-primary to-brand-secondary rounded-full text-white font-bold text-xl mb-4 shadow-lg">
                03
              </div>
              <h3 class="text-xl font-semibold text-brand-dark mb-2">Development</h3>
              <p class="text-gray-500">
                Build your website using modern, scalable technologies.
              </p>
            </div>

            <div class="text-center">
              <div class="inline-flex items-center justify-center w-16 h-16 bg-brand-primary bg-gradient-to-r from-brand-primary to-brand-secondary rounded-full text-white font-bold text-xl mb-4 shadow-lg">
                04
              </div>
              <h3 class="text-xl font-semibold text-brand-dark mb-2">Launch</h3>
              <p class="text-gray-500">
                Deploy your site and provide ongoing support and maintenance.
              </p>
            </div>

          </div>
        </div>
      </section>

      <!-- CTA SECTION -->
      <section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-brand-dark mb-6">
          Ready to Get Started?
        </h2>
        <p class="text-xl text-gray-500 mb-8 max-w-2xl mx-auto">
          Let's discuss your project and create a website that perfectly represents your business and drives results.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
          <!-- Fixed: Added bg-brand-primary fallback and changed to bg-gradient-to-r -->
          <a href="../pages/Contact.php" class="px-8 py-3 rounded-xl bg-brand-primary bg-gradient-to-r from-brand-primary to-brand-secondary text-white font-bold shadow-lg hover:shadow-xl hover:opacity-90 transition-all">
            Get Your Quote
          </a>
          <a href="../pages/About.php" class="px-8 py-3 rounded-xl border-2 border-brand-primary text-brand-primary font-bold hover:bg-gray-50 transition-colors">
            Learn More About Us
          </a>
        </div>
      </section>

    </main>

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-gray-300 py-12">
      <div class="container mx-auto px-6 grid md:grid-cols-4 gap-8">
        <div class="col-span-1 md:col-span-2">
          <div class="flex items-center gap-2 mb-4 text-white">
            <!-- Fixed: Added bg-brand-primary fallback and changed to bg-gradient-to-r -->
            <div class="w-8 h-8 flex items-center justify-center bg-brand-primary bg-gradient-to-r from-brand-primary to-brand-secondary rounded font-bold">C</div>
            <span class="font-bold text-xl">CraftMySite</span>
          </div>
          <p class="text-gray-400 max-w-sm">Professional website creation services that help businesses establish a strong online presence.</p>
        </div>
        <div>
          <h3 class="text-white font-bold mb-4">Quick Links</h3>
          <ul class="space-y-2">
            <li><a href="../pages/Home.php" class="hover:text-brand-primary transition">Home</a></li>
            <li><a href="../pages/About.php" class="hover:text-brand-primary transition">About</a></li>
            <li><a href="../pages/Services.php" class="text-brand-primary font-semibold transition">Services</a></li>
            <li><a href="../pages/Faq.php" class="hover:text-brand-primary transition">FAQ</a></li>
            <li><a href="../pages/Contact.php" class="hover:text-brand-primary transition">Contact</a></li>
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