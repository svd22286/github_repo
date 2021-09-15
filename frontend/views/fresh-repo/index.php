<?php
/**
 * @var UserRepo[] $repos
 */
?>
<div class="container">
    <h3>Fresh repo list</h3>
    <?php foreach($repos as $repo): ?>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xl-12">
                <?= $repo->url; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>