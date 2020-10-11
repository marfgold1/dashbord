@extends('layouts.dashboard_admin_webinar-registration')

@section('card-content')
    <p>Unduh data peserta registrasi webinar ini. (format file: .xlsx)</p>
    <div class="alert alert-success" role="alert">
        <span>
            <strong>Drag n drop item yang ingin kamu sertakan ke list kiri dan letakkan di list kanan jika tidak ingin disertakan</strong>
        </span>
    </div>
    <form>
        <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <label class="text-primary">Kolom yang disertakan</label>
                    <ul class="list-group" id="included">
                        <li class="list-group-item" data-name="name">Nama</li>
                        <li class="list-group-item" data-name="email">Email</li>
                    </ul>
                </div>
                <div class="col">
                    <label class="text-danger">Kolom yang tidak disertakan</label>
                    <ul class="list-group" id="excluded">
                        <li class="list-group-item" data-name="gender">Jenis Kelamin</li>
                        <li class="list-group-item" data-name="age">Umur</li>
                        <li class="list-group-item" data-name="category">Kategori</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="form-group mt-2">
            <button id="submit" class="btn btn-primary" type="button">Unduh Data</button>
        </div>
    </form>
@endsection

@section('custom-script')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script>
        new Sortable(document.getElementById('included'), {
            group: 'shared',
            animation: 150,
        });

        new Sortable(document.getElementById('excluded'), {
            group: 'shared',
            animation: 150
        });

        $('#submit').click(function () {
            var name = '';
            $(this).attr('disabled', 'disabled').text('Sedang membuat data...');
            $('#included').children('li').each(function () {
                name += $(this).data('name')+',';
            });
            if(name.length == 0) {
                alert("Tidak ada item yang kamu pilih");
                $('#submit').attr('disabled', null).text('Unduh Data');
            } else {
                name = name.substr(0, name.length - 1);
                name = name.split(',');
                var data = {
                    'name': name,
                    '_token': '{{ csrf_token() }}'
                }
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    var a;
                    if(xhttp.readyState===4)
                        $('#submit').attr('disabled', null).text('Unduh Data');
                    if (xhttp.readyState === 4 && xhttp.status === 200) {
                        a = document.createElement('a');
                        a.href = window.URL.createObjectURL(xhttp.response);
                        a.download = '{{ $webinar->nama }}-'+Date.now()+".xlsx";
                        a.style.display = 'none';
                        document.body.appendChild(a);
                        a.click();
                    }
                };
                xhttp.open("POST", "{{ route('admin.webinar.registration.data.download', [ 'webinar' => $webinar ]) }}");
                xhttp.setRequestHeader("Content-Type", "application/json");
                xhttp.responseType = 'blob';
                xhttp.send(JSON.stringify(data));
            }
        });
    </script>
@endsection
