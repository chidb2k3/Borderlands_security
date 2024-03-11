
<?php if (isset($_SESSION['you'])) {
        if ($_SESSION['you']['role']==1) {
            include("menu.php");
        }else{
            include("menu2.php");
        }
    } ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem Tệp Word</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mammoth/1.0.1/mammoth.browser.min.js"></script>
   
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
<body style="background-image: url('../users/img-btn/body.png'); background-repeat: no-repeat; background-size: 100%;">
    <h3 align="center" style="color: red; font-family: 'Garamond', sans-serif; margin-top: 5px;">
        <?php if (isset($_GET['tenFile'])) {
            echo $_GET['tenFile'];
            $_SESSION['idFile']=$_GET['idFile'];
        } ?>
    </h3>
    <div>

        <div>

          <div style="float: left; margin-right: 3%; margin-left: 1%;" >
           <button onclick="goBack()" style="margin-left: 10px;"><img src="../users/img-btn/dong.png" style="width: 25px; height:20px;"> </button>
           <button style="color: red; font-family: 'Garamond', sans-serif;"  onclick="loadWordDocument('<?php if (isset($_GET['tenFile'])) {
            echo $_GET['tenFile'];
        } ?>')">Xem Tài Liệu</button>

        <button onclick="loadComments()" style="color: red; font-family: 'Garamond', sans-serif;">Bình Luận</button>

        <div d id="commentOverlay" class="overlay" style="background-color: #FEEBD0; display: none;"  >
            <div id="commentsContainer"  >
                <div id="existingComments" style="height: 300px; overflow: auto; border: 1px solid #ccc; padding: 10px;">
                    <!-- Hiển thị các bình luận đã có -->
                    <p>Bình luận 1</p>
                    <p>Bình luận 2</p>
                    <!-- ... -->
                </div>

                <input type="text" id="commentInput" placeholder="Nhập bình luận...">
                <button onclick="submitComment()" ><img style="width: 25px; height: 20px;" src="../users/img-btn/send.png"> </button>
            </div>
        </div>


    </div>


    <div id="wordViewer" style="margin-left: 20%; overflow: auto; height: 420px;  border: 1px solid #000; padding: 50px; width: 65%; background-color: #FFFBD1; ">

    </div>



</div>






</div>



<script>
    
    

    function loadWordDocument(fileName) {
        loadComments();
            // Đường dẫn đến tệp Word trong dự án của bạn
        var wordFilePath = '../word/uploads/'+fileName;

            // Sử dụng XMLHttpRequest để tải tệp Word
        var xhr = new XMLHttpRequest();
        xhr.open('GET', wordFilePath, true);
        xhr.responseType = 'arraybuffer';

        xhr.onload = function () {
            if (xhr.status === 200) {
                var arrayBuffer = xhr.response;

                    // Trích xuất văn bản từ tệp Word và hiển thị
                mammoth.extractRawText({ arrayBuffer: arrayBuffer })
                .then(displayResult)
                .catch(handleError);
            } else {
                console.error('Lỗi khi tải tệp Word.');
            }
        };

        xhr.send();
    }

    function displayResult(result) {
        var wordViewer = document.getElementById('wordViewer');
        wordViewer.innerHTML = result.value;
    }

    function handleError(error) {
        console.error('Đã xảy ra lỗi:', error);
    }
    function goBack(){
        window.history.back();
    }
</script>
<script type="text/javascript">

    function toggleComments() {
        var commentsContainer = document.getElementById('commentsContainer');
        commentsContainer.style.display = commentsContainer.style.display === 'none' ? 'block' : 'none';
    }


    function loadComments() {
    // Hiển thị overlay
        $("#commentOverlay").show();

    // Sử dụng Ajax để tải nội dung bình luận từ máy chủ và hiển thị trong #existingComments
        $.ajax({
        url: '../view/load_comments.php', // Đường dẫn đến trang PHP xử lý bình luận
        type: 'GET',
        dataType: 'html',
        success: function (response) {
            $("#existingComments").html(response);
        },
        error: function (error) {
            console.error('Lỗi khi tải nội dung bình luận:', error);
        }
    });
    }
   

    function submitComment() {
    // Lấy nội dung bình luận từ ô nhập
        var commentInput = $("#commentInput");
        var commentText = commentInput.val();

        if (commentText.trim() !== '') {
        // Gửi dữ liệu bình luận đến máy chủ bằng Ajax
            $.ajax({
            url: '../view/submit_comment.php', // Đường dẫn đến trang PHP xử lý gửi bình luận
            type: 'POST',
            data: { comment: commentText },
            success: function (response) {
                // Nếu gửi thành công, cập nhật nội dung bình luận
                $("#existingComments").append(response);

                // Xóa nội dung trong ô nhập sau khi gửi bình luận
                commentInput.val('');
            },
            error: function (error) {
                console.error('Lỗi khi gửi bình luận:', error);
            }
        });
        }
    }
    function closeOverlay() {
    // Ẩn overlay
        $("#commentOverlay").hide();
    }




</script>



<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="script.js"></script>
</body>
</html>
