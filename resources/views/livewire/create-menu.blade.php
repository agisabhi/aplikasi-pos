<div>
    <!-- Form Labels on top - Default Style -->
    @if (session('success'))
      <span class="text-sm text-success">{{ session('success') }}</span>
    @endif
                  <form action="" wire:submit="createMenu">
                    @csrf
                    <div class="mb-4">
                      <label class="form-label" for="example-ltf-email">Menu Name</label>
                      <input type="text" wire:model="nama_menu" class="form-control" id="nama_menu" name="nama_menu" placeholder="Name of Menu.." >
                      @error('nama_menu')
                          <span class="text-sm text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="example-ltf-password">Price</label>
                      <input type="number" wire:model="harga" class="form-control" id="harga" name="harga" placeholder="Price.." >
                      @error('harga')
                          <span class="text-sm text-danger">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="mb-4">
                      <label class="form-label" for="example-ltf-password">Description</label>
                      <input type="text" wire:model="deskripsi" class="form-control" id="deskripsi" name="deskripsi" placeholder="Description.." >
                      @error('deskripsi')
                          <span class="text-sm text-danger">{{ $message }}</span>
                      @enderror
                    </div>

                    <div wire:ignore></div>
                    <div class="mb-4">
                      <label class="form-label" for="example-ltf-password">Category</label>
                      <select wire:model="kategori_id" name="kategori_id" class="form-control" >
                        <option value="" selected>Choose one..</option>
                        <option value="1">Satu</option>
                      </select>
                      @error('kategori_id')
                          <span class="text-sm text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="example-ltf-password">Menu Image</label>
                      <input wire:model="foto" accept="image/png, image/jpg, image/jpeg" type="file" class="form-control" id="foto" name="foto">
                      @error('foto')
                          <span class="text-sm text-danger">{{ $message }}</span>
                      @enderror

                      @if ($foto)
                        <img width="100%" height="60%" src="{{ $foto->temporaryUrl() }}" alt="">
                      @endif
                    </div>
                    <div class="mb-4">
                      <button type="submit" id="submit" class="btn btn-primary col-lg-12" onClick="submit()">Submit</button>
                    </div>
                  </form>
                  <!-- END Form Labels on top - Default Style -->
</div>
