<?php if(comments_open()): ?>

<div id="comments" class="bg-dark comments wrapped-content">


    <?php if(comments_open()): ?>

    <h3><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></h3>

    <?php else: ?>

    <h3><?php _e('Comments are closed.','now'); ?></h3>

    <?php endif; ?>


    <ul>
        <?php wp_list_comments('type=comment&callback=now_comment'); ?>
    </ul>   

</div>

<!-- <div id="comments-form-container" class="wrapped-content comments-form-container"> -->
    <?php comment_form(); ?>
<!-- </div> -->

<?php elseif (!comments_open()) :?>
<div id="comments" class="bg-dark comments wrapped-content"><h3><?php _e('Comments are closed.','now'); ?></h3></div>
<?php endif; ?>