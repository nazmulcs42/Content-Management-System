@extends('layouts.app')


<style>

  /* Create two unequal columns that floats next to each other */
  /* Left column */
  .leftcolumn {   
      float: left;
      width: 60%;
  }

  /* Right column */
  .rightcolumn {
      float: left;
      width: 40%;
      padding-left: 30px;
  }

  .vl{
    border-left: 2px solid gray;
  }

  /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
  @media screen and (max-width: 800px) {
      .leftcolumn, .rightcolumn {   
          width: 100%;
          padding: 0;
      }
  }
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{__('Ttems')}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <?php 

                      $first_video='';
                      $first_post='';

                      foreach($results as $res){
                        if($res->section_type== '1' && $res->item_type == 'video' && $first_video ==''){
                          $first_video = $res;
                          break;
                        }
                      }

                      foreach($results as $res){
                        if($res->section_type== '2' && $res->item_type == 'post' && $first_post==''){
                          $first_post = $res;
                          break;
                        }
                      }

                    ?>

                    <div class="row">
                      <div class=" leftcolumn">

                        <h6 style="margin-bottom: 0px; padding-bottom:0px; ">{{'Section 1'}}</h6>

                        @foreach($results as $data)
                          @if($data->section_type==1)

                             @if($data == $first_video)
                                <div style="float: left; padding-right: 30px;"> 
                                  <a href="{{ route('item.video.details',$data->id) }}"><video width="300" height="200" controls><source src="{{asset('storage/files/'.$data->file)}}" type="video/mp4"> </video></a>
                                  <h6 style="margin-bottom: 15px; margin-top: 10px"><b>{{$data->title}}</b></h6>
                                  <p><?php echo substr_replace($data->details, '<b>....Click on video</b>.', 30)?></p>
                                </div>
                              @endif 
                              
                              @if($data != $first_video)
                                <div style="float: left; padding-right: 20px;"> 
                                  <a href="{{ route('item.video.details',$data->id) }}"><video width="140" height="90" controls><source src="{{asset('storage/files/'.$data->file)}}" type="video/mp4"> </video></a>
                                <h6 style="margin-bottom: 20px">{{$data->title}}</h6>
                                </div> 
                              @endif
            
                          @endif
                         @endforeach
                      </div>

                      <div class=" vl rightcolumn ">
                       
                        <h6>{{'Section 2'}}</h6>

                        @foreach($results as $data)
                          @if($data->section_type==2)
                              
                              @if($data == $first_post)
                                <div style="float: left; padding-bottom: 30px"> 
                                  <a href="{{ route('item.image.details', $data->id) }}"><embed type="image/jpg" src="{{asset('storage/files/'.$data->file)}}" width="300" height="200"> </a>
                                  <h6 style="margin-bottom: 15px; margin-top: 10px"><b>{{$data->title}}</b></h6>
                                  <p style="margin-bottom: 30px"><?php echo substr_replace($data->details, '....<b>Click on image</b>.', 30)?></p>
                                </div>
                              @endif 
                              
                              @if($data != $first_post)
                                <div style="float: left; padding-right: 20px;"> 
                                  <a href="{{ route('item.image.details', $data->id) }}"><embed type="image/jpg" src="{{asset('storage/files/'.$data->file)}}" width="140" height="90" > </a>
                                  <h6 style="margin-bottom: 30px">{{$data->title}}</h6>
                                </div> 
                              @endif
                              
                          @endif
                        @endforeach
                      </div>                     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
