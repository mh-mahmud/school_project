<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calendar_Controller extends CI_Controller {

	public $config;

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');

		$this->conf = array(
			'start_day'			=> 'sunday',
			'show_next_prev'	=> true,
			'next_prev_url'		=> base_url() . 'Calendar_Controller/display',
			'day_type'     => 'long'
		);

		$this->conf['template'] = '

		   {table_open}<table border="0" cellpadding="0" cellspacing="0" class="calendar">{/table_open}

		   {heading_row_start}<tr>{/heading_row_start}

		   {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
		   {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
		   {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

		   {heading_row_end}</tr>{/heading_row_end}

		   {week_row_start}<tr>{/week_row_start}
		   {week_day_cell}<td>{week_day}</td>{/week_day_cell}
		   {week_row_end}</tr>{/week_row_end}

		   {cal_row_start}<tr class="days">{/cal_row_start}
		   {cal_cell_start}<td class="day">{/cal_cell_start}

		   {cal_cell_content}
		   		<div class="day_num">{day}</div>
		   		<div class="content">{content}</div>
		   {/cal_cell_content}
		   {cal_cell_content_today}
		   		<div class="day_num highlight">{day}</div>
		   		<div class="content">{content}</div>
		   {/cal_cell_content_today}

		   {cal_cell_no_content}<div class="day_num">{day}</div>{/cal_cell_no_content}
		   {cal_cell_no_content_today}<div class="day_num highlight">{day}</div>{/cal_cell_no_content_today}

		   {cal_cell_blank}&nbsp;{/cal_cell_blank}

		   {cal_cell_end}</td>{/cal_cell_end}
		   {cal_row_end}</tr>{/cal_row_end}

		   {table_close}</table>{/table_close}

		';

	}

	/*public function display() {
		$this->load->library('calendar');

		$month = '2';
		$year = '2016';
		$lastday = cal_days_in_month(CAL_GREGORIAN, $month, $year);

		for($day=1; $day<=$lastday; $day++) {
			$prefix = ($day<10) ? "0" : "";
			$data[$day] = 'http://example.com/news/article/'.$year.'/'.$prefix.$day.'/';
		}
		echo $this->calendar->generate($year, $month, $data);

	}*/

	public function display($year=null, $month=null) {
		$url_prefix = $this->webspice->settings()->site_url_prefix;

		if(!$year) {
			$year = date("Y");
		}
		if(!$month) {
			$month = date("m");
		}

		if($day = $this->input->post('day')) {
			$this->update_calendar_data("$year-$month-$day", $this->input->post('data'));
		}

		$data['calendar'] = $this->generate($year, $month);
		$this->load->view('admin/calendar/mycal', $data);

	}

	public function generate($year, $month) {

		$this->load->library("calendar", $this->conf);

		$cal_data = $this->get_calendar_data($year, $month);
		// dd($cal_data);

		return $this->calendar->generate($year, $month, $cal_data);

	}

	public function get_calendar_data($year, $month) {

		$query = $this->db->select('DATE, DATA')->from('calendar')->like('DATE', "$year-$month", 'after')->get();
		$cal_data = array();

		foreach($query->result() as $row) {
			$cal_data[substr($row->DATE, 8, 2)] = $row->DATA;
		}
		return $cal_data;

	}

	public function update_calendar_data($date, $data) {
		if($this->db->select('DATE')->from('calendar')->where('DATE', $date)->count_all_results()) {

			$this->db->where('DATE', $date)->update('calendar', array(
				'DATE'	=> $date,
				'DATA'	=> $data
			));

		}
		else {

			$this->db->insert('calendar', array(
				'DATE'	=> $date,
				'DATA'	=> $data
			));

		}
		exit();
	}


	// new functions start
	public function create_event($data=null) {

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'create_event');
		$this->webspice->permission_verify('create_event');
		if( !isset($data['edit']) ){
			$data['edit'] = array(
				'EVENT_ID'=>null,
				'DATE'=>null,
				'DATA' => null
			);
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('date','date','required|trim|xss_clean');
		$this->form_validation->set_rules('data','data','required|trim|xss_clean|max_length[400]');
		
		if( !$this->form_validation->run() ){
			$this->load->view('admin/calendar/create_event', $data);
			return FALSE;
		}

		# get input post
		$input = $this->webspice->get_input('event_id');

		$custom_date = date("Y-m-j", strtotime($input->date));
		// dd($custom_date);

		#duplicate test
		$this->webspice->db_field_duplicate_test("SELECT * FROM calendar WHERE DATE=?", array($custom_date), 'You are not allowed to enter duplicate event data', 'EVENT_ID', $input->event_id, $data, 'admin/calendar/create_event');
		
		# remove cache
		$this->webspice->remove_cache('event');

		# update process
		if( $input->event_id ){

			$sql = "
			UPDATE calendar SET DATE=?, DATA=?, UPDATED_BY=?,UPDATED_DATE=?
			WHERE EVENT_ID=?";
			$this->db->query($sql, array($custom_date, $input->data, $this->webspice->get_user_id(), $this->webspice->now(), $input->event_id));
			$this->webspice->message_board('Record has been updated!');
			$this->webspice->log_me('event_updated - '.$this->webspice->get_user_id()); # log activities
			$this->webspice->force_redirect($url_prefix.'manage_event');
			return false;
		}
		
		#insert category

		$sql = "
		INSERT INTO calendar
		(DATE, DATA, CREATED_BY,CREATED_DATE, STATUS)
		VALUES
		( ?, ?, ?, ?, 7)";
		$this->db->query($sql, array($custom_date, $input->data, $this->webspice->get_user_id(),$this->webspice->now()));
		if( !$this->db->insert_id() ){
			$this->webspice->message_board('We could not execute your request. Please tray again later or report to authority.');
			$this->webspice->force_redirect($url_prefix . 'admin');
			return false;
		}

		$this->webspice->message_board('Record inserted successfully!');
		if($this->webspice->permission_verify('manage_event',TRUE)){
			$this->webspice->force_redirect($url_prefix . 'manage_event');
			return FALSE;
		}
		$this->webspice->force_redirect($url_prefix.'create_event');

	}

	public function manage_event() {

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'manage_event');
		$this->webspice->permission_verify('manage_event');

		$this->load->database();
		$orderby = 'ORDER BY calendar.DATE ASC';
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
		SELECT  * FROM calendar ";


		# filtering records
		if( $this->input->post('filter') ){
			$result = $this->webspice->filter_generator(
				$TableName = 'calendar',
				$InputField = array(),
				$Keyword = array('DATA'),
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
				$this->webspice->edit_generator($TableName='calendar', $KeyField='EVENT_ID', $key, $RedirectController='calendar_controller', $RedirectFunction='create_event', $PermissionName='manage_event', $StatusCheck=null, $Log='edit_event');
				return false;
				break;

			case 'inactive':
				$this->webspice->action_executer($TableName='calendar', $KeyField='EVENT_ID', $key, $RedirectURL='manage_event', $PermissionName='manage_event', $StatusCheck=7, $ChangeStatus=-7, $RemoveCache='event', $Log='inactive_event');
				return false;
				break;

			case 'active':
				$this->webspice->action_executer($TableName='calendar', $KeyField='EVENT_ID', $key, $RedirectURL='manage_event', $PermissionName='manage_event', $StatusCheck=-7, $ChangeStatus=7, $RemoveCache='event', $Log='active_event');
				return false;
				break;

			case 'delete':
				$id = $this->webspice->encrypt_decrypt($key, 'decrypt');
				$sql = $this->db->query("DELETE FROM calendar WHERE EVENT_ID='".$id."' LIMIT 1");
				if($sql) {
					$this->webspice->force_redirect($url_prefix.'manage_event');
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
			$data['pager'] = $this->webspice->pager( count($count_data), $no_of_record, $page_index, $url_prefix.'manage_event/page/', 10 );	
		}

		$_SESSION['sql'] = $sql;
		$_SESSION['filter_by'] = $filter_by;
		$result = $this->db->query($sql)->result();

		$data['get_record'] = $result;
		$data['filter_by'] = $filter_by;

		$this->load->view('admin/calendar/manage_event', $data);

	}

}