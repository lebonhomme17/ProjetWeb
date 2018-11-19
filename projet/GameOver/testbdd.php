<?php
//pour se connecter a partir de sqlplus : user/passwd@//ip:port/instance
//exemple : SYSTEM/root//127.0.0.1:1521 ou SYSTEM/root@127.0.0.1
//  pour executer un fichier sql a partir de sqlplus   @chemin\monfichier.sql pour
echo '<html><pre>';
$db = '';

$c1 = oci_connect("antoine", "azerty", $db);
$c2 = oci_new_connect("thibault", "Thibault", $db);

function create_table($conn)
{
  $stmt = oci_parse($conn,
  "create table tab4 (
        test1 varchar2(64),
        constraint pk_test1 primary key (test1)
   )"
  );
  oci_execute($stmt);
  echo $conn . " created table\n\n";
}

function drop_table($conn)
{
  $stmt = oci_parse($conn, "drop table tab4");
  oci_execute($stmt);
  echo $conn . " dropped table\n\n";
}

function insert_data($conn)
{
  $stmt = oci_parse($conn, "insert into tab4 (test1)
            values('test')");
  oci_execute($stmt, OCI_DEFAULT);
  echo $conn . " inserted tab3\n\n";
}

function delete_data($conn)
{
  $stmt = oci_parse($conn, "delete from tab3");
  oci_execute($stmt, OCI_DEFAULT);
  echo $conn . " deleted tab4\n\n";
}

function commit($conn)
{
  oci_commit($conn);
  echo $conn . " committed\n\n";
}

function rollback($conn)
{
  oci_rollback($conn);
  echo $conn . " rollback\n\n";
}

function select_data($conn)
{
  $stmt = oci_parse($conn, "select * from editor");
  oci_execute($stmt, OCI_DEFAULT);
  echo $conn . "----selecting\n\n";
  while (oci_fetch($stmt)) {
    echo $conn . " " . oci_result($stmt, "NAME") . "\n";
  }
  echo $conn . "----done\n\n";
}

select_data($c1);
?>