<div class="col-md-12 col-lg-4 sidebar">
    <div class="sidebar-box">
        <div class="bio text-center">
            <img src="{{ asset('images/person_1.jpg') }}" alt="Image Placeholder" class="img-fluid">
            <div class="bio-body">
                <h2>Meagan Smith</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Exercitationem facilis sunt repellendus excepturi beatae porro
                    debitis voluptate nulla quo veniam fuga sit molestias minus.
                </p>
                <p><a href="#" class="btn btn-primary btn-sm">Read my bio</a></p>
                <p class="social">
                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                </p>
            </div>
        </div>
    </div>
    @if($articles->isNotEmpty())
        <div class="sidebar-box">
            <h3 class="heading">Popular Posts</h3>
            <div class="post-entry-sidebar">
                <ul>
                    @foreach($articles as $article)
                        <li>
                            <a href="{{ route('article.show', [$article->categories->first()->slug, $article->slug]) }}">
                                <img src="{{ $article->getRandomImage() }}" alt="Image placeholder" class="mr-4">
                                <div class="text">
                                    <h4>{{ $article->title }}</h4>
                                    <div class="post-meta">
                                        <span class="mr-2">{{ $article->diff_date }}</span> &bullet;
                                        <span class="ml-2"><span class="fa fa-comments"></span>{{ rand(1, 50) }}</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    @if($categories->isNotEmpty())
        <div class="sidebar-box">
            <h3 class="heading">Categories</h3>
            <ul class="categories">
                @foreach($categories as $category)
                    <li>
                        <a href="{{ route('category.show', $category->slug) }}">
                            {{ $category->title }}
                            <span>({{ $category->articles->count() }})</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
