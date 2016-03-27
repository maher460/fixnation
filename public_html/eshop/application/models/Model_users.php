<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Model_users extends CI_Model {
        function __construct() {
            parent::__construct();
        }
        
        function getFirstNames() {
            $query = $this->db->query('SELECT first_name FROM eshop_users');
            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return NULL;
            }
        }
        
        function getUsers() {
            $query = $this->db->query('SELECT * FROM eshop_users');

            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return NULL;
            }
        }

        function getEmails() {
            $query = $this->db->query('SELECT email FROM eshop_users');

            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return NULL;
            }
        }
    }