<div class="white-row">
<legend>Unread Messages</legend>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <tr><th>From</th><th>Subject</th><th>Date</th><th></th></tr>
        <tbody>
        <?php foreach($data['unread_messages'] as $mail): ?>

        <tr>
            <td width="15%"><span class="label label-primary">
            <a href="<?= BASEURL; ?>member/view/<?= urlencode( $mail['sender'] ); ?>" />
                <img class="img-responsive" width="50px" src="<?= USER_PICS_URL.$mail['username'].'/'; ?><?= $mail['pic']; ?>" />
                <?= $mail['sender']; ?></span>
            </a>
            </td>
            <td width="55%"><h4><?= $mail['subject']; ?></h4></td>
            <td width="20%"><?= $this->toolbox('formatter')->datetime( $mail['date'] ); ?></td>
            <td width="10%"><a href="<?= BASEURL; ?>messenger/view/<?= $mail['mid']; ?>" /><button class="label btn-success">View</button></a></td>
        </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->toolbox('session')->get('username') . ' is ' .$this->toolbox('session')->get('age'); ?> years old!
</div>