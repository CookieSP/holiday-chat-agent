let climateResponse = null
let ratingResponse = null

$(document).ready(function() {
    $('#climate-buttons').on('click','button', function (evt) {
        climateResponse = $(this).text().toLowerCase()
        $("#climate-buttons").css("display", "none")
        let climateMessage = document.getElementById('climateMessage')
        climateMessage.innerHTML = climateResponse
        $("#message-climate-response").css("display", "block")
        $(".second-question").css("display", "block")

    });
    $('#rating-buttons').on('click','button', function (evt) {
        ratingResponse = $(this).data('rating')
        $("#rating-buttons").css("display", "none")
        let ratingMessage = document.getElementById('ratingMessage')
        ratingMessage.innerHTML = ratingResponse
        $("#message-rating-response").css("display", "block")
    });
})

$(document).ready(function() {
    $("#findHolidayBtn").on("click", function (e) {
        $.ajax({
            url: "/holidays?climate="+climateResponse+"&rating="+ratingResponse,
            type: "GET",
            success: function (response) {
                if(!response[0].length === true){
                    alert("Sorry our current holidays do not match your preferences! Please try again with different answers")
                    document.location.reload(true)
                }
                buildTable(response)
                $("#findHolidayBtn").css("display", "none")

            },
            error: function (xhr) {
                console.log(error);
            }
        })
    })
})

function buildTable(data) {
    $(".holidayResultTable").css("display", "table")
    for (var i = 0; i < data.length; i++) {
        for (var x = 0; x < data[i].length; x++) {
            var row = `<tr>
                        <td>${data[i][x].HolidayReference}</td>
                        <td>${data[i][x].HotelName}</td>
                        <td>${data[i][x].City}</td>
                        <td>${data[i][x].Continent}</td>
                        <td>${data[i][x].Country}</td>
                        <td>${data[i][x].Category}</td>
                        <td>${data[i][x].StarRating}</td>
                        <td>${data[i][x].TempRating}</td>
                        <td>${data[i][x].Location}</td>
                        <td>${data[i][x].PricePerNight}</td>
                   </tr>`
            $('#results-table').html(row)
        }
    }
}
