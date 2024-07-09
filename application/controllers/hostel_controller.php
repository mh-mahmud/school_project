<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class hostel_controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	public function add_house($data=null) {

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'add_house');
		$this->webspice->permission_verify('add_house');
		if( !isset($data['edit']) ){
			$data['edit'] = array(
				'HOUSE_ID'=>null,
				'HOUSE_NAME'=>null,
				'DESCRIPTION' => null,
				'LOCATION' => null,
				'TOTAL_ROOM' => null,
				'TOTAL_SET' => null,
				'IMAGES' => null,
			);
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('house_name','house name','required|trim|xss_clean|max_length[200]|min_length[3]');
		$this->form_validation->set_rules('location','location','required|trim|xss_clean|max_length[200]');
		$this->form_validation->set_rules('total_room','total room','required|trim|xss_clean|max_length[200]');
		$this->form_validation->set_rules('total_set','total set','required|trim|xss_clean|max_length[200]');
		
		if( !$this->form_validation->run() ){
			$this->load->view('admin/hostel/add_house', $data);
			return FALSE;
		}

		# get input post
		$input = $this->webspice->get_input('house_id');

		//dd($input);
		//die();

		#duplicate test
		$this->webspice->db_field_duplicate_test("SELECT * FROM house WHERE HOUSE_NAME=?", array( $input->house_name), 'You are not allowed to enter duplicate house name', 'HOUSE_ID', $input->house_id, $data, 'admin/hostel/add_house');
		
		# remove cache
		$this->webspice->remove_cache('house');

		# update process
		if( $input->house_id ){

			$sql = "
			UPDATE house SET HOUSE_NAME=?, DESCRIPTION=?, LOCATION=?, TOTAL_ROOM=?, TOTAL_SET=?, IMAGES=?, UPDATED_BY=?,UPDATED_DATE=?
			WHERE HOUSE_ID=?";
			$this->db->query($sql, array($input->house_name,$input->description,$input->location,$input->total_room,$input->total_set, $_FILES['images']['name'], $this->webspice->get_user_id(),$this->webspice->now(), $input->house_id));
			$this->webspice->process_image_single('images',$input->house_id, 'house_full', 750, 1000);
			$this->webspice->message_board('Record has been updated!');
			$this->webspice->log_me('class_updated - '.$this->webspice->get_user_id()); # log activities
			$this->webspice->force_redirect($url_prefix.'manage_house');
			return false;
		}
		
		#insert category

		$sql = "
		INSERT INTO house
		(HOUSE_NAME, DESCRIPTION, LOCATION, TOTAL_ROOM, TOTAL_SET, IMAGES, CREATED_BY,CREATED_DATE,STATUS)
		VALUES
		( ?, ?, ?, ?, ?, ?, ?, ?, 7)";
		$this->db->query($sql, array($input->house_name, $input->description, $input->location,$input->total_room,$input->total_set, $_FILES['images']['name'],
			$this->webspice->get_user_id(),$this->webspice->now()));
		$this->webspice->process_image_single('images',$this->db->insert_id(), 'house_full', 750, 1000);
		if( !$this->db->insert_id() ){
			$this->webspice->message_board('We could not execute your request. Please tray again later or report to authority.');
			$this->webspice->force_redirect($url_prefix . 'admin');
			return false;
		}

		$this->webspice->message_board('Record inserted successfully!');
		if($this->webspice->permission_verify('manage_house',TRUE)){
			$this->webspice->force_redirect($url_prefix . 'manage_house');
			return FALSE;
		}
		$this->webspice->force_redirect($url_prefix.'add_house');

	}

	public function manage_house() {

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'manage_house');
		$this->webspice->permission_verify('manage_house');

		$this->load->database();
		$orderby = 'ORDER BY house.HOUSE_NAME ASC';
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
		SELECT  * FROM house ";


		# filtering records
		if( $this->input->post('filter') ){
			$result = $this->webspice->filter_generator(
				$TableName = 'house',
				$InputField = array(),
				$Keyword = array('HOUSE_NAME'),
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
				$this->webspice->edit_generator($TableName='house', $KeyField='HOUSE_ID', $key, $RedirectController='hostel_controller', $RedirectFunction='add_house', $PermissionName='manage_house', $StatusCheck=null, $Log='edit_section');
				return false;
				break;

			case 'inactive':
				$this->webspice->action_executer($TableName='house', $KeyField='HOUSE_ID', $key, $RedirectURL='manage_house', $PermissionName='manage_house', $StatusCheck=7, $ChangeStatus=-7, $RemoveCache='house', $Log='inactive_section');
				return false;
				break;

			case 'active':
				$this->webspice->action_executer($TableName='house', $KeyField='HOUSE_ID', $key, $RedirectURL='manage_house', $PermissionName='manage_house', $StatusCheck=-7, $ChangeStatus=7, $RemoveCache='house', $Log='active_section');
				return false;
				break;

			case 'delete':
				$id = $this->webspice->encrypt_decrypt($key, 'decrypt');
				$sql = $this->db->query("DELETE FROM house WHERE HOUSE_ID='".$id."' LIMIT 1");
				if($sql) {
					$this->webspice->force_redirect($url_prefix.'manage_house');
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
			$data['pager'] = $this->webspice->pager( count($count_data), $no_of_record, $page_index, $url_prefix.'manage_house/page/', 10 );	
		}

		$_SESSION['sql'] = $sql;
		$_SESSION['filter_by'] = $filter_by;
		$result = $this->db->query($sql)->result();

		$data['get_record'] = $result;
		$data['filter_by'] = $filter_by;

		$this->load->view('admin/hostel/manage_house', $data);

	}

	public function assign_house_teacher($data=null) {

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'assign_house_teacher');
		$this->webspice->permission_verify('assign_house_teacher');
		if( !isset($data['edit']) ){
			$data['edit'] = array(
				'ASSIGN_HOSTEL_TEACHER_ID'=>null,
				'HOUSE_ID'=>null,
				'TEACHER_ID' => null,
				'SESSION' => null,
				'YEAR' => null
			);
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('house_id','house name','required');
		$this->form_validation->set_rules('teacher_id','teacher name','required');
		$this->form_validation->set_rules('session','session','required|trim|xss_clean|max_length[200]');
		
		if( !$this->form_validation->run() ){
			$this->load->view('admin/hostel/assign_house_teacher', $data);
			return FALSE;
		}

		# get input post
		$input = $this->webspice->get_input('assign_hostel_teacher_id');

		//dd($input);
		//die();

		// #duplicate test
		$this->webspice->db_field_duplicate_test("SELECT * FROM assign_hostel_teacher WHERE HOUSE_ID=? AND YEAR=?", array( $input->house_id, date("Y")), 'You are not allowed to enter duplicate assign house teacher', 'ASSIGN_HOSTEL_TEACHER_ID', $input->assign_hostel_teacher_id, $data, 'admin/hostel/assign_house_teacher');
		
		# remove cache
		$this->webspice->remove_cache('assign_hostel_teacher');

		# update process
		if( $input->assign_hostel_teacher_id ){

			$sql = "
			UPDATE assign_hostel_teacher SET HOUSE_ID=?, TEACHER_ID=?, SESSION=?, YEAR=?, UPDATED_BY=?,UPDATED_DATE=?
			WHERE ASSIGN_HOSTEL_TEACHER_ID=?";
			$this->db->query($sql, array($input->house_id,$input->teacher_id,$input->session,date("Y"), $this->webspice->get_user_id(),$this->webspice->now(), $input->assign_hostel_teacher_id));
			$this->webspice->message_board('Record has been updated!');
			$this->webspice->log_me('class_updated - '.$this->webspice->get_user_id()); # log activities
			$this->webspice->force_redirect($url_prefix.'manage_house_teacher');
			return false;
		}
		
		#insert category

		$sql = "
		INSERT INTO assign_hostel_teacher
		(HOUSE_ID, TEACHER_ID, SESSION, YEAR, CREATED_BY,CREATED_DATE,STATUS)
		VALUES
		( ?, ?, ?, ?, ?, ?, 7)";
		$this->db->query($sql, array($input->house_id, $input->teacher_id, $input->session,date("Y"),
			$this->webspice->get_user_id(),$this->webspice->now()));
		if( !$this->db->insert_id() ){
			$this->webspice->message_board('We could not execute your request. Please tray again later or report to authority.');
			$this->webspice->force_redirect($url_prefix . 'admin');
			return false;
		}

		$this->webspice->message_board('Record inserted successfully!');
		if($this->webspice->permission_verify('manage_house_teacher',TRUE)){
			$this->webspice->force_redirect($url_prefix . 'manage_house_teacher');
			return FALSE;
		}
		$this->webspice->force_redirect($url_prefix.'assign_house_teacher');

	}

	public function manage_house_teacher() {

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'manage_house_teacher');
		$this->webspice->permission_verify('manage_house_teacher');

		$this->load->database();
		$orderby = 'ORDER BY assign_hostel_teacher.ASSIGN_HOSTEL_TEACHER_ID ASC';
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
		SELECT  * FROM assign_hostel_teacher ";


		# filtering records
		if( $this->input->post('filter') ){
			$result = $this->webspice->filter_generator(
				$TableName = 'assign_hostel_teacher',
				$InputField = array(),
				$Keyword = array('ASSIGN_HOSTEL_TEACHER_ID'),
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
				$this->webspice->edit_generator($TableName='assign_hostel_teacher', $KeyField='ASSIGN_HOSTEL_TEACHER_ID', $key, $RedirectController='hostel_controller', $RedirectFunction='assign_house_teacher', $PermissionName='manage_house_teacher', $StatusCheck=null, $Log='edit_section');
				return false;
				break;

			case 'inactive':
				$this->webspice->action_executer($TableName='assign_hostel_teacher', $KeyField='ASSIGN_HOSTEL_TEACHER_ID', $key, $RedirectURL='manage_house_teacher', $PermissionName='manage_house_teacher', $StatusCheck=7, $ChangeStatus=-7, $RemoveCache='assign_hostel_teacher', $Log='inactive_section');
				return false;
				break;

			case 'active':
				$this->webspice->action_executer($TableName='assign_hostel_teacher', $KeyField='ASSIGN_HOSTEL_TEACHER_ID', $key, $RedirectURL='manage_house_teacher', $PermissionName='manage_house_teacher', $StatusCheck=-7, $ChangeStatus=7, $RemoveCache='assign_hostel_teacher', $Log='active_section');
				return false;
				break;

			case 'delete':
				$id = $this->webspice->encrypt_decrypt($key, 'decrypt');
				$sql = $this->db->query("DELETE FROM assign_hostel_teacher WHERE ASSIGN_HOSTEL_TEACHER_ID='".$id."' LIMIT 1");
				if($sql) {
					$this->webspice->force_redirect($url_prefix.'manage_house_teacher');
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
			$data['pager'] = $this->webspice->pager( count($count_data), $no_of_record, $page_index, $url_prefix.'manage_house_teacher/page/', 10 );	
		}

		$_SESSION['sql'] = $sql;
		$_SESSION['filter_by'] = $filter_by;
		$result = $this->db->query($sql)->result();

		$data['get_record'] = $result;
		$data['filter_by'] = $filter_by;

		$this->load->view('admin/hostel/manage_house_teacher', $data);

	}

	public function admit_student_to_hostel($data=null) {

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'admit_student_to_hostel');
		$this->webspice->permission_verify('admit_student_to_hostel');
		if( !isset($data['edit']) ){
			$data['edit'] = array(
				'ADMIT_STUDENT_TO_HOSTEL_ID'=>null,
				'CLASS_ID'=>null,
				'SECTION_ID' => null,
				'STUDENT_DATA_ID' => null,
				'HOUSE_ID' => null,
				'ROOM_NO' => null,
				'SEAT_NO' => null,
				'YEAR' => null
			);
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('class_id','class name','required');
		$this->form_validation->set_rules('section_id','section name','required');
		$this->form_validation->set_rules('student_data_id','student name','required');
		$this->form_validation->set_rules('house_id','house name','required');
		$this->form_validation->set_rules('room_no','student name','required');
		$this->form_validation->set_rules('seat_no','seat no','required');
		
		if( !$this->form_validation->run() ){
			$this->load->view('admin/hostel/admit_student_to_hostel', $data);
			return FALSE;
		}

		# get input post
		$input = $this->webspice->get_input('admit_student_to_hostel_id');

		//dd($input);
		//die();

		#duplicate test
		$this->webspice->db_field_duplicate_test("SELECT * FROM admit_student_to_hostel WHERE CLASS_ID=? AND SECTION_ID=? AND STUDENT_DATA_ID=? AND YEAR=?", array( $input->class_id,$input->section_id,$input->student_data_id, date("Y")), 'You are not allowed to enter duplicate student', 'ADMIT_STUDENT_TO_HOSTEL_ID', $input->admit_student_to_hostel_id, $data, 'admin/hostel/admit_student_to_hostel');
		
		# remove cache
		$this->webspice->remove_cache('admit_student_to_hostel');

		# update process
		if( $input->admit_student_to_hostel_id ){

			$sql = "
			UPDATE admit_student_to_hostel SET CLASS_ID=?, SECTION_ID=?, STUDENT_DATA_ID=?, HOUSE_ID=?, ROOM_NO=?, SEAT_NO=?, YEAR=?, UPDATED_BY=?,UPDATED_DATE=?
			WHERE ADMIT_STUDENT_TO_HOSTEL_ID=?";
			$this->db->query($sql, array($input->class_id,$input->section_id,$input->student_data_id, $input->house_id,$input->room_no, $input->seat_no, date("Y"), $this->webspice->get_user_id(),$this->webspice->now(), $input->admit_student_to_hostel_id));
			$this->webspice->message_board('Record has been updated!');
			$this->webspice->log_me('class_updated - '.$this->webspice->get_user_id()); # log activities
			$this->webspice->force_redirect($url_prefix.'manage_hostel_student');
			return false;
		}
		
		#insert category

		$sql = "
		INSERT INTO admit_student_to_hostel
		(CLASS_ID, SECTION_ID, STUDENT_DATA_ID, HOUSE_ID, ROOM_NO, SEAT_NO, YEAR, CREATED_BY,CREATED_DATE,STATUS)
		VALUES
		( ?, ?, ?, ?, ?, ?, ?, ?, ?, 7)";
		$this->db->query($sql, array($input->class_id,$input->section_id,$input->student_data_id, $input->house_id,$input->room_no, $input->seat_no, date("Y"),
			$this->webspice->get_user_id(),$this->webspice->now()));
		if( !$this->db->insert_id() ){
			$this->webspice->message_board('We could not execute your request. Please tray again later or report to authority.');
			$this->webspice->force_redirect($url_prefix . 'admin');
			return false;
		}

		$this->webspice->message_board('Record inserted successfully!');
		if($this->webspice->permission_verify('manage_hostel_student',TRUE)){
			$this->webspice->force_redirect($url_prefix . 'manage_hostel_student');
			return FALSE;
		}
		$this->webspice->force_redirect($url_prefix.'admit_student_to_hostel');

	}

	public function manage_hostel_student() {

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'manage_hostel_student');
		$this->webspice->permission_verify('manage_hostel_student');

		$this->load->database();
		$orderby = 'ORDER BY admit_student_to_hostel.ADMIT_STUDENT_TO_HOSTEL_ID ASC';
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
		SELECT  * FROM admit_student_to_hostel ";


		# filtering records
		if( $this->input->post('filter') ){
			$result = $this->webspice->filter_generator(
				$TableName = 'admit_student_to_hostel',
				$InputField = array(),
				$Keyword = array('ADMIT_STUDENT_TO_HOSTEL_ID'),
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
				$this->webspice->edit_generator($TableName='admit_student_to_hostel', $KeyField='ADMIT_STUDENT_TO_HOSTEL_ID', $key, $RedirectController='hostel_controller', $RedirectFunction='admit_student_to_hostel', $PermissionName='manage_hostel_student', $StatusCheck=null, $Log='edit_section');
				return false;
				break;

			case 'inactive':
				$this->webspice->action_executer($TableName='admit_student_to_hostel', $KeyField='ADMIT_STUDENT_TO_HOSTEL_ID', $key, $RedirectURL='manage_hostel_student', $PermissionName='manage_hostel_student', $StatusCheck=7, $ChangeStatus=-7, $RemoveCache='admit_student_to_hostel', $Log='inactive_section');
				return false;
				break;

			case 'active':
				$this->webspice->action_executer($TableName='admit_student_to_hostel', $KeyField='ADMIT_STUDENT_TO_HOSTEL_ID', $key, $RedirectURL='manage_hostel_student', $PermissionName='manage_hostel_student', $StatusCheck=-7, $ChangeStatus=7, $RemoveCache='admit_student_to_hostel', $Log='active_section');
				return false;
				break;

			case 'delete':
				$id = $this->webspice->encrypt_decrypt($key, 'decrypt');
				$sql = $this->db->query("DELETE FROM admit_student_to_hostel WHERE ADMIT_STUDENT_TO_HOSTEL_ID='".$id."' LIMIT 1");
				if($sql) {
					$this->webspice->force_redirect($url_prefix.'manage_hostel_student');
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
			$data['pager'] = $this->webspice->pager( count($count_data), $no_of_record, $page_index, $url_prefix.'manage_hostel_student/page/', 10 );	
		}

		$_SESSION['sql'] = $sql;
		$_SESSION['filter_by'] = $filter_by;
		$result = $this->db->query($sql)->result();

		$data['get_record'] = $result;
		$data['filter_by'] = $filter_by;

		$this->load->view('admin/hostel/manage_hostel_student', $data);

	}

	public function student_checkin($data=null) {

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'student_checkin');
		$this->webspice->permission_verify('student_checkin');
		if( !isset($data['edit']) ){
			$data['edit'] = array(
				'CHECKIN_ID'=>null,
				'HOUSE_ID'=>null,
				'STUDENT_DATA_ID' => null,
				'CHECKOUT_DATE' => null,
				'EXPIRE_DATE' => null,
				'GURDIUN_TYPE' => null,
				'GURDIUN_NAME' => null,
				'MOBILE_NO' => null
			);
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('house_id','house name','required');
		$this->form_validation->set_rules('student_data_id','teacher name','required');
		$this->form_validation->set_rules('checkout_date','checkout date','required');
		$this->form_validation->set_rules('expire_date','expire date','required');
		$this->form_validation->set_rules('gurdiun_type','gurdiun type','required');
		$this->form_validation->set_rules('gurdiun_name','gurdiun name','required');
		$this->form_validation->set_rules('mobile_no','mobile','required');
		
		if( !$this->form_validation->run() ){
			$this->load->view('admin/hostel/student_checkin', $data);
			return FALSE;
		}

		# get input post
		$input = $this->webspice->get_input('checkin_id');

		//dd($input);
		//die();

		// #duplicate test
		// $this->webspice->db_field_duplicate_test("SELECT * FROM assign_hostel_teacher WHERE HOUSE_ID=? AND TEACHER_ID=? AND SESSION=?", array( $input->house_id, $input->teacher_id, $input->session), 'You are not allowed to enter duplicate assign house teacher', 'HOUSE_ID', $input->assign_hostel_teacher_id, $data, 'admin/hostel/assign_house_teacher');
		
		# remove cache
		$this->webspice->remove_cache('checkin');

		# update process
		if( $input->checkin_id ){

			$sql = "
			UPDATE checkin SET HOUSE_ID=?, STUDENT_DATA_ID=?, CHECKOUT_DATE=?, EXPIRE_DATE=?, GURDIUN_TYPE=?, GURDIUN_NAME=?, MOBILE_NO=?, UPDATED_BY=?,UPDATED_DATE=?
			WHERE CHECKIN_ID=?";
			$this->db->query($sql, array($input->house_id,$input->student_data_id, date("Y-m-d", strtotime($input->checkout_date)), date("Y-m-d", strtotime($input->expire_date)), $input->gurdiun_type, $input->gurdiun_name,$input->mobile_no, $this->webspice->get_user_id(),$this->webspice->now(), $input->checkin_id));
			$this->webspice->message_board('Record has been updated!');
			$this->webspice->log_me('class_updated - '.$this->webspice->get_user_id()); # log activities
			$this->webspice->force_redirect($url_prefix.'manage_checkin');
			return false;
		}
		
		#insert category

		$sql = "
		INSERT INTO checkin
		(HOUSE_ID, STUDENT_DATA_ID, CHECKOUT_DATE, EXPIRE_DATE, GURDIUN_TYPE, GURDIUN_NAME, MOBILE_NO, CREATED_BY,CREATED_DATE,STATUS)
		VALUES
		( ?, ?, ?, ?, ?, ?, ?, ?, ?, 7)";
		$this->db->query($sql, array($input->house_id,$input->student_data_id, date("Y-m-d", strtotime($input->checkout_date)), date("Y-m-d", strtotime($input->expire_date)), $input->gurdiun_type, $input->gurdiun_name,$input->mobile_no,
			$this->webspice->get_user_id(),$this->webspice->now()));
		if( !$this->db->insert_id() ){
			$this->webspice->message_board('We could not execute your request. Please tray again later or report to authority.');
			$this->webspice->force_redirect($url_prefix . 'admin');
			return false;
		}

		$this->webspice->message_board('Record inserted successfully!');
		if($this->webspice->permission_verify('manage_checkin',TRUE)){
			$this->webspice->force_redirect($url_prefix . 'manage_checkin');
			return FALSE;
		}
		$this->webspice->force_redirect($url_prefix.'student_checkin');

	}

	public function manage_checkin() {

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'manage_checkin');
		$this->webspice->permission_verify('manage_checkin');

		$this->load->database();
		$orderby = 'ORDER BY checkin.CHECKIN_ID ASC';
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
		SELECT  * FROM checkin ";


		# filtering records
		if( $this->input->post('filter') ){
			$result = $this->webspice->filter_generator(
				$TableName = 'checkin',
				$InputField = array(),
				$Keyword = array('CHECKIN_ID'),
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
				$this->webspice->edit_generator($TableName='checkin', $KeyField='CHECKIN_ID', $key, $RedirectController='hostel_controller', $RedirectFunction='student_checkin', $PermissionName='manage_checkin', $StatusCheck=null, $Log='edit_section');
				return false;
				break;

			case 'inactive':
				$this->webspice->action_executer($TableName='checkin', $KeyField='CHECKIN_ID', $key, $RedirectURL='manage_checkin', $PermissionName='manage_checkin', $StatusCheck=7, $ChangeStatus=-7, $RemoveCache='checkin', $Log='inactive_section');
				return false;
				break;

			case 'active':
				$this->webspice->action_executer($TableName='checkin', $KeyField='CHECKIN_ID', $key, $RedirectURL='manage_checkin', $PermissionName='manage_checkin', $StatusCheck=-7, $ChangeStatus=7, $RemoveCache='checkin', $Log='active_section');
				return false;
				break;

			case 'delete':
				$id = $this->webspice->encrypt_decrypt($key, 'decrypt');
				$sql = $this->db->query("DELETE FROM checkin WHERE CHECKIN_ID='".$id."' LIMIT 1");
				if($sql) {
					$this->webspice->force_redirect($url_prefix.'manage_checkin');
				}
				return false;
			break;

			case 'checkin_status':
				$checkin = date('Y-m-d');
				$id = $this->webspice->encrypt_decrypt($key, 'decrypt');
				$sql = $this->db->query("UPDATE checkin SET CHECKIN_STATUS=1, CHECKIN_DATE='".$checkin."'  WHERE 	CHECKIN_ID='".$id."' LIMIT 1");
				$this->webspice->message_board('Student returned successfully!');
				$this->webspice->force_redirect($url_prefix.'manage_checkin');
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
			$data['pager'] = $this->webspice->pager( count($count_data), $no_of_record, $page_index, $url_prefix.'manage_checkin/page/', 10 );	
		}

		$_SESSION['sql'] = $sql;
		$_SESSION['filter_by'] = $filter_by;
		$result = $this->db->query($sql)->result();

		$data['get_record'] = $result;
		$data['filter_by'] = $filter_by;

		$this->load->view('admin/hostel/manage_checkin', $data);

	}

}
?>