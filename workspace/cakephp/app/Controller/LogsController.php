<?php

App::uses('AppController', 'Controller');

class LogsController extends AppController {

    public function add($userId = null){

        $logData = [
            'user_id' => $userId,
            'modified' => date('Y-m-d H:i:s'),
            'created' => date('Y-m-d H:i:s')
        ];

        if($this->Log->save($logData)){
            return true;
        }
        
    }

    public function index(){

        $logs = $this->paginate('Log');
        $this->set('logs', $logs);

    }



}

