@extends('layouts.blogpage')
@section('blog-content')
    <!--inner banner start-->
    <div class="innerBanner Loader">
        <img class="modify-img " data-image-small="{{ asset('blog/blog-post/' . $data->image) }}"
            data-image-large="{{ asset('blog/blog-post/' . $data->image) }}"
            data-image-standard="{{ asset('blog/blog-post/' . $data->image) }}" alt=""> <!--1366x400-->

        <div class="container">
            <div class="row">
                <h1 class="anim textOver">{{ \Carbon\Carbon::parse($data->created_at)->format('d F Y') }}</span></h1>
            </div>
        </div>
    </div>

    <!--inner banner end-->
    <section id="primary" class="blog pt100 pb100">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h1 class="Title mb30">{{ $data->title }}</h1>
                    <div class="content">
                        {!! $data->description !!}
                    </div>


                    <div class="clear"></div>

                    <nav class="navigation post-navigation" aria-label="Posts">
                        <h2 class="screen-reader-text">Post navigation</h2>
                        <div class="nav-links">
                            <div class="nav-previous">
                                @if ($previous)
                                    <a href="{{ route('blogs.details', ['name' => $previous->slug]) }}" rel="prev">
                                        <span class="nav-subtitle">Previous:</span>
                                        <span class="nav-title">{{ $previous->title }}</span>
                                    </a>
                                @endif

                            </div>
                            <div class="nav-next">
                                @if ($next)
                                    <a href="{{ route('blogs.details', ['name' => $next->slug]) }}" rel="next">
                                        <span class="nav-subtitle">Next:</span>
                                        <span class="nav-title">{{ $next->title }}</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </nav>
                    <style>
                        .comments-title {
                            position: relative;
                        }

                        .comments-area .align {
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            margin: 0 0 60px;
                        }
                    </style>
                    <div id="comments" class="comments-area">

                        <div id="respond" class="comment-respond">
                            <h3 id="reply-title" class="comment-reply-title">Write a Comment <small><a rel="nofollow"
                                        id="cancel-comment-reply-link" href="index.html#respond"
                                        style="display:none;">Cancel Reply</a></small></h3>
                            <form action="https://edisonrealestatebd.com/blog/wp-comments-post.php" method="post"
                                id="commentform" class="comment-form" novalidate>Registration isn't required.<p
                                    class="comment-form-comment"><br />
                                    <textarea id="comment" class="form-control" name="comment" aria-required="true" placeholder="Comment"></textarea>
                                </p>
                                <p class="comment-form-author"><br /><input id="author" name="author"
                                        class="form-control" aria-required="true" placeholder="Name"></input></p>
                                <p class="comment-form-email"><br /><input id="email" class="form-control"
                                        name="email" placeholder="E-Mail"></input></p>
                                <p class="comment-form-url"><br /><input id="url" class="form-control" name="url"
                                        placeholder="Website"></input></p>
                                <input type="checkbox" required><span style="margin-left:10px">By commenting you
                                    accept the<a href="#"> Privacy Policy</span></a>
                                <p class="form-submit"><input name="submit" type="submit" id="comment-submit"
                                        class="submit" value="Send Message" /> <input type='hidden' name='comment_post_ID'
                                        value='606' id='comment_post_ID' />
                                    <input type='hidden' name='comment_parent' id='comment_parent' value='0' />
                                </p>
                            </form>
                        </div><!-- #respond -->

                    </div><!-- #comments -->


                </div>

            </div>
        </div>

    </section><!-- #main -->
@endsection
