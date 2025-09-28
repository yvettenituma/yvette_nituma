<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: Usermodel
 * 
 * Automatically generated via CLI.
 */
class Usermodel extends Model {
    protected $table = 'user';
    protected $primary_key = 'id';
    protected $allowed_fields = ['last_name', 'first_name', 'email'];
    protected $validation_rules = [
        
        'last_name' => 'required|min_length[2]|max_length[100]',
        'first_name' => 'required|min_length[2]|max_length[100]',
        'email' => 'required|valid_email|max_length[150]'
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function page($q = '', $records_per_page = null, $page = null)
    {
        if (is_null($page)) {
            // return all without pagination
            return [
                'total_rows' => $this->db->table($this->table)->count_all(),
                'records'    => $this->db->table($this->table)->get_all()
            ];
        } else {
            $query = $this->db->table($this->table);

            if (!empty($q)) {
                $query
                      ->or_like('last_name', '%'.$q.'%')
                      ->like('first_name', '%'.$q.'%')
                      ->or_like('email', '%'.$q.'%');
            }

            // count total rows
            $countQuery = clone $query;
            $data['total_rows'] = $countQuery->select_count('*', 'count')->get()['count'];

            // fetch paginated records
            $data['records'] = $query->pagination($records_per_page, $page)->get_all();

            return $data;
        }
    }
}