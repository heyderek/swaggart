<?php get_header(); ?>
<section class="featured-content">
  <div class="flexslider">
    <ul class="slides">
    <?php 
      $args = array(
        'post_type' => 'slider',
        'order' => 'ASC'
      );
      $slide = new WP_Query($args); ?>
      <?php while($slide->have_posts()) : $slide->the_post(); ?>
        <li>
          <?php the_post_thumbnail('homepage-feature'); ?>
          <?php
            $title = get_post_meta($post->ID, '_cmb_slide_title', true);
            $text = get_post_meta($post->ID, '_cmb_caption_text', true);
            $button = get_post_meta($post->ID, '_cmb_button_heading', true);
            $subtext = get_post_meta($post->ID, '_cmb_button_subtext', true);
            $position = get_post_meta($post->ID, '_cmb_caption_position', true);
            $bg = get_post_meta($post->ID, '_cmb_caption_bg', true);
            $link = get_post_meta($post->ID, '_cmb_button_link', true);
            $white = get_post_meta($post->ID, '_cmb_caption_white', true);
            $locale = get_post_meta($post->ID, '_cmb_location_info', true);
            ?>
          <span class="location-caption"><?php echo $locale; ?></span>
          <figure class="caption <?php echo $position; ?> <?php echo $bg; ?> <?php echo $white; ?> content">
            <h3><?php echo $title; ?></h3>
            <p><?php echo $text; ?></p>
            <a href="<?php echo $link; ?>" class="big-button"><span><?php echo $button; ?></span><?php echo $subtext; ?></a>
          </figure>
        </li>
      <?php endwhile; ?>
    </ul><!-- /.slides -->
  </div>
</section><!-- /.featured-content -->
<?php get_footer(); ?>