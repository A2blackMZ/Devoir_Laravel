@extends('layout')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	color: #566787;
	background: #f5f5f5;
	font-family: 'Varela Round', sans-serif;
	font-size: 13px;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
	background: #fff;
	padding: 20px 25px;
	border-radius: 3px;
	min-width: 1000px;
	box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
	padding-bottom: 15px;
	background: #435d7d;
	color: #fff;
	padding: 16px 30px;
	min-width: 100%;
	margin: -20px -25px 10px;
	border-radius: 3px 3px 0 0;
}
.table-title h2 {
	margin: 5px 0 0;
	font-size: 24px;
}
.table-title .btn-group {
	float: right;
}
.table-title .btn {
	color: #fff;
	float: right;
	font-size: 13px;
	border: none;
	min-width: 50px;
	border-radius: 2px;
	border: none;
	outline: none !important;
	margin-left: 10px;
}
.table-title .btn i {
	float: left;
	font-size: 21px;
	margin-right: 5px;
}
.table-title .btn span {
	float: left;
	margin-top: 2px;
}
table.table tr th, table.table tr td {
	border-color: #e9e9e9;
	padding: 12px 15px;
	vertical-align: middle;
}
table.table tr th:first-child {
	width: 60px;
}
table.table tr th:last-child {
	width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
	background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
	background: #f5f5f5;
}
table.table th i {
	font-size: 13px;
	margin: 0 5px;
	cursor: pointer;
}
table.table td:last-child i {
	opacity: 0.9;
	font-size: 22px;
	margin: 0 5px;
}
table.table td a {
	font-weight: bold;
	color: #566787;
	display: inline-block;
	text-decoration: none;
	outline: none !important;
}
table.table td a:hover {
	color: #2196F3;
}
table.table td a.edit {
	color: #FFC107;
}
table.table td a.delete {
	color: #F44336;
}
table.table td i {
	font-size: 19px;
}
table.table .avatar {
	border-radius: 50%;
	vertical-align: middle;
	margin-right: 10px;
}
.pagination {
	float: right;
	margin: 0 0 5px;
}
.pagination li a {
	border: none;
	font-size: 13px;
	min-width: 30px;
	min-height: 30px;
	color: #999;
	margin: 0 2px;
	line-height: 30px;
	border-radius: 2px !important;
	text-align: center;
	padding: 0 6px;
}
.pagination li a:hover {
	color: #666;
}
.pagination li.active a, .pagination li.active a.page-link {
	background: #03A9F4;
}
.pagination li.active a:hover {
	background: #0397d6;
}
.pagination li.disabled i {
	color: #ccc;
}
.pagination li i {
	font-size: 16px;
	padding-top: 6px
}
.hint-text {
	float: left;
	margin-top: 10px;
	font-size: 13px;
}
/* Custom checkbox */
.custom-checkbox {
	position: relative;
}
.custom-checkbox input[type="checkbox"] {
	opacity: 0;
	position: absolute;
	margin: 5px 0 0 3px;
	z-index: 9;
}
.custom-checkbox label:before{
	width: 18px;
	height: 18px;
}
.custom-checkbox label:before {
	content: '';
	margin-right: 10px;
	display: inline-block;
	vertical-align: text-top;
	background: white;
	border: 1px solid #bbb;
	border-radius: 2px;
	box-sizing: border-box;
	z-index: 2;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	content: '';
	position: absolute;
	left: 6px;
	top: 3px;
	width: 6px;
	height: 11px;
	border: solid #000;
	border-width: 0 3px 3px 0;
	transform: inherit;
	z-index: 3;
	transform: rotateZ(45deg);
}
.custom-checkbox input[type="checkbox"]:checked + label:before {
	border-color: #03A9F4;
	background: #03A9F4;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	border-color: #fff;
}
.custom-checkbox input[type="checkbox"]:disabled + label:before {
	color: #b8b8b8;
	cursor: auto;
	box-shadow: none;
	background: #ddd;
}
/* Modal styles */
.modal .modal-dialog {
	max-width: 400px;
}
.modal .modal-header, .modal .modal-body, .modal .modal-footer {
	padding: 20px 30px;
}
.modal .modal-content {
	border-radius: 3px;
	font-size: 14px;
}
.modal .modal-footer {
	background: #ecf0f1;
	border-radius: 0 0 3px 3px;
}
.modal .modal-title {
	display: inline-block;
}
.modal .form-control {
	border-radius: 2px;
	box-shadow: none;
	border-color: #dddddd;
}
.modal textarea.form-control {
	resize: vertical;
}
.modal .btn {
	border-radius: 2px;
	min-width: 100px;
}
.modal form label {
	font-weight: normal;
}
</style>
<script>
$(document).ready(function(){
    // Activate tooltip
    $('[data-toggle="tooltip"]').tooltip();

    // Select/Deselect checkboxes
    var checkbox = $('table tbody input[type="checkbox"]');
    $("#selectAll").click(function(){
        if(this.checked){
            checkbox.each(function(){
                this.checked = true;
            });
        } else{
            checkbox.each(function(){
                this.checked = false;
            });
        }
    });
    checkbox.click(function(){
        if(!this.checked){
            $("#selectAll").prop("checked", false);
        }
    });

    // Intercepte la soumission du formulaire de suppression
    $('form[name="delete_form"]').submit(function(e){
        e.preventDefault(); // Empêche la soumission du formulaire par défaut

        var form = $(this);
        var url = form.attr('action');

        // Effectue la suppression via une requête AJAX
        $.ajax({
            type: 'DELETE',
            url: url,
            data: form.serialize(), // Envoie les données du formulaire
            success: function(response) {
                // Ferme la modale après suppression réussie
                form.closest('.modal').modal('hide');
                // Recharge éventuellement la page ou met à jour la liste
                // en fonction de votre logique d'interface utilisateur
                // window.location.reload();
            },
            error: function(error) {
                console.log('Error:', error);
            }
        });
    });
});

</script>
</head>
<body>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>CRUD <b>HOTEL</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="{{route('create')}}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add New Room</span></a>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>Hotel name</th>
						<th>Room name</th>
						<th>Price</th>
                        <th>Bed numbers</th>
                        <th>Details</th>
                        <th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
                    @foreach ($rooms as $room)
                    <tr>
                        <td>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="checkbox{{$loop->index + 1}}" name="options[]" value="{{$loop->index + 1}}">
                                <label for="checkbox{{$loop->index + 1}}"></label>
                            </span>
                        </td>
                        <td>{{ $room->hotel_name }}</td>
                        <td>{{ $room->room_name }}</td>
                        <td>{{ $room->price }}</td>
                        <td>{{ $room->bed_numbers }}</td>
                        <td><a href="{{ route('roomdetail', ['room' => $room->id]) }}" class="btn btn-success"><span>Details</span></a></td>
                        <td>
                            @if($room->status == 1)
                                Available
                            @else
                                Unavailable
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('roomedit', ['room' => $room->id]) }}" class="edit" data-toggle="modal" data-target="#editEmployeeModal{{ $room->id }}">
                                <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                            </a>

                            <a href="#deleteEmployeeModal{{ $room->id }}" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
                    @endforeach
				</tbody>
			</table>
			<!--<div class="clearfix">
				<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
				<ul class="pagination">
					<li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul>
			</div>-->
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
@foreach ($rooms as $room)
    <div id="editEmployeeModal{{ $room->id }}" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('roomupdate', ['room' => $room->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Hotel name</label>
                        <input type="text" class="form-control" name="hotel_name" value="{{ $room->hotel_name }}" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" value="{{ $room->description }}" required>
                    </div>
                    <div class="form-group">
                        <label>Room name</label>
                        <input type="text" class="form-control" name="room_name" value="{{ $room->room_name }}" required>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" name="price" value="{{ $room->price }}" required>
                    </div>
                    <div class="form-group">
                        <label>Bed numbers</label>
                        <input type="number" class="form-control" name="bed_numbers" value="{{ $room->bed_numbers }}" required>
                    </div>
                    <div class="form-group">
                        <label>Adult max</label>
                        <input type="number" class="form-control" name="adult_max" value="{{ $room->adult_max }}" required>
                    </div>
                    <div class="form-group">
                        <label>Kid max</label>
                        <input type="number" class="form-control" name="kid_max" value="{{ $room->kid_max }}" required>
                    </div>
                    <div class="form-group">
                        <label>Features</label>
                        <input type="text" class="form-control" name="features" value="{{ $room->features }}" required>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" required>
                            <option value="1" {{ $room->status == 1 ? 'selected' : '' }}>Available</option>
                            <option value="0" {{ $room->status == 0 ? 'selected' : '' }}>Unavailable</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-info">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

@foreach ($rooms as $room)
    <!-- Delete Modal HTML for room ID {{ $room->id }} -->
    <div id="deleteEmployeeModal{{ $room->id }}" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Delete Room</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <form method="POST" action="{{ route('roomdestroy', ['room' => $room->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                Supprimer
                            </button>
                        </form>
                    </div>

            </div>
        </div>
    </div>
@endforeach

</body>
</html>
@endsection
