<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Board</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="..." crossorigin="anonymous">
    <style>
        .error-message {
        color: red; /* Example: Change color to red */
        font-size: 10px; /* Example: Adjust font size */
        /* Add more styling as needed */
    }
    </style>
</head>
<body>


    <nav class="navbar bg-body-tertiary shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand text-dark">Message Board</a>

            <div class="welcome d-flex">
                <!-- In your view file (e.g., index.ctp) -->
                <?php if (isset($currentUser)): ?>
                    <p>Welcome, <?php echo $currentUser['username']; ?>!</p>
                    <p class = "ms-1"><?php echo $this->Html->link(
                        'Logout', array('controller' => 'users', 'action' => 'logout'),
                        array('class' => 'text-light badge bg-dark text-decoration-none')
                        ); ?></p>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="..." crossorigin="anonymous"></script>

</body>
</html>