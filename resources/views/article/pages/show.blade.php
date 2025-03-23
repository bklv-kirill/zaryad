<x-layout-main :title="$article->title">
    <section class="site-section py-lg">
        <div class="container">
            <div class="row blog-entries">
                <div class="col-md-12 col-lg-8 main-content">
                    <h1 class="mb-4">{{ $article->title }}</h1>
                    <div class="post-meta">
                        <span class="category">{{ $article->categories->first()->title }}</span>
                        <span class="mr-2">{{ $article->diff_date }}</span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span>{{ rand(1, 50) }}</span>
                    </div>
                    <div class="post-content-body">
                        {!! $article->content !!}
                        <div class="row mb-5">
                            @foreach($article->getRandomImages() as $randomImage)
                                <div class="col-md-12 mb-4 element-animate">
                                    <img src="{{ $randomImage }}" alt="Image placeholder" class="img-fluid">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="pt-5">
                        <p>
                            Categories:
                            @foreach($article->categories as $category)
                                <a href="{{ route('category.show', $category->slug) }}">{{ $category->title }}</a>
                            @endforeach
                        </p>
                    </div>
                </div>

                <x-sidebar/>
            </div>
        </div>
    </section>

    <x-articles/>
</x-layout-main>
