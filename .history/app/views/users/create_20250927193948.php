<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Create User</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-pink-200 via-pink-100 to-pink-300 min-h-screen flex items-center justify-center font-sans text-gray-800">

  <div class="bg-white bg-opacity-80 backdrop-blur-md p-8 rounded-2xl shadow-2xl w-full max-w-md animate-fadeIn">
    <h1 class="text-2xl font-semibold text-center text-pink-600 mb-6">Create User</h1>

    <form id="user-form" action="<?=site_url('users/create/')?>" method="POST" class="space-y-4">
      <div>
        <input type="text" name="username" placeholder="Username" required
               value="<?= isset($username) ? html_escape($username) : '' ?>"
               class="w-full px-4 py-3 border border-pink-200 bg-pink-50 rounded-xl focus:ring-2 focus:ring-pink-300 focus:outline-none text-gray-800">
      </div>
      <div>
        <input type="email" name="email" placeholder="Email" required
               value="<?= isset($email) ? html_escape($email) : '' ?>"
               class="w-full px-4 py-3 border border-pink-200 bg-pink-50 rounded-xl focus:ring-2 focus:ring-pink-300 focus:outline-none text-gray-800">
      </div>
      <button type="submit"
              class="w-full bg-pink-300 hover:bg-pink-400 text-pink-800 font-medium py-3 rounded-xl shadow-md transition duration-200">
        Create User
      </button>
    </form>

    <div class="text-center mt-6">
      <a href="<?=site_url('/users'); ?>" class="inline-block bg-pink-500 hover:bg-pink-600 text-white py-2 px-4 rounded-xl shadow-md transition duration-200">
        Return to Home
      </a>
    </div>
  </div>

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
