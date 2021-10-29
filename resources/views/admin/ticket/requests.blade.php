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
                <h4> Ticket Requests</h4>
                
              </div>


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
                        <th>From User Name</th>
                        <th>From User Email</th>
                        <th>Subject</th>
                        <th>Last Updated</th>
                        <th>Reply</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($reqs as $req)
                      @if(Auth::user()->roles[0]->name == 'Admin' && $req->role == 'seller' || Auth::user()->roles[0]->name == 'Admin' && $req->role == 'dealer' || Auth::user()->roles[0]->name == 'seller' && $req->role == 'subseller' || Auth::user()->roles[0]->name == 'dealer' && $req->role == 'subdealer')
                      <tr>
                        <td>{{$req->user_name}}</td>
                        <td>{{$req->email}}</td>
                        <td>{{$req->subject }}</td>
                        <td>{{$req->updated_at}}</td>
                        <td>
                          @if ($req->reply == null)
                          <a href="{{route('ticket.reply',['id'=>$req->id])}}" class="btn btn-info">Reply</a>
                            @else
                            <span class="text-success">Replied</span>
                          @endif
                        </td>
                      </tr>
                      @endif
                      @endforeach

                    </tbody>
                  </table>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection