<?php
if (!empty($messagesdetails)) {
    foreach ($messagesdetails as $message) {
?>
        <a class="d-block container d-flex shadow-sm mb-2 py-2 text-decoration-none text-secondary message-item">
            <div class="profile-picture col-1 overflow-hidden bg-light text-center">
                <img src="<?php echo $this->User->get_profile_picture_url_by_image_name($message['Recipient']['recipient_profile_picture']); ?>" alt="" class="h-100">
            </div>
            <div class="details col-11 ps-2 border position-relative">
                <div class="message-item">
                    latest message should appear here.
                </div>
                <div class="created text-end bg-secondary position-absolute bottom-0 start-0 end-0">
                    <span class="badge text-light py-1"><?php echo $message['Messagesdetail']['created']; ?></span>
                </div>
            </div>
        </a>
<?php
    }
}
?>