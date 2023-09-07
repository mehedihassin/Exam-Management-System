
@extends('backend.master')
@section('content')


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
            {{-- profile image  section start --}}

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

          @if (!Auth::user()->user_picture)

            <form action="{{ route('user_picture_store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h4>Upload Profile Image</h4>
                <p>Upload your image</p>

                <input type="file" name="image" class="form-control" required>
                <button type="submit" class="mt-3 btn btn-primary">Save</button>
            </form>

        @else

            <form action="{{ route('user_picture_update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h4>Update Profile Image</h4>
                <p>Update your image</p>

                <input type="file" name="image" class="form-control" required>
                <button type="submit" class="mt-3 btn btn-primary">Update</button>
            </form>

          @endif
             </div>
            {{-- profile image section end--}}
{{-- profile image delete section start --}}
          @if ( Auth::user()->user_picture)
          <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <h4>Remove your profile image</h4>
            <p>You can remove your profile image</p>
            <img width="100" src="{{ asset('storage/users/'. Auth::user()->user_picture->image) }}" alt="">
           <div>
            <a  href="{{ route('user_picture_remove') }}" class="btn btn-danger mt-3">Remove</a>
           </div>

        </div>


          @endif
            {{-- profile image delete section end --}}
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>

    </div>
    @endsection

