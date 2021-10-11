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
                            <h2>Update Post : {{$post->title}}</h2>
                        </div>
                        @include('admin.includes.errors')
                        @include('admin.includes.sessioncheck')



                        <div class='panel-body'>
                            <form action="{{route('post.update', ['id' => $post->id ] )}}" method="post" enctype='multipart/form-data'>

                                {{csrf_field()}}

                                <div class='form-group'>
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class='form-control' value='{{$post->title}}'>
                                </div>
                                <br>
                                <div class='form-group'>
                                    <label for="title">Select a Category</label>
                                    <select name="category_id" id="category" class='form-control' >

                                        @foreach($categories as $category)

                                            <option value="{{$category->id}}"
                                                @if($post->category_id == $category->id) 
                                                    selected
                                                @endif

                                                > {{$category->name}} </option>

                                        @endforeach

                                    </select>
                                </div>
                                <br>
                                <div class='form-group'>
                                    <label for="tags">Select tags</label>
                                    @foreach($tags as $tag)
                                    <div class='chechbox'>
                                        <label><input type='checkbox' for="checkbox" name='tags[]' value='{{ $tag->id }}'
                                                @foreach($post->tags as $t)
                                                    @if($tag->id == $t->id)
                                                        checked
                                                    @endif
                                                @endforeach
                                                >
                                                 {{$tag->tag}} </label>
                                    </div>
                                    @endforeach
                                </div>
                                <br>
                                <div class='form-group'>
                                    <label for="featured">Featured Image</label>
                                    <input type="file" name="featured" class='form-control'>
                                </div>
                                <br>
                                <div class='form-group'>
                                    <label for="content">Content</label>
                                    <textarea name="content"  cols="100" rows="5">{{$post->content}}</textarea>
                                </div>
                                <br>
                                <div class='form-group'>
                                    <div class='text-center'>
                                        <button type="submit" class='btn btn-success'>Update Post</button>
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
