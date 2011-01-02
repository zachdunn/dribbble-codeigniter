# Dribbble Library for CodeIgniter

** FAIR WARNING: ** This is an early stage pre-release to track progress. Expect things to be broken and/or missing. This is meant for development, not (yet) production.

## What it Does

This library uses the Dribbble API to load shots and player info. It supports filtering by shot ID, predefined filter (e.g. popular), or player name.

## Installation

Move "Dribbble_API.php" to your libraries/ directory. 

The library is named to prevent conflicts with controllers. To keep things simple, you should designate a shorter name for the library on load. The line below will load to `$dribbble` alone.

	$this->load->library('dribbble_api', $config, 'dribbble');
	
Credits

Zach Dunn (zach@onemightyroar / www.onemightyroar.com)

This library is heavily based on the existing API wrapper for PHP () started by Martin Bean. (https://github.com/martinbean/dribbble-php)

