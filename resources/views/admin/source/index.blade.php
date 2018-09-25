@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sources</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <a href="{{route('source.create')}}" class="btn btn-primary">Add New</a>

                <br>
                <br>
                <!-- Table -->

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>URL</th>
                            <th>CREATED AT</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($records as $record)
                        <tr>
                            <td scope="row">{{$record->id}}</td>
                            <td>{{$record->url}}</td>
                            <td>{{$record->created_at->format('d.m.Y H:i')}}</td>
                            <td><a href="#" onclick="deleteSource(event, {{$record->id}})">Delete</a></td>
                            <td>
                                
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td rowspan="3">
                                <p>Not found. Please add one.</p> 
                                <p><a href="{{route('source.create')}}" class="btn btn-primary">Add</a></p>
                            </td>
                        </tr>

                        @endforelse
                    </tbody>
                </table>

                <form id="source-delete-form" action="{{route('source.destroy')}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input id="deleteID" type="hidden" name="id" value="">
                </form>

                <script>


                    function deleteSource(event, id){
                        console.log('delete');
                        console.log(id);
                        event.preventDefault();
                        $("#deleteID").val(id);
                        document.getElementById('source-delete-form').submit();
                    }
                </script>

                <!-- Table -->

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
