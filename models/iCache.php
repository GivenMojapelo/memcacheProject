<?php

 Interface iCache
 {
	 function addItem($key, $item, $expiration);
	 function getItem($key, $callback, $casToken);
	 function compareAndSwap($key, $item, $casToken, $expiration);
	 function delete($key, $time);
	 
 }
 
 

 
 
 
 