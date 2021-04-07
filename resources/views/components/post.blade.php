@props(['post' => $post])
<div class="mb-4">
    <a href="{{ route('user.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a>
    <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
    <p class="mb-2">{{ $post->body }}</p>

    @if ($post->ownedBy(auth()->user())) 
    <div>
      <form action="{{ route('posts.destroy', $post) }}" method="post">
        @csrf
        @method('DELETE')
       <button type="submit" class="text-blue-500">Delete</button>
       </form> 
    </div>
    @endif

    <div class="flex items-center">
        @auth
      @if (!$post->likedBy(auth()->user()))
        <form action="{{ route('posts.like', $post) }}" class="mr-1" method="POST">
            @csrf
            <button type="submit" class="text-blue-500">Like</button>
        </form>
        @else
        <form action="{{ route('posts.like', $post) }}" class="mr-1" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500">Unlike</button>
        </form>
        @endif
       
        @endauth
        <span>{{ $post->likes->count() }} {{ Str::plural('like',$post->likes->count())}}</span>
    </div>

</div>