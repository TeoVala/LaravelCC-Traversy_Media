@extends('layout.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            <div class="p-6">
                <h1 class="text-2xl font-medium mb-1">{{ $user->name }}</h1>

                <p>Posted {{ $posts ->count() }} {{Str::plural('post', $posts->count())}} and received {{ $user->receivedLikes->count() }} {{ Str::plural('like', $user->receivedLikes->count()) }} {{--I added this, this is not included in the tutorial--}}</p>

            </div>

            <div class="bg-white p-6 rounded-lg">
                @if ($posts->count())
                    @foreach ($posts as $post)
                        <x-post :post="$post" />

                    @endforeach

                    {{ $posts->links() }}

                @else
                    <p>{{ $user-> name}} hasn't posted anything yet. </p>

                @endif

            </div>
        </div>
    </div>
@endsection
