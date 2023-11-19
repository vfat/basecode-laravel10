<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tweet
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('tweets.editaction')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <input type="hidden" name="id" value="{{$tweet->id}}">
                            <textarea name="content" id="content" class="textarea textarea-bordered w-full" rows="3" placeholder="hai....">{{$tweet->content}}</textarea>
                            <input type="submit" class="btn btn-primary" value="Edit">
                        </div>
                    </form>


                </div>
            </div>

        </div>
    </div>
</x-app-layout>
