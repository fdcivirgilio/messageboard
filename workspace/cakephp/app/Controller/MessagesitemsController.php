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
				'recipient_user_id' => $messagesitemsInput['Messagesitem']['to'],
				'thread_id' => $messagesitemsInput['Messagesitem']['thread_id'],
				'created_by_user_id' => $messagesitemsInput['Messagesitem']['created_by_user_id']
			)
		);
	}

    public function search(){

		if ($this->request->is('post')) {

            $keyword = $this->request->data['User']['keyword'];

			echo $keyword;
		}


	}

	public function send(){

		//creating a new conversation

		// - when submit is detected

		//search()

		$usersController = new UsersController();
		//$usersController->search_sample('gil');

		//debug($this->set('search_sample', $usersController->search_sample('gil')));

        if ($this->request->is('post')) {

			$messageitems = $this->request->data;
			$user_id = $this->Auth->user('id');
			$messageitems['Messagesitem']['thread_id'] = uniqid();
			$messageitems['Messagesitem']['user_id'] = $user_id;
			$messageitems['Messagesitem']['created_by_user_id'] = $messageitems['Messagesitem']['to'];

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

				/*$redirectUrl = Router::url(array(
					'controller' => 'Messagesdetails',
					'action' => 'view',
					'thread_id' => $messageitems['Messagesitem']['thread_id']
				));*/

				//the comment redirect url is not working - it creates a duplicate base url

				$redirectUrl = Router::url('/messages/thread/' . $messageitems['Messagesitem']['thread_id'] . '/', true);			

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

