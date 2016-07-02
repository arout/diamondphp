<div class="white-row">
    <?php
        if( is_array( $data['friends'] ) ) {
            $data['friends'] = $data['friends'].', ';
            $data['friends'] = rtrim(', ', '', $data['friends']);
            echo '<blockquote> Your friend request to '.$data['friends'].' has been sent! </blockquote>';
        }else{
    ?>
        <blockquote> Your friend request to <?php echo $data['friends']; ?> has been sent! </blockquote>
        
    <?php } ?>    

</div>