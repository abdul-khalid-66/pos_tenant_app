<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BizTrack - Complete Business Management Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .hero-gradient {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .testimonial-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }
    </style>
</head>
<body class="font-sans antialiased text-gray-800">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <i class="fas fa-chart-line text-indigo-600 text-2xl mr-2"></i>
                        <span class="text-xl font-bold text-gray-900">BizTrack</span>
                    </div>
                </div>
                <div class="hidden md:ml-6 md:flex md:items-center md:space-x-8">
                    <a href="#features" class="text-gray-900 hover:text-indigo-600 px-3 py-2">Features</a>
                    <a href="#how-it-works" class="text-gray-900 hover:text-indigo-600 px-3 py-2">How It Works</a>
                    <a href="#pricing" class="text-gray-900 hover:text-indigo-600 px-3 py-2">Pricing</a>
                    <a href="#testimonials" class="text-gray-900 hover:text-indigo-600 px-3 py-2">Success Stories</a>
                </div>
                <div class="flex items-center">
                    <a href="/register" class="ml-8 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-gradient text-white">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                    Transform Your Business Operations
                </h1>
                <p class="mt-6 max-w-lg mx-auto text-xl">
                    The all-in-one platform to manage inventory, sales, finances, and customer relationships in real-time.
                </p>
                <div class="mt-10">
                    <a href="/register" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-indigo-700 bg-white hover:bg-gray-50">
                        Start Your 14-Day Free Trial
                    </a>
                    <a href="#demo" class="ml-4 inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-500 bg-opacity-60 hover:bg-opacity-70">
                        Watch Demo
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Logo Cloud -->
    <section class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <p class="text-center text-sm font-semibold uppercase text-gray-500 tracking-wide">
                Trusted by businesses worldwide
            </p>
            <div class="mt-6 grid grid-cols-2 gap-8 md:grid-cols-6 lg:grid-cols-5">
                <div class="col-span-1 flex justify-center">
                    <img class="h-12" src="https://tailwindui.com/img/logos/tuple-logo-gray-400.svg" alt="Tuple">
                </div>
                <div class="col-span-1 flex justify-center">
                    <img class="h-12" src="https://tailwindui.com/img/logos/mirage-logo-gray-400.svg" alt="Mirage">
                </div>
                <div class="col-span-1 flex justify-center">
                    <img class="h-12" src="https://tailwindui.com/img/logos/statickit-logo-gray-400.svg" alt="StaticKit">
                </div>
                <div class="col-span-1 flex justify-center">
                    <img class="h-12" src="https://tailwindui.com/img/logos/transistor-logo-gray-400.svg" alt="Transistor">
                </div>
                <div class="col-span-1 flex justify-center">
                    <img class="h-12" src="https://tailwindui.com/img/logos/workcation-logo-gray-400.svg" alt="Workcation">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Features</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Everything You Need to Run Your Business
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    From inventory tracking to financial reporting, we've got you covered.
                </p>
            </div>

            <div class="mt-10">
                <div class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                    <!-- Feature 1 -->
                    <div class="feature-card relative transition duration-300 ease-in-out p-6 rounded-lg border border-gray-200">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                                <i class="fas fa-boxes text-white text-xl"></i>
                            </div>
                            <div class="ml-5">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Inventory Management</h3>
                            </div>
                        </div>
                        <div class="mt-4 text-gray-500">
                            <p>Track stock levels, set reorder points, and manage multiple warehouses with our powerful inventory system.</p>
                            <ul class="mt-4 space-y-2">
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Real-time stock tracking</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Barcode scanning support</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Low stock alerts</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="feature-card relative transition duration-300 ease-in-out p-6 rounded-lg border border-gray-200">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                                <i class="fas fa-cash-register text-white text-xl"></i>
                            </div>
                            <div class="ml-5">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Point of Sale</h3>
                            </div>
                        </div>
                        <div class="mt-4 text-gray-500">
                            <p>Process sales quickly with our intuitive POS system that works on any device.</p>
                            <ul class="mt-4 space-y-2">
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Customizable receipts</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Multiple payment methods</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Offline mode available</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="feature-card relative transition duration-300 ease-in-out p-6 rounded-lg border border-gray-200">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                                <i class="fas fa-chart-pie text-white text-xl"></i>
                            </div>
                            <div class="ml-5">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Financial Reporting</h3>
                            </div>
                        </div>
                        <div class="mt-4 text-gray-500">
                            <p>Get real-time insights into your business performance with beautiful dashboards.</p>
                            <ul class="mt-4 space-y-2">
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Profit & loss statements</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Tax reporting</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Custom report builder</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Feature 4 -->
                    <div class="feature-card relative transition duration-300 ease-in-out p-6 rounded-lg border border-gray-200">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                                <i class="fas fa-users text-white text-xl"></i>
                            </div>
                            <div class="ml-5">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Customer Management</h3>
                            </div>
                        </div>
                        <div class="mt-4 text-gray-500">
                            <p>Build better relationships with tools to track customer interactions and preferences.</p>
                            <ul class="mt-4 space-y-2">
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Customer purchase history</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Loyalty programs</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span>Marketing automation</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section id="how-it-works" class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">How It Works</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Get Started in Minutes
                </p>
            </div>

            <div class="mt-10">
                <div class="space-y-10 md:space-y-0 md:grid md:grid-cols-3 md:gap-x-8 md:gap-y-10">
                    <!-- Step 1 -->
                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                            <span class="text-xl font-bold">1</span>
                        </div>
                        <div class="ml-16">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Sign Up</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Create your account and set up your business profile in just a few minutes.
                            </p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                            <span class="text-xl font-bold">2</span>
                        </div>
                        <div class="ml-16">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Import Your Data</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Easily import your existing products, customers, and inventory using our templates.
                            </p>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                            <span class="text-xl font-bold">3</span>
                        </div>
                        <div class="ml-16">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Start Managing</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Begin tracking sales, managing inventory, and analyzing your business performance.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Demo Video -->
            <div id="demo" class="mt-16 bg-white shadow-xl rounded-lg overflow-hidden">
                <div class="aspect-w-16 aspect-h-9">
                    <div class="w-full h-96 bg-gray-200 flex items-center justify-center">
                        <div class="text-center">
                            <i class="fas fa-play-circle text-6xl text-indigo-600"></i>
                            <p class="mt-4 text-lg font-medium text-gray-900">Watch Our Product Demo</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section id="testimonials" class="py-12 bg-indigo-700 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-indigo-200 font-semibold tracking-wide uppercase">Success Stories</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight sm:text-4xl">
                    What Our Customers Say
                </p>
            </div>

            <div class="mt-10 grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                <!-- Testimonial 1 -->
                <div class="testimonial-card p-6 rounded-lg">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-12 w-12 rounded-full" src="https://randomuser.me/api/portraits/women/32.jpg" alt="">
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium">Sarah Johnson</h3>
                            <p class="text-indigo-200">Retail Store Owner</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-base text-indigo-100">
                            "BizTrack has transformed how we manage our inventory. We've reduced stockouts by 75% and can now make data-driven purchasing decisions."
                        </p>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="testimonial-card p-6 rounded-lg">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-12 w-12 rounded-full" src="https://randomuser.me/api/portraits/men/45.jpg" alt="">
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium">Michael Chen</h3>
                            <p class="text-indigo-200">Restaurant Chain Manager</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-base text-indigo-100">
                            "The POS system is incredibly intuitive. Our staff learned it in minutes, and we've cut checkout times by 30% across all locations."
                        </p>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="testimonial-card p-6 rounded-lg">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-12 w-12 rounded-full" src="https://randomuser.me/api/portraits/women/68.jpg" alt="">
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium">Priya Patel</h3>
                            <p class="text-indigo-200">Boutique Owner</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-base text-indigo-100">
                            "The customer management features helped us personalize our marketing. We've seen a 40% increase in repeat customers since switching to BizTrack."
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-indigo-700 rounded-lg shadow-xl overflow-hidden">
                <div class="px-6 py-12 sm:p-16">
                    <div class="md:flex md:items-center md:justify-between">
                        <div class="md:w-1/2">
                            <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                                Ready to transform your business?
                            </h2>
                            <p class="mt-3 max-w-3xl text-lg leading-6 text-indigo-200">
                                Join thousands of businesses that trust BizTrack to manage their operations.
                            </p>
                        </div>
                        <div class="mt-8 md:mt-0 md:ml-8">
                            <a href="/register" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-indigo-700 bg-white hover:bg-gray-50">
                                Start Your Free Trial
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Product</h3>
                    <ul class="mt-4 space-y-4">
                        <li><a href="#" class="text-base text-gray-300 hover:text-white">Features</a></li>
                        <li><a href="#" class="text-base text-gray-300 hover:text-white">Pricing</a></li>
                        <li><a href="#" class="text-base text-gray-300 hover:text-white">API</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Company</h3>
                    <ul class="mt-4 space-y-4">
                        <li><a href="#" class="text-base text-gray-300 hover:text-white">About</a></li>
                        <li><a href="#" class="text-base text-gray-300 hover:text-white">Blog</a></li>
                        <li><a href="#" class="text-base text-gray-300 hover:text-white">Careers</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Support</h3>
                    <ul class="mt-4 space-y-4">
                        <li><a href="#" class="text-base text-gray-300 hover:text-white">Help Center</a></li>
                        <li><a href="#" class="text-base text-gray-300 hover:text-white">Community</a></li>
                        <li><a href="#" class="text-base text-gray-300 hover:text-white">Contact Us</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Legal</h3>
                    <ul class="mt-4 space-y-4">
                        <li><a href="#" class="text-base text-gray-300 hover:text-white">Privacy</a></li>
                        <li><a href="#" class="text-base text-gray-300 hover:text-white">Terms</a></li>
                        <li><a href="#" class="text-base text-gray-300 hover:text-white">Cookie Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-8 border-t border-gray-700 pt-8 md:flex md:items-center md:justify-between">
                <div class="flex space-x-6 md:order-2">
                    <a href="#" class="text-gray-400 hover:text-gray-300">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-300">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-300">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-300">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
                <p class="mt-8 text-base text-gray-400 md:mt-0 md:order-1">
                    &copy; 2023 BizTrack. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>