<div class="white-row">

    <?php if( $data['friends'] === TRUE ): ?>
    
    <?php foreach( $data['friends'] as $friend): ?>
    
    <?= $friend['my_friend']; ?>
    
    <?php endforeach; ?>
    
    <?php else: ?>
    
    <legend>No friends to display</legend>
    <p>
        To add someone to your friends list, view their profile, and select the "Add Friend" button.
    </p>
    
    <?php endif; ?>
</div>