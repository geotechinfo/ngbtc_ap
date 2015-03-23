<?php
class Dompdf {
    
	public function __construct() {
		
		require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
		
		$pdf = new DOMPDF();
		//print_r($pdf);die;
		$CI =&get_instance();
		$CI->dompdf = $pdf;
		
	}
	
}
?>