<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Main View</title>
	<?php echo link_tag('css/theme/jquery.ui.theme.css') ?>
	<?php echo link_tag('css/theme/jquery-ui.css') ?>
	<?php echo link_tag('css/jquery.dataTables_themeroller.css') ?>
	<?php echo link_tag('css/main.css') ?>
	<script src="<?php echo base_url('js/jquery.min.js') ?>"></script>
	<script src="<?php echo base_url('js/jquery-ui.custom.min.js') ?>"></script>
	<script src="<?php echo base_url('js/jquery.dataTables.min.js') ?>"></script>
	<script src="<?php echo base_url('js/jquery.jeditable.mini.js') ?>"></script>
	<script src="<?php echo base_url('js/main.js') ?>"></script>
</head>
<body>
	<div id="background-header">
		<div id="container">
			<div id="header">
				<h1>Catalogue</h1>
				<span id="tagline">A[nother] sample project</span>
			</div>
			<div id="content">
				<div id="productlist">
					<h2>Product List</h2>
					<table id="products">
						<thead>
							<tr>
								<th>No.</th>
								<th>Code</th>
								<th>Description</th>
								<th>Price</th>
								<th>Category</th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="4" class="dataTables_empty">Loading data...</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="spacer">&nbsp;</div>
				<div id="addproducts">
					<h2>Add New Product</h2>
					<form>
					<table cellspacing="5">
						<tr>
							<td>Code</td>
							<td>:</td>
							<td><input type="text" id="code" name="code" maxlength="5" /></td>
						</tr>
						<tr>
							<td>Description</td>
							<td>:</td>
							<td><input type="text" id="description" name="description" maxlength="100" /></td>
						</tr>
						<tr>
							<td>Price</td>
							<td>:</td>
							<td><input type="text" id="price" name="price" maxlength="13" /></td>
						</tr>
						<tr>
							<td>Category</td>
							<td>:</td>
							<td><select id="category_code" name="category_code"></select></td>
						</tr>
						<tr>
							<td colspan="2">&nbsp;</td>
							<td><button type="submit">Save Product Data</button></td>
						</tr>
					</table>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>