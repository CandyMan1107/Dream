google.charts.load('current', {'packages':['timeline']});

function ready(data){
	var datas = data;

	console.log(datas[0]['event_name']);
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {

	// console.log(datas[0]['event_name']);
	var arrayLength = datas.length;
	// console.log(arrayLength);

	var events = new Array();



	var container = document.getElementById('timeline');
	var chart = new google.visualization.Timeline(container);
	var dataTable = new google.visualization.DataTable();
	
	dataTable.addColumn({ type: 'string', id: 'President', name : '123213' });
	dataTable.addColumn({ type: 'date', id: 'Start' });
	dataTable.addColumn({ type: 'date', id: 'End' });

	for ( var i = 0; i < arrayLength ; i++ ){
		dataTable.addRows([
			[datas[i]['event_name'], new Date(datas[i]['start_day']), new Date(datas[i]['end_day'])],
		]);
	}
	// dataTable.addRows([
	// [ 'Washington', new Date(1789,03, 30), new Date(1797, 2, 4) ],
	// [ 'Adams',      new Date(1797, 2, 4),  new Date(1801, 2, 4) ],
	// [ 'Jefferson',  new Date(1801, 2, 4),  new Date(1809, 2, 4) ]
	// ]);

	// chart.addOneTimeListner();
	chart.draw(dataTable);
	}
}

