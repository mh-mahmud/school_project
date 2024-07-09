<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "education";
$route['confirmation'] = "parent_controller/show_confirmation";
$route['change_pass'] = 'admin_controller/change_pass';

// ajax data load setup
$route['class_wise_section_list'] = "parent_controller/class_wise_section_list";
$route['class_wise_subject_list'] = "parent_controller/class_wise_subject_list";
$route['class_wise_student_list'] = "parent_controller/class_wise_student_list";
$route['section_wise_student_list'] = "parent_controller/section_wise_student_list";
$route['class_wise_payment_list'] = "parent_controller/class_wise_payment_list";
$route['student_list_search'] = "parent_controller/student_list_search";
$route['house_wise_student_list'] = "parent_controller/house_wise_student_list";
$route['teacher_wise_salary_list'] = "parent_controller/teacher_wise_salary_list";
$route['update_calendar_data'] = "calendar_controller/update_calendar_data";
$route['section_wise_roll_no'] = "parent_controller/section_wise_roll_no";

# page setup
$route['contact'] = "parent_controller/contact";
$route['about'] = "education/about";
$route['teacher'] = "education/teacher";
$route['single_teacher'] = "education/single_teacher";
$route['syllabus'] = "education/syllabus";
$route['gallery'] = "education/gallery";
$route['video'] = "education/video";
$route['contact'] = "education/contact";
$route['front_notice'] = "education/notice";
$route['single_notice'] = "education/single_notice";
$route['cultural_activity'] = "education/cultural_activity";
$route['achievement'] = "education/achievement";
$route['single_achievement'] = "education/single_achievement";
$route['single_activities'] = "education/single_activities";
$route['display'] = "education/display";
$route['routine'] = "education/routine";
$route['insert'] = "education/insert";
$route['query_insert'] = "new_template/query_insert";
$route['insert'] = "new_template/insert";
$route['product'] = "parent_controller/product";
$route['product/:any'] = "parent_controller/product";
$route['category'] = "parent_controller/category";
$route['category/:any'] = "parent_controller/category";

// new pages
$route['admission'] = "education/admission";
$route['forms'] = "education/forms";
$route['print_form'] = "education/print_form";
$route['online_application'] = "education/online_application";

# admin panel setup
$route['admin'] = 'admin_controller';
$route['login'] = 'admin_controller/login';
//$route['login'] = 'auth_controller/login';
$route['logout'] = 'admin_controller/logout';
$route['admin_confirmation'] = "admin_controller/show_confirmation";

// category
$route['create_category'] = "admin_controller/create_category";
$route['manage_category'] = "admin_controller/manage_category";
$route['manage_category/:any'] = "admin_controller/manage_category";

// sub category
$route['create_sub_category'] = "admin_controller/create_sub_category";
$route['manage_sub_category'] = "admin_controller/manage_sub_category";
$route['manage_sub_category/:any'] = "admin_controller/manage_sub_category";

$route['create_sub_sub_category'] = "admin_controller/create_sub_sub_category";
$route['manage_sub_sub_category'] = "admin_controller/manage_sub_sub_category";
$route['manage_sub_sub_category/:any'] = "admin_controller/manage_sub_sub_category";

// product
$route['create_product'] = "admin_controller/create_product";
$route['manage_product'] = "admin_controller/manage_product";
$route['manage_product/:any'] = "admin_controller/manage_product";

// slider
$route['create_slider'] = "admin_controller/create_slider";
$route['manage_slider'] = "admin_controller/manage_slider";
$route['manage_slider/:any'] = "admin_controller/manage_slider";

// gallery
$route['add_images'] = "admin_controller/add_images";
$route['manage_gallery'] = "admin_controller/manage_gallery";
$route['manage_gallery/:any'] = "admin_controller/manage_gallery";
$route['gallery/:any'] = "parent_controller/gallery";

// cultural activities
$route['add_cultural_activities'] = "admin_controller/add_cultural_activities";
$route['manage_cultural_activities'] = "admin_controller/manage_cultural_activities";
$route['manage_cultural_activities/:any'] = "admin_controller/manage_cultural_activities";

// achievement
$route['add_achievement'] = "admin_controller/add_achievement";
$route['manage_achievement'] = "admin_controller/manage_achievement";
$route['manage_achievement/:any'] = "admin_controller/manage_achievement";

// downloads
$route['add_downloads'] = "admin_controller/add_downloads";
$route['manage_downloads'] = "admin_controller/manage_downloads";
$route['manage_downloads/:any'] = "admin_controller/manage_downloads";
$route['downloads/:any'] = "parent_controller/downloads";

// videos
$route['add_videos'] = "admin_controller/add_videos";
$route['manage_videos'] = "admin_controller/manage_videos";
$route['manage_videos/:any'] = "admin_controller/manage_videos";
$route['videos/:any'] = "parent_controller/videos";

// person
$route['add_person'] = "admin_controller/add_person";
$route['manage_person'] = "admin_controller/manage_person";
$route['manage_person/:any'] = "admin_controller/manage_person";
$route['person/:any'] = "parent_controller/person";

// additional data
$route['add_additional_data'] = "admin_controller/add_additional_data";
$route['manage_additional_data'] = "admin_controller/manage_additional_data";
$route['manage_additional_data/:any'] = "admin_controller/manage_additional_data";

// page management
$route['create_page'] = "admin_controller/create_page";
$route['manage_pages'] = "admin_controller/manage_pages";
$route['manage_pages/:any'] = "admin_controller/manage_pages";

// settings
$route['create_class'] = "settings_controller/create_class";
$route['manage_class'] = "settings_controller/manage_class";
$route['manage_class/:any'] = "settings_controller/manage_class";
$route['create_section'] = "settings_controller/create_section";
$route['manage_section'] = "settings_controller/manage_section";
$route['manage_section/:any'] = "settings_controller/manage_section";
$route['create_designation'] = "settings_controller/create_designation";
$route['manage_designation'] = "settings_controller/manage_designation";
$route['manage_designation/:any'] = "settings_controller/manage_designation";
$route['create_notice'] = "settings_controller/create_notice";
$route['manage_notice'] = "settings_controller/manage_notice";
$route['manage_notice/:any'] = "settings_controller/manage_notice";
$route['create_subject'] = "settings_controller/create_subject";
$route['manage_subject'] = "settings_controller/manage_subject";
$route['manage_subject/:any'] = "settings_controller/manage_subject";
$route['settings_data'] = "settings_controller/settings_data";

// student
$route['add_student_info'] = "student_controller/add_student_info";
$route['manage_student_info'] = "student_controller/manage_student_info";
$route['manage_student_info/:any'] = "student_controller/manage_student_info";
$route['admit_student'] = "student_controller/admit_student";
$route['manage_student_admission'] = "student_controller/manage_student_admission";
$route['manage_student_admission/:any'] = "student_controller/manage_student_admission";
$route['send_sms'] = "student_controller/send_sms";
$route['send_sms/:any'] = "student_controller/send_sms";
$route['assign_student_subject'] = "student_controller/assign_student_subject";
$route['manage_student_subjects'] = "student_controller/manage_student_subjects";
$route['manage_student_subjects/:any'] = "student_controller/manage_student_subjects";
$route['print_sit_planning'] = "student_controller/print_sit_planning";
$route['online_request'] = "student_controller/online_request";
$route['online_request/:any'] = "student_controller/online_request";

// class
$route['create_class_routine'] = "student_controller/create_class_routine";
$route['manage_class_routine'] = "student_controller/manage_class_routine";
$route['manage_class_routine/:any'] = "student_controller/manage_class_routine";

// Teacher
$route['create_teacher'] = "settings_controller/create_teacher";
$route['manage_teacher'] = "settings_controller/manage_teacher";
$route['manage_teacher/:any'] = "settings_controller/manage_teacher";
$route['assign_teacher'] = "settings_controller/assign_teacher";
$route['manage_assign_teacher'] = "settings_controller/manage_assign_teacher";
$route['manage_assign_teacher/:any'] = "settings_controller/manage_assign_teacher";
$route['assign_subject'] = "settings_controller/assign_subject";
$route['manage_assign_subject'] = "settings_controller/manage_assign_subject";
$route['manage_assign_subject/:any'] = "settings_controller/manage_assign_subject";

//exam 
$route['create_exam'] = "settings_controller/create_exam";
$route['manage_exam_list'] = "settings_controller/manage_exam_list";
$route['manage_exam_list/:any'] = "settings_controller/manage_exam_list";
$route['create_grade'] = "settings_controller/create_grade";
$route['manage_grade'] = "settings_controller/manage_grade";
$route['manage_grade/:any'] = "settings_controller/manage_grade";
$route['insert_marks'] = "settings_controller/insert_marks";
$route['manage_marks'] = "settings_controller/manage_marks";
$route['manage_marks/:any'] = "settings_controller/manage_marks";
$route['student_marksheet'] = "settings_controller/student_marksheet";
$route['student_marksheet/:any'] = "settings_controller/student_marksheet";

// report
$route['class_wise_marksheet'] = "settings_controller/class_wise_marksheet";
$route['class_wise_marksheet/:any'] = "settings_controller/class_wise_marksheet";
$route['section_wise_marksheet'] = "settings_controller/section_wise_marksheet";
$route['section_wise_marksheet/:any'] = "settings_controller/section_wise_marksheet";
$route['average_marksheet'] = "settings_controller/average_marksheet";
$route['average_marksheet/:any'] = "settings_controller/average_marksheet";
$route['progress_report'] = "student_controller/progress_report";
$route['progress_report/:any'] = "student_controller/progress_report";

// staff 
$route['create_staff'] = "settings_controller/create_staff";
$route['manage_staff'] = "settings_controller/manage_staff";
$route['manage_staff/:any'] = "settings_controller/manage_staff";

// Board 
$route['create_board'] = "settings_controller/create_board";
$route['manage_board'] = "settings_controller/manage_board";
$route['manage_board/:any'] = "settings_controller/manage_board";

// Parent
$route['create_parent'] = "settings_controller/create_parent";
$route['manage_parent'] = "settings_controller/manage_parent";
$route['manage_parent/:any'] = "settings_controller/manage_parent";

// certificates
$route['create_testimonial'] = "settings_controller/create_testimonial";
$route['manage_testimonial'] = "settings_controller/manage_testimonial";
$route['manage_testimonial/:any'] = "settings_controller/manage_testimonial";
$route['create_transfer_certificate'] = "settings_controller/create_transfer_certificate";
$route['manage_transfer_certificate'] = "settings_controller/manage_transfer_certificate";
$route['manage_transfer_certificate/:any'] = "settings_controller/manage_transfer_certificate";
$route['student_report_card'] = "settings_controller/student_report_card";
$route['print_student_report_card'] = "settings_controller/print_student_report_card";
$route['print_student_report_card/:any'] = "settings_controller/print_student_report_card";
$route['student_mark_sheet'] = "settings_controller/student_mark_sheet";
$route['print_student_mark_sheet'] = "settings_controller/print_student_mark_sheet";
$route['print_student_mark_sheet/:any'] = "settings_controller/print_student_mark_sheet";
$route['print_progress_report'] = "student_controller/print_progress_report";
$route['print_progress_report/:any'] = "student_controller/print_progress_report";
$route['test_print_page'] = "student_controller/test_print_page";
$route['admit_card'] = "student_controller/admit_card";
$route['print_admit_card'] = "student_controller/print_admit_card";
$route['print_admit_card/:any'] = "student_controller/print_admit_card";


// attendance
$route['daily_attendance'] = "student_controller/daily_attendance";
$route['manage_attendance'] = "student_controller/manage_attendance";
$route['manage_attendance/:any'] = "student_controller/manage_attendance";
$route['attendance_report'] = "student_controller/attendance_report";
$route['attendance_report/:any'] = "student_controller/attendance_report";
$route['upload_csv_file'] = "student_controller/upload_csv_file";
$route['download_csv_file'] = "student_controller/download_csv_file";

// Payment
$route['create_payment_category'] = "payment_controller/create_payment_category";
$route['manage_payment_category'] = "payment_controller/manage_payment_category";
$route['manage_payment_category/:any'] = "payment_controller/manage_payment_category";
$route['create_payment'] = "payment_controller/create_payment";
$route['manage_payment'] = "payment_controller/manage_payment";
$route['manage_payment/:any'] = "payment_controller/manage_payment";
$route['payment_report'] = "payment_controller/payment_report";
$route['payment_report/:any'] = "payment_controller/payment_report";

// new payment
$route['ie_category'] = "payment_controller/ie_category";
$route['manage_ie_category'] = "payment_controller/manage_ie_category";
$route['manage_ie_category/:any'] = "payment_controller/manage_ie_category";
$route['create_admission_payment'] = "payment_controller/create_admission_payment";
$route['manage_admission_payment'] = "payment_controller/manage_admission_payment";
$route['manage_admission_payment/:any'] = "payment_controller/manage_admission_payment";
$route['create_monthly_payment'] = "payment_controller/create_monthly_payment";
$route['manage_monthly_payment'] = "payment_controller/manage_monthly_payment";
$route['manage_monthly_payment/:any'] = "payment_controller/manage_monthly_payment";
$route['category_list'] = "payment_controller/category_list";
$route['category_list/:any'] = "payment_controller/category_list";
$route['admission_payment_report'] = "payment_controller/admission_payment_report";
$route['create_category_list'] = "payment_controller/create_category_list";

// student panel
$route['view_attendance'] = "student_controller/view_attendance";
$route['view_class_routine'] = "student_controller/view_class_routine";
$route['view_mark_sheet'] = "student_controller/view_mark_sheet";
$route['view_notice'] = "student_controller/view_notice";
$route['view_subjects'] = "student_controller/view_subjects";
$route['view_teachers'] = "student_controller/view_teachers";
$route['view_payment'] = "student_controller/view_payment";
$route['my_notifications'] = "student_controller/my_notifications";
$route['my_book_request'] = "student_controller/my_book_request";
$route['view_library_books'] = "student_controller/view_library_books";
$route['my_issues_and_returns'] = "student_controller/my_issues_and_returns";

// parents panel
$route['view_notice_parents'] = "student_controller/view_notice";
$route['view_attendance_parents'] = "student_controller/view_attendance";
$route['view_class_routine_parents'] = "student_controller/view_class_routine";
$route['view_mark_sheet_parents'] = "student_controller/view_mark_sheet";
$route['view_subjects_parents'] = "student_controller/view_subjects";
$route['view_teachers_parents'] = "student_controller/view_teachers";
$route['view_payment_parents'] = "student_controller/view_payment";

# user authentication
// $route['login'] = 'parent_controller/login';
// $route['logout'] = 'parent_controller/logout';
$route['change_password'] = 'parent_controller/change_password';
$route['change_password/:any'] = 'parent_controller/change_password';
$route['forgot_password'] = 'parent_controller/forgot_password';

# user management
$route['create_user']='master_controller/create_user';
$route['create_student']='master_controller/create_student';
$route['create_teacher_user']='master_controller/create_teacher_user';
$route['create_parents']='master_controller/create_parents';
$route['manage_user']='master_controller/manage_user';
$route['manage_user/:any']='master_controller/manage_user';
$route['create_role']='master_controller/create_role';
$route['manage_role']='master_controller/manage_role';
$route['manage_role/:any']='master_controller/manage_role';
$route['page/:any'] = 'parent_controller/page';
$route['manage_user_data'] = "admin_controller/manage_user_data";
$route['manage_user_data/:any'] = "admin_controller/manage_user_data";
$route['notice'] = "parent_controller/notice";
$route['notice/:any'] = "parent_controller/notice";
$route['events'] = "parent_controller/events";
$route['events/:any'] = "parent_controller/events";
$route['person_msg'] = "parent_controller/person_msg";
$route['person_msg/:any'] = "parent_controller/person_msg";

# library management
$route['create_book_category']='library_controller/create_book_category';
$route['manage_book_category'] = "library_controller/manage_book_category";
$route['manage_book_category/:any'] = "library_controller/manage_book_category";
$route['create_writer']='library_controller/create_writer';
$route['manage_writer'] = "library_controller/manage_writer";
$route['manage_writer/:any'] = "library_controller/manage_writer";
$route['add_book']='library_controller/add_book';
$route['manage_book'] = "library_controller/manage_book";
$route['manage_book/:any'] = "library_controller/manage_book";
$route['add_library_member']='library_controller/add_library_member';
$route['manage_library_member'] = "library_controller/manage_library_member";
$route['manage_library_member/:any'] = "library_controller/manage_library_member";
$route['general_settings']='library_controller/general_settings';
$route['manage_settings'] = "library_controller/manage_settings";
$route['manage_settings/:any'] = "library_controller/manage_settings";
$route['send_notification']='library_controller/send_notification';
$route['manage_notification'] = "library_controller/manage_notification";
$route['manage_notification/:any'] = "library_controller/manage_notification";
$route['book_issue']='library_controller/book_issue';
$route['manage_issue_and_return'] = "library_controller/manage_issue_and_return";
$route['manage_issue_and_return/:any'] = "library_controller/manage_issue_and_return";
$route['send_book_request']='library_controller/send_book_request';
$route['manage_book_request'] = "library_controller/manage_book_request";
$route['manage_book_request/:any'] = "library_controller/manage_book_request";

// hostel
$route['add_house']='hostel_controller/add_house';
$route['manage_house'] = "hostel_controller/manage_house";
$route['manage_house/:any'] = "hostel_controller/manage_house";
$route['assign_house_teacher']='hostel_controller/assign_house_teacher';
$route['manage_house_teacher'] = "hostel_controller/manage_house_teacher";
$route['manage_house_teacher/:any'] = "hostel_controller/manage_house_teacher";
$route['admit_student_to_hostel']='hostel_controller/admit_student_to_hostel';
$route['manage_hostel_student'] = "hostel_controller/manage_hostel_student";
$route['manage_hostel_student/:any'] = "hostel_controller/manage_hostel_student";
$route['student_checkin']='hostel_controller/student_checkin';
$route['manage_checkin'] = "hostel_controller/manage_checkin";
$route['manage_checkin/:any'] = "hostel_controller/manage_checkin";

// payroll 
$route['salary_settings']='payroll_controller/salary_settings';
$route['manage_salary_settings'] = "payroll_controller/manage_salary_settings";
$route['manage_salary_settings/:any'] = "payroll_controller/manage_salary_settings";
$route['monthly_salary']='payroll_controller/monthly_salary';
$route['manage_salary'] = "payroll_controller/manage_salary";
$route['manage_salary/:any'] = "payroll_controller/manage_salary";
$route['salary_report'] = "payroll_controller/salary_report";
$route['salary_report/:any'] = "payroll_controller/salary_report";

$route['leave_settings'] = "payroll_controller/leave_settings";
$route['manage_leave_settings'] = "payroll_controller/manage_leave_settings";
$route['manage_leave_settings/:any'] = "payroll_controller/manage_leave_settings";

$route['add_leave'] = "payroll_controller/add_leave";
$route['manage_leave'] = "payroll_controller/manage_leave";
$route['manage_leave/:any'] = "payroll_controller/manage_leave";
$route['leave_report'] = "payroll_controller/leave_report";
$route['leave_report/:any'] = "payroll_controller/leave_report";

// calendar
$route['view_events'] = "calendar_controller/display";
$route['view_events/:any'] = "calendar_controller/display";
$route['create_event'] = "calendar_controller/create_event";
$route['manage_event'] = "calendar_controller/manage_event";
$route['manage_event/:any'] = "calendar_controller/manage_event";


// routes for print