<?php
namespace Hal\Toolbox;

class Friends {
    
    private $db;
    public $toolbox;
    private $user;
    private $model;
    
    public function __construct( $db, $toolbox, $model ) {
		
        $this->db       = $db;
        $this->toolbox  = $toolbox;
        $this->user     = $this->toolbox('session')->get('member_id');
        $this->username     = $this->toolbox('session')->get('username');
        $this->model    = $model;
    }
    
    public function add( $friend ) {
        
        if( is_array( $friend ) ) {
            # Confirm and add an array of friend requests
        }
        else {
            # Confirm a single friend request
        }
    }
    public function model($m) {
        return $this->toolbox('load')->model("$m");
    }
    public function send_request( $friend ) {
        
        if( is_array( $friend ) ) {
            # Send multiple friend requests
            $friend = $this->toolbox('sanitize')->xss( $friend );

            foreach( $friend as $user ) {
                $req = $this->db->prepare("INSERT INTO friend_requests(sent_by, sent_to) VALUES(?, ?)");
                $req->execute( array( $this->user, $user ) );
                # Send notification to inbox of friend request
                $username = $this->model('Member')->get_username( $user );
                $subject = "New friend request from $username";
                $message = $username .' wants to be friends! <a href='. BASE_URL .'friends/accept/'.$username.'>View your friend requests</a>';
                $this->toolbox('messenger')->admin_send( $subject, $message, $username, $user);
            }
        }
        else {
            $req = $this->db->prepare("INSERT INTO friend_requests(sent_by, sent_to) VALUES(?, ?)");
            $req->execute( array( $this->user, $friend ) );
            # Send notification to inbox of friend request
                $username = $this->model('Member')->get_username( $friend );
                $user = $this->model('Member')->get_member_id( $username );
                $subject = "New friend request from $this->username";
                $message = $this->username .' wants to be friends! <a href='. BASE_URL .'friends/accept/'.$username.'>View your friend requests</a>';
                $this->toolbox('messenger')->admin_send( $subject, $message, $username, $user);
        }
    }
    
    public function view_requests( $requests ) {
        
            # View pending friend requests
            $list = $this->db->prepare(" SELECT my_name, my_id, my_friend, my_friend_id FROM friends_list WHERE my_name = ? ");
            $list->execute( array( $friends ) );
            if( $list->rowCount() >= 1 )
                return $list;
            else
                return FALSE;        
    }
    
    public function view_friends( $friends = NULL ) {
        
        if( ! is_null( $friends ) ) {
            # Fetch selected member's friends
            $list = $this->db->prepare(" SELECT my_name, my_id, my_friend, my_friend_id FROM friends_list WHERE my_name = ? ");
            $list->execute( array( $friends ) );
            if( $list->rowCount() >= 1 )
                return $list;
            else
                return FALSE;
        }
        else {
            # Fetch logged in user's friends list
            $list = $this->db->prepare(" SELECT my_name, my_id, my_friend, my_friend_id FROM friends_list WHERE my_id = ? ");
            $list->execute( array( $this->user ) );
            if( $list->rowCount() >= 1 )
                return $list;
            else
                return FALSE;
        }
    }
    
    public function toolbox($helper) {

        # Load a Toolbox helper
        return $this->toolbox["$helper"];
    }
}
