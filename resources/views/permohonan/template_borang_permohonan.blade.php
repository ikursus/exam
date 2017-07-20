<div class="form-group">
    <label for="name" class="col-md-4 control-label">Nama</label>

    <div class="col-md-6">
        {!! Form::text('nama', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label for="tarikh_mula" class="col-md-4 control-label">Tarikh Mula</label>

    <div class="col-md-6">
        {!! Form::date('tarikh_mula', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label for="tarikh_tamat" class="col-md-4 control-label">Tarikh Tamat</label>

    <div class="col-md-6">
        {!! Form::date('tarikh_tamat', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label for="kuota" class="col-md-4 control-label">Kuota</label>

    <div class="col-md-6">
        {!! Form::text('kuota', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label for="name" class="col-md-4 control-label">Status</label>

    <div class="col-md-6">
        {!! Form::select('status', ['buka' => 'Buka', 'tutup' => 'Tutup'], null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-8 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            Simpan Rekod
        </button>
    </div>
</div>
