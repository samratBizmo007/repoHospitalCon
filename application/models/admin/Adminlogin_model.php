<?php

class Adminlogin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // login function to authenticate user
    public function authenticate($username, $password) {

        //print_r($username);die();
        // get admin username
        $admin_username = Login_model::getAdminDetails('username');
        // check passed key valid or not
        if (!$admin_username) {
            echo '<p class="w3-red w3-padding-small">Invalid Key passed for username!</p>';
        }

        // get admin password
        $admin_password = Login_model::getAdminDetails('password');
        // check passed key valid or not
        if (!$admin_password) {
            echo '<p class="w3-red w3-padding-small">Invalid Key passed for password!</p>';
        }

        // check post values with db values
        if ($admin_username == $username && $admin_password == $password) {
            return true;
        } else {
            return false;
        }
    }

    // login function ends here
}
