@extends('dashboard.layouts.app')
@section('title', 'Update Blog Category')
@section('blogcategoriesActive', 'active')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">Update Blog Category</div>
</div>
<div>
    @include('partials._errors')
</div>
<div class="container">

    <div class="row justify-content-center">
        <div class="card-block">
            <form action="{{ route('dashboard.blogcategories.update',$blogcategory->id) }}" method="post">
                @csrf()
                {{ method_field('put') }}

                <div class="form-group mb-3">
                    <label for="ar[name]" class="form-label">Name in Arabic</label>
                    <input type="text" name="ar[name]" class="form-control" value="{{ $blogcategory->translate('ar')->name }}" dir="rtl">
                </div>
                {{-- <div class="form-group mb-3">
                    <label for="en[name]" class="form-label">Name in English</label>
                    <input type="text" name="en[name]" class="form-control" value="{{ $blogcategory->translate('en')->name }}">
                </div> --}}
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="showed" name="showed" {{ $blogcategory->showed  == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="showed">
                      Showed
                    </label>
                </div>

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Update </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
