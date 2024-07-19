<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    // this will tell cakek to support php files for the view for rendering
    public $ext = '.php';

    /*// include the Post Model
    public $uses = array(
        'Post'
    );*/

    public $components = array(
        'Session',
        'Flash',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'users',
                'action' => 'index'
            ),
            'logoutRedirect' => array(
                'controller' => 'users',
                'action' => 'login',
            ),
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            )
        )
    );

    /*public function beforeFilter() {
        $this->Auth->allow('index', 'view');
    }*/

    
    public function beforeFilter(){

        parent::beforeFilter();

        // global restriction
        $this->Auth->allow('register', 'logout', 'success');

        $this->loadModel('User');

        $this->set('currentUser', $this->Auth->user());

        $user_id = $this->Auth->user('id');

        $userDetails = $this->User->findById($user_id);
        
        $this->set('currentUser_2', $userDetails);

        // Check if the user is already logged in and trying to access the login page
        if ($this->request->params['action'] == 'login' && $this->Auth->user()) {
            return $this->redirect(['controller' => 'pages', 'action' => 'index']);
        }
    }
}
