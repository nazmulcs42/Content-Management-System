@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Welcome to Video Details') }} </div>

            <div class="card-body">
              <div class="" style="margin: 5px">

                @foreach($results as $data)

                  <div class="row col-md-12 col-sm-12" style="margin-top: 5px">
                      <h3> <b> {{$data->title}}</b></h3>
                   </div>

                  <div class="row col-md-8 col-sm-8" style="margin-top: 30px">
                      <video width="100%" height="320" controls><source src="{{asset('storage/files/'.$data->file)}}" type="video/mp4"></video>
                  </div>

                  <div class="row col-md-12 col-sm-12" style="margin-top: 30px">
                     <p> {{$data->details}}</p>
                  </div>
                  
                @endforeach
              </div>
              <div class="addthis_inline_share_toolbox"></div>
           </div>
        </div>
    </div>
</div>

@endsection


