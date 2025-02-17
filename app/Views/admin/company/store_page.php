<?= $this->extend('layouts/office/main'); ?>

<?= $this->section('titleActions'); ?>
<div class="col-auto ms-auto d-print-none">
    <div class="btn-list">
        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" onclick="openModal('create')">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 5l0 14" />
                <path d="M5 12l14 0" />
            </svg>
            Cabang
        </a>
        <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" onclick="openModal('create')" aria-label="Create new report">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 5l0 14" />
                <path d="M5 12l14 0" />
            </svg>
        </a>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="table-responsive">
        <table class="table table-vcenter card-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Provinsi</th>
                    <th>Kota</th>
                    <th>Kode Pos</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Test</td>
                    <td>Test</td>
                    <td>Test</td>
                    <td>Test</td>
                    <td>Test</td>
                    <td>Test</td>
                    <td>Test</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="modal modal-blur fade" id="modal-store" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Cabang Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= route_to('company.store') ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="form-label">Nama Cabang</label>
                                <input type="text" class="form-control" name="store_name" placeholder="Nama Cabang Baru" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label class="form-label">Telepon</label>
                                <input type="text" class="form-control" name="store_phone_number" placeholder="Telepon Cabang" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-2">
                                <label class="form-label">Alamat</label>
                                <textarea name="store_address" class="form-control" rows="3" placeholder="Alamat Cabang" required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-2">
                                <label for="store_province" class="form-label">Provinsi</label>
                                <select
                                    class="form-select"
                                    name="store_province"
                                    id="store_province">
                                    <option value="" data-id="">Pilih Provinsi</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label for="store_city" class="form-label">Kota / Kab</label>
                                <select
                                    class="form-select"
                                    name="store_city"
                                    id="store_city">
                                    <option value="">Pilih Kota / Kab</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="">
                                <label class="form-label">Kode Pos</label>
                                <input type="number" class="form-control" name="store_post_code" placeholder="Kode Pos Cabang" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary ms-auto">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Cabang
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('pageScripts'); ?>
<script>
    $(document).ready(function() {
        $.ajax({
            type: "GET",
            url: "https://theraserver.github.io/api-wilayah-indonesia/api/provinces.json",
            // data: "data",
            dataType: "JSON",
            success: function(response) {
                $.each(response, function(i, v) {
                    $('#store_province').append(`
                        <option value="${v.name}" data-id="${v.id}">${v.name}</option>
                    `)
                });
            }
        });
    });

    $('#store_province').on('change', function() {
        let id = $(this).find(':selected').data('id')
        $.get(`https://theraserver.github.io/api-wilayah-indonesia/api/regencies/${id}.json`, [],
            function(data, textStatus, jqXHR) {
                $.each(data, function(i, v) {
                    $('#store_city').append(`
                        <option value="${v.name}" data-id="${v.id}">${v.name}</option>
                    `)
                });
            },
            "json"
        );
    })

    function openModal(cmd, id = null) {
        if (cmd == 'edit') {

        } else {
            $('#modal-store').modal('show')
        }
    }
</script>
<?= $this->endSection(); ?>