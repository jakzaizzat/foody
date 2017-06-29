@extends('layouts.master')


@section('content')

  @include('layouts.navbar')
  
  <!-- Page Content -->
  <!-- ============================================================== -->
  <div id="page-wrapper">
      <div class="container-fluid">
          <div class="row bg-title">
              <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                  <h4 class="page-title">List my inredients</h4> </div>
              <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                  <a href="/ingredient/new" class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Add New Ingredient</a>
                  <ol class="breadcrumb">
                      <li><a href="#">Dashboard</a></li>
                      <li class="active">List Ingredients</li>
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
                  <div class="col-md-12 col-lg-12 col-sm-12">
                      <div class="panel">
                          <div class="panel-heading">MANAGE RECIPES</div>

                          <div class="table-responsive">
                              <table class="table table-hover manage-u-table">
                                  <thead>
                                      <tr>
                                          <th style="width: 70px;" class="text-center">#</th>
                                          <th>NAME</th>
                                          <th>PRICE</th>
                                          <th>VOLUME</th>
                                          <th>MANAGE</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach($ingredients as $key=>$ing)
                                      <tr>
                                          <td class="text-center">{{ ++$key  }}</td>
                                          <td><span class="font-medium">{{ $ing->name }}</span></td>
                                          <td>RM {{ $ing->price }}</td>
                                          <td>{{ $ing->volume }} {{ $ing->unit }}</td>
                                          <td>
                                              <a class="btn btn-normal btn-xs" href="/ingredient/{{ $ing->id }}/edit">Edit</a>

                                              <form method="post" action="{!! action('IngredientsController@destroy', $ing->id ) !!}" style="display: inline-block;">
                                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                                 <div>
                                                    <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                                </div>
                                              </form>

                                          </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>

          <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <h4 class="modal-title">Add your ingredients</h4>
                      </div>
                      <div class="modal-body">
                          <form method="POST"  action="/ingredient/add">
                              <div class="form-group">
                                  <h3 class="box-title m-b-0">Search</h3>
                                  <div id="the-basics">
                                    <input class="typeahead form-control" type="text" placeholder="Countries"> 
                                  </div>
                              </div>
                              <div class="form-group">
                                  <small>Not found the ingredient? Add one now.</small>
                                  <a href="" class="btn btn-sm btn-primary btn-rounded">Add new ingredient</a>
                              </div>
                          </form>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-danger waves-effect waves-light">Add Now</button>
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
  <!-- ============================================================== -->
  <!-- End Page Content -->
  <!-- ============================================================== -->

  <!-- End of ID Wrapper in Navbar.blade -->
  </div>

  <!-- Typehead Plugin JavaScript -->
  <script src="{{url ('/plugins/bower_components/typeahead.js-master/dist/typeahead.bundle.min.js') }}"></script>
  <script src="{{url ('/plugins/bower_components/typeahead.js-master/dist/typeahead-init.js') }}"></script>

@endsection

