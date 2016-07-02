<?php
namespace Hal\Toolbox;

class Breadcrumbs {
    
    public $route;
    public $title;
    private $config;
    
    public function __construct( $route, $config ) {
        
        $this->route = $route;
        $this->config = $config;
    }
    
    public function show($separator = ' &raquo; ', $home = 'Home') {
        
        // This gets the REQUEST_URI (/path/to/file.php), splits the string (using '/') into an array, and then filters out any empty values
        if( ! isset( $_GET['request'] ) || empty( $_GET['request'] ) || ! isset( $_GET['request'] ) )
            $path = [str_replace( '_Controller', '', $this->route->request )];
        else
            $path = array_filter( explode('/', parse_url( $_GET['request'], PHP_URL_PATH)) );
    
        // This will build our "base URL" ... Also accounts for HTTPS
        // If the framework is installed in a sub-directory, add the sub-directory name 
        // after the final trailing slash. Make sure to add another trailing slash at the end
        // Example:   @$base = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/SUBDIRECTORY_NAME/';
        $base = BASEURL;
    
        // Initialize a temporary array with our breadcrumbs. (starting with our home page, which is assumed will be the base URL)
        $breadcrumbs = array( "<a href=\"$base\">$home</a>" );
    
        // Find out the index for the last value in our path array
        $last = end( array_keys($path) );
    
        // Build the rest of the breadcrumbs
        foreach ( $path as $x => $crumb ) {
            // Our "title" is the text that will be displayed (strip out .php and turn '_' into a space)
            $title = ucwords( str_replace(array('.php', '_'), array('', ' '), $crumb) );
    
            // If we are not on the last index, then display an <a> tag
            if ($x != $last)
                $breadcrumbs[] = "<a href=\"$base$crumb\">$title</a>";
            // Otherwise, just display the title (minus)
            else
                $breadcrumbs[] = $title;
        }
    
        // Build our temporary array (pieces of bread) into one big string
        return implode( $separator, $breadcrumbs );
    }
    
    public function title( Array $titles = NULL ) {
        
        if( ! is_null( $titles ) ) {
            
            foreach( $titles as $segment => $title ) {
                
                # Matching controller found       
                if( in_array( $segment, [$this->route->controller] ) ) {
                    
                    # ...so now search for a defined action as well                    
                    if( array_key_exists( $this->route->action, $title ) ) {
                        return $this->title = $title[$this->route->action];
                        exit;
                    }
                    else{
                        return $this->title = str_replace( '_', ' ', ucwords($this->route->request[0])  ) . ' | ' .$this->config->setting['site_name'];
                    }
                    
                }
            }
            
            return $this->title = str_replace( '_', ' ', ucwords($this->route->request[0])  ) . ' | ' .$this->config->setting['site_name'];
        }
        else {
            
            @$titles = [
                "controller" => ucwords( $this->route->request[0] ),
                "action"     => ucwords( $this->route->request[1] ),
                "param1"     => ucwords( $this->route->request[2] ),
                "param2"     => ucwords( $this->route->request[3] ),
                "param3"     => ucwords( $this->route->request[4] ),
                "param4"     => ucwords( $this->route->request[5] ),
                "param5"     => ucwords( $this->route->request[6] )
            ];
            
            foreach( $titles as $title ) {
                if( ! empty($title) )
                $title = $title . ' ';
                echo $title;
            }
            echo '<span style="padding-left: 30px"></span> | <span style="padding-left: 30px"></span>' .$this->config->setting['site_name'];
            //return $title;
        }
    }
}
