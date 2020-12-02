<link rel="stylesheet" type="text/css" href="common/frontend/styles/news.css">
<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="common/frontend/images/services.jpg" data-speed="0.8" ></div>
<div class="home_container">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="home_content">
                    <div style="margin-top: 100px;" class="home_title">Blogs</div>
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
            <div class="col-lg-8">
                <div class="news_posts">
                    <?php foreach ($f_blogs as $f_blog) { ?>
                        <div class="news_post">
                            <div class="news_post_image"><img src="<?php echo $f_blog->img_url; ?>" alt=""></div>
                            <div class="news_post_content">

                                <div class="news_post_title"><a href="#"><?php echo $f_blog->title; ?></a></div>
                                <div class="news_post_info">
                                    <ul class="d-flex flex-row align-items-center justify-content-start">
                                        <li><a href="#">by <?php echo $f_blog->posted_by; ?></a></li>
                                        <li><a href="#"><?php echo $f_blog->date; ?></a></li>
                                    </ul>
                                </div>
                                <div class="news_post_text">
                                    <p> <?php echo $f_blog->blog_post; ?></p>
                                </div>
                                <div class="button news_post_button"><a href="frontend/webBlogDetailsPage?id=<?php echo $f_blog->id; ?>">
                                        <span>read more</span><span>read more</span></a></div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="news_sidebar">

                    <!-- Latest News -->
                    <div class="sidebar_latest">
                        <div class="sidebar_title">Latest Blog</div>
                        <div class="sidebar_latest_container">

                            <!-- Latest News Post -->
                            <?php foreach ($f_blogs as $f_blog) { ?>
                                <div class="latest d-flex flex-row align-items-start justify-content-start">
                                    <div class="latest_content">
                                        <div class="news_post_title"><a href="frontend/webBlogDetailsPage?id=<?php echo $f_blog->id; ?>"><?php echo $f_blog->title; ?></a></div>

                                    </div>
                                </div>
                            <?php } ?>
                            

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>