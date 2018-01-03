<?php

	 $year = date('Y');
	 $month = date('m');

	 echo json_encode(array(
	
	 	array(
	 		'id' => 111,
	 		'title' => "今天有个重要的会议",
	 		'start' => "$year-$month-17",
             'end'=>"$year-$month-20",
	 		'editable'=>"false",
	 		'color'=>'orange',
	 		'eventStartEditable'=>'false'
	 	),

	 	array(
	 		'id' => 222,
	 		'title' => "今天有个不重要培训",
	 		'start' => "$year-4-20",
	 		'end' => "$year-3-22",
	 		'editable'=>"true",

	 	)
	
	 ));
	include_once('connect.php');//连接数据库 
 
$sql = "select * from calendar"; 
$query = mysqli_query($sql);
while($row=mysqli_fetch_array($query)){
    $allday = $row['allday']; 
    $is_allday = $allday==1?true:false; 
     
    $data[] = array( 
        'id' => $row['id'],//事件id 
        'title' => $row['title'],//事件标题 
        'start' => date('Y-m-d H:i',$row['starttime']),//事件开始时间 
        'end' => date('Y-m-d H:i',$row['endtime']),//结束时间 
        'allDay' => $is_allday, //是否为全天事件 
        'color' => $row['color'] //事件的背景色 
    ); 
} 
echo json_encode($data); 

?>