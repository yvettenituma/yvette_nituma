<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-tr from-purple-100 via-purple-200 to-purple-300 min-h-screen flex items-center justify-center font-sans text-gray-800">

  <div class="relative bg-gradient-to-br from-purple-50 to-purple-100 p-8 rounded-2xl shadow-2xl w-full max-w-md animate-fadeIn overflow-hidden border border-purple-200">
    <!-- Pattern Overlay -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_1px_1px,rgba(139,92,246,0.15)_1px,transparent_0)] [background-size:20px_20px]"></div>

    <!-- Glow effect -->
    <div class="absolute -top-8 -right-8 w-32 h-32 bg-purple-400/30 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-8 -left-8 w-40 h-40 bg-purple-600/20 rounded-full blur-2xl"></div>

    <h2 class="text-2xl font-semibold text-purple-700 text-center mb-6 relative z-10">📝 Register</h2>

    <form action="<?=site_url('auth/register')?>" method="POST" class="space-y-4 relative z-10">
      <!-- Username -->
      <div>
        <label class="block text-purple-700 mb-1">Username</label>
        <input type="text" name="username" required
               class="w-full px-4 py-3 border border-purple-200 bg-purple-50 rounded-xl focus:ring-2 focus:ring-purple-400 focus:outline-none text-gray-800">
      </div>

      <!-- Email -->
      <div>
        <label class="block text-purple-700 mb-1">Email Address</label>
        <input type="email" name="email" required
               class="w-full px-4 py-3 border border-purple-200 bg-purple-50 rounded-xl focus:ring-2 focus:ring-purple-400 focus:outline-none text-gray-800">
      </div>

      <!-- Password -->
      <div>
        <label class="block text-purple-700 mb-1">Password</label>
        <input type="password" name="password" required
               class="w-full px-4 py-3 border border-purple-200 bg-purple-50 rounded-xl focus:ring-2 focus:ring-purple-400 focus:outline-none text-gray-800">
      </div>

      <!-- Confirm Password -->
      <div>
        <label class="block text-purple-700 mb-1">Confirm Password</label>
        <input type="password" name="confirm_password" required
               class="w-full px-4 py-3 border border-purple-200 bg-purple-50 rounded-xl focus:ring-2 focus:ring-purple-400 focus:outline-none text-gray-800">
      </div>

      <!-- Submit -->
      <button type="submit"
              class="w-full bg-purple-500 hover:bg-purple-600 text-white font-medium py-3 rounded-xl shadow-md transition duration-200">
        Register
      </button>
    </form>

    <!-- Back to Login -->
    <a href="<?=site_url('/login');?>" class="mt-4 block text-center bg-purple-300 hover:bg-purple-400 text-white py-2 rounded-xl shadow transition relative z-10">
      🔐 Back to Login
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
