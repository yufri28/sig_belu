<style>
#map {
    height: 400px;
    margin-bottom: 20px;
    border-radius: 10px;
}
</style>
<div class="container">
    <div class="page-inner">
        <h3 class="fw-bold mb-3">Peta</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <!-- <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63536.63871717301!2d95.32870249999999!3d5.5611019!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3040377ae63dbcdf%3A0x3039d80b220cb90!2sBanda%20Aceh%2C%20Kota%20Banda%20Aceh%2C%20Aceh!5e0!3m2!1sid!2sid!4v1701054428265!5m2!1sid!2sid"
                            width="600" height="450" style="border: 0; width: 100%" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                        <div id="map" style="height: 450px;" class="mb-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="page-inner">
        <h3 class="fw-bold mb-3">Destinasi Wisata</h3>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Grafik Kunjungan Wisatawan <?=date("Y")?></div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="multipleLineChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div class="card-title">Daftar Destinasi Wisata</div>
                            <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                                data-bs-target="#addWisata">
                                <i class="fa fa-plus"></i>
                                Tambah Wisata
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <div class="modal fade" id="addWisata" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <form method="post" action="<?=base_url('wisata/add');?>"
                                        enctype="multipart/form-data">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold"> Destinasi Wisata</span>
                                                <span class="fw-light"> Baru </span>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Nama Wisata
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <input id="nama_wisata" required name="nama_wisata" type="text"
                                                            class="form-control" placeholder="Nama Wisata" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Latitude
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small></label>
                                                        <input id="latitude" required name="latitude" type="text"
                                                            class="form-control" placeholder="Latitude" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Longitude
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <input id="longitude" required name="longitude" type="text"
                                                            class="form-control" placeholder="Longitude" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Geojson
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <textarea rows="5" required name="geojson" id="geojson"
                                                            class="form-control"></textarea>
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Foto
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <input id="foto" required name="foto[]" type="file"
                                                            accept=".jpg, .jpeg, .png" class="form-control" multiple />
                                                        <small id="fileError" class="text-danger"></small>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="preview" class="form-label">Preview</label>
                                                        <div id="preview" class="d-flex flex-wrap"></div>
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Deskripsi
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <textarea rows="5" name="deskripsi" id="deskripsi"
                                                            class="form-control"></textarea>
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Kontak
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <input id="kontak" required name="kontak" type="number"
                                                            class="form-control" placeholder="Kontak" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Jam Kunjung
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <input id="jam_kunjung" required name="jam_kunjung" type="time"
                                                            class="form-control" placeholder="Jam Kunjung" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Jam Tutup
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <input id="jam_tutup" required name="jam_tutup" type="time"
                                                            class="form-control" placeholder="Jam Tutup" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Kecamatan
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <select required class="form-control" name="f_id_kecamatan"
                                                            id="f_id_kecamatan">
                                                            <option value="">-- Pilih --</option>
                                                            <?php foreach ($kecamatan_list as $key => $kecamatan):?>
                                                            <option value="<?=$kecamatan['id_kecamatan'];?>">
                                                                <?=$kecamatan['nama_kecamatan'];?>
                                                            </option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Kategori
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <select required class="form-control" name="f_id_kategori"
                                                            id="f_id_kategori">
                                                            <option value="">-- Pilih --</option>
                                                            <?php foreach ($kategori_list as $key => $kategori):?>
                                                            <option value="<?=$kategori['id_kategori'];?>">
                                                                <?=$kategori['nama_kategori'];?>
                                                            </option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                    <?php if($this->session->userdata('role') == 'admin'):?>
                                                    <div class="form-group form-group-default">
                                                        <label>Pengelola
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <select required class="form-control" name="f_id_pengelola"
                                                            id="f_id_pengelola">
                                                            <option value="">-- Pilih --</option>
                                                            <?php foreach ($pengelola_list as $key => $pengelola):?>
                                                            <option value="<?=$pengelola['id_admin'];?>">
                                                                <?=$pengelola['username'];?>
                                                            </option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                    <?php endif;?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">
                                                Simpan
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <script>
                        document.getElementById('foto').addEventListener('change', function(event) {
                            const previewContainer = document.getElementById('preview');
                            const fileError = document.getElementById('fileError');
                            const maxFiles = 5; // Set the maximum number of files allowed
                            const files = event.target.files;
                            const existingFiles = document.querySelectorAll('#preview div')
                                .length; // Count existing previews

                            fileError.textContent = ''; // Clear previous error messages
                            previewContainer.innerHTML = ''; // Clear previous previews

                            // Check if the number of files exceeds the allowed limit
                            if ((files.length + existingFiles) > maxFiles) {
                                fileError.textContent = `Anda hanya bisa mengunggah maksimal ${maxFiles} file.`;
                                event.target.value = ''; // Clear the input files
                                return; // Stop further execution
                            }

                            // Proceed to display file previews if under limit
                            for (let i = 0; i < files.length; i++) {
                                const file = files[i];

                                // Create a FileReader to read the file
                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    // Create a container for the image and delete icon
                                    const imageContainer = document.createElement('div');
                                    imageContainer.classList.add('position-relative', 'm-2');

                                    // Create an image element
                                    const img = document.createElement('img');
                                    img.src = e.target.result;
                                    img.style.width = '100px'; // Set desired width for preview
                                    img.style.height = '100px'; // Set desired height for preview
                                    img.style.objectFit = 'cover'; // Maintain aspect ratio

                                    // Create a delete icon
                                    const deleteIcon = document.createElement('span');
                                    deleteIcon.innerHTML = '&times;'; // Using '×' as the delete icon
                                    deleteIcon.style.position = 'absolute';
                                    deleteIcon.style.top = '0';
                                    deleteIcon.style.right = '0';
                                    deleteIcon.style.color = 'red'; // Color of the delete icon
                                    deleteIcon.style.cursor = 'pointer';
                                    deleteIcon.style.fontSize = '20pt'; // Set desired font size
                                    deleteIcon.style.fontWeight = 'bold'; // Set font weight to bold

                                    // Add click event to delete the image
                                    deleteIcon.addEventListener('click', function() {
                                        imageContainer.remove(); // Remove the image container
                                        // Optional: You can also remove the file from the input if needed
                                        const dataTransfer = new DataTransfer();
                                        for (let j = 0; j < files.length; j++) {
                                            if (j !== i) {
                                                dataTransfer.items.add(files[j]);
                                            }
                                        }
                                        event.target.files = dataTransfer
                                            .files; // Update the input files
                                    });

                                    // Append image and delete icon to the container
                                    imageContainer.appendChild(img);
                                    imageContainer.appendChild(deleteIcon);
                                    previewContainer.appendChild(imageContainer);
                                }

                                // Read the file as a data URL
                                reader.readAsDataURL(file);
                            }
                        });
                        </script>
                        <!-- Modal Edit Wisata -->
                        <div class="modal fade" id="editWisataBtn" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <form method="post" action="<?=base_url('wisata/edit');?>"
                                        enctype="multipart/form-data" id="editWisataForm">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold"> Edit </span>
                                                <span class="fw-light"> Wisata </span>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Nama Wisata
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <input id="nama_wisata" required name="nama_wisata" type="text"
                                                            class="form-control" placeholder="Nama Wisata" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Latitude
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small></label>
                                                        <input id="latitude" required name="latitude" type="text"
                                                            class="form-control" placeholder="Latitude" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Longitude
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <input id="longitude" required name="longitude" type="text"
                                                            class="form-control" placeholder="Longitude" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Geojson
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <textarea rows="5" required name="geojson" id="geojson"
                                                            class="form-control"></textarea>
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Foto</label>
                                                        <input id="fotoEdit" name="foto[]" multiple type="file"
                                                            accept=".jpg, .jpeg, .png" class="form-control" />
                                                        <small><i>Boleh dikosongkan jika tidak ingin mengubah
                                                                foto</i></small>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Gambar yang Sudah Ada</label>
                                                        <div id="existing_images" class="row col-lg d-flex">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Preview New Uploads</label>
                                                        <div id="preview-edit" class="d-flex flex-wrap"></div>
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Deskripsi
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <textarea rows="5" name="deskripsi" id="deskripsi-edit"
                                                            class="form-control"></textarea>
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Kontak
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <input id="kontak" required name="kontak" type="number"
                                                            class="form-control" placeholder="Kontak" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Jam Kunjung
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <input id="jam_kunjung" required name="jam_kunjung" type="time"
                                                            class="form-control" placeholder="Jam Kunjung" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Jam Tutup
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <input id="jam_tutup" required name="jam_tutup" type="time"
                                                            class="form-control" placeholder="Jam Tutup" />
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Kecamatan
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <select required class="form-control" name="f_id_kecamatan"
                                                            id="f_id_kecamatan">
                                                            <option value="">-- Pilih --</option>
                                                            <?php foreach ($kecamatan_list as $key => $kecamatan):?>
                                                            <option value="<?=$kecamatan['id_kecamatan'];?>">
                                                                <?=$kecamatan['nama_kecamatan'];?>
                                                            </option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group form-group-default">
                                                        <label>Kategori
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <select required class="form-control" name="f_id_kategori"
                                                            id="f_id_kategori">
                                                            <option value="">-- Pilih --</option>
                                                            <?php foreach ($kategori_list as $key => $kategori):?>
                                                            <option value="<?=$kategori['id_kategori'];?>">
                                                                <?=$kategori['nama_kategori'];?>
                                                            </option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group form-group-default"
                                                        <?= $this->session->userdata('role') != 'admin'?'hidden':''?>>
                                                        <label>Pengelola
                                                            <small>
                                                                <i class="text-danger">*</i>
                                                            </small>
                                                        </label>
                                                        <select required class="form-control" name="f_id_pengelola"
                                                            id="f_id_pengelola">
                                                            <option value="">-- Pilih --</option>
                                                            <?php foreach ($pengelola_list as $key => $pengelola):?>
                                                            <option value="<?=$pengelola['id_admin'];?>">
                                                                <?=$pengelola['username'];?>
                                                            </option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <input type="hidden" name="id_wisata" id="id_wisata">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <script>
                        document.getElementById('fotoEdit').addEventListener('change', function(event) {
                            const previewContainer = document.getElementById('preview-edit');
                            previewContainer.innerHTML = ''; // Clear previous previews

                            const files = event.target.files;
                            for (let i = 0; i < files.length; i++) {
                                const file = files[i];

                                // Create a FileReader to read the file
                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    // Create a container for the image and delete icon
                                    const imageContainer = document.createElement('div');
                                    imageContainer.classList.add('position-relative', 'm-2');

                                    // Create an image element
                                    const img = document.createElement('img');
                                    img.src = e.target.result;
                                    img.style.width = '100px'; // Set desired width for preview
                                    img.style.height = '100px'; // Set desired height for preview
                                    img.style.objectFit = 'cover'; // Maintain aspect ratio

                                    // Create a delete icon
                                    const deleteIcon = document.createElement('span');
                                    deleteIcon.innerHTML = '&times;'; // Using '×' as the delete icon
                                    deleteIcon.style.position = 'absolute';
                                    deleteIcon.style.top = '0';
                                    deleteIcon.style.right = '0';
                                    deleteIcon.style.color = 'red'; // Color of the delete icon
                                    deleteIcon.style.cursor = 'pointer';
                                    deleteIcon.style.fontSize = '20pt'; // Set desired font size
                                    deleteIcon.style.fontWeight = 'bold'; // Set font weight to bold

                                    // Add click event to delete the image
                                    deleteIcon.addEventListener('click', function() {
                                        imageContainer.remove(); // Remove the image container
                                        // Optional: You can also remove the file from the input if needed
                                        const dataTransfer = new DataTransfer();
                                        for (let j = 0; j < files.length; j++) {
                                            if (j !== i) {
                                                dataTransfer.items.add(files[j]);
                                            }
                                        }
                                        event.target.files = dataTransfer
                                            .files; // Update the input files
                                    });

                                    // Append image and delete icon to the container
                                    imageContainer.appendChild(img);
                                    imageContainer.appendChild(deleteIcon);
                                    previewContainer.appendChild(imageContainer);
                                }

                                // Read the file as a data URL
                                reader.readAsDataURL(file);
                            }
                        });

                        // Function to load existing images
                        function loadExistingImages(images) {
                            const existingImagesContainer = document.getElementById('existing_images');
                            existingImagesContainer.innerHTML = ''; // Clear existing images

                            images.forEach(image => {
                                const imageContainer = document.createElement('div');
                                imageContainer.classList.add('position-relative', 'm-2');

                                // Create an image element
                                const img = document.createElement('img');
                                img.src = image; // URL of existing image
                                img.style.width = '100px'; // Set desired width for existing image
                                img.style.height = '100px'; // Set desired height for existing image
                                img.style.objectFit = 'cover'; // Maintain aspect ratio

                                // Create a delete icon
                                const deleteIcon = document.createElement('span');
                                deleteIcon.innerHTML = '&times;'; // Using '×' as the delete icon
                                deleteIcon.style.position = 'absolute';
                                deleteIcon.style.top = '0';
                                deleteIcon.style.right = '0';
                                deleteIcon.style.color = 'red'; // Color of the delete icon
                                deleteIcon.style.cursor = 'pointer';
                                deleteIcon.style.fontSize = '20pt'; // Set desired font size
                                deleteIcon.style.fontWeight = 'bold'; // Set font weight to bold

                                // Add click event to delete the existing image
                                deleteIcon.addEventListener('click', function() {
                                    imageContainer.remove(); // Remove the image container
                                    // Optionally, you can manage the deletion on the backend or update the form state here
                                });

                                // Append image and delete icon to the container
                                imageContainer.appendChild(img);
                                imageContainer.appendChild(deleteIcon);
                                existingImagesContainer.appendChild(imageContainer);
                            });
                        }
                        </script>
                        <!-- Modal Hapus Wisata -->
                        <div class="modal fade" id="deleteWisataBtn" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form method="post" action="<?=base_url('wisata/delete');?>" id="deleteWisataForm">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold"> Hapus </span>
                                                <span class="fw-light"> wisata </span>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah Anda yakin ingin menghapus wisata <strong
                                                    id="nama_wisata"></strong>?</p>
                                            <input required type="hidden" id="delete_wisata_id" name="id_wisata" />
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Wisata</th>
                                        <th>Foto</th>
                                        <th>Deskripsi</th>
                                        <th>Kontak</th>
                                        <th>Jam Kunjung</th>
                                        <th>Jam Tutup</th>
                                        <th>Pengelola</th>
                                        <th>Kecamatan</th>
                                        <th>Kategori</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;?>
                                    <?php foreach ($wisata_list as $key => $wisata) :?>
                                    <tr>
                                        <td><?=$i++?>.</td>
                                        <td><?=$wisata['nama_wisata']?></td>
                                        <td>
                                            <?php 
                                                $file_upload = $wisata['foto'];
                                                if($file_upload != null){
                                                    // Coba decode JSON
                                                    $files = json_decode($file_upload, true);

                                                    // Jika gagal decode, anggap file dipisahkan dengan koma
                                                    if ($files === null) {
                                                        $files = explode(',', $file_upload);
                                                    }
                                                } else {
                                                    $files = null;
                                                }
                                            ?>
                                            <div class="d-flex">
                                                <?php if($files): ?>
                                                <?php foreach ($files as $key => $file): ?>
                                                <?php $file = trim($file); ?>
                                                <a href="<?=base_url('uploads/wisata/'.$file)?>"
                                                    data-lightbox="wisata-<?=$wisata['id_wisata'];?>"
                                                    data-title="Foto <?=$wisata['nama_wisata']?>">
                                                    <img style="width: 50px; height:50px; object-fit: cover; margin-right: 5px;"
                                                        src="<?=base_url('uploads/wisata/'.$file)?>"
                                                        alt="Foto <?=$wisata['nama_wisata']?>">
                                                </a>
                                                <?php endforeach; ?>
                                                <?php else: ?>
                                                <p>No images available</p>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                        <td><?= substr($wisata['deskripsi'], 0, 10) ?>...</td>
                                        <td><?=$wisata['kontak']?></td>
                                        <td><?=$wisata['jam_kunjung']?></td>
                                        <td><?=$wisata['jam_tutup']?></td>
                                        <td><?=$wisata['pengelola']?></td>
                                        <td><?=$wisata['nama_kecamatan']?></td>
                                        <td><?=$wisata['nama_kategori']?></td>
                                        <td>
                                            <div class="form-button-action">
                                                <button type="button" data-bs-target="#editWisataBtn"
                                                    data-bs-toggle="modal" title="Edit Wisata"
                                                    class="btn btn-link btn-primary btn-lg"
                                                    data-original-title="Edit Task" data-id="<?=$wisata['id_wisata']?>"
                                                    data-id_pengelola="<?=$wisata['f_id_pengelola']?>"
                                                    data-foto='<?=$wisata['foto']?>'
                                                    data-nama_wisata="<?=$wisata['nama_wisata']?>"
                                                    data-latitude="<?=$wisata['latitude']?>"
                                                    data-longitude="<?=$wisata['longitude']?>"
                                                    data-geojson="<?=$wisata['geojson']?>"
                                                    data-deskripsi="<?=htmlspecialchars($wisata['deskripsi']);?>"
                                                    data-kontak="<?=$wisata['kontak']?>"
                                                    data-jam_kunjung="<?=$wisata['jam_kunjung']?>"
                                                    data-jam_tutup="<?=$wisata['jam_tutup']?>"
                                                    data-id_kecamatan="<?=$wisata['f_id_kecamatan']?>"
                                                    data-id_kategori="<?=$wisata['f_id_kategori']?>">
                                                    <i class="fa fa-edit"></i>
                                                </button>

                                                <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#deleteWisataBtn" title="Delete Wisata"
                                                    data-id_wisata="<?=$wisata['id_wisata']?>"
                                                    data-nama_wisata="<?=$wisata['nama_wisata']?>"
                                                    class="btn btn-link btn-danger" data-original-title="Remove">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
<script>
var map = L.map('map').setView([-9.1750381, 124.6628093], 10); // Set lokasi peta ke Belu

// L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
//     attribution: '© OpenStreetMap contributors'
// }).addTo(map);
L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
    attribution: 'Tiles © Esri — Source: Esri, DeLorme, NAVTEQ',
}).addTo(map);

<?php foreach ($wisata_list as $key => $wisata) : ?>
var marker = L.marker([<?=$wisata['latitude'];?>, <?=$wisata['longitude'];?>]).addTo(map)
    .bindPopup('<div style="text-align: center;">' +
        '<div style="display: flex; justify-content: center; flex-wrap: wrap;">' +
        <?php
                // Decode JSON untuk mengambil foto sebagai array
                $fotos = json_decode($wisata['foto'], true);
                if (!empty($fotos)) {
                    // Batasi jumlah foto yang ditampilkan maksimal 1
                    $fotos = array_slice($fotos, 0, 1);
                    foreach ($fotos as $foto) {
                        // Tampilkan gambar dengan link yang mengarah ke gambar besar untuk lightbox
                        echo '\'<div style="margin: 5px;">' .
                            '<a href="' . base_url('uploads/wisata/' . $foto) . '" data-lightbox="wisata-' . $key . '" data-title="' . $wisata['nama_wisata'] . '">' .
                            '<img src="' . base_url('uploads/wisata/' . $foto) . '" alt="' . $wisata['nama_wisata'] . '" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">' .
                            '</a></div>\' + ';
                    }
                }
            ?> '</div>' +
        '<b><?=$wisata['nama_wisata'];?></b><br>' +
        '</div>').openPopup();
<?php endforeach; ?>
</script>


<script>
ClassicEditor
    .create(document.querySelector('#deskripsi'))
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });
</script>
<script>
let editorInstance;
ClassicEditor
    .create(document.querySelector('#deskripsi-edit'))
    .then(editor => {
        editorInstance = editor;
    })
    .catch(error => {
        console.error(error);
    });
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Event listener for the edit button
    const editButtons = document.querySelector('#editWisataBtn');
    const deleteButtons = document.querySelector('#deleteWisataBtn');

    // Button that triggered the modal
    editButtons.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;

        const dataFoto = button.getAttribute('data-foto');

        // Handle dataFile parsing (JSON array or comma-separated)
        let files;
        try {
            // Check if dataFile is a JSON-like array
            files = JSON.parse(dataFoto);

            if (!Array.isArray(files)) {
                throw new Error('Parsed result is not an array'); // Prevent malformed data
            }
        } catch (e) {
            // If parsing fails, assume it's a comma-separated string
            files = dataFoto ? dataFoto.split(',') : [];
        }

        // Clear existing images
        const existingImagesContainer = editButtons.querySelector('#existing_images');
        existingImagesContainer.innerHTML = '';

        if (files.length === 0 || (files.length === 1 && files[0] === "")) {
            existingImagesContainer.innerHTML =
                '<p class="text-dark mb-1 fs-6">Tidak ada file yang diunggah.</p>';
        } else {
            files.forEach(file => {
                const file_ext = file.split('.').pop().toLowerCase();
                if (['jpg', 'jpeg', 'png'].includes(file_ext)) {
                    fileElement = `
                    <div class="image-wrapper flex-row col-1" data-file-name="${file}" style="width: 12%;">
                        <a href="<?=base_url('uploads/wisata/');?>${file}" data-lightbox="images">
                            <img style="width:50px; height:50px;" src="<?=base_url('uploads/wisata/');?>${file}" alt="Gambar Buku Harian" class="img-thumbnail">
                        </a>
                        <button type="button" class="btn-close remove-image" data-file-name="${file}"></button>
                    </div>`;
                } else {
                    fileElement = `
                    <div class="file-wrapper flex-row col-1 fs-6" data-file-name="${file}" style="width: 100%;">
                        <a href="<?=base_url('uploads/wisata/');?>${file}" target="_blank">${file}</a>
                        <button type="button" class="btn-close remove-file" data-file-name="${file}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                            </svg>
                        </button>
                    </div>`;
                }

                existingImagesContainer.insertAdjacentHTML('beforeend', fileElement);
            });
        }

        document.querySelectorAll('.remove-image').forEach(button => {
            button.addEventListener('click', function() {
                let fileName = this.getAttribute('data-file-name');
                let imageWrapper = document.querySelector(
                    '.image-wrapper[data-file-name="' +
                    fileName + '"]');
                imageWrapper.remove();

                let input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'deleted_files[]';
                input.value = fileName;
                document.querySelector('#editWisataBtn form').appendChild(input);
            });
        });

        // Get data attributes from the clicked button
        const wisataId = button.getAttribute('data-id');
        const pengelolaId = button.getAttribute('data-id_pengelola');
        const namaWisata = button.getAttribute('data-nama_wisata');
        const latitude = button.getAttribute('data-latitude');
        const longitude = button.getAttribute('data-longitude');
        const geojson = button.getAttribute('data-geojson');
        const deskripsi = button.getAttribute('data-deskripsi');
        const kontak = button.getAttribute('data-kontak');
        const jamKunjung = button.getAttribute('data-jam_kunjung');
        const jamTutup = button.getAttribute('data-jam_tutup');
        const idKecamatan = button.getAttribute('data-id_kecamatan');
        const idKategori = button.getAttribute('data-id_kategori');

        // Set values to the modal fields
        editButtons.querySelector('#nama_wisata').value = namaWisata;
        editButtons.querySelector('#f_id_pengelola').value = pengelolaId;
        editButtons.querySelector('#latitude').value = latitude;
        editButtons.querySelector('#longitude').value = longitude;
        editButtons.querySelector('#geojson').value = geojson;
        editButtons.querySelector('#deskripsi-edit').value = deskripsi;
        editButtons.querySelector('#kontak').value = kontak;
        editButtons.querySelector('#jam_kunjung').value = jamKunjung;
        editButtons.querySelector('#jam_tutup').value = jamTutup;
        editButtons.querySelector('#f_id_kecamatan').value = idKecamatan;
        editButtons.querySelector('#f_id_kategori').value = idKategori;
        editButtons.querySelector('#id_wisata').value = wisataId;

        if (editorInstance) {
            editorInstance.setData(deskripsi); // Update CKEditor content
        }
    });

    deleteButtons.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;

        // Get data attributes from the clicked button
        const wisataId = button.getAttribute('data-id_wisata');
        const namaWisata = button.getAttribute('data-nama_wisata');

        // Set values to the modal fields
        deleteButtons.querySelector('#delete_wisata_id').value = wisataId;
        deleteButtons.querySelector('#nama_wisata').textContent = namaWisata;
    });
});
</script>