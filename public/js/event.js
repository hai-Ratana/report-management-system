function parseTime(s) {

   var c = s.split(':');
   return parseInt(c[0]) * 60 + parseInt(c[1]);
}
$(document).on('click','#stopTime',function(){
// 	var start = $('input[name="startTime"]').val();
// 	var end = $('input[name="stopTime"]').val();
// 	var breakTime = $('input[name="breakTime"]').val();
// 	var total = parseTime(end)- parseTime(start)- breakTime;
// 	var hour = Math.floor(total/60);
// 	var min = total % 60 ;
//
// $('#totalTime').val(total);

alert('Hello');

});



});
$('#projectID').on('change',function(){

        console.log(this.selectedIndex);
        $("#project").prop('selectedIndex', this.selectedIndex );

});
