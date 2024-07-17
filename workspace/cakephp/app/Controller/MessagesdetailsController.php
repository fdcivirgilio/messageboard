<?php

App::uses('AppController', 'Controller');

class MessagesdetailsController extends AppController {

	public function index() {

		$messagesdetails = $this->paginate('Messagesdetail');

        $this->set('messagesdetails', $messagesdetails);

	}

	public function create($messagesdetails){

		$this->Messagesdetail->create();

		if ($this->Messagesdetail->save($messagesdetails)) {

			return true;
		}

	}

	public function view($thread_id){

		$messagesdetails = $this->Messagesdetail->find('all', array(
			'conditions' => array(
				'Messagesdetail.thread_id' => $thread_id
			)
		));

		$this->set('messagesdetails', $messagesdetails);

	}

}

