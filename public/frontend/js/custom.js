function delConfirm(id){
	if(confirm('Are you you want to delete the Entry!')){
		window.location.href='?del='+id;
	}
}
$(document).ready(function(){
	$('.simpleDataTable').DataTable();

	$('.timepicker').timepicker({
	    timeFormat: 'h:mm p',
	    interval: 60,
	    minTime: '12:00am',
	    maxTime: '11:59pm',
	    //defaultTime: '11',
	    startTime: '10:00',
	    dynamic: true,
	    dropdown: true,
	    scrollbar: false
	});
});