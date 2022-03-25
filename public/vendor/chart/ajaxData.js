$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var ajax_dashboard_module = {
    getMonthsPrint: function(callback) {
        var dateI = document.getElementById("dateI").value;
        var dateF = document.getElementById("dateF").value;
        data = 'dateI=' + dateI + '&dataF=' + dateF;
        $.ajax({
            method: "POST",
            url: "/admin/ajax/monthsPrint",
            data: data,
            success: function(r) {
                callback(r);
            },
        });
    },
    getMonthPrint: function() {
        var dateI = document.getElementById("dateI").value;
        var dateF = document.getElementById("dateF").value;
        data = 'dateI=' + dateI + '&dateF=' + dateF;
        $.ajax({
            method: "POST",
            url: "/admin/ajax/monthPrint",
            data: data,
            success: function(r) {
                $('#monthPrint').html('')
                    .html(r.monthPrint);

            },
        });
    },
    getColorPrint: function(id, bool) {
        var dateI = document.getElementById("dateI").value;
        var dateF = document.getElementById("dateF").value;
        data = 'dateI=' + dateI + '&dateF=' + dateF + '&color=' + bool;
        $.ajax({
            method: "POST",
            url: "/admin/ajax/colorPrint",
            data: data,
            success: function(r) {
                $(id).html('')
                    .html(r.colorPrint);
            }
        });
    },
    getMostPrinter: function() {
        var dateI = document.getElementById("dateI").value;
        var dateF = document.getElementById("dateF").value;
        data = 'dateI=' + dateI + '&dateF=' + dateF;
        $.ajax({
            method: "POST",
            url: "/admin/ajax/mostPrinter",
            data: data,
            success: function(r) {
                $('#mostPrinter').html('')
                    .html(parseFloat(r.mostPrinter).toFixed(2));
            }
        });
    },
    getValuePrinter: function(val, callback) {
        var dateI = document.getElementById("dateI").value;
        var dateF = document.getElementById("dateF").value;
        data = 'dateI=' + dateI + '&dateF=' + dateF + '&val=' + val;
        $.ajax({
            method: "POST",
            url: "/admin/ajax/valuePrinter",
            data: data,
            success: function(r) {
                callback(r);
            }
        });
    },
    getTypePrint: function() {
        var dateI = document.getElementById("dateI").value;
        var dateF = document.getElementById("dateF").value;
        data = 'dateI=' + dateI + '&dateF=' + dateF;
        $.ajax({
            method: "POST",
            url: "/admin/ajax/typePrint",
            data: data,
            success: function(r) {
                typeChart.data.datasets[0].data = [];
                typeChart.data.datasets[1].data = [];
                typeChart.update();
                if (r.typePrint.color) {
                    typeChart.data.datasets[0].data.push(r.typePrint.color);
                    typeChart.data.datasets[1].data.push(parseFloat(r.typePrint.color_price).toFixed(2));
                }
                if (r.typePrint.black) {
                    typeChart.data.datasets[0].data.push(r.typePrint.black);
                    typeChart.data.datasets[1].data.push(parseFloat(r.typePrint.black_price).toFixed(2));
                }
                typeChart.update();
            }
        });
    },
    getPeoplePrint: function() {
        var dateI = document.getElementById("dateI").value;
        var dateF = document.getElementById("dateF").value;
        data = 'dateI=' + dateI + '&dateF=' + dateF;
        $.ajax({
            method: "POST",
            url: "/admin/ajax/peoplePrint",
            data: data,
            success: function(r) {
                peopleChart.data.labels = [];
                peopleChart.data.datasets[0].data = [];
                peopleChart.update();
                for (key in r.peoplePrint) {
                    if (r.peoplePrint.hasOwnProperty(key)) {
                        peopleChart.data.labels.push(r.peoplePrint[key].User);
                        peopleChart.data.datasets[0].data.push(r.peoplePrint[key].Total)
                    }
                }
                peopleChart.update();
            }
        });
    },
    getPeopleValuePrint: function() {
        var dateI = document.getElementById("dateI").value;
        var dateF = document.getElementById("dateF").value;
        data = 'dateI=' + dateI + '&dateF=' + dateF;
        $.ajax({
            method: "POST",
            url: "/admin/ajax/peopleValuePrint",
            data: data,
            success: function(r) {
                peopleValueChart.data.labels = [];
                peopleValueChart.data.datasets[0].data = [];
                peopleValueChart.update();
                for (key in r.peopleValuePrint) {
                    if (r.peopleValuePrint.hasOwnProperty(key)) {
                        peopleValueChart.data.labels.push(r.peopleValuePrint[key].User);
                        peopleValueChart.data.datasets[0].data.push(parseFloat(r.peopleValuePrint[key].Total).toFixed(2));
                    }
                }
                peopleValueChart.update();
            }
        });
    },
    getPrinterName: function(name, callback) {
        var data = 'name=' + name;
        $.ajax({
            method: "POST",
            url: "/admin/ajax/namePrinter",
            data: data,
            success: function(r) {
                callback(r.namePrinter.printer_name);
            }
        });
    },
    getMonths_: function(id) {
        ajax_dashboard_module.getMonthsPrint(function(r) {
            if (id == 'Total') {
                monthChart.data.labels = [];
                monthChart.data.datasets[0].data = [];
                monthChart.data.datasets[1].data = [];
                monthChart.data.datasets[2].data = [];
                monthChart.update();
                for (key in r.monthsPrint) {
                    if (r.monthsPrint.hasOwnProperty(key)) {
                        monthChart.data.labels.push(r.months[key]);
                        monthChart.data.datasets[0].data.push(r.monthsPrint[key][id]);
                        monthChart.data.datasets[1].data.push(r.monthsPrint[key].Black);
                        monthChart.data.datasets[2].data.push(r.monthsPrint[key].Color);
                    }
                }
                monthChart.update();
            } else if (id == 'Value') {
                monthValueChart.data.labels = [];
                monthValueChart.data.datasets[0].data = [];
                monthValueChart.data.datasets[1].data = [];
                monthValueChart.data.datasets[2].data = [];
                monthValueChart.update();
                for (key in r.monthsPrint) {
                    if (r.monthsPrint.hasOwnProperty(key)) {
                        monthValueChart.data.labels.push(r.months[key]);
                        monthValueChart.data.datasets[0].data.push(parseFloat(r.monthsPrint[key][id]).toFixed(2));
                        monthValueChart.data.datasets[1].data.push(parseFloat(r.monthsPrint[key].Black_value).toFixed(2));
                        monthValueChart.data.datasets[2].data.push(parseFloat(r.monthsPrint[key].Color_value).toFixed(2));
                    }
                }
                monthValueChart.update();
            }
        });
    },
    getPrinters_: function(id) {
        ajax_dashboard_module.getValuePrinter(id, function(r) {
            if (id == 'Value') {
                valuePrinterChart.data.labels = [];
                valuePrinterChart.data.datasets[0].data = [];
                valuePrinterChart.update();
                for (key in r.valuePrinter) {
                    if (r.valuePrinter.hasOwnProperty(key)) {
                        valuePrinterChart.data.labels.push(r.valuePrinter[key].Printer);
                        valuePrinterChart.data.datasets[0].data.push(parseFloat(r.valuePrinter[key][id]).toFixed(2));
                    }
                    valuePrinterChart.update();
                }
            } else if (id == 'Total') {
                totalPrinterChart.data.labels = [];
                totalPrinterChart.data.datasets[0].data = [];
                totalPrinterChart.update();
                for (key in r.valuePrinter) {
                    if (r.valuePrinter.hasOwnProperty(key)) {
                        totalPrinterChart.data.labels.push(r.valuePrinter[key].Printer);
                        totalPrinterChart.data.datasets[0].data.push(r.valuePrinter[key][id]);
                    }
                    totalPrinterChart.update();
                }
            }
        });
    },
    refreshData: function() {
        $(document).ajaxStart($.blockUI({ message: '<small>Carregando...</small><br><img src="/img/loading.gif"/>' })).ajaxStop($.unblockUI);
        ajax_dashboard_module.getMonths_('Total');
        ajax_dashboard_module.getMonths_('Value');
        ajax_dashboard_module.getMonthPrint();
        ajax_dashboard_module.getColorPrint('#colorPrint', 1);
        ajax_dashboard_module.getColorPrint('#blackPrint', 0);
        ajax_dashboard_module.getMostPrinter();
        ajax_dashboard_module.getPrinters_('Value');
        ajax_dashboard_module.getPrinters_('Total');
        ajax_dashboard_module.getTypePrint();
        ajax_dashboard_module.getPeoplePrint();
        ajax_dashboard_module.getPeopleValuePrint();
    },
};
