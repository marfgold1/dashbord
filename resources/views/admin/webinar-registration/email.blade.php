@extends('layouts.dashboard_admin_webinar-registration')

@section('card-content')
    <div role="alert" class="alert alert-danger text-wrap">
        <span>Mohon maaf fitur email tidak tersedia akibat limit email dari server. Mohon maaf atas ketidaknyamanannya..</span>
    </div>
    <div hidden>
    <div role="alert" class="alert alert-danger text-wrap">
        <span>Form ini akan dikirimkan ke semua peserta yang terdaftar di webinar ini. Kamu bisa menggunakan fasilitas ini untuk memberitahu mereka tentang webinar (link meet, donasi, dkk), hanya saja tolong jangan spam mereka ya :D<br/>PS: Kamu akan menerima email jika ada kesalahan atau semua email berhasil terkirim.<br/></span>
    </div>
    <div
        role="alert" class="alert alert-info text-wrap">
        <span>Kamu bisa memakai <strong>$username</strong> (nama peserta) dan <strong>$webinarname</strong> (nama webinar)</span>
    </div>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="subject">Judul</label>
            <input required type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{ old('subject') }}"/>
            @error('subject')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="check-greeting" name="is-greeting" {{ old('is-greeting')=='true'?'checked':'' }}/>
            <label class="form-check-label" for="check-greeting">Ubah Salam Pembuka</label>
        </div>
        <div class="form-group" id="form-greeting" hidden>
            <label for="greeting">Salam Pembuka</label>
            <input type="text" class="form-control @error('greeting') is-invalid @enderror" id="greeting" name="greeting" value="{{ old('greeting') }}"/>
            @error('greeting')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="message">Pesan</label>
            <textarea required class="form-control @error('message') is-invalid @enderror" id="message" rows="5" name="message">{{ old('message') }}</textarea>
            @error('message')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="check-action" name="is-action" {{ old('is-action')=='true'?'checked':'' }}/>
            <label class="form-check-label" for="check-action">Tambahkan Link / URL</label>
        </div>
        <div class="form-group" id="form-action" hidden>
            <div class="form-row">
                <div class="col-md-4">
                    <label for="action-name">Judul Link</label>
                    <input type="text" class="form-control @error('action_name') is-invalid @enderror" id="action-name"  name="action_name" value="{{ old('action_name') }}"/>
                    @error('action_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col">
                    <label for="action-url">Link</label>
                    <input type="text" class="form-control @error('action_url') is-invalid @enderror" id="action-url" name="action_url" value="{{ old('action_url') }}"/>
                    @error('action_url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="check-salutation" name="is-salutation" {{ old('is-salutation')=='true'?'checked':'' }}/>
            <label class="form-check-label" for="check-salutation">Ubah Salam Penutup</label>
        </div>
        <div class="form-group" id="form-salutation" hidden>
            <label for="salutation">Salam Penutup</label>
            <input type="text" class="form-control @error('salutation') is-invalid @enderror" id="salutation" name="salutation" value="{{ old('salutation') }}"/>
            @error('salutation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="check-attachment" name="is-attachment" {{ old('is-attachment')=='true'?'checked':'' }}/>
            <label class="form-check-label" for="check-attachment">Tambahkan Lampiran</label>
        </div>
        <div class="form-group" id="form-attachment" hidden>
            <div class="">
                <input type="file" id="attachment" class="@error('attachment') is-invalid @enderror" name="attachment" value="{{ old('attachment') }}"/>
                @error('attachment')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group mt-2">
            <button class="btn btn-info mr-2" type="button" id="btn-preview">Pratinjau</button>
            <button class="btn btn-primary" type="submit" id="btn-submit">Kirim</button>
        </div>
    </form>
    </div>
@endsection

@section('custom-script')
    <script>
        /*
        function check(){
            var val = $(this).prop('checked');
            var data = this.id.split('-')[1];
            $('#form-'+data).attr('hidden',(val?null:'hidden'));
        }
        $('[id^="check-"]').each(check);
        $('[id^="check-"]').change(check);
        $('#btn-preview').click(function (){
            var query='?';
            query += 'subject='+$('#subject').val();
            query += '&message='+encodeURIComponent($('#message').val());
            $('[id^="check-"]').each(function(){
                var val = $(this).prop('checked');
                query += '&'+$(this).attr('name')+'='+val;
                if(val) {
                    var data = this.id.split('-')[1];
                    $('[name^="'+data+'"]').each(function (){
                        var name = $(this).attr('name');
                        var value = $(this).val();
                        query += '&'+name+'='+encodeURIComponent(value);
                    });
                }
            });
            console.log(query);
            window.open(''+query, '_blank');
        });
        $('#btn-submit').click(function () {
            this.enabled = false;
        });
        */
    </script>
@endsection
