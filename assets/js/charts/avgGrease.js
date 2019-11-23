export default function avgGrease(Highcharts) {
    let dados = JSON.parse($('#container').attr('data-dados'))

    let masc = dados.filter(
         (dado) => {
            if (dado.sex == "MASCULINO")
                return dado.average
        }
    )

    let feminino = dados.filter(
        (dado) => {
            if(dado.sex == "FEMININO")
                return dado.average
        }
    )

    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Média de Gordura Corporal por Sexo'
        },
        xAxis: {
            categories: [
                'POLLOCK7D',
                'POLLOCK3D',
                'PETROSKY',
                'THORLAND7D',
                'THORLAND3D'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Porcentagem (%)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}%</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Masculino',
            data: masc.map((x) => { return x.average } )

        }, {
            name: 'Feminino',
            data: feminino.map((x) => { return x.average } )

        }]
    });
}
