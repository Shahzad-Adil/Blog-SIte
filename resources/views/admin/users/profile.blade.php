<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

     <!-- <div class="py-8"> -->
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8"> 
            <!-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> -->
                <div class="p-6 bg-blue border-b border-gray-300">
                    <!-- Create New Post here -->
                    <div class='panel panel-default'>
                        <div class='panel-heading'>
                            <h2>Edi Your Profile</h2>
                        </div>

                        @include('admin.includes.errors')
                        @include('admin.includes.sessioncheck')



                        <div class='panel-body'>
                            <form action="{{route('user.profile.update')}}" method="post" enctype='multipart/form-data'>

                                {{csrf_field()}}

                                <div class='form-group'>
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value='{{ $user->name }}'  class='form-control'>
                                </div>
                                  <br>
                                <div class='form-group'>
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value='{{ $user->email }}' class='form-control'>
                                </div>
                                 <br>
                                 <div class='form-group'>
                                    <label for="password">New Password</label>
                                    <input type="password" name="password" class='form-control'>
                                </div>
                                 <br>
                                 <div class='form-group'>
                                    <label for="name">Upload new photo</label>
                                    <input type="file" name="avatar" class='form-control'>
                                </div>
                                 <br>
                                 <div class='form-group'>
                                    <label for="facebook">Facebook</label>
                                    <input type="text" name="facebook" value='{{ $user->profile->facebook }}' class='form-control'>
                                </div>
                                 <br>
                                 <div class='form-group'>
                                    <label for="youtube">Youtube Profile</label>
                                    <input type="text" name="youtube" value='{{ $user->profile->youtube }}' class='form-control'>
                                </div>
                                 <br>
                                 <div class='form-group'>
                                    <label for="about">About you</label>
                                    <textarea name="about" id="about" class='form-control' cols="6" rows="6">
                                        {{ $user->profile->about }}
                                    </textarea>
                                </div>
                                <div class='form-group'>
                                    <div class='text-center'>
                                        <button type="submit" class='btn btn-success'>Update Profile</button>
                                    </div>

                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
