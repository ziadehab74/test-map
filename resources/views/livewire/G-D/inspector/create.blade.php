@extends('livewire.layouts.app')

@section('component')

<div class="card card-primary" wire:init="$dispatch('_rendered_')">
    <div class="card-header">
        <h3 class="card-title">{{__('Inspector._create_title_')}}</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" wire:submit.prevent='create' novalidate>
        <fieldset>
            <div class="card-body">
                @include('livewire.'.$this->__name.'.fieldset', ['fc_class'=>'form-control'])
            </div>
        </fieldset>
        <!-- /.card-body -->
        <div class="card-footer">
            <a href="javascript:history.back(); return false;"
                class="btn btn-default">{{__('Inspector._back_btn_')}}</a>
            <button type="submit" class="btn btn-primary float-right">{{__('Inspector._save_btn_')}}</button>
        </div>
        <!-- /.card-footer -->
    </form>
</div>

@endsection