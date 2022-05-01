@extends('admin.base')

@section('content')
    <div class="card shadow-lg border-0 my-3" style="border-radius: 20px">
        <div class="card-body table-responsive">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Original Price</th>
                    <th>Discount Price</th>
                    <th>ISBN</th>
                    <th>Total Pages</th>
                    <th>Publisher</th>
                    <th>Language</th>
                    <th>Edition</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Image 1</th>
                    <th>Image 2</th>
                    <th>Image 3</th>
                    <th>Image 4</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>

                @foreach ($books as $book)
                    <tr>
                        <td>{{$book->id}}</td>
                    <td>{{$book->pro_title}}</td>
                    <td>{{$book->pro_author}}</td>
                    <td>{{$book->pro_price}}</td>
                    <td>{{$book->pro_discount_price}}</td>
                    <td>{{$book->pro_isbn}}</td>
                    <td>{{$book->pro_pages}}</td>
                    <td>{{$book->pro_publisher}}</td>
                    <td>{{$book->pro_language}}</td>
                    <td>{{$book->pro_edition}}</td>
                    <td>{{$book->pro_qty}}</td>
                    <td><img src="{{ asset('product_images/'.$book->pro_image) }}" width="40px" alt=""></td>
                    @if ($book->pro_image1 !== null)
                    <td><img src="{{ asset('product_images/'.$book->pro_image1) }}" width="40px" alt=""></td>
                    @else
                    <td><img src="{{ asset('asset_images/noImage.webp') }}" width="40px" alt=""></td>
                    @endif
                    @if ($book->pro_image2 !== null)
                    <td><img src="{{ asset('product_images/'.$book->pro_image1) }}" width="40px" alt=""></td>
                    @else
                    <td><img src="{{ asset('asset_images/noImage.webp') }}" width="40px" alt=""></td>
                    @endif
                    @if ($book->pro_image2 !== null)
                    <td><img src="{{ asset('product_images/'.$book->pro_image1) }}" width="40px" alt=""></td>
                    @else
                    <td><img src="{{ asset('asset_images/noImage.webp') }}" width="40px" alt=""></td>
                    @endif
                    @if ($book->pro_image3 !== null)
                    <td><img src="{{ asset('product_images/'.$book->pro_image1) }}" width="40px" alt=""></td>
                    @else
                    <td><img src="{{ asset('asset_images/noImage.webp') }}" width="40px" alt=""></td>
                    @endif
                    <td><p class="text-truncate" style="width:250px ">{{$book->pro_description}}</p></td>
                    <td>
                        <div class="d-flex pt-2 gap-1">
                            <a href="{{ route('admin.edit_book', ['id'=>$book->id]) }}" class="btn btn-dark btn-sm rounded-pill"><i class="fa-solid fa-pen"></i></a>
                        <form action="{{ route('admin.delete_book') }}" method="POST">
                            @csrf
                            @method("delete")
                            <input type="hidden" name="pro_id" value="{{$book->id}}">
                            <button type="submit" class="btn btn-danger btn-sm rounded-pill"><i class="fa-solid fa-trash"></i></button>
                        </form>

                        <form action="" method="POST">
                            @csrf
                            @method("patch")
                            <input type="submit" value="Add Offer" class="btn btn-primary btn-sm rounded-pill">
                        </form>
                        </div>
                    </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection