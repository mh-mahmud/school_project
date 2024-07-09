<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Library_controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	public function create_book_category($data=null) {

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'create_book_category');
		$this->webspice->permission_verify('create_book_category');
		if( !isset($data['edit']) ){
			$data['edit'] = array(
				'BOOK_CATEGORY_ID'=>null,
				'CATEGORY_NAME'=>null,
				'CATEGORY_DETAILS' => null
			);
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('category_name','category name','required|trim|xss_clean|max_length[200]|min_length[3]');
		
		if( !$this->form_validation->run() ){
			$this->load->view('admin/library/create_book_category', $data);
			return FALSE;
		}

		# get input post
		$input = $this->webspice->get_input('book_category_id');

		//dd($input);
		//die();

		#duplicate test
		$this->webspice->db_field_duplicate_test("SELECT * FROM book_category WHERE CATEGORY_NAME=?", array( $input->category_name), 'You are not allowed to enter duplicate book category name', 'BOOK_CATEGORY_ID', $input->book_category_id, $data, 'admin/library/create_book_category');
		
		# remove cache
		$this->webspice->remove_cache('book_category');

		# update process
		if( $input->book_category_id ){

			$sql = "
			UPDATE book_category SET CATEGORY_NAME=?, CATEGORY_DETAILS=?, UPDATED_BY=?,UPDATED_DATE=?
			WHERE BOOK_CATEGORY_ID=?";
			$this->db->query($sql, array($input->category_name,$input->category_details,$this->webspice->get_user_id(),$this->webspice->now(), $input->book_category_id));
			$this->webspice->message_board('Record has been updated!');
			$this->webspice->log_me('class_updated - '.$this->webspice->get_user_id()); # log activities
			$this->webspice->force_redirect($url_prefix.'manage_book_category');
			return false;
		}
		
		#insert category

		$sql = "
		INSERT INTO book_category
		(CATEGORY_NAME, CATEGORY_DETAILS, CREATED_BY,CREATED_DATE,STATUS)
		VALUES
		( ?, ?, ?, ?, 7)";
		$this->db->query($sql, array($input->category_name,$input->category_details,
			$this->webspice->get_user_id(),$this->webspice->now()));

		if( !$this->db->insert_id() ){
			$this->webspice->message_board('We could not execute your request. Please tray again later or report to authority.');
			$this->webspice->force_redirect($url_prefix . 'admin');
			return false;
		}

		$this->webspice->message_board('Record inserted successfully!');
		if($this->webspice->permission_verify('manage_book_category',TRUE)){
			$this->webspice->force_redirect($url_prefix . 'manage_book_category');
			return FALSE;
		}
		$this->webspice->force_redirect($url_prefix.'create_book_category');

	}

	public function manage_book_category() {

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'manage_book_category');
		$this->webspice->permission_verify('manage_book_category');

		$this->load->database();
		$orderby = 'ORDER BY book_category.CATEGORY_NAME ASC';
		$groupby = null;
		$where = '';
		$page_index = 0;
		$no_of_record = 20000;
		$limit = ' LIMIT '.$no_of_record;
		$filter_by = 'Last Created';
		$data['pager'] = null;
		$criteria = $this->uri->segment(2);
		$key = $this->uri->segment(3);
		if ($criteria == 'page') {
			$page_index = (int)$key;
			$page_index < 0 ? $page_index=0 : $page_index=$page_index;
		}

		$initialSQL = "
		SELECT  * FROM book_category ";


		# filtering records
		if( $this->input->post('filter') ){
			$result = $this->webspice->filter_generator(
				$TableName = 'book_category',
				$InputField = array(),
				$Keyword = array('CATEGORY_NAME'),
				$AdditionalWhere = null,
				$DateBetween = null
			);

			$result['where'] ? $where = $result['where'] : $where=$where;
			$result['filter'] ? $filter_by = $result['filter'] : $filter_by=$filter_by;
		}

		# action area
		switch ($criteria) {

			case 'print':
			case 'csv':
				if( !isset($_SESSION['sql']) || !$_SESSION['sql'] ){
					$_SESSION['sql'] = $initialSQL . $where . $orderby;
					$_SESSION['filter_by'] = $filter_by;
				}

				$record = $this->db->query( substr($_SESSION['sql'], 0, stripos($_SESSION['sql'],'LIMIT')) );
				$data['get_record'] = $record->result();
				$data['filter_by'] = $_SESSION['filter_by'];



				$this->load->view('admin/print_report/library/print_book_category',$data);
				return false;
				break;

			case 'pdf':
				if( !isset($_SESSION['sql']) || !$_SESSION['sql'] ){
					$_SESSION['sql'] = $initialSQL . $where . $orderby;
					$_SESSION['filter_by'] = $filter_by;
				}

				$record = $this->db->query( substr($_SESSION['sql'], 0, stripos($_SESSION['sql'],'LIMIT')) );
				$data['get_record'] = $record->result();
				$data['filter_by'] = $_SESSION['filter_by'];
				// dd($data);
				$rand = substr( md5(rand()), 0, 15);
				// dd($rand);
				$pdfFilePath = "$rand.pdf";
				$html = $this->load->view('admin/print_report/library/print_book_category', $data, true);
				$this->load->library('pdf');
				$pdf = $this->pdf->load();
				$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822));
				$pdf->WriteHTML($html); // write the HTML into the PDF
				$pdf->Output($pdfFilePath, 'D');
				// dd($pdfFilePath);

				return false;
			break;

			case 'edit':
				//dd($this->webspice->encrypt_decrypt($key, 'decrypt'));
				$this->webspice->edit_generator($TableName='book_category', $KeyField='BOOK_CATEGORY_ID', $key, $RedirectController='library_controller', $RedirectFunction='create_book_category', $PermissionName='manage_book_category', $StatusCheck=null, $Log='edit_book_category');
				return false;
				break;

			case 'inactive':			
				$this->webspice->action_executer($TableName='book_category', $KeyField='BOOK_CATEGORY_ID', $key, $RedirectURL='manage_book_category', $PermissionName='manage_book_category', $StatusCheck=7, $ChangeStatus=-7, $RemoveCache='book_category', $Log='inactive_book_category');
				return false;
				break;

			case 'active':
				$this->webspice->action_executer($TableName='book_category', $KeyField='BOOK_CATEGORY_ID', $key, $RedirectURL='manage_book_category', $PermissionName='manage_book_category', $StatusCheck=-7, $ChangeStatus=7, $RemoveCache='book_category', $Log='active_book_catagory');
				return false;
				break;

			case 'delete':
				$id = $this->webspice->encrypt_decrypt($key, 'decrypt');
				$sql = $this->db->query("DELETE FROM book_category WHERE BOOK_CATEGORY_ID='".$id."' LIMIT 1");
				if($sql) {
					$this->webspice->force_redirect($url_prefix.'manage_book_category');
				}
				return false;
			break;
		}

		# default
		$sql = $initialSQL . $where . $groupby . $orderby . $limit;

		# only for pager
		if( $criteria == 'page' ){
			if( !isset($_SESSION['sql']) || !$_SESSION['sql'] ){
				$sql = $sql;
			}
			$limit = sprintf("LIMIT %d, %d", $page_index, $no_of_record);		# this is to avoid SQL Injection
			$sql = substr($_SESSION['sql'], 0, strpos($_SESSION['sql'],'LIMIT'));
			$sql = $sql . $limit;
		}

		# load all records
		if( !$this->input->post('filter') ){
			$count_data = $this->db->query( substr($sql,0,strpos($sql,'LIMIT')) );
			$count_data = $count_data->result();
			$data['pager'] = $this->webspice->pager( count($count_data), $no_of_record, $page_index, $url_prefix.'manage_book_category/page/', 10 );	
		}

		$_SESSION['sql'] = $sql;
		$_SESSION['filter_by'] = $filter_by;
		$result = $this->db->query($sql)->result();

		$data['get_record'] = $result;
		$data['filter_by'] = $filter_by;

		$this->load->view('admin/library/manage_book_category', $data);

	}

	public function create_writer($data=null) {

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'create_writer');
		$this->webspice->permission_verify('create_writer');
		if( !isset($data['edit']) ){
			$data['edit'] = array(
				'WRITER_ID'=>null,
				'BOOK_CATEGORY_ID'=>null,
				'WRITER_NAME'=>null,
				'COUNTRY_NAME'=>null,
				'DATE_OF_BIRTH'=>null,
				'DATE_OF_DEATH'=>null,
				'FULL_ADDRESS'=>null,
				'ACHIEVEMENT'=>null,
				'EDUCATIONAL_DETAILS'=>null,
				'MARITAL_STATUS'=>null,
				'SPOUSE_NAME'=>null,
				'FATHER_NAME'=>null,
				'MOTHER_NAME'=>null,
				'CHILDREN_DETAILS'=>null,
				'IMAGES'=>null
			);
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('book_category_id','Book Category name','required|trim|xss_clean|max_length[200]');
		$this->form_validation->set_rules('writer_name','writer name','required|trim|xss_clean|max_length[200]');
		$this->form_validation->set_rules('date_of_birth','date of birth','required|trim|xss_clean|max_length[200]');
		
		if( !$this->form_validation->run() ){
			$this->load->view('admin/library/create_writer', $data);
			return FALSE;
		}

		# get input post
		$input = $this->webspice->get_input('writer_id');

		//dd($_FILES);
		//dd($input);
		
		#duplicate test
		$this->webspice->db_field_duplicate_test("SELECT * FROM book_writer WHERE WRITER_NAME=? AND BOOK_CATEGORY_ID=?", array( $input->writer_name, $input->book_category_id), 'You are not allowed to enter duplicate writer name', 'WRITER_ID', $input->writer_id, $data, 'admin/library/create_writer');
		
		# remove cache
		$this->webspice->remove_cache('book_writer');

		# update process
		if( $input->writer_id ){

			$sql = "
			UPDATE book_writer SET BOOK_CATEGORY_ID=?, WRITER_NAME=?, COUNTRY_NAME=?, DATE_OF_BIRTH=?, DATE_OF_DEATH=?, FULL_ADDRESS=?, ACHIEVEMENT=?, EDUCATIONAL_DETAILS=?, MARITAL_STATUS=?, SPOUSE_NAME=?, FATHER_NAME=?, MOTHER_NAME=?, CHILDREN_DETAILS=?, IMAGES=?, UPDATED_BY=?,UPDATED_DATE=?
			WHERE WRITER_ID=?";
			$this->db->query($sql, array($input->book_category_id, $input->writer_name, $input->country_name,  date("Y-m-d", strtotime($input->date_of_birth)),  date("Y-m-d", strtotime($input->date_of_death)), $input->full_address,$input->achievement, $input->educational_details, $input->marital_status, $input->spouse_name, $input->father_name, $input->mother_name, $input->children_details, $_FILES['images']['name'], $this->webspice->get_user_id(),$this->webspice->now(), $input->writer_id));
			$this->webspice->process_image_single('images',$input->writer_id, 'writer_full', 750, 1000);
			$this->webspice->message_board('Record has been updated!');
			$this->webspice->log_me('section_updated - '.$this->webspice->get_user_id()); # log activities
			$this->webspice->force_redirect($url_prefix.'manage_writer');
			return false;
		}
		
		#insert section

		$sql = "
		INSERT INTO book_writer
		(BOOK_CATEGORY_ID, WRITER_NAME, COUNTRY_NAME, DATE_OF_BIRTH, DATE_OF_DEATH, FULL_ADDRESS, ACHIEVEMENT, EDUCATIONAL_DETAILS, MARITAL_STATUS, SPOUSE_NAME, FATHER_NAME, MOTHER_NAME, CHILDREN_DETAILS, IMAGES, CREATED_BY,CREATED_DATE,STATUS)
		VALUES
		( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 7)";
		$this->db->query($sql, array($input->book_category_id, $input->writer_name, $input->country_name, date("Y-m-d", strtotime($input->date_of_birth)), date("Y-m-d", strtotime($input->date_of_death)), $input->full_address, $input->achievement,  $input->educational_details,  $input->marital_status, $input->spouse_name,   $input->father_name,  $input->mother_name,  $input->children_details, $_FILES['images']['name'],
			$this->webspice->get_user_id(),$this->webspice->now()));
		$this->webspice->process_image_single('images',$this->db->insert_id(), 'writer_full', 750, 1000);

		if( !$this->db->insert_id() ){
			$this->webspice->message_board('We could not execute your request. Please tray again later or report to authority.');
			$this->webspice->force_redirect($url_prefix . 'admin');
			return false;
		}

		$this->webspice->message_board('Record inserted successfully!');
		if($this->webspice->permission_verify('manage_writer',TRUE)){
			$this->webspice->force_redirect($url_prefix . 'manage_writer');
			return FALSE;
		}
		$this->webspice->force_redirect($url_prefix.'create_writer');

	}

	public function manage_writer() {

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'manage_writer');
		$this->webspice->permission_verify('manage_writer');

		$this->load->database();
		$orderby = 'ORDER BY book_writer.WRITER_NAME ASC';
		$groupby = null;
		$where = '';
		$page_index = 0;
		$no_of_record = 200000;
		$limit = ' LIMIT '.$no_of_record;
		$filter_by = 'Last Created';
		$data['pager'] = null;
		$criteria = $this->uri->segment(2);
		$key = $this->uri->segment(3);
		if ($criteria == 'page') {
			$page_index = (int)$key;
			$page_index < 0 ? $page_index=0 : $page_index=$page_index;
		}

		$initialSQL = "
		SELECT  * FROM book_writer ";


		# filtering records
		if( $this->input->post('filter') ){
			$result = $this->webspice->filter_generator(
				$TableName = 'book_writer',
				$InputField = array(),
				$Keyword = array('WRITER_NAME'),
				$AdditionalWhere = null,
				$DateBetween = null
			);

			$result['where'] ? $where = $result['where'] : $where=$where;
			$result['filter'] ? $filter_by = $result['filter'] : $filter_by=$filter_by;
		}

		# action area
		switch ($criteria) {
			case 'print':
			case 'csv':
				if( !isset($_SESSION['sql']) || !$_SESSION['sql'] ){
					$_SESSION['sql'] = $initialSQL . $where . $orderby;
					$_SESSION['filter_by'] = $filter_by;
				}

				$record = $this->db->query( substr($_SESSION['sql'], 0, stripos($_SESSION['sql'],'LIMIT')) );
				$data['get_record'] = $record->result();
				$data['filter_by'] = $_SESSION['filter_by'];



				$this->load->view('admin/print_report/library/print_writer',$data);
				return false;
				break;

			case 'pdf':
				if( !isset($_SESSION['sql']) || !$_SESSION['sql'] ){
					$_SESSION['sql'] = $initialSQL . $where . $orderby;
					$_SESSION['filter_by'] = $filter_by;
				}

				$record = $this->db->query( substr($_SESSION['sql'], 0, stripos($_SESSION['sql'],'LIMIT')) );
				$data['get_record'] = $record->result();
				$data['filter_by'] = $_SESSION['filter_by'];
				// dd($data);
				$rand = substr( md5(rand()), 0, 15);
				// dd($rand);
				$pdfFilePath = "$rand.pdf";
				$html = $this->load->view('admin/print_report/library/print_writer', $data, true);
				$this->load->library('pdf');
				$pdf = $this->pdf->load();
				$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822));
				$pdf->WriteHTML($html); // write the HTML into the PDF
				$pdf->Output($pdfFilePath, 'D');
				// dd($pdfFilePath);

				return false;
			break;

			case 'edit':
				$this->webspice->edit_generator($TableName='book_writer', $KeyField='WRITER_ID', $key, $RedirectController='library_controller', $RedirectFunction='create_writer', $PermissionName='manage_writer', $StatusCheck=null, $Log='edit_section');
				return false;
				break;

			case 'inactive':
				$this->webspice->action_executer($TableName='book_writer', $KeyField='WRITER_ID', $key, $RedirectURL='manage_writer', $PermissionName='manage_writer', $StatusCheck=7, $ChangeStatus=-7, $RemoveCache='book_writer', $Log='inactive_section');
				return false;
				break;

			case 'active':
				$this->webspice->action_executer($TableName='book_writer', $KeyField='WRITER_ID', $key, $RedirectURL='manage_writer', $PermissionName='manage_writer', $StatusCheck=-7, $ChangeStatus=7, $RemoveCache='book_writer', $Log='active_section');
				return false;
				break;

			case 'delete':
				$id = $this->webspice->encrypt_decrypt($key, 'decrypt');
				$sql = $this->db->query("DELETE FROM book_writer WHERE WRITER_ID='".$id."' LIMIT 1");
				if($sql) {
					$this->webspice->force_redirect($url_prefix.'manage_writer');
				}
				return false;
			break;
		}

		# default
		$sql = $initialSQL . $where . $groupby . $orderby . $limit;

		# only for pager
		if( $criteria == 'page' ){
			if( !isset($_SESSION['sql']) || !$_SESSION['sql'] ){
				$sql = $sql;
			}
			$limit = sprintf("LIMIT %d, %d", $page_index, $no_of_record);		# this is to avoid SQL Injection
			$sql = substr($_SESSION['sql'], 0, strpos($_SESSION['sql'],'LIMIT'));
			$sql = $sql . $limit;
		}

		# load all records
		if( !$this->input->post('filter') ){
			$count_data = $this->db->query( substr($sql,0,strpos($sql,'LIMIT')) );
			$count_data = $count_data->result();
			$data['pager'] = $this->webspice->pager( count($count_data), $no_of_record, $page_index, $url_prefix.'manage_writer/page/', 10 );	
		}

		$_SESSION['sql'] = $sql;
		$_SESSION['filter_by'] = $filter_by;
		$result = $this->db->query($sql)->result();

		$data['get_record'] = $result;
		$data['filter_by'] = $filter_by;

		$this->load->view('admin/library/manage_writer', $data);

	}

	public function add_book($data=null) {

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'add_book');
		$this->webspice->permission_verify('add_book');
		if( !isset($data['edit']) ){
			$data['edit'] = array(
				'BOOK_ID'=>null,
				'BOOK_CATEGORY_ID'=>null,
				'WRITER_ID'=>null,
				'BOOK_NAME'=>null,
				'BOOK_DESCRIPTION'=>null,
				'BOOK_CODE'=>null,
				'ISBN_NO'=>null,
				'NUMBER_OF_COPIES'=>null,
				'BOOK_LOCATION'=>null,
				'EDITION_NO'=>null,
				'EDITION_YEAR'=>null,
				'IMAGES'=>null
			);
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('book_category_id','Book Category name','required|trim|xss_clean|max_length[200]');
		$this->form_validation->set_rules('writer_id','writer name','required|trim|xss_clean|max_length[200]');
		$this->form_validation->set_rules('book_name','book name','required|trim|xss_clean|max_length[200]');
		$this->form_validation->set_rules('number_of_copies','number of copies','required|trim|xss_clean|max_length[200]');
		
		if( !$this->form_validation->run() ){
			$this->load->view('admin/library/add_book', $data);
			return FALSE;
		}

		# get input post
		$input = $this->webspice->get_input('book_id');

		//dd($_FILES);
		//dd($input);
		
		// #duplicate test
		// $this->webspice->db_field_duplicate_test("SELECT * FROM books WHERE WRITER_ID=? AND BOOK_CATEGORY_ID=? AND BOOK_NAME=?", array( $input->writer_id, $input->book_category_id, $input->book_name), 'You are not allowed to enter duplicate writer name', 'WRITER_ID', $input->book_id, $data, 'admin/library/add_book');
		
		# remove cache
		$this->webspice->remove_cache('books');

		# update process
		if( $input->book_id ){

			$sql = "
			UPDATE books SET BOOK_CATEGORY_ID=?, WRITER_ID=?, BOOK_NAME=?, BOOK_DESCRIPTION=?, BOOK_CODE=?, ISBN_NO=?, NUMBER_OF_COPIES=?, BOOK_LOCATION=?, EDITION_NO=?, EDITION_YEAR=?, IMAGES=?, UPDATED_BY=?,UPDATED_DATE=?
			WHERE BOOK_ID=?";
			$this->db->query($sql, array($input->book_category_id, $input->writer_id, $input->book_name, $input->book_description, $input->book_code, $input->isbn_no, $input->number_of_copies, $input->book_location, $input->edition_no, date("Y-m-d", strtotime($input->edition_year)), $_FILES['images']['name'], $this->webspice->get_user_id(),$this->webspice->now(), $input->book_id));
			$this->webspice->process_image_single('images',$input->book_id, 'book_full', 750, 1000);
			$this->webspice->message_board('Record has been updated!');
			$this->webspice->log_me('section_updated - '.$this->webspice->get_user_id()); # log activities
			$this->webspice->force_redirect($url_prefix.'manage_book');
			return false;
		}
		
		#insert section

		$sql = "
		INSERT INTO books
		(BOOK_CATEGORY_ID, WRITER_ID, BOOK_NAME, BOOK_DESCRIPTION, BOOK_CODE, ISBN_NO, NUMBER_OF_COPIES, BOOK_LOCATION, EDITION_NO, EDITION_YEAR, IMAGES, CREATED_BY,CREATED_DATE,STATUS)
		VALUES
		(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 7)";
		$this->db->query($sql, array($input->book_category_id, $input->writer_id, $input->book_name, $input->book_description, $input->book_code, $input->isbn_no,  $input->number_of_copies,  $input->book_location, $input->edition_no, date("Y-m-d", strtotime($input->edition_year)), $_FILES['images']['name'],
			$this->webspice->get_user_id(),$this->webspice->now()));
		$this->webspice->process_image_single('images',$this->db->insert_id(), 'book_full', 750, 1000);

		if( !$this->db->insert_id() ){
			$this->webspice->message_board('We could not execute your request. Please tray again later or report to authority.');
			$this->webspice->force_redirect($url_prefix . 'admin');
			return false;
		}

		$this->webspice->message_board('Record inserted successfully!');
		if($this->webspice->permission_verify('manage_book',TRUE)){
			$this->webspice->force_redirect($url_prefix . 'manage_book');
			return FALSE;
		}
		$this->webspice->force_redirect($url_prefix.'add_book');

	}
	public function manage_book() {

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'manage_book');
		$this->webspice->permission_verify('manage_book');

		$this->load->database();
		$orderby = 'ORDER BY books.BOOK_NAME ASC';
		$groupby = null;
		$where = '';
		$page_index = 0;
		$no_of_record = 200000;
		$limit = ' LIMIT '.$no_of_record;
		$filter_by = 'Last Created';
		$data['pager'] = null;
		$criteria = $this->uri->segment(2);
		$key = $this->uri->segment(3);
		if ($criteria == 'page') {
			$page_index = (int)$key;
			$page_index < 0 ? $page_index=0 : $page_index=$page_index;
		}

		$initialSQL = "
		SELECT  * FROM books ";


		# filtering records
		if( $this->input->post('filter') ){
			$result = $this->webspice->filter_generator(
				$TableName = 'books',
				$InputField = array(),
				$Keyword = array('BOOK_NAME'),
				$AdditionalWhere = null,
				$DateBetween = null
			);

			$result['where'] ? $where = $result['where'] : $where=$where;
			$result['filter'] ? $filter_by = $result['filter'] : $filter_by=$filter_by;
		}

		# action area
		switch ($criteria) {
			case 'print':
			case 'csv':
				if( !isset($_SESSION['sql']) || !$_SESSION['sql'] ){
					$_SESSION['sql'] = $initialSQL . $where . $orderby;
					$_SESSION['filter_by'] = $filter_by;
				}

				$record = $this->db->query( substr($_SESSION['sql'], 0, stripos($_SESSION['sql'],'LIMIT')) );
				$data['get_record'] = $record->result();
				$data['filter_by'] = $_SESSION['filter_by'];



				$this->load->view('admin/print_report/settings/print_section',$data);
				return false;
				break;

			case 'pdf':
				if( !isset($_SESSION['sql']) || !$_SESSION['sql'] ){
					$_SESSION['sql'] = $initialSQL . $where . $orderby;
					$_SESSION['filter_by'] = $filter_by;
				}

				$record = $this->db->query( substr($_SESSION['sql'], 0, stripos($_SESSION['sql'],'LIMIT')) );
				$data['get_record'] = $record->result();
				$data['filter_by'] = $_SESSION['filter_by'];
				// dd($data);
				$rand = substr( md5(rand()), 0, 15);
				// dd($rand);
				$pdfFilePath = "$rand.pdf";
				$html = $this->load->view('admin/print_report/settings/print_section', $data, true);
				$this->load->library('pdf');
				$pdf = $this->pdf->load();
				$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822));
				$pdf->WriteHTML($html); // write the HTML into the PDF
				$pdf->Output($pdfFilePath, 'D');
				// dd($pdfFilePath);

				return false;
			break;

			case 'edit':
				$this->webspice->edit_generator($TableName='books', $KeyField='BOOK_ID', $key, $RedirectController='library_controller', $RedirectFunction='add_book', $PermissionName='manage_book', $StatusCheck=null, $Log='edit_section');
				return false;
				break;

			case 'inactive':
				$this->webspice->action_executer($TableName='books', $KeyField='BOOK_ID', $key, $RedirectURL='manage_book', $PermissionName='manage_book', $StatusCheck=7, $ChangeStatus=-7, $RemoveCache='books', $Log='inactive_section');
				return false;
				break;

			case 'active':
				$this->webspice->action_executer($TableName='books', $KeyField='BOOK_ID', $key, $RedirectURL='manage_book', $PermissionName='manage_book', $StatusCheck=-7, $ChangeStatus=7, $RemoveCache='books', $Log='active_section');
				return false;
				break;

			case 'delete':
				$id = $this->webspice->encrypt_decrypt($key, 'decrypt');
				$sql = $this->db->query("DELETE FROM books WHERE BOOK_ID='".$id."' LIMIT 1");
				if($sql) {
					$this->webspice->force_redirect($url_prefix.'manage_book');
				}
				return false;
			break;
		}

		# default
		$sql = $initialSQL . $where . $groupby . $orderby . $limit;

		# only for pager
		if( $criteria == 'page' ){
			if( !isset($_SESSION['sql']) || !$_SESSION['sql'] ){
				$sql = $sql;
			}
			$limit = sprintf("LIMIT %d, %d", $page_index, $no_of_record);		# this is to avoid SQL Injection
			$sql = substr($_SESSION['sql'], 0, strpos($_SESSION['sql'],'LIMIT'));
			$sql = $sql . $limit;
		}

		# load all records
		if( !$this->input->post('filter') ){
			$count_data = $this->db->query( substr($sql,0,strpos($sql,'LIMIT')) );
			$count_data = $count_data->result();
			$data['pager'] = $this->webspice->pager( count($count_data), $no_of_record, $page_index, $url_prefix.'manage_book/page/', 10 );	
		}

		$_SESSION['sql'] = $sql;
		$_SESSION['filter_by'] = $filter_by;
		$result = $this->db->query($sql)->result();

		$data['get_record'] = $result;
		$data['filter_by'] = $filter_by;

		$this->load->view('admin/library/manage_book', $data);

	}

	public function add_library_member($data=null){

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'add_library_member');
		// $this->webspice->permission_verify('add_library_member');
		// dd("Hello");
		if( !isset($data['edit']) ){
			$data['edit'] = array(
				'LIBRARY_MEMBER_ID'=>null,
				'CLASS_ID'=>null,
				'SECTION_ID'=>null,
				'STUDENT_DATA_ID'=>null,
				'ROLL_NO' => null,
				'YEAR' => null
			);
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('class_id','class name','required|trim|xss_clean');
		$this->form_validation->set_rules('section_id','section name','required|trim|xss_clean');
		$this->form_validation->set_rules('student_data_id','student name','required|trim|xss_clean');
		if( !$this->form_validation->run() ){
			$this->load->view('admin/library/add_library_member', $data);
			return FALSE;
		}

		// dd($_FILES);

		# get input post
		$input = $this->webspice->get_input('library_member_id');
		$roll_no = $this->db->query("SELECT STUDENT_DATA_ID, ROLL_NO FROM student_data WHERE STUDENT_DATA_ID=". $this->input->post("student_data_id"))->row_array();
		//dd($roll_no);
		
		#duplicate test
		$this->webspice->db_field_duplicate_test("SELECT * FROM library_member WHERE CLASS_ID=? AND SECTION_ID=? AND STUDENT_DATA_ID=? AND YEAR=?" , array($input->class_id, $input->section_id, $input->student_data_id, date("Y")), 'You are not allowed to add a duplicate library member name', 'LIBRARY_MEMBER_ID', $input->library_member_id, $data, 'admin/library/add_library_member');
		
		# remove cache
		$this->webspice->remove_cache('library_member');

		# update process
		if( $input->library_member_id ){

			$sql = "
			UPDATE library_member SET CLASS_ID=?, SECTION_ID=?, STUDENT_DATA_ID=?, ROLL_NO=?, YEAR=?, UPDATED_BY=?,UPDATED_DATE=?
			WHERE LIBRARY_MEMBER_ID=?";
			$this->db->query($sql, array($input->class_id, $input->section_id, $input->student_data_id, $roll_no['ROLL_NO'], date("Y-m-d"), $this->webspice->get_user_id(), $this->webspice->now(), $input->library_member_id));
			
			$this->webspice->message_board('Record has been updated!');
			$this->webspice->log_me('routine_updated - '.$this->webspice->get_user_id()); # log activities
			$this->webspice->force_redirect($url_prefix.'manage_library_member');
			return false;
		}
		
		#insert person
		$sql = "
		INSERT INTO library_member
		(CLASS_ID, SECTION_ID, STUDENT_DATA_ID, ROLL_NO, YEAR, CREATED_BY, CREATED_DATE, STATUS)
		VALUES
		(?, ?, ?, ?, ?, ?, ?, 7)";
		$this->db->query($sql, array($input->class_id, $input->section_id, $input->student_data_id, $roll_no['ROLL_NO'], date("Y-m-d"), $this->webspice->get_user_id(), $this->webspice->now()));

		if( !$this->db->insert_id() ){
			$this->webspice->message_board('We could not execute your request. Please tray again later or report to authority.');
			$this->webspice->force_redirect($url_prefix . 'admin');
			return false;
		}

		$this->webspice->message_board('Record inserted successfully!');
		if($this->webspice->permission_verify('manage_library_member',TRUE)){
			$this->webspice->force_redirect($url_prefix . 'manage_library_member');
			return FALSE;
		}
		$this->webspice->force_redirect($url_prefix.'add_library_member');
	}

	public function manage_library_member() {

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'manage_library_member');
		$this->webspice->permission_verify('manage_library_member');

		$this->load->database();
		$orderby = 'ORDER BY library_member.LIBRARY_MEMBER_ID DESC';
		$groupby = null;
		$where = " WHERE library_member.YEAR='".date("Y")."' ";
		$page_index = 0;
		$no_of_record = 2000000;
		$limit = ' LIMIT '.$no_of_record;
		$filter_by = 'Last Created';
		$data['pager'] = null;
		$criteria = $this->uri->segment(2);
		$key = $this->uri->segment(3);
		if ($criteria == 'page') {
			$page_index = (int)$key;
			$page_index < 0 ? $page_index=0 : $page_index=$page_index;
		}

		$initialSQL = "
		SELECT  * FROM library_member ";


		# filtering records
		if( $this->input->post('filter') ){
			$result = $this->webspice->filter_generator(
				$TableName = 'library_member',
				$InputField = array(),
				$Keyword = array('LIBRARY_MEMBER_ID'),
				$AdditionalWhere = null,
				$DateBetween = null
			);

			$result['where'] ? $where = $result['where'] : $where=$where;
			$result['filter'] ? $filter_by = $result['filter'] : $filter_by=$filter_by;
		}

		# action area
		switch ($criteria) {
			case 'print':
			case 'csv':
				if( !isset($_SESSION['sql']) || !$_SESSION['sql'] ){
					$_SESSION['sql'] = $initialSQL . $where . $orderby;
					$_SESSION['filter_by'] = $filter_by;
				}

				$record = $this->db->query( substr($_SESSION['sql'], 0, stripos($_SESSION['sql'],'LIMIT')) );
				$data['get_record'] = $record->result();
				$data['filter_by'] = $_SESSION['filter_by'];



				$this->load->view('admin/print_report/library/print_payment',$data);
				return false;
				break;

			case 'pdf':
				if( !isset($_SESSION['sql']) || !$_SESSION['sql'] ){
					$_SESSION['sql'] = $initialSQL . $where . $orderby;
					$_SESSION['filter_by'] = $filter_by;
				}

				$record = $this->db->query( substr($_SESSION['sql'], 0, stripos($_SESSION['sql'],'LIMIT')) );
				$data['get_record'] = $record->result();
				$data['filter_by'] = $_SESSION['filter_by'];
				// dd($data);
				$rand = substr( md5(rand()), 0, 15);
				// dd($rand);
				$pdfFilePath = "$rand.pdf";
				$html = $this->load->view('admin/print_report/payment/print_payment', $data, true);
				$this->load->library('pdf');
				$pdf = $this->pdf->load();
				$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822));
				$pdf->WriteHTML($html); // write the HTML into the PDF
				$pdf->Output($pdfFilePath, 'D');
				// dd($pdfFilePath);

				return false;
			break;

			case 'edit':
			 //dd($this->webspice->encrypt_decrypt($key, 'decrypt'));
				$this->webspice->edit_generator($TableName='library_member', $KeyField='LIBRARY_MEMBER_ID', $key, $RedirectController='library_controller', $RedirectFunction='add_library_member', $PermissionName='manage_library_member', $StatusCheck=null, $Log='edit_payment');

				return false;
				break;

			case 'inactive':
				$this->webspice->action_executer($TableName='library_member', $KeyField='LIBRARY_MEMBER_ID', $key, $RedirectURL='manage_library_member', $PermissionName='manage_library_member', $StatusCheck=7, $ChangeStatus=-7, $RemoveCache='library_member', $Log='inactive_payment');
				return false;
				break;

			case 'active':
				$this->webspice->action_executer($TableName='library_member', $KeyField='LIBRARY_MEMBER_ID', $key, $RedirectURL='manage_library_member', $PermissionName='manage_library_member', $StatusCheck=-7, $ChangeStatus=7, $RemoveCache='library_member', $Log='active_payment');
				return false;
				break;

			case 'delete':
				$id = $this->webspice->encrypt_decrypt($key, 'decrypt');
				$sql = $this->db->query("DELETE FROM library_member WHERE LIBRARY_MEMBER_ID='".$id."' LIMIT 1");
				if($sql) {
					$this->webspice->force_redirect($url_prefix.'manage_library_member');
				}
				return false;
			break;
		}

		# default
		$sql = $initialSQL . $where . $groupby . $orderby . $limit;

		# only for pager
		if( $criteria == 'page' ){
			if( !isset($_SESSION['sql']) || !$_SESSION['sql'] ){
				$sql = $sql;
			}
			$limit = sprintf("LIMIT %d, %d", $page_index, $no_of_record);		# this is to avoid SQL Injection
			$sql = substr($_SESSION['sql'], 0, strpos($_SESSION['sql'],'LIMIT'));
			$sql = $sql . $limit;
		}

		# load all records
		if( !$this->input->post('filter') ){
			$count_data = $this->db->query( substr($sql,0,strpos($sql,'LIMIT')) );
			$count_data = $count_data->result();
			$data['pager'] = $this->webspice->pager( count($count_data), $no_of_record, $page_index, $url_prefix.'manage_library_member/page/', 10 );	
		}

		$_SESSION['sql'] = $sql;
		$_SESSION['filter_by'] = $filter_by;
		$result = $this->db->query($sql)->result();

		$data['get_record'] = $result;
		$data['filter_by'] = $filter_by;

		$this->load->view('admin/library/manage_library_member', $data);

	}

	public function general_settings($data=null){

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'general_settings');
		$this->webspice->permission_verify('general_settings');
		if( !isset($data['edit']) ){
			$data['edit'] = array(
				'LIBRARY_SETTING_ID'=>null,
				'MAX_BOOK_ISSUE'=>null,
				'MAX_RETURN_DAY'=>null
			);
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('max_book_issue','maximum book','required|trim|xss_clean');
		$this->form_validation->set_rules('max_return_day','Return Day','required|trim|xss_clean');
		if( !$this->form_validation->run() ){
			$this->load->view('admin/library/general_settings', $data);
			return FALSE;
		}

		// dd($_FILES);

		# get input post
		$input = $this->webspice->get_input('library_settings_id');
		
		#duplicate test
		$this->webspice->db_field_duplicate_test("SELECT * FROM library_settings WHERE MAX_BOOK_ISSUE=? AND MAX_RETURN_DAY=?" , array($input->max_book_issue, $input->max_return_day), 'You are not allowed to add a duplicate settings', 'LIBRARY_SETTING_ID', $input->library_settings_id, $data, 'admin/library/general_settings');
		
		# remove cache
		$this->webspice->remove_cache('library_settings');

		# update process
		if( $input->library_settings_id ){

			$sql = "
			UPDATE library_settings SET MAX_BOOK_ISSUE=?, MAX_RETURN_DAY=?, UPDATED_BY=?,UPDATED_DATE=?
			WHERE LIBRARY_SETTING_ID=?";
			$this->db->query($sql, array($input->max_book_issue, $input->max_return_day, $this->webspice->get_user_id(), $this->webspice->now(), $input->library_settings_id));
			
			$this->webspice->message_board('Record has been updated!');
			$this->webspice->log_me('routine_updated - '.$this->webspice->get_user_id()); # log activities
			$this->webspice->force_redirect($url_prefix.'manage_settings');
			return false;
		}
		
		#insert person
		$sql = "
		INSERT INTO library_settings
		(MAX_BOOK_ISSUE, MAX_RETURN_DAY, CREATED_BY, CREATED_DATE, STATUS)
		VALUES
		(?, ?, ?, ?, 7)";
		$this->db->query($sql, array($input->max_book_issue, $input->max_return_day, $this->webspice->get_user_id(), $this->webspice->now()));

		if( !$this->db->insert_id() ){
			$this->webspice->message_board('We could not execute your request. Please tray again later or report to authority.');
			$this->webspice->force_redirect($url_prefix . 'admin');
			return false;
		}

		$this->webspice->message_board('Record inserted successfully!');
		if($this->webspice->permission_verify('manage_settings',TRUE)){
			$this->webspice->force_redirect($url_prefix . 'manage_settings');
			return FALSE;
		}
		$this->webspice->force_redirect($url_prefix.'general_settings');
	}

	public function manage_settings() {

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'manage_settings');
		$this->webspice->permission_verify('manage_settings');

		$this->load->database();
		$orderby = 'ORDER BY library_settings.LIBRARY_SETTING_ID DESC';
		$groupby = null;
		$where = " ";
		$page_index = 0;
		$no_of_record = 2000000;
		$limit = ' LIMIT '.$no_of_record;
		$filter_by = 'Last Created';
		$data['pager'] = null;
		$criteria = $this->uri->segment(2);
		$key = $this->uri->segment(3);
		if ($criteria == 'page') {
			$page_index = (int)$key;
			$page_index < 0 ? $page_index=0 : $page_index=$page_index;
		}

		$initialSQL = "
		SELECT  * FROM library_settings ";


		# filtering records
		if( $this->input->post('filter') ){
			$result = $this->webspice->filter_generator(
				$TableName = 'library_settings',
				$InputField = array(),
				$Keyword = array('LIBRARY_SETTING_ID'),
				$AdditionalWhere = null,
				$DateBetween = null
			);

			$result['where'] ? $where = $result['where'] : $where=$where;
			$result['filter'] ? $filter_by = $result['filter'] : $filter_by=$filter_by;
		}

		# action area
		switch ($criteria) {
			case 'print':
			case 'csv':
				if( !isset($_SESSION['sql']) || !$_SESSION['sql'] ){
					$_SESSION['sql'] = $initialSQL . $where . $orderby;
					$_SESSION['filter_by'] = $filter_by;
				}

				$record = $this->db->query( substr($_SESSION['sql'], 0, stripos($_SESSION['sql'],'LIMIT')) );
				$data['get_record'] = $record->result();
				$data['filter_by'] = $_SESSION['filter_by'];



				$this->load->view('admin/print_report/library/print_payment',$data);
				return false;
				break;

			case 'pdf':
				if( !isset($_SESSION['sql']) || !$_SESSION['sql'] ){
					$_SESSION['sql'] = $initialSQL . $where . $orderby;
					$_SESSION['filter_by'] = $filter_by;
				}

				$record = $this->db->query( substr($_SESSION['sql'], 0, stripos($_SESSION['sql'],'LIMIT')) );
				$data['get_record'] = $record->result();
				$data['filter_by'] = $_SESSION['filter_by'];
				// dd($data);
				$rand = substr( md5(rand()), 0, 15);
				// dd($rand);
				$pdfFilePath = "$rand.pdf";
				$html = $this->load->view('admin/print_report/payment/print_payment', $data, true);
				$this->load->library('pdf');
				$pdf = $this->pdf->load();
				$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822));
				$pdf->WriteHTML($html); // write the HTML into the PDF
				$pdf->Output($pdfFilePath, 'D');
				// dd($pdfFilePath);

				return false;
			break;

			case 'edit':
			 //dd($this->webspice->encrypt_decrypt($key, 'decrypt'));
				$this->webspice->edit_generator($TableName='library_settings', $KeyField='LIBRARY_SETTING_ID', $key, $RedirectController='library_controller', $RedirectFunction='general_settings', $PermissionName='manage_settings', $StatusCheck=null, $Log='edit_payment');

				return false;
				break;

			case 'inactive':
				$this->webspice->action_executer($TableName='library_settings', $KeyField='LIBRARY_SETTING_ID', $key, $RedirectURL='manage_settings', $PermissionName='manage_settings', $StatusCheck=7, $ChangeStatus=-7, $RemoveCache='library_settings', $Log='inactive_payment');
				return false;
				break;

			case 'active':
				$this->webspice->action_executer($TableName='library_settings', $KeyField='LIBRARY_SETTING_ID', $key, $RedirectURL='manage_settings', $PermissionName='manage_settings', $StatusCheck=-7, $ChangeStatus=7, $RemoveCache='library_settings', $Log='active_payment');
				return false;
				break;

			case 'delete':
				$id = $this->webspice->encrypt_decrypt($key, 'decrypt');
				$sql = $this->db->query("DELETE FROM library_settings WHERE LIBRARY_SETTING_ID='".$id."' LIMIT 1");
				if($sql) {
					$this->webspice->force_redirect($url_prefix.'manage_settings');
				}
				return false;
			break;
		}

		# default
		$sql = $initialSQL . $where . $groupby . $orderby . $limit;

		# only for pager
		if( $criteria == 'page' ){
			if( !isset($_SESSION['sql']) || !$_SESSION['sql'] ){
				$sql = $sql;
			}
			$limit = sprintf("LIMIT %d, %d", $page_index, $no_of_record);		# this is to avoid SQL Injection
			$sql = substr($_SESSION['sql'], 0, strpos($_SESSION['sql'],'LIMIT'));
			$sql = $sql . $limit;
		}

		# load all records
		if( !$this->input->post('filter') ){
			$count_data = $this->db->query( substr($sql,0,strpos($sql,'LIMIT')) );
			$count_data = $count_data->result();
			$data['pager'] = $this->webspice->pager( count($count_data), $no_of_record, $page_index, $url_prefix.'manage_settings/page/', 10 );	
		}

		$_SESSION['sql'] = $sql;
		$_SESSION['filter_by'] = $filter_by;
		$result = $this->db->query($sql)->result();

		$data['get_record'] = $result;
		$data['filter_by'] = $filter_by;

		$this->load->view('admin/library/manage_settings', $data);

	}

	public function send_notification($data=null) {

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'send_notification');
		$this->webspice->permission_verify('send_notification');
		if( !isset($data['edit']) ){
			$data['edit'] = array(
				''=>null,
				'LIBRARY_MEMBER_ID'=>null,
				'SUBJECT'=>null,
				'MESSAGE' => null
			);
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('library_member_id','library member name','required|trim|xss_clean');
		$this->form_validation->set_rules('subject','subject','required|trim|xss_clean|max_length[200]|min_length[3]');
		$this->form_validation->set_rules('message','message','required|trim|xss_clean|max_length[2000]|min_length[3]');
		
		if( !$this->form_validation->run() ){
			$this->load->view('admin/library/send_notification', $data);
			return FALSE;
		}

		# get input post
		$input = $this->webspice->get_input('notification_id');

		//dd($input);
		//die();

		#duplicate test
		// $this->webspice->db_field_duplicate_test("SELECT * FROM send_notification WHERE CATEGORY_NAME=?", array( $input->category_name), 'You are not allowed to enter duplicate book category name', 'NOTIFICATION_ID', $input->notification_id, $data, 'admin/library/send_notification');
		
		# remove cache
		$this->webspice->remove_cache('send_notification');

		# update process
		if( $input->notification_id ){

			$sql = "
			UPDATE send_notification SET LIBRARY_MEMBER_ID=?, SUBJECT=?, MESSAGE=?, UPDATED_BY=?,UPDATED_DATE=?
			WHERE NOTIFICATION_ID=?";
			$this->db->query($sql, array($input->library_member_id, $input->subject, $input->message, $this->webspice->get_user_id(),$this->webspice->now(), $input->notification_id));
			$this->webspice->message_board('Record has been updated!');
			$this->webspice->log_me('class_updated - '.$this->webspice->get_user_id()); # log activities
			$this->webspice->force_redirect($url_prefix.'manage_notification');
			return false;
		}
		
		#insert category

		$sql = "
		INSERT INTO send_notification
		(LIBRARY_MEMBER_ID, SUBJECT, MESSAGE, CREATED_BY,CREATED_DATE,STATUS)
		VALUES
		( ?, ?, ?, ?, ?, 7)";
		$this->db->query($sql, array($input->library_member_id,$input->subject, $input->message,
			$this->webspice->get_user_id(),$this->webspice->now()));

		if( !$this->db->insert_id() ){
			$this->webspice->message_board('We could not execute your request. Please tray again later or report to authority.');
			$this->webspice->force_redirect($url_prefix . 'admin');
			return false;
		}

		$this->webspice->message_board('Record inserted successfully!');
		if($this->webspice->permission_verify('manage_notification',TRUE)){
			$this->webspice->force_redirect($url_prefix . 'manage_notification');
			return FALSE;
		}
		$this->webspice->force_redirect($url_prefix.'send_notification');

	}

	public function manage_notification() {

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'manage_notification');
		$this->webspice->permission_verify('manage_notification');

		$this->load->database();
		$orderby = 'ORDER BY send_notification.NOTIFICATION_ID ASC';
		$groupby = null;
		$where = '';
		$page_index = 0;
		$no_of_record = 20000;
		$limit = ' LIMIT '.$no_of_record;
		$filter_by = 'Last Created';
		$data['pager'] = null;
		$criteria = $this->uri->segment(2);
		$key = $this->uri->segment(3);
		if ($criteria == 'page') {
			$page_index = (int)$key;
			$page_index < 0 ? $page_index=0 : $page_index=$page_index;
		}

		$initialSQL = "
		SELECT  * FROM send_notification ";


		# filtering records
		if( $this->input->post('filter') ){
			$result = $this->webspice->filter_generator(
				$TableName = 'send_notification',
				$InputField = array(),
				$Keyword = array('NOTIFICATION_ID'),
				$AdditionalWhere = null,
				$DateBetween = null
			);

			$result['where'] ? $where = $result['where'] : $where=$where;
			$result['filter'] ? $filter_by = $result['filter'] : $filter_by=$filter_by;
		}

		# action area
		switch ($criteria) {

			case 'print':
			case 'csv':
				if( !isset($_SESSION['sql']) || !$_SESSION['sql'] ){
					$_SESSION['sql'] = $initialSQL . $where . $orderby;
					$_SESSION['filter_by'] = $filter_by;
				}

				$record = $this->db->query( substr($_SESSION['sql'], 0, stripos($_SESSION['sql'],'LIMIT')) );
				$data['get_record'] = $record->result();
				$data['filter_by'] = $_SESSION['filter_by'];



				$this->load->view('admin/print_report/library/print_book_category',$data);
				return false;
				break;

			case 'pdf':
				if( !isset($_SESSION['sql']) || !$_SESSION['sql'] ){
					$_SESSION['sql'] = $initialSQL . $where . $orderby;
					$_SESSION['filter_by'] = $filter_by;
				}

				$record = $this->db->query( substr($_SESSION['sql'], 0, stripos($_SESSION['sql'],'LIMIT')) );
				$data['get_record'] = $record->result();
				$data['filter_by'] = $_SESSION['filter_by'];
				// dd($data);
				$rand = substr( md5(rand()), 0, 15);
				// dd($rand);
				$pdfFilePath = "$rand.pdf";
				$html = $this->load->view('admin/print_report/library/print_book_category', $data, true);
				$this->load->library('pdf');
				$pdf = $this->pdf->load();
				$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822));
				$pdf->WriteHTML($html); // write the HTML into the PDF
				$pdf->Output($pdfFilePath, 'D');
				// dd($pdfFilePath);

				return false;
			break;

			case 'edit':
				//dd($this->webspice->encrypt_decrypt($key, 'decrypt'));
				$this->webspice->edit_generator($TableName='send_notification', $KeyField='NOTIFICATION_ID', $key, $RedirectController='library_controller', $RedirectFunction='send_notification', $PermissionName='manage_notification', $StatusCheck=null, $Log='edit_book_category');
				return false;
				break;

			case 'inactive':			
				$this->webspice->action_executer($TableName='send_notification', $KeyField='NOTIFICATION_ID', $key, $RedirectURL='manage_notification', $PermissionName='manage_notification', $StatusCheck=7, $ChangeStatus=-7, $RemoveCache='send_notification', $Log='inactive_book_category');
				return false;
				break;

			case 'active':
				$this->webspice->action_executer($TableName='send_notification', $KeyField='NOTIFICATION_ID', $key, $RedirectURL='manage_notification', $PermissionName='manage_notification', $StatusCheck=-7, $ChangeStatus=7, $RemoveCache='send_notification', $Log='active_book_catagory');
				return false;
				break;

			case 'delete':
				$id = $this->webspice->encrypt_decrypt($key, 'decrypt');
				$sql = $this->db->query("DELETE FROM send_notification WHERE NOTIFICATION_ID='".$id."' LIMIT 1");
				if($sql) {
					$this->webspice->force_redirect($url_prefix.'manage_notification');
				}
				return false;
			break;
		}

		# default
		$sql = $initialSQL . $where . $groupby . $orderby . $limit;

		# only for pager
		if( $criteria == 'page' ){
			if( !isset($_SESSION['sql']) || !$_SESSION['sql'] ){
				$sql = $sql;
			}
			$limit = sprintf("LIMIT %d, %d", $page_index, $no_of_record);		# this is to avoid SQL Injection
			$sql = substr($_SESSION['sql'], 0, strpos($_SESSION['sql'],'LIMIT'));
			$sql = $sql . $limit;
		}

		# load all records
		if( !$this->input->post('filter') ){
			$count_data = $this->db->query( substr($sql,0,strpos($sql,'LIMIT')) );
			$count_data = $count_data->result();
			$data['pager'] = $this->webspice->pager( count($count_data), $no_of_record, $page_index, $url_prefix.'manage_notification/page/', 10 );	
		}

		$_SESSION['sql'] = $sql;
		$_SESSION['filter_by'] = $filter_by;
		$result = $this->db->query($sql)->result();

		$data['get_record'] = $result;
		$data['filter_by'] = $filter_by;

		$this->load->view('admin/library/manage_notification', $data);

	}

	public function book_issue($data=null) {

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'book_issue');
		$this->webspice->permission_verify('book_issue');
		if( !isset($data['edit']) ){
			$data['edit'] = array(
				''=>null,
				'BOOK_ISSUE_ID'=>null,
				'BOOK_ID'=>null,
				'LIBRARY_MEMBER_ID' => null,
				'ISSUE_DATE' => null,
				'ISSUE_EXPIREDATE' => null,
				'TOTAL_BOOK_ISSUE' => null
			);
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('book_id[]','book name','required|trim|xss_clean');
		$this->form_validation->set_rules('library_member_id','library member name','required|trim|xss_clean');
		$this->form_validation->set_rules('issue_date','issue date','required|trim|xss_clean');
		$this->form_validation->set_rules('issue_expiredate','issue expire date','required|trim|xss_clean');
		$this->form_validation->set_rules('total_book_issue','total book issue','required|trim|xss_clean');
		
		if( !$this->form_validation->run() ){
			$this->load->view('admin/library/book_issue', $data);
			return FALSE;
		}

		# get input post
		$input = $this->webspice->get_input('book_issue_id');
		$book_id = implode(",", $input->book_id);
		//dd($book_id);

		//dd($input);
		//die();

		#duplicate test
		 // $this->webspice->db_field_duplicate_test("SELECT * FROM book_issue WHERE CATEGORY_NAME=?", array( $input->category_name), 'You are not allowed to enter duplicate book category name', 'BOOK_ISSUE_ID', $input->book_issue_id, $data, 'admin/library/book_issue');
		
		# remove cache
		$this->webspice->remove_cache('book_issue');

		# update process
		if( $input->book_issue_id ){

			$sql = "
			UPDATE book_issue SET BOOK_ID=?, LIBRARY_MEMBER_ID=?, ISSUE_DATE=?, ISSUE_EXPIREDATE=?, TOTAL_BOOK_ISSUE=?, UPDATED_BY=?,UPDATED_DATE=?
			WHERE BOOK_ISSUE_ID=?";
			$this->db->query($sql, array($book_id, $input->library_member_id, date("Y-m-d", strtotime($input->issue_date)), date("Y-m-d", strtotime($input->issue_expiredate)), $input->total_book_issue, $this->webspice->get_user_id(),$this->webspice->now(), $input->book_issue_id));
			$this->webspice->message_board('Record has been updated!');
			$this->webspice->log_me('class_updated - '.$this->webspice->get_user_id()); # log activities
			$this->webspice->force_redirect($url_prefix.'manage_issue_and_return');
			return false;
		}
		
		#insert category

		$sql = "
		INSERT INTO book_issue
		(BOOK_ID, LIBRARY_MEMBER_ID, ISSUE_DATE, ISSUE_EXPIREDATE, TOTAL_BOOK_ISSUE, CREATED_BY,CREATED_DATE,STATUS)
		VALUES
		(?, ?, ?, ?, ?, ?, ?, 7)";
		$this->db->query($sql, array($book_id, $input->library_member_id, date("Y-m-d", strtotime($input->issue_date)), date("Y-m-d", strtotime($input->issue_expiredate)), $input->total_book_issue,
			$this->webspice->get_user_id(),$this->webspice->now()));

		if( !$this->db->insert_id() ){
			$this->webspice->message_board('We could not execute your request. Please tray again later or report to authority.');
			$this->webspice->force_redirect($url_prefix . 'admin');
			return false;
		}

		$this->webspice->message_board('Record inserted successfully!');
		if($this->webspice->permission_verify('manage_issue_and_return',TRUE)){
			$this->webspice->force_redirect($url_prefix . 'manage_issue_and_return');
			return FALSE;
		}
		$this->webspice->force_redirect($url_prefix.'book_issue');

	}

	public function manage_issue_and_return() {

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'manage_issue_and_return');
		$this->webspice->permission_verify('manage_issue_and_return');

		$this->load->database();
		$orderby = 'ORDER BY book_issue.BOOK_ISSUE_ID ASC';
		$groupby = null;
		$where = '';
		$page_index = 0;
		$no_of_record = 20;
		$limit = ' LIMIT '.$no_of_record;
		$filter_by = 'Last Created';
		$data['pager'] = null;
		$criteria = $this->uri->segment(2);
		$key = $this->uri->segment(3);
		if ($criteria == 'page') {
			$page_index = (int)$key;
			$page_index < 0 ? $page_index=0 : $page_index=$page_index;
		}

		
		$initialSQL = "
		SELECT  * FROM book_issue ";


		# filtering records
		if( $this->input->post('filter') ){
			$result = $this->webspice->filter_generator(
				$TableName = 'book_issue',
				$InputField = array(),
				$Keyword = array('BOOK_ISSUE_ID'),
				$AdditionalWhere = null,
				$DateBetween = null
			);

			$result['where'] ? $where = $result['where'] : $where=$where;
			$result['filter'] ? $filter_by = $result['filter'] : $filter_by=$filter_by;
		}

		# action area
		switch ($criteria) {
			case 'print':
			case 'csv':
				if( !isset($_SESSION['sql']) || !$_SESSION['sql'] ){
					$_SESSION['sql'] = $initialSQL . $where . $orderby;
					$_SESSION['filter_by'] = $filter_by;
				}

				$record = $this->db->query( substr($_SESSION['sql'], 0, stripos($_SESSION['sql'],'LIMIT')) );
				$data['get_record'] = $record->result();
				$data['filter_by'] = $_SESSION['filter_by'];



				$this->load->view('admin/library/manage_issue_and_return',$data);
				//dd($data);
				return false;
				break;

			case 'edit':
				$this->webspice->edit_generator($TableName='book_issue', $KeyField='BOOK_ISSUE_ID', $key, $RedirectController='library_controller', $RedirectFunction='book_issue', $PermissionName='manage_issue_and_return', $StatusCheck=null, $Log='edit_member');
				return false;
				break;

			case 'inactive':
				$this->webspice->action_executer($TableName='book_issue', $KeyField='BOOK_ISSUE_ID', $key, $RedirectURL='manage_issue_and_return', $PermissionName='manage_issue_and_return', $StatusCheck=7, $ChangeStatus=-7, $RemoveCache='book_issue', $Log='inactive_member');
				return false;
				break;

			case 'active':
				$this->webspice->action_executer($TableName='book_issue', $KeyField='BOOK_ISSUE_ID', $key, $RedirectURL='manage_issue_and_return', $PermissionName='manage_issue_and_return', $StatusCheck=-7, $ChangeStatus=7, $RemoveCache='book_issue', $Log='active_member');
				return false;
				break;

			case 'delete':
				$id = $this->webspice->encrypt_decrypt($key, 'decrypt');
				//echo $id;
				//die();
				$sql = $this->db->query("DELETE FROM book_issue WHERE 	BOOK_ISSUE_ID='".$id."' LIMIT 1");
				if(!unlink($this->webspice->get_path('gallery_full').$id.'.jpg')) {
					die($this->webspice->get_path('gallery_full').$id.'.jpg');
				}
				if($sql) {
					$this->webspice->force_redirect($url_prefix.'manage_issue_and_return');
				}
				return false;
			break;

			case 'return_status':
				$id = $this->webspice->encrypt_decrypt($key, 'decrypt');
				$sql = $this->db->query("UPDATE book_issue SET RETURN_STATUS=1 WHERE BOOK_ISSUE_ID='".$id."' LIMIT 1");
				$this->webspice->message_board('Book returned successfully!');
				$this->webspice->force_redirect($url_prefix.'manage_issue_and_return');
			break;
		}

		# default
		$sql = $initialSQL . $where . $groupby . $orderby . $limit;

		# only for pager
		if( $criteria == 'page' ){
			if( !isset($_SESSION['sql']) || !$_SESSION['sql'] ){
				$sql = $sql;
			}
			$limit = sprintf("LIMIT %d, %d", $page_index, $no_of_record);		# this is to avoid SQL Injection
			$sql = substr($_SESSION['sql'], 0, strpos($_SESSION['sql'],'LIMIT'));
			$sql = $sql . $limit;
		}

		# load all records
		if( !$this->input->post('filter') ){
			$count_data = $this->db->query( substr($sql,0,strpos($sql,'LIMIT')) );
			$count_data = $count_data->result();
			$data['pager'] = $this->webspice->pager( count($count_data), $no_of_record, $page_index, $url_prefix.'manage_issue_and_return/page/', 10 );	
		}

		$_SESSION['sql'] = $sql;
		$_SESSION['filter_by'] = $filter_by;
		$result = $this->db->query($sql)->result();

		$data['get_record'] = $result;
		$data['filter_by'] = $filter_by;

		$this->load->view('admin/library/manage_issue_and_return', $data);
	}

	public function is_library_member($student_data_id) {
		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$membership = $this->db->query("SELECT * FROM library_member WHERE STUDENT_DATA_ID='".$student_data_id."' AND YEAR=".date("Y"))->row();
		if(count($membership)) {
			// dd("Yes, I am a library member");
			return true;
		}
		else {
			$this->webspice->message_board('This panel is for a library member. You are not allowed to access here. Plesae contact with your library person');
			$this->webspice->force_redirect($url_prefix.'admin');
			return false;
		}
	}

	public function library_member_id($student_data_id) {
		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$membership = $this->db->query("SELECT * FROM library_member WHERE STUDENT_DATA_ID='".$student_data_id."' AND YEAR=".date("Y"))->row();
		if(count($membership)) {
			// dd($membership->LIBRARY_MEMBER_ID);
			return $membership->LIBRARY_MEMBER_ID;
		}
		else {
			$this->webspice->message_board('This panel is for a library member. You are not allowed to access here. Plesae contact with your library person');
			$this->webspice->force_redirect($url_prefix.'admin');
			return false;
		}
	}

	public function send_book_request($data=null) {
		$url_prefix = $this->webspice->settings()->site_url_prefix;
		if(!$_SESSION['user']['STUDENT_ID']) {

			$this->webspice->message_board('This panel is for a student. You are not allowed to access here');
			$this->webspice->force_redirect($url_prefix.'admin');
		}

		$id = $this->webspice->encrypt_decrypt($_SESSION['user']['STUDENT_ID'], 'decrypt');
		$student_data = $this->db->query("SELECT * FROM student_data WHERE YEAR='".date("Y")."' AND STUDENT_ID=".$id)->row();
		$class_id = $student_data->CLASS_ID;
		$section_id = $student_data->SECTION_ID;
		$roll_no = $student_data->ROLL_NO;
		$student_data_id = $student_data->STUDENT_DATA_ID;

		// check this is a library member
		$this->is_library_member($student_data_id);
		$member_id = $this->library_member_id($student_data_id);
		// dd($member_id);
		
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'send_book_request');
		$this->webspice->permission_verify('send_book_request');
		if( !isset($data['edit']) ){
			$data['edit'] = array(
				'REQUEST_ID'=>null,
				'MEMBER_ID'=>null,
				'BOOK_NAME' => null,
				'WRITER_NAME' => null,
				'BOOK_DESCRIPTION' => null
			);
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('book_name','book name','required|trim|xss_clean|max_length[200]|min_length[3]');
		$this->form_validation->set_rules('writer_name','writer name','required|trim|xss_clean|max_length[200]|min_length[3]');
		
		if( !$this->form_validation->run() ){
			$this->load->view('admin/library/send_book_request', $data);
			return FALSE;
		}

		# get input post
		$input = $this->webspice->get_input('request_id');

		//dd($input);
		//die();

		#duplicate test
		$this->webspice->db_field_duplicate_test("SELECT * FROM book_request WHERE BOOK_NAME=? AND WRITER_NAME=?", array($input->book_name, $input->writer_name), 'You are not allowed to enter duplicate book category name', 'REQUEST_ID', $input->request_id, $data, 'admin/library/send_book_request');
		
		# remove cache
		$this->webspice->remove_cache('book_request');

		# update process
		if( $input->request_id ){

			$sql = "
			UPDATE book_request SET MEMBER_ID=?, BOOK_NAME=?, WRITER_NAME=?, BOOK_DESCRIPTION=?, UPDATED_BY=?,UPDATED_DATE=?
			WHERE REQUEST_ID=?";
			$this->db->query($sql, array($member_id, $input->book_name, $input->writer_name, $input->book_description, $this->webspice->get_user_id(),$this->webspice->now(), $input->request_id));
			$this->webspice->message_board('Record has been updated!');
			$this->webspice->log_me('class_updated - '.$this->webspice->get_user_id()); # log activities
			$this->webspice->force_redirect($url_prefix.'admin');
			return false;
		}
		
		#insert category

		$sql = "
		INSERT INTO book_request
		(MEMBER_ID, BOOK_NAME, WRITER_NAME, BOOK_DESCRIPTION, CREATED_BY,CREATED_DATE,STATUS)
		VALUES
		( ?, ?, ?, ?, ?, ?,7)";
		$this->db->query($sql, array($member_id, $input->book_name, $input->writer_name, $input->book_description,
			$this->webspice->get_user_id(),$this->webspice->now()));

		if( !$this->db->insert_id() ){
			$this->webspice->message_board('We could not execute your request. Please tray again later or report to authority.');
			$this->webspice->force_redirect($url_prefix . 'admin');
			return false;
		}

		$this->webspice->message_board('Your book request has been processed successfully!, Thank you we will decide about that');
		if($this->webspice->permission_verify('admin',TRUE)){
			$this->webspice->force_redirect($url_prefix . 'admin');
			return FALSE;
		}
		$this->webspice->force_redirect($url_prefix.'send_book_request');

	}

	public function manage_book_request() {

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'manage_book_request');
		$this->webspice->permission_verify('manage_book_request');

		$this->load->database();
		$orderby = 'ORDER BY book_request.BOOK_NAME ASC';
		$groupby = null;
		$where = '';
		$page_index = 0;
		$no_of_record = 20000;
		$limit = ' LIMIT '.$no_of_record;
		$filter_by = 'Last Created';
		$data['pager'] = null;
		$criteria = $this->uri->segment(2);
		$key = $this->uri->segment(3);
		if ($criteria == 'page') {
			$page_index = (int)$key;
			$page_index < 0 ? $page_index=0 : $page_index=$page_index;
		}

		$initialSQL = "
		SELECT  * FROM book_request ";


		# filtering records
		if( $this->input->post('filter') ){
			$result = $this->webspice->filter_generator(
				$TableName = 'book_request',
				$InputField = array(),
				$Keyword = array('BOOK_NAME'),
				$AdditionalWhere = null,
				$DateBetween = null
			);

			$result['where'] ? $where = $result['where'] : $where=$where;
			$result['filter'] ? $filter_by = $result['filter'] : $filter_by=$filter_by;
		}

		# action area
		switch ($criteria) {

			case 'print':
			case 'csv':
				if( !isset($_SESSION['sql']) || !$_SESSION['sql'] ){
					$_SESSION['sql'] = $initialSQL . $where . $orderby;
					$_SESSION['filter_by'] = $filter_by;
				}

				$record = $this->db->query( substr($_SESSION['sql'], 0, stripos($_SESSION['sql'],'LIMIT')) );
				$data['get_record'] = $record->result();
				$data['filter_by'] = $_SESSION['filter_by'];



				$this->load->view('admin/print_report/library/print_book_category',$data);
				return false;
				break;

			case 'pdf':
				if( !isset($_SESSION['sql']) || !$_SESSION['sql'] ){
					$_SESSION['sql'] = $initialSQL . $where . $orderby;
					$_SESSION['filter_by'] = $filter_by;
				}

				$record = $this->db->query( substr($_SESSION['sql'], 0, stripos($_SESSION['sql'],'LIMIT')) );
				$data['get_record'] = $record->result();
				$data['filter_by'] = $_SESSION['filter_by'];
				// dd($data);
				$rand = substr( md5(rand()), 0, 15);
				// dd($rand);
				$pdfFilePath = "$rand.pdf";
				$html = $this->load->view('admin/print_report/library/print_book_category', $data, true);
				$this->load->library('pdf');
				$pdf = $this->pdf->load();
				$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822));
				$pdf->WriteHTML($html); // write the HTML into the PDF
				$pdf->Output($pdfFilePath, 'D');
				// dd($pdfFilePath);

				return false;
			break;

			case 'edit':
				//dd($this->webspice->encrypt_decrypt($key, 'decrypt'));
				$this->webspice->edit_generator($TableName='book_request', $KeyField='REQUEST_ID', $key, $RedirectController='library_controller', $RedirectFunction='send_book_request', $PermissionName='manage_book_request', $StatusCheck=null, $Log='edit_book_category');
				return false;
				break;

			case 'inactive':			
				$this->webspice->action_executer($TableName='book_request', $KeyField='REQUEST_ID', $key, $RedirectURL='manage_book_request', $PermissionName='manage_book_request', $StatusCheck=7, $ChangeStatus=-7, $RemoveCache='book_request', $Log='inactive_book_category');
				return false;
				break;

			case 'active':
				$this->webspice->action_executer($TableName='book_request', $KeyField='REQUEST_ID', $key, $RedirectURL='manage_book_request', $PermissionName='manage_book_request', $StatusCheck=-7, $ChangeStatus=7, $RemoveCache='book_request', $Log='active_book_catagory');
				return false;
				break;

			case 'delete':
				$id = $this->webspice->encrypt_decrypt($key, 'decrypt');
				$sql = $this->db->query("DELETE FROM book_request WHERE REQUEST_ID='".$id."' LIMIT 1");
				if($sql) {
					$this->webspice->force_redirect($url_prefix.'manage_book_request');
				}
				return false;
			break;
		}

		# default
		$sql = $initialSQL . $where . $groupby . $orderby . $limit;

		# only for pager
		if( $criteria == 'page' ){
			if( !isset($_SESSION['sql']) || !$_SESSION['sql'] ){
				$sql = $sql;
			}
			$limit = sprintf("LIMIT %d, %d", $page_index, $no_of_record);		# this is to avoid SQL Injection
			$sql = substr($_SESSION['sql'], 0, strpos($_SESSION['sql'],'LIMIT'));
			$sql = $sql . $limit;
		}

		# load all records
		if( !$this->input->post('filter') ){
			$count_data = $this->db->query( substr($sql,0,strpos($sql,'LIMIT')) );
			$count_data = $count_data->result();
			$data['pager'] = $this->webspice->pager( count($count_data), $no_of_record, $page_index, $url_prefix.'manage_book_request/page/', 10 );	
		}

		$_SESSION['sql'] = $sql;
		$_SESSION['filter_by'] = $filter_by;
		$result = $this->db->query($sql)->result();

		$data['get_record'] = $result;
		$data['filter_by'] = $filter_by;

		$this->load->view('admin/library/manage_book_request', $data);

	}

}