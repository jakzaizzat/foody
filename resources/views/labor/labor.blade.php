@extends('layouts.master')



@section('content')
    @include('layouts.navbar')

    <!-- Page Content -->
    <!-- ============================================================== -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">{{ $recipe->name }}</h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <a href="/recipe/{{ $recipe->id  }}/utilities" class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Next to Utilities</a>
                    <ol class="breadcrumb">
                        <li class="active"><a href="/recipes">Dashboard</a></li>
                        <li class="active"><a href="/recipe/{{ $recipe->id  }}/items">Ingredient</a></li>
                        <li class="active">Labor</li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->

            </div>
            <!-- /.row -->

            <div class="progress progress-lg">
                <div class="progress-bar progress-bar-success" role="progressbar" style="width: 66%; role="progressbar""> 66% </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="row">
            <div class="col-lg-6 col-md-offset-2 col-sm-12 col-md-6">
                <div class="panel">
                    <div class="p-20">
                        <div class="row">
                            <div class="col-xs-8">
                                <h4 class="m-b-0">List items</h4>
                                <h2 class="m-t-0 font-medium">Labor Cost</h2>
                            </div>
                            <div class="col-xs-4 p-20">
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer bg-extralight">
                        <ul class="earning-box">

                            @foreach($labors as $labor)
                                <li>
                                    <div class="er-row">
                                        <div class="er-text">
                                            <h3>{{ $labor->name }}</h3><span class="text-muted">RM{{ $labor->salary  }}/{{ $labor->time_based  }}</span></div>
                                        <div class="er-count ">
                                            <span class="counter">

                                                RM {{ number_format($labor->cost, 2, '.', ',')  }}
                                            </span>

                                            <form method="post" action="{!! action('LaborController@deleteList', $labor->id ) !!}" style="display: inline-block;">
                                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                                <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                                                <div>
                                                    <button type="submit" class="btn btn-xs"><i class="fa fa-times delete_icon"></i></button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </li>
                            @endforeach

                            <li class="center">
                                <a class="btn btn-rounded btn-danger btn-block p-10" data-toggle="modal" data-target="#responsive-modal">Add New Item</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-lg-3 col-sm-5">
                <div class="white-box">
                    <h3 class="box-title">What is Labor Cost?</h3>
                    <hr>
                    <h4><i class="ti-user"></i> Sum of all wages paid to employees including yourself.</h4>
                    <small>Example: assistant and yourself</small>
                </div>
            </div>

        <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Add your Labor Cost</h4>
                    </div>

                    <form method="POST" action="/recipe/{{ $recipe->id  }}/labor/add">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group">
                                <input class="form-control" id="labor_name" type="text" name="labor_name" placeholder="Name of your labor?">
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="salary" type="text" name="salary" placeholder="How much its salary?">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="time_based">
                                    <option>Monthly</option>
                                    <option>Daily</option>
                                    <option>Hourly</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="time_consume" type="number" name="time_consume" placeholder="Time consume to make this {{ $recipe->quantity }} recipe? (minutes)">
                                <input type="hidden" value="{{ $recipe->id  }}" name="recipe_id">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger waves-effect waves-light">Add Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- end right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- /.container-fluid -->
    @include('layouts.footer')



    <script type="text/javascript">


        $('#unit').click(function(){
            //var raw = $('#the-basics').text();
            //var replace = raw.replace(/ /g,"");
            //var unit = replace.substring(2);

            var unit = $('.tt-selectable').text();

            $('#unit_text').text(unit);
            $('#ingredient_name').val(unit);
        })

    </script>

    </div>
    <!-- ============================================================== -->
    <!-- End Page Content -->
    <!-- ============================================================== -->

    <!-- End of ID Wrapper in Navbar.blade -->
    </div>

    <!-- Typehead Plugin JavaScript -->
    <script src="{{url ('/plugins/bower_components/typeahead.js-master/dist/typeahead.bundle.min.js') }}"></script>
    <script src="{{url ('/plugins/bower_components/typeahead.js-master/dist/typeahead-init.js') }}"></script>
@endsection



