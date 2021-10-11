<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        
    </x-slot>
    
    <div class="py-4">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-10">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-300">
                     @include('admin.includes.sessioncheck')

                        Great. You're logged in!
                </div>

                <br>
                <div class="row">

                    <div class="col-lg-3">
                        <div class="panel panel-info">
                            <div class="panel-heading text-center" style='padding:10px;background-color:lightblue'>
                                PUBLISHED POSTS
                            </div>
                            <div class="panel-body" style='padding:10px;background-color:#9bdbe5'>
                                <h1 class="text-center"> {{$published_count}} </h1>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="col-lg-3">
                        <div class="panel panel-danger">
                            <div class="panel-heading text-center" style='padding:10px;background-color:#FF6347'>
                                TRASHED POSTS
                            </div>
                            <div class="panel-body" style='padding:10px;background-color:#FF6347'>
                                <h1 class="text-center"> {{$trashed_count}} </h1>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="col-lg-3">
                        <div class="panel panel-success">
                            <div class="panel-heading text-center" style='padding:10px;background-color:lightgreen'>
                                USERS
                            </div>
                            <div class="panel-body" style='padding:10px;background-color:lightgreen'>
                                <h1 class="text-center"> {{$users_count}} </h1>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="col-lg-3">
                        <div class="panel panel-info">
                            <div class="panel-heading text-center" style='padding:10px;background-color:lightblue'>
                                CATEGORIES
                            </div>
                            <div class="panel-body" style='padding:10px;background-color:#9bdbe5'>
                                <h1 class="text-center"> {{$categories_count}} </h1>
                            </div>
                        </div>
                    </div>

                </div>
              

                

            </div>
        </div>
    </div>
</x-app-layout>
