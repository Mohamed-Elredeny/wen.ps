
@extends('layouts.site')

@section('content')



        <main id="room_page">
            <div class="container">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
          


                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block text-center">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block text-center">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger text-center">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form method="post" action="{{route('save.gift')}}" enctype="multipart/form-data">
                    @csrf
                    <h1 class="text-center">{{__('site.redeem_points')}}</h1>

                   <div class="form-group">
                        <label class="col-md-12 text-center"><strong>{{__('site.points')}} </strong></label>
                        <div class="col-md-12" style="margin-bottom: 1%;">
                               <input class="form-control" type="text" disabled value="{{$points}}">                    
                        </div>
                    </div>

                   <div class="form-group">
                        <label class="col-md-12 text-center"><strong>{{__('site.gifts')}} </strong></label>
                        <div class="col-md-12" style="margin-bottom: 5%;">
                            <select class="form-control" name="gift_id" required>
                                    <option>{{__('site.gifts')}}</option>
                                    @foreach($gifts as $gift)
                                    <option value="{{$gift->id}}">
                                        @if(LaravelLocalization::getCurrentLocale() == 'ar')   
                                        {{$gift->name_ar}} => ({{$gift->points}})
                                        @else
                                        {{$gift->name_en}} => ({{$gift->points}})
                                        @endif
                                    </option>
                                    @endforeach
                            </select>                        
                        </div>
                    </div>

               
        


                    <div class="form-group">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-success w-25">{{__('site.redeem_points')}}</button>
                        </div>
                    </div>
                </form>
                    

                    </div>
                    
                </div>
            </div>
        </main>


@endsection