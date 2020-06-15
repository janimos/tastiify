@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
  <div class="content">


      <div class="mx-auto my-5">
        <div class="title products-title">
            Search
        </div>
      </div>
      <div class="d-box" style="margin-left: 30%;">
      <div class="row col-sm-6 justify-content-center">
        <div class="form-group">
          <input type="text" class="form-controller" id="search" name="search"></input>
        </div>
          <table class="table table-bordered table-hover" style="background-color: white;">
            <thead>
            <tr>
              <th>Product Name</th>
              <th>Country</th>
              <th>Price</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
      </div>

    </div>
  </div>
</div>
<script type="text/javascript">
  $('#search').on('keyup',function(){
    $value=$(this).val();
      $.ajax({
        type : 'get',
        url : '{{URL::to('search/products')}}',
        data:{'search':$value},
        success:function(data){
        $('tbody').html(data);
      }
    });
  })
</script>
<script type="text/javascript">
  $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
@endsection
