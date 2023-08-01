@extends('modules.main')

@section('content')
    <script>
        let request = function () {
            let historyUrlString = "{{ url('history/{moduleId}') }}";
            let detailsUrlString = "{{ url('modules/{id}') }}";
            axios({
                method: 'get',
                url: "{{ url('api/modules') }}",
                responseType: 'json'
            }).then(function (response) {
                $('#modules-table tbody *').remove();
                $.each(response.data, function (index) {
                    let module = response.data[index];
                    let historyLink = `<a href="${historyUrlString.replace('{moduleId}', module.id)}">History</href>`;
                    let detailsLink = `<a href="${detailsUrlString.replace('{id}', module.id)}">Details</href>`;

                    $('#modules-table tbody').append(
                        "<tr>" +
                        "<td>" + module.name + "</td>" +
                        "<td>" + module.type + "</td>" +
                        "<td>" + module.value + "</td>" +
                        "<td>" + module.status + "</td>" +
                        "<td>" + module.data_items + "</td>" +
                        "<td>" + module.time + "</td>" +
                        "<td>" + historyLink + "</td>" +
                        "<td>" + detailsLink + "</td>" +
                        "</tr>"
                    );
                });
            })
        };

        $(function() {
            request();
            setInterval(request, 5000);
            $('#add-module-button').on('click', function () {
                window.location = "{{ url('modules/create') }}";
            });
        });
    </script>
    <div>
        <div style="margin-right: 5px; margin-top: 5px; margin-bottom: 5px; text-align: right">
            <a type="button" class="btn btn-primary" id="add-module-button">Add module</a>
        </div>
        <table class="table" id="modules-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Current value</th>
                    <th>Status</th>
                    <th>Data items</th>
                    <th>Operating times</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection
