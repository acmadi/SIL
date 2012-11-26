<?php
class Coba extends Controller {
	 
    function create_tables() {
	        echo 'Reminder: Make sure the tables do not exist already.<br />
        <form action="" method="POST">
        <input type="submit" name="action" value="Create Tables"><br /><br />';
	 
	    
	            Doctrine::createTablesFromModels();
            echo "Done!";
        }
    
	 
}