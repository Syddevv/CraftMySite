<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/css/styles.css" />
    <title>FAQ - CraftMySite</title>
    <style>
      /* Polyfill for bg-linear-to classes used in v4 syntax preference */
      .bg-linear-to-r { background-image: linear-gradient(to right, var(--tw-gradient-stops)); }
      .bg-linear-to-br { background-image: linear-gradient(to bottom right, var(--tw-gradient-stops)); }
      
      /* Smooth accordion animation */
      .accordion-content {
        transition: max-height 0.3s ease-in-out, opacity 0.3s ease-in-out;
        max-height: 0;
        opacity: 0;
        overflow: hidden;
      }
      .accordion-content.open {
        max-height: 500px; /* Arbitrary large height */
        opacity: 1;
      }
      .arrow-icon {
        transition: transform 0.3s ease;
      }
      .arrow-icon.rotate {
        transform: rotate(180deg);
      }
      /* Loader for AI */
      .loader {
        border: 3px solid #f3f3f3;
        border-radius: 50%;
        border-top: 3px solid #6c63ff;
        width: 24px;
        height: 24px;
        -webkit-animation: spin 1s linear infinite; /* Safari */
        animation: spin 1s linear infinite;
      }
      @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
      }
    </style>
  </head>
  <body class="bg-gray-50 text-gray-800 font-sans antialiased flex flex-col min-h-screen">
    
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
          <li><a href="../pages/Services.php" class="hover:text-brand-primary font-semibold transition">Services</a></li>
          <li><a href="../pages/Faq.php" class="text-brand-primary transition">FAQ</a></li>
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
          <li><a href="../pages/Services.php" class="block text-gray-600 font-semibold">Services</a></li>
          <li><a href="../pages/Faq.php" class="block text-brand-primary">FAQ</a></li>
          <li><a href="../pages/Contact.php" class="block text-gray-600">Contact</a></li>
          <div class="flex flex-col gap-3 mt-2 pt-4 border-t border-gray-100">
            <a href="/login" class="text-center text-gray-600 py-2">Login</a>
            <a href="/register" class="text-center py-3 bg-brand-primary text-white rounded-lg">Get Started</a>
          </div>
        </ul>
      </nav>
    </header>

    <main class="flex-grow pt-20 pb-20 px-4">
      
      <!-- Hero Section -->
      <section class="max-w-4xl mx-auto text-center mb-16">
        <h1 class="text-4xl md:text-5xl font-bold text-brand-dark mb-6">
          Frequently Asked <span class="bg-clip-text text-transparent bg-gradient-to-r from-brand-primary to-brand-secondary">Questions</span>
        </h1>
        <p class="text-xl text-gray-500 max-w-2xl mx-auto">
          Get answers to common questions about our website creation process, timelines, and services.
        </p>
      </section>

      <!-- AI Search Feature -->
      <section class="max-w-3xl mx-auto mb-16">
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 md:p-8 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-1 bg-linear-to-r from-brand-primary to-brand-secondary"></div>
            <div class="flex items-center gap-3 mb-4">
                <div class="w-8 h-8 rounded-full bg-brand-primary/10 flex items-center justify-center text-brand-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a10 10 0 1 0 10 10H12V2z"/><path d="M12 2a10 10 0 0 1 10 10"/><path d="M12 12 2.1 10.5"/></svg>
                </div>
                <h2 class="text-lg font-bold text-brand-dark">Ask AI Support</h2>
            </div>
            
            <p class="text-gray-500 mb-4 text-sm">Type your question below and our AI will answer based on our FAQ knowledge base.</p>
            
            <div class="flex gap-2 mb-4">
                <input type="text" id="aiQuestionInput" placeholder="e.g., Do you offer SEO services?" class="flex-1 px-4 py-3 rounded-xl border border-gray-200 focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20 outline-none transition-all" />
                <button id="askAiBtn" class="px-6 py-3 rounded-xl bg-brand-dark text-white font-semibold hover:bg-gray-800 transition-colors flex items-center gap-2">
                    <span>Ask</span>
                    <div id="aiLoader" class="loader hidden"></div>
                </button>
            </div>

            <div id="aiResponseContainer" class="hidden bg-gray-50 rounded-xl p-4 border border-gray-100 text-gray-700 text-sm leading-relaxed">
                <!-- AI Answer will appear here -->
            </div>
        </div>
      </section>

      <!-- FAQ Accordion -->
      <section class="max-w-3xl mx-auto space-y-4" id="faqContainer">
        
        <!-- FAQ Item 1 -->
        <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden hover:shadow-md transition-shadow duration-300 faq-item">
          <button class="w-full text-left px-6 py-5 flex justify-between items-center focus:outline-none group" onclick="toggleAccordion(this)">
            <span class="font-semibold text-lg text-brand-dark group-hover:text-brand-primary transition-colors">How long does it take to build a website?</span>
            <svg class="w-5 h-5 text-gray-400 transform transition-transform duration-300 arrow-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
          </button>
          <div class="accordion-content bg-gray-50">
            <p class="px-6 pb-6 text-gray-600 leading-relaxed">
              The timeline varies depending on the complexity of your project. A simple website typically takes 2-3 weeks, while more complex sites with custom features can take 4-8 weeks. We provide a detailed timeline during our initial consultation.
            </p>
          </div>
        </div>

        <!-- FAQ Item 2 -->
        <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden hover:shadow-md transition-shadow duration-300 faq-item">
          <button class="w-full text-left px-6 py-5 flex justify-between items-center focus:outline-none group" onclick="toggleAccordion(this)">
            <span class="font-semibold text-lg text-brand-dark group-hover:text-brand-primary transition-colors">What do I need to provide to get started?</span>
            <svg class="w-5 h-5 text-gray-400 transform transition-transform duration-300 arrow-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
          </button>
          <div class="accordion-content bg-gray-50">
            <p class="px-6 pb-6 text-gray-600 leading-relaxed">
              We need your brand materials (logo, color preferences), content (text, images), and a clear understanding of your goals. Don't worry if you don't have everything ready - we can help you develop content and provide guidance throughout the process.
            </p>
          </div>
        </div>

        <!-- FAQ Item 3 -->
        <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden hover:shadow-md transition-shadow duration-300 faq-item">
          <button class="w-full text-left px-6 py-5 flex justify-between items-center focus:outline-none group" onclick="toggleAccordion(this)">
            <span class="font-semibold text-lg text-brand-dark group-hover:text-brand-primary transition-colors">Do you provide hosting and domain services?</span>
            <svg class="w-5 h-5 text-gray-400 transform transition-transform duration-300 arrow-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
          </button>
          <div class="accordion-content bg-gray-50">
            <p class="px-6 pb-6 text-gray-600 leading-relaxed">
              Yes, we can handle domain registration and hosting setup for you. We work with reliable hosting providers to ensure your website has excellent uptime and performance. We also offer ongoing maintenance packages.
            </p>
          </div>
        </div>

        <!-- FAQ Item 4 -->
        <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden hover:shadow-md transition-shadow duration-300 faq-item">
          <button class="w-full text-left px-6 py-5 flex justify-between items-center focus:outline-none group" onclick="toggleAccordion(this)">
            <span class="font-semibold text-lg text-brand-dark group-hover:text-brand-primary transition-colors">Will my website be mobile-friendly?</span>
            <svg class="w-5 h-5 text-gray-400 transform transition-transform duration-300 arrow-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
          </button>
          <div class="accordion-content bg-gray-50">
            <p class="px-6 pb-6 text-gray-600 leading-relaxed">
              Absolutely! All our websites are built with a mobile-first approach, ensuring they look and function perfectly on all devices - smartphones, tablets, and desktops. This is essential for both user experience and search engine rankings.
            </p>
          </div>
        </div>

        <!-- FAQ Item 5 -->
        <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden hover:shadow-md transition-shadow duration-300 faq-item">
          <button class="w-full text-left px-6 py-5 flex justify-between items-center focus:outline-none group" onclick="toggleAccordion(this)">
            <span class="font-semibold text-lg text-brand-dark group-hover:text-brand-primary transition-colors">Can I update the website content myself?</span>
            <svg class="w-5 h-5 text-gray-400 transform transition-transform duration-300 arrow-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
          </button>
          <div class="accordion-content bg-gray-50">
            <p class="px-6 pb-6 text-gray-600 leading-relaxed">
              Yes, we build websites with user-friendly content management systems that allow you to easily update text, images, and other content. We also provide training and documentation to help you manage your site independently.
            </p>
          </div>
        </div>

        <!-- FAQ Item 6 -->
        <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden hover:shadow-md transition-shadow duration-300 faq-item">
          <button class="w-full text-left px-6 py-5 flex justify-between items-center focus:outline-none group" onclick="toggleAccordion(this)">
            <span class="font-semibold text-lg text-brand-dark group-hover:text-brand-primary transition-colors">What about SEO and search engine visibility?</span>
            <svg class="w-5 h-5 text-gray-400 transform transition-transform duration-300 arrow-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
          </button>
          <div class="accordion-content bg-gray-50">
            <p class="px-6 pb-6 text-gray-600 leading-relaxed">
              SEO is built into every website we create. We implement best practices including optimized page structure, meta tags, fast loading speeds, and mobile responsiveness. We can also provide ongoing SEO services to help improve your search rankings.
            </p>
          </div>
        </div>

         <!-- FAQ Item 7 -->
         <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden hover:shadow-md transition-shadow duration-300 faq-item">
          <button class="w-full text-left px-6 py-5 flex justify-between items-center focus:outline-none group" onclick="toggleAccordion(this)">
            <span class="font-semibold text-lg text-brand-dark group-hover:text-brand-primary transition-colors">What is your pricing structure?</span>
            <svg class="w-5 h-5 text-gray-400 transform transition-transform duration-300 arrow-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
          </button>
          <div class="accordion-content bg-gray-50">
            <p class="px-6 pb-6 text-gray-600 leading-relaxed">
              Our pricing depends on the scope and complexity of your project. We offer transparent, fixed-price quotes with no hidden fees. Contact us for a free consultation and custom quote based on your specific needs and requirements.
            </p>
          </div>
        </div>

      </section>

      <!-- Contact CTA -->
      <section class="max-w-4xl mx-auto mt-20 px-4">
        <div class="bg-gradient-to-r from-brand-primary to-brand-secondary rounded-3xl p-10 md:p-12 text-center text-white shadow-xl">
          <h2 class="text-3xl font-bold mb-4">Still Have Questions?</h2>
          <p class="text-blue-50 text-lg mb-8 max-w-2xl mx-auto">
            Can't find the answer you're looking for? Our team is here to help you with any questions about our services.
          </p>
          <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/Contact.php" class="px-8 py-3 bg-white text-brand-primary font-bold rounded-xl hover:bg-gray-100 transition-colors shadow-lg">
              Contact Our Team
            </a>
            <a href="mailto:hello@craftmysite.com" class="px-8 py-3 bg-transparent border-2 border-white text-white font-bold rounded-xl hover:bg-white/10 transition-colors">
              Send Email
            </a>
          </div>
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
            <li><a href="../pages/Services.php" class="hover:text-brand-primary font-semibold transition">Services</a></li>
            <li><a href="../pages/Faq.php" class="text-brand-primary transition">FAQ</a></li>
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

    <script src="../js/ai.js"></script>
    <script src="../js/nav.js"></script>
  </body>
</html>