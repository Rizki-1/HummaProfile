<script>
    const data = [{
        "title": "Pendaftaran Siswa Magang",
        "link": "{{ route('home.siswaIndex') }}",
        "keywords": [{
                "keyword": "pendaftaran",
                "weight": 3
            }, {
                "keyword": "siswa",
                "weight": 3
            },
            {
                "keyword": "magang",
                "weight": 3
            },
        ]
    },{
        "title": "Pendaftaran Kelas Industri",
        "link": "{{ route('home.industriIndex') }}",
        "keywords": [{
                "keyword": "pendaftaran",
                "weight": 3
            }, {
                "keyword": "kelas",
                "weight": 3
            },
            {
                "keyword": "industri",
                "weight": 3
            },
        ]
    },
    {
        "title": "Produk kami",
        "link": "{{ route('produk.index') }}",
        "keywords": [{
                "keyword": "produk",
                "weight": 3
            }, {
                "keyword": "kami",
                "weight": 3
            },
        ]
    },{
        "title": "Contant Me",
        "link": "{{ route('contactIndex') }}",
        "keywords": [{
                "keyword": "kontak",
                "weight": 3
            }, {
                "keyword": "contact",
                "weight": 3
            },
            {
                "keyword": "contact me",
                "weight": 3
            },
        ]
    },{
        "title": "Berita",
        "link": "{{ route('beritaIndex') }}",
        "keywords": [{
                "keyword": "berita",
                "weight": 3
            }, {
                "keyword": "blog",
                "weight": 3
            },
        ]
    }, ]
</script>
