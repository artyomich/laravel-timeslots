@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.appointment.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.appointments.update", [$appointment->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('citizen_id') ? 'has-error' : '' }}">
                <label for="citizen">{{ trans('cruds.appointment.fields.citizen') }}*</label>
                <select name="citizen_id" id="citizen" class="form-control select2" required>
                    @foreach($citizens as $id => $citizen)
                        <option value="{{ $id }}" {{ (isset($appointment) && $appointment->citizen ? $appointment->citizen->id : old('citizen_id')) == $id ? 'selected' : '' }}>{{ $citizen }}</option>
                    @endforeach
                </select>
                @if($errors->has('citizen_id'))
                    <p class="help-block">
                        {{ $errors->first('citizen_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('start_time') ? 'has-error' : '' }}">
                <label for="start_time">{{ trans('cruds.appointment.fields.start_time') }}*</label>
                <input type="text" id="start_time" name="start_time" class="form-control datetime" value="{{ old('start_time', isset($appointment) ? $appointment->start_time : '') }}" required>
                @if($errors->has('start_time'))
                    <p class="help-block">
                        {{ $errors->first('start_time') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.appointment.fields.start_time_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('end_time') ? 'has-error' : '' }}">
                <label for="end_time">{{ trans('cruds.appointment.fields.end_time') }}*</label>
                <input type="text" id="end_time" name="end_time" class="form-control datetime" value="{{ old('end_time', isset($appointment) ? $appointment->end_time : '') }}" required>
                @if($errors->has('end_time'))
                    <p class="help-block">
                        {{ $errors->first('end_time') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.appointment.fields.end_time_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection