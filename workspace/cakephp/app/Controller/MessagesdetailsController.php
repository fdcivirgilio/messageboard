<?php

App::uses('AppController', 'Controller');

App::uses('MessagesitemsController', 'Controller');

class MessagesdetailsController extends AppController {

	public $uses = array('Messagesdetail', 'User');

	public function index() {
		if ($this->Auth->user()) {
			
			$userId = $this->Auth->user('id');
	
			// Check if it's an AJAX request
			if ($this->request->is('ajax')) {

				$this->layout = 'ajax'; // Use a separate layout for AJAX responses

				// Get the page number from the request, default to 1 if not provided
				$page = $this->request->query('page') ? $this->request->query('page') : 1;

				// Adjust the pagination settings for AJAX response
				$this->paginate = array(
					'conditions' => array(
						'OR' => array(
							'Messagesdetail.created_by_user_id' => $userId,
							'Messagesdetail.recipient_user_id' => $userId
						)
					),
					'joins' => array(
						array(
							'table' => 'users', // Assuming the table name is 'users'
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
						'User.name AS sender_name',
						'Recipient.username AS recipient_username',
						'Recipient.name AS recipient_name',
						'Recipient.profile_picture_id AS recipient_profile_picture'
					),
					'limit' => 10,
					'page' => $page // Start from the first page for AJAX response
				);
	
				// Paginate the Messagesdetail model
				$messagesdetails = $this->paginate('Messagesdetail');
	
				// Return JSON response for AJAX request
				echo json_encode($messagesdetails); // Encode the array as JSON and echo it
				$this->autoRender = false; // Disable CakePHP rendering to avoid additional output
			} else {
				// For regular page request, set the messagesdetails for the full view
				$this->paginate = array(
					'conditions' => array(
						'OR' => array(
							'Messagesdetail.created_by_user_id' => $userId,
							'Messagesdetail.recipient_user_id' => $userId
						)
					),
					'joins' => array(
						array(
							'table' => 'users', // Assuming the table name is 'users'
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
							),
						array(
							'table' => 'messages_items',
							'alias' => 'MessageItem',
							'type' => 'LEFT',
							'conditions' => array(
								'MessageItem.thread_id = Messagesdetail.thread_id'
							),
							'order' => array('MessageItem.created DESC') // Get the latest message
						)
					),
					'fields' => array(
						'Messagesdetail.*',
						'User.name AS sender_name',
						'Recipient.username AS recipient_username',
						'Recipient.name AS recipient_name',
						'Recipient.profile_picture_id AS recipient_profile_picture',
						'MessageItem.content AS latest_message' // Get the latest message content
					),
					'limit' => 10,
					'order' => 'Messagesdetail.created DESC' // Example ordering, adjust as needed
				);
	
				// Paginate the Messagesdetail model
				$messagesdetails = $this->paginate('Messagesdetail');
	
				$this->set('messagesdetails', $messagesdetails);
			}
		}
	}

	public function create($messagesdetails){

		$this->Messagesdetail->create();

		if ($this->Messagesdetail->save($messagesdetails)) {

			return true;
		}

	}

	public function view($thread_id){

		$messagesdetails = $this->Messagesdetail->getMessagesdetailsByThreadId($thread_id);

		$messagesitemsController = new MessagesitemsController();

		$messagesitems = $messagesitemsController->Messagesitem->getMessagesitemsByThreadId($thread_id);

		$this->set('messagesdetails', $messagesdetails);

		$this->set('messagesitems', $messagesitems);
		
		$this->set('loggedInUserDetails', $this->Auth->user());

	}

	public function view_ajax_show_more(){
		if ($this->request->is('ajax')) {
			$page = $this->request->query('page') ? $this->request->query('page') : 1;
			$thread_id = $this->request->query('thread_id'); // Assuming thread_id is passed as a query parameter
	
			$this->autoRender = false; // Disable CakePHP rendering to avoid additional output
	
			// Load the Messagesitem model
			$this->loadModel('Messagesitem');
	
			// Set pagination parameters
			$this->paginate = array(
				'conditions' => array('Messagesitem.thread_id' => $thread_id),
				'limit' => 10,
				'page' => $page,
				'order' => array('Messagesitem.created' => 'DESC') // Order by created field, latest to earliest
			);
	
			// Fetch paginated results
			$paginatedMessagesItems = $this->paginate('Messagesitem');
	
			// Return results in JSON format
			echo json_encode([$paginatedMessagesItems]);
		}
	}

	public function remove() {
		// Remove a message and related records
	
		if ($this->request->is('ajax')) {
			$this->autoRender = false;
	
			$id = $this->request->query('id');
	
			// Check if the record exists
			$message = $this->Messagesdetail->findById($id);
	
			if ($message) {
				// Get the thread ID from the message
				$threadId = $message['Messagesdetail']['thread_id'];

				//echo json_encode(array($threadId));

	
				// Delete the message record
				if ($this->Messagesdetail->delete($id)) {
					// Initialize the Messagesitem model
					$this->Messagesitem = ClassRegistry::init('Messagesitem');
	
					// Delete related records from Messagesitem based on thread_id
					$conditions = array('Messagesitem.thread_id' => $threadId);
					$this->Messagesitem->deleteAll($conditions);
					
					// Send success response
					echo json_encode(array('status' => 'success'));
				} else {
					// Send error response if message deletion fails
					echo json_encode(array('status' => 'error', 'message' => 'Failed to delete message'));
				}
			} else {
				// Send error response if message is not found
				echo json_encode(array('status' => 'error', 'message' => 'Message not found'));
			}
		}
	}


	
}

