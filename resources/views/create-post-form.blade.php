<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" required>
    
    <label for="message">Message:</label>
    <textarea name="message" id="message" required></textarea>
    
    <label for="author_name">Author Name:</label>
    <input type="text" name="author_name" id="author_name" required>
    
    <button type="submit">Submit</button>
</form>
