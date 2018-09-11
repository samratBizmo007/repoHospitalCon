<?php
//error_reporting(E_ERROR | E_PARSE);
class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        //$this->load->model('admin_model/settings_model');
    }

    // -----------------------USER LOGIN ----------------------//
    //-------------------------------------------------------------//
    public function verifyUser($user_email, $password) {

        //sql query to check login credentials
        $query = "SELECT * FROM users_tab WHERE user_email='$user_email' AND user_passwd='$password'";
        $result = $this->db->query($query);

        //if credentials are true, their is obviously only one record
        if ($result->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
        return $response;
    }
    //----------------------------LOGIN END------------------------------//

    //-----------function for add skill in db-----------//
    public function registerUser($data)
    {
        extract($data);
        $sql = "INSERT INTO users_tab(user_name,user_addr,user_num,user_password,user_email) VALUES ('$user_name','$user_addr','$user_number','$reg_passwd','$reg_mail')";

        if ($this->db->query($sql)){
            return true;
        }
        else{
            return false;
        }
    }

    
    // check email already exist or not
    public function checkEmail($email){
        $querynew = "SELECT * FROM users_tab WHERE user_email='$email'";
        $query = $this->db->query($querynew);

        // if no record found then return true
        if ($query->num_rows() <= 0) {
            return true;
        } else {
            return false;
        }
    }
    // funtion ends here

    //-----------------------get password of user by email-------------------------
    public function getPassword($email){
        $querynew = "SELECT * FROM users_tab WHERE user_email='$email'";
        $query = $this->db->query($querynew);

    // if no record found then return false
        if ($query->num_rows() <= 0) {
            return false;
        } else {
            foreach ($query->result_array() as $key) {
                return $key['user_password'];
            }
        }
        return $response;
    }
    //-------------function ends----------------//

     //-------------------------------------------------------------------------
    public function getMemberDetailsCsv(){
        $response = array();
        $querynew = "SELECT * FROM users_tab";
        $query = $this->db->query($querynew);
        // Select record

        if ($query->num_rows() <= 0) {
            $response = array(
                'status' => 500,
                'status_message' => 'No records Found.');
        } 
        else {
           $data=array();
           foreach ($query->result_array() as $key) {
            $valid_date = date( 'd M, Y', strtotime($key['dated']));
            $food='VEG';
            $checked='---';
            if($key['foodPreference']=='nveg' && $key['foodPreference']!=''){
                $food='NON-VEG';
            }
            if($key['checkin']=='1'){
                $checked='Checked In';
            }
            $data[]=array(
                'member_name'   =>  $key['member_name'],
                'gender'   =>  $key['gender'],
                'food'   =>  $food,
                'checked'   =>  $checked,
                'date'   =>  $valid_date
            );
        }
        $response = array(
            'status' => 200,
            'status_message' => $data
        );
    }
    return $response;
}
    //-------------this fun is used to get all detials of members----------------//
}
