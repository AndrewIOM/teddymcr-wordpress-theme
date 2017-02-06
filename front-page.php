<?php
/**
 * Home Page
 * @package understrap_child
 */

get_header();
?>

<section id="home-jumbo" style="background-image: url(/wp-content/themes/teddymcr/images/banner1.jpg); height: 450px;">
    <div class="container">
      <div class="home-jumbo-left">
        <h1>The Graduate Community of <br/>St Edmund Hall</h1>
      </div>
    </div>
  </section>

  <section id="home-figures" class="home-section">
      <div class="container">
      <div class="row">
      <div class="col-md-4">
                <span>The Middle Common Room of St Edmund Hall is a vibrant community of:</span>
      </div>
      <div class="col-md-4" style="text-align:center;">
        <span class="number-big"><?php echo get_post_meta(get_the_ID(), 'Total Students', true); ?></span>
        <span>graduate and fourth year students</span>
      </div>
      <div class="col-md-4" style="text-align:center;">
        <span class="number-big"><?php echo get_post_meta(get_the_ID(), 'Total Nationalities', true); ?></span>
        <span>nationalities</span>
      </div>
      </div>
      </div>
  </section>

  <section id="home-blog" class="home-section">
    <!-- Main -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- Research Highlights -->
                <article class="news-block research-highlights">
                    <h3>Research Spotlight</h3>
                    <?php
                    $recentPosts = new WP_Query();
                    $recentPosts->query('category_name=research-spotlight&post_status=publish&showposts=5orderby=date');
                    while ($recentPosts->have_posts()) : $recentPosts->the_post();?>
                        <section class="news-post">
                            <span><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo get_the_date(); ?></span>
                            <h4><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <?php the_post_thumbnail(); ?>
                            <?php the_excerpt(); ?>
                        </section>
                    <?php endwhile;  ?>
                    <?php wp_reset_query(); ?>
                </article>
            </div>
            <div class="col-md-4">
                <article class="news-block side-block">
                    <h3>MCR News</h3>
                    <?php
                    $recentNews = new WP_Query();
                    $recentNews->query('category_name=news&post_status=publish&showposts=3orderby=date');
                    while ($recentNews->have_posts()) : $recentNews->the_post();?>
                        <section class="news-post">
                            <span><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo get_the_date(); ?></span>
                            <h4><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <?php the_post_thumbnail(); ?>
                            <?php the_excerpt(); ?>
                        </section>
                    <?php endwhile;  ?>
                    <?php wp_reset_query(); ?>
                </article>
            </div>
        </div>
    </div>
<!-- /Main -->
</section>

  <section id="home-about" style="background-color:#FDBC2F;padding: 3em 0;text-align:center;">
      <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <h2>The MCR at Teddy Hall: 50 Years and Beyond</h2>
          <p>Although St Edmund Hall has been a site of learning in Oxford since 1236, the Middle Common Room has only recently celebrated it's 50th birthday.</p>
        </p></div>
        </div>
        <div class="row">
          <div class="col-md-6" class="description">
            <p><?php echo get_post_meta(get_the_ID(), 'History of the MCR Text', true); ?></p>
            <img src="/wp-content/themes/teddymcr/images/50th-anniversary.jpeg" alt="St Edmund Hall MCR 50th Anniversary Logo">
          </div>
            <div class="col-md-6" class="feature-image">
                <img src="/wp-content/themes/teddymcr/images/academic-quad.jpg" alt="Matriculation in the Quad" style="max-width:100%;height:250px;background-color:lightgrey;">
            </div>
        </div>
      </div>
  </section>
        

<script type="text/javascript">
$(document).ready(function(){     
  $('.navbar-fixed-top').addClass('navbar-transparent');
  $('body').css('margin-top', '0');  
   var scroll_start = 0;
   var startchange = $('#home-jumbo');
   var offset = startchange.offset();
    if (startchange.length){
   $(document).scroll(function() { 
      scroll_start = $(this).scrollTop();
      if(scroll_start > offset.top) {
          $('.navbar-fixed-top').removeClass('navbar-transparent');
       } else {
          $('.navbar-fixed-top').addClass('navbar-transparent');
       }
   });
    }

    $('.exCollapsingNavbar').on('show.bs.collapse', function () {
        $('.navbar-fixed-top').removeClass('navbar-transparent');
    })
    $('.exCollapsingNavbar').on('hidden.bs.collapse', function () {
        if(scroll_start < offset.top) {
            $('.navbar-fixed-top').addClass('navbar-transparent');
        }
    })
});
</script>

<?php get_footer(); ?>
