<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Record</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-pink-200 via-pink-100 to-pink-300 min-h-screen flex items-center justify-center font-sans text-gray-800">

  <div class="bg-white bg-opacity-90 backdrop-blur-sm p-8 rounded-2xl shadow-2xl w-full max-w-md animate-fadeIn">
    <h2 class="text-2xl font-semibold text-center text-pink-600 mb-6">📝 Update Record</h2>

    <form action="<?=site_url('users/update/'.$user['id'])?>" method="POST" class="space-y-4">
      <!-- First Name -->
      <div>
        <label class="block text-pink-600 mb-1">First Name</label>
        <input type="text" name="first_name" value="<?= html_escape($user['first_name'])?>" required
               class="w-full px-4 py-3 border border-pink-200 bg-pink-50 rounded-xl focus:ring-2 focus:ring-pink-300 focus:outline-none text-gray-800">
      </div>

      <!-- Last Name -->
      <div>
        <label class="block text-pink-600 mb-1">Last Name</label>
        <input type="text" name="last_name" value="<?= html_escape($user['last_name'])?>" required
               class="w-full px-4 py-3 border border-pink-200 bg-pink-50 rounded-xl focus:ring-2 focus:ring-pink-300 focus:outline-none text-gray-800">
      </div>

      <!-- Email -->
      <div>
        <label class="block text-pink-600 mb-1">Email Address</label>
        <input type="email" name="email" value="<?= html_escape($user['email'])?>" required
               class="w-full px-4 py-3 border border-pink-200 bg-pink-50 rounded-xl focus:ring-2 focus:ring-pink-300 focus:outline-none text-gray-800">
      </div>

      <!-- Button -->
      <button type="submit"
              class="w-full bg-pink-200 hover:bg-pink-300 text-pink-700 font-medium py-3 rounded-xl shadow-md transition duration-200">
        Update
      </button>
    </form>
  </div>

  <!-- Small fade-in animation -->
  <style>
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeIn {
      animation: fadeIn 0.8s ease;
    }
  </style>
</body>
</html>
