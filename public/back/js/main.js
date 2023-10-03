$(document).ready(function () {
    // Activate tooltip
    $('[data-toggle="tooltip"]').tooltip();

    // Select/Deselect checkboxes
    var checkbox = $('table tbody input[type="checkbox"]');
    $("#selectAll").click(function () {
        if (this.checked) {
            checkbox.each(function () {
                this.checked = true;
            });
        } else {
            checkbox.each(function () {
                this.checked = false;
            });
        }
    });
    checkbox.click(function () {
        if (!this.checked) {
            $("#selectAll").prop("checked", false);
        }
    });
});

function testAnim(x) {
    $(".modal .modal-dialog").attr(
        "class",
        "modal-dialog  " + x + "  animated"
    );
}
$("#myModal").on("show.bs.modal", function (e) {
    var anim = $("#entrance").val();
    testAnim(anim);
});
$("#myModal").on("hide.bs.modal", function (e) {
    var anim = $("#exit").val();
    testAnim(anim);
});
