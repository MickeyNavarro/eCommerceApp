<?php
//eCommerce App Version 1
//Almicke "Mickey" Navarro
//CST236
//September 14, 2018 

//allows other classes to be accessed within a php file if needed 
spl_autoload_register(function ($class) { 
    
    //get the difference in folders between the location of the autoloader and the file that called autoloader
    $lastDirectories = substr(getcwd(), strlen(__DIR__)); 
    
    //count the number of slashes (folder depth) 
    $numOfLastDirectories = substr_count($lastDirectories, '/'); 
    
    //this is the list of possible locations that classes are found in this app
    $directories = ['BusinessService', 'BusinessService/Model', 'Database', 'Presentation', 'Presentation/Process', 'Presentation/Show', 'Utility'];
    
    //look inside each directory for the desired class
    foreach ($directories as $d) { 
        $currentDirectory = $d; 
        for ($x = 0; $x <$numOfLastDirectories; $x++) { 
            $currentDirectory = "../" . $currentDirectory;
        }
        $classFile = $currentDirectory . '/' . $class . '.php';
        
        if (is_readable($classFile)) { 
            if (require $d . '/' . $class . ".php") {
                break;
            }
        }
    }
} ); 
