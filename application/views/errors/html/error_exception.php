<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Exception</title>
    <style type="text/css">
        ::selection { background-color: #E13300; color: white; }
        ::-moz-selection { background-color: #E13300; color: white; }
        body {
            background-color: #fff;
            margin: 40px;
            font: 13px/20px normal Helvetica, Arial, sans-serif;
            color: #4F5155;
        }
        a {
            color: #003399;
            background-color: transparent;
            font-weight: normal;
        }
        h1 {
            color: #444;
            background-color: transparent;
            border-bottom: 1px solid #D0D0D0;
            font-size: 19px;
            font-weight: normal;
            margin: 0 0 14px 0;
            padding: 14px 15px 10px 15px;
        }
        code {
            font-family: Consolas, Monaco, Courier New, Courier, monospace;
            font-size: 12px;
            background-color: #f9f9f9;
            border: 1px solid #D0D0D0;
            color: #002166;
            display: block;
            margin: 14px 0 14px 0;
            padding: 12px 10px 12px 10px;
        }
        #container {
            margin: 10px;
            border: 1px solid #D0D0D0;
            box-shadow: 0 0 8px #D0D0D0;
        }
        p {
            margin: 12px 15px 12px 15px;
        }
        pre {
            font-family: Consolas, Monaco, Courier New, Courier, monospace;
            background-color: #f9f9f9;
            border: 1px solid #D0D0D0;
            color: #002166;
            display: block;
            margin: 14px 0 14px 0;
            padding: 12px 10px 12px 10px;
            overflow: auto;
        }
        .trace-heading {
            background-color: #f5f5f5;
            padding: 5px 10px;
            margin: 0;
            font-weight: bold;
            border-top: 1px solid #D0D0D0;
        }
        .trace-body {
            padding: 10px;
            border-top: 1px solid #D0D0D0;
        }
    </style>
</head>
<body>
<div id="container">
    <h1><?php echo isset($heading) ? $heading : 'An Exception Occurred'; ?></h1>
    <div style="padding: 0 15px;">
        <p><?php echo isset($message) ? $message : 'An exception occurred while processing your request.'; ?></p>

        <?php if (isset($exception)): ?>
        <p><strong>Type:</strong> <?php echo get_class($exception); ?></p>

        <?php if (isset($exception->getCode) && $exception->getCode()): ?>
        <p><strong>Code:</strong> <?php echo $exception->getCode(); ?></p>
        <?php endif; ?>

        <p><strong>Filename:</strong> <?php echo $exception->getFile(); ?></p>

        <p><strong>Line Number:</strong> <?php echo $exception->getLine(); ?></p>

        <?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>
            <div class="trace-section">
                <p class="trace-heading">Backtrace:</p>
                <?php foreach ($exception->getTrace() as $i => $trace): ?>
                    <div class="trace-body">
                        <p>
                            <strong>#<?php echo $i; ?></strong>
                            <?php echo (isset($trace['file']) && isset($trace['line'])) ? $trace['file'].' : '.$trace['line'] : ''; ?>
                        </p>
                        <?php if (isset($trace['class'])): ?>
                            <p><strong>Class:</strong> <?php echo $trace['class']; ?></p>
                        <?php endif; ?>

                        <?php if (isset($trace['function'])): ?>
                            <p><strong>Function:</strong> <?php echo $trace['function']; ?></p>
                        <?php endif; ?>

                        <?php if (isset($trace['args']) && is_array($trace['args']) && count($trace['args']) > 0): ?>
                            <p><strong>Arguments:</strong></p>
                            <pre><?php print_r($trace['args']); ?></pre>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
