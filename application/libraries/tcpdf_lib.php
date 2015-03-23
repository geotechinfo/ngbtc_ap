<?php
class tcpdf_lib {
    
	public function __construct() {
		
		require_once APPPATH.'third_party/tcpdf/tcpdf.php';
		
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		//print_r($pdf);die;
		$CI =& get_instance();
		$CI->tcpdf = $pdf;
		
	}
	
}
?>