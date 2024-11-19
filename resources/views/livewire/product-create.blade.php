<div class="container mt-5" wire:poll.5000ms="refreshPrices">
    <div class="d-flex gap-3">
        <div class="col-md-4 border p-4" style="height: 500px;">
            <h2>Informacje</h2>
            <hr>
            <div class="mb-2">
                <label for="name">Nazwa produktu</label>
                <input type="text" id="name" class="form-control rounded-0" wire:model="name">
                <div>@error('name') {{ $message }} @enderror</div>
            </div>

            <div class="mb-2">
                <label for="metal">Metal</label>
                <select id="metal" class="form-select rounded-0" wire:model.live="metal">
                    <option value="Złoto">Złoto</option>
                    <option value="Srebro">Srebro</option>
                    <option value="Platyna">Platyna</option>
                    <option value="Pallad">Pallad</option>
                </select>
                <div>@error('metal') {{ $message }} @enderror</div>
            </div>

            <div class="mb-2">
                <label for="weight">Waga (g)</label>
                <input type="number" step="1" min="0" id="weight" class="form-control rounded-0" wire:model.live.debounce.200ms="weight">
                <div>@error('weight') {{ $message }} @enderror</div>
            </div>

            <div class="mb-2">
                <label for="change_percent">Zmiana (%)</label>
                <input type="number" step="1" min="0" id="change_percent" class="form-control rounded-0" wire:model.live.debounce.200ms="change_percent">
                <div>@error('change_percent') {{ $message }} @enderror</div>
            </div>
        </div>

        <div class="col-md-4 border p-4" style="height: 500px;">
            <h2>Wyliczenia</h2>
            <hr>
            <ul class="list-unstyled">
                <li>Cena podstawowa</li>
                <li><h2>{{ number_format($base_price, 2, ',', ' ') }} zł</h2></li>
                <li>Zmiana</li>
                <li><h2>+{{ number_format($change_value, 2, ',', ' ') }} zł</h2></li>
                <li>Cena finalna</li>
                <li><h2>{{ number_format($final_price, 2, ',', ' ') }} zł</h2></li>
            </ul>
        </div>
    </div>
    <button class="btn btn-primary rounded-0 mt-3" wire:click="saveProduct">Dodaj produkt</button>
</div>
