<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bình Luận</title>
    <link rel="stylesheet" href="styles.css">
    <style type="text/css">
        /* Thêm kiểu CSS tùy chỉnh nếu cần thiết */
        #commentsContainer {
            margin-top: 10px;
        }

        #existingComments {
            margin-bottom: 10px;
        }

    </style>
</head>
<!-- Đặng Bá Chí -->
<body>
    <div id="commentsSection">
        <button onclick="toggleComments()">Bình Luận</button>
        <div id="commentsContainer" style="display: none;">
            <div id="existingComments">
                <!-- Hiển thị các bình luận đã có -->
                <p>Bình luận 1</p>
                <p>Bình luận 2</p>
                <!-- ... -->
            </div>
            <input type="text" id="commentInput" placeholder="Nhập bình luận...">
            <button onclick="submitComment()">Gửi</button>
        </div>
    </div>
    <script type="text/javascript">
        function toggleComments() {
            var commentsContainer = document.getElementById('commentsContainer');
            commentsContainer.style.display = commentsContainer.style.display === 'none' ? 'block' : 'none';
        }

        function submitComment() {
            var commentInput = document.getElementById('commentInput');
            var commentText = commentInput.value;

            if (commentText.trim() !== '') {
                var existingComments = document.getElementById('existingComments');
                var newComment = document.createElement('p');
                newComment.textContent = commentText;
                existingComments.appendChild(newComment);

        // Xóa nội dung trong ô nhập sau khi thêm bình luận
                commentInput.value = '';
            }
        }

    </script>

    <script src="script.js"></script>
</body>
</html>
