$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});

$("div.alert").delay(3000).slideUp();

//hàm xác nhận xóa
function getDelete (msg) {
	if (window.confirm(msg)) {
		return true;
	}
	return false;
}