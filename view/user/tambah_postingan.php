<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold" id="uploadModalLabel">Buat Review Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="index.php?action=simpan_post" method="POST" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kategori</label>
                        <select name="kategori_id" class="form-select" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="1">Buku</option>
                            <option value="2">Film</option>
                            <option value="3">Lagu</option>
                            <option value="4">Game</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul Postingan</label>
                        <input type="text" name="judul" class="form-control" placeholder="Contoh: Atomic Habits..." required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Caption</label>
                        <textarea name="isi" class="form-control" rows="3" placeholder="Bagaimana pendapatmu?"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Upload Foto</label>
                        <input type="file" name="foto" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-dark px-4">Posting</button>
                </div>
            </form>
        </div>
    </div>
</div>