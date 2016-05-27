<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

<?php
$months  = array("January","Febraury","March","April","May","June","July","August","Sepetember","October","Novomber","December");

?>
<select onchange="showCalendar()" id="month">
    <?php
    $i=0;
    while($i<sizeof($months)){
        echo '<option value="'.$i.'">'.$months[$i].'</option>';
        $i++;
    }        
    ?>
</select>
&nbsp;
<select onchange="showCalendar()" id="year">
    <?php
    $j=date('Y');
    $count = $j+20;
    while($j<$count){
        echo '<option value="'.$j.'">'.$j.'</option>';
        $j++;
    }        
    ?>
</select>
<br/><br/>   
<div id="calendar"></div>

<script>
showCalendar();

function showCalendar(){
    
    var calendar_year           = document.getElementById('year').value;
    var calendar_month          = document.getElementById('month').value;
    
    
    if(calendar_year == "" && calendar_month == ""){
        var calendar_current_date   = new Date();
        calendar_year               = calendar_current_date.getFullYear();
        calendar_month              = calendar_current_date.getMonth()+1;
        var day                     = getMonthFirstDate_DayNo(calendar_month, calendar_year);
    }
    else{
        var calendar_current_date   = new Date();
        calendar_month              = parseInt(calendar_month)+1;
        calendar_year               = parseInt(calendar_year);
        var day                     = getMonthFirstDate_DayNo(calendar_month, calendar_year);
    }
    
    var calendar_days    = new Date(calendar_year, calendar_month,0).getDate();
    
    var months  = ["January","Febraury","March","April","May","June","July","August","Sepetember","October","Novomber","December"];
    var days    = ["Sun","Mon","Tues","Wed","Thus","Fri","Sat"];
    
    var calendar    = '<table border="1" style="border-collapse:collapse" cellpadding="10" cellspacing="10">';
    
    //For month and year
    calendar += '<tr><th colspan="7">'+months[calendar_month-1]+'&nbsp'+calendar_year+'</th></tr>';
    
    //For days heading
    calendar    += '<tr>';
    var k = 0;
    while(k<days.length){
        calendar += '<th>'+days[k]+'</th>';
        k++;
    }
    calendar    += '</tr>';

    // For dates
    var i=1;
    while(i<=calendar_days){
        calendar +='<tr>';
        var j=0;
        while(j<days.length && i <= calendar_days){
            
            while(0<day){
                calendar +='<td></td>';
                day--;
                j++;
            }
            calendar +='<td>'+i+'</td>';
            j++;
            i++;
            
        }
        calendar +='</tr>';
    }
    
    calendar    += '</table>';
    document.getElementById('calendar').innerHTML = calendar;
}    
function getMonthFirstDate_DayNo(monthNo, year) {

  var dt = new Date(year, monthNo - 1, 1);
  
  return dt.getDay();
}    
</script>