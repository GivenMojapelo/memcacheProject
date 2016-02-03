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
    
    private $host = 'unxqa01.kazazoom.com';
    private $dbName = 'brainwavedb_qa';
    private $username = 'brainwavedb_qa';
    private $password = 'purea2244';
    private $cache = NULL;
    
    function DBConnection()
    {        
        $this->cache = new Mem();
        //Step-1: check if we have agents in the cache...
        if( $this->cache->isEmpty() )
            $this->connectAndFetchData();       
        //Step-2: retrieves agents in the cache
        $array['agents'] = $this->RetrievesData();      
    }
    
    function connectAndFetchData()
    {
        try
        {
           //Step 3-4: get and store agents...
           $connection = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->username, $this->password);          
           $sql = $connection>prepare("SELECT FROM brainwc_agent_has_event");
           $data = $sql->execute();
           $agents = $data->fetchAll();     
     
           if(count($agents) != 0)
           {        
              foreach($agents as $agent)
                $this->cache->addItem($agent->AgentOID_usr, $agent);         
           }
     
        }
        catch (PDOException $ex)
        {
           return false;
        }       
        
    }
    
    
    function RetrievesData()
    {
        
        return $array; //fetchAll;
        //do some dumping to the view...
        
    }
    
    
}
