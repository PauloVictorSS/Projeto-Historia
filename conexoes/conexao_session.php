<?php

/*
	Verifica se a SESSION foi iniciada,
	caso não tenha sido, ela é iniciada
*/

   	if(!isset($_SESSION)) 
        session_start(); 

?>