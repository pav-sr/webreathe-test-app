@extends('modules.main')

@section('content')
    <div style="padding-left: 10px; padding-top: 10px; margin: auto; width: 50%">
        <h4>Create module</h4>
        <form action="{{ url('/modules') }}" method="POST">
            @method('POST')
            @csrf
            <div class="mb-3" style="width: 250px">
                <label class="form-label" for="name-input">Name</label>
                <input type="text" class="form-control @error('type') is-invalid @enderror" id="name-input" name="name"/>
            </div>
            <div class="mb-3" style="width: 250px">
                <label class="form-label" for="type-input">Type</label>
                <input type="text" class="form-control @error('type') is-invalid @enderror" id="type-input" name="type"/>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Submit</button>
        </form>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('type')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('exception')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
@endsection
