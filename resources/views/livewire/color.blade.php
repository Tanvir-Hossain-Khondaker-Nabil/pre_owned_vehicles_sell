<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myLargeModalLabel">Color Form</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form wire:submit=save>
                <div class="row">
                    <div class="col-xl-6">
                        <x-livewire-input label='Color Name' :required=true placeholder="Color Name" name="name"
                            value="{{old('name')}}">
                        </x-livewire-input>
                    </div>
                    <div class="col-xl-6">
                        <x-livewire-input label='Color Code' :required=true type="color" placeholder="Color Code" name="code"
                            value="{{old('code')}}">
                        </x-livewire-input>
                    </div>
                    <div class="col-xl-12 m-4">
                        <div>
                            <button type="submit" class="btn btn-primary w-md">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
