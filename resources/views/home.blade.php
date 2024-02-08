<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @auth
        <p>Welcome {{ auth()->user()->name }}</p>
        <form action="/logout" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>

        <div style="border: 3px solid black; padding: 10px; margin: 10px;">
            <h2>Create Post</h2>
            <form action="/createPosts" method="POST" >
                @csrf
                <input type="text" name="title" placeholder="Title" required>
                <textarea name="content" placeholder="Content" required></textarea>
                <button type="submit">Create Post</button>
            </form>
        </div>

        <div style="border: 3px solid black; padding: 10px; margin: 10px;">
            <h2>All Posts</h2>
            @foreach ($posts as $post)
                <div style="background-color: grey; padding:10px; margin:10px">
                    <h3>{{ $post->title }} by {{$post->user->name}}</h3>
                    <p>{{ $post->content }}</p>
                    <p><a href="/editPost/{{ $post->id }}">Edit</a></p>
                    <form action="/deletePost/{{ $post->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                </div>
            @endforeach
        </div>

    @else

    <div style="border: 3px solid black; padding: 10px; margin: 10px;">
        <h2>Register</h2>
        <form action="/register" method="POST" >
            @csrf
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
    </div>
    <div style="border: 3px solid black; padding: 10px; margin: 10px;">
        <h2>Login</h2>
        <form action="/login" method="POST" >
            @csrf
            <input type="text" name="loginName" placeholder="Name" required>
            <input type="password" name="loginPassword" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>

    @endauth

</body>
</html>