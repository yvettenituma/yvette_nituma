<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update User</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-purple-200 via-purple-100 to-purple-300 min-h-screen flex items-center justify-center font-sans">

  <div class="bg-white bg-opacity-90 backdrop-blur-sm shadow-xl rounded-2xl p-8 w-full max-w-lg">
    <h2 class="text-2xl font-bold text-center text-purple-700 mb-6">✏️ Update User</h2>

    <form method="post" action="<?=site_url('users/update/'.$user['ID']);?>" class="space-y-4">
      <div>
        <label class="block text-purple-700 font-medium mb-1">Username</label>
        <input type="text" name="username" value="<?=html_escape($user['Username']);?>" required
               class="w-full border border-purple-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400">
      </div>
      <div>
        <label class="block text-purple-700 font-medium mb-1">Email</label>
        <input type="email" name="email" value="<?=html_escape($user['Email']);?>" required
               class="w-full border border-purple-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400">
      </div>

      <?php if($logged_in_user['role'] === 'admin'): ?>
        <div>
          <label class="block text-purple-700 font-medium mb-1">Role</label>
          <select name="role" class="w-full border border-purple-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400">
            <option value="user" <?= $user['role']=='user'?'selected':''; ?>>User</option>
            <option value="admin" <?= $user['role']=='admin'?'selected':''; ?>>Admin</option>
          </select>
        </div>
        <div>
          <label class="block text-purple-700 font-medium mb-1">Password (leave blank to keep)</label>
          <input type="password" name="password"
                 class="w-full border border-purple-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400">
        </div>
      <?php endif; ?>

      <div class="flex justify-between items-center">
        <a href="<?=site_url('users');?>" class="text-sm text-gray-600 hover:underline">← Back</a>
        <button type="submit" 
                class="bg-purple-600 hover:bg-purple-700 text-white font-medium px-6 py-2 rounded-lg shadow transition">
          💾 Save Changes
        </button>
      </div>
    </form>
  </div>

</body>
</html>
