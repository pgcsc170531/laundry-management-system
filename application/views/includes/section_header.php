<div class="page-header mb-4 mt-4">
    <h2><?php echo isset($title) ? $title : 'Section'; ?></h2>
    <?php if (isset($subtitle) && $subtitle): ?>
        <p class="lead"><?php echo $subtitle; ?></p>
    <?php endif; ?>
</div>
