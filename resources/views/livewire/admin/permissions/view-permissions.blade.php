<div class="flex flex-col mt-5">
    <x-table.action_performed event-name="record_deleted" :details="$deleted_record"></x-table.action_performed>
    <div class="space-x-1 mb-3">
      @can('permission_create')
      <x-table.button.top href="{{route('admin.permissions.create')}}" class="bg-purple-600">
        Add New Permission
      </x-table.button.top>
      @endcan
      @can('permission_delete')
        @if ($selected)
        <x-table.button.top wire:click.prevent='DeleteSelected()' class="bg-red-600" href="#">
          Delete Selected Permissions
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
              <x-table.heading>Permission Tilte</x-table.heading>
              <x-table.heading>Action</x-table.heading>
            </x-slot>
         
            <x-slot name="body">
           @foreach ($permissions as $permission)
              <x-table.row wire:key='row-{{$permission->id}}'>
                  <x-table.cell class="w-3">
                    @can('permission_delete') <x-input.checkbox wire:model="selected" value="{{$permission->id}}"/>@endcan
                  </x-table.cell>
  
                  <x-table.cell>
                    {{ $permission->title}}
                  </x-table.cell>
                  <x-table.cell>
                   @can('permission_delete') <x-table.button.action wire:click='Delete({{$permission->id}})' delete/>@endcan 
                  </x-table.cell>
  
                </x-table.row>
            @endforeach
            </x-slot>
        </x-table.table>
        </div>
      </div>
      {{ $permissions->links() }}
    </div>