<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram Clone</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        /* Body */
        body {
            background: url('https://images.unsplash.com/photo-1555131282-e59a58e5a78d') no-repeat center center fixed;
            background-size: cover;
            color: white;
            padding-top: 30px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }

        /* Instagram Label */
        .instagram-label {
            position: absolute;
            top: 30px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 36px;
            font-weight: 700;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            letter-spacing: 2px;
        }

        .feed-container {
            width: 80%;
            max-width: 800px;
            background-color: rgba(255, 255, 255, 0.85);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            margin-top: 100px;
            overflow: hidden;
            backdrop-filter: blur(10px);
        }

        .post-container {
            margin-bottom: 30px;
            padding: 20px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .post-header {
            display: flex;
            justify-content: space-between;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
            margin-bottom: 15px;
        }

        .post-header a {
            font-size: 16px;
            font-weight: 500;
            color: #333;
            text-decoration: none;
        }

        .metadata-fields input,
        .metadata-fields textarea {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 14px;
            background-color: #f0f2f5;
            color: #333;
        }

        .post-video {
            width: 100%;
            max-width: 600px;
            margin: 10px auto;
            display: block;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        .post-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 15px;
            border-top: 1px solid #ddd;
        }

        .like-button {
            background-color: rgb(163, 163, 163);
            color: white;
            border-radius: 12px;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        .like-button.liked {
            background-color: #e3354e;
        }

        .comment-section input {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 14px;
            background-color: #f8f9fa;
            color: #333;
        }

        .comments-list li {
            background-color: #f0f2f5;
            margin: 5px 0;
            padding: 10px;
            border-radius: 8px;
            color: #333;
        }

        .post-form {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .post-form input,
        .post-form textarea,
        .post-form button {
            margin-top: 10px;
        }

        .logout-button {
            position: absolute;
            top: 30px;
            right: 30px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        .logout-button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .feed-container {
                width: 90%;
            }

            .post-container {
                padding: 15px;
            }

            .post-footer button {
                padding: 8px 16px;
            }
        }
    </style>
</head>
<body>
    <!-- Instagram Clone Label -->
    <div class="instagram-label">Instagram Clone</div>

    <!-- Logout Button -->
    <button class="logout-button" onclick="logout()">Logout</button>

    <div class="feed-container">
        <!-- Post Form (Upload Video & Metadata) -->
        <div class="post-form">
            <h3>Create a New Post</h3>
            <input type="file" id="fileUpload" accept="video/*" placeholder="Choose Video">
            <div class="metadata-fields">
                <input type="text" id="title" placeholder="Title">
                <textarea id="caption" placeholder="Caption"></textarea>
                <input type="text" id="location" placeholder="Location">
                <input type="text" id="people" placeholder="People Present">
            </div>
            <button onclick="postVideo()">Post</button>
        </div>

        <!-- Feed -->
        <div id="postsContainer">
            <!-- Dynamic Posts will be appended here -->
        </div>
    </div>

    <script>
        let posts = []; // To store posts temporarily

        // Handle video upload
        document.getElementById('fileUpload').addEventListener('change', function(e) {
            var file = e.target.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var video = document.createElement('video');
                    video.src = e.target.result;
                    video.controls = true;
                    video.style.display = 'block';
                    video.classList.add('post-video');
                    document.getElementById('postsContainer').appendChild(video);
                };
                reader.readAsDataURL(file);
            }
        });

        // Function to handle post creation
        function postVideo() {
            const title = document.getElementById('title').value;
            const caption = document.getElementById('caption').value;
            const location = document.getElementById('location').value;
            const people = document.getElementById('people').value;
            const fileInput = document.getElementById('fileUpload');

            if (!fileInput.files[0]) {
                alert("Please select a video to upload.");
                return;
            }

            const videoFile = fileInput.files[0];
            const videoUrl = URL.createObjectURL(videoFile); // Create a local URL for the video

            // Save post data
            const newPost = {
                videoUrl,
                title,
                caption,
                location,
                people,
                timestamp: new Date().toLocaleString(),
                likes: 0,
                comments: []
            };

            posts.push(newPost);
            renderPosts(); // Re-render all posts after new post creation

            // Clear inputs
            document.getElementById('title').value = '';
            document.getElementById('caption').value = '';
            document.getElementById('location').value = '';
            document.getElementById('people').value = '';
            fileInput.value = '';
        }

        // Function to render posts on the feed
        function renderPosts() {
            const postsContainer = document.getElementById('postsContainer');
            postsContainer.innerHTML = ''; // Clear current posts

            posts.forEach(post => {
                const postElement = document.createElement('div');
                postElement.classList.add('post-container');

                // Post header
                const header = document.createElement('div');
                header.classList.add('post-header');
                header.innerHTML = `<a href="#">Username</a><span class="date">${post.timestamp}</span>`;
                postElement.appendChild(header);

                // Video and Metadata
                const video = document.createElement('video');
                video.src = post.videoUrl;
                video.controls = true;
                video.classList.add('post-video');
                postElement.appendChild(video);

                const metadata = document.createElement('div');
                metadata.classList.add('metadata-fields');
                metadata.innerHTML = `
                    <p><strong>Title:</strong> ${post.title}</p>
                    <p><strong>Caption:</strong> ${post.caption}</p>
                    <p><strong>Location:</strong> ${post.location}</p>
                    <p><strong>People Present:</strong> ${post.people}</p>
                `;
                postElement.appendChild(metadata);

                // Post footer with like and comment
                const footer = document.createElement('div');
                footer.classList.add('post-footer');
                footer.innerHTML = `
                    <button class="like-button" onclick="likePost(${posts.indexOf(post)})">❤️ Like (${post.likes})</button>
                    <button onclick="toggleCommentSection(${posts.indexOf(post)})">Comment</button>
                `;
                postElement.appendChild(footer);

                // Comment section
                const commentSection = document.createElement('div');
                commentSection.classList.add('comment-section');
                commentSection.id = `commentSection-${posts.indexOf(post)}`;
                commentSection.style.display = 'none';
                commentSection.innerHTML = `
                    <input type="text" id="commentInput-${posts.indexOf(post)}" placeholder="Write a comment...">
                    <ul class="comments-list" id="commentsList-${posts.indexOf(post)}"></ul>
                `;
                postElement.appendChild(commentSection);

                postsContainer.appendChild(postElement);
            });
        }

        // Function to like a post
        function likePost(postIndex) {
            posts[postIndex].likes += 1;
            renderPosts();
        }

        // Function to toggle comment section visibility
        function toggleCommentSection(postIndex) {
            const commentSection = document.getElementById(`commentSection-${postIndex}`);
            commentSection.style.display = commentSection.style.display === 'none' ? 'block' : 'none';

            // Add event listener for comment input
            document.getElementById(`commentInput-${postIndex}`).addEventListener('keypress', function(e) {
                if (e.key === 'Enter' && e.target.value.trim() !== '') {
                    const comment = e.target.value.trim();
                    const commentsList = document.getElementById(`commentsList-${postIndex}`);

                    const li = document.createElement('li');
                    li.textContent = comment;
                    commentsList.appendChild(li);

                    e.target.value = ''; // Clear input field
                }
            });
        }

        // Handle user logout
        function logout() {
            window.location.href = 'login.html'; // Redirect to login page
        }
    </script>
</body>
</html>
