$(document).ready(function(){
function parseTime(s) {

   var c = s.split(':');
   return parseInt(c[0]) * 60 + parseInt(c[1]);
}
$('input[name="stopTime"]').on('change',function(){
	var start = $('input[name="startTime"]').val();
	var end = $('input[name="stopTime"]').val();
	var breakTime = $('input[name="breakTime"]').val();
	var total = parseTime(end)- parseTime(start)- breakTime;
	var hour = Math.floor(total/60);
	var min = total % 60 ;
	if(min <= 0){
  $('#totalTime').val(hour+':'+min+'0');
	}
	$('#totalTime').val(hour+':'+min);


});



});
$('#projectID').on('change',function(){

        console.log(this.selectedIndex);
        $("#project").prop('selectedIndex', this.selectedIndex );

    });
