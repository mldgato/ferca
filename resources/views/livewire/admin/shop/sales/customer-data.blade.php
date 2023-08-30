<div>
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <div class="form-group">
                <label for="taxnumber">NIT:</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fab fa-slack-hash"></i></span>
                    </div>
                    <input type="text" name="nit" id="nit" class="form-control" list="final_consumer" wire:model="nit"
                        wire:keydown="buscarCliente">
                    <datalist id="final_consumer">
                        <option value="CF"></option>
                    </datalist>
                </div>
                @error('taxnumber')
                    <span class="text-danger error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="form-group">
                <label for="name">Cliente:</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                    </div>
                    <input type="text" name="name" id="name" class="form-control" wire:model="name"
                        value="{{ session()->get('customer_name') }}" required>
                    <input type="hidden" name="customer_id" wire:model="customer_id"
                        value="{{ session()->get('customer_id') }}">
                </div>
                @error('name')
                    <span class="text-danger error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="form-group">
                <label for="email">Email:</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                    </div>
                    <input type="email" name="email" id="email" class="form-control" wire:model="email"
                        required>
                </div>
            </div>
            @error('email')
                <span class="text-danger error">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-8">
            <div class="form-group">
                <label for="address">Dirección:</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                    </div>
                    <input type="text" name="address" id="address" class="form-control" wire:model="address"
                        required>
                </div>
            </div>
            @error('address')
                <span class="text-danger error">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="form-group">
                <label for="phone">Teléfono:</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                    </div>
                    <input type="text" name="phone" id="phone" class="form-control" wire:model="phone"
                        required>
                </div>
            </div>
            @error('phone')
                <span class="text-danger error">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <div class="form-group">
                <label for="totalMoney">Total:</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fab fa-quora"></i></span>
                    </div>
                    <input type="text" name="totalMoney" id="totalMoney" class="form-control" wire:model="totalMoney"
                        required readonly>
                    <input type="hidden" name="simple_pay" wire:model="total">
                </div>
            </div>
            @error('totalMoney')
                <span class="text-danger error">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="form-group">
                <label for="pay">Pago:</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fab fa-quora"></i></span>
                    </div>
                    <input type="number" name="pay" id="pay" class="form-control" wire:model="pay"
                        required>
                </div>
            </div>
            @error('pay')
                <span class="text-danger error">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
