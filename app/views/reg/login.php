<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-purple-200 via-purple-100 to-purple-300 min-h-screen flex items-center justify-center font-sans">

  <div class="bg-white bg-opacity-90 backdrop-blur-sm shadow-xl rounded-2xl p-8 w-full max-w-md">
    <h2 class="text-2xl font-bold text-center text-purple-700 mb-6">🔑 Login</h2>

    <?php if(!empty($error)): ?>
      <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
        <?= $error; ?>
      </div>
    <?php endif; ?>

    <form method="post" action="<?=site_url('reg/login');?>" class="space-y-4">
      <div>
        <label class="block text-purple-700 font-medium mb-1">Username</label>
        <input type="text" name="username" required
               class="w-full border border-purple-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400">
      </div>
      <div>
        <label class="block text-purple-700 font-medium mb-1">Password</label>
        <input type="password" name="password" required
               class="w-full border border-purple-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400">
      </div>

      <button type="submit" 
              class="w-full bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 rounded-lg shadow transition">
        🚀 Login
      </button>
    </form>

    <p class="text-center text-sm text-gray-600 mt-4">
      Don’t have an account? 
      <a href="<?=site_url('reg/register');?>" class="text-purple-600 hover:underline font-medium">Register</a>
    </p>
  </div>

</body>
</html>
