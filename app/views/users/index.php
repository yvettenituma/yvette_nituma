<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Directory</title>
  <link rel="stylesheet" href="<?=base_url();?>/public/style.css">
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    /* Background pattern overlay */
    body::before {
      content: "";
      position: fixed;
      inset: 0;
      background-image: radial-gradient(circle at 20px 20px, rgba(124, 58, 237, 0.05) 2%, transparent 0);
      background-size: 40px 40px;
      z-index: 0;
    }
    body {
      position: relative;
      z-index: 1;
    }

    /* Table row hover */
    table tbody tr {
      transition: all 0.2s ease-in-out;
    }
    table tbody tr:hover {
      background: #f5f3ff; /* purple-50 */
      transform: scale(1.01);
    }

    /* Buttons glow on hover */
    a.bg-purple-500:hover, a.bg-purple-600:hover, a.bg-purple-700:hover {
      box-shadow: 0 0 15px rgba(124, 58, 237, 0.4);
    }

    /* Pagination spacing */
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
      background-color: #7c3aed; /* purple-600 */
      color: white;
      border-radius: 0.5rem;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      text-decoration: none;
      font-weight: 500;
      transition: all 0.2s ease-in-out;
    }
    .pagination a:hover {
      background-color: #6d28d9; /* purple-700 */
      transform: translateY(-2px);
    }
    .pagination strong {
      display: inline-block;
      padding: 0.5rem 1rem;
      background-color: #5b21b6; /* purple-800 */
      color: white;
      border-radius: 0.5rem;
      font-weight: 600;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

        /* Wave divider with background photo */
    .wave-divider {
      position: relative;
      height: 120px;
      overflow: hidden;
      background-image: url('<?= base_url("public/images/cnm.jpg"); ?>');
      background-position: center;
      background-size: cover;
      background-repeat: no-repeat;
    }
    .wave-divider svg {
      position: absolute;
      bottom: 0;
      width: 100%;
      height: 100%;
    }

  </style>
</head>

<body class="bg-gradient-to-br from-purple-200 via-purple-100 to-purple-300 min-h-screen font-sans text-gray-800">

  <!-- Navbar -->
  <nav class="bg-gradient-to-r from-purple-700 to-purple-500 shadow-md relative z-10">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between">
      <a href="#" class="text-white font-semibold text-xl tracking-wide">User Management</a>
      <a href="<?=site_url('reg/logout');?>" class="text-white font-medium hover:underline">Logout</a>
    </div>
    <!-- Wave Divider with photo -->
    <div class="wave-divider">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 150">
        <path fill="#ede9fe" fill-opacity="1" d="M0,64L48,80C96,96,192,128,288,133.3C384,139,480,117,576,117.3C672,117,768,139,864,138.7C960,139,1056,117,1152,128C1248,139,1344,181,1392,202.7L1440,224L1440,0L0,0Z"></path>
      </svg>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="max-w-6xl mx-auto mt-10 px-4 relative z-10">
    <div class="bg-white bg-opacity-90 backdrop-blur-sm shadow-2xl rounded-2xl p-6 transition-transform duration-300 hover:shadow-purple-300/50">

      <!-- Logged In User Display -->
      <?php if(!empty($logged_in_user)): ?>
        <div class="mb-6 bg-purple-100 text-purple-800 px-4 py-3 rounded-lg shadow">
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
        <h1 class="text-2xl font-semibold text-purple-700">User Directory</h1>

        <!-- Search Bar -->
        <form method="get" action="<?=site_url('users');?>" class="flex">
          <input 
            type="text" 
            name="q" 
            value="<?=html_escape($_GET['q'] ?? '')?>" 
            placeholder="Search user..." 
            class="w-full border border-purple-200 bg-purple-50 rounded-l-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400 text-gray-800">
          <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white px-4 rounded-r-xl transition">
            🔍
          </button>
        </form>
      </div>
      
      <!-- Table -->
      <div class="overflow-x-auto rounded-xl border border-purple-200 shadow-md">
        <table class="w-full text-center border-collapse">
          <thead>
            <tr class="bg-gradient-to-r from-purple-700 to-purple-500 text-white">
              <th class="py-3 px-4">ID</th>
              <th class="py-3 px-4">Username</th>
              <th class="py-3 px-4">Email</th>
              <th class="py-3 px-4">Role</th>
              <th class="py-3 px-4">Action</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100">
            <?php foreach(html_escape($users) as $user): ?>
              <tr class="hover:bg-purple-50 transition duration-200">
                <td class="py-3 px-4"><?=($user['ID']);?></td>
                <td class="py-3 px-4"><?=($user['Username']);?></td>
                <td class="py-3 px-4">
                  <span class="bg-purple-100 text-purple-700 text-sm font-medium px-3 py-1 rounded-full">
                    <?=($user['Email']);?>
                  </span>
                </td>
                <td class="py-3 px-4 font-medium"><?=($user['role']);?></td>
                <td class="py-3 px-4 space-x-3">
                  <?php if($logged_in_user['role'] === 'admin' || $logged_in_user['id'] == $user['ID']): ?>
                    <a href="<?=site_url('users/update/'.$user['ID']);?>"
                       class="px-4 py-2 text-sm font-medium rounded-lg bg-purple-500 text-white hover:bg-purple-600 transition duration-200 shadow">
                      Update
                    </a>
                  <?php endif; ?>

                  <?php if($logged_in_user['role'] === 'admin'): ?>
                    <a href="<?=site_url('users/delete/'.$user['ID']);?>"
                       onclick="return confirm('Are you sure you want to delete this record?');"
                       class="px-4 py-2 text-sm font-medium rounded-lg bg-purple-700 text-white hover:bg-purple-800 transition duration-200 shadow">
                      Delete
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
           class="inline-block bg-purple-600 hover:bg-purple-700 text-white font-medium px-6 py-3 rounded-lg shadow-md transition duration-200">
          ➕ Create New User
        </a>
      </div>
    </div>
  </div>

</body>
</html>
