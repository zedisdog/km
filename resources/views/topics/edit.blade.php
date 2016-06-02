@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('common.topic.edit') }}</div>

                    <div class="panel-body">
                        @include('common.show-error')
                        <div class="editor">
                            {!! Form::model($topic,['method' => 'PATCH','url' => route('topic.update',['id' => $topic->id])]) !!}
                            @include('topics.form')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('foot')
    @include('editor::head')
@endsection