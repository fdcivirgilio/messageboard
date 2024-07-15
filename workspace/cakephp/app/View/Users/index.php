<div class="container py-4">

    <table class = "table">
        <tr>
            <th>User ID</th>
            <th>User Name</th>
            <th>Role</th>
            <th>Created</th>
            <th>Modified</th>

        </tr>

        <!-- Here is where we loop through our $posts array, printing out post info -->

        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user['User']['id']; ?></td>
            <td><?php echo $user['User']['username']; ?></td>
            <td><?php echo $user['User']['role']; ?></td>
            <td><?php echo $user['User']['created']; ?></td>
            <td><?php echo $user['User']['modified']; ?></td>
            <td>
                <?php 
                
                    echo $this->Html->link(
                        'View User',
                        array(
                            'controller' => 'users',
                            'action' => 'view',
                            $user['User']['id']
                        )
                    ); 
                ?>
            </td>
            


        </tr>
        <?php endforeach; ?>

        <?php echo $this->Paginator->numbers(); ?>
        
        <?php unset($post); ?>

        
    </table>
</div>