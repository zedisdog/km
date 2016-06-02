@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">搜索{{ $query }}</div>

                    <div class="panel-body">
                        <div class="table-responsive">

                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>{{ trans('common.title') }}</th>
                                    <th>{{ trans('common.created_at') }}</th>
                                    <th>{{ trans('common.updated_at') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($topics as $topic)
                                <tr>
                                    <td><a href="{{ route('topic.show',['id' => $topic->id]) }}">{{ $topic->title }}</a></td>
                                    <td>{{ $topic->created_at }}</td>
                                    <td>{{ $topic->updated_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection