@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
      <div class="mx-auto my-5">
        <div class="title products-title">
            Edit product
        </div>
      </div>
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-8">
                  <div class="card">
                      <div class="list-group-item-new">
                        <form style="margin-top: 20px;" class="form-horizontal" enctype="multipart/form-data">
                          @csrf
                          {{ method_field('PATCH') }}
                          <div class="form-group row">
                            <label for="make" class="col-md-4 control-label text-md-right">Product name</label>
                            <div class="col-md-6">
                              <input type="text" class="form-control make">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="make" class="col-md-4 control-label text-md-right">New price</label>
                            <div class="col-md-6">
                              <input type="text" class="form-control make">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="make" class="col-md-4 control-label text-md-right">New country</label>
                            <div class="col-md-6">
                              <input type="text" class="form-control make">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="make" class="col-md-4 control-label text-md-right">Keywords</label>
                            <div class="col-md-6">
                              <select size="3" multiple style="width: 100%;">
                                @foreach($keywords as $key)
                                  <option value="{{ $key->Name }}">{{ $key->Name }}</option>
                                @endforeach
                              </select>
                              <p style="font-size: 9px;">Hold Ctrl or Command to select multiple keywords</p>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="make" class="col-md-4 control-label text-md-right">New image</label>
                            <div class="col-md-6">
                              <input type="file" name="uploadfile" class="form-control make btn">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label add-comment"><h4>Description</h4></label>
                            <div class="col-sm-6-max">
                              <textarea class="form-control" name="description" id="description" rows="5"></textarea>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                              <input type="submit" class="btn btn-warning" value="Edit">
                            </div>
                          </div>
                        </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <footer class="container py-5">
        <div class="links">
            <a href="https://laravel.com/docs">Docs</a>
            <a href="https://laracasts.com">Laracasts</a>
            <a href="https://laravel-news.com">News</a>
            <a href="https://blog.laravel.com">Blog</a>
            <a href="https://nova.laravel.com">Nova</a>
            <a href="https://forge.laravel.com">Forge</a>
            <a href="https://vapor.laravel.com">Vapor</a>
            <a href="https://github.com/laravel/laravel">GitHub</a>
        </div>
      </footer>
  </div>
</div>
@endsection
