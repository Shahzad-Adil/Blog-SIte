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
                            <h2>Users</h2>
                        </div>

                       @include('admin.includes.sessioncheck')

                        <table class='table table-hover'>
                            <thead>
                                <th>
                                    Image
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Permissions
                                </th>
                                <th>
                                    Delete
                                </th>
                            </thead>
                            <tbody>

                                @if($users ->count() > 0)

                                @foreach($users as $user)
                                    <tr>
                                       <td>
                                           <img src=" {{ asset($user->profile->avatar) }} " alt="photo"
                                           width='60px' height='60px' style='border-radius: 50%' >
                                       </td>
                                       <td>
                                           {{ $user->name}}
                                       </td>

                                       <td>
                                           @if($user->admin)
                                              <a href="{{ route('user.not.admin', ['id'=> $user->id ]) }} "
                                                  class='btn btn-xs btn-danger'>Remove Permissions</a>
                                           @else
                                             <a href="{{ route('user.admin', ['id'=> $user->id ]) }} "
                                                  class='btn btn-xs btn-success'>Make Admin</a>
                                           @endif
                                       </td>
                                       <td>
                                           @if(Auth::id() !== $user->id)
                                        
                                            <a href="{{ route('user.delete', ['id'=> $user->id ]) }} "
                                                class='btn btn-xs btn-danger'>Delete</a>

                                           @endif
                                       </td>
                                    </tr>
                                @endforeach

                                @else

                                <td colspan='5' class='text-center'>No Users</td>

                                @endif
                            </tbody>
                        </table>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
