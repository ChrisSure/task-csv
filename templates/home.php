<?php
$this->extend('layouts/base');
?>

<?php $this->startBlock('title') ?>Home <?php $this->endBlock() ?>


<?php $this->startBlock('content'); ?>
    <form enctype="multipart/form-data" action="/" method="POST">
        <input name="userfile" type="file" />
        <input type="submit" value="Submit" />
    </form>
<?php $this->endBlock(); ?>