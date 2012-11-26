<?php ?>
<script type="text/javascript">

	//Array of Element
	var reports = <?php echo $reports; ?>;
	var reportsFiltered = [];
	var listLocation = [];
	var selectedReports = [];
	var report_per_page = 10;
	
	function selectReports(group){
		if (selectedReports) {selectedReports.length = 0;}
		$.each(group, function(index, instance){
			selectedReports.push(instance);
		});
	}
	
	function initFilter(){
		$(function() {
			//Date Filter
			var dateOpt = { dateFormat: "yy-mm-dd", 
						changeMonth : true,
						changeYear : true,
						yearRange : "c-15:c"
						};
			$( "#datepickerfrom" ).datepicker(dateOpt);
			$( "#datepickerto" ).datepicker(dateOpt);
			$("#datefilter").click(function(){
				if(isDateEarlier($('#datepickerfrom').val(),$('#datepickerto').val())){
					filterDate($('#datepickerfrom').val(),$('#datepickerto').val());
					$('#inputlocation').val('');
				}else{
					alert ("Masukan filter tanggal salah. Tanggal awal harus lebih dini dari tanggal akhir.");
				}
			});
			//Location Filter
			$.each(reports, function(index, report){
				listLocation.push(report.report_location);
			});
			$('#inputlocation').autocomplete({
				source: listLocation
			});
			$("#locationfilter").click(function(){
				filterLocation($('#inputlocation').val());
				$('#datepickerfrom').val('');
				$('#datepickerto').val('');
			});
			//removefilter
			$("#removefilter").click(function(){
				removeFilter();						
				$('#datepickerfrom').val('');
				$('#datepickerto').val('');
				$('#inputlocation').val('');
			});
		}); 
	}
	
	function filterDate(from,to){
		//cleanup the reports filter container
		if (reportsFiltered) {reportsFiltered.length = 0;}
		//fill report filter
		$.each(reports, function(index, report){
			if(isDateBetween(report.upload_time,from,to)){
				reportsFiltered.push(report);
			}
		});
		//update pagination
		selectReports(reportsFiltered);
		generatePagination();
	}
	
	function isDateEarlier(fromDate,toDate){
		fromArr = fromDate.split('-');
		toArr = toDate.split('-');
		isEarlier = false;
		
		if(fromArr[0] <= toArr[0]){
			if(fromArr[1] <= toArr[1]){
				if(fromArr[2] <= toArr[2]){
					isEarlier = true;
				}
			}
		}
		return isEarlier;
	}
	
	function isDateBetween(inputDate,fromDate,toDate){
		inputArr = inputDate.split('-');
		fromArr = fromDate.split('-');
		toArr = toDate.split('-');
		isBetween = false;
		
		if(inputArr[0] >= fromArr[0] && inputArr[0] <= toArr[0]){
			if(inputArr[1] >= fromArr[1] && inputArr[1] <= toArr[1]){
				if(inputArr[2] >= fromArr[2] && inputArr[2] <= toArr[2]){
					isBetween = true;
				}
			}
		}
		
		return isBetween;
	}
	
	function filterLocation(location){
		//cleanup the reports filter container
		if (reportsFiltered) {reportsFiltered.length = 0;}
		if (reportsFiltered) {reportsFiltered.length = 0;}
		//fill report filter
		$.each(reports, function(index, report){
			if(report.report_location.toLowerCase().search(location.toLowerCase()) != -1){
				reportsFiltered.push(report);
			}
		});
		//update pagination
		selectReports(reportsFiltered);
		generatePagination();
	}
	
	function removeFilter(){
		//cleanup the filter
		if (reportsFiltered) {reportsFiltered.length = 0;}
		//update pagination
		selectReports(reports);
		generatePagination();
	}
	
	function pageSelectCallback(page_index, jq){
		// init pagination
		alert(page_index);
		var items_per_page = report_per_page;
		var initNo = (page_index * items_per_page)+1;
		var max_elem = Math.min((page_index+1) * items_per_page, selectedReports.length);
			
		getTableContent(page_index*items_per_page,max_elem,initNo);
		return false;
	}
	
	function firstPageSelect(){
		var items_per_page = report_per_page;
		var page_index = 0;
		var initNo = 1;
		var items_per_page = report_per_page;
		var max_elem = Math.min((page_index+1) * items_per_page, selectedReports.length);
		getTableContent(page_index*items_per_page,max_elem,initNo);
	}
	
	function getTableContent(init,max_elem,number){
		var newcontent = '<ul>';
		
		for(var i=init;i<max_elem;i++)
		{
			newcontent += '<li>'
						+'<a href="galeri/detail/'+selectedReports[i]["id"]+'">'
						+'<img src="<?php echo base_url(); ?>upload/thumb/thumb_'+selectedReports[i]["filename"]+'" alt="' + selectedReports[i]["report_title"] + '" title="' + selectedReports[i]["report_location"] + '" />'
						+'</a>'
						+'<br>'
						+'<label>' + selectedReports[i]["report_title"] + '</label>'
					+'</li>';
		}
		newcontent += '</ul>';
		$('#tableresult').html(newcontent);
	}
	
	function getPaginationOption(){
		var initOption = {
			callback: pageSelectCallback,
			items_per_page:report_per_page,
			num_display_entries:10,
			num_edge_entries:2,
			prev_text: "Prev",
			next_text: "Next"
		}
		return initOption;
	}

	function generatePagination(){
		$("#Pagination").pagination(selectedReports.length, getPaginationOption());
		firstPageSelect();
	}
		
	$(document).ready(function(){
		//init filter
		initFilter();
		//init pagination reports
		selectReports(reports);
		generatePagination();
	});
</script>
<div class="block b-full b-sand2" id="filterbox">
	<button id="removefilter">Remove Filter</button>
	<form name="filterbydate">
		<label><b>by Date</b></label>
		From <input type="text" id="datepickerfrom" />
		To <input type="text" id="datepickerto" />
		<input type="button" id="datefilter" value="Filter" />
	</form>
	<form name="filterbylocation">
		<label><b>by Location</b></label>
		<input type="text" id="inputlocation" />
		<input type="button" id="locationfilter" value="Filter" />
	</form>
</div>
<div class="block b-full b-sand2">
	<div class="gallery" id="tableresult"></div>
	<br style="clear:both;" />
	<div id="Pagination"></div>
</div>