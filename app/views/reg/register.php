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
      background: linear-gradient(to bottom right, #ede9fe, #ddd6fe, #c4b5fd);
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      overflow: hidden;
    }

    /* Background Blobs */
    .blob {
      position: absolute;
      border-radius: 50%;
      filter: blur(60px);
      opacity: 0.5;
      animation: float 8s ease-in-out infinite;
    }
    .blob1 {
      width: 350px;
      height: 350px;
      background: #a78bfa;
      top: -80px;
      left: -80px;
    }
    .blob2 {
      width: 250px;
      height: 250px;
      background: #c4b5fd;
      bottom: -60px;
      right: -60px;
      animation-delay: 4s;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0) translateX(0); }
      50% { transform: translateY(30px) translateX(20px); }
    }

    .login {
      background: rgba(255, 255, 255, 0.7);
      padding: 50px 40px;
      width: 500px;
      border-radius: 20px;
      box-shadow: 0 20px 40px rgba(0,0,0,0.1);
      border: 1px solid #c4b5fd;
      backdrop-filter: blur(12px);
      position: relative;
      z-index: 1;
      animation: fadeIn 0.8s ease;
    }

    .login h2 {
      text-align: center;
      font-size: 2em;
      font-weight: 600;
      color: #6d28d9;
      margin-bottom: 25px;
    }

    .login input,
    .login select {
      width: 100%;
      padding: 14px 20px;
      margin-bottom: 18px;
      font-size: 1.05em;
      border-radius: 8px;
      border: 1px solid #c4b5fd;
      background: #f5f3ff;
      color: #4c1d95;
      outline: none;
      transition: all 0.3s ease;
    }

    .login input:focus,
    .login select:focus {
      box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.2);
      transform: scale(1.02);
    }

    .login input::placeholder {
      color: #7c3aed;
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
      color: #7c3aed;
    }

    #btn {
      width: 100%;
      padding: 15px;
      font-size: 1.2em;
      font-weight: 500;
      border: none;
      border-radius: 10px;
      background: #7c3aed;
      color: white;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(124, 58, 237, 0.3);
    }

    #btn:hover {
      background: #6d28d9;
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(124, 58, 237, 0.4);
    }

    .group {
      text-align: center;
      margin-top: 10px;
    }

    .group a {
      color: #6d28d9;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s;
    }

    .group a:hover {
      text-decoration: underline;
      color: #4c1d95;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <!-- Animated Background Blobs -->
  <div class="blob blob1"></div>
  <div class="blob blob2"></div>

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
