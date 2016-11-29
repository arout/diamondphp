<?php foreach( $data['location'] as $city ): ?>

<?= $city['citycode'] . ', ' . $city['statecode'].'<br>'; ?>

<?php endforeach; ?>

<?= $data['pagination_links']; ?>