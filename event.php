<!--新建日程页面-->
<?php
$action = $_GET['action'];
$date = $_GET['date'];
?>
<!--<link rel="stylesheet" href="lib/jquery-ui/jquery-ui.css"> -->

<div class="fancy">             
    <h4>新建日程安排</h4> 
    <form id="add_form" action="do.php" method="post"> 
    <input type="hidden" name="action" value="add"> 
    <p>日程内容：<textarea  type="text" class="input" name="event" id="event" style="width:95%;height:50px;resize: none;" 
 placeholder="记录你将要做的一件事..."></textarea></p> 
    <p>开始时间：<input type="text" class="input datepicker" name="startdate" id="startdate" style="width:26%"
 value="<?php echo $_GET['date'];?>" readonly > 
    <span id="sel_start" style="display:none"><select name="s_hour"> 
        <option value="00">00</option> 
        <option value="01">1</option>
        <option value="02">2</option>
        <option value="03">3</option>
        <option value="04">4</option>
        <option value="05">5</option>
        <option value="06">6</option>
        <option value="07">7</option>
        <option value="08">8</option>
        <option value="09" selected>9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
    
    </select>: 
    <select name="s_minute"> 
        <option value="00" selected>00</option> 
        <option value="10">10</option>
        <option value="15">15</option>
        <option value="20">20</option>
        <option value="25">25</option>
        <option value="30">30</option>
        <option value="35">35</option>
        <option value="40">40</option>
        <option value="45">45</option>
        <option value="50">50</option>
        <option value="55">55</option>
    </select> 
    </span> 
    </p> 
    <p id="p_endtime" style="display:none">结束时间：<input type="text" class="input datepicker"  
name="enddate" id="enddate" style="width:26%" value="<?php echo $_GET['date'];?>" readonly> 
    <span id="sel_end" style="display:none"><select name="e_hour"> 
        <option value="00">00</option> 
        <option value="01">1</option>
        <option value="02">2</option>
        <option value="03">3</option>
        <option value="04">4</option>
        <option value="05">5</option>
        <option value="06">6</option>
        <option value="07">7</option>
        <option value="08">8</option>
        <option value="09">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14" selected>14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
    </select>: 
    <select name="e_minute"> 
        <option value="00" selected>00</option>  
        <option value="10">10</option>
        <option value="15">15</option>
        <option value="20">20</option>
        <option value="25">25</option>
        <option value="30">30</option>
        <option value="35">35</option>
        <option value="40">40</option>
        <option value="45">45</option>
        <option value="50">50</option>
        <option value="55">55</option>
    </select> 
    </span> 
    </p> 
    <p> 
    <label><input type="checkbox" value="1" id="isallday" name="isallday" checked> 全天</label> 
    <label><input type="checkbox" value="1" id="isend" name="isend"> 结束时间</label> 
    </p> 
    <div class="sub_btn"><span class="del"><input type="button" class="btn btn_del" 
  id="del_event" value="删除"></span> 
    <input type="submit" class="btn btn_ok" value="确定"> <input type="button"  
class="btn btn_cancel" value="取消" onClick="$.fancybox.close()"></div> 
    </form> 
</div> 

<script src="lib/jqueryForm/jquery.form.min.js"></script>
<!--<script src="lib/jquery-ui/jquery-ui.min.js"></script>-->
<script>

    $(function(){ 
    $(".datepicker").datepicker({
        dateFormat:"mm/dd/yy",
        monthNames:['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
        monthNamesShort:['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
        dayNames:['周日', '周一', '周二', '周三', '周四', '周五', '周六'],
        dayNamesMin:['日', '一', '二', '三', '四', '五', '六'],
        firstDay:"1",
        duration:"fast",

    });//调用日历选择器 
    $.fancybox.resize();
    $("#isallday").click(function(){//是否是全天事件 
        if($("#sel_start").css("display")=="none"){ 
            $("#sel_start,#sel_end").show(); 
        }else{ 
            $("#sel_start,#sel_end").hide(); 
        } ;
        $.fancybox.resize();
    }); 
     
    $("#isend").click(function(){//是否有结束时间 
        if($("#p_endtime").css("display")=="none"){ 
            $("#p_endtime").show(); 
        }else{ 
            $("#p_endtime").hide(); 
        } 
        $.fancybox.resize();//调整高度自适应 
    }); 
}); 


    $(function(){ 
    //提交表单 
    $('#add_form').ajaxForm({ 
        beforeSubmit: showRequest, //表单验证 
        success: showResponse //成功返回 
    });  
}); 
 
function showRequest(){ 
    var events = $("#event").val(); 
    if(events==''){ 
            alert('请输入日程内容');
        $("#event").focus(); 
        return false; 
    } 
} 
 
function showResponse(responseText, statusText, xhr, $form){ 
    if(statusText=="success"){     
        if(responseText==1){ 
            $.fancybox.close();//关闭弹出层 
            $('#calendar').fullCalendar('refetchEvents'); //重新获取所有事件数据 
        }else{ 
            alert(responseText); 
        } 
    }else{ 
        alert(statusText); 
    } 
} 
</script>

