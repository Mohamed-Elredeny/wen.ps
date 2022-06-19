@extends("layouts.restaurant") 
@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
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
                <h5 class="mb-5 mt-3">تعديل الفئة</h5>

                <form method="post" action="{{route('restaurant.meals.update',['meal'=>$meal->id])}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">الفئة</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="category_id" id="category_id">
                                    <option value="0">حدد الفئة</option>
                                    @foreach($categories as $category)
                                    <option  @if ($category->id == $meal->category_id) {{ 'selected' }} @endif value="{{$category->id}}">{{$category->name_ar}}</option>
                                    @endforeach
                            </select>                      
                        </div>
                    </div>

     

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">الاسم بالعربية</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="name_ar" value="{{$meal->name_ar}}" required>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">الاسم بالانجليزية</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="name_en" value="{{$meal->name_en}}" required>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">المكونات بالعربية</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="component_ar" value="{{$meal->component_ar}}" required>
                        </div>
                    </div> 
                    
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">المكونات بالانجليزية</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="example-text-input" name="component_en" value="{{$meal->component_en}}" required>
                        </div>
                    </div> 

             
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">السعر</label>
                        <div class="col-sm-10" id="size">
                           
                             @php
                            $price_meal = \App\models\Restaurant_meal_sizes::where('meal_id',$meal->id)->get();   
                            @endphp

                            @if(isset($price_meal))
                            
                            @foreach($price_meal as $price)

                            <div class='row m-2'>
                                <div class='col-sm-6'>
                                    <div class='row'>
                                        <div class='col-sm-1'>{{$price->size}}</div>
                                        <div class='col-sm-11'>
                                            <input type='hidden' name='size[]' value='{{$price->size}}'/>
                                            <input class='form-control' type='number' id='example-text-input' name='price[]' value="{{$price->price}}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            @endif


                     

                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">الصورة</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="example-text-input" name="image">
                        </div>
                    </div> 
                    
                    <div class="form-group row">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-dark w-25">تعديل</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    
    $('#category_id').change(function(){
    var category_id = $(this).val();
        if(category_id){
        $.ajax({
           type:"get",
           url:"/restaurant/meal/size/"+category_id,
           success:function(res)
           {     

                $('#size').empty();

                if(res.length > 0){
                        $.each(res,function(key,value){

                            $('#size').append($("<div class='row m-2'><div class='col-sm-6'><div class='row'><div class='col-sm-1'>"+value+"</div><div class='col-sm-11'><input type='hidden' name='size[]' value='"+value+"'/><input class='form-control' type='number' id='example-text-input' name='price[]' required></div></div></div></div>"));
                        });
                }else{
                        $('#size').empty();
                }
           }
           

        });
        }
    });

</script>
@endsection

