<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Directory</title>
  <link rel="stylesheet" href="<?=base_url();?>/public/style.css">
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    .pagination {
      display: flex;
      gap: 0.5rem;
      flex-wrap: wrap;
      justify-content: center;
      margin-top: 1.5rem;
    }
    .pagination a {
      display: inline-block;
      padding: 0.5rem 1rem;
      background-color: #ec4899;
      color: white;
      border-radius: 0.5rem;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      text-decoration: none;
      font-weight: 500;
      transition: background-color 0.2s ease-in-out;
    }
    .pagination a:hover {
      background-color: #db2777;
    }
    .pagination strong {
      display: inline-block;
      padding: 0.5rem 1rem;
      background-color: #be185d;
      color: white;
      border-radius: 0.5rem;
      font-weight: 600;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
  </style>
</head>

<body class="bg-gradient-to-br from-pink-200 via-pink-100 to-pink-300 min-h-screen font-sans text-gray-800">

  <!-- Navbar -->
  <nav class="bg-gradient-to-r from-pink-600 to-pink-400 shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between">
      <a href="#" class="text-white font-semibold text-xl tracking-wide">📊 User Management</a>
      <a href="<?=site_url('reg/logout');?>" class="text-white font-medium hover:underline">Logout</a>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="max-w-6xl mx-auto mt-10 px-4">
    <div class="bg-white bg-opacity-90 backdrop-blur-sm shadow-xl rounded-2xl p-6">

      <!-- Logged In User Display -->
      <?php if(!empty($logged_in_user)): ?>
        <div class="mb-6 bg-pink-100 text-pink-800 px-4 py-3 rounded-lg shadow">
          <strong>Welcome:</strong> 
          <span class="font-medium"><?= html_escape($logged_in_user['username']); ?></span> 
          (Role: <span class="font-semibold"><?= html_escape($logged_in_user['role']); ?></span>)
        </div>
      <?php else: ?>
        <div class="mb-6 bg-red-100 text-red-700 px-4 py-3 rounded-lg shadow">
          Logged in user not found
        </div>
      <?php endif; ?>

      <!-- Header -->
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-pink-600">👥 User Directory</h1>

        <!-- Search Bar -->
        <form method="get" action="<?=site_url('users');?>" class="flex">
          <input 
            type="text" 
            name="q" 
            value="<?=html_escape($_GET['q'] ?? '')?>" 
            placeholder="Search user..." 
            class="w-full border border-pink-200 bg-pink-50 rounded-l-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-300 text-gray-800">
          <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white px-4 rounded-r-xl transition">
            🔍
          </button>
        </form>
      </div>
      
      <!-- Table -->
      <div class="overflow-x-auto rounded-xl border border-pink-200">
        <table class="w-full text-center border-collapse">
          <thead>
            <tr class="bg-gradient-to-r from-pink-600 to-pink-400 text-white">
              <th class="py-3 px-4">ID</th>
              <th class="py-3 px-4">Username</th>
              <th class="py-3 px-4">Email</th>
              <th class="py-3 px-4">Role</th>
              <th class="py-3 px-4">Action</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100">
            <?php foreach(html_escape($users) as $user): ?>
              <tr class="hover:bg-pink-50 transition duration-200">
                <td class="py-3 px-4"><?=($user['id']);?></td>
                <td class="py-3 px-4"><?=($user['username']);?></td>
                <td class="py-3 px-4">
                  <span class="bg-pink-100 text-pink-700 text-sm font-medium px-3 py-1 rounded-full">
                    <?=($user['email']);?>
                  </span>
                </td>
                <td class="py-3 px-4 font-medium"><?=($user['role']);?></td>
                <td class="py-3 px-4 space-x-3">
                  <?php if($logged_in_user['role'] === 'admin' || $logged_in_user['id'] == $user['id']): ?>
                    <a href="<?=site_url('users/update/'.$user['id']);?>"
                       class="px-4 py-2 text-sm font-medium rounded-lg bg-pink-400 text-white hover:bg-pink-500 transition duration-200 shadow">
                      ✏️ Update
                    </a>
                  <?php endif; ?>

                  <?php if($logged_in_user['role'] === 'admin'): ?>
                    <a href="<?=site_url('users/delete/'.$user['id']);?>"
                       onclick="return confirm('Are you sure you want to delete this record?');"
                       class="px-4 py-2 text-sm font-medium rounded-lg bg-pink-600 text-white hover:bg-pink-700 transition duration-200 shadow">
                      🗑️ Delete
                    </a>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="mt-6 flex justify-center">
        <div class="pagination">
          <?= $page; ?>
        </div>
      </div>

      <!-- Create New User -->
      <div class="mt-6 text-center">
        <a href="<?=site_url('users/create')?>"
           class="inline-block bg-pink-500 hover:bg-pink-600 text-white font-medium px-6 py-3 rounded-lg shadow-md transition duration-200">
          ➕ Create New User
        </a>
      </div>
    </div>
  </div>

</body>
</html>
