@extends('frontlayout')
@section('title','Home Page')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/frontend/css/main.css">
</head>
<body>
    <header>
        <div class="logo-wrapper">
            <div class="logo_wiki sprite svg-wiki">
                WikiCulTurE
        </div>
        <img src="/img/Wiki.png" class="logo" alt="Wikipedia">
        <p>The Free Encyclopedia</p>
    </header>
    <main>
        <div class="container-central">
            <div class="central-lang box-1" >
                <a href="" >
                    <strong>Extreme North</strong>

                </a>
            </div>
            <div class="central-lang box-2">
                <a href="" class="central-featured-lang">
                    <strong>North</strong>

                </a>
            </div>
            <div class="central-lang box-3">
                <a href="" class="central-featured-lang">
                    <strong>Adamawa</strong>

                </a>
            </div>
            <div class="central-lang box-4">
                <a href="" class="central-featured-lang">
                    <strong>East</strong>

                </a>
            </div>
            <div class="central-lang box-5">
                <a href="" class="central-featured-lang">
                    <strong>West</strong>

                </a>
            </div>
            <div class="central-lang box-6">
                <a href="" class="central-featured-lang">
                    <strong>Center</strong>

                </a>
            </div>
            <div class="central-lang box-7">
                <a href="" class="central-featured-lang">
                    <strong>North-West</strong>

                </a>
            </div>

            <div class="central-lang box-8">
                <a href="" class="central-featured-lang">
                    <strong>South-West</strong>

                </a>
            </div>
            <div class="central-lang box-9">
                <a href="" class="central-featured-lang">
                    <strong>Littoral</strong>

                </a>
            </div>
            <div class="central-lang box-10">
                <a href="" class="central-featured-lang">
                    <strong>South</strong>

                </a>
            </div>
        </div>
    </main>

    <section class="search">
        <form action="{{url('/')}}">
            <div class="box-search">
                <div class="search-input">
                    <input type="text" name="q" class="form-control">
                </div>
                <!-- <div class="search-language">
                    <select name="" id="">
                        <option value="ES">ES</option>
                    </select>
                </div> -->
            </div>
            <button class="btn-search btn btn-dark"  type="button" id="button-addon2>
                <i class="sprite search-icon">Search</i>
            </button>
        </form>
    </section>

    <!-- <section class="translate">
        <div class="line-decoration"><hr></div>
        <button>
            <i class="sprite translate-icon"></i>
            <span>Read Wikipedia in your language</span>
            <i class="sprite icon-arrow-down-blue"></i>
        </button>
    </section> -->
    <div class="line-section"><hr>
        @if(count($posts)>0)
            @foreach($posts as $post)
                    <h5 class="text-underline"><a href="{{url('detail/'.Str::slug($post->title).'/'.$post->id)}}">{{$post->title}}</a></h5>
                    <p>{!! Str::limit($post->detail, 250)!!}</p>
            @endforeach
        @else
        <p class="alert alert-danger">No Article Found</p>
        @endif
    </div>
</body>
@endsection('content')
