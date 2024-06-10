<div>
    <h1>{{__('Inspector._index_title_')}}</h1>
    <div class="row">
        <div class="col-6 align-items-center">
            @livewire($this->__name, ['view' => 'create', 'lazy'=> true])
        </div>
        <div class="col-6 align-items-center">
            @livewire($this->__name, ['view' => 'list', 'lazy'=> true])
        </div>
    </div>
</div>
