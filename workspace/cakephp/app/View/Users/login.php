<div class="container py-5">
    <div class="users form container">
        <?php echo $this->Session->flash(); // Renders flash messages ?>
        <?php echo $this->Form->create('User'); ?>
            <fieldset>
                <legend>
                    <?php echo __('Please enter your username and password'); ?>
                </legend>
                <?php 
                    echo $this->Form->input('username', [
                        'class' => 'form-control', 
                        'label' => 'Username', // Adding label for accessibility
                        'required' => true // Ensuring the field is required
                    ]);
                    echo $this->Form->input('password', [
                        'class' => 'form-control',
                        'label' => 'Password', // Adding label for accessibility
                        'required' => true // Ensuring the field is required
                    ]);
                ?>
            </fieldset>
        <div class="text-center py-3">
            <?php echo $this->Form->end(__('Login')); // Closing the form with a submit button ?>
        </div>
    </div>
</div>
