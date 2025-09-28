<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-purple-100 via-purple-200 to-purple-300 min-h-screen flex items-center justify-center font-sans text-gray-800">

  <div class="relative bg-purple-50/90 p-8 rounded-2xl shadow-2xl w-full max-w-md animate-fadeIn overflow-hidden">
    <!-- Floating Shapes -->
    <div class="absolute -top-6 left-6 w-20 h-20 bg-purple-400/30 rotate-12 rounded-xl blur-lg"></div>
    <div class="absolute bottom-6 right-6 w-28 h-28 bg-purple-600/20 rounded-full blur-xl"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-40 h-40 bg-purple-300/10 rounded-full blur-2xl"></div>

    <h2 class="text-2xl font-semibold text-purple-700 text-center mb-6 relative z-10">🔐 Login</h2>

    <form action="<?=site_url('auth/login')?>" method="POST" class="space-y-4 relative z-10">
      <div>
        <label class="block text-purple-700 mb-1">Username</label>
        <input type="text" name="username" required
               class="w-full px-4 py-3 border border-purple-200 bg-purple-50 rounded-xl focus:ring-2 focus:ring-purple-400 focus:outline-none">
      </div>
      <div>
        <label class="block text-purple-700 mb-1">Password</label>
        <input type="password" name="password" required
               class="w-full px-4 py-3 border border-purple-200 bg-purple-50 rounded-xl focus:ring-2 focus:ring-purple-400 focus:outline-none">
      </div>
      <button type="submit"
              class="w-full bg-purple-500 hover:bg-purple-600 text-white font-medium py-3 rounded-xl shadow-md transition duration-200">
        Login
      </button>
    </form>

    <a href="<?=site_url('/register');?>" class="mt-4 block text-center bg-purple-300 hover:bg-purple-400 text-white py-2 rounded-xl shadow transition relative z-10">
      📝 Register Here
    </a>
  </div>

  <!-- Animation -->
  <style>
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeIn { animation: fadeIn 0.8s ease; }
  </style>
</body>
</html>
