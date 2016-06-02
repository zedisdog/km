@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('common.topic.create') }}</div>

                    <div class="panel-body">
                        @include('common.show-error')
                        <div class="editor">
                            {!! Form::open(['url' => route('topic.store')]) !!}
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