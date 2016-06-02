@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $title or 'none'}}</div>

                    <div class="panel-body">
                        {!! $content or 'no topic' !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('foot')
    @include('editor::decode')
@endsection
