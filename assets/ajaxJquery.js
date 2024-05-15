$(document).ready(function () {
    $("#productType").on("change", function() {
        var switcherValue = $(this).val();

        if (switcherValue == 'DVD') {
            dvdData(switcherValue);
        } else if(switcherValue == 'Furniture'){
            Furniture(switcherValue);
        }
        else if(switcherValue == 'Book'){
            bookData(switcherValue);
        }
        else{
            $('#ajax').empty();
        }
    });
});

function Furniture(switcherValue) {
    $.ajax({
        url: "../project/Dimensions.html",
        dataType: "html",
        type: "GET",
        data: {
            switcherValue: switcherValue
        },
        success: function(result) {
            success(result);
        },
        error: function(xhr, status, error) {
            console.error("Error loading data:", error);
        }
    });
}
function bookData(switcherValue) {
    $.ajax({
        url: "../project/weight.html",
        dataType: "html",
        type: "GET",
        data: {
            switcherValue: switcherValue
        },
        success: function(result) {
            success(result);
        },
        error: function(xhr, status, error) {
            console.error("Error loading data:", error);
        }
    });
}

function dvdData(switcherValue) {
    $.ajax({
        url: "../project/size.html",
        dataType: "html",
        type: "GET",
        data: {
            switcherValue: switcherValue
        },
        success: function(result) {
            success(result);
        },
        error: function(xhr, status, error) {
            console.error("Error loading data:", error);
        }
    });
}

function success(result) {
    $('#ajax').empty();
    $('#ajax').append(result);
}
