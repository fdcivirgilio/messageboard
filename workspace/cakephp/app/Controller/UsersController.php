<?php

App::uses('AppController', 'Controller');
App::uses('LogsController', 'Controller');

class UsersController extends AppController {

    public $components = array('Session', 'Flash');

    public function register(){

        // - when submit is detected
        if ($this->request->is('post')) {

            $this->User->create();
            
            if ($this->User->save($this->request->data)) {

                
                
                /*$this->Flash->success(__('
                    <div class = "alert alert-sccess" >Thank you for registering. <a href="/login">Back To HomePage</a> to continue.
                    </div>
                '));*/

                $this->Session->write(
                    'flashMessageHTML', 
                    '
                        <div class="alert alert-success text-center py-4">
                            Thank you for registering. 
                            <div class = "pt-4">
                                <a class="btn btn-success" href="/cakephp">Back To HomePage</a>
                            </div>
                        </div>
                    '
                );

                return $this->redirect(
                    array(
                        'controller' => 'Pages',
                        'action' => 'success',
                    )
                );
            }

            else {
                 
                // Validation failed
                //$this->Flash->error('Registration failed. See errors below.');

                $validationErrors = $this->User->validationErrors;

                // Handle errors (e.g., pass errors to view)
                $this->set('validationErrors', $validationErrors);
            }
        }
        
    }

    public function index(){

        $users = $this->paginate('User');
        $this->set('users', $users);

    }

    public function view(){
            
        $id = $this->request->params['pass'][0];
        $user = $this->User->findById($id);
        $this->set('user', $user);
    }

    public function login(){

        // - when submit is detected

        // Check if the user is already logged in
        
        if ($this->Auth->loggedIn()) {

            return $this->redirect($this->Auth->redirectUrl());
        }

        if ($this->request->is('post')) {

            if ($this->Auth->login()) {

                $user_id = $this->Auth->user('id');

                //add data to logs

                $LogsController = new LogsController;
                $LogsController->add($user_id);
    
                $this->Flash->success(__($user_id));

                return $this->redirect($this->Auth->redirectUrl());
            }

            else{

                $this->Flash->error(__('Invalid username or password, try again.'));

            }
        }

    }

    public function logout(){
        
        $this->Auth->logout(); // Logout the user

        $this->Flash->success(__('You are logged out.'));

        $this->redirect($this->Auth->logoutRedirect);

    }

    public function display() {
        // Check if user is logged in
        /*if ($this->Auth->user()) {
            // User is logged in
            // Perform actions for logged-in users, e.g., fetch data, customize view
            $this->set('loggedIn', true); // Example: Set a variable for the view
        } else {
            // User is not logged in
            // Redirect to login page or handle unauthorized access
            $this->set('loggedIn', false); // Example: Set a variable for the view
        }
        // Render default page
        $this->render('index'); // Replace 'index' with your actual default page template*/

        //$loggedIn = $this->Auth->user() ? true : false;
        
        //$this->set(compact('loggedIn'));

        // Render default page (modify as needed)
        //$this->render('index'); // or whatever your default view is
    }


}

