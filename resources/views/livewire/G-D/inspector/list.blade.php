@extends('livewire.layouts.app')

@section('component')
<?php $can_view   = false; ?>
<?php $can_update = false; ?>
<?php $can_delete = false; ?>

@canAccess($this, 'view')
<?php $can_view = true; ?>
@endcanAccess

@canAccess($this, 'update')
<?php $can_update = true; ?>
@endcanAccess

@canAccess($this, 'delete')
<?php $can_delete = true; ?>
@endcanAccess


<div class="card card-primary" wire:init="$dispatch('_rendered_')">
    <div class="card-header">
        <h3 class="card-title">{{__('Inspector._list_title_')}}</h3>
        <br />
        <div class="row">
            <div class="col-6">
                <div class="input-group mb-3">
                    <input type="text" wire:model.live.debounce.500ms='__search' class="form-control" id="__search"
                        placeholder="{{__('Inspector._search_placeholder_')}}">
                    <button class="input-group-text"
                        wire:click.prevent="$set('__search', '')">{{__('Inspector._clear_search_btn_')}}</button>
                </div>
            </div>
            <div class="col-6">
                {{$data->links('vendor.livewire.simple-bootstrap')}}
            </div>
        </div>

    </div>
    <!-- /.card-header -->
    <?php $columns = ["id","name","nat_id","created_at","created_by","deleted_at","deleted_by","updated_at","updated_by"];?>
    <div class="card-body">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        @foreach ($columns as $col)
                        <th class="text-center" scope="col">{{__('Inspector.'.$col)}}</th>
                        @endforeach
                        <th class="text-center" scope="col"> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $record)
                    <tr>
                        @foreach ($columns as $col)
                        <td class="text-center">{{$record->$col}}</td>
                        @endforeach
                        <td class="text-center">
                            @if($can_view)
                            <a class="btn btn-default"
                                wire:click="@goTo({{$this->__module}}, {{$this->__component}}, view, {{$record->id}})">{{__('Inspector._view_btn_')}}</a>
                            @endif
                            @if($can_update)
                            <a class="btn btn-warning"
                                wire:click="@goTo({{$this->__module}}, {{$this->__component}}, update, {{$record->id}})">{{__('Inspector._update_btn_')}}</a>
                            @endif
                            @if($can_delete)
                            <a class="btn btn-danger"
                                wire:click="$dispatch('_delete-it_', {id:'{{$record->id}}', title:'{{__('Inspector._delete_box_title_', ['id'=>$record->id])}}', text:'{{__('Inspector._delete_box_text_', ['id'=>$record->id])}}'})">{{__('Inspector._delete_btn_')}}</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <div style="text-align: center">
                {{$data->links('vendor.livewire.simple-bootstrap')}}
            </div>
        </div>
        <!-- /.card-footer -->
    </div>

    @include('livewire.'.$this->__name.'.modals')

    @endsection
