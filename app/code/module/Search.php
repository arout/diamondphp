<?php
namespace Fusion\Toolbox;

class Search {
    
    private $db;
    
    public function __construct( $db ) {
		
        $this->db = $db;	
    }
    
    public function display_page( $title, $keyword ) {
	/*
        $q = "SELECT * FROM search_engine_pages WHERE title = ?";
	    $result = $this->db->prepare($q);
	    $result->execute( array( $title ) );
        
        foreach( $result as $page )
            echo $page['content'];
    */
        $result = file_get_contents($title);
        if( strpos( $result, $keyword ) )
            echo '<div class="white-row">'.strip_tags($result, '').'</div>';
    }
    
    public function save_page( $title, $content, $url ) {
	
        $content = file_get_contents($content);
        $q = "INSERT INTO search_engine_pages( title, content, url ) VALUES( ?, ?, ? )";
        $result = $this->db->prepare($q);
        $result->execute( array( $title, $content, $url ) );
        
    }
}