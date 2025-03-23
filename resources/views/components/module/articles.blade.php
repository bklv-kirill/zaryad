<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-3 ">Related Post</h2>
            </div>
        </div>
        <div class="row">
            @foreach($articles as $article)
                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('article.show', [$article->categories->first()->slug, $article->slug]) }}"
                       class="a-block d-flex align-items-center height-md"
                       style="background-image: url('{{ $article->getRandomImage() }}');">
                        <div class="text">
                            <div class="post-meta">
                                <span class="category">{{ $article->categories->first()->title }}</span>
                                <span class="mr-2">{{ $article->diff_date }}</span> &bullet;
                                <span class="ml-2"><span class="fa fa-comments"></span>{{ rand(1, 50) }}</span>
                            </div>
                            <h3>{{ $article->title }}</h3>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
