<?php

    App::import('Model', 'User');

    $User = new User();

    $user_id = $loggedInUserDetails['id'];


?>

<script>
    
    //set reusable variables

    var profile_picture = "<?php echo $User->get_profile_picture_url_by_image_name($loggedInUserDetails['profile_picture_id']) ?>";

    var thread_id = "<?php echo $messagesdetails['0']['Messagesdetail']['thread_id'] ?>";
    function html_message_item(profile_picture, message_content, created){

    return `

        <div class="d-block container d-flex shadow-sm mb-2 py-2 text-decoration-none text-secondary position-relative" style="height: 100px">

            <div class="details col-11 ps-2 bg-light position-relative order-1 py-2 rounded">

                <div class="message-item">

                    ` + message_content + `
                </div>

                <div class="created text-start position-absolute bottom-0 start-0 end-0">

                    <span class="badge text-secondary py-1">` + created + `</span>

                </div>

            </div>

            <div class="profile-picture col-1 overflow-hidden bg-light text-center order-2 py-2">

                <img src="` + profile_picture + `" alt="" class="h-100 p-1">

            </div>

        </div>

    `;

    }

</script>


<?php

    function html_message_item($profile_picture, $message, $created, $sender_or_receiver){

        if($sender_or_receiver == 'receiver'){

            //receiver

            ?>

                <div class="profile-picture col-1 overflow-hidden bg-light text-center order-1 py-2">

                <img 
                    src="<?php echo $profile_picture; ?>" 
                    alt="" 
                    class = "h-100 p-1"
                >

                </div>

                <div class="details col-11 ps-2 bg-light position-relative order-2  py-2 rounded">

                    <div class="message-item">

                        <?php echo $message ?>

                    </div>

                    <div class="created text-end bg-secondary position-absolute bottom-0 start-0 end-0">

                        <span class = "badge text-light py-1"><?php echo $created ?></span>

                    </div>

                </div>

            <?php
        }

        else if($sender_or_receiver == 'sender'){

            //sender

            ?>

                <div class="profile-picture col-1 overflow-hidden bg-light text-center order-2  py-2">

                <img 
                    src="<?php echo $profile_picture; ?>" 
                    alt="" 
                    class = "h-100 p-1"
                >

                </div>

                <div class="details col-11 ps-2 bg-light position-relative order-1  py-2 rounded">

                    <div class="message-item">

                        <?php echo $message ?>

                    </div>

                    <div class="created text-start position-absolute bottom-0 start-0 end-0">

                        <span class = "badge text-secondary py-1"><?php echo $created ?></span>

                    </div>

                </div>

            <?php
        }
    }

?>




<div class="container py-5">
    <div class="row">

        <h1 class = "text-center fs-1 mb-3">Messages</h1>

        <div class="col-12 message-header rounded border p-3 d-flex">
            <div class="profile-picture my-auto" style = "height: 100px">
                <img 
                    src="<?php echo $User->get_profile_picture_url_by_image_name($messagesdetails['0']['Recipient']['recipient_profile_picture'])  ?>" 
                    alt="" 
                    class = "h-100"
                >
            </div>
            <div class="details px-3">
                <p class = " d-flex">
                    Recipient: <?php echo $messagesdetails['0']['Recipient']['recipient_name']?>
                    <?php 
                    
                        echo $this->Html->link(
                            'View User',
                            array(
                                'controller' => 'users',
                                'action' => 'view',
                                $messagesdetails['0']['Messagesdetail']['recipient_user_id']
                            ),
                            array(
                                'class' => 'ms-1 btn btn-secondary badge'
                            )
                        ); 
                    ?>
                </p>
                <p>Thread ID: <?php echo $messagesdetails['0']['Messagesdetail']['thread_id']?></p>
                    
            </div>
        </div>

        <div class="created-by text-end py-3">
            <p class = "badge text-secondary">Created on: <?php echo $messagesdetails['0']['Messagesdetail']['created']?></p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <div class="reply-box">
                <?php

                    echo $this->Form->create(
                        'Messagesitem', 
                        array(
                            'url' => array(
                                'controller' => 'messagesitems', 
                                'action' => 'reply'
                            )
                        ),
                        array(
                            'class' => 'send-reply'
                        )
                    );

                    echo $this->Form->hidden('thread_id', array('value' => $messagesdetails['0']['Messagesdetail']['thread_id']));

                    echo $this->Form->textarea('content', array('class' => 'form-control', 'rows' => '3'));

                    echo $this->Form->submit('Reply', array(
                        'class' => 'btn btn-secondary mt-2',
                        'div' => 'text-center'
                    ));

                    echo $this->Form->end();

                ?>
            </div>
            <div class="message-list">
                <?php

                    if(isset($messagesitems)){


                        foreach($messagesitems as $message){

                            ?>
                                <div 
                                    class = "d-block container d-flex shadow-sm mb-2 py-2 text-decoration-none text-secondary position-relative" 
                                    style = "height: 100px"
                                >

                                    <?php

                                        $profile_picture = $message['User']['sender_profile_picture'];
                                        $created = $message['Messagesitem']['created'];
                                        $message_content = $message['Messagesitem']['content'];
                                        $message_user_id = $message['Messagesitem']['user_id'];


                                        $profile_picture = $User->get_profile_picture_url_by_image_name($profile_picture);


                                        if($user_id == $message_user_id){

                                            //sender message

                                            $sender_or_receiver = "sender";


                                            html_message_item($profile_picture, $message_content, $created, $sender_or_receiver);


                                        }

                                        else if($user_id == $messagesdetails['0']['Messagesdetail']['recipient_user_id']){

                                            //receiver message

                                            $sender_or_receiver = "receiver";

                                            html_message_item($profile_picture, $message_content, $created, $sender_or_receiver);

                                        }

                                                
                                    ?>
        
                                </div>

                            <?php

                        }

                    }

                ?>

            </div>
            <div id="loadMoreBtnContainer" class="text-center pb-4 pt-0">
                <button id="loadMoreBtn" class="btn btn-secondary">Show More</button>
            </div>

            <div class="the-end d-none pb-4 pt-0">
                <p class="text-center text-secondary">All messages have been loaded.</p>
            </div>


        </div>
    </div>
</div>


<script>
    $(document).ready(function() {

        // submit form for recipient search
        
        $('#MessagesitemReplyForm').submit(function(event) {

            event.preventDefault(); // Prevent form submission

            var formData = $(this).serialize(); // Serialize form data

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'), // Use form's action URL
                data: formData,
                dataType: 'json', // Expect JSON response
                
                success: function(response) {

                        let message_content = response['Messagesitem']['content'];
                        let created = response['Messagesitem']['modified'];

                        $('.message-list').prepend(html_message_item(profile_picture, message_content, created));
                        $("#MessagesitemContent").val('');


                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    
                }
            });
        });

        var page_count = 2; //for show more option

        $('#loadMoreBtn').on('click', function() {
            $.ajax({
                type: 'GET',
                url: '<?php echo Router::url(array('controller' => 'messagesdetails', 'action' => 'view_ajax_show_more')); ?>?thread_id=' + thread_id + '&page=' + page_count,
                dataType: 'json', // Expect JSON response from server
                success: function(response) {

                    for(var count = 0; count < response[0].length; count++){

                        //alert(response['Messagesitem']['content'])
                        //console.log(response[0][count]['Messagesitem']['created']);

                        let show_more_profile_picture = '';
                        let message_content = response[0][count]['Messagesitem']['content'] 
                        let created = response[0][count]['Messagesitem']['created'];

                        $('.message-list').append(html_message_item(profile_picture, message_content, created));

                    }

                    page_count++;

                },
                error: function(xhr, status, error) {

                    if(error == 'Not Found'){
                        $('#loadMoreBtnContainer').hide();
                        $('.the-end').removeClass('d-none');
                    }
                }
            });
        });

    
    });

   

</script>