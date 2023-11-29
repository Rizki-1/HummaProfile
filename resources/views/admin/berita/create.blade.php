<form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach

        <!-- Category Selection with Select2 -->
    <div class="form-group">
        <label for="category">Category</label>
        <select class="form-control" id="category" name="category[]" multiple>
            @foreach ($kategoriBerita as $category)
                <option value="{{ $category->id }}"
                    {{ in_array($category->id, old('category', [])) ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Photo Thumbnail -->
    <div class="form-group">
        <label for="thumbnail">Thumbnail Photo</label>
        <input type="file" class="form-control-file" id="thumbnail" name="thumbnail">
        @if (old('thumbnail'))
            <img src="{{ old('thumbnail') }}" alt="Thumbnail Preview" class="img-thumbnail mt-2"
                style="max-width: 200px;">
        @endif
        <img id="thumbnail-preview" src="{{ old('thumbnail') }}" alt="Thumbnail Preview" class="img-thumbnail mt-2"
            style="max-width: 200px; display: none;">
    </div>

    <!-- News Title -->
    <div class="form-group">
        <label for="title">News Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
    </div>

    <!-- News Description -->
    <div class="form-group">
        <label for="description">News Description</label>
        <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<!-- Include Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- Include Select2 CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">

<!-- Include Select2 JS -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<!-- Initialize Select2 -->
<script>
    $(document).ready(function() {
        $('#category').select2();
    });

    $(document).ready(function() {
        $('#thumbnail').change(function() {
            var file = this.files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#thumbnail-preview').attr('src', e.target.result).show();
                };

                reader.readAsDataURL(file);
            } else {
                $('#thumbnail-preview').hide();
            }
        });
    });
</script>
