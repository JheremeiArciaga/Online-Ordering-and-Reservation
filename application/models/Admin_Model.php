<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Model extends CI_model
{

    public function construct__()
    {
        parent::__construct();
        date_default_timezone_set( 'Asia/Kolkata' );
    }


    /* SIDE BAR */

    public function load_index_data()
    {

        $rs_main_menu = array();
        $rs_sub_menu = array();
        $rs_user_roles = array();

        /* main menu */
        $this->db->order_by("pri", "asc");
        $this->db->where('act', 1);
        $main_menu = $this->db->get("admin_menu_main");
        if ($main_menu->num_rows() > 0) {
            foreach ($main_menu->result() as $data) {
                $rs_main_menu[] = $data;
            }
        }

        /* sub menu */
        $this->db->order_by("pri", "asc");
        $this->db->where('act', 1);
        $sub_menu = $this->db->get("admin_menu_sub");
        if ($sub_menu->num_rows() > 0) {
            foreach ($sub_menu->result() as $data) {
                $rs_sub_menu[] = $data;
            }
        }

        /* user roles */
        $this->db->where('user_id', $this->session->user_id);
        $user_roles = $this->db->get("user_roles");
        if ($user_roles->num_rows() > 0) {
            foreach ($user_roles->result() as $data) {
                $rs_user_roles[] = $data;
            }
        }


        return array(
            'main_menu' => $rs_main_menu,
            'sub_menu' => $rs_sub_menu,
            'index_user_roles' => $rs_user_roles
        );
    }

    public function validate_login()
    {

        $result = array();
        $user_id = array();
        $user_role = array();
        $user_fn = array();
        $user_ln = array();
        $user_image = array();

        $password = md5($this->input->post("password", TRUE));

        /* ADMIN LOGIN VALIDATION */

        $this->db->where('user_name', $this->input->post("username", TRUE));
        $this->db->where('user_pass', $password);

        $admin_account = $this->db->get("user_info");

        if ($admin_account->num_rows() == 1) {

            $rs = $admin_account->row();
            $result = true;
            $user_id = $rs->user_id;
            $user_role = $rs->user_role;
            $user_fn = $rs->user_fn;
            $user_ln = $rs->user_ln;
            $user_image = $rs->user_image;
        }

        return array(
            'success' => $result,
            'user_id' => $user_id,
            'user_role' => $user_role,
            'user_fn' => $user_fn,
            'user_ln' => $user_ln,
            'user_image' => $user_image,
        );

    }


    public function loadH_services(){
        $this->db->select('*');
        $this->db->from('h_services');
        $query = $this->db->get();
        return $query->result();
    }


    public function add_h_services_data(){

        $image1 ='';

        if (!empty($_FILES['Filename']['name'])) { $image1 = $_FILES['Filename']['name']; }

        $data = array(
            's_title'           =>  $this->input->post('s_title', true),
            's_desc'            =>  $this->input->post('s_desc', true),
            's_image'           =>  $image1
        );

        $result = $this->db->insert('h_services', $data);
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function edit_h_services_data(){

        $Uid = $this->input->post('c_ID', true);

        $image1 ='';

        if (!empty($_FILES['Filename']['name'])) { $image1 = $_FILES['Filename']['name']; }


        $this->db->set('s_title', $this->input->post('s_title', true));
        $this->db->set('s_desc', $this->input->post('s_desc', true));
        if($image1){ $this->db->set('s_image',$image1); }


        $this->db->where('rec_no', $Uid);
        $this->db->update('h_services');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function delete_h_services_data($delete_ID){

        $this->db->where('rec_no', $delete_ID);
        $this->db->delete('h_services');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }


    public function loadj_gallery(){
        $this->db->select('*');
        $this->db->from('j_gallery');
        $query = $this->db->get();
        return $query->result();
    }


    public function add_j_gallery_data(){

        $image1 ='';

        if (!empty($_FILES['Filename']['name'])) { $image1 = $_FILES['Filename']['name']; }

        $data = array(
            'g_title'           =>  $this->input->post('g_title', true)
        );

        $result = $this->db->insert('j_gallery', $data);
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function edit_j_gallery_data(){

        $Uid = $this->input->post('c_ID', true);
    
        $this->db->set('g_title',   $this->input->post('g_title', true));
    
        $this->db->where('g_no', $Uid);
        $this->db->update('j_gallery');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function delete_j_gallery_data($delete_ID){

        $this->db->where('g_no', $delete_ID);
        $this->db->delete('j_gallery');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function loadj_gallery_item(){
        $this->db->select('*');
        $this->db->from('j_gallery_item');
        $query = $this->db->get();
        return $query->result();
    }


    public function add_j_gallery_item_data(){

        $image1 ='';

        if (!empty($_FILES['Filename']['name'])) { $image1 = $_FILES['Filename']['name']; }

        $data = array(
            'gi_category'           =>  $this->input->post('gi_category', true),
            'gi_image'           =>  $image1
        );

        $result = $this->db->insert('j_gallery_item', $data);
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function edit_j_gallery_item_data(){

        $Uid = $this->input->post('c_ID', true);

        $image1 ='';

        if (!empty($_FILES['Filename']['name'])) { $image1 = $_FILES['Filename']['name']; }

        $this->db->set('gi_category',   $this->input->post('gi_category', true));
        if($image1){ $this->db->set('gi_image',$image1); }


        $this->db->where('gi_no', $Uid);
        $this->db->update('j_gallery_item');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function delete_j_gallery_item_data($delete_ID){

        $this->db->where('gi_no', $delete_ID);
        $this->db->delete('j_gallery_item');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }






    public function loada_about() {
        $this->db->select('*');
        $this->db->from('a_about');
        $queryS = $this->db->get();
        return $queryS->result();
    }

    public function edit_a_about_data(){

        $image ='';
        if (!empty($_FILES['Filename']['name'])) { $image = $_FILES['Filename']['name']; }

        $this->db->set('a_history',   $this->input->post('a_history', true));
        $this->db->set('a_mission',   $this->input->post('a_mission', true));
        $this->db->set('a_vision',    $this->input->post('a_vision', true));
        if($image){ $this->db->set('a_image',$image); }

        $this->db->update('a_about');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }


    public function loada_contact() {
        $this->db->select('*');
        $this->db->from('a_contact');
        $queryS = $this->db->get();
        return $queryS->result();
    }

    public function edit_a_contact_data(){

        $this->db->set('c_address',   $this->input->post('c_address', true));
        $this->db->set('c_number',    $this->input->post('c_number', true));
        $this->db->set('c_emailadd',  $this->input->post('c_emailadd', true));
        $this->db->set('c_workingweekdays',  $this->input->post('c_workingweekdays', true));
        $this->db->set('c_workingweekends',  $this->input->post('c_workingweekends', true));

        $this->db->update('a_contact');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function loadj_menu_category(){
        $this->db->select('*');
        $this->db->from('j_menu_category');
        $query = $this->db->get();
        return $query->result();
    }


    public function add_j_menu_category_data(){

        $data = array(
            'm_name'           =>  $this->input->post('m_name', true)
        );

        $result = $this->db->insert('j_menu_category', $data);
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function edit_j_menu_category_data(){

        $Uid = $this->input->post('c_ID', true);

        $this->db->set('m_name', $this->input->post('m_name', true));

        $this->db->where('m_no', $Uid);
        $this->db->update('j_menu_category');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function delete_j_menu_category_data($delete_ID){

        $this->db->where('m_no', $delete_ID);
        $this->db->delete('j_menu_category');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function loadj_menu_item(){
        $this->db->select('*');
        $this->db->from('j_menu_item');
        $query = $this->db->get();
        return $query->result();
    }


    public function add_j_menu_item_data(){

        $image1 ='';

        if (!empty($_FILES['Filename']['name'])) { $image1 = $_FILES['Filename']['name']; }
        if($this->input->post('i_best', true) == 'True') { $tour_featured = 1; } else { $tour_featured = 0; }

        $data = array(
            'i_category'         =>  $this->input->post('i_category', true),
            'i_name'             =>  $this->input->post('i_name', true),
            'i_description'      =>  $this->input->post('i_description', true),
            'i_price'            =>  $this->input->post('i_price', true),
            'i_best'             =>  $tour_featured,
            'i_image'            =>  $image1
        );

        $result = $this->db->insert('j_menu_item', $data);
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function edit_j_menu_item_data(){

        $Uid = $this->input->post('c_ID', true);

        $image1 ='';

        if (!empty($_FILES['Filename']['name'])) { $image1 = $_FILES['Filename']['name']; }
        if($this->input->post('i_best', true) == 'True') { $tour_featured = 1; } else { $tour_featured = 0; }

        $this->db->set('i_category', $this->input->post('i_category', true));
        $this->db->set('i_name', $this->input->post('i_name', true));
        $this->db->set('i_description', $this->input->post('i_description', true));
        $this->db->set('i_price', $this->input->post('i_price', true));
        $this->db->set('i_best', $tour_featured);
        if($image1){ $this->db->set('i_image',$image1); }


        $this->db->where('i_no', $Uid);
        $this->db->update('j_menu_item');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function delete_j_menu_item_data($delete_ID){

        $this->db->where('i_no', $delete_ID);
        $this->db->delete('j_menu_item');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function loadj_menu_catering(){
        $this->db->select('*');
        $this->db->from('j_menu_catering');
        $query = $this->db->get();
        return $query->result();
    }


    public function add_j_menu_catering_data(){

        $data = array(
            'm_name'           =>  $this->input->post('m_name', true)
        );

        $result = $this->db->insert('j_menu_catering', $data);
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function edit_j_menu_catering_data(){

        $Uid = $this->input->post('c_ID', true);

        $this->db->set('m_name', $this->input->post('m_name', true));

        $this->db->where('m_no', $Uid);
        $this->db->update('j_menu_catering');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function delete_j_menu_catering_data($delete_ID){

        $this->db->where('m_no', $delete_ID);
        $this->db->delete('j_menu_catering');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function loadj_menu_catering_item(){
        $this->db->select('*');
        $this->db->from('catering_menu');
        $query = $this->db->get();
        return $query->result();
    }

    public function  loadj_menu_catering_category(){
        $this->db->select('*');
        $this->db->from('catering_category');
        $query = $this->db->get();
        return $query->result();
    }

    public function add_j_menu_catering_item_data(){

        $data = array(
            'c_category'         =>  $this->input->post('c_category', true),
            'c_type'             =>  $this->input->post('c_type', true),
            'c_name'             =>  $this->input->post('c_name', true)

        );

        $result = $this->db->insert('catering_menu', $data);
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function edit_j_menu_catering_item_data(){

        $Uid = $this->input->post('c_ID', true);


        $this->db->set('c_category', $this->input->post('c_category', true));
        $this->db->set('c_type', $this->input->post('c_type', true));
        $this->db->set('c_name', $this->input->post('c_name', true));

        $this->db->where('c_no', $Uid);
        $this->db->update('catering_menu');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function delete_j_menu_catering_item_data($delete_ID){

        $this->db->where('c_no', $delete_ID);
        $this->db->delete('catering_menu');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }




    public function load_menu_events(){
        $this->db->select('*');
        $this->db->from('j_menu_events');
        $query = $this->db->get();
        return $query->result();
    }

    public function add_menu_events_data(){

        $data = array(
            'me_name'            =>  $this->input->post('me_name', true),
            'me_description'     =>  $this->input->post('me_description', true)

        );

        $result = $this->db->insert('j_menu_events', $data);
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function edit_menu_events_data(){

        $Uid = $this->input->post('c_ID', true);


        $this->db->set('me_name', $this->input->post('me_name', true));
        $this->db->set('me_description', $this->input->post('me_description', true));

        $this->db->where('me_no', $Uid);
        $this->db->update('j_menu_events');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function delete_menu_events_item_data($delete_ID){

        $this->db->where('me_no', $delete_ID);
        $this->db->delete('j_menu_events');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }


    public function load_menu_image(){
        $this->db->select('*');
        $this->db->from('j_menu_events_images');
        $query = $this->db->get();
        return $query->result();
    }

    public function add_menu_image_data(){

        $image ='';

        if (!empty($_FILES['Filename']['name'])) { $image = $_FILES['Filename']['name']; }

        $data = array(
            'mei_events'      =>  $this->input->post('mei_events', true),
            'mei_image'       =>  $image

        );

        $result = $this->db->insert('j_menu_events_images', $data);
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function edit_menu_image_data(){

        $Uid = $this->input->post('c_ID', true);

        $image1 ='';

        if (!empty($_FILES['Filename']['name'])) { $image1 = $_FILES['Filename']['name']; }

        $this->db->set('mei_events', $this->input->post('mei_events', true));
        if($image1){ $this->db->set('mei_image',$image1); }


        $this->db->where('mei_no', $Uid);
        $this->db->update('j_menu_events_images');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function delete_menu_image_data($delete_ID){

        $this->db->where('mei_no', $delete_ID);
        $this->db->delete('j_menu_events_images');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }


    public function load_menu_package(){
        $this->db->select('*');
        $this->db->from('j_menu_events_package');
        $query = $this->db->get();
        return $query->result();
    }

    public function add_menu_package_data(){

        $data = array(
            'mei_events'      =>  $this->input->post('mei_events', true),
            'me_package'      =>  $this->input->post('me_package', true)

        );

        $result = $this->db->insert('j_menu_events_package', $data);
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function edit_menu_package_data(){

        $Uid = $this->input->post('c_ID', true);

        $this->db->set('mei_events', $this->input->post('mei_events', true));
        $this->db->set('me_package', $this->input->post('me_package', true));

        $this->db->where('mep_no', $Uid);
        $this->db->update('j_menu_events_package');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function delete_menu_package_data($delete_ID){

        $this->db->where('mep_no', $delete_ID);
        $this->db->delete('j_menu_events_package');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function load_menu_inclusion(){
        $this->db->select('*');
        $this->db->from('j_menu_events_inclusion');
        $query = $this->db->get();
        return $query->result();
    }

    public function add_menu_inclusion_data(){

        $data = array(
            'mei_events'      =>  $this->input->post('mei_events', true),
            'mei_inclusion'      =>  $this->input->post('mei_inclusion', true)

        );

        $result = $this->db->insert('j_menu_events_inclusion', $data);
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function edit_menu_inclusion_data(){

        $Uid = $this->input->post('c_ID', true);

        $this->db->set('mei_events', $this->input->post('mei_events', true));
        $this->db->set('mei_inclusion', $this->input->post('mei_inclusion', true));

        $this->db->where('mei_no', $Uid);
        $this->db->update('j_menu_events_inclusion');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function delete_menu_inclusion_data($delete_ID){

        $this->db->where('mei_no', $delete_ID);
        $this->db->delete('j_menu_events_inclusion');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function load_online_orders(){
        $this->db->select('*');
        $this->db->from('customer_purchase');
        $query = $this->db->get();
        return $query->result();
    }

    public function delete_online_order($reference){
        $this->db->where('rec_no', $reference);
        $this->db->delete('customer_purchase');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function load_order_list($reference){
        $this->db->select('*');
        $this->db->from('online_orders');
        $this->db->join('j_menu_item', 'j_menu_item.i_no = online_orders.mnu_no');
        $this->db->where('online_orders.mnu_status', 1);
        $this->db->where('web_session', $reference);
        $query = $this->db->get();
        return $query->result();
    }

    public function update_order_status($reference, $status){

        $this->db->set('order_status', $status);
        $this->db->set('order_datetime', date("Y-m-d H:i:s"));

        $this->db->where('reference_num', $reference);
        $this->db->update('customer_purchase');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function load_reservation_table(){
        $this->db->select('*');
        $this->db->from('reservation_table');
        $query = $this->db->get();
        return $query->result();
    }

    public function load_reservation_catering(){
        $this->db->select('*');
        $this->db->from('catering_reservation');
        $query = $this->db->get();
        return $query->result();
    }

    public function update_password(){

        $u_id = $this->session->user_id;

        $n_password = md5($this->input->post("New_p",TRUE));

        $this->db->set('user_pass',      $n_password);

        $this->db->where('user_id', $u_id);
        $this->db->update('user_info');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );

    }

    public function load_inbox_data(){
        $this->db->select('*');
        $this->db->from('message_inbox');
        $this->db->order_by('msg_id', 'desc');
        $queryS = $this->db->get();
        return $queryS->result();
    }

    public function load_feedback_data(){
        $this->db->select('*');
        $this->db->from('message_feedback');
        $this->db->order_by('msg_id', 'desc');
        $queryS = $this->db->get();
        return $queryS->result();
    }

    public function load_cater_list($reference){
        $this->db->select('*');
        $this->db->from('catering_selection');
        $this->db->where('reference_no', $reference);
        $query = $this->db->get();
        return $query->result();
    }

    public function update_catering_reservation($reference){

        $this->db->set('r_status', 1);

        $this->db->where('r_reference', $reference);
        $this->db->update('catering_reservation');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );

    }

    public function cancel_catering_reservation($reference){
        $this->db->set('r_status', 2);

        $this->db->where('r_reference', $reference);
        $this->db->update('catering_reservation');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function delete_catering_reservation($reference){
        $this->db->where('r_reference', $reference);
        $this->db->delete('catering_reservation');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }





    public function update_table_reservation($tr){
        $this->db->set('rt_status', 1);

        $this->db->where('rt_no', $tr);
        $this->db->update('reservation_table');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function cancel_table_reservation($tr){
        $this->db->set('rt_status', 2);

        $this->db->where('rt_no', $tr);
        $this->db->update('reservation_table');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function delete_table_reservation($delete_ID){
        $this->db->where('rt_no', $delete_ID);
        $this->db->delete('reservation_table');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function recover_password(){

        $password = md5($this->input->post("user_pass",TRUE));

        $this->db->where('user_name',   $this->input->post("user_name",TRUE));
        $this->db->where('user_sq',     $this->input->post("user_sec_question",TRUE));
        $this->db->where('user_sa',     $this->input->post("user_sec_answer",TRUE));

        $validation = $this->db->get("user_info");

        if ($validation->num_rows() == 1) {

            $rs = $validation->row();
            $user_id = $rs->user_id;

            $this->db->set('user_pass', $password);

            $this->db->where('user_id', $user_id);
            $this->db->update('user_info');
            $result = ($this->db->affected_rows() != 1) ? false : true;

        } else {
            $result = false;
        }

        return array(
            'result'       => $result
        );

    }

    public function delete_inbox_data($delete_ID)
    {
        $this->db->where('msg_id', $delete_ID);
        $this->db->delete('message_inbox');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result' => $result
        );
    }
}
