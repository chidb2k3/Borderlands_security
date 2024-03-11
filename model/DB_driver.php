<?php 
// Thư Viện Xử Lý Database
include_once("PhongBan.php");
include_once("CanBo.php");
class DB_driver
{
    // Biến lưu trữ kết nối
    private $__conn;
     
    // Hàm Kết Nối
    function connect()
    {
        // Nếu chưa kết nối thì thực hiện kết nối
        if (!$this->__conn){
            // Kết nối
            $this->__conn = mysqli_connect('localhost', 'root', '', 'nhansu') or die ('Lỗi kết nối');
 
            // Xử lý truy vấn UTF8 để tránh lỗi font
            mysqli_query($this->__conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
        }
    }
 
    // Hàm Ngắt Kết Nối
    function dis_connect(){
        // Nếu đang kết nối thì ngắt
        if ($this->__conn){
            mysqli_close($this->__conn);
        }
    }
 
    // Hàm Insert
    function insert($table, $data)
    {
        // Kết nối
        $this->connect();
 
        // Lưu trữ danh sách field
        $field_list = '';
        // Lưu trữ danh sách giá trị tương ứng với field
        $value_list = '';
 
        // Lặp qua data
        foreach ($data as $key => $value){
            $field_list .= ",$key";
            $value_list .= ",'".mysql_escape_string($value)."'";
        }
 
        // Vì sau vòng lặp các biến $field_list và $value_list sẽ thừa một dấu , nên ta sẽ dùng hàm trim để xóa đi
        $sql = 'INSERT INTO '.$table. '('.trim($field_list, ',').') VALUES ('.trim($value_list, ',').')';
 
        return mysqli_query($this->__conn, $sql);
    }
 
    // Hàm Update
    function update($table, $data, $where)
    {
        // Kết nối
        $this->connect();
        $sql = '';
        // Lặp qua data
        foreach ($data as $key => $value){
            $sql .= "$key = '".mysql_escape_string($value)."',";
        }
 
        // Vì sau vòng lặp biến $sql sẽ thừa một dấu , nên ta sẽ dùng hàm trim để xóa đi
        $sql = 'UPDATE '.$table. ' SET '.trim($sql, ',').' WHERE '.$where;
 
        return mysqli_query($this->__conn, $sql);
    }
 
    // Hàm delete
    function remove($table, $where){
        // Kết nối
        $this->connect();
         
        // Delete
        $sql = "DELETE FROM $table WHERE $where";
        return mysqli_query($this->__conn, $sql);
    }
 
    // Hàm lấy danh sách
    function get_list($sql)
    {
        // Kết nối
        $this->connect();
         
        $result = mysqli_query($this->__conn, $sql);
 
        if (!$result){
            die ('Câu truy vấn bị sai');
        }
 
        $return = array();
 
        // Lặp qua kết quả để đưa vào mảng
        while ($row = mysqli_fetch_assoc($result)){
            $return[] = $row;
        }
 
        // Xóa kết quả khỏi bộ nhớ
        mysqli_free_result($result);
 
        return $return;
    }
 
    // Hàm lấy 1 record dùng trong trường hợp lấy chi tiết tin
    function get_row($sql)
    {
        // Kết nối
        $this->connect();
         
        $result = mysqli_query($this->__conn, $sql);
 
        if (!$result){
            die ('Câu truy vấn bị sai');
        }
 
        $row = mysqli_fetch_assoc($result);
 
        // Xóa kết quả khỏi bộ nhớ
        mysqli_free_result($result);
 
        if ($row){
            return $row;
        }
 
        return false;
    }
    function themCanBo($canBo){
         $this->connect();
         $sql = "INSERT INTO canbo(hoTen,ngaySinh,gioiTinh,diaChi,soDT,email) VALUES('$canBo->hoTen','$canBo->ngaySinh','$canBo->gioiTinh','$canBo->diaChi','$canBo->soDT','$canBo->email')";
          mysqli_query($this->__conn, $sql);


         $dsCanBo = $this->get_list("SELECT * FROM canbo  ORDER BY maCB DESC  LIMIT 1");
         $maCB=$dsCanBo[0]['maCB'];
         $sql = "INSERT INTO hosocanbo(maCB,maCV,maPB) VALUES('$maCB',1,1)";
           mysqli_query($this->__conn, $sql);
            $sql = "INSERT INTO bangluong(maCB) VALUES('$maCB')";
           mysqli_query($this->__conn, $sql);

    }
     function updateHoSo($hoSo, $maHS){
         $this->connect();
         $sql = "UPDATE hosocanbo SET maCV = '$hoSo->maCV', maPB = '$hoSo->maPB', trinhDo = '$hoSo->trinhDo', ngayVao = '$hoSo->ngayVao', ngayRa = '$hoSo->ngayRa', lyDo = '$hoSo->lyDo', tailieu = '$hoSo->taiLieu' where maHS = $maHS ";
        
        return  mysqli_query($this->__conn, $sql);


    }
    function updateBangLuong($luong, $maLuong){
         $this->connect();
         $sql = "UPDATE bangluong SET maCB = '$luong->maCB', thang = '$luong->thang', nam = '$luong->nam', luongCoBan = '$luong->luongCoBan', tienThuong = '$luong->tienThuong', tienPhat = '$luong->tienPhat', heSoLuong = '$luong->heSoLuong', tienLuong = '$luong->tienLuong', luongThucNhan='$luong->luongThucNhan' where maLuong = $maLuong ";
        
        return  mysqli_query($this->__conn, $sql);


    }
   
     function updateCanBo($canBo, $maCB){
         $this->connect();
         $sql = "UPDATE canbo SET hoTen = '$canBo->hoTen', ngaySinh = '$canBo->ngaySinh', gioiTinh = '$canBo->gioiTinh', diaChi = '$canBo->diaChi', soDT = '$canBo->soDT', email = '$canBo->email', username = '$canBo->username',
         password = '$canBo->password', role = '$canBo->role' where maCB = $maCB ";
        
        return  mysqli_query($this->__conn, $sql);


    }
     function updatePhongBan($phongBan, $maPB){
         $this->connect();
         $sql = "UPDATE phongban SET tenPB = '$phongBan->tenPB', diaChi = '$phongBan->diaChi', sDT = '$phongBan->sDT', email = '$phongBan->email' where maPB = $maPB ";
        
        return  mysqli_query($this->__conn, $sql);


    }
     function updateChucVu($chucVu, $maCV){
         $this->connect();
         $sql = "UPDATE chucVu SET tenCV = '$chucVu->tenCV' where maCV = $maCV ";
        
        return  mysqli_query($this->__conn, $sql);


    }
     function themPhongBan($phongBan){
         $this->connect();
         $sql = "INSERT INTO phongban(tenPB,diaChi,sDT,email) VALUES('$phongBan->tenPB','$phongBan->diaChi','$phongBan->sDT','$phongBan->email')";
 
        return mysqli_query($this->__conn, $sql);
    }
    function themChucVu($chucVu){
         $this->connect();
         $sql = "INSERT INTO chucvu(tenCV) VALUES('$chucVu->tenCV')";
 
        return mysqli_query($this->__conn, $sql);
    }

// Xứ lý lỗi khi thêm khóa ngoại. Đây Vinh nha!!!!!!!!
    function updatemaCV($maCV){
         $this->connect();
         $sql = "UPDATE hosocanbo SET maCV = 1 where maCV = $maCV ";
        
        return  mysqli_query($this->__conn, $sql);

    }
    function updatemaPB($maPB){
         $this->connect();
         $sql = "UPDATE hosocanbo SET maPB = 1 where maPB = $maPB ";
        
        return  mysqli_query($this->__conn, $sql);

    }
    function delBangLuong($maCB){
          $this->connect();
         $sql = "DELETE from bangluong where maCB = $maCB ";
        
        return  mysqli_query($this->__conn, $sql);

    }
     function delBinhLuan($maCB){
          $this->connect();
         $sql = "DELETE from binhluan where idCanBo = $maCB ";
        
        return  mysqli_query($this->__conn, $sql);

    }
    function delHoSo($maCB){
          $this->connect();
         $sql = "DELETE from hosocanbo where maCB = $maCB ";
        
        return  mysqli_query($this->__conn, $sql);

    }
    function themHoSo($tenFileHoSo, $idLoaiHoSo){
        $this->connect();
        $sql = "INSERT INTO `filehoso` (`idFileHoSo`, `tenFileHoSo`, `idLoaiHoSo`) VALUES (NULL, '$tenFileHoSo', '$idLoaiHoSo')";
        return mysqli_query($this->__conn, $sql);
    }
    function themBinhLuan($idFileHoSo,$noiDung,$idCanBo){
        $this->connect();
        $sql = "INSERT INTO `binhluan` (`id`, `idFileHoSo`, `noiDung`, `idCanBo`) VALUES (NULL, '$idFileHoSo', '$noiDung', '$idCanBo');";
        return mysqli_query($this->__conn, $sql);
    }
    function dsBinhLuan($ma){
      
        $sql = "SELECT * FROM `binhluan` WHERE idFileHoSo = {$ma}";
        return $this->get_list($sql);
    }
    function getName($ma){
      
        $sql = "SELECT * FROM `canbo` WHERE maCB = {$ma}";
        return $this->get_list($sql);
    }
    function addTL($maHS, $idLoaiHoSo){
         $this->connect();
         $sql = "INSERT INTO tailieu_loai(maHS, idLoaiHoSo) VALUES('$maHS', '$idLoaiHoSo')";
 
        return mysqli_query($this->__conn, $sql);
    }
    function delTL($maHS, $idLoaiHoSo){
          $this->connect();
         $sql = "DELETE from tailieu_loai where maHS = $maHS AND idLoaiHoSo = $idLoaiHoSo ";
        
        return  mysqli_query($this->__conn, $sql);

    }
     function TonTai($maHS,$idLoaiHoSo){
      
        $sql = "SELECT * FROM `tailieu_loai` WHERE maHS = {$maHS} AND idLoaiHoSo ={$idLoaiHoSo}";
         return $this->get_list($sql);
    }

   
   
   

}
// $test = new DB_driver();
// $a=$test->get_row("SELECT * FROM canbo");
// echo $a['hoTen'];
// $cb = new CanBo("Hehe","28/03/2003","Nam","VN",113,"dangbachi345@gmail.com");
// $test->themCanBo($cb);



 ?>