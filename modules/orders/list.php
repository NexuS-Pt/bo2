<?php
	$object_orders = new orders();
	$orders_list = $object_orders->returnAllOrders();
?>
<h1 class="pageTitle">Lista de Encomendas</h1>
<div class="button-area">
	<a href="<?= $configuration["path-bo"] ?>/0/orders/0/list" class="green"><i class="fa fa-plus"></i></a>
</div>
<table class="db-list">
	<tr>
		<th>#</th>
		<th>Utilizador</th>
		<th>Data</th>
		<th>Estado</th>
		<th>Sel.</th>
	</tr>
	<?php
	foreach ($orders_list as $order) {
		if ($order["status"]) {
			$published = "<img src=\"{c2r-path-bo}/site-assets/images/icon_on.png\" alt=\"on\" />";
		} else {
			$published = "<img src=\"{c2r-path-bo}/site-assets/images/icon_off.png\" alt=\"off\" />";
		}
		
		$object_user = new user();
		$object_user->setId($order["user_id"]);
		$user = $object_user->returnOneUser();
		
		print str_replace(
			array(
				"{c2r-id}",
				"{c2r-user-name}",
				"{c2r-date-update}",
				"{c2r-published}",
				"{c2r-path-bo}",
				"{c2r-confirm}"
			),
			array(
				$order["id"],
				$user["name"],
				$order["date_update"],
				$published,
				$configuration["path-bo"],
				$language["template"]["areyousure"]
			),
			file_get_contents("./modules/orders/templates-e/line.html")
		);
	}
	?>
</table>

<div class="button-area">
	<a href="<?= $configuration["path-bo"] ?>/0/orders/0/list" class="green"><i class="fa fa-plus"></i></a>
</div>
