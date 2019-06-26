<?php if(isset($detail)): ?>
    <section id="entity_section" class="entity_section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="entity_wrapper">
                        <div class="entity_title">
                            <h1><a href="javascript:;"><?php echo e($detail->name ?? 'Updating'); ?></a></h1>
                        </div>
                        <!-- entity_title -->

                        <div class="entity_meta"><a href="javascript:;"
                                                    target="_self"><?php echo e($detail->created_at->toDateString() ?? 'Updating'); ?></a>,
                            by: <a href="javascript:;"
                                   target="_self"><?php echo e($detail->author->first_name ?? 'Anonymous'); ?></a>
                        </div>
                        <!-- entity_meta -->

                        <div class="entity_rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-full"></i>
                        </div>
                        <!-- entity_rating -->

                        <div class="entity_social">
                            <a href="#" class="icons-sm sh-ic">
                                <i class="fa fa-eye"></i>
                                <b><?php echo e($detail->views ?? 0); ?></b> <span class="share_ic">Views</span>
                            </a>
                        </div>
                        <div class="social-share">
                            <ul>
                                <?php echo \Share::currentPage(null,[],'<li>','</li>')->facebook(); ?>

                                <?php echo \Share::currentPage(null,[],'<li>','</li>')->twitter(); ?>

                                <?php echo \Share::currentPage(null,[],'<li>','</li>')->linkedin('Extra linkedin summary can be passed here'); ?>

                                <?php echo \Share::currentPage(null,[],'<li>','</li>')->whatsapp(); ?>

                            </ul>
                        </div>
                        <!-- entity_social -->

                        <!-- entity_thumb -->

                        <div class="entity_content">
                            <?php echo $detail->content ?? 'Updating'; ?>

                        </div>
                        <!-- entity_content -->

                        <div class="entity_footer">
                            <div class="entity_tag">
                                <?php ($tags = $detail->tags); ?>
                                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="blank"><a href="#"><?php echo e($tag->name ?? 'No tag'); ?></a></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <!-- entity_tag -->

                            <div class="entity_social">
                                <span><i class="fa fa-share-alt"></i>424 <a href="#">Shares</a> </span>
                                <span><i class="fa fa-comments-o"></i>4 <a href="#">Comments</a> </span>
                            </div>
                            <!-- entity_social -->

                        </div>
                        <!-- entity_footer -->

                    </div>
                    <!-- entity_wrapper -->

                    <div class="related_news">
                        <div class="entity_inner__title header_purple">
                            <h2><a href="#">Related News</a></h2>
                        </div>
                        <!-- entity_title -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#"><img class="media-object" src="assets/img/cat-mobi-sm1.jpg"
                                                         alt="Generic placeholder image"></a>
                                    </div>
                                    <div class="media-body">
                                        <span class="tag purple"><a href="category.html"
                                                                    target="_self">Mobile</a></span>

                                        <h3 class="media-heading"><a href="single.html" target="_self">Apple launches
                                                photo-centric wrist
                                                watch for Android</a></h3>
                                        <span class="media-date"><a href="#">10Aug- 2015</a>,  by: <a
                                                href="#">Eric joan</a></span>

                                        <div class="media_social">
                                            <span><a href="#"><i class="fa fa-share-alt"></i>424</a> Shares</span>
                                            <span><a href="#"><i class="fa fa-comments-o"></i>4</a> Comments</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#"><img class="media-object" src="assets/img/cat-mobi-sm3.jpg"
                                                         alt="Generic placeholder image"></a>
                                    </div>
                                    <div class="media-body">
                                        <span class="tag purple"><a href="category.html"
                                                                    target="_self">Mobile</a></span>

                                        <h3 class="media-heading"><a href="single.html" target="_self">The Portable
                                                Charger or data
                                                cable</a></h3>
                                        <span class="media-date"><a href="#">10Aug- 2015</a>,  by: <a
                                                href="#">Eric joan</a></span>

                                        <div class="media_social">
                                            <span><a href="#"><i class="fa fa-share-alt"></i>424</a> Shares</span>
                                            <span><a href="#"><i class="fa fa-comments-o"></i>4</a> Comments</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#"><img class="media-object" src="assets/img/cat-mobi-sm2.jpg"
                                                         alt="Generic placeholder image"></a>
                                    </div>
                                    <div class="media-body">
                                        <span class="tag purple"><a href="category.html"
                                                                    target="_self">Mobile</a></span>

                                        <h3 class="media-heading"><a href="single.html" target="_self">Iphone 6 launches
                                                white & Grey
                                                colors handset</a></h3>
                                        <span class="media-date"><a href="#">10Aug- 2015</a>,  by: <a
                                                href="#">Eric joan</a></span>

                                        <div class="media_social">
                                            <span><a href="#"><i class="fa fa-share-alt"></i>424</a> Shares</span>
                                            <span><a href="#"><i class="fa fa-comments-o"></i>4</a> Comments</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#"><img class="media-object" src="assets/img/cat-mobi-sm4.jpg"
                                                         alt="Generic placeholder image"></a>
                                    </div>
                                    <div class="media-body">
                                        <span class="tag purple"><a href="category.html"
                                                                    target="_self">Mobile</a></span>
                                        <a href="single.html" target="_self"><h3 class="media-heading">Fully new look
                                                slim handset
                                                like</h3></a>
                                        <span class="media-date"><a href="#">10Aug- 2015</a>,  by: <a
                                                href="#">Eric joan</a></span>

                                        <div class="media_social">
                                            <span><a href="#"><i class="fa fa-share-alt"></i>424</a> Shares</span>
                                            <span><a href="#"><i class="fa fa-comments-o"></i>4</a> Comments</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Related news -->

                    <div class="readers_comment">
                        <div class="entity_inner__title header_purple">
                            <h2>Readers Comment</h2>
                        </div>
                        <!-- entity_title -->

                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img alt="64x64" class="media-object" data-src="assets/img/reader_img1.jpg"
                                         src="assets/img/reader_img1.jpg" data-holder-rendered="true">
                                </a>
                            </div>
                            <div class="media-body">
                                <h2 class="media-heading"><a href="#">Sr. Ryan</a></h2>
                                But who has any right to find fault with a man who chooses to enjoy a pleasure that has
                                no annoying consequences, or one who avoids a pain that produces no resultant pleasure?

                                <div class="entity_vote">
                                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>
                                    <a href="#"><span class="reply_ic">Reply </span></a>
                                </div>
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <img alt="64x64" class="media-object" data-src="assets/img/reader_img2.jpg"
                                                 src="assets/img/reader_img2.jpg" data-holder-rendered="true">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h2 class="media-heading"><a href="#">Admin</a></h2>
                                        But who has any right to find fault with a man who chooses to enjoy a pleasure
                                        that has no annoying consequences, or one who avoids a pain that produces no
                                        resultant pleasure?

                                        <div class="entity_vote">
                                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>
                                            <a href="#"><span class="reply_ic">Reply </span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- media end -->

                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img alt="64x64" class="media-object" data-src="assets/img/reader_img3.jpg"
                                         src="assets/img/reader_img3.jpg" data-holder-rendered="true">
                                </a>
                            </div>
                            <div class="media-body">
                                <h2 class="media-heading"><a href="#">S. Joshep</a></h2>
                                But who has any right to find fault with a man who chooses to enjoy a pleasure that has
                                no annoying consequences, or one who avoids a pain that produces no resultant pleasure?

                                <div class="entity_vote">
                                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>
                                    <a href="#"><span class="reply_ic">Reply </span></a>
                                </div>
                            </div>
                        </div>
                        <!-- media end -->
                    </div>
                    <!--Readers Comment-->


                    <div class="entity_comments">
                        <div class="entity_inner__title header_black">
                            <h2>Add a Comment</h2>
                        </div>
                        <!--Entity Title -->

                        <div class="entity_comment_from">
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                                <div class="form-group comment">
                                    <textarea class="form-control" id="inputComment" placeholder="Comment"></textarea>
                                </div>

                                <button type="submit" class="btn btn-submit red">Submit</button>
                            </form>
                        </div>
                        <!--Entity Comments From -->

                    </div>
                    <!--Entity Comments -->

                </div>
                <!--Left Section-->

                <?php if ($__env->exists('main::views.general.right_sidebar')) echo $__env->make('main::views.general.right_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>
            <!-- row -->

        </div>
        <!-- container -->

    </section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\botble\platform\plugins/blog/resources/views//details/layouts/content_details.blade.php ENDPATH**/ ?>