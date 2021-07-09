<div class="flex flex-col mt-5">
    <x-table.action_performed event-name="record_deleted" :details="$deleted_record"></x-table.action_performed>
    <div class="space-x-1 mb-3">
      @can('role_create')
      <x-table.button.top href="{{route('admin.roles.create')}}" class="bg-purple-600">
        Add New Role
      </x-table.button.top>
      @endcan
      @can('role_delete')
        @if ($selected)
        <x-table.button.top wire:click.prevent='DeleteSelected()' class="bg-red-600" href="#">
          Delete Selected Roles
        </x-table.button.top>
        @endif
      @endcan
    </div>
      <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 min-h-[570px]">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <x-table.table>
            <x-slot name="head">
              <x-table.heading class="w-3">
              </x-table.heading>
              <x-table.heading>Role Tilte</x-table.heading>
              <x-table.heading>Permissions</x-table.heading>
              <x-table.heading>Action</x-table.heading>
            </x-slot>
         
            <x-slot name="body">
           @foreach ($roles as $role)
              <x-table.row wire:key='row-{{$role->id}}'>
                  <x-table.cell class="w-3">
                    @can('role_delete')  <x-input.checkbox wire:model="selected" value="{{$role->id}}"/>@endcan
                  </x-table.cell>
  
                  <x-table.cell>
                    {{ $role->title}}
                  </x-table.cell>
                  
                  <x-table.cell>
                    @foreach ($role->permissions as $key=>$permission)
                    <span class="pb-1 px-1 rounded mt-5 mb-5">{{$permission->title}}</span>,
                      @if ($loop->iteration % 5 == 0)
                          @php
                            echo('</br>')
                          @endphp
                      @endif
                   @endforeach
                  </x-table.cell>

                  <x-table.cell>
                    <div class="flex space-x-4">
                      @can('role_edit')<x-table.button.action href="{{route('admin.roles.edit',$role->id)}}" edit/>@endcan
                        @can('role_delete') <x-table.button.action wire:click='Delete({{$role->id}})' delete/> @endcan
                    </div>
                  </x-table.cell>
  
                </x-table.row>
            @endforeach
            </x-slot>
        </x-table.table>
        </div>
      </div>
      {{ $roles->links() }}
    </div>