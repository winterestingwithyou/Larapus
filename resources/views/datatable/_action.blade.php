<form action="{{ $form_url }}" method="POST" class="form-inline js-confirm" data-confirm="{{ $confirm_message }}">
    @method('DELETE')
    @csrf
    <a href="{{ $edit_url }}">Ubah</a>
    <input class="btn btn-xs btn-danger" type="submit" value="Hapus">
</form>