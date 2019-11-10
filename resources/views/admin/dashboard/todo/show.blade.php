@extends('admin.master')

@section('title', $project->title)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        {{ $project->title }}
                    </h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Project:</div>
                            <a class="dropdown-item" href="{{ route('project.create') }}">Create new Project</a>
                            <!--<a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>-->
                        </div>
                    </div>
                </div>
                    <div class="container mt-3 mb-3">
                        <div class="row">
                            <div class="form-group col-6">
                                <ul class="list-group">
                                    @foreach($sentences as $sentence)
                                        <li data-id="{{ $sentence->id }}" data-val="{!! $sentence->value !!}" class="list-group-item">{{ $sentence->key }}<br><span id="value-{{ $sentence->id }}">{{ $sentence->value }}</span> </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="form-group col-6">
                                <div class="row">
                                    <textarea rows="10" class="form-control" id="editor">{!! $sentences[0]->value !!}</textarea>
                                    <input type="hidden" id="id" value="{{ $sentences[0]->id }}">
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <button onclick="save()" class="btn btn-primary form-control">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script src="{{ asset('admin/plugin/axios.min.js') }}"></script>
    <script src="{{ asset('admin/plugin/sweetalert2@9.js') }}"></script>
    <script>
        var token = document.head.querySelector('meta[name="csrf-token"]');
        window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;

        $('li.list-group-item').first().addClass('active');

        var activeSentence = $('li.list-group-item.active');

        var id = '{{ $sentences[0]->id }}';
        var this_value = '{!! $sentences[0]->value !!}';


        var editor = $('#editor');
        var formId = $('#id');

        var saved = true;

        editor.change(() => {
            saved = false;
        });

        $('li').click(function () {

            if(saved === true ) {
                activeSentence = $(this);

                //setValue();

                id = $(this).attr('data-id');
                this_value = $(this).attr('data-val');
                console.log(id);
                console.log(this_value);
                editor.val(this_value);
                formId.val(id);

                $('li').removeClass('active');
                $(this).addClass('active');

                //saved = false;
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'You don\'t saved the edited sentence',
                })
            }
        });

        var getValue = () => {
            id = activeSentence.data('id');
            this_value = editor.val();

            console.warn('active value : ' + this_value);
            console.warn('active id : ' + id);
        }

        var save = () => {
            var myId = formId.val();
            var myValue = editor.val();
            var span = $("#value-" + myId );
            var url = "/todo/sentence/" + myId + "/update";
            var li = $("li.active");
            //console.log("selected li data is: " + li.data('val'));
            //console.log(span);
            window.axios.post(url, {
                value: myValue
            })
                .then((resp) => {
                    console.log(resp.data);
                    span.text(resp.data.value);
                    li.attr('data-val', resp.data.value);
                    saved = true;
                })
                .catch((err) => {
                    console.error(err);
                });
        }

        //getValue();
    </script>
@stop