<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold" id="uploadModalLabel">Create New Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="index.php?action=simpan_post" method="POST" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Category</label>
                        <select name="kategori_id" class="form-select" required>
                            <option value="">-- Select category --</option>
                            <option value="1">Book</option>
                            <option value="2">Game</option>
                            <option value="3">Music</option>
                            <option value="4">Movie</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Post Title</label>
                        <input type="text" name="judul" class="form-control" placeholder="Example: Atomic Habits..." required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Caption</label>
                        <textarea name="isi" class="form-control" rows="3" placeholder="What do you think?"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Upload Image</label>
                        <input type="file" name="foto" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-dark px-4">Post</button>
                </div>
            </form>
        </div>
    </div>
</div>