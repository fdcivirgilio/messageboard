
<div class="container py-4">

<?php
print_r($search_sample);

?>

    <h2 class = "fs-2 mb-4">New Message</h2>

    <?php
        echo 
        
            $this->Form->create(
                array(
                    'id' => 'searchForm', 
                    'type' => 'post', 
                    'url' => array('controller' => 'Messagesitems', 'action' => 'search'), 
                    'class' => 'ajax-form'
                )
            )
        ;
        echo $this->Form->input('keyword', array('id' => 'keyword', 'placeholder' => 'Enter search keyword'));
        echo $this->Form->submit('Search');
        echo $this->Form->end();
    ?>

    <div id="searchResults"></div>

    <?php echo $this->Form->create('Messagesitem', array(
        'url' => array('controller' => 'Messagesitems', 'action' => 'send')
    )); ?>

        <?php 
        
            echo $this->Form->input(
                
                'to_customer_view', 
                array(
                    'type' => 'text', 
                    'label' => array('text' => 'To', 'class' => 'input-group-text'),
                    'class' => 'form-control',
                    'div' => array('class' => 'input-group mb-3 d-none'),
                    'placeholder' => 'Search for a recipient',
                    'id' => 'toCustomerView'
                )
            
            ); 

            echo $this->Form->input(
                
                'to', 
                array(
                    'type' => 'text', 
                    'label' => array('text' => 'To', 'class' => 'input-group-text'),
                    'class' => 'form-control',
                    'div' => array('class' => 'input-group mb-3'),
                    'placeholder' => 'Search for a recipient',
                    'id' => 'to'
                )
            
            ); 
        ?>

        <?php 
                
            echo $this->Form->input(
                
                'content', 
                array(
                    'type' => 'textarea', 
                    'label' => array('text' => 'Message', 'class' => 'form-label me-lg-2 text-center d-block'),
                    'class' => 'form-control',
                    'div' => array('class' => 'mb-2'),
                    'placeholder' => 'Write a message'

                )
            
            ); 
        ?>


        <?php

            echo $this->Form->submit(
                'Send Message', 
                array(
                    'class' => 'btn btn-secondary',
                    'div' => array('class' => 'text-center')
                )
            );
            echo $this->Form->end();

        ?>
</div>

<script src="<?php echo $this->Html->url('/js/script_ajax_user_search_new_message.js'); ?>"></script>
