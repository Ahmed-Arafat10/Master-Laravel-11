<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logaged in!") }}
                </div>
            </div>
        </div>
    </div>
    <h1>Posts of : {{Auth::user()->name}}</h1>
    @foreach(Auth::user()->posts as $SinglePost)
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
                            By: {{$SinglePost->user->name}}
                        </a>
                    on {{ $SinglePost->updated_at->format('d/m/y') }}
                </span>
                @if($SinglePost->image_path !== null)
                    <img height="100px" width="100px" src="{{$SinglePost->image_path}}" alt="" >
                @endif
            </div>
        </div>
    @endforeach
</x-app-layout>
