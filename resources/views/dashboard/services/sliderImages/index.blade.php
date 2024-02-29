@extends('dashboard.layouts.app')
@section('title', 'Slider Images')
@section('servicesActive', 'active')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">Slider Images For <a href="{{route('dashboard.services.edit',$service->id)}}">{{ $service->title }}</a></div>
</div>
<div class="container">
        <div class="row mb-3">
            <form action="{{ route('dashboard.services.sliderImages.slider', $service) }}" method="post" class="row">
                @csrf
                <label for="">Slider Names:</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="slider1" value="{{ $service->slider1 }}" placeholder="slider 1 name">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="slider2" value="{{ $service->slider2 }}"   placeholder="slider 2 name">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="slider3" value="{{ $service->slider3 }}"   placeholder="slider 3 name">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary"> Save</button>
                </div>
            </form>
        </div>
            <hr>
    <div class="row justify-content-center">

        <div class="card-block">
           <a href="{{ route('dashboard.services.sliderImages.create',$service->id) }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add </a>
           <a href="{{ route('dashboard.services.sliderImages.show',$service->id) }}" class="btn btn-primary"> Show all </a>
           <a href="{{ route('dashboard.services.sliderImages.hide',$service->id) }}" class="btn btn-primary"> Hide all </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="card-block">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Slider</th>
                        <th>Showed</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($images as $key => $image)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td> <img src="{{asset($image->image)}}" style="width: 125px; height: auto;" alt=""> </td>
                        <td>{{ $image->slider }}</td>
                        <td>{{ $image->showed == 1 ? 'YES' : 'NO' }}</td>
                        <td>
                            <a href="{{ route('dashboard.services.sliderImages.edit', $image->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> edit</a>
                        </td>
                        <td>
                            <form action="{{ route('dashboard.services.sliderImages.destroy', $image->id) }}" method="post" style="display: inline-block">
                                @csrf()
                                @method('delete')
                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fas fa-trash"></i> Delete</button>
                            </form><!-- end of form -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table><!-- end of table -->
        </div>
    </div>
</div>
@endsection
