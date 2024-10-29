// Toggle sidebar for mobile view
function toggleSidebar() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.style.display = sidebar.style.display === 'block' ? 'none' : 'block';
}

// Scroll to the post creation area
function scrollToPost() {
    document.getElementById('post-section').scrollIntoView({ behavior: 'smooth', block: 'center' });
}

// Function to add post
function addPost() {
    const postContent = document.getElementById('post-content').value;

    if (postContent.trim()) {
        const postList = document.getElementById('feed');
        const postElement = document.createElement('div');
        postElement.classList.add('post');

        postElement.innerHTML = `
            <h3>Anonymous User</h3>
            <p>${postContent}</p>
            <div class="actions">
                <button class="like-button" onclick="likePost(this)">Like <span class="like-counter">0</span></button>
                <button class="comment-button" onclick="toggleComment(this)">Comment <span class="comment-counter">0</span></button>
            </div>
            <div class="comment-section" style="display:none;">
                <textarea class="comment-input" placeholder="Write a comment..."></textarea>
                <button onclick="addComment(this)">Submit Comment</button>
                <div class="comments-list"></div>
            </div>
        `;

        postList.appendChild(postElement);

        // Clear the post field after adding
        document.getElementById('post-content').value = '';
    } else {
        alert('Please write something to post.');
    }
}

// Like button functionality
function likePost(button) {
    const likeCounter = button.querySelector('.like-counter');
    let likes = parseInt(likeCounter.innerText);
    likes++;
    likeCounter.innerText = likes;
}

// Toggle comment section
function toggleComment(button) {
    const commentSection = button.parentElement.nextElementSibling;
    commentSection.style.display = commentSection.style.display === 'none' ? 'block' : 'none';
}

// Add comment functionality
function addComment(button) {
    const commentInput = button.previousElementSibling;
    const commentText = commentInput.value.trim();

    if (commentText) {
        const commentsList = button.nextElementSibling;
        const commentElement = document.createElement('div');
        commentElement.classList.add('comment-box');
        commentElement.innerText = commentText;
        commentsList.appendChild(commentElement);

        // Clear the comment input
        commentInput.value = '';

        // Update comment count
        const commentCounter = button.closest('.post').querySelector('.comment-counter');
        let commentsCount = parseInt(commentCounter.innerText);
        commentsCount++;
        commentCounter.innerText = commentsCount;
    } else {
        alert('Please write something to comment.');
    }
}
