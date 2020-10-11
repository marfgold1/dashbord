<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute harus diterima.',
    'active_url' => ':attribute bukan URL yang valid.',
    'after' => ':attribute harus berupa tanggal setelah :date.',
    'after_or_equal' => ':attribute harus berupa tanggal setelah atau sama dengan :date.',
    'alpha' => ':attribute hanya boleh mengandung huruf.',
    'alpha_dash' => ':attribute hanya boleh mengandung huruf, angka, tanda hubung dan garis bawah.',
    'alpha_num' => ':attribute hanya boleh mengandung huruf dan angka.',
    'array' => ':attribute harus berupa sebuah himpunan.',
    'before' => ':attribute harus berupa tanggal sebelum :date.',
    'before_or_equal' => ':attribute harus berupa tanggal sebelum atau sama dengan :date.',
    'between' => [
        'numeric' => ':attribute harus di antara :min dan :max.',
        'file' => ':attribute harus di antara :min dan :max kilobytes.',
        'string' => ':attribute harus di antara :min dan :max karakter.',
        'array' => ':attribute harus di antara :min dan :max item.',
    ],
    'boolean' => 'Isian :attribute harus berupa benar atau salah.',
    'confirmed' => 'Konfirmasi :attribute tidak sesuai.',
    'date' => ':attribute bukan merupakan tanggal yang valid.',
    'date_equals' => ':attribute harus berupa tanggal yang sama dengan:date.',
    'date_format' => ':attribute tidak sesuai dengan format :format.',
    'different' => ':attribute and :other harus berbeda.',
    'digits' => ':attribute harus berupa :digits digit.',
    'digits_between' => ':attribute harus di antara :min dan :max digit.',
    'dimensions' => ':attribute memiliki dimensi gambar yang tidak valid.',
    'distinct' => 'Isian :attribute memiliki nilai duplikat.',
    'email' => ':attribute harus berupa alamat email yang valid.',
    'ends_with' => ':attribute harus berakhir dengan salah satu dari berikut: :values.',
    'exists' => ':attribute yang dipilih tidak valid.',
    'file' => ':attribute harus berupa berkas.',
    'filled' => 'Isian :attribute harus memiliki nilai.',
    'gt' => [
        'numeric' => ':attribute harus lebih besar daripada :value.',
        'file' => ':attribute harus lebih besar daripada :value kilobytes.',
        'string' => ':attribute harus lebih besar daripada :value karakter.',
        'array' => ':attribute harus memiliki lebih dari :value item.',
    ],
    'gte' => [
        'numeric' => ':attribute harus lebih besar atau sama dengan :value.',
        'file' => ':attribute harus lebih besar atau sama dengan :value kilobytes.',
        'string' => ':attribute harus lebih besar atau sama dengan :value karakter.',
        'array' => ':attribute harus memiliki :value item atau lebih.',
    ],
    'image' => ':attribute berupa gambar.',
    'in' => ':attribute yang dipilih tidak valid.',
    'in_array' => 'Isian :attribute tidak ada di :other.',
    'integer' => ':attribute harus berupa bilangan bulat.',
    'ip' => ':attribute harus berupa alamat IP yang valid.',
    'ipv4' => ':attribute harus berupa alama IPv4 yang valid.',
    'ipv6' => ':attribute harus berupa alamat IPv6 yang valid.',
    'json' => ':attribute harus berupa string JSON yang valid.',
    'lt' => [
        'numeric' => ':attribute harus kurang dari :value.',
        'file' => ':attribute harus kurang dari :value kilobytes.',
        'string' => ':attribute harus kurang dari :value karakter.',
        'array' => ':attribute harus memiliki kurang dari :value item.',
    ],
    'lte' => [
        'numeric' => ':attribute harus kurang dari atau sama dengan :value.',
        'file' => ':attribute harus kurang dari atau sama dengan :value kilobytes.',
        'string' => ':attribute harus kurang dari atau sama dengan :value karakter.',
        'array' => ':attribute tidak boleh memiliki lebih dari :value item.',
    ],
    'max' => [
        'numeric' => ':attribute tidak boleh lebih dari :max.',
        'file' => ':attribute tidak boleh lebih dari :max kilobytes.',
        'string' => ':attribute tidak boleh lebih dari :max karakter.',
        'array' => ':attribute tidak boleh memiliki lebih dari :max item.',
    ],
    'mimes' => ':attribute harus berupa berkas bertipe: :values.',
    'mimetypes' => ':attribute harus berupa berkas bertipe: :values.',
    'min' => [
        'numeric' => ':attribute harus sekurang-kurangnya :min.',
        'file' => ':attribute harus sekurang-kurangnya :min kilobytes.',
        'string' => ':attribute harus sekurang-kurangnya :min karakter.',
        'array' => ':attribute harus memiliki sekurang-kurangnya :min item.',
    ],
    'not_in' => ':attribute yang dipilih tidak valid.',
    'not_regex' => 'Format :attribute tidak valid.',
    'numeric' => ':attribute harus berupa angka.',
    'password' => 'Kata sandi salah.',
    'present' => 'Isian :attribute harus ada.',
    'regex' => 'Format :attribute tidak valid.',
    'required' => 'Isian :attribute dibutuhkan.',
    'required_if' => 'Isian :attribute dibutuhkan saat :other adalah :value.',
    'required_unless' => 'Isian :attribute dibutuhkan kecuali jika :other berada dalam :values.',
    'required_with' => 'Isian :attribute dibutuhkan saat :values ada.',
    'required_with_all' => 'Isian :attribute dibutuhkan saat :values ada.',
    'required_without' => 'Isian :attribute dibutuhkan saat :values tidak ada.',
    'required_without_all' => 'Isian :attribute dibutuhkan saat tidak ada dari :values ada.',
    'same' => ':attribute dan :other harus sesuai.',
    'size' => [
        'numeric' => ':attribute harus berupa :size.',
        'file' => ':attribute harus berupa :size kilobytes.',
        'string' => ':attribute harus berupa :size karakter.',
        'array' => ':attribute harus mengandung :size item.',
    ],
    'starts_with' => ':attribute harus dimulai dengan salah satu dari berikut: :values.',
    'string' => ':attribute harus berupa string.',
    'timezone' => ':attribute harus berupa sebuah zona valid.',
    'unique' => ':attribute sudah diambil.',
    'uploaded' => ':attribute gagal untuk mengunggah.',
    'url' => 'Format :attribute tidak valid.',
    'uuid' => ':attribute harus berupa UUID yang valid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'email' => 'Alamat Email',
        'name' => 'Nama',
        'password' => 'Kata Sandi',
        'age' => 'Umur',
        'gender' => 'Jenis Kelamin',
        'category' => 'Kategori',
        'avatar' => 'Foto profil',
        'nama'=> 'Nama',
        'topik' => 'Topik',
        'fakultas' => 'Fakultas',
        'deskripsi' => 'Deskripsi',
        'narasumber' => 'Pembicara',
        'jadwal' => 'Jadwal',
        'pic' => 'Penanggung Jawab',
        'batas_pendaftaran' => 'Tenggat waktu pendaftaran',
        'kuota' => 'Kuota',
        'subject' => 'Judul',
        'message' => 'Pesan',
        'greeting' => 'Salam pembuka',
        'salutation' => 'Salam penutup',
        'action_name' => 'Judul Link',
        'action_url' => 'Link',
        'attachment' => 'Lampiran'
    ],

];
