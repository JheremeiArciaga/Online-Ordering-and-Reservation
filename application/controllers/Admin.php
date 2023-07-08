<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

    var $system_menu = array();

    function __construct()
    {
        parent::__construct();
        $this->load->model("Admin_Model");

        $result = $this->Admin_Model->load_index_data();
        $this->system_menu['main_menu'] = $result['main_menu'];
        $this->system_menu['sub_menu'] = $result['sub_menu'];
        $this->system_menu['index_user_roles'] = $result['index_user_roles'];

    }


    public function index()
    {
        $this->load->view('admin/Login');
    }

    public function validate_login()
    {

        $this->form_validation->set_rules('username', 'Username', 'required|max_length[225]');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[225]');

        if ($this->form_validation->run() == TRUE) {

            $result = $this->Admin_Model->validate_login();

            if ($result['success'] == TRUE) {

                $account_data = array(
                    'user_id' => $result['user_id'],
                    'user_role' => $result['user_role'],
                    'user_fn' => $result['user_fn'],
                    'user_ln' => $result['user_ln'],
                    'user_image' => $result['user_image'],
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($account_data);

                $this->session->set_flashdata("success", "login sucess");

                redirect("admin/a_about", "refresh");


            } else {

                $this->session->set_flashdata("error", "invalid username/password.");

            }

            if ($result['success'] == FALSE) {
                redirect("Admin", "refresh");
            }


        }

    }

    public function do_upload_images($filename, $field, $file_path)
    {

        $config['upload_path'] = $file_path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg|gif';
        $config['max_size'] = 2000;
        $config['overwrite'] = true;
        $config['file_name'] = $filename;

        $this->upload->initialize($config);
        if (!$this->upload->do_upload($field)) {
            $this->session->set_flashdata("error", "Error uploading image.(" . $this->upload->display_errors() . ")");
            $result = TRUE;
        } else {
            $data = array('upload_data' => $this->upload->data());
            $result = FALSE;
        }

        return $result;

    }




    public function h_services(){
        $module = $this->system_menu;
        $query = $this->Admin_Model->loadH_services();
        $module['c_Data'] = $query;

        $this->load->view('admin/Design/Services', $module );
    }

    public function h_services_add(){
        $result = $this->Admin_Model->add_h_services_data();

        if($result['result']==true){

            if (!empty($_FILES['Filename']['name'])) {
                $img_filename = $_FILES['Filename']['name'];
                $field = 'Filename';
                $file_path = './assets/img/';
                $this->do_upload_images($img_filename, $field, $file_path);
            }

            $this->session->set_flashdata("success", "Data successfully added to the database.");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("admin/h_services", "refresh");
    }

    public function h_services_edit(){
        $result = $this->Admin_Model->edit_h_services_data();

        if($result['result']==true){

            if (!empty($_FILES['Filename']['name'])) {
                $img_filename = $_FILES['Filename']['name'];
                $field = 'Filename';
                $file_path = './assets/img/';
                $this->do_upload_images($img_filename, $field, $file_path);
            }

            $this->session->set_flashdata("success", "Data successfully added to the database.");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("admin/h_services", "refresh");
    }

    public function h_services_delete($delete_ID){

        $result = $this->Admin_Model->delete_h_services_data($delete_ID);

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully deleted to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on deleting data to the database.");
        }

        redirect("admin/h_services", "refresh");

    }


    public function j_gallery(){
        $module = $this->system_menu;
        $query = $this->Admin_Model->loadj_gallery();
        $module['g_Data'] = $query;

        $this->load->view('admin/Design/Gallery', $module );
    }

    public function j_gallery_add(){
        $result = $this->Admin_Model->add_j_gallery_data();

        if($result['result']==true){

            if (!empty($_FILES['Filename']['name'])) {
                $img_filename = $_FILES['Filename']['name'];
                $field = 'Filename';
                $file_path = './assets/img/';
                $this->do_upload_images($img_filename, $field, $file_path);
            }

            $this->session->set_flashdata("success", "Data successfully added to the database.");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("admin/j_gallery", "refresh");
    }

    public function j_gallery_edit(){
        $result = $this->Admin_Model->edit_j_gallery_data();

        if($result['result']==true){

            if (!empty($_FILES['Filename']['name'])) {
                $img_filename = $_FILES['Filename']['name'];
                $field = 'Filename';
                $file_path = './assets/img/';
                $this->do_upload_images($img_filename, $field, $file_path);
            }

            $this->session->set_flashdata("success", "Data successfully added to the database.");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("admin/j_gallery", "refresh");
    }

    public function j_gallery_delete($delete_ID){

        $result = $this->Admin_Model->delete_j_gallery_data($delete_ID);

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully deleted to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on deleting data to the database.");
        }

        redirect("admin/j_gallery", "refresh");

    }

    public function j_gallery_item(){
        $module = $this->system_menu;
        $query = $this->Admin_Model->loadj_gallery();
        $module['g_Data'] = $query;
        $query = $this->Admin_Model->loadj_gallery_item();
        $module['gi_Data'] = $query;

        $this->load->view('admin/Design/Images', $module );
    }

    public function j_gallery_item_add(){
        $result = $this->Admin_Model->add_j_gallery_item_data();

        if($result['result']==true){

            if (!empty($_FILES['Filename']['name'])) {
                $img_filename = $_FILES['Filename']['name'];
                $field = 'Filename';
                $file_path = './assets/img/gallery/';
                $this->do_upload_images($img_filename, $field, $file_path);
            }

            $this->session->set_flashdata("success", "Data successfully added to the database.");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("admin/j_gallery_item", "refresh");
    }

    public function j_gallery_item_edit(){
        $result = $this->Admin_Model->edit_j_gallery_item_data();

        if($result['result']==true){

            if (!empty($_FILES['Filename']['name'])) {
                $img_filename = $_FILES['Filename']['name'];
                $field = 'Filename';
                $file_path = './assets/img/';
                $this->do_upload_images($img_filename, $field, $file_path);
            }

            $this->session->set_flashdata("success", "Data successfully added to the database.");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("admin/j_gallery_item", "refresh");
    }

    public function j_gallery_item_delete($delete_ID){

        $result = $this->Admin_Model->delete_j_gallery_item_data($delete_ID);

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully deleted to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on deleting data to the database.");
        }

        redirect("admin/j_gallery_item", "refresh");

    }

    public function a_about(){
        $module = $this->system_menu;
        $query = $this->Admin_Model->loada_about();
        $module['a_Data'] = $query;

        $this->load->view('admin/Design/About', $module );
    }

    public function a_about_update(){

        $result = $this->Admin_Model->edit_a_about_data();

        if($result['result']==true){

            if (!empty($_FILES['Filename']['name'])) {
                $img_filename = $_FILES['Filename']['name'];
                $field = 'Filename';
                $file_path = './assets/img/';
                $this->do_upload_images($img_filename, $field, $file_path);
            }

            $this->session->set_flashdata("success", "Data successfully added to the database.");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("admin/a_about", "refresh");
    }


    public function a_contact(){
        $module = $this->system_menu;
        $query = $this->Admin_Model->loada_contact();
        $module['con_Data'] = $query;

        $this->load->view('admin/Design/Contact', $module );
    }

    public function a_contact_update(){

        $result = $this->Admin_Model->edit_a_contact_data();

        if($result['result']==true){

            $this->session->set_flashdata("success", "Data successfully added to the database.");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("admin/a_contact", "refresh");
    }




    public function j_menu_category(){
        $module = $this->system_menu;
        $query = $this->Admin_Model->loadj_menu_category();
        $module['jm_Data'] = $query;

        $this->load->view('admin/Menu/FCategory', $module );
    }

    public function j_menu_category_add(){
        $result = $this->Admin_Model->add_j_menu_category_data();

        if($result['result']==true){

            $this->session->set_flashdata("success", "Data successfully added to the database.");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("admin/j_menu_category", "refresh");
    }

    public function j_menu_category_edit(){
        $result = $this->Admin_Model->edit_j_menu_category_data();

        if($result['result']==true){

            $this->session->set_flashdata("success", "Data successfully added to the database.");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("admin/j_menu_category", "refresh");
    }

    public function j_menu_category_delete($delete_ID){

        $result = $this->Admin_Model->delete_j_menu_category_data($delete_ID);

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully deleted to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on deleting data to the database.");
        }

        redirect("admin/j_menu_category", "refresh");

    }


    public function j_menu_item(){
        $module = $this->system_menu;
        $query = $this->Admin_Model->loadj_menu_item();
        $module['jmi_Data'] = $query;
        $query = $this->Admin_Model->loadj_menu_category();
        $module['jm_Data'] = $query;

        $this->load->view('admin/Menu/FItem', $module );
    }

    public function j_menu_item_add(){
        $result = $this->Admin_Model->add_j_menu_item_data();

        if($result['result']==true){

            if (!empty($_FILES['Filename']['name'])) {
                $img_filename = $_FILES['Filename']['name'];
                $field = 'Filename';
                $file_path = './assets/img/';
                $this->do_upload_images($img_filename, $field, $file_path);
            }

            $this->session->set_flashdata("success", "Data successfully added to the database.");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("admin/j_menu_item", "refresh");
    }

    public function j_menu_item_edit(){
        $result = $this->Admin_Model->edit_j_menu_item_data();

        if($result['result']==true){

            if (!empty($_FILES['Filename']['name'])) {
                $img_filename = $_FILES['Filename']['name'];
                $field = 'Filename';
                $file_path = './assets/img/';
                $this->do_upload_images($img_filename, $field, $file_path);
            }

            $this->session->set_flashdata("success", "Data successfully added to the database.");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("admin/j_menu_item", "refresh");
    }

    public function j_menu_item_delete($delete_ID){

        $result = $this->Admin_Model->delete_j_menu_item_data($delete_ID);

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully deleted to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on deleting data to the database.");
        }

        redirect("admin/j_menu_item", "refresh");

    }





    public function j_menu_catering(){
        $module = $this->system_menu;
        $query = $this->Admin_Model->loadj_menu_catering();
        $module['jm_Data'] = $query;

        $this->load->view('admin/Menu/CCategory', $module );
    }

    public function j_menu_catering_add(){
        $result = $this->Admin_Model->add_j_menu_catering_data();

        if($result['result']==true){

            $this->session->set_flashdata("success", "Data successfully added to the database.");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("admin/j_menu_catering", "refresh");
    }

    public function j_menu_catering_edit(){
        $result = $this->Admin_Model->edit_j_menu_catering_data();

        if($result['result']==true){

            $this->session->set_flashdata("success", "Data successfully added to the database.");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("admin/j_menu_catering", "refresh");
    }

    public function j_menu_catering_delete($delete_ID){

        $result = $this->Admin_Model->delete_j_menu_catering_data($delete_ID);

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully deleted to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on deleting data to the database.");
        }

        redirect("admin/j_menu_catering", "refresh");

    }


    public function j_menu_catering_item(){

        $module = $this->system_menu;
        $query = $this->Admin_Model->loadj_menu_catering_item();
        $module['jmi_Data'] = $query;
        $query = $this->Admin_Model->loadj_menu_catering_category();
        $module['jm_Data'] = $query;

        $this->load->view('admin/Menu/CItem', $module );
    }

    public function j_menu_catering_item_add(){
        $result = $this->Admin_Model->add_j_menu_catering_item_data();

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully added to the database.");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("admin/j_menu_catering_item", "refresh");
    }

    public function j_menu_catering_item_edit(){
        $result = $this->Admin_Model->edit_j_menu_catering_item_data();

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully added to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("admin/j_menu_catering_item", "refresh");
    }

    public function j_menu_catering_item_delete($delete_ID){

        $result = $this->Admin_Model->delete_j_menu_catering_item_data($delete_ID);

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully deleted to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on deleting data to the database.");
        }

        redirect("admin/j_menu_catering_item", "refresh");

    }



    public function menu_events(){

        $module = $this->system_menu;
        $query = $this->Admin_Model->load_menu_events();
        $module['me_Data'] = $query;

        $this->load->view('admin/Menu/CEvents', $module );
    }

    public function menu_events_add(){
        $result = $this->Admin_Model->add_menu_events_data();

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully added to the database.");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("admin/menu_events", "refresh");
    }

    public function menu_events_edit(){
        $result = $this->Admin_Model->edit_menu_events_data();

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully added to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("admin/menu_events", "refresh");
    }

    public function menu_events_delete($delete_ID){

        $result = $this->Admin_Model->delete_menu_events_item_data($delete_ID);

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully deleted to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on deleting data to the database.");
        }

        redirect("admin/menu_events", "refresh");

    }


    public function menu_image(){

        $module = $this->system_menu;
        $query = $this->Admin_Model->load_menu_events();
        $module['me_Data'] = $query;
        $query = $this->Admin_Model->load_menu_image();
        $module['mi_Data'] = $query;

        $this->load->view('admin/Menu/CImages', $module );
    }

    public function menu_image_add(){
        $result = $this->Admin_Model->add_menu_image_data();

        if($result['result']==true){

            if (!empty($_FILES['Filename']['name'])) {
                $img_filename = $_FILES['Filename']['name'];
                $field = 'Filename';
                $file_path = './assets/img/';
                $this->do_upload_images($img_filename, $field, $file_path);
            }

            $this->session->set_flashdata("success", "Data successfully added to the database.");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("admin/menu_image", "refresh");
    }

    public function menu_image_edit(){
        $result = $this->Admin_Model->edit_menu_image_data();

        if($result['result']==true){

            if (!empty($_FILES['Filename']['name'])) {
                $img_filename = $_FILES['Filename']['name'];
                $field = 'Filename';
                $file_path = './assets/img/';
                $this->do_upload_images($img_filename, $field, $file_path);
            }

            $this->session->set_flashdata("success", "Data successfully added to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("admin/menu_image", "refresh");
    }

    public function menu_image_delete($delete_ID){

        $result = $this->Admin_Model->delete_menu_image_data($delete_ID);

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully deleted to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on deleting data to the database.");
        }

        redirect("admin/menu_image", "refresh");

    }


    public function menu_package(){

        $module = $this->system_menu;
        $query = $this->Admin_Model->load_menu_events();
        $module['me_Data'] = $query;
        $query = $this->Admin_Model->load_menu_package();
        $module['mi_Data'] = $query;

        $this->load->view('admin/Menu/CPackage', $module );
    }

    public function menu_package_add(){
        $result = $this->Admin_Model->add_menu_package_data();

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully added to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("admin/menu_package", "refresh");
    }

    public function menu_package_edit(){
        $result = $this->Admin_Model->edit_menu_package_data();

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully added to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("admin/menu_package", "refresh");
    }

    public function menu_package_delete($delete_ID){

        $result = $this->Admin_Model->delete_menu_package_data($delete_ID);

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully deleted to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on deleting data to the database.");
        }

        redirect("admin/menu_package", "refresh");

    }



    public function menu_inclusion(){

        $module = $this->system_menu;
        $query = $this->Admin_Model->load_menu_events();
        $module['me_Data'] = $query;
        $query = $this->Admin_Model->load_menu_inclusion();
        $module['mi_Data'] = $query;

        $this->load->view('admin/Menu/CInclusion', $module );
    }

    public function menu_inclusion_add(){
        $result = $this->Admin_Model->add_menu_inclusion_data();

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully added to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("admin/menu_inclusion", "refresh");
    }

    public function menu_inclusion_edit(){
        $result = $this->Admin_Model->edit_menu_inclusion_data();

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully added to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("admin/menu_inclusion", "refresh");
    }

    public function menu_inclusion_delete($delete_ID){

        $result = $this->Admin_Model->delete_menu_inclusion_data($delete_ID);

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully deleted to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on deleting data to the database.");
        }

        redirect("admin/menu_inclusion", "refresh");

    }







    public function new_order(){
        $module = $this->system_menu;
        $query = $this->Admin_Model->load_online_orders();
        $module['ol_Data'] = $query;

        $this->load->view('admin/Transaction/Online', $module );
    }

    public function order_listing($reference){
        $module = $this->system_menu;
        $query = $this->Admin_Model->load_order_list($reference);
        $module['ols_Data'] = $query;

        $this->load->view('admin/Transaction/OrderList', $module );
    }

    public function order_update($reference, $status){
        $result = $this->Admin_Model->update_order_status($reference, $status);

        if($result['result']==true){
            $this->session->set_flashdata("success", "");
        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        if($status == 1){
            redirect("admin/new_order", "refresh");
        }else if($status == 2){
            redirect("admin/processed", "refresh");
        }else{
            redirect("admin/online_order", "refresh");
        }
        
    }


    public function processed(){
        $module = $this->system_menu;
        $query = $this->Admin_Model->load_online_orders();
        $module['ol_Data'] = $query;

        $this->load->view('admin/Transaction/Processed', $module );
    }

    public function delivered(){
        $module = $this->system_menu;
        $query = $this->Admin_Model->load_online_orders();
        $module['ol_Data'] = $query;

        $this->load->view('admin/Transaction/Delivered', $module );
    }



    public function table_reserve(){
        $module = $this->system_menu;
        $query = $this->Admin_Model->load_reservation_table();
        $module['lrt_Data'] = $query;

        $this->load->view('admin/Reservation/Table', $module );
    }

    public function accept_table_reservation($tr){
        $result = $this->Admin_Model->update_table_reservation($tr);

        if($result['result']==true){
            $this->session->set_flashdata("success", "Reservation accepted.");
        } else {
            $this->session->set_flashdata("error", "Error on accepting reservation.");
        }

        redirect("admin/table_reserve", "refresh");
    }

    public function cancel_table_reservation($tr){
        $result = $this->Admin_Model->cancel_table_reservation($tr);

        if($result['result']==true){
            $this->session->set_flashdata("success", "Reservation accepted.");
        } else {
            $this->session->set_flashdata("error", "Error on accepting reservation.");
        }

        redirect("admin/table_reserve", "refresh");
    }

    public function table_reservation_delete($delete_ID){

        $result = $this->Admin_Model->delete_table_reservation($delete_ID);

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully deleted to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on deleting data to the database.");
        }

        redirect("admin/table_reserve", "refresh");

    }


    
    public function catering_listing($reference){
        $module = $this->system_menu;
        $query = $this->Admin_Model->load_cater_list($reference);
        $module['ols_Data'] = $query;

        $this->load->view('admin/Transaction/CateringList', $module );
    }

    public function accept_catering_reservation($reference){
        $result = $this->Admin_Model->update_catering_reservation($reference);

        if($result['result']==true){
            $this->session->set_flashdata("success", "Reservation accepted.");
        } else {
            $this->session->set_flashdata("error", "Error on accepting reservation.");
        }

        redirect("admin/catering_reservation", "refresh");
    }

    public function cancel_catering_reservation($reference){
        $result = $this->Admin_Model->cancel_catering_reservation($reference);

        if($result['result']==true){
            $this->session->set_flashdata("success", "Reservation cancelled.");
        } else {
            $this->session->set_flashdata("error", "Error on accepting reservation.");
        }

        redirect("admin/catering_reservation", "refresh");
    }

    public function delete_catering_reservation($reference){

        $result = $this->Admin_Model->delete_catering_reservation($reference);

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully deleted to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on deleting data to the database.");
        }

        redirect("admin/catering_reservation", "refresh");

    }


    public function change_password(){
        $module = $this->system_menu;

        $this->load->view('admin/Settings/ChangePassword',$module);
    }

    public function update_password(){

        $result = $this->Admin_Model->update_password();

        if($result['result']==true){
            $this->session->set_flashdata("success", "Password successfully change.");
        } else {
            $this->session->set_flashdata("error", "Error on changing the password.");
        }

        redirect("admin/change_password", "refresh");

    }

    public function inbox(){
        $module = $this->system_menu;

        $queryI = $this->Admin_Model->load_inbox_data();
        $module['in_Data'] = $queryI;

        $this->load->view('admin/Message/Inbox',$module);
    }

    public function feedback(){
        $module = $this->system_menu;

        $queryI = $this->Admin_Model->load_feedback_data();
        $module['in_Data'] = $queryI;

        $this->load->view('admin/Message/Feedback',$module);
    }



    public function logout()
    {
        $this->session->sess_destroy();
        redirect("Admin","refresh");
    }


    public function recover_account(){

        $this->form_validation->set_rules('user_pass','New Password','required|min_length[5]|max_length[225]');
        $this->form_validation->set_rules('user_pass_c','Confirm Password','required|matches[user_pass]');

        if($this->form_validation->run() == TRUE){

            $result = $this->Admin_Model->recover_password();

            if($result['result']==TRUE){

                $this->session->set_flashdata("success","Recovery sucess.");
            }else{
                $this->session->set_flashdata("error","Recovery failed.");
            }

            redirect("admin","refresh");

        } else {
            $this->session->set_flashdata("error","Recovery failed.");
            redirect("admin","refresh");
        }
    }


    public function online_order_delete($reference){

        $result = $this->Admin_Model->delete_online_order($reference);

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully deleted to the database.");
        } else {
            $this->session->set_flashdata("error", "Error on deleting data to the database.");
        }

        redirect("admin/online_order", "refresh");

    }

    public function delete_inbox($delete_ID){

        $result = $this->Admin_Model->delete_inbox_data($delete_ID);

        if($result['result']==true){
            $this->session->set_flashdata("success", "The selected inbox has been deleted.");
        } else {
            $this->session->set_flashdata("error", "Error deleting inbox.");
        }

        redirect("admin/inbox", "refresh");

    }

}

