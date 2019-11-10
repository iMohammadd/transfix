@extends('admin.master')

@section('title', 'Todo')
@section('style')
    <style>
        a.none-decoration {
            text-decoration: none;
        }
        div.card, i.fa-clipboard-list {
            transition: ease .5s;
        }
    </style>
@stop
@section('content')
    @foreach($todoes->chunk(3) as $chuncked)
        <div class="row mb-4">
            @foreach($chuncked as $todo => $items)
                <div class="col">

                    <a href="{{ route('todo.show', $items[0]->project_id) }}" class="none-decoration">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            {{ $todo }}
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            {{ count($items) }} Sentence(s) Available
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endforeach
    <!--<div class="row">
        <div class="col-md-12">
            <div class="card border-left-info">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Todo
                    </h6>
                </div>
                <div class="card-body">
                    <ul>
                    @foreach($todoes as $key => $val)

                            <li>{{ $key }}</li>
                            <ul>
                                @foreach($val as $todo)
                                    <li>{{ $todo->key }} = {{ $todo->value }}</li>
                                @endforeach
                            </ul>

                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>-->
@stop
@section('script')
    <script>
        $(".card").hover(
            function () {
                $(this).removeClass('shadow-sm');
                $(this).removeClass('border-left-warning');

                $(this).addClass('shadow');
                $(this).addClass('border-left-success');

                $(this)
                    .children('.card-body')
                    .children('.row')
                    .children('.col-auto')
                    .children('i')
                    .removeClass('text-gray-300');

                $(this)
                    .children('.card-body')
                    .children('.row')
                    .children('.col-auto')
                    .children('i')
                    .addClass('text-gray-900');
            },
            function () {
                $(this).removeClass('shadow');
                $(this).addClass('shadow-sm');

                $(this).addClass('border-left-warning');
                $(this).removeClass('border-left-success');

                $(this)
                    .children('.card-body')
                    .children('.row')
                    .children('.col-auto')
                    .children('i')
                    .removeClass('text-gray-900');

                $(this)
                    .children('.card-body')
                    .children('.row')
                    .children('.col-auto')
                    .children('i')
                    .addClass('text-gray-300');
            }
        );
    </script>
@stop