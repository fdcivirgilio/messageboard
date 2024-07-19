<?php

App::uses('AppController', 'Controller');

App::uses('UsersController', 'Controller');

App::uses('MessagesdetailsController', 'Controller');

class MessagesItemsController extends AppController {

	public $uses = array('Messagesitem');

	public function index() {
		/*$messages = $this->Message->find('all');
		$this->set('messages', $messages);*/
	}

	public function create_array_for_messagesdetails($messagesitemsInput){


		return $data = array(
			'Messagesdetail' => array(
				'recipient_user_id' => $messagesitemsInput['Messagesitem']['recipient_user_id'],
				'thread_id' => $messagesitemsInput['Messagesitem']['thread_id'],
				'created_by_user_id' => $messagesitemsInput['Messagesitem']['created_by_user_id']
			)
		);
	}

    public function search(){

		$this->autoRender = false;

        if ($this->request->is('ajax')) {

			$keyword = $this->request->data['User']['keyword'];

			$usersController = new UsersController();

            $results = $usersController->User->search($keyword);

			$results_html = $usersController->User->search_html_result($results);
            
            $response = array(
                'status' => 'success',
                'html' => $results_html
            );

			echo json_encode($response);
        }

	}

	public function send(){

		//creating a new conversation

        if ($this->request->is('post')) {

			$usersController = new UsersController();

			$messageitems = $this->request->data;

			if($messageitems['Messagesitem']['to'] == null || !isset($messageitems['Messagesitem']['to'])){

				$this->Session->setFlash(
					'Please select a recipient.',
					'default', 
					array('class' => 'error alert alert-danger')
				);
	
				return;
			}

			else{

				if(isset($messageitems['Messagesitem'])){

					if($messageitems['Messagesitem']['to'] == $this->Auth->user('id')){
	
						$this->Session->setFlash(
							'You cannot send a message to yourself.',
							'default', 
							array('class' => 'error alert alert-danger')
						);
	
						return;
					}
	
					if($usersController->User->userExists(($messageitems['Messagesitem']['to'])) != true){
	
						$this->Session->setFlash(
							'The user does not exist.',
							'default', 
							array('class' => 'error alert alert-danger')
						);
	
						return;
					}
	
					if($messageitems['Messagesitem']['content'] == null){
	
						$this->Session->setFlash(
							'Please enter a message.',
							'default', 
							array('class' => 'error alert alert-danger')
						);
	
						return;
					}
	
					$user_id = $this->Auth->user('id');
					$messageitems['Messagesitem']['thread_id'] = uniqid();
					$messageitems['Messagesitem']['user_id'] = $user_id;
					$messageitems['Messagesitem']['recipient_user_id'] = $messageitems['Messagesitem']['to'];
					$messageitems['Messagesitem']['created_by_user_id'] = $user_id;
	
					$messagesItemsController = new MessagesdetailsController();
					$messagesItemsController->create($this->create_array_for_messagesdetails($messageitems));
	
					$this->Messagesitem->create();
					
					if ($this->Messagesitem->save($messageitems)) {
	
						$this->Session->write(
							'flashMessageHTML', 
							'
								<div class="alert alert-success text-center py-4">
									Message sent.
								</div>
							'
						);
						
						$redirectUrl = Router::url('/messages/thread/' . $messageitems['Messagesitem']['thread_id'] . '/', true);	
						
						$this->Session->setFlash(
							'
								<div class = "text-center">
									Message sent!
								</div>
							',
							'default',
							array('class' => 'success alert alert-success')
						);
	
						$this->redirect($redirectUrl);
					}
	
					else {
						
						$this->Session->setFlash(
							'Something went wrong. Please try again.',
							'default', 
							array('class' => 'error alert alert-danger')
						);
							
					}
	
				}

			}
			
        }

	}

	public function reply(){

		//reply to an existing conversation

        if ($this->request->is('post')) {

			$this->autoRender = false;

			//$usersController = new UsersController();

			$messageitems = $this->request->data;

			$user_id = $this->Auth->user()['id'];

			$messageitems['Messagesitem']['user_id'] = $user_id;

			$this->Messagesitem->create();
			
			if ($this->Messagesitem->save($messageitems)) {

				$messageitems['Messagesitem']['id'] = $this->Messagesitem->id;

				echo json_encode($this->Messagesitem->save($messageitems));
				
			}

			
        }

	}

	public function remove(){

		//remove a message

		if ($this->request->is('ajax')) {

			$this->autoRender = false;

			$id = $this->request->query('id');

			// Check if the record exists
			$message = $this->Messagesitem->findById($id);

			if ($message) {

				$this->Messagesitem->delete($id);

				echo json_encode(array('status' => 'success'));

			} else {
				echo json_encode(array('status' => 'error'));
			}
			
		}
	}


}

