<div class="modal fade" id="import-excel-modal" tabindex="-1" role="dialog"  aria-hidden="true">
    <form action="#" method="post">
        @csrf
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> استيراد ملف اكسل</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="modal-body row" >
                    <div class="col-md-12">
                        <label class="form-label required ">الملف المراد استيراده</label>
                        <input name="file"  type="file" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary add_equipment">حفظ</button>
                </div>

            </div>
        </div>

    </form>
</div>
