$(document).ready(function() {
	// Variables
	var dtcategories = new Object(); // List of Categories (to be used with inplace editor)
	
	// Initialize jQuery buttons
	$("button").button();
	
	// Populate Category List
	$.getJSON("index.php/category/get", function(result) {
		var options;
		for (var i = 0; i < result.length; i++) {
			options += '<option value="' + result[i].code + '">' + result[i].description + '</option>';
			dtcategories[result[i].code] = result[i].description;
		}
		$("#category_code").append(options);
	});
	
	// Show List of Products
	var productTable = $("#products").dataTable({
		"bJQueryUI": true,
		"bSortClasses": false,
		"bProcessing": false,
		"bServerSide": true,
		"sAjaxSource": "index.php/product/get",
		"aaSorting": [[1, "asc"]], // Set default sort by "code" column
		"aoColumns": [
			{ "sClass": "num center", "mData": 0, "bSortable": false, "bSearchable": false, "sWidth": "50px" },
			{ "sClass": "code", "mData": 1 },
			{ "sClass": "description", "mData": 2 },
			{ "sClass": "price", "mData": 3 },
			{ "sClass": "category", "mData": 4 },
			{ "sClass": "center", "mData": "DT_RowId", "bSortable": false, "bSearchable": false, "sWidth": "70px", 
				"mRender": function(data, type, full) {
					return "<button class='delete' id='" + data + "'>Delete</button>";
				}
			}
		],
		"fnDrawCallback": function(oSettings) {
			// Initialize delete buttons
			$("button.delete").button({
				icons: { primary: "ui-icon-trash" }, text: false
			});
			// Initialize inplace editors
			$("#products tbody td.description, #products tbody td.price").editable(function(value, settings) {
				var submitdata = {
					"code": $(this).parent("tr").attr("id"),
					"columnname": $(this).attr("class"),
					"value": value
				};
				$.post("index.php/product/edit", submitdata);
				return value;
			}, {
				"tooltip": "Click to edit..."
			});
			$("#products tbody td.category").editable(function(value, settings) {
				var submitdata = {
					"code": $(this).parent("tr").attr("id"),
					"columnname": $(this).attr("class") + "_code",
					"value": value
				};
				$.post("index.php/product/edit", submitdata);
				return dtcategories[value];
			}, {
				"data": function(value, settings) {
					categories = dtcategories;
					categories["selected"] = value;
					return categories;
				},
				"type": "select",
				"submit": "Save",
				"tooltip": "Click to edit...",
				"onblur": "ignore"
			});
		}
	});
	
	// Delete Products
	$("button.delete").live("click", function(e) {
		/* NOTE: For simplicity sake, we are deleting data WITHOUT any confirmation dialog. */
		$.post("index.php/product/delete", { "code": $(this).attr("id") }, function() {
			productTable.fnDraw(true);
		});
	});
	
	// Add Products
	$("#addproducts form").submit(function(e) {
		e.preventDefault();
		$form = $(this);
		/* NOTE: Once again, for simplicity sake, we are submitting WITHOUT any validation or progress indicator. */
		$.post("index.php/product/save", $form.serialize(), function(result) {
			productTable.fnDraw();
			$form[0].reset();
		});
	});
});
