<?php // this template part is used on the front page to display featured events and products ?>

<!-- <div class="featuredhome-wrap"> -->

  <a class="featuredhome-link" href="<?php the_permalink(); ?>" rel="bookmark" title="View More">

    <div class="featuredhome-innerwrap">

      <!-- <div class="featuredhome-thumb-fix-wrap">
        <div class="featuredhome-thumb-fix" style="background: #fff url('<?php the_post_thumbnail_url(); ?>') 0 0 scroll no-repeat; background-size: cover;"></div>
      </div> -->

      <div class="featuredhome-img">
        <?php the_post_thumbnail(); ?>
      </div>

      <div class="featuredhome-title">
        <small>

          <?php // strip the title if needed, just change the 1000!
            $title  = the_title('','',false);
            if(strlen($title) > 1000):
                echo trim(substr($title, 0, 30)).'...';
            else:
                echo $title;
            endif;
          ?>

       </small>
     </div>

    </div>

  </a>

<!-- </div> -->
