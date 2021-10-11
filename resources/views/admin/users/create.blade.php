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
                            <h2>Create New User</h2>
                        </div>

                        @include('admin.includes.errors')
                        @include('admin.includes.sessioncheck')



                        <div class='panel-body'>
                            <form action="{{route('user.store')}}" method="post" enctype='multipart/form-data'>

                                {{csrf_field()}}

                                <div class='form-group'>
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class='form-control'>
                                </div>
                                  <br>
                                <div class='form-group'>
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class='form-control'>
                                </div>
                                 <br>
                                <div class='form-group'>
                                    <div class='text-center'>
                                        <button type="submit" class='btn btn-success'>Store User</button>
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
