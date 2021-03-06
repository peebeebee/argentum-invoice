<?php
/**
 * Client Controller
 *
 * @package    Argentum
 * @author     Argentum Team
 * @copyright  (c) 2008-2010 Argentum Team
 * @license    http://www.argentuminvoice.com/license.txt
 */

class Client_Controller extends Website_Controller {

	public function index()
	{
		$this->view->clients = Auto_Modeler_ORM::factory('client')->fetch_all('company_name');
	}

	/**
	 *  Displays a client's information
	 */
	public function view($short_name = NULL)
	{
		$client = new Client_Model($short_name);

		if ( ! $client->id)
			Event::run('system.404');

		$this->view->client = $client;
	}

	/**
	 *  Searches for a client
	 */
	public function search()
	{
		$term = $this->input->get('term');
		$results = Auto_Modeler_ORM::factory('client')->search($term);
		$this->view->results = $results;
	}
}