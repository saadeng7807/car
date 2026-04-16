@extends('layouts.app_dashboard')


@section('content')

 <div class="container">
    <div class="card">
      <div class="card-body">
         <div class="row d-flex justify-content-center">
        <div class="col-md-8 ">
          <h3 class="alert alert-info text-center">بيانات فئات السيارات</h3>
          <form action="{{ route('save_brand') }}" method="post">
            @csrf
             <div class="mb-3">
              <label class="form-label">اسم الفئة</label>
              <input type="text" class="form-control" name="name" >
              @error('name')
                <div class="invalid-feedbaCK "><span class="text-danger">{{ $message }}</span></div>
              @enderror
             </div>
           
             <div class="mb-3">
              <label class="form-label"> فئة السيارة   </label>
                <select class="form-select" name="type">
                  <option value="sydan">sydan</option>
                  <option value="SUV"> SUV </option>
                   <option value="sport"> sport </option>
                </select>
            </div>
             <div class="mb-3">
              <label class="form-label">الوصف </label>
              <textarea class="form-control" name="description" rows="3" ></textarea>
               @error('description')
                <div class="invalid-feedbaCK text-danger"><span class="text-danger">{{ $message }}</span></div>
              @enderror
             </div>
                <div class="row">
                  <div class="col text-center">
                      <button type="submit" class="btn btn-primary ">حفظ</button>
                  </div>
                </div>
          </form>
        </div>
      </div>
      </div>
    </div>
 </div>

@endsection