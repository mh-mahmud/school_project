<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Education extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');

        $this->conf = array(
            'start_day'         => 'sunday',
            'show_next_prev'    => true,
            'next_prev_url'     => base_url() . 'Education/display',
            'day_type'     => 'long'
        );
        $this->conf['template'] = '

           {table_open}<table border="0" cellpadding="0" cellspacing="0" class="calendar">{/table_open}

           {heading_row_start}<tr class="trmonth">{/heading_row_start}

           {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
           {heading_title_cell}<th class="monthnm" colspan="{colspan}">{heading}</th>{/heading_title_cell}
           {heading_next_cell}<th><a class="monnxt" href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

           {heading_row_end}</tr>{/heading_row_end}

           {week_row_start}<tr class="trheader">{/week_row_start}
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

    public function display($year=null, $month=null) {
        $data = array();
        $data['siteTitle'] = "Academic Calender";
        $data['sitemenu'] = "contact";
        $data['notice'] = $this->db->order_by("notice_id", "desc")->get("noticeboard", 5)->result();

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
        $data['exam'] = $this->db->order_by("exam_id", "desc")->get("exam")->result();
        $data['msg'] = $this->db->order_by("PERSON_ID", "ASC")->get("persons", 1)->result();
        $data['fnotice'] = $this->db->order_by("notice_id", "desc")->get("noticeboard", 5)->result();
        $data['activities'] = $this->db->order_by("CULTURAL_ACTIVITIES_ID", "DESC")->get("cultural_activities", 1)->result();
        $data['calendar'] = $this->generate($year, $month);
        $this->load->view("academic_calender", $data);

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

    public function index() {
        $data = array();
        $data['siteTitle'] = "Comilla Yusuf Hisgh School";
        $data['sitemenu'] = "home";
        $data['exam'] = $this->db->order_by("exam_id", "desc")->get("exam")->result();
        $data['class'] = $this->db->order_by("class_id", "asc")->get("class")->result();
        $data['gallery'] = $this->db->order_by("image_id", "desc")->get("gallery", 6)->result();
        $data['slider'] = $this->db->order_by("SLIDER_ID", "ASC")->get("slider")->result();
        $data['fnotice'] = $this->db->order_by("notice_id", "desc")->get("noticeboard", 5)->result();
        $data['messages'] = $this->db->order_by("PERSON_ID", "ASC")->get("persons")->result();
        $data['activities'] = $this->db->order_by("CULTURAL_ACTIVITIES_ID", "DESC")->get("cultural_activities", 1)->result();
        $data['achievement'] = $this->db->order_by("ACHIEVEMENT_ID", "DESC")->get("achievement", 1)->result();
        $data['video'] = $this->db->order_by("VIDEO_ID", "DESC")->get("videos", 1)->result();
        // dd($data['activities']);
        //print_r($data['messages']);
        $this->load->view("home", $data);
    }

    // new functions
    public function admission() {
        $data = array();
        $data['siteTitle'] = "Admission";
        $data['sitemenu'] = "admission";
        $data['fnotice'] = $this->db->order_by("notice_id", "desc")->get("noticeboard", 5)->result();
        $data['exam'] = $this->db->order_by("exam_id", "desc")->get("exam")->result();
        $data['msg'] = $this->db->order_by("PERSON_ID", "ASC")->get("persons", 1)->result();
        $data['activities'] = $this->db->order_by("CULTURAL_ACTIVITIES_ID", "DESC")->get("cultural_activities", 1)->result();
        $this->load->view("admission", $data);
    }

    public function forms() {
        $data = array();
        $data['siteTitle'] = "Forms & Downloads";
        $data['sitemenu'] = "forms";
        $this->load->view("forms", $data);
    }

    public function online_application() {
        $data = array();
        $data['siteTitle'] = "Online Application";
        $data['sitemenu'] = "forms";
        $data['fnotice'] = $this->db->order_by("notice_id", "desc")->get("noticeboard", 5)->result();
        $data['exam'] = $this->db->order_by("exam_id", "desc")->get("exam")->result();
        $data['msg'] = $this->db->order_by("PERSON_ID", "ASC")->get("persons", 1)->result();
        $data['activities'] = $this->db->order_by("CULTURAL_ACTIVITIES_ID", "DESC")->get("cultural_activities", 1)->result();

        $url_prefix = $this->webspice->settings()->site_url_prefix;
        // $this->webspice->user_verify($url_prefix.'login', $url_prefix.'add_person');
        // $this->webspice->permission_verify('add_person');
        if( !isset($data['edit']) ){
            $data['edit'] = array(
                'CLASS_ID'=>null,
                'STUDENT_ID'=>null,
                'NAME'=>null,
                'BIRTHDAY'=>null,
                'GENDER'=>null,
                'RELIGION'=>null,
                'BLOOD_GROUP'=>null,
                'AGE'=>null,
                'ADDRESS'=>null,
                'PHONE'=>null,
                'EMAIL'=>null,
                'FATHER_NAME'=>null,
                'MOTHER_NAME'=>null
            );
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('class_id','class name','required|trim|xss_clean');
        $this->form_validation->set_rules('name','name','required|trim|xss_clean');
        $this->form_validation->set_rules('birthday','birthday','trim|xss_clean');
        $this->form_validation->set_rules('gender','gender','required|trim|xss_clean');
        $this->form_validation->set_rules('religion','religion','required|trim|xss_clean');
        $this->form_validation->set_rules('blood_group','blood group','trim|xss_clean');
        $this->form_validation->set_rules('age','age','required|trim|xss_clean');
        $this->form_validation->set_rules('address','address','required|trim|xss_clean');
        $this->form_validation->set_rules('phone','phone','required|trim|xss_clean');
        $this->form_validation->set_rules('email','email','required|trim|xss_clean');
        $this->form_validation->set_rules('father_name','father name','required|trim|xss_clean');
        $this->form_validation->set_rules('mother_name','mother name','required|trim|xss_clean');
        
        if( !$this->form_validation->run() ){
            $this->load->view('online_application', $data);
            return FALSE;
        }

        # get input post
        $input = $this->webspice->get_input('student_id');
        
        #duplicate test
        $this->webspice->db_field_duplicate_test("SELECT * FROM online_application WHERE Email=?", array($input->email), 'You are not allowed to enter duplicate entry', 'STUDENT_ID', $input->student_id, $data, 'online_application');
        
        # remove cache
        $this->webspice->remove_cache('student_info');

        # verify file type
        if( $_FILES['images']['tmp_name'] ){
            $this->webspice->check_file_type(array('jpg', 'jpeg', 'png', 'gif', 'bmp'), 'images', $data, 'online_application');
        }

        $current_year = date("Y");
        $last_word = substr($input->name, -1, 1);
        $id_no = $this->db->query("SELECT STUDENT_ID FROM online_application ORDER BY STUDENT_ID DESC LIMIT 1")->row();

        if(count($id_no)) {
            $id_no = $id_no->STUDENT_ID;
        }
        else {
            $id_no = 0;
        }
        // dd(++$id_no);
        $id_no = ++$id_no;
        $public_id = $current_year . $last_word . $id_no;
        // dd($public_id);

        
        #insert data
        $sql = "
        INSERT INTO online_application
        (NAME, BIRTHDAY, GENDER, RELIGION, BLOOD_GROUP, AGE, ADDRESS, PHONE, EMAIL, FATHER_NAME, MOTHER_NAME, CLASS_ID, YEAR, CREATED_BY, CREATED_DATE, STATUS)
        VALUES
        ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1 )";
        $this->db->query($sql, array($input->name, date("Y-m-d", strtotime($input->birthday)), $input->gender, $input->religion, $input->blood_group, $input->age, $input->address, $input->phone, $input->email, $input->father_name, $input->mother_name, $input->class_id, date("Y"), $this->webspice->get_user_id(), $this->webspice->now()));
        $this->webspice->process_image_single('images',$this->db->insert_id(), 'online_application_full', 750, 1000);

        if( !$this->db->insert_id() ){
            $this->webspice->message_board('We could not execute your request. Please tray again later or report to authority.');
            $this->webspice->force_redirect($url_prefix . 'online_application');
            return false;
        }

        $this->webspice->message_board('Your application submitted successfully! We will inform you at your mail');
        if($this->webspice->permission_verify('manage_student_info',TRUE)){
            $this->webspice->force_redirect($url_prefix . 'online_application');
            return FALSE;
        }
        $this->webspice->force_redirect($url_prefix.'online_application');

    }

    public function print_form() {
        $this->load->view('print_form');
    }

    // end new functions

    public function about() {
        //dd("Hello World");
        $data = array();
        $data['siteTitle'] = "About";
        $data['sitemenu'] = "about";
        $data['fnotice'] = $this->db->order_by("notice_id", "desc")->get("noticeboard", 5)->result();
        $data['exam'] = $this->db->order_by("exam_id", "desc")->get("exam")->result();
        $data['msg'] = $this->db->order_by("PERSON_ID", "ASC")->get("persons", 1)->result();
        $data['activities'] = $this->db->order_by("CULTURAL_ACTIVITIES_ID", "DESC")->get("cultural_activities", 1)->result();
        $this->load->view("about-us", $data);
    }

    public function teacher() {
        $data = array();
        $data['siteTitle'] = "Teacher";
        $data['sitemenu'] = "teacher";
        $data['exam'] = $this->db->order_by("exam_id", "desc")->get("exam")->result();
        $data['msg'] = $this->db->order_by("PERSON_ID", "ASC")->get("persons", 1)->result();
        $data['fnotice'] = $this->db->order_by("notice_id", "desc")->get("noticeboard", 5)->result();
        $data['teacher'] = $this->db->order_by("DESIGNATION_ID", "ASC")->get('teacher')->result();
        $data['desig'] = $this->db->get('designation')->result_array();
        $data['activities'] = $this->db->order_by("CULTURAL_ACTIVITIES_ID", "DESC")->get("cultural_activities", 1)->result();
        $this->load->view("teacher", $data);
    }

    public function single_teacher() {
        $id = $this->input->post("views");
        //echo $id;
        $data = array();
        $data['siteTitle'] = "Teacher";
        $data['sitemenu'] = "teacher";
        $data['exam'] = $this->db->order_by("exam_id", "desc")->get("exam")->result();
        $data['msg'] = $this->db->order_by("PERSON_ID", "ASC")->get("persons", 1)->result();
        $data['fnotice'] = $this->db->order_by("notice_id", "desc")->get("noticeboard", 5)->result();
        $data['teacher'] = $this->db->get_where('teacher', array("teacher_id" => $id))->row_array();
        $data['activities'] = $this->db->order_by("CULTURAL_ACTIVITIES_ID", "DESC")->get("cultural_activities", 1)->result();
        // print_r($data['teacher']);
        $this->load->view("single_teacher", $data);
    }

    public function syllabus() {
        //dd("hi");
        $data = array();
        $data['siteTitle'] = "Syllabus";
        $data['sitemenu'] = "syllabus";
        $data['syllabus'] = $this->db->order_by("file_id", "desc")->get("files")->result();
        $data['exam'] = $this->db->order_by("exam_id", "desc")->get("exam")->result();
        $data['msg'] = $this->db->order_by("PERSON_ID", "ASC")->get("persons", 1)->result();
        $data['fnotice'] = $this->db->order_by("notice_id", "desc")->get("noticeboard", 5)->result();
        $data['activities'] = $this->db->order_by("CULTURAL_ACTIVITIES_ID", "DESC")->get("cultural_activities", 1)->result();
        $this->load->view("syllabus", $data);
    }

    public function routine(){
        $data = array();
        $data['siteTitle'] = "Routine";
        $data['sitemenu'] = "routine";
        $data['class'] = $this->db->select("*")->from("class_routine")->group_by("SECTION_ID")->get()->result();
        $data['exam'] = $this->db->order_by("exam_id", "desc")->get("exam")->result();
        $data['msg'] = $this->db->order_by("PERSON_ID", "ASC")->get("persons", 1)->result();
        $data['fnotice'] = $this->db->order_by("notice_id", "desc")->get("noticeboard", 5)->result();
        $data['activities'] = $this->db->order_by("CULTURAL_ACTIVITIES_ID", "DESC")->get("cultural_activities", 1)->result();
        $this->load->view("routine", $data);
    }

    public function class_wise_routine() {
        $id = $this->uri->segment(3);
        //echo $id;
        $data = array();
        $data['siteTitle'] = "Class Wise Routine";
        $data['sitemenu'] = "routine";
        $data['notice'] = $this->db->order_by("notice_id", "desc")->get("noticeboard", 5)->result();
        $data['section_id'] = $id;
        $sql = $this->db->query("SELECT s.SECTION_NAME, c.CLASS_NAME FROM section AS s INNER JOIN class AS c ON s.CLASS_ID=c.CLASS_ID WHERE s.SECTION_ID=" . $data['section_id'])->row();
        $data['section_name'] = $sql->SECTION_NAME;
        $data['class_name'] = $sql->CLASS_NAME;
        $data['exam'] = $this->db->order_by("exam_id", "desc")->get("exam")->result();
        $data['msg'] = $this->db->order_by("PERSON_ID", "ASC")->get("persons", 1)->result();
        $data['fnotice'] = $this->db->order_by("notice_id", "desc")->get("noticeboard", 5)->result();
        $data['activities'] = $this->db->order_by("CULTURAL_ACTIVITIES_ID", "DESC")->get("cultural_activities", 1)->result();
        $this->load->view("class_wise_routine", $data);
    }

    public function gallery(){
        $data = array();
        $data['siteTitle'] = "gallery";
        $data['sitemenu'] = "gallery";
        $data['exam'] = $this->db->order_by("exam_id", "desc")->get("exam")->result();
        $data['msg'] = $this->db->order_by("PERSON_ID", "ASC")->get("persons", 1)->result();
        $data['fnotice'] = $this->db->order_by("notice_id", "desc")->get("noticeboard", 5)->result();
        $data['category'] = $this->db->order_by("SUB_CATEGORY_ID", "desc")->get("sub_category")->result();
        $data['gallery'] = $this->db->order_by("image_id", "desc")->get("gallery")->result_array();
        $data['activities'] = $this->db->order_by("CULTURAL_ACTIVITIES_ID", "DESC")->get("cultural_activities", 1)->result();
        $this->load->view("gallery", $data);
    }

    public function video(){
        $data = array();
        $data['siteTitle'] = "Video";
        $data['sitemenu'] = "video";
        $data['exam'] = $this->db->order_by("exam_id", "desc")->get("exam")->result();
        $data['msg'] = $this->db->order_by("PERSON_ID", "ASC")->get("persons", 1)->result();
        $data['category'] = $this->db->order_by("SUB_CATEGORY_ID", "desc")->get("sub_category")->result();
        $data['videos'] = $this->db->order_by("VIDEO_ID", "desc")->get("videos")->result_array();
        $data['fnotice'] = $this->db->order_by("notice_id", "desc")->get("noticeboard", 5)->result();
        $data['activities'] = $this->db->order_by("CULTURAL_ACTIVITIES_ID", "DESC")->get("cultural_activities", 1)->result();
        $this->load->view("video", $data);
    }

    public function notice(){
        $data = array();
        $data['siteTitle'] = "Notice";
        $data['sitemenu'] = "notice";
        $data['exam'] = $this->db->order_by("exam_id", "desc")->get("exam")->result();
        $data['msg'] = $this->db->order_by("PERSON_ID", "ASC")->get("persons", 1)->result();
        $data['fnotice'] = $this->db->order_by("notice_id", "desc")->get("noticeboard", 5)->result();
        $data['notice'] = $this->db->order_by("notice_id", "desc")->get("noticeboard")->result();
        $data['activities'] = $this->db->order_by("CULTURAL_ACTIVITIES_ID", "DESC")->get("cultural_activities", 1)->result();
        $this->load->view("notice", $data);
    }

    public function single_notice(){
        $id = $this->uri->segment(3);
        $data = array();
        $data['siteTitle'] = "Sigle Notice";
        $data['sitemenu'] = "single_notice";
        $data['fnotice'] = $this->db->order_by("notice_id", "desc")->get("noticeboard", 5)->result();
        $data['exam'] = $this->db->order_by("exam_id", "desc")->get("exam")->result();
        $data['msg'] = $this->db->order_by("PERSON_ID", "ASC")->get("persons", 1)->result();
        $data['sglnotice'] = $this->db->get_where('noticeboard', array("notice_id" => $id))->row_array();
        $data['activities'] = $this->db->order_by("CULTURAL_ACTIVITIES_ID", "DESC")->get("cultural_activities", 1)->result();
        $this->load->view("single_notice", $data);
    }

    public function cultural_activity() {
        $data = array();
        $data['siteTitle'] = "Cultural Acitvities";
        $data['sitemenu'] = "cultural";
        $data['exam'] = $this->db->order_by("exam_id", "desc")->get("exam")->result();
        $data['msg'] = $this->db->order_by("PERSON_ID", "ASC")->get("persons", 1)->result();
        $data['fnotice'] = $this->db->order_by("notice_id", "desc")->get("noticeboard", 5)->result();
        $data['down'] = $this->db->order_by("FILE_ID", "desc")->get("files")->result();
        $data['cultural_activities'] = $this->db->order_by("CULTURAL_ACTIVITIES_ID", "DESC")->get("cultural_activities")->result();
        $data['activities'] = $this->db->order_by("CULTURAL_ACTIVITIES_ID", "DESC")->get("cultural_activities", 1)->result();
        $this->load->view("cultural_activity", $data);
    }

    public function single_activities(){
        $id = $this->uri->segment(3);
        $data = array();
        $data['siteTitle'] = "Sigle Activities";
        $data['sitemenu'] = "activities";
        $data['fnotice'] = $this->db->order_by("notice_id", "desc")->get("noticeboard", 5)->result();
        $data['exam'] = $this->db->order_by("exam_id", "desc")->get("exam")->result();
        $data['msg'] = $this->db->order_by("PERSON_ID", "ASC")->get("persons", 1)->result();
        $data['sglactivities'] = $this->db->get_where('cultural_activities', array("CULTURAL_ACTIVITIES_ID" => $id))->row_array();
        $data['activities'] = $this->db->order_by("CULTURAL_ACTIVITIES_ID", "DESC")->get("cultural_activities", 1)->result();
        $this->load->view("single_activities", $data);
    }

    public function contact() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $data = array();
        $data['siteTitle'] = "Contact";
        $data['sitemenu'] = "contact";
        $data['exam'] = $this->db->order_by("exam_id", "desc")->get("exam")->result();
        $data['msg'] = $this->db->order_by("PERSON_ID", "ASC")->get("persons", 1)->result();
        $data['fnotice'] = $this->db->order_by("notice_id", "desc")->get("noticeboard", 5)->result();
        $data['activities'] = $this->db->order_by("CULTURAL_ACTIVITIES_ID", "DESC")->get("cultural_activities", 1)->result();
        $this->load->view("contact", $data);
    }

    public function achievement() {
        $data = array();
        $data['siteTitle'] = "Achievement";
        $data['sitemenu'] = "achievement";
        $data['exam'] = $this->db->order_by("exam_id", "desc")->get("exam")->result();
        $data['msg'] = $this->db->order_by("PERSON_ID", "ASC")->get("persons", 1)->result();
        $data['fnotice'] = $this->db->order_by("notice_id", "desc")->get("noticeboard", 5)->result();
        $data['down'] = $this->db->order_by("FILE_ID", "desc")->get("files")->result();
        $data['achievement'] = $this->db->order_by("ACHIEVEMENT_ID", "DESC")->get("achievement")->result();
        $data['activities'] = $this->db->order_by("CULTURAL_ACTIVITIES_ID", "DESC")->get("cultural_activities", 1)->result();
        $this->load->view("achievement", $data);
    }

    public function single_achievement(){
        $id = $this->uri->segment(3);
        $data = array();
        $data['siteTitle'] = "Sigle Achievement";
        $data['sitemenu'] = "achievement";
        $data['fnotice'] = $this->db->order_by("notice_id", "desc")->get("noticeboard", 5)->result();
        $data['exam'] = $this->db->order_by("exam_id", "desc")->get("exam")->result();
        $data['msg'] = $this->db->order_by("PERSON_ID", "ASC")->get("persons", 1)->result();
        $data['sglaachievement'] = $this->db->get_where('achievement', array("ACHIEVEMENT_ID" => $id))->row_array();
        $data['activities'] = $this->db->order_by("CULTURAL_ACTIVITIES_ID", "DESC")->get("cultural_activities", 1)->result();
        $this->load->view("single_achievement", $data);
    }

    public function insert() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_emails');
        $this->form_validation->set_rules('subject', 'subject', 'required');
        $this->form_validation->set_rules('comments', 'comments', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->contact();
        } else {
            $udata = array(
                "NAME" => $this->input->post("name"),
                "EMAIL" => $this->input->post("email"),
                "SUBJECT" => $this->input->post("subject"),
                "MESSAGE" => $this->input->post("comments"),
                "CREATED_DATE" => date("Y-m-d"),
                "STATUS" => "7"
            );
            if ($this->db->insert("user_data", $udata)) {
                $this->session->set_flashdata('msg', 'Thanks For Your Message .');
               $this->webspice->force_redirect('contact');
            } else {
                 $this->session->set_flashdata('msg', 'Server Busy Try Agin.');
                $this->webspice->force_redirect('contact');
            }
            //$this->session->set_userdata($mdata);
            //redirect(base_url() . "registration", "refresh");
        }
    }

}
