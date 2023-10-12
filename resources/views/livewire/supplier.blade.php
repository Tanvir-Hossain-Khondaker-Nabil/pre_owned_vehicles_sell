<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myLargeModalLabel">Customer Create</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form wire:submit=save>
                <div class="row">
                    <div class="col-xl-6">
                        <x-livewire-input label='Name' :required=true placeholder="Enter Your Name" name="name">
                        </x-livewire-input>
                    </div>
                    {{-- <div class="col-xl-6">
                        <x-livewire-input label='Upload Image' type='file' placeholder="Upload Image" name="avatar">
                        </x-livewire-input>
                    </div> --}}
                    <!-- end col -->
                    <div class="col-xl-6">
                        <x-livewireinput label='Email' :required=true type="email" placeholder="Enter Your Email"
                            name="email">
                        </x-livewireinput>
                    </div>
                    <div class="col-xl-6">
                        <x-livewireinput label='NID' :required=true type="number" placeholder="Enter Your NID"
                            name="nid">
                        </x-livewireinput>
                    </div>
                    <div class="col-xl-6">
                        <x-livewireinput label='Phone One' :required=true type="tel" placeholder="Phone One"
                            name="phone_1">
                        </x-livewireinput>
                    </div>
                    <div class="col-xl-6">
                        <x-livewireinput label='Phone Two' :required=true type="tel" placeholder="Phone Two"
                            name="phone_2">
                        </x-livewireinput>
                    </div>

                    <div class="col-xl-6">
                        <x-livewireinput label='Driving License No' :required=true type="number"
                            placeholder="Enter Your Driving License No" name="driving_license_no">
                        </x-livewireinput>
                    </div>
                    <div class="mt-2">
                        <label class="form-label-lg fs-5 mx-3" for="avater">Address</label>
                        <textarea class="form-control form-control-lg ps-3" required wire:model="address" id="" rows="1"
                            placeholder="Enter Your Address"></textarea>
                    </div>
                    <div class="col-xl-12 m-4">
                        <div>
                            <button type="submit" class="btn btn-primary w-md">
                                Submit</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
