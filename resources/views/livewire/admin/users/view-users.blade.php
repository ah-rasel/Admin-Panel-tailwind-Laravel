<div class="flex flex-col mt-5">
  @can('user_access')
  <x-table.action_performed event-name="record_deleted" :details="$deleted_record"></x-table.action_performed>
  <div class="space-x-1 mb-3">
    @can('user_create')
    <x-table.button.top href="{{route('admin.users.create')}}" class="bg-purple-600">
      Add New User
    </x-table.button.top>
    @endcan
    @can('user_delete')
      @if ($selected)
          <x-table.button.top wire:click.prevent='DeleteSelected()' class="bg-red-600" href="#">
            Delete Selected Users
          </x-table.button.top>
      @endif
    @endcan
  </div>
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 min-h-[570px]">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <x-table.table>
          <x-slot name="head">
            <x-table.heading class="w-3">
              @can('user_delete')  <x-input.checkbox/> @endcan
            </x-table.heading>

            <x-table.heading>Name</x-table.heading>
            <x-table.heading>ROle</x-table.heading>
            <x-table.heading>Status</x-table.heading>
            <x-table.heading>Action</x-table.heading>
          </x-slot>
       
          <x-slot name="body">
          @foreach ($users as $user)
            <x-table.row>
                <x-table.cell class="w-3">
                  @can('user_delete')  <x-input.checkbox wire:model='selected' value="{{$user->id}}"/> @endcan
                </x-table.cell>

                <x-table.cell>
                  <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10">
                        <img class="h-10 w-10 rounded-full" src="{{$user->profile_photo_url}}" alt="">
                    </div>
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900 dark:text-gray-300">
                        {{$user->name}}
                        </div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">
                            {{$user->email}}
                        </div>
                    </div>
                  </div>
                </x-table.cell>

                <x-table.cell> 
                  @foreach ($user->roles as $role)
                      {{$role->title}}
                  @endforeach
                </x-table.cell>

                <x-table.cell> 
                  <x-badge success> Active</x-badge> 
                </x-table.cell>

                <x-table.cell> 
                  <div class="flex space-x-4">
                    @can('user_edit') <x-table.button.action href="{{route('admin.users.edit',$user->id)}}" edit/> @endcan
                    @can('user_delete') <x-table.button.action wire:click="Delete({{$user->id}})" delete/> @endcan
                  </div>
                </x-table.cell>
            
              </x-table.row>
              @endforeach
          </x-slot>
      </x-table.table>
      </div>
    </div>
    {{ $users->links() }}
    @endcan
  </div>