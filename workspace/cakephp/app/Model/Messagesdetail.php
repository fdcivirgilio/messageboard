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

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class Messagesdetail extends AppModel {
    public $useTable = 'messages_details';
    public $primaryKey = 'id';

    public function getMessagesdetailsByThreadId($thread_id) {

        $conditions = array(
            'thread_id' => $thread_id,
        );

        return $this->find('all', 
        
            array(
                'conditions' => $conditions,
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
                'order' => 'Messagesdetail.created DESC' // Example ordering, adjust as needed
            )
        );
    }
            
}
