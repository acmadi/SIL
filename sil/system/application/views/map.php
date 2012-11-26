<style>
	.ui-autocomplete {
		max-height: 100px;
		overflow-y: auto;
		/* prevent horizontal scrollbar */
		overflow-x: hidden;
		/* add padding to account for vertical scrollbar */
		padding-right: 20px;
	}
	/* IE 6 doesn't support max-height
	 * we use height instead, but this forces the menu to always be this tall
	 */
	* html .ui-autocomplete {
		height: 100px;
	}
</style>
<script type="text/javascript">
	//Array of Element
	var reports = <?php echo $kota; ?>;
	var reportsFiltered = [];
	var listLocation = [];
	var reportsMarkers = [];
	
	//map variable
	var map = null;
	var infoElement = null;
	var minZoom = 8;
	var maxZoom = 18;
	var jabarCenter = new google.maps.LatLng(-6.90,107.61);
	var jabarBounds = null;

	$(document).ready(function(){
		initFilter();
		initMap();
	});
	
	function initFilter(){
		$(function() {
			
			//Location Filter
			$.each(reports, function(index, report){
				listLocation.push(report.nama);
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
			
			//Jabar
			$("#jabar").click(function(){
				showJabar();
			});
		}); 
	}
	
	function showJabar(){
		map.setCenter(jabarCenter);
		map.setZoom(minZoom);
	}
	
	function filterLocation(location){
		//cleanup the reports filter container
		if (reportsFiltered) {reportsFiltered.length = 0;}
		//fill report filter
		$.each(reports, function(index, report){
			if(report.nama.toLowerCase().search(location.toLowerCase()) != -1){
				reportsFiltered.push(report);
			}
		});
		//update the markers
		updateMarkers(reportsFiltered);
	}
	
	function removeFilter(){
		//cleanup the filter
		if (reportsFiltered) {reportsFiltered.length = 0;}
		
		//update the markers
		updateMarkers(reports);
	}
	
	function initMap(){
		var IE = document.all?true:false
		var bandung = new google.maps.LatLng(-6.90,107.61);
		var mapOpt = {
			zoom: minZoom,
			center: bandung,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			mapTypeControl: true,
			scaleControl: true,
			navigationControl: true
		};
		map = new google.maps.Map(document.getElementById("map_canvas"),mapOpt);
		
		//initMarkers
		infoElement =  new google.maps.InfoWindow();
		updateMarkers(reports);
		
		//prepare jabar bound
		jabarBounds = map.getBounds();
		
		//limit the map zoom
		google.maps.event.addListenerOnce(map, 'idle', function() {
			map.mapTypes[google.maps.MapTypeId.ROADMAP].minZoom = minZoom;
			map.mapTypes[google.maps.MapTypeId.ROADMAP].maxZoom = maxZoom;
			map.mapTypes[google.maps.MapTypeId.HYBRID].minZoom = minZoom;
			map.mapTypes[google.maps.MapTypeId.HYBRID].maxZoom = maxZoom;
			map.mapTypes[google.maps.MapTypeId.TERRAIN].minZoom = minZoom;
			map.mapTypes[google.maps.MapTypeId.TERRAIN].maxZoom = maxZoom;
			map.mapTypes[google.maps.MapTypeId.SATELLITE].minZoom = minZoom;
			map.mapTypes[google.maps.MapTypeId.SATELLITE].maxZoom = maxZoom;
		});
		google.maps.event.addListener(map, 'zoom_changed', function() { 
			if (map.getZoom() < minZoom) { 
				map.setZoom(minZoom);
			}
			if (map.getZoom() == minZoom) { 
				map.setCenter(jabarCenter);
				infoElement.close();
			}
		});
		
		google.maps.event.addListener(map, 'click', function(event) {
			alert(event.latLng.lng()+', '+event.latLng.lat());
		});
		
		//forbid user to drag map out of jabarCenter
		google.maps.event.addListener(map, 'bounds_changed', function(event) {
			if(map.getZoom() == minZoom){
				map.setCenter(jabarCenter);
			}
		});
	}
	
	function updateMarkers(group){
		//cleanup the markers container
		if (reportsMarkers) {
			for (idx = 0; idx < reportsMarkers.length; idx++) {
			  reportsMarkers[idx].setMap(null);
			}
			reportsMarkers.length = 0;
		}
		
		//update markers group
		if(group !== null){	
			$.each(group, function(index, instance){
				if(instance.nama != 'admin'){
					var newPos = new google.maps.LatLng(instance.lat, instance.lon);
					renderMarker(newPos, instance);
				}
			});
		}
	}
	
	function renderMarker(location, instance){
		var marker = new google.maps.Marker({
			position: location,
			icon : '<?php echo base_url();?>img/logo/small/'+instance.file_logo,
			map: map,
			title : instance.nama,
			zIndex : 10
		});
		reportsMarkers.push(marker);
		//Click event
		google.maps.event.addListener(marker, 'click', function(e) {
			infoElement.close();
			var text = '<div id="reportMarker">'
						+'<h3>'+ instance.nama +'</h3>'
						+'<p><img src="<?php echo base_url();?>img/logo/'+instance.file_logo+'"></p>'
						+'<p>'+ instance.deskripsi +'</p>'
						+'<p><a href="info/kota/'+ instance.id +'">Lihat Selengkapnya...</a></p>'
						+'</div>'
						;
			infoElement.setContent(text);
				
			var selectedCenter = new google.maps.LatLng(instance.lat,instance.lon);
			infoElement.setPosition(selectedCenter);
			if(map.getZoom() == minZoom) map.setZoom(map.getZoom()+1);
			infoElement.open(map);
		});
	}
	
</script>



<div class="block b-fourth b-sand" id="mapfilter">
	<div class="filter-container">
		<h2>Filter</h2>
		<script>
		$(function() {
			$( "#mapfilter-accordion" ).accordion({
				collapsible: true
			});
		});
		</script>
		<div id="mapfilter-accordion" style="text-align:left;">
			<!--h3><a href="#">Filter by Date</a></h3>
			<div>
				<form name="filterbydate">
					From <br><input type="text" id="datepickerfrom" size="20" /><br>
					To <br><input type="text" id="datepickerto" size="20" /><br>
					<input type="button" id="datefilter" value="Filter" />
				</form>
			</div-->
			<h3><a href="#">Filter by Location</a></h3>
			<div>
				<form name="filterbylocation">
					<label><b>by Location</b></label><br>
					<input type="text" id="inputlocation" />
					<input type="button" id="locationfilter" value="Filter" />
				</form>
			</div>
			<h3><a href="#">Other</a></h3>
			<div>
				<button id="jabar">Show Jawa Barat</button>
				<button id="removefilter">Remove Filter</button>
			</div>
		</div>
	</div>
</div>
<div class="block b-quarter b-sand2" id="map_canvas">
</div>