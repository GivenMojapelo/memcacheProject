<?php
include 'iCache.php';
include 'memcache_1.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cache
 * @author given
 */

class Mem implements iCache{
    //put your code here
    
    private $expirationTime;
    private $mem;
    private $memCacheEnabled;
    
    function MemCache(){
        
        $this->mem = new Memcache();
        $this->memCacheEnabled = $this->mem->connect('localhost', 11211);        
    }
    
    public function addItem($key, $item, $expiration = 120) {
        
        /*
         * Adds new item after checcking if there's no such element
         */       
        if($this->mem->get($key) == NULL)
            $this->mem->set($key, $item, $expiration);        
    }

    public function compareAndSwap($key, $item, $casToken, $expiration) {
        
        /*
         * compares the provided item's token with the one in the cache...
         */
        if($this->mem->get($key))
        {
            $obj = $this->mem->get($key);
            if($obj == $casToken)
            {
                $this->mem->set($key, $item, $expiration);
            }
            
        }
    }

    public function delete($key, $time) {
        
        if($this->mem->get($key) != NULL){
            $this->mem->delete($key);
            return FALSE;
        }
    }

    public function isEmpty()
    {
        $m = new Memcached();
        $m->set('key', 0796800135);
                //return ($this->mem->fetchAll() == 0);
    }

    public function getItem($key, $callback = NULL, $casToken = 0) {
        
        if($this->mem->get($key) != NULL)
        {           
           $callback($this->mem->get($key));
           return $this->mem->get($key);          
        }       
    }

    
}
