@extends('admin.layouts.admin')

@section('content')
    <div class="p-4">
        <x-form-header :value="__('Update Video Category')" />
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="w-full" action="{{ route('admin.video_categories.update', $category) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Add this line for method spoofing -->
            <div class="grid md:grid-cols-1 md:gap-6">
                <!-- Name Address -->
                <div>
                    <x-input-label for="name" :value="__('Name')" /><span class="text-red-500">*</span>
                    <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name', $category->name)"
                        required autofocus placeholder="Name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
            </div>
            <div class="pt-4">
                <x-input-label for="description" :value="__('Description')" />
                <textarea id="description" name="description" class="block w-full p-2 mt-1 border" rows="4">{{ old('description',$category->description) }}</textarea>
            </div>

            <div class="my-4 mb-6">
                <div class="flex items-center space-4">
                    <div class="max-w-40">
                        <img id="selected-image" src="{{ asset('assets/images/video_categories/' . $category->image) }}"
                            alt="Selected Image" class="max-w-full pr-4 max-h-40" />
                    </div>
                    <div class="flex-1">
                        <x-input-label for="types" :value="__('Upload Image (max : 2MB)')" />
                        <x-file-input id="dropzone-file" name="image" accept="image/png, image/jpeg, image/gif"
                            onchange="displaySelectedImage(event)" />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>
                </div>
            </div>

            <div>
                <x-outline-button href="{{ URL::previous() }}">
                    Go back
                </x-outline-button>
                <x-submit-button>
                    Submit
                </x-submit-button>
            </div>
        </form>
    </div>

    <script>
        function displaySelectedImage(event) {
            const fileInput = event.target;
            const file = fileInput.files[0];
            const imgElement = document.getElementById('selected-image');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imgElement.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                imgElement.src = "https://via.placeholder.com/500x500?text=No+Image+Selected";
            }
        }
    </script>
@endsection
