<h2>Edit Ticket</h2>
<?=$errors?>
<?=form::open()?>
<ul>
	<li><label for="user_id">Assigned User:</label> <?=form::dropdown('user_id', Auto_Modeler_ORM::factory('user')->select_list('id', 'username'), isset($user_id) ? $user_id : $ticket->user_id)?></li>
	<li><label for="description">Ticket Description:</label><br /><?=form::textarea(array('name' => 'description', 'value' => isset($description) ? $description : $ticket->description))?></li>
	<li><label for="billable">Billable:</label> <?=form::checkbox('billable', TRUE, isset($billable) ? $billable : $ticket->billable)?></li>
	<li><label for="complete">Complete:</label> <?=form::checkbox('complete', TRUE, isset($complete) ? $complete : $ticket->complete)?></li>
	<li><?=form::submit('submit', 'Update Ticket')?></li>
</ul>
<?form::close()?>