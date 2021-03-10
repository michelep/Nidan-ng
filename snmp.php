<?php

//
// Questa procedura preleva dai routers, via SNMP, l'elenco degli indirizzi IP connessi
//

include_once __DIR__."/common.inc.php";

$result = doQuery("SELECT INET_NTOA(IP) AS IP FROM Routers WHERE isEnable=1;");
if($result) {
    // Cycle through results
    while ($row = $result->fetch_assoc()) {
	$router_ip = $row["IP"];
	echo "Walking on $router_ip...\n";
	// Get all MACs...
	$macResult = snmprealwalk($router_ip, "public", "IP-MIB::ipNetToMediaPhysAddress");
	if(count($macResult) > 0) {
	    foreach ($macResult as $key => $value) {
		if(preg_match('/^IP\-MIB::ipNetToMediaPhysAddress\.(\d+)\.(\d+\.\d+\.\d+\.\d+)/m', $key, $matches)) {
		    $ip = $matches[2];
		    // Extract MAC
		    if(preg_match('/STRING: ([0-9A-Fa-f]{1,2}:[0-9A-Fa-f]{1,2}:[0-9A-Fa-f]{1,2}:[0-9A-Fa-f]{1,2}:[0-9A-Fa-f]{1,2}:[0-9A-Fa-f]{1,2})/m', $value, $matches)) {
			$mac = $matches[1];
			echo "$ip - $mac\n";
			doQuery("INSERT IGNORE INTO Nodes(IP,MAC,routerIp,firstSeen) VALUES (INET_ATON('$ip'),'$mac',INET_ATON('$router_ip'),NOW()) ON DUPLICATE KEY UPDATE lastSeen=NOW();");
		    }
		}
	    }
	}
    }
}

?>
