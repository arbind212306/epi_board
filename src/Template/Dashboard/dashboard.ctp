<?php 

?>
<div class="overlay" data-sidebar-overlay></div>

<!-- fluid container starts here -->
<div class="container-fluid container-padding-top">
    <div class="row" id="dashboard_graph">
        <div class="col-md-12 text-right">
            <?php $chart_dashboard= $this->Url->build(['controller' => 'Users', 'action' => 'manageUser']); ?>
            <a href="<?= $chart_dashboard; ?>" class="btn btn-danger btn-sm"><i class="fa fa-table"></i></a>
            <!--<button type="button" class="btn btn-danger btn-sm" onclick="dashboard.toggleDashboard()"><i class="fa fa-table"></i></button>-->
        </div>
        <div class="col-xs-12 margin-top-lg overflow-scroll">
            <div class="row">
                <div class="col-md-6">
                    <div class="padding-md bg-white">
                        <div class="row">
                        <!--<div class="col-md-6 text-center">-->
                                <h4 class="text-center">Onboard</h4>
                        <!--</div>-->
                        </div>    
                        <div class="row">
                            <div class="col-md-4">
                                <h5 class="text-center"><strong>Business Unit</strong></h5>
                                <div class="form-group">
                                    <select class="form-control" id="bu_unit" name="bu_unit" 
                                            onchange="getDepartment(this,'0');">
                                        <option value="All">All</option>
                                        <?php if(!empty($business_units)){
                                            foreach ($business_units as $value_business): 
                                        ?>
                                        <option value="<?= $value_business['id'] ?>" <?php
                                        if(!empty($bu_unit) && $value_business['id'] == $bu_unit)
                                            echo 'selected=selected' ?> ><?= $value_business['title'] ?>
                                        </option>
                                        <?php endforeach; } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h5 class="text-center"><strong>Department</strong></h5>
                                <div class="form-group">
                                    <select class="form-control" id="department" name="department" 
                                            onchange="return getsubDepartment(this,'0');">
                                        <option value="All">All</option>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h5 class="text-center"><strong>Sub Department</strong></h5>
                                <div class="form-group">
                                    <select class="form-control" id="sub_department" name="sub_department">
                                        <option value="All">All</option>
                                    </select>
                                </div>
                            </div>
<!--                            <div class="col-md-4 text-center">
                                <h4>Onboard</h4>
                            </div>-->
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h5 class="text-center"><strong>Location</strong></h5>
                                <div class="form-group">
                                    <select class="form-control" name="location" id="location">
                                        <option value="All">All</option>
                                        <?php if(!empty($location)){
                                            foreach ($location as $value){
                                        ?>
                                        <option value="<?= $value['city'] ?>" <?php
                                        if(!empty($city) && $value['city'] == $city)
                                            echo 'selected=selected' ?> ><?= $value['city'] ?></option>
                                            <?php }; } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h5 class="text-center"><strong>Days</strong></h5>
                                <div class="form-group">
                                    <select class="form-control" name="days" id="days" onchange="return getfilter();">
                                        <option value="All">All</option>
                                        <option value="7">Last 7 Days</option>
                                        <option value="30">Last 1 Month</option>
                                        <option value="90">Last 3 Months</option>
                                        <option value="180">Last 6 Months</option>
                                        <option value="365">Last 1 Year</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="chartdiv"></div>
                        <div style="display:none;" id="chartdiv2"></div>
                        <div>
                            <?= $this->Html->image('loading.gif',['class' => 'loader','id' =>'loader1',
                                      'style'=>'display:none']); ?>  
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="padding-md bg-white">
                        <div class="row">
                            <h4 class="text-center">Confirmation</h4>
                           
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h5 class="text-center"><strong>Business Unit</strong></h5>
                                <div class="form-group">
                                    <select class="form-control" id="bu_unit_1" name="bu_unit" 
                                            onchange="getDepartment(this,'1');">
                                        <option value="All">All</option>
                                        <?php if(!empty($business_units)){
                                            foreach ($business_units as $value_business): 
                                        ?>
                                        <option value="<?= $value_business['id'] ?>"><?= $value_business['title'] ?>
                                        </option>
                                        <?php endforeach; } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h5 class="text-center"><strong>Department</strong></h5>
                                <div class="form-group">
                                    <select class="form-control" id="department_1" name="department" 
                                            onchange="return getsubDepartment(this,'1');">
                                        <option value="All">All</option>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h5 class="text-center"><strong>Sub Department</strong></h5>
                                <div class="form-group">
                                    <select class="form-control" id="sub_department_1" name="sub_department">
                                        <option value="All">All</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h5 class="text-center"><strong>Location</strong></h5>
                                <div class="form-group">
                                    <select class="form-control" name="location" id="location_1">
                                        <option value="All">All</option>
                                        <?php if(!empty($location)){
                                            foreach ($location as $value_location):
                                        ?>
                                        <option value="<?= $value_location['city'] ?>"><?= $value_location['city'] ?></option>
                                        <?php endforeach; } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h5 class="text-center"><strong>Days</strong></h5>
                                <div class="form-group">
                                    <select class="form-control" name="days" id="days_1"
                                            onchange="return getConfirmation();">
                                        <option value="All">All</option>
                                        <option value="7">Last 7 Days</option>
                                        <option value="30">Last 1 Month</option>
                                        <option value="90">Last 3 Months</option>
                                        <option value="180">Last 6 Months</option>
                                        <option value="365">Last 1 Year</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                  <?= $this->Html->image('loading.gif',['class' => 'loader','id' =>'loader2',
                                      'style'=>'display:none']); ?>  
                            </div>
                        </div>
                        <div id="chartConfirmation"></div>
                        <div style="display:none;" id="chartConfirmation2"></div>
                        <div>
                            <?= $this->Html->image('loading.gif',['class' => 'loader','id' =>'loader2',
                                      'style'=>'display:none']); ?>  
                        </div>
                        </div>
                    </div>
                </div>
            <!-- new row strats here for gauge graph -->
            <div class="row">
                <div class="col-md-6">
                    <div class="padding-md bg-white">
                        <div class="row">
                        <!--<div class="col-md-6 text-center">-->
                                <h4 class="text-center">Logistics</h4>
                        <!--</div>-->
                        </div>    
                       
                        <div id="chart3"></div>
                        <!--<div style="display:none;" id="chartdiv2"></div>-->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="padding-md bg-white">
                        <div class="row">
                            <h4 class="text-center"></h4>
                           
                        </div>
                      
                        </div>
                    </div>
                </div>
            <!-- new row ends here -->
            </div>
        </div>
    </div>
</div>

<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/gauge.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
<?php echo $this->Html->script(['jquery-1.12.4', 'bootstrap.min', 'sidebar','jquery-ui','dashboard','customquery','customchart']); ?>
<script>
//code for fetching department based on selected business unit
function getDepartment(val,num){
   var bu_unit = val.value;
    $.ajax({
        url: '<?= $this->Url->build(['controller' => 'Dashboard', 'action' => 'getdepartments']) ?>',
        type: 'POST',
        data: {"business_unit_id": bu_unit},
        success: function(data){
            if(num === '0'){
                $('#department').html(data);
            }
            if(num === '1'){
                $('#department_1').html(data);
            }
        }
    });
}

//code for fetching subdepartment based on selected department
function getsubDepartment(sel,idnum){
    var dept = sel.value;
        $.ajax({
            url: '<?= $this->Url->build(['controller' => 'Dashboard', 'action' => 'getSubDepartments']) ?>',
            type: 'POST',
            data: {"department_id": dept},
            success: function(data){
                if(idnum === '0'){
                    $('#sub_department').html(data);
                }
                if(idnum === '1'){
                    $('#sub_department_1').html(data);
                }
            }
        });
}
</script>
<script>
//code for setting values in global variable in json format
var onBoardPerDay = <?= $onBoardPerDay ?> ;
var confirmed = <?= $confirmed ?>;
console.log(confirmed);
console.log(typeof confirmed);
//first graph code i.e., onboard graph
var chart = AmCharts.makeChart("chartdiv", {
    "type": "serial",
    "theme": "light",
    "marginRight": 40,
    "marginLeft": 40,
    "autoMarginOffset": 20,
    "mouseWheelZoomEnabled":true,
    "dataDateFormat": "YYYY-MM-DD",
    "valueAxes": [{
        "id": "v1",
        "axisAlpha": 0,
        "position": "left",
        "ignoreAxisWidth":true
    }],
    "balloon": {
        "borderThickness": 1,
        "shadowAlpha": 0
    },
    "graphs": [{
        "id": "g1",
        "balloon":{
          "drop":true,
          "adjustBorderColor":false,
          "color":"#ffffff"
        },
        "bullet": "round",
        "bulletBorderAlpha": 1,
        "bulletColor": "#FFFFFF",
        "bulletSize": 5,
        "hideBulletsCount": 50,
        "lineThickness": 2,
        "title": "red line",
        "useLineColorForBulletBorder": true,
        "valueField": "value",
        "balloonText": "<span style='font-size:18px;'>[[value]]</span>"
    }],
    "chartScrollbar": {
        "graph": "g1",
        "oppositeAxis":false,
        "offset":30,
        "scrollbarHeight": 80,
        "backgroundAlpha": 0,
        "selectedBackgroundAlpha": 0.1,
        "selectedBackgroundColor": "#888888",
        "graphFillAlpha": 0,
        "graphLineAlpha": 0.5,
        "selectedGraphFillAlpha": 0,
        "selectedGraphLineAlpha": 1,
        "autoGridCount":true,
        "color":"#AAAAAA"
    },
    "chartCursor": {
        "pan": true,
        "valueLineEnabled": true,
        "valueLineBalloonEnabled": true,
        "cursorAlpha":1,
        "cursorColor":"#258cbb",
        "limitToGraph":"g1",
        "valueLineAlpha":0.2,
        "valueZoomable":true
    },
    "valueScrollbar":{
      "oppositeAxis":false,
      "offset":50,
      "scrollbarHeight":10
    },
    "categoryField": "date",
    "categoryAxis": {
        "parseDates": true,
        "dashLength": 1,
        "minorGridEnabled": true
    },
    "dataProvider": onBoardPerDay
});

chart.addListener("rendered", zoomChart);

zoomChart();

function zoomChart() {
    chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
}


//script for confirmation graph when page loads and sets data from php 
var chart2 = AmCharts.makeChart("chartConfirmation", {
    "type": "serial",
    "theme": "light",
    "marginRight": 40,
    "marginLeft": 40,
    "autoMarginOffset": 20,
    "mouseWheelZoomEnabled":true,
    "dataDateFormat": "YYYY-MM-DD",
    "valueAxes": [{
        "id": "v1",
        "axisAlpha": 0,
        "position": "left",
        "ignoreAxisWidth":true
    }],
    "balloon": {
        "borderThickness": 1,
        "shadowAlpha": 0
    },
    "graphs": [{
        "id": "g1",
        "balloon":{
          "drop":true,
          "adjustBorderColor":false,
          "color":"#ffffff"
        },
        "bullet": "round",
        "bulletBorderAlpha": 1,
        "bulletColor": "#FFFFFF",
        "bulletSize": 5,
        "hideBulletsCount": 50,
        "lineThickness": 2,
        "title": "red line",
        "useLineColorForBulletBorder": true,
        "valueField": "value",
        "balloonText": "<span style='font-size:18px;'>[[value]]</span>"
    }],
    "chartScrollbar": {
        "graph": "g1",
        "oppositeAxis":false,
        "offset":30,
        "scrollbarHeight": 80,
        "backgroundAlpha": 0,
        "selectedBackgroundAlpha": 0.1,
        "selectedBackgroundColor": "#888888",
        "graphFillAlpha": 0,
        "graphLineAlpha": 0.5,
        "selectedGraphFillAlpha": 0,
        "selectedGraphLineAlpha": 1,
        "autoGridCount":true,
        "color":"#AAAAAA"
    },
    "chartCursor": {
        "pan": true,
        "valueLineEnabled": true,
        "valueLineBalloonEnabled": true,
        "cursorAlpha":1,
        "cursorColor":"#258cbb",
        "limitToGraph":"g1",
        "valueLineAlpha":0.2,
        "valueZoomable":true
    },
    "valueScrollbar":{
      "oppositeAxis":false,
      "offset":50,
      "scrollbarHeight":10
    },
    "categoryField": "date",
    "categoryAxis": {
        "parseDates": true,
        "dashLength": 1,
        "minorGridEnabled": true
    },
    "dataProvider": confirmed
});

chart2.addListener("rendered", zoomChart2);
zoomChart2();
function zoomChart2() {
    chart2.zoomToIndexes(chart2.dataProvider.length - 40, chart2.dataProvider.length - 1);
} 

//script for third chart
var gaugeChart = AmCharts.makeChart("chart3", {
  "type": "gauge",
  "theme": "light",
  "axes": [{
    "axisAlpha": 0,
    "tickAlpha": 0,
    "labelsEnabled": false,
    "startValue": 0,
    "endValue": 100,
    "startAngle": 0,
    "endAngle": 270,
    "bands": [{
      "color": "#eee",
      "startValue": 0,
      "endValue": 100,
      "radius": "100%",
      "innerRadius": "85%"
    }, {
      "color": "#84b761",
      "startValue": 0,
      "endValue": 80,
      "radius": "100%",
      "innerRadius": "85%",
      "balloonText": "<?= $inProgress ?>"
    }, {
      "color": "#eee",
      "startValue": 0,
      "endValue": 100,
      "radius": "80%",
      "innerRadius": "65%"
    }, {
      "color": "#fdd400",
      "startValue": 0,
      "endValue": 35,
      "radius": "80%",
      "innerRadius": "65%",
      "balloonText": "<?= $received ?>"
    }, {
      "color": "#eee",
      "startValue": 0,
      "endValue": 100,
      "radius": "60%",
      "innerRadius": "45%"
    }, {
      "color": "#cc4748",
      "startValue": 0,
      "endValue": 92,
      "radius": "60%",
      "innerRadius": "45%",
      "balloonText": "<?= $pending ?>"
    }]
  }],
  "allLabels": [{
    "text": "In-process",
    "x": "49%",
    "y": "5%",
    "size": 15,
    "bold": true,
    "color": "#84b761",
    "align": "right"
  }, {
    "text": "Received",
    "x": "49%",
    "y": "15%",
    "size": 15,
    "bold": true,
    "color": "#fdd400",
    "align": "right"
  }, {
    "text": "Pending",
    "x": "49%",
    "y": "24%",
    "size": 15,
    "bold": true,
    "color": "#cc4748",
    "align": "right"
  }]
});
            
</script>
<style>
    .amcharts-chart-div a {display:none !important;}
   
    #chartdiv,#chartConfirmation,#chartdiv2,#chartConfirmation2 {
	width	: 100%;
	height	: 400px;
}	
#chart3 {
  width: 100%;
  height: 400px;
  margin: auto;
}
.loader {
   height:400px;
}
</style><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

