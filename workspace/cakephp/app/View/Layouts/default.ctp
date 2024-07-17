<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Board</title>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <?php

        echo $this->Html->script('https://code.jquery.com/jquery-3.6.0.min.js');
        echo $this->Html->script('https://code.jquery.com/ui/1.12.1/jquery-ui.min.js');
        echo $this->Html->css('https://code.jquery.com/ui/1.13.3/themes/blitzer/jquery-ui.css');

    ?>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="..." crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="<?php echo $this->Html->url('/js/script.js'); ?>"></script>
    

</head>
<body>


    <nav class="navbar bg-body-tertiary shadow-sm">
        <div class="container-fluid">
            
            <?php echo $this->Html->link('Message Board', '/', [
                'class'=>'navbar-brand text-dark'
            ]); ?>

            <div class="welcome d-flex">
                <!-- In your view file (e.g., index.ctp) -->
                <?php if (isset($currentUser)): ?>
                    <p class = "mx-2">Welcome, <span class = "fw-bold text-decoration-underline"><?php echo $currentUser_2['User']['name']; ?></span>!</p>
                    <p class = "ms-1">

                        <?php echo $this->Html->link(
                        'Manage Account', '/manage-account',
                        array('class' => 'text-light badge bg-dark text-decoration-none')
                        ); ?>
                            
                        <?php echo $this->Html->link(
                        'Logout', array('controller' => 'users', 'action' => 'logout'),
                        array('class' => 'text-dark badge bg-light  text-decoration-none')
                        ); ?>
                        
                    </p>

                    <!-- Display content for logged-in users -->
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <div class="primary">

        <?php echo $this->Session->flash(); ?>
        <?php echo $this->Flash->render(); ?>
        <?php echo $this->fetch('content'); ?>
    </div>
    <div class="position-fixed bottom-0 end-0 px-2 py-1 d-block badge text-light bg-secondary m-1">
         <?php if (isset($currentUser)): ?>
            Last login: <?php echo $currentUser_2['User']['last_login_time']; ?>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="..." crossorigin="anonymous"></script>

</body>
</html>