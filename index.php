<?php

include __DIR__."/header.inc.php";

?>
<div class="list-group">
<?php
$result = doQuery("SELECT ID,INET_NTOA(IP)AS IP,MAC,INET_NTOA(routerIp) AS routerIp,lastSeen,firstSeen FROM Nodes ORDER BY lastSeen DESC LIMIT 20;");
if($result) {
    // Cycle through results
    while ($row = $result->fetch_assoc()) {
	$id = $row["ID"];
	$ip = $row["IP"];
	$mac = $row["MAC"];
	$router_ip = $row["routerIp"];
	$first_seen = new DateTime($row["firstSeen"]);
	if(!is_null($row["lastSeen"])) {
	    $last_seen = new DateTime($row["lastSeen"]);
	} else {
	    $last_seen = false;
	}
?>	
	<a href="#" class="list-group-item list-group-item-action ajax-dialog" data-id=<?php echo "ip-$id"; ?> aria-current="true">
	    <div class="d-flex w-100 justify-content-between">
    		<h5 class="mb-1"><?php echo $ip; ?></h5>
    		<small><?php echo gethostbyaddr($ip); ?></small>
	    </div>
	    <p class="mb-1"><?php echo $mac; ?></p>
	    <small>First seen on <?php echo $first_seen->format('H:i:s d-m-Y'); ?>, last <?php echo $last_seen->format('H:i:s d-m-Y'); ?></small>
	</a>
<?php
    }
    // Free result set
    $result->close();
}
?>
</div>
<?php

include __DIR__."/footer.inc.php";

?>