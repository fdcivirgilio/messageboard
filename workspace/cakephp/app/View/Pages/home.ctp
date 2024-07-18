<div class="container py-4">

    <div class="col-5 mx-auto">
		<?php echo $this->Html->link('Message List',
		[
			'controller' => 'messages', //lower case the controller name to avoid errors
			'action' => 'index',
		],
		[
			'class' => 'btn btn-primary d-block',
		],
		); ?>
	</div>

</div>

