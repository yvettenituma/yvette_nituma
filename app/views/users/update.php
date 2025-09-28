<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update User</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-purple-900 via-purple-800 to-black min-h-screen flex items-center justify-center font-sans text-gray-100">

  <div class="bg-black bg-opacity-80 backdrop-blur-sm p-8 rounded-2xl shadow-2xl w-full max-w-md animate-fadeIn">
    <h2 class="text-2xl font-semibold text-center text-purple-300 mb-6">Update User</h2>

    <form action="<?=site_url('users/update/'.$user['ID'])?>" method="POST" class="space-y-4">
      
      <!-- Username -->
      <div>
        <label class="block text-purple-300 mb-1">Username</label>
        <input type="text" name="username" value="<?= html_escape($user['Username'])?>" required
               class="w-full px-4 py-3 border border-purple-700 bg-purple-900 rounded-xl focus:ring-2 focus:ring-purple-400 focus:outline-none text-gray-100 placeholder-purple-400">
      </div>

      <!-- Email -->
      <div>
        <label class="block text-purple-300 mb-1">Email Address</label>
        <input type="email" name="email" value="<?= html_escape($user['Email'])?>" required
               class="w-full px-4 py-3 border border-purple-700 bg-purple-900 rounded-xl focus:ring-2 focus:ring-purple-400 focus:outline-none text-gray-100 placeholder-purple-400">
      </div>

      <?php if(!empty($logged_in_user) && $logged_in_user['role'] === 'admin'): ?>
        <!-- Role Dropdown for Admins -->
        <div>
          <label class="block text-purple-300 mb-1">Role</label>
          <select name="role" required
                  class="w-full px-4 py-3 border border-purple-700 bg-purple-900 rounded-xl focus:ring-2 focus:ring-purple-400 focus:outline-none text-gray-100">
            <option value="user" <?= $user['role'] === 'user' ? 'selected' : ''; ?>>User</option>
            <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
          </select>
        </div>

        <!-- Password Field for Admins -->
        <div class="relative">
          <label class="block text-purple-300 mb-1">Password</label>
          <input type="password" name="password" id="password"
                 placeholder="Leave blank to keep current password"
                 class="w-full px-4 py-3 border border-purple-700 bg-purple-900 rounded-xl focus:ring-2 focus:ring-purple-400 focus:outline-none text-gray-100 placeholder-purple-400">
          <i class="fa-solid fa-eye absolute right-4 top-1/2 -translate-y-1/2 cursor-pointer text-purple-400" id="togglePassword"></i>
        </div>
      <?php endif; ?>

      <!-- Submit Button -->
      <button type="submit"
              class="w-full bg-purple-700 hover:bg-purple-500 text-white font-medium py-3 rounded-xl shadow-md transition duration-200">
        Update User
      </button>
    </form>

    <!-- Return Button -->
    <a href="<?=site_url('/users');?>" class="mt-4 block text-center bg-purple-600 hover:bg-purple-400 text-white py-2 rounded-xl shadow transition duration-200">
      Return
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

  <!-- Fade-in animation -->
  <style>
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeIn {
      animation: fadeIn 0.8s ease;
    }
  </style>

  <!-- FontAwesome for the eye icon -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
</body>
</html>
