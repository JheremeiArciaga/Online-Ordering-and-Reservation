<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 * 
	 */

	function __construct(){

        parent::__construct();
        $this->load->model('Home_Model');
    }


	public function login(){
		$query = $this->Home_Model->getMenuCategory();
        $data['categoryMenu'] = $query;
		$query = $this->Home_Model->getContact();
        $data['contact'] = $query;

		$this->load->view('Login', $data);
	}

	public function index()
	{
		$query = $this->Home_Model->getMenuCategory();
        $data['categoryMenu'] = $query;
		$query = $this->Home_Model->getMenuFCategory();
        $data['categoryFMenu'] = $query;
		$query = $this->Home_Model->getFeaturedMenu();
        $data['featuredMenu'] = $query;
		$query = $this->Home_Model->getCompleteMenu();
        $data['Menu'] = $query;
		$query = $this->Home_Model->getContact();
        $data['contact'] = $query;

		$this->load->view('Home', $data);
	}
	
	public function menu($category)
	{
		$query = $this->Home_Model->getMenuCategory();
        $data['categoryMenu'] = $query;
		$data['category'] = $category;
		$query = $this->Home_Model->getMenu($category);
        $data['cMenu'] = $query;
		$query = $this->Home_Model->getContact();
        $data['contact'] = $query;
        $data['mCategory'] = $category;
		$this->load->view('Menu', $data);
	}

    public function about()
	{
		$query = $this->Home_Model->getMenuCategory();
        $data['categoryMenu'] = $query;
		$query = $this->Home_Model->getContact();
        $data['contact'] = $query;
        $query = $this->Home_Model->getAbout();
        $data['about'] = $query;

		$this->load->view('About', $data);
	}

	public function contact()
	{
		$query = $this->Home_Model->getMenuCategory();
        $data['categoryMenu'] = $query;
		$query = $this->Home_Model->getContact();
        $data['contact'] = $query;
        
		$this->load->view('Contact', $data);
	}

    public function gallery(){
        $query = $this->Home_Model->getMenuCategory();
        $data['categoryMenu'] = $query;
		$query = $this->Home_Model->getContact();
        $data['contact'] = $query;

        $query = $this->Home_Model->gallery_item();
        $data['galleryData'] = $query;
        $query = $this->Home_Model->image_item();
        $data['imageData'] = $query;
        
		$this->load->view('Gallery', $data);
    }



    public function profile()
	{
		$query = $this->Home_Model->getMenuCategory();
        $data['categoryMenu'] = $query;
		$query = $this->Home_Model->getContact();
        $data['contact'] = $query;
        
		$this->load->view('Profile', $data);
	}

    public function message()
	{
		$query = $this->Home_Model->getMenuCategory();
        $data['categoryMenu'] = $query;
		$query = $this->Home_Model->getContact();
        $data['contact'] = $query;
        
		$this->load->view('Message', $data);
	}

     public function reservation()
	{
		$query = $this->Home_Model->getMenuCategory();
        $data['categoryMenu'] = $query;
		$query = $this->Home_Model->getContact();
        $data['contact'] = $query;
        
		$this->load->view('Reservation', $data);
	}

     public function order()
	{
		$query = $this->Home_Model->getMenuCategory();
        $data['categoryMenu'] = $query;
		$query = $this->Home_Model->getContact();
        $data['contact'] = $query;


        $account = $this->session->customer_email;
        $query = $this->Home_Model->load_online_orders($account);
        $data['ol_Data'] = $query;

		$this->load->view('Orders', $data);
	}

    public function order_listing($reference){
        
        $query = $this->Home_Model->getMenuCategory();
        $data['categoryMenu'] = $query;
		$query = $this->Home_Model->getContact();
        $data['contact'] = $query;

        $query = $this->Home_Model->load_order_list($reference);
        $data['ols_Data'] = $query;

        $this->load->view('OrderList', $data);
    }




	public function validate_login()
    {

        $this->form_validation->set_rules('username', 'Username', 'required|max_length[225]');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[225]');

        if ($this->form_validation->run() == TRUE) {

            $result = $this->Home_Model->validate_login();

            if ($result['success'] == TRUE) {

                $account_data = array(
                    'customer_id' => $result['customer_id'],
                    'customer_fn' => $result['customer_fn'],
                    'customer_ln' => $result['customer_ln'],
                    'customer_address' => $result['customer_address'],
                    'customer_contact' => $result['customer_contact'],
                    'customer_email' => $result['customer_email'],
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($account_data);

                $this->session->set_flashdata("success", "login sucess");

                redirect("home", "refresh");


            } else {

                $message = "Invalid customer account.";
                echo "<script type='text/javascript'>alert('$message');</script>";
                redirect("Home/login", "refresh");

            }

            if ($result['success'] == FALSE) {
                $message = "Invalid customer account.";
                echo "<script type='text/javascript'>alert('$message');</script>";
                redirect("Home/login", "refresh");
            }


        }

    }

	public function logout(){

        $this->session->sess_destroy();
        redirect("home", "refresh");

    }

	public function add_to_cart_home($mnu_no, $quantity, $mnu_price){
        $result = $this->Home_Model->add_to_cart_data_home($mnu_no, $quantity, $mnu_price);

        if($result['result']==true){
            $message = "Order successfully sent to cart.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else {

            $message = "Error on saving order.";
            echo "<script type='text/javascript'>alert('$message');</script>";

        }

        redirect("Home", "refresh");
    }

    public function add_to_cart_menu($mnu_no, $quantity, $mnu_price, $category){
        $result = $this->Home_Model->add_to_cart_data_home($mnu_no, $quantity, $mnu_price);

        if($result['result']==true){
            $message = "Order successfully sent to cart.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else {

            $message = "Error on saving order.";
            echo "<script type='text/javascript'>alert('$message');</script>";

        }

        redirect("Home/menu/".$category, "refresh");
    }


    public function removeitem($websession, $mnuNum){
        $result = $this->Home_Model->remove_item_on_list($websession, $mnuNum);

        if($result['result']==true){

            $message = "Item successfully remove in the order list.";
            echo "<script type='text/javascript'>alert('$message');</script>";

        } else {

            $message = "Error on removing item.";
            echo "<script type='text/javascript'>alert('$message');</script>";

        }

        redirect("home/cart", "refresh");

    }

    public function transact_online_order(){

        $result = $this->Home_Model->transact_order();

        if($result['result']==true){

            $resultv2 = $this->Home_Model->update_Order();

            $message = "Order successfully saved. Our staff will call you 15 to 30 minutes after we receive your request to confirm your order.";
            echo "<script type='text/javascript'>alert('$message');</script>";

        } else {

            $message = "Error on saving order.";
            echo "<script type='text/javascript'>alert('$message');</script>";

        }

        redirect("home", "refresh");
    }


	public function cart()
	{
        $query = $this->Home_Model->getMenuCategory();
        $data['categoryMenu'] = $query;
		$query = $this->Home_Model->getCartData();
        $data['cartData'] = $query;
        $query = $this->Home_Model->getContact();
        $data['contact'] = $query;

		$this->load->view('Cart', $data);
	}

	public function checkout()
	{
        $query = $this->Home_Model->getMenuCategory();
        $data['categoryMenu'] = $query;
        $query = $this->Home_Model->getContact();
        $data['contact'] = $query;
        $query = $this->Home_Model->getCartData();
        $data['cartData'] = $query;
		$this->load->view('Checkout', $data);
	}

    public function add_new_feedback(){

        $result = $this->Home_Model->add_feedback_data();

        if($result['result']==true){
            $message = "Feedback successfully sent.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else {
            $message = "Error on sending the feedback.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }

        redirect("home/contact", "refresh");

    }

    public function add_new_message(){

        $result = $this->Home_Model->add_message_data();

        if($result['result']==true){
            $message = "Feedback successfully sent.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else {
            $message = "Error on sending the feedback.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }

        redirect("home/contact", "refresh");

    }

    public function reserve_table(){

         $result = $this->Home_Model->reserve_table_data();

        if($result['result']==true){

            $message = "Table reservation successfully sent. Our staff will call you 15 to 30 minutes after we receive your request to confirm your reservation.";
            echo "<script type='text/javascript'>alert('$message');</script>";

        } else {

            $message = "Error on sending table reservation.";
            echo "<script type='text/javascript'>alert('$message');</script>";

        }

        redirect("home/reservation", "refresh");

    }


    

}