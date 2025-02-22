<html>
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    />
    <meta
        http-equiv="X-UA-Compatible"
        content="ie=edge"
    />
    <title>
        Laravel App
    </title>
    @vite('resources/css/app.css')
{{--    <link--}}
{{--        rel="stylesheet"--}}
{{--        href="{{ asset('css/app.css') }}"--}}
{{--    />--}}
</head>
<body class="w-full h-full bg-gray-100">
<div class="w-4/5 mx-auto">
    <div class="text-center pt-20">
        <h1 class="text-3xl text-gray-700">
            All Articles
        </h1>
        <hr class="border border-1 border-gray-300 mt-10">
    </div>
    @if(Auth::user())
        <div class="py-10 sm:py-20">
            <a class="primary-btn inline text-base sm:text-xl bg-green-500 py-4 px-4 shadow-xl rounded-full transition-all hover:bg-green-400"
               href="{{route('AddAPost')}}">
                New Article
            </a>
        </div>
    @endif
</div>

@if(session()->has('message'))
    <h1>{{session()->get('message')}}</h1>
@endif

<div class="w-4/5 mx-auto pb-10">
    @foreach($AllPosts as $SinglePost)
        <div class="bg-white pt-10 rounded-lg drop-shadow-2xl sm:basis-3/4 basis-full sm:mr-8 pb-10 sm:pb-0">
            <div class="w-11/12 mx-auto pb-10">
                <h2 class="text-gray-900 text-2xl font-bold pt-6 pb-0 sm:pt-0 hover:text-gray-700 transition-all">
                    <a href="{{ route( 'ShowSinglePost',$SinglePost->id ) }}">
                        {{ $SinglePost->title }}
                    </a>
                </h2>

                <p class="text-gray-900 text-lg py-8 w-full break-words">
                    {{ $SinglePost->excerpt }}
                </p>

                <span class="text-gray-500 text-sm sm:text-base">
                    Made by:
                        <a href=""
                           class="text-green-500 italic hover:text-green-400 hover:border-b-2 border-green-400 pb-3 transition-all">
                           {{$SinglePost->user ? $SinglePost->user->name : ''}}
                        </a>
                    on {{ $SinglePost->updated_at }}
                </span>
                @if($SinglePost->image_path !== null)
                    <img height="300px" width="300px" src="{{$SinglePost->image_path}}" alt="" >
                @endif
            </div>
        </div>
    @endforeach
    <div style="margin: auto;padding-bottom: 10px; width: 10%" class="mx-auto pb-10 w-4/5">
        {{$AllPosts->links()}}
    </div>

</div>
</body>
</html>
