<div id="ticket_form">
	<h2>Create Ticket For Project ID <?=$ticket->project->id?></h2>
	<?=$errors?>
	<?=form::open(NULL, array('id' => 'create_ticket'))?>
	<ul>
		<li><label for="user_id">Assigned User:</label> <?=form::dropdown('user_id', array(NULL => 'Unassigned') + Auto_Modeler_ORM::factory('user')->select_list('id', 'username'), $ticket->user_id)?></li>
		<li><label for="physical">Physical Item:</label> <?=form::checkbox('physical', TRUE, $ticket->physical)?></label></li>
		<li class="operation"><label for="operation_type_id">Operation:</label> <?=form::dropdown('operation_type_id', Auto_Modeler_ORM::factory('operation_type')->select_list('id', 'name'), $ticket->operation_type_id)?></li>
		<li class="rate"><label for="rate">Item Cost:</label> <input name="rate" id="rate" value="<?=$ticket->rate?>" /></li>
		<li><label for="billable">Billable:</label> <?=form::checkbox('billable', TRUE, $ticket->billable)?></li>
		<li><label for="description">Ticket Description:</label><br /><?=form::textarea(array('name' => 'description', 'value' => $ticket->description))?></li>
		<li><?=form::submit('submit', 'Create Ticket')?></li>
	</ul>
	<?form::close()?>
</div>