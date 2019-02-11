<?php ob_start(); ?>

Liste

<?php $content = ob_get_clean(); ?>

<?php view('template', compact('content')); ?>