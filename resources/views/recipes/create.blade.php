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
                                      <input class="form-control" type="text" placeholder="Recipe Name? " id="name" name="name" required>
                                      <div class="input-group-addon"><i class="ti-shopping-cart"></i></div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="input-group">
                                      <input class="form-control" type="number" placeholder="How much yield count?" id="quantity" name="quantity" required>
                                      <div class="input-group-addon"><i class="ti-bolt-alt"></i></div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="input-group">
                                      <input class="form-control" type="text" placeholder="Yield units" id="yield_type" name="yield_type" >
                                      <div class="input-group-addon"><i class="ti-money"></i></div>
                                  </div>
                              </div>

                              <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                              <button class="btn btn-block btn-danger btn-lg btn-rounded">Submit</button>
                          </form>
                      </div>
                  </div>

                  <div class="col-md-3 col-lg-3 col-sm-5">
                      <div class="white-box">
                          <h3 class="box-title">Example</h3>
                          <hr>
                          <h4>I want to create a "Nasi Ayam" recipe for 5 peoples</h4>
                          <small>Recipe Name: "Nasi Ayam"</small>
                          <br>
                          <small>Yield Count: 5</small>
                          <br>
                          <small>Yield Type: Plate</small>
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

