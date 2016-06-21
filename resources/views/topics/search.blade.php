@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-info">
                    <div class="panel-heading">搜索{{ $query }}</div>

                    <div class="panel-body">
                        @foreach($topics as $topic)
                        <div class="bg-info">
                            <h4>
                                <a href="{{ route('topic.show',['id' => $topic->id]) }}">
                                    {!! $topic->title !!}
                                </a>
                            </h4>
                            <span>创建于：{{ $topic->created_at }}</span>&nbsp;<span>更新于：{{ $topic->updated_at }}</span>
                            <div>
                                {!! $topic->content !!}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection