<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update User</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-purple-200 via-purple-100 to-purple-300 min-h-screen flex items-center justify-center font-sans text-gray-800">

  <div class="relative bg-white/20 backdrop-blur-lg p-8 rounded-2xl shadow-xl w-full max-w-md animate-fadeIn border border-purple-300/40">
    <!-- Decorative Gradient Blobs -->
    <div class="absolute -top-10 -left-10 w-32 h-32 bg-purple-400/40 rounded-full blur-2xl"></div>
    <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-purple-600/40 rounded-full blur-3xl"></div>

    <h2 class="text-2xl font-semibold text-center text-purple-700 mb-6">📝 Update User</h2>

    <form action="<?=site_url('users/update/'.$user['ID'])?>" method="POST" class="space-y-4 relative z-10">
      <!-- Username -->
      <div>
        <label class="block text-purple-700 mb-1">Username</label>
        <input type="text" name="username" value="<?= html_escape($user['Username'])?>" required
               class="w-full px-4 py-3 border border-purple-200 bg-purple-50 rounded-xl focus:ring-2 focus:ring-purple-400 focus:outline-none text-gray-800">
      </div>

      <!-- Email -->
      <div>
        <label class="block text-purple-700 mb-1">Email Address</label>
        <input type="email" name="email" value="<?= html_escape($user['Email'])?>" required
               class="w-full px-4 py-3 border border-purple-200 bg-purple-50 rounded-xl focus:ring-2 focus:ring-purple-400 focus:outline-none text-gray-800">
      </div>

      <?php if(!empty($logged_in_user) && $logged_in_user['role'] === 'admin'): ?>
        <!-- Role Dropdown -->
        <div>
          <label class="block text-purple-700 mb-1">Role</label>
          <select name="role" required
                  class="w-full px-4 py-3 border border-purple-200 bg-purple-50 rounded-xl focus:ring-2 focus:ring-purple-400 focus:outline-none text-gray-800">
            <option value="user" <?= $user['role'] === 'user' ? 'selected' : ''; ?>>User</option>
            <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
          </select>
        </div>

        <!-- Password -->
        <div class="relative">
          <label class="block text-purple-700 mb-1">Password</label>
          <input type="password" name="password" id="password"
                 placeholder="Leave blank to keep current password"
                 class="w-full px-4 py-3 border border-purple-200 bg-purple-50 rounded-xl focus:ring-2 focus:ring-purple-400 focus:outline-none text-gray-800">
          <i class="fa-solid fa-eye absolute right-4 top-1/2 -translate-y-1/2 cursor-pointer text-purple-600" id="togglePassword"></i>
        </div>
      <?php endif; ?>

      <!-- Submit -->
      <button type="submit"
              class="w-full bg-purple-500 hover:bg-purple-600 text-white font-medium py-3 rounded-xl shadow-md transition duration-200">
        Update User
      </button>
    </form>

    <!-- Return -->
    <a href="<?=site_url('/users');?>" class="mt-4 block text-center bg-purple-300 hover:bg-purple-400 text-white py-2 rounded-xl shadow transition relative z-10">
      ⬅ Return to Home
    </a>
  </div>

  <!-- Password Toggle Script -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const togglePassword = document.getElementById('togglePassword');
      const password = document.getElementById('password');

      if (togglePassword && password) {
        togglePassword.addEventListener('click', function() {
          const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
          password.setAttribute('type', type);
          this.classList.toggle('fa-eye');
          this.classList.toggle('fa-eye-slash');
        });
      }
    });
  </script>

  <!-- Animation -->
  <style>
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeIn { animation: fadeIn 0.8s ease; }
  </style>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
</body>
</html>
