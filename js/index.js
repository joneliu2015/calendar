$(document).ready(function() {
    //页面加载完初始化日历 
    $('#calendar').fullCalendar({
        //设置选项和回调 
        header: { //设置日历头部信息 
            left: 'agendaDay,agendaWeek,month',
            center: 'title',
            right: 'prev,next'
        },
        firstDay: 1, //每行第一天为周一 
        editable: false, //不可以拖动 
        weekNumbers: false, //不显示周数
        weekMode: "liquid",
        defaultView: "agendaDay", //日历初始化时默认视图
        theme: true,
        monthNames: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
        monthNamesShort: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
        dayNames: ['周日', '周一', '周二', '周三', '周四', '周五', '周六'],
        dayNamesShort: ['日', '一', '二', '三', '四', '五', '六'],
        buttonText: {
            prev: '‹', // ‹
            next: '›', // ›
            prevYear: '«', // «
            nextYear: '»', // »
            today: '今天',
            month: '月',
            week: '周',
            day: '日'
        },
        columnFormat: {
            month: 'dddd', // Mon
            week: 'ddd M/d', // Mon 9/7
            day: '' // Monday 9/7 }
        },
        titleFormat: {

            month: 'MMMM', // September 2013
            week: "MMMd{'—'MMMd}", // Sep 7 - 13 2013
            day: 'MM-dd  dddd' // Tuesday, Sep 8, 2013

        },
        timeFormat: 'H:mm',
        allDayText: "全天",
        axisFormat: "H: mm ",
        firstHour: 9,

        events: 'json.php',
        dayClick: function(date, 全天, jsEvent, view) {
            var selDate = $.fullCalendar.formatDate(date, 'MM/dd/yyyy'); //格式化日期 
            $.fancybox({ //调用fancybox弹出层 
                'type': 'ajax',
                'href': 'event.php?action=add&date=' + selDate,
                'centerOnScroll': true,
            });
        },
        eventClick: function(calEvent, jsEvent, view) {
            $fancybox: ({
                'type': 'ajax',
                'event': 'event.php?action=edit&id=' + calEvent.id
            });
        }
    });


});