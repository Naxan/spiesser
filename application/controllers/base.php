<?php

class Base_Controller extends Controller {

	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */
	
	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

	public function __construct() {
		parent::__construct();
		$infos = Info::order_by('id', 'desc')->get();
		View::share('infos', $infos); // shares() will be available in nested views too, not just the layout
	 }

}