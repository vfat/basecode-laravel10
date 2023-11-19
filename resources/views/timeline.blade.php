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
                    <form action="{{route('tweets.store')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <textarea name="content" id="content" class="textarea textarea-bordered w-full" rows="3" placeholder="hai...."></textarea>
                            <input type="submit" class="btn btn-primary" value="submit">
                        </div>
                    </form>


                </div>
            </div>

            @foreach ($tweets as $tweet)
            <div class="card my-4 bg-white">
                
                <div class="card-body bg-grey">
                    <h3 class="text-md font-bold italic ">{{$tweet->user->name}} say:</h3>
                    {{$tweet->content}}
                    <div class="text-end text-sm italic">
                        @can('update',$tweet)
                        <a href="{{route('tweets.edit',$tweet->id)}}" class="link link-hover text-blue-300">Edit</a>
                        @endcan
                        @can('delete',$tweet)
                        <a href="{{route('tweets.delete',$tweet->id)}}" class="link link-hover text-blue-300">Delete</a>
                        @endcan
                        <span>{{$tweet->created_at->diffForHumans()}}</span>
                    </div>
                </div>
                
            </div>
            @endforeach

        </div>
    </div>
</x-app-layout>
