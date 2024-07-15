<!-- app/View/Users/add.ctp -->

<style>
    .birthdate-box .input{
        display: flex;
        justify-content: space-between;
    }
</style>

<?php if (!empty($validationErrors)): ?>
    <div class="alert alert-danger container mt-3">
        <strong>Oops!</strong> Please fix the following errors:
        <ul>
            <?php foreach ($validationErrors as $field => $errors): ?>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<div class="users form container py-4">
    <?php echo $this->Form->create('User', array(
        'url' => array('controller' => 'users', 'action' => 'register')
    )); ?>
        <fieldset>
            <legend class = "text-center fw-bold"><?php echo __('Register'); ?></legend>
            <?php 
            echo $this->Form->input(
                    'username', 
                    [
                        'class' => 'form-control',
                        'type' => 'email', // Set the input type to email
                        'label' => 'Email Address', // Adding label for accessibility
                        'required' => true, // Ensuring the field is required
                        'error' => false
                        
                    ]
            );
            echo $this->Form->input('password', ['class' => 'form-control', 'error' => false]);
            echo $this->Form->input('name', ['class' => 'form-control', 'error' => false]);
            ?>

            <div class = "birthdate-box py-2">


                <?php 

                    echo $this->Form->label('birthdate', 'Birthdate', ['class' => 'form-label', 'error' => false]);
                
                    echo $this->Form->input('birthdate', ['label' => '', 'class' => 'form-select', 'error' => false]); 
                    
                ?>

            </div>
            <?php            
            echo $this->Form->input(
                    'gender', 
                    [
                        'class' => 'form-control',
                        'options' => array('male' => 'Male', 'female' => 'Female'),
                        'error' => false
                    ]
                );
            echo $this->Form->input('hobby', ['class' => 'form-control', 'error' => false]);

            ?>
        </fieldset>
    <div class="container text-center py-4">
        <?php echo $this->Form->end(__('Register')); ?>
    </div>
</div>
