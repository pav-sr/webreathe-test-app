@extends('modules.main')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
       .label {
           font-weight: bold;
       }
    </style>

    <script>
        $(function () {
            let values = [];
            const request = function () {
                axios({
                    method: 'get',
                    url: "{{ url('api/modules/'.$module->id) }}",
                    responseType: 'json'
                }).then(function (response) {
                    const module = response.data;
                    $('#module-container *').remove();
                    $('#module-container').append(
                        `<div><span class="label">Name: </span><span>${module.name}</span></div>` +
                        `<div><span class="label">Current value:</span><span>${module.value}</span></div>` +
                        `<div><span class="label">Status:</span><span>${module.status}</span></div>` +
                        `<div><span class="label">Type:</span><span>${module.type}</span></div>` +
                        `<div><span class="label">Data items:</span><span>${module.data_items}</span></div>` +
                        `<div><span class="label">Operating time:</span><span>${module.time}</span></div>`
                    )
                    values.push(module.value);
                });
            };
            const requestHistory = function () {
                axios({
                    method: 'get',
                    url: "{{ url('api/history/'.$module->id) }}",
                    responseType: 'json'
                }).then(function (response) {
                    draw(response.data);
                });
            };

            let chart = null;

            const draw = function (history) {
                const ctx = document.getElementById('module-chart');

                const slicedHistory = history.slice(-10);

                const labels = slicedHistory.map(item => item.created_at);
                const values = slicedHistory.map(item => item.value);

                if (chart) {
                    chart.data.datasets[0].data = values;

                    chart.update('none');
                }
                chart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: 'Value',
                                data: values,
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: 'Value changes'
                            }
                        },
                    }
                });
            };


            request();
            requestHistory();

            setInterval(request, 5000);
            setInterval(requestHistory, 5000);
        });
    </script>
    <div style="margin-left: 5px">
        <h4>Module {{ $module->name }}</h4>
        <div class="container" id="module-container" style="margin-left: 1px"></div>
    </div>
    <div style="width: 700px; margin-left: 5px">
        <canvas id="module-chart"></canvas>
    </div>
    <div style="margin-top: 10px; margin-left: 5px">
        <a href="{{ url('/modules') }}" class="btn btn-primary mb-3">To modules list</a>
    </div>
@endsection
