<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'shopper';

// Mở kết nối
$conn = mysqli_connect($server, $username, $password, $database);

// Kiểm tra lỗi
if (!$conn) {
	die("Kết nối thất bại: " . mysqli_connect_error()); 
}

// Hàm định dạng tiền tệ
function formatCurrency($curr){
	$fmt = numfmt_create("vi_VN", NumberFormatter::CURRENCY);
	return numfmt_format_currency($fmt, $curr, "VND");
}

// Hàm định dạng số
function formatNumber($num, $decimal){
	return number_format($num, $decimal, ',', '.'); // Định dạng kiểu thập phân là dấu <,>
}

function getConnection(){
    global $hosting, $username, $password, $database;
    $cnn = new mysqli($hosting, $username, $password, $database);
    if($cnn->error){
        die("Lỗi kết nối"); 
    }
    return $cnn;
}

// CRUD: Create = Insert / Read = Select / Update = Update / Delete = Delete

function selectData($sql){
    $connect = getConnection();
    $result = $connect->query($sql);
    return $result;
}


// Hàm thực hiện cập nhật dữ liệu (thêm,sửa,xóa)
function insertOrUpdate($sql){
    $connect = getConnection();
    $isOk = false;
    try {
        $isOk = $connect->query($sql);       
    } catch (Exception $e) {
        echo "Lỗi: " . $e->getMessage();
    }
    return $isOk;
}

?>