

<?php

    foreach($user as $user_details){

        ?>


            <div class="container-fluid">

                <h1 class = "fw-bold">User Profile</h1>

                <div class="d-flex" style = "height: 30vh">

                    <div class = "col-8 order-2 ps-0 p-4">
                        <div class = "">
                            <div>
                                <span>Name</span>
                                <span><?php echo $user_details['name']; ?></span>
                            </div>
                            <div>
                                <span>Birthdate</span>
                                <?php echo $user_details['birthdate']; ?></span>
                            </div>
                            <div>
                                <span>Gender</span>
                                <span><?php echo $user_details['gender']; ?></span>
                            </div>
                        </div>

                    </div>

                    <div class="col-4 order-1 p-4 h-100">

                        <div class="img-box border h-100">

                            profile picture here.
                            
                        </div>

                        
                    </div>

                </div>

                <div>
                    <div>Hobby:</div>
                    <div><?php echo $user_details['hobby']; ?> </div>
                </div>


            </div>

        <?php


    }
?>
