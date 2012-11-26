<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>jqGrid</title>  

<link rel="stylesheet" type="text/css" media="screen" href="../css/ui-lightness/jquery-ui-1.7.2.custom.css" />
<link rel="stylesheet" type="text/css" media="screen" href="../css/ui.jqgrid.css" />

<script src="jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="../js/i18n/grid.locale-en.js" type="text/javascript"></script>
<script src="jquery.jqGrid.min.js" type="text/javascript"></script>
</head>
<body>
<h2>My Grid Data</h2>
<table id="list" class="scroll"></table>
<div id="pager" class="scroll c1"></div> 

<script type="text/javascript">
var lastSelectedId;

jQuery('#list').jqGrid({
		url:'grid.php',
		datatype: 'json',
		mtype: 'POST',
		colNames:['ID','Name', 'Price', 'Promotion'],
		colModel:[    
		   {name:'product_id',index:'product_id', width:25,editable:false},     
		   {name:'name',index:'name', width:50,editable:true, edittype:'text',editoptions:{size:30,maxlength:50}},
		   {name:'price',index:'price', width:50, align:'right',formatter:'currency', editable:true},
		   {name:'on_promotion',index:'on_promotion', width:50, formatter:'checkbox',editable:true, edittype:'checkbox'}],
		rowNum:10,
		rowList:[5,10,20,30],
		pager: $('#pager'),
		sortname: 'product_id',
		viewrecords: true,
		sortorder: "desc",
		caption:"Database",
		width:500,
		height:150,  
		onSelectRow: function(id){
		if(id && id!==lastSelectedId){
		  $('#list').restoreRow(lastSelectedId);
		  $('#list').editRow(id,true,null,onSaveSuccess);
		  lastSelectedId=id; }},
		editurl:'grid.php?action=save'})

	.jqGrid('navGrid','#pager', 
		{refreshicon: 'ui-icon-refresh',view:true},
		{height:280,reloadAfterSubmit:true}, 
		{height:280,reloadAfterSubmit:true}, 
		{reloadAfterSubmit:true})

	.jqGrid('editGridRow',"new",{height:280,reloadAfterSubmit:false}); 

function onSaveSuccess(xhr) 
{response = xhr.responseText; if(response == 1) return true; return false;}

</script></body></html>