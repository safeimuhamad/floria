<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once APPPATH . 'libraries/tcpdf/tcpdf.php';

class Pdf extends TCPDF
{
    public function __construct($params = array())
    {
        parent::__construct();

        // Set parameter yang diberikan (opsional)
        foreach ($params as $key => $value) {
            $this->$key = $value;
        }
    }
}