<div>
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <div class="form-group">
                <label for="taxnumber">NIT:</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fab fa-slack-hash"></i></span>
                    </div>
                    <input type="number" name="nit" id="nit" class="form-control" wire:model="nit"
                        wire:keydown="buscarCliente">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <div class="form-group">
                <label for="name">Cliente:</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                    </div>
                    <input type="text" name="name" id="name" class="form-control" wire:model="name"
                        value="{{ session()->get('customer_name') }}" required>
                </div>
            </div>
        </div>
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
        </div>
    </div>
    <div class="row">
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
        </div>
    </div>
</div>
