@php $editing = isset($track) @endphp

<div class="row">
    <div class="form-group col-sm-12">
        <input
            class="form-input"
            type="file"
            name="track"
            label="Track"
            value="{{ old('name', ($editing ? $track->name : '')) }}"
            placeholder="Track Name"
            required
        >
    </div>


</div>
