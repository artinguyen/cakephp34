<!DOCTYPE html>
<html>
<?= $this->element('/Common/header') ?>
<body>
<div class="wrapper">
        <div class="main-header">
            <div class="logo-header">
                <a href="index.html" class="logo">
                    Ready Dashboard
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
            </div>
            <?= $this->element('/Common/navigation') ?>
            </div>
            <?= $this->element('/Common/sidebar') ?>
            <div class="main-panel">
                <?= $this->fetch('content') ?>
                <?= $this->element('/Common/footer') ?>
            </div>
        </div>
    </div>
</body>
<!-- <script src="assets/js/core/jquery.3.2.1.min.js"></script> -->
<?= $this->Html->script('core/jquery.3.2.1.min.js'); ?>
<!-- <script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script> -->
<?= $this->Html->script('plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js'); ?>
<!-- <script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script> -->
<?= $this->Html->script('core/popper.min.js'); ?>
<?= $this->Html->script('core/bootstrap.min.js'); ?>
<!-- <script src="assets/js/plugin/chartist/chartist.min.js"></script>
<script src="assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js"></script> -->
<?= $this->Html->script('plugin/chartist/chartist.min.js'); ?>
<?= $this->Html->script('plugin/chartist/plugin/chartist-plugin-tooltip.min.js'); ?>
<!-- <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script> -->
<?= $this->Html->script('plugin/bootstrap-notify/bootstrap-notify.min.js'); ?>
<?= $this->Html->script('plugin/bootstrap-toggle/bootstrap-toggle.min.js'); ?>
<!-- <script src="assets/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/maps/world_countries.min.js"></script> -->
<?= $this->Html->script('plugin/jquery-mapael/jquery.mapael.min.js'); ?>
<?= $this->Html->script('plugin/jquery-mapael/maps/world_countries.min.js'); ?>
<!-- <script src="assets/js/plugin/chart-circle/circles.min.js"></script> -->
<?= $this->Html->script('plugin/chart-circle/circles.min.js'); ?>
<!-- <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script> -->
<?= $this->Html->script('plugin/jquery-scrollbar/jquery.scrollbar.min.js'); ?>
<!-- <script src="assets/js/ready.min.js"></script> -->
<?= $this->Html->script('ready.min.js'); ?>
<?= $this->Html->script('demo'); ?>
</html>
