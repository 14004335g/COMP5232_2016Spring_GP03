<?php
include('../db.php');
include('../vars.php');

global $mysqli;

// sql to create table
$sql = "DROP TABLE STOCK";
$result = $mysqli->query($sql);

$sql = "CREATE TABLE STOCK (ID BIGINT NOT NULL, DESCRIPTION TEXT, IMGSRC VARCHAR(255), PRICE INTEGER, QUAN INTEGER, TITLE VARCHAR(255), PRIMARY KEY (ID))";
$result = $mysqli->query($sql);

$sql = "DROP TABLE NEC_USER";
$result = $mysqli->query($sql);
$sql = "CREATE TABLE NEC_USER (USERNAME VARCHAR(255) NOT NULL, PW VARCHAR(255), EMAIL VARCHAR(255), SHIPPING_ADDRESS TEXT, PRIMARY KEY (USERNAME))";
$result = $mysqli->query($sql);

if ($result) {
    echo "Table STOCK created successfully. ";
} else {
    echo "Error creating table! ";
}

// Populate the table
$prints = array(
//    array(1, "The NEC Express5800/R110h-1, an affordable yet powerful single-socket 1U rack server, delivers essential server features, flexibility, and enterprise-class reliability in a small footprint. Supporting high-performance Intel Xeon E3-1200 v5 product family and NEC's innovative green technology, the R110h-1 is ideal for small businesses, corporate data center and hosting service providers to provide Web service, file, security and system management.", 'r110h-1_400x400.jpg', 9000, 1, 'Express5800/R110h-1'),
//    array(2, "The Express5800/R120f-1E, a high-density dual-socket 1U rack server, offers outstanding performance, scalability, and simplified manageability. Supporting the new high-performance and energy efficient Intel Xeon E5-2600 v3 product family, high speed DDR4-2133, and a 12Gb/s SAS drives, the R120f-1E is ideal for the most demanding applications such as internet hosting services, virtualization solutions, and mid-size database servers.", 'r120f-1e_400x400.jpg', 18000, 1, 'Express5800/R120f-1E'),
//    array(3, "The Express5800/R120f-1M, a high-density dual-socket 1U rack server, offers outstanding performance, scalability, and simplified manageability. Supporting the new high-performance and energy efficient Intel® Xeon® E5-2600 v3 product family, high speed DDR4-2133, and a 12Gb/s SAS interface, the R120f-1M is ideal for the most demanding applications such as virtualization solutions, mid-size database servers, and high performance computing applications.", 'r120f-1m_400x400.jpg', 27000, 1, 'Express5800/R120f-1M'),
//    array(4, "The Express5800/R120f-2M, a scalable dual-socket 2U rack server, provides outstanding performance, scalability, and flexibility. Powered by the high performance and energy efficient Intel Xeon processor E5-2600 v3 product family, high speed DDR4-2133 memory, and  high performance 12Gb/s SAS drives, the R120f-2M is ideal for the most demanding applications such as virtualization solutions and large database servers.", 'r120f-2m_400x400.jpg', 27000, 1, 'Express5800/R120f-2M'),
//    array(5, "The Express5800/R120f-2E, a flexible dual-socket 2U rack server, offers the right balance of performance, scalability, and manageability in a compact chassis. Supporting the new highperformance and energy efficient Intel Xeon E5-2600 v3 product family, large storage and memory capability, and high-performance RAID controller supporting large cache memory and 12Gb/s SAS interface, the R120f-2E is ideal for virtualization solutions, database servers, and consolidation of business-critical application servers.", 'r120f-2e_400x400.jpg', 18000, 1, 'Express5800/R120f-2E'),
//    array(6, "The Express5800/R120f-2E, a cost-effective dual-socket 2U rack server, is a right-sized server with the performance, expandability, and reliability to meet the requirements of storage-intensive workloads. Combining the new high-performance and energy efficient Intel Xeon E5-2600 v3 product family, large memory and storage capacity, and high performance RAID controller supporting large cache memory and 12 Gbps SAS interface, the R120f-2E is suitable for network attached storage and data backup servers.", 'r120f-2es_400x400.jpg', 36000, 1, 'Express5800/R120f-2E - Storage-Rich')
    array(1, "The NEC Express5800/R110h-1, an affordable yet powerful single-socket 1U rack server, delivers essential server features, flexibility, and enterprise-class reliability in a small footprint. Supporting high-performance Intel Xeon E3-1200 v5 product family and NEC's innovative green technology, the R110h-1 is ideal for small businesses, corporate data center and hosting service providers to provide Web service, file, security and system management.", 'r110h-1_400x400.jpg', 9000, 1, 'Express5800/R110h-1'),
    array(2, "The NEC Express5800/T110h is an affordable yet powerful single socket tower server that delivers essential server features, high reliability and great flexibility in a compact design, making it an ideal server for SOHO, SMB, and branch offices of larger enterprises. NEC’s excellent build quality and innovative green technology design allows for high operating temperatures whilst maintaining its high reliability.", 't110h_400x400.jpg', 18000, 1, 'Express5800/T110h'),
    array(3, "The Express5800/R320e is a dual-socket fault tolerant server developed with Intel’s latest Xeon processors. The R320e provides exceptional high availability, affordability, and operational simplicity through its fully redundant modular hardware design featuring high-performance processors. These fault tolerant servers are ideal for customers who require to eliminate planned and unplanned downtime for the most important applications.", 'r320e-400x400.jpg', 18000, 1, 'Express5800/R320e '),
    array(4, "The Express5800/B120e-h is a high-density dual-socket blade server developed with Intel’s® latest Xeon® processors. The B120e-h provides exceptional performance, scalability and availability through its high-performance processors and vast amounts of memory while providing its customers with flexible storage connectivity capabilities. These blade servers are ideal for customers whose server virtualization solutions require high bandwidth I/O’s.", 'b120e-h_400x400.jpg', 18000, 1, 'Express5800/B120e-h'),
    array(5, "The Express5800/E120f-M, a dual-socket modular server, offers superior performance, scalability and high-density mounting capability. Supporting the latest Intel® Xeon® Processor E5-2600 v3 product family, high speed DDR4-2133 memory and high performance 12Gb/s SAS interface, the E120f-M is ideal for most demanding data center applications and high performance computing applications requiring computing power and data center space optimization.", 'e120f-m_400x400.jpg', 18000, 1, 'Express5800/E120f-M'),
    array(6, "NEC’s Express5800/A2000 Series is an enterprise-class 4-socket 4U server based on the Intel® Xeon® Processor E7 v3 Family. The server represents a new generation of mission critical servers built specifically to support highly virtualized environments, heavy transactional workloads, and in-memory databases.", 'a1040b_400x400.jpg', 18000, 1, 'Express5800/A2000 Series')

);

foreach ($prints as $print) {
    $desc = str_replace("'", "''", $print[1]);
    $rc = $mysqli->query("INSERT INTO stock (id,  description, imgsrc, price, quan, title) VALUES ( {$print[0]}, '${desc}' , '{$print[2]}', {$print[3]}, {$print[4]}, '{$print[5]}' )");
    if ($rc) {
        print "Insert succeded. ";
    } else print "Insert failed! ";
}

$rc = $mysqli->query("INSERT INTO NEC_USER (USERNAME, PW, EMAIL, SHIPPING_ADDRESS) VALUES ( 'Carl', '123456', '14004312g@connect.polyu.hk', 'POLYU')");

if ($rc) {
    print "Create user succeded. ";
} else print "Create user failed! ";

$mysqli->close();
?>
