<script>
    const data = [{
        "title": "Pendaftaran Siswa Magang",
        "link": "{{ route('home.siswaIndex') }}",
        "keywords": [{
                "keyword": "pendaftaran",
                "weight": 1
            }, {
                "keyword": "siswa",
                "weight": 1
            },
            {
                "keyword": "magang",
                "weight": 1
            },
        ]
    },{
        "title": "Pendaftaran Kelas Industri",
        "link": "{{ route('home.industriIndex') }}",
        "keywords": [{
                "keyword": "pendaftaran",
                "weight": 1
            }, {
                "keyword": "kelas",
                "weight": 1
            },
            {
                "keyword": "industri",
                "weight": 1
            },
        ]
    },
    {
        "title": "Produk kami",
        "link": "{{ route('produk.index') }}",
        "keywords": [{
                "keyword": "produk",
                "weight": 1
            }, {
                "keyword": "kami",
                "weight": 1
            },
        ]
    },{
        "title": "Contant Me",
        "link": "{{ route('contactIndex') }}",
        "keywords": [{
                "keyword": "kontak",
                "weight": 1
            }, {
                "keyword": "contact",
                "weight": 1
            },
            {
                "keyword": "contact me",
                "weight": 1
            },
        ]
    },{
        "title": "Berita",
        "link": "{{ route('beritaIndex') }}",
        "keywords": [{
                "keyword": "berita",
                "weight": 1
            }, {
                "keyword": "blog",
                "weight": 1
            },
        ]
    }, ]
</script>
