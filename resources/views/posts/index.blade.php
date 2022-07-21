@extends('app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Post information</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Row</th>
                    <th>Owner</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Row</th>
                    <th>Owner</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                </tr>
                </tfoot>
                <tbody>
                @if($posts)
                @foreach($posts as $post)
                    <tr>
                        <td>{{$counter++}}</td>
                         <td>{{$post->user->username}}</td>
                        <td>{{$post->title}}</td>
                        <td>
                            <img src="{{'storage/images/'.$post->img}}" height="40px" alt="">
                        </td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td>{{$post->updated_at->diffForHumans()}}</td>
                        <td>

                        </td>
                    </tr>
                @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
