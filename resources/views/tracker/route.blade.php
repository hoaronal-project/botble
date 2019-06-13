@extends('tracker.layout')
@section('page-contents')
    <table class="table table-bordered" id="route-table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Action</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        </thead>
    </table>
    @stop
@section('required-scripts-bottom')

    <script>
        $(function() {
            $('#route-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('tracker.route') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'action', name: 'action' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' }
                ]
            });
        });
    </script>
@stop
