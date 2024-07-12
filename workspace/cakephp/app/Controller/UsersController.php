<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController {

    public function add(){

        // - when submit is detected
        if ($this->request->is('post')) {

            //$this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['password']);
            
            
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The user could not be saved. Please, try again.')
            );
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
                return $this->redirect($this->Auth->redirectUrl());
            }

            else{

                $this->Flash->error(__('Invalid username or password, try again.'));

            }
        }

    }



}