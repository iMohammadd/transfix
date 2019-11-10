@extends('admin.master')

@section('title', 'Dashboard')
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
    @can('manage')

        @foreach($projects->chunk(3) as $chuncked)
            <div class="row mb-4">
                @foreach($chuncked as $project)
                    <div class="col">
                        <a href="{{ route('project.show', $project) }}" class="none-decoration">
                            <div class="card border-left-warning shadow-sm h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                {{ $project->title }}
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ count($project->sentences) }} Sentence(s) Available
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
    @endcan
@stop
@section('script')
    <script>
        $(".card").hover(
            function () {
                $(this).removeClass('shadow-sm');
                $(this).removeClass('border-left-warning');

                $(this).addClass('shadow');
                $(this).addClass('border-left-success');

                // $(this).children('i').removeClass('text-gray-300');
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

                //console.log($(this).children().children().children()[1]);
                //console.log($(this).children('i').removeClass('text-gray-300'));
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