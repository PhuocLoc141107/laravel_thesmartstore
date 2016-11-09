@extends('admin.master')
@section('content')

	<div class="col-lg-12">
        <h1 class="page-header">THÊM HÃNG SẢN XUẤT</h1>
    </div>
                    <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
              
                @if(Session::has('flash_message') && Session::has('status'))
                    <div class="alert alert-{!! Session::get('status') !!} col-sm-12">
                        {!! Session::get('flash_message') !!}
                    </div>
                @endif
                <form action="{!! route('admin.hang-san-xuat.postAdd') !!}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                    <div class="form-group{{ $errors->has('ten') ? ' has-error' : '' }}">
                        <label>Tên hãng sản xuất</label>
                        <input class="form-control" name="ten" placeholder="Nhập hãng sản xuất" value="{{ old('ten') }}"  autofocus/>
                        @if ($errors->has('ten'))
                            <span class="help-block">
                                <strong>{{ $errors->first('ten') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label >Trạng thái</label>
                        <?php
                            $data = ['Kinh doanh', 'Không kinh doanh'];
                            setRadioButton("rdoTrangThai", $data,"Kinh doanh");
                        ?>         
                    </div>

                    <button type="submit" class="btn btn-success">Thêm</button>
                    <button type="reset" class="btn btn-primary">Nhập lại</button>
                    <a href="{!! route('admin.hang-san-xuat.getList') !!}" class="btn btn-danger">Hủy bỏ</a>
                </form>
    </div>
    @section('script')
        @parent
        <script src="{{ url('public/admin/js/load_image.js') }}"></script>
    @stop
@endsection