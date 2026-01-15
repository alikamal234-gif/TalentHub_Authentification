<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>TalentHub | Home</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen flex flex-col">

  <!-- Navbar -->
  <nav class="flex items-center justify-between px-10 py-5 bg-gray-800 shadow-lg">
    <div class="flex items-center space-x-2">
      <svg width="36" height="36" viewBox="0 0 100 100" fill="none">
                    <rect width="100" height="100" rx="20" fill="url(#grad)"/>
                    <path d="M30 65V35H45V65H30ZM55 35H70V65H55V35Z" fill="white"/>
                    <defs>
                        <linearGradient id="grad" x1="0" y1="0" x2="100" y2="100">
                            <stop stop-color="#6366F1"/>
                            <stop offset="1" stop-color="#8B5CF6"/>
                        </linearGradient>
                    </defs>
                </svg>
      
      <span class="text-xl font-bold text-cyan-400">TalentHub</span>
    </div>
    <div class="space-x-4">
      <a href="login" class="px-4 py-2 rounded-lg border border-cyan-400 text-cyan-400 hover:bg-cyan-400 hover:text-gray-900 transition">
        Login
      </a>
      <a href="register" class="px-4 py-2 rounded-lg bg-cyan-400 text-gray-900 hover:bg-cyan-300 transition">
        Sign Up
      </a>
    </div>
  </nav>

  <!-- Hero Section -->
  <main class="flex-grow flex items-center justify-center">
    <div class="text-center max-w-2xl px-6">
      <h1 class="text-4xl md:text-5xl font-extrabold mb-4">
        Welcome to <span class="text-cyan-400">TalentHub</span>
      </h1>
      <p class="text-gray-300 mb-8">
        Connect talents with opportunities. Build your future, find the right job,
        or hire the best candidates all in one place.
      </p>

      <div class="flex justify-center space-x-4">
        <a href="login"
           class="px-6 py-3 rounded-xl border border-cyan-400 text-cyan-400 
                  hover:bg-cyan-400 hover:text-gray-900 transition">
          Login
        </a>
        <a href="register"
           class="px-6 py-3 rounded-xl bg-cyan-400 text-gray-900 
                  hover:bg-cyan-300 transition">
          Sign Up
        </a>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="text-center py-4 bg-gray-800 text-gray-400 text-sm">
    © 2026 TalentHub. All rights reserved.
  </footer>

</body>
</html>
<?php

