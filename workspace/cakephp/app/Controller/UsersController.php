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

    public function upload_image($data){

        $name = $data['name']; 
        $full_path = $data['full_path'];
        $type = $data['type'];
        $tmp_name = $data['tmp_name'];
        $size = $data['size'];
        $error = $data['error'];

        $ext = pathinfo($name, PATHINFO_EXTENSION);
        $filename = uniqid() . '.' . $ext;
        $filePath = WWW_ROOT . 'img' . DS . 'profile_pictures' . DS . $filename;

        if (move_uploaded_file($tmp_name, $filePath)) {

            return $filename;

        }
    }

    public function update($user_id, $user_array) {

        if($user_id){

            // Load the User model
            $this->loadModel('User');

            // Set the ID of the user to update
            $this->User->id = $user_id; 

            // Attempt to save the data
            if ($this->User->save($user_array)) {

                return true;
            }
        }
    }

    public function manage_account(){

        if ($this->Auth->loggedIn()) {

            $user_id = $this->Auth->user('id');
            $user = $this->User->findById($user_id);

            if ($this->request->is(['post', 'put'])) {

                $data = $this->request->data;

                print_r($data);

                foreach($data as $key => $value){

                    if($key == "User"){

                        $userInputArray = $value;

                        $data['User']['profile_picture_id'] = $data['User']['profile_picture']['name'];

                        echo $data['User']['profile_picture_id'];

                        $this->update($user_id, $data);

                        foreach($userInputArray as $key => $value){

                            if($key == "profile_picture"){

                                //print_r($value);

/*
                                if($this->upload_image($value)){

                                    $this->Session->setFlash(
                                        'Profile updated successfully. <a href="/profile/view">View Profile</a>', 
                                        'default', 
                                        array('class' => 'success alert alert-success')
                                    );
                                }

*/

                            }

                        }


                    }
                }




            }

            $this->set('user_details', $user);

           $this->set('user', $user);
        }
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

                $this->update_last_login_time($user_id);

                //add data to logs

                $LogsController = new LogsController;
                $LogsController->add($user_id);
    
                //$this->Flash->success(__($user_id));

                //return $this->redirect($this->Auth->redirectUrl());
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

    public function update_last_login_time($user_id) {

        $this->User->id = $user_id;
    
        if ($this->User->saveField('last_login_time', date('Y-m-d H:i:s'))) {
            // Find and return the updated user data
            return $this->User->findById($user_id);
        }
    
        return false;
    }

    public function manageAccount() {
        
        $user = $this->Users->get($this->Auth->user('id'));

        if ($this->request->is(['post', 'put'])) {

            $data = $this->request->getData();

            // Handle file upload
            if (!empty($data['profile_picture']['tmp_name'])) {
                $file = $data['profile_picture'];
                $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                $filename = uniqid() . '.' . $ext;
                $filePath = WWW_ROOT . 'img' . DS . 'profile_pictures' . DS . $filename;

                if (move_uploaded_file($file['tmp_name'], $filePath)) {
                    $data['profile_picture'] = 'img/profile_pictures/' . $filename;
                } else {
                    $this->Flash->error(__('Unable to upload profile picture.'));
                }
            } else {
                unset($data['profile_picture']);
            }

            $user = $this->Users->patchEntity($user, $data);

            print_r($user);

            /*if ($this->Users->save($user)) {
                $this->Flash->success(__('Profile updated successfully.'));
            } else {
                $this->Flash->error(__('Unable to update profile.'));
            }*/
        }

        $this->set('user_details', $user);
    }

}

