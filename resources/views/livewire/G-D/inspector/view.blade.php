@extends('livewire.layouts.app')

@section('component')


<div class="card card-secondary" wire:init="$dispatch('_rendered_')">
    <div class="card-header">
        <h3 class="card-title">{{__('Inspector._view_title_')}}</h3>
        @canAccess($this, 'update')
        <a class="btn btn-warning float-right"
            wire:click="@goTo({{$this->__module}}, {{$this->__component}},  'update', {{$this->model->id}})">{{__('Inspector._update_btn_')}}</a>
        @endcanAccess
        @canAccess($this, 'delete')
        <a class="btn btn-danger float-right"
            wire:click="$dispatch('_delete-it_', {id:'{{$this->model->id}}', title:'{{__('Inspector._delete_box_title_', ['id'=>$this->model->id])}}', text:'{{__('Inspector._delete_box_text_', ['id'=>$this->model->id])}}'})">{{__('Inspector._delete_btn_')}}</a>
        @endcanAccess
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" wire:submit.prevent='view' novalidate disabled>
        <fieldset disabled>
            <div class="card-body">
                <div class="row">
                    <div class="form-group row col-4">
                        <label for="name" class="col-sm-4 col-form-label">{{__('Inspector.id')}}</label>
                        <div class="col-sm-8">
                            <input type="text" value="{{$this->model->id}}" class="form-control-plaintext" id="id"
                                disabled>
                        </div>
                    </div>
                    <div class="form-group row col-4">
                        <label for="name" class="col-sm-4 col-form-label">{{__('Inspector.created_at')}}</label>
                        <div class="col-sm-8">
                            <input type="text" value="{{$this->model->created_at}}" class="form-control-plaintext"
                                id="created_at" disabled>
                        </div>
                    </div>
                    <div class="form-group row col-4">
                        <label for="name" class="col-sm-4 col-form-label">{{__('Inspector.updated_at')}}</label>
                        <div class="col-sm-8">
                            <input type="text" value="{{$this->model->updated_at}}" class="form-control-plaintext"
                                id="updated_at" disabled>
                        </div>
                    </div>
                </div>

                @include('livewire.'.$this->__name.'.fieldset', ['fc_class'=>'form-control-plaintext'])

            </div>
        </fieldset>

        <!-- /.card-body -->
        <div class="card-footer">
            <a type="" class="btn btn-default">{{__('Inspector._back_btn_')}}</a>
        </div>
        <!-- /.card-footer -->
    </form>
</div>

@include('livewire.'.$this->__name.'.modals')

@endsection
