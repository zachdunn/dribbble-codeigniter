<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/*
	Dribbble Library for CodeIgniter
	By Zach Dunn (onemightyroar.com / zachdunn.com) in Winter 2010
	------------------------------------------
	Adapted from PHP Class available on GitHub
	https://github.com/zachdunn/dribbble-codeigniter)
*/

class Dribbble_API {
	
	private $ci;
	private $base_url = "http://api.dribbble.com";
	
	private $player;
	
    function __construct($config = array())
    {
    	if (!empty($config)) :
    		$this->initialize($config);
    	endif;
    	
    	$this->ci =& get_instance();
    }
    
    private function initialize($config = array())
	{
		//Define each key as variable (local scope)
		extract($config);
		
		if (!empty($dribbble_player)) :
			$this->player = $dribbble_player;
		endif;
	}
	
	//Base API query function
	public function get($url, $options = array())
	{
        $url = $this->base_url . $url;
        if (!empty($options)) {
            $url.= "?" . http_build_query($options);
        }
        $result = json_decode(file_get_contents($url));
        foreach ($result as $key => $value) {
            $result->{$key} = $value;
        }
        return $result; 
	}
	
	public function player($id = null)
	{
		if (empty($id) && empty($this->player)) :
			//No player was specified
			return false;
		endif;
		
		if (!empty($id)) :
			$player = $this->get('/players/'.$id);
		else :
			$player = $this->get('/players/'.$this->player);
		endif;
		
		return $player;
	}
	
	public function latest_shots($id = null, $options=array())
	{
		if (empty($id) && empty($this->player)) :
			//No player was specified
			return false;
		endif;
		
		//Uses default player currently. Update soon
		$latest_shots = $this->get('/players/'.$this->player.'/shots/', $options);
		return $latest_shots;
	}
	
	public function popular($options=array())
	{
		//Show the recent shots
		$popular = $this->get('/shots/popular', $options);
		
		foreach($popular->shots as $shot) :
			echo sprintf('<img src="%s" alt="%s"/>', $shot->image_url, $shot->title);
		endforeach;
		
	}
	
	public function get_popular($options=array())
    {
    	//Returns the raw object of popular shots
    	$popular = $this->get('/shots/popular', $options);
        return $popular->shots;
    }
    
    public function get_shot($id, $options=array())
    {
    	$shot = $this->get('/shots/', $options);
    	return $shot;
    }
    
}

?>