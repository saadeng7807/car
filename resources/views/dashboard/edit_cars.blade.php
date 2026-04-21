
@extends('layouts.app_dashboard')


@section('content')

<div class="container">
    <div class="card">
        <div class="card-header text-white text-center" style="background-color: rgb(110, 59, 161)">تعديل بيانات السيارات</div>
        <div class="card-body">
            <form action="{{ route('update_car',['id'=> $car->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">اسم السيارة</label>
                     <input type="text" class="form-control" name="model_name" value="{{ $car->model_name }}" >
                   </div>

                <div class="mb-3">
                    <label class="form-label"> فئة السيارة   </label>
                    <select class="form-select" name="type">
                        <option value="sydan" {{ $car->type == 'sydan' ? 'selected' : '' }}>sydan</option>
                        <option value="SUV" {{ $car->type == 'SUV' ? 'selected' : '' }}> SUV </option>
                        <option value="sport" {{ $car->type == 'sport' ? 'selected' : '' }}> sport </option>
                        <option value="transport_large" {{ $car->type == 'transport_large' ? 'selected' : '' }}> transport large </option>

                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label"> سنة الصنع </label>
                    <input type="text" class="form-control" name="year" value="{{ $car->year }}" >
                </div>
                <div class="mb-3">
                    <label class="form-label"> لون السيارة  </label>
                    <input type="text" class="form-control" name="color" value="{{ $car->color }}" >
                </div>
                 <div class="mb-3">
                    <label class="form-label"> سعر السيارة  </label>
                    <input type="text" class="form-control" name="price" value="{{ $car->price }}" >
                </div>

                 <div class="mb-3">
                    <label class="form-label"> ممشى السيارة  </label>
                    <input type="text" class="form-control" name="mileage" value="{{ $car->mileage }}" >
                </div>

                 <div class="mb-3">
                    <label class="form-label"> صورة السيارة  </label>
                    <input type="file" class="form-control" name="image" value="{{ $car->image }}"  accept="image/*">
                </div>
                <div class="row">
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary ">تحديث</button>
                    </div>
            </form>
        </div>
    </div>







@endsection