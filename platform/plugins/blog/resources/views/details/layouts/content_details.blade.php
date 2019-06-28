@isset($detail)
    <section id="entity_section" class="entity_section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="entity_wrapper">
                        <div class="entity_title">
                            <h1><a href="javascript:;">{{$detail->name ?? 'Updating'}}</a></h1>
                        </div>
                        <!-- entity_title -->

                        <div class="entity_meta"><a href="javascript:;"
                                                    target="_self">{{$detail->created_at->toDateString() ?? 'Updating'}}</a>,
                            by: <a href="javascript:;"
                                   target="_self">{{$detail->author->first_name ?? 'Anonymous'}}</a>
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
                                <b>{{$detail->views ?? 0}}</b> <span class="share_ic">Views</span>
                            </a>
                        </div>
                        <div class="fb-like"
                             data-href="{{url()->current()}}"
                             data-layout="standard"
                             data-action="like"
                             data-show-faces="true">
                        </div>
                        <div class="social-share">
                            <ul>
                                <div class="fb-save" data-uri="{{url()->current()}}" data-size="small"></div>
                               {{--share button--}}
                                <div class="fb-share-button"
                                     data-href="{{url()->current()}}"
                                     data-layout="button_count">
                                </div>
                                {{--share button--}}
                            </ul>
                        </div>
                        <!-- entity_social -->

                        <!-- entity_thumb -->

                        <div class="entity_content">
                            {!! $detail->content ?? 'Updating' !!}
                        </div>
                        <!-- entity_content -->

                        <div class="entity_footer">
                            <div class="entity_tag">
                                @php($tags = $detail->tags)
                                @foreach($tags as $tag)
                                    <span class="blank"><a href="#">{{$tag->name ?? 'No tag'}}</a></span>
                                @endforeach
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
                        <div class="entity_inner__title header_purple"></div>
                        <!-- entity_title -->
                        <div class="fb-comments" data-width="100%" data-colorscheme="dark"></div>
                    </div>
                    <!--Readers Comment-->
                </div>
                <!--Left Section-->

                @includeIf('main::views.general.right_sidebar')

            </div>
            <!-- row -->

        </div>
        <!-- container -->

    </section>
@endisset
