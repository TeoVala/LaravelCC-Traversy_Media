@props(['post' => $post])

<div class="mb-4">
    <a href="{{ route('user.posts', $post->user) }}" class="font-bold">{{$post->user->name }}</a>
    <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>

    <p class="mb-2">{{$post->body}}</p>

    @can('delete', $post)
        <div>
            <form action="{{ route('posts.destroy' ,$post) }}" method="post" class="mr-1">
                @csrf
                @method('DELETE')
                <button class="text-blue-500" type="submit">
                    Delete
                </button>
            </form>

        </div>
    @endcan

    <div class="flex items-center">
        @auth
            @if (!$post->likeBy(auth()->user()))
                <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                    @csrf
                    <button class="text-blue-500" type="submit">
                        Like
                    </button>

                </form>

            @else
                <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button class="text-blue-500" type="submit">
                        Unlike
                    </button>

                </form>

            @endif

        @endauth

        <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>

    </div>

</div>
