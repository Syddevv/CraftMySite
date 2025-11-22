<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About - CraftMySite</title>
    <link rel="stylesheet" href="../assets/css/styles.css" />
  </head>  
  
  <body class="bg-gray-50 text-gray-800 font-sans antialiased">
    
    <header class="bg-white shadow-sm sticky top-0 z-50">
      <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <a href="../pages/Home.php" class="flex items-center gap-2 group">
          <div class="w-10 h-10 flex items-center justify-center bg-linear-to-br from-brand-primary to-brand-secondary text-white font-bold rounded-lg text-xl shadow-md group-hover:scale-105 transition-transform">
            C
          </div>
          <span class="text-xl font-bold bg-clip-text text-transparent bg-linear-to-r from-brand-primary to-brand-secondary">
            CraftMySite
          </span>
        </a>

      <ul class="hidden md:flex items-center gap-8 text-gray-600 font-medium">
                <li><a href="../pages/Home.php" class="hover:text-brand-primary transition">Home</a></li>
                <li><a href="../pages/About.php" class="hover:text-brand-primary text-brand-primary transition">About</a></li>
                <li><a href="../pages/Services.php" class="hover:text-brand-primary transition">Services</a></li>
                <li><a href="../pages/Faq.php" class="hover:text-brand-primary transition">FAQ</a></li>
                <li><a href="../pages/Contact.php" class="hover:text-brand-primary transition">Contact</a></li>
      </ul>

            <div class="hidden md:flex items-center gap-4">
                <a href="Login.php" class="text-gray-600 hover:text-brand-primary font-semibold transition">Login</a>
                <a href="Register.php" class="px-5 py-2.5 rounded-lg bg-linear-to-r from-brand-primary to-brand-secondary text-white font-semibold shadow-md hover:shadow-lg hover:opacity-90 transition-all transform hover:-translate-y-0.5">
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
          <li><a href="../pages/About.php" class="block text-brand-primary">About</a></li>
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

    <main>
      <section class="pt-24 pb-16 text-center px-4">
        <div class="max-w-4xl mx-auto">
          <h1 class="text-4xl lg:text-5xl font-bold text-brand-dark mb-6">
            About <span class="bg-clip-text text-transparent bg-linear-to-r from-brand-primary to-brand-secondary">CraftMySite</span>
          </h1>
          <p class="text-xl text-gray-500 max-w-2xl mx-auto leading-relaxed">
            We're passionate about creating exceptional web experiences that
            help businesses thrive in the digital landscape. Founded with a
            vision to make professional web design accessible to everyone.
          </p>
        </div>
      </section>

      <section class="py-12 px-6">
        <div class="max-w-7xl mx-auto grid md:grid-cols-3 gap-8 px-4">
          
          <div class="bg-linear-to-br from-brand-primary to-brand-secondary rounded-3xl py-20 px-8 text-center text-white shadow-xl transform hover:-translate-y-2 transition-transform duration-300 flex flex-col items-center justify-start h-full">
            <div class="w-16 h-16 mb-8 bg-white/20 rounded-2xl flex items-center justify-center text-4xl backdrop-blur-sm shadow-inner">
              🎯
            </div>
            <h3 class="text-2xl font-bold mb-4">Our Mission</h3>
            <p class="text-blue-50 leading-relaxed">
              To empower businesses with beautiful, functional websites that
              drive growth and success in the digital world.
            </p>
          </div>

          <div class="bg-linear-to-br from-brand-primary to-brand-secondary rounded-3xl py-20 px-8 text-center text-white shadow-xl transform hover:-translate-y-2 transition-transform duration-300 flex flex-col items-center justify-start h-full">
            <div class="w-16 h-16 mb-8 bg-white/20 rounded-2xl flex items-center justify-center text-4xl backdrop-blur-sm shadow-inner">
              ❤️
            </div>
            <h3 class="text-2xl font-bold mb-4">Our Values</h3>
            <p class="text-blue-50 leading-relaxed">
              We believe in quality craftsmanship, transparent communication,
              and building lasting relationships with our clients.
            </p>
          </div>

          <div class="bg-linear-to-br from-brand-primary to-brand-secondary rounded-3xl py-20 px-8 text-center text-white shadow-xl transform hover:-translate-y-2 transition-transform duration-300 flex flex-col items-center justify-start h-full">
            <div class="w-16 h-16 mb-8 bg-white/20 rounded-2xl flex items-center justify-center text-4xl backdrop-blur-sm shadow-inner">
              🏆
            </div>
            <h3 class="text-2xl font-bold mb-4">Our Promise</h3>
            <p class="text-blue-50 leading-relaxed">
              Every website we create is a testament to our commitment to
              excellence and attention to detail.
            </p>
          </div>

        </div>
      </section>

      <section class="py-24 bg-gray-50">
        <div class="container mx-auto px-6">
          
          <div class="text-center mb-16 max-w-2xl mx-auto">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Meet Our Team</h2>
            <p class="text-gray-500 text-lg">
              The creative minds behind CraftMySite, dedicated to bringing your digital vision to life.
            </p>
          </div>
          
          <div class="max-w-5xl mx-auto grid md:grid-cols-2 gap-8 px-4">
  
             <!-- Sydney Santos -->
            <div class="w-full bg-white rounded-3xl p-8 text-center shadow-md border border-gray-100 hover:shadow-lg transition-all duration-300 flex flex-col items-center h-full">
              <img 
                src="../assets/images/syd.jpg" 
                alt="Sydney Santos" 
                class="w-60 h-60 rounded-full object-cover mb-8 shadow-lg border-4 border-white ring-2 ring-gray-100"
              >
              <h3 class="text-2xl font-bold text-gray-900 mb-2">Sydney Santos</h3>
              <p class="text-brand-primary font-medium mb-6">3rd Year BSIS Student & Co-Founder</p>
              <p class="text-gray-500 leading-relaxed text-base px-2">
                Full-stack developer specializing in MERN stack development.
                Combines front-end and back-end expertise with UI/UX design
                skills using Figma to create comprehensive digital solutions.
              </p>
            </div>


            <!-- James Camua -->
            <div class="w-full bg-white rounded-3xl p-8 text-center shadow-md border border-gray-100 hover:shadow-lg transition-all duration-300 flex flex-col items-center h-full">
              <img 
                src="../assets/images/james.jpg" 
                alt="James Camua" 
                class="w-60 h-60 rounded-full object-cover mb-8 shadow-lg border-4 border-white ring-2 ring-gray-100"
              >
              <h3 class="text-2xl font-bold text-gray-900 mb-2">James Camua</h3>
              <p class="text-brand-primary font-medium mb-6">3rd Year BSIS Student & Co-Founder</p>
              <p class="text-gray-500 leading-relaxed text-base px-2">
                Front-end developer skilled in HTML and CSS, focused on creating
                clean, responsive, and visually appealing user interfaces that
                provide excellent user experiences.
              </p>
            </div>
          
          </div>
          
        </div>
      </section>

      <section class="py-20 px-6">
        <div class="max-w-3xl mx-auto text-center">
          <h2 class="text-3xl font-bold text-brand-dark mb-8">Our Story</h2>
          <div class="space-y-6 text-lg text-gray-600 leading-relaxed">
            <p>
              CraftMySite was born from a simple observation: too many businesses
              were struggling with outdated, ineffective websites that didn't
              represent their true potential. Sydney and James, having worked in
              the industry for years, saw the gap between what businesses needed
              and what they were getting.
            </p>
            <p>
              In 2020, they decided to change that. Starting with a focus on
              quality over quantity, CraftMySite has grown into a trusted partner
              for businesses looking to establish a strong online presence. We've
              helped over 200 companies transform their digital footprint, from
              local startups to established enterprises.
            </p>
            <p>
              Today, we continue to push the boundaries of web design and
              development, staying ahead of trends and technologies to ensure our
              clients always have the competitive edge they need to succeed
              online.
            </p>
          </div>
        </div>
      </section>
    </main>

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
            <li><a href="Home.php" class="hover:text-brand-primary transition">Home</a></li>
            <li><a href="About.php" class="text-brand-primary transition">About</a></li>
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
        &copy; 2024 CraftMySite. All rights reserved.
      </div>
    </footer>

    <script src="../js/nav.js"></script>
  </body>
</html>   