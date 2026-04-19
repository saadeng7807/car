@extends('layouts.app_dashboard')


@section('content')

  <div class="container">
    <div class="row">
      <div class="col">
       
         <div class="card">
          <div class="card-header">
            <h3 class="alert alert-info text-center">بيانات السيارات</h3>
          </div>
          <div class="card-body">
             <form action="{{ route('save_car') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label class="form-label">اسم السيارة</label>
                <input type="text" class="form-control" name="model_name" >
                  @error('model_name')
                    <div class="invalid-feedbaCK "><span class="text-danger">{{ $message }}</span></div>
                  @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">السعر</label>
                <input type="text" class="form-control" name="price" >
                @error('price')
                    <div class="invalid-feedbaCK "><span class="text-danger">{{ $message }}</span></div>
                @enderror
              </div>
               <div class="mb-3">
                <label class="form-label">لون السيارة</label>
                <input type="text" class="form-control" name="color" >
                @error('color')
                    <div class="invalid-feedbaCK "><span class="text-danger">{{ $message }}</span></div>
                @enderror
              </div>

                <div class="mb-3">
                <label class="form-label"> سنة الصنع</label>
                <input type="text" class="form-control" name="year" >
                @error('year')
                    <div class="invalid-feedbaCK "><span class="text-danger">{{ $message }}</span></div>
                @enderror
              </div>
             
              <div class="mb-3">
                <label class="form-label"> ممشى السيارة</label>
                <input type="text" class="form-control" name="mileage" >
                @error('mileage')
                    <div class="invalid-feedbaCK "><span class="text-danger">{{ $message }}</span></div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label"> صورة السيارة</label>
                <input type="file" class="form-control" name="image" accept=".jpg,.jpeg,.png,.gif,.webp,.pdf">
              </div>
              <button type="submit" class="btn btn-primary">إضافة سيارة</button>
            </form>
          </div>
         </div> 
      </div>
    </div>
  </div>
@endsection