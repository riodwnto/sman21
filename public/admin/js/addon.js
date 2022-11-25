function updateChart() {
    var chart = new ApexCharts(profileReportChartEl, profileReportChartConfig);
    chart.updateSeries([{
        data: [0, 0, 0, 0, 0, 0, 0]
    }])
};

$(document).ready(function () {
    $('#summernote').summernote();

    $('#lecturer-publication-textarea').summernote({
        toolbar: [
            ['style', ['clear']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link']]
        ],
    });

    $('#lecturer-support-textarea').summernote({
        toolbar: [
            ['style', ['clear']]
        ],
    });

    $('#lecturer-expertise-textarea').summernote({
        toolbar: [
            ['style', ['clear']]
        ],
    });

    $('#gallery-textarea').summernote({
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']]
        ],
        callbacks: {
            onKeydown: function (e) {
                var i = e.currentTarget.innerText;
                if (i.trim().length >= 230) {
                    if (e.keyCode != 8 && !(e.keyCode >= 37 && e.keyCode <= 40) && e.keyCode != 46 && !(e.keyCode == 88 && e.ctrlKey) && !(e.keyCode == 67 && e.ctrlKey) && !(e.keyCode == 65 && e.ctrlKey))
                        e.preventDefault();
                }
            },
            onKeyup: function (e) {
                var t = e.currentTarget.innerText;
                $('#gallery-textarea').text(400 - t.trim().length);
            },
        }
    });

    var count = document.getElementsByTagName('select');

    if (count.length !== 0) {
        for (let i = 1; i <= count.length; i++) {
            var new_select = 'select-'+i;
            document.getElementById('select2').id = new_select;

            var name = '#'+new_select;
            console.log(name);

            $(name).select2({
                theme: "bootstrap-5",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
            });
        }
    }
});

function limitChar(element, length) {
    var max_char = length;

    if (element.value.length > max_char) {
        element.value = element.value.substr(0, max_char);
    }
}

function deleteModalData() {
    document.getElementById('kategori_input').value = null;
}

function saveDataModal() {
    var a = document.getElementById('kategori_input').value;

    document.getElementById('kategori_new').hidden = false;
    document.getElementById('kategori_new').value = a;

    document.getElementById('kategori').hidden = true;
}

function showWeather(data) {
    var temp = Math.round(parseFloat(data.main.temp) - 273.15);
    var temp_alt = Math.round(((parseFloat(data.main.temp) - 273.15) * 1.8) + 32);

    var city = data.name;
    var humid = data.main.humidity;

    var iconcode = data.weather[0].icon;
    var iconurl = "http://openweathermap.org/img/wn/" + iconcode + ".png";

    document.getElementById('temp').innerHTML = temp + '&deg; C';
    document.getElementById('weather').src = iconurl;
    document.getElementById('city').innerHTML = city;
    document.getElementById('humidity').innerHTML = humid + '%';

    $(document).ready(function () {
        $('.tooltip-weather').tooltip({
            title: data.weather[0].description,
            placement: "bottom"
        });
        $('.tooltip-temp').tooltip({
            title: temp_alt + '° F',
            placement: "bottom"
        })
    });
}

function weatherCheck(position) {
    var key = '91ef40359a0cddfd234587dffe67a3f8';
    var lat = position.coords.latitude;
    var lon = position.coords.longitude;

    fetch('https://api.openweathermap.org/data/2.5/weather?lat=' + lat + '&lon=' + lon + '&appid=' + key + '&lang=id')
        .then(function (resp) {
            return resp.json()
        }) // Convert data to json
        .then(function (data) {
            showWeather(data);
        })
        .catch(function () {
            alert('Tidak dapat menampilkan cuaca.')
        });
}

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(weatherCheck);
    }
}