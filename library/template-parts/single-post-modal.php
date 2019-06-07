<?php $blocks = null; ?>
<div id="profile-modal-container">
  <div id="modal-carousel">
    <?php if (has_blocks()) : ?>
      <?php
      // $array_filter
        $blocks = parse_blocks_ignore_empty_blocks(get_the_content());
      ?>

      <?php foreach ($blocks as $block) : ?>

        <div class="carousel-cell">
          <?php echo render_block($block); ?>
        </div>

      <?php endforeach; ?>
    <?php endif; ?>

  </div>
</div>
