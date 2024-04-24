<div id="confirmDeleteModal" class="modal fade" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Potvrda brisanja</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Da li ste sigurni da želite da obrišete?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Otkaži</button>
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Obriši</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function showConfirmDeleteModal(actionUrl) {
        var form = document.getElementById('deleteForm');
        form.action = actionUrl;
        var modal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
        modal.show();
    }
</script>
