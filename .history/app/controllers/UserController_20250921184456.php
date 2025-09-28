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
        // Current page
        $page = 1;
        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $page = $this->io->get('page');
        }

        // Search query
        $q = '';
        if (isset($_GET['q']) && !empty($_GET['q'])) {
            $q = trim($this->io->get('q'));
        }

        $records_per_page = 5;

        
        $all = $this->UserModel->page($q, $records_per_page, $page);
        $data['users'] = $all['records'];
        $total_rows = $all['total_rows'];

        // Pagination 
        
        $this->pagination->set_options([
            'first_link'     => '⏮ First',
            'last_link'      => 'Last ⏭',
            'next_link'      => 'Next →',
            'prev_link'      => '← Prev',
            'page_delimiter' => '&page='
        ]);
       
        $this->pagination->set_theme('default');
        
        $this->pagination->initialize(
            $total_rows,
            $records_per_page,
            $page,
            site_url() . '?q=' . urlencode($q)
        );
        $data['page'] = $this->pagination->paginate();

        $this->call->view('users/index', $data);
    }

    function create(){
        if($this->io->method() == 'post'){
            $first_name = $this->io->post('first_name');
            $last_name = $this->io->post('last_name');
            $email = $this->io->post('email');

            $data = [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email
            ];

            if($this->UserModel->insert($data)){
                redirect(site_url(''));
            }else{
                echo "Error in creating user.";
            }

        }else{
            $this->call->view('users/create');
        }
    }

    function update($id){
        $user = $this->UserModel->find($id);
        if(!$user){
            echo "User not found.";
            return;
        }

        if($this->io->method() == 'post'){
            $first_name = $this->io->post('first_name');
            $last_name = $this->io->post('last_name');
            $email = $this->io->post('email');

            $data = [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email
            ];

            if($this->UserModel->update($id, $data)){
                redirect();
            }else{
                echo "Error in updating user.";
            }
        }else{
            $data['user'] = $user;
            $this->call->view('users/update', $data);
        }
    }
    
    function delete($id){
        if($this->UsersModel->delete($id)){
            redirect();
        }else{
            echo "Error in deleting user.";
        }
    }

    
}