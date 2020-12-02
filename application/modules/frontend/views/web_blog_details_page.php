<link rel="stylesheet" type="text/css" href="common/frontend/styles/news.css">
<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="<?php echo $f_blog->img_url; ?>" data-speed="0.8" ></div>
<div class="home_container">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="home_content">
                    div style="margin-top: 100px;" class="home_title"><?php echo $f_blog->title; ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- News -->

<div class="news">
    <div class="container">
        <div class="row">

            <!-- News Posts -->
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="news_posts">
                    <div class="news_post_info">
                        <ul class="d-flex flex-row align-items-center justify-content-start">
                            <li><a href="#">by <?php echo $f_blog->posted_by; ?></a></li>
                            <li><a href="#"><?php echo $f_blog->date; ?></a></li>
                        </ul>
                    </div>
                    <div class="news_post_text">
                        <p> <?php echo $f_blog->blog_post; ?></p>
                    </div>


                </div>
            </div>

            <!-- Sidebar -->

        </div>
    </div>
</div>