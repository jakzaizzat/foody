@extends('layouts.master')

@section('content') 


  @include('layouts.navbar')

  <!-- Page Content -->
      <!-- ============================================================== -->
      <div id="page-wrapper">
          <div class="container-fluid">
              <div class="row bg-title">
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                      <h4 class="page-title"></h4> </div>
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                      <ol class="breadcrumb">
                          <li class="active"><a href="/recipes">Dashboard</a></li>
                          <li class="active">Add New Recipe</li>
                      </ol>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->


             <div class="col-md-6 col-md-offset-3 col-sm-12">
                      <div class="white-box">
                          <center>
                              <h3 class="box-title m-b-0">New Recipe Form</h3>
                              <p class="text-muted m-b-30 font-13"> Enter below detail</p>
                          </center>
                          <form class="no-bg-addon" method="POST" action="/recipes/add">
                              {{ csrf_field() }}

                              @if(count($errors))
                              <div class="row">
                                <div class="columns">
                                  @foreach($errors->all() as $error)
                                    <li>
                                      <u>{{ $error }}</u>
                                    </li>
                                  @endforeach
                                </div>
                              </div>
                              @endif

                              <div class="form-group">
                                  <div class="input-group">
                                      <input class="form-control" type="text" placeholder="Nasi Lemak" id="name" name="name" required>
                                      <div class="input-group-addon"><i class="ti-shopping-cart"></i></div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="input-group">
                                      <input class="form-control" type="number" placeholder="Quantity want to produce" id="quantity" name="quantity" required>
                                      <div class="input-group-addon"><i class="ti-bolt-alt"></i></div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="input-group">
                                      <input class="form-control" type="number" placeholder="How much profit margin? (%)" id="margin" name="margin" >
                                      <div class="input-group-addon"><i class="ti-money"></i></div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="input-group">
                                      <input class="form-control" type="number" placeholder="10" id="itemPerDay" name="itemPerDay" placeholder="How many product could be produce in one day?" required>
                                      <div class="input-group-addon"><i class="ti-receipt"></i></div>
                                  </div>
                              </div>
                              <button class="btn btn-block btn-danger btn-lg btn-rounded">Submit</button>
                          </form>
                      </div>
                  </div>


              <!-- ============================================================== -->
              <!-- end right sidebar -->
              <!-- ============================================================== -->
          </div>
          <!-- /.container-fluid -->
          @include('layouts.footer')
      </div>

  
@endsection

