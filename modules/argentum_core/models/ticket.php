<?php
/**
 * Ticket Model
 *
 * @package    Argentum
 * @author     Argentum Team
 * @copyright  (c) 2008-2010 Argentum Team
 * @license    http://www.argentuminvoice.com/license.txt
 */

class Ticket_Model extends Auto_Modeler_ORM
{
	protected $table_name = 'tickets';

	protected $data = array('id' => NULL,
	                        'user_id' => NULL,
	                        'created_by' => '',
	                        'project_id' => '',
	                        'description' => '',
	                        'creation_date' => 0,
	                        'close_date' => 0,
	                        'complete' => FALSE,
	                        'billable' => TRUE,
	                        'invoiced' => FALSE,
	                        'invoice_id' => NULL,
	                        'operation_type_id' => NULL,
	                        'rate' => 0,
	                        'physical' => FALSE);

	protected $rules = array('project_id' => array('required', 'numeric'),
	                         'description' => array('required'),
	                         'billable' => array('numeric'));

	public function __get($key)
	{
		if ($key == 'total_time')
		{
			$total = 0;
			foreach ($this->find_related('time') as $time)
			{
				$total+=($time->end_time-$time->start_time)/60/60;
			}
			return round($total, 2);
		}
		else
			return parent::__get($key);
	}
}