<?= $this->extend('layouts/base'); ?>
<?= $this->section('content'); ?>
<style>
    .md-card-content {
        font-family: "Nunito", sans-serif;
        font-size: 15px;
        line-height: 20px;
        font-weight: 400;
    }

    /*  HightChart  */
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 360px;
        max-width: 800px;
        margin: 1em auto;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }

    .chart-container {
        display: flex;
        justify-content: space-between;
    }

    .chart {
        width: 48%; /* Đặt độ rộng cho mỗi biểu đồ */
        margin-bottom: 20px; /* Đặt khoảng cách dưới cho mỗi biểu đồ */
    }

    @media screen and (max-width: 768px) {
        .chart {
            width: 100%; /* Điều chỉnh độ rộng của biểu đồ khi màn hình có độ rộng nhỏ hơn 768px */
        }
    }

    .chart {
        flex: 1;
        margin-right: 20px;
        background-color: #fff;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
    }

    .chart-container.resize-text .highcharts-xaxis-labels {
        max-width: 120px;
        overflow-wrap: break-word;
        word-wrap: break-word;
        word-break: break-word;
    }

    .peity {
        margin-right: 25px;
        font-size: 30px;
        color: cadetblue;
        margin-top: 27px;
    }


</style>
<div id="general_page_content">
    <div id="page_content">
        <div id="page_content_inner">
            <!-- large chart -->
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <div class="md-card">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <i class="md-icon material-icons md-card-fullscreen-activate">&#xE5D0;</i>
                                <i class="md-icon material-icons">&#xE5D5;</i>
                                <div class="md-card-dropdown" data-uk-dropdown="{pos:'bottom-right'}">
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#">Action 1</a></li>
                                            <li><a href="#">Action 2</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <h3 class="md-card-toolbar-heading-text">
                                TỔNG QUAN KIẾN THỨC
                            </h3>
                        </div>
                        <div class="md-card">
                            <div class="md-card-content">
                                <!-- Dashboard Block  -->
                                <div style="margin-bottom: 40px"
                                     class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler"
                                     data-uk-sortable="" data-uk-grid-margin="">
                                    <div style="" class="uk-row-first">
                                        <div class="md-card" style="display: flex; justify-content: space-between">
                                            <div class="md-card-content">
                                                <div class="uk-float-right uk-margin-top uk-margin-small-right"><span
                                                        class="peity_visitors peity_data" style="display: none;">5,3,9,6,5,9,7</span>
                                                </div>
                                                <span class="uk-text-muted uk-text-small">Tổng số bài thi</span>
                                                <h2 class="uk-margin-remove"><span class="countTotalTest">7<noscript>12456</noscript></span>
                                                </h2>
                                            </div>
                                            <!--                                            <div class="peity" height="28" width="48"><i style="color: rgb(44, 175, 254);"-->
                                            <!--                                                    class="fa fa-question-circle"></i></div>-->
                                        </div>
                                    </div>
                                    <div style="padding-left: 17px">
                                        <div class="md-card" style="display: flex;  justify-content: space-between">
                                            <div class="md-card-content">
                                                <div class="uk-float-right uk-margin-top uk-margin-small-right"><span
                                                        class="peity_sale peity_data" style="display: none;">5,3,9,6,5,9,7,3,5,2</span>
                                                </div>
                                                <span class="uk-text-muted uk-text-small">Tỉ lệ chính xác</span>
                                                <h2 class="uk-margin-remove"><span class="avgPercentCorrect"> <noscript>142384</noscript></span>
                                                </h2>
                                            </div>
                                            <div class="peity" height="28" width="48"><i
                                                    class="fa-regular fa-timer"></i></div>
                                        </div>
                                    </div>
                                    <div style="padding-left: 17px">
                                        <div class="md-card" style="display: flex; justify-content: space-between">
                                            <div class="md-card-content">
                                                <div class="uk-float-right uk-margin-top uk-margin-small-right"><span
                                                        class="peity_orders peity_data"
                                                        style="display: none;">64/100</span>
                                                </div>
                                                <span class="uk-text-muted uk-text-small">Thời gian trung bình (phút)</span>
                                                <h2 class="uk-margin-remove"><span class="avgTime">12:45<noscript>64</noscript></span>
                                                </h2>
                                            </div>
                                            <div class="peity" height="28" width="48"><i class="fa fa-clock-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="padding-left: 17px">
                                        <div class="md-card" style="display: flex; justify-content: space-between">
                                            <div class="md-card-content">
                                                <div class="uk-float-right uk-margin-top uk-margin-small-right"><span
                                                        class="peity_live peity_data" style="display: none;">8,10,7,6,6,6,7,8,3,2,4,3,4,1,3,8,8,7,4,0</span>
                                                </div>
                                                <span
                                                    class="uk-text-muted uk-text-small">Bài thi hoàn thành (100%) </span>
                                                <h2 class="uk-margin-remove" id="testDone">4</h2>
                                            </div>
                                            <div class="peity" height="28" width="48"></div>
                                        </div>
                                    </div>
                                </div>
                                <!--  Group 1   -->
                                <div class="chart-container" style="margin-bottom: 20px">
                                    <div class="chart">
                                        <!-- Biểu đồ 1 -->
                                        <figure class="highcharts-figure">
                                            <div id="chartQuestion"></div>
                                        </figure>
                                    </div>
                                    <div class="chart" style="margin-right: 0px">
                                        <!-- Biểu đồ 2 -->
                                        <figure class="highcharts-figure">
                                            <div id="chartTopWrong"></div>
                                        </figure>
                                    </div>
                                </div>
                                <!--  Group 2   -->
                                <div class="chart-container resize-text">
                                    <div class="chart">
                                        <!-- Biểu đồ 1 -->
                                        <figure class="highcharts-figure">
                                            <div id="chartTimeQuestion"></div>
                                        </figure>
                                    </div>
                                    <div class="chart" style="margin-right: 0px">
                                        <!-- Biểu đồ 2 -->
                                        <figure class="highcharts-figure" style="margin-right: 0px">
                                            <div id="chartPercentQuestion"></div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- HightChart -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        $.ajax({
            url: './report_test/reportTest/getChartData',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                var data = response;
                //console.log(response);

                var countTotalTestElement = document.querySelector('.countTotalTest');
                countTotalTestElement.textContent = data.totalTest[0].total_test;

                var avgTimeElement = document.querySelector('.avgTime');
                avgTimeElement.textContent = data.totalTest[0].avg_time;


                var avgPercentCorrectElement = document.querySelector('.avgPercentCorrect');
                avgPercentCorrectElement.textContent = data.totalTest[0].percent_correct + '%';

                var numTestDoneElement = document.querySelector('#testDone');
                numTestDoneElement.textContent = data.testDone[0].test_done;

                // chart bar report question
                var categories = [];
                var seriesData = [
                    {name: 'Question Pass', data: [], visible: false }, // color: '#71869d'
                    {name: 'Question Wrong', data: [], visible: false },
                    {name: 'Question Correct', data: []}
                ];

                for (var i = 0; i < data.numQuestion.length; i++) {
                    var item = data.numQuestion[i];
                    categories.push(item.test_name);
                    seriesData[0].data.push(parseFloat(item.count_pass));
                    seriesData[1].data.push(parseFloat(item.count_wrong));
                    seriesData[2].data.push(parseFloat(item.count_correct));
                }

                // chart bar report knowlege
                var categories_2 = [];
                var seriesData_2 = [
                    {name: 'Question', data: []}
                ];
                for (var i = 0; i < data.knowledgeQuestion.length; i++) {
                    var item = data.knowledgeQuestion[i];
                    categories_2.push(item.knowledge_wrong);
                    seriesData_2[0].data.push(parseFloat(item.count_wrong));
                }

                // chart bar report question
                var categories_3 = [];
                var seriesData_3 = [
                    {name: 'Question', data: [], type: 'column', yAxis: 1}, // color: '#71869d'
                    {name: 'Time', data: [], type: 'line', tooltip: {valueSuffix: 'p'}},
                ];

                for (var i = 0; i < data.timeQuestion.length; i++) {
                    var item = data.timeQuestion[i];
                    categories_3.push(item.test_name);
                    seriesData_3[0].data.push(parseFloat(item.num_question));
                    seriesData_3[1].data.push(parseFloat(item.reel_time));
                }


                // chart bar report percent
                var categories_4 = [];
                var seriesData_4 = [
                    {name: 'Question', data: [], type: 'column', yAxis: 1}, // color: '#71869d'
                    {name: 'Percent', data: [], type: 'line', tooltip: {valueSuffix: '%'}},
                ];

                for (var i = 0; i < data.percentQuestion.length; i++) {
                    var item = data.percentQuestion[i];
                    categories_4.push(item.test_name);
                    seriesData_4[0].data.push(parseFloat(item.num_question));
                    seriesData_4[1].data.push(parseFloat(item.percent_correct));
                }

                // Group 1
                // chart time | question
                Highcharts.chart('chartTimeQuestion', {
                    chart: {
                        zoomType: 'xy'
                    },
                    exporting: {
                        enabled: false
                    },
                    title: {
                        text: 'TỔNG QUAN VỀ THỜI GIAN',
                        align: 'left',
                        style: {
                            font: '500 14px/50px Roboto, sans-serif',
                            color: '#212121',
                            margin: 0,
                            float: 'left',
                            overflow: 'hidden',
                        }
                    },
                    subtitle: {
                        // subtitle
                    },
                    xAxis: [{
                        categories: categories_3,
                        crosshair: true,
                        title: {
                            text: ''
                        }
                    }],
                    yAxis: [{ // Primary yAxis
                        labels: {
                            format: '{value} p',
                            style: {
                                color: Highcharts.getOptions().colors[1]
                            }
                        },
                        title: {
                            text: 'Time',
                            style: {
                                color: Highcharts.getOptions().colors[1]
                            }
                        }
                    }, { // Secondary yAxis
                        title: {
                            text: 'Question',
                            style: {
                                color: Highcharts.getOptions().colors[0]
                            }
                        },
                        labels: {
                            format: '{value}',
                            style: {
                                color: Highcharts.getOptions().colors[0]
                            }
                        },
                        opposite: true
                    }],
                    tooltip: {
                        shared: true
                    },
                    legend: {
                        align: 'left',
                        x: 80,
                        verticalAlign: 'top',
                        y: 80,
                        floating: true,
                        backgroundColor:
                            Highcharts.defaultOptions.legend.backgroundColor || // theme
                            'rgba(255,255,255,0.25)'
                    },
                    series: seriesData_3
                });


                // chart percent | question
                Highcharts.chart('chartPercentQuestion', {
                    chart: {
                        zoomType: 'xy'
                    },
                    exporting: {
                        enabled: false
                    },
                    title: {
                        text: 'TỔNG QUAN ĐỘ CHÍNH XÁC',
                        align: 'left',
                        style: {
                            font: '500 14px/50px Roboto, sans-serif',
                            color: '#212121',
                            margin: 0,
                            float: 'left',
                            overflow: 'hidden',
                        }
                    },
                    subtitle: {
                        // subtitle
                    },
                    xAxis: [{
                        categories: categories_4,
                        crosshair: true
                    }],
                    yAxis: [{ // Primary yAxis
                        labels: {
                            format: '{value}%',
                            style: {
                                color: Highcharts.getOptions().colors[1]
                            }
                        },
                        title: {
                            text: 'Percent',
                            style: {
                                color: Highcharts.getOptions().colors[1]
                            }
                        }
                    }, { // Secondary yAxis
                        title: {
                            text: 'Question',
                            style: {
                                color: Highcharts.getOptions().colors[0]
                            }
                        },
                        labels: {
                            format: '{value}',
                            style: {
                                color: Highcharts.getOptions().colors[0]
                            }
                        },
                        opposite: true
                    }],
                    tooltip: {
                        shared: true
                    },
                    legend: {
                        align: 'left',
                        x: 80,
                        verticalAlign: 'top',
                        y: 80,
                        floating: true,
                        backgroundColor:
                            Highcharts.defaultOptions.legend.backgroundColor || // theme
                            'rgba(255,255,255,0.25)'
                    },
                    series: seriesData_4
                });

                // chart report question
                Highcharts.chart('chartQuestion', {
                    chart: {
                        type: 'bar'
                    },
                    exporting: {
                        enabled: false
                    },
                    title: {
                        text: 'TỔNG QUAN CÂU HỎI ĐÚNG/SAI',
                        align: 'left',
                        style: {
                            font: '500 14px/50px Roboto, sans-serif',
                            color: '#212121',
                            margin: 0,
                            float: 'left',
                            overflow: 'hidden',
                        }
                    },
                    subtitle: {
                        text: '',
                        align: 'left'
                    },
                    xAxis: {
                        categories: categories,
                        title: {
                            text: null
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: '',
                            align: 'high'
                        },
                        labels: {
                            overflow: 'justify'
                        }
                    },
                    tooltip: {
                       // valueSuffix: ' $'
                    },
                    plotOptions: {
                        bar: {
                            dataLabels: {
                                enabled: true
                            }
                        },
                        series: {
                            stacking: 'normal',
                            dataLabels: {
                                enabled: true
                            }
                        }
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'top',
                        x: -40,
                        y: 80,
                        floating: true,
                        borderWidth: 1,
                        backgroundColor:
                            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
                        shadow: true
                    },
                    credits: {
                        enabled: false
                    },
                    series: seriesData
                });

                // chart top knowlege | upgrade
                Highcharts.chart('chartTopWrong', {
                    chart: {
                        type: 'bar'
                    },
                    exporting: {
                        enabled: false
                    },
                    title: {
                        text: 'TỔNG QUAN KIẾN THỨC CẦN CẢI THIỆN',
                        align: 'left',
                        style: {
                            font: '500 14px/50px Roboto, sans-serif',
                            color: '#212121',
                            margin: 0,
                            float: 'left',
                            overflow: 'hidden',
                        }
                    },
                    subtitle: {
                        text: '',
                        align: 'left'
                    },
                    xAxis: {
                        categories: categories_2,
                        title: {
                            text: null
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: '',
                            align: 'high'
                        },
                        labels: {
                            overflow: 'justify'
                        }
                    },
                    tooltip: {
                        //valueSuffix: ' $'
                    },
                    plotOptions: {
                        bar: {
                            dataLabels: {
                                enabled: true
                            }
                        },
                        series: {
                            stacking: 'normal',
                            dataLabels: {
                                enabled: true
                            }
                        }
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'top',
                        x: -40,
                        y: 80,
                        floating: true,
                        borderWidth: 1,
                        backgroundColor:
                            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
                        shadow: true
                    },
                    credits: {
                        enabled: false
                    },
                    series: seriesData_2
                });
            },
            error: function (xhr, status, error) {
                // Xử lý lỗi khi gọi API
                console.log(error);
            }
        });
    });
</script>
<?= $this->endSection(); ?>



