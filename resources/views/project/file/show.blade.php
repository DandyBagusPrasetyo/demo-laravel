@extends('layouts.app', ['title' => 'Show Document'])

@section('css')

@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Project Details</h4>
        </div>
        <div class="card-body">

            @if ($extension == 'pdf')
                <iframe height="1000" width="100%"
                    src="{{ asset('storage/project/file/' . $doc->project_id . '/' . $doc->file) }}"
                    frameborder="0"></iframe>
            @else
                <h1>Document Ms Office hanya bisa di load ketika server sudah live di hosting!</h1>
                <br>
                <iframe
                    src='https://view.officeapps.live.com/op/view.aspx?src={{ url(asset('storage/project/file/' . $doc->project_id . '/' . $doc->file)) }}'
                    width='1366px' height='623px' frameborder='0'>This is an embedded <a target='_blank'
                        href='http://office.com'>Microsoft Office</a> document, powered by <a target='_blank'
                        href='http://office.com/webapps'>Office Online</a>.</iframe>
            @endif
        </div>
        <div class="card-footer">
            Footer Card
        </div>
    </div>
@endsection

@section('js')

@endsection
