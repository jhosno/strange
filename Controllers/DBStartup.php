<?php 


	$config = parse_ini_file('../config.ini');


class DbStartup
{    
	

 
    protected $DBConnection;
    
    public function __construct()
    {

    	
        if (!isset($this->DBConnection)) {
            
            $this->DBConnection = new mysqli($config['host'], $config['username'], $config['password'],$config['dbname']);
            
            if (!$this->DBConnection) {
                echo 'Cannot connect to database server';
                exit;
            }            
        }    
        
        return $this->DBConnection;
    }
}
?>