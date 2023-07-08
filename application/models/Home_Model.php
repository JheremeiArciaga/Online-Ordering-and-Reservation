<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home_Model extends CI_Model
{

    public function getMenuCategory(){
        $this->db->select('*');
        $this->db->from('j_menu_category');
        $query = $this->db->get();
        return $query->result();
    }

     public function getMenuFCategory(){
        $this->db->select('*');
        $this->db->from('j_menu_category');
        $this->db->where('m_featured', 1);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getFeaturedMenu(){
        $this->db->select('*');
        $this->db->from('j_menu_item');
        $this->db->where('i_best', 1);
        $this->db->limit(6);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getCompleteMenu(){
        $this->db->select('*');
        $this->db->from('j_menu_item');
        $query = $this->db->get();
        return $query->result();
    }


    public function getMenu($category){
        $this->db->select('*');
        $this->db->from('j_menu_item');
        $this->db->where('i_category', $category);
        $query = $this->db->get();
        return $query->result();
    }

    public function getAbout(){
        $this->db->select('*');
        $this->db->from('a_about');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getContact(){
        $this->db->select('*');
        $this->db->from('a_contact');
        $query = $this->db->get();
        return $query->result();
    }


    public function validate_login()
    {

        $result = array();
        $customer_id = array();
        $customer_fn = array();
        $customer_ln = array();
        $customer_address = array();
        $customer_contact = array();
        $customer_email = array();


        /* ADMIN LOGIN VALIDATION */

        $this->db->where('c_email', $this->input->post("username", TRUE));
        $this->db->where('c_password', $this->input->post("password", TRUE));
        $this->db->where('c_status', 1);

        $admin_account = $this->db->get("customer_account");

        if ($admin_account->num_rows() == 1) {

            $rs = $admin_account->row();
            $result = true;
            $customer_id = $rs->c_no;
            $customer_fn = $rs->c_fname;
            $customer_ln = $rs->c_lname;
            $customer_address = $rs->c_address;
            $customer_contact = $rs->c_contact;
            $customer_email = $rs->c_email;

        } else {
            $result = false;
        }

        return array(
            'success' => $result,
            'customer_id' => $customer_id,
            'customer_fn' => $customer_fn,
            'customer_ln' => $customer_ln,
            'customer_address' => $customer_address,
            'customer_contact' => $customer_contact,
            'customer_email' => $customer_email
        );

    }

    public function add_to_cart_data_home($mnu_no, $quantity, $mnu_price){

        $this->db->where('mnu_no', $mnu_no);
        $this->db->where('web_session', $this->session->web_session);
        $orderlist = $this->db->get("online_orders");
        if($orderlist->num_rows()>0) {

            $orders = $orderlist->row();
            $oldValue = $orders->mnu_qty;

            $UpdateValue = $oldValue + $quantity;

            $this->db->set('mnu_qty', $UpdateValue);

            $this->db->where('mnu_no', $mnu_no);
            $this->db->where('web_session', $this->session->web_session);
            $this->db->update('online_orders');
            $result = ($this->db->affected_rows() != 1) ? false : true;

            return array(
                'result'    => $result
            );

        } else{

            $data = array(
                'web_session'        =>  $this->session->web_session,
                'mnu_no'             =>  $mnu_no,
                'mnu_price'          =>  $mnu_price,
                'mnu_qty'            =>  $quantity
            );

            $result = $this->db->insert('online_orders', $data);
            $result = ($this->db->affected_rows() != 1) ? false : true;

            return array(
                'result'    => $result
            );

        }


    }

    public function remove_item_on_list($websession, $mnuNum){
        $this->db->where('web_session', $websession);
        $this->db->where('mnu_no', $mnuNum);
        $this->db->delete('online_orders');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function transact_order(){

        $data = array(
            'reference_num'         =>  $this->session->web_session,
            'order_datetime'        =>  date(datetimedb),
            'first_name'            =>  $this->input->post('first_name', true),
            'last_name'             =>  $this->input->post('last_name', true),
            'complete_address'      =>  $this->input->post('complete_address', true),
            'nearest_landmark'      =>  $this->input->post('nearest_landmark', true),
            'email_add'             =>  $this->input->post('email_add', true),
            'contact_num'           =>  $this->input->post('contact_num', true),
            'order_notes'           =>  $this->input->post('order_notes', true),
        );

        $result = $this->db->insert('customer_purchase', $data);
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );

    }

    public function update_Order(){

        $this->db->set('mnu_status', 1);

        $this->db->where('web_session', $this->session->web_session);
        $this->db->update('online_orders');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );

    }
    
    public function getCartData(){
        $this->db->select("*");
        $this->db->from('online_orders');
        $this->db->join('j_menu_item', 'j_menu_item.i_no = online_orders.mnu_no');
        $this->db->join('j_menu_category', 'j_menu_category.m_name = j_menu_item.i_category');
        $this->db->where('web_session', $this->session->web_session);
        $this->db->where('mnu_status', 0);
        $query = $this->db->get();
        return $query->result();
    }

    public function add_feedback_data(){

        $dnow = date("Y-m-d H:i:s");

        $data = array(
            'msg_datetime'      =>  $dnow,
            'msg_Name'          =>  $this->input->post('msg_Name', true),
            'msg_Email'         =>  $this->input->post('msg_Email', true),
            'msg_Message'       =>  $this->input->post('msg_Message', true)
        );

        $result = $this->db->insert('message_feedback', $data);
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );

    }


    public function load_online_orders($account){
        $this->db->select('*');
        $this->db->from('customer_purchase');
        $this->db->where('email_add', $account);
        $query = $this->db->get();
        return $query->result();
    }

    public function add_message_data(){

        $dnow = date("Y-m-d H:i:s");

        $data = array(
            'msg_datetime'      =>  $dnow,
            'msg_Name'          =>  $this->input->post('msg_Name', true),
            'msg_Email'         =>  $this->input->post('msg_Email', true),
            'msg_Message'       =>  $this->input->post('msg_Message', true)
        );

        $result = $this->db->insert('message_inbox', $data);
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

    public function gallery_item(){
        $this->db->select("*");
        $this->db->from('j_gallery');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function image_item(){
        $this->db->select("*");
        $this->db->from('j_gallery_item');
        $query = $this->db->get();
        return $query->result();
    }

    public function reserve_table_data(){

        if($this->input->post('rt_count', true) <= 100) {
            $data = array(
                'rt_transdate'        =>  date("Y-m-d"),
                'rt_date'             =>  date(dateformatdb, strtotime($this->input->post('date',TRUE))),
                'rt_time'             =>  $this->input->post('time',TRUE),
                'rt_count'            =>  $this->input->post('rt_count', true),
                'rt_name'             =>  $this->input->post('rt_name', true),
                'rt_contact'          =>  $this->input->post('rt_contact', true),
                'rt_email'            =>  $this->input->post('rt_email', true)
            );

            $result = $this->db->insert('reservation_table', $data);
            $result = ($this->db->affected_rows() != 1) ? false : true;
        } else {
            $result= false;
        }

        return array(
            'result'    => $result
        );

    }

    

}