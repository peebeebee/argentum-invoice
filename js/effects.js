$(document).ready(function() {
	// admin/projects/add
	// display new client form when "New client" is selected
	$('#project_client_id').change(function() {
		if ($(this).val() == 'new') {
			$("#new_client").fadeIn();
		} else {
			$("#new_client").fadeOut();
		}
	});

	$('#create_ticket, #add_nonhourly, .edit_ticket, .add_time, .view_ticket, .colorbox').colorbox();

	$('form#choose_invoice_client').submit(function()
	{
		if ($(this).find('#client_id').val() == '---')
		{
			alert('Please select a client!');
			return false;
		}
	});

	$("table.invoice_list").tablesorter();
});