@extends('admin.master_layout')
@section('title')
<title>{{__('Menu Category')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{__('admin.Menu Category')}}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a>
                    </div>
                    <div class="breadcrumb-item">{{__('Menu Category')}}</div>
                </div>
            </div>
            <div class="section-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelId">
                   <i class="fa fa-plus" aria-hidden="true"></i> {{__('admin.Add New')}}
                  </button>
                <div class="row mt-4">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                            <div class="card-body">
                                <div class="table-responsive table-invoice">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{__('admin.Name')}}</th>
                                              	<th>Serial</th>
                                                <th>{{__('admin.Action')}}</th>
                                              </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($menuCategories as $index => $popularCategory)
                                                <tr>
                                                    <td>{{ $popularCategory->category->name }}</td>
                                                  <td>{{ $popularCategory->serial }}</td>
                                                    <td>
                                                        <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm" onclick="deleteData({{ $popularCategory->id }})"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                    </td>

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
        </section>
      </div>



      <!-- Modal -->
      <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title">{{__('admin.Add Menu category')}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="{{ route('admin.store-menu-category') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="">{{__('admin.Category')}}</label>
                                <select name="category_id" id="" class="form-control">
                                    <option value="">{{__('admin.Select')}}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                          <div class="form-controll">
                            <label for=""> Add Serial </label>
                            <input type="text" name="serial">
                          </div>
                            <button class="btn btn-primary" type="submit">{{__('admin.Save')}}</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
      </div>

<script>
    function deleteData(id){
        $("#deleteForm").attr("action",'{{ url("admin/destroy-menu-category/") }}'+"/"+id)
    }
</script>

@endsection
