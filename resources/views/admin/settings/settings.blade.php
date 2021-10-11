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
                            <h2>Update Site Settings</h2>
                        </div>

                        @include('admin.includes.errors')
                        @include('admin.includes.sessioncheck')



                        <div class='panel-body'>
                            <form action="{{route('settings.update')}}" method="post" enctype='multipart/form-data'>

                                {{csrf_field()}}

                                <div class='form-group'>
                                    <label for="name">Site Name</label>
                                    <input type="text" name="site_name" value='{{ $settings->site_name }}' class='form-control'>
                                </div>
                                  <br>
                                  <div class='form-group'>
                                    <label for="name">Contact Number</label>
                                    <input type="text" name="contact_number" value='{{ $settings->contact_number }}' class='form-control'>
                                </div>
                                  <br>
                                  <div class='form-group'>
                                    <label for="name">Contact Email</label>
                                    <input type="email" name="contact_email" value='{{ $settings->contact_email }}' class='form-control'>
                                </div>
                                  <br>
                                <div class='form-group'>
                                    <label for="email">Address</label>
                                    <input type="text" name="address" value='{{ $settings->address }}'  class='form-control'>
                                </div>
                                 <br>
                                <div class='form-group'>
                                    <div class='text-center'>
                                        <button type="submit" class='btn btn-success'>Update Settings</button>
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
