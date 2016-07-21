<?php
include 'MemCache.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBConnection
 *
 * @author given
 */
class DBConnection {
    //put your code here
    
    private $host = '-----';
    private $dbName = '-----';
    private $username = '-----';
    private $password = '----------';
    private $cache = NULL;
       
    function DBConnection()
    {        
        $this->cache = new Mem();
        //Step-1: check if we have agents in the cache...
        if( $this->cache->isEmpty() ) 
            $this->connectAndFetchData();       
        //Step-2: retrieves agents in the cache
        $this->RetrievesData();  
        
    }
    
    function connectAndFetchData()
    {
        try
        {
           //Step 3-4: get and store agents...
           $connection = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->username, $this->password);          
           $sql = $connection->prepare("SELECT * FROM brainwc_agent_has_event");
           $sql->execute();
           $agents = $sql->fetchAll();   
                      
           if(count($agents) != 0)
           {  
              $key = 0;
              foreach($agents as $agent)
                $this->cache->addItem($key, $agent);         
           }
     
        }
        catch (PDOException $ex)
        {
           return false;
        }       
        
    }
    
    
    function RetrievesData()
    {
        
        $array['agents'] = $this->cache->getAllItems();
        
        //do some dumping to the view...       
    }
    
    
}
