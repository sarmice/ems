<!-- resources/views/speaker-form.blade.php -->
@if(session('success'))
    <div>
        {{ session('success') }}
    </div>
@endif
<form method="POST" action="{{ route('speakers.store') }}">
    @csrf

    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        @error('name')
        <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        @error('email')
        <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="bio">Bio</label>
        <textarea name="bio" id="bio" rows="4" required>{{ old('bio') }}</textarea>
        @error('bio')
        <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="title">Talk Title</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}" required>
        @error('title')
        <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="abstract">Talk Abstract</label>
        <textarea name="abstract" id="abstract" rows="4" required>{{ old('abstract') }}</textarea>
        @error('abstract')
        <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="preferred_time_slot">Preferred Time Slot</label>
        <input type="text" name="preferred_time_slot" id="preferred_time_slot" value="{{ old('preferred_time_slot') }}" required>
        @error('preferred_time_slot')
        <span>{{ $message }}</span>
        @enderror
    </div>

    <button type="submit">Submit</button>
</form>
@if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
