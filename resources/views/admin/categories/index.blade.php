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
                            <h2>Categories</h2>
                        </div>

                       @include('admin.includes.sessioncheck')

                        <table class='table table-hover'>
                            <thead>
                                <th>
                                    Category Name
                                </th>
                                <th>
                                    Editing
                                </th>
                                <th>
                                    Deleting
                                </th>
                            </thead>
                            <tbody>

                                @if($categories ->count() > 0)

                                @foreach($categories as $category)
                                    <tr>
                                        <td>
                                            {{$category->name}}
                                        </td>
                                        <td>
                                            <a href="{{route('category.edit', ['id' => $category->id])}}" class='btn btn-xs btn-info'>
                                                Edit
                                            </a>

                                        </td>
                                        <td>
                                            <a href="{{route('category.delete', ['id' => $category->id])}}" class='btn btn-xs btn-danger'>
                                                Delete
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach

                                @else

                                    <td colspan='5' class='text-center'>No Categories Found</td>

                                @endif
                            </tbody>
                        </table>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
