@extends('admin.base')

@section('style')
<style>
    img.img-fluid {
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
        min-height: 100%;
    }
</style>

@endsection

@section('content')
<div class="row my-5">
    <div class="card shadow border-0 col-8 mx-auto ps-0" style="border-radius:20px">
        <div class="card-body">
            <div class="row">
                {{-- <div class="col-9"> --}}
                    <p class="lead fs-2 mb-1">Add a Book</p>
                    <hr class="mt-0">

                    <form action="{{ route('admin.edit_book') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PATCH")

                        <input type="hidden" name="pro_id" value="{{$book->id}}">
                        {{-- <div class="row"> --}}
                            <div class="mb-3 col">
                                <label for="">Title</label>
                                <input type="text" name="pro_title" class="form-control @error('pro_title') is-invalid @enderror" value="{{$book->pro_title}}" placeholder="Eg. The Fault In Our Stars">
                                @error('pro_title')
                                <p class="small text-danger">{{$message}}</p>
                            @enderror
                            </div>

                            
                            <div class="mb-3 col">
                                <label for="">Author</label>
                                <input type="text" name="pro_author" id="" class="form-control @error('pro_author') is-invalid @enderror" value="{{$book->pro_author}}" placeholder="Eg. John Green">
                                @error('pro_author')
                                <p class="small text-danger">{{$message}}</p>
                            @enderror
                            </div>

                            
                        {{-- </div> --}}


                            <div class="row">
                                <div class="mt-4 col dropdown">
                                    {{-- <label for="">Genre</label> --}}
                                    <a href="#dropCat" class="btn btn-dark" style="width:100%" data-bs-toggle="dropdown">Select Genres</a>
                                    <select name="category[]" id="dropCat" class="form-select dropdown-menu" multiple="multiple">
                                        @foreach ($category as $cat)
                                        <option value="{{$cat->id}}" @if (in_array($cat->id,$selected_cat)) {{'selected'}} @endif>{{$cat->cat_title}}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                    <p class="small text-danger">{{$message}}</p>
                                @enderror
                                </div>

                                
                                <div class="mb-3 col">
                                    <label for="">Original Price</label>
                                    <input type="text" name="pro_price" value="{{$book->pro_price}}" class="form-control @error('pro_price') is-invalid @enderror" placeholder="Eg. 299">
                                    @error('pro_price')
                                    <p class="small text-danger">{{$message}}</p>
                                @enderror
                                </div>

                                
                                <div class="mb-3 col">
                                    <label for="">Discount Price</label>
                                    <input type="text" name="pro_discount_price" value="{{$book->pro_discount_price}}" class="form-control @error('pro_discount_price') is-invalid @enderror" placeholder="Eg. 265">
                                    @error('pro_discount_price')
                                    <p class="small text-danger">{{$message}}</p>
                                @enderror
                                </div>

                                
                            </div>

                            <div class="row">
                                <div class="col mb-3">
                                    <label for="">ISBN</label>
                                    <input type="text" name="pro_isbn" class="form-control @error('pro_isbn') is-invalid @enderror" value="{{$book->pro_isbn}}" placeholder="Eg. 123456765" id="">
                                    @error('pro_isbn')
                                    <p class="small text-danger">{{$message}}</p>
                                @enderror
                                </div>

                                
                                <div class="col mb-3">
                                    <label for="">Pages</label>
                                    <input type="number" name="pro_pages" class="form-control @error('pro_pages') is-invalid @enderror" value="{{$book->pro_pages}}" placeholder="Eg. 563" id="">
                                    @error('pro_pages')
                                    <p class="small text-danger">{{$message}}</p>
                                @enderror
                                </div>

                                
                            </div>
                            
                            <div class="mb-3">
                                <label for="">Chosen Image(s):-</label><br>
                                <img src="{{ asset('product_images/'.$book->pro_image) }}" style="width: 50px" class="me-5" alt="">
                                @if ($book->pro_image1 != null)
                                    <img src="{{ asset('product_images/'.$book->pro_image1) }}" style="width: 50px;" class="me-5" alt="">
                                @endif
                                @if ($book->pro_image2 != null)
                                    <img src="{{ asset('product_images/'.$book->pro_image2) }}" style="width: 50px;" class="me-5" alt="">
                                @endif
                                @if ($book->pro_image3 != null)
                                    <img src="{{ asset('product_images/'.$book->pro_image3) }}" style="width: 50px;" class="me-5" alt="">
                                @endif
                                @if ($book->pro_image4 != null)
                                    <img src="{{ asset('product_images/'.$book->pro_image4) }}" style="width: 50px;" class="me-5" alt="">
                                @endif
                            </div>

                            <div class="row">
                                <div class="mb-3 col-9">
                                    <label>Image(s)</label>
                                    <input type="file" name="pro_image[]" id="pro_image" class="form-control" multiple>
                                    @error('pro_image')
                                    <p class="small text-danger">{{$message}}</p>
                                @enderror
                                </div>

                                

                                {{-- <div class=" mt-4 col-3">
                                    <button type="button" class="btn btn-link" id="addBtn" onclick="addImage()">Add More</button>
                                </div>
                                <div class="more-images row">
                                    
                                </div> --}}
                            </div>

                            <div class="row">
                                <div class="mb-3 col-7">
                                    <label for="">Publisher</label>
                                    <input type="text" name="pro_publisher" value="{{$book->pro_publisher}}"  class="form-control @error('pro_publisher') is-invalid @enderror" placeholder="Eg. Penguin Publishers">
                                    @error('pro_publisher')
                                    <p class="text-danger small">{{$message}}</p>
                                @enderror
                                </div>

                                

                                <div class=" mb-3 col">
                                    <label for="">Quantity</label>
                                    <input type="number" name="pro_qty" value="{{$book->pro_qty}}" placeholder="Eg. 67" class="form-control @error('pro_qty') is-invalid @enderror">
                                    @error('pro_qty')
                                    <p class="text-danger small">{{$message}}</p>
                                @enderror
                                </div>

                                
                            </div>

                            <div class="row">
                                <div class="mb-3 col-7">
                                    <label for="">Language</label>
                                    <input type="text" name="pro_language" value="{{$book->pro_language}}" placeholder="Eg. English" class="form-control @error('pro_language') is-invalid @enderror">
                                    @error('pro_language')
                                    <p class="text-danger small">{{$message}}</p>
                                @enderror
                                </div>

                                

                                <div class=" mb-3 col">
                                    <label for="">Edition</label>
                                    <input type="number" name="pro_edition" value="{{$book->pro_edition}}" placeholder="Eg. 1/2/3..." class="form-control @error('pro_edition') is-invalid @enderror">
                                    @error('pro_edition')
                                    <p class="text-danger small">{{$message}}</p>
                                @enderror
                                </div>

                                
                            </div>

                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea name="pro_description" rows="5" class="form-control @error('pro_description') is-invalid @enderror"  placeholder="Give the description of book here">{{$book->pro_description}}</textarea>
                                @error('pro_description')
                                        <p class="text-danger small">{{$message}}</p>
                                    @enderror
                            </div>

                            <div class="mb-3">
                                <input type="submit" value="UPDATE BOOK" class="btn btn-primary w-100">
                            </div>
                    </form>
                {{-- </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
        $("#pro_image").on("change", function() {
            if ($("#pro_image")[0].files.length > 5) {
                alert("You can select only 5 images");
                $("#pro_image").val(null);
            }
        });
</script>
@endsection