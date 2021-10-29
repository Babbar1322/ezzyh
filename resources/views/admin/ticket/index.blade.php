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
                <h4>Submitted Tickets</h4>
                
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
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Replied Message</th>
                        <th>Status</th>
                        <th>Last Updated</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($tickets as $ticket)
                      <tr>
                        <td>{{ $ticket->subject }}</td>
                        <td>{{ $ticket->message }}</td>
                        <td>{{ $ticket->reply != null ?$ticket->reply:'' }}</td>
                        <td>{{$ticket->status == 0?'Pending':'Closed'}}</td>
                        <td>{{$ticket->updated_at}}</td>
                       
                      </tr>
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