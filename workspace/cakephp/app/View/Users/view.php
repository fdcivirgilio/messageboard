

<?php

    App::uses('AppHelper', 'View/Helper');

    foreach($user as $user_details){

        ?>


            <div class="container-fluid py-4">

                <h1 class = "fw-bold text-center">User Profile</h1>

                <div class="d-flex" style = "height: 300px">

                    <div class = "col-8 order-2 ps-0 p-4">
                        <div class = "">

                            <div class = "fs-3 mb-1">
                                <span>
                                    <?php echo $user_details['name']; ?>, <?php echo $user_age; ?>
                                </span>
                            </div>

                            <div class = "form-control mb-1">
                                <span>Gender: </span>
                                <span><?php echo ucfirst( $user_details['gender'] ); ?></span>
                            </div>

                            <div class = "form-control mb-1">
                                <span>Birthdate: </span>
                                <?php echo $this->App->readableFormat($user_details['birthdate']); ?></span>
                            </div>

                            <div class = "form-control mb-1">
                                <span>Joined: </span>
                                <span><?php echo $this->App->readableFormat($user_details['created']); ?></span>
                            </div>

                            <div class = "form-control mb-1">
                                <span>Last login: </span>
                                <span><?php echo $this->App->readableFormat($user_details['last_login_time']); ?></span>
                            </div>
                        </div>

                    </div>

                    <div class="col-4 order-1 p-4 h-100">

                        <div class="img-box h-100 d-flex align-items-center justify-content-center shadow-sm">

                            <img 
                                src = "<?php echo $profile_picture; ?>"
                                class = "h-100 d-block"
                            />
                            
                        </div>

                        
                    </div>

                </div>

                <div class = "form-control text-center py-4">
                    <h4 class = "">Hobby</h4>
                    <div class = "">
                        <?php echo $user_details['hobby']; ?>
                    </div>
                </div>


            </div>

        <?php


    }
?>
