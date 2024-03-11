<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Hồ sơ Trinh sát</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mammoth/1.0.1/mammoth.browser.min.js"></script>
    <style>

       .card {
        border: 1px solid #ddd;
        padding: 15px;
        margin: 10px;
        text-align: center;
    }
    .profile-container {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        width: 300px;
        padding: 20px;
        text-align: center;
    }

    .file-list {
        margin-top: 20px;
    }

    .file-list a {
        display: block;
        margin-bottom: 10px;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
    }

    .upload-btn-wrapper {
        margin-top: 20px;
        overflow: hidden;
        display: inline-block;
    }

    .btn {
        border: 2px solid gray;
        color: gray;
        background-color: white;
        padding: 8px 20px;
        border-radius: 8px;
        font-size: 20px;
        font-weight: bold;
    }

    .upload-btn-wrapper input[type=file] {
        font-size: 100px;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
    }

    #uploadForm {
        display: none;
        margin-top: 20px;
    }

    #uploadForm label {
        margin-right: 10px;
    }
    #uploadModal {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        z-index: 2;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
        text-align: center;
    }

    #uploadModal h3 {
        color: #007bff;
        margin-bottom: 20px;
    }

    #uploadModal input[type="file"] {
        margin-bottom: 10px;
    }

    #uploadModal button {
        background-color: #007bff;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    #uploadModal button:hover {
        background-color: #0056b3;
    }

    #uploadModal .close-btn {
        background-color: #ccc;
        color: #333;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    #uploadModal .close-btn:hover {
        background-color: #999;
    }

</style>
</head>
<body>
    <?php if (isset($_SESSION['you'])) {
        if ($_SESSION['you']['role']==1) {
            include("menu.php");
        }else{
            include("menu2.php");
        }
    } ?>
    <?php 
    if ($_SESSION['you']['role']==1) {
        echo '<div>
        <table border="1" width="100%" style="text-align: center;" cellpadding="10" >
        <tr>
        <td> <a href="?ma=1&cv=pL" style="color: #000000; font-size: 17px; text-decoration: none;">Danh Sách Phòng Trinh Sát</a></td>
        <td><a href="?ma=2&cv=pL" style="color: #000000; font-size: 17px; text-decoration: none;">Hồ Sơ Nội Biên</a></td>
        <td><a href="?ma=4&cv=pL"  style="color: #000000; font-size: 17px; text-decoration: none;">Hồ Sơ Ngoại Biên</a></td>
        <td><a href="?ma=5&cv=pL" style="color: #000000; font-size: 17px; text-decoration: none;">Đội Trinh Sát Cơ Động</a></td>
        </tr>
        </table>
        </div>';
    }

    ?>
    

    <div>

        <div class="profile-container" style="float: left; margin-right: 3%; "><img src="">

            <?php if ($_SESSION['you']['role']==1) {

                echo '
                <button href="javascript:void(0);" onclick="taiFileLen()"><img style="height: 40px; width: 50px;" src="../users/img-btn/tailen.png"></button>


                <div id="taiFileLen" style="text-align: left;">
                <button  onclick="dongTaiFileLen()"><img src="../users/img-btn/dong.png" style="width: 20px; height: 20px;"  ></button>
                <form action="../word/upload.php" method="post" enctype="multipart/form-data">
                <label>Chọn File:</label>
                <input type="file" id="fileInput" name="file" accept=".docx, .pdf"><!-- Có thể sử dụng accept để giới hạn loại file được chấp nhận -->
                <br>
                <label>Loại hồ sơ: </label>
                <select name="idLoaiHoSo" id="fileType">
                <option value="1">Danh Sách Phòng Trinh Sát</option>
                <option value="2">Hồ Sơ Nội Biên</option>
                <option value="4">Hồ Sơ Ngoại Biên</option>
                <option value="5">Đội Trinh Sát Cơ Động</option>
                </select><br>
                <input type="submit" value="Tải lên">
                </form>

                </div>';
            }?>
            
        </div> 
        <br>
        <form action="" method="GET">
            <input style="width: 1px;"  type="" name="ma" value="<?php if (isset($_GET['ma'])) {
                echo $_GET['ma'];
            } ?>">
            <input size="24" disabled type="" name="" value="<?php if (isset($_GET['ma'])) {
               $o=$_GET['ma'];
               if ($o==1) {
                    echo "Danh Sách Phòng Trinh Sát";
                }else{
                    if ($o==2) {
                        echo "Hồ Sơ Nội Biên";
                    }else{
                        if ($o==4) {
                            echo "Hồ Sơ Ngoại Biên";
                        }else{
                            if ($o==5) {
                                 echo "Đội Trinh Sát Cơ Động";
                            }else{
                                echo "Tất cả hồ sơ";
                            }
                           
                        }
                    }
                }
            }else{
                echo "Tất cả hồ sơ";
            } ?>">
           <input size="1" type="" disabled name="soluong" value="SL:<?php echo $soluong; ?>">
            <input size="30" style="margin-left: 15%;" type="text" name="tukhoa" placeholder="Tìm kiếm hồ sơ" 
            value="<?php if (isset($_GET['tukhoa'])) {
                echo $_GET['tukhoa'];
            } ?>">
            <button type="submit" name="cv" value="<?php echo $_GET['cv']; ?>">Tìm kiếm</button>
           
        </form>
        <hr>

        <div style="margin-top: 5%;">

           







        <?php 
        if (isset($a)) {
            // code...


            for ($i=0; $i <sizeof($a) ; $i++) { 

               if ($a[$i]==1) {?><div>
                <h5 style="margin-left: 10%; margin-top: 20px; color: red; font-family: 'Garamond', sans-serif;"><?php 
                echo 'Danh Sách Phòng Trinh Sát';
            ?></h5>
            <div style="margin-left: 10%; overflow: auto; max-height: 450px;  border: 1px solid #000; padding: 5px;  text-align: left; margin-right: 4%;"  >
                <table>
                  <?php

    // Hiển thị danh sách hồ sơ
                  if (count($dsHoSo[$i]) > 0) {
                    $ds=$dsHoSo[$i];
                    $sl=count($dsHoSo[$i]);
                    $row = floor(count($dsHoSo[$i])/3)+1 ;

                    for ($r=0; $r < $row; $r++) { 
                        ?><tr><?php
                        for ($k=0; $k <3 ; $k++) { 
                            $index = $r * 3 + $k;
                            if ($index<$sl) {
                                ?>
                                <td style="width: 30%;">
                                    <div class="card">
                                        <div style="text-align: center;"><img style=" max-width: 100%; height: 150px;" src="../img/<?php $duoi=substr($ds[$index]['tenFileHoSo'], -3); if ($duoi=="pdf") {
                                            echo "pdf";
                                        }else{
                                            echo "word";
                                        } ?>.png" alt="Ảnh đại diện 1"></div>

                                        <h6> <a href="?cv=read&idFile=<?php echo $ds[$index]['idFileHoSo'] ?>&tenFile=<?php echo $ds[$index]['tenFileHoSo']; ?>"><?php echo $ds[$index]['tenFileHoSo']; ?></a></h6>
                                        
                                        <p>
                                            <a href="#" onclick="downloadFile('<?php echo $ds[$index]['tenFileHoSo']; ?>')"> <img style="height: 25px; width: 25px;" src="../users/img-btn/download.png"> </a>
                                        <?php if ($_SESSION['you']['role']==1){
                                            echo '<a href="?cv=xoaFile&id='.$ds[$index]['idFileHoSo'].'&tenFile='.$ds[$index]['tenFileHoSo'].'"><img style="height: 25px; width: 25px;" src="../users/img-btn/del.png"></a>';
                                        } ?>
                                        </p>
                                    </div>
                                </td>
                                <?php
                            }

                        }

                    ?></tr>
                    <?php
                }?> </table> <?php
            } else {
                echo 'Không có hồ sơ nào.';
                 echo '<table></table>';
            }
            ?>
        </div></div>


    <?php }


    if ($a[$i]==2) {?><div>
       <h5 style="margin-top: 20px; color: red; font-family: 'Garamond', sans-serif;margin-left: 10%;"><?php 
        echo 'Danh Sách Nội Biên';
    ?></h5>
   <div style="margin-left: 10%; overflow: auto; max-height: 450px;  border: 1px solid #000; padding: 5px;  text-align: left; margin-right: 4%;"  >
                <table>
                  <?php

    // Hiển thị danh sách hồ sơ
                  if (count($dsHoSo[$i]) > 0) {
                    $ds=$dsHoSo[$i];
                    $sl=count($dsHoSo[$i]);
                    $row = floor(count($dsHoSo[$i])/3)+1 ;

                    for ($r=0; $r < $row; $r++) { 
                        ?><tr><?php
                        for ($k=0; $k <3 ; $k++) { 
                            $index = $r * 3 + $k;
                            if ($index<$sl) {
                                ?>
                                <td style="width: 30%;">
                                    <div class="card">
                                        <div style="text-align: center;"><img style=" max-width: 100%; height: 150px;" src="../img/<?php $duoi=substr($ds[$index]['tenFileHoSo'], -3); if ($duoi=="pdf") {
                                            echo "pdf";
                                        }else{
                                            echo "word";
                                        } ?>.png" alt="Ảnh đại diện 1"></div>

                                        <h6> <a href="?cv=read&idFile=<?php echo $ds[$index]['idFileHoSo'] ?>&tenFile=<?php echo $ds[$index]['tenFileHoSo']; ?>"><?php echo $ds[$index]['tenFileHoSo']; ?></a></h6>
                                        
                                        <p>
                                            <a href="#" onclick="downloadFile('<?php echo $ds[$index]['tenFileHoSo']; ?>')"> <img style="height: 25px; width: 25px;" src="../users/img-btn/download.png"> </a>
                                        <?php if ($_SESSION['you']['role']==1){
                                            echo '<a href="?cv=xoaFile&id='.$ds[$index]['idFileHoSo'].'&tenFile='.$ds[$index]['tenFileHoSo'].'"><img style="height: 25px; width: 25px;" src="../users/img-btn/del.png"></a>';
                                        } ?>
                                        </p>
                                    </div>
                                </td>
                                <?php
                            }

                        }

                    ?></tr>
                    <?php
                }?> </table> <?php
            } else {
                echo 'Không có hồ sơ nào.';
                echo '<table></table>';
            }
            ?><table></table>
        </div></div>



<?php  }?>




<?php

if ($a[$i]==4) {?>
    <div>
        <h5 style="margin-top: 20px; color: red; font-family: 'Garamond', sans-serif;margin-left: 10%;"><?php 
        echo 'Danh Sách Ngoại Biên';
    ?></h5>

   <div style="margin-left: 10%; overflow: auto; max-height: 450px;  border: 1px solid #000; padding: 5px;  text-align: left; margin-right: 4%;"  >
                <table>
                  <?php

    // Hiển thị danh sách hồ sơ
                  if (count($dsHoSo[$i]) > 0) {
                    $ds=$dsHoSo[$i];
                    $sl=count($dsHoSo[$i]);
                    $row = floor(count($dsHoSo[$i])/3)+1 ;

                    for ($r=0; $r < $row; $r++) { 
                        ?><tr><?php
                        for ($k=0; $k <3 ; $k++) { 
                            $index = $r * 3 + $k;
                            if ($index<$sl) {
                                ?>
                                <td style="width: 30%;">
                                    <div class="card">
                                        <div style="text-align: center;"><img style=" max-width: 100%; height: 150px;" src="../img/<?php $duoi=substr($ds[$index]['tenFileHoSo'], -3); if ($duoi=="pdf") {
                                            echo "pdf";
                                        }else{
                                            echo "word";
                                        } ?>.png" alt="Ảnh đại diện 1"></div>

                                        <h6> <a href="?cv=read&idFile=<?php echo $ds[$index]['idFileHoSo'] ?>&tenFile=<?php echo $ds[$index]['tenFileHoSo']; ?>"><?php echo $ds[$index]['tenFileHoSo']; ?></a></h6>
                                        
                                        <p>
                                            <a href="#" onclick="downloadFile('<?php echo $ds[$index]['tenFileHoSo']; ?>')"> <img style="height: 25px; width: 25px;" src="../users/img-btn/download.png"> </a>
                                        <?php if ($_SESSION['you']['role']==1){
                                            echo '<a href="?cv=xoaFile&id='.$ds[$index]['idFileHoSo'].'&tenFile='.$ds[$index]['tenFileHoSo'].'"><img style="height: 25px; width: 25px;" src="../users/img-btn/del.png"></a>';
                                        } ?>
                                        </p>
                                    </div>
                                </td>
                                <?php
                            }

                        }

                    ?></tr>
                    <?php
                }?> </table> <?php
            } else {
                echo 'Không có hồ sơ nào.';
                 echo '<table></table>';
            }
            ?>
        </div></div>



<?php }


if ($a[$i]==5) {?><div>
    <h5 style="margin-top: 20px; color: red; font-family: 'Garamond', sans-serif;margin-left: 10%;"><?php 
    echo 'Đội Trinh Sát Cơ Động';
?></h5>
<div style="margin-left: 10%; overflow: auto; max-height: 450px;  border: 1px solid #000; padding: 5px;  text-align: left; margin-right: 4%;"  >
                <table>
                  <?php

    // Hiển thị danh sách hồ sơ
                  if (count($dsHoSo[$i]) > 0) {
                    $ds=$dsHoSo[$i];
                    $sl=count($dsHoSo[$i]);
                    $row = floor(count($dsHoSo[$i])/3)+1 ;

                    for ($r=0; $r < $row; $r++) { 
                        ?><tr><?php
                        for ($k=0; $k <3 ; $k++) { 
                            $index = $r * 3 + $k;
                            if ($index<$sl) {
                                ?>
                                <td style="width: 30%;">
                                    <div class="card">
                                        <div style="text-align: center;"><img style=" max-width: 100%; height: 150px;" src="../img/<?php $duoi=substr($ds[$index]['tenFileHoSo'], -3); if ($duoi=="pdf") {
                                            echo "pdf";
                                        }else{
                                            echo "word";
                                        } ?>.png" alt="Ảnh đại diện 1"></div>

                                        <h6> <a href="?cv=read&idFile=<?php echo $ds[$index]['idFileHoSo'] ?>&tenFile=<?php echo $ds[$index]['tenFileHoSo']; ?>"><?php echo $ds[$index]['tenFileHoSo']; ?></a></h6>
                                        
                                        <p>
                                            <a href="#" onclick="downloadFile('<?php echo $ds[$index]['tenFileHoSo']; ?>')"> <img style="height: 25px; width: 25px;" src="../users/img-btn/download.png"> </a>
                                        <?php if ($_SESSION['you']['role']==1){
                                            echo '<a href="?cv=xoaFile&id='.$ds[$index]['idFileHoSo'].'&tenFile='.$ds[$index]['tenFileHoSo'].'"><img style="height: 25px; width: 25px;" src="../users/img-btn/del.png"></a>';
                                        } ?>
                                        </p>
                                    </div>
                                </td>
                                <?php
                            }

                        }

                    ?></tr>
                    <?php
                }?> </table> <?php
            } else {
                echo 'Không có hồ sơ nào.';
                 echo '<table></table>';
            }
            ?>
        </div></div>


<?php } ?> 









<?php

}
}else{
    echo '<h1 align="center">HỒ SƠ RỖNG!!!!</h1>';
}
?>
</div>


</div>








<script>
    document.getElementById('taiFileLen').style.display = 'none'
    function taiFileLen() {
        document.getElementById('taiFileLen').style.display = 'block';
    }

    function dongTaiFileLen() {
        document.getElementById('taiFileLen').style.display = 'none';
    }
</script>


<script>
    function downloadFile(fileName) {
        // Thực hiện tải file, ví dụ: window.location.href = 'path/to/files/' + fileName;
        window.location.href = '../word/uploads/' + fileName;
        alert('Tải file: ' + fileName);
    }

</script>
<script>
        // Lấy giá trị tiêu đề "X-Message" từ HTTP headers
    var messageFromPHP = "<?php echo isset($_SESSION['thongbao']) ? $_SESSION['thongbao'] : ''; 
    unset($_SESSION['thongbao']);?>";

        // Hiển thị cảnh báo nếu có thông báo từ PHP
    if (messageFromPHP) {
        alert(messageFromPHP);
    }
</script>

</body>
</html>
