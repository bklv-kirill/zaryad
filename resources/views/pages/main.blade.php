<x-layout-main title="Zaryd">
    @if($articles->isNotEmpty())
        <section class="site-section pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme home-slider">
                            @foreach($articles as $article)
                                @break($loop->iteration > 3)
                                <div>
                                    <a href="{{ route('article.show', [$article->categories->first()->slug, $article->slug]) }}"
                                       class="a-block d-flex align-items-center height-lg"
                                       style="background-image: url('{{ $article->getRandomImage() }}'); ">
                                        <div class="text half-to-full">
                                            <div class="post-meta">
                                                <span class="category">{{ $article->categories->first()->title }}</span>
                                                <span class="mr-2">{{ $article->diff_date }}</span>
                                                &bullet;
                                                <span class="ml-2"><span class="fa fa-comments"></span>{{ rand(1, 50) }}</span>
                                            </div>
                                            <h3>{{ $article->title }}</h3>
                                            <p>{{ $article->content }}</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <div class="mb-4"></div>
    @endif

    <section class="site-section py-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="mb-4">Lifestyle Category</h2>
                </div>
            </div>
            <div class="row blog-entries">
                <div class="col-md-12 col-lg-8 main-content">
                    <div class="row">
                        @forelse($articles as $article)
                            <div class="col-md-6">
                                <a href="{{ route('article.show', [$article->categories->first()->slug, $article->slug]) }}"
                                   class="blog-entry element-animate"
                                   data-animate-effect="fadeIn">
                                    <img src="{{ $article->getRandomImage() }}" alt="Image placeholder">
                                    <div class="blog-content-body">
                                        <div class="post-meta">
                                            <span class="category">{{ $article->categories->first()->title }}</span>
                                            <span class="mr-2">{{ $article->diff_date }}</span>
                                            &bullet;
                                            <span class="ml-2"><span class="fa fa-comments"></span>{{ rand(1, 50) }}</span>
                                        </div>
                                        <h2>{{ $article->title }}</h2>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <div class="col-md-6">
                                <h2 class="mb-4">There are no articles yet</h2>
                            </div>
                        @endforelse
                    </div>

                    {{ $articles->links() }}
                </div>

                <x-sidebar/>
            </div>
        </div>
    </section>
</x-layout-main>
