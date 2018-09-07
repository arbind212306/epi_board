//code for getting data from controller displaying onboard graph
function getfilter(){
    $('#chartdiv').hide();
    $('#loader1').show();
    var business_unit = $('#bu_unit').val();
    var department = $('#department').val();
    var sub_department = $('#sub_department').val();
    var location = $('#location').val();
    var days = $('#days').val();
    $.ajax({
        url: webroot + 'dashboard/get-filter-dashbordData',
        type: 'POST',
        dataType: 'JSON',
        data: {"business_unit":business_unit, "department":department, "sub_department":sub_department,
    "location":location, "days":days},
        
        success: function(data){
            var chartdiv2 = AmCharts.makeChart("chartdiv2", {
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
                "dataProvider": data
            });

            chartdiv2.addListener("rendered", zoomChartdiv2);

            zoomChartdiv2();

            function zoomChartdiv2() {
                chartdiv2.zoomToIndexes(chartdiv2.dataProvider.length - 40, chartdiv2.dataProvider.length - 1);
            }
//            
            $('#loader1').hide();
            $('#chartdiv2').show();
        }
    });
}

//script for getting data and displaying confirmation graph on ajax hit
function getConfirmation(){
    $('#chartConfirmation').hide();
    $('#loader2').show();
    var business_unit = $('#bu_unit_1').val();
    var department = $('#department_1').val();
    var sub_department = $('#sub_department_1').val();
    var location = $('#location_1').val();
    var days = $('#days_1').val(); 
    
    $.ajax({
        url: webroot + 'dashboard/get-filter-confirmation',
        type: 'POST',
        dataType: 'JSON',
        data: {"business_unit":business_unit, "department":department, "sub_department":sub_department,
    "location":location, "days":days},
        
        success: function(data){
            var chartConf = AmCharts.makeChart("chartConfirmation2", {
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
                "dataProvider": data
            });

            chartConf.addListener("rendered", zoomChartConf);

            zoomChartConf();

            function zoomChartConf() {
                chartConf.zoomToIndexes(chartConf.dataProvider.length - 40, chartConf.dataProvider.length - 1);
            }
            
            $('#loader2').hide();
            $('#chartConfirmation2').show();
        }
    });
    
}
