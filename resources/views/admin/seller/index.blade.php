@extends('layouts.admin_app')
@section('content')

<div class="main_content_iner overly_inner ">
  <div class="container-fluid p-0 ">
    <div class="row">
      <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30 pt-4">
          <div class="white_card_body">
            <div class="QA_section">
              <div class="white_box_tittle list_header">
                <h4>Seller List</h4>
                @can('seller-create')
                <div class="box_right d-flex lms_block">
                  <!-- <a class="btn btn-primary" href="{{ route('seller.create') }}"> Create New Seller</a> -->
                </div>
                @endcan
              </div>

              <!-- <div class="row mb-4">
                <div class="col-md-12">
                  <h4 class="text-center">Generates affiliate link to Seller</h4>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-6 text-center">
                  <input type="text" value="https://webcyst.com/ezzyhportal/sellerRegister/{{Auth::user()->id}}" id="myInput" style="width: 100%;padding: 7px; font-weight: 800; border: 1px solid #884ffb; color: #884ffb; border-radius: 5px; background: transparent;" readonly="true">
                </div>
                <div class="col-md-2 text-center">
                  <a href="#" class="btn btn-primary" onclick="myFunctionCopy()">Copy</a>
                </div>
              </div> -->

          <!-- <div class="row mb-4">
                <div class="col-md-4"></div>
                <div class="col-md-6 text-center">
                  <input type="text" value="https://webcyst.com/ezzyhportal/userform/{{Auth::user()->id}}" id="myInput" style="width: 100%;padding: 7px; font-weight: 800; border: 1px solid #884ffb; color: #884ffb; border-radius: 5px; background: transparent;" readonly="true">
                </div>
                <div class="col-md-2 text-center">
                  <a href="#" class="btn btn-primary" onclick="myFunctionCopy()">Copy Affliate</a>
                </div>
              </div> -->

              @if ($message = Session::get('success'))
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
              @endif

              <div class="QA_table mb_30">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Log Code</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th style='min-width:400px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $key => $user)
                      @if($user->id != Auth::user()->id)
                      <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->login_code }}</td>
                        <td>{{ $user->showPass }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                          @if(!empty($user->getRoleNames()))
                          @foreach($user->getRoleNames() as $v)
                          <label class="badge badge-success">{{ $v }}</label>
                          @endforeach
                          @endif
                        </td>
                        <td style="width:44%">
                          <a class="btn btn-info" href="{{ route('seller.show',$user->id) }}">Show</a>
                          @can('seller-edit')
                          <a class="btn btn-primary" href="{{ route('seller.edit',$user->id) }}">Edit</a>
                          @endcan
                          @can('seller-delete')
                          {!! Form::open(['method' => 'DELETE','route' => ['seller.destroy', $user->id],'style'=>'display:inline']) !!}
                          {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                          {!! Form::close() !!}
                          @endcan
                          <a class="btn btn-warning" href="{{ route('customer.index',["id"=>$user->id]) }}">Customer</a>
                          <button type="button" data-id="{{$user->id}}" class="btn btn-secondary mybtn " >
                            Code
                          </button>
                        </td>
                      </tr>
                      @endif
                      @endforeach

                    </tbody>
                  </table>
                </div>

                {!! $data->render() !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection