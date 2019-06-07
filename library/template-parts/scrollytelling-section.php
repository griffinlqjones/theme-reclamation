<?php
$scrolly_post = get_post(1597);

// Arra of values.
$scrolly_fields = get_fields($scrolly_post);

if ($scrolly_fields) :
?>
  <article class="scrollytelling-section">

    <?php
    foreach ($scrolly_fields as $scrolly_field => $field_type) :

      if (gettype($field_type) == 'string') :

        elseif (gettype($field_type) == 'array' && $field_type != null) :

          foreach ($field_type as $field => $content) :
            if ($field == 'heading') :
              echo '<h1 class="scrolly-heading">' . $content . '</h1>';
            elseif($field) :
              echo '<p class="scrolly-text">'. $content . '</p>';
            endif;

        endforeach;
      else:

      endif;

    endforeach;

    ?>
  </article>

<?php
else:
  echo '<h1>Scrollytelling has no post data.</h1>';
endif;
?>
