<?php

App::uses('AppController', 'Controller');

class MessagesdetailsController extends AppController {

	public $uses = array('Messagesdetail', 'User');

	public function index() {

		if ($this->Auth->user()) {

			$userId = $this->Auth->user('id');

			// Check if it's an AJAX request
			if ($this->request->is('ajax')) {
				$this->layout = 'ajax'; // Use a separate layout for AJAX responses
			}
	

			$this->paginate = array(
				'conditions' => array(
					'OR' => array(
						'Messagesdetail.created_by_user_id' => $userId,
						'Messagesdetail.recipient_user_id' => $userId
					)
				),
				'joins' => array(
					array(
						'table' => 'users', // Assuming the table name is 'another_models'
						'alias' => 'User',
						'type' => 'INNER',
						'conditions' => array(
							'Messagesdetail.created_by_user_id = User.id'
						)
					),
					array(
						'table' => 'users',
						'alias' => 'Recipient',
						'type' => 'INNER',
						'conditions' => array(
							'Messagesdetail.recipient_user_id = Recipient.id'
						)
					)
			
				),
				'fields' => array(
					'Messagesdetail.*',
					//'User.username AS sender_username',
					'User.name AS sender_name',
					'Recipient.username AS recipient_username',
					'Recipient.name AS recipient_name',
					'Recipient.profile_picture_id AS recipient_profile_picture'

				),
				
				'limit' => 10,
			);
	
			// Paginate the Messagesdetail model
			$messagesdetails = $this->paginate('Messagesdetail');

			// If it's an AJAX request, return only the message items
			if ($this->request->is('ajax')) {
				$response = array('message' => 'test'); // Create an array with the data to encode
				echo json_encode($response); // Encode the array as JSON and echo it
				$this->autoRender = false; // Disable CakePHP rendering to avoid additional output
			}
	
			// For regular page request, set the messagesdetails for the full view
			$this->set('messagesdetails', $messagesdetails);


		}

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

