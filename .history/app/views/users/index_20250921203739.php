<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Directory</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Pagination styles */
    .pagination a {
      display: inline-block;
      padding: 0.5rem 1rem;
      background-color: #2563eb; /* blue-600 */
      color: white;
      font-weight: 500;
      border-radius: 0.375rem; /* rounded-md */
      transition: background-color 0.2s ease-in-out;
    }
    .pagination a:hover {
      background-color: #1d4ed8; /* blue-700 */
    }
    .pagination strong {
      display: inline-block;
      padding: 0.5rem 1rem;
      background-color: #1e40af; /* blue-800 */
      color: white;
      font-weight: 600;
      border-radius: 0.375rem;
    }
  </style>
</head>
<body class="bg-gradient-to-r from-pink-300 via-purple-300 to-indigo-400 min-h-screen flex items-center justify-center">

  <div class="w-4/5 bg-white shadow-lg rounded-lg p-6">
    <h1 class="text-2xl font-bold text-pink-600 mb-4 flex items-center">
      <span class="mr-2">👥</span> User Directory
    </h1>

    <!-- Search -->
    <div class="flex justify-end mb-4">
      <form method="get" action="">
        <div class="flex">
          <input type="text" name="q" placeholder="Search user..." 
            class="border border-gray-300 rounded-l-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400">
          <button type="submit" 
            class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-r-lg">
            🔍
          </button>
        </div>
      </form>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
      <table class="min-w-full border border-gray-200 rounded-lg">
        <thead>
          <tr class="bg-pink-500 text-white text-left">
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">Lastname</th>
            <th class="px-4 py-2">Firstname</th>
            <th class="px-4 py-2">Email</th>
            <th class="px-4 py-2">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($users)): ?>
            <?php foreach ($users as $user): ?>
              <tr class="odd:bg-white even:bg-pink-50">
                <td class="px-4 py-2"><?= $user['id']; ?></td>
                <td class="px-4 py-2"><?= $user['lastname']; ?></td>
                <td class="px-4 py-2"><?= $user['firstname']; ?></td>
                <td class="px-4 py-2"><?= $user['email']; ?></td>
                <td class="px-4 py-2 flex gap-2">
                  <a href="update.php?id=<?= $user['id']; ?>" 
                    class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded flex items-center gap-1">
                    ✏️ Update
                  </a>
                  <a href="delete.php?id=<?= $user['id']; ?>" 
                    class="bg-pink-600 hover:bg-pink-700 text-white px-3 py-1 rounded flex items-center gap-1">
                    🗑️ Delete
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="5" class="text-center py-4 text-gray-500">No users found</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <div class="flex justify-center items-center gap-2 py-4 pagination">
      <?= $page; ?>
    </div>
  </div>
</body>
</html>
