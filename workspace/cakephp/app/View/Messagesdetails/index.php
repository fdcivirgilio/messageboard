<?php

    App::import('Model', 'User');
    $User = new User();

?>

<div class="container-fluid py-5">
    <h2 class = "fs-2 text-center mb-4">Message List</h2>

    <div class="new-message container text-end py-3">
        <?php

            echo $this->Html->link(
                'Create A New Message',
                array(
                    'controller' => 'Messagesitems',
                    'action' => 'send',
                ),
                array(
                    'class' => 'btn btn-secondary',
                )
            ); 
        ?>

    </div>

    <div class="message-list">
        <?php
            //debug($messagesdetails);


            if(isset($messagesdetails)){

                foreach($messagesdetails as $message){

                    ?>
                        <a 
                            class = "d-block container d-flex shadow-sm mb-2 py-2 text-decoration-none text-secondary" 
                            style = "height: 100px"
                            href = "<?php echo Router::url('/messages/thread/' . $message['Messagesdetail']['thread_id'] . '/', true);	?>"
                        >

                            <div class="profile-picture col-1 overflow-hidden bg-light text-center">

                                <img src="<?php echo $User->get_profile_picture_url_by_image_name($message['Recipient']['recipient_profile_picture'])  ?>" alt="" class = "h-100">

                            </div>

                            <div class="details col-11 ps-2 border position-relative">

                                <div class="message-item">

                                    latest message should appear here.

                                </div>

                                <div class="created text-end bg-secondary position-absolute bottom-0 start-0 end-0">

                                    <span class = "badge text-light py-1"><?php echo $message['Messagesdetail']['created'] ?></span>

                                </div>

                            </div>

                        </a>

                    <?php

                }

            }

        ?>
    </div>

    
</div>

<div id="loadMoreBtnContainer" class="text-center mt-3">
    <button id="loadMoreBtn" class="btn btn-primary">Show More</button>
</div>

<script>
 $(document).ready(function() {
    $('#loadMoreBtn').on('click', function() {
        $.ajax({
            type: 'GET',
            url: '<?php echo Router::url(array('controller' => 'messagesdetails', 'action' => 'index')); ?>',
            dataType: 'json', // Expect JSON response from server
            success: function(response) {
                // Handle JSON response data here
                console.log(response); // Log the JSON response to console for debugging

                // Example: Update UI with the response message
                $('.message-list').append('<p>' + response.message + '</p>');
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error); // Log any errors to console
            }
        });
    });
});
</script>