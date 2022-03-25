var monthChartCanvas = $('#monthChart').get(0).getContext('2d');
var monthChart = new Chart(monthChartCanvas, {
    type: 'line',
    data: {
        labels: [],
        datasets: [{
            label: 'Total',
            data: [],
            backgroundColor: 'rgba(60,141,188)',
            borderColor: 'rgba(60,141,188)',
            borderWidth: 1,
            fill: false,
            showLine: true,
        }, {
            label: 'Preto',
            data: [],
            borderColor: 'rgba(0,0,0)',
            borderWidth: 1,
            fill: false,
            showLine: true,
        }, {
            label: 'Colorida',
            data: [],
            borderColor: 'rgba(255,0,0)',
            borderWidth: 1,
            fill: false,
            showLine: true,
        }, ],
    },
    options: {
        responsive: true,
    },
});

var monthValueChartCanvas = $('#monthValueChart').get(0).getContext('2d');
var monthValueChart = new Chart(monthValueChartCanvas, {
    type: 'line',
    data: {
        labels: [],
        datasets: [{
            label: 'Total',
            data: [],
            backgroundColor: 'rgba(60,141,188)',
            borderColor: 'rgba(60,141,188)',
            borderWidth: 1,
            fill: false,
            showLine: true,
        }, {
            label: 'Preto',
            data: [],
            borderColor: 'rgba(0,0,0)',
            borderWidth: 1,
            fill: false,
            showLine: true,
        }, {
            label: 'Colorida',
            data: [],
            borderColor: 'rgba(255,0,0)',
            borderWidth: 1,
            fill: false,
            showLine: true,
        }, ],
    },
    options: {
        responsive: true,
    },
});

var valuePrinterChartCanvas = document.getElementById('valueChart').getContext('2d');
var valuePrinterChart = new Chart(valuePrinterChartCanvas, {
    type: 'bar',
    data: {
        labels: [],
        datasets: [{
            label: 'Valor',
            data: [],
            backgroundColor: 'rgba(0, 155, 90)',
            borderWidth: 1,
        }],
    },
    options: {
        responsive: true,
    },
});

var typeChartCanvas = $('#typeChart').get(0).getContext('2d');
var typeChart = new Chart(typeChartCanvas, {
    type: 'bar',
    data: {
        labels: ['Colorido', 'Preto'],
        datasets: [{
            label: 'Quantidade',
            data: [],
            backgroundColor: 'rgba(0,155,90)',
            borderWidth: 1,
        }, {
            label: 'Valor',
            data: [],
            backgroundColor: 'rgba(60,141,188,0,9)',
            borderWidth: 1,
        }],
    },
    options: {
        responsive: true,
    },
});

var peopleChartCanvas = $('#peopleChart').get(0).getContext('2d')
var peopleChart = new Chart(peopleChartCanvas, {
    type: 'bar',
    data: {
        labels: [],
        datasets: [{
            label: 'Impressoras',
            data: [],
            backgroundColor: 'rgba(0,155,90)',
            borderWidth: 1,
        }],
    },
    options: {
        responsive: true,
    },
});

var peopleValueChartCanvas = $('#peopleValueChart').get(0).getContext('2d')
var peopleValueChart = new Chart(peopleValueChartCanvas, {
    type: 'bar',
    data: {
        labels: [],
        datasets: [{
            label: 'Valor por Usuario',
            data: [],
            backgroundColor: 'rgba(0,155,90)',
            borderWidth: 1,
        }],
    },
    options: {
        responsive: true,
    },
});

var totalPrinterChartCanvas = $('#totalPrinterChart').get(0).getContext('2d')
var totalPrinterChart = new Chart(totalPrinterChartCanvas, {
    type: 'bar',
    data: {
        labels: [],
        datasets: [{
            label: 'Impressoras',
            data: [],
            backgroundColor: 'rgba(0,155,90)',
            borderWidth: 1,
        }],
    },
    options: {
        responsive: true,
    },
});