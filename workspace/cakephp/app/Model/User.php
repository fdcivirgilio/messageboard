<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class User extends AppModel {

    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'An email address is required'
            ),

            'length' => array(
                'rule' => array('between', 5, 20),
                'message' => 'Email address must be between 5 and 20 characters long.'
            ),

            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'This email address is already taken.'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A password is required'
            )
        ),
        /*'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'author')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )*/
    );

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }

    public function userExists($userId) {
        if($this->exists($userId)){
            return true;
        }
        
    }

    public function get_profile_picture_url_by_image_name($image_name){

        if(strlen($image_name) > 2){

            $relativePath = 'img/profile_pictures/' . $image_name;

            return Router::url('/' . $relativePath, true);

        }

        return 'https://via.placeholder.com/150';

    }

    public function get_user_profile_picture($user_array) {

        $image_name = '';

        if ($user_array) {

            $image_name = $user_array['User']['profile_picture_id'];
                
        }

        return $this->get_profile_picture_url_by_image_name($image_name);

    }

    public function update_last_login_time($user_id) {

        $this->id = $user_id;
        $current_time = date('Y-m-d H:i:s');
    
        if ($this->saveField('last_login_time', $current_time)) {

            return $this->User->findById($user_id);
        }
    
        return false;
    }

    public function get_user_age($user_id) {

        $user = $this->findById($user_id);
    
        if ($user && isset($user['User']['birthdate'])) {
            $birthdate = new DateTime($user['User']['birthdate']);
            $today = new DateTime();
            $age = $birthdate->diff($today)->y;
    
            return $age;
        }
    
        return false;
    }

    public function search($keyword){
            
        $users = $this->find('all', array(
            'conditions' => array(
                'User.name LIKE' => '%' . $keyword . '%',
                'User.username LIKE' => '%' . $keyword . '%',
            )
        ));

        return $users;

    }

    public function search_html_result($users_array){

        if($users_array){

            $html = "";

            foreach($users_array as $user){

                $user_id = $user['User']['id'];
                $user_name = $user['User']['name'];
                $user_username = $user['User']['username'];
                $user_profile_picture = $this->get_user_profile_picture($user);
    
                $html .= '
                    <div class="result-item mb-2">
                        <div 
                            class = "result-item-click-area d-flex text-light text-decoration-none btn"
                            onclick = "selectRecipient(' . $user_id . ', \'' . $user_name . '\', \'' . $user_username . '\')"
                        >
    
                            <div class="search-result-image border" style = "width: 30px">
                                <img src="' . $user_profile_picture . '" alt="' . $user_name . '" class = "w-100">
                            </div>
    
                            <div class="search-result-details ms-1">
                                <span class = "">' . $user_name . '</span> - 
                                <span>' . $user_username . '</span>
                            </div>
                        </div>
                    </div>
                ';
    
            }
    
            return '<div class="search-result p-2 px-4 bg-secondary rounded overflow-hidden">' . $html . '</div>';

        }
        
        else{
                
            return '<div class="search-result-no-result text-center text-light p-2 px-4 bg-secondary rounded overflow-hidden">No users found.</div>';
        }

    }

    

}
