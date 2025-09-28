<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>USER DIRECTORY</title>
  <link rel="stylesheet" href="<?=base_url();?>/public/style.css">
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    body::before {
      content: "";
      position: fixed;
      inset: 0;
      background-image: radial-gradient(circle at 20px 20px, rgba(0,0,0,0.05) 2%, transparent 0);
      background-size: 40px 40px;
      z-index: 0;
    }
    body {
      position: relative;
      z-index: 1;
      background: linear-gradient(to bottom right, #1e0226, #3b0a3b, #5c0f5c); /* purple to black gradient */
      color: #f3e8ff;
    }

    table tbody tr {
      transition: all 0.2s ease-in-out;
    }
    table tbody tr:hover {
      background: #7c3aed; /* medium purple */
      transform: scale(1.01);
      color: #fff;
    }

    a.bg-purple-700:hover {
      background-color: #5b21b6 !important; /* darker purple */
      box-shadow: 0 0 15px rgba(91, 33, 182, 0.6);
    }
    a.bg-black:hover {
      background-color: #2d0338 !important; /* dark purple/black */
      box-shadow: 0 0 15px rgba(45, 3, 56, 0.6);
    }

    .pagination a {
      display: inline-block;
      padding: 0.5rem 1rem;
      background-color: #7c3aed; /* purple-700 */
      color: white;
      border-radius: 0.5rem;
      box-shadow: 0 2px 4px rgba(0,0,0,0.2);
      text-decoration: none;
      font-weight: 500;
      transition: all 0.2s ease-in-out;
    }
    .pagination a:hover {
      background-color: #5b21b6; /* darker purple */
      transform: translateY(-2px);
    }
    .pagination strong {
      display: inline-block;
      padding: 0.5rem 1rem;
      background-color: #111827; /* black */
      color: white;
      border-radius: 0.5rem;
      font-weight: 600;
      box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }

    input:focus {
      outline: none;
      ring: none;
      box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.4); /* purple glow */
    }

    table thead tr {
      background: linear-gradient(to right, #111827, #7c3aed);
      color: white;
    }

    td, th {
      padding: 0.75rem 1rem;
    }
  </style>
</head>

<body class="min-h-screen font-sans">

  <nav class="bg-gradient-to-r from-black to-purple-800 shadow-md relative z-10">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between">
      <a href="#" class="text-white font-semibold text-xl tracking-wide">USER MANAGEMENT</a>
      <a href="<?=site_url('reg/logout');?>" class="text-white font-medium hover:text-purple-300 transition">Logout</a>
    </div>
  </nav>

  <div class="max-w-6xl mx-auto mt-10 px-4 relative z-10">
    <div class="bg-black bg-opacity-80 backdrop-blur-sm shadow-2xl rounded-2xl p-6 transition-transform duration-300 hover:shadow-purple-700/50">

      <?php if(!empty($logged_in_user)): ?>
        <div class="mb-6 bg-purple-700 text-white px-4 py-3 rounded-lg shadow">
          <strong>Welcome:</strong> 
          <span class="font-medium block"><?= html_escape($logged_in_user['username']); ?></span>
          <span class="text-sm">Role: <span class="font-semibold"><?= html_escape($logged_in_user['role']); ?></span></span>
        </div>
      <?php else: ?>
        <div class="mb-6 bg-red-700 text-white px-4 py-3 rounded-lg shadow">
          Logged in user not found
        </div>
      <?php endif; ?>

      <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">👥 USER DIRECTORY</h1>

        <form method="get" action="<?=site_url('users');?>" class="flex">
          <input 
            type="text" 
            name="q" 
            value="<?=html_escape($_GET['q'] ?? '')?>" 
            placeholder="Search user..." 
            class="w-full border border-purple-700 bg-purple-900 rounded-l-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 text-white">
          <button type="submit" class="bg-purple-700 hover:bg-purple-800 text-white px-4 rounded-r-xl transition">
            🔍
          </button>
        </form>
      </div>
      
      <div class="overflow-x-auto rounded-xl border border-purple-700 shadow-md">
        <table class="w-full text-center border-collapse">
          <thead>
            <tr>
              <th>ID</th>
              <th>Username</th>
              <th>Email</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-purple-700">
            <?php foreach(html_escape($users) as $user): ?>
              <tr>
                <td><?=($user['ID']);?></td>
                <td><?=($user['Username']);?></td>
                <td>
                  <span class="bg-purple-700 text-white text-sm font-medium px-3 py-1 rounded-full">
                    <?=($user['Email']);?>
                  </span>
                </td>
                <td class="font-medium"><?=($user['role']);?></td>
                <td class="space-x-3">
                  <?php if($logged_in_user['role'] === 'admin' || $logged_in_user['id'] == $user['ID']): ?>
                    <a href="<?=site_url('users/update/'.$user['ID']);?>"
                       class="px-4 py-2 text-sm font-medium rounded-lg bg-purple-700 text-white hover:bg-purple-800 transition shadow">
                      Update
                    </a>
                  <?php endif; ?>

                  <?php if($logged_in_user['role'] === 'admin'): ?>
                    <a href="<?=site_url('users/delete/'.$user['ID']);?>"
                       onclick="return confirm('Are you sure you want to delete this record?');"
                       class="px-4 py-2 text-sm font-medium rounded-lg bg-black text-white hover:bg-purple-900 transition shadow">
                      Delete
                    </a>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <div class="mt-6 flex justify-center">
        <div class="pagination">
          <?= $page; ?>
        </div>
      </div>

      <div class="mt-6 text-center">
        <a href="<?=site_url('users/create')?>"
           class="inline-block bg-purple-700 hover:bg-purple-800 text-white font-medium px-6 py-3 rounded-lg shadow-md transition duration-200">
          Create New User
        </a>
      </div>
    </div>
  </div>

</body>
</html>
