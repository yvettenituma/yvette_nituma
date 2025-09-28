<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: UsersController
 * 
 * Automatically generated via CLI.
 */

    class UserController extends Controller {
        public function __construct()
        {
            parent::__construct();
        }
        public function index()
{
    $this->call->model('UserModel');

    // Check kung may naka-login
    if (!isset($_SESSION['user'])) {
        redirect('/reg/login');
        exit;
    }

    // Kunin info ng naka-login na user
    $logged_in_user = $_SESSION['user']; 
    $data['logged_in_user'] = $logged_in_user;

    // Current page
         $page = 1;
        if(isset($_GET['page']) && ! empty($_GET['page'])) {
            $page = $this->io->get('page');
        }

        $q = '';
        if(isset($_GET['q']) && ! empty($_GET['q'])) {
            $q = trim($this->io->get('q'));
        }

        $records_per_page = 5;

    // Get paginated users
    $users = $this->UserModel->page($q, $records_per_page, $page);

    $data['users'] = $users['records'];   // ✅ only rows
    $total_rows = $users['total_rows'];

    // Pagination setup
    $this->pagination->set_options([
        'first_link'     => '⏮ First',
        'last_link'      => 'Last ⏭',
        'next_link'      => 'Next →',
        'prev_link'      => '← Prev',
        'page_delimiter' => '&page='
    ]);
    $this->pagination->set_theme('custom');
    $this->pagination->initialize($total_rows, $records_per_page, $page, 'users?q='.$q);
    $data['page'] = $this->pagination->paginate();

    // ✅ Pass only cleaned data to view
    $this->call->view('users/index', $data);
}


    public function create()
{
    if ($this->io->method() === 'post') {

        $username = $this->io->post('username');
        $email = $this->io->post('email');
        $password = $this->io->post('password'); 
        $role = $this->io->post('role'); 

        
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            'username' => $username,
            'email'    => $email,
            'password' => $hashedPassword,
            'role'     => $role
        ];

        if ($this->UserModel->insert($data)) {
            redirect('/users');
        } else {
            echo 'Failed to create user.';
        }
    } else {
        $this->call->view('users/create');
    }
}


public function update($id)
{
    $this->call->model('UserModel');

    // Get logged-in user from session
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $logged_in_user = isset($_SESSION['user']) ? $_SESSION['user'] : null;

    // Fetch the user to be edited
    $user = $this->UserModel->get_user_by_id($id);
    if (!$user) {
        echo "User not found.";
        return;
    }

    if ($this->io->method() === 'post') {
        $username = $this->io->post('username');
        $email = $this->io->post('email');

        // Only allow admin to update role and password
        if (!empty($logged_in_user) && $logged_in_user['role'] === 'admin') {
            $role = $this->io->post('role');
            $password = $this->io->post('password');
            $data = [
                'username' => $username,
                'email' => $email,
                'role' => $role,
            ];

            if (!empty($password)) {
                $data['password'] = password_hash($password, PASSWORD_BCRYPT);
            }
        } else {
            // Normal users can only update username and email
            $data = [
                'username' => $username,
                'email' => $email
            ];
        }

        if ($this->UserModel->update($id, $data)) {
            redirect('/users');
        } else {
            echo 'Failed to update user.';
        }
    } else {
        // Pass both the user being edited and the logged-in user to the view
        $data['user'] = $user;
        $data['logged_in_user'] = $logged_in_user;
        $this->call->view('users/update', $data);
    }
}


    public function delete($id)
    {
        $this->call->model('UserModel');
        if($this->UserModel->delete($id)){
            redirect('/users');
        } else {
            echo 'Failed to delete user.';
        }
    }

    public function register()
    {
        $this->call->model('UserModel'); // load model

        if ($this->io->method() == 'post') {
            $username = $this->io->post('username');
            $password = password_hash($this->io->post('password'), PASSWORD_BCRYPT);

            $data = [
                'username' => $username,
                'email'    => $this->io->post('email'),
                'password' => $password,
                'role'     => $this->io->post('role'),
              
            ];

            if ($this->UserModel->insert($data)) {
                redirect('/reg/login');
            }
        }

        $this->call->view('/reg/register');
    }


        public function login()
        {
            $this->call->library('reg');

            $error = null; // prepare error variable

            if ($this->io->method() == 'post') {
                $username = $this->io->post('username');
                $password = $this->io->post('password');

                $this->call->model('UserModel');
                $user = $this->UserModel->get_user_by_username($username);

                if ($user) {
                    if ($this->reg->login($username, $password)) {
                        // Set session
                        $_SESSION['user'] = [
                            'id'       => $user['id'],
                            'username' => $user['username'],
                            'role'     => $user['role']
                        ];

                        if ($user['role'] == 'admin') {
                            redirect('/users');
                        } else {
                            redirect('/users');
                        }
                    } else {
                        $error = "Incorrect password!";
                    }
                } else {
                    $error = "Username not found!";
                }
            }

            // Pass error to view
            $this->call->view('reg/login', ['error' => $error]);
        }



    public function dashboard()
    {
        $this->call->model('UserModel');
        $data['user'] = $this->UserModel->get_all_users(); // fetch all users

        $this->call->model('UserModel');

        $page = 1;
        if(isset($_GET['page']) && ! empty($_GET['page'])) {
            $page = $this->io->get('page');
        }

        $q = '';
        if(isset($_GET['q']) && ! empty($_GET['q'])) {
            $q = trim($this->io->get('q'));
        }

        $records_per_page = 5;

        $user = $this->UserModel->page($q, $records_per_page, $page);
        $data['user'] = $user['records'];
        $total_rows = $user['total_rows'];

        $this->pagination->set_options([
            'first_link'     => '⏮ First',
            'last_link'      => 'Last ⏭',
            'next_link'      => 'Next →',
            'prev_link'      => '← Prev',
            'page_delimiter' => '&page='
        ]);
        $this->pagination->set_theme('bootstrap');
        $this->pagination->initialize($total_rows, $records_per_page, $page, 'users?q='.$q);
        $data['page'] = $this->pagination->paginate();

        $this->call->view('users/dashboard', $data);
    }


    public function logout()
    {
        $this->call->library('reg');
        $this->reg->logout();
        redirect('reg/login');
    }

}