@extends('layouts.master')



@section('content')

    @include('layouts.navbar')

    <!-- Page Content -->
    <!-- ============================================================== -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Dashboard </h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <a href="/recipes/add" class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Add New Recipe</a>
                    <ol class="breadcrumb">
                        <li class="active"><a href="#">Dashboard</a></li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <!-- Show status if available -->
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif


            <div class="row">
                <div class="col-lg-4 col-sm-4 col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title">total recipes</h3>
                        <ul class="list-inline m-t-30 p-t-10 two-part">
                            <li><i class="icon-notebook text-info"></i></li>
                            <li class="text-right"><span class="counter">{{ $totalRecipe  }}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title">total ingredient</h3>
                        <ul class="list-inline m-t-30 p-t-10 two-part">
                            <li><i class="icon-bag text-purple"></i></li>
                            <li class="text-right"><span class="counter">{{ $totalIng }}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title">total users</h3>
                        <ul class="list-inline m-t-30 p-t-10 two-part">
                            <li><i class="icon-people text-danger"></i></li>
                            <li class="text-right"><span class="">{{ $totalUser  }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- calendar widgets -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="panel">
                        <div class="panel-heading">MANAGE RECIPES</div>

                        <div class="table-responsive">
                        </div>
                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- end right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- /.container-fluid -->
        @include('layouts.footer')
    </div>

    <!-- End of ID Wrapper in Navbar.blade -->
    </div>

@endsection