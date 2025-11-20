<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register - CraftMySite</title>
    <link rel="stylesheet" href="../assets/css/styles.css" />
    
    <!-- 
       PREVIEW CONFIGURATION:
       Using Tailwind CDN for instant preview.
       In production, you would use your existing 'styles.css' build process.
    -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              brand: {
                primary: '#6c63ff',   /* Purple/Indigo */
                secondary: '#48b1f7', /* Light Blue */
                dark: '#22223b',
              }
            },
            backgroundImage: {
              'gradient-primary': 'linear-gradient(to right, #6c63ff, #48b1f7)',
            }
          }
        }
      }
    </script>
    <style>
      /* Polyfill for bg-linear-to classes used in v4 */
      .bg-linear-to-r { background-image: linear-gradient(to right, var(--tw-gradient-stops)); }
      .bg-linear-to-br { background-image: linear-gradient(to bottom right, var(--tw-gradient-stops)); }
      .bg-linear-to-b { background-image: linear-gradient(to bottom, var(--tw-gradient-stops)); }
      
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
          <li><a href="../pages/Contact.php" class="hover:text-brand-primary transition">Contact</a></li>
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
          <li><a href="../pages/Contact.php" class="block text-gray-600">Contact</a></li>
          <div class="flex flex-col gap-3 mt-2 pt-4 border-t border-gray-100">
            <a href="/login" class="text-center text-gray-600 py-2">Login</a>
            <a href="/register" class="text-center py-3 bg-brand-primary text-white rounded-lg">Get Started</a>
          </div>
        </ul>
      </nav>
    </header>

    <main class="flex-grow flex items-center justify-center p-6">
      <div class="w-full max-w-6xl bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row">
        
        <!-- Left Side: Visual/Branding (Hidden on small screens) -->
        <div class="hidden md:flex md:w-5/12 bg-brand-primary bg-gradient-to-br from-brand-primary to-brand-secondary p-12 text-white flex-col justify-between relative overflow-hidden">
            <!-- Decorative Circles -->
            <div class="absolute top-0 left-0 w-64 h-64 bg-white opacity-10 rounded-full -mt-10 -ml-10 blur-2xl"></div>
            <div class="absolute bottom-0 right-0 w-48 h-48 bg-white opacity-10 rounded-full -mb-10 -mr-10 blur-xl"></div>

            <div class="relative z-10">
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mb-8 backdrop-blur-sm">
                    <span class="font-bold text-2xl">C</span>
                </div>
                <h2 class="text-4xl font-bold mb-6 leading-tight">Start your digital journey with us.</h2>
                <p class="text-blue-50 text-lg leading-relaxed">
                    Join thousands of businesses that trust CraftMySite to build their online presence. Fast, secure, and beautiful.
                </p>
            </div>

            <div class="relative z-10 mt-12">
                <div class="flex items-center gap-4 p-4 bg-white/10 rounded-2xl backdrop-blur-sm border border-white/10">
                    <div class="flex -space-x-2">
                        <div class="w-8 h-8 rounded-full bg-gray-300 border-2 border-brand-primary"></div>
                        <div class="w-8 h-8 rounded-full bg-gray-400 border-2 border-brand-primary"></div>
                        <div class="w-8 h-8 rounded-full bg-gray-500 border-2 border-brand-primary"></div>
                    </div>
                    <div class="text-sm">
                        <p class="font-bold">Trusted by 200+ companies</p>
                        <div class="flex text-yellow-400 text-xs">★★★★★</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side: Registration Form -->
        <div class="w-full md:w-7/12 p-8 md:p-12 lg:p-16 bg-white">
            <div class="max-w-md mx-auto">
                <div class="text-center mb-10">
                    <h1 class="text-3xl font-bold text-brand-dark mb-2">Create an Account</h1>
                    <p class="text-gray-500">Sign up to get started with CraftMySite</p>
                </div>

                <!-- Social Sign Up (Optional Placeholder) -->
                <button class="w-full flex items-center justify-center gap-3 py-3 px-4 rounded-xl border border-gray-200 hover:bg-gray-50 transition-colors mb-6 text-gray-700 font-medium">
                    <svg class="w-5 h-5" viewBox="0 0 24 24">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                    </svg>
                    Sign up with Google
                </button>

                <div class="relative mb-8">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">Or continue with email</span>
                    </div>
                </div>

                <form id="registerForm" class="space-y-5">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="firstName" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                            <input type="text" id="firstName" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20 outline-none transition-all" placeholder="John">
                        </div>
                        <div>
                            <label for="lastName" class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                            <input type="text" id="lastName" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20 outline-none transition-all" placeholder="Doe">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <input type="email" id="email" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20 outline-none transition-all" placeholder="john@example.com">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" id="password" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20 outline-none transition-all" placeholder="••••••••">
                    </div>

                    <div class="flex items-start mt-4">
                        <div class="flex items-center h-5">
                            <input id="terms" type="checkbox" required class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-brand-primary/30 text-brand-primary">
                        </div>
                        <label for="terms" class="ml-2 text-sm font-medium text-gray-500">I agree to the <a href="#" class="text-brand-primary hover:underline">Terms and Conditions</a></label>
                    </div>

                    <button type="submit" class="w-full py-3.5 rounded-xl bg-brand-primary bg-gradient-to-r from-brand-primary to-brand-secondary text-white font-bold shadow-lg hover:shadow-xl hover:opacity-90 transition-all transform hover:-translate-y-0.5 mt-2">
                        Create Account
                    </button>
                </form>

                <p class="text-center mt-8 text-sm text-gray-500">
                    Already have an account? 
                    <a href="/login" class="font-bold text-brand-primary hover:text-brand-secondary transition-colors">Log in</a>
                </p>
            </div>
        </div>
      </div>
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
            <li><a href="../pages/Contact.php" class="hover:text-brand-secondary transition">Contact</a></li>
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
        <div class="font-bold text-lg mb-1">Account Created!</div>
        <div class="text-sm text-gray-300">Welcome to CraftMySite. Redirecting...</div>
    </div>

    <script src="../js/nav.js"></script>
    <script>
      // --- Mobile Navigation Logic ---
      const btn = document.getElementById('menuToggle');
      const nav = document.getElementById('mobileNav');
      if(btn && nav) {
        btn.addEventListener('click', () => {
            nav.classList.toggle('hidden');
        });
      }

      // --- Form Submission Logic ---
      const form = document.getElementById('registerForm');
      const toast = document.getElementById('toast');

      form.addEventListener('submit', (e) => {
        e.preventDefault(); // Prevent actual server submission for demo

        // Show Toast
        toast.className = "show";

        // Hide Toast after 3 seconds
        setTimeout(function(){ 
            toast.className = toast.className.replace("show", ""); 
            // Optional: Redirect logic would go here
            // window.location.href = '/login';
        }, 3000);

        // Reset Form
        form.reset();
      });
    </script>
  </body>
</html>