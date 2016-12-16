<?php
namespace Hal\Module;

class Friends
{
    private $db;
    public $toolbox;
    private $user;
    private $model;

    public function __construct($db, $toolbox, $model)
    {
        $this->db       = $db;
        $this->toolbox  = $toolbox;
        $this->user     = $this->toolbox('session')->get('member_id');
        $this->username = $this->toolbox('session')->get('username');
        $this->model    = $model;
    }

    public function add($friend_name, $friend_id)
    {
        # Confirm a single friend request
        $sql = "UPDATE friend_requests SET accepted = ?, accepted_date = ? WHERE sent_to = ? AND sent_by = ?";
        $query = $this->db->prepare($sql);
        $query->execute( [1, time(), $this->user, $friend_id] );

        $sql = "SELECT my_id FROM friends_list WHERE my_id = ?";
        $query = $this->db->prepare($sql);
        $query->execute( [$this->user] );
        if( $query->rowCount() == 0 )
        {
            $sql = "INSERT INTO friends_list(my_name, my_id, my_friend, my_friend_id) VALUES(?,?,?,?)";
            $query = $this->db->prepare($sql);
            $query->execute( [$this->username, $this->user, $friend_name, $friend_id] );
        }
        else {
            $is_friend = $this->is_friend($friend_id);
            if( ! $is_friend )
            {
                $sql = "INSERT INTO friends_list(my_name, my_id, my_friend, my_friend_id) VALUES(?,?,?,?)";
                $query = $this->db->prepare($sql);
                $query->execute( [$this->username, $this->user, $friend_name, $friend_id] );
            }
        }
    }

    public function is_friend($check) 
    {
        $sql = "SELECT my_friend_id FROM friends_list WHERE my_friend_id = ?";
        $query = $this->db->prepare($sql);
        $query->execute( [$check] );
        if( $query->rowCount() == 0 )
        {
            return false;
        }
        return true;
    }

    public function model($m)
    {
        return $this->toolbox('load')->model("$m");
    }

    public function send_request($friend)
    {
        if (is_array($friend))
        {
            # Send multiple friend requests
            $friend = $this->toolbox('sanitize')->xss($friend);
            foreach ($friend as $user)
            {
                $req = $this->db->prepare("INSERT INTO friend_requests(sent_by, sent_to, sent_date) VALUES(?, ?, ?)");
                $req->execute(array(
                    $this->user,
                    $user,
                    time()
                ));
                # Send notification to inbox of friend request
                $username = $this->model('Member')->get_username($user);
                $subject  = "New friend request from $username";
                $message  = $username . ' wants to be friends! <a href=' . BASE_URL . 'friends/accept/' . $username . '>View your friend requests</a>';
                $this->toolbox('messenger')->admin_send($subject, $message, $username, $user);
            }
        }
        else
        {
            $req = $this->db->prepare("INSERT INTO friend_requests(sent_by, sent_to, sent_date) VALUES(?, ?, ?)");
            $req->execute(array(
                $this->user,
                $friend,
                time()
            ));
            # Send notification to inbox of friend request
            $username = $this->model('Member')->get_username($friend);
            $user     = $this->model('Member')->get_member_id($username);
            $subject  = "New friend request from $this->username";
            $message  = $this->username . ' wants to be friends! <a href=' . BASE_URL . 'friends/accept/' . $username . '>View your friend requests</a>';
            $this->toolbox('messenger')->admin_send($subject, $message, $username, $user);
        }
    }

    public function view_requests($user)
    {
        # View pending friend requests
        $list = $this->db->prepare("SELECT * FROM friend_requests LEFT JOIN users ON friend_requests.sent_by = users.member_id WHERE sent_to = ? AND accepted = ?");
        $list->execute(array(
            $user, 0
        ));
        if ($list->rowCount() >= 1)
            return $list;
        return FALSE;
    }

    public function view_friends($username = NULL)
    {
        # This method fetches logged in user's friends list,
        # as well as viewed members friends, depending on $username
        if (!is_null($username))
        {
            # This query only fetches friends where a friend request 
            # was sent to the user, and user accepted
            $list = $this->db->prepare(" 
                SELECT DISTINCT my_friend, my_friend_id, headline, city, state, dob, username, about_me, pic, accepted_date  
                FROM friends_list 
                LEFT JOIN users 
                ON friends_list.my_friend_id = users.member_id 
                LEFT JOIN friend_requests  
                ON users.member_id = friend_requests.sent_to  
                WHERE my_name = ?");
            $list->execute(array(
                $username
            ));
            
            // if ($list->rowCount() >= 1) 
            // {
            while($row = $list->fetch(\PDO::FETCH_ASSOC))
                $results[] = $row;

                # This query fetches friends where user sent friend requests out
                # and these requests were accepted
                $list2 = $this->db->prepare(" 
                SELECT DISTINCT my_name, my_id, headline, city, state, dob, username, about_me, pic, accepted_date   
                FROM friends_list 
                LEFT JOIN users 
                ON friends_list.my_id = users.member_id 
                LEFT JOIN friend_requests  
                ON users.member_id = friend_requests.sent_to 
                WHERE my_friend = ?");
                $list2->execute(array(
                    $username
                ));
                while($row2 = $list2->fetch(\PDO::FETCH_ASSOC))
                $results[] = $row2;
            // }
                return $results;
            return FALSE;
        }
        else
        {
            # Fetch logged in user's friends list
            $list = $this->db->prepare(" SELECT my_name, my_id, my_friend, my_friend_id FROM friends_list WHERE my_id = ? ");
            $list->execute(array(
                $this->user
            ));
            if ($list->rowCount() >= 1)
                return $list;
            return FALSE;
        }
    }
    
    public function toolbox($helper)
    {
        # Load a Toolbox helper
        return $this->toolbox["$helper"];
    }
}
  