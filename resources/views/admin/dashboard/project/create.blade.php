@extends('admin.master')

@section('title', 'Create Project')
@section('style')
    <style>
        html, body {
            height: 100%;
        }

        .container {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .back {
            color: orangered;
            cursor: pointer;
            transition: ease .5s;
        }

        .back:hover {
            color: darkred;
        }

        .container > .items {
            padding: 25%;
            cursor: pointer;
            transition: ease .5s;
        }

        .step-2 {
            display: none;
        }

        .step-1 > .row, .step-2 > .row {
            transition: ease .5s;
        }
    </style>
@stop
@section('content')

    <div class="step-1">
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <h1>Choose File Type</h1>
                <div class="card shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->

                        <div class="container">
                            <div class="bg-gray-200 border-bottom-success items po">
                                <h3>
                                    <i class="fa fa-briefcase fa-lg"></i><br>
                                    PO
                                </h3>
                            </div>
                            <div class="bg-gray-400 border-bottom-info items ini">
                                <h3>
                                    <i class="fa fa-briefcase fa-lg"></i><br>
                                    INI
                                </h3>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="step-2">
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-9">
                <h1><span id="project_type"></span> <i class="fa fa-times back"></i></h1>
                <div class="card shadow-lg my-5 border-bottom-info">
                    <div class="card-body p-0">
                        <div class="container">
                            <form method="post" action="{{ route('project.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-2 mt-2">
                                    <div class="col-12">
                                        <div class="form-row mb-2">
                                            <div class="col">
                                                <input class="form-control" type="text" name="title" id="title" placeholder="Title">
                                            </div>
                                            <div class="col">
                                                <div class="custom-file">
                                                    <input type="file" name="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="driver" id="driver" value="">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary form-control">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        $('.items').hover((item) => {
            if(item.target.classList.contains('bg-gray-200')) {
                    item.target.classList.remove('bg-gray-200');
                    item.target.classList.add('bg-gray-300');
                //console.log(item.target.classList)
            }

            if(item.target.classList.contains('bg-gray-400')) {
                item.target.classList.remove('bg-gray-400');
                item.target.classList.add('bg-gray-500');
            }
        }, (item) => {
            if(item.target.classList.contains('bg-gray-300')) {
                item.target.classList.remove('bg-gray-300');
                item.target.classList.add('bg-gray-200');
            }

            if(item.target.classList.contains('bg-gray-500')) {
                item.target.classList.remove('bg-gray-500');
                item.target.classList.add('bg-gray-400');
            }
        });

        $('.items').click((item) => {
            $('.step-2').show();
            $('.step-1').hide();

            var driver = $("#driver");
            var title = $("#project_type");
            var _is_po = item.target.classList.contains('po');
            var _is_ini = item.target.classList.contains('ini');

            if (_is_ini)  {
                console.log('ini clicked');
                driver.val('Ini');
                title.text('INI Project');
            }

            if (_is_po) {
                console.log('po clicked');
                driver.val('Po');
                title.text('PO Project');
            }
        });

        $(".back").click(() => {
            $('.step-2').hide();
            $('.step-1').show();
        });

    </script>
@stop