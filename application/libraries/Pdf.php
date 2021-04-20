<?php
/*class pdf {
 
    function __construct() {
        include_once APPPATH . '/third_party/TCPDF-6.4.1/tcpdf.php';
    }
}*/

defined('BASEPATH') OR exit('No direct script access allowed');

require_once("./application/third_party/dompdf/autoload.inc.php");
use Dompdf\Dompdf;
use Dompdf\Options;

class pdf extends Dompdf{
    protected $ci;
    private $filename;

    public function __construct()
    {
        parent::__construct();
        $this->ci =& get_instance();
    }

    public function setFileName($filename)
    {
        $this->filename = $filename;
    }

    public function loadView($viewFile, $data = array())
    {
        $options = new Options();
        $options->setChroot(FCPATH);
        $options->setDefaultFont('courier');

        $this->setOptions($options);

        $html = $this->ci->load->view($viewFile, $data, true);
        $this->loadHtml($html);
        $this->render();
		$this->stream($this->filename, array("Attachment" => 0));
    }
}
?>