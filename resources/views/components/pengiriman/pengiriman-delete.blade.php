<p>Apakah kamu yakin ingin menghapus Pengiriman {{ $pengiriman->kode_pengiriman }} ?</p>
<div id="footermodal" class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
    <form method="POST" action="/pengirimans/{{$pengiriman->id}}">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger">Hapus</button>
    </form>
</div>