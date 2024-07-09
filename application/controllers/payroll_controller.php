<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class payroll_controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	// ----------------------------------------------start

	public function leave_settings($data=null) {

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'leave_settings');
		// dd("Hello World");
		$this->webspice->permission_verify('leave_settings');
		if( !isset($data['edit']) ){
			$data['edit'] = array(
				'LEAVE_SETTINGS_ID'=>null,
				'LEAVE_NAME'=>null,
				'LEAVE_DESCRIPTION'=>null,
				'LEAVE_DURATION'=>null
			);
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('leave_name','leave name','required|trim|xss_clean');
		$this->form_validation->set_rules('leave_description','leave description','trim|xss_clean');
		$this->form_validation->set_rules('leave_duration','leave duration','required|trim|xss_clean');
		
		if( !$this->form_validation->run() ){
			$this->load->view('admin/payroll/leave_settings', $data);
			return FALSE;
		}

		// dd($_FILES);

		# get input post
		$input = $this->webspice->get_input('leave_settings_id');
		// dd($input);
		// dd($_FILES['image']['name']);
		
		#duplicate test
		$this->webspice->db_field_duplicate_test("SELECT * FROM leave_settings WHERE LEAVE_NAME=?", array($input->leave_name), 'You are not allowed to enter duplicate leave settings', 'LEAVE_SETTINGS_ID', $input->leave_settings_id, $data, 'admin/payroll/leave_settings');
		
		# remove cache
		$this->webspice->remove_cache('leave_settings');

		# update process
		if( $input->leave_settings_id ){

			$sql = "
			UPDATE leave_settings SET LEAVE_NAME=?, LEAVE_DESCRIPTION=?, LEAVE_DURATION=?, UPDATED_BY=?,UPDATED_DATE=?
			WHERE LEAVE_SETTINGS_ID=?";

			$this->db->query($sql, array($input->leave_name, $input->leave_description, $input->leave_duration, $this->webspice->get_user_id(), $this->webspice->now(), $input->leave_settings_id));

			$this->webspice->message_board('Leave settings information has been updated!');
			$this->webspice->log_me('leave_settings_updated - '.$this->webspice->get_user_id()); # log activities
			$this->webspice->force_redirect($url_prefix.'manage_leave_settings');
			return false;
		}
		
		#insert person
		$sql = "
		INSERT INTO leave_settings
		(LEAVE_NAME, LEAVE_DESCRIPTION, LEAVE_DURATION, CREATED_BY, CREATED_DATE, STATUS)
		VALUES
		( ?, ?, ?, ?, ?, 7 )";
		$this->db->query($sql, array($input->leave_name, $input->leave_description, $input->leave_duration, $this->webspice->get_user_id(), $this->webspice->now()));

		if( !$this->db->insert_id() ){
			$this->webspice->message_board('We could not execute your request. Please tray again later or report to authority.');
			$this->webspice->force_redirect($url_prefix . 'admin');
			return false;
		}

		$this->webspice->message_board('Leave settings information inserted successfully!');
		if($this->webspice->permission_verify('manage_leave_settings',TRUE)){
			$this->webspice->force_redirect($url_prefix . 'manage_leave_settings');
			return FALSE;
		}
		$this->webspice->force_redirect($url_prefix.'leave_settings');

	}

	public function manage_leave_settings() {

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'manage_leave_settings');
		$this->webspice->permission_verify('manage_leave_settings');
		$this->load->database();
		$orderby = 'ORDER BY leave_settings.LEAVE_SETTINGS_ID DESC';
		$groupby = null;
		$where = '';
		$page_index = 0;
		$no_of_record = 2000000000;
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
		SELECT leave_settings.* FROM leave_settings
		";


		# filtering records
		if( $this->input->post('filter') ){
			$result = $this->webspice->filter_generator(
				$TableName = 'leave_settings',
				$InputField = array(),
				$Keyword = array('LEAVE_NAME'),
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

				$this->load->view('report/print_buyer',$data);
				return false;
				break;

			case 'edit':
				$this->webspice->edit_generator($TableName='leave_settings', $KeyField='LEAVE_SETTINGS_ID', $key, $RedirectController='payroll_controller', $RedirectFunction='leave_settings', $PermissionName='manage_leave_settings', $StatusCheck=null, $Log='edit_leave_settings');
				return false;
				break;

			case 'update':
				$id = $this->uri->segment(3);
				$id2 = $this->uri->segment(4);
				$id3 = $this->uri->segment(5);
				$data = $this->db->query($id . " " . $id2 . " " . $id3);
				if($data) { echo "Just for test purpose";}
				return false;
				break;

			case 'inactive':
				$this->webspice->action_executer($TableName='leave_settings', $KeyField='LEAVE_SETTINGS_ID', $key, $RedirectURL='manage_leave_settings', $PermissionName='manage_leave_settings', $StatusCheck=7, $ChangeStatus=-7, $RemoveCache='leave_settings', $Log='inactive_leave_settings');
				return false;
				break;

			case 'active':
				$this->webspice->action_executer($TableName='leave_settings', $KeyField='LEAVE_SETTINGS_ID', $key, $RedirectURL='manage_leave_settings', $PermissionName='manage_leave_settings', $StatusCheck=-7, $ChangeStatus=7, $RemoveCache='leave_settings', $Log='active_leave_settings');
				return false;
				break;

			case 'delete':
				$id = $this->webspice->encrypt_decrypt($key, 'decrypt');
				$sql = $this->db->query("DELETE FROM leave_settings WHERE LEAVE_SETTINGS_ID='".$id."' LIMIT 1");
				// if(!unlink($this->webspice->get_path('buyer_full').$id.'.jpg')) {
				// 	die($this->webspice->get_path('buyer_full').$id.'.jpg');
				// }
				if($sql) {
					$this->webspice->force_redirect($url_prefix.'manage_leave_settings');
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
			$data['pager'] = $this->webspice->pager( count($count_data), $no_of_record, $page_index, $url_prefix.'manage_leave_settings/page/', 10 );	
		}

		$_SESSION['sql'] = $sql;
		$_SESSION['filter_by'] = $filter_by;
		$result = $this->db->query($sql)->result();

		$data['get_record'] = $result;
		$data['filter_by'] = $filter_by;

		$this->load->view('admin/payroll/manage_leave_settings', $data);
		
	}

	public function add_leave($data=null) {

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'add_leave');
		$this->webspice->permission_verify('add_leave');
		if( !isset($data['edit']) ){
			$data['edit'] = array(
				'LEAVE_ID'=>null,
				'TEACHER_ID'=>null,
				'LEAVE_SETTINGS_ID'=>null,
				'LEAVE_DURATION'=>null,
				'REASON_FOR_LEAVE'=>null,
				'DATE_FROM'=>null,
				'DATE_TO'=>null,
				'YEAR'=>null
			);
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('teacher_id','teacher name','required|trim|xss_clean');
		$this->form_validation->set_rules('leave_settings_id','leave type','required|trim|xss_clean');
		$this->form_validation->set_rules('leave_duration','leave duration','required|trim|xss_clean');
		$this->form_validation->set_rules('reason_for_leave','reason for leave','trim|xss_clean');
		$this->form_validation->set_rules('date_from','date from','required|trim|xss_clean');
		$this->form_validation->set_rules('date_to','date to','required|trim|xss_clean');
		
		if( !$this->form_validation->run() ){
			$this->load->view('admin/payroll/add_leave', $data);
			return FALSE;
		}

		// dd($_FILES);

		# get input post
		$input = $this->webspice->get_input('leave_id');
		// dd($input);
		// dd($_FILES['image']['name']);
		
		#duplicate test
		$this->webspice->db_field_duplicate_test("SELECT * FROM leave_data WHERE TEACHER_ID=? AND DATE_FROM=? AND DATE_TO AND YEAR=?", array($input->teacher_id, date("Y-m-d", strtotime($input->date_from)), date("Y-m-d", strtotime($input->date_to)), date("Y")), 'You are not allowed to enter duplicate leave information', 'LEAVE_ID', $input->leave_id, $data, 'admin/payroll/add_leave');
		
		# remove cache
		$this->webspice->remove_cache('leave');

		# update process
		if( $input->leave_id ){

			$sql = "
			UPDATE leave_data SET TEACHER_ID=?, LEAVE_SETTINGS_ID=?, LEAVE_DURATION=?, REASON_FOR_LEAVE=?, DATE_FROM=?, DATE_TO=?, UPDATED_BY=?,UPDATED_DATE=?
			WHERE LEAVE_ID=?";

			$this->db->query($sql, array($input->teacher_id, $input->leave_settings_id, $input->leave_duration, $input->reason_for_leave, date("Y-m-d", strtotime($input->date_from)), date("Y-m-d", strtotime($input->date_to)), $this->webspice->get_user_id(), $this->webspice->now(), $input->leave_id));

			$this->webspice->message_board('Leave information has been updated!');
			$this->webspice->log_me('leave_updated - '.$this->webspice->get_user_id()); # log activities
			$this->webspice->force_redirect($url_prefix.'manage_leave');
			return false;
		}
		
		#insert person
		$sql = "
		INSERT INTO leave_data
		(TEACHER_ID, LEAVE_SETTINGS_ID, LEAVE_DURATION, REASON_FOR_LEAVE, DATE_FROM, DATE_TO, YEAR, CREATED_BY, CREATED_DATE, STATUS)
		VALUES
		( ?, ?, ?, ?, ?, ?, ?, ?, ?, 7 )";
		$this->db->query($sql, array($input->teacher_id, $input->leave_settings_id, $input->leave_duration, $input->reason_for_leave, date("Y-m-d", strtotime($input->date_from)), date("Y-m-d", strtotime($input->date_to)), date("Y"), $this->webspice->get_user_id(), $this->webspice->now()));

		if( !$this->db->insert_id() ){
			$this->webspice->message_board('We could not execute your request. Please tray again later or report to authority.');
			$this->webspice->force_redirect($url_prefix . 'admin');
			return false;
		}

		$this->webspice->message_board('Employee leave information inserted successfully!');
		if($this->webspice->permission_verify('manage_leave',TRUE)){
			$this->webspice->force_redirect($url_prefix . 'manage_leave');
			return FALSE;
		}
		$this->webspice->force_redirect($url_prefix.'add_leave');

	}

	public function manage_leave() {

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'manage_leave');
		$this->webspice->permission_verify('manage_leave');
		$this->load->database();
		$orderby = 'ORDER BY LEAVE_ID DESC';
		$groupby = null;
		$where = '';
		$page_index = 0;
		$no_of_record = 2000000000;
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
		SELECT * FROM leave_data
		";


		# filtering records
		if( $this->input->post('filter') ){
			$result = $this->webspice->filter_generator(
				$TableName = 'leave_data',
				$InputField = array(),
				$Keyword = array('TEACHER_ID'),
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

				$this->load->view('report/print_buyer',$data);
				return false;
				break;

			case 'edit':
				$this->webspice->edit_generator($TableName='leave_data', $KeyField='LEAVE_ID', $key, $RedirectController='payroll_controller', $RedirectFunction='add_leave', $PermissionName='manage_leave', $StatusCheck=null, $Log='edit_leave');
				return false;
				break;

			case 'update':
				$id = $this->uri->segment(3);
				$id2 = $this->uri->segment(4);
				$id3 = $this->uri->segment(5);
				$data = $this->db->query($id . " " . $id2 . " " . $id3);
				if($data) { echo "Just for test purpose";}
				return false;
				break;

			case 'inactive':
				$this->webspice->action_executer($TableName='leave_data', $KeyField='LEAVE_ID', $key, $RedirectURL='manage_leave', $PermissionName='manage_leave', $StatusCheck=7, $ChangeStatus=-7, $RemoveCache='leave', $Log='inactive_leave');
				return false;
				break;

			case 'active':
				$this->webspice->action_executer($TableName='leave_data', $KeyField='LEAVE_ID', $key, $RedirectURL='manage_leave', $PermissionName='manage_leave', $StatusCheck=-7, $ChangeStatus=7, $RemoveCache='leave', $Log='active_leave');
				return false;
				break;

			case 'delete':
				$id = $this->webspice->encrypt_decrypt($key, 'decrypt');
				$sql = $this->db->query("DELETE FROM leave_data WHERE LEAVE_ID='".$id."' LIMIT 1");
				// if(!unlink($this->webspice->get_path('buyer_full').$id.'.jpg')) {
				// 	die($this->webspice->get_path('buyer_full').$id.'.jpg');
				// }
				if($sql) {
					$this->webspice->force_redirect($url_prefix.'manage_leave');
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
			$data['pager'] = $this->webspice->pager( count($count_data), $no_of_record, $page_index, $url_prefix.'manage_leave/page/', 10 );	
		}

		$_SESSION['sql'] = $sql;
		$_SESSION['filter_by'] = $filter_by;
		$result = $this->db->query($sql)->result();

		$data['get_record'] = $result;
		$data['filter_by'] = $filter_by;

		$this->load->view('admin/payroll/manage_leave', $data);
		
	}

	// -----------------------------------------------end

	public function salary_settings($data=null) {

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'salary_settings');
		$this->webspice->permission_verify('salary_settings');
		if( !isset($data['edit']) ){
			$data['edit'] = array(
				'SALARY_ID'=>null,
				'TEACHER_ID'=>null,
				'SALARY' => null,
				'YEAR' => null
			);
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('teacher_id','teacher name','required|trim|xss_clean|max_length[200]');
		$this->form_validation->set_rules('salary','salary','required|trim|xss_clean|max_length[200]');
		
		if( !$this->form_validation->run() ){
			$this->load->view('admin/payroll/salary_settings', $data);
			return FALSE;
		}

		# get input post
		$input = $this->webspice->get_input('salary_id');

		//dd($input);
		//die();

		#duplicate test
		$this->webspice->db_field_duplicate_test("SELECT * FROM salary_settings WHERE TEACHER_ID=? AND SALARY=? AND YEAR=?", array( $input->teacher_id,$input->salary, date("Y")), 'You are not allowed to enter duplicate salary', 'SALARY_ID', $input->salary_id, $data, 'admin/payroll/salary_settings');
		
		# remove cache
		$this->webspice->remove_cache('salary_settings');

		# update process
		if( $input->salary_id ){

			$sql = "
			UPDATE salary_settings SET TEACHER_ID=?, SALARY=?, YEAR=?, UPDATED_BY=?,UPDATED_DATE=?
			WHERE SALARY_ID=?";
			$this->db->query($sql, array($input->teacher_id,$input->salary, date("Y"), $this->webspice->get_user_id(),$this->webspice->now(), $input->salary_id));
			$this->webspice->message_board('Record has been updated!');
			$this->webspice->log_me('class_updated - '.$this->webspice->get_user_id()); # log activities
			$this->webspice->force_redirect($url_prefix.'manage_salary_settings');
			return false;
		}
		
		#insert category

		$sql = "
		INSERT INTO salary_settings
		(TEACHER_ID, SALARY, YEAR, CREATED_BY,CREATED_DATE,STATUS)
		VALUES
		(?, ?, ?, ?, ?, 7)";
		$this->db->query($sql, array($input->teacher_id,$input->salary, date("Y"),
			$this->webspice->get_user_id(),$this->webspice->now()));
		if( !$this->db->insert_id() ){
			$this->webspice->message_board('We could not execute your request. Please tray again later or report to authority.');
			$this->webspice->force_redirect($url_prefix . 'admin');
			return false;
		}

		$this->webspice->message_board('Record inserted successfully!');
		if($this->webspice->permission_verify('manage_salary_settings',TRUE)){
			$this->webspice->force_redirect($url_prefix . 'manage_salary_settings');
			return FALSE;
		}
		$this->webspice->force_redirect($url_prefix.'salary_settings');

	}

	public function manage_salary_settings() {

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'manage_salary_settings');
		$this->webspice->permission_verify('manage_salary_settings');

		$this->load->database();
		$orderby = 'ORDER BY salary_settings.SALARY_ID DESC';
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
		SELECT  * FROM salary_settings ";


		# filtering records
		if( $this->input->post('filter') ){
			$result = $this->webspice->filter_generator(
				$TableName = 'salary_settings',
				$InputField = array(),
				$Keyword = array('SALARY_ID'),
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
				$this->webspice->edit_generator($TableName='salary_settings', $KeyField='SALARY_ID', $key, $RedirectController='payroll_controller', $RedirectFunction='salary_settings', $PermissionName='manage_salary_settings', $StatusCheck=null, $Log='edit_section');
				return false;
				break;

			case 'inactive':
				$this->webspice->action_executer($TableName='salary_settings', $KeyField='SALARY_ID', $key, $RedirectURL='manage_salary_settings', $PermissionName='manage_salary_settings', $StatusCheck=7, $ChangeStatus=-7, $RemoveCache='salary_settings', $Log='inactive_section');
				return false;
				break;

			case 'active':
				$this->webspice->action_executer($TableName='salary_settings', $KeyField='SALARY_ID', $key, $RedirectURL='manage_salary_settings', $PermissionName='manage_salary_settings', $StatusCheck=-7, $ChangeStatus=7, $RemoveCache='salary_settings', $Log='active_section');
				return false;
				break;

			case 'delete':
				$id = $this->webspice->encrypt_decrypt($key, 'decrypt');
				$sql = $this->db->query("DELETE FROM salary_settings WHERE SALARY_ID='".$id."' LIMIT 1");
				if($sql) {
					$this->webspice->force_redirect($url_prefix.'manage_salary_settings');
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
			$data['pager'] = $this->webspice->pager( count($count_data), $no_of_record, $page_index, $url_prefix.'manage_salary_settings/page/', 10 );	
		}

		$_SESSION['sql'] = $sql;
		$_SESSION['filter_by'] = $filter_by;
		$result = $this->db->query($sql)->result();

		$data['get_record'] = $result;
		$data['filter_by'] = $filter_by;

		$this->load->view('admin/payroll/manage_salary_settings', $data);

	}

	public function monthly_salary($data=null) {

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'monthly_salary');
		$this->webspice->permission_verify('monthly_salary');
		if( !isset($data['edit']) ){
			$data['edit'] = array(
				'MONTHLY_SALARY_ID'=>null,
				'TEACHER_ID'=>null,
				'SALARY'=>null,
				'MONTH'=>null,
				'PAYMENT_TYPE' => null,
				'PAY_DATE' => null,
				'YEAR' => null
			);
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('teacher_id','teacher name','required');
		$this->form_validation->set_rules('month','month name','required');
		$this->form_validation->set_rules('payment_type','payment type','required|trim|xss_clean|max_length[200]');
		$this->form_validation->set_rules('pay_date','pay date','required');
		
		if( !$this->form_validation->run() ){
			$this->load->view('admin/payroll/monthly_salary', $data);
			return FALSE;
		}

		# get input post
		$input = $this->webspice->get_input('monthly_salary_id');

		//dd($input);
		//die();

		#duplicate test
		$this->webspice->db_field_duplicate_test("SELECT * FROM monthly_salary WHERE TEACHER_ID=? AND MONTH=? AND PAY_DATE=?", array( $input->teacher_id,$input->month, date("Y-m-d", strtotime($input->pay_date))), 'You are not allowed to enter duplicate salary pay', 'MONTHLY_SALARY_ID', $input->monthly_salary_id, $data, 'admin/payroll/monthly_salary');
		
		# remove cache
		$this->webspice->remove_cache('monthly_salary');

		# update process
		if( $input->monthly_salary_id ){

			$sql = "
			UPDATE monthly_salary SET TEACHER_ID=?, SALARY=?, MONTH=?, PAYMENT_TYPE=?,  PAY_DATE=?, YEAR=?, UPDATED_BY=?,UPDATED_DATE=?
			WHERE MONTHLY_SALARY_ID=?";
			$this->db->query($sql, array($input->teacher_id, $input->salary, $input->month, $input->payment_type, date("Y-m-d", strtotime($input->pay_date)), date("Y"), $this->webspice->get_user_id(),$this->webspice->now(), $input->monthly_salary_id));
			$this->webspice->message_board('Record has been updated!');
			$this->webspice->log_me('class_updated - '.$this->webspice->get_user_id()); # log activities
			$this->webspice->force_redirect($url_prefix.'manage_salary');
			return false;
		}
		
		#insert category

		$sql = "
		INSERT INTO monthly_salary
		(TEACHER_ID, SALARY, MONTH, PAYMENT_TYPE, PAY_DATE, YEAR, CREATED_BY,CREATED_DATE,STATUS)
		VALUES
		(?, ?, ?, ?, ?, ?, ?, ?, 7)";
		$this->db->query($sql, array($input->teacher_id, $input->salary, $input->month, $input->payment_type, date("Y-m-d", strtotime($input->pay_date)), date("Y"),
			$this->webspice->get_user_id(),$this->webspice->now()));
		if( !$this->db->insert_id() ){
			$this->webspice->message_board('We could not execute your request. Please tray again later or report to authority.');
			$this->webspice->force_redirect($url_prefix . 'admin');
			return false;
		}

		$this->webspice->message_board('Record inserted successfully!');
		if($this->webspice->permission_verify('manage_salary',TRUE)){
			$this->webspice->force_redirect($url_prefix . 'manage_salary');
			return FALSE;
		}
		$this->webspice->force_redirect($url_prefix.'monthly_salary');

	}

	public function manage_salary() {

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'manage_salary');
		$this->webspice->permission_verify('manage_salary');

		$this->load->database();
		$orderby = 'ORDER BY monthly_salary.YEAR DESC';
		$groupby = null;
		$where = '';
		$page_index = 0;
		$no_of_record = 20000000;
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
		SELECT  * FROM monthly_salary ";


		# filtering records
		if( $this->input->post('filter') ){
			$result = $this->webspice->filter_generator(
				$TableName = 'monthly_salary',
				$InputField = array(),
				$Keyword = array('	MONTHLY_SALARY_ID'),
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
				$this->webspice->edit_generator($TableName='monthly_salary', $KeyField='MONTHLY_SALARY_ID', $key, $RedirectController='payroll_controller', $RedirectFunction='monthly_salary', $PermissionName='manage_salary', $StatusCheck=null, $Log='edit_section');
				return false;
				break;

			case 'inactive':
				$this->webspice->action_executer($TableName='monthly_salary', $KeyField='MONTHLY_SALARY_ID', $key, $RedirectURL='manage_salary', $PermissionName='manage_salary', $StatusCheck=7, $ChangeStatus=-7, $RemoveCache='monthly_salary', $Log='inactive_section');
				return false;
				break;

			case 'active':
				$this->webspice->action_executer($TableName='monthly_salary', $KeyField='MONTHLY_SALARY_ID', $key, $RedirectURL='manage_salary', $PermissionName='manage_salary', $StatusCheck=-7, $ChangeStatus=7, $RemoveCache='monthly_salary', $Log='active_section');
				return false;
				break;

			case 'delete':
				$id = $this->webspice->encrypt_decrypt($key, 'decrypt');
				$sql = $this->db->query("DELETE FROM monthly_salary WHERE MONTHLY_SALARY_ID='".$id."' LIMIT 1");
				if($sql) {
					$this->webspice->force_redirect($url_prefix.'manage_salary');
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
			$data['pager'] = $this->webspice->pager( count($count_data), $no_of_record, $page_index, $url_prefix.'manage_salary/page/', 10 );	
		}

		$_SESSION['sql'] = $sql;
		$_SESSION['filter_by'] = $filter_by;
		$result = $this->db->query($sql)->result();

		$data['get_record'] = $result;
		$data['filter_by'] = $filter_by;

		$this->load->view('admin/payroll/manage_salary', $data);

	}

	public function salary_report() {

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'salary_report');
		$this->webspice->permission_verify('salary_report');

		if($this->input->post("filter")){
			$data = array();

			$teacher_id = $this->input->post("teacher_id");
			$year = $this->input->post("year");

			// dd($_POST);


			//$data['get_record'] = $this->db->query("SELECT m.*, c.CLASS_NAME, si.NAME, s.SECTION_NAME, e.EXAM_NAME, sub.SUBJECT_NAME FROM marks AS m INNER JOIN class AS c ON m.CLASS_ID=c.CLASS_ID INNER JOIN section AS s ON s.SECTION_ID=m.SECTION_ID INNER JOIN exam AS e ON e.EXAM_ID=m.EXAM_ID INNER JOIN subject AS sub ON m.SUBJECT_ID=sub.SUBJECT_ID INNER JOIN student_info AS si ON si.STUDENT_ID=m.STUDENT_ID WHERE m.CLASS_ID='".$class_id."' AND m.SECTION_ID='".$section_id."' AND m.EXAM_ID='".$exam_id."' AND m.STUDENT_ID='".$student_id."' AND YEAR='".$year."'")->result();

			$data['get_record'] = $this->db->query("SELECT ms.*, t.TEACHER_NAME FROM monthly_salary AS ms INNER JOIN teacher AS t ON ms.TEACHER_ID=t.TEACHER_ID WHERE ms.TEACHER_ID='".$teacher_id."' AND ms.YEAR='".$year."'")->result();
			// dd($data);

			// dd($data);
			if(count($data['get_record'])) {
				$data['teacher_name'] = $data['get_record'][0]->TEACHER_NAME;
			}else{
				$data = array();
			}

			$this->load->view('admin/payroll/salary_report', $data);
			return false;
		}
		else {
			$data = array();
			$this->load->view('admin/payroll/salary_report', $data);
		}

	}


	public function leave_report() {

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'leave_report');
		$this->webspice->permission_verify('leave_report');

		if($this->input->post("filter")){
			$data = array();

			$teacher_id = $this->input->post("teacher_id");
			$year = $this->input->post("year");

			$data['get_record'] = $this->db->query("SELECT LD.*, T.TEACHER_NAME, LS.LEAVE_NAME FROM leave_data AS LD INNER JOIN teacher AS T ON T.TEACHER_ID=LD.TEACHER_ID INNER JOIN leave_settings AS LS ON LD.LEAVE_SETTINGS_ID=LS.LEAVE_SETTINGS_ID WHERE LD.TEACHER_ID='".$teacher_id."' AND YEAR='".$year."'")->result();
			// dd($data);

			// dd($data);
			if(count($data['get_record'])) {
				$data['teacher_name'] = $data['get_record'][0]->TEACHER_NAME;
			}else{
				$data = array();
			}

			$this->load->view('admin/payroll/leave_report', $data);
			return false;
		}
		else {
			$data = array();
			$this->load->view('admin/payroll/leave_report', $data);
		}

	}

}

?>