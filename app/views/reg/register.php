<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body, section {
      width: 100%;
      height: 100vh;
      background: linear-gradient(to bottom right, #fbcfe8, #fce7f3, #f9a8d4);
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login {
      background: white;
      padding: 50px 40px;
      width: 500px;
      border-radius: 20px;
      box-shadow: 0 20px 40px rgba(0,0,0,0.1);
      border: 1px solid #f9a8d4;
    }

    .login h2 {
      text-align: center;
      font-size: 2em;
      font-weight: 600;
      color: #db2777; /* Same pink tone as directory */
      margin-bottom: 25px;
    }

    .login input,
    .login select {
      width: 100%;
      padding: 14px 20px;
      margin-bottom: 18px;
      font-size: 1.05em;
      border-radius: 8px;
      border: 1px solid #fbcfe8;
      background: #fdf2f8;
      color: #a21caf;
      outline: none;
    }

    .login input::placeholder {
      color: #d63384;
    }

    .password-box {
      position: relative;
    }

    .password-box i {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #d63384;
    }

    #btn {
      width: 100%;
      padding: 15px;
      font-size: 1.2em;
      font-weight: 500;
      border: none;
      border-radius: 10px;
      background: #ec4899;
      color: white;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    #btn:hover {
      background: #db2777;
    }

    .group {
      text-align: center;
      margin-top: 10px;
    }

    .group a {
      color: #d63384;
      text-decoration: none;
      font-weight: 500;
    }

    .group a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <section>
    <div class="login">
      <h2>Register</h2>
      <form method="POST" action="<?= site_url('reg/register'); ?>" class="inputBox">

        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>

        <div class="password-box">
          <input type="password" id="password" name="password" placeholder="Password" required>
          <i class="fa-solid fa-eye" id="togglePassword"></i>
        </div>

        <div class="password-box">
          <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm Password" required>
          <i class="fa-solid fa-eye" id="toggleConfirmPassword"></i>
        </div>

        <select name="role" required>
          <option value="user" selected>User</option>
          <option value="admin">Admin</option>
        </select>

        <button type="submit" id="btn">Register</button>
      </form>

      <div class="group">
        <p>Already have an account? <a href="<?= site_url('reg/login'); ?>">Login here</a></p>
      </div>
    </div>
  </section>

  <script>
    function toggleVisibility(toggleId, inputId) {
      const toggle = document.getElementById(toggleId);
      const input = document.getElementById(inputId);

      toggle.addEventListener('click', function () {
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }

    toggleVisibility('togglePassword', 'password');
    toggleVisibility('toggleConfirmPassword', 'confirmPassword');
  </script>
</body>
</html>
