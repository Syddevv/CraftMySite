<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact - CraftMySite</title>
    <link rel="stylesheet" href="../assets/css/styles.css" />
    <style>
      /* Simple Toast Animation */
      #toast {
        visibility: hidden;
        min-width: 250px;
        background-color: #22223b;
        color: #fff;
        text-align: center;
        border-radius: 8px;
        padding: 16px;
        position: fixed;
        z-index: 100;
        right: 30px;
        bottom: 30px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        opacity: 0;
        transition: opacity 0.5s, bottom 0.5s;
        border-left: 4px solid #48b1f7;
      }
      #toast.show {
        visibility: visible;
        opacity: 1;
        bottom: 50px;
      }
    </style>
  </head>
  <body class="bg-gray-50 text-gray-800 font-sans antialiased flex flex-col min-h-screen">
    
    <!-- HEADER -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
      <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <a href="../pages/Home.php" class="flex items-center gap-2 group">
          <div class="w-10 h-10 flex items-center justify-center bg-brand-primary bg-gradient-to-br from-brand-primary to-brand-secondary text-white font-bold rounded-lg text-xl shadow-md group-hover:scale-105 transition-transform">
            C
          </div>
          <span class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-brand-primary to-brand-secondary">
            CraftMySite
          </span>
        </a>

        <ul class="hidden md:flex items-center gap-8 text-gray-600 font-medium">
          <li><a href="../pages/Home.php" class="hover:text-brand-primary transition">Home</a></li>
          <li><a href="../pages/About.php" class="hover:text-brand-primary transition">About</a></li>
          <li><a href="../pages/Services.php" class="hover:text-brand-primary transition">Services</a></li>
          <li><a href="../pages/Faq.php" class="hover:text-brand-primary transition">FAQ</a></li>
          <!-- Active State -->
          <li><a href="../pages/Contact.php" class="text-brand-primary font-semibold transition">Contact</a></li>
        </ul>

        <div class="hidden md:flex items-center gap-4">
          <a href="/login" class="text-gray-600 hover:text-brand-primary font-semibold transition">Login</a>
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
          <li><a href="../pages/Services.php" class="block text-gray-600">Services</a></li>
          <li><a href="../pages/Faq.php" class="block text-gray-600">FAQ</a></li>
          <li><a href="../pages/Contact.php" class="block text-brand-primary font-semibold">Contact</a></li>
          <div class="flex flex-col gap-3 mt-2 pt-4 border-t border-gray-100">
            <a href="/login" class="text-center text-gray-600 py-2">Login</a>
            <a href="/register" class="text-center py-3 bg-brand-primary text-white rounded-lg">Get Started</a>
          </div>
        </ul>
      </nav>
    </header>

    <main class="flex-grow py-20">
      
      <!-- Hero Section -->
      <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
        <div class="text-center">
          <h1 class="text-4xl md:text-5xl font-bold text-brand-dark mb-6">
            Get In <span class="bg-clip-text text-transparent bg-gradient-to-r from-brand-primary to-brand-secondary">Touch</span>
          </h1>
          <p class="text-xl text-gray-500 max-w-3xl mx-auto">
            Ready to start your website project? Have questions about our services? We'd love to hear from you.
          </p>
        </div>
      </section>

      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
          
          <!-- Contact Form -->
          <div>
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">
              <div class="p-6 border-b border-gray-100">
                <h2 class="text-2xl font-bold text-brand-dark mb-2">Send us a message</h2>
                <p class="text-gray-500">Fill out the form below and we'll get back to you as soon as possible.</p>
              </div>
              <div class="p-6">
                <form id="contactForm" class="space-y-6">
                  <div>
                    <label for="name" class="block text-sm font-medium text-brand-dark mb-2">Full Name</label>
                    <input 
                      type="text" 
                      id="name" 
                      name="name" 
                      required 
                      placeholder="Your full name" 
                      class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-brand-primary focus:border-transparent transition-shadow"
                    >
                  </div>
                  <div>
                    <label for="email" class="block text-sm font-medium text-brand-dark mb-2">Email Address</label>
                    <input 
                      type="email" 
                      id="email" 
                      name="email" 
                      required 
                      placeholder="your.email@example.com" 
                      class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-brand-primary focus:border-transparent transition-shadow"
                    >
                  </div>
                  <div>
                    <label for="message" class="block text-sm font-medium text-brand-dark mb-2">Message</label>
                    <textarea 
                      id="message" 
                      name="message" 
                      required 
                      rows="6" 
                      placeholder="Tell us about your project or ask us a question..." 
                      class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-brand-primary focus:border-transparent transition-shadow"
                    ></textarea>
                  </div>
                  <button 
                    type="submit" 
                    class="w-full bg-brand-primary bg-gradient-to-r from-brand-primary to-brand-secondary text-white font-bold py-3 px-4 rounded-xl shadow-md hover:shadow-lg hover:opacity-90 transition-all transform hover:-translate-y-0.5"
                  >
                    Send Message
                  </button>
                </form>
              </div>
            </div>
          </div>

          <!-- Contact Information & Why Choose Us -->
          <div class="space-y-8">
            
            <!-- Info Cards Grid -->
            <div>
              <h2 class="text-2xl font-bold text-brand-dark mb-6">Contact Information</h2>
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                
                <!-- Email -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                  <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                      <div class="w-12 h-12 bg-brand-primary bg-gradient-to-r from-brand-primary to-brand-secondary rounded-lg flex items-center justify-center text-white">
                        <!-- Mail Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                      </div>
                    </div>
                    <div>
                      <h3 class="font-semibold text-brand-dark mb-1">Email Us</h3>
                      <p class="text-brand-primary font-medium mb-1">hello@craftmysite.com</p>
                      <p class="text-sm text-gray-500">Send us an email anytime!</p>
                    </div>
                  </div>
                </div>

                <!-- Phone -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                  <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                      <div class="w-12 h-12 bg-brand-primary bg-gradient-to-r from-brand-primary to-brand-secondary rounded-lg flex items-center justify-center text-white">
                        <!-- Phone Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                      </div>
                    </div>
                    <div>
                      <h3 class="font-semibold text-brand-dark mb-1">Call Us</h3>
                      <p class="text-brand-primary font-medium mb-1">+1 (555) 123-4567</p>
                      <p class="text-sm text-gray-500">Mon-Fri from 9am to 6pm EST</p>
                    </div>
                  </div>
                </div>

                <!-- Visit -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                  <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                      <div class="w-12 h-12 bg-brand-primary bg-gradient-to-r from-brand-primary to-brand-secondary rounded-lg flex items-center justify-center text-white">
                        <!-- MapPin Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                      </div>
                    </div>
                    <div>
                      <h3 class="font-semibold text-brand-dark mb-1">Visit Us</h3>
                      <p class="text-brand-primary font-medium mb-1">Pulilan, Bulacan</p>
                      <p class="text-sm text-gray-500">Remote-first team serving clients globally</p>
                    </div>
                  </div>
                </div>

                <!-- Clock -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                  <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                      <div class="w-12 h-12 bg-brand-primary bg-gradient-to-r from-brand-primary to-brand-secondary rounded-lg flex items-center justify-center text-white">
                        <!-- Clock Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                      </div>
                    </div>
                    <div>
                      <h3 class="font-semibold text-brand-dark mb-1">Response Time</h3>
                      <p class="text-brand-primary font-medium mb-1">Within 24 hours</p>
                      <p class="text-sm text-gray-500">We respond to all inquiries quickly</p>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <!-- Why Choose Us -->
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-8 relative overflow-hidden">
              <!-- Subtle background decoration -->
              <div class="absolute top-0 right-0 w-32 h-32 bg-brand-primary opacity-5 rounded-full -mr-16 -mt-16"></div>
              
              <h3 class="text-xl font-bold text-brand-dark mb-4 relative z-10">Why Choose CraftMySite?</h3>
              <ul class="space-y-3 text-gray-500 relative z-10">
                <li class="flex items-center">
                  <div class="w-2 h-2 bg-brand-primary rounded-full mr-3"></div>
                  Free consultation and project planning
                </li>
                <li class="flex items-center">
                  <div class="w-2 h-2 bg-brand-primary rounded-full mr-3"></div>
                  Transparent pricing with no hidden costs
                </li>
                <li class="flex items-center">
                  <div class="w-2 h-2 bg-brand-primary rounded-full mr-3"></div>
                  Quick turnaround times
                </li>
                <li class="flex items-center">
                  <div class="w-2 h-2 bg-brand-primary rounded-full mr-3"></div>
                  Ongoing support and maintenance
                </li>
                <li class="flex items-center">
                  <div class="w-2 h-2 bg-brand-primary rounded-full mr-3"></div>
                  100% satisfaction guarantee
                </li>
              </ul>
            </div>

          </div>
        </div>
      </div>

      <!-- CTA Section -->
      <section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-brand-dark mb-6">
          Ready to Start Your Project?
        </h2>
        <p class="text-xl text-gray-500 mb-8 max-w-2xl mx-auto">
          Let's discuss your vision and create something amazing together. Get your free consultation today.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
          <a href="tel:+15551234567" class="px-8 py-3 rounded-xl bg-brand-primary bg-gradient-to-r from-brand-primary to-brand-secondary text-white font-bold shadow-lg hover:shadow-xl hover:opacity-90 transition-all">
            Call Now
          </a>
          <a href="../pages/Services.php" class="px-8 py-3 rounded-xl border-2 border-brand-primary text-brand-primary font-bold hover:bg-gray-50 transition-colors">
            View Our Services
          </a>
        </div>
      </section>

    </main>

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-gray-300 py-12 mt-auto">
      <div class="container mx-auto px-6 grid md:grid-cols-4 gap-8">
        <div class="col-span-1 md:col-span-2">
          <div class="flex items-center gap-2 mb-4 text-white">
            <div class="w-8 h-8 flex items-center justify-center bg-brand-primary bg-gradient-to-r from-brand-primary to-brand-secondary rounded font-bold">C</div>
            <span class="font-bold text-xl">CraftMySite</span>
          </div>
          <p class="text-gray-400 max-w-sm">Professional website creation services that help businesses establish a strong online presence.</p>
        </div>
        <div>
          <h3 class="text-white font-bold mb-4">Quick Links</h3>
          <ul class="space-y-2">
            <li><a href="../pages/Home.php" class="hover:text-brand-secondary transition">Home</a></li>
            <li><a href="../pages/About.php" class="hover:text-brand-secondary transition">About</a></li>
            <li><a href="../pages/Services.php" class="hover:text-brand-secondary transition">Services</a></li>
            <li><a href="../pages/Faq.php" class="hover:text-brand-secondary transition">FAQ</a></li>
            <li><a href="../pages/Contact.php" class="text-brand-primary font-semibold transition">Contact</a></li>
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

    <!-- Toast Notification -->
    <div id="toast">
        <div class="font-bold text-lg mb-1">Message Sent!</div>
        <div class="text-sm text-gray-300">Thank you for your message. We'll get back to you within 24 hours.</div>
    </div>

    <script src="../js/nav.js"></script>
    <script src="../js/contact.js"></script>
  </body>
</html>