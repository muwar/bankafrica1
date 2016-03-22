<?php

// Excel reader from http://code.google.com/p/php-excel-reader/
require('spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
require('spreadsheet-reader-master/SpreadsheetReader.php');
require('spreadsheet-reader-master/SpreadsheetReader_XLSX.php');

class DefaultController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionIblExport() {
        if (isset($_POST)) {
            $terms = Terms::model()->findAll();
            if ($_POST['export'] == 'pdf') {
                $mPDF1 = Yii::app()->ePdf->mpdf('', '', 0, '', 2, 2, 10, 10, 9, 9, 'A4');
                $mPDF1->SetWatermarkText('Standard Financials Trading Platform'); // Will cope with UTF-8 encoded text
                $mPDF1->watermark_font = 'DejaVuSansCondensed'; // Uses default font if left blank
                $mPDF1->showWatermarkText = true;
                $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/bootstrap.min.css');
                $mPDF1->WriteHTML($stylesheet, 1);
                $mPDF1->SetHTMLFooter('<p align="center" style="color:#337AB7;">' . 'In God We Trust' . '</h6></p>');
                
                $mPDF1->WriteHTML($this->renderPartial('ibltable', array('terms' => $terms), true), 'P', 'A4');
                $mPDF1->Output("Inter-bank Lending Table" . '.pdf', 'd');
            } else if ($_POST['export'] == 'xlx') {

            } else if ($_POST['export'] == 'csv') {
                //var_dump($terms);exit;
                $req = isset($_SERVER['HTTP_X_REQUESTED_WITH']) ? strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) : 'xmlhttprequest';
/*                $list = Yii::app()->db->createCommand("Select * from ( "
                                . "(select pupils.pupil_reg_no as 'RegNo', pupils.pupil_name as 'Name', streams_pupils.stream_id as 'ClassId'  from streams_pupils join pupils on streams_pupils.stp_pupil_id=pupils.pupil_id where streams_pupils.stream_id=" . $class . " and streams_pupils.academic_year_academic_year_id=" . $year . ") t1, "
                                . "(select streams.stream_name as Class from streams where streams.stream_id = " . $class . ") t2, "
                                . "(Select subjects.subject_name as Subject from subjects where subjects.subject_id=" . $subject . ") t3)")->queryAll();*/
                $list = Yii::app()->db->createCommand("Select term_name as 'Term Name', term_duration as Duration from terms")->queryAll();                
                //$Spreadsheet = new SpreadsheetReader($Filepath);
                
                if (count($list) != 0) {
                    $data = $list;
                    function cleanData2(&$str) {
                        $str = preg_replace("/\t/", "\\t", $str);
                        $str = preg_replace("/\r?\n/", "\\n", $str);
                        if (strstr($str, '"'))
                            $str = '"' . str_replace('"', '""', $str) . '"';
                    }

                    // filename for download
                    $filename = "Inter-bank Lending Rates" . date('Ymds') . ".csv";
                    $out = fopen("php://output", 'w');
                    header("Content-Disposition: attachment; filename=\"$filename\"");
                    header("Content-Type: text/csv");

                    $flag = false;
                    foreach ($data as $row) {
                        if (!$flag) {
                            // display field/column names as first row
                            fputcsv($out, array_keys($row), ',', '"');
                            $flag = true;
                        }
                        array_walk($row, 'cleanData2');
                        fputcsv($out, array_values($row), ',', '"');
                    }
                    //echo "here";exit;
                    fclose($out);
                    //echo "done";
                    exit;
                } else {

                    function cleanData2(&$str) {
                        $str = preg_replace("/\t/", "\\t", $str);
                        $str = preg_replace("/\r?\n/", "\\n", $str);
                        if (strstr($str, '"'))
                            $str = '"' . str_replace('"', '""', $str) . '"';
                    }

                    // filename for download
                    $filename = "website_data_" . date('Ymds') . ".csv";
                    $out = fopen("php://output", 'w');

                    header("Content-Disposition: attachment; filename=\"$filename\"");
                    header("Content-Type: text/csv");

                    $flag = false;
                    echo "No Records Found,";
                    exit;
                    array_walk($row, 'cleanData2');
                    fputcsv($out, array_values($row), ',', '"');
                    //echo "here";exit;
                    fclose($out);
                    //echo "done";
                    exit;
                }                
            }
        } else {
            Yii::app()->user->setFlash('unknownrequest', "<font color:red;>Request not known</font>");
        }
        //var_dump($_POST);exit;
    }

    public function actionFdrExport() {
                if (isset($_POST)) {
            $terms = $terms = Fdterms::model()->findAll();
            if ($_POST['export'] == 'pdf') {
                $mPDF1 = Yii::app()->ePdf->mpdf('', '', 0, '', 2, 2, 10, 10, 9, 9, 'A4');
                $mPDF1->SetWatermarkText('Standard Financials Trading Platform'); // Will cope with UTF-8 encoded text
                $mPDF1->watermark_font = 'DejaVuSansCondensed'; // Uses default font if left blank
                $mPDF1->showWatermarkText = true;
                $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/bootstrap.min.css');
                $mPDF1->WriteHTML($stylesheet, 1);
                $mPDF1->SetHTMLFooter('<p align="center" style="color:#337AB7;">' . 'In God We Trust' . '</h6></p>');
                
                $mPDF1->WriteHTML($this->renderPartial('fdrtable', array('terms' => $terms), true), 'P', 'A4');
                $mPDF1->Output("Fixed Deposit Rates Table" . '.pdf', 'd');
            } else if ($_POST['export'] == 'xlx') {

            } else if ($_POST['export'] == 'csv') {
                //var_dump($terms);exit;
                $req = isset($_SERVER['HTTP_X_REQUESTED_WITH']) ? strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) : 'xmlhttprequest';
/*                $list = Yii::app()->db->createCommand("Select * from ( "
                                . "(select pupils.pupil_reg_no as 'RegNo', pupils.pupil_name as 'Name', streams_pupils.stream_id as 'ClassId'  from streams_pupils join pupils on streams_pupils.stp_pupil_id=pupils.pupil_id where streams_pupils.stream_id=" . $class . " and streams_pupils.academic_year_academic_year_id=" . $year . ") t1, "
                                . "(select streams.stream_name as Class from streams where streams.stream_id = " . $class . ") t2, "
                                . "(Select subjects.subject_name as Subject from subjects where subjects.subject_id=" . $subject . ") t3)")->queryAll();*/
                $list = Yii::app()->db->createCommand("Select * from fdterms")->queryAll();                
                //$Spreadsheet = new SpreadsheetReader($Filepath);
                
                if (count($list) != 0) {
                    $data = $list;
                    function cleanData2(&$str) {
                        $str = preg_replace("/\t/", "\\t", $str);
                        $str = preg_replace("/\r?\n/", "\\n", $str);
                        if (strstr($str, '"'))
                            $str = '"' . str_replace('"', '""', $str) . '"';
                    }

                    // filename for download
                    $filename = "Fixed Deposit Rates " . date('Ymds') . ".csv";
                    $out = fopen("php://output", 'w');
                    header("Content-Disposition: attachment; filename=\"$filename\"");
                    header("Content-Type: text/csv");

                    $flag = false;
                    foreach ($data as $row) {
                        if (!$flag) {
                            // display field/column names as first row
                            fputcsv($out, array_keys($row), ',', '"');
                            $flag = true;
                        }
                        array_walk($row, 'cleanData2');
                        fputcsv($out, array_values($row), ',', '"');
                    }
                    //echo "here";exit;
                    fclose($out);
                    //echo "done";
                    exit;
                } else {

                    function cleanData2(&$str) {
                        $str = preg_replace("/\t/", "\\t", $str);
                        $str = preg_replace("/\r?\n/", "\\n", $str);
                        if (strstr($str, '"'))
                            $str = '"' . str_replace('"', '""', $str) . '"';
                    }

                    // filename for download
                    $filename = "website_data_" . date('Ymds') . ".csv";
                    $out = fopen("php://output", 'w');

                    header("Content-Disposition: attachment; filename=\"$filename\"");
                    header("Content-Type: text/csv");

                    $flag = false;
                    echo "No Records Found,";
                    exit;
                    array_walk($row, 'cleanData2');
                    fputcsv($out, array_values($row), ',', '"');
                    //echo "here";exit;
                    fclose($out);
                    //echo "done";
                    exit;
                }                
            }
        } else {
            Yii::app()->user->setFlash('unknownrequest', "<font color:red;>Request not known</font>");
        }
    }

    public function actionCbrExport() {
        
    }

    public function actionCfExport() {
        
    }

    public function actionCfcExport() {
        
    }

    public function actionSecExport() {
        
    }

}