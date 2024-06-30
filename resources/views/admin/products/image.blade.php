@extends('admin.layouts.admin')

@section('content')
    <div class="p-4">
        <x-form-header :value="__('Add Images')" class="p-4" />

        @livewire('product-image', [
            'id' => $id,
        ])

    </div>
@endsection
