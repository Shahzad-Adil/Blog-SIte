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
                            <h2>Posts</h2>
                        </div>

                       @include('admin.includes.sessioncheck')

                        <table class='table table-hover'>
                            <thead>
                                <th>
                                    Image
                                </th>
                                <th>
                                    Title
                                </th>
                                <th>
                                    Editing
                                </th>
                                <th>
                                    Restoring
                                </th>
                                <th>
                                    Deleting
                                </th>
                            </thead>
                            <tbody>
                                @if($posts ->count() > 0)
                                
                                @foreach($posts as $post)
                                        <tr>
                                        <td>
                                            <img src="{{ $post->featured }}" alt=" {{$post->title}}" width='60px' height='50px'>
                                        </td>
                                        <td>
                                            {{$post->title}}
                                        </td>
                                        <td>
                                                Edit

                                        </td>
                                        <td>
                                            <a href="{{route('post.restore', ['id' => $post->id])}}" class='btn btn-xs btn-success'>

                                                Restore

                                        </td>
                                        <td>
                                            <a href="{{route('post.kill', ['id' => $post->id])}}" class='btn btn-xs btn-danger'>

                                                Delete

                                        </td>
                                    </tr>
                                @endforeach

                                @else

                                    <td colspan='5' class='text-center'>No Trashed Posts</td>

                                @endif
                              
                            </tbody>
                        </table>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
