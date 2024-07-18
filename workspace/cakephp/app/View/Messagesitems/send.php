
<div class="container py-4">
    <style>
        .text label{

            display: none;

        }



        .text {
            width: 100%;
        }

        #searchResults {
            z-index:1000
        }

    </style>

<?php
//print_r($search_sample);

?>

    <h2 class = "fs-2 mb-4">New Message</h2>

    <div class="user-search-box position-relative">
        <?php
            echo 
            
                $this->Form->create(
                    'User',
                    array(
                        'id' => 'searchForm', 
                        'type' => 'post', 
                        'url' => array('controller' => 'messagesitems', 'action' => 'search'), 
                        'class' => 'ajax-form d-flex'
                    )
                )
            ;
            echo $this->Form->input(
                'keyword', 
                array('id' => 'keyword', 'placeholder' => 'Search for a recipient',"class" => "form-control"),
            );

     
            echo $this->Form->submit(
                'Search', 
                ['class' => 'btn btn-secondary d-none']
        );
            echo $this->Form->end();
        ?>

        <div id="searchResults" class = "position-absolute start-0 end-0"></div>

    </div>

    <?php echo $this->Form->create('Messagesitem', array(
        'url' => array('controller' => 'Messagesitems', 'action' => 'send')
    )); ?>

        <?php 
    
            echo $this->Form->input(
                
                'to', 
                array(
                    'type' => 'text', 
                    'label' => array('text' => 'To', 'class' => 'input-group-text'),
                    'class' => 'form-control',
                    'div' => array('class' => 'input-group mb-3 d-none'),
                    'placeholder' => 'Search for a recipient',
                    'id' => 'to',
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
                    'placeholder' => 'Write a message',

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

<script>
    $(document).ready(function() {

        // submit form for recipient search
        
        $('.ajax-form').submit(function(event) {

            event.preventDefault(); // Prevent form submission
            
            var formData = $(this).serialize(); // Serialize form data
            
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'), // Use form's action URL
                data: formData,
                dataType: 'json', // Expect JSON response

                
                success: function(response) {
                    $('#searchResults').html(response.html);

                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    
                }
            });
        });

        // submit form for recipiet search on keyup

        $('#keyword').keyup(function() {

            $('.ajax-form').submit();

        });

        $(".result-item-click-area").click(function(){
            alert($(this).data('user-id'));
        });

        // Detect click events anywhere in the document

        $(document).click(function(event) {
            // Check if the click happened outside the .user-search-box
            if (!$(event.target).closest('.user-search-box').length) {
                // Change the HTML content of .user-search-box
                $('#searchResults').html('');
            }
        });
    });

    function selectRecipient(userId, name, emailAddress ){

        $("#keyword").val(name)
        $("#to").val(userId)
        $("#searchResults").html("");
    }

</script>