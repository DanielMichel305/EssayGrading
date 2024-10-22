
let postId = 1;

function addPost() {
    const content = document.getElementById('post-content').value;
    if (content === '') return;
    
    const feed = document.getElementById('feed');
    
    const post = document.createElement('div');
    post.classList.add('post');
    post.id = `post-${postId}`;
    
    // Initializing post content with like and comment button
    post.innerHTML = `
        <h3>Post #${postId}</h3>
        <p>${content}</p>
        <div class="actions">
            <button onclick="likePost(${postId})">Like</button>
            <span class="like-counter" id="like-counter-${postId}">0</span>
            <button onclick="showComments(${postId})">Comment</button>
        </div>
        <div id="comments-${postId}" class="comment-section" style="display: none;">
            <textarea id="comment-${postId}" placeholder="Write a comment..."></textarea>
            <button onclick="addComment(${postId})">Add Comment</button>
            <div id="comment-list-${postId}"></div>
        </div>
    `;
    
    feed.prepend(post);
    
    document.getElementById('post-content').value = ''; // Clear the input after posting
    postId++; // Increment postId for unique posts
}

function likePost(id) {
    const likeCounter = document.getElementById(`like-counter-${id}`);
    let currentLikes = parseInt(likeCounter.textContent, 10);
    currentLikes++; // Increment like count
    likeCounter.textContent = currentLikes; // Update like counter in UI
}

function showComments(id) {
    const commentSection = document.getElementById(`comments-${id}`);
    commentSection.style.display = commentSection.style.display === 'none' ? 'block' : 'none';
}

function addComment(id) {
    const commentContent = document.getElementById(`comment-${id}`).value;
    if (commentContent === '') return;

    const commentList = document.getElementById(`comment-list-${id}`);
    const comment = document.createElement('p');
    comment.textContent = commentContent;
    commentList.appendChild(comment);

    document.getElementById(`comment-${id}`).value = ''; // Clear the comment input
}

