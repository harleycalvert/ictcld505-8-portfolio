<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

$conn = oci_connect('ADMIN', 'NxO&JD3jeI9WA@DWZ(-b%s*jSaF%', 'tcps://adb.ap-melbourne-1.oraclecloud.com:1522/fe08fe09fa2f61e_pets_high.adb.oraclecloud.com?wallet_location=/opt/wallet');

if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'] ?? ''), E_USER_ERROR);
}
var_dump($conn);


// Parse the statement. Note there is no final semi-colon in the SQL statement
// https://www.php.net/manual/en/function.oci-parse.php
$stid = oci_parse($conn, 'SELECT * FROM ADMIN.ACCOUNTS');
if (!$stid) {
    $e = oci_error($conn);
    trigger_error(htmlentities($e['message'] ?? ''), E_USER_ERROR);
}
var_dump($stid);


// Define variables to store column values
oci_define_by_name($stid, 'USER_ID', $column1);
oci_define_by_name($stid, 'EMAIL', $column2);
oci_define_by_name($stid, 'PASSWORD', $column3);

oci_execute($stid);

// https://www.php.net/manual/en/function.oci-fetch-array.php
// Fetch and display results
echo "<table border='1'>\n";
while (oci_fetch($stid)) {
    echo "<tr>\n";
    echo "    <td>" . htmlentities($column1 ?? '') . "</td>\n";
    echo "    <td>" . htmlentities($column2 ?? '') . "</td>\n";
    echo "    <td>" . htmlentities($column3 ?? '') . "</td>\n";
    echo "</tr>\n";
}
echo "</table>\n";

oci_free_statement($stid);
oci_close($conn);

?>