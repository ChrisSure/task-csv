<?php
$this->extend('layouts/base');
?>

<?php $this->startBlock('title') ?>Home <?php $this->endBlock() ?>


<?php $this->startBlock('content'); ?>
    <?php if (isset($_SESSION['flash'])): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        New - <?= $_SESSION['flash']['new'];?> |
        Update - <?= $_SESSION['flash']['update'];?> |
        Remove - <?= $_SESSION['flash']['remove'];?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
    <form enctype="multipart/form-data" action="/" method="POST">
        <input name="userfile" type="file" />
        <input type="submit" value="Submit" />
    </form>
    <?php if(count($users) > 0):?>
    <hr>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">uid</th>
            <th scope="col">firstName</th>
            <th scope="col">lastName</th>
            <th scope="col">description</th>
            <th scope="col">birthDay</th>
            <th scope="col">dayChange</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($users as $user): ?>
        <tr>
            <th><?=$user->getUid()?></th>
            <th><?=$user->getFirstName()?></th>
            <th><?=$user->getLastName()?></th>
            <th><?=$user->getDescription()?></th>
            <th><?=$user->getBirthDay()?></th>
            <th><?=$user->getDayChange()?></th>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
<?php $this->endBlock(); ?>