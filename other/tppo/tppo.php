<?php
//Программа для парсинга данных с лдап и создания таблиц staff, students
use phpDocumentor\Reflection\Types\Null_;

$link = mysqli_connect("127.0.0.1", "daniapog", "qwerty123", "testdb");
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
} 
$link->set_charset("utf8");
$link ->query("CREATE TABLE if not exists staff1(id char(30) NOT NULL,name char(255) NOT NULL, groups char(30) NOT NULL, PRIMARY KEY(id));");
$link ->query("CREATE TABLE if not exists students1(id char(30) NOT NULL,name char(255) NOT NULL, groups char(30) NOT NULL, PRIMARY KEY(id));");
//$link ->query("INSERT INTO stud2 (name, groups, uid) VALUES ('$test','$test1','$test2')");
$peoplePetrsu = '';
$massGroup = '';

/* Установка внутренней кодировки в UTF-8 */
mb_internal_encoding("UTF-8");
$massName = '';
$file = file_get_contents('studv3.txt');
$regexp = '#(?=dn::).+?(?=dn:)|(?=uid: )#s';
preg_match_all($regexp, $file, $peoplePetrsu);
foreach($peoplePetrsu[0] as $i) {
 //   echo $i;
    /*
    index:
    name=0
    group=1
    */
    $DataStr = base64_decode(preg_replace('/(dn::)|(uid:.+)/','',$i)); //Достаем все между дн и юид
    preg_match_all('/(?=uid: ).+/',$i,$uid); //достаем юид
    $str = explode(",", $DataStr); //разбиваем строку с данными
    if (substr($str[0],0,2) !='cn') { //если нет имени то след итерация
        continue;
    }
    $str[0] = str_replace('cn=','',$str[0]); //name достаем имя
    $str[1]= str_replace("ou=",'',$str[1]); //group достаем группу
    if ($str[1] != 'delete' && $uid[0][0] != "") //Если пользователь удален или у него нет юид то след итерация
        {
        echo $str[0].' from: '.$str[1].$uid[0][0].'<br>';
        //$hi = implode($uid[0][0]);
        $aoa =  str_replace('uid: ', '',$uid[0][0]);
        if ($str[1] == 'faculty' || $str[1] == 'visitors' || $str[1] == 'staff') {
        $link->query("INSERT INTO staff1 (name, groups, id) VALUES ('$str[0]','$str[1]','$aoa')");
       
    }
     else { 
        $link->query("INSERT INTO students1 (name, groups, id) VALUES ('$str[0]','$str[1]','$aoa')");
     }
    }
}
?>