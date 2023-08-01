<script src="{{ asset('js/notify.min.js') }}"></script>
<script>
    $(function () {
        let request = function () {
            axios({
                method: 'get',
                url: "{{ url('api/modules/failed') }}",
                responseType: 'json'
            }).then(function (response) {
                $.each(response.data, function (index) {
                    let failed = response.data[index];
                    $.notify(`"${failed.name}" failed`, { position: "top-left" });
                });
            });
        };
        setInterval(request, 10000);
    });
</script>
