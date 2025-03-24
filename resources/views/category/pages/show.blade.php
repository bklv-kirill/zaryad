<x-layout-main :title="$category->title">
    <section class="site-section">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h2 class="mb-4">Category: {{ $category->title }}</h2>
                </div>
            </div>
            <div class="row blog-entries">
                <div class="col-md-12 col-lg-8 main-content">
                    <div class="row mb-5 mt-5">
                        <div class="col-md-12">
                            @foreach($articles as $article)
                                <div class="post-entry-horzontal">
                                    <a href="{{ route('article.show', [$category->slug, $article->slug]) }}">
                                        <div class="image element-animate" data-animate-effect="fadeIn"
                                             style="background-image: url('{{ $randomImageService->getRandomImage() }}');">
                                        </div>
                                        <span class="text">
                                              <div class="post-meta">
                                                    <span class="category">
                                                        {{ $category->title }}
                                                    </span>
                                                    <span class="mr-2">
                                                        {{ $article->createdAt }}
                                                    </span>
                                                    &bullet;
                                                    <span class="ml-2"><span class="fa fa-comments"></span>{{ rand(1, 50) }}</span>
                                              </div>
                                              <h2>{{ $article->title }}</h2>
                                        </span>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- {{ $articles->links() }} --}}
                </div>

                <x-sidebar/>
            </div>
        </div>
    </section>
</x-layout-main>
