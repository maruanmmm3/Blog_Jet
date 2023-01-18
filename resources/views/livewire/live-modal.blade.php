<div>
   <x-jet-danger-button wire:click="$set('open', true)">{{-- Set metodo magio --}}
        Crear solicitud
   </x-jet-danger-button>


   <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Crear una Solicitud
        </x-slot>

        <x-slot name="content">
          <div class="mb-4">

            {{-- <input type="text" name="username"  value="{{ auth()->user()->name }}" wire:model.defer='userId'> --}}


            <x-jet-label value="Selecciona tu solicitud"/>
            
            <select class="form-select rounded-lg" wire:model.defer='status'>
              <option value="">Seleccionar...</option>
              <option value="1">Cambio de Rol</option>
              <option value="2">Fallo en la Aplicacion</option>
            </select> 

          </div>

          <div class="mb-4">
            <x-jet-label value="Descricion de la Solicitud"/>
            <textarea class="form-control w-full" rows="6" wire:model.defer="descripcion"></textarea>
          </div>
            

            
           {{--  <br>
            <select class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
              <option selected>Open this select menu</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
          </select> --}}

            
        </x-slot>

        <x-slot name="footer">
          <x-jet-secondary-button wire:click="$set('open', false)">
              Cancelar
          </x-jet-secondary-button>


          <x-jet-danger-button wire:click="save">
            Crear Solicitud
          </x-jet-danger-button>
        </x-slot>

   </x-jet-dialog-modal>

</div>
