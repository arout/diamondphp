<?php
namespace Hal\Toolbox;

class Messenger {
    
    // Database connection
    private $db;
    // Access the Toolbox helpers
    private $toolbox;
    // Username of the inbox owner
    private $user;
    // Admin email
    private $admin_email;
    // Admin name
    private $admin_name;

    public function __construct( $db, $toolbox ) {
		
        $this->db       = $db;
        $this->toolbox  = $toolbox;
        $this->user     = $this->toolbox('session')->get('member_id');
        $this->admin_email = $this->toolbox('config')->setting('site_email');
        $this->admin_name = $this->toolbox('config')->setting('site_admin');
    }
    
    /*----------------------------------------
     * Count all and unread messages functions
     ---------------------------------------*/
    public function count_all() {
        
        // Display total number of messages in inbox 
        $mail = $this->db->prepare( "SELECT COUNT(rid) as count FROM messenger_inbox WHERE rid = ? AND flag_delete = 0" );
        $mail->execute( array( $this->user ) );
        $count = $mail->fetch(\PDO::FETCH_ASSOC);
        
        if( $mail )
            return $count = $count['count'];
        else
            return FALSE;
    }
    
    public function count_unread() {
        
        // Display number of unread messages
        $mail = $this->db->prepare( "SELECT COUNT(rid) as count FROM messenger_inbox WHERE rid = ? AND flag_read = 0 AND flag_delete = 0" );
        $mail->execute( array( $this->user ) );
        $count = $mail->fetch(\PDO::FETCH_ASSOC);
        
        if( $mail )
            return $count = $count['count'];
        else
            return FALSE;
    }
    /*----------------------------------------
     * End of counting messages functions
     ---------------------------------------*/

    /*----------------------------------------
     * Flag messages
     ---------------------------------------*/
    public function flag_read( $mid ) {

        /**
         * Flag message as read
         */
        $read = $this->db->prepare(" UPDATE messenger_inbox SET flag_read = 1 WHERE mid = ? ");
        $read->execute( array( $mid ) );

        return $read;
    }

    public function flag_unread( $mid ) {

        /**
         * Flag message as unread
         */
        $read = $this->db->prepare(" UPDATE messenger_inbox SET flag_read = 0 WHERE mid = ? ");
        $read->execute( array( $mid ) );

        return $read;
    }

    public function flag_delete( $mid ) {

        /**
         * Flag message as deleted
         */
        $read = $this->db->prepare(" UPDATE messenger_inbox SET flag_delete = 1 WHERE mid = ? ");
        $read->execute( array( $mid ) );

        return $read;
    }
    
    /*---------------------------------------------------
     * Toggle methods are for message icon toggle tables
     --------------------------------------------------*/
    public function toggle_star( $mid ) {

        /**
         * Toggle flag message as important / normal
         */
        $mid = str_replace('star_', '', $mid);
        $check = $this->db->prepare(" SELECT flag_star FROM messenger_inbox WHERE mid = ? ");
        $check->execute( array( $mid ) );
        
        foreach( $check as $c ) {
            
            if( $c['flag_star'] == 'star_1' ) {
                $read = $this->db->prepare(" UPDATE messenger_inbox SET flag_star = 'star_0' WHERE mid = ? ");
                $read->execute( array( $mid ) );
            }
            else {
                $read = $this->db->prepare(" UPDATE messenger_inbox SET flag_star = 'star_1' WHERE mid = ? ");
                $read->execute( array( $mid ) );
            }
            
            return $read;
        }
        
    }
    
    public function toggle_read( $mid ) {

        /**
         * Toggle flag message as read / unread
         */
        $mid = str_replace('read_', '', $_POST['mid']);
        $check = $this->db->prepare(" SELECT flag_read FROM messenger_inbox WHERE mid = ? ");
        $check->execute( array( $mid ) );
        
        foreach( $check as $c ) {
            
            if( $c['flag_read'] == '1' ) {
                $read = $this->db->prepare(" UPDATE messenger_inbox SET flag_read = 0 WHERE mid = ? ");
                $read->execute( array( $mid ) );
            }
            else {
                $read = $this->db->prepare(" UPDATE messenger_inbox SET flag_read = 1 WHERE mid = ? ");
                $read->execute( array( $mid ) );
            }
            
            return $read;
        }
        
    }
    /*----------------------------------------
     * End of flag methods
     ---------------------------------------*/

    public function view() {
        
        //** Display selected message **//
        
        // Message ID
        $mid = $this->toolbox('router')->param1;
        // Make sure message id is set, and is 32 characters long (md5 will always return 32 chars)
        if( empty( $mid ) || is_null( $mid ) || ! isset( $mid ) || strlen( $mid ) !== 32 )
            return FALSE;
        
        // Get the message
        $mail = $this->db->prepare("
                SELECT mid, sender, sid, member_id, recipient, rid, subject, message, date, username,  pic, dob, city, state, flag_read, flag_delete, flag_star 
                FROM messenger_inbox 
                LEFT JOIN users 
                ON messenger_inbox.sid = users.member_id 
                WHERE rid = ? AND mid = ?
            ");
        $mail->execute( array( $this->user, $mid ) );
        
        // Update inbox to indicate message has been read
        $read = $this->db->prepare(" UPDATE messenger_inbox SET flag_read = 1 WHERE mid = ? ");
        $read->execute( array( $mid ) );
        if($mail)
            return $mail;
        else
            return FALSE;
    }
    
    public function view_all() {
        
        // Display all messages in inbox 
        $mail = $this->db->prepare("
                SELECT mid, sender, sid, member_id, recipient, rid, subject, message, date, username,  pic, dob, city, state, flag_read, flag_delete, flag_star 
                FROM messenger_inbox 
                LEFT JOIN users 
                ON messenger_inbox.sid = users.member_id 
                WHERE rid = ? AND flag_delete = 0 
                ORDER BY date DESC
            ");
        $mail->execute( array( $this->user ) );
        
        if( $mail->rowCount() >= 1 )
            return $mail;
        else
            return FALSE;
    }
    
    public function view_message_history( $user ) {

        // Display message history between two users
        // User member ID rather than username or email,
        // since the latter two may change, but member id 
        // will always point to the same user since it never changes
        $id = $this->db->prepare( "SELECT member_id FROM `users` WHERE username = ?" );
        $id->execute( array( $user ) );
        if( ! $id ) return FALSE;
        foreach( $id as $id )
            $userid = $id['member_id'];
        
        $mail = $this->db->prepare( "SELECT * FROM `messenger_inbox` WHERE (sid = ? AND rid = ?) OR (sid = ? AND rid = ?) GROUP BY subject ORDER BY date DESC" );
        $mail->execute( array( $this->user, $userid, $userid, $this->user ) );
        return $mail;
    }
    
    public function view_sent() {
        
        // Display sent messages
        $mail = $this->db->prepare( "SELECT * FROM `messenger_sent_messages` WHERE sent_by = ?" );
        $mail->execute( array( $this->user ) );
        $count = $mail->fetch(\PDO::FETCH_ASSOC);
        
        if( $mail )
            return $count = $count['count'];
        else
            return FALSE;
    }
    
    public function view_unread() {
        
            // Display unread messages in inbox 
            $mail = $this->db->prepare( "
            SELECT mid, sender, sid, member_id, recipient, rid, subject, message, date, username,  pic, dob, city, state, flag_read, flag_delete, flag_star 
            FROM messenger_inbox 
            LEFT JOIN users 
            ON messenger_inbox.sid = users.member_id 
            WHERE rid = ? AND flag_read = 0 AND flag_delete = 0 
            ORDER BY date DESC" 
        );
        $mail->execute( array( $this->user ) );

        return $mail;
    }

    
    /*----------------------------------------
     * Send message functions
     ---------------------------------------*/
    public function reply( $subject, $replyto, $mid ) {

        // $mid = Message ID
    }
    
    public function admin_send( $subject, $message, $sendto, $sendtoid) {
        
        /**
         *  Send message from administation
         */
        
        // Create a unique 32 character message id
        // Encrypting the username + current timestamp should work nicely
        $mid = md5( $this->admin_email . time() . rand(1, 20000) );
        
        // Sender's member id
        $sid = '1';

        $send = $this->db->prepare("
            INSERT INTO messenger_inbox(`mid`, `sender`, `sid`, `recipient`, `rid`, `subject`, `message`, `date`) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $send->execute( array( $mid, $this->admin_name, $sid, $sendto, $sendtoid, $subject, $message, time() ) );
        
        #if( ! $send ) return FALSE; else return TRUE;
    }
    
    public function send( $subject, $message, $sendto) {
        
        /**
         *  We need to find out the recipients member id;
         *  may as well do this check first; this will also have the
         *  dual effect of verifying the recipient's username. If 
         *  the query returns false, then we may as well exit now and 
         *  avoid processing the rest of the request.
         */
        # Check if we sent the username as a parameter rather than the member id.
        # We can skip this DB call if it is the member ID
        if( !is_numeric( $sendto ) ) {
        $id = $this->db->prepare("SELECT member_id FROM users WHERE username = ?");
        $id->execute( array( $sendto ) );
        // Kill processing now if member id not returned
        if( ! $id ) return FALSE;
        }
        else {
            $id = $sendto;
        }
        
        // Set the recipient's id (rid)
        foreach( $id as $id )
            $rid = $id['member_id'];
        
        // Create a unique 32 character message id
        // Encrypting the username + current timestamp should work nicely
        $mid = md5( $this->toolbox('session')->get( 'username' ) . time() );
        
        // Username of message sender (the logged in user initiating this message)
        $sender = $this->toolbox('session')->get( 'username' );
        // Sender's member id
        $sid = $this->toolbox('session')->get( 'member_id' );
        
        // Fully strip the subject
        $subject = $this->toolbox('sanitize')->xss( $subject );
        
        // To process the message, first we strip all illegal tags
        $message = $this->toolbox('sanitize')->xss( $message );
        
        // Next, we strip out email addresses and URLs if required by configuration
        if( $this->toolbox('config')->setting['inbox_allow_email'] === FALSE )
            $message .= $this->toolbox('sanitize')->remove_email( $message );
            
        if( $this->toolbox('config')->setting['inbox_allow_url'] === FALSE )
            $message .= $this->toolbox('sanitize')->remove_url( $message );
        
        /**
         *  Finally, we are ready to send the message
         */
        $send = $this->db->prepare("
            INSERT INTO messenger_inbox(`mid`, `sender`, `sid`, `recipient`, `rid`, `subject`, `message`, `date`) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $send->execute( array( $mid, $sender, $sid, $sendto, $rid, $subject, $message, time() ) );
        if( ! $send ) return FALSE; else return TRUE;
    }
     
    public function toolbox($helper) {

        # Load a Toolbox helper
        return $this->toolbox["$helper"];
    }

    /*----------------------------------------
     * Global inbox settings
     ---------------------------------------*/
     public function max_limit() {

        /**
         * Max # of saved messages in inbox
         * This value is set in Config.php
         */
        return $this->toolbox["config"]->setting['inbox_limit'];
    }
}
