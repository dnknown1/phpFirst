<?php
/**
 * php Class to Handel requests for transactions handling
 */
class Ledger extends BaseController{
    private $model;
    public function __construct(){
        parent::__construct();
        $this->model = $this->load->model('api','LedgerModel');
    }

    public function default(){
        notFound();
    }

    public function update(){
        if (validate('POST')) {
            $file = json_decode(file_get_contents("php://input"));
            $data = $this->model->update($file);
            $this->load->view('api',"ledgerreport",$data);
        }
    }

    public function report($id){
        if (validate('GET')) {
            $data = $this->model->report($id);
            $this->load->view('api',"ledgers",$data);
        }
    }

    public function transaction($id){
        if (validate('GET')) {
            $data = $this->model->transaction($id);
            $this->load->view('api',"ledgers",$data);
        }
    }

    public function wkReport($id){
        if (validate('GET')) {
            $data = $this->model->wkReport($id);
            $this->load->view('api',"ledgers",$data);
        }
    }
}
?>
