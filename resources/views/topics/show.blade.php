@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                      {{ $title or 'none'}}
                      @if(isset($title))
                      <a title="{{ trans("topic.edit") }}" href="{{ route('topic.edit',['id' => $id]) }}" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                      @endif
                    </div>

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
