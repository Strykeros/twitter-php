<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twitter clone</title>
</head>

<body>
    @include('components.header')

    @auth
    <h1>Welcome, {{ Auth::user()->username }}!</h1>
    <br><br>
    <div class="container">
        <h2>Create a Post</h2>
        <form action="/submit-post" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group d-flex flex-column">
                <label for="postText">What’s happening?</label>
                <textarea id="postText" name="postText" placeholder="Share your thoughts..." required></textarea>
            </div>
            <div class="form-group d-flex flex-column">
                <label for="postImage">Upload Image:</label>
                <input type="file" id="postImage" name="postImage" accept="image/*">
            </div>
            <button type="submit">Post</button>
        </form>
    </div>

    <div class="py-4">
        @foreach ($posts as $post)
        <div class="card mb-3">
            <div class="card-body col-6">
                <h5 class="card-title">{{ $post->user->username }}</h5>
                <p class="card-text">{{ $post->text }}</p>
                @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="...">
                @endif
                <p class="card-text"><small class="text-muted">Posted on {{ $post->created_at->format('M d, Y') }}</small></p>

                @if (Auth::id() == $post->user_id)
                <form action="{{ route('posts-destroy', $post) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    </div>
    @else
    <h1>hello, guest! login or register to get started.</h1>
    @endauth
</body>

</html>