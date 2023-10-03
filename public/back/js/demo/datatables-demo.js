// Call the dataTables jQuery plugin

$(document).ready(function () {
    $("#dataTable").DataTable({
        language: {
            search: "Axtarış:",
            info: "Ümumi _TOTAL_ qeydin _START_ - _END_ arasındakı qeydlər göstərilir",
            paginate: {
                first: "İlk",
                previous: "Əvvəlki",
                next: "Sonrakı",
                last: "Axırıncı",
            },
            lengthMenu: "Göstər _MENU_ qeyd",
        },
    });
});
