@foreach ($subcategories as $subcategory)
    <option value="{{ $subcategory->id }}">{{ $newDashes }}{{ $subcategory->name }}</option>

    @if (count($subcategory->subcategory))
        @php
            $newDashes = $newDashes . '|--- ';
        @endphp

        @include('backend.category.subCategoryCreate', [
        'subcategories' => $subcategory->subcategory,
        'newDashes' =>$newDashes
        ])
    @endif
@endforeach
