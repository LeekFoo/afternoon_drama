let isPlay = false;

$(function () {
    $('#draw-btn').on('click', function () {
        $.ajax({
            type: 'get',
            dataType: 'json',
            url: 'api/card',
        }).done(function (data, textStatus, jqXHR) {
            isPlay = true;
            DisplayCard(data['fiveCard'], data['sevenCard']);
            $('#draw-btn').html('はじめから');
            $('#draw-btn').removeClass('palse');
            $('#redraw-btn').prop("disabled", false);
        }).fail(function (jqXHR, textStatus, errorThrown) {
            console.log('通信エラー：' + textStatus);
            console.log(errorThrown);
        });
    });

    $('#redraw-btn').on('click', function () {
        const holdIds = {};

        const fiveHolds = [];
        const sevenHolds = [];

        let redrawCntFive = 0;
        let redrawCntSeven = 0;

        $('#five-card .card').each(function(idx) {
            const id = $(this).data('id');
            fiveHolds.push(id);

            if($(this).hasClass('remove')) {
                redrawCntFive++;
                $(this).remove();
            }
        });

        $('#seven-card .card').each(function(idx) {
            const id = $(this).data('id');
            sevenHolds.push(id);

            if($(this).hasClass('remove')) {
                redrawCntSeven++;
                $(this).remove();
            }
        });

        holdIds['five'] = fiveHolds;
        holdIds['seven'] = sevenHolds;

        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'api/card/redraw',
            data: {hold: holdIds, redrawCountFive: redrawCntFive, redrawCountSeven: redrawCntSeven}
        }).done(function (data, textStatus, jqXHR) {
            console.log(data);
            DisplayCard(data['fiveCard'], data['sevenCard'], false);
            $('#redraw-btn').prop("disabled", true);
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

});

function DisplayCard(fiveCards, sevenCards, isReset = true) {
    const fiveCard = $('#five-card .row');
    const sevenCard = $('#seven-card .row');

    if(isReset) {
        fiveCard.html('');
        sevenCard.html('');
    }

    $.each(fiveCards, function(index, value) {
        const html = '<div class="five card col-md-2" data-id="' + value.id +'">' + value.word + '</div>';
        fiveCard.append(html);
    });

    $.each(sevenCards, function(index, value) {
        const html = '<div class="seven card col-md-2" data-id="' + value.id +'">' + value.word + '</div>';
        sevenCard.append(html);
    });

    $('.sample-area').html('');

    initializeCard();
}

function initializeCard() {
    $('#five-card .card').on('click', function () {
        const id = $(this).data('id');
        $(this).toggleClass('remove');
    });

    $('#seven-card .card').on('click', function () {
        const id = $(this).data('id');
        $(this).toggleClass('remove');
    });

    $('.card').draggable();
}
