@extends('modules.main')

@section('content')
    @if (empty($items))
        <div><span>No history for this module</span></div>
    @else
        <div>
            <h4>Module "{{ $moduleName }}" (type {{ $moduleType }})</h4>
            <table class="table" id="history-table">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Value</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->value }}</td>
                            <td>{{ $item->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
