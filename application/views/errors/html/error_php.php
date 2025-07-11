<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div style="border:1px solid #990000;padding:10px;margin:10px 0;">
    <h4>A PHP Error was encountered</h4>
    <p>Severity: <?php echo isset($severity) ? $severity : 'Unknown'; ?></p>
    <p>Message:  <?php echo isset($message) ? $message : 'An error occurred'; ?></p>
    <p>Filename: <?php echo isset($filepath) ? $filepath : 'Unknown'; ?></p>
    <p>Line Number: <?php echo isset($line) ? $line : 'Unknown'; ?></p>
    <?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>
        <p>Backtrace:</p>
        <?php foreach (debug_backtrace() as $error): ?>
            <?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>
                <p style="margin-left:10px">
                    File: <?php echo $error['file'] ?><br />
                    Line: <?php echo $error['line'] ?><br />
                    Function: <?php echo $error['function'] ?>
                </p>
            <?php endif ?>
        <?php endforeach ?>
    <?php endif ?>
</div>
