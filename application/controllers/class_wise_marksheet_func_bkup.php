<?php

	public function class_wise_marksheet() {

		$url_prefix = $this->webspice->settings()->site_url_prefix;
		$this->webspice->user_verify($url_prefix.'login', $url_prefix.'class_wise_marksheet');
		$this->webspice->permission_verify('class_wise_marksheet');

		if($this->input->post("filter")){
			$data = array();

			$class_id = $this->input->post("class_id");
			// $section_id = $this->input->post("section_id");
			// $student_id = $this->input->post("student_id");
			$exam_id = $this->input->post("exam_id");
			$year = $this->input->post("year");

			// dd($_POST);

			$students = $this->db->query("SELECT si.name, sd.student_id, sd.class_id FROM student_info AS si INNER JOIN student_data AS sd ON si.student_id=sd.student_id WHERE sd.class_id=".$class_id)->result();
			// dd($students);

			// $subjects = $this->db->query("SELECT SUBJECT_ID, SUBJECT_NAME FROM subject WHERE CLASS_ID='".$class_id."' ORDER BY SUBJECT_ID")->result();
			$subjects = $this->db->query("SELECT m.SUBJECT_ID, s.SUBJECT_NAME, s.SUBJECT_ID FROM marks AS m INNER JOIN subject AS s ON m.SUBJECT_ID=s.SUBJECT_ID WHERE m.CLASS_ID='".$class_id."' GROUP BY m.CLASS_ID, m.SUBJECT_ID ORDER BY m.SUBJECT_ID")->result();
			// dd($subjects);

			$res_data = array();
			echo "<table border=1>";
				echo "<tr>";
					echo "<th>Student Name</th>";
					foreach($subjects as $sub) :
						echo "<th>".$sub->SUBJECT_NAME."</th>";
					endforeach;
					echo "<th>Total</th>";
				echo "</tr>";


			foreach($students as $stupid) {
				$res = $this->db->query("SELECT s.subject_name, m.class_id, m.exam_id, m.section_id, m.mark_obtained, m.student_id, m.subject_id FROM SUBJECT AS s LEFT JOIN marks AS m ON s.subject_id = m.subject_id WHERE m.student_id='".$stupid->student_id."' AND m.exam_id='".$exam_id."' AND m.class_id='".$class_id."' ORDER BY m.subject_id")->result();
				$res_data[] = $res;
				// dd($res, true);
				echo "<tr>";
					echo "<td>". $this->student_name($res[0]->student_id) ."</td>";
					$x=0;
					$total = array();
					foreach($res as $papana) {
						$total[] = $papana->mark_obtained;
						if($subjects[$x]->SUBJECT_ID == $papana->subject_id) {
							echo "<td>". $papana->mark_obtained ."</td>";
						}
						else {
							echo "<td></td>";
						}
						$x++;
					}
					echo "<td>". array_sum($total) ."</td>";
				echo "</tr>";

			}
			echo "</table>";
			// dd($res_data);
			exit();

			echo "<table border=1>";
				echo "<tr>";
					echo "<th>Student Name</th>";
					echo "<th>Bangla</th>";
					echo "<th>English</th>";
					echo "<th>General Science</th>";
					echo "<th>Social Science</th>";
				echo "</tr>";

				// dd($res_data);

				foreach($res_data as $v) {
					// dd($v, true);

					$unq_stu = null;
					$temp_stu = array();

					// for($j=0; $j<count($v[$j]); $j++) {
					// 	$temp_stu[] = $v[$j];
					// }

					// dd($temp_stu, false);
					
					for($i=0; $i<count($v); $i++) {
						// dd($v, true);

						// $temp_stu[$v[$i]->student_id] = array_push($v[$i]->mark_obtained);

						echo "<tr>";
							echo "<td>'". $this->student_name($v[$i]->student_id) ."'</td>";
							echo "<td>'". $v[$i]->mark_obtained ."'</td>";
						echo "</tr>";

					}
					// dd($temp_stu, true);
					
				}

			echo "</table>";

			exit();


			$data['get_record'] = $this->db->query("SELECT m.*, c.CLASS_NAME, si.NAME, s.SECTION_NAME, e.EXAM_NAME, sub.SUBJECT_NAME FROM marks AS m INNER JOIN class AS c ON m.CLASS_ID=c.CLASS_ID INNER JOIN section AS s ON s.SECTION_ID=m.SECTION_ID INNER JOIN exam AS e ON e.EXAM_ID=m.EXAM_ID INNER JOIN subject AS sub ON m.SUBJECT_ID=sub.SUBJECT_ID INNER JOIN student_info AS si ON si.STUDENT_ID=m.STUDENT_ID WHERE m.CLASS_ID='".$class_id."' AND m.EXAM_ID='".$exam_id."' AND YEAR='".$year."' ORDER BY m.STUDENT_ID, m.SUBJECT_ID")->result();
			dd($data);

			// dd($data);
			if(count($data['get_record'])) {
				$data['class_name'] = $data['get_record'][0]->CLASS_NAME;
				$data['section_name'] = $data['get_record'][0]->SECTION_NAME;
				$data['student_name'] = $data['get_record'][0]->NAME;
			}else{
				$data = array();
			}

			$this->load->view('admin/report/class_wise_marksheet', $data);
			return false;
		}
		else {
			$data = array();
			$this->load->view('admin/report/class_wise_marksheet', $data);
		}

	}