<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Viewdoctors extends CI_Controller {

    // Dashboard controller
    public function __construct() {
        parent::__construct();

        $this->load->model('admin/Doctor_model'); //--------------load model for sql operation
        //start session		
        $admin_name = $this->session->userdata('admin_name'); //---------------session variable

        if ($admin_name == '') {
            redirect('admin/admin_login');
        }
    }

    // main index function
    public function index() {
        $data['doctors'] = Viewdoctors::getAllDoctors(); //---------------fun for get all doctors
        $data['hospitals'] = Viewdoctors::getAllHospitals(); //-----------------fun for get all hospitals 

        $this->load->view('includes/header');
        $this->load->view('pages/admin/viewdoctor', $data); //------------load view
        $this->load->view('includes/footer');

        $this->load->helper('file');
        $this->load->helper('download');
        date_default_timezone_set('Asia/Kolkata');
    }

//--------------------fun for export to pdf ---------------------------------------------------//
    public function ExportToPdf_File() {
        // fetch data from db
        $result = $this->Doctor_model->getAllDoctors();
        //print_r($result);die();
        $this->load->library('Pdf');
        // create new PDF document
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        // $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Hospital Connectivity');
        $pdf->SetTitle('Doctors List');
        $pdf->SetSubject('Hospital Doctors List');
        $pdf->SetKeywords('Hospital,Doctor,Organ,Blood,Ambulance');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------
        // set font
        $pdf->SetFont('helvetica', '', 12);

        // add a page
        $pdf->AddPage();
        $memNo = 0;
        $vegCount = 0;
        $nvegCount = 0;
        $male = 0;
        $female = 0;
        $net = 0;

//        // Set some content to print
//        $html = '<h3>EVENT STATISTICS:</h3>
//		<p><label><u>Total Member Registered:</u></label> <span>' . $memNo . '</span><br>
//		<label><u>Total Checked In:</u></label> <span>' . $net . '</span><br><br>
//		<i><label>Male Members:</label> <span>' . $male . '</span></i><br>
//		<i><label>Female Members:</label> <span>' . $female . '</span></i><br>
//		<i><label>Veg Preferred Members:</label> <span>' . $vegCount . '</span></i><br>
//		<i><label>Non-Veg Preferred Members:</label> <span>' . $nvegCount . '</span></i><br></p><hr><br><br>';
//
//        // Print text using writeHTMLCell()
//        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        // column titles
        $header = array('Sr.', 'Doctor Name', 'Hospital', 'Degree', 'Email');

        // Colors, line width and bold font
        $pdf->SetFillColor(255, 0, 0);
        $pdf->SetTextColor(255);
        $pdf->SetDrawColor(128, 0, 0);
        $pdf->SetLineWidth(0.3);
        $pdf->SetFont('', 'B');
        // Header
        $w = array(10, 55, 55, 18, 55);
        $num_headers = count($header);
        for ($i = 0; $i < $num_headers; ++$i) {
            $pdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $pdf->Ln();
        // Color and font restoration
        $pdf->SetFillColor(224, 235, 255);
        $pdf->SetTextColor(0);
        $pdf->SetFont('');
        // Data
        $fill = 0;
        $count = 1;
        if ($result == '') {
            //print_r($row);
            $pdf->Cell($w[0], 6, 'N/A', 'LR', 0, 'C', $fill);
            $pdf->Cell($w[1], 6, 'N/A', 'LR', 0, 'C', $fill);
            $pdf->Cell($w[2], 6, 'N/A', 'LR', 0, 'C', $fill);
            $pdf->Cell($w[3], 6, 'N/A', 'LR', 0, 'C', $fill);
            $pdf->Cell($w[4], 6, 'N/A', 'LR', 0, 'C', $fill);
            $pdf->Cell($w[5], 6, 'N/A', 'LR', 0, 'C', $fill);
            $pdf->Ln();
            $fill = !$fill;
        } else {
            foreach ($result as $row) {
                //now do borders and fill
                //cell height is 6 times the max number of cells

                $pdf->Cell($w[0], 6, $count . '.', 'LR', 0, 'C', $fill);
                $pdf->Cell($w[1], 6, $row['doc_name'], 'LR', 0, 'C', $fill);
                $pdf->Cell($w[2], 6, $row['hosp_name'], 'LR', 0, 'C', $fill);
                $pdf->Cell($w[3], 6, $row['doc_degree'], 'LR', 0, 'C', $fill);
                $pdf->Cell($w[4], 6, $row['doc_email'], 'LR', 0, 'C', $fill);

                $pdf->Ln();
                $fill = !$fill;

                $count++;
            }
        }

        $pdf->Cell(array_sum($w), 0, '', 'T');
        // ---------------------------------------------------------
        // close and output PDF document
        ob_end_clean();
        $pdf_date = date('Ydm h:i:s a', time());
        $pdf->Output('Doctors_List_' . $pdf_date . '.pdf', 'I');
    }

    // function to download db data in csv file----------------------//
    public function ExportToCsv_File() {
        // fetch data from db
        $result = $this->Doctor_model->getAllDoctorsData();

        // file name 
        $csv_date = date('Ydm h:i:s a', time());
        $filename = 'Doctorslist_' . $csv_date . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");
// get data 
        $usersData = $result;
// file creation 
        $file = fopen('php://output', 'w');
        $header = array('Doctor Name', 'Doctor Email', 'Degree', 'Gender', 'Hospital');
        fputcsv($file, $header);
        if ($result != '') {
            foreach ($usersData as $key => $line) {
                fputcsv($file, $line);
            }
        } else {
            fputcsv($file, array('------------No data available-----------'));
        }

        fclose($file);
        exit;
    }

    // function to download db data in csv file ends here----------------------//
//--------------------fun for export to pdf ---------------------------------------------------//
//-----------------fun for get all doctors details------------------------------------------//
    public function getAllDoctors() {
        $result = $this->Doctor_model->getAllDoctors();
        return $result;
    }

//-----------------fun for get all doctor details------------------------------------------//
//-----------------fun for get all hospital details------------------------------------------//

    public function getAllHospitals() {
        $result = $this->Doctor_model->getAllHospitals();
        return $result;
    }

//-----------------fun for get all hospital details------------------------------------------//
//-----------------fun for Update Doctor details------------------------------------------//

    public function updateDoctorDetails() {
        extract($_POST);
        //print_r($_POST);
        //die();
        $data = $_POST;
        if ($Hospital_name == 0) {
            echo '<h4 class="w3-text-red w3-margin"><i class="fa fa-warning"></i> Please Select Valid Hospital Name.</h4>';
            die();
        }
        $result = $this->Doctor_model->updateDoctorDetails($data);
        //print_r($result);die();
        if ($result == 200) {
            echo '<h4 class="w3-text-black w3-margin"><i class="fa fa-check"></i> Doctor Details Updated Successfully.</h4>
             <script>
            window.setTimeout(function() {
               location.reload();
               }, 1000);
               </script>';
        } else {
            echo '<h4 class="w3-text-red w3-margin"><i class="fa fa-warning"></i> Doctor Details Not Updated Successfully.</h4>';
        }
    }

//-----------------fun for Update Doctor details------------------------------------------//
//-----------------fun for Delete Doctor details------------------------------------------//

    public function deleteDoctorDetails() {
        extract($_POST);
        $result = $this->Doctor_model->deleteDoctorDetails($doc_id);
        //print_r($result);die();
        if ($result == 200) {
            echo '<div class="alert alert-success alert-dismissible fade in alert-fixed w3-round">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success!</strong> Doctor Details Deleted SuccessFully.
			</div>
			<script>
			window.setTimeout(function() {
			$(".alert").fadeTo(500, 0).slideUp(500, function(){
			$(this).remove();
			});
			}, 5000);
                                                location.reload();

			</script>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade in alert-fixed w3-round">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Warning!</strong> Doctor Details Not Deleted SuccessFully.
			</div>
			<script>
			window.setTimeout(function() {
			$(".alert").fadeTo(500, 0).slideUp(500, function(){
			$(this).remove(); 
			});
			}, 5000);
			</script>';
        }
    }

//-----------------fun for Delete Doctor details------------------------------------------//
}
