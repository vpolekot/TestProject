$(document).ready(function () {
    $("#user_form").validate({
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            }
        },
        submitHandler: function () {
            let name = $("#input_name").val();
            let email = $("#input_email").val();
            sendAjaxForm(name, email);
            return false;
        }
    });
});

function sendAjaxForm(name, email) {
    $.ajax({
        type: "POST",
        dataType: "JSON",
        data: {
            name: name,
            email: email
        },
        success: function (response) {
            if (Array.isArray(response)) {
                $('#table_container').html(drawTable(response));
            } else {
                $('#table_container').html("Error: user with this email already exists.");
            }
        },
        error: function (response) {
            console.log(response);
            $('#table_container').html('Error: data was not send');
        }
    });
}

function drawTable(response) {
    let text = "<table class=\"table\">" +
        "        <thead>\n" +
        "        <tr>\n" +
        "            <th scope=\"col\">#</th>" +
        "            <th scope=\"col\">Name</th>" +
        "            <th scope=\"col\">Email</th>" +
        "            <th scope=\"col\">Registration Date</th>" +
        "        </tr>" +
        "        </thead>" +
        "        <tbody>";
    response.forEach(function (item, i) {
        let row_number = i + 1;
        text += "<tr><td>" + row_number + "</td>"
            + "<td>" + item[0] + "</td>"
            + "<td>" + item[1] + "</td>"
            + "<td>" + item[2] + "</td>" +
            "</tr>";
    });
    text += "</tbody></table>"
    return text;
}
