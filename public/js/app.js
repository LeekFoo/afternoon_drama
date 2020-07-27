$(function () {
    $('#draw-btn').on('click', function () {
        $.ajax({
            type: 'get',
            dataType: 'json',
            url: 'api/card',
        }).done(function (data, textStatus, jqXHR) {
            DisplayCard(data['fiveCard'], data['sevenCard']);
        }).fail(function (jqXHR, textStatus, errorThrown) {
            console.log('通信エラー：' + textStatus);
            console.log(errorThrown);
        });
    });

    $('#sample-btn').on('click', function () {
        $.ajax({
            type: 'get',
            dataType: 'json',
            url: 'api/card/list',
        }).done(function (data, textStatus, jqXHR) {
            console.log(data);
            let sample = data['fiveCard'][0]['word'] + ' ' + data['sevenCard'][0]['word'] + ' ' + data['fiveCard'][1]['word'];
            $('.sample-area').html(sample);
        }).fail(function (jqXHR, textStatus, errorThrown) {
            console.log('通信エラー：' + textStatus);
            console.log(errorThrown);
        });
    });

    $('#all-btn').on('click', function () {
        $.ajax({
            type: 'get',
            dataType: 'json',
            url: 'api/card/list',
        }).done(function (data, textStatus, jqXHR) {
            DisplayCard(data['fiveCard'], data['sevenCard']);
        }).fail(function (jqXHR, textStatus, errorThrown) {
            console.log('通信エラー：' + textStatus);
            console.log(errorThrown);
        });
    });
});

function DisplayCard(fiveCards, sevenCards) {
    const fiveCard = $('#five-card .row');
    fiveCard.html('');
    $.each(fiveCards, function(index, value) {
        const html = '<div class="five card col-md-2">' + value.word + '</div>';
        fiveCard.append(html);
    });

    const sevenCard = $('#seven-card .row');
    sevenCard.html('');
    $.each(sevenCards, function(index, value) {
        const html = '<div class="seven card col-md-2">' + value.word + '</div>';
        sevenCard.append(html);
    });

    $('.card').draggable();
    $('.sample-area').html('');
}
