<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Team Members</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-pink-200 via-pink-100 to-pink-300 font-sans text-gray-800 min-h-screen">

  <!-- Navbar -->
  <nav class="bg-white bg-opacity-80 backdrop-blur-md shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <a href="#" class="font-semibold text-xl tracking-wide text-pink-600">🌸 Team Management</a>
      
      <!-- Search -->
      <form action="<?= site_url('users'); ?>" method="get" class="flex space-x-2">
        <?php 
          $q = '';
          if(isset($_GET['q'])) {
            $q = $_GET['q'];
          }
        ?>
        <input type="text" 
               name="q" 
               placeholder="Search..." 
               value="<?= html_escape($q); ?>" 
               class="px-3 py-2 rounded-lg border border-pink-300 focus:ring-2 focus:ring-pink-400 focus:outline-none text-sm w-48">
        <button type="submit" 
                class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-lg text-sm shadow transition">
          🔍 Search
        </button>
      </form>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="max-w-6xl mx-auto mt-10 px-4">
    <div class="bg-white bg-opacity-90 backdrop-blur-sm shadow-lg rounded-2xl p-6">
      <!-- Header -->
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-pink-600">🌷 Team Members</h1>
      </div>

      <!-- Table -->
      <div class="overflow-x-auto rounded-xl">
        <table class="w-full table-auto border-collapse text-left">
          <thead>
            <tr class="bg-pink-100 text-pink-700 uppercase text-sm tracking-wide">
              <th class="py-3 px-4">ID</th>
              <th class="py-3 px-4">Last Name</th>
              <th class="py-3 px-4">First Name</th>
              <th class="py-3 px-4">Email</th>
              <th class="py-3 px-4">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if(!empty($users)): ?>
              <?php foreach($users as $user): ?>
                <tr class="bg-pink-50 hover:bg-pink-200 transition duration-200 rounded-lg">
                  <td class="py-3 px-4"><?= html_escape($user['id']); ?></td>
                  <td class="py-3 px-4 font-medium"><?= html_escape($user['last_name']); ?></td>
                  <td class="py-3 px-4 font-medium"><?= html_escape($user['first_name']); ?></td>
                  <td class="py-3 px-4">
                    <span class="bg-pink-100 text-pink-700 text-sm font-medium px-3 py-1 rounded-full">
                      <?= html_escape($user['email']); ?>
                    </span>
                  </td>
                  <td class="py-3 px-4 space-x-3">
                    <a href="<?= site_url('users/update/'.$user['id']); ?>" 
                       class="text-pink-600 hover:text-pink-500 transition duration-150 font-medium">Edit</a>
                    <a href="<?= site_url('users/delete/'.$user['id']); ?>"
                       onclick="return confirm('Are you sure you want to delete this record?');"
                       class="text-red-500 hover:text-red-400 transition duration-150 font-medium">Delete</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="5" class="text-center py-6 text-gray-500">
                  🌸 No team members found.
                </td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="mt-6">
        <?= $page; ?>
      </div>

      <!-- Button -->
      <div class="mt-6 text-right">
        <a href="<?= site_url('users/create'); ?>"
           class="inline-block bg-pink-200 hover:bg-pink-300 text-pink-700 font-medium px-6 py-2 rounded-lg shadow-md transition duration-200">
          ➕ Add New Member
        </a>
      </div>
    </div>
  </div>

</body>
</html>
