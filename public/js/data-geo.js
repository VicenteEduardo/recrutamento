const ProvinceAndCounty = [{
    /* Bengo */
    P1: ['Ambriz', 'Bula Atumba', 'Dande', 'Dembos', 'Nambuangongo', 'Pango', 'Aluquém'],
    /* Benguela */
    P2: ['Balombo', 'Baía Farta', 'Benguela', 'Bocoio', 'Caimbambo', 'Catumbela', 'Chongorói', 'Cubal',
        'Ganda', 'Lobito'
    ],
    /* Bié */
    P3: ['Andulo', 'Camacupa', 'Catabola', 'Chinguar', 'Chitembo', 'Cuemba', 'Cunhinga', 'Cuíto', 'Nharea'],
    /* Cabinda */
    P4: ['Belize', 'Buco-Zau', 'Cabinda', 'Cacongo'],
    /* Cuando Cubango */
    P5: ['Calai', 'Cuangar', 'Cuchi', 'Cuito Cuanavale', 'Dirico', 'Mavinga', 'Menongue', 'Nancova',
        'Rivungo'
    ],
    //Cuanza Norte
    P6: ['Ambaca',
        'Banga',
        'Bolongongo',
        'Cambambe',
        'Cazengo',
        'Golungo Alto',
        'Gonguembo',
        'Lucala',
        'Quiculungo',
        'Samba Caju',
        'Ndalatando'
    ],

    //Cuanza Sul
    P7: ['Amboim',
        'Cassongue',
        'Cela',
        'Conda',
        'Ebo',
        'Libolo',
        'Mussende',
        'Porto Amboim',
        'Quibala',
        'Quilenda',
        'Seles',
        'Sumbe',
    ],
    //Cunene
    P8: ['Cahama',
        'Cuanhama',
        'Curoca',
        'Cuvelai',
        'Namacunde',
        'Ombadja',
    ],
    //Huambo
    P9: ['Bailundo',
        'Cachiungo',
        'Caála',
        'Ecunha',
        'Huambo',
        'Londuimbali',
        'Longonjo',
        'Mungo',
        'Chicala-Choloanga',
        'Chinjenje',
        'Ucuma',
    ],
    //Huila
    P10: ['Caconda',
        'Cacula',
        'Caluquembe',
        'Chiange',
        'Chibia',
        'Chicomba',
        'Chipindo',
        'Cuvango',
        'Humpata',
        'Jamba',
        'Lubango',
        'Matala',
        'Quilengues',
        'Quipungo',
    ],
    //Luanda
    P11: ['Belas',
        'Cacuaco',
        'Cazenga',
        'Ícolo e Bengo',
        'Luanda',
        'Quilamba Quiaxi',
        'Quissama',
        'Talatona',
        'Viana',
    ],
    //Lunda-Norte
    P12: ['Cambulo',
        'Capenda-Camulemba',
        'Caungula',
        'Chitato',
        'Cuango',
        'Cuílo',
        'Lóvua',
        'Lubalo',
        'Lucapa',
        'Xá-Muteba',
    ],
    //Lunda-Sul
    P13: ['Cacolo',
        'Cacolo',
        'Dala',
        'Muconda',
        'Saurimo',
    ],
    //Malanje
    P14: ['Cacuso',
        'Calandula',
        'Cambundi-Catembo',
        'Cangandala',
        'Caombo',
        'Cuaba Nzoji',
        'Cunda-Dia-Baze',
        'Malanje',
        'Marimba',
        'Massango',
        'Mucari',
        'Quela',
        'Quirima',
        'Luquembo'
    ],
    //Moxico
    P15: ['Alto Zambeze',
        'Bundas',
        'Camanongue',
        'Léua',
        'Luau',
        'Luacano',
        'Luchazes',
        'Cameia',
        'Moxico',
    ],
    //Namibe
    P16: ['Bibala',
        'Camucuio',
        'Moçâmedes',
        'Tômbua',
        'Virei',
    ],
    //Uige
    P17: ['Alto Cauale',
        'Ambuíla',
        'Bembe',
        'Buengas',
        'Bungo',
        'Damba',
        'Milunga',
        'Mucaba',
        'Negage',
        'Puri',
        'Quimbele',
        'Quitexe',
        'Sanza Pombo',
        'Songo',
        'Uíge',
        'Zombo',
    ],
    //Zaire
    P18: ['Cuimba',
        'Mabanza Congo',
        'Nóqui',
        'Nezeto',
        'Soio',
        'Tomboco',
    ],
}]

const province_id = document.querySelector('#province_id')
const county = document.querySelector('#county')
const wrapperCounty = document.querySelector('#wrapper-county')


console.log(province_id)
const removeChild = (el) => {
    while (el.firstChild) {
        el.removeChild(el.firstChild);
    }
}

const hideElement = el => el.style.display = 'disabled'

const showElement = el => el.style.display = ''

hideElement(wrapperCounty)/*
<option value="" disabled> Selecione um município</option> */
province_id.addEventListener('change', e => {
    showElement(wrapperCounty)
    removeChild(county)
    const option = document.createElement("option")
    const value = option.text = "Selecione o Munícipio";
    const disabled = option.disabled = true;
    const selected = option.selected = true;

    county.add(option);
    if (e.target.value === province_id.value) {
        ProvinceAndCounty.map(data => {
            data[e.target.value].map(city => {
                const option = document.createElement("option")
                const value = option.text = city;
                county.add(option);
            })
        })
    }

})