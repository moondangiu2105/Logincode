<?php
// Thiết lập thông tin kết nối đến database của bạn
$servername = "database-sever-lab7.cd8amsa0qz1i.us-east-1.rds.amazonaws.com"; // Endpoint RDS của bạn
$username_db = "ThiHai";                                                        // Master username RDS của bạn
$password_db = "Thihai2105";                                                      // Mật khẩu RDS của bạn
$dbname = "myDB";

// Tạo kết nối đến database
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Kiểm tra nếu form đã submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy giá trị từ form
    $user_input = $_POST["username"];
    $pass_input = $_POST["password"];

    // Truy vấn lấy dữ liệu từ database
    $sql = "SELECT * FROM User WHERE userName='$user_input' AND password='$pass_input'";
    $result = $conn->query($sql);

    // Kiểm tra số lượng bản ghi trả về
    if ($result->num_rows > 0) {
        // Nếu có, đăng nhập thành công
        echo "Bạn đã đăng nhập thành công";
    } else {
        // Nếu không, đăng nhập không thành công
        echo "Bạn đã đăng nhập không thành công";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
</head>
<body>
    <h2>Đăng nhập</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Tên đăng nhập:</label>
        <input type="text" name="username"><br><br>
        <label>Mật khẩu:</label>
        <input type="password" name="password"><br><br>
        <input type="submit" value="Đăng nhập">
    </form>
</body>
</html>
