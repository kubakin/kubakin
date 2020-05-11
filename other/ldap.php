
<?php

// используется ldap-привязка
$ldaprdn  = 'pogudin';     // ldap rdn или dn
$ldappass = 'Mei8po4s';  // ассоциированный пароль

// соединение с сервером
$ldapconn = ldap_connect("ldaps://ldap.cs.prv");
    echo($ldapconn);
   // echo 'hi';
if ($ldapconn) {

    // привязка к ldap-серверу
    $ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);

    // проверка привязки
    if ($ldapbind) {
        echo "LDAP-привязка успешна...";
    } else {
        echo "LDAP-привязка не удалась...";
    }

}

?>
