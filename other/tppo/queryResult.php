<?

$link = mysqli_connect("127.0.0.1", "daniapog", "qwerty123", "testdb");
$link->set_charset("utf8");
$link ->query("CREATE TABLE if not exists result(id INT PRIMARY KEY AUTO_INCREMENT NOT NULL, uidStud char(30) NOT NULL, uid char(30) NOT NULL, PRIMARY KEY(uid));");


?>