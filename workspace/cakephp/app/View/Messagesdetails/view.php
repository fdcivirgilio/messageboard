
<?php

debug($messagesdetails);

?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Messages</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="<?php echo Router::url('/messages/create/', true); ?>" class="btn btn-primary">New Message</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="message-list">
                <?php

                    if(isset($messagesdetails)){

                        foreach($messagesdetails as $message){

                            ?>
                                <a 
                                    class = "d-block container d-flex shadow-sm mb-2 py-2 text-decoration-none text-secondary position-relative" 
                                    style = "height: 100px"
                                    href = "<?php echo Router::url('/messages/thread/' . $message['Messagesdetail']['thread_id'] . '/', true);	?>"
                                >
        

                                    <div class="profile-picture col-1 overflow-hidden bg-light text-center">

                                        <img src="<?php echo $User->get_profile_picture_url_by_image_name($message['Recipient']['recipient_profile_picture'])  ?>" alt="" class = "h-100">

                                    </div>

                                    <div class="details col-11 ps-2 border position-relative">

                                        <div class="message-item">

                                            <?php echo $message['Messagesdetail']['message'] ?>

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
    </div>
</div>