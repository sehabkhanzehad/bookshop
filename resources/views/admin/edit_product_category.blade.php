@extends('admin.master_layout')
@section('title')
<title>{{__('admin.Product Category')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('admin.Edit Product Category')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.product-category.index') }}">{{__('admin.Product Category')}}</a></div>
              <div class="breadcrumb-item">{{__('admin.Edit Product Category')}}</div>
            </div>
          </div>

          <div class="section-body">
            <a href="{{ route('admin.product-category.index') }}" class="btn btn-primary"><i class="fas fa-list"></i> {{__('admin.Product Category')}}</a>
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.product-category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="form-group col-12">
                                    <label>{{__('admin.Current Image')}}</label>
                                    <div>
                                        <img src="{{ asset('uploads/custom-images2/'.$category->image) }}" alt="" width="100px">
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label>{{__('admin.Image')}} <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control-file"  name="image">
                                </div>
                                
                                <div class="form-group col-12">
                                    <label>{{__('Banner Image')}} (1320px * 265px) <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control-file"  name="banner_image">
                                </div>

                                <!--<div class="form-group col-12">-->
                                <!--    <label>{{__('admin.Icon')}} <span class="text-danger">*</span></label>-->
                                <!--    <input type="text" class="form-control custom-icon-picker"  name="icon" value="{{ $category->icon }}">-->
                                <!--</div>-->

                                <div class="form-group col-12">
                                    <label>{{__('admin.Name')}} <span class="text-danger">*</span></label>
                                    <input type="text" id="name" class="form-control"  name="name" value="{{ $category->name }}">
                                </div>
                                
                                <div class="form-group col-12 d-none">
                                    <label>{{__('admin.Slug')}} <span class="text-danger">*</span></label>
                                    <input type="text" id="slug" class="form-control"  name="slug" value="{{ $category->slug }}">
                                </div>

                              	<div class="form-group col-12">
                                    <label>Prioririty <span class="text-danger">*</span></label>
                                    <input type="text" id="slug" class="form-control"  name="serial" value="{{ $category->serial }}">
                                </div>
                                <div class="form-group col-12">
                                    <label>{{__('Is Menu')}} <span class="text-danger">*</span></label>
                                    <select name="is_menu" class="form-control">
                                        <option value="1" {{ $category->is_menu==1 ? 'selected': '' }}>{{__('admin.Active')}}</option>
                                        <option value="0" {{ $category->is_menu==0 ? 'selected': '' }}>{{__('admin.InActive')}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-12">
                                    <label>{{__('Is Home')}} <span class="text-danger">*</span></label>
                                    <select name="is_home" class="form-control">
                                        <option value="1" {{ $category->is_home==1 ? 'selected': '' }}>{{__('admin.Active')}}</option>
                                        <option value="0" {{ $category->is_home==0 ? 'selected': '' }}>{{__('admin.InActive')}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-12">
                                    <label>{{__('Is Popular')}} <span class="text-danger">*</span></label>
                                    <select name="is_popular" class="form-control">
                                        <option value="1" {{ $category->is_popular==1 ? 'selected': '' }}>{{__('admin.Active')}}</option>
                                        <option value="0" {{ $category->is_popular==0 ? 'selected': '' }}>{{__('admin.InActive')}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-12">
                                    <label>{{__('admin.Status')}} <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control">
                                        <option {{ $category->status==1 ? 'selected': '' }} value="1">{{__('admin.Active')}}</option>
                                        <option {{ $category->status==0 ? 'selected': '' }}  value="0">{{__('admin.InActive')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-primary">{{__('admin.Update')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>
          </div>
        </section>
      </div>

<script>
    (function($) {
        "use strict";
        $(document).ready(function () {
            $("#name").on("focusout",function(e){
                $("#slug").val(convertToSlug($(this).val()));
            })
        });
    })(jQuery);

    function convertToSlug(Text)
        {
            return Text
                .toLowerCase()
                .replace(/[^\w ]+/g,'')
                .replace(/ +/g,'-');
        }
</script>
@endsection
