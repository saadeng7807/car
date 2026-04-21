@extends('layouts.app_dashboard')


@section('content')

<div class="container">
    <div class="card">
        <div class="card-header text-white text-center" style="background-color: rgb(110, 59, 161)">تعديل بيانات فئة السيارة</div>
        <div class="card-body">
            <form action="{{ route('update_brand', ['id' => $brand->id]) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label">اسم الفئة</label>
                     <input type="text" class="form-control" name="name" value="{{ $brand->name }}" >
                   </div>

                <div class="mb-3">
                    <label class="form-label"> فئة السيارة   </label>
                    <select class="form-select" name="type">
                        <option value="sydan" {{ $brand->type == 'sydan' ? 'selected' : '' }}>sydan</option>
                        <option value="SUV" {{ $brand->type == 'SUV' ? 'selected' : '' }}> SUV </option>
                        <option value="sport" {{ $brand->type == 'sport' ? 'selected' : '' }}> sport </option>
                        <option value="transport_large" {{ $brand->type == 'transport_large' ? 'selected' : '' }}> transport large </option>

                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">الوصف </label>
                    <textarea class="form-control" name="description" rows="3" >{{ $brand->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">ايقونة الفئة </label>
                    <input type="text" class="form-control" name="icons" value="{{ $brand->icons }}" >
                </div>
                <div class="row">
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary ">تحديث</button>
                    </div>
            </form>
        </div>
    </div>







@endsection