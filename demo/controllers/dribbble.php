<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dribbble extends Controller {

	function __construct()
	{
		parent::Controller();
		
		//Set default player (Optional)
    	$config['dribbble_player'] = "simplebits";
    	
    	//Change object name to "dribbble" for ease of use
    	$this->load->library('dribbble_api', $config, 'dribbble');
	}
	
    function index()
    {
    	//Get 3 latest popular shots
    	$data->popular_shots = $this->dribbble->get_popular(array('page' => 1, 'per_page' => 3));
    	
    	$this->load->view('dribbble_general', $data);
	}
	
	function player()
	{
		$player_id = $this->uri->segment(3,0);
		if($player_id == 0):
			//No player was specified
			$data->player = $this->dribbble->player();
			$data->latest_shots = $this->dribbble->latest_shots('', array('page' => 1, 'per_page' => 3));
		else:
			$data->player = $this->dribbble->player($player_id);
			$data->latest_shots = $this->dribbble->latest_shots($player_id, array('page' => 1, 'per_page' => 3));
		endif;
		
		$this->load->view('dribbble_player', $data);
	}
	
	function shot()
	{
		//Display a single shot base on ID
	}
}

?>